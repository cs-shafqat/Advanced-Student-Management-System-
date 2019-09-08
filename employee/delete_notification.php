<?php require("../require/connection.php");
require("../require/sessions.php");
function base64url_encode($data) { 
  return rtrim(strtr(base64_encode($data), '+/', '-_'), '='); 
} 
function base64url_decode($data) { 
  return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT)); 
} 
$reg=$_SESSION['reg'];
if (isset($_GET['id'])) {
  $id=base64url_decode($_GET['id']);
  $sql="DELETE FROM notification WHERE notification_id='$id' ";
  $result=mysql_query($sql);
  
  $data=base64url_encode("2");
  mysql_close($connection);
  header("Location: view_notification.php?id=$data");
}
  
  ?>