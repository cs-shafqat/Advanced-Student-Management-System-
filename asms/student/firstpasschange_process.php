<?php
@require("../require/connection.php"); 
require("../require/sessions.php");
	$check123=substr($_SESSION['username'], 0,3);
  if($check123!="SDT"){
    session_unset();
    session_destroy();
    header("location:../index.php");
    exit();
  }
 	if (!isset($_GET['id'])) {
   header("HTTP/1.0 400 Bad Request", true, 400);
   exit('400: Bad Request CanNot directly access this page');
} else {
 $Id = $_POST['id']; 
$old    = $_POST['oldpass']; 
$new	= $_POST['password'];
$new = md5($new);
$old = md5($old);
$sql = "SELECT * FROM student where student_name ='$Id'";
$result = mysql_query( $sql);
$row = mysql_fetch_array( $result );
$var=$row['password'];
if($var==$old){

$sql = "UPDATE student  SET password='$new', login_count='1'  where student_name='$Id'" ;

//mysql_select_db('test_db');
 
$result = mysql_query( $sql);
	header("Location:welcome.php");

}
else{
 
}
}
mysql_close($connection);
?>