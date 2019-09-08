<?php
require("../require/connection.php");
require("../require/sessions.php");

$std=$_POST['user_name'];
$fname=$_POST['first_name'];
$lname=$_POST['last_name'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$nationality=$_POST['nationality'];
$cnic=$_POST['cnic'];
$gender=$_POST['pgender'];
$dob=$_POST['dob'];
$caddress=$_POST['caddress'];
$paddress=$_POST['paddress'];
$hobby=$_POST['hobby'];
$reg=$_SESSION['reg'];
echo $fname,$std;
$sql= "UPDATE student SET first_name = '$fname', last_name = '$lname', email = '$email', cell_no = '$phone', nationality ='$nationality' , cnic = '$cnic' , gender = '$gender' , dob = '$dob', current_address = '$caddress', permanent_address = '$paddress', hobby = '$hobby' WHERE student_name = '$std' AND school_reg = '$reg' ";
$result=mysql_query($sql);
if($result)
{
	header("Location: edit_student_profile.php?status=1");
}
else
{
	header("Location: edit_student_profile.php?status=2");
}
mysql_close($connection);
 ?>