<?php


$servername = "localhost";
$username 	= "root";
$password 	= "";
$dbname 	= "asmseduc_v16";

// Create connection
$connection = mysql_connect($servername, $username, $password);
// Check connection
if (!$connection) {
    die("Connection failed: " . mysql_error());
} 

$mydatabase = mysql_select_db($dbname,$connection) ; 
if(!$mydatabase) die("Database Selection failed".mysql_error());


?>