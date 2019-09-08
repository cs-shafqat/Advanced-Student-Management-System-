<?php require("../require/connection.php");
 require("../require/sessions.php");
  $check123=substr($_SESSION['username'], 0,3);
  if($check123!="PAR"){
    session_unset();
    session_destroy();
    header("location:../index.php");
    exit();
  }
$type=$_SESSION['type'];
$reg=$_SESSION['reg'];
$id=$_SESSION['username'];
  if ($type=="P") {
    $sql1="SELECT notification_count FROM parent WHERE parent_name= '$id' AND school_reg='$reg' ";
    $result1=mysql_query($sql1);
    $row=mysql_fetch_array($result1);
    
    if ($row['notification_count']>0) { 
      $sql="UPDATE parent SET notification_count=0 WHERE parent_name= '$id' AND school_reg='$reg'";
      $result=mysql_query($sql);            
  }
  
  }
  header("Location: view_notification.php");
?>