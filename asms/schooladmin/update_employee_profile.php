<?php
	require("../require/connection.php");
	require("../require/sessions.php") ;
	
	$user_name=$_POST['user_name'];
	$first_name=$_POST['first_name'];
	$last_name=$_POST['last_name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$nationality=$_POST['nationality'];
	$cnic=$_POST['cnic'];
	$gender=$_POST['gender'];
	$dob=$_POST['dob'];
	$caddress=$_POST['caddress'];
	$paddress=$_POST['paddress'];
	$qualification=$_POST['qualification'];
	$office_no=$_POST['office_no'];
	$majors=$_POST['majors'];
	$designation=$_POST['designation'];
	$reg=$_SESSION['reg'];
	$ses=$_SESSION['ses'];
	
	$picTemp = $_FILES['user_pic']['tmp_name'];
	$temppp=explode(".", $picTemp);
	$fileext=end($temppp);
	$ext = pathinfo($_FILES['user_pic']['name'], PATHINFO_EXTENSION);
	$pic_name = $user_name.".".$ext;
	$dir = "../image/";
	if($temppp[0].length > 0)
	unlink($dir.$pic_name);
	$movResult = move_uploaded_file($picTemp, $dir.$pic_name);
	if($ext.length > 0)
	{
		$sql="UPDATE employee SET first_name = '$first_name', last_name = '$last_name',image_path='$pic_name', email = '$email', cell_no = '$phone', gender = '$gender', dob = '$dob',
							current_address = '$caddress', permanent_address = '$paddress', qualification = '$qualification', office_no = '$office_no',
							majors = '$majors', designation = '$designation' WHERE employee_name= '$user_name' ";
	}
	else
	{

	$sql="UPDATE employee SET first_name = '$first_name', last_name = '$last_name', email = '$email', cell_no = '$phone', gender = '$gender', dob = '$dob',
							current_address = '$caddress', permanent_address = '$paddress', qualification = '$qualification', office_no = '$office_no',
							majors = '$majors', designation = '$designation' WHERE employee_name= '$user_name' ";
	}
	$result=mysql_query($sql);
	if($result)
	{
		header("Location: view_employee.php?status=1");
	}
	else
	{
		header("Location:view_employee.php?status=2");
	}
	?>