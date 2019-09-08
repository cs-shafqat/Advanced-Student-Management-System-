<?php
@require("../require/connection.php"); 
@require("../require/sessions.php");
 	if (!isset($_GET['id'])) {
   header("HTTP/1.0 400 Bad Request", true, 400);
   exit('400: Bad Request CanNot directly access this page');
} else {
$Id = $_SESSION['username']; 
$old = $_POST['oldpass']; 
$new= $_POST['password'];
$new = md5($new);
$old = md5($old);
$count=1;
$row=0;

$sql = "SELECT * FROM super_admin WHERE user_name='$Id'";
$result =mysql_query($sql);
$num=mysql_num_rows($result);
if($num==1)
{
	$row = mysql_fetch_array( $result );

}

if($row['password']==$old){

$sql = "UPDATE super_admin  SET password='$new', login_count='$count' WHERE user_name='$Id'";

//mysql_select_db('test_db');
 
$result = mysql_query($sql);
	header("Location: welcome.php");

}
else{
 
}}
mysql_close($connection);
?>