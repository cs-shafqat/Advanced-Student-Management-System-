<?php
@require("../require/connection.php"); 
	if (!isset($_GET['id'])) {
   header("HTTP/1.0 400 Bad Request", true, 400);
   exit('400: Bad Request CanNot directly access this page');
} else {

$fname		= $_POST['first_name']; 
$lname		= $_POST['last_name']; 
$username	= $_POST['user_name']; 
$password	= $_POST['password']; 
$email	= $_POST['email'];
$phone	= $_POST['phones']; 

$password = md5($password);
//picture uploading	
	$picTemp = $_FILES['user_pic']['tmp_name'];
	$temppp=explode(".", $picTemp);
	$fileext=end($temppp);
	$ext = pathinfo($_FILES['user_pic']['name'], PATHINFO_EXTENSION);
	$pic_name = $username.".".$ext;
	$dir = "../image/";
	$movResult = move_uploaded_file($picTemp, $dir.$pic_name);

$sql = "INSERT INTO super_admin  SET first_name = '$fname',
 									last_name = '$lname', 
									password = '$password',
									 user_name = '$username', 
									 email = '$email',
									 phone = '$phone',
									 image_path='$pic_name'";


$result = mysql_query( $sql);
 
if(!$result)
{
 header("Location: add_admin.php?status=2");
}
 else{
	header("Location: add_admin.php?status=1");
 }
}
mysql_close($connection);
?>