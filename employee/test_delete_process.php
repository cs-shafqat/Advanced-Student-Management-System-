
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
 	$sql="DELETE FROM test_details WHERE test_title='$id' AND class_name='$id1' AND subject_id='$id2' AND school_reg='$reg' AND session='$ses'";
 	$result=mysql_query($sql);
 	$sql1="DELETE FROM test WHERE test_tital='$id' AND class_name='$id1' AND subject_id='$id2' AND school_reg='$reg' AND session='$ses'";
 	$result1=mysql_query($sql1);
 	header("Location: view_test.php?status=1");
 }
 else
 {
 	header("Location: view_test.php?status=2");
 }
 ?>