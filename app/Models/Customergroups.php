<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class customergroups extends Sximo  {
	
	protected $table = 'tb_customer_group';
	protected $group_table = 'tb_customer_group_relationship';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT tb_customer_group.* FROM tb_customer_group  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE tb_customer_group.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}
	

}
