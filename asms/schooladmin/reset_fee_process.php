<?php require("../require/connection.php");
  require("../require/sessions.php");
$reg=$_SESSION['reg'];
$ses=$_SESSION['ses'];
$cm=date("m");
$sql1="SELECT * FROM fee_reset WHERE school_reg='$reg'";
$result1=mysql_query($sql1);
$row1=mysql_fetch_array($result1);
$pm=$row1['reset_month'];

if($cm!=$pm)
{
$sql="SELECT * FROM fee_details WHERE school_reg='$reg' AND session='$ses'";
$result=mysql_query($sql);
if(mysql_num_rows($result)>0)
{
	while($row=mysql_fetch_array($result))
	{
		$sid=$row['student_id'];
		$fee=$row['fee'];
		$fine=$row['fine'];
		$class=$row['class_tital'];
		$efee=$row['extra_fee'];
		$rd=$row['remaining_duies'];
		$rd=$rd+$fee+$efee+$fine;
		$sql4="SELECT * FROM fee WHERE class_name='$class' AND school_reg='$reg' AND session='$ses'";
		$result4=mysql_query($sql4);
		$row4=mysql_fetch_array($result4);
		$cf=$row4['fee'];
		$sql2="UPDATE fee_details SET fee='$cf', remaining_duies='$rd', fine='0',extra_fee='0' WHERE student_id='$sid' AND school_reg='$reg' AND session='$ses'";
		$result2=mysql_query($sql2);
	}
if(mysql_num_rows($result1)>0)
{
$sql3="UPDATE fee_reset SET reset_month='$cm' WHERE school_reg='$reg'";
$result3=mysql_query($sql3);
}
else
{
	$sql3="INSERT INTO fee_reset(reset_month,school_reg) VALUES('$cm','$reg')";
	$result3=mysql_query($sql3);
}
if($result2 && $result3)
{
header("Location: view_student_fee_details.php?status=1");
}
else
{
header("Location: view_student_fee_details.php?status=2");
}
}
}
else
{
header("Location: view_student_fee_details.php?status=3");
}
?>