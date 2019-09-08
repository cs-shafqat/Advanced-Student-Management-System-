   <?php 
  require("../require/connection.php");
  require("../require/sessions.php");
  $reg=$_SESSION['reg'];
  $ses=$_SESSION['ses'];
  include("up.php");


          if(isset($_GET['id'])) {
             $student_id=$_GET['id'];
             $exam_tital=$_GET['exam_tital'];
              
                $class=$_GET['class_name'] ;    
                      ?>
                      <div class="clearfix"></div>
             <div class="x_panel">
              <div class="x_title">
                <h2 style="align:center;">Student Result</h2>
                  <div class="clearfix"></div>
              </div>

            <div class="x_content">
             <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4" style="text-align: center;">
                    <div class="tile-stats tile-gray">
                  <h3>Result </h3>
                  <h4 >
                        Class : <?php echo $class; ?> <br>
                        Exam Title  : <?php echo $exam_tital; ?> <br>
                        Student Id :   <?php echo $student_id; ?>          
                   </h4>
                    </div>
                </div>
                <div class="col-md-4"></div>
            </div>
            
                    
                      <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-striped jambo_table table-bordered">
                          <thead>
                                 
                            <tr class="headings">
                              <th class="column-title">#</th>
                              <th class="column-title">Subject</th>
                             <th class="column-title">Obtained Marks</th>
                              <th class="column-title">Total Marks</th>
                              <th class="column-title">Remarks</th>
                             
                              

                              
                            </tr>
                          </thead>

                            <tbody>

                            
                              <?php
                                 $sql1="SELECT * FROM term_exam_details WHERE class_name='$class' AND exam_tital='$exam_tital' AND school_reg = '$reg' AND session='$ses' AND student_id='$student_id'";
                                    $result1=mysql_query($sql1);
                                   
                                   
                                    if (mysql_num_rows($result1) > 0) {
                                    // output data of each row
                                    $count=1;
                                     $o=0;
                                      $t=0;
                                      $flag=0;
                                      $flag1=0;  
                                    while($row= mysql_fetch_array( $result1) ) {
                                      
                                      $r="";
                                    $f=$count;
                                    $l=$row['class_subject'];
                                    $obtained_marks=$row['obtained_marks'];
                                    $total_marks=$row['total_marks'];
                                    $flag++;
                                     if((($obtained_marks*100)/$total_marks)>=33){
                                         $r="Pass";
                                         $flag1++;
                                         }else{
                                          $r="Fail";
                                          
                                         }
                                    $count++;
                                    $o+=$obtained_marks;
                                      $t+=$total_marks;
                                      ?>
                                    <tr class="even pointer">
                                    <td class=" "><?php echo $f?></td>
                                    <td class=" "><?php echo $l?> </td>
                                    <td class=" "><?php echo $obtained_marks?> </td>
                                    <td class=" "><?php echo $total_marks?> </td>
                                    <td class=" "><?php echo $r?> </td>
                                   
                              </tr>
                            <?php
                            
                          }
                                      
                                     
                                      if($flag==$flag1){
                                      $r="Pass";
                                   }else{
                                    $r="Fail";
                                   }?>
                                   <tr class="even pointer">
                                    <td class=" "><?php echo $count?></td>
                                    <td class=" "> </td>
                                    <td class=" "><?php echo $o?> </td>
                                    <td class=" "><?php echo $t?> </td>
                                    <td class=" "><?php echo $r?> </td>
                                   
                              </tr>
                          <?php
                              }  else {
                              echo "No result Found";
                              }

                              ?>
                              </tbody>
                              </table>
                              </div>
                              </div>
                              </div>

          
                  <div class="clearfix"></div>

  <?php } include("down.php");
  ?>