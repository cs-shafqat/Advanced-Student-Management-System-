
<?php
require("../require/connection.php");
require("../require/sessions.php");
$reg=$_SESSION['reg'];
$ses=$_SESSION['ses'];
 
 if(isset($_GET['id']))
 {
 	$id=$_GET['id'];
 	$id1=$_GET['id1'];
 	$sql="DELETE FROM term_exam_details WHERE exam_tital='$id' AND class_name='$id1' AND school_reg='$reg' AND session='$ses'";
 	$result=mysql_query($sql);
 	$sql1="DELETE FROM term_exam WHERE exam_tital='$id' AND exam_class='$id1' AND school_reg='$reg' AND session='$ses'";
 	$result1=mysql_query($sql1);
 	header("Location: view_exam.php?status=1");
 }
 else
 {
 	header("Location: view_exam.php?status=2");
 }
 ?>