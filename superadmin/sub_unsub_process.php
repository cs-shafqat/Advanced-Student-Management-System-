<?php
require("../require/connection.php");
require("../require/sessions.php");
if(isset($_GET['id']))
{
	$reg_no = $_GET['id'];
	$id=$_GET['id1'];
}
$result;
if($id==1)
{
$sql="UPDATE school SET status = 1 WHERE registration_number='$reg_no' ";
$result = mysql_query( $sql);
}
else if($id==2)
{
$sql="UPDATE school SET status = 0 WHERE registration_number='$reg_no' ";
$result = mysql_query( $sql);	
}
 header("Location: view_school.php");

mysql_close($connection);	
?>