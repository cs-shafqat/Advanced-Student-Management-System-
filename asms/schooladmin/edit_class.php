<?php
require("../require/connection.php");
  require("../require/sessions.php") ;
  $id=$_SESSION['username'];
  $reg=$_SESSION['reg'];
 include("up.php");
 if (isset($_GET['id'])) {
  $id=$_GET['id'];
  $sql = "SELECT * FROM class WHERE title='$id' AND school_reg = '$reg' ";
  $result=mysql_query($sql);
  $row=mysql_fetch_array($result);
  

  ?>
  
<div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-2">
   
              <div class="x_panel">
                <div class="x_title">
                  <h2>Edit Class</h2>
                  
                     
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                <form class="form-horizontal form-label-left input_mask" method="post" action="edit_class_process.php" >
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Class Title 
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" class="form-control" name="title" readonly="true" value="<?php echo $row['title']; ?>" required="required" >
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Max Strength 
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" class="form-control" id="txtNumeric" name="count" value="<?php echo $row['max_count']; ?>" required="required" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Class Incharge ID
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select class="select2_single form-control " name="class_incharge_id"  required="required" tabindex="-1">
                    <option value="<?php echo $row['class_incharge_id']; ?>"><?php echo $row['class_incharge_id']; ?></option>
                    <?php
                                 
                                  $reg=$_SESSION['reg'];
                                  $sql2 = "SELECT * FROM employee WHERE school_reg= '$reg'";
                                  $result2=mysql_query($sql2);
                                  
                                  if (mysql_num_rows($result2) > 0) {
                                  // output data of each row
                                  while($row2 = mysql_fetch_array( $result2 ))
                                   {
                                    if ($row2['employee_name']==$row['class_incharge_id']) {
                                      continue;
                                    }
                                    
                                    ?>
                                      <option value="<?php echo $row2['employee_name'] ?>" ><?php echo $row2['employee_name']; ?></option>
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
                     

                      <a href="edit_class.php">  <button type="button" class="btn btn-defalt col-md-3 col-sm-3 col-xs-12" name="cencel" style="width:120px">Cancel</button></a>
                      <button type="submit" class="btn btn-success col-md-3 col-sm-3 col-xs-12" name="submit" style="width:120px">Update</button>
                        
                      
                    </div>
                </div>
                </form>
              </div>
            </div>
              <div class="clearfix"></div>
            <?php } include("down.php");