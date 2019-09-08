<?php require("../require/connection.php");
  require("../require/sessions.php");
  $id=$_SESSION['username'];
$s=$_SESSION['ses'];
$reg=$_SESSION['reg'];
if (isset($_POST['submit'])) {
	$title=$_POST['title'];
	$type=$_POST['type'];
	$content=$_POST['content'];
	$created_by=$_POST['name'];
	if(strstr($id,"EMP")){
		$sql="SELECT * FROM employee WHERE employee_name= '$id' AND school_reg='$reg' ";
	    $result=mysql_query($sql);
	    $row=mysql_fetch_array($result);
		$image_path=$row['image_path'];
	}else{
		$sql="SELECT * FROM school_admin WHERE user_name= '$id' AND school_reg='$reg' ";
	    $result=mysql_query($sql);
	    $row=mysql_fetch_array($result);
		$image_path=$row['image_path'];
		
	}
	$d=date("Y-m-d h:i:s");
	
	$sql1="INSERT INTO notification(title, type, content, date, created_by, session, school_reg, image_path) 
										 VALUES('$title', '$type', '$content', '$d', '$created_by', '$s', '$reg', '$image_path')";
	$result1=mysql_query($sql1);
		if($result1){	
			
				$sql2="SELECT notification_count, id FROM school_admin WHERE school_reg='$reg' ";
			    $result2=mysql_query($sql2);
			    
			    while ($row2=mysql_fetch_array($result2)) {
			    	$nc=$row2['notification_count']+1;
			    	$aid=$row2['id'];
			    	$sql="UPDATE school_admin SET notification_count='$nc' WHERE id= '$aid' AND school_reg='$reg'";
    				$result=mysql_query($sql);

			    }
				
			if (strchr($type,"E")) {
				$sql2="SELECT notification_count, employee_id FROM employee WHERE school_reg='$reg' ";
			    $result2=mysql_query($sql2);
			    
			    while ($row2=mysql_fetch_array($result2)) {
			    	$nc=$row2['notification_count']+1;
			    	$aid=$row2['employee_id'];
			    	$sql="UPDATE employee SET notification_count='$nc' WHERE employee_id= '$aid' AND school_reg='$reg'";
    				$result=mysql_query($sql);
    			}
			}
			if (strchr($type,"S")) {
				$sql2="SELECT notification_count, student_id FROM student WHERE school_reg='$reg' ";
			    $result2=mysql_query($sql2);
			    
			    while ($row2=mysql_fetch_array($result2)) {
			    	$nc=$row2['notification_count']+1;
			    	$aid=$row2['student_id'];
			    	$sql="UPDATE student SET notification_count='$nc' WHERE student_id= '$aid' AND school_reg='$reg'";
    				$result=mysql_query($sql);
    			}
			}
			if (strchr($type,"P")) {
				$sql2="SELECT notification_count, parent_id FROM parent WHERE school_reg='$reg' ";
			    $result2=mysql_query($sql2);
			    
			    while ($row2=mysql_fetch_array($result2)) {
			    	$nc=$row2['notification_count']+1;
			    	$aid=$row2['parent_id'];
			    	$sql="UPDATE parent SET notification_count='$nc' WHERE parent_id= '$aid' AND school_reg='$reg'";
    				$result=mysql_query($sql);
    			}
			}
			mysql_close($connection);
		header("Location: view_notification.php?status=1");
		}
		else if(!$result)
		{
			mysql_close($connection);
			header("Location: add_notification.php?status=2 ");
		}					
}
?>