@layout('home.master')
@section('extrajs')
<script type="text/javascript">
	$(function() {
            $("#stockEntry_itemname").focus();
        });
</script>
@endsection
@section('content')
@if(Session::has('flash_notice'))
	<div class="alert alert-success" id="flash_notice">
		{{Session::get('flash_notice')}}

	</div>
@endif
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<div class="panel panel-default">
	<div class="panel-heading">
		New Stock
	</div>
		<div class="panel-body">
		{{Form::open('/additem','POST')}}
		   <table class="table table-hover table-striped">
		   	<thead>
		   		<tr>
		   			<th>Enter New Stock</th>
		   			<th></th>
		   		</tr>
		   	</thead>
		   	<tbody>
		   	<tr>
		   		<td>Item Name</td>
		   		<td>
		   			{{Form::text('newItemName','',array('placeholder'=>'Item Name','id'=>'stockEntry_itemname' ,'class'=>'form-control'))}}
		   		</td>
		   	</tr>
		   	<tr>
		   		<td>Brand</td>
		   		<td>
		   			{{Form::text('newItemBrand','',array('placeholder'=>'Brand Name','id'=>'input' ,'class'=>'form-control'))}}

		   		</td>
		   	</tr>
		   	
		   	<tr>
		   		<td>Supplier</td>
		   		<td>
		   			<?php 
		   				$suppliers=Supplier::all();
		   			 ?>

		   			 <select name="newItemSupplier" id="inputNewItemSupplier" class="form-control" required="required">

		   			 	<?php 
		   			 		foreach($suppliers as $supplier):
		   			 			echo "<option value='$supplier->id'>".$supplier->supplier_name."</option>";
		   			 		endforeach;
		   			 	 ?>
		   			 </select>

		   			 
		   		</td>
		   	</tr>
		   	<tr>
		   		<td>Category</td>
			<?php 
				$categories=Category::all();
			 ?>
		   		<td>
		   		<select name='newItemCategory' id='inputNewItemCategory' class='form-control' required='required'>
		   		<?php 
		   			foreach($categories as $category):
		   				echo "<option value='$category->id'>".$category->category_name."</option>";
		   			endforeach;
		   		?>
		   		</select>
		   		</td>
		   	</tr>
		   	<tr>
		   		<td>Quantity</td>
		   		<td>
		   			{{Form::text('newItemQuantity','',array('placeholder'=>'Quantity','id'=>'stockEntry_qty' ,'class'=>'form-control'))}}
		   		</td>
		   	</tr>
			<tr>
				<td>Rate</td>
				<td>
					{{Form::text('newItemRate','',array('placeholder'=>'Rate','id'=>'stockEntry_rate' ,'class'=>'form-control'))}}
				</td>
			</tr>
			<tr>
				<td>Warning threshold</td>
				<td>
					{{Form::text('newItemThreshold','',array('placeholder'=>'Threshold','id'=>'input' ,'class'=>'form-control'))}}
				</td>
			</tr>
			<tr>
				<td>Total</td>
				<td>
					{{Form::text('newItemTotal','',array('placeholder'=>'Total','id'=>'stockEntry_total' ,'class'=>'form-control'))}}
				</td>
			</tr>
			<tr>
				<td>Payment Amount</td>
				<td>
					{{Form::text('newItemPayment','',array('placeholder'=>'Payment Amount','id'=>'input' ,'class'=>'form-control'))}}
				</td>
			</tr>
			
			<tr>
				<td>Selling Price</td>
				<td>
					{{Form::text('newItemSP','',array('placeholder'=>'SP','id'=>'input' ,'class'=>'form-control'))}}
				</td>
			</tr>


		   		
		   	</tbody>
		   </table>
			{{ Form::submit('Add Item', array('class'=>'btn btn-primary pull-right','id'=>'btn_additem')) }}

		   {{Form::close()}}
		</div>
	</div>
</div>
<script type="text/javascript">
		var itemexists=$('<span style="color:red">Item name already exists</span>');

	$('#stockEntry_itemname').blur(function(){
			$.ajax({
						type: 'get',
						data: 'check_name='+$(this).val(),
						url: 'itemexists',
						dataType:'json',
						}).done(function(result){
							var isexits = result.original.exits;
							if(isexits){
								$('#stockEntry_itemname').after(itemexists);
							}
							else{
								$('#stockEntry_itemname').after(itemexists);
								$('#btn_additem').addClass('disabled');
							}
						});
						
		});

		$('#stockEntry_itemname').focus(function(){
			itemexists.remove();
			
			$('#btn_additem').removeClass('disabled');

		});


	$('#stockEntry_rate').blur(function(){
		updateStockTotal();
	});

	var updateStockTotal=function(){
		totalStockPrice=parseFloat($('#stockEntry_rate').val()) * parseFloat($('#stockEntry_qty').val());
		$('#stockEntry_total').val(totalStockPrice.toFixed(2));
	}
</script>
@endsection

@section('rightcontent')
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	{{Form::open('/addcategory','POST')}}
		<div class="panel panel-default">
		<div class="panel-heading">
			Add Category
		</div>
			<div class="panel-body">
			   {{Form::text('newCategory','',array('placeholder'=>'Category Name','id'=>'addnewCategory' ,'class'=>'form-control'))}}
			   <br>
			   {{Form::submit('Add Category', array('class'=>'btn btn-primary pull-right','id'=>'btn_addCateg'))}}
			</div>
		</div>
<script type="text/javascript">
	var categexists=$('<span style="color:red">Category already exists</span>');

		$('#addnewCategory').blur(function(){
			$.ajax({
						type: 'get',
						data: 'check_name='+$(this).val(),
						url: 'checkcateg',
						dataType:'json',
						}).done(function(result){
							var isexits = result.original.exits;
							if(isexits){
								$('#addnewCategory').after(categexists);
							}
							else{
								$('#addnewCategory').after(categexists);
								$('#btn_addCateg').addClass('disabled');
							}
						});
						
		});

		$('#addnewCategory').focus(function(){
			categexists.remove();
			$('#btn_addCateg').removeClass('disabled');

		});

</script>


		{{Form::close()}}

	</div>
@endsection