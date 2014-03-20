@layout('home.master')

@section('extrajs')


@endsection

@section('content')
<div id="flot-placeholder" style="width:800px;height:450px"></div>
<?php  

	$host = "localhost";
	$uname = "root";
	$pass = "zakth3il0";
	$database = "dagal";

	$connection=mysql_connect($host,$uname,$pass) or die("connection in not ready <br>");
	$result=mysql_select_db($database) or die("database cannot be selected <br>");

	$sql = mysql_query ("SELECT * FROM dailysales");
	$lineset=array();
	
   	while($lrow = mysql_fetch_assoc($sql)) 
 	{
    	$lineset[] = array($lrow['quantity'],$lrow['paid']);
	}


?>

<script language="javascript">
var plotdata =  <?php echo json_encode($lineset);?>;

var data,options;
data=[plotdata];
//data=[[[1,2],[2,6],[3,9],[4,2]]];
 
document.write(plotdata);
options={
	series:{
		label:'y=3'
	}
};
    $(document).ready(function () {
       $.plot($("#flot-placeholder"),
    	data,
    	options);
    });
</script>
@endsection

@section('rightcontent')
<div class="panel panel-default">
	<div class="panel-heading">
		Filter report
	</div>
	<div class="panel-body">
		{{Form::open('/showreport','POST')}}

		From
		<div class="input-group">
			<input type="text" name="datepickerFrom" id="inputDatepickerFrom" class="form-control datepicker"  required="required"  title="">
			<span class='input-group-addon'><span class="glyphicon glyphicon-calendar"></span></span>
		</div>
		To
		<div class="input-group">
			<input type="text" name="datepickerTo" id="inputDatepickerTo" class="form-control datepicker"  required="required" title="">
			<span class='input-group-addon'><span class="glyphicon glyphicon-calendar"></span></span>
		</div>

Category
		<div class="input-group">
			<input type='text' name='reportcategory' id='reportcategory' class='form-control' required='no' value="">
			<span class='input-group-addon'>
				<span class='glyphicon glyphicon-tag'></span>
			</span>
		</div>
		<script type="text/javascript">
			$('#reportcategory').typeahead([
			{
				name: 'reportcategory',
				remote: 'suggestcategory.php?query=%QUERY'
			}
			]);
		</script>



Item
		<div class="input-group">
			<input type='text' name='reportitem' id='reportitem' class='form-control' required='no' value="">
			<span class='input-group-addon'>
				<span class='glyphicon glyphicon-wrench'></span>
			</span>
		</div>

		<script type="text/javascript">
			$('#reportitem').typeahead([
			{
				name: 'reportitem',
				remote: 'suggestitems.php?query=%QUERY'
			}
			]);
		</script>				

Customer
		<div class="input-group">
			<input type='text' name='reportcustomer' id='reportcustomer' class='form-control' required='no' value="">
			<span class='input-group-addon'>
				<span class='glyphicon glyphicon-user'></span>
			</span>
		</div>
		<script type="text/javascript">
		$('#reportcustomer').typeahead([
		{
			name: 'custSearchResult',
			remote: 'suggestcust.php?query=%QUERY',
			header: '<h4>Customer</h4>'
		}
		]);
		</script>


<br>
		{{ Form::submit('Show report', array('class'=>'btn btn-primary pull-right')) }}

		{{Form::close()}}
	</div>
</div>
	<script language='javascript'>
		$('.datepicker').datepicker();
	</script>



@endsection