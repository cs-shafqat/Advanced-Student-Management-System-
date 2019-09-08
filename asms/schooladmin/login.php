<?php
require("../require/connection.php"); 
if(isset($_GET['id']))
	$id=$_GET['id'];

// if($_SESSION['username'] == "" || $_SESSION['password'] == "" || $_SESSION['type']=="")
// 	header("Location: login.php");


$myusername=$_POST['username']; 

		// To protect MySQL injection (more detail about MySQL injection)
		$mypassword=md5($_POST['password']);
		
		$sql="SELECT * FROM school_admin WHERE user_name='$myusername' and password='$mypassword'";
		$result=mysql_query($sql);
		
		// Mysql_num_row is counting table row
		$count=mysql_num_rows($result);
		$row=  mysql_fetch_array($result);
		$reg=$row['school_reg'];
		$sql1="SELECT * FROM school WHERE registration_number='$reg'";
		$result1=mysql_query($sql1);
		$row1=mysql_fetch_array($result1);
		$sql3="SELECT * FROM session WHERE status='1' AND school_reg='$reg'";
		$result3=mysql_query($sql3);
		$row3=mysql_fetch_array($result3);
		$ses=$row3['session_tital'];
		$status=$row1['status'];
		// If result matched $myuseqrname and $mypassword, table row must be 1 row
		if($count==1)
		{
		// Register $myusername, $mypassword and redirect to file "login_success.php"
			if($status==1)
			{
					session_start();
					
					$_SESSION['username']=$myusername;
					$_SESSION['password']=$mypassword;
					$_SESSION['type']=$id;
					$_SESSION['reg']=$reg;
					$_SESSION['ses']=$ses;
			          		if($row['login_status']==0)
			          		{
			                	header("Location: firstpasschange.php");
			                }
			            	else 
			            	{
			                	header("Location:welcome.php");

			            		exit( );
			                }
            }
            else
            {
            	header("Location: unsubscribed.php");
            }	
        }
	
		else 
		{
			session_start();
			$_SESSION['error_message']="Authentication failed, check username and password.";
			header("Location: index.php");
			exit( );
				}

		


?>