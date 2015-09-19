<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class accounttypes extends Sximo  {
	
	protected $table = 'tb_account_types';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT tb_account_types.* FROM tb_account_types  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE tb_account_types.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
