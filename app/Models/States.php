<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class states extends Sximo  {
	
	protected $table = 'tb_states';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT tb_states.* FROM tb_states  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE tb_states.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
