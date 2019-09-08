<?php require("../require/connection.php");
  require("../require/sessions.php");
$ses=$_SESSION['ses'];
$reg=$_SESSION['reg'];
$fine=$_POST['fine'];
$description=$_POST['discription'];
$amount=$$_POST['amount'];
$sql="UPDATE fine SET fine_tital='$fine', fine_discription='$description', amount='$amount' WHERE school_reg='$reg' AND session='$ses' AND fine_tital='$fine'";
$result=mysql_query($sql);
if($result)
{
	header("Location: view_fine.php?status=1");
}
else
{
	header("Location: view_fine.php?status=2");
}
?>