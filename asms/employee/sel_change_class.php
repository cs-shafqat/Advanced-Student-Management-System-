<title>Class Class</title>
<?php 
 require("../require/connection.php");
 require("../require/sessions.php");
$reg=$_SESSION['reg'];
$ses=$_SESSION['ses'];
include("up.php");
$sid=$_POST['sid'];
$sql1 = "SELECT * FROM student_class_record WHERE session='$ses' AND student_id='$sid' AND school_reg='$reg'  ";
 $result1=mysql_query($sql1);
 $row1=mysql_fetch_array($result1);
 $cclass=$row1['class_tital'];
?>
  <div class="">



                     

              
            

                    <form class="form-horizontal form-label-left" accept-charset="utf-8" action="change_class_process.php?id=<?php echo $sid; ?>" method="post">

                      <div class="row">
                      <div class="col-md-3 col-md-offset-2">
                        <div class="form-group">
                        <label class="control-label" style="margin-bottom: 5px;">Current Class</label>
                        <input type="text" class="form-control" readonly="true"  name="cclass" value="<?php echo $row1['class_tital'] ?>"  required="required" >
                    
                                  
                                 
                                  
                                

                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                        <label class="control-label" style="margin-bottom: 5px;">New Class</label>
                          <select class="select2_single form-control" name="nclass" required="required" tabindex="-1">
                    <option value="">--select--</option>
                    <?php
                                  
                                  $sql3 = "SELECT * FROM class WHERE session='$ses' AND school_reg='$reg'";
                                  $result3=mysql_query($sql3);
                                  
                                  if (mysql_num_rows($result3) > 0) {
                                  // output data of each row
                                  while($row3 = mysql_fetch_array( $result3 )) {
                                  if($row3['title']==$cclass)
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
							<div class="col-md-3" style="margin-top: 30px;">
                            <button type="submit" name="submit" class="btn btn-info">Select</button>
                          </div>
                        

                    </div>
<?php include("down.php"); ?>            