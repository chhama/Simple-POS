<html>
<title>Cash Memo</title>
<head>
		<script src="../js/jquery.js"></script>
<link href="../css/bootstrap.css" rel="stylesheet" media="screen">
	<script type="text/javascript">
	function printmemo(){
var prtContent = document.getElementById("printarea");
var WinPrint = window.open('', '', 'letf=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
WinPrint.document.write(prtContent.innerHTML);
WinPrint.document.close();
WinPrint.focus();
WinPrint.print();
WinPrint.close();
}
	</script>

</head>
<body>

<div id='printarea'>
<table width='400' align="center" id='outprint'>
<tr valign="middle">
<td>
	<h4 align="center">Cash/Credit Memo</h4>
	<h1 align="center">Sunday Closed</h1>
	<h3 align="center">Durtlang Leitan</h3><hr>
	<?php 	$memo=Sale::find($id); ?>
	<table class="table table-hover" border="0">
		
		<tbody>
			<tr><td>Memo No. </td><td><?php echo $id; ?></td></tr>
			<tr>
			
				<td><h4>Customer:</h4></td>
				<td><h4><?php echo $memo->customer_name; ?></h4></td>
			
			</tr>
		</tbody>
	</table>

	<table class="table table-hover" border='1' width="100%" cellpadding="4">
		<thead>
		<th>Item</th>
		<th>Quantity</th>
		<th>Rate</th>
		<th>Subtotal</th>
		</thead>
		<tbody>

		<?php 
			for($i=1;$i<22;$i++){
					 $itemnum="item".$i;
					 $itemqty="item".$i."_qty";
					$itemrate="item".$i."_rate";
					//dd($saleitems);
					 if($memo->$itemqty!='0')
					 	echo "<tr><td>".$memo->$itemnum."</td><td align='center'>".$memo->$itemqty."</td><td align='center'>".$memo->$itemrate."</td><td align='right'>".number_format($memo->$itemqty*$memo->$itemrate,2). "</td></tr>";
				
				}
?>
	<tr>
		<td colspan="3">Grand Total</td>
		<td align='right'><?php echo number_format($memo->total_cost,2); ?></td>
	</tr>
	<tr>
		<td colspan="3">Discount</td>
		<td align='right'><?php echo number_format($memo->discount,2); ?></td>
	</tr>
	<tr>
		<td colspan="3">Total Owed</td>
		<td align='right'><?php echo number_format(($memo->total_cost - $memo->discount),2); ?></td>
	</tr>
	<tr>
		<td colspan="3">Amount Paid</td>
		<td align='right'><?php echo number_format($memo->total_paid,2); ?></td>
	</tr>
	<tr>
		<td colspan="3">Amount Owed</td>
		<td align='right'><?php echo number_format($memo->credit,2); ?></td>
	</tr>
		</tbody>
	</table>
	<br>
	<br>
	<br>
	<br>
	<br>
	<br><br>
	<table width="100%">
				<tr>
			<td width="100">Date :</td><td><hr></td></tr>
			<tr><td>
			<?php echo date('d-m-Y'); ?></td><td align="center">
	Signature </td></tr>
	</table>
	</td>
	</tr>
	</table>
	</div>
	<br>
	<br>
	<center>
	<table><tr><td>
	<a class='btn btn-info' id='printMe' onClick="printmemo()" align="right">Print Memo</a>
</td></tr></table>
<br>
<br>
<br>
<br>
	</body>
	</html>
 