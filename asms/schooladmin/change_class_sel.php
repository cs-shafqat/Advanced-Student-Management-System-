<title>Class Class</title>
<?php 
 require("../require/connection.php");
 require("../require/sessions.php");
$reg=$_SESSION['reg'];
$ses=$_SESSION['ses'];
include("up.php");
?>
  <div class="">


   <div class="testbox" style=" min-height:30px;" >
                            <?php if (isset($_GET['status']) && $_GET['status'] == '1') {
                                  echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:green'>Record Entered Successfully!</span>";
                                  } else if (isset($_GET['status']) && $_GET['status'] == '2'){
                                      echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:red'> Class Already Full.</span>";
                                    }
                              ?>
                            </div>
                     

              
            

                    <form class="form-horizontal form-label-left" accept-charset="utf-8" action="sel_change_class.php" method="post">

                      <div class="row">
                      <div class="col-md-3 col-md-offset-4">
                        <div class="form-group">
                        <label class="control-label" style="margin-bottom: 5px;">Student ID</label>
                          <select class="select2_single form-control" name="sid" required="required" tabindex="-1">
                    <option value="">--select--</option>
                    <?php
                                  
                                  $sql3 = "SELECT * FROM student_class_record WHERE session='$ses' AND school_reg='$reg' ";
                                  $result3=mysql_query($sql3);
                                  
                                  if (mysql_num_rows($result3) > 0) {
                                  // output data of each row
                                  while($row3 = mysql_fetch_array( $result3 )) {
                                 ?>
                                  <option value="<?php echo $row3['student_id']; ?>" ><?php echo $row3['student_id']; ?></option>
                              <?php
                                  }
                                  }  else {
                                  echo "No result Found";
                                  }
                                  ?>

                  </select>
                        </div>
                      </div>
							<div class="col-md-3" style="margin-top: 30px;">
                            <button type="submit" name="submit" class="btn btn-info">Select</button>
                          </div>
                        

                    </div>
<?php include("down.php"); ?>            