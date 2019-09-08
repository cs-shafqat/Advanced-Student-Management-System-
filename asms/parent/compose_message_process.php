<?php
require("../require/connection.php");
 require("../require/sessions.php");
  $check123=substr($_SESSION['username'], 0,3);
  if($check123!="PAR"){
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
$message_to=$_POST['to'];
$message_content=$_POST['content'];
$image_path=$id.".jpg";

date_default_timezone_set('Asia/Karachi');
$d=date("Y-m-d h:i:s");
foreach ($message_to as $value) {
	$sql1="INSERT INTO message(message_tital, message_content, message_from, message_to, date, school_reg, session, image_path) 
				VALUES('$message_tital', '$message_content', '$message_from', '$value', '$d', '$reg', '$s', '$image_path')";
	$result1=mysql_query($sql1);
	if($result1){
		if(substr($value,0,3)=="EMP"){
			$sql2="SELECT message_count FROM employee WHERE employee_name='$value' AND school_reg='$reg' ";
			$result2=mysql_query($sql2);
			$row2=mysql_fetch_array($result2);
			$mc=$row2['message_count']+1;
			$sql="UPDATE employee SET message_count='$mc' WHERE employee_name= '$value' AND school_reg='$reg'";
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