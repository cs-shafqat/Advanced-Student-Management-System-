<?php
require("../require/sessions.php");
require("../require/connection.php");
if(isset($_POST['submit']))
{
	$title=$_POST['title'];
	$class=$_POST['class'];
	$sdate=$_POST['sdate'];
	$edate=$_POST['edate'];

	$sql="UPDATE term_exam SET start_date='$sdate' , end_date='$edate' WHERE exam_tital='$title' AND exam_class='$class'";
	$result=mysql_query($sql);
	if($result)
	{
		header("Location: view_exam.php?status=1");
	}
	else
	{
		header("Location: view_exam.php?status=2");	
	}
}
else
{
	header("Location: view_exam.php");
}
mysql_close("connection");
?>