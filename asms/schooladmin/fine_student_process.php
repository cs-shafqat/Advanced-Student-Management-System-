<?php
require("../require/connection.php");
require("../require/sessions.php");
$ses=$_SESSION['ses'];
$reg=$_SESSION['reg'];
if(isset($_POST['submit']))
{
	$sid=$_POST['student_id'];
	$fine=$_POST['fine'];

	$sql="SELECT * FROM fine WHERE fine_tital='$fine' AND session='$ses' AND school_reg='$reg'";
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
	$am=$row['amount'];
	$d=date("Y-m-d");

	$sql1="INSERT INTO fine_details (fine_title,student_id,fine_date,amount,session,school_reg) VALUES ('$fine','$sid','$d','$am','$ses','$reg')";
	$result1=mysql_query($sql1);
	if($result1)
	{
		$sql2="SELECT * FROM fee_details WHERE student_id='$sid' AND session='$ses' AND school_reg='$reg'";
		$result2=mysql_query($sql2);
		$row2=mysql_fetch_array($result2);
		$fi=$row2['fine'];
		$fi=$fi+$am;

		$sql3="UPDATE fee_details SET fine='$fi' WHERE student_id='$sid' AND school_reg='$reg' AND session='$ses'";
		$result3=mysql_query($sql3);
		if($result2 && $result3)
		{
			header("Location: fine_student.php?status=1");
		}
		else
		{
			header("Location: fine_student.php?status=2");
		}
	}
}
?>