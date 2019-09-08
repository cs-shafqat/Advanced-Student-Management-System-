<!DOCTYPE html>
<?php require("../require/connection.php");
  require("../require/sessions.php");
$reg=$_SESSION['reg'];
$ses=$_SESSION['ses'];
include("up.php");

  ?>
  <title>Extra Fees</title>
  <div class="col-md-8 col-md-offset-2 ">


                 <div class="testbox" style=" min-height:30px;" >
                            <?php if (isset($_GET['status']) && $_GET['status'] == '1') {
                                  echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:green'>Record Entered Successfully!</span>";
                                  } else if (isset($_GET['status']) && $_GET['status'] == '2'){
                                      echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:red'> Sorry There is some issue, Try Again</span>";
                                    }
                              ?>
                            </div>



<div class="x_panel">
                <div class="x_title">
                  <h2>Extra Fees</h2>
                  
                     
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                <form class="form-horizontal form-label-left input_mask" method="post" action="extra_fees_process.php" >
                 <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Class
                    </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                      <select class="select2_single form-control " name="class_tital" id="class_tital" required="required" tabindex="-1">
                    <option value="">--select--</option>
                    <?php
                                 
                                  $reg=$_SESSION['reg'];
                                  
                                  $sql2 = "SELECT * FROM class WHERE school_reg= '$reg' AND session='$ses'";
                                  $result2=mysql_query($sql2);
                                  
                                  if (mysql_num_rows($result2) > 0) {
                                  // output data of each row
                                  while($row2 = mysql_fetch_array( $result2 ))
                                   {
                                   
                                    ?>
                                      <option value="<?php echo $row2['title'] ?>" ><?php echo $row2['title']; ?></option>
                                    <?php
                                   
                                   }
                            }  else {
                            echo "No result Found";
                            }
                            ?>

                  </select> 
                    </div>
                  </div>

                  
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Fee
                    </label>
                   <div class="col-md-6 col-sm-6 col-xs-12">
                      <select class="select2_single form-control " name="extra_fee" id="extra_fee" required="required" tabindex="-1">
                    <option value="">--select--</option>
                    <?php
                                 
                                  $reg=$_SESSION['reg'];
                                  
                                  $sql2 = "SELECT * FROM extra_fees WHERE school_reg= '$reg' AND session='$ses'";
                                  $result2=mysql_query($sql2);
                                  
                                  if (mysql_num_rows($result2) > 0) {
                                  // output data of each row
                                  while($row2 = mysql_fetch_array( $result2 ))
                                   {
                                   
                                    ?>
                                      <option value="<?php echo $row2['extra_fee_tital'] ?>" ><?php echo $row2['extra_fee_tital']; ?></option>
                                    <?php
                                   
                                   }
                            }  else {
                            echo "No result Found";
                            }
                            ?>

                  </select> 
                    </div>
                
                  </div>
                 
                    
                  
                  

                  <div class="ln_solid"></div>
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                    <div class="form-group ">
                     

                                           
                        <button type="submit" class="btn btn-success col-md-6 col-md-offset-6 col-sm-3 col-xs-12" name="submit" style="width:120px">Fine</button>
                        
                      
                    </div>
                </div>
                </form>
              </div>
            </div>
    
                    

</div>
           
        
<div class="clearfix"></div>
              
                              <?php
  
  mysql_close($connection);
  ?>
     
<?php include("down.php") ?> 