<?php 
require("../require/connection.php");
require("../require/sessions.php");
$reg=$_SESSION['reg'];
$ses=$_SESSION['ses'];
if(isset($_POST['submit']))
{
	$class=$_POST['title'];
	$subject_code=$_POST['subject_code'];
	$exam_tital=$_POST['exam_tital'];
	$edate=$_POST['date'];
	$tmarks=$_POST['tmarks'];
	next($_POST);
	next($_POST);
	next($_POST);
	next($_POST);
	next($_POST);
	
	$sql="SELECT * FROM student_class_record WHERE class_tital='$class' AND school_reg = '$reg' AND session='$ses' ORDER BY student_id ASC";
      $result=mysql_query($sql);
     
      if (mysql_num_rows($result) > 0) {
      // output data of each row
	      $count=1;  
	      while($row= mysql_fetch_array( $result) ) {
	      	$sid=$row['student_id'];
	      	$obtained_marks=current($_POST);
	      	$remarks="";
	      	if((($obtained_marks*100)/$tmarks)>=33){
	      		$remarks="Pass";
	      	}else{
	      		$remarks="fail";
	      	}
	      	$sql1="UPDATE term_exam_details SET total_marks='$tmarks', obtained_marks='$obtained_marks', remarks='$remarks' WHERE student_id='$sid' AND class_name='$class' AND exam_tital='$exam_tital' AND school_reg='$reg' AND session='$ses'";
	      	
			$result1=mysql_query($sql1);
			
			next($_POST);
		}
	}
	else{
		header("location: edit_student_result.php?id=2");
	}

}
header("location: edit_student_result.php?id=1");
mysql_close($connection);
?>