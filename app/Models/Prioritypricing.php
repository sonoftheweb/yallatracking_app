<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class prioritypricing extends Sximo  {
	
	protected $table = 'tb_priority_pricing';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT tb_priority_pricing.* FROM tb_priority_pricing  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE tb_priority_pricing.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
