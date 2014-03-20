@layout('home.master')

@section('headmsg')
	@if(Session::has('flash_notice'))
	<div class="alert alert-success" id="flash_notice">
		{{Session::get('flash_notice')}}

	</div>
@endif
@endsection


@section('content')
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">Stock Status</div>
		<div class="panel-body">
		   <table class="table table-hover table-striped">
		   	<thead>
		   		<tr>
		   			<th>Item</th>
		   			<th>Brand</th>
					<th>Quantity</th>
					<th>Rate</th>
					<th></th>
		   		</tr>
		   	</thead>
		   	<tbody>
		  
		   		<?php 
		   			$items=DB::table('stocks')->paginate(10);
		   			foreach($items->results as $item):
		   				echo "<tr><td><a href='".url('/stockstatus/'.$item->id)."'>".$item->item_name."</a></td><td>".$item->brand."</td><td>".$item->quantity."</td><td>".$item->rate. "</td><td><a class='btn btn-success btn-sm' href='".url('stockstatus/' . $item->id)."'>Update</a></td></tr>";
		   			endforeach;
		   		 ?>
		   	</tbody>
		   </table>
		   <?php 
		   		echo $items->links();
		    ?>
		</div>
	</div>
</div>
@endsection
@section('rightcontent')
<div class="col-xs-22 col-sm-22 col-md-22 col-lg-22">
<div class="panel panel-default">
	<div class="panel-heading">
	Update Stock
	</div>
		<div class="panel-body">
		{{Form::open('/updatestockitem','POST')}}
		   <table class="table table-hover table-striped">
		   	<thead>
		   	
		   	</thead>
		   	<tbody>
		   	<tr>
		   	
		   		<td>
		   			<input type='hidden' name='updateItemID' value=<?php echo $id; ?>>
		   			{{Form::text('updateItemName',$item_name,array('placeholder'=>'Item Name','id'=>'stockEntry_itemname' ,'class'=>'form-control'))}}
		   		</td>
		   	</tr>
		   	<tr>
		   		
		   		<td>
		   			{{Form::text('updateItemBrand',$brand_name,array('placeholder'=>'Brand Name','id'=>'input' ,'class'=>'form-control'))}}

		   		</td>
		   	</tr>
		   	
		   	<tr>
		   		
		   		<td>
		   			<?php 
		   				$suppliers=Supplier::all();
		   			 ?>

		   			 <select name="updateItemSupplier" id="inputNewItemSupplier" class="form-control" required="required">

		   			 	<?php 
		   			 		foreach($suppliers as $supplier):
		   			 			echo "<option value='$supplier->id'>".$supplier->supplier_name."</option>";
		   			 		endforeach;
		   			 	 ?>
		   			 </select>

		   			 
		   		</td>
		   	</tr>
		   	<tr>
		   	
			<?php 
				$categories=Category::all();
			 ?>
		   		<td>
		   		<select name='updateItemCategory' id='inputNewItemCategory' class='form-control' required='required'>
		   		<?php 
		   			foreach($categories as $category):
		   				echo "<option value='$category->id'>".$category->category_name."</option>";
		   			endforeach;
		   		?>
		   		</select>
		   		</td>
		   	</tr>
		   	<td>	<input type='hidden' name='currentqty' value=<?php echo $quantity; ?>>
		   			{{Form::text('updateCurrentQuantity',$quantity,array('placeholder'=>'Current Quantity','id'=>'stockEntry_currentqty' ,'class'=>'form-control','disabled'=>'disabled'))}}
		   		</td>
		   	<tr>
		   		
		   		<td>
		   			{{Form::text('updateItemQuantity','',array('placeholder'=>'Quantity','id'=>'stockEntry_qty' ,'class'=>'form-control'))}}
		   		</td>
		   	</tr>
			<tr>
				
				<td>
					{{Form::text('updateItemRate',$rate,array('placeholder'=>'Rate','id'=>'stockEntry_rate' ,'class'=>'form-control'))}}
				</td>
			</tr>
			<tr>
				
				<td>
					{{Form::text('updateItemThreshold',$threshold,array('placeholder'=>'Threshold','id'=>'input' ,'class'=>'form-control'))}}
				</td>
			</tr>
			<tr>
			
				<td>
					{{Form::text('updateItemTotal','',array('placeholder'=>'Total','id'=>'stockEntry_total' ,'class'=>'form-control'))}}
				</td>
			</tr>
			<tr>
				
				<td>
					{{Form::text('updateItemPayment','',array('placeholder'=>'Payment Amount','id'=>'input' ,'class'=>'form-control'))}}
				</td>
			</tr>
			
			<tr>
			
				<td>
					{{Form::text('updateItemSP',$sp,array('placeholder'=>'SP','id'=>'input' ,'class'=>'form-control'))}}
				</td>
			</tr>


		   		
		   	</tbody>
		   </table>
			{{ Form::submit('Update Item', array('class'=>'btn btn-primary pull-right','id'=>'btn_updateitem')) }}

		   {{Form::close()}}
		</div>
	</div>
</div>
</div>
<script type="text/javascript">
	$('#stockEntry_rate').blur(function(){
		updateStockTotal();
	});

	var updateStockTotal=function(){
		totalStockPrice=parseFloat($('#stockEntry_rate').val()) * parseFloat($('#stockEntry_qty').val());
		$('#stockEntry_total').val(totalStockPrice.toFixed(2));
	}
</script>

@endsection