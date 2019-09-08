<!DOCTYPE html>
<?php require("../require/connection.php");
  require("../require/sessions.php");
$reg=$_SESSION['reg'];
$ses=$_SESSION['ses'];
include("up.php");
$id=$_GET['id'];
$sql="SELECT * FROM fine WHERE fine_tital='$id' AND school_reg='$reg' AND session='$ses'";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);
  ?>
  <title>Edit Fine</title>
  <div class="col-md-8 col-md-offset-2 ">


                 <div class="testbox" style=" min-height:30px;" >
                            <?php if (isset($_GET['status']) && $_GET['status'] == '1') {
                                  echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:green'>Record Entered Successfully!</span>";
                                  } else if (isset($_GET['status']) && $_GET['status'] == '2'){
                                      echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:red'> Sorry There is some issue, Try Again</span>";
                                    }
                              ?>
                            </div>
             <div class="x_panel">
                <div class="x_title">
                  <h2>Edit Fine</h2>
                  
                     
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                <form class="form-horizontal form-label-left input_mask" method="post" action="update_fine_process.php" >
                 
               <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Fine Title</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" class="form-control"  name="fine" id="fine" Value="<?php echo $row['fine_tital'] ?>" required="required">
                  
                </div>
              </div>
               <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Fine Discription</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" class="form-control" name="description" Value="<?php echo $row['fine_discription'] ?>" name="description" >
                  
                </div>
              </div>
               <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Amount</label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" class="form-control" id="txtNumeric" Value="<?php echo $row['amount'] ?>" name="amount" id="amount" required="required" >
                  
                </div>
              </div>
                    
                  
                  

                  <div class="ln_solid"></div>
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                    <div class="form-group ">
                     

                                           
                        <button type="submit" class="btn btn-success col-md-6 col-md-offset-6 col-sm-3 col-xs-12" name="submit" style="width:120px">ADD</button>
                        
                      
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
     
<?php include("down.php") ?> 