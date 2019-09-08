<?php
require("../require/connection.php");
  require("../require/sessions.php");

  ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$user_name=$_POST['puser_name'];
$first_name=$_POST['pfirst_name'];
$last_name=$_POST['plast_name'];
$email=$_POST['pemail'];
$phone=$_POST['pphone'];
$nationality=$_POST['pnationality'];
$password=$_POST['ppassword'];
$pas=md5($password);
$cnic=$_POST['pcnic'];
$gender=$_POST['pgender'];
$dob=$_POST['pdob'];
$current_address=$_POST['pcaddress'];
$permanent_address=$_POST['ppaddress'];
$occupation=$_POST['poccupation'];
$std_id=$_POST['student_id'];
$reg=$_SESSION['reg'];

	//picture uploading	
	$picTemp = $_FILES['user_pic']['tmp_name'];
	$temppp=explode(".", $picTemp);
	$fileext=end($temppp);
	$ext = pathinfo($_FILES['user_pic']['name'], PATHINFO_EXTENSION);
	$pic_name = $user_name.".".$ext;
	$dir = "../image/";
	$movResult = move_uploaded_file($picTemp, $dir.$pic_name);
	
	$sql="INSERT INTO parent(parent_name, first_name, last_name, email, cell_no, password, nationality, cnic, gender, dob, occupation, current_address, permanent_address, school_reg, image_path) 
		  VALUES('$user_name', '$first_name', '$last_name', '$email', '$phone', '$pas', '$nationality','$cnic','$gender','$dob', '$occupation', '$current_address', '$permanent_address', '$reg','$pic_name')";
	$result=mysql_query($sql);

if($result)
	{
		$sql2="INSERT INTO parent_student_record(student_id, parent_id, school_reg) 
										 VALUES('$std_id', '$user_name', '$reg')";
		$result2=mysql_query($sql2);
		

		if($result2){	
			 header("Location: add_parent.php?status=1");
			
		}
									 
	}
else
{
	header("Location: add_parent.php?status=2 ");
}
mysql_close($connection);
?>