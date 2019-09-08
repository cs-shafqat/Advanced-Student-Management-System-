<?php
require("../require/connection.php");
require("../require/sessions.php") ;
$id=$_SESSION['username'];
$reg=$_SESSION['reg'];
$s=$_SESSION['ses'];

$message_tital=$_POST['subject'];
$message_from=$_POST['from'];
$message_to=$_POST['to'];
$message_content=$_POST['content'];
$image_path=$id.".jpg";

date_default_timezone_set('Asia/Karachi');
$d=date("Y-m-d h:i:sa");
foreach ($message_to as $value) {
	$sql1="INSERT INTO message(message_tital, message_content, message_from, message_to, date, school_reg, session, image_path) 
				VALUES('$message_tital', '$message_content', '$message_from', '$value', '$d', '$reg', '$s', '$image_path')";
	$result1=mysql_query($sql1);
	if($result1){
		
		$sql2="SELECT message_count FROM school_admin WHERE user_name='$value' ";
		$result2=mysql_query($sql2);
		if($row2=mysql_fetch_array($result2)){
			$mc=$row2['message_count']+1;
			$sql="UPDATE school_admin SET message_count='$mc' WHERE  user_name='$value' ";
    		$result=mysql_query($sql);
		}
		$sql2="SELECT message_count FROM super_admin WHERE user_name='$value' ";
		$result2=mysql_query($sql2);
		if($row2=mysql_fetch_array($result2)){
			$mc=$row2['message_count']+1;
			$sql="UPDATE super_admin SET message_count='$mc' WHERE  user_name='$value' ";
    		$result=mysql_query($sql);
		}
		
	}
	else{
		header("Location: compose_message.php?status=2 ");
	}
}

header("Location: compose_message.php?status=1 ");
mysql_close($connection);
?>