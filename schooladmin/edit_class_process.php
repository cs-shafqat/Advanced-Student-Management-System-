<?php
require("../require/connection.php");
require("../require/sessions.php");
$count=$_POST['count'];
$incharge=$_POST['class_incharge_id'];
$title=$_POST['title'];
$ses=$_SESSION['ses'];
$reg=$_SESSION['reg'];
$sql="UPDATE class SET max_count='$count',class_incharge_id='$incharge' WHERE school_reg='$reg' AND session='$ses' AND title='$title'";
$result=mysql_query($sql);
if($result)
{
	header("Location: view_class.php?status=1");
}
else
{
	header("LOcation: view_class.php?status=2");
}
 ?>