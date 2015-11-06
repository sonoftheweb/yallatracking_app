<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class basepricing extends Sximo  {
	
	protected $table = 'tb_zone_pricing_base';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT tb_zone_pricing_base.* FROM tb_zone_pricing_base  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE tb_zone_pricing_base.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
