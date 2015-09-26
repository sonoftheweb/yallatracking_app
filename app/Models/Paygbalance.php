<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class paygbalance extends Sximo  {
	
	protected $table = 'tb_payg_balance';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT tb_payg_balance.* FROM tb_payg_balance  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE tb_payg_balance.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
