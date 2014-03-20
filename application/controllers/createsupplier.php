<?php 
	class Createsupplier_controller extends Base_Controller{
		public $restful=true;
		public function get_index(){

		}
		public function post_index(){
			$supplier=new Supplier();
			$supplier->supplier_name=Input::get('newSupplierName');
			$supplier->address=Input::get('newSupplierAddr');
			$supplier->phone=Input::get('newSupplierPhone');
			if($supplier->save())
			{
				return Redirect::to('managesupplier');
			}
			else
			{
				echo "Supplier creation error";
			}
		}
	}
	
 ?>