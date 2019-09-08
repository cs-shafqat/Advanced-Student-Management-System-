<?php
require("../require/connection.php");
require("../require/sessions.php");
if(isset($_POST['submit']))
{
  $class=$_GET['class'];
  $id1=$_GET['id1'];
  $reg=$_SESSION['reg'];
  $ses=$_SESSION['ses'];
  if($id1==1)
  {
    $sql="SELECT * FROM employee WHERE school_reg = '$reg'  ORDER BY employee_name ASC";
    $result=mysql_query($sql);

if (mysql_num_rows($result) > 0) {
  $d=$_GET['date'];
  
  
  
  
// output data of each row
while($row= mysql_fetch_array( $result) ) {
  $sid=$row['employee_name'];
    $status=current($_POST);
  $sql1="UPDATE employee_attendance SET status='$status' WHERE employee_id='$sid' AND date='$d' AND school_reg='$reg'";
  $result1=mysql_query($sql1);
  next($_POST);
    if($result)
    {
      header("Location: edit_employee_attendance.php?status=1");
    }
    else
    {
      header("Location: edit_employee_attendance.php?status=2");
    }
  }

}
}
  else if($id1==2) 
  {
    # code...
    $sql="SELECT * FROM employee WHERE school_reg = '$reg' ORDER BY employee_name ASC";
    $result=mysql_query($sql);

if (mysql_num_rows($result) > 0) {
  $d=$_GET['date'];
  
  
  $sql2="SELECT * FROM employee_attendance WHERE date='$d' AND school_reg='$reg";
  $result2=mysql_query($sql2);
  $r=mysql_num_rows($result2);
  if($r>0){
    header("Location: edit_employee_attendance.php?status=3");
    die();
    }
  
// output data of each row
while($row= mysql_fetch_array( $result) ) {
 
  $sid=$row['employee_name'];
    $status=current($_POST);
  $sub=date("m");

  $sql1="INSERT INTO employee_attendance(employee_id, date, month, status, school_reg) VALUES('$sid','$d','$sub' ,'$status', '$reg')";
  $result1=mysql_query($sql1);
  next($_POST);
  
}
mysql_close($connection);
header("Location: edit_employee_attendance.php?status=1");
}

else{
header("Location: edit_employee_attendance.php?status=2");
}
} 
}
else
{
  header("error.html"); 
}
?>