<!DOCTYPE html>
<?php 
require("../require/connection.php");
require("../require/sessions.php");
$reg=$_SESSION['reg'];
$ses=$_SESSION['ses'];
include("up.php");

?>

  <div class="">



                    

               <?php if (isset($_POST['submit'])) {  
                $title=$_POST['title'];
                $rtype=$_POST['rtype'];

                if($rtype==2)
                {
                ?>
                  

                    <form onsubmit="return addresult()" class="form-horizontal form-label-left" accept-charset="utf-8" action="check_result.php?id=2" method="post">
                    
                      <div class="row">
                     <input class="" type="text" style="display:none" value="<?php echo $title ?>" name="class">
                      <div class="col-md-3 ">
                        <div class="form-group">
                        <label class="control-label" style="margin-bottom: 5px;">Subject</label>
                          <select class="select2_single form-control" name="subject_code" required="required" tabindex="-1">
                    <option value="">--select--</option>
                    <?php
                                  
                                  $sql3 = "SELECT * FROM subject_class_record WHERE school_reg='$reg' AND class_title='$title' AND session='$ses' ";
                                  $result3=mysql_query($sql3);
                                  
                                  if (mysql_num_rows($result3) > 0) {
                                  // output data of each row
                                  while($row3 = mysql_fetch_array( $result3 )) {
                                  
                                  ?>
                    <option value="<?php echo $row3['subject_code']; ?>" ><?php echo $row3['subject_code']."   (".$row3['subject_title'].")"; ?></option>
                    <?php
                            }
                            }  else {
                            echo "No result Found";
                            }
                            ?>

                  </select>
                        </div>
                      </div>
                      <div class="col-md-3 ">
                        <div class="form-group">
                        <label class="control-label" style="margin-bottom: 5px;">Exam title</label>
                          <select class="select2_single form-control" required="true" name="exam_tital" id="exam_tital"  tabindex="-1">
                    <option value="">--select--</option>
                    <?php
                                  
                                  $sql3 = "SELECT * FROM term_exam WHERE school_reg='$reg' AND exam_class='$title' AND session='$ses' ";
                                  $result3=mysql_query($sql3);
                                  $sdate=array();
                                  $edate=array();
                                  if (mysql_num_rows($result3) > 0) {
                                  // output data of each row
                                  while($row3 = mysql_fetch_array( $result3 )) {
                                  array_push($sdate, $row3['start_date']);
                                  array_push($edate, $row3['end_date']);
                                  ?>
                    <option value="<?php echo $row3['exam_tital']; ?>" ><?php echo $row3['exam_tital']; ?></option>
                    <?php
                            }
                               echo '<script>';
                                echo 'var start_date = ' . json_encode($sdate) . ';';
                                echo 'var end_date = ' . json_encode($edate) . ';';
                                echo '</script>';
                            }  else {
                            echo "No result Found";
                            }
                            ?>

                  </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                        <label class="control-label" style="margin-bottom: 5px;">Exam Date</label>
                          <input class="date-picker form-control" type="date" id="date" name="date" required="true" onfocus="onfocusdate()" onchange="return examdate(this)"  />
                        </div>
                      </div>
                      
                      
                      
                          <div class="col-md-3" style="margin-top: 30px;">
                            <button type="submit" name="submit" class="btn btn-info">Show Result List</button>
                          </div>
                        <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 " >
                  
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12 " id="dateError">
                  
                  </div>
                </div>

                    </div>
                                     </form>
           
            
          <?php }
            else if($rtype==1)
            {
              ?>
              <form class="form-horizontal form-label-left" accept-charset="utf-8" action="check_result.php?id=1" method="post">
                    
                      <div class="row">
                     <input class="" type="text" style="display:none" value="<?php echo $title ?>" name="class">
                     
                      <div class="col-md-4 ">
                        <div class="form-group">
                        <label class="control-label" style="margin-bottom: 5px;">test title</label>
                          <select class="select2_single form-control" required="true" name="test_tital"  tabindex="-1">
                    <option value="">--select--</option>
                    <?php
                                  
                                  $sql3 = "SELECT * FROM test WHERE school_reg='$reg' AND class_name='$title' AND session='$ses' ";
                                  $result3=mysql_query($sql3);
                                  
                                  if (mysql_num_rows($result3) > 0) {
                                  // output data of each row
                                  while($row3 = mysql_fetch_array( $result3 )) {
                                  
                                  ?>
                    <option value="<?php echo $row3['test_tital']; ?>" ><?php echo $row3['test_tital']; ?></option>
                    <?php
                            }
                            }  else {
                            echo "No result Found";
                            }
                            ?>

                  </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                        <label class="control-label" style="margin-bottom: 5px;">Test Date</label>
                          <input class="date-picker form-control" type="date" name="date" required="true"/>
                        </div>
                      </div>
                      
                      
                      
                          <div class="col-md-3" style="margin-top: 30px;">
                            <button type="submit" name="submit" class="btn btn-info">Show Result List</button>
                          </div>
                        

                    </div>
                                     </form>
           <?php }


           }
     
 include("down.php"); ?> 