<?php 
	class Updatedebtor_controller extends Base_Controller{
		public $restful=true;

		public function get_index(){

		}

		public function post_index(){
			$debtor=Supplier::find(Input::get('updateDebtorId'));
			$debtor->supplier_name=Input::get('updateDebtorName');
			$debtor->credit=Input::get('updateDebtorOwed');
			if($debtor->save()){
				return Redirect::to('debtorslist');
			}
			else {
				echo "Error while updating Debtor info";
			}
		}
	}
	
 ?>