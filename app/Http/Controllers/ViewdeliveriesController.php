<?php namespace App\Http\Controllers;

use App\Http\Controllers\controller;
use App\Models\Viewdeliveries;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Validator, Input, Redirect ; 


class ViewdeliveriesController extends Controller {

	protected $layout = "layouts.main";
	protected $data = array();	
	public $module = 'viewdeliveries';
	static $per_page	= '10';

	public function __construct()
	{
		parent::__construct();
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->model = new Viewdeliveries();
		
		$this->info = $this->model->makeInfo( $this->module);
		$this->access = $this->model->validAccess($this->info['id']);
	
		$this->data = array(
			'pageTitle'	=> 	$this->info['title'],
			'pageNote'	=>  $this->info['note'],
			'pageModule'=> 'viewdeliveries',
			'return'	=> self::returnUrl()
			
		);
		
	}

	public function getIndex( Request $request )
	{

		if($this->access['is_view'] ==0) 
			return Redirect::to('dashboard')
				->with('messagetext', \Lang::get('core.note_restric'))->with('msgstatus','error');

		$sort = (!is_null($request->input('sort')) ? $request->input('sort') : 'id'); 
		$order = (!is_null($request->input('order')) ? $request->input('order') : 'asc');
		// End Filter sort and order for query 
		// Filter Search for query		
		$filter = (!is_null($request->input('search')) ? $this->buildSearch() : '');

		
		$page = $request->input('page', 1);
		$params = array(
			'page'		=> $page ,
			'limit'		=> (!is_null($request->input('rows')) ? filter_var($request->input('rows'),FILTER_VALIDATE_INT) : static::$per_page ) ,
			'sort'		=> $sort ,
			'order'		=> $order,
			'params'	=> $filter,
			'global'	=> (isset($this->access['is_global']) ? $this->access['is_global'] : 0 )
		);
		// Get Query 
		$results = $this->model->getRows( $params );		
		
		// Build pagination setting
		$page = $page >= 1 && filter_var($page, FILTER_VALIDATE_INT) !== false ? $page : 1;	
		$pagination = new Paginator($results['rows'], $results['total'], $params['limit']);	
		$pagination->setPath('viewdeliveries');
		
		$this->data['rowData']		= $results['rows'];
		// Build Pagination 
		$this->data['pagination']	= $pagination;
		// Build pager number and append current param GET
		$this->data['pager'] 		= $this->injectPaginate();	
		// Row grid Number 
		$this->data['i']			= ($page * $params['limit'])- $params['limit']; 
		// Grid Configuration 
		$this->data['tableGrid'] 	= $this->info['config']['grid'];
		$this->data['tableForm'] 	= $this->info['config']['forms'];
		$this->data['colspan'] 		= \SiteHelpers::viewColSpan($this->info['config']['grid']);		
		// Group users permission
		$this->data['access']		= $this->access;
		// Detail from master if any
		
		// Master detail link if any 
		$this->data['subgrid']	= (isset($this->info['config']['subgrid']) ? $this->info['config']['subgrid'] : array()); 
		// Render into template
		return view('viewdeliveries.index',$this->data);
	}	



	function getUpdate(Request $request, $id = null)
	{
	
		if($id =='')
		{
			if($this->access['is_add'] ==0 )
			return Redirect::to('dashboard')->with('messagetext',\Lang::get('core.note_restric'))->with('msgstatus','error');
		}	
		
		if($id !='')
		{
			if($this->access['is_edit'] ==0 )
			return Redirect::to('dashboard')->with('messagetext',\Lang::get('core.note_restric'))->with('msgstatus','error');
		}				
				
		$row = $this->model->find($id);
		if($row)
		{
			$this->data['row'] =  $row;
		} else {
			$this->data['row'] = $this->model->getColumnTable('tb_request_delivery'); 
		}
		$this->data['fields'] =  \AjaxHelpers::fieldLang($this->info['config']['forms']);

        if(empty($this->data['row']['prefered_date_of_delivery'])){
            $this->data['row']['prefered_date_of_delivery'] = date('Y-m-d');
        }

		$this->data['id'] = $id;
		return view('viewdeliveries.form',$this->data);
	}	

	public function getShow( $id = null)
	{
		if($this->access['is_detail'] ==0) 
			return Redirect::to('dashboard')
				->with('messagetext', Lang::get('core.note_restric'))->with('msgstatus','error');
					
		$row = $this->model->getRow($id);
		if($row)
		{
			$this->data['row'] =  $row;
		} else {
			$this->data['row'] = $this->model->getColumnTable('tb_request_delivery'); 
		}
		$this->data['fields'] =  \AjaxHelpers::fieldLang($this->info['config']['forms']);
		
		$this->data['id'] = $id;
		$this->data['access']		= $this->access;
		return view('viewdeliveries.view',$this->data);	
	}	

