<?php require("../require/connection.php");
require("../require/sessions.php");
$type=$_SESSION['type'];

$id=$_SESSION['username'];
 
 if ($type=="1") {
    $sql1="SELECT message_count FROM super_admin WHERE user_name= '$id'  ";
    $result1=mysql_query($sql1);
    $row=mysql_fetch_array($result1);
    
    if ($row['message_count']>0) { 
    	$sql="UPDATE super_admin SET message_count=0 WHERE user_name= '$id' ";
    	$result=mysql_query($sql);
    }
  }
 
  
  header("Location: view_message.php");
?>