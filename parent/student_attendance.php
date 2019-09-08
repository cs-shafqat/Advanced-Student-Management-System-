 <title>Attendance</title>
        <div class="col-md-12 ">
            <div class="clearfix"></div>
           <div class="x_panel">
                  <div class="x_title">
                    <h2 style="align:center;">Attendance</h2>
                                        <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                    <div class="table-responsive">
                      <table  class="table table-striped jambo_table table-bordered ">
                        <thead>
                                
                          <tr class="headings">
                            <th class="column-title">#</th>
                            <th class="column-title">Date</th>
                            <th class="column-title">Status</th>
                            
                          </tr>
                        </thead>

                        <tbody>
                          
                            <?php
                                $n="";
                                $c=1;
                                $p=0;
                                $a=0;
                                $l=0;
                                  $sql = "SELECT * FROM student_attendance WHERE student_id='$sid' AND school_reg = '$reg' AND session='$ses' ORDER BY attendance_date ASC " ;
                                  $result=mysql_query($sql);
                                 
                                  if (mysql_num_rows($result) > 0) {
                                  // output data of each row
                                  while($row= mysql_fetch_array( $result) ) {
                                  
                                  
                                 
                                  ?>
                                  <tr class="even pointer">
                            <td class=" "><?php echo $c++; ?></td>
                            <td class=" "><?php echo $row['attendance_date']; ?> </td>
                            <td class=" "><?php echo $row['status']; ?> </td>
                       <?php if($row['status']=="A"){$a++;}
                            elseif($row['status']=="P"){$p++;}
                            elseif($row['status']=="L"){$l++;}
                           ?>
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
                    <?php if(($p+$a+$l)>0){ ?>
                    <div>Presents=<?php echo ($p*100)/($p+$a+$l); ?>%<br>
                          Absents=<?php echo ($a*100)/($p+$a+$l); ?>%<br>
                          Leaves=<?php echo ($l*100)/($p+$a+$l); ?>%<br>
                          </div>
                          <?php } else { ?>
                            <div>Presents=%<br>
                          Absents=%<br>
                          Leaves=%<br>
                          </div>
                     <?php     } ?>
              </div>
                </div>
              </div>
        
                <div class="clearfix"></div>