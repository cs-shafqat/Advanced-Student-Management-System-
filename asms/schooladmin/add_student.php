<!DOCTYPE html>

<?php require("../require/connection.php");
  require("../require/sessions.php");

include("up.php");

?>
<title>Add Student</title>
    <div class="col-md-8 col-md-offset-2 ">
                <div class="testbox" style=" min-height:30px;" >
                      <?php       if (isset($_GET['status']) && $_GET['status'] == '1' ) {
                                  echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:green'>Record Entered Successfully!</span>";
                                  } else if (isset($_GET['status']) && $_GET['status'] == '2'){
                                      echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:red'> Sorry There is some issue, Try Again</span>";
                                    }
                           ?>  
                            </div>


      

            
                  <?php  
                 	include("add_student_form.php") ;
                 
                 ?>                 
                    <div class="clearfix"></div>
                
              </div>
<?php include("down.php") ?> 