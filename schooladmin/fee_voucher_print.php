<?php
ini_set('error_reporting()', 0);
ini_set('display_errors', 0); include "../include/files.php" ?>
<?php require("../require/connection.php");
require("../require/sessions.php");
  $reg=$_SESSION['reg'];
  $ses=$_SESSION['ses'];
$sid=$_GET['id'];
$sql="SELECT * FROM school WHERE registration_number='$reg'";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);
$sql1="SELECT * FROM fee_details WHERE student_id='$sid' AND school_reg='$reg' AND session='$ses'";
$result1=mysql_query($sql1);
$row1=mysql_fetch_array($result1);
$sql2="SELECT * FROM student WHERE student_name='$sid' AND school_reg='$reg' AND session='$ses'";
$result2=mysql_query($sql2);
$row2=mysql_fetch_array($result2);
$name=$row2['first_name']." ".$row2['last_name'];
$sql3="SELECT * FROM parent_student_record WHERE student_id='$sid' AND school_reg='$reg'";
$result3=mysql_query($sql3);
$row3=mysql_fetch_array($result3);
$pid=$row3['parent_id'];
$sql4="SELECT * FROM parent WHERE parent_name='$pid' AND school_reg='$reg'";
$result4=mysql_query($sql4);
$row4=mysql_fetch_array($result4);
$pname=$row4['first_name']." ".$row4['last_name'];
 ?>
      

              <div class="col-md-12 ">
                          
                       <!-- page content -->
      
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Print Fee Voucher</h2>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <section class="content invoice">
                      <!-- title row -->
                      <div class="row">
                        <div class="col-xs-12 invoice-header">
                          <h1>
                                          <i class="fa fa-institution "></i><?php echo $row['school_name'] ?>
                                          <small class="pull-right">Date: <?php echo date("d-m-Y") ?></small>
                                      </h1>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- info row -->
                      <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                          <address>
                                          <br><strong>Student ID:</strong> <?php echo $sid; ?>
                                          <br><strong>Student Name :</strong> <?php echo $name; ?>
                                          <br><strong>Student Guardian Name :</strong> <?php echo $pname; ?>
                                          <br><strong>Student Class :</strong><?php echo $row1['class_tital']; ?>
                                      </address>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <!-- Table row -->
                      <div class="row">
                        <div class="col-xs-12 table">
                          <table class="table table-striped">
                            <thead>
                              <tr>
                                <th>No.</th>
                                <th style="width: 40%">Description</th>
                                <th style="width: 40%">Amount</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>1</td>
                                <td>Fee</td>
                                <td><?php echo $row1['fee'];?></td>
                              </tr>
                              <tr>
                                <td>2</td>
                                <td>Remaining Duies</td>
                                <td><?php echo $row1['remaining_duies'];?></td>
                              </tr>
                              <tr>
                                <td>3</td>
                                <td>Fine</td>
                                <td><?php echo $row1['fine'];?></td>
                              </tr>
                              <tr>
                                <td>4</td>
                                <td>Extra Fee</td>
                                <td><?php echo $row1['extra_fee'];?></td>
                              </tr>
                               <tr>
                                <td>5</td>
                                <td>Total</td>
                                <td><?php $t=$row1['extra_fee']+$row1['fine']+$row1['remaining_duies']+$row1['fee']; echo $t;?></td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->

                      <!-- this row will not appear when printing -->
                     
                      </div>
                    </section>
                  </div>
                </div>
                      <!-- /page content -->
               
                
              </div>

<script type="text/javascript">
window.onload = function() {
  window.print();
};
</script>