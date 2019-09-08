
<?php
require("../require/connection.php");
require("../require/sessions.php");
$reg=$_SESSION['reg'];
$ses=$_SESSION['ses'];
 
 if(isset($_GET['id']))
 {
 	$id=$_GET['id'];
 	$sql="SELECT * FROM subject_class_record WHERE subject_code='$id' AND school_reg='$reg' AND session='$ses'";
 	$result=mysql_query($sql);
 	$count=mysql_num_rows($result);
 	
 	if($count==0)
 	{
 		$sql1="DELETE FROM subject WHERE subject_code='$id' AND school_reg='$reg'";
 		$result1=mysql_query($sql1);
 		header("Location: view_course.php?status=1");
 	}
 	else
 	{
 		header("Location: view_course.php?status=2");
 	}
 }
 ?>
