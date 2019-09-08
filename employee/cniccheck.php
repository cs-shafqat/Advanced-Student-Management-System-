<?php
require("../require/connection.php"); 
	require("../require/sessions.php");

if(isset($_POST['scnic'])){ // Check for the username posted
    $scnic       = $_POST['scnic']; // Get the username values
    $sql_check   = mysql_query(" SELECT * FROM student WHERE cnic = '$scnic' "); // Check the database
    if(mysql_num_rows($sql_check)>0) {
    	echo '1';
    } 
	else {
    	echo '0';
    }
}
if(isset($_POST['ecnic'])){ 
    $ecnic       = $_POST['ecnic']; 
    $sql_check   = mysql_query(" SELECT * FROM employee WHERE cnic = '$ecnic' "); 
    if(mysql_num_rows($sql_check)>0) {
    	echo '1';
    } 
	else {
    	echo '0';
    }
}
if(isset($_POST['pcnic'])){ 
    $pcnic       = $_POST['pcnic']; 
    $sql_check   = mysql_query(" SELECT * FROM parent WHERE cnic = '$pcnic' "); 
    if(mysql_num_rows($sql_check)>0) {
        echo '1';
    } 
    else {
        echo '0';
    }
}
?>