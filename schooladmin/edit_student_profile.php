
<?php require("../require/connection.php");
  require("../require/sessions.php");
$reg=$_SESSION['reg'];
include("up.php");?>
<title>Edit Student</title>

 <div class="col-md-8 col-md-offset-2 " >
 	   			
                <div class="testbox" style=" min-height:30px;" >
                      <?php       if (isset($_GET['status']) && $_GET['status'] == '1' ) {
                                  echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:green'>Record Entered Successfully!</span>";
                                  } else if (isset($_GET['status']) && $_GET['status'] == '2'){
                                      echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:red'> Sorry There is some issue, Try Again</span>";
                                    }
                           ?>  
                </div>
               <?php if(isset($_GET['id']))
               {$id=$_GET['id'];
               		include("view_student_profile.php");
               }
               else if(isset($_POST['id']))
               {
               	$id=$_POST['id'];
               		include("view_student_profile.php");
               }
               else 
               {
               	?>           
             <form class="form-horizontal form-label-left input_mask" method="post" action="edit_student_profile.php">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Enter Student-ID</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <select class="select2_single form-control " name="id" required="required" tabindex="-1">
                    <option value="">--select--</option>
                    <?php
                                  $s=$_SESSION['ses'];
                                  $reg=$_SESSION['reg'];
                                  $sql = "SELECT * FROM student WHERE school_reg= '$reg'";
                                  $result=mysql_query($sql);
                                  
                                  if (mysql_num_rows($result) > 0) {
                                  // output data of each row
                                  while($row = mysql_fetch_array( $result ))
                                   {
                                   
                                    ?>
                                      <option value="<?php echo $row['student_name'] ?>" ><?php echo $row['student_name']; ?></option>
                                    <?php
                                    
                                   }
                            }  else {
                            echo "No result Found";
                            }
                            ?>

                  </select>
                              </div>
                              <div class="col-md-3 col-sm-3 col-xs-12">
                              <button type="submit" class="btn btn-info" name="submit" style="width:150px">Enter</button>
                                
                              </div>
                            </div>
                            </form>
               <?php }?>
 </div>
<div class="clearfix"></div>
<?php include("down.php");?>