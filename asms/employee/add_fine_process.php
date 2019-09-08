<?php
require("../require/connection.php");
  require("../require/sessions.php") ;
 if (isset($_POST['submit']))
  { $reg=$_SESSION['reg'];
  	$ses=$_SESSION['ses'];
  	$title=$_POST['fine'];
  	$dis=$_POST['description'];
  	$am=$_POST['amount'];

  	$sql="INSERT INTO fine (fine_tital,fine_discription,amount,session,school_reg) VALUES ('$title','$dis','$am','$ses','$reg')";
  	$result=mysql_query($sql);
  	if($result)
  	{
  		header("Location: add_fine.php?status=1");
  	}
  	else
  	{
  		header("Location: add_fine.php?status=2");
  	}
  }
?>