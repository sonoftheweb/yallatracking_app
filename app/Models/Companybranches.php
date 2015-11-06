<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class companybranches extends Sximo  {
	
	protected $table = 'tb_branches';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT tb_branches.* FROM tb_branches  ";
	}	

	public static function queryWhere(  ){

		return "  WHERE tb_branches.customer_id = ".\SiteHelpers::getCustomerIdFromUserId();
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
