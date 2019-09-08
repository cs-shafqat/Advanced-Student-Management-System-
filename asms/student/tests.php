<!DOCTYPE html>
<?php require("../require/connection.php");
  require("../require/sessions.php");
  $check123=substr($_SESSION['username'], 0,3);
  if($check123!="SDT"){
    session_unset();
    session_destroy();
    header("location:../index.php");
    exit();
  }
  $sid=$_SESSION['username'];
$reg=$_SESSION['reg'];
$ses=$_SESSION['ses'];
include("../include/up.php");
$sql="SELECT * FROM student_class_record WHERE student_id='$sid' AND session='$ses' AND school_reg='$reg' ";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);
$class=$row['class_tital'];
  ?>
  <title>Test Result</title>
  <div class="col-md-12 ">

<form class="form-horizontal form-label-left" accept-charset="utf-8" action="tests.php" method="post">

                      <div class="row">
                      <div class="col-md-3 col-md-offset-4">
                        <div class="form-group">
                        <label class="control-label" style="margin-bottom: 5px;">Subject</label>
                           <select class="select2_single form-control" name="subject_code" required="required" tabindex="-1">
                    <option value="">--select--</option>
                    <?php
                                  
                                  $sql3 = "SELECT * FROM subject_class_record WHERE school_reg='$reg' AND class_title='$class' AND session='$ses' ";
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

                       
                      
                      
                      
                          <div class="col-md-3" style="margin-top: 30px;">
                            <button type="submit" name="submit" class="btn btn-info">View Result</button>
                          </div>
                  </div>
                </form>
                


      <?php if(isset($_POST['submit'])){ ?>              

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
                         Student Id :   <?php echo $sid; ?> <br>
                        Subject  : <?php echo $_POST['subject_code']; ?>
                                 
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
                              <th class="column-title">Test</th>
                             <th class="column-title">Obtained Marks</th>
                              <th class="column-title">Total Marks</th>
                              <th class="column-title">Remarks</th>
                             
                              

                              
                            </tr>
                          </thead>

                            <tbody>

                            
                              <?php
                                $subject_id=$_POST['subject_code'];
                                 $sql1="SELECT * FROM test_details WHERE class_name='$class' AND subject_id='$subject_id' AND school_reg = '$reg' AND session='$ses' AND student_id='$sid'";
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
                                    $l=$row['test_title'];
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
                             
     
<?php } include("../include/down.php") ?> 