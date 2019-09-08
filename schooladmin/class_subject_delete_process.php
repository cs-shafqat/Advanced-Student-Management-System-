<?php
require("../require/connection.php");
require("../require/sessions.php");
$reg=$_SESSION['reg'];
$ses=$_SESSION['ses'];
 
 if(isset($_GET['id']))
 {
 	$id=$_GET['id'];
 	$id1=$_GET['id1'];

 	$sql="DELETE FROM subject_class_record WHERE subject_code='$id' AND class_title='$id1' AND school_reg='$reg' AND session='$ses'";
 	$result=mysql_query($sql);
 	if($result)
 	{
 		header("Location: class_subject_detail.php?status=1");
 	}
 	else
 	{
 		header("Location: class_subject_detail.php?status=2");
 	}
 }
 mysql_close("connection");
 ?>