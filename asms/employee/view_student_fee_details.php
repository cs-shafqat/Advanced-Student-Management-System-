<!DOCTYPE html>
<?php require("../require/connection.php");
  require("../require/sessions.php");
$reg=$_SESSION['reg'];
$ses=$_SESSION['ses'];
include("up.php");

  ?>
  <title>Student Fee Detials</title>
  <div class="col-md-12 ">


                 <div class="testbox" style=" min-height:30px;" >
                            <?php if (isset($_GET['status']) && $_GET['status'] == '1') {
                                  echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:green'>Record Entered Successfully!</span>";
                                  } else if (isset($_GET['status']) && $_GET['status'] == '2'){
                                      echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:red'> Sorry There is some issue, Try Again</span>";
                                    }
                                    else if (isset($_GET['status']) && $_GET['status'] == '3'){
                                      echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:red'> Fee Already Reset For This Month!!!</span>";
                                    }
                              ?>
                            </div>



                    

            <div class="clearfix"></div>
           <div class="x_panel">
                  <div class="x_title">
                    <h2 style="align:center;">Student Fee Details</h2>
                                        <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                    <div>
                      <a href="reset_fee_process.php"><button class="btn btn-info">Reset Fee</button> </a>
                    </div>

                    <div class="table-responsive">
                      <table id="datatable-buttons" class="table table-striped jambo_table ">
                        <thead>
                                
                          <tr class="headings">
                            <th class="column-title" >Student ID</th>
                            <th class="column-title" >Class</th>
                             <th class="column-title" >Fee</th>
                            <th class="column-title" >Remaining Dues</th>
                             <th class="column-title" >Fine</th>
                            <th class="column-title" >Exta Fee </th>
                            <th class="column-title" >Total </th>
                            <th class="column-title" >Action</th>
                            
                          </tr>
                        </thead>

                        <tbody>
                          <tr class="even pointer">
                            <?php
                                
                                  $sql = "SELECT * FROM fee_details WHERE school_reg = '$reg' AND session='$ses'";
                                  $result=mysql_query($sql);
                                 
                                  if (mysql_num_rows($result) > 0) {
                                  // output data of each row
                                  while($row= mysql_fetch_array( $result) ) {
                                  $title=$row['class_tital'];
                                  $sid=$row['student_id'];
                                  $fee=$row['fee'];
                                  $rfee=$row['remaining_duies'];
                                  $fine=$row['fine'];
                                  $efee=$row['extra_fee'];
                                  $total=$fee+$rfee+$fine+$efee;
                                  
                                  
                                 
                                  ?>
                            <td class=" "><?php echo $sid?></td>
                            <td class=" "><?php echo $title?></td>
                            
                            <td class=" "><?php echo $fee ?> </td>
                            <td class=" "><?php echo $rfee?> </td>
                            <td class=" "><?php echo $fine?></td>
                            <td class=" "><?php echo $efee?> </td>
                            <td class=" "><?php echo $total?></td> 
                            

                            <td class=" "> <a href="fee_submission.php ?id=<?php echo $sid;?>& id1=<?php echo $total;?>"><span class="label label-primary">Pay Fee</span></a> </td>
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