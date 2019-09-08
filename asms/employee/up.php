<!DOCTYPE html>
<?php require("../require/connection.php");
  require("../require/sessions.php");
 ?>
 

<!DOCTYPE html>
<html lang="en">
<head>
  <?php include("../include/files.php"); 
  include("js.php");
      ?>
</head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">

            <div class="clearfix"></div>

            <?php include("../include/userinfo.php"); ?>


            <?php include("../include/sidebarmenu_employee.php"); ?>           
            
          </div>
        </div>

        <!-- top navigation -->
        <?php include("../include/topnav.php"); ?>
        <!-- /top navigation -->


        




<!-- page content -->
        <div class="right_col" role="main">

            
          <div class="" style="min-height:1300px">
           <?php $sql="SELECT school_name FROM school WHERE registration_number='$reg'";
          $result=mysql_query($sql);
          $row=mysql_fetch_array($result); ?>
           <h1 style="text-align:center;"><b><?php echo $row['school_name']."</b><small><br>Current Session : ".$_SESSION['ses'];?></small></h1>
