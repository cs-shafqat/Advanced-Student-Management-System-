<?php 
	require("../require/connection.php");
	require("../require/sessions.php") ;
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

if(isset($_POST['submit']))	
{
	$user_name=$_POST['user_name'];
	$first_name=$_POST['first_name'];
	$last_name=$_POST['last_name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$password=$_POST['password'];
	$nationality=$_POST['nationality'];
	$cnic=$_POST['cnic'];
	$gender=$_POST['gender'];
	$dob=$_POST['dob'];
	$caddress=$_POST['caddress'];
	$paddress=$_POST['paddress'];
	$pasw=md5($password);
	$hobby=$_POST['hobby'];
	$class=$_POST['class'];
	$adm_date=$_POST['admission_date'];
	$reg=$_SESSION['reg'];
	$ses=$_SESSION['ses'];
	


	//picture uploading	
	$picTemp = $_FILES['user_pic']['tmp_name'];
	$temppp=explode(".", $picTemp);
	$fileext=end($temppp);
	$ext = pathinfo($_FILES['user_pic']['name'], PATHINFO_EXTENSION);
	$pic_name = $user_name.".".$ext;
	$dir = "../image/";
	echo $dir;
	$movResult = move_uploaded_file($picTemp, $dir.$pic_name);


	$sql="SELECT * FROM class WHERE title='$class' AND school_reg = '$reg' AND session='$ses'";
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
	if($row['count']<$row['max_count'])
	{
	$sql2="INSERT INTO student(student_name, first_name, last_name, email, cell_no, password, nationality, cnic, gender, image_path, 
							  dob, admission_date, hobby, class, current_address, permanent_address, school_reg, session) 
		  VALUES('$user_name', '$first_name', '$last_name', '$email', '$phone', '$pasw', '$nationality','$cnic', '$gender', '$pic_name',
		  		 '$dob', '$adm_date', '$hobby', '$class', '$caddress', '$paddress', '$reg', '$ses')";
	$result2=mysql_query($sql2);
	
	$count=$row['count'];
	$count++;
	$na=$first_name." ".$last_name;
	$sql3="UPDATE class SET count = '$count' WHERE title='$class' AND school_reg='$reg' AND session='$ses'";
	$result3=mysql_query($sql3);
	$sql4="INSERT INTO student_class_record(student_id,student_name,class_tital,school_reg,session) VALUES('$user_name','$na','$class','$reg','$ses')";
	$result4=mysql_query($sql4);
	 header("Location:add_parent.php?id=$user_name");
	}
	else
	{
		header("Location: add_student.php?status=2");
	}
	
}	
mysql_close($connection);
?>