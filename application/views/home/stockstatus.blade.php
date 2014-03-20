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