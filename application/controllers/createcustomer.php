<?php 
	class Createcustomer_controller extends Base_Controller{
		public $restful=true;
		
		public function get_index(){

		}

		public function post_index(){
			$customer=new Customer();
			$customer->name=Input::get('newCustomerName');
			$customer->address=Input::get('newCustomerAddr');
			$customer->phone=Input::get('newCustomerPhone');
			if($customer->save())
			{
				return Redirect::to('managecustomer');
			}
			else
			{
				echo "error";
			}
		}

	}
 ?>