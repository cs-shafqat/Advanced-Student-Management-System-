
<?php
  require("../require/connection.php");
  require("../require/sessions.php"); 
$user=$_SESSION['username'];
 $sql="SELECT * FROM school_admin where user_name='$user' limit 1";
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
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" enctype="multipart/form-data" method="post"  action="update_profile.php ">

                                       <div class="form-group">
                  <div class="col-md-3 col-sm-3 col-xs-12 col-md-offset-8">
                    
                   
                    <img  id="myImg" height="150px" width="150px" src="<?php echo "../image/".$row['image_path']; ?>" alt="your image" />

                  <input type='file' name="user_pic"  accept=".jpg" autocomplete="off"  id="upload" onchange="return checkSize()" />
                
                    </div>
                    </div> 
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First Name 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="first_name" name="first_name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $row['first_name'];?>">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Last Name 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="last_name" name="last_name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $row['last_name'];?>">
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
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">E-Mail 
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $row['email'];?>">
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