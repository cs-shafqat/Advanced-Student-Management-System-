<?php
require("../require/connection.php");
  require("../require/sessions.php") ;
 if (isset($_POST['submit']))
  { $reg=$_SESSION['reg'];
  	$ses=$_SESSION['ses'];
  	$title=$_POST['title'];
  	$code=$_POST['code'];
  	$c=strtolower($code);
  	$co=0;

  	$sql="SELECT * FROM subject WHERE school_reg='$reg'";
  	$result=mysql_query($sql);
  	if (mysql_num_rows($result)>0) {
  		# code...
  		while ($row=mysql_fetch_array($result)) {
  			# code...

  			$s=strtolower($row['subject_code']);
  				if ($s==$c) {
  					
  					
  						# code..	.
  					$co=1;
  					break;
  					}	
  			
  		}
  	}
  	if($co==0)
  	{
  	$sql1="INSERT INTO subject(subject_tital,subject_code,school_reg ) VALUES('$title','$code','$reg')";
  	$result1=mysql_query($sql1);
  	if($result1)
  	{
  		header("Location: add_course.php?status=1");
  	}
    else
    {
      header("Location: add_course.php?status=2");
    }
  }
  else
  {
  		header("Location: add_course.php?status=3");	
  }
}
else if(isset($_POST['sbmit']))
{
 $reg=$_SESSION['reg'];
    $ses=$_SESSION['ses'];
    $title=$_POST['title'];
    $code=$_POST['code'];
    $c=strtolower($code);
    $co=0;
    
    $sql1="UPDATE subject SET subject_tital='$title'  WHERE school_reg='$reg' AND subject_code='$code'";
    $result1=mysql_query($sql1);
    $sql="UPDATE subject_class_record SET subject_title='$title'  WHERE school_reg='$reg' AND subject_code='$code' AND session='$ses'";
    $result=mysql_query($sql);
    if($result1 && $result)
    {
      header("Location: view_course.php?status=1");
    }
    else
    {
      header("Location: view_course.php?status=1"); 
    }
}
else
{
	header("Location: error.html");
}
?>