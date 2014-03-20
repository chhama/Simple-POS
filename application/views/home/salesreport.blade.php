@layout('home.master') 
  
@section('extrajs') 
  
  
@endsection 
  
@section('content') 
@section('headmsg') 
Sales Report for <?php echo date('d-m-Y'); ?> 
@endsection 
<div id="flot-placeholder" style="width:800px;height:500px"></div> 
<?php   
  
    $host = "localhost"; 
    $uname = "root"; 
    $pass = "zakth3il0"; 
    $database = "dagal"; 
  
    $connection=mysql_connect($host,$uname,$pass) or die("connection in not ready <br>"); 
    $result=mysql_select_db($database) or die("database cannot be selected <br>"); 
  	$today=date('Y-m-d');
  	
  	$jsonpaid=array(); 
    $jsoncredit=array(); 
    $jsonprofit=array(); 
    


    $sql=mysql_query("select sum(total_paid) from sales where created_at between '$today' and '$today 23:59:59'"); 
    while($lrow = mysql_fetch_array($sql))  
    { 
        $sumpaid = $lrow['sum(total_paid)'];   
    } 
    

    $sql=mysql_query("select sum(credit) from sales where created_at between '$today' and '$today 23:59:59'"); 
    while($lrow = mysql_fetch_array($sql))  
    { 
        $sumcredit = $lrow['sum(credit)'];   
	} 

    $sql=mysql_query("select sum(total_paid) from dailypurchases where purchase_date='$today'");
    while($lrow = mysql_fetch_array($sql))
    {
    	$purchasepaid = $lrow['sum(total_paid)'];
    }

    $sql=mysql_query("select sum(total_cost) from dailypurchases where purchase_date='$today'");
    while($lrow = mysql_fetch_array($sql))
    {
    	$purchasecost = $lrow['sum(total_cost)'];
    }

    $sql=mysql_query("select sum(discount) from sales where created_at between '$today' and '$today 23:59:59'"); 
    while($lrow = mysql_fetch_array($sql))  
    { 
        $totaldiscount = $lrow['sum(discount)'];   
    } 
    

   	$sql=mysql_query("select sum(total_credit) from dailypurchases where purchase_date='$today'");
    while($lrow = mysql_fetch_array($sql))
    {
    	$purchasecredit = $lrow['sum(total_credit)'];
    }


    $sql=mysql_query("select sum(sp) from dailysales where sale_date='$today'");
    while($lrow = mysql_fetch_array($sql))
    {
        $totalsp = $lrow['sum(sp)'];
    }

    $sql=mysql_query("select sum(cp) from dailysales where sale_date='$today'");
    while($lrow = mysql_fetch_array($sql))
    {
        $totalcp = $lrow['sum(cp)'];
    }
    // $lineset[] = array('[[1,'.$sumpaid.'],[2,'.$sumcredit.'],[3,'.($sumpaid-$sumcredit).']]'); 
  
    $jsonpaid[] = array($sumpaid); 
    $jsoncredit[]=array($sumcredit); 
    $jsonprofit[]=array($sumpaid-$sumcredit);
    $jsonpurchasepaid[]=array($purchasepaid); 
    $jsonpurchasecost[]=array($purchasecost);
    $jsonpurcasecredit[]=array($purchasecredit);
    $jsontotalsales[]=array($sumpaid+$sumcredit+$totaldiscount);
    $jsontotalsp[]=array($totalsp);
    $jsontotalcp[]=array($totalcp);
    $jsonnetprofit[]=array($totalsp-$totalcp-$totaldiscount);
    $jsonactualprofit[]=array(($totalsp-$totalcp-$totaldiscount)-($purchasepaid+$purchasecredit));
?> 
  	   
<script language="javascript"> 
 // var plotdata = [[1,6900.00]]; 
   
  
 var options; 
// document.write(plotdata); 
var data=[[1,<?php echo json_encode($jsonpaid);?>]]; 
var data2=[[2,<?php echo json_encode($jsoncredit);?>]]; 
var data3=[[3,<?php echo json_encode($jsontotalsales); ?> ]];
var data4=[[4,<?php echo json_encode($jsonprofit);?>]];
var data5=[[5,<?php echo json_encode($jsonpurchasecost); ?>]]; 
var data6=[[6,<?php echo json_encode($jsonpurcasecredit); ?>]]; 
var data7=[[7,<?php echo json_encode($jsonpurchasepaid); ?>]]; 
var data8=[[8,<?php echo json_encode($jsontotalsp); ?>]];
var data9=[[9,<?php echo json_encode($jsontotalcp); ?>]];
var data10=[[10,<?php echo json_encode($jsonnetprofit); ?>]]
var data11=[[11,<?php echo json_encode($jsonactualprofit); ?>]]

var dataset=[ 
    { 
        label: "Sales on Payment", 
        data:data
    }, 
    { 
        label:"Sales on Credit", 
        data:data2 
    }, 
    
    {
        label:"Total Sales",
        data:data3
    },
    { 
        label:"Sales Profit", 
        data:data4
    },
    {
    	label:"Total Purchases",
    	data:data5
    },
    {
    	label:"Purchases on Credit",
    	data:data6
    },
    {
        label:"Purchases on Payment",
        data:data7
    }, 
    {
        label:"Total Sale Price",
        data:data8
    },
    {
        label:"Total Cost Price",
        data:data9
    },
    {
        label:"Net Profit",
        data:data10
    },
    {
        label:"Actual Profit",
        data:data11
    }

] 
var options = { 
    // data:{ 
    //  label:"one", 
    //  label:"two", 
    //  label:"three" 
    // } 
    series: { 
          
        points: { show: false }, 
        lines: { show: false }, 
        bars: {show:true, barWidth:0.6} 
    }, 
    legend: {
        show: true,
        position: "sw",
        backgroundOpacity: 0.5,
        margin: 1,
        noColumns: 6
    }
 };  
 $(document).ready(function () { 
   $.plot($("#flot-placeholder"), 
            dataset, 
    options); 
}); 
</script> 


  
<div class="panel panel-default">
<div class="panel-heading">
	Daily Transaction Status
