<?php

class Sximoapi {

	public $limit 	= 0 ;
	public $page 	= 1 ;
	public $urls 	= '' ;
	public $conf	= array();
	
	 public function __construct( $host , $apikey ) {
		$this->apikey 	= $apikey ;		
		$this->host 	= $host ;		
		$this->headers = array(
		    'Accept: application/json',
		    'Content-Type: application/json'
    	);
	}

	public function module( $module , $opt = array())
	{
        extract( array_merge( array(
			'limit'  	=> 0 ,
			'sort' 		=> '',
			'order' 	=> 'asc',
			'params' 	=> '',
			'option'	=> 'false'

        ), $opt ));		
        $this->page = isset($_GET['page']) ? $_GET['page'] : "1";
        $this->limit = $limit ;
        $this->sort = $sort ;
        $this->order = $order ;
        $this->params = $params ;
		$this->option = $option;
		$this->module = $module;
		return $this;
	}

	public function get()
	{
		return $this->request('GET','',json_encode(array('Authorization'=> $this->apikey)));
	}

	public function show( $id )
	{
		
		return $this->request('GET', $id ,json_encode(array('Authorization'=> $this->apikey)));
		
	}

	public function store( $data)
	{
		return $this->request('POST','', json_encode($data) );
		
	}
	public function put( $id ,$data)
	{
		return $this->request('PUT', $id , json_encode($data) );
		
	}

	public function delete( $id )
	{

		return $this->request('DELETE', $id );
	}

	public function request( $method , $id = null , $data = null)
	{
		
		if($id == null)
		{
			$argumens  = '?module='.$this->module;
			$argumens .= ($this->limit != '0' || $this->limit !='' ? '&limit='.$this->limit : '');
			$argumens .= ($this->sort !='' ? '&sort='.$this->sort : '');
			$argumens .= ($this->page !='' ? '&page='.$this->page : '');
			$argumens .= '&order='.$this->order ;
			$argumens .= ($this->option !='false' ? '&option=true' : '');
			$url = $this->host . $argumens;

		} else {
			$url = $this->host.'/'.$id.'?module='.$this->module;
		}
			
	    	$handle = curl_init();
		    curl_setopt($handle, CURLOPT_URL, $url);
		    curl_setopt($handle, CURLOPT_HTTPHEADER, $this->headers);
		    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
		    curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false);
		    curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
		    curl_setopt($handle, CURLOPT_USERPWD, "$this->apikey");
	     
	    switch($method) {
		    case 'GET':
			//    curl_setopt($handle, CURLOPT_POSTFIELDS, $data);
		    	break;
		    case 'POST':
			    curl_setopt($handle, CURLOPT_POST, true);
			    curl_setopt($handle, CURLOPT_POSTFIELDS, $data);
		   		break;
		    case 'PUT':
			    curl_setopt($handle, CURLOPT_CUSTOMREQUEST, 'PUT');
			    curl_setopt($handle, CURLOPT_POSTFIELDS, $data);
		    	break;
		    case 'DELETE':
			    curl_setopt($handle, CURLOPT_CUSTOMREQUEST, 'DELETE');
		    	break;
	    }
	    $response = curl_exec($handle);

	    $code = curl_getinfo($handle, CURLINFO_HTTP_CODE);	 
	    curl_close($handle); 

	    self::error( $code , $response );   

