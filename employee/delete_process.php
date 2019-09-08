
<?php
require("../require/connection.php");
require("../require/sessions.php");
$reg=$_SESSION['reg'];
$ses=$_SESSION['ses'];
 
 if(isset($_GET['id']))
 {
 	$id=$_GET['id'];
 	$id1=$_GET['id1'];
 	$reg=$_SESSION['reg'];
 	if($id1==1)
 	{	$sql="SELECT * FROM parent_student_record WHERE student_id='$id' AND school_reg='$reg'";
 		$result=mysql_query($sql);
 		$row=mysql_fetch_array($result);
 		$pid=$row['parent_id'];
 		$sql3="SELECT * FROM parent_student_record WHERE parent_id='$pid' AND school_reg='$reg'";
 		$result3=mysql_query($sql3);
			 		if(mysql_num_rows($result3)==1)
			 		{
			 			$sql1="DELETE FROM parent WHERE parent_name='$pid' AND school_reg='$reg'";
			 			$result1=mysql_query($sql1);
			 			$sql2="DELETE FROM parent_student_record WHERE parent_id='$pid' AND student_id= '$id' AND school_reg= '$reg'";
			 			$result2=mysql_query($sql2);

			 		}
		$sql="SELECT * FROM student WHERE student_name='$id' AND school_reg='$reg'";
 		$result=mysql_query($sql);
 		$row=mysql_fetch_array($result);
 		
 		$cl=$row['class'];
		
 		$sql8="UPDATE class SET count = '$count' WHERE class_tital='$cl' AND school_reg='$reg'";
		$result8=mysql_query($sql8);
 		$sql4="DELETE FROM student WHERE student_name ='$id' AND school_reg = '$reg'";
 		$result4=mysql_query($sql4);
 		$sql5="DELETE FROM parent_student_record WHERE  student_id= '$id' AND school_reg= '$reg'";
		$result5=mysql_query($sql5);
		$sql6="DELETE FROM student_class_record WHERE student_id='$id' AND school_reg='$reg'";
		$result6=mysql_query($sql6);
		$sql7="SELECT * FROM class WHERE title='$cl' AND school_reg='$reg'";
		$result7=mysql_query($sql7);
		$row7=mysql_fetch_array($result7);
		$count=$row7['count'];
		$count--;
		$sql8="UPDATE class SET count = '$count' WHERE title='$cl' AND school_reg='$reg'";
		$result8=mysql_query($sql8);
 		if($result4 && $result6 && $result7 && $result8)
 		{
 			header("Location: view_student.php?status=1");
 		}
 		else 
 		{
 			header("Location: view_student.php?status=2");
 		}	

 	}
 	else if($id1==2)
 	{	$sql3="SELECT * FROM parent_student_record WHERE parent_id='$id' AND school_reg='$reg'";
 		$result3=mysql_query($sql3);
 		if(mysql_num_rows($result3)==0)
 		{
		$sql="DELETE FROM parent WHERE parent_name='$id'";
 		$result=mysql_query($sql);
 			
	 		if($result)
	 		{
	 			header("Location: view_parent.php?status=1");
	 		}
	 		else 
	 		{
	 			header("Location: view_parent.php?status=2");
	 		}
	 	}
 		else
 		{
 			header("Location: view_parent.php?status=3");

 		}
 	}
 	else if($id1==3)
 	{
 		$sql="DELETE FROM employee WHERE employee_name='$id'";
 		$result=mysql_query($sql);
 		$sql1="DELETE FROM employee_authority WHERE user_id='$id'";
 		$result1=mysql_query($sql1);
 		$sql3="UPDATE class SET class_incharge_id='-------------' WHERE class_incharge_id='$id' AND school_reg='$reg' AND session='$ses'";
 		$result3=mysql_query($sql3);
 		$sql3="UPDATE subject_class_record SET subject_teacher='-------------' WHERE subject_teacher='$id' AND school_reg='$reg' AND session='$ses'";
 		$result3=mysql_query($sql3);	 
	 		if($result && $result1)
	 		{
	 			header("Location: view_employee.php?status=1");
	 		}
	 		else 
	 		{
	 			header("Location: view_parent.php?status=2");
	 		}
 	}
 	else
 	{	
 		header("Location: welcome.php");
 	}
 }
 else
 {
 	header("Location: welcome.php");
 }


?> 	