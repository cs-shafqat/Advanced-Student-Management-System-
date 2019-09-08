<?php
require("../require/connection.php");
require("../require/sessions.php");
$reg=$_SESSION['reg'];
$ses=$_SESSION['ses'];
if(isset($_POST['submit']))
{
	$etitle=$_POST['title'];
	$subject_code=$_POST['subject_code'];
	$class=$_POST['class'];
	$tmarks=$_POST['tmarks'];

	$sql="INSERT INTO test (test_tital,class_name,subject_id,total_marks,school_reg,session) VALUES('$etitle','$class','$subject_code','$tmarks','$reg','$ses')";
	$result=mysql_query($sql);
	if($result)
	{
		header("Location: add_test.php?status=1");
	}
	else
	{
		header("Location: add_test.php?status=2");
	}
}
?>