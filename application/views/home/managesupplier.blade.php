@layout('home.master')
@section('extrajs')
<script type="text/javascript">
	$(function() {
            $("#newSupplierName").focus();
        });
</script>
@endsection
@section('content')
{{ Form::open('/createsupplier','POST')}}
 <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
 	<div class="panel panel-default">
 		<div class="panel-heading">
Add New Supplier
		</div>
	<div class="panel-body">
		{{Form::text('newSupplierName','',array('placeholder'=>'Name','id'=>'newSupplierName' ,'class'=>'form-control'))}}
		<br>
		{{Form::textarea('newSupplierAddr','',array('placeholder'=>'Address' ,'id'=>'input' ,'class'=>'form-control'))}}
		<br>
		{{Form::text('newSupplierPhone','',array('placeholder'=>'Phone Number' ,'id'=>'input' ,'class'=>'form-control'))}}
		<br>
		{{Form::text('newSupplierCredit','',array('placeholder'=>'Credit' ,'id'=>'input' ,'class'=>'form-control'))}}
		<br>
		{{ Form::submit('Create Supplier', array('class'=>'btn btn-primary pull-right','id'=>'btn_addsupp')) }}
	</div>
	<div class="panel-footer"></div>
</div>
</div>	

<script type="text/javascript">
	var suppexists=$('<span style="color:red">Supplier already exists</span>');

		$('#newSupplierName').blur(function(){
			$.ajax({
						type: 'get',
						data: 'check_name='+$(this).val(),
						url: 'checksupp',
						dataType:'json',
						}).done(function(result){
							var isexits = result.original.exits;
							if(isexits){
								$('#newSupplierName').after(suppexists);
							}
							else{
								$('#newSupplierName').after(suppexists);
								$('#btn_addsupp').addClass('disabled');
							}
						});
						
		});

		$('#newSupplierName').focus(function(){
			suppexists.remove();
			$('#btn_addsupp').removeClass('disabled');

		});

</script>
{{Form::close()}}
<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">

	<div class="panel panel-default">
	<div class="panel-heading">Existing Suppliers</div>
		<div class="panel-body">
		<?php 
		
		echo "<table class='table table-striped table-hover'>
			<tbody>";
		
				
		$suppliers=DB::table('suppliers')->paginate(7);
				
			foreach ($suppliers->results as $supplier):
     			echo "<tr><td>".$supplier->supplier_name."</td>
     			<td>
     			<a class='btn btn-success btn-sm' href='".url('managesupplier/' . $supplier->id)."'>Edit</a></td>
     			<td>
     			<a class='btn btn-sm btn-danger pull-right' onClick=\"return confirm('Delete This account?');\" href='".url('deletesupplier/'.$supplier->id)."' >Delete</a></td>
				</tr>"; 
    		endforeach;
		echo "</table>";
		
		echo $suppliers->links();

		/*$allCustomers=Customer::paginate(5);
		foreach ($allCustomers as $customer):
				echo $customer->name;
		endforeach;

			echo $allCustomers->links();*/
		 ?>
		</div>
		<div class="panel-footer"></div>
	</div>
</div>
@endsection

@section('rightcontent')
<div class="col-xs-22 col-sm-22 col-md-22 col-lg-22">
	<div class="panel panel-default">
	<div class="panel-heading">Edit Supplier</div>
		<div class="panel-body">
			{{Form::open('/updatesupplier','POST')}}
			{{Form::text('updateSupplierName','',array('placeholder'=>'Name','id'=>'input' ,'class'=>'form-control'))}}
			<br>
			{{Form::textarea('updateSupplierAddr','',array('placeholder'=>'Address' ,'id'=>'input' ,'class'=>'form-control'))}}
			<br>
			{{Form::text('updateSupplierPhone','',array('placeholder'=>'Phone Number' ,'id'=>'input' ,'class'=>'form-control'))}}
			<br>
			{{Form::text('updateSupplierOwed','',array('placeholder'=>'Owed' ,'id'=>'input' ,'class'=>'form-control'))}}
			<br>
			{{ Form::submit('Update', array('class'=>'btn btn-primary pull-right')) }}
			{{Form::close()}}
		</div>
	<div class="panel-footer"></div>
	</div>
</div>
@endsection