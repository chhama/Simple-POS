<?php 
	 class Updatecreditor_controller extends Base_Controller{
		public $restful=true;

		public function get_index(){

		}

		public function post_index(){
			// $allinput=Input::all();

			// $creditor=Customer::find(Input::get('editCreditorId'));
			$newvalue=Input::get('editCreditorOwed') - Input::get('editCreditorDiscount');
			// dd($creditor);

			$dailypurchases=new Dailypurchases();
			$dailypurchases->item_name='Credit Discount';
			$dailypurchases->item_qty=1;
			$dailypurchases->item_rate=0;
			$dailypurchases->supplier_name='Dagal';
			$dailypurchases->category_id=0;
			$dailypurchases->brand='Dagal';
			$dailypurchases->total_paid=Input::get('editCreditorDiscount');
			$dailypurchases->total_credit=0;
			$dailypurchases->total_cost=Input::get('editCreditorDiscount');
			$dailypurchases->purchase_date=date('Y-m-d').' 00:00:00';
			
			$success=DB::table('customers')->where('id','=',Input::get('editCreditorId'))->update(array('owed'=>$newvalue));

			if($dailypurchases->save() && $success){
				return Redirect::to('creditorslist');
			}
			else{
				echo "error while updating creditor";
			}

		}
	}

 ?>