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

	      	$sql1="INSERT INTO term_exam_details (student_id, class_name, exam_tital, class_subject, total_marks, obtained_marks, remarks, session, date_of_exam, school_reg) VALUES ('$sid', '$class', '$exam_tital', '$subject_code', '$tmarks', '$obtained_marks', '$remarks', '$ses', '$edate', '$reg')";
			$result1=mysql_query($sql1);
			
			next($_POST);
		}
	}
	else{
		header("location: add_student_result_sel.php?id=2");
	}

}
header("location: add_student_result_sel.php?id=1");
mysql_close($connection);
?>