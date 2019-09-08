<!DOCTYPE html>
<?php require("../require/connection.php");
  require("../require/sessions.php");
$reg=$_SESSION['reg'];
$ses=$_GET['id'];
include("up.php");

  ?>
  <title>View Exam Detials</title>
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
                        Class : <?php echo $_POST['class']; ?> <br>
                        Exam Title  : <?php echo $_POST['exam_tital'];?> <br>
                        Session  : <?php echo $ses;
                        $class=$_POST['class'];
                        $exam_tital=$_POST['exam_tital']; ?> 

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
                              <th class="column-title">Student Id</th>
                              <th class="column-title">Student Name</th>
                             <th class="column-title">Obtained Marks</th>
                              <th class="column-title">Total Marks</th>
                              <th class="column-title">Remarks</th>
                              <th class="column-title">Details</th>
                              

                              
                            </tr>
                          </thead>

                            <tbody>

                            
                              <?php
                                
                                    $sql="SELECT * FROM student_class_record WHERE class_tital='$class' AND school_reg = '$reg' AND session='$ses' ORDER BY student_id ASC";
                                    $result=mysql_query($sql);
                                    $result=mysql_query($sql);
                                   
                                    if (mysql_num_rows($result) > 0) {
                                    // output data of each row
                                    $count=1;  
                                    while($row= mysql_fetch_array( $result) ) {
                                       $o=0;
                                      $t=0;
                                      $flag=0;
                                      $flag1=0;
                                      $r="";
                                    $f=$count;
                                    $l=$row['student_id'];
                                    $u=$row['student_name'];
                                    $count++;?>
                                    <tr class="even pointer">
                                    <td class=" "><?php echo $f?></td>
                                    <td class=" "><?php echo $l?> </td>
                                    <td class=" "><?php echo $u?> </td>
                                    <?php
                                   
                                     
                                    $sql1="SELECT * FROM term_exam_details WHERE class_name='$class' AND exam_tital='$exam_tital' AND school_reg = '$reg' AND session='$ses' AND student_id='$l'";
                                    $result1=mysql_query($sql1);
                                    
                                      while ($row1=mysql_fetch_array($result1)) {
                                       
                                      $obtained_marks=$row1['obtained_marks'];
                                      $total_marks=$row1['total_marks'];
                                      $flag++;
                                      if((($obtained_marks*100)/$total_marks)>=33){
                                          $flag1++;
                                       }
                                      $o+=$obtained_marks;
                                      $t+=$total_marks;
                                     } if($flag==$flag1){
                                      $r="Pass";
                                   }else{
                                    $r="Fail";
                                   }?>
                                   <td class=" "><?php echo $o;?> </td>
                                   <td class=" "><?php echo $t;?> </td>
                                    <td class=" "><?php echo $r?> </td>
                                    <td class=" "> <a href="view_result_details.php?id=<?php echo $l; ?>&exam_tital=<?php echo $exam_tital; ?>&class_name=<?php echo $class; ?>"><span class="label label-primary">Details</span></a> </td>

                              
                             
                              
                              

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

          
                  <div class="clearfix"></div>
   
<?php include("down.php") ?> 