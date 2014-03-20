<?php
include('db.inc');
$host = $hostname;
$uname = $username;
$pass = $pwd;
$database = $db;

$connection=mysql_connect($host,$uname,$pass) or die("connection in not ready <br>");
$result=mysql_select_db($database) or die("database cannot be selected <br>");
 

if (isset($_REQUEST['itemname'])) {
	$query = $_REQUEST['itemname'];
	$sql = mysql_query ("SELECT rate FROM stocks WHERE item_name LIKE '%{$itemname}%'");
	$array = array();
while ($row = mysql_fetch_assoc($sql)) {
	//echo $row['custSearch'];
	$array[] = $row['name'];
	}
	echo json_encode ($array); //Return the JSON Array
}



