<?php 
	class Updatesupplier_controller extends Base_Controller{
		public $restful=true;
		public function get_index()
		{

		}

		public function post_index(){
			
			$userid=Input::get('updateSupplierId');
			$supplier=Supplier::find($userid);
			$supplier->supplier_name=Input::get('updateSupplierName');
			$supplier->address=Input::get('updateSupplierAddr');
			$supplier->phone=Input::get('updateSupplierPhone');
			$supplier->credit=Input::get('updateSupplierOwed');
			if($supplier->save()){
				return Redirect::to('managesupplier');
			}
			else{
				echo "Error on updating Supplier info";
			}
		}
	}
	
 ?>