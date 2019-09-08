  <?php include("up.php");
   ?><title>View Employee</title>
  <div class="testbox" style=" min-height:30px;" >
                            <?php if (isset($_GET['status']) && $_GET['status'] == '1') {
                                  echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:green'>Record Entered Successfully!</span>";
                                  } else if (isset($_GET['status']) && $_GET['status'] == '2'){
                                      echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:red'> Sorry There is some issue, Try Again</span>";
                                    }
                              ?>
                            </div>
  
                          
   <div class="col-md-8 col-md-offset-2">
    <div class="x_panel ">
      <div class="x_title">
        <h2>Employee Profile</small></h2>
        
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
     <?php
     $reg=$_SESSION['reg'];
     if (isset($_GET['id'])) {
       $id=$_GET['id'];
     }
     $sql="SELECT * FROM employee WHERE employee_name='$id' AND school_reg='$reg' ";
                $result=mysql_query($sql);
                $row=mysql_fetch_array($result);
                 ?>
        
            <form  onsubmit="return addemployee()" class="form-horizontal form-label-left input_mask" method="post" action="update_employee_profile.php" >
                <div class="form-group">
                  <div class="col-md-3 col-sm-3 col-xs-12 col-md-offset-8">
                    
                   
                    <img  id="myImg" height="150px" width="150px" src="<?php echo "../image/".$row['image_path']; ?>" alt="your image" />
                    </div>
                    </div>
                <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">User Name</label>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <input type="text" class="form-control" name="user_name" readonly="true" value="<?php echo $row['employee_name'] ?>">  
                </div>
                
              </div>

              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="text" class="form-control has-feedback-left" name="first_name" value="<?php echo $row['first_name'] ?>" required="required" placeholder="First Name"   maxlength="30" onblur="return onblurFname(this,1);" onkeypress="return checkFname(event,this);"  >
                <span class="fa fa-user form-control-feedback left" aria-hidden="true"><span style='color:red;'>*</span></span>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="text" class="form-control" name="last_name" required="required" value="<?php echo $row['last_name'] ?>" placeholder="Last Name"  maxlength="30" onblur="return onblurLname(this,1);" onkeypress="return checkLname(event,this);">
                <span class="fa fa-user form-control-feedback right" aria-hidden="true"><span style='color:red;'>*</span></span>
              </div>
              <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 " id="fnameError">
                  
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12 " id="lnameError">
                  
                  </div>
                </div>
              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="text" class="form-control has-feedback-left" value="<?php echo $row['email'] ?>" name="email" required="required" placeholder="example@xyz.com"  id="email"  maxlength="70" onblur="return onblurEmail(this,1);" onkeypress="return checkEmail(event,this);">
                <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"><span style='color:red;'>*</span></span>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="text" class="form-control" name="phone" value="<?php echo $row['cell_no'] ?>" required="required" placeholder="Phone"  id="phone" minlength="10" maxlength="12" onblur="return onblurPhone(this,1);" onkeypress="return checkPhone(event,this);">
                <span class="fa fa-phone form-control-feedback right" aria-hidden="true"><span style='color:red;'>*</span></span>
              </div>
             <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 " id="emailError">
                  
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12 " id="phoneError">
                  
                  </div>
                </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nationality<span style='color:red;'>*</span></label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" name="nationality" value="<?php echo $row['nationality'] ?>" required="required" placeholder="Nationality"  onblur="return onblurNation(this,1);" onkeypress="return checkNation(event,this);">
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
                  <input type="text" class="form-control" readonly="true" name="cnic" value="<?php echo $row['cnic'] ?>" required="required" data-inputmask="'mask' : '99999-9999999-9'"  onkeyup="return cnicCheck(this,2);">
                  
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
               
                <input type="radio" class="flat" name="gender" id="genderM" value="M"  <?php 
                if ($row['gender']=="M") { ?>
                  checked="true"
             <?php   } ?> required /> Male
                <input type="radio" class="flat" name="gender" id="genderF"  <?php 
                if ($row['gender']=="F") { ?>
                  checked=""
             <?php   } ?> value="F" /> Female
              </p>
                </div>
              </div>
              
              <div class="form-group">
                
                <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Birth <span style='color:red;'>*</span>
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input class="date-picker form-control col-md-7 col-xs-12" value="<?php echo $row['dob']; ?>" name="dob" required="required" type="date" id="dob" onblur="return onblurdob(this);" onchange="return onblurdob(this);">
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
                  <input type="text" class="form-control" name="caddress" value="<?php echo $row['current_address'] ?>" required="required">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Permanent Address<span style='color:red;'>*</span></label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                 <input type="text" class="form-control" name="paddress" value="<?php echo $row['permanent_address'] ?>" required="required">
                </div>
              </div>
              <div class="form-group">
                <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12"> join Date<span style='color:red;'>*</span> 
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input class="date-picker form-control col-md-7 col-xs-12" readonly="true" value="<?php echo $row['join_date']; ?>" name="join_date" required="required" type="date" >
                </div>
              </div>
              </div>

              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Qualification<span style='color:red;'>*</span></label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" name="qualification" value="<?php echo $row['qualification'] ?>" required="required" placeholder="Qualification"  onblur="return onblurQualif(this,1);" onkeypress="return checkQualif(event,this);">
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
                  <input type="text" class="form-control" name="office_no" value="<?php echo $row['office_no'] ?>" required="required" placeholder="Office no" onblur="return onblurOffice(this,1);" onkeypress="return checkOffice(event,this);">
                </div>
              </div>
              <div class="form-group">
                  <div class="col-md-3 col-sm-3 col-xs-12 " >
                  
                  </div>
                  <div class="col-md-9 col-sm-9 col-xs-12 " id="officeError">
                  
                  </div>
                </div>
              
              <div class="control-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Major's<span style='color:red;'>*</span></label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input id="tags_1" type="text" class="tags form-control" value="<?php echo $row['majors'] ?>" name="majors" />
                  <div id="suggestions-container" style="position: relative; float: left; width: 250px; margin: 10px;"></div>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Designation<span style='color:red;'>*</span> 
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" name="designation" value="<?php echo $row['designation'] ?>" required="required" placeholder="Designation"  onblur="return onblurDesig(this,1);" onkeypress="return checkDesig(event,this);">
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
                  <input type="text" class="form-control" id="txtNumeric" name="salary" readonly="true"value="<?php echo $row['salary'] ?>" required="required" placeholder="Salary">
                </div>
              </div>
              
              <div class="ln_solid"></div>
               <div class="form-group ">
              
             
           

            <a href="view_employee.php">  <button type="button" class="btn btn-defalt col-md-3 col-md-offset-4 col-sm-9 col-xs-12" name="cencel" style="width:150px">Cancel</button></a>
           
              <button type="submit" class="btn btn-success col-md-3  col-sm-9 col-xs-12" name="submit" style="width:150px">Update</button>
              
            
              </div>
                      
           </form>
         </div>
        </div>
      
      </div>

  <?php include("down.php") ?>