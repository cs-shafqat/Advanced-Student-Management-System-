<?php
require("../require/connection.php");
 require("../require/sessions.php");
$reg_no = $_POST['reg'];
$new	= $_POST['new_reg'];

$sql ="SELECT registration_number FROM school WHERE registration_number = '$new'";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);
$sql1;
$result1;
if($row<=0)
{
	$sql1="UPDATE school SET registration_number = '$new' WHERE registration_number = '$reg_no'";
	$result1=mysql_query($sql1);
	$sql2="UPDATE school_admin_record SET school_reg = '$new' WHERE school_reg = '$reg_no'";
	$result2=mysql_query($sql2);
	header("Location: view_school.php?status=1");
}
else
{
	header("Location: view_school.php?status=2");
}

mysql_close($connection);
?>