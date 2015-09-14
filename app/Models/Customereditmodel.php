<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class customereditmodel extends Sximo  {
	
	protected $table = 'tb_customers';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT tb_customers.* FROM tb_customers  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE tb_customers.user_id = ".Session::get('uid');
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
