                      <div class="testbox" style=" min-height:30px;" >
                            <?php if (isset($_GET['status']) && $_GET['status'] == '1') {
                                  echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:green'>Record Entered Successfully!</span>";
                                  } else if (isset($_GET['status']) && $_GET['status'] == '2'){
                                      echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:red'> Sorry There is some issue, Try Again</span>";
                                    }
                              ?>
                            </div>
<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
      <div class="x_title">
        <h2>Add Super Admin</h2>
        
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />
        <form id="form" onsubmit="return handleinput()" class="form-horizontal form-label-left input_mask" method="post" action="add_admin_process.php?id=1" enctype="multipart/form-data" >
              <div class="form-group">
                  <div class="col-md-3 col-sm-3 col-xs-12 col-md-offset-8">
                  <img id="myImg" height="150px" width="150px" src="../image/user.png" alt="your image" /><span style='color:red;'>*</span>
                  <input type='file' name="user_pic" required="true" maxlength="1048576" accept=".jpg" autocomplete="off"  id="upload" onchange="return checkSize()" />
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 " >
                  
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12 " id="uploadError">
                  
                  </div>
                </div>
              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
              
                <input type="text" class="form-control has-feedback-left" maxlength="30" id="first_name" name="first_name" dragable="false" autocomplete="off" required="required" placeholder="First Name" onblur="return onblurFname(this,1);" onkeypress="return checkFname(event,this);"  >
                <span class="fa fa-user form-control-feedback left" aria-hidden="true"><span style='color:red;'>*</span></span>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="text" class="form-control" id="last_name" maxlength="30" name="last_name" dragable="false" autocomplete="off" required="required" placeholder="Last Name" onblur="return onblurLname(this,1);" onkeypress="return checkLname(event,this);">
                <span class="fa fa-user form-control-feedback right" aria-hidden="true"><span style='color:red;'>*</span></span>
              </div>
              <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 " id="fnameError">
                  
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12 " id="lnameError">
                  
                  </div>
                </div>
              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="text" class="form-control has-feedback-left" id="email" maxlength="70" name="email" dragable="false" autocomplete="off" required="required" placeholder="example@xyz.com" onblur="return onblurEmail(this,1);" onkeypress="return checkEmail(event,this);">
                <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"><span style='color:red;'>*</span></span>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="text" class="form-control" id="phone" minlength="10" maxlength="12" name="phones" dragable="false" autocomplete="off" required="required" placeholder="Phone" onblur="return onblurPhone(this,1);" onkeypress="return checkPhone(event,this);">
                <span class="fa fa-phone form-control-feedback right" aria-hidden="true"><span style='color:red;'>*</span></span>
              </div>
              <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 " id="emailError">
                  
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12 " id="phoneError">
                  
                  </div>
                </div>
              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="password" class="form-control has-feedback-left" id="password" name="password" dragable="false" autocomplete="off" required="required" placeholder="Password" onkeyup="return onblurpasw(this);" onblur="return onblurpasw(this);">
                <span class="fa fa-lock form-control-feedback left" aria-hidden="true"><span style='color:red;'>*</span></span>
              </div>
              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="password" class="form-control" id="passwordcon" name="confirm_password" dragable="false" autocomplete="off" required="required" placeholder=" Re-type Password" onkeyup="return onblurpaswcon(this);" onblur="return onblurpaswcon(this);">
                <span class="fa fa-lock form-control-feedback right" aria-hidden="true"><span style='color:red;'>*</span></span>
              </div>
              <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 " id="passwordError">
                  
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12 " id="passwordconError">
                  
                  </div>
                </div>
              <div class="form-group ">
                <label class="control-label col-md-6 col-sm-6 col-xs-12">User Name<span style='color:red;'>*</span></label>
                <div class="col-md-6 col-sm-6 col-xs-12  ">
                  <input type="text" class="form-control" name="user_name" id="user_name" maxlength="20" dragable="false" autocomplete="off" required="required" placeholder="User Name" onblur="return onblurUsername(this,1);" onkeypress="return checkUsername(event,this);" >
                </div>
              </div>
              <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 " >
                  
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12 " id="usernameError">
                  
                  </div>
                </div>
         
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-3 col-sm-3 col-xs-12 col-md-offset-9">
              
              <button type="submit" class="btn btn-success" style="width:150px">ADD</button>
              
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
