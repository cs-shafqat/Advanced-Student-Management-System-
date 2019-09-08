<?php
require("../require/connection.php");
require("../require/sessions.php");
$reg=$_SESSION['reg'];
$ses=$_SESSION['ses'];
 
 if(isset($_GET['id']))
 {
 	$id=$_GET['id'];
 	$id1=$_GET['id1'];
 	$id2=$_GET['id2'];
 	$sql="DELETE FROM fine_details WHERE fine_title='$id' AND student_id='$id1' AND fine_date='$id2' AND school_reg='$reg' AND session='$ses'";
 	$result=mysql_query($sql);
 	if($result)
 	{
 		header("Location: student_fine_details.php?status=1");
 	}
 	else
 	{
 		header("Location: student_fine_details.php?status=2");
 	}
 }
 mysql_close("connection");
 ?>