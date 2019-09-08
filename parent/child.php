<?php 
  require("../require/connection.php");
  require("../require/sessions.php");
  $check123=substr($_SESSION['username'], 0,3);
  if($check123!="PAR"){
    session_unset();
    session_destroy();
    header("location:../index.php");
    exit();
  }
  $pid=$_SESSION['username'];
$reg=$_SESSION['reg'];
$ses=$_SESSION['ses'];
include("../include/up.php");
  ?>
  <title>Child</title>
  <form class="form-horizontal form-label-left" accept-charset="utf-8" action="child.php" method="post">

                      <div class="row">
                      <div class="col-md-3 col-md-offset-4">
                        <div class="form-group">
                        <label class="control-label" style="margin-bottom: 5px;">Child</label>
                          <select class="select2_single form-control" required="true" name="student_id"  tabindex="-1">
                      <option value="">--select--</option>
                      <?php
                                    
                                    $sql1="SELECT student_id FROM parent_student_record WHERE parent_id='$pid' AND school_reg='$reg'";
                                    $result1=mysql_query($sql1);
                                    
                                    if (mysql_num_rows($result1) > 0) {
                                    // output data of each row
                                    while($row3 = mysql_fetch_array( $result1 )) {
                                    
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
                            <button type="submit" name="submit" class="btn btn-info">Show</button>
                          </div>
                  </div>
                </form>
<?php if (isset($_POST['submit'])||isset($_POST['submit_result'])||isset($_POST['submit_test'])) { 
     $sid=$_POST['student_id'];
$sql="SELECT * FROM student_class_record WHERE student_id='$sid' AND session='$ses' AND school_reg='$reg' ";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);
$class=$row['class_tital'];
  ?>
  
<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2> Child<small><?php echo $sid; ?></small></h2>
                    
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <!--tab-->
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab1" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation"  class="<?php if((!isset($_POST['submit_result']))&&(!isset($_POST['submit_test']))) { echo "active"; } ?>" ><a href="#profile" id="profile-tabb" role="tab" data-toggle="tab" aria-controls="profile" aria-expanded="false">Profile</a>
                        </li>
                        <li role="presentation" class=""><a href="#attendance" role="tab" id="attendance-tabb" data-toggle="tab" aria-controls="attendance" aria-expanded="false">Attendance</a>
                        </li>
                        <li role="presentation" class="<?php if(isset($_POST['submit_result'])){ echo "active"; } ?>" ><a href="#result" role="tab" id="result-tabb" data-toggle="tab" aria-controls="result" aria-expanded="false">Result</a>
                        </li>
                        <li role="presentation" class="<?php if(isset($_POST['submit_test'])){ echo "active"; } ?>" ><a href="#test" role="tab" id="test-tabb" data-toggle="tab" aria-controls="test" aria-expanded="false">Test</a>
                        </li>
                        <li role="presentation" class=""><a href="#class_schedule" role="tab" id="class_schedule-tabb" data-toggle="tab" aria-controls="class_schedule" aria-expanded="false">Class Schedule</a>
                        </li>
                        <li role="presentation" class=""><a href="#fee_details" role="tab" id="fee_details-tabb" data-toggle="tab" aria-controls="fee_details" aria-expanded="false">Fee Details</a>
                        </li>
                        <li role="presentation" class=""><a href="#ptm" role="tab" id="ptm-tabb" data-toggle="tab" aria-controls="ptm" aria-expanded="false">PTM</a>
                        </li>
                      </ul>
                      <div id="myTabContent2" class="tab-content">
                        <div role="tabpane1" class="tab-pane fade  <?php if((!isset($_POST['submit_result']))&&(!isset($_POST['submit_test']))){ echo " active in"; } ?>" id="profile" aria-labelledby="profile-tab">
                        <?php include("student_profile.php"); ?>

                        </div>    
                        <div role="tabpanel" class="tab-pane fade" id="attendance" aria-labelledby="attendance-tab">
                         <?php include("student_attendance.php");?>
              
                        </div>
                        <div role="tabpanel" class="tab-pane fade  <?php if(isset($_POST['submit_result'])){ echo " active in"; } ?>"  id="result" aria-labelledby="result-tab">
                          <?php include("student_result.php"); ?>
                        </div>
                        <div role="tabpanel" class="tab-pane fade  <?php if(isset($_POST['submit_test'])){ echo " active in"; } ?>"  id="test" aria-labelledby="test-tab">
                         <?php include("student_test.php");  ?>
                          </div>

                        <div role="tabpanel" class="tab-pane fade" id="class_schedule" aria-labelledby="class_schedule-tab">
                          
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="fee_details" aria-labelledby="fee_details-tab">
                          <?php include("student_fee_details.php"); ?>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="ptm" aria-labelledby="ptm-tab">
                          <?php include("ptm.php"); ?>
                        </div>
                      </div>
                    </div>
                    <!--/tab-->
                  </div>
                </div>
              </div>
              <div class="clearfix"></div>
<?php } include("../include/down.php");?>