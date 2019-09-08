  <?php include("../include/up.php") ?>
  <div class="col-md-8 col-md-offset-2">
    <div class="testbox" style=" min-height:30px;" >
                            <?php if (isset($_GET['status']) && $_GET['status'] == '1') {
                                  echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:green'>Record Entered Successfully!</span>";
                                  } else if (isset($_GET['status']) && $_GET['status'] == '2'){
                                      echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:red'> Sorry There is some issue, Try Again</span>";
                                    }
                              ?>
                            </div>
                            <?php if (!isset($_POST['submit'])) {?>
                             
                            <form class="form-horizontal form-label-left input_mask" method="post" action="employee_authorities.php" >
                              <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Employee Id 
                              </label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="select2_single form-control " name="employee_name" required="required" tabindex="-1">
                              <option value="">--select--</option>
                              <?php
                                  
                                  $sql2 = "SELECT * FROM employee WHERE school_reg= '$reg'";
                                  $result2=mysql_query($sql2);
                                  
                                  if (mysql_num_rows($result2) > 0) {
                                  // output data of each row
                                  while($row2 = mysql_fetch_array( $result2 ))
                                   {
                                    if ($row2['employee_name']==$id) {
                                      continue;
                                    }?>
                                      <option value="<?php echo $row2['employee_name'] ?>" ><?php echo $row2['employee_name']; ?></option>
                                    <?php
                                    
                                   }
                            }  else {
                            echo "No result Found";
                            }
                            ?>

                  </select> 
                              </div>
                              <button type="submit" class="btn btn-success col-md-3 col-sm-3 col-xs-12" name="submit" style="width:150px">Enter</button>
                            </div>
                            </form>
                            <?php }
                            else{ ?>
   
    <div class="x_panel">
      <div class="x_title">
        <h2>Update Employee Authorities</small></h2>
        
        <div class="clearfix"></div>
      </div>
     
     <?php
     $reg=$_SESSION['reg'];
     if (isset($_POST['employee_name'])) {
       $id=$_POST['employee_name'];
     }
     $sql="SELECT * FROM employee_authority WHERE user_id='$id' AND school_reg='$reg' ";
                $result=mysql_query($sql);
                $row1=mysql_fetch_array($result);
                 ?>
        
            <form class="form-horizontal form-label-left input_mask" method="post" action="update_authorities_process.php" >
                <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Employee Id 
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" name="employee_name" readonly="true" required="required" placeholder="Employee Id " value="<?php echo $id; ?>">
                </div>
              </div>
                <div class="form-group">
                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Authorities</label>

                <div class="col-md-9 col-sm-9 col-xs-12">
                  
                  <h2 style="background-color:#DAF7A6;display:inline-block;">Student</h2>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="authority[]" <?php if ($row1['a_1']=="1") { ?>
                   checked="true"
             <?php   } ?> value="1" >Add Student
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="authority[]" <?php if ($row1['a_2']=="1") { ?>
                   checked="true"
             <?php   } ?> value="2"> view Student
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="authority[]" <?php if ($row1['a_3']=="1") { ?>
                   checked="true"
             <?php   } ?> value="3"> Edit Student
                    </label>
                  </div>
                  <h2 style="background-color:#DAF7A6;display:inline-block;">Student Attendance</h2>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="authority[]" <?php if ($row1['a_4']=="1") { ?>
                   checked="true"
             <?php   } ?> value="4" >Add Student Attendance
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="authority[]" <?php if ($row1['a_5']=="1") { ?>
                   checked="true"
             <?php   } ?> value="5"> view Student Attendance
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="authority[]" <?php if ($row1['a_6']=="1") { ?>
                   checked="true"
             <?php   } ?> value="6"> Edit Student Attendance
                    </label>
                  </div>
                  <h2 style="background-color:#DAF7A6;display:inline-block;">Student Result</h2>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="authority[]" <?php if ($row1['a_7']=="1") { ?>
                   checked="true"
             <?php   } ?> value="7" >Add Student Result
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="authority[]" <?php if ($row1['a_8']=="1") { ?>
                   checked="true"
             <?php   } ?> value="8"> view Student Result
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="authority[]" <?php if ($row1['a_9']=="1") { ?>
                   checked="true"
             <?php   } ?> value="9"> Edit Student Result
                    </label>
                  </div>
                  <h2 style="background-color:#DAF7A6;display:inline-block;">Student Request</h2>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="authority[]" <?php if ($row1['a_10']=="1") { ?>
                   checked="true"
             <?php   } ?> value="10">view Student Request
                    </label>
                  </div>
                  <h2 style="background-color:#DAF7A6;display:inline-block;">Employee</h2>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="authority[]" <?php if ($row1['a_11']=="1") { ?>
                   checked="true"
             <?php   } ?> value="11" > Add Employee
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="authority[]" <?php if ($row1['a_12']=="1") { ?>
                   checked="true"
             <?php   } ?> value="12"> view Employee 
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="authority[]" <?php if ($row1['a_13']=="1") { ?>
                   checked="true"
             <?php   } ?> value="13"> Edit Employee
                    </label>
                  </div>
                  <h2 style="background-color:#DAF7A6;display:inline-block;">Employee Attendance</h2>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="authority[]" <?php if ($row1['a_14']=="1") { ?>
                   checked="true"
             <?php   } ?> value="14" > Add Employee Attendance
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="authority[]" <?php if ($row1['a_15']=="1") { ?>
                   checked="true"
             <?php   } ?> value="15"> view Employee Attendance
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="authority[]" <?php if ($row1['a_16']=="1") { ?>
                   checked="true"
             <?php   } ?> value="16"> Edit Employee Attendance
                    </label>
                  </div>
                  <h2 style="background-color:#DAF7A6;display:inline-block;">Employee Request</h2>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="authority[]" <?php if ($row1['a_17']=="1") { ?>
                   checked="true"
             <?php   } ?> value="17">view Employee Request
                    </label>
                  </div>
                  <h2 style="background-color:#DAF7A6;display:inline-block;">Class</h2>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="authority[]" <?php if ($row1['a_18']=="1") { ?>
                   checked="true"
             <?php   } ?> value="18"> Add Class
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="authority[]" <?php if ($row1['a_19']=="1") { ?>
                   checked="true"
             <?php   } ?> value="19"> view Class
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="authority[]" <?php if ($row1['a_20']=="1") { ?>
                   checked="true"
             <?php   } ?> value="20"> Edit Class
                    </label>
                  </div>
                  <h2 style="background-color:#DAF7A6;display:inline-block;">Assigning Course</h2>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="authority[]" <?php if ($row1['a_21']=="1") { ?>
                   checked="true"
             <?php   } ?> value="21"> Assigning Course to Employee 
                    </label>
                  </div>
                  <h2 style="background-color:#DAF7A6;display:inline-block;">Other</h2>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="authority[]" <?php if ($row1['a_22']=="1") { ?>
                   checked="true"
             <?php   } ?> value="22"> Previous Record
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="authority[]" <?php if ($row1['a_23']=="1") { ?>
                   checked="true"
             <?php   } ?> value="23"> Change Class
                    </label>
                  </div>
                  <h2 style="background-color:#DAF7A6;display:inline-block;">Notification</h2>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="authority[]" <?php if ($row1['a_24']=="1") { ?>
                   checked="true"
             <?php   } ?> value="24"> Add Notification
                    </label>
                  </div>
                  <h2 style="background-color:#DAF7A6;display:inline-block;">Assigning Authorities</h2>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="authority[]" <?php if ($row1['a_25']=="1") { ?>
                   checked="true"
             <?php   } ?> value="25"> Assigning Authorities to Employee
                    </label>
                  </div>
                  <h2 style="background-color:#DAF7A6;display:inline-block;">Finance/Accountant</h2>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="authority[]" <?php if ($row1['a_26']=="1") { ?>
                   checked="true"
             <?php   } ?> value="26"> Finance / Accountant Authorities
                    </label>
                  </div>
                </div>
              </div>
              <div class="ln_solid"></div>
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-6">
          <div class="form-group ">
           

            <a href="employee_authorities.php">  <button type="button" class="btn btn-defalt col-md-9 col-sm-9 col-xs-12" name="cencel" style="width:150px">Cencel</button></a>
           
              <button type="submit" class="btn btn-success col-md-9 col-sm-9 col-xs-12" name="submit" style="width:150px">Edit</button>
              
            
          </div>

            </form>
          </div>
          </div>
        </div>
         <div class="clearfix"></div>

  <?php } include("../include/down.php") ?>