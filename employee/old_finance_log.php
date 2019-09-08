<!DOCTYPE html>
<?php require("../require/connection.php");
  require("../require/sessions.php");
$reg=$_SESSION['reg'];
$ses=$_POST['session'];
include("up.php");

  ?>
  <title>Finance Logs</title>
  <div class="col-md-12 ">
            <div class="clearfix"></div>
           <div class="x_panel">
                  <div class="x_title">
                    <h2 style="align:center;">Finance_logs</h2>
                                        <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                    <div class="table-responsive">
                      <table id="datatable-buttons" class="table table-striped jambo_table ">
                        <thead>
                                
                          <tr class="headings">
                            <th class="column-title" >Student ID</th>
                            <th class="column-title" >Amount</th>
                             <th class="column-title" >Date</th>
                            <th class="column-title" >Recived By</th>
                            
                          </tr>
                        </thead>

                        <tbody>
                          <tr class="even pointer">
                            <?php
                                
                                  $sql = "SELECT * FROM fee_submission WHERE school_reg = '$reg' AND session='$ses'";
                                  $result=mysql_query($sql);
                                 
                                  if (mysql_num_rows($result) > 0) {
                                  // output data of each row
                                  while($row= mysql_fetch_array( $result) ) {
                                  $sid=$row['student_id'];
                                  $amount=$row['amount'];
                                  $d=$row['submission_date'];
                                  $aid=$row['submitted_by'];
                                  
                                  
                                  
                                 
                                  ?>
                            
                            <td class=" "><?php echo $sid?></td>
                            <td class=" "><?php echo $amount?></td>
                            <td class=" "><?php echo $d ?> </td>
                            <td class=" "><?php echo $aid?> </td>
                            </tr>

                            
                          <?php
                          $n="";
                        }
                            }  else {
                            echo "No result Found";
                            }
                            ?>
                          
                        </tbody>
                      </table>
                    </div>
              </div>
                </div>
              </div>
        
                <div class="clearfix"></div>
              </div>
                              <?php
  
  mysql_close($connection);
  ?>
     
<?php include("down.php") ?> 