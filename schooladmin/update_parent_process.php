<?php
require("../require/connection.php");
  require("../require/sessions.php");
  ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
if(isset($_GET['id']))
{$id=$_GET['id'];
$user_name=$_POST['puser_name'];
$first_name=$_POST['pfirst_name'];
$last_name=$_POST['plast_name'];
$email=$_POST['pemail'];
$phone=$_POST['pphone'];
$nationality=$_POST['pnationality'];
$cnic=$_POST['pcnic'];
$gender=$_POST['pgender'];
$dob=$_POST['pdob'];
$current_address=$_POST['pcaddress'];
$permanent_address=$_POST['ppaddress'];
$occupation=$_POST['occupation'];
$std_id=$_POST['student_id'];
$reg=$_SESSION['reg'];
	//picture uploading	
	$picTemp = $_FILES['user_pic']['tmp_name'];
	$temppp=explode(".", $picTemp);
	$fileext=end($temppp);
	$ext = pathinfo($_FILES['user_pic']['name'], PATHINFO_EXTENSION);
	$pic_name = $user_name.".".$ext;
	$dir = "../image/";
	if($temppp[0].length > 0)
	unlink($dir.$pic_name);
	$movResult = move_uploaded_file($picTemp, $dir.$pic_name);

if($id==1)
	{
		$sql="INSERT INTO parent_student_record(student_id, parent_id, school_reg) 
										 VALUES('$std_id', '$user_name', '$reg')";
		$result=mysql_query($sql);
		if($result){	
		header("Location: add_student.php?status=1");}
		else if(!$result)
		{
			header("Location: add_student.php?status=2 ");
		}								 
	}
else if($id==2)
	{
		if($ext.length > 0)
		{
		$sql="UPDATE parent SET first_name='$first_name', last_name='$last_name',image_path='$pic_name', email='$email', cell_no='$phone', 
								nationality='$nationality', cnic = '$cnic', gender='$gender', dob='$dob', occupation='$occupation'
								, current_address='$current_address', permanent_address='$permanent_address'
								WHERE parent_name='$user_name'";
		}
		else
		{
			$sql="UPDATE parent SET first_name='$first_name', last_name='$last_name', email='$email', cell_no='$phone', 
								nationality='$nationality', cnic = '$cnic', gender='$gender', dob='$dob', occupation='$occupation'
								, current_address='$current_address', permanent_address='$permanent_address'
								WHERE parent_name='$user_name'";
		}
		$result=mysql_query($sql);
		if ($result) {
			header("Location: view_parent.php?status=1");
		}
		else if(!$result)
		{
			header("Location: view_parent.php?status=2");
		}
	}	
}
?>