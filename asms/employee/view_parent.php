<!DOCTYPE html>
<?php 

include("../include/up.php");
$reg=$_SESSION['reg'];
?>

                       <div class="col-md-12">
                 <div class="testbox" style=" min-height:30px;" >
                            <?php if (isset($_GET['status']) && $_GET['status'] == '1') {
                                  echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:green'>Record Entered Successfully!</span>";
                                  } else if (isset($_GET['status']) && $_GET['status'] == '2'){
                                      echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:red'> Sorry There is some issue, Try Again</span>";
                                    }
                                    else if (isset($_GET['status']) && $_GET['status'] == '3'){
                                      echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:red'> Student record attached to this ID</span>";
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
                      <table id="datatable-buttons" class="table table-striped jambo_table bulk_action">
                        <thead>
                                
                          <tr class="headings">
                            <th class="column-title">Parent Name</th>
                            <th class="column-title">Parent ID </th>
                            <th class="column-title">Phone </th>
                            
                            
                            
                            
                          </tr>
                        </thead>

                        <tbody>
                          <tr class="even pointer">
                            <?php
                                $n="";
                                  $sql = "SELECT * FROM parent WHERE school_reg = '$reg'";
                                  $result=mysql_query($sql);
                                 
                                  if (mysql_num_rows($result) > 0) {
                                  // output data of each row
                                  while($row= mysql_fetch_array( $result) ) {
                                  $f=$row['first_name'];
                                  $l=$row['last_name'];
                                  $u=$row['parent_name'];
                                  $c=$row['cell_no'];
                                  $n.=$f;
                                  $n.=" ";
                                  $n.=$l;
                                  
                                 
                                  ?>

                            <td class=" "><?php echo $n?></td>
                            <td class=" "><?php echo $u?> </td>
                            <td class=" "><?php echo $c ?> </td>
                            
                            

                            
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
     
<?php include("../include/down.php") ?> 