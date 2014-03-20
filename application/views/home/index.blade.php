@layout('home.master')

@section('extrajs')
 <script type="text/javascript">
	$(function(){
		$('#custSearch').focus();
	});
</script>

@endsection

@section('headmsg')
	@if(Session::has('flash_notice'))
	<div class="alert alert-success" id="flash_notice">
		{{Session::get('flash_notice')}}

	</div>
@endif

<script type='text/javascript'>
	var rowNum = 0;
	function addRow(frm) {
	rowNum++;
	var row = '<tr id="rowNum'+rowNum+'"><td><input type="text" class="form-control"  size="54"  id="tahead" name="name[]" value="'+frm.add_name.value+'"> </td><td><input type="text" class="form-control"   size="5"  name="qty[]" value="'+frm.add_qty.value+'"> </td><td></td><td> <input type="text" class="form-control"  size="8"   name="rate[]" value="'+frm.add_rate.value+'"> </td><td> <input type="text" class="form-control"   size="8"  name="total[]" value="'+frm.add_total.value+'"> </td><td><button type="button" class="btn btn-xs btn-danger" onclick="removeRow('+rowNum+');">  <span class="glyphicon glyphicon-trash"></span></button></td></tr>';
	$('#qtycounter').val(99);
	$("#maintable tr:nth-child(2)").before(row);
		frm.add_qty.value = '';
		frm.add_name.value = '';
		frm.add_rate.value = '';
		frm.add_total.value = '';
		$("#add_name").focus();
	}


	function removeRow(rnum) {
		jQuery('#rowNum'+rnum).remove();
	}

					
						

</script>
<!--
				<td>
					<div id="itemRows">

						<input type="text" name="add_qty" size="4" /> 
						<input type="text" name="add_name" /> 
						<input type="text" name="add_rate" /> 
						<input type="text" name="add_total" /> 
						<input onclick="addRow(this.form);" type="button" value="Add row" />

					</div>
				</td>
-->
@endsection

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">New Sale</div>
		<div class="panel-body">

		{{Form::open('/createsales','POST')}}
		

		 <input type='text' name='custSearch' id='custSearch' autocomplete="off" placeholder='Enter Customer Name' class='form-control'> 
	<script type="text/javascript">
		$('#custSearch').typeahead([
		{
			name: 'custSearchResult',
			remote: 'suggestcust.php?query=%QUERY',
			header: '<h4>Customer</h4>'
		}
		]);
		</script>


