<?php
require("../require/connection.php");
require("../require/sessions.php");

$school_name=$_POST['sname'];
$reg_no=$_POST['rno'];
$end=$_POST['update'];
$ldate=$_POST['ldate'];
if($end==0)
{
	$end=$ldate;
}

$sql="UPDATE school SET school_name = '$school_name', contract_end_date = '$end' WHERE registration_number='$reg_no'";
$result = mysql_query( $sql);
 
if(!$result)
{
 header("Location: view_school.php?status=2");
}
 else{
	header("Location: view_school.php?status=1");
 }
mysql_close($connection);									 
?> 