<?php
require("../require/connection.php");
require("../require/sessions.php");
$user=$_SESSION['username'];
$type=$_SESSION['type'];
if($type==1)
{	
$sql="UPDATE super_admin SET login_count='0' WHERE user_name='$user'";
$result=mysql_query($sql);
header("Location:logout.php");
}
if($type==2)
{
	$sql="UPDATE school_admin SET login_status='0' WHERE user_name='$user'";
$result=mysql_query($sql);
header("Location:../schooladmin/logout.php");
}
mysql_close($connection);
 ?>