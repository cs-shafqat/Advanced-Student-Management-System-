<!DOCTYPE html>
<?php require("../require/connection.php");
  require("../require/sessions.php");
$ses=$_SESSION['ses'];
include("up.php");
 ?>
      
<title>Add Test</title>
              <div class="col-md-8 col-md-offset-2 ">
              	<div class="testbox" style=" min-height:30px;" >
				<?php       
				if (isset($_GET['status']) && $_GET['status'] == '1' ) {
				   echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:green'>Record Entered Successfully!</span>";
				 } else if (isset($_GET['status']) && $_GET['status'] == '2'){
				  echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:red'> Sorry There is some issue, Try Again</span>";
				 }
				
				?>  
                    
				<div class="x_panel">
                <div class="x_title">
                  <h2>Add Test</h2>
                  
                     
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                <form class="form-horizontal form-label-left input_mask" method="post" action="add_test_process.php" >
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Test Title 
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" class="form-control alphaNumHyph" name="title" id="title"  required="required" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Class
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select class="select2_single form-control " name="class" id="class" required="required" tabindex="-1">
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

                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Subject</label>
                          <div class="col-md-6 col-sm-6 col-xs-12">
                          <select class="select2_single form-control" name="subject_code" required="required" tabindex="-1">
                    <option value="">--select--</option>
                    <?php
                                  
                                  $sql3 = "SELECT * FROM subject_class_record WHERE school_reg='$reg'  AND session='$ses' ";
                                  $result3=mysql_query($sql3);
                                  
                                  if (mysql_num_rows($result3) > 0) {
                                  // output data of each row
                                  while($row3 = mysql_fetch_array( $result3 )) {
                                  
                                  ?>
                    <option value="<?php echo $row3['subject_code']; ?>" ><?php echo $row3['subject_code']."   (".$row3['subject_title'].")"; ?></option>
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
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Total Marks 
                    </label>
                   <div class="col-md-6 col-sm-6 col-xs-12">
                  <input class="date-picker form-control col-md-7 col-xs-12 num" maxlength="2" name="tmarks" required="required" type="text" >
                </div>
                  </div>
                
                  </div>
                  
                  

                  <div class="ln_solid"></div>
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                    <div class="form-group ">
                     

                                           
                        <button type="submit" class="btn btn-success col-md-6 col-md-offset-6 col-sm-3 col-xs-12" name="submit" style="width:120px">Add</button>
                        
                      
                    </div>
                </div>
                </form>
              </div>
            </div>


               
                     <div class="clearfix"></div>
                
              </div>
              <div class="clearfix"></div>
<?php include("down.php") ?> 