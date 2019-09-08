<!DOCTYPE html>
<?php require("../require/connection.php");
  require("../require/sessions.php");
$reg=$_SESSION['reg'];
$ses=$_SESSION['ses'];
include("up.php");

  ?>
  <title>View Test Detials</title>
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
                            <th class="column-title" >Test Title</th>
                            <th class="column-title" >Class </th>
                            <th class="column-title" >Subject</th>
                            <th class="column-title" >Total Marks</th>
                            
                            <th class="column-title" style="width:10%">Action</th>
                            
                          </tr>
                        </thead>

                        <tbody>
                          <tr class="even pointer">
                            <?php
                                
                                  $sql = "SELECT * FROM test WHERE school_reg = '$reg' AND session='$ses'";
                                  $result=mysql_query($sql);
                                 
                                  if (mysql_num_rows($result) > 0) {
                                  // output data of each row
                                  while($row= mysql_fetch_array( $result) ) {
                                  $title=$row['test_tital'];
                                  $class=$row['class_name'];
                                  $subject=$row['subject_id'];
                                  $tmarks=$row['total_marks'];
                                  
                                  
                                 
                                  ?>

                            <td class=" "><?php echo $title?></td>
                            <td class=" "><?php echo $class ?> </td>
                            <td class=" "><?php echo $subject ?> </td>
                            <td class=" "><?php echo $tmarks ?> </td>
                           
                            
                            

                            <td class=" "> <a href="edit_test.php ?id=<?php echo $title;?>& id1=<?php echo $class;?>& id2=<?php echo $subject;?> "><i class="fa fa-edit fa-fw"></i></a> ||   <a href="test_delete_process.php ?id=<?php echo $title;?>& id1=<?php echo $class;?>& id2=<?php echo $subject;?> "  onclick="return confirm('Are you sure You Want To Delete it?');" id="show-option" title="Delete"> <i class="fa fa-eraser fa-fw" onclick=""></i></a> </td>
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