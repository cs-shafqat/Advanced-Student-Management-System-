<?php
@require("../require/connection.php");
if(isset($_GET['id']))
  $id=$_GET['id'];
$sql ="SELECT * FROM school WHERE registration_number = '$id'";
$result=mysql_query($sql); 
$row=mysql_fetch_array($result);
?>


  <div class="col-md-12 col-sm-12 col-xs-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>Change Registration</h2>
        
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />
        <form class="form-horizontal form-label-left" method="post" action="change_reg_process.php">

          <div class="form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">School Name 
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" name="sname" readonly="true" value="<?php echo $row['school_name'];?>" required="required" dragable="false" autocomplete="off" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12" for="first-name">Registration Number 
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" name="reg" readonly="true" value="<?php echo $row['registration_number'];?>"  required="required" dragable="false" autocomplete="off" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-4 col-sm-3 col-xs-12" for="last-name">New Registration Number 
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text"  name="new_reg" required="required" dragable="false" autocomplete="off" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-3 col-sm-3 col-xs-12 col-md-offset-9">
              
              <button type="submit" class="btn btn-success">Update</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
