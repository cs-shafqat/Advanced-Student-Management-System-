<?php
require("../require/connection.php");
  require("../require/sessions.php") ;
 if (isset($_POST['submit']))
  { $reg=$_SESSION['reg'];
  	$ses=$_SESSION['ses'];
  	$title=$_POST['title'];
    $min_age=$_POST['minage'];
  	$ti=strtolower($title);
  	$count=0;
  	$strength=$_POST['strength'];
  	$incharge=$_POST['class_incharge_id'];
  	
  	$sql="SELECT * FROM class WHERE school_reg='$reg' AND session='$ses'";
  	$result=mysql_query($sql);
  	if (mysql_num_rows($result)>0) {
  		# code...
  		while ($row=mysql_fetch_array($result)) {
  			# code...

  			$s=strtolower($row['title']);
  			if ($s==$ti) {
  				# code...
  				$count=1;
  				break;	
  				 
  			}
  		}
  	}
  	if($count==0)
  	{
  	$sql2="INSERT INTO class SET title = '$title',session='$ses',school_reg='$reg',class_incharge_id='$incharge',max_count='$strength',min_age='$min_age'";
  	$result2=mysql_query($sql2);
	  	if($result2)
	  	{
	  		header("Location: add_class.php?status=1");
	  	}
	  	else
	  	{
	  		 header("Location: add_class.php?status=2");	
	  	}
  	}
  	else
  	{
  		header("Location: add_class.php?status=3");
  	}
  }
else
{
	header("Location: add_class.php");
}
mysql_close($connection);
  ?>