<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class ycustomers extends Sximo  {
	
	protected $table = 'tb_customer';
	protected $primaryKey = 'customer_id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT tb_customer.* FROM tb_customer  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE tb_customer.customer_id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
