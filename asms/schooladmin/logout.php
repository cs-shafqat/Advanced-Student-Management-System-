<?php
require("../require/sessions.php");
require("../require/connection.php");

session_unset();
session_destroy();

header("location:index.php");
mysql_close($connection);
exit();
?>