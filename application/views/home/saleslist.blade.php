@layout('home.master')

@section('content')
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	{{Form::open('/updatesales','POST')}}
	
	<div class="panel panel-default">
	
	<div class="panel-heading">Sale Record</div>
		<div class="panel-body">
		   {{Form::text('updateSaleCustomer','',array('placeholder'=>'Name','id'=>'input','class'=>'form-control','disabled'))}}
		   <br>
		   {{Form::text('updateSaleTotalCost','',array('placeholder'=>'Total Cost','id'=>'input','class'=>'form-control','disabled'))}}
		   <br>
		   {{Form::text('updateSaleTotalPaid','',array('placeholder'=>'Total Paid','id'=>'input','class'=>'form-control','disabled'))}}
		   <br>
		   {{Form::text('updateSaleDiscount','',array('placeholder'=>'Discount','id'=>'input','class'=>'form-control','disabled'))}}
		   <br>
		   {{Form::text('updateSaleCredit','',array('placeholder'=>'Credit','id'=>'input','class'=>'form-control','disabled'))}}
		   <br>
		   <!-- {{Form::submit('Update',array('class'=>'btn btn-primary pull-right'))}} -->

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
		{{Form::open('/editsales','POST')}}

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