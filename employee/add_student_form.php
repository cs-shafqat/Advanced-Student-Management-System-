
    <div class="x_panel">
      <div class="x_title">
        <h2>Student information</h2>
        
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
      
          <?php  $db = new mysqli('localhost', 'root', '', 'asmseduc_v16');
      $sql = "SHOW TABLE STATUS LIKE 'student'";
$result=$db->query($sql);
$row = $result->fetch_assoc();
$text = str_pad($row['Auto_increment'],5,"0",STR_PAD_LEFT);
#echo $row['Auto_increment'];
                 ?>
      <div class="clearfix"></div>

        <br>
            <div class="clearfix"></div>

              <form onsubmit="return handleinput()" class="form-horizontal form-label-left input_mask" method="post" action="add_student_process.php" enctype="multipart/form-data" >
                 <div class="form-group">
                  <div class="col-md-3 col-sm-3 col-xs-12 col-md-offset-8">
                    
                   
                    <img id="myImg" height="150px" width="150px" src="../image/user.png" alt="your image" /><span style='color:red;'>*</span>
                    </div>
                    </div>
                <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12"> Student User Name</label>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <input type="text" class="form-control" name="user_name" readonly="true" value="<?php echo "SDT".$text; ?>">  
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
                <input type="text" class="form-control has-feedback-left" name="first_name" required="required" placeholder="First Name" maxlength="30" onblur="return onblurFname(this,1);" onkeypress="return checkFname(event,this);"  >
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
                <input type="text" class="form-control has-feedback-left" name="email" placeholder="example@xyz.com" id="email"  maxlength="70" onblur="return onblurEmail(this);" onkeypress="return checkEmail(event,this);">
                <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="text" class="form-control" name="phone" placeholder="Phone" id="phone" minlength="10" maxlength="12" onblur="return onblurPhone(this);" onkeypress="return checkPhone(event,this);">
                <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
              </div>
              <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 " id="emailError">
                  
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12 " id="phoneError">
                  
                  </div>
                </div>
              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="password" class="form-control has-feedback-left" id="password" name="password" required="required" placeholder="Password" onkeyup="return onblurpasw(this);" onblur="return onblurpasw(this);">
                <span class="fa fa-lock form-control-feedback left" aria-hidden="true"><span style='color:red;'>*</span></span>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="password" class="form-control" id="passwordcon" name="confirm_password" required="required" placeholder=" Re-type Password" onkeyup="return onblurpaswcon(this);" onblur="return onblurpaswcon(this);">
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
                <label class="control-label col-md-3 col-sm-3 col-xs-12">CNIC</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" name="cnic"  data-inputmask="'mask' : '99999-9999999-9'" onkeyup="return cnicCheck(this,1);">
                  
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
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Birth<span style='color:red;'>*</span> 
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input class="date-picker form-control col-md-7 col-xs-12" id="dob" name="dob" required="required" type="date" >
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
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Admission Date <span style='color:red;'>*</span>
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input class="date-picker form-control col-md-7 col-xs-12" name="admission_date" required="required" type="date" id="sdate" onblur="return onblurStartDate(this);" onchange="return onblurStartDate(this);">
                </div>
              </div>
              <div class="form-group">
                  <div class="col-md-3 col-sm-3 col-xs-12 " >
                  
                  </div>
                  <div class="col-md-9 col-sm-9 col-xs-12 " id="startDateError">
                  
                  </div>
                </div>
              <div class="control-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Hobbies</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input id="tags_1" type="text" name="hobby" class="tags form-control"  />
                  <div id="suggestions-container" style="position: relative; float: left; width: 250px; margin: 10px;"></div>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Class<span style='color:red;'>*</span></label>
              <div class="col-md-9 col-sm-9 col-xs-12">
              <select class="select2_single form-control " id="class" name="class" required="required" tabindex="-1" onchange="return changeClass(this)" >
                    <option value="">--select--</option>
                    <?php
                                  $s=$_SESSION['ses'];
                                  $reg=$_SESSION['reg'];
                                  $sql = "SELECT * FROM class WHERE school_reg='$reg' AND session='$s'  ";
                                  $result=mysql_query($sql);
                                  $arr= array();
                                  if (mysql_num_rows($result) > 0) {
                                  // output data of each row
                                  while($row = mysql_fetch_array( $result )) {
                                    if($row['count']<$row['max_count'])
                                    {
                                      array_push($arr, $row['min_age']);
                                    ?>

                    <option value="<?php  echo $row['title'] ?>" ><?php echo $row['title']; ?></option>
                    <?php
                            }
                          }
                          echo '<script>';
                          echo 'var ages = ' . json_encode($arr) . ';';
                          echo '</script>';

                            }  else {
                            echo "No result Found";
                            }
                            ?>

                  </select>
                </div>
                </div>
              <div class="form-group">
                  <div class="col-md-3 col-sm-3 col-xs-12 " >
                  
                  </div>
                  <div class="col-md-9 col-sm-9 col-xs-12 " id="classError">
                  
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
      </div>