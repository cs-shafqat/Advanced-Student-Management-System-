<?php
require("../require/connection.php");
require("../require/sessions.php");
$ses=$_SESSION['ses'];
$reg=$_SESSION['reg'];
$count=0;
if(isset($_POST['submit']))
{
	$cid=$_POST['class_tital'];
	$fine=$_POST['extra_fee'];

	$sql="SELECT * FROM extra_fees WHERE extra_fee_tital='$fine' AND session='$ses' AND school_reg='$reg'";
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
	$am=$row['amount'];
	$d=date("Y-m-d");

	$sql1="INSERT INTO extra_fee_details (extra_fee_id,class_id,efee_date,amount,session,school_reg) VALUES ('$fine','$cid','$d','$am','$ses','$reg')";
	$result1=mysql_query($sql1);
	if($result1)
	{
		$sql2="SELECT * FROM student_class_record WHERE class_tital='$cid' AND session='$ses' AND school_reg='$reg'";
		$result2=mysql_query($sql2);
		if(mysql_num_rows($result2)>0)
		{
			while($row2=mysql_fetch_array($result2))
			{
				$sid=$row2['student_id'];
				$sql4="SELECT * FROM fee_details WHERE student_id='$sid' AND  session='$ses' AND school_reg='$reg'";
				$result4=mysql_query($sql4);
			
				$row4=mysql_fetch_array($result4);
				$extra=$row4['extra_fee'];


				$extra=$extra+$am;

				$sql3="UPDATE fee_details SET extra_fee='$extra' WHERE student_id='$sid' AND school_reg='$reg' AND session='$ses'";
				$result3=mysql_query($sql3);
				if(!($result4 && $result3))
				{
					$count++;
				}
					
			}
		}
		if($count==0)
		{
			header("Location: extra_fees.php?status=1");
		}

		else
		{
			header("Location : extra_fees.php?status=2");
		}
	}
}
?>