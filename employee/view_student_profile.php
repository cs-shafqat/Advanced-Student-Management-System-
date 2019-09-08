<?php

$sql="SELECT * FROM student WHERE student_name='$id'";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);

 ?>
    <div class="x_panel">
      <div class="x_title">
        <h2>Student Information</h2>
        
        <div class="clearfix"></div>
      </div>
      
      

            <div class="clearfix"></div>
              <form class="form-horizontal form-label-left input_mask" method="post" action="update_student.php" >
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
                <input type="text" class="form-control has-feedback-left" value="<?php echo $row['first_name']; ?>" name="first_name" required="required" placeholder="First Name">
                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="text" class="form-control" name="last_name" required="required" value="<?php echo $row['last_name']; ?>" placeholder="Last Name">
                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="email" class="form-control has-feedback-left" value="<?php echo $row['email']; ?>" name="email" placeholder="example@xyz.com">
                <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="text" class="form-control" name="phone" value="<?php echo $row['cell_no']; ?>"  data-inputmask="'mask' : '(+99) 999-9999999'" placeholder="Phone">
                <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
              </div>
          
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nationality</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" name="nationality" value="<?php echo $row['nationality']; ?>" required="required" placeholder="Nationality">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">CNIC</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" name="cnic" value="<?php echo $row['cnic']; ?>"  data-inputmask="'mask' : '99999-9999999-9'">
                  
                </div>
              </div>
              
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                   <p>
                
                <?php $g=$row['gender']; ?>
               
                  <input type="radio" class="flat"   name="pgender" id="genderM" value="M" <?php if($g=='M'){ ?> checked="true" <?php } ?>required /> Male
                
                <input type="radio" class="flat" name="pgender"  id="genderF" value="F"<?php if($g=='F'){ ?> checked="true" <?php } ?> /> Female
             
              </p>
                </div>
              </div>
              
              
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Birth 
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input class="date-picker form-control col-md-7 col-xs-12" value="<?php echo $row['dob']; ?>" name="dob" required="required" type="date" >
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Current Address</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input class="form-control" rows="3" name="caddress" value="<?php echo $row['current_address']; ?>" required="required"></input>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Permanent Address</label>
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
     