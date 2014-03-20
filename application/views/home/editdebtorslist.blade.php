@layout('home.master')

@section('content')
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<div class="panel panel-default">
		<div class="panel-heading">Debtors</div>
		<div class="panel-body">
		   <table class="table table-hover table-striped">
		   	<thead>
		   		<tr>
		   			<th>Supplier Name</th>
		   			<th>Amount Owed</th>
		   		</tr>
		   	</thead>
		   	<tbody>
		  
		   		<?php 
		   			$debtors=Supplier::where('credit','>',0)->get();
		   			foreach($debtors as $debtor):
		   				echo "<tr><td><a href='".url('/debtorslist/'.$debtor->id)."'>".$debtor->supplier_name."</td><td>".$debtor->credit."</td></tr>";
		   			endforeach;
		   		 ?>
		   	</tbody>
		   </table>
		</div>
	</div>
</div>
@endsection
@section('rightcontent')
	<div class="col-xs-18 col-sm-18 col-md-18 col-lg-18">
		<div class="panel panel-default">
		<div class="panel-heading">
			Edit Debtor
		</div>
			<div class="panel-body">
			{{Form::open('/updatedebtor','POST')}}
			{{Form::hidden('updateDebtorId',$id)}}
			{{Form::text('updateDebtorName',$debtor_name,array('placeholder'=>'Name','id'=>'input','class'=>'form-control'))}}
			<br>
			{{Form::text('updateDebtorOwed',$debtor_owed,array('placeholder'=>'Credit','id'=>'input','class'=>'form-control'))}}
			<br>
			{{Form::submit('Update',array('class'=>'btn btn-primary pull-right'))}}
			{{Form::close()}}
			</div>
			
		</div>
	</div>
@endsection