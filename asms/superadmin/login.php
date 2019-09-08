<?php
require("../require/connection.php"); 
if(isset($_GET['id']))
$id=$_GET['id'];


// if($_SESSION['username'] == "" || $_SESSION['password'] == "" || $_SESSION['type']=="")
// 	header("Location: login.php");


$myusername=$_POST['username']; 

		// To protect MySQL injection (more detail about MySQL injection)
		$mypassword=md5($_POST['password']);
		
		$sql="SELECT * FROM super_admin WHERE user_name='$myusername' AND password='$mypassword'";
		$result=mysql_query($sql);
		
		// Mysql_num_row is counting table row
		$count=mysql_num_rows($result);
		$row=  mysql_fetch_array($result);
		// If result matched $myuseqrname and $mypassword, table row must be 1 row
		if($count==1)
		{
		// Register $myusername, $mypassword and redirect to file "login_success.php"
		
		session_start();
		
		$_SESSION['username']=$myusername;
		$_SESSION['password']=$mypassword;
		$_SESSION['type']=$id;
                if($row['login_count']==0){
                header("Location: firstpasschange.php");}
            else {
                		header("Location: welcome.php");

            exit( );
            }	}
	
		else 
		{
			session_start();
			$_SESSION['error_message']="Authentication failed, check username and password.";
			header("Location: index.php");
			exit( );
				}

		


?>