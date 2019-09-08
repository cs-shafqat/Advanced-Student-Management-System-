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

//picture uploading	
$picTemp = $_FILES['user_pic']['tmp_name'];
$temppp=explode(".", $picTemp);
$fileext=end($temppp);
$ext = pathinfo($_FILES['user_pic']['name'], PATHINFO_EXTENSION);
$pic_name = $std.".".$ext;
$dir = "../image/";
if($temppp[0].length > 0)
unlink($dir.$pic_name);
$movResult = move_uploaded_file($picTemp, $dir.$pic_name);

if($ext.length > 0)
$sql= "UPDATE student SET first_name = '$fname', image_path='$pic_name', last_name = '$lname', email = '$email', cell_no = '$phone', nationality ='$nationality' , cnic = '$cnic' , gender = '$gender' , dob = '$dob', current_address = '$caddress', permanent_address = '$paddress', hobby = '$hobby' WHERE student_name = '$std' AND school_reg = '$reg' ";
else
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
 ?>