<table class="table table-hover table-striped" id='maintable'>
	<?php 
		$items=Stock::all('asc');
	 ?>
			<thead>
				<tr>
					<th>Item</th>
					<th>Quantity</th>
					<th></th>
					<th>Rate</th>
					<th>Total</th>
					<th></th>
				</tr>
			</thead>
			<div id="itemRows">

			<tbody>
			<tr>
				
			</tr>
			<tr>
				
					

						<td><input type="text" name="saleadd_name" id="add_name" size="54" class='form-control'/> </td>
						<td><input type="text" name="saleadd_qty"  id="add_qty" size="5"  class='form-control' /> </td>
						<td><table border="0"><tr><td><input type='hidden' id='stockavailable'><input type="text" name="stocksavail" id="stockavail_id" size="1" class='form-control' disabled="disabled" /></td></tr></table></td>
						<td><input type="text" name="saleadd_rate"  id="add_rate" size="8" class='form-control' /> </td>
						<td><input type="text" name="saleadd_total" id="add_total"  size="8" class='form-control' /> 
						<input type='hidden' name='qtycounter' id='qtycounter' />
						</td>
						<td>
						<button type="button" class="btn btn-xs btn-success"  onclick="addRow(this.form);">
  							<span class="glyphicon glyphicon-plus"></span>
						</button>
						<!-- <input onclick="addRow(this.form);" type="button" value="Add row" class='btn btn-primary' /> -->
					</td>
			</tr>

						<script type="text/javascript">
						$('#add_name').typeahead([
							{
								name: 'add_name',
								remote: 'suggestitems.php?query=%QUERY'
							}
							]);			
						</script>

						<script type="text/javascript">
							$('#add_name').blur(function(){
								$.ajax({
									type: 'get',
									data: 'add_name='+$(this).val(),
									url: 'getitemprice',
									dataType:'json',
								}).done(function(result){
									var owed = parseFloat(result.original.sp);
									$('#add_rate').val(owed.toFixed(2));
									$('#stockavail_id').val(result.original.quantity);
									$('#stockavailable').val(result.original.quantity);
								});
							
							});
						</script>

				<tr>
					<td colspan="4">Grand Total</td>
					<td>
						{{Form::text('saleGrandTotal','',array('placeholder'=>'' ,'id'=>'add_grandtotal' ,'class'=>'form-control'))}}
					</td>
				</tr>

				<tr>
					<td colspan="4">Discount</td>
					
					<td>
						{{Form::text('saleDiscount','',array('placeholder'=>'' ,'id'=>'add_discount' ,'class'=>'form-control'))}}
					</td>
				</tr>
				
				<tr>
					<td colspan="4">Total Owed</td>
					<td>
						{{Form::text('saleTotalOwed','',array('placeholder'=>'' ,'id'=>'add_totalowed' ,'class'=>'form-control'))}}
					</td>
				</tr>

				<tr>
					<td colspan="4">Total Paid</td>
					<td>
						{{Form::text('saleTotalPaid','',array('placeholder'=>'' ,'id'=>'add_paid' ,'class'=>'form-control'))}}
					</td>
				</tr>

				<tr>
					<td colspan="4">Credit Amount</td>
					<td>
						{{Form::text('saleCredit','',array('placeholder'=>'' ,'id'=>'add_credit' ,'class'=>'form-control'))}}
					</td>
				</tr>

				
					<script type="text/javascript">
						$(function () {
							$('#add_qty').keyup(function() {
								updateTotal();
							});

							$('#add_qty').blur(function(){
								checkenough();
							});

							
							$('#add_rate').keyup(function() {
								updateTotal();
							});

							$('#add_discount').keyup(function() {
								updateOwed();
								
							});

							$('#add_paid').blur(function(){
								updateCredit();
							});
							
							$('#add_grandtotal').blur(function(){
								$('#add_discount').val(0);
							});


							
						var grandtotal=0;
						var totalowed=0;
						var totalcredit=0;
						var notenough=$('<span style="color:red">Not Enough items in stock</span>');


						var updateTotal=function(){
							// var input1=parseInt($('#add_qty').val());
							// var input2=parseInt($('#add_rate').val());


							var input1=parseFloat($('#add_qty').val());
							var input2=parseFloat($('#add_rate').val());


							if(isNaN(input1)||isNaN(input2)){
								if(!input2){
									$('#add_total').val($('#add_qty').val());
								}
								if(!input1){
									$('#add_total').val($('add_rate').val());
								}
							}
								else{
									var subtotal = parseFloat(input1 * input2);
									$('#add_total').val(subtotal.toFixed(2));
									updateGrandTotal();
								}
							
						};
						$('#add_qty').focus(function(){
								$('#btn_sumbmitsale').removeClass('disabled');
								notenough.remove();
							});
						
						var updateGrandTotal=function(){
								grandtotal = parseFloat(grandtotal) + parseFloat($('#add_total').val());
								$('#add_grandtotal').val(grandtotal.toFixed(2));
								// document.write(grandtotal);
						}

						var checkenough=function(){
							if(($('#add_qty').val()) > ($('#stockavailable').val())) {
								// $('#add_qty').after(notenough);
								// $('#btn_sumbmitsale').addClass('disabled');
							}
							else{
								// $('#add_qty').after($('#add_qty').val());
							}

						}


						var updateOwed=function(){
							 	totalowed = parseFloat($('#add_grandtotal').val()) - parseFloat($('#add_discount').val());
								$('#add_totalowed').val(totalowed.toFixed(2));
						}

						var updateCredit=function(){
								totalcredit= parseFloat($('#add_totalowed').val()) - parseFloat($('#add_paid').val());
								$('#add_credit').val(totalcredit.toFixed(2));
						}

						});

					</script>

						

			</tbody>
			</div>

		</table>		
					
		{{ Form::submit('Submit Sale', array('class'=>'btn btn-primary pull-right','id'=>'btn_sumbmitsale')) }}

		{{Form::close()}}
		</div>
		<div class="panel-footer"></div>
	</div>
@endsection

@section('rightcontent')
	<div class="panel panel-default">
	<div class="panel-heading">
		Welcome
	</div>
		<div class="panel-body ">
			<?php 
				echo "Date : ".date("d/m/Y D");
			 ?>
		</div>
	</div>


	<div class="panel panel-default">
	<div class="panel-heading" style='color:#dd0000;'>
		Low Stock Notice
	</div>
		<div class="panel-body">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Item</th>
					<th>Qty.</th>
				</tr>
			</thead>
			<tbody>
		<?php 
			$lowstocks=Stock::where('threshold', '>', DB::raw("`quantity`"))->paginate(3);
			foreach($lowstocks->results as $lowstock):
				echo "<tr><td>".$lowstock->item_name."</td><td>".$lowstock->quantity."</td></tr>";
			endforeach;
		 ?>
		 </tbody>
		</table>
		<?php 
				echo $lowstocks->links();

		 ?>
		</div>
	</div>
@endsection

@section('footer')
Sunday Closed Hardware Store
@endsection