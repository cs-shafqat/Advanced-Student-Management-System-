<title>Class Record</title>
<?php 
 require("../require/connection.php");
 require("../require/sessions.php");
$reg=$_SESSION['reg'];
include("up.php");
?>
  <div class="">



                     

              
            

                    <form class="form-horizontal form-label-left" accept-charset="utf-8" action="old_finance_log.php" method="post">

                      <div class="row">
                      <div class="col-md-3 col-md-offset-4">
                        <div class="form-group">
                        <label class="control-label" style="margin-bottom: 5px;">Session</label>
                          <select class="select2_single form-control" name="session" required="required" tabindex="-1">
                    <option value="">--select--</option>
                    <?php
                                  
                                  $sql3 = "SELECT * FROM session WHERE school_reg='$reg' AND status='0'";
                                  $result3=mysql_query($sql3);
                                  
                                  if (mysql_num_rows($result3) > 0) {
                                  // output data of each row
                                  while($row3 = mysql_fetch_array( $result3 )) {
                                 ?>
                                  <option value="<?php echo $row3['session_tital']; ?>" ><?php echo $row3['session_tital']; ?></option>
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
                            <button type="submit" name="submit" class="btn btn-info">Select Session</button>
                          </div>
                        

                    </div>
<?php include("down.php"); ?>            