<?php require("../require/connection.php");
require("../require/sessions.php");
	$check123=substr($_SESSION['username'], 0,3);
  if($check123!="SDT"){
    session_unset();
    session_destroy();
    header("location:../index.php");
    exit();
  }
$type=$_SESSION['type'];
$reg=$_SESSION['reg'];
$id=$_SESSION['username'];
 
 if ($type=="S") {
    $sql1="SELECT message_count FROM student WHERE student_name= '$id' AND school_reg='$reg' ";
    $result1=mysql_query($sql1);
    $row=mysql_fetch_array($result1);
    
    if ($row['message_count']>0) { 
    	$sql="UPDATE student SET message_count=0 WHERE student_name= '$id' AND school_reg='$reg'";
    	$result=mysql_query($sql);
    }
  }
 
  
  header("Location: view_message.php");
?>