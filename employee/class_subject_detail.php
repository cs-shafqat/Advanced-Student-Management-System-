<!DOCTYPE html>
<?php
include("../include/up.php");
$reg=$_SESSION['reg'];
$ses=$_SESSION['ses'];


  ?>
  <title>Employee Record</title>
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
                    <h2 style="align:center;">Class Subject Details</h2>
                                        <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                    <div class="table-responsive">
                      <table id="datatable-buttons" class="table table-striped jambo_table ">
                        <thead>
                                
                          <tr class="headings">
                            <th class="column-title">Class</th>
                            <th class="column-title">Subject</th>
                            <th class="column-title">Subject Code</th>
                            <th class="column-title">Teacher </th>
                            
                            <th class="column-title">Action</th>
                            
                          </tr>
                        </thead>

                        <tbody>
                          <tr class="even pointer">
                            <?php
                               
                                  $sql="SELECT * FROM subject_class_record WHERE school_reg = '$reg' AND session='$ses'";
                                  $result=mysql_query($sql);
                                 
                                  if (mysql_num_rows($result) > 0) {
                                  // output data of each row
                                  while($row= mysql_fetch_array( $result) ) {
                                  $f=$row['class_title'];
                                  $l=$row['subject_title'];
                                  $u=$row['subject_code'];
                                  $c=$row['subject_teacher'];
                                 
                                  
                                 
                                  ?>

                            <td class=" "><?php echo $f?></td>
                            <td class=" "><?php echo $l?> </td>
                            <td class=" "><?php echo $u ?> </td>
                            <td class=" "><?php echo $c ?> </td>
                            
                            

                            <td class=" "> <a href="edit_subject_teacher.php ?id=<?php echo $f  ?>& id1=<?php echo $u ?> "><i class="fa fa-edit fa-fw"></i></a> ||   <a href="delete_process.php ?id=<?php echo $row['employee_name'];?> &id1=3 "  onclick="return confirm('Are you sure You Want To Delete it?');" id="show-option" title="Delete"> <i class="fa fa-eraser fa-fw" onclick=""></i></a></td>
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
  ?>
     
<?php include("../include/down.php") ?> 