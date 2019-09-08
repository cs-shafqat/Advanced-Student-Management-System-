<!DOCTYPE html>
<?php 
require("../require/connection.php");
require("../require/sessions.php");
$reg=$_SESSION['reg'];
$ses=$_SESSION['ses'];
include("up.php");


if(isset($_GET['id']))
{
  $type=$_GET['id'];
  if($type==2)
  {
    $subject=$_GET['subject_code'];
    $class=$_GET['class'];

    $exam_tital=$_GET['exam_tital'];
    $edate=$_GET['date'];

?>        
        
            <div class="clearfix"></div>
           <div class="x_panel">
                  <div class="x_title">
                    <h2 style="align:center;">Students Result</h2>
                                        <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                     <form class="form-horizontal form-label-left" accept-charset="utf-8" action="add_exam_result_process.php" method="post">
                  
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
                          <input type="text" name="date" readonly="true" required="true" value="<?php echo $edate?>"/>
                        </div>
                      </div>
                        <div class="col-md-2 ">
                        <div class="form-group">
                        <label class="control-label" style="margin-bottom: 5px;">Total Marks</label>
                          <input type="text" name="tmarks"  required="true" />
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

                          <tr class="even pointer">
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
                                  
                                 
                                  ?>

                            <td class=" "><?php echo $f?></td>
                            <td class=" "><?php echo $l?> </td>
                            <td class=" "><?php echo $u?> </td>
                            <td class="" ><input type="text" maxlength="3"  name="<?php echo $l?>" ></td>
                            
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
<?php }
  else if($type==1)
  {
    $class=$_GET['class'];
    $test=$_GET['test'];
    $date=$_GET['date'];
    $subject=$_GET['subject'];
    $tmarks=$_GET['tmarks'];
    
    ?>




            <div class="clearfix"></div>
           <div class="x_panel">
                  <div class="x_title">
                    <h2 style="align:center;">Students Result</h2>
                                        <div class="clearfix"></div>
                  </div>
                   <form class="form-horizontal form-label-left" accept-charset="utf-8" action="add_test_result_process.php?class=<?php echo $class;?>&subject=<?php echo $subject;?>" method="post">
                  
                  <div class="x_content">
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
                          <input type="text" name="test_tital" readonly="true" required="true" value="<?php echo $test;?>"/>
                        </div>
                      </div>
                      <div class="col-md-2 ">
                        <div class="form-group">
                        <label class="control-label" style="margin-bottom: 5px;">Test Date</label>
                          <input type="text" name="date" readonly="true" required="true" value="<?php echo $date?>"/>
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
                          <input type="text" name="tmarks" readonly="true" required="true" value="<?php echo $tmarks?>"/>
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

                          <tr class="even pointer">
                            <?php
                              
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
                                  
                                 
                                  ?>

                            <td class=" "><?php echo $f?></td>
                            <td class=" "><?php echo $l?> </td>
                            <td class=" "><?php echo $u?> </td>
                            <td class="" ><input type="text" maxlength="3" name="<?php echo $l?>" ></td>
                            
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
<?php  }
}

include("down.php"); ?> 