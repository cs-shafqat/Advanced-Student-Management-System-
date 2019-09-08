<title>Class Class</title>
<?php 
 require("../require/connection.php");
 require("../require/sessions.php");
$reg=$_SESSION['reg'];
$ses=$_SESSION['ses'];
if(isset($_POST['submit']))
{
  $sid=$_POST['sid'];
  $class=$_POST['class'];

  $sql2="SELECT * FROM class WHERE title='$class' AND school_reg='$reg' AND session='$ses'";
  $result2=mysql_query($sql2);
  $row2=mysql_fetch_array($result2);
  $count=$row2['count'];
  $maxcount=$row2['max_count'];
  if($count<$maxcount)
  {
    $sql3="UPDATE student_class_record SET class_tital='$class' AND session='$ses' WHERE student_id='$sid' AND school_reg='$reg' ";
    $result3=mysql_query($sql3);
    $count++;
    $sql4="UPDATE class SET count='$count' WHERE title='$class' school_reg='$reg' AND session='$ses'";
    $result4=mysql_query($sql4);
  
 
  $sql1="UPDATE student SET session='$ses', class='$class'  WHERE student_name='$sid' AND school_reg='$reg' ";
  $result1=mysql_query($sql1);
  header("Location: promote_student_form.php?status=1");
}
else
{
  header("Location: promote_student_form.php?status=2");
}
}
mysql_close("connection");
?>