<!DOCTYPE html>
<?php require("../require/connection.php");
  require("../require/sessions.php");
$reg=$_SESSION['reg'];
$ses=$_SESSION['ses'];
include("up.php");

  ?>
  <title>Fine Details</title>
  <div class="col-md-12 ">


                 <div class="testbox" style=" min-height:30px;" >
                            <?php if (isset($_GET['status']) && $_GET['status'] == '1') {
                                  echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:green'>Record Entered Successfully!</span>";
                                  } else if (isset($_GET['status']) && $_GET['status'] == '2'){
                                      echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:red'> Sorry There is some issue, Try Again</span>";
                                    }
                              ?>
                            </div>



                    

            <div class="clearfix"></div>
           <div class="x_panel">
                  <div class="x_title">
                    <h2 style="align:center;">Fine Details</h2>
                                        <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                    <div class="table-responsive">
                      <table id="datatable-buttons" class="table table-striped jambo_table ">
                        <thead>
                                
                          <tr class="headings">
                            <th class="column-title" style="width:20%">Student ID</th>
                            <th class="column-title" style="width:40%">Fine Title</th>
                            <th class="column-title" style="width:20%">Date</th>
                            <th class="column-title" style="width:20%">Amount</th>
                            
                            
                          </tr>
                        </thead>

                        <tbody>
                          <tr class="even pointer">
                            <?php
                                
                                  $sql = "SELECT * FROM fine_details WHERE school_reg = '$reg' AND session='$ses'";
                                  $result=mysql_query($sql);
                                 
                                  if (mysql_num_rows($result) > 0) {
                                  // output data of each row
                                  while($row= mysql_fetch_array( $result) ) {
                                  $title=$row['fine_title'];
                                  $sid=$row['student_id'];
                                  $d=$row['fine_date'];
                                  $fee=$row['amount'];
                                  
                                  
                                  
                                 
                                  ?>
                            <td class=" "><?php echo $sid?></td>
                            <td class=" "><?php echo $title?></td>
                            <td class=" "><?php echo $d ?> </td>
                            <td class=" "><?php echo $fee?> </td> 
                            

                           </tr>                          <?php
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