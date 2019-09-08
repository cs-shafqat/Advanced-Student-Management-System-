<?php
require("../require/connection.php");
require("../require/sessions.php");
$reg=$_SESSION['reg'];
$ses=$_SESSION['ses'];
if(isset($_POST['submit']))
{
	$clas=$_POST['class'];
	$subject=$_POST['subject'];
	$teacher=$_POST['teacher'];

	$sql="SELECT * FROM subject WHERE subject_code='$subject' AND school_reg='$reg'";
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);

	$sql1="SELECT * FROM subject_class_record WHERE subject_code='$subject' AND class_title='$clas' AND school_reg='$reg' AND session='$ses'";
	$result1=mysql_query($sql1);
	$r=mysql_num_rows($result1);
	if($r>0)
	{
		header("Location: assign_class_subject.php?status=3");
	}
	else
	{
		$t=$row['subject_tital'];
		$sql2="INSERT INTO subject_class_record (subject_title,subject_code,class_title,subject_teacher,session,school_reg) VALUES ('$t','$subject','$clas','$teacher','$ses','$reg')";
		$result2=mysql_query($sql2);
		if($result2)
		{
			header("Location: assign_class_subject.php?status=1");
		}
		else
		{
			header("Location: assign_class_subject.php?status=2");
		}
	}
}
else if(isset($_POST['sbmit']))
{
	$clas=$_POST['class'];
	$subject=$_POST['subject'];
	$teacher=$_POST['teacher'];

	$sql="UPDATE subject_class_record SET subject_teacher='$teacher' WHERE class_title='$clas' AND subject_code='$subject' AND school_reg='$reg' AND session='$ses'";
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
?>