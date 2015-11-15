<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class getdeliveries extends Sximo  {
	
	protected $table = 'tb_request_delivery';
	protected $primaryKey = 'id';

	public function __construct() {
		parent::__construct();
		
	}

	public static function querySelect(  ){
		
		return "  SELECT tb_request_delivery.* FROM tb_request_delivery  ";
	}	

	public static function queryWhere(  ){
		
		return "  WHERE tb_request_delivery.id IS NOT NULL ";
	}
	
	public static function queryGroup(){
		return "  ";
	}

	public static function add_bill($delivery_request_id,$bill,$customer_id,$bill_type){
		DB::table('tb_bills')->insert([
			[
				'customer_id' => $customer_id,
				'bill' => $bill,
				'delivery_id' => $delivery_request_id,
				'bill_type' => $bill_type
			]
		]);
	}

	public static function remove_bills($delivery_request_id){
		DB::table('tb_bills')
			->where('delivery_id',$delivery_request_id)
			->delete();
	}
	

}
