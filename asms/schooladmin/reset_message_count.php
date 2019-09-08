<?php require("../require/connection.php");
require("../require/sessions.php");
$type=$_SESSION['type'];
$reg=$_SESSION['reg'];
$id=$_SESSION['username'];
  if ($type==1) {
                        
  }
  elseif ($type==2) {
    $sql1="SELECT message_count FROM school_admin WHERE user_name= '$id' AND school_reg='$reg' ";
    $result1=mysql_query($sql1);
    $row=mysql_fetch_array($result1);
    
    if ($row['message_count']>0) { 
    	$sql="UPDATE school_admin SET message_count=0 WHERE user_name= '$id' AND school_reg='$reg'";
    	$result=mysql_query($sql);
    }
  }
  elseif ($type==3) {
    
  }
  
  header("Location: view_message.php");
?>