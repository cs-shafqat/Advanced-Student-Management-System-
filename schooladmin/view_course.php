<!DOCTYPE html>
<?php require("../require/connection.php");
  require("../require/sessions.php");
$reg=$_SESSION['reg'];
$s=$_SESSION['ses'];
include("up.php");

 ?>
 <title>View Subject</title>

   <div class="testbox" style=" min-height:30px;" >
                      <?php       if (isset($_GET['status']) && $_GET['status'] == '1' ) {
                                  echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:green'>Record Entered Successfully!</span>";
                                  } else if (isset($_GET['status']) && $_GET['status'] == '2'){
                                      echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:red'> Sorry There is some issue, Try Again</span>";
                                    }
                           ?>  
                            </div>
            <div class="clearfix"></div>
           <div class="x_panel">
                  <div class="x_title">
                    <h2 style="align:center;">Subjects</h2>
                                        <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                    <div class="table-responsive">
                      <table id="datatable-buttons" class="table table-striped jambo_table ">
                        <thead>
                                
                          <tr class="headings">
                            <th class="column-title">Subject Title</th>
                            <th class="column-title">Subject Code</th>
                            <th class="column-title">Action</th>
                            
                          </tr>
                        </thead>

                        <tbody>
                          <tr class="even pointer">
                            <?php
                               
                                  $sql = "SELECT * FROM subject WHERE school_reg = '$reg' ";
                                  $result=mysql_query($sql);
                                 
                                  if (mysql_num_rows($result) > 0) {
                                  // output data of each row
                                  while($row= mysql_fetch_array( $result) ) {
                                  $t=$row['subject_tital'];
                                  $n=$row['subject_code'];
              
                                  
                                 
                                  ?>

                            <td class=" "><?php echo $t?></td>
                            <td class=" "><?php echo $n?> </td>
                         
                            
                            
                            

                            <td class=" "> <a href="edit_course.php ?id=<?php echo $n?> "><i class="fa fa-edit fa-fw"></i></a> ||   <a href="course_delete_process.php?id=<?php echo $n?> "  onclick="return confirm('Are you sure You Want To Delete it?');" id="show-option" title="Delete"> <i class="fa fa-eraser fa-fw" onclick=""></i></a></td>
                          </tr>
                          <?php
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
   include("down.php"); ?> 