<?php
require("../require/connection.php");
require("../require/sessions.php");
if(isset($_POST['submit']))
{
	$reg=$_SESSION['reg'];
   	$ses=$_SESSION['ses'];
	$title=$_POST['class'];
	$fee=$_POST['fee'];
	$sql="SELECT * FROM class WHERE title='$title' AND school_reg='$reg' AND session='$ses'";
	$result=mysql_query($sql);
	if(mysql_num_rows($result)>0)
	{
		$sql1="INSERT INTO fee (class_name,fee,session,school_reg) VALUES ('$title','$fee','$ses','$reg')";
		$result1=mysql_query($sql1);
		
		if($result1)
		{
			header("Location: fee_details.php?status=1");
		}
		else
		{
			header("Location: fee_details.php?status=2");
		}
	}
	else
		{
			header("Location: fee_details.php?status=2");
		}
}
else
{
	header("Location: fee_details.php");
}
 ?>