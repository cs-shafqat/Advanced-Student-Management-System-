   <?php 
  require("../require/connection.php");
  require("../require/sessions.php");
  $reg=$_SESSION['reg'];
  $ses=$_SESSION['ses'];
  include("up.php");


          if((!isset($_POST['submit']))&&(!isset($_POST['submit_exam']))&&(!isset($_POST['submit_test']))) { ?>
          <form class="form-horizontal form-label-left" accept-charset="utf-8" action="view_student_result.php" method="post">
                      <title>View Result</title>
                        <div class="row">
                        <div class="col-md-3 col-md-offset-2">
                          <div class="form-group">
                          <label class="control-label" style="margin-bottom: 5px;">Class</label>
                            <select class="select2_single form-control" name="title" required="required" tabindex="-1">
                      <option value="">--select--</option>
                      <?php
                                    
                                    $sql3 = "SELECT * FROM class WHERE school_reg='$reg' AND session='$ses' ";
                                    $result3=mysql_query($sql3);
                                    
                                    if (mysql_num_rows($result3) > 0) {
                                    // output data of each row
                                    while($row3 = mysql_fetch_array( $result3 )) {
                                    
                                    ?>
                      <option value="<?php echo $row3['title']; ?>" ><?php echo $row3['title']; ?></option>
                      <?php
                              }
                              }  else {
                              echo "No result Found";
                              }
                              ?>

                    </select>
                          </div>
                        </div>
                        <div class="col-md-3 ">
                        <div class="form-group">
                        <label class="control-label" style="margin-bottom: 5px;">Result Type</label>
                          <select class="select2_single form-control" name="rtype" required="required" tabindex="-1">
                    <option value="">--select--</option>
          
                                  
                                  
                    <option value="1" >Test Result</option>
                    <option value="2" >Exam Result</option>
                  </select>
                        </div>
                      </div>
                      <div class="col-md-2" style="margin-top: 30px;">
                            <button type="submit" name="submit" class="btn btn-info">Select Class</button>
                          </div>
                          </div>
                          </form>


                          <?php }if(isset($_POST['submit'])&&$_POST['rtype']==2) { ?>


                      <form class="form-horizontal form-label-left" accept-charset="utf-8" action="view_student_result.php?class=<?php echo $_POST['title']; ?>" method="post">
                      
                        <div class="row">
                        <div class="col-md-3 col-md-offset-3 ">
                          <div class="form-group">
                          <label class="control-label" style="margin-bottom: 5px;">Exam title</label>
                            <select class="select2_single form-control" required="true" name="exam_tital"  tabindex="-1">
                      <option value="">--select--</option>
                      <?php
                                    
                                    $sql3 = "SELECT * FROM term_exam WHERE school_reg='$reg' AND session='$ses' ";
                                    $result3=mysql_query($sql3);
                                    
                                    if (mysql_num_rows($result3) > 0) {
                                    // output data of each row
                                    while($row3 = mysql_fetch_array( $result3 )) {
                                    
                                    ?>
                      <option value="<?php echo $row3['exam_tital']; ?>" ><?php echo $row3['exam_tital']; ?></option>
                      <?php
                              }
                              }  else {
                              echo "No result Found";
                              }
                              ?>

                    </select>
                          </div>
                        </div>
                        <div class="col-md-2" style="margin-top: 30px;">
                              <button type="submit" name="submit_exam" class="btn btn-info">Show Result</button>
                            </div>
                      </div>
                    </from>


                    <?php }elseif(isset($_POST['submit'])&&$_POST['rtype']==1) { ?>


                      <form class="form-horizontal form-label-left" accept-charset="utf-8" action="view_student_result.php?class=<?php echo $_POST['title']; ?>" method="post">
                      
                        <div class="row">
                        <div class="col-md-3 col-md-offset-3 ">
                        <div class="form-group">
                        <label class="control-label" style="margin-bottom: 5px;">Subject</label>
                          <select class="select2_single form-control" name="subject_code" required="required" tabindex="-1">
                    <option value="">--select--</option>
                    <?php
                                  $title=$_POST['title'];
                                  $sql3 = "SELECT * FROM subject_class_record WHERE school_reg='$reg' AND class_title='$title' AND session='$ses' ";
                                  $result3=mysql_query($sql3);
                                  
                                  if (mysql_num_rows($result3) > 0) {
                                  // output data of each row
                                  while($row3 = mysql_fetch_array( $result3 )) {
                                  
                                  ?>
                    <option value="<?php echo $row3['subject_code']; ?>" ><?php echo $row3['subject_code']."   (".$row3['subject_title'].")"; ?></option>
                    <?php
                            }
                            }  else {
                            echo "No result Found";
                            }
                            ?>

                  </select>
                        </div>
                      </div>
                        <div class="col-md-2" style="margin-top: 30px;">
                              <button type="submit" name="submit_test" class="btn btn-info">Show Result</button>
                            </div>
                      </div>
                    </from>


                    <?php } elseif(isset($_POST['submit_exam'])) { ?>


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
                        Class : <?php echo $_GET['class']; ?> <br>
                        Exam Title  : <?php echo $_POST['exam_tital'];
                        $class=$_GET['class'];
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

                  <?php } elseif(isset($_POST['submit_test'])) { ?>


                      <div class="clearfix"></div>
             <div class="x_panel">
              <div class="x_title">
                <h2 style="align:center;">Student Tests Result</h2>
                  <div class="clearfix"></div>
              </div>

            <div class="x_content">
             <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4" style="text-align: center;">
                    <div class="tile-stats tile-gray">
                  <h3>Result </h3>
                  <h4 >
                        Class : <?php echo $_GET['class']; ?> <br>
                        Subject  : <?php echo $_POST['subject_code'];
                        $class=$_GET['class'];
                        $subject_code=$_POST['subject_code']; ?>             
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
                                   
                                     
                                    $sql1="SELECT * FROM test_details WHERE class_name='$class' AND subject_id='$subject_code' AND school_reg = '$reg' AND session='$ses' AND student_id='$l'";
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
                                    <td class=" "> <a href="view_test_result_details.php?id=<?php echo $l; ?>&subject_id=<?php echo $subject_code; ?>&class_name=<?php echo $class; ?>"><span class="label label-primary">Details</span></a> </td>

                              
                             
                              
                              

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

  <?php } include("down.php");
  ?>