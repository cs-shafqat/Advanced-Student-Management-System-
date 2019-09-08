<?php
require("../require/connection.php");
require("../require/sessions.php");
if(isset($_POST['submit']))
{
	$class=$_GET['class'];
	$id1=$_GET['id1'];
	$reg=$_SESSION['reg'];
	$ses=$_SESSION['ses'];
	if($id1==1)
	{
		$sql="SELECT * FROM student_class_record WHERE class_tital='$class' AND school_reg = '$reg' AND session='$ses' ORDER BY student_id ASC";
		$result=mysql_query($sql);

if (mysql_num_rows($result) > 0) {
	$d=$_GET['date'];
	
	
	
	
// output data of each row
while($row= mysql_fetch_array( $result) ) {
	$class=$row['class_tital'];
	$sid=$row['student_id'];
   	$status=current($_POST);
	$sql1="UPDATE student_attendance SET status='$status' WHERE class_name='$class' AND student_id='$sid' AND attendance_date='$d' AND session='$ses' AND school_reg='$reg'";
	$result1=mysql_query($sql1);
	next($_POST);
		if($result)
		{
			header("Location: edit_student_attendance.php?status=1");
		}
		else
		{
			header("Location: edit_student_attendance.php?status=2");
		}
	}

}
}
	else if($id1==2) 
	{
		# code...
		$sql="SELECT * FROM student_class_record WHERE class_tital='$class' AND school_reg = '$reg' AND session='$ses' ORDER BY student_id ASC";
		$result=mysql_query($sql);

if (mysql_num_rows($result) > 0) {
	$d=$_GET['date'];
	
	
	$sql2="SELECT * FROM student_attendance WHERE class_name='$class' AND attendance_date='$d' AND school_reg='$reg' AND session='$ses'";
	$result2=mysql_query($sql2);
	$r=mysql_num_rows($result2);
	if($r>0){
		header("Location: edit_student_attendance.php?status=3");
		die();
		}
	
// output data of each row
while($row= mysql_fetch_array( $result) ) {
	$class=$row['class_tital'];
	$sid=$row['student_id'];
	$sname=$row['student_name'];
   	$status=current($_POST);
	$sub=date("m");

	$sql1="INSERT INTO student_attendance (class_name, student_id, student_name, attendance_date, month, status, session, school_reg) VALUES ('$class', '$sid', '$sname','$d','$sub' ,'$status', '$ses', '$reg')";
	$result1=mysql_query($sql1);
	next($_POST);
	
}
mysql_close($connection);
header("Location: edit_student_attendance.php?status=1");
}

else{
header("Location: edit_student_attendance.php?status=2");
}
} 
}
else
{
	header("error.html");	
}
?>