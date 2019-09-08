<?php
require("../require/connection.php");
require("../require/sessions.php") ;
$id=$_SESSION['username'];
$reg=$_SESSION['reg'];
$ses=$_SESSION['ses'];
if(isset($_POST['submit']))
{
	$sid=$_POST['student_id'];
	$amount=$_POST['amount'];

	$sql="SELECT * FROM fee_details WHERE student_id='$sid' AND school_reg='$reg' AND session='$ses'";
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
	$fee=$row['fee'];
	$fine=$row['fine'];
	$efee=$row['extra_fee'];
	$rd=$row['remaining_duies'];
	$test=$amount;

	if($test>0 && $rd>0)
	{
			
		$test=$test-$rd;
		if($test>=0)
		{
			$sql2="UPDATE fee_details SET remaining_duies='0' WHERE student_id='$sid' AND school_reg='$reg' AND session='$ses'";
			$result2=mysql_query($sql2);
		}
		else if($test<0)
		{

			$test=-($test);
			
			$sql2="UPDATE fee_details SET remaining_duies='$test' WHERE student_id='$sid' AND school_reg='$reg' AND session='$ses'";
			$result2=mysql_query($sql2);
			$test=0;
		}
	}

	if($test>0 && $fee>0)
	{
		$test=$test-$fee;
		if($test>=0)
		{
			$sql2="UPDATE fee_details SET fee='0' WHERE student_id='$sid' AND school_reg='$reg' AND session='$ses'";
			$result2=mysql_query($sql2);
		}
		else if($test<0)
		{
			$test=-($test);
			$sql2="UPDATE fee_details SET fee='$test' WHERE student_id='$sid' AND school_reg='$reg' AND session='$ses'";
			$result2=mysql_query($sql2);
			$test=0;
		}
	}
	if($test>0 && $fine>0)
	{
		$test=$test-$fine;
		if($test>=0)
		{
			$sql2="UPDATE fee_details SET fine='0' WHERE student_id='$sid' AND school_reg='$reg' AND session='$ses'";
			$result2=mysql_query($sql2);
		}
		else if($test<0)
		{
			$test=-($test);
			$sql2="UPDATE fee_details SET fine='$test' WHERE student_id='$sid' AND school_reg='$reg' AND session='$ses'";
			$result2=mysql_query($sql2);
			$test=0;
		}
	}
	if($test>0 && $efee>0)
	{
		$test=$test-$efee;
		if($test>=0)
		{
			$sql2="UPDATE fee_details SET efee='0' WHERE student_id='$sid' AND school_reg='$reg' AND session='$ses'";
			$result2=mysql_query($sql2);
		}
		else if($test<0)
		{
			$test=-($test);
			$sql2="UPDATE fee_details SET efee='$test' WHERE student_id='$sid' AND school_reg='$reg' AND session='$ses'";
			$result2=mysql_query($sql2);
			$test=0;
		}
	}

	
				
			
			
			
	$sql1="SELECT * FROM fee_details WHERE student_id='$sid' AND school_reg='$reg' AND session='$ses'";
	$result1=mysql_query($sql1);
	$row1=mysql_fetch_array($result1);
	$fee1=$row1['fee'];
	$fine1=$row1['fine'];
	$efee1=$row1['extra_fee'];
	$rd1=$row1['remaining_duies'];	
	$rd1=$fee1+$fine1+$rd1+$efee1;
	$sql="UPDATE fee_details SET remaining_duies='$rd1',fee='0',extra_fee='0',fine='0' WHERE student_id='$sid' AND school_reg='$reg' AND session='$ses'";
	$result=mysql_query($sql);
	date_default_timezone_set('Asia/Karachi'); 
    $d=date("Y-m-d h:i:sa");

	$sql1="INSERT INTO fee_submission(student_id,amount,submission_date,submitted_by,school_reg,session) VALUES('$sid','$amount','$d',
		'$id','$reg','$ses')";
	$result1=mysql_query($sql1);
	header("Location: view_student_fee_details.php");
	}
	else
	{

	}

?>