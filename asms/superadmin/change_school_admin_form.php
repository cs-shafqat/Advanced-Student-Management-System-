<?php require("../require/connection.php");
  require("../require/sessions.php");
if(isset($_GET['id']))
  $id=$_GET['id'];
 $sql="SELECT * FROM school where registration_number='$id' limit 1";
 $result=mysql_query($sql);
$row=mysql_fetch_array($result);
$sql1="SELECT * FROM school_admin_record where school_reg='$id' limit 1";
$result1=mysql_query($sql1);
$row1=mysql_fetch_array($result1);
  ?>
<div class="col-md-12 col-sm-12 col-xs-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>Change School Admin</h2>
        
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />
        <form class="form-horizontal form-label-left" method= "post" action="change_school_admin_process.php">

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Name 
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" name="sname" required="required" value="<?php echo $row['school_name'];?>" readonly="readonly" dragable="false" autocomplete="off" class="form-control col-md-7 col-xs-12 ">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Registration No. 
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text"  name="rno" required="required" value="<?php echo $row['registration_number'];?>" readonly="readonly" dragable="false" autocomplete="off" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Old Assigned Admin 
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text"  name="old_admin" required="required" value="<?php echo $row1['admin_id'];?>" readonly="readonly" dragable="false" autocomplete="off" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          
          <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">New Assigning Admin</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <select class="select2_single form-control" name="new_admin" required="required" tabindex="-1">
                    <option value="">--select--</option>
                    <?php
                                  
                                  $sql3 = "SELECT * FROM school_admin ";
                                  $result3=mysql_query($sql3);
                                  
                                  if (mysql_num_rows($result3) > 0) {
                                  // output data of each row
                                  while($row3 = mysql_fetch_array( $result3 )) {
                                  if($row3['status']==1)
                                  {   
                                      continue;
                                  }
                                  ?>
                    <option value="<?php echo $row3['user_name']; ?>" ><?php echo $row3['user_name']; ?></option>
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
              
              <button type="submit" class="btn btn-success">Update</button>
            </div>
          </div>
        </form>
      </div>
    </div>
   <?php mysql_close($connection); ?> 