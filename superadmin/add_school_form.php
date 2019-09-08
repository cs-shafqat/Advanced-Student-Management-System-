<?php
require("../require/connection.php");
?>
 <div class="testbox" style=" min-height:30px;" >
                            <?php if (isset($_GET['status']) && $_GET['status'] == '1') {
                                  echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:green'>Record Entered Successfully!</span>";
                                  } else if (isset($_GET['status']) && $_GET['status'] == '2'){
                                      echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:red'> Sorry There is some issue, Try Again</span>";
                                    }
                              ?>
                            </div>
  <div class="col-md-12 col-sm-12 col-xs-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>Add School</h2>
        
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />
        <form id="form" onsubmit="return addSchool()" class="form-horizontal form-label-left" method="post" action="add_school_process.php?id=1">

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Name <span style='color:red;'>*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" name="sname" required="required" dragable="false" autocomplete="off" class="form-control col-md-7 col-xs-12" id="first_name"onblur="return onblurFname(this,1);" onkeypress="return checkFname(event,this);"  >
            </div>
          </div>
          <div class="form-group">
                  <div class="col-md-3 col-sm-3 col-xs-12 ">
                  
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12 " id="fnameError">
                  
                  </div>
                </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Registration No.<span style='color:red;'>*</span> 
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text"  name="rno" required="required" dragable="false" autocomplete="off" class="form-control col-md-7 col-xs-12" maxlength="11" minlength="1" id="txtNumeric" onblur="return onblurReg(this);">
            </div>
          </div>
          <div class="form-group">
                  <div class="col-md-3 col-sm-3 col-xs-12 ">
                  
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12 " id="regError">
                  
                  </div>
                </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Start Date of Contract <span style='color:red;'>*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="date"  name="sdate" id="sdate"  required="required" dragable="false" autocomplete="off" class="form-control col-md-7 col-xs-12" onblur="return onblurStartDate(this);" onchange="return onblurStartDate(this);">
            </div>
          </div>
          <div class="form-group">
                  <div class="col-md-3 col-sm-3 col-xs-12 ">
                  
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12 " id="startDateError">
                  
                  </div>
                </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Last Date of Contract  <span style='color:red;'>*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="date"  name="ldate" id="ldate" required="required" dragable="false" autocomplete="off" class="form-control col-md-7 col-xs-12" onblur="return onblurDate(this,1);" onchange="return onblurDate(this,1);">
            </div>
          </div>
          <div class="form-group">
                  <div class="col-md-3 col-sm-3 col-xs-12 ">
                  
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12 " id="dateError">
                  
                  </div>
                </div>
          <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Assigning Admin</label><span style='color:red;'>*</span>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="select2_single form-control" name="admin" required="required" tabindex="-1">
                    <option value="">--select--</option>
                    <?php
                                  
                                  $sql = "SELECT * FROM school_admin ";
                                  $result=mysql_query($sql);
                                  
                                  if (mysql_num_rows($result) > 0) {
                                  // output data of each row
                                  while($row = mysql_fetch_array( $result )) {
                                  if($row['status']==1)
                                  {   
                                      continue;
                                  }
                                  ?>
                    <option value="<?php echo $row['user_name'] ?>" ><?php echo $row['user_name']; ?></option>
                    <?php
                            }
                            }  else {
                            echo "No result Found";
                            }
                            ?>

                  </select>
                </div>
              </div>
         
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-3 col-sm-3 col-xs-12 col-md-offset-7">
              
              <button type="submit" class="btn btn-lg btn-success btn-block">ADD</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  
