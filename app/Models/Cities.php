<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class cities extends Sximo  {
	
	protected $table = 'tb_cities';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT tb_cities.* FROM tb_cities  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE tb_cities.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
