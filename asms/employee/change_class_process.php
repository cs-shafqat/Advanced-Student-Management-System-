<title>Class Class</title>
<?php 
 require("../require/connection.php");
 require("../require/sessions.php");
$reg=$_SESSION['reg'];
$ses=$_SESSION['ses'];
if(isset($_GET['id']))
{
	$sid=$_GET['id'];
	$cclass=$_POST['cclass'];
	$nclass=$_POST['nclass'];

	$sql2="SELECT * FROM class WHERE title='$nclass' AND school_reg='$reg' AND session='$ses'";
	$result2=mysql_query($sql2);
	$row2=mysql_fetch_array($result2);
	$count=$row2['count'];
	$maxcount=$row2['max_count'];
	if($count<$maxcount)
	{
		$sql3="UPDATE student_class_record SET class_tital='$nclass' WHERE student_id='$sid' AND school_reg='$reg' AND session='$ses'";
		$result3=mysql_query($sql3);
		$count++;
		$sql4="UPDATE class SET count='$count' WHERE title='$nclass' school_reg='$reg' AND session='$ses'";
		$result4=mysql_query($sql4);
		$sql5="UPDATE student SET class='$nclass'  WHERE student_name='$sid' AND school_reg='$reg' AND session='$ses'";
  		$result5=mysql_query($sql5);
	
	$sql="SELECT * FROM class WHERE title='$cclass' AND school_reg='$reg' AND session='$ses'";
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
	$str=$row['count'];
	$str--;
	$sql1="UPDATE class SET count='$str' WHERE title='$cclass' AND school_reg='$reg' AND session='$ses'";
	$result1=mysql_query($sql1);
	header("Location: change_class_sel.php?status=1");
}
else
{
	header("Location: change_class_sel.php?status=2");
}
}
mysql_close("connection");
?>