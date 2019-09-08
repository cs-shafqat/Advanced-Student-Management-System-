<?php
require("../require/sessions.php");
require("../require/connection.php");
if(isset($_POST['submit']))
{
	$title=$_POST['title'];
	$class=$_POST['class'];
	$subject=$_POST['subject'];
	$tmarks=$_POST['tmarks'];

	$sql="UPDATE test SET total_marks='$tmarks'  WHERE test_tital='$title' AND class_name='$class' AND subject_id='$subject'";
	$result=mysql_query($sql);
	if($result)
	{
		header("Location: view_test.php?status=1");
	}
	else
	{
		header("Location: view_test.php?status=2");	
	}
}
else
{
	header("Location: view_test.php");
}
mysql_close("connection");
?>