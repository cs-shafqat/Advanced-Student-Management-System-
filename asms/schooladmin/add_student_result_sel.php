 <?php 
require("../require/connection.php");
require("../require/sessions.php");
$reg=$_SESSION['reg'];
$ses=$_SESSION['ses'];
include("up.php");
    if (isset($_GET['id']) && $_GET['id'] == '1' ) {
           echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:green'>Record Entered Successfully!</span>";
         } else if (isset($_GET['id']) && $_GET['id'] == '2'){
          echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:red'> Sorry There is some issue, Try Again</span>";
         }
         else if (isset($_GET['id']) && $_GET['id'] == '3'){
          echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:red'> Result Already Uploaded.!! Contact Admin for Editing.!!</span>";
         }

?>
<title>Add Result</title>
 <form class="form-horizontal form-label-left" accept-charset="utf-8" action="add_student_result.php" method="post">
                    
                      <div class="row">
                      <div class="col-md-3 col-md-offset-2">
                        <div class="form-group">
                        <label class="control-label" style="margin-bottom: 5px;">Class</label>
                          <select class="select2_single form-control" name="title" required="required" tabindex="-1">
                    <option value="">--select--</option>
                    <?php
                                  
                                  $sql3 = "SELECT * FROM class WHERE school_reg='$reg' AND session='$ses' ";
                                  $result3=mysql_query($sql3);
                                  
                                  if (mysql_num_rows($result3) > 0) {
                                  // output data of each row
                                  while($row3 = mysql_fetch_array( $result3 )) {
                                  
                                  ?>
                    <option value="<?php echo $row3['title']; ?>" ><?php echo $row3['title']; ?></option>
                    <?php
                            }
                            }  else {
                            echo "No result Found";
                            }
                            ?>

                  </select>
                        </div>
                      </div>
                      <div class="col-md-3 ">
                        <div class="form-group">
                        <label class="control-label" style="margin-bottom: 5px;">Result Type</label>
                          <select class="select2_single form-control" name="rtype" required="required" tabindex="-1">
                    <option value="">--select--</option>
          
                                  
                                  
                    <option value="1" >Test Result</option>
                    <option value="2" >Exam Result</option>
                  </select>
                        </div>
                      </div>
                      <div class="col-md-2" style="margin-top: 30px;">
                            <button type="submit" name="submit" class="btn btn-info">Select Class</button>
                          </div>
                    </div>
                  </from>
<?php include("down.php");
?>