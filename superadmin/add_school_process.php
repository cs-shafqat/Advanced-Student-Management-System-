<?php
@require("../require/connection.php"); 
	if (!isset($_GET['id'])) {
   header("HTTP/1.0 400 Bad Request", true, 400);
   exit('400: Bad Request CanNot directly access this page');
} else {

$sname		= $_POST['sname']; 
$regno		= $_POST['rno']; 
$startdate	= $_POST['sdate']; 
$enddate	= $_POST['ldate']; 
$school_admin = $_POST['admin'];

$sql = "INSERT INTO school  SET school_name = '$sname',
 									registration_number = '$regno', 
									contract_start_date = '$startdate',
									 contract_end_date = '$enddate'";
									 $result = mysql_query( $sql);
if($result)
{
$sql1 = "UPDATE school_admin SET status='1' , school_reg='$regno' WHERE user_name='$school_admin'";
$sql2 = "INSERT INTO school_admin_record SET school_reg = '$regno', admin_id = '$school_admin'";								 
$result1 = mysql_query($sql1);
$result2 = mysql_query($sql2);
}



if(!($result && $result1 && $result2))
{
 header("Location: add_school.php?status=2");
}
 else{
	header("Location: add_school.php?status=1");
 }
}
mysql_close($connection);
?>