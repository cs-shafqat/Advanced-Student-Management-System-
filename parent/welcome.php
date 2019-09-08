<?php
 require("../require/sessions.php");
  $check123=substr($_SESSION['username'], 0,3);
  if($check123!="PAR"){
    session_unset();
    session_destroy();
    header("location:../index.php");
    exit();
  }
include("../include/up.php");
 ?>
      

              <div class="col-md-12 ">
                          
               <div class="bs-example" data-example-id="simple-jumbotron">
                    <div class="jumbotron" style="background:white;">
                      <p style="text-align:center;">About System:</p>
                      <p style="text-align:justify;"><small>Advance School Management System (ASMS) is a web based system. The web application is main part of our project. Web application facilitates all users (site admin, admin, students, parents and other employees) to perform their regular tasks e.g. super admin can edit profiles, add/remove schools from the system, add/remove school admins, subscribe/unsubscribe schools etc. Similarly, admin can register students and can perform other administrative tasks as well. The main feature of our project is to authorize parents to access their children’s record with a separate profile so that they can have all the updates (academic, extracurricular, class schedule, fee etc.) regarding their ward. ASMS also provides Parent Teacher Meeting (PTM) feature, so that parents and teachers can have a friendly interaction without indulging students in between.</small></p>
                    </div>
                  </div>

                     
                
              </div>
              <div class="clearfix"></div>
<?php include("../include/down.php"); ?> 