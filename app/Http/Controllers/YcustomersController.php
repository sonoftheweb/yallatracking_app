<?php namespace App\Http\Controllers;

use App\Http\Controllers\controller;
use App\Models\Ycustomers;
use App\Models\Customergroups;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Validator, Input, Redirect, DB ;


class YcustomersController extends Controller {

	static $per_page	= '10';
	public $module = 'ycustomers';
	protected $layout = "layouts.main";
	protected $data = array();

	public function __construct()
	{
		parent::__construct();
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->model = new Ycustomers();

		$this->info = $this->model->makeInfo( $this->module);
		$this->access = $this->model->validAccess($this->info['id']);

		$this->data = array(
			'pageTitle'	=> 	$this->info['title'],
			'pageNote'	=>  $this->info['note'],
			'pageModule'=> 'ycustomers',
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
		$pagination->setPath('ycustomers');

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
		return view('ycustomers.index',$this->data);
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
			$this->data['row'] = $this->model->getColumnTable('tb_customers');
		}
		$this->data['fields'] =  \AjaxHelpers::fieldLang($this->info['config']['forms']);
		$this->data['customer_groups'] = Customergroups::all()->toArray();

		if(\SiteHelpers::is_customer()){
			$this->data['hidethis'] = '';
		}
		else{
			$this->data['hidethis'] = '';
		}

		$this->data['id'] = $id;
		return view('ycustomers.form',$this->data);
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
			$this->data['row'] = $this->model->getColumnTable('tb_customers');
		}
		$this->data['fields'] =  \AjaxHelpers::fieldLang($this->info['config']['forms']);

		$this->data['id'] = $id;
		$this->data['access']		= $this->access;
		return view('ycustomers.view',$this->data);
	}

	function postSave( Request $request)
	{
		$rules = $this->validateForm();
		$validator = Validator::make($request->all(), $rules);
		if ($validator->passes()) {
			if($request->input('id') == ''){
				//check if user exists and end the process if so
				//$users = DB::table('tb_users')->select('username', 'email')->get();
				$su = DB::table('tb_users')->where('username', $request->input('username'))->value('username');
				$se = DB::table('tb_users')->where('email', $request->input('email'))->value('email');

				if(!empty($su) && !empty($se)){
					return Redirect::to('ycustomers')->with('messagetext','Duplicate Email and Username detected. Please use unique usernames and emails for each account.')->with('msgstatus','error')
						->withErrors($validator)->withInput();
				}

				//now we insert new user data here
				$code = rand(10000,10000000);
				$authen = new User;
				$authen->first_name = $request->input('first_name');
				$authen->last_name = $request->input('last_name');
				$authen->username = $request->input('username');
				$authen->email = trim($request->input('email'));
				$authen->activation = $code;
				$authen->group_id = 4;
				$authen->password = \Hash::make($request->input('password'));
				if(CNF_ACTIVATION == 'auto') { $authen->active = '1'; } else { $authen->active = '0'; }
				$authen->save();
				$userid = $authen->id;

				$data = $request->all();
				unset($data['_token']);
				unset($data['submit']);
				unset($data['return']);
				//unset($data['password']);
				$data['password'] = 'SET';
				$data['user_id'] = $userid;

				$id = $this->model->insertNewCustomer($data);

				//check account type is PAYG and add the balance as 0
				if($request->input('account_type') == 4)
				{
                    $this->model->setPaygBalanceDefault($userid,'add');
				}
			}
			else {
				$data = $this->validatePost('tb_ycustomers');
				$id = $this->model->insertRow($data, $request->input('id'));
                $userid = $this->model->getUserFromCustomerID($id);

				if($request->input('account_type') == 4){
					$this->model->setPaygBalanceDefault($userid->id,'add');
				}
				else{
					$this->model->setPaygBalanceDefault($userid->id,'delete');
				}
			}

			if(!is_null($request->input('apply')))
			{
				$return = 'ycustomers/update/'.$id.'?return='.self::returnUrl();
			} else {
				$return = 'ycustomers?return='.self::returnUrl();
			}

			// Insert logs into database
			if($request->input('id') =='')
			{
				\SiteHelpers::auditTrail( $request , 'New Data with ID '.$id.' Has been Inserted !');
			} else {
				\SiteHelpers::auditTrail($request ,'Data with ID '.$id.' Has been Updated !');
			}

			$notif = array(
				'url'   => url('/ycustomers/show/'.$id),
				'userid'    => '5',
				'title'     => 'A customer record has been added or edited.',
				'note'      => 'A customer has been added or edited. Please review this as soon as possible.',

			);
			\SximoHelpers::storeNote($notif);

			return Redirect::to($return)->with('messagetext',\Lang::get('core.note_success'))->with('msgstatus','success');

		} else {

			return Redirect::to('ycustomers/update/'.$id)->with('messagetext',\Lang::get('core.note_error'))->with('msgstatus','error')
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
			//delete user object
			$userdata = $this->model->getUserFromCustomerID($request->input('id'));
			$authen = new User;
			$authen->destroy($userdata->id);

			$this->model->destroy($request->input('id'));

			$notif = array(
				'url'   => url('/ycustomers'),
				'userid'    => '5',
				'title'     => 'A customer record has been deleted.',
				'note'      => 'A customer has been deleted. Please review this change as soon as possible.',

			);
			\SximoHelpers::storeNote($notif);

			\SiteHelpers::auditTrail( $request , "ID : ".implode(",",$request->input('id'))."  , Has Been Removed Successful");
			// redirect
			return Redirect::to('ycustomers')
				->with('messagetext', \Lang::get('core.note_success_delete'))->with('msgstatus','success');

		} else {
			return Redirect::to('ycustomers')
				->with('messagetext','No Item Deleted')->with('msgstatus','error');
		}

	}


}
