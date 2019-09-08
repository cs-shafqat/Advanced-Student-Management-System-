<?php require("../require/connection.php");
  require("../require/sessions.php");
 ?>
<div class="x_panel">
                  <div class="x_title">
                    <h2 style="align:center;">View School Admin</h2>
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
                            <th class="column-title">Phone Number</th>
                            <th class="column-title">School</th>
                            <th class="column-title">Edit/Delete</th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>

                        <tbody>
                          <tr class="even pointer">
                            <?php
                                  
                                  // $sql = "SELECT school_admin.first_name,
                                  //                school_admin.last_name,
                                  //                school_admin.email,
                                  //                school_admin.user_name,
                                  //                school_admin.phone,
                                  //                school.school_name
                                  //                FROM school_admin_record
                                  //                INNER JOIN school_admin ON school_admin.user_name=school_admin_record.admin_id
                                  //                INNER JOIN school ON school.registration_number=school_admin_record.school_reg";
                                  $sql = "SELECT * FROM school_admin";
                                  $result=mysql_query($sql);
                                  if (mysql_num_rows($result) > 0) {
                                  // output data of each row
                                  while($row = mysql_fetch_array( $result )) {
                                  
                                  ?>
                            <td class=" "><?php echo $row['first_name'];?></td>
                            <td class=" "><?php echo $row['last_name'];?> </td>
                            <td class=" "><?php echo $row['email'];?> </td>
                            <td class=" "><?php echo $row['user_name'];?></td>
                            <td class=" "><?php echo $row['phone'];?></td>
                            <?php
                            $user=$row['user_name'];
                            $sql1 = "SELECT school.school_name, school_admin_record.admin_id
                                                 FROM school_admin_record
                                                 INNER JOIN school_admin ON school_admin.user_name=school_admin_record.admin_id
                                                 INNER JOIN school ON school.registration_number=school_admin_record.school_reg";
                             $result1=mysql_query($sql1);
                             $count=0;
                             if($result1>0)
                             {
                              
                              while($row1 = mysql_fetch_array( $result1 ))
                                {
                                   
                                    if($user==$row1['admin_id']) 
                                     {           
                                     ?><td class=" "><?php echo $row1['school_name'];?></td>

                                     <?php $count=1;
                                     break;
                                   }
                                }
                              }
                             if($count == 0)
                             {
                                ?><td class=" ">- - - - - - - - - - - - - - - - - </td>
                                <?php
                             }
                             ?>

                            <td class=" "> <a href="school_admin_profile.php ?id=<?php echo $row['user_name'];?>"><i class="fa fa-edit fa-fw"></i></a> ||   <a href="delete.php ?id=<?php echo $row['user_name'];?> &id1=2"  onclick="return confirm('Are you sure You Want To Delete it?');" id="show-option" title="Delete"> <i class="fa fa-eraser fa-fw" onclick=""></i></a></td>
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
