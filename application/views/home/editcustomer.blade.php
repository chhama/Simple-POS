@layout('home.master')
@section('extrajs')
<script type="text/javascript">
	$(function() {
            $("#newCustomerName").focus();
        });
</script>
@endsection
@section('content')
	{{ Form::open('/createcustomer','POST')}}
 <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
 	<div class="panel panel-default">
 		<div class="panel-heading">
Add New Customer
		</div>
	<div class="panel-body">
		{{Form::text('newCustomerName','',array('placeholder'=>'Name','id'=>'input' ,'class'=>'form-control','disabled'=>'disabled'))}}
		<br>
		{{Form::textarea('newCustomerAddr','',array('placeholder'=>'Address' ,'id'=>'input' ,'class'=>'form-control','disabled'=>'disabled'))}}
		<br>
		{{Form::text('newCustomerPhone','',array('placeholder'=>'Phone Number' ,'id'=>'input' ,'class'=>'form-control','disabled'=>'disabled'))}}
		<br>
		{{ Form::submit('Create Customer', array('class'=>'btn btn-primary pull-right','disabled'=>'disabled')) }}
	</div>
	<div class="panel-footer"></div>
</div>
</div>	
{{Form::close()}}
<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
	<div class="panel panel-default">
	<div class="panel-heading">Existing Customers</div>
		<div class="panel-body">
		<?php 
		
		echo "<table class='table table-striped table-hover'>
			<tbody>";
			
				
		$customers=DB::table('customers')->paginate(7);
				
			foreach ($customers->results as $customer):
     			echo "<tr><td>".$customer->name."</td>
     			<td> 
				   	<a class='btn btn-success btn-sm' href='".url('managecustomer/' . $customer->id)."'>Edit</a></td>

     			</td>
     			<td>    <a class='btn btn-sm btn-danger pull-right' onClick=\"return confirm('Delete customer?');\" href='".url('deletecust/'.$customer->id)."' >Delete</a></td>

				</tr>"; 
    		endforeach;
		echo "</table>";
		
		echo $customers->links();

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
	<div class="panel-heading">Edit Customer</div>
		<div class="panel-body">
			{{Form::open('/updatecustomer','POST')}}
			{{Form::hidden('updateCustomerId',$id,array('placeholder'=>'ID','id'=>'input' ,'class'=>'form-control'))}}

			{{Form::text('updateCustomerName',$cust_name,array('placeholder'=>'Name','id'=>'input' ,'class'=>'form-control'))}}
			<br>
			{{Form::textarea('updateCustomerAddr',$cust_addr,array('placeholder'=>'Address' ,'id'=>'input' ,'class'=>'form-control'))}}
			<br>
			{{Form::text('updateCustomerPhone',$cust_phone,array('placeholder'=>'Phone Number' ,'id'=>'input' ,'class'=>'form-control'))}}
			<br>
			{{Form::text('updateCustomerCredit',$cust_owed,array('placeholder'=>'Owed' ,'id'=>'input' ,'class'=>'form-control'))}}
			<br>
			{{ Form::submit('Update', array('class'=>'btn btn-primary pull-right')) }}
			{{Form::close()}}
		</div>
	<div class="panel-footer"></div>
	</div>
</div>
@endsection