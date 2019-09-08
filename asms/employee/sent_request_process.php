<?php
require("../require/connection.php");
require("../require/sessions.php") ;
$id=$_SESSION['username'];
$reg=$_SESSION['reg'];
$s=$_SESSION['ses'];

$message_tital=$_POST['subject'];
$message_from=$_POST['from'];
$message_content=$_POST['content'];
$image_path=$id.".jpg";

date_default_timezone_set('Asia/Karachi');
$d=date("Y-m-d h:i:sa");
$value="E";
	$sql1="INSERT INTO request(request_tital, request_content, request_from, type, date_of_request, school_reg, session, image_path) 
				VALUES('$message_tital', '$message_content', '$message_from', '$value', '$d', '$reg', '$s', '$image_path')";
	$result1=mysql_query($sql1);
	if($result1){
		header("Location: sent_request.php?status=1 ");
	}
	else{
		header("Location: sent_request.php?status=2 ");
	}


mysql_close($connection);
?>