<?php
require("require/connection.php");

$type=$_POST['type'];
if($type=='Employee')
{
	include("employee/login.php");
}
else if ($type=='Student') {
 	include("student/login.php");
 	echo 'login';

 }
else if($type=='Parent'){
	include("parent/login.php");
}
else
{
	echo 'not found';
}
?>