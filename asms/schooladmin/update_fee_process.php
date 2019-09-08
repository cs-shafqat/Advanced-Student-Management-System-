<?php
require("../require/connection.php");
require("../require/sessions.php");
$reg=$_SESSION['reg'];
$ses=$_SESSION['ses'];
if(isset($_POST['submit']))
{
	$class=$_POST['class'];
	$fee=$_POST['fee'];
	$sql="UPDATE fee SET fee='$fee' WHERE class_name='$class' AND session='$ses' AND school_reg='$reg'";
	$result=mysql_query($sql);
	if($result)
	{
		header("Location: view_class_fee_details.php?status=1");
	}
	else
	{
		header("Location: view_class_fee_details.php?status=2");
	}
}

 ?>