<!DOCTYPE html>
<?php require("../require/connection.php");
  require("../require/sessions.php");
$reg=$_SESSION['reg'];
include("up.php");
if(isset($_GET['id']) && isset($_GET['id1']))
{$std=$_GET['id'];
$pcnic=$_GET['id1'];}
if(isset($_GET['check1'])){
  $pcnic=$_GET['check1'];
}
 ?>
      

              <div class="col-md-8 col-md-offset-2 ">
                          
  <?php $sql="SELECT * FROM parent WHERE cnic= '$pcnic' AND school_reg='$reg'";
  $result=mysql_query($sql);
  $row=mysql_fetch_array($result);  
?>
    <div class="x_panel">
      <div class="x_title">
        <h2>Parent information</h2>
        
        
        <div class="clearfix"></div>
      </div>
  
<form class="form-horizontal form-label-left input_mask" method="post" action="update_parent_process.php?id=1" enctype="multipart/form-data" >

         <div class="clearfix"></div>
            
            <br>
                <div class="clearfix"></div>
                         <div class="form-group">
                  <div class="col-md-3 col-sm-3 col-xs-12 col-md-offset-8">
                    
                   
                    <img id="myImg" height="150px" width="150px" src="<?php echo "image/".$row['image_path']; ?>" alt="your image" />
                     <input type='file' name="myImg" />
                    </div>

                    </div>
               <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Parent User Name</label>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <input type="text" class="form-control" readonly="true" name="puser_name" readonly="true" value="<?php echo $row['parent_name']; ?>">  
                </div>
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Student ID</label>
                <div class="col-md-3 col-sm-3 col-xs-12">
                  <?php
                if(isset($_GET['id']))
                  { $student_id=$_GET['id'];
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
                                  $sql2 = "SELECT * FROM student WHERE school_reg= '$reg'";
                                  $result2=mysql_query($sql2);
                                  
                                  if (mysql_num_rows($result2) > 0) {
                                  // output data of each row
                                  while($row2 = mysql_fetch_array( $result2 ))
                                   {
                                    $t=$row2['student_name'];
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
                                      <option value="<?php echo $row2['student_name'] ?>" ><?php echo $row2['student_name']; ?></option>
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
                <input type="text" class="form-control has-feedback-left" readonly="true" name="pfirst_name" value="<?php echo $row['first_name']; ?>" required="required" placeholder="First Name">
                <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="text" class="form-control" readonly="true" name="plast_name" value="<?php echo $row['last_name']; ?>" required="required" placeholder="Last Name">
                <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="email" class="form-control has-feedback-left" readonly="true" name="pemail" value="<?php echo $row['email']; ?>" required="required" placeholder="example@xyz.com">
                <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
              </div>

              <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                <input type="text" class="form-control" name="pphone" readonly="true" value="<?php echo $row['cell_no']; ?>" required="required" data-inputmask="'mask' : '(+99) 999-9999999'" placeholder="Phone">
                <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Nationality</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" readonly="true" value="<?php echo $row['nationality']; ?>" name="pnationality" required="required" placeholder="Nationality">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">CNIC</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" readonly="true" value="<?php echo $row['cnic']; ?>" name="pcinc" required="required" data-inputmask="'mask' : '99999-9999999-9'">
                  
                </div>
              </div>
              
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Gender</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                   <p>
                <?php $g=$row['gender']; ?>
                  <input type="radio" class="flat" readonly="true"   name="pgender" id="genderM" value="M"<?php if($g=='M')
                { ?> checked="true" <?php }?>  required /> Male
                <input type="radio" class="flat" name="pgender" readonly="true" id="genderF" value="F" <?php if($g=='F')
                { ?> checked="true" <?php }?> /> Female
                </p>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Date Of Birth 
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input class="date-picker form-control col-md-7 col-xs-12" readonly="true" value="<?php echo $row['dob']; ?>" name="pdob" required="required" type="date" >
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Current Address</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" rows="3" name="pcaddress" readonly="true" value="<?php echo $row['current_address']; ?>" required="required"></input>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Permanent Address</label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" rows="3" name="ppaddress" readonly="true" value="<?php echo $row['permanent_address']; ?>" required="required"></input>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Occupation 
                </label>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input type="text" class="form-control" required="required" readonly="true" value="<?php echo $row['occupation']; ?>" name="occupation" placeholder="Occupation">
                </div>
              </div>
              <div class="ln_solid"></div>
          <div class="form-group ">
            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-6">
             <a href="add_parent.php?id=<?php echo $_GET['id']; ?>"> <button type="button" class="btn btn-default col-md-3 col-sm-3 col-xs-12" name="submit" style="width:150px"> not Confirm</button></a>
              <button type="submit" class="btn btn-success col-md-3 col-sm-3 col-xs-12" name="submit" style="width:150px">Confirm</button>
              </div>
              </div>

            </form>
          </div>
       
  
                     <div class="clearfix"></div>
                
              </div>
              
<?php  include("down.php");?> 