  
    <div class="x_panel">
      <div class="x_title">
        <h2>Add Student</small></h2>
        
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
      
          <?php  $db = new mysqli('localhost', 'root', '', 'asmseduc_v16');
      $sql = "SHOW TABLE STATUS LIKE 'parent'";
$result=$db->query($sql);
$row = $result->fetch_assoc();
$text = str_pad($row['Auto_increment'],5,"0",STR_PAD_LEFT);
#echo $row['Auto_increment'];
                 ?>
       <div class="clearfix"></div>
            <h3>Parent information</h3>
            <br>

            <div class="clearfix"></div>

              <form onsubmit="return addparent()" class="form-horizontal form-label-left input_mask" method="post" action="add_parent_process.php" enctype="multipart/form-data" >

                    <div class="clearfix"></div>
                    <div class="form-group">
                  <div class="col-md-3 col-sm-3 col-xs-12 col-md-offset-8">
                  <img id="myImg" height="150px" width="150px" src="../image/user.png" alt="your image" /><span style='color:red;'>*</span>
                  <input type='file' name="user_pic" required="true"  accept=".jpg" autocomplete="off"  id="upload" onchange="return checkSize()" />
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 " >
                  
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12 " id="uploadError">
                  
                  </div>
                </div>
               <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Parent ID</label>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <input type="text" class="form-control" name="puser_name" readonly="true" value="<?php echo "PAR".$text; ?>">  
                </div>

                <label class="control-label col-md-3 col-sm-3 col-xs-12">Student ID<span style='color:red;'>*</span></label>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <?php
                if(isset($_GET['id9']))
                  { $student_id=$_GET['id9'];

                ?>
                
                <input type="text" class="form-control" name="student_id" required="ture" value="<?php echo $student_id ?>" readonly="true" >  
                <?php }
                else{
                  ?>
                 
              <select class="select2_single form-control " name="student_id" required="required" tabindex="-1">
                    <option value="">--select--</option>
                    <?php
                                  $s=$_SESSION['ses'];
                                  $reg=$_SESSION['reg'];
                                  $sql = "SELECT * FROM student WHERE school_reg= '$reg'";
                                  $result=mysql_query($sql);
                                  
                                  if (mysql_num_rows($result) > 0) {
                                  // output data of each row
                                  while($row = mysql_fetch_array( $result ))
                                   {
                                    $t=$row['student_name'];
                                    $sql1="SELECT * FROM parent_student_record WHERE student_id= '$t' AND school_reg='$reg' ";
                                    $result1=mysql_query($sql1);
                                    $row1=mysql_num_rows($result1);
                                    echo $row1;
                                    if($row1>0)
                                    {
                                      continue;
                                    }
                                    else
                                    {
                                    ?>
                                      <option value="<?php echo $row['student_name'] ?>" ><?php echo $row['student_name']; ?></option>
                                    <?php
                                    }
                                   }
                            }  else {
                            echo "No result Found";
                            }
                            ?>

                  </select>
                
                <?php
                }
                ?>
                </div>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="text" class="form-control has-feedback-left" name="pfirst_name" required="required" placeholder="First Name" maxlength="30" onblur="return onblurFname(this,1);" onkeypress="return checkFname(event,this);"  >
                <span class="fa fa-user form-control-feedback left" aria-hidden="true"><span style='color:red;'>*</span></span>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="text" class="form-control" name="plast_name" required="required" placeholder="Last Name" maxlength="30" onblur="return onblurLname(this,1);" onkeypress="return checkLname(event,this);">
                <span class="fa fa-user form-control-feedback right" aria-hidden="true"><span style='color:red;'>*</span></span>
              </div>
              <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 " id="fnameError">
                  
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12 " id="lnameError">
                  
                  </div>
                </div>
              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="text" class="form-control has-feedback-left" name="pemail" placeholder="example@xyz.com" id="email"  maxlength="70" onblur="return onblurEmail(this);" onkeypress="return checkEmail(event,this);">
                <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="text" class="form-control" name="pphone" required="required" placeholder="Phone" id="phone" minlength="10" maxlength="12" onblur="return onblurPhone(this,1);" onkeypress="return checkPhone(event,this);">
                <span class="fa fa-phone form-control-feedback right" aria-hidden="true"><span style='color:red;'>*</span></span>
              </div>
              <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 " id="emailError">
                  
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12 " id="phoneError">
                  
                  </div>
                </div>
              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="password" class="form-control has-feedback-left" id="password" name="ppassword" required="required" placeholder="Password" onkeyup="return onblurpasw(this);" onblur="return onblurpasw(this);">
                <span class="fa fa-lock form-control-feedback left" aria-hidden="true"><span style='color:red;'>*</span></span>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="password" class="form-control" id="passwordcon" name="pconfirm_password" required="required" placeholder=" Re-type Password" onkeyup="return onblurpaswcon(this);" onblur="return onblurpaswcon(this);">
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
                  <input type="text" class="form-control" name="pnationality" required="required" placeholder="Nationality" onblur="return onblurNation(this,1);" onkeypress="return checkNation(event,this);">
                </div>
              </div>
              <div class="form-group">
                  <div class="col-md-3 col-sm-3 col-xs-12 " >
                  
                  </div>
                  <div class="col-md-9 col-sm-9 col-xs-12 " id="nationError">
                  
                  </div>
                </div>
              <?php if (isset($_GET['id2'])) {
                $pcnic=$_GET['id2'];
              }?>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">CNIC</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" name="pcnic" required="required" readonly="true" value="<?php echo $pcnic; ?>" data-inputmask="'mask' : '99999-9999999-9'">
                  
                </div>
              </div>
              
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender<span style='color:red;'>*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                   <p>
                
                <input type="radio" class="flat" name="pgender" id="genderM" value="M" checked="" required /> Male
                <input type="radio" class="flat" name="pgender" id="genderF" value="F" /> Female
              </p>
                </div>
              </div>
              
              
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Birth <span style='color:red;'>*</span>
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input class="date-picker form-control col-md-7 col-xs-12" name="pdob" required="required" type="date" id="dob" onblur="return onblurdob(this);" onchange="return onblurdob(this);">
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
                  <textarea class="form-control" rows="3" name="pcaddress" required="required"></textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Permanent Address<span style='color:red;'>*</span></label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <textarea class="form-control" rows="3" name="ppaddress" required="required"></textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Occupation <span style='color:red;'>*</span>
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" required="required" name="poccupation" placeholder="Occupation" onblur="return onblurOccup(this,1);" onkeypress="return checkOccup(event,this);">
                </div>
              </div>
              <div class="form-group">
                  <div class="col-md-3 col-sm-3 col-xs-12 " >
                  
                  </div>
                  <div class="col-md-9 col-sm-9 col-xs-12 " id="occupError">
                  
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
    