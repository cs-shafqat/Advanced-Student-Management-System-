 
        <div class="col-md-12 ">
            <div class="clearfix"></div>
           <div class="x_panel">
                  <div class="x_title">
                    <h2 style="align:center;">PTM</h2>
                                        <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                    <div class="table-responsive">
                      <table  class="table table-striped jambo_table table-bordered ">
                        <thead>
                                
                          <tr class="headings">
                            <th class="column-title">#</th>
                            <th class="column-title">Teacher ID</th>
                            <th class="column-title">Teacher Name</th>
                            <th class="column-title">Subject Code</th>
                            <th class="column-title">Subject Title </th>
                            <th class="column-title">Action</th>
                            
                          </tr>
                        </thead>

                        <tbody>
                          
                            <?php
                                $c=1;
                                  $sql = "SELECT * FROM subject_class_record WHERE class_title='$class' AND school_reg = '$reg' AND session='$ses'" ;
                                  $result=mysql_query($sql);
                                 
                                  if (mysql_num_rows($result) > 0) {
                                  // output data of each row
                                  while($row= mysql_fetch_array( $result) ) {
                                  
                                  
                                 
                                  ?>
                                  <tr class="even pointer">
                            <td class=" "><?php echo $c++; ?></td>
                            <td class=" "><?php echo $row['subject_teacher']; ?> </td>
                            <?php
                            $en=$row['subject_teacher'];
                             $sql5="SELECT * FROM employee WHERE employee_name='$en'  AND school_reg = '$reg' ";
                             $result5=mysql_query($sql5);
                             $row5=mysql_fetch_array($result5);
                             ?>
                            <td class=" "><?php echo $row5['first_name']." ".$row5['last_name']; ?> </td>
                            <td class=" "><?php echo $row['subject_code']; ?> </td>
                            <td class=" "><?php echo $row['subject_title']; ?> </td>
                            <td class=" "> <a href="compose_message.php?id=<?php echo $en; ?>"><span class="label label-primary">message</span></a> </td>

                       
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