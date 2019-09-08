<!DOCTYPE html>
<title> <?php 
 require("../require/connection.php");
  require("../require/sessions.php");
$ses=$_SESSION['ses'];
$reg=$_SESSION['reg'];
if (isset($_POST['submit'])) {
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
<?php

include("up.php");

?>
  <div class="">



                     

              
            

                    <form class="form-horizontal form-label-left" accept-charset="utf-8" action="view_student_attendance.php" method="post">

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
   <?php $class=$_POST['class'];
   $mt=$_POST['month'];
   $r;
   if($mt/2==0)
   {
     $r=30; 
   }
   else
   {
    $r=31;
   } ?>              
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
                            <th class="column-title" style="width:30%;">Student Id</th>
                            <th class="column-title">Student Name</th>
                            <th class="column-title">1</th>
                            <th class="column-title">2</th>
                            <th class="column-title">3</th>
                            <th class="column-title">4</th>
                            <th class="column-title">5</th>
                            <th class="column-title">6</th>
                            <th class="column-title">7</th>
                            <th class="column-title">8</th>
                            <th class="column-title">9</th>
                            <th class="column-title">10</th>
                            <th class="column-title">11</th>
                            <th class="column-title">12</th>
                            <th class="column-title">13</th>
                            <th class="column-title">14</th>
                            <th class="column-title">15</th>
                            <th class="column-title">16</th>
                            <th class="column-title">17</th>
                            <th class="column-title">18</th>
                            <th class="column-title">19</th>
                            <th class="column-title">20</th>
                            <th class="column-title">21</th>
                            <th class="column-title">22</th>
                            <th class="column-title">23</th>
                            <th class="column-title">24</th>
                            <th class="column-title">25</th>
                            <th class="column-title">26</th>
                            <th class="column-title">27</th>
                            <th class="column-title">28</th>
                            <th class="column-title">29</th>
                            <th class="column-title">30</th>
                            <th class="column-title">31</th>

                            
                          </tr>
                        </thead>

                        <tbody>
                         <tr class="even pointer">
                            <?php
                               
                                  $sql="SELECT * FROM student_attendance WHERE class_name='$class' AND school_reg = '$reg' AND session='$ses' ORDER BY student_id ASC";
                                  $result=mysql_query($sql);
                                 
                                  if (mysql_num_rows($result) > 0) {
                                  // output data of each row
                                  $count=1;  
                                  $arr=array();
                                  while($row= mysql_fetch_array( $result) ) {

                                  $f=$count;
                                  $l=$row['student_id'];
                                  $u=$row['student_name'];
                                  if(in_array($l,$arr)){
                                    continue;
                                  }
                                  array_push($arr, $l);
                                  $count++;
                                  
                                 
                                  ?>

                            <td class=" "><?php echo $f?></td>
                            <td class=" "><?php echo $l?> </td>
                            <td class=" "><?php echo $u?> </td>

                           <?php
                            
                           $sql2="SELECT * FROM student_attendance WHERE student_id= '$l' AND school_reg='$reg' AND session='$ses' AND month='$mt' ORDER BY attendance_date ASC ";
                           $result2=mysql_query($sql2);
                           $row2=mysql_fetch_array($result2);
                           $en=mysql_num_rows($result2);
                            $k=$row2['attendance_date'];
                            $s=substr($k,9);
                            $y=substr($k, 0,4);
                            $t=$s;
                           $i=0;
                          $de=$y."-".$mt."-".$t;
              
                              


                           if($en>0)
                           {
                            while($i<$r)
                            {$de=$y."-".$mt."-".$t;
                              if($s>0 && $s!=1 )
                              {
                                $s--;
                                $i++;
                                ?>
                                <td >-</td>
                                <?php
                                continue;
                              }
                             
                              $sql4="SELECT * FROM student_attendance WHERE student_id='$l'AND  attendance_date='$de' AND school_reg='$reg' AND session='$ses'";
                              $result4=mysql_query($sql4);
                              $row4=mysql_fetch_array($result4);
                              $rownum=mysql_num_rows($result4);
                              if($rownum>0 )
                              {
                              ?>

                              <td ><?php echo $row2['status']; ?></td><?php
                              $i++;
                              $t++;
                            }
                            else
                            {
                              ?><td >-</td> <?php
                              $t++;
                              $i++;
                            }
                            }
                          }
                          else
                          {

                            ?>
                            <td >-</td>
                            <td >-</td>
                            <td >-</td>
                            <td >-</td>
                            <td >-</td>
                            <td >-</td>
                            <td >-</td>
                            <td >-</td>
                            <td >-</td>
                            <td >-</td>
                            <td >-</td>
                            <td >-</td>
                             <td >-</td>
                             <td >-</td>
                             <td >-</td>
                             <td >-</td>
                             <td >-</td>
                             <td >-</td>
                             <td >-</td>
                             <td >-</td>
                             <td >-</td>
                             <td >-</td>
                             <td >-</td>
                             <td >-</td>
                             <td >-</td>
                             <td >-</td>
                             <td >-</td>
                             <td >-</td>
                             <td >-</td>
                             <td >-</td>
                             <td >-</td>


                            <?php
                          }
                            ?>
                           
                              

                           
                            
                            

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