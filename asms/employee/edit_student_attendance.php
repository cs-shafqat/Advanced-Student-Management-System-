
<?php
include("../include/up.php");
$ses=$_SESSION['ses'];
$reg=$_SESSION['reg'];

if (isset($_GET['status']) && $_GET['status'] == '1' ) {
   echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:green'>Record Entered Successfully!</span>";
 } else if (isset($_GET['status']) && $_GET['status'] == '2'){
  echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:red'> Sorry There is some issue, Try Again</span>";
 }
?>

<title> <?php if (isset($_POST['submit'])) {
  $class=$_POST['class'];
  $date=$_POST['date'];
 echo $class." | ".$date;
}else{
  echo "Add Student Attendance";
  } ?></title>

  <div class="">



                    

               <?php if (! isset($_POST['submit'])) {  ?>
            

                    <form class="form-horizontal form-label-left" accept-charset="utf-8" action="edit_student_attendance.php" method="post">
                    
                      <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                        <label class="control-label" style="margin-bottom: 5px;">Class</label>
                          <select class="select2_single form-control" name="class" required="required" tabindex="-1">
                    <option value="">--select--</option>
                    <?php
                                  
                                  $sql3 = "SELECT * FROM class WHERE school_reg='$reg' AND session='$ses' ";
                                  $result3=mysql_query($sql3);
                                  
                                  if (mysql_num_rows($result3) > 0) {
                                  // output data of each row
                                  while($row3 = mysql_fetch_array( $result3 )) {
                                  if($row3['status']==1)
                                  {   
                                      continue;
                                  }
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

                       <div class="col-md-3">
                        <div class="form-group">
                        <label class="control-label" style="margin-bottom: 5px;">Date</label>
                          <input class="form-control " name="date" required="required" type="date" >
                          

                        </div>
                      </div>

                      
                      
                      
                          <div class="col-md-3" style="margin-top: 30px;">
                            <button type="submit" name="submit" class="btn btn-info">Show Attendance List</button>
                          </div>
                        

                    </div>
           
            
          <?php } if (isset($_POST['submit'])) {  

                $date=$_POST['date'];
                $class=$_POST['class'];
                $sql="SELECT * FROM student_attendance WHERE attendance_date='$date' AND class_name='$class' AND school_reg='$reg' AND session='$ses' ";
                $result=mysql_query($sql);
                if(mysql_num_rows($result)>0)
                {
            ?>
              
            <div class="clearfix"></div>
           <div class="x_panel">
                  <div class="x_title">
                    <h2 style="align:center;"> Edit Student Attendance</h2>
                                        <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                   <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4" style="text-align: center;">
            <div class="tile-stats tile-gray">
                
                <h3>
                    Attendance Sheet                </h3>
                <h4 >
    Class : <?php echo $_POST['class']; ?> <br>
    Date  : <?php echo $_POST['date']; ?>              </h4>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
                  <form class="form-horizontal form-label-left" accept-charset="utf-8" action="edit_student_attendance_process.php?class=<?php echo $class;?>& id1=1 &date=<?php echo $date;?>" method="post">
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table table-bordered">
                        <thead>
                               
                          <tr class="headings">
                            <th class="column-title">#</th>
                            <th class="column-title">Student Id</th>
                            <th class="column-title">Student name</th>
                            <th class="column-title">Status</th>
                            

                            
                          </tr>
                        </thead>

                        <tbody>
                        <?php 
                         $sql="SELECT * FROM student_attendance WHERE class_name='$class' and attendance_date='$date'";
                          $result=mysql_query($sql);
                          $n=1;

                          while ($row=mysql_fetch_array($result)) {
                           
                        ?>
                         <tr class="even pointer">
                            <th ><?php echo $n++;?></th>
                            <th><?php echo $row['student_id']; ?></th>
                            <th ><?php echo $row['student_name']; ?></th>
                            <th ><div class="form-group">
                
                                <div >
                                   <p>
                                
                                <input type="radio" class="flat" <?php if ($row['status']=="P") { ?> checked="true" <?php   } ?> name="<?php echo $row['student_id']; ?>" value="P" required /> Present

                                <input type="radio" class="flat" <?php if ($row['status']=="A") { ?> checked="true" <?php   } ?>  name="<?php echo $row['student_id']; ?>" value="A" /> Absent

                                <input type="radio" class="flat" <?php if ($row['status']=="L") { ?> checked="true" <?php   } ?>  name="<?php echo $row['student_id']; ?>" value="L" /> Leave
                              </p>
                                </div>
                              </div></th>
                         </tr>

                         
                         <?php }?>
                          
                        </tbody>
                      </table>
                    </div>

                    <div class="col-md-3 col-md-offset-6" style="margin-top: 30px;">
                            <button type="submit" name="submit" class="btn btn-success">Edit Attendance</button>
                          </div>
                          </form>

              </div>
                </div>
                <?php }
                else
                {?>

                 <div class="x_panel">
                  <div class="x_title">
                    <h2 style="align:center;">Add Student Attendance</h2>
                                        <div class="clearfix"></div>
                  </div>

                  <div class="x_content">
                   <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4" style="text-align: center;">
            <div class="tile-stats tile-gray">
                
                <h3>
                    Attendance Sheet                </h3>
                <h4 >
    Class : <?php echo $_POST['class']; ?> <br>
    Date  : <?php echo $date;
    $class=$_POST['class']; ?>              </h4>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
                  <form class="form-horizontal form-label-left" accept-charset="utf-8" action="edit_student_attendance_process.php?class=<?php echo $class;?>& id1=2 & date=<?php echo $date;?>" method="post">
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table table-bordered">
                        <thead>
                               
                          <tr class="headings">
                            <th class="column-title">#</th>
                            <th class="column-title">Student Id</th>
                            <th class="column-title">Student name</th>
                            <th class="column-title">Status</th>
                            

                            
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
                            <td ><div class="form-group">
                
                                <div >
                                   <p>
                                
                                <input type="radio" class="flat" name="<?php echo $row['student_id']; ?>" value="P" checked="" required /> Present
                                <input type="radio" class="flat" name="<?php echo $row['student_id']; ?>" value="A" /> Absent
                                <input type="radio" class="flat" name="<?php echo $row['student_id']; ?>" value="L" /> Leave
                              </p>
                                </div>
                              </div></td>
                           
                            
                            

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

                    <div class="col-md-3 col-md-offset-6" style="margin-top: 30px;">
                            <button type="submit" name="submit" class="btn btn-success">Save Attendance</button>
                          </div>
                          </form>

              </div>
                </div>
          



               <?php }?>

              </div>
        
                <div class="clearfix"></div>
             





<?php }

 
 include("../include/down.php"); ?> 