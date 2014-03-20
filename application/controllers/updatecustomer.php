<?php 
	class Updatecustomer_controller extends Base_Controller{
		public $restful = true;

		public function get_index(){

		}
		public function post_index(){
			$custid=Input::get('updateCustomerId');
			$customer=Customer::find($custid);
			$customer->name=Input::get('updateCustomerName');
			$customer->address=Input::get('updateCustomerAddr');
			$customer->phone=Input::get('updateCustomerPhone');
			$customer->owed=Input::get('updateCustomerCredit');

			if($customer->save()){
				return Redirect::to('managecustomer');
			}
			else{
				echo "Error while updating Customer";
			}
		}
	}

 ?>