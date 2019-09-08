<?php require("../require/connection.php");
  require("../require/sessions.php");
 ?>
<div class="x_panel">
                  <div class="x_title">
                    <h2 style="align:center;">View School</h2>
                                        <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                                
                          <tr class="headings">
                            <th class="column-title">School</th>
                            <th class="column-title">Registration No</th>
                            <th class="column-title">Contract Start Date</th>
                            <th class="column-title">Contract End Date</th>
                            <th class="column-title">Edit/Delete</th>
                            <th class="column-title">Status</th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
                          <tr class="even pointer">
                            <?php
                                  
                                  $sql = "SELECT * FROM school ";
                                  $result=mysql_query($sql);
                                  
                                  if (mysql_num_rows($result) > 0) {
                                  // output data of each row
                                  while($row = mysql_fetch_array( $result )) {
                                  
                                  ?>
                            <td class=" "><?php echo $row['school_name'];?></td>
                            <td class=" "><?php echo $row['registration_number'];?> </td>
                            <td class=" "><?php echo $row['contract_start_date'];?> </td>
                            <td class=" "><?php echo $row['contract_end_date'];?></td>
                            <td class=" "> <a href="edit_school.php ?id=<?php echo $row['registration_number'];?>"><i class="fa fa-edit fa-fw"></i></a> ||   <a href="delete.php ?id=<?php echo $row['registration_number'];?> &id1=3"  onclick="return confirm('Are you sure You Want To Delete it?');" id="show-option" title="Delete"> <i class="fa fa-eraser fa-fw" onclick=""></i></a></td>
                          <?php
                          if($row['status']==0)
                          {
                            ?>
                            <td class=" "><a href="sub_unsub_process.php?id=<?php echo $row['registration_number'];?>&id1=1" class="btn btn-round btn-success  " role="button" style="width:120px">SUBSCRIBE</a> </td>
                    <?php }
                          else if($row['status']==1)
                          {
                            ?>
                            <td class=" "><a href="sub_unsub_process.php?id=<?php echo $row['registration_number'];?>&id1=2" class="btn btn-round btn-danger  " role="button" style="width:120px">UNSUBSCRIBE</a> </td>
                    <?php
                          } 
                       ?>    
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
                    <?php
  
  mysql_close($connection);
  ?>
                  </div>
                </div>
              </div>
