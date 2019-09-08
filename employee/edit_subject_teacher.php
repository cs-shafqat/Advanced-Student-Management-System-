<?php
  include("../include/up.php");
  $id=$_SESSION['username'];
  $reg=$_SESSION['reg'];
  $ses=$_SESSION['ses'];
 
 if(isset($_GET['id']))
 {
$id=$_GET['id'];
$id1=$_GET['id1'];

 ?>

  
  <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-2">

             

              <div class="x_panel">
                <div class="x_title">
                  <h2>Assign Class Subject</h2>
                  
                     
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                <form class="form-horizontal form-label-left input_mask" method="post" action="assign_class_process.php" >
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Class
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                       <input type="text" class="form-control" readonly="true"  value="<?php echo $id ?>" name="class" id="class"  required="required" >
                    </div>
                  </div>
                  
                  
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Subject
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" class="form-control" readonly="true"  value="<?php echo $id1 ?>" name="subject" id="subject"  required="required" > 
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Select Teacher
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select class="select2_single form-control " name="teacher" id="teacher" required="required" tabindex="-1">
                    <option value="">--select--</option>
                    <?php
                                 
                                  $reg=$_SESSION['reg'];
                                  $sql = "SELECT * FROM employee WHERE school_reg= '$reg'";
                                  $result=mysql_query($sql);
                                  
                                  if (mysql_num_rows($result) > 0) {
                                  // output data of each row
                                  while($row = mysql_fetch_array( $result ))
                                   {
                                    
                                    ?>
                                      <option value="<?php echo $row['employee_name'] ?>" ><?php echo $row['employee_name']; ?></option>
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
                     

                                           
                        <button type="submit" class="btn btn-success col-md-6 col-md-offset-6 col-sm-3 col-xs-12" name="sbmit" style="width:120px">Assign</button>
                        
                      
                    </div>
                </div>
                </form>
              </div>
            </div>
          </div>
              <div class="clearfix"></div>
            <?php } include("../include/down.php");?>