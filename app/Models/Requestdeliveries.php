<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class requestdeliveries extends Sximo  {
	
	protected $table = 'tb_request_delivery';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT tb_request_delivery.* FROM tb_request_delivery  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE tb_request_delivery.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
