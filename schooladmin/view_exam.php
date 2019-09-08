<!DOCTYPE html>
<?php require("../require/connection.php");
  require("../require/sessions.php");
$reg=$_SESSION['reg'];
$ses=$_SESSION['ses'];
include("up.php");

  ?>
  <title>View Exam Detials</title>
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
                    <h2 style="align:center;">Exam Details</h2>
                                        <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                    <div class="table-responsive">
                      <table id="datatable-buttons" class="table table-striped jambo_table ">
                        <thead>
                                
                          <tr class="headings">
                            <th class="column-title" >Exam Title</th>
                            <th class="column-title" >Class </th>
                            <th class="column-title" >Start Date</th>
                            <th class="column-title" >End Date</th>
                            
                            <th class="column-title" style="width:10%">Action</th>
                            
                          </tr>
                        </thead>

                        <tbody>
                          <tr class="even pointer">
                            <?php
                                
                                  $sql = "SELECT * FROM term_exam WHERE school_reg = '$reg' AND session='$ses'";
                                  $result=mysql_query($sql);
                                 
                                  if (mysql_num_rows($result) > 0) {
                                  // output data of each row
                                  while($row= mysql_fetch_array( $result) ) {
                                  $class=$row['exam_class'];
                                  $title=$row['exam_tital'];
                                  $sdate=$row['start_date'];
                                  $edate=$row['end_date'];
                                  
                                  
                                 
                                  ?>

                            <td class=" "><?php echo $title?></td>
                            <td class=" "><?php echo $class ?> </td>
                            <td class=" "><?php echo $sdate ?> </td>
                            <td class=" "><?php echo $edate ?> </td>
                           
                            
                            

                            <td class=" "> <a href="edit_exam.php ?id=<?php echo $title;?>& id1=<?php echo $class;?> "><i class="fa fa-edit fa-fw"></i></a> ||   <a href="delete_exam_process.php?id=<?php echo $title;?>& id1=<?php echo $class;?>"  onclick="return confirm('Are you sure You Want To Delete it?');" id="show-option" title="Delete"> <i class="fa fa-eraser fa-fw" onclick=""></i></a> </td>
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