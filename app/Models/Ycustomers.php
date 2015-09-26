<?php namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class ycustomers extends Sximo  {

	protected $table = 'tb_customers';
	protected $primaryKey = 'id';
	protected $pt = 'tb_payg_balance';
	protected $cmd = 'tb_customer_meta_data';

	public function __construct() {
		parent::__construct();

	}

	public static function querySelect(  ){

		return "  SELECT tb_customers.* FROM tb_customers  ";
	}

	public static function queryWhere(  ){

		return "  WHERE tb_customers.id IS NOT NULL ";
	}

	public static function queryGroup(){
		return "  ";
	}

	public function insertNewCustomer($data){
		$table = 'tb_customers';
		if(isset($data['createdOn'])) $data['createdOn'] = date("Y-m-d H:i:s");
		if(isset($data['updatedOn'])) $data['updatedOn'] = date("Y-m-d H:i:s");
		$id = \DB::table($table)->insertGetId($data);
		return $id;
	}

	public function getUserFromCustomerID($cid){
		$user_id = \DB::table('tb_customers')->where('id',$cid)->value('user_id');
		$user_data = \DB::table('tb_users')->where('id', $user_id)->first();
		unset($user_data->password);
		return $user_data;
	}

	//todo: not sure this is supposed to be here. Move to Ycuctomersedit.
	public function getcustomerIDFromUserID(){
		$customerDetails = \DB::table('tb_customers')->where('user_id', Session::get('uid'))->first();
		return $customerDetails->id;
	}

	//todo: maybe move this to balance model
	public function setPaygBalanceDefault($user_id, $mode='delete'){
		if(!empty($user_id)){
			if($mode=='add'){
				//user is being added to PAYG account
				//check if the user exist in there
				$ifExist = \DB::table($this->pt)->where('user_id',$user_id)->first();
				if(empty($ifExist->id)){
					\DB::table($this->pt)->insert(
						['user_id' => $user_id, 'balance' => 0]
					);
				}
			}
			elseif($mode=='delete'){
				//destroy all entries in balance table for this user
				\DB::table($this->pt)->where('user_id',$user_id)->delete();
			}
		}
	}

	public function updateCustomerMeta($customer_id,$meta_name,$meta_value){
		if(!empty($customer_id)){
			$check_meta_value = $this->getCustomerMeta($meta_name,$customer_id);
			if(empty($check_meta_value)){
				\DB::table($this->cmd)
					->insert(
					['customer_id'=>$customer_id,'meta_name'=>$meta_name,'meta_value'=>$meta_value]
				);
			}
			else{
				\DB::table($this->cmd)
					->where('customer_id',$customer_id)
					->where('meta_name',$meta_name)
					->update(['meta_value'=>$meta_value]);
			}
		}else{
			return;
		}
	}

	public function getCustomerMeta($meta_name, $cid){
		if(!empty($cid) && !empty($meta_name)){
			//query the database for this customer's meta name
			$meta_value = \DB::table($this->cmd)
				->where('customer_id',$cid)
				->where('meta_name',$meta_name)
				->first()
				->value('meta_value');
			return $meta_value;
		}else{
			return;
		}
	}
}
