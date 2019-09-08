<?php require("../require/connection.php");
require("../require/sessions.php");
$type=$_SESSION['type'];
$reg=$_SESSION['reg'];
$id=$_SESSION['username'];
 
 if ($type=="E") {
    $sql1="SELECT message_count FROM employee WHERE employee_name= '$id' AND school_reg='$reg' ";
    $result1=mysql_query($sql1);
    $row=mysql_fetch_array($result1);
    
    if ($row['message_count']>0) { 
    	$sql="UPDATE employee SET message_count=0 WHERE employee_name= '$id' AND school_reg='$reg'";
    	$result=mysql_query($sql);
    }
  }
 
  
  header("Location: view_message.php");
?>