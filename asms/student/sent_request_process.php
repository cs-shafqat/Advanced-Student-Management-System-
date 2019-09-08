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
$id=$_SESSION['username'];
$reg=$_SESSION['reg'];
$s=$_SESSION['ses'];

$message_tital=$_POST['subject'];
$message_from=$_POST['from'];
$message_content=$_POST['content'];
$image_path=$id.".jpg";

date_default_timezone_set('Asia/Karachi');
$d=date("Y-m-d h:i:sa");
$value="S";
	$sql1="INSERT INTO request(request_tital, request_content, date_of_request, request_from, type, session, school_reg, image_path)VALUES('$message_tital', '$message_content', '$d', '$message_from', '$value', '$s', '$reg', '$image_path')";
	$result1=mysql_query($sql1);
	if($result1){
		header("Location: sent_request.php?status=1 ");
	}
	else{
		header("Location: sent_request.php?status=2 ");
	}


mysql_close($connection);
?>