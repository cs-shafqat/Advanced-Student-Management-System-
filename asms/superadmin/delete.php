
<?php
require("../require/connection.php");
require("../require/sessions.php");
if(isset($_GET['id']))
{	
$user1= $_GET['id'];
$id= $_GET['id1'];

}
$result;
if($id==1)
{
$sql="DELETE FROM super_admin WHERE user_name = '$user1'";
$result=mysql_query($sql);
}
else if($id==2)
{
	$sql ="SELECT * FROM school_admin WHERE user_name = '$user1'";
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
	if($row['status']==0)
	{
		$sql="DELETE FROM school_admin WHERE user_name = '$user1'";
		$result=mysql_query($sql);		
	}
	else
	{
		$result=0;
	}
}
else if($id==3)
{
		$sql="DELETE FROM school WHERE registration_number = '$user1'";
		$result=mysql_query($sql);
		$sql ="SELECT * FROM school_admin_record WHERE school_reg = '$user1'";
		$result=mysql_query($sql);
		$row=mysql_fetch_array($result);
		$admin= $row['admin_id'];
		$sql="DELETE FROM school_admin_record WHERE school_reg = '$user1'";
		$result=mysql_query($sql);
		$sql="UPDATE school_admin SET status = 0 WHERE user_name = '$admin'";
		$result=mysql_query($sql);
}

if($id==1)
{
	if(!$result)
	{
	 header("Location: view_admin.php?status=4");
	}
	 else{
		header("Location: view_admin.php?status=3");
	 }
}
else if($id==2)
{
	if(!$result)
	{
	 header("Location: view_school_admin.php?status=4");
	}
	 else{
		header("Location: view_school_admin.php?status=3");
	 }
}
else if($id==3)
{
	if(!$result)
	{
	 header("Location: view_school.php?status=4");
	}
	 else{
		header("Location: view_school.php?status=3");
	 }
}
mysql_close($connection);
?>