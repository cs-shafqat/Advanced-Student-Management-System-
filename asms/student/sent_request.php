<?php
require("../require/connection.php");
  require("../require/sessions.php");
  $check123=substr($_SESSION['username'], 0,3);
  if($check123!="SDT"){
    session_unset();
    session_destroy();
    header("location:../index.php");
    exit();
  }
  $id=$_SESSION['username'];
  $reg=$_SESSION['reg'];
 include("../include/up.php");
 if (strstr($id,"SDT")) {
  $n="";
    $sql1="SELECT * FROM student WHERE student_name= '$id' AND school_reg='$reg' ";
    $result1=mysql_query($sql1);
    $row=mysql_fetch_array($result1);
    $f=$row['first_name'];
    $l=$row['last_name'];
    $u=$row['student_name'];
    $n.=$f;
    $n.=" ";
    $n.=$l;
    $e=$u.", ".$n;
  } else{
    die();
  }?>
  <div class="testbox" style=" min-height:30px;" >
      <?php       if (isset($_GET['status']) && $_GET['status'] == '2'){
                      echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:red'> Sorry There is some issue, Try Again </span>";
                    }
                    if (isset($_GET['status']) && $_GET['status'] == '1'){
                      echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:green'> Your Request has been sent </span>";
                    }
           ?>  
            </div>
<div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-2">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Send Request</h2>
                  
                     
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                <form class="form-horizontal form-label-left input_mask" method="post" action="sent_request_process.php" >
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">From : 
                    </label>
                    <div class="col-md-9 col-sm-9 col-xs-12">
                      <input type="text" class="form-control" name="from" readonly="true" required="required" value="<?php echo $e ; ?>" >
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
            <?php include("../include/down.php");