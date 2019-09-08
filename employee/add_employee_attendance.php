<!DOCTYPE html>
<title><?php
  echo "Add Employee Attendance";
  ?></title>
<?php require("../require/connection.php");
  require("../require/sessions.php");
$reg=$_SESSION['reg'];
$ses=$_SESSION['ses'];
include("up.php");

?>
  <div class="testbox" style=" min-height:30px;" >
<?php       
if (isset($_GET['status']) && $_GET['status'] == '1' ) {
   echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:green'>Record Entered Successfully!</span>";
 } else if (isset($_GET['status']) && $_GET['status'] == '2'){
  echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:red'>Attendance Already Marked </span>";
 }
?>  
</div>
  <div class="">
 
         
            <div class="clearfix"></div>
           <div class="x_panel">
                  <div class="x_title">
                    <h2 style="align:center;">Employee Attendance</h2>
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
    Date  : <?php echo date("Y-m-d");
    ?>              </h4>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
                  <form class="form-horizontal form-label-left" accept-charset="utf-8" action="add_employee_attendance_process.php" method="post">
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table table-bordered">
                        <thead>
                               
                          <tr class="headings">
                            <th class="column-title">#</th>
                            <th class="column-title">Employee id</th>
                            <th class="column-title">Employee name</th>
                            <th class="column-title">Status</th>
                            

                            
                          </tr>
                        </thead>

                          <tbody>

                          <tr class="even pointer">
                            <?php
                               
                                  $sql="SELECT * FROM employee WHERE school_reg = '$reg' ORDER BY employee_name ASC";
                                  $result=mysql_query($sql);
                                 
                                  if (mysql_num_rows($result) > 0) {
                                  // output data of each row
                                  $count=1;  
                                  while($row= mysql_fetch_array( $result) ) {

                                  $f=$count;
                                  $u=$row['employee_name'];
                                  $count++;
                                  $name=$row['first_name']." ".$row['last_name'];
                                 
                                  ?>

                            <td class=" "><?php echo $f?></td>
                            <td class=" "><?php echo $name?> </td>
                            <td class=" "><?php echo $u?> </td>
                            <td ><div class="form-group">
                
                                <div >
                                   <p>
                                
                                <input type="radio" class="flat" name="<?php echo $row['employee_name']; ?>" value="P" checked="" required /> Present
                                <input type="radio" class="flat" name="<?php echo $row['employee_name']; ?>" value="A" /> Absent
                                <input type="radio" class="flat" name="<?php echo $row['employee_name']; ?>" value="L" /> Leave
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

                    <div class="col-md-3 col-md-offset-8" style="margin-top: 30px;">
                            <button type="submit" name="submit_attendance" class="btn btn-lg btn-success btn-block">Save Attendance</button>
                          </div>
                          </form>

              </div>
                </div>
                
              </div>
        
                <div class="clearfix"></div>
  
     
<?php include("down.php") ?> 