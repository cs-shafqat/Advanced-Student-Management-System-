<?php
require("../require/connection.php");
require("../require/sessions.php");
$reg=$_SESSION['reg'];
$ses=$_SESSION['ses'];
if(isset($_POST['submit']))
{
	$etitle=$_POST['title'];
	$sdate=$_POST['sdate'];
	$edate=$_POST['edate'];
	$class=$_POST['class'];

	$sql="INSERT INTO term_exam (exam_tital,exam_class,start_date,end_date,school_reg,session) VALUES('$etitle','$class','$sdate','$edate','$reg','$ses')";
	$result=mysql_query($sql);
	if($result)
	{
		header("Location: add_exam.php?status=1");
	}
	else
	{
		header("Location: add_exam.php?status=2");
	}
}
?>