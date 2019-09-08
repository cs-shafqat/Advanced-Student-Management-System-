<?php
require("../require/connection.php");
  require("../require/sessions.php") ;
  $id=$_SESSION['username'];
  $reg=$_SESSION['reg'];
 include("up.php");
 ?>
  <div class="testbox" style=" min-height:30px;" >
<?php       
if (isset($_GET['status']) && $_GET['status'] == '1' ) {
   echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:green'>Record Entered Successfully!</span>";
 } else if (isset($_GET['status']) && $_GET['status'] == '2'){
  echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:red'> Sorry There is some issue, Try Again</span>";
 }
 else if (isset($_GET['status']) && $_GET['status'] == '3'){
 echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:red'> Class Name Already Exist. </span>";
 }
?>  
</div>
  <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-2">

             

              <div class="x_panel">
                <div class="x_title">
                  <h2>Add Class</h2>
                  
                     
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                <form class="form-horizontal form-label-left input_mask" method="post" action="add_class_process.php" >
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Class Title 
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" class="form-control alphaNumHyph" name="title" id="title"  required="required" >
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Max Strength 
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" class="form-control num" maxlength="2"  name="strength"   required="required" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">minimum age of student
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" class="form-control num"  maxlength="2" name="minage" required="required" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Class Incharge ID
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <select class="select2_single form-control " name="class_incharge_id" id="class_incharge_id" required="required" tabindex="-1">
                    <option value="">--select--</option>
                    <?php
                                 
                                  $reg=$_SESSION['reg'];
                                  $sql2 = "SELECT * FROM employee WHERE school_reg= '$reg'";
                                  $result2=mysql_query($sql2);
                                  
                                  if (mysql_num_rows($result2) > 0) {
                                  // output data of each row
                                  while($row2 = mysql_fetch_array( $result2 ))
                                   {
                                    
                                    ?>
                                      <option value="<?php echo $row2['employee_name'] ?>" ><?php echo $row2['employee_name']; ?></option>
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
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                    <div class="form-group ">
                     

                                           
                        <button type="submit" class="btn btn-success col-md-6 col-md-offset-6 col-sm-3 col-xs-12" name="submit" style="width:120px">Add</button>
                        
                      
                    </div>
                </div>
                </form>
              </div>
            </div>
              <div class="clearfix"></div>
            <?php include("down.php");?>