	    return  array(
	    	'status' => $code,
	    	'result'	=> $response
	    ); 

		
	}

	public function error( $code , $response )
	{
		switch($code)
		{

			default :
				break;

			// Error Username or password 	
			case '401':
				echo ' You Dont Have Authorization Access '; exit;
				break;	

			case '500':
				echo 'Ops , something went wrong with our server proccess !'; exit;
				break;	

			// Page Not Found 
			case '404':
				echo  $response['message'] ; exit;
				break;					
				
		}


	}

	function pagination($total)
	{
		$base_url = "";
		$query_str = "page";
		$paginate_limit = $this->limit;
		$current_page = isset($_GET['page']) ? $_GET['page'] : "1";
		$total_pages = ceil($total/$this->limit);

		$page_array = array ();
		$dotshow = true;
		for ( $i = 1; $i <= $total_pages; $i ++ )
		{
			if ($i == 1 || $i == $total_pages || ($i >= $current_page - $paginate_limit && $i <= $current_page + $paginate_limit) )
			{
				$dotshow = true;
				if ($i != $current_page)  $page_array[$i]['url'] = $base_url . "?" . $query_str . "=" . $i;
				$page_array[$i]['text'] = strval ($i);

			} else if ($dotshow == true) {

				 $dotshow = false;
				 $page_array[$i]['text'] = "...";

			} else {

			}
		}

		$html = '<ul class="pagination">';
		foreach ($page_array as $page) {
			if (isset ($page['url'])) { 
				$html .='<li><a href="'.$page['url'].'">'.$page['text'].'</a></li>';
			} else { 
				$html .='<li class="disabled"><span class="">'.$page['text'].'</span></li>'; 
			} 
		}
		echo $html .='</ul>';		
				

	}

	function crud( $module )
	{
		$task 	= (isset($_GET['task']) ? $_GET['task'] : 'index');	
		$id 	= (isset($_GET['id']) ? $_GET['id'] : 0 );	
		switch($task):
			default:
				$data = self::module($module,array('option'=>'true','limit'=>10))->get();
				$rows = json_decode($data['result']); 
				$key  = $rows->key;
				$html = ' <div class="table-responsive"><table class="table table-striped table-bordered"><thead><tr>';
				foreach($rows->option->label as $label)
				{

					$html .= "<th>".$label."</th>";

				}
				$html .='<th> Action </th>';
				$html .='</tr><tbody>';
				foreach($rows->rows as $row )
				{
					$html .='<tr>';
					foreach($rows->option->field as $field)
					{
						$html .= ' <td>'.$row->$field.'</td>';

					}
					$html .='<td>
					<a href="?task=edit&id='.$row->$key.'" class="btn btn-sm btn-primary"> Edit </a>
					<a href="?task=show&id='.$row->$key.'" class="btn btn-sm btn-success"> Show </a>
					<a href="?task=delete&id='.$row->$key.'" class="btn btn-sm btn-danger"> Delete </a>
					</td>';

					$html .='</tr>';

				}

				$html .='</tbody></table></div>';
				echo $html;	
				self::pagination($rows->total);

				break;

			case 'show';
				$rest = self::module($module,array('option'=>'true'))->show($id);
				$rows = json_decode($rest['result']);
				$html = '<table class="table table-bordered table-striped"><body>';
				foreach($rows as $key=>$val)
				{

					$html .= '<tr>		
								<td >'.$key.'</td>
								<td >'.$val.'</td>
							</tr>';
				}
				$html .= '</body></table>';
				$html .=  '<a href="javascript:history.go(-1)" class="btn btn-warning btn-sm"> Back To List </a>';
					echo $html;
				break;	

			case 'edit';
				$rest = self::module($module,array('option'=>'true'))->show($id);
				$rows = json_decode($rest['result']);

				if(isset($_POST['submit']))
				{
					foreach($rows as $key=>$val) 
					{

						$data[$key] = $_POST[$key];
					}	
					self::module($module)->put($id ,$data);		
					$rest = self::module($module,array('option'=>'true'))->show($id);
					$rows = json_decode($rest['result']);								
				}


				$html = '
				<form method="post" action="?task=edit&id='.$id.'">
				<table class="table table-bordered table-striped"><body>';
				foreach($rows as $key=>$val)
				{

					$html .= '<tr>		
								<td >'.$key.'</td>
								<td ><input type="text" name="'.$key.'" value=" '.$val.'" class="form-control"></td>
							</tr>';
				}
				$html .= '</body></table>';
				$html .=  '<a href="?" class="btn btn-warning btn-sm"> Back To List </a>';
				$html .=  '<button type="submit" name="submit" class="btn btn-primary btn-sm">  Update Data</button></form>';
					echo $html;
				break;	

			case 'save';
				break;	

			case 'delete';
				self::module($module)->delete($id);
				header('Location: ?');
				break;									

		endswitch;

		

	}



}

