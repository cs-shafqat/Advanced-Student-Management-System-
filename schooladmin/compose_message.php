<?php
require("../require/connection.php");
  require("../require/sessions.php") ;
  $id=$_SESSION['username'];
  $reg=$_SESSION['reg'];
 include("up.php");
 if (strstr($id,"EMP")) {
    $sql1="SELECT * FROM employee WHERE employee_name= '$id' AND school_reg='$reg' ";
    $result1=mysql_query($sql1);
    $row=mysql_fetch_array($result1);
    $f=$row['first_name'];
    $l=$row['last_name'];
    $u=$row['employee_name'];
    $n.=$f;
    $n.=" ";
    $n.=$l;
    $e=$u.", ".$n;
  } else{
    $n="";
    $sql1="SELECT * FROM school_admin WHERE user_name= '$id' AND school_reg='$reg' ";
    $result1=mysql_query($sql1);
    $row=mysql_fetch_array($result1);
    $f=$row['first_name'];
    $l=$row['last_name'];
    $u=$row['user_name'];
    $n.=$f;
    $n.=" ";
    $n.=$l;
    $e=$u.", ".$n;
  }
  ?>
  <title>Compose Message</title>
  <div class="testbox" style=" min-height:30px;" >
      <?php       if (isset($_GET['status']) && $_GET['status'] == '2'){
                      echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:red'> Sorry There is some issue, Try Again </span>";
                    }
                    if (isset($_GET['status']) && $_GET['status'] == '1'){
                      echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:green'> Your message has been sent </span>";
                    }
           ?>  
            </div>
<div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-2">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Send Message</h2>
                  
                     
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                <form class="form-horizontal form-label-left input_mask" method="post" action="compose_message_process.php" >
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">From : 
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" name="from" readonly="true" required="required" value="<?php echo $e ; ?>" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12"> To : 
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                <?php if(isset($_GET['id'])){?>
                      <input type="text" class="form-control" name="to[]" readonly="true" required="required" value="<?php echo $_GET['id'] ; ?>" >
                      <?php }else { ?>
                     <select class="select2_multiple select2_group form-control" multiple="multiple" name="to[]" required="required" >
                            <optgroup label="Web Admin">
                      <?php
                                  $sql2 = "SELECT * FROM super_admin ";
                                  $result2=mysql_query($sql2);
                                 
                                  if (mysql_num_rows($result2) > 0) {
                                  // output data of each row
                                  while($row2 = mysql_fetch_array( $result2 ))
                                   { ?>
                                    <option value="<?php echo $row2['user_name'] ?>" ><?php echo $row2['user_name']."   (".$row2['first_name']." ".$row2['first_name'].")"; ?></option>
                                    <?php
                                    }
                                  }
                                  else {
                                    echo "No result Found";
                                    }
                                  $sql2 = "SELECT * FROM employee WHERE school_reg= '$reg'";
                                  $result2=mysql_query($sql2);
                                  ?></optgroup> <optgroup label="Employee"> <?php
                                  if (mysql_num_rows($result2) > 0) {
                                  // output data of each row
                                  while($row2 = mysql_fetch_array( $result2 ))
                                   { ?>
                                    <option value="<?php echo $row2['employee_name'] ?>" ><?php echo $row2['employee_name']."   (".$row2['first_name']." ".$row2['first_name'].")"; ?></option>
                                    <?php
                                    }
                                  }
                                  else {
                                    echo "No result Found";
                                    }
                                    ?></optgroup> <optgroup label="Student"> <?php
                                  $sql2 = "SELECT * FROM student WHERE school_reg= '$reg'";
                                  $result2=mysql_query($sql2);
                                  
                                  if (mysql_num_rows($result2) > 0) {
                                  // output data of each row
                                  while($row2 = mysql_fetch_array( $result2 ))
                                   { ?>
                                    <option value="<?php echo $row2['student_name'] ?>" ><?php echo $row2['student_name']."   (".$row2['first_name']." ".$row2['first_name'].")"; ?></option>
                                    <?php
                                    }
                                  }
                                  else {
                                    echo "No result Found";
                                    }
                                    ?></optgroup> <optgroup label="Parents"> <?php
                                  $sql2 = "SELECT * FROM parent WHERE school_reg= '$reg'";
                                  $result2=mysql_query($sql2);
                                  
                                  if (mysql_num_rows($result2) > 0) {
                                  // output data of each row
                                  while($row2 = mysql_fetch_array( $result2 ))
                                   { ?>
                                    <option value="<?php echo $row2['parent_name'] ?>" ><?php echo $row2['parent_name']."   (".$row2['first_name']." ".$row2['first_name'].")"; ?></option>
                                    <?php
                                    }
                                  }
                                  else {
                                    echo "No result Found";
                                    }
                      ?>
                      </optgroup>
                    </select>
                    <?php }?>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Subject : 
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" name="subject"  required="required" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Content : 
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                  <textarea class="form-control" rows="10" id="content" name="content" required="required"></textarea>
                </div>
                  </div>
                  

                  <div class="ln_solid"></div>
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                    <div class="form-group ">
                     

                      <a href="compose_message.php">  <button type="button" class="btn btn-defalt col-md-3 col-sm-3 col-xs-12" name="cencel" style="width:120px">Cancel</button></a>
                     
                        <button type="submit" class="btn btn-success col-md-3 col-sm-3 col-xs-12" name="submit" style="width:120px">Sent</button>
                        
                      
                    </div>
                </div>
                </form>
              </div>
            </div>
              <div class="clearfix"></div>
            <?php include("down.php");