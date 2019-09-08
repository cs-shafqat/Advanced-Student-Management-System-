
<?php require("../require/connection.php");
  require("../require/sessions.php");
 ?>
 

<!DOCTYPE html>
<html lang="en">
<head>
  <?php include("files.php");
        include("js.php"); 
      ?>
</head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">

            <div class="clearfix"></div>

            <?php include("userinfo.php");
            ?>


            <?php
           if ($type=="S"){
              include("sidebarmenu_student.php");
              }
              elseif($type=="P"){
                include("sidebarmenu_parent.php");
                }
                elseif ($type=="E") {
                   include("sidebarmenu_employee.php");
                 } ?>      
            
          </div>
        </div>

        
        <?php include("topnav.php"); ?>
        


        




<!-- page content -->
        <div class="right_col" role="main">

            
          <div class="" style="min-height:1000px">
          <?php $sql="SELECT school_name FROM school WHERE registration_number='$reg'";
          $result=mysql_query($sql);
          $row=mysql_fetch_array($result); ?>
           <h4 style="text-align:center;"><b><?php echo $row['school_name']."</b><br><b>Current Session</b> : ".$_SESSION['ses'];?></h4>

            