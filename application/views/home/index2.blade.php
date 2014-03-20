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



<table class="table table-hover table-striped">
	<?php 
		$items=Stock::all('asc');
	 ?>
			<thead>
				<tr>
					<th>Item</th>
					<th>Quantity</th>
					<th>Rate</th>
					<th>Total</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
					
						{{Form::text('saleItem1','',array('placeholder'=>'' ,'autocomplete'=>'off', 'id'=>'saleItem1' ,'class'=>'form-control'))}}
						
						<script type="text/javascript">
						$('#saleItem1').typeahead([
						{
							name: 'saleItem1',
							remote: 'suggestitems.php?query=%QUERY'
						}
						]);

						
						</script>

					

					</td>
					<td>
						{{Form::text('saleQty1','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control hsum'))}}
					</td>
					<td>
						{{Form::text('saleRate1','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control hsum'))}}
					</td>
					<td>
						{{Form::text('saleTotal1','',array('span id'=>'subtt', 'placeholder'=>'' ,'id'=>'subtt' ,'class'=>'form-control'))}}
					</td>
				</tr>
				<tr>
					<td>
						{{Form::text('saleItem2','',array('placeholder'=>'' ,'autocomplete'=>'off', 'id'=>'saleItem2' ,'class'=>'form-control'))}}
						
						<script type="text/javascript">
						$('#saleItem2').typeahead([
						{
							name: 'saleItem2',
							remote: 'suggestitems.php?query=%QUERY'
						}
						]);
						</script>

					</td>
					<td>


						{{Form::text('saleQty2','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control'))}}
					</td>
					<td>
						{{Form::text('saleRate2','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control'))}}

					</td>
					<td>
						{{Form::text('saleTotal2','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control'))}}
					</td>
				</tr>
				<tr>
					<td>
					
						{{Form::text('saleItem3','',array('placeholder'=>'' ,'autocomplete'=>'off', 'id'=>'saleItem3' ,'class'=>'form-control'))}}
						
						<script type="text/javascript">
						$('#saleItem3').typeahead([
						{
							name: 'saleItem3',
							remote: 'suggestitems.php?query=%QUERY'
						}
						]);
						</script>

					

					</td>
					<td>
						{{Form::text('saleQty3','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control'))}}
					</td>
					<td>
						{{Form::text('saleRate3','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control'))}}
					</td>
					<td>
						{{Form::text('saleTotal3','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control'))}}
					</td>
				</tr>
				<tr>
					<td>
					
						{{Form::text('saleItem4','',array('placeholder'=>'' ,'autocomplete'=>'off', 'id'=>'saleItem4' ,'class'=>'form-control'))}}
						
						<script type="text/javascript">
						$('#saleItem4').typeahead([
						{
							name: 'saleItem4',
							remote: 'suggestitems.php?query=%QUERY'
						}
						]);
						</script>

					

					</td>
					<td>
						{{Form::text('saleQty4','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control'))}}
					</td>
					<td>
						{{Form::text('saleRate4','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control'))}}
					</td>
					<td>
						{{Form::text('saleTotal4','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control'))}}
					</td>
				</tr>
				<tr>
					<td>
						{{Form::text('saleItem5','',array('placeholder'=>'' ,'autocomplete'=>'off', 'id'=>'saleItem5' ,'class'=>'form-control'))}}
						
						<script type="text/javascript">
						$('#saleItem5').typeahead([
						{
							name: 'saleItem5',
							remote: 'suggestitems.php?query=%QUERY'
						}
						]);
						</script>
					</td>
					<td>
						{{Form::text('saleQty5','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control'))}}
					</td>
					<td>
						{{Form::text('saleRate5','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control'))}}
					</td>
					<td>
						{{Form::text('saleTotal5','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control'))}}
					</td>
				</tr>
				<tr>
					<td>
						{{Form::text('saleItem6','',array('placeholder'=>'' ,'autocomplete'=>'off', 'id'=>'saleItem6' ,'class'=>'form-control'))}}
						
						<script type="text/javascript">
						$('#saleItem6').typeahead([
						{
							name: 'saleItem6',
							remote: 'suggestitems.php?query=%QUERY'
						}
						]);
						</script>
					</td>
					<td>
						{{Form::text('saleQty10','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control'))}}
					</td>
					<td>
						{{Form::text('saleRate10','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control'))}}
					</td>
					<td>
						{{Form::text('saleTotal10','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control'))}}
					</td>
				</tr>
				<tr>
					<td>
						{{Form::text('saleItem7','',array('placeholder'=>'' ,'autocomplete'=>'off', 'id'=>'saleItem7' ,'class'=>'form-control'))}}
						
						<script type="text/javascript">
						$('#saleItem7').typeahead([
						{
							name: 'saleItem7',
							remote: 'suggestitems.php?query=%QUERY'
						}
						]);
						</script>
					</td>
					<td>
						{{Form::text('saleQty6','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control'))}}
					</td>
					<td>
						{{Form::text('saleRate6','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control'))}}
					</td>
					<td>
						{{Form::text('saleTotal6','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control'))}}
					</td>
				</tr>
				<tr>
					<td>
						{{Form::text('saleItem8','',array('placeholder'=>'' ,'autocomplete'=>'off', 'id'=>'saleItem8' ,'class'=>'form-control'))}}
						
						<script type="text/javascript">
						$('#saleItem8').typeahead([
						{
							name: 'saleItem8',
							remote: 'suggestitems.php?query=%QUERY'
						}
						]);
						</script>
					</td>
					<td>
						{{Form::text('saleQty7','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control'))}}
					</td>
					<td>
						{{Form::text('saleRate7','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control'))}}
					</td>
					<td>
						{{Form::text('saleTotal7','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control'))}}
					</td>
				</tr>
				<tr>
					<td>
						{{Form::text('saleItem9','',array('placeholder'=>'' ,'autocomplete'=>'off', 'id'=>'saleItem9' ,'class'=>'form-control'))}}
						
						<script type="text/javascript">
						$('#saleItem9').typeahead([
						{
							name: 'saleItem9',
							remote: 'suggestitems.php?query=%QUERY'
						}
						]);
						</script>
					</td>
					<td>
						{{Form::text('saleQty8','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control'))}}
					</td>
					<td>
						{{Form::text('saleRate8','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control'))}}
					</td>
					<td>
						{{Form::text('saleTotal8','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control'))}}
					</td>
				</tr>
				<tr>
					<td>
						{{Form::text('saleItem10','',array('placeholder'=>'' ,'autocomplete'=>'off', 'id'=>'saleItem10' ,'class'=>'form-control'))}}
						
						<script type="text/javascript">
						$('#saleItem10').typeahead([
						{
							name: 'saleItem10',
							remote: 'suggestitems.php?query=%QUERY'
						}
						]);
						</script>
					</td>
					<td>
						{{Form::text('saleQty9','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control'))}}
					</td>
					<td>
						{{Form::text('saleRate9','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control'))}}
					</td>
					<td>
						{{Form::text('saleTotal9','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control'))}}
					</td>
				</tr>
				
				<tr>
					<td>
						{{Form::text('saleItem11','',array('placeholder'=>'' ,'autocomplete'=>'off', 'id'=>'saleItem11' ,'class'=>'form-control'))}}
						
						<script type="text/javascript">
						$('#saleItem11').typeahead([
						{
							name: 'saleItem11',
							remote: 'suggestitems.php?query=%QUERY'
						}
						]);
						</script>
					</td>
					<td>
						{{Form::text('saleQty11','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control'))}}
					</td>
					<td>
						{{Form::text('saleRate11','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control'))}}
					</td>
					<td>
						{{Form::text('saleTotal11','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control'))}}
					</td>
				</tr>
				<tr>
					<td>
						{{Form::text('saleItem12','',array('placeholder'=>'' ,'autocomplete'=>'off', 'id'=>'saleItem12' ,'class'=>'form-control'))}}
						
						<script type="text/javascript">
						$('#saleItem12').typeahead([
						{
							name: 'saleItem12',
							remote: 'suggestitems.php?query=%QUERY'
						}
						]);
						</script>
					</td>
					<td>
						{{Form::text('saleQty12','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control'))}}
					</td>
					<td>
						{{Form::text('saleRate12','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control'))}}
					</td>
					<td>
						{{Form::text('saleTotal12','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control'))}}
					</td>
				</tr>
				<tr>
					<td>
						{{Form::text('saleItem13','',array('placeholder'=>'' ,'autocomplete'=>'off', 'id'=>'saleItem13' ,'class'=>'form-control'))}}
						
						<script type="text/javascript">
						$('#saleItem13').typeahead([
						{
							name: 'saleItem13',
							remote: 'suggestitems.php?query=%QUERY'
						}
						]);
						</script>
					</td>
					<td>
						{{Form::text('saleQty13','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control'))}}
					</td>
					<td>
						{{Form::text('saleRate13','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control'))}}
					</td>
					<td>
						{{Form::text('saleTotal13','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control'))}}
					</td>
				</tr>
				<tr>
					<td>
						{{Form::text('saleItem14','',array('placeholder'=>'' ,'autocomplete'=>'off', 'id'=>'saleItem14' ,'class'=>'form-control'))}}
						
						<script type="text/javascript">
						$('#saleItem14').typeahead([
						{
							name: 'saleItem14',
							remote: 'suggestitems.php?query=%QUERY'
						}
						]);
						</script>
					</td>
					<td>
						{{Form::text('saleQty14','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control'))}}
					</td>
					<td>
						{{Form::text('saleRate14','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control'))}}
					</td>
					<td>
						{{Form::text('saleTotal14','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control'))}}
					</td>
				</tr>
				<tr>
					<td>
						{{Form::text('saleItem15','',array('placeholder'=>'' ,'autocomplete'=>'off', 'id'=>'saleItem15' ,'class'=>'form-control'))}}
						
						<script type="text/javascript">
						$('#saleItem15').typeahead([
						{
							name: 'saleItem15',
							remote: 'suggestitems.php?query=%QUERY'
						}
						]);
						</script>
					</td>
					<td>
						{{Form::text('saleQty15','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control'))}}
					</td>
					<td>
						{{Form::text('saleRate15','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control'))}}
					</td>
					<td>
						{{Form::text('saleTotal15','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control'))}}
					</td>
				</tr>
				<tr>
					<td>
						{{Form::text('saleItem16','',array('placeholder'=>'' ,'autocomplete'=>'off', 'id'=>'saleItem16' ,'class'=>'form-control'))}}
						
						<script type="text/javascript">
						$('#saleItem16').typeahead([
						{
							name: 'saleItem16',
							remote: 'suggestitems.php?query=%QUERY'
						}
						]);
						</script>
					</td>
					<td>
						{{Form::text('saleQty16','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control'))}}
					</td>
					<td>
						{{Form::text('saleRate16','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control'))}}
					</td>
					<td>
						{{Form::text('saleTotal16','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control'))}}
					</td>
				</tr>
				<tr>
					<td>
						{{Form::text('saleItem17','',array('placeholder'=>'' ,'autocomplete'=>'off', 'id'=>'saleItem17' ,'class'=>'form-control'))}}
						
						<script type="text/javascript">
						$('#saleItem17').typeahead([
						{
							name: 'saleItem17',
							remote: 'suggestitems.php?query=%QUERY'
						}
						]);
						</script>
					</td>
					<td>
						{{Form::text('saleQty17','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control'))}}
					</td>
					<td>
						{{Form::text('saleRate17','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control'))}}
					</td>
					<td>
						{{Form::text('saleTotal17','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control'))}}
					</td>
				</tr>
				<tr>
					<td>
						{{Form::text('saleItem18','',array('placeholder'=>'' ,'autocomplete'=>'off', 'id'=>'saleItem18' ,'class'=>'form-control'))}}
						
						<script type="text/javascript">
						$('#saleItem18').typeahead([
						{
							name: 'saleItem18',
							remote: 'suggestitems.php?query=%QUERY'
						}
						]);
						</script>
					</td>
					<td>
						{{Form::text('saleQty18','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control'))}}
					</td>
					<td>
						{{Form::text('saleRate18','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control'))}}
					</td>
					<td>
						{{Form::text('saleTotal18','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control'))}}
					</td>
				</tr>
				<tr>
					<td>
						{{Form::text('saleItem19','',array('placeholder'=>'' ,'autocomplete'=>'off', 'id'=>'saleItem19' ,'class'=>'form-control'))}}
						
						<script type="text/javascript">
						$('#saleItem19').typeahead([
						{
							name: 'saleItem19',
							remote: 'suggestitems.php?query=%QUERY'
						}
						]);
						</script>
					</td>
					<td>
						{{Form::text('saleQty19','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control'))}}
					</td>
					<td>
						{{Form::text('saleRate19','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control'))}}
					</td>
					<td>
						{{Form::text('saleTotal19','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control'))}}
					</td>
				</tr>
				<tr>
					<td>
						{{Form::text('saleItem20','',array('placeholder'=>'' ,'autocomplete'=>'off', 'id'=>'saleItem20' ,'class'=>'form-control'))}}
						
						<script type="text/javascript">
						$('#saleItem20').typeahead([
						{
							name: 'saleItem20',
							remote: 'suggestitems.php?query=%QUERY'
						}
						]);
						</script>
					</td>
					<td>
						{{Form::text('saleQty20','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control'))}}
					</td>
					<td>
						{{Form::text('saleRate20','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control'))}}
					</td>
					<td>
						{{Form::text('saleTotal20','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control'))}}
					</td>
				</tr>
				<tr>
					<td>
						{{Form::text('saleItem21','',array('placeholder'=>'' ,'autocomplete'=>'off', 'id'=>'saleItem21' ,'class'=>'form-control'))}}
						
						<script type="text/javascript">
						$('#saleItem21').typeahead([
						{
							name: 'saleItem21',
							remote: 'suggestitems.php?query=%QUERY'
						}
						]);
						</script>
					</td>
					<td>
						{{Form::text('saleQty21','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control'))}}
					</td>
					<td>
						{{Form::text('saleRate21','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control'))}}
					</td>
					<td>
						{{Form::text('saleTotal21','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control'))}}
					</td>
				</tr>
				<tr>
					<td>Discount</td>
					<td></td>
					<td></td>
					<td>
						{{Form::text('saleDiscount','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control'))}}
					</td>
				</tr>
				<tr>
					<td>Grand Total</td>
					<td></td>
					<td></td>
					<td>
						{{Form::text('saleGrandTotal','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control'))}}
					</td>
				</tr>

				<tr>
					<td>Total Paid</td>
					<td></td>
					<td></td>
					<td>
						{{Form::text('saleTotalPaid','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control'))}}
					</td>
				</tr>

				<tr>
					<td>Credit Amount</td>
					<td></td>
					<td></td>
					<td>
						{{Form::text('saleCredit','',array('placeholder'=>'' ,'id'=>'input' ,'class'=>'form-control'))}}
					</td>
				</tr>


			</tbody>
		</table>		
		{{ Form::submit('Submit Sale', array('class'=>'btn btn-primary pull-right')) }}

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