   <?php 
  require("../require/connection.php");
  require("../require/sessions.php");
  $reg=$_SESSION['reg'];
  $ses=$_POST['session'];
  include("up.php");
?>
<form class="form-horizontal form-label-left" accept-charset="utf-8" action="view_old_result.php?id=<?php echo $ses; ?>" method="post">
                      
                        <div class="row">
                        <div class="col-md-3 col-md-offset-2">
                          <div class="form-group">
                          <label class="control-label" style="margin-bottom: 5px;">Class</label>
                            <select class="select2_single form-control" name="class" required="required" tabindex="-1">
                      <option value="">--select--</option>
                      <?php
                                    
                                    $sql3 = "SELECT * FROM class WHERE school_reg='$reg' AND session='$ses' ";
                                    $result3=mysql_query($sql3);
                                    
                                    if (mysql_num_rows($result3) > 0) {
                                    // output data of each row
                                    while($row3 = mysql_fetch_array( $result3 )) {
                                    
                                    ?>
                      <option value="<?php echo $row3['title']; ?>" ><?php echo $row3['title']; ?></option>
                      <?php
                              }
                              }  else {
                              echo "No Result Found";
                              }
                              ?>

                    </select>
                          </div>
                        </div>
                        <div class="col-md-3  ">
                          <div class="form-group">
                          <label class="control-label" style="margin-bottom: 5px;">Exam title</label>
                            <select class="select2_single form-control" required="true" name="exam_tital"  tabindex="-1">
                      <option value="">--select--</option>
                      <?php
                                    
                                    $sql3 = "SELECT * FROM term_exam WHERE school_reg='$reg' AND session='$ses' ";
                                    $result3=mysql_query($sql3);
                                    
                                    if (mysql_num_rows($result3) > 0) {
                                    // output data of each row
                                    while($row3 = mysql_fetch_array( $result3 )) {
                                    
                                    ?>
                      <option value="<?php echo $row3['exam_tital']; ?>" ><?php echo $row3['exam_tital']; ?></option>
                      <?php
                              }
                              }  else {
                              echo "No result Found";
                              }
                              ?>

                    </select>
                          </div>
                        </div>
                      <div class="col-md-2" style="margin-top: 30px;">
                            <button type="submit" name="submit" class="btn btn-info">View Result</button>
                          </div>
                          </div>
                          </form>


                          
<?php include("down.php"); ?> 