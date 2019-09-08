<?php 
	require("../require/connection.php");
	require("../require/sessions.php") ;
	
if(isset($_POST['submit_cnic']))	
{
	$pcnic=$_POST['pcnic'];
	$reg=$_SESSION['reg'];
	if (isset($_GET['id'])) {
		# code...
		$id=$_GET['id'];
	}
	
$sql="SELECT * FROM parent WHERE cnic= '$pcnic' AND school_reg='$reg'";
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
		  
		   if($row>0)
		   {
		   ?>
		    		<div class="col-md-12 ">
		                          
		            <?php 
		            if (strstr($id,"SDT")) {
		            header("Location: view_parent_confirm.php?id=$id & check1=$pcnic");
		        }else{
		        	header("Location: view_parent_confirm.php?check1=$pcnic");
		        	}
		            ?>   
		                     <div class="clearfix"></div>
		                
		              </div>
		        }
		    <?php
		   }
		     else
		     {
		     	if (strstr($id,"SDT")) {
		     		 header("Location:add_parent.php?id9=$id & id2=$pcnic");
		                
		           
		    } else{
		    	
		           header("Location:add_parent.php?id2=$pcnic");   
		                    
		                
		            
		   }
		    }
		 }
		 mysql_close($connection);
	?>