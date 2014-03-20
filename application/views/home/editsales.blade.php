@layout('home.master')

@section('content')
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	{{Form::open('/updatesales','POST')}}
	
	<div class="panel panel-default">
	
	<div class="panel-heading">Sale Record</div>
		<div class="panel-body">
		   {{Form::label('updateSaleCustomer','Customer Name : '.$cust_name,array('id'=>'label'))}}
		   {{Form::label('updateSaleDate','Date : '.substr($saledate,0,10),array('id'=>'label', 'class'=>'pull-right'))}}
		
		<table class="table table-hover">
		   	<thead>
		   		<tr>
		   			<th>Item</th>
		   			<th>Quantity</th>
		   			<th>Rate</th>
		   			<th>Subtotal</th>
		   		</tr>
		   	</thead>
		   	<tbody>
		   		
		   	 
			<?php  

				$saleitems=DB::table('sales')->where('id','=',$id)->first();

				//$saleitems=Sale::where('customer_name','=','$cust_name')->first();
				for($i=1;$i<22;$i++){
					 $itemnum="item".$i;
					 $itemqty="item".$i."_qty";
					$itemrate="item".$i."_rate";
					//dd($saleitems);
					 if($saleitems->$itemqty!='0')
					 	echo "<tr><td>".$saleitems->$itemnum."</td><td>".$saleitems->$itemqty."</td><td>".$saleitems->$itemrate."</td><td>".$saleitems->$itemqty*$saleitems->$itemrate. "</td></tr>";
				
				}

			?>
			
		<tr><td colspan="3">Total Cost</td><td> 
		   {{Form::label('updateSaleTotalCost',$saleitems->total_cost,array('placeholder'=>'Total Cost'))}}
</td></tr>
		   <tr><td colspan="3">Total Paid</td><td> 
		   

		   @if($saleitems->total_cost != $saleitems->total_paid)  
		    {{Form::text('updateSaleTotalPaid',$saleitems->total_paid,array('placeholder'=>'Total Paid','id'=>'input','class'=>'form-control'))}}
		 	<?php  echo "</td></tr>
		   <tr><td colspan='3'>Discount</td><td>"; ?> 
		   {{Form::text('updateSaleDiscount',$saleitems->discount,array('placeholder'=>'Discount','id'=>'input','class'=>'form-control'))}}
		   <?php  echo "</td></tr>
		   		   <tr><td colspan='3'>Credit</td><td>"; ?> 
		   {{Form::text('updateSaleCredit',$saleitems->credit,array('placeholder'=>'Credit','id'=>'input','class'=>'form-control'))}}
		  


		 	@else
		 	{{Form::label('updateSaleTotalPaid',$saleitems->total_paid,array('placeholder'=>'Total Paid'))}}
			<?php  echo "</td></tr>
		   <tr><td colspan='3'>Discount</td><td>"; ?> 
		   {{Form::label('updateSaleDiscount',$saleitems->discount,array('placeholder'=>'Discount'))}}
		   <?php  echo "</td></tr>
		   		   <tr><td colspan='3'>Credit</td><td>"; ?> 
		   {{Form::label('updateSaleCredit',$saleitems->credit,array('placeholder'=>'Credit'))}}
		  

			@endif

		   
		   <tr><td colspan="4">
		   {{Form::submit('Update',array('class'=>'btn btn-primary pull-right'))}}
		   <a class='btn btn-warning' href=/printmemo/<?php echo $id; ?> target='_new'>Print Memo</a>
		   </td></tr>
</tbody>
		   </table>  
		</div>
		<div class="panel-footer"></div>
	</div>
	{{Form::close()}}
</div>
@endsection

@section('rightcontent')
<div class="col-xs-22 col-sm-22 col-md-22 col-lg-22">
	<div class="panel panel-default">
	<div class="panel-heading">
		Select Sales
	</div>
		<div class="panel-body">
		{{Form::open('/updatecustomer','POST')}}

		   <table class="table table-hover table-striped">
		   	<thead>
		   		<tr>
		   			<th>Date</th>		   			
		   			<th>ID</th>
		   			<th>Total Sales</th>
		   			<th>Total Paid</th>
		   		</tr>
		   	</thead>
		   	<tbody>
		   		 
			<?php 
		   			$sales=DB::table('sales')->order_by('id','desc')->paginate(5);
		   			foreach($sales->results as $sale):
		   				echo "<tr><td>" .substr($sale->created_at,0,10)."</td><td><a href='".url('/saleslist/'.$sale->id)."'>".$sale->id."</td><td>".$sale->total_cost."</td><td>".$sale->total_paid."</td></tr>";
		   			endforeach;
		   		 ?>

		   	</tbody>
		   </table>
		   <?php 
		   		echo $sales->links();
		    ?>
		</div>
		{{Form::close()}}
	</div>

</div>
@endsection