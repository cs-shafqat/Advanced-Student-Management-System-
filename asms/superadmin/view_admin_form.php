<?php require("../require/connection.php");
  require("../require/sessions.php");
 ?>
<div class="x_panel">
                  <div class="x_title">
                    <h2 style="align:center;">View Admin</h2>
                                        <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                                
                          <tr class="headings">
                            <th class="column-title">First Name</th>
                            <th class="column-title">Last Name </th>
                            <th class="column-title">Email </th>
                            <th class="column-title">User Id</th>
                            <th class="column-title">Edit/Delete</th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
                          <tr class="even pointer">
                            <?php
                                  $user=$_SESSION['username'];
                                  $sql = "SELECT * FROM super_admin ";
                                  $result=mysql_query($sql);
                                  
                                  if (mysql_num_rows($result) > 0) {
                                  // output data of each row
                                  while($row = mysql_fetch_array( $result )) {
                                  if($user==$row['user_name'])
                                  {   
                                      continue;
                                  }
                                  ?>
                            <td class=" "><?php echo $row['first_name'];?></td>
                            <td class=" "><?php echo $row['last_name'];?> </td>
                            <td class=" "><?php echo $row['email'];?> </td>
                            <td class=" "><?php echo $row['user_name'];?></td>
                            <td class=" "> <a href="super_admin_profile.php ?id=<?php echo $row['user_name'];?>"><i class="fa fa-edit fa-fw"></i></a> ||   <a href="delete.php ?id=<?php echo $row['user_name'];?>&id1=1"  onclick="return confirm('Are you sure You Want To Delete it?');" id="show-option" title="Delete"> <i class="fa fa-eraser fa-fw" onclick=""></i></a></td>
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
