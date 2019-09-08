<?php require("../require/connection.php");
  require("../require/sessions.php");
  $reg_no = $_POST['rno'];
  $old = $_POST['old_admin'];
  $new = $_POST['new_admin'];

  $sql ="UPDATE school_admin_record SET admin_id = '$new'  WHERE school_reg = '$reg_no'";
  $result=mysql_query($sql);
  $sql1 ="UPDATE school_admin SET status = '1' , school_reg='$reg_no' WHERE user_name = '$new'";
  $result1=mysql_query($sql1);
  $sql2 ="UPDATE school_admin SET status = '0' , school_reg='0' WHERE user_name = '$old'";
  $result2=mysql_query($sql2); 
  if(!($result && $result1 && $result2))
{
 header("Location: view_school_admin.php?status=2");
}
 else{
	header("Location: view_school_admin.php?status=1");
 }
mysql_close($connection);
  ?>