<!DOCTYPE html>
<?php require("../require/connection.php");
  require("../require/sessions.php");
$reg=$_SESSION['reg'];
$s=$_SESSION['ses'];
include("up.php");

 ?>
<title>View Class</title>
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
                    <h2 style="align:center;">All Classes</h2>
                                        <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                    <div class="table-responsive">
                      <table id="datatable-buttons" class="table table-striped jambo_table ">
                        <thead>
                                
                          <tr class="headings">
                            <th class="column-title">Class Name</th>
                            <th class="column-title">Class Incharge Id </th>
                            <th class="column-title">No. of Students </th>
                            <th class="column-title">Max Strength </th>
                            
                            <th class="column-title">Edit/Delete</th>
                            
                          </tr>
                        </thead>

                        <tbody>
                          <tr class="even pointer">
                            <?php
                               
                                  $sql = "SELECT * FROM class WHERE school_reg = '$reg' AND session='$s' ";
                                  $result=mysql_query($sql);
                                 
                                  if (mysql_num_rows($result) > 0) {
                                  // output data of each row
                                  while($row= mysql_fetch_array( $result) ) {
                                  $t=$row['title'];
                                  $n=$row['count'];
                                  $s=$row['max_count'];
                                  $ci=$row['class_incharge_id'];
                                  
                                 
                                  ?>

                            <td class=" "><?php echo $t?></td>
                            <td class=" "><?php echo $ci?> </td>
                            <td class=" "><?php echo $n?> </td>
                            <td class=" "><?php echo $s ?> </td>
                            
                            
                            

                            <td class=" "> <a href="edit_class.php ?id=<?php echo $row['title'];?> "><i class="fa fa-edit fa-fw"></i></a> ||   <a href="delete_class_process.php?id=<?php echo $row['title'];?> "  onclick="return confirm('Are you sure You Want To Delete it?');" id="show-option" title="Delete"> <i class="fa fa-eraser fa-fw" onclick=""></i></a></td>
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