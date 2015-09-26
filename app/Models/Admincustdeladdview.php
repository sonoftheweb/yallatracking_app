<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class admincustdeladdview extends Sximo  {
	
	protected $table = 'tb_delivery_addresses';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT tb_delivery_addresses.* FROM tb_delivery_addresses  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE tb_delivery_addresses.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
