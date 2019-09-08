  <?php include("up.php") ?>
  <div class="col-md-8 col-md-offset-2">
    <div class="testbox" style=" min-height:30px;" >
                            <?php if (isset($_GET['status']) && $_GET['status'] == '1') {
                                  echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:green'>Record Entered Successfully!</span>";
                                  } else if (isset($_GET['status']) && $_GET['status'] == '2'){
                                      echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:red'> Sorry There is some issue, Try Again</span>";
                                    }
                                    else if (isset($_GET['status']) && $_GET['status'] == '3'){
                                      echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:red'> Employee authority has not been enterd.</span>";
                                    }
                              ?>
                            </div>
   
     <div class="x_panel">
      <div class="x_title">
        <h2>Add Employee</small></h2>
        
        <div class="clearfix"></div>
      </div>
     
      <?php  $db = new mysqli('localhost', 'root', '', 'asmseduc_v16');
      $sql = "SHOW TABLE STATUS LIKE 'employee'";
$result=$db->query($sql);
$row = $result->fetch_assoc();
$text = str_pad($row['Auto_increment'],5,"0",STR_PAD_LEFT);
#echo $row['Auto_increment'];
                 ?>
        
            <form  onsubmit="return addemployee()"class="form-horizontal form-label-left input_mask" method="post" action="add_employee_process.php" enctype="multipart/form-data" >

                    <div class="clearfix"></div>
               <div class="form-group">
                  <div class="col-md-3 col-sm-3 col-xs-12 col-md-offset-8">
                    
                   
                    <img id="myImg" height="150px" width="150px" src="../image/user.png" alt="your image" /><span style='color:red;'>*</span>
                    </div>
                    </div>
                <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12"> Employee User Name</label>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <input type="text" class="form-control" name="user_name" readonly="true" value="<?php echo "EMP".$text; ?>">  
                </div>
                 <div class="col-md-4 col-sm-6 col-xs-12 col-md-offset-1 "  >
                 <input type='file' name="user_pic" required="true" accept=".jpg" autocomplete="off"  id="upload" onchange="return checkSize()" />
                    </div>
              </div>
              <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 " >
                  
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12 " id="uploadError">
                  
                  </div>
                </div>
              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="text" class="form-control has-feedback-left" name="first_name" required="required" placeholder="First Name"  maxlength="30" onblur="return onblurFname(this,1);" onkeypress="return checkFname(event,this);"  >
                <span class="fa fa-user form-control-feedback left" aria-hidden="true"><span style='color:red;'>*</span></span>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="text" class="form-control" name="last_name" required="required" placeholder="Last Name" maxlength="30" onblur="return onblurLname(this,1);" onkeypress="return checkLname(event,this);">
                <span class="fa fa-user form-control-feedback right" aria-hidden="true"><span style='color:red;'>*</span></span>
              </div>
              <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 " id="fnameError">
                  
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12 " id="lnameError">
                  
                  </div>
                </div>
              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="text" class="form-control has-feedback-left" name="email" required="required" placeholder="example@xyz.com"  id="email"  maxlength="70" onblur="return onblurEmail(this,1);" onkeypress="return checkEmail(event,this);">
                <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"><span style='color:red;'>*</span></span>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="text" class="form-control" name="phone" required="required" placeholder="Phone"  id="phone" minlength="10" maxlength="12" onblur="return onblurPhone(this,1);" onkeypress="return checkPhone(event,this);">
                <span class="fa fa-phone form-control-feedback right" aria-hidden="true"><span style='color:red;'>*</span></span>
              </div>
              <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 " id="emailError">
                  
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12 " id="phoneError">
                  
                  </div>
                </div>
              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="password" class="form-control has-feedback-left" id="password" name="password" required="required" placeholder="Password"  onkeyup="return onblurpasw(this);" onblur="return onblurpasw(this);">
                <span class="fa fa-lock form-control-feedback left" aria-hidden="true"><span style='color:red;'>*</span></span>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="password" class="form-control" id="passwordcon" name="confirm_password" required="required" placeholder=" Re-type Password"  onkeyup="return onblurpaswcon(this);" onblur="return onblurpaswcon(this);">
                <span class="fa fa-lock form-control-feedback right" aria-hidden="true"><span style='color:red;'>*</span></span>
              </div>
              <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 " id="passwordError">
                  
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12 " id="passwordconError">
                  
                  </div>
                </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nationality<span style='color:red;'>*</span></label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" name="nationality" required="required" placeholder="Nationality" onblur="return onblurNation(this,1);" onkeypress="return checkNation(event,this);">
                </div>
              </div>
              <div class="form-group">
                  <div class="col-md-3 col-sm-3 col-xs-12 " >
                  
                  </div>
                  <div class="col-md-9 col-sm-9 col-xs-12 " id="nationError">
                  
                  </div>
                </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">CNIC<span style='color:red;'>*</span></label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" name="cnic" required="required" data-inputmask="'mask' : '99999-9999999-9'"  onkeyup="return cnicCheck(this,2);">
                  
                </div>
              </div>
              <div class="form-group">
                  <div class="col-md-3 col-sm-3 col-xs-12 " >
                  
                  </div>
                  <div class="col-md-9 col-sm-9 col-xs-12 " id="cnicError">
                  
                  </div>
                </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender<span style='color:red;'>*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                   <p>
                
                <input type="radio" class="flat" name="gender" id="genderM" value="M" checked="" required /> Male
                <input type="radio" class="flat" name="gender" id="genderF" value="F" /> Female
              </p>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Birth <span style='color:red;'>*</span>
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input class="date-picker form-control col-md-7 col-xs-12" name="dob" required="required" type="date"  id="dob" onblur="return onblurdob(this);" onchange="return onblurdob(this);">
                </div>
              </div>
              <div class="form-group">
                  <div class="col-md-3 col-sm-3 col-xs-12 " >
                  
                  </div>
                  <div class="col-md-9 col-sm-9 col-xs-12 " id="dobError">
                  
                  </div>
                </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Current Address<span style='color:red;'>*</span></label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <textarea class="form-control" rows="3" name="caddress" required="required"></textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Permanent Address<span style='color:red;'>*</span></label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <textarea class="form-control" rows="3" name="paddress" required="required"></textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Join Date<span style='color:red;'>*</span> 
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input class="date-picker form-control col-md-7 col-xs-12" name="join_date" required="required" type="date"  id="sdate" onblur="return onblurStartDate(this);" onchange="return onblurStartDate(this);">
                </div>
              </div>
              <div class="form-group">
                  <div class="col-md-3 col-sm-3 col-xs-12 " >
                  
                  </div>
                  <div class="col-md-9 col-sm-9 col-xs-12 " id="startDateError">
                  
                  </div>
                </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Qualification<span style='color:red;'>*</span></label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" name="qualification" required="required" placeholder="Qualification" onblur="return onblurQualif(this,1);" onkeypress="return checkQualif(event,this);">
                </div>
              </div>
              <div class="form-group">
                  <div class="col-md-3 col-sm-3 col-xs-12 " >
                  
                  </div>
                  <div class="col-md-9 col-sm-9 col-xs-12 " id="qualifError">
                  
                  </div>
                </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Office no<span style='color:red;'>*</span></label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" name="office_no" required="required" placeholder="Office no" onblur="return onblurOffice(this,1);" onkeypress="return checkOffice(event,this);">
                </div>
              </div>
              <div class="form-group">
                  <div class="col-md-3 col-sm-3 col-xs-12 " >
                  
                  </div>
                  <div class="col-md-9 col-sm-9 col-xs-12 " id="officeError">
                  
                  </div>
                </div>
              
              <div class="control-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Major's</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input id="tags_1" type="text" class="tags form-control" name="majors" />
                  <div id="suggestions-container" style="position: relative; float: left; width: 250px; margin: 10px;"></div>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Designation <span style='color:red;'>*</span>
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" name="designation" required="required" placeholder="Designation" onblur="return onblurDesig(this,1);" onkeypress="return checkDesig(event,this);">
                </div>
              </div>
              <div class="form-group">
                  <div class="col-md-3 col-sm-3 col-xs-12 " >
                  
                  </div>
                  <div class="col-md-9 col-sm-9 col-xs-12 " id="desigError">
                  
                  </div>
                </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Salary <span style='color:red;'>*</span>
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" id="txtNumeric" maxlength="6" name="salary" required="required" placeholder="Salary">
                </div>
              </div>
              <div class="form-group">
                <label class="col-md-3 col-sm-3 col-xs-12 control-label">Authorities</label>

                <div class="col-md-9 col-sm-9 col-xs-12">
                <h2 style="background-color:#DAF7A6;display:inline-block;">Student</h2>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="authority[]" value="1" >Add Student
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="authority[]" value="2"> view Student
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="authority[]" value="3"> Edit Student
                    </label>
                  </div>
                  <h2 style="background-color:#DAF7A6;display:inline-block;">Student Attendance</h2>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="authority[]" value="4" >Add Student Attendance
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="authority[]" value="5"> view Student Attendance
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="authority[]" value="6"> Edit Student Attendance
                    </label>
                  </div>
                  <h2 style="background-color:#DAF7A6;display:inline-block;">Student Result</h2>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="authority[]" value="7" >Add Student Result
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="authority[]" value="8"> view Student Result
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="authority[]" value="9"> Edit Student Result
                    </label>
                  </div>
                  <h2 style="background-color:#DAF7A6;display:inline-block;">Student Request</h2>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="authority[]" value="10">view Student Request
                    </label>
                  </div>
                  <h2 style="background-color:#DAF7A6;display:inline-block;">Employee</h2>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="authority[]" value="11" > Add Employee
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="authority[]" value="12"> view Employee 
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="authority[]" value="13"> Edit Employee
                    </label>
                  </div>
                  <h2 style="background-color:#DAF7A6;display:inline-block;">Employee Attendance</h2>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="authority[]" value="14" > Add Employee Attendance
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="authority[]" value="15"> view Employee Attendance
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="authority[]" value="16"> Edit Employee Attendance
                    </label>
                  </div>
                  <h2 style="background-color:#DAF7A6;display:inline-block;">Employee Request</h2>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="authority[]" value="17">view Employee Request
                    </label>
                  </div>
                  <h2 style="background-color:#DAF7A6;display:inline-block;">Class</h2>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="authority[]" value="18"> Add Class
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="authority[]" value="19"> view Class
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="authority[]" value="20"> Edit Class
                    </label>
                  </div>
                  <h2 style="background-color:#DAF7A6;display:inline-block;">Assigning Course</h2>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="authority[]" value="21"> Assigning Course to Employee 
                    </label>
                  </div>
                  <h2 style="background-color:#DAF7A6;display:inline-block;">Other</h2>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="authority[]" value="22"> Previous Record
                    </label>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="authority[]" value="23"> Change Class
                    </label>
                  </div>
                  <h2 style="background-color:#DAF7A6;display:inline-block;">Notification</h2>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="authority[]" value="24"> Add Notification
                    </label>
                  </div>
                  <h2 style="background-color:#DAF7A6;display:inline-block;">Assigning Authorities</h2>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="authority[]" value="25"> Assigning Authorities to Employee
                    </label>
                  </div>
                  <h2 style="background-color:#DAF7A6;display:inline-block;">Finance/Accountant</h2>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="authority[]" value="26"> Finance / Accountant Authorities
                    </label>
                  </div>
                  
                  
                </div>
              </div>
              <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-3 col-sm-3 col-xs-12 col-md-offset-9">
              
              <button type="submit" class="btn btn-success" name="submit" style="width:150px">ADD</button>
              
            </div>
          </div>

            </form>
          </div>
       </div>
         <div class="clearfix"></div>

  <?php include("down.php") ?>