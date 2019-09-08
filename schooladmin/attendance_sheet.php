<!DOCTYPE html>
<title> <?php  if (isset($_POST['submit'])) {
   require("../require/connection.php");
  require("../require/sessions.php");
$reg=$_SESSION['reg'];
$sql="SELECT * FROM school WHERE registration_number='$reg'";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);
 $na=$row['school_name'] ."<br>";
?><div style="text-align:center;"><?php
 echo $na; ?></div> <?php
 echo "<small>Class : </small>"."<small>".$_POST['class']."</small>"."<br><small>Month : </small>"."<small>".$_POST['month']."</small>";
} else{
  echo "view Student Attendance";
  }?></title>
<?php require("../require/connection.php");
  require("../require/sessions.php");

include("up.php");
$ses=$_SESSION['ses'];
$reg=$_SESSION['reg'];

?>
  <div class="">



                     

              
            

                    <form class="form-horizontal form-label-left" accept-charset="utf-8" action="attendance_sheet.php" method="post">

                      <div class="row">
                      <div class="col-md-3 col-md-offset-2">
                        <div class="form-group">
                        <label class="control-label" style="margin-bottom: 5px;">Class</label>
                          <select class="select2_single form-control" name="class" required="required" tabindex="-1">
                    <option value="">--select--</option>
                    <?php
                                  
                                  $sql3 = "SELECT * FROM class WHERE school_reg='$reg' AND session='$ses'";
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

                       <div class="col-md-3">
                        <div class="form-group">
                        <label class="control-label" style="margin-bottom: 5px;">Month</label>
                          
                          <select class="select2_single form-control" name="month" required="required" tabindex="-1">
                    <option value="">--select--</option>
                   <option value="01"
                              >
                                January                    </option>
                                        <option value="02"
                              >
                                February                    </option>
                                        <option value="03"
                              >
                              March                    </option>
                                        <option value="04"
                              >
                                April                    </option>
                                        <option value="05"
                              >
                                May                    </option>
                                        <option value="06"
                              >
                                June                    </option>
                                        <option value="07"
                              >
                                July                    </option>
                                        <option value="08"
                              >
                                August                    </option>
                                        <option value="09"
                              >
                                September                    </option>
                                        <option value="10"
                              >
                                October                    </option>
                                        <option value="11"
                              >
                                November                    </option>
                                        <option value="12"
                              >
                                December                    </option>
                                 </select>

                        </div>
                      </div>

                      
                      
                      
                          <div class="col-md-3" style="margin-top: 30px;">
                            <button type="submit" name="submit" class="btn btn-info">View Attendance</button>
                          </div>
                        

                    </div>
           
            <?php  if (isset($_POST['submit'])) {  ?>


            <div class="clearfix"></div>
           <div class="x_panel">
                  <div class="x_title">
                    <h2 style="align:center;">Student Attendance</h2>
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
     <?php $class=$_POST['class'];?>             
    Class : <?php echo $_POST['class']; ?> <br>
    Month  : <?php echo $_POST['month']; ?>     </h4>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>

                    <div class="table-responsive">
                      <table id="datatable-buttons" class="table table-striped jambo_table table-bordered">
                        <thead>
                               
                          <tr class="headings">
                            <th class="column-title">#</th>
                            <th class="column-title" style="width:10%;">Student Id</th>
                            <th class="column-title">Student Name</th>
                            <th class="column-title"></th>
                            <th class="column-title"></th>
                            <th class="column-title"></th>
                            <th class="column-title"></th>
                            <th class="column-title"></th>
                            <th class="column-title"></th>
                            <th class="column-title"></th>
                            <th class="column-title"></th>
                            <th class="column-title"></th>
                            <th class="column-title"></th>
                            <th class="column-title"></th>
                            <th class="column-title"></th>
                            <th class="column-title"></th>
                            <th class="column-title"></th>
                            <th class="column-title"></th>
                           
                            <th class="column-title"></th>
                           
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
                            <td ></td>
                            <td ></td>
                            <td ></td>
                            <td ></td>
                            <td ></td>
                            <td ></td>
                            <td ></td>
                            <td ></td>
                            <td ></td>
                            <td ></td>
                            <td ></td>
                            <td ></td>
                            <td ></td>
                            <td ></td>
                            <td ></td>
                            <td ></td>
                           
                            
                            

                            </tr>
                          <?php
                          
                        }
                            }  else {
                            echo "No result Found";
                            }
                            ?>
                          
  
                           
                           

                            
                          </tr>
                         
                          
                        </tbody>
                      </table>
                    </div>
              </div>
                </div>
                
              </div>
        
                <div class="clearfix"></div>
              </div>





                              <?php }


  
  mysql_close($connection);
  ?>
     
<?php include("down.php") ?> 