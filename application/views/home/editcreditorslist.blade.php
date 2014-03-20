@layout('home.master')

@section('content')
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">Creditors</div>
		<div class="panel-body">
		   <table class="table table-hover table-striped">
		   	<thead>
		   		<tr>
		   			<th>Customer Name</th>
		   			<th>Amount Owed</th>
		   		</tr>
		   	</thead>
		   	<tbody>
		  
		   		<?php 
		   			$creditors=Customer::where('owed','>',0)->get();
		   			foreach($creditors as $creditor):
		   				echo "<tr><td><a href='".url('/creditorslist/'.$creditor->id)."'>" .$creditor->name."</td><td>".$creditor->owed."</td></tr>";
		   			endforeach;
		   		 ?>
		   	</tbody>
		   </table>
		</div>
	</div>
</div>
@endsection
@section('rightcontent')
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">Edit Creditor</div>
			<div class="panel-body">
			{{Form::open('/updatecreditor','POST')}}
			{{Form::hidden('editCreditorId',$id)}}
			{{Form::text('editCreditorName',$creditor_name,array('placeholder'=>'Name','id'=>'input' ,'class'=>'form-control'))}}
			<br>
			<input type='hidden' value=<?php echo $creditor_owed; ?> name='editCreditorOwed'>
			{{Form::text('editCreditorOwedDis',$creditor_owed,array('placeholder'=>'Credit','id'=>'input' ,'class'=>'form-control','disabled'=>'disabled'))}}
			<br>
			{{Form::text('editCreditorDiscount','',array('placeholder'=>'Discount','id'=>'editCreditorDiscount' ,'class'=>'form-control'))}}

			<br>
			{{ Form::submit('Update', array('class'=>'btn btn-primary pull-right')) }}


			{{Form::close()}}

			</div>
		</div>
	</div>
@endsection