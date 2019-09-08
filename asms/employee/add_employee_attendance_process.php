<?php require("../require/connection.php");
  require("../require/sessions.php");
$reg=$_SESSION['reg'];


$sql="SELECT * FROM employee WHERE school_reg = '$reg' ORDER BY employee_name ASC";
$result=mysql_query($sql);

if (mysql_num_rows($result) > 0) {
	date_default_timezone_set('Asia/Karachi'); 
    $d=date("Y-m-d ");
	
	
	$sql2="SELECT * FROM employee_attendance WHERE date='$d' AND school_reg='$reg'";
	$result2=mysql_query($sql2);
	$r=mysql_num_rows($result2);
	if($r>0){
		header("Location: add_employee_attendance.php?status=2");
		die();
		}
	
// output data of each row
while($row= mysql_fetch_array( $result) ) {
	$eid=$row['employee_name'];
	
   	$status=current($_POST);
   	date_default_timezone_set('Asia/Karachi'); 
    $d=date("Y-m-d ");
    $m=date("m");
	$sql1="INSERT INTO employee_attendance (employee_id, date, month, status, school_reg) VALUES ('$eid','$d','$m','$status', $reg)";
	$result1=mysql_query($sql1); 
	next($_POST);
	
}
mysql_close($connection);
header("Location: add_employee_attendance.php?status=1");
}

else{
header("Location: add_employee_attendance.php?status=2");
}
?>