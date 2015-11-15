<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class viewdeliveries extends Sximo  {
	
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

	public static function enterBill($delivery_id,$bill,$customer_id,$bill_type){
		//check if the delivery_id and bill_type exists
		//if it does run update else run insert

		$check_if = \DB::table('tb_bills')
			->where('delivery_id',$delivery_id)
			->where('bill_type',$bill_type);

		if(empty($check_if)){
			\DB::table('tb_bills')->insert([
				'customer_id'=>$customer_id,
				'bill'=>$bill,
				'delivery_id'=>$delivery_id,
				'bill_type'=>$bill_type
			]);
		}
		else{
			\DB::table('tb_bills')
				->where('customer_id',$customer_id)
				->where('delivery_id',$delivery_id)
				->where('delivery_id',$bill_type)
				->update(['bill'=>$bill]);
		}
		return;
	}

	public static function removeBillOnDelete($delivery_id){
		\DB::table('tb_bills')->where('delivery_id',$delivery_id)->delete();
		return;
	}
	

}
