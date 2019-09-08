<?php
require("../require/connection.php"); 
	require("../require/sessions.php");

if(isset($_POST['username'])){ // Check for the username posted
    $username       = $_POST['username']; // Get the username values
    $sql_check   = mysql_query(" SELECT * FROM super_admin WHERE user_name = '$username' "); // Check the database
    if(mysql_num_rows($sql_check)>0) {
    	echo '1';
    } 
	else {
    	echo '0';
    }
}
if(isset($_POST['username1'])){ // Check for the username posted
    $username       = $_POST['username1']; // Get the username values
    $sql_check   = mysql_query(" SELECT * FROM school_admin WHERE user_name = '$username' "); // Check the database
    if(mysql_num_rows($sql_check)>0) {
        echo '1';
    } 
    else {
        echo '0';
    }
}
if(isset($_POST['reg'])){ 
    $reg       = $_POST['reg']; 
    $sql_check   = mysql_query(" SELECT * FROM school WHERE registration_number = '$reg' "); 
    if(mysql_num_rows($sql_check)>0) {
    	echo '1';
    } 
	else {
    	echo '0';
    }
}
?>