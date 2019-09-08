<?php
require("../require/connection.php");
require("../require/sessions.php");
if(isset($_GET['id']))
$id = $_GET['id'];

$first=$_POST['first_name'];
$last=$_POST['last_name'];
$user=$_POST['user_name'];
$email=$_POST['email'];
$result;
$picTemp = $_FILES['user_pic']['tmp_name'];
$temppp=explode(".", $picTemp);
$fileext=end($temppp);
$ext = pathinfo($_FILES['user_pic']['name'], PATHINFO_EXTENSION);
$pic_name = $user.".".$ext;
$dir = "../image/";
echo $dir;
if($temppp[0].length > 0)
	unlink($dir.$pic_name);
$movResult = move_uploaded_file($picTemp, $dir.$pic_name);
if($ext.length > 0)
	$sql="UPDATE school_admin SET first_name = '$first',image_path='$pic_name', last_name = '$last', user_name = '$user',  email = '$email' WHERE user_name='$user' ";
else
	$sql="UPDATE school_admin SET first_name = '$first', last_name = '$last', user_name = '$user',  email = '$email' WHERE user_name='$user' ";


$result = mysql_query( $sql);	


	if(!$result )
	{
	 header("Location: school_admin_profile.php?status=2");
	}
	 else{
		header("Location: school_admin_profile.php?status=1");
	 }
mysql_close($connection);									 
?> 