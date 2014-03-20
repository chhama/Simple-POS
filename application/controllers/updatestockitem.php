<?php 
	class Updatestockitem_controller extends Base_Controller{
		public $restful = true;
		public function get_index(){

		}

		public function post_index(){
			// echo Input::get('updateuserpassword').Input::get('updateuserid');
			$input=Input::all();
//			dd($input);


			$supplier=Supplier::find(Input::get('updateItemSupplier'));


			$dailypurchases=new Dailypurchases();
			$dailypurchases->item_name=Input::get('updateItemName');
			$dailypurchases->item_qty=Input::get('updateItemQuantity');
			$dailypurchases->item_rate=Input::get('updateItemRate');
			$dailypurchases->supplier_name=$supplier->supplier_name;
			$dailypurchases->category_id=Input::get('updateItemCategory');
			$dailypurchases->brand=Input::get('updateItemBrand');
			$dailypurchases->total_paid=Input::get('updateItemPayment');
			$dailypurchases->total_credit=Input::get('updateItemTotal')-Input::get('updateItemPayment');
			$dailypurchases->total_cost=Input::get('updateItemTotal');
			$dailypurchases->purchase_date=date('Y-m-d').' 00:00:00';


			$currentitem=Stock::find(Input::get('updateItemID'))->first();

			$stocksupplier=Input::get('updateItemSupplier');
			$stockcategory=$dailypurchases->category_id;
			$stockquantity=($dailypurchases->item_qty)+(Input::get('currentqty'));
			$stockrate=$dailypurchases->item_rate;
			$stocksp=Input::get('updateItemSP');
			$stockthreshold=Input::get('updateItemThreshold');
			$stockuserid=Auth::user()->id;
			$stockbrand=$dailypurchases->brand;
			$stockname=$dailypurchases->item_name;



			if(($dailypurchases->total_cost)>($dailypurchases->total_paid)){
				DB::table('suppliers')->where('id','=',$stocksupplier)->update(array('credit'=>$supplier->credit+$dailypurchases->total_credit));
			}


			// $rules=array(
			// 		'updateuserpassword' => 'required|max:50|min:5',
			// 	);
			// $validation=Validator::make($input, $rules);

			// if($validation->fails())
			// {
			// 	return $validation->errors;
			// }
			// else {users
			
			
			$success=DB::table('stocks')->where('id','=',Input::get('updateItemID'))->update(array('item_name'=>$stockname,'brand'=>$stockbrand,'supplier_id'=>$stocksupplier,'category_id'=>$stockcategory,'quantity'=>$stockquantity,'rate'=>$stockrate,'threshold'=>$stockthreshold,'userid'=>$stockuserid,'sp'=>$stocksp));
			 if($success && $dailypurchases->save())
			 {
			 	return Redirect::to('stockstatus')->with('flash_notice','Stock update successful');
			 }
			 else
			 	{echo "error";}



		// }
			
		}
	}
 ?>