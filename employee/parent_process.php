<?php
require("../require/connection.php");
$std=$_POST['user_name'];
$par=$_POST['puser_name'];
$sql="INSERT INTO parent_student_record(student_id,parent_id)  VALUES ('$std','$par')";
$result=mysql_query($sql);
if(!$result)
{
 header("Location: add_student.php?status=2");
}
 else{
	header("Location: add_student.php?status=1");
 }

mysql_close($connection);
?>