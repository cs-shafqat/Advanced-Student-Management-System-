   <?php 
  require("../require/connection.php");
  require("../require/sessions.php");
  $reg=$_SESSION['reg'];
  $ses=$_SESSION['ses'];
  include("up.php");


          if((!isset($_POST['submit']))&&(!isset($_POST['submit_exam']))&&(!isset($_POST['submit_test']))) { ?>
          <form class="form-horizontal form-label-left" accept-charset="utf-8" action="edit_student_result.php" method="post">
                        <title>Edit Result</title>
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


                      <form class="form-horizontal form-label-left" accept-charset="utf-8" action="edit_student_result.php?class=<?php echo $_POST['title']; ?>" method="post">
                      
                        <div class="row">

                        <div class="col-md-3 col-md-offset-2 ">
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
                        <div class="col-md-3 ">
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


                      <form class="form-horizontal form-label-left" accept-charset="utf-8" action="edit_student_result.php?class=<?php echo $_POST['title']; ?>" method="post">
                       <div class="col-md-3 col-md-offset-2 ">
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
                      
                        <div class="row">
                        <div class="col-md-3  ">
                         <div class="form-group">
                        <label class="control-label" style="margin-bottom: 5px;">Test Title</label>
                          <select class="select2_single form-control" required="true" name="test"  tabindex="-1">
                    <option value="">--select--</option>
                    <?php
                                  
                                  $sql3 = "SELECT * FROM test WHERE school_reg='$reg' AND class_name='$title' AND session='$ses' ";
                                  $result3=mysql_query($sql3);
                                  
                                  if (mysql_num_rows($result3) > 0) {
                                  // output data of each row
                                  while($row3 = mysql_fetch_array( $result3 )) {
                                  
                                  ?>
                    <option value="<?php echo $row3['test_tital']; ?>" ><?php echo $row3['test_tital']; ?></option>
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


                    <?php } elseif(isset($_POST['submit_exam'])) { 


    $subject=$_POST['subject_code'];
    $class=$_GET['class'];

    $exam_tital=$_POST['exam_tital'];
    
    $sql2="SELECT * FROM term_exam_details WHERE class_name='$class' AND exam_tital='$exam_tital' AND class_subject='$subject' AND school_reg='$reg' AND session='$ses' ";
    $result2=mysql_query($sql2);
    $row2=mysql_fetch_array($result2);
?>        
        
            <div class="clearfix"></div>
           <div class="x_panel">
                  <div class="x_title">
                    <h2 style="align:center;">Students Result</h2>
                                        <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                     <form class="form-horizontal form-label-left" accept-charset="utf-8" action="edit_exam_result_process.php" method="post">
                  
                   <div class="row">
                 
                    <div class="col-md-2  ">
                        <div class="form-group">
                        <label class="control-label" style="margin-bottom: 5px;">Class</label>
                          <input type="text" name="title" readonly="true" required="true" value="<?php echo $class; ?>" />
                        </div>
                      </div>
                      <div class="col-md-2 ">
                        <div class="form-group">
                        <label class="control-label" style="margin-bottom: 5px;">Subject</label>
                          <input type="text" name="subject_code" readonly="true" required="true" value="<?php echo $subject; ?>"/>
                        </div>
                      </div>
                      <div class="col-md-2 ">
                        <div class="form-group">
                        <label class="control-label" style="margin-bottom: 5px;">Exam title</label>
                          <input type="text" name="exam_tital" readonly="true" required="true" value="<?php echo $exam_tital;?>"/>
                        </div>
                      </div>
                      <div class="col-md-2 ">
                        <div class="form-group">
                        <label class="control-label" style="margin-bottom: 5px;">Exam Date</label>
                          <input type="text" name="date" readonly="true" required="true" value="<?php echo $row2['date_of_exam'];?>"/>
                        </div>
                      </div>
                        <div class="col-md-2 ">
                        <div class="form-group">
                        <label class="control-label" style="margin-bottom: 5px;">Total Marks</label>
                          <input type="text" name="tmarks"  required="true" value="<?php echo $row2['total_marks'];?>" />
                        </div>
                      </div>
                      </div>

                    <div class="table-responsive">
                      <table  class="table table-striped jambo_table table-bordered">
                        <thead>
                               
                          <tr class="headings">
                            <th class="column-title">#</th>
                            <th class="column-title">Student Id</th>
                            <th class="column-title">Student name</th>
                            <th class="column-title" >Marks</th>
                            
                           
                            

                            
                          </tr>
                        </thead>

                          <tbody>

                          
                            <?php
                               $class=$_GET['class'];
                                  $sql="SELECT * FROM student_class_record WHERE class_tital='$class' AND school_reg = '$reg' AND session='$ses' ORDER BY student_id ASC";
                                  $result=mysql_query($sql);
                                 
                                  if (mysql_num_rows($result) > 0) {
                                  // output data of each row
                                  $count=1;  
                                  while($row= mysql_fetch_array( $result) ) {

                                  $f=$count;
                                  $l=$row['student_id'];
                                  $u=$row['student_name'];
                                  $count++;
                                  $sql2="SELECT * FROM term_exam_details WHERE class_name='$class' AND student_id='$l' AND exam_tital='$exam_tital' AND class_subject='$subject' AND school_reg='$reg' AND session='$ses' ";
                                    $result2=mysql_query($sql2);
                                    $row2=mysql_fetch_array($result2);
                                 
                                  ?>
                            <tr class="even pointer">
                            <td class=" "><?php echo $f?></td>
                            <td class=" "><?php echo $l?> </td>
                            <td class=" "><?php echo $u?> </td>
                            <td class="" ><input type="text" maxlength="3" value="<?php echo $row2['obtained_marks'];?>"  name="<?php echo $l?>" ></td>
                            
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

                    <div class="col-md-3 col-md-offset-7 " style="margin-top: 30px;">
                            <button type="submit" name="submit" class="btn btn-success form-control">Save Result</button>
                          </div>
                          </form>

              </div>
                </div>
                
              </div>
        
                <div class="clearfix"></div>

                  <?php } elseif(isset($_POST['submit_test'])) { 
                   $subject=$_POST['subject_code'];
    $class=$_GET['class'];

    $test_title=$_POST['test'];
    
    $sql2="SELECT * FROM test_details WHERE class_name='$class' AND test_title='$test_title' AND subject_id='$subject' AND school_reg='$reg' AND session='$ses' ";
    $result2=mysql_query($sql2);
    $row2=mysql_fetch_array($result2);
?>        
        
            <div class="clearfix"></div>
           <div class="x_panel">
                  <div class="x_title">
                    <h2 style="align:center;">Students Result</h2>
                                        <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                     <form class="form-horizontal form-label-left" accept-charset="utf-8" action="edit_test_result_process.php" method="post">
                  
                   <div class="row">
                 
                    <div class="col-md-2  ">
                        <div class="form-group">
                        <label class="control-label" style="margin-bottom: 5px;">Class</label>
                          <input type="text" name="class" readonly="true" required="true" value="<?php echo $class; ?>" />
                        </div>
                      </div>
                  
                      <div class="col-md-2 ">
                        <div class="form-group">
                        <label class="control-label" style="margin-bottom: 5px;">Test title</label>
                          <input type="text" name="test_tital" readonly="true" required="true" value="<?php echo $test_title;?>"/>
                        </div>
                      </div>
                      <div class="col-md-2 ">
                        <div class="form-group">
                        <label class="control-label" style="margin-bottom: 5px;">Test Date</label>
                          <input type="text" name="date" readonly="true" required="true" value="<?php echo $row2['test_date'];?>"/>
                        </div>
                      </div>
                        <div class="col-md-2 ">
                        <div class="form-group">
                        <label class="control-label" style="margin-bottom: 5px;">Subject</label>
                          <input type="text" name="subject" readonly="true" required="true" value="<?php echo $subject?>"/>
                        </div>
                      </div>
                      <div class="col-md-2 ">
                        <div class="form-group">
                        <label class="control-label" style="margin-bottom: 5px;">Total Marks</label>
                          <input type="text" name="tmarks" readonly="true" required="true" value="<?php echo $row2['total_marks']; ?>"/>
                        </div>
                      </div>
                      </div>

                    <div class="table-responsive">
                      <table  class="table table-striped jambo_table table-bordered">
                        <thead>
                               
                          <tr class="headings">
                            <th class="column-title">#</th>
                            <th class="column-title">Student Id</th>
                            <th class="column-title">Student name</th>
                            <th class="column-title" >Marks</th>
                            
                           
                            

                            
                          </tr>
                        </thead>

                          <tbody>

                          
                            <?php
                               $class=$_GET['class'];
                                  $sql="SELECT * FROM student_class_record WHERE class_tital='$class' AND school_reg = '$reg' AND session='$ses' ORDER BY student_id ASC";
                                  $result=mysql_query($sql);
                                 
                                  if (mysql_num_rows($result) > 0) {
                                  // output data of each row
                                  $count=1;  
                                  while($row= mysql_fetch_array( $result) ) {

                                  $f=$count;
                                  $l=$row['student_id'];
                                  $u=$row['student_name'];
                                  $count++;
                                  $sql2="SELECT * FROM test_details WHERE class_name='$class' AND student_id='$l' AND test_title='$test_title' AND subject_id='$subject' AND school_reg='$reg' AND session='$ses' ";
                                    $result2=mysql_query($sql2);
                                    $row2=mysql_fetch_array($result2);
                                 
                                  ?>
                            <tr class="even pointer">
                            <td class=" "><?php echo $f?></td>
                            <td class=" "><?php echo $l?> </td>
                            <td class=" "><?php echo $u?> </td>
                            <td class="" ><input type="text" maxlength="3" value="<?php echo $row2['obtained_marks'];?>"  name="<?php echo $l?>" ></td>
                            
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

                    <div class="col-md-3 col-md-offset-7 " style="margin-top: 30px;">
                            <button type="submit" name="submit" class="btn btn-success form-control">Save Result</button>
                          </div>
                          </form>

              </div>
                </div>
                
              </div>
        
                <div class="clearfix"></div>
  <?php } include("down.php");
  ?>