	function postSave( Request $request)
	{
		$rules = $this->validateForm();
		$validator = Validator::make($request->all(), $rules);	
		if ($validator->passes()) {
			$data = $this->validatePost('tb_viewdeliveries');

            //for Other customers ensure that their limit has not been reached for the selected date
            if(!\SiteHelpers::is_payg_customer(\SiteHelpers::getUserIdFromCustomerId($request->input('cid'))) && (\SiteHelpers::check_daily_limit(\SiteHelpers::getUserIdFromCustomerId($request->input('cid'),$request->input('prefered_date_of_delivery')))))
                return Redirect::to('viewdeliveries?return='.self::returnUrl())
                    ->with('messagetext','This user has exceeded his/her daily limit for '.$request->input('prefered_date_of_delivery'))
                    ->with('msgstatus','error')
                    ->withErrors($validator)->withInput();

            //ensure the delivery is made at the right time
            if(!\SiteHelpers::check_cut_off_time($request->input('parcel_delivery_priority'),$request->input('parcel_pickup_zone'),$request->input('parcel_dropoff_zone'))){
                return Redirect::to('viewdeliveries?return='.self::returnUrl())
                    ->with('messagetext','You cannot make delivery requests at this time')
                    ->with('msgstatus','error')
                    ->withErrors($validator)->withInput();
            }

            //add delivery
			$id = $this->model->insertRow($data , $request->input('id'));
            //update the delivery code using userid
            $this->model->dc_addition($id);
			if($request->input('id')=='') {
                $delCode = $this->model->get_parcel_delivery_code($id);
				if(\SiteHelpers::is_payg_customer(\SiteHelpers::getUserIdFromCustomerId($request->input('cid')))){
                    $bill = \SiteHelpers::calc_delivery_fee($delCode);
                    $this->model->add_bill($id, $bill, $request->input('cid'), 'initial');
                    \SiteHelpers::billing_account_types($request->input('cid'),$bill);
				}
                else{
                    //set the limit table
                    \SiteHelpers::set_deliver_count_for_limit($request->input('cid'),$id,$request->input('prefered_date_of_delivery'));
                }
			}
            //if the delivery is returned
            if($request->input('status')=='4'){
                if(\SiteHelpers::is_payg_customer(\SiteHelpers::getUserIdFromCustomerId($request->input('cid')))){
                    $this->model->add_returned_bill($request->input('id'));
                    \SiteHelpers::billing_account_types($request->input('cid'),$this->model->add_returned_bill($request->input('id'),true));
                }
                /*else{
                    \SiteHelpers::set_deliver_count_for_limit($request->input('cid'),$id,$request->input('prefered_date_of_delivery'),'1');
                }*/
            }
			
			if(!is_null($request->input('apply')))
			{
				$return = 'viewdeliveries/update/'.$id.'?return='.self::returnUrl();
			} else {
				$return = 'viewdeliveries?return='.self::returnUrl();
			}

			// Insert logs into database
			if($request->input('id') =='')
			{
				\SiteHelpers::auditTrail( $request , 'New Data with ID '.$id.' Has been Inserted !');
			} else {
				\SiteHelpers::auditTrail($request ,'Data with ID '.$id.' Has been Updated !');
			}

			return Redirect::to($return)->with('messagetext',\Lang::get('core.note_success'))->with('msgstatus','success');
			
		} else {

			return Redirect::to('viewdeliveries/update/'.$id)->with('messagetext',\Lang::get('core.note_error'))->with('msgstatus','error')
			->withErrors($validator)->withInput();
		}	
	
	}	

	public function postDelete( Request $request)
	{
		
		if($this->access['is_remove'] ==0) 
			return Redirect::to('dashboard')
				->with('messagetext', \Lang::get('core.note_restric'))->with('msgstatus','error');
		// delete multipe rows 
		if(count($request->input('id')) >=1)
		{
			$this->model->delete_action($request->input('id'));
            \SiteHelpers::refund_limit_action($request->input('id'));
			$this->model->destroy($request->input('id'));
			
			\SiteHelpers::auditTrail( $request , "Delivery With ID : ".implode(",",$request->input('id'))."  , Has Been Removed Successfull");
			// redirect
			return Redirect::to('viewdeliveries')
        		->with('messagetext', \Lang::get('core.note_success_delete'))->with('msgstatus','success'); 
	
		} else {
			return Redirect::to('viewdeliveries')
        		->with('messagetext','No Item Deleted')->with('msgstatus','error');				
		}

	}			


}