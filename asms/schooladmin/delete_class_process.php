
<?php
require("../require/connection.php");
require("../require/sessions.php");
$reg=$_SESSION['reg'];
$ses=$_SESSION['ses'];
 
 if(isset($_GET['id']))
 {
 	$id=$_GET['id'];
 	
 	$sql="SELECT * FROM class WHERE title='$id' AND school_reg='$reg' AND session='$ses'";
 	$result=mysql_query($sql);
 	$row=mysql_fetch_array($result);
 	$count=1;
 	$count=$row['count'];
 	
 	if($count==0)
 	{
 		$sql2="DELETE FROM subject_class_record WHERE class_title='$id' AND school_reg='$reg' AND session='$ses'";
 		$result2=mysql_query($sql2);
 		$sql3="DELETE FROM class WHERE title='$id' AND school_reg='$reg' AND session='$ses'";
 		$result3=mysql_query($sql3);
 		$sql4="DELETE FROM fee WHERE class_name='$id' AND school_reg='$reg' AND session='$ses'";
 		$result4=mysql_query($sql4);
 		header("Location: view_class.php?status=1");


 	}
 	else
 	{
 		header("Location: view_class.php?status=2");
 	}
 	mysql_close("connection");
 }
 ?>