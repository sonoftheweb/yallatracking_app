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

	public static function delete_action($ids){
		foreach ($ids as $id) {
			//get the customer ID and User ID
			$delivery_object = DB::table('tb_request_delivery')->where('id',$id)->first();
			$customer_id = $delivery_object->cid;
			$user_id = \SiteHelpers::getUserIdFromCustomerId($customer_id);
			$bill = DB::table('tb_bills')->where('delivery_id',$id)->get();
            if(count($bill) == 1){
				$bill_amount = $bill[0]->bill;
				//refund now
				if(\SiteHelpers::is_payg_customer()){
					DB::table('tb_payg_balance')->where('user_id', $user_id)->increment('balance', $bill_amount);
                    //remove the bill
                    self::remove_bills($id);
				}
			}
		}

	}
	

}
