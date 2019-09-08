
<?php
  require("../require/connection.php");
  require("../require/sessions.php"); 
  if(isset($_GET['id']))
   $id= $_GET['id'];
 $sql="SELECT * FROM school_admin where user_name='$id' limit 1";
 $result=mysql_query($sql);
$row=mysql_fetch_array($result);

  ?>
          
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Profile</h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <br />
                    <form id="form" onsubmit="return handleinput()" class="form-horizontal form-label-left" enctype="multipart/form-data" method="post" action="update_profile.php ?id=2 ">
                       <div class="form-group">
                  <div class="col-md-3 col-sm-3 col-xs-12 col-md-offset-8">
                    
                   
                    <img id="myImg" height="150px" width="150px" src="<?php echo "../image/".$row['image_path']; ?>" alt="your image" />
                    <input type='file' name="user_pic" accept=".jpg" autocomplete="off"  id="upload" onchange="return checkSize()" />
                 
                    </div>

                    </div>

                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name <span style='color:red;'>*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first_name" maxlength="30" name="first_name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $row['first_name'];?>" onblur="return onblurFname(this,1);" onkeypress="return checkFname(event,this);"  >
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-3 col-sm-3 col-xs-12 ">
                        
                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-12 " id="fnameError">
                        
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Last Name <span style='color:red;'>*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last_name" name="last_name" maxlength="30" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $row['last_name'];?>" onblur="return onblurLname(this,1);" onkeypress="return checkLname(event,this);">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-3 col-sm-3 col-xs-12 ">
                        
                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-12 " id="lnameError">
                        
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user_name">User ID
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="user_name" name="user_name" readonly="readonly" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $row['user_name'];?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">E-Mail<span style='color:red;'>*</span> 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="email" name="email" maxlength="70" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $row['email'];?>"onblur="return onblurEmail(this,1);" onkeypress="return checkEmail(event,this);">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-3 col-sm-3 col-xs-12 ">
                        
                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-12 " id="emailError">
                        
                        </div>
                      </div>
                      
                     
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-3 col-sm-6 col-xs-12 col-md-offset-6">
                          <button type="submit" style="width:150px" class="btn btn-success"  >Update</button>
                        </div>
                      </div>

                    </form>
                  </div>
              
              
      

          <div class="clearfix"></div>