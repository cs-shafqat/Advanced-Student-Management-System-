<!DOCTYPE html>
<?php require("../require/connection.php");
  require("../require/sessions.php");
$reg=$_SESSION['reg'];
$ses=$_SESSION['ses'];
if(isset($_GET['id']))
{
  $class=$_GET['id'];
include("up.php");

  ?>
  <title>Fee Detials</title>
  <div class="col-md-8 col-md-offset-2 ">


             

            <div class="x_panel">
                <div class="x_title">
                  <h2>Add Class Fee</h2>
                  
                     
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                <form class="form-horizontal form-label-left input_mask" method="post" action="update_fee_process.php" >
                 
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Class 
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" class="form-control" readonly="true" value="<?php echo $class ?>" id="txtNumeric" name="class" id="class"  required="required" >
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Enter Fee 
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" class="form-control num" maxlength="5" name="fee" id="fee"  required="required" >
                    </div>
                  </div>
                 
                    
                  
                  

                  <div class="ln_solid"></div>
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                    <div class="form-group ">
                     

                                           
                        <button type="submit" class="btn btn-success col-md-6 col-md-offset-6 col-sm-3 col-xs-12" name="submit" style="width:120px">Update</button>
                        
                      
                    </div>
                </div>
                </form>
              </div>
            </div>
                

                    

            <div class="clearfix"></div>
                         </div>
        
                <div class="clearfix"></div>
              
                              <?php
  
  mysql_close($connection);
  ?>
     
<?php include("down.php"); } 
else
{
  header("Location: view_fee_details.php");
}
?> 