<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class weightbasedpricing extends Sximo  {
	
	protected $table = 'tb_weight_pricing';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT tb_weight_pricing.* FROM tb_weight_pricing  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE tb_weight_pricing.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
