<?php 
$sql="SELECT * FROM student WHERE student_name='$sid' AND session='$ses' AND school_reg='$reg'";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);?>
    <div class="col-md-8 col-md-offset-2">            
    <div class="x_panel">
      <div class="x_title">
        <h2>Student Information</h2>
        
        <div class="clearfix"></div>
      </div>
      
      

            <div class="clearfix"></div>
               <form onsubmit="return handleinput()" class="form-horizontal form-label-left input_mask" method="post" action="update_student.php" >
                <div class="form-group">
                  <div class="col-md-3 col-sm-3 col-xs-12 col-md-offset-8">
                    
                   
                    <img id="myImg" height="150px" width="150px" src="<?php echo "../image/".$row['image_path']; ?>" alt="image/user.png" />
                    </div>
                    </div>
                <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12"> Student User ID</label>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <input type="text" class="form-control" name="user_name" readonly="true" value="<?php echo $row['student_name']; ?>">  
                </div>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="text" class="form-control has-feedback-left" value="<?php echo $row['first_name']; ?>" name="first_name" required="required" placeholder="First Name"  readonly="true"  maxlength="30" onblur="return onblurFname(this,1);" onkeypress="return checkFname(event,this);" >
                <span class="fa fa-user form-control-feedback left" aria-hidden="true"><span style='color:red;'>*</span></span>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="text" class="form-control" name="last_name" required="required" value="<?php echo $row['last_name']; ?>" placeholder="Last Name"  readonly="true"  maxlength="30" onblur="return onblurLname(this,1);" onkeypress="return checkLname(event,this);">
                <span class="fa fa-user form-control-feedback right" aria-hidden="true"><span style='color:red;'>*</span></span>
              </div>
              <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 " id="fnameError">
                  
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12 " id="lnameError">
                  
                  </div>
                </div>
              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="text" class="form-control has-feedback-left" value="<?php echo $row['email']; ?>" name="email" placeholder="example@xyz.com" id="email"  maxlength="70" onblur="return onblurEmail(this);" onkeypress="return checkEmail(event,this);">
                <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="text" class="form-control" name="phone" value="<?php echo $row['cell_no']; ?>"   placeholder="Phone" id="phone" minlength="10" maxlength="12" onblur="return onblurPhone(this);" onkeypress="return checkPhone(event,this);">
                <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
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
                  <input type="text" class="form-control" name="nationality" value="<?php echo $row['nationality']; ?>" required="required" placeholder="Nationality" onblur="return onblurNation(this,1);" onkeypress="return checkNation(event,this);">
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
                  <input type="text" class="form-control" name="cnic"  readonly="true" value="<?php echo $row['cnic']; ?>"  data-inputmask="'mask' : '99999-9999999-9'" onkeyup="return cnicCheck(this,1);">
                  
                </div>
              </div>
              <div class="form-group">
                  <div class="col-md-3 col-sm-3 col-xs-12 " >
                  
                  </div>
                  <div class="col-md-9 col-sm-9 col-xs-12 " id="cnicError">
                  
                  </div>
                </div>
              
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                   <p>
                
                <?php $g=$row['gender']; 
                 if($g=='M'){ ?> 
                  <input type="radio" class="flat" readonly="true"   name="pgender" id="genderM" value="M" checked="true"required />Male
                 <?php }if($g=='F'){ ?>
                <input type="radio" class="flat" readonly="true" name="pgender"  id="genderF" value="F" checked="true" /> Female
             <?php } ?> 
              </p>
                </div>
              </div>
              
              
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Birth <span style='color:red;'>*</span>
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input class="date-picker form-control col-md-7 col-xs-12"  readonly="true" value="<?php echo $row['dob']; ?>" id="dob" name="dob" required="required" type="date" >
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Current Address<span style='color:red;'>*</span></label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input class="form-control" rows="3" name="caddress" value="<?php echo $row['current_address']; ?>" required="required"></input>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Permanent Address<span style='color:red;'>*</span></label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input class="form-control" rows="3" name="paddress" value="<?php echo $row['permanent_address']; ?>" required="required"></input>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Admission Date 
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input class="date-picker form-control col-md-7 col-xs-12" readonly="true" value="<?php echo $row['admission_date']; ?>" name="admission_date" required="required" type="date" >
                </div>
              </div>
              <div class="control-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Hobbies</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input id="tags_1" type="text" value="<?php echo $row['hobby']; ?>"  name="hobby" class="tags form-control"  />
                  <div id="suggestions-container" style="position: relative; float: left; width: 250px; margin: 10px;"></div>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Class</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input id="tags_1" type="text"  readonly="true" value="<?php echo $row['class']; ?>"  name="hobbies" class="tags form-control"  />
                  <div id="suggestions-container" style="position: relative; float: left; width: 250px; margin: 10px;"></div>
                </div>
              </div>
              <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-3 col-sm-3 col-xs-12 col-md-offset-9">
              
              <button type="submit" class="btn btn-success" name="submit" style="width:150px">Update</button>
              
            </div>
          </div>

            </form>
                  </div>
                  </div> 