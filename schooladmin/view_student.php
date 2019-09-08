<!DOCTYPE html>
<?php require("../require/connection.php");
  require("../require/sessions.php");
$reg=$_SESSION['reg'];
include("up.php");

?>
<title>View Student</title>
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
                    <h2 style="align:center;">Student Record</h2>
                                        <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                    <div class="table-responsive">
                      <table id="datatable-buttons" class="table table-striped jambo_table ">
                        <thead>
                                
                          <tr class="headings">
                            <th class="column-title">Student Name</th>
                            <th class="column-title">Student ID </th>
                            <th class="column-title">Parent Name </th>
                            <th class="column-title">Parent ID</th>
                            <th class="column-title">Class</th>
                            <th class="column-title">Edit/Delete</th>
                          </tr>
                        </thead>

                        <tbody>
                          <tr class="even pointer">
                            <?php
                                $n="";
                                  $sql = "SELECT * FROM student WHERE school_reg = '$reg'";
                                  $result=mysql_query($sql);
                                 
                                  if (mysql_num_rows($result) > 0) {
                                  // output data of each row
                                  while($row= mysql_fetch_array( $result) ) {
                                  $f=$row['first_name'];
                                  $l=$row['last_name'];
                                  $u=$row['student_name'];
                                  $n.=$f;
                                  $n.=" ";
                                  $n.=$l;
                                  if (isset($_POST['submit'])) {
                                    $search_for=$_POST['search_for'];
                                    $search=$_POST['search'];
                                    if ($search_for=="name") {
                                      if (strstr(strtolower($n), strtolower($search))=="") {
                                        $n="";
                                        continue;
                                      }
                                    }
                                    elseif ($search_for=="userid") {
                                      if (strstr(strtolower($u), strtolower($search))=="") {
                                        $n="";
                                        continue;
                                      }
                                    }
                                  }
                                  $sql2="SELECT * FROM parent_student_record WHERE student_id = '$u' AND school_reg= '$reg'";
                                  $result2=mysql_query($sql2);
                                  $row2=mysql_fetch_array($result2);
                                  $pu=$row2['parent_id'];
                                  $sql3="SELECT * FROM parent WHERE parent_name = '$pu'";
                                  $result3=mysql_query($sql3);
                                  $row3=mysql_fetch_array($result3);
                                  $pf=$row3['first_name'];
                                  $pl=$row3['last_name'];
                                  ?>

                            <td class=" "><?php echo $n?></td>
                            <td class=" "><?php echo $u?> </td>
                            <td class=" "><?php echo $pf.' '. $pl ?> </td>
                            <td class=" "><?php echo $pu?></td>
                            <td class=" "><?php echo $row['class'];?></td>
                            

                            <td class=" "> <a href="edit_student_profile.php ?id=<?php echo $row['student_name'];?> "><i class="fa fa-edit fa-fw"></i></a> ||   <a href="delete_process.php ?id=<?php echo $row['student_name'];?> & id1=1 "  onclick="return confirm('Are you sure You Want To Delete it?');" id="show-option" title="Delete"> <i class="fa fa-eraser fa-fw" onclick=""></i></a></td>
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