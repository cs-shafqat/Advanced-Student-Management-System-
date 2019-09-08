<?php
require("../require/connection.php");
require("../require/sessions.php");
	$check123=substr($_SESSION['username'], 0,3);
  if($check123!="SDT"){
    session_unset();
    session_destroy();
    header("location:../index.php");
    exit();
  }

$std=$_SESSION['username'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$nationality=$_POST['nationality'];
$caddress=$_POST['caddress'];
$paddress=$_POST['paddress'];
$hobby=$_POST['hobby'];
$reg=$_SESSION['reg'];
$sql= "UPDATE student SET  email = '$email', cell_no = '$phone', nationality ='$nationality' , current_address = '$caddress', permanent_address = '$paddress', hobby = '$hobby' WHERE student_name = '$std' AND school_reg = '$reg' ";
$result=mysql_query($sql);
if($result)
{
	header("Location: view_student_profile.php?status=1");
}
else
{
	header("Location: view_student_profile.php?status=2");
}
 ?>