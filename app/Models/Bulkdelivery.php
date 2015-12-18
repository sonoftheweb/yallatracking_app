<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class bulkdelivery extends Sximo  {
	
	protected $table = 'tb_delivery_bulk';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT tb_delivery_bulk.* FROM tb_delivery_bulk  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE tb_delivery_bulk.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
