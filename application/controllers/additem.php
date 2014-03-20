<?php 
	class Additem_controller extends Base_Controller{
		public $restful=true;
		public function get_index(){

		}

		public function post_index(){
			$item=new Stock();
			$item->item_name=Input::get('newItemName');
			$item->brand=Input::get('newItemBrand');
			$item->supplier_id=Input::get('newItemSupplier');
			$item->category_id=Input::get('newItemCategory');
			$item->quantity=Input::get('newItemQuantity');
			$item->rate=Input::get('newItemRate');
			$item->sp=Input::get('newItemSP');
			$item->threshold=Input::get('newItemThreshold');
			$item->userid=Auth::user()->id;
			//Session::get('currentid');


			$supplier=Supplier::find($item->supplier_id)->first();


			$creditSuppID=Input::get('newItemSupplier');
		   	$supplier=Supplier::find($creditSuppID);
			
			$dailypurchases=new Dailypurchases();
			$dailypurchases->item_name=$item->item_name;
			$dailypurchases->item_qty=$item->quantity;
			$dailypurchases->item_rate=$item->rate;
			$dailypurchases->supplier_name=$supplier->supplier_name;
			$dailypurchases->category_id=$item->category_id;
			$dailypurchases->brand=$item->brand;
			$dailypurchases->total_paid=Input::get('newItemPayment');
			$dailypurchases->total_credit=Input::get('newItemTotal')-Input::get('newItemPayment');
			$dailypurchases->total_cost=Input::get('newItemTotal');
			$dailypurchases->purchase_date=date('Y-m-d').' 00:00:00';


			if(Input::get('newItemTotal')>Input::get('newItemPayment')){
				$newcredit=$supplier->credit+(Input::get('newItemTotal')-Input::get('newItemPayment'));
				$supplier->credit=$newcredit;
				
			}
			else{
				echo $supplier->credit;
			}		


			if($item->save() && $supplier->save() && $dailypurchases->save()){
				return Redirect::to('stockentry')->with('flash_notice','New Item Added');
			}
			else{
				echo "Error on stock entry";
			}
		}
	}

 ?>