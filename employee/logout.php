<?php
require("../require/sessions.php");
require("../require/connection.php");

session_unset();
session_destroy();
mysql_close($connection);
header("location:../index.php");
exit();
?>