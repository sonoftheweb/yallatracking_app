<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use App\Models\ycustomers;

class deladdress extends Sximo  {
	
	protected $table = 'tb_delivery_addresses';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT tb_delivery_addresses.* FROM tb_delivery_addresses  ";
	}	

	public static function queryWhere(  ){
		$gcid = new ycustomers();
		return "  WHERE tb_delivery_addresses.customer_id = ".$gcid->getcustomerIDFromUserID();
	}
	
	public static function queryGroup(){
		return "  ";
	}

}
