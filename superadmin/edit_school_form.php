 <?php
  require("../require/connection.php");
  require("../require/sessions.php"); 
  if(isset($_GET['id']))
   $id= $_GET['id'];
 $sql="SELECT * FROM school where registration_number='$id' limit 1";
 $result=mysql_query($sql);
$row=mysql_fetch_array($result);

  ?>
 <div class="col-md-12 col-sm-12 col-xs-12 ">
    <div class="x_panel">
      <div class="x_title">
        <h2>Edit School</h2>
        
        <div class="clearfix"></div>
      </div>
      <div class="x_content">
        <br />
        <form id="form" onsubmit="return editSchool()" class="form-horizontal form-label-left" method="post" action="update_school.php">

          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">School Name <span style='color:red;'>*</span>
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text" name="sname" required="required" dragable="false" autocomplete="off" class="form-control col-md-7 col-xs-12" value="<?php echo $row['school_name'];?>" id="first_name" onblur="return onblurFname(this,1);" onkeypress="return checkFname(event,this);"  >
            </div>
          </div>
          <div class="form-group">
                  <div class="col-md-3 col-sm-3 col-xs-12 ">
                  
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12 " id="fnameError">
                  
                  </div>
                </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Registration No. 
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="text"  name="rno" value="<?php echo $row['registration_number'];?>" readonly="true" required="required" dragable="false" autocomplete="off" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Start Date of Contract 
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="datetime"  name="sdate" id="sdate" readonly="true" required="required" dragable="false" autocomplete="off" class="form-control col-md-7 col-xs-12" value="<?php echo $row['contract_start_date'];?>">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Last Date of Contract  
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="datetime"  name="ldate" readonly="true" required="required" dragable="false" autocomplete="off" class="form-control col-md-7 col-xs-12" value="<?php echo $row['contract_end_date'];?>">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Update Contract Date   
            </label>
            <div class="col-md-6 col-sm-6 col-xs-12">
              <input type="date"  name="update" id="ldate" dragable="false" autocomplete="off" class="form-control col-md-7 col-xs-12" onblur="return onblurDate(this);" onchange="return onblurDate(this);">
            </div>
          </div>
          <div class="form-group">
                  <div class="col-md-3 col-sm-3 col-xs-12 ">
                  
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12 " id="dateError">
                  
                  </div>
                </div>
         
          <div class="ln_solid"></div>
          <div class="form-group">
            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-8">
              
            <button type="submit" class="btn btn-success">Update</button>

            </div>
          </div>
        </form>
        
          <div class="form-group">
            <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
              
           <a href="change_school_reg.php ?id=<?php echo $row['registration_number'];?>"><button type="submit" class="btn btn-warning">Change Registration Number</button></a>
             <a href="change_school_admin.php?id=<?php echo $row['registration_number'];?> "><button  class="btn btn-primary">Change Admin</button></a>

            </div>
        
      </div>
    </div>
  </div>
  <?php mysql_close($connection); ?>