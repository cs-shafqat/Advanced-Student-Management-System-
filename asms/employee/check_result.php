<?php 
require("../require/connection.php");
require("../require/sessions.php");
$reg=$_SESSION['reg'];
$ses=$_SESSION['ses'];
if(isset($_POST['submit'])){
	if(isset($_GET['id']) && $_GET['id']==2)
	{
	$class=$_POST['class'];
	$exam_tital=$_POST['exam_tital'];
	$class_subject=$_POST['subject_code'];
	$date=$_POST['date'];
	$sql="SELECT * FROM term_exam_details WHERE class_name='$class' AND exam_tital ='$exam_tital' AND class_subject='$class_subject' AND session='$ses' AND school_reg='$reg'";
	$result=mysql_query($sql);
	if(mysql_num_rows($result)>0){
        header("Location: add_student_result_sel.php?id=3");
      }else{
		header("Location: add_result_list.php?id=2&class=$class&exam_tital=$exam_tital&subject_code=$class_subject&date=$date");
		}
	}
	else if(isset($_GET['id']) && $_GET['id']==1)
	{
        $class=$_POST['class'];
        $test=$_POST['test_tital'];
        $date=$_POST['date'];
        $sql="SELECT * FROM test WHERE test_tital='$test' AND class_name='$class' AND school_reg='$reg' AND session='$ses'";
        $result=mysql_query($sql);
        $row=mysql_fetch_array($result);
        $subject=$row['subject_id'];
        $tmarks=$row['total_marks'];
        $sql2="SELECT * FROM test_details WHERE class_name='$class' AND test_tital='$test'";
        $result2=mysql_query($sql2);
        if(mysql_num_rows($result2)>0)
        {
        	header("Location: add_student_result_sel.php?id=3");
        }
        else
        {
        	header("Location: add_result_list.php?id=1&class=$class&test=$test&date=$date&subject=$subject&tmarks=$tmarks");
        }
	}
}
else{
	header("Location: add_student_result_sel.php");
}
	mysql_close($connection);
?>