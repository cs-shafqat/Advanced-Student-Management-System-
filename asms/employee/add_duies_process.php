<?php
require("../require/connection.php");
  require("../require/sessions.php") ;
 if (isset($_POST['submit']))
  { $reg=$_SESSION['reg'];
  	$ses=$_SESSION['ses'];
  	$title=$_POST['duies'];
  	$dis=$_POST['description'];
  	$am=$_POST['amount'];

  	$sql="INSERT INTO extra_fees (extra_fee_tital,extra_fee_discription,amount,session,school_reg) VALUES ('$title','$dis','$am','$ses','$reg')";
  	$result=mysql_query($sql);
  	if($result)
  	{
  		header("Location: add_extra_duies.php?status=1");
  	}
  	else
  	{
  		header("Location: add_extra_duies.php?status=2");
  	}
  }
?>