</div>
	<div class="panel-body">
<table class="table table-hover table-striped ">
	
	<tbody>
        <tr>
            <td colspan=2><b>SALES</b></td>
        </tr>
        <tr>
            <td>Sales on payment</td>
            <td class='text-right'><?php echo number_format($sumpaid,2);?></td>
        </tr>
        <tr> 
            <td>Sales on Credit</td>
            <td class='text-right'><?php echo number_format($sumcredit,2); ?></td>
        </tr>
        <tr>
            <td>Discount</td>
            <td class='text-right'><?php echo number_format($totaldiscount,2); ?></td>
        </tr>
        <tr>
            <td>Total Sales</td>
            <td class='text-right'><?php echo number_format(($sumpaid+$sumcredit+$totaldiscount),2); ?></td>
        </tr>
        <tr>
            <td>Gross Profit from Sales</td>
            <td class='text-right'><?php echo number_format(($sumpaid-$sumcredit),2); ?></td>
        </tr>
        <tr>
            <td colspan=2><b>PURCHASES</b></td>
        </tr>
        <tr>
            <td>Purchases on payment</td>
            <td class='text-right'><?php echo number_format($purchasepaid,2); ?></td>
        </tr>
        <tr>
            <td>Purchases on credit</td>
            <td class='text-right'><?php echo number_format($purchasecredit,2); ?></td>
        </tr>
        <tr>
            <td>Total Purchases</td>
            <td class='text-right'><?php echo number_format(($purchasepaid+$purchasecredit),2); ?></td>
        </tr>
        <tr>
            <td colspan=2><b>NET PROFIT</b></td>
        </tr>
        <tr>
            <td>Total SP</td>
            <td class='text-right'><?php echo number_format(($totalsp),2); ?></td>
        </tr>
        <tr>
            <td>Total CP</td>
            <td class='text-right'><?php echo number_format(($totalcp),2); ?></td>
        </tr>
        <tr>
            <td>Net Profit after discount</td>
            <td class='text-right'><?php echo number_format(($totalsp-$totalcp-$totaldiscount),2); ?></td>
        </tr>
        <tr>
            <td><strong>Actual Profit/Loss (Net Profit - Purchases)</strong></td>
            
            <?php 
                $actualprofit=($totalsp-$totalcp-$totaldiscount)-($purchasepaid+$purchasecredit);
                if($actualprofit<0)
                    echo "<td class='text-right danger'><font color=red><strong>".number_format($actualprofit,2); 
                else
                    echo "<td class='text-right'><strong>".number_format($actualprofit,2);
            ?>

        </strong></td>
        </tr>
    </tbody>
</table>

	</div>
</div>
@endsection 
  
@section('rightcontent') 
<div class="panel panel-default"> 
    <div class="panel-heading"> 
        Report by Date
    </div> 
    <div class="panel-body"> 
        {{Form::open('showreport','POST')}} 

  
        From 
        <div class="input-group"> 
            <input type="text" name="datepickerFrom" id="inputDatepickerFrom" class="form-control datepicker" data-date-format="yyyy-mm-dd" required="required"  title=""> 
            <span class='input-group-addon'><span class="glyphicon glyphicon-calendar"></span></span> 
        </div> 
        To 
        <div class="input-group"> 
            <input type="text" name="datepickerTo" id="inputDatepickerTo" class="form-control datepicker"  data-date-format="yyyy-mm-dd" required="required" title=""> 
            <span class='input-group-addon'><span class="glyphicon glyphicon-calendar"></span></span> 
        </div> 
  
<!-- Category 
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
   -->
  
  

<br> 
        {{ Form::submit('Show report', array('class'=>'btn btn-primary pull-right')) }} 
  
        {{Form::close()}} 
    </div> 
</div> 



<!-- Customer Specific -->
<div class="panel panel-default"> 
    <div class="panel-heading"> 
        Customer purchase record 
    </div> 
    <div class="panel-body"> 
        {{Form::open('reportbycustomer','POST')}} 

  
        From 
        <div class="input-group"> 
            <input type="text" name="datepickerFrom" id="inputDatepickerFrom" class="form-control datepicker" data-date-format="yyyy-mm-dd" required="required"  title=""> 
            <span class='input-group-addon'><span class="glyphicon glyphicon-calendar"></span></span> 
        </div> 
        To 
        <div class="input-group"> 
            <input type="text" name="datepickerTo" id="inputDatepickerTo" class="form-control datepicker"  data-date-format="yyyy-mm-dd" required="required" title=""> 
            <span class='input-group-addon'><span class="glyphicon glyphicon-calendar"></span></span> 
        </div> 
  
<!-- Category 
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
   -->
  
  
Item 
        <div class="input-group"> 
            <input type='text' name='reportitem' id='reportitem' class='form-control' required='no' value=""> 
            <span class='input-group-addon'> 
                <span class='glyphicon glyphicon-tag'></span> 
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