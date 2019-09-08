<!DOCTYPE html>
<?php require("../require/connection.php");
  require("../require/sessions.php");
$ses=$_SESSION['ses'];
$reg=$_SESSION['reg'];
include("up.php");
 ?>
      

            

              
             


              <div class="col-md-12 ">

              	
              	<?php
        $sql="SELECT * FROM student WHERE school_reg='$reg' AND session='$ses'";
        $result=mysql_query($sql);
        $s=mysql_num_rows($result);
        $sql2="SELECT * FROM employee WHERE school_reg='$reg'";
        $result2=mysql_query($sql2);
        $e=mysql_num_rows($result2);
        $sql3="SELECT * FROM parent WHERE school_reg='$reg'";
        $result3=mysql_query($sql3);
        $p=mysql_num_rows($result3);
        $t=$e+$s+$p;
         ?>
              	<!-- top tiles -->
          <div class="row tile_count">
            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-users" ></i><b > Total Users</b></span>
              <div class="count green"><?php echo $t ?></div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i><b>Employee</b></span>
              <div class="count green"><?php echo $e ?></div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i><b>Student</b></span>
              <div class="count green"><?php echo $s ?></div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i><b>Parent<b> </span>
              <div class="count green"><?php echo $p ?></div>
            </div>
           
          </div>
          <!-- /top tiles -->
          <div class="bs-example" data-example-id="simple-jumbotron">
                    <div class="jumbotron" style="background:white;">
                      <p style="text-align:center;">About System:</p>
                      <p style="text-align:justify;"><small>Advance School Management System (ASMS) is a web based system. The web application is main part of our project. Web application facilitates all users (site admin, admin, students, parents and other employees) to perform their regular tasks e.g. super admin can edit profiles, add/remove schools from the system, add/remove school admins, subscribe/unsubscribe schools etc. Similarly, admin can register students and can perform other administrative tasks as well. The main feature of our project is to authorize parents to access their children’s record with a separate profile so that they can have all the updates (academic, extracurricular, class schedule, fee etc.) regarding their ward. ASMS also provides Parent Teacher Meeting (PTM) feature, so that parents and teachers can have a friendly interaction without indulging students in between.</small></p>
                    </div>
                  </div>


                          
               
                     <div class="clearfix"></div>
                
              </div>
              <div class="clearfix"></div>
<?php include("down.php") ?> 