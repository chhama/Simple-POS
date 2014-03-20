<?php 
	class Createsales_controller extends Base_Controller{
		public $restful=true;

		public function get_index(){

		}

		public function post_index(){
			$custid=Customer::where('name','=',Input::get('custSearch'))->first();
			$sale=new Sale();
			$sale->customer_id=$custid->id;
			$sale->total_cost=Input::get('saleGrandTotal');
			$sale->discount=Input::get('saleDiscount');
			$sale->total_paid=Input::get('saleTotalPaid');
			$sale->credit=Input::get('saleCredit');
			$sale->customer_name=Input::get('custSearch');

			$j=1;

			$itemnum="item".$j;
				$itemqty="item".$j."_qty";
				$itemrate="item".$j."_rate";
			
			$sale->$itemnum=Input::get('saleadd_name');
			$sale->$itemqty=Input::get('saleadd_qty');
			$sale->$itemrate=Input::get('saleadd_rate');

			
			$dailysales=new Dailysales();
			$dailysales->item_name=$sale->$itemnum;
			$dailysales->quantity=$sale->$itemqty;
			
			$getprices=Stock::where('item_name','=',$sale->$itemnum)->first();
			$dailysales->cp=$getprices->rate * $dailysales->quantity;
			$dailysales->sp=$getprices->sp * $dailysales->quantity;
			$dailysales->sale_date=date('Y-m-d');
			
			$stockdecr=DB::table('stocks')->where('item_name','=',$sale->$itemnum)->first();
				DB::table('stocks')->where('item_name','=',$sale->$itemnum)->update(array('quantity'=>$stockdecr->quantity-$sale->$itemqty));
				// dd($stockdecr);

			$dailysales->save();

			$i=0;
			$j++;

			if(Input::get('qtycounter')==99)
			foreach($_POST['qty'] as $cnt => $qty) {
				$itemnum="item".$j;
				$itemqty="item".$j."_qty";
				$itemrate="item".$j."_rate";
			
				$sale->$itemnum=$_POST['name'][$i];
				$sale->$itemqty=$_POST['qty'][$i];
				$sale->$itemrate=$_POST['rate'][$i];

				$stockdecr=DB::table('stocks')->where('item_name','=',$sale->$itemnum)->first();
				DB::table('stocks')->where('item_name','=',$sale->$itemnum)->update(array('quantity'=>$stockdecr->quantity-$sale->$itemqty));
				

				$dailysales=new Dailysales();
				$dailysales->item_name=$sale->$itemnum;
				$dailysales->quantity=$sale->$itemqty;
				// $getprices=Dailysales::all();
				$getprices=Stock::where('item_name','=',$sale->$itemnum)->first();
				$dailysales->cp=$getprices->rate * $dailysales->quantity;
				$dailysales->sp=$getprices->sp * $dailysales->quantity;
				// dd($dailysales);
				$dailysales->sale_date=date('Y-m-d');
				$dailysales->save();

				$i++;
				$j++;

// run the query - with mysqli_query or whatever database wrapper you are using
// ...
}

			$updateowed=DB::table('customers')->where('name','=',Input::get('custSearch'))->update(array('owed'=>$custid->owed+$sale->credit));


			if($sale->save())
			{

				return Redirect::to('/')->with('flash_notice','Sale created successfully. <a href=/printmemo/'.$sale->id.' target=_new>Print Memo</a>');

			}

			//echo Input::get('custSearch');
/*
			$custid=Customer::where('name','=',Input::get('custSearch'))->first();
			//echo $custid->id;


			$sale=new Sale();

			$sale->customer_id=$custid->id;
			$sale->customer_name=Input::get('custSearch');
			$sale->item1=Input::get('saleItem1');
			$sale->item1_qty=Input::get('saleQty1');
			$sale->item1_rate=Input::get('saleRate1');
			$sale->item2=Input::get('saleItem2');
			$sale->item2_qty=Input::get('saleQty2');
			$sale->item2_rate=Input::get('saleRate2');
			$sale->item3=Input::get('saleItem3');
			$sale->item3_qty=Input::get('saleQty3');
			$sale->item3_rate=Input::get('saleRate3');
			$sale->item4=Input::get('saleItem4');
			$sale->item4_qty=Input::get('saleQty4');
			$sale->item4_rate=Input::get('saleRate4');
			$sale->item5=Input::get('saleItem5');
			$sale->item5_qty=Input::get('saleQty5');
			$sale->item5_rate=Input::get('saleRate5');
			$sale->item6=Input::get('saleItem6');
			$sale->item6_qty=Input::get('saleQty6');
			$sale->item6_rate=Input::get('saleRate6');
			$sale->item7=Input::get('saleItem7');
			$sale->item7_qty=Input::get('saleQty7');
			$sale->item7_rate=Input::get('saleRate7');
			$sale->item8=Input::get('saleItem8');
			$sale->item8_qty=Input::get('saleQty8');
			$sale->item8_rate=Input::get('saleRate8');
			$sale->item9=Input::get('saleItem9');
			$sale->item9_qty=Input::get('saleQty9');
			$sale->item9_rate=Input::get('saleRate9');
			$sale->item10=Input::get('saleItem10');
			$sale->item10_qty=Input::get('saleQty10');
			$sale->item10_rate=Input::get('saleRate10');
			$sale->item11=Input::get('saleItem11');
			$sale->item11_qty=Input::get('saleQty11');
			$sale->item11_rate=Input::get('saleRate11');
			$sale->item12=Input::get('saleItem12');
			$sale->item12_qty=Input::get('saleQty12');
			$sale->item12_rate=Input::get('saleRate12');
			$sale->item13=Input::get('saleItem13');
			$sale->item13_qty=Input::get('saleQty13');
			$sale->item13_rate=Input::get('saleRate13');
			$sale->item14=Input::get('saleItem14');
			$sale->item14_qty=Input::get('saleQty14');
			$sale->item14_rate=Input::get('saleRate14');
			$sale->item15=Input::get('saleItem15');
			$sale->item15_qty=Input::get('saleQty15');
			$sale->item15_rate=Input::get('saleRate15');
			$sale->item16=Input::get('saleItem16');
			$sale->item16_qty=Input::get('saleQty16');
			$sale->item16_rate=Input::get('saleRate16');
			$sale->item17=Input::get('saleItem17');
			$sale->item17_qty=Input::get('saleQty17');
			$sale->item17_rate=Input::get('saleRate17');
			$sale->item18=Input::get('saleItem18');
			$sale->item18_qty=Input::get('saleQty18');
			$sale->item18_rate=Input::get('saleRate18');
			$sale->item19=Input::get('saleItem19');
			$sale->item19_qty=Input::get('saleQty19');
			$sale->item19_rate=Input::get('saleRate19');
			$sale->item20=Input::get('saleItem20');
			$sale->item20_qty=Input::get('saleQty20');
			$sale->item20_rate=Input::get('saleRate20');
			$sale->item21=Input::get('saleItem21');
			$sale->item21_qty=Input::get('saleQty21');
			$sale->item21_rate=Input::get('saleRate21');

			$sale->total_cost=Input::get('saleGrandTotal');
			$sale->discount=Input::get('saleDiscount');
			$sale->total_paid=Input::get('saleTotalPaid');
			$sale->credit=Input::get('saleCredit');



			for($i=1;$i<22;$i++)
			{
				$itemnum="item".$i;
				$itemqty="item".$i."_qty";
				$itemrate="item".$i."_rate";
				if ($sale->$itemnum=='')
					$sale->$itemnum=0;
				else{
					//$stockupdate=
					DB::table('stocks')->where('item_name','=',$sale->$itemnum)->decrement('quantity',$sale->$itemqty);
					//$stockupdate->quantity=$stockupdate->quantity-$sale->itemqty;
					//$stockupdate->save();
				}

				if($sale->$itemqty=='')
					$sale->$itemqty=0;

				if($sale->$itemrate=='')
					$sale->$itemrate=0;
			}
			
			if($sale->total_cost=='')
				$sale->total_cost=0;

			if($sale->discount=='')
				$sale->discount=0;

			if($sale->total_paid=='')
				$sale->total_paid=0;

			if($sale->credit=='')
				$sale->credit=0;

			if($sale->total_cost > $sale->total_paid){
				$custid->owed+=($sale->total_cost-$sale->total_paid);
			}

			$i=1;
			
			$itemnum="item".$i;
			$itemqty="item".$i."_qty";

						 	echo $sale->$itemnum;

			 while(strlen(trim($sale->$itemnum)) > 0)
			 {
			 	echo $sale->$itemnum;
			 	// $dailysales=new Dailysales();
			// 	$dailysales->item_name=$sale->$itemnum;
			// 	$dailysales->quantity=$sale->$itemqty;
			// 	$dailysales->sale_date=date('Y-m-d').' 00:00:00';
			// 	$dailysales->save();
			 	$i++;
			}

			 	echo $sale->$itemnum;

			if($sale->save() && $custid->save())
			{

				// return Redirect::to('/')->with('flash_notice','Sale record id '.$sale->id.' created. Owed by customer '.$flag.' '.$sale->$itemnum);

			}
			else{
				echo "error";
			}

			//dd($sale);
			//return Redirect::to('printmemo');
			exit(' exit');
*/
		} 
	}

 ?>