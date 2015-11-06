<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class zones extends Sximo  {
	
	protected $table = 'tb_zones';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT tb_zones.* FROM tb_zones  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE tb_zones.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
