<?php
 require("../require/sessions.php");
  $check123=substr($_SESSION['username'], 0,3);
  if($check123!="PAR"){
    session_unset();
    session_destroy();
    header("location:../index.php");
    exit();
  }
  $id=$_SESSION['username'];
  $reg=$_SESSION['reg'];
include("../include/up.php");
 ?>
      

              <div class="col-md-8 col-md-offset-2 ">
                          <?php $sql="SELECT * FROM parent WHERE parent_name= '$id' AND school_reg='$reg'";
  $result=mysql_query($sql);
  $row=mysql_fetch_array($result);  
?>
    <div class="x_panel">
      <div class="x_title">
        <h2>Parent Profile</h2>
        
        
        <div class="clearfix"></div>
      </div>
  
<form onsubmit="return addparent()" class="form-horizontal form-label-left input_mask" method="post" action="update_parent_process.php?id=2" enctype="multipart/form-data" >

                <div class="clearfix"></div>
                         <div class="form-group">
                  <div class="col-md-3 col-sm-3 col-xs-12 col-md-offset-8">
                    
                   
                    <img id="myImg" height="150px" width="150px" src="<?php echo "../image/".$row['image_path']; ?>" alt="your image" />
                     
                    </div>

                    </div>
               <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Parent User Name</label>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <input type="text" class="form-control" readonly="true" name="puser_name" readonly="true" value="<?php echo $row['parent_name']; ?>">  
                </div>
               </div>

              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="text" class="form-control has-feedback-left" name="pfirst_name" value="<?php echo $row['first_name']; ?>" required="required" placeholder="First Name" readonly="true" maxlength="30" onblur="return onblurFname(this,1);" onkeypress="return checkFname(event,this);"  >
                <span class="fa fa-user form-control-feedback left" aria-hidden="true"><span style='color:red;'>*</span></span>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="text" class="form-control"  name="plast_name" value="<?php echo $row['last_name']; ?>" required="required" placeholder="Last Name" readonly="true"  maxlength="30" onblur="return onblurLname(this,1);" onkeypress="return checkLname(event,this);">
                <span class="fa fa-user form-control-feedback right" aria-hidden="true"><span style='color:red;'>*</span></span>
              </div>
              <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 " id="fnameError">
                  
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12 " id="lnameError">
                  
                  </div>
                </div>
              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="text" class="form-control has-feedback-left"  name="pemail" value="<?php echo $row['email']; ?>" placeholder="example@xyz.com"  id="email"  maxlength="70" onblur="return onblurEmail(this);" onkeypress="return checkEmail(event,this);">
                <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="text" class="form-control" name="pphone" value="<?php echo $row['cell_no']; ?>" required="required"  placeholder="Phone"  id="phone" minlength="10" maxlength="12" onblur="return onblurPhone(this,1);" onkeypress="return checkPhone(event,this);">
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
                  <input type="text" class="form-control"  value="<?php echo $row['nationality']; ?>" name="pnationality" required="required" placeholder="Nationality"  onblur="return onblurNation(this,1);" onkeypress="return checkNation(event,this);">
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
                  <input type="text" class="form-control" readonly="true" value="<?php echo $row['cnic']; ?>" name="pcnic" required="required" data-inputmask="'mask' : '99999-9999999-9'" onkeyup="return cnicCheck(this,3);">
                  
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
                  <input class="date-picker form-control col-md-7 col-xs-12"  value="<?php echo $row['dob']; ?>" name="pdob" required="required" type="date" readonly="true" id="dob" onblur="return onblurdob(this);" onchange="return onblurdob(this);">
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
                  <input type="text" class="form-control" rows="3" name="pcaddress" value="<?php echo $row['current_address']; ?>" required="required"></input>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Permanent Address<span style='color:red;'>*</span></label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" rows="3" name="ppaddress"  value="<?php echo $row['permanent_address']; ?>" required="required"></input>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Occupation <span style='color:red;'>*</span>
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" required="required" value="<?php echo $row['occupation']; ?>" name="occupation" placeholder="Occupation"  onblur="return onblurOccup(this,1);" onkeypress="return checkOccup(event,this);">
                </div>
              </div>
              <div class="form-group">
                  <div class="col-md-3 col-sm-3 col-xs-12 " >
                  
                  </div>
                  <div class="col-md-9 col-sm-9 col-xs-12 " id="occupError">
                  
                  </div>
                </div>
              <div class="ln_solid"></div>
          <div class="form-group ">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-6">
             <a href="view_parent.php"> <button type="button" class="btn btn-default col-md-3 col-sm-3 col-xs-12" name="submit" style="width:150px"> Cancel</button></a>
              <button type="submit" class="btn btn-success col-md-3 col-sm-3 col-xs-12" name="submit" style="width:150px">Update</button>
              </div>
              </div>

            </form>
          </div>
       
  
                     
              </div>
              <div class="clearfix"></div>
                
                     
                
              </div>
              <div class="clearfix"></div>
<?php include("../include/down.php"); ?> 