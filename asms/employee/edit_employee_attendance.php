
<?php require("../require/connection.php");
  require("../require/sessions.php");
$ses=$_SESSION['ses'];
$reg=$_SESSION['reg'];
include("up.php");
if (isset($_GET['status']) && $_GET['status'] == '1' ) {
   echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:green'>Record Entered Successfully!</span>";
 } else if (isset($_GET['status']) && $_GET['status'] == '2'){
  echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:red'> Sorry There is some issue, Try Again</span>";
 }
?>

<title> <?php if (isset($_POST['submit'])) {
  $date=$_POST['date'];
 echo $date;
}else{
  echo "Edit Employee Attendance";
  } ?></title>

  <div class="">



                    

               <?php if (! isset($_POST['submit'])) {  ?>
            

                    <form class="form-horizontal form-label-left" accept-charset="utf-8" action="edit_employee_attendance.php" method="post">
                    
                      <div class="row">

                       <div class="col-md-3 col-md-offset-4">
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
                $sql="SELECT * FROM employee_attendance WHERE date='$date' AND school_reg='$reg' ORDER BY employee_id ASC ";
                $result=mysql_query($sql);
                if(mysql_num_rows($result)>0)
                {
            ?>
              
            <div class="clearfix"></div>
           <div class="x_panel">
                  <div class="x_title">
                    <h2 style="align:center;"> Edit Employee Attendance</h2>
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
       Date  : <?php echo $_POST['date']; ?>              </h4>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
                  <form class="form-horizontal form-label-left" accept-charset="utf-8" action="edit_employee_attendance_process.php ?id1=1 &date=<?php echo $date;?>" method="post">
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table table-bordered">
                        <thead>
                               
                          <tr class="headings">
                            <th class="column-title">#</th>
                            <th class="column-title">Employee Id</th>
                            
                            <th class="column-title">Status</th>
                            

                            
                          </tr>
                        </thead>

                        <tbody>
                        <?php 
                         $sql="SELECT * FROM employee_attendance WHERE date='$date' AND school_reg='$reg' ORDER BY employee_id ASC ";
                          $result=mysql_query($sql);
                          $n=1;

                          while ($row=mysql_fetch_array($result)) {
                           
                        ?>
                         <tr class="even pointer">
                            <th ><?php echo $n++;?></th>
                            <th><?php echo $row['employee_id']; ?></th>
                          
                            <th ><div class="form-group">
                
                                <div >
                                   <p>
                                
                                <input type="radio" class="flat" <?php if ($row['status']=="P") { ?> checked="true" <?php   } ?> name="<?php echo $row['employee_id']; ?>" value="P" required /> Present

                                <input type="radio" class="flat" <?php if ($row['status']=="A") { ?> checked="true" <?php   } ?>  name="<?php echo $row['employee_id']; ?>" value="A" /> Absent

                                <input type="radio" class="flat" <?php if ($row['status']=="L") { ?> checked="true" <?php   } ?>  name="<?php echo $row['employee_id']; ?>" value="L" /> Leave
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
                    <h2 style="align:center;">Add Employee Attendance</h2>
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
    <br>
    Date  : <?php echo $date;
    ?>              </h4>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
                  <form class="form-horizontal form-label-left" accept-charset="utf-8" action="edit_employee_attendance_process.php?id1=2 & date=<?php echo $date;?>" method="post">
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table table-bordered">
                        <thead>
                               
                          <tr class="headings">
                            <th class="column-title">#</th>
                            <th class="column-title">Employee Id</th>
                            
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
                                  $l=$row['employee_name'];
                                  
                                  $count++;
                                  
                                 
                                  ?>

                            <td class=" "><?php echo $f?></td>
                            <td class=" "><?php echo $l?> </td>
                            
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
                            echo "No Result Found";
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

mysql_close($connection);   
 include("down.php"); ?> 