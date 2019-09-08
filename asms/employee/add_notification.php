<?php

 include("../include/up.php");
 if (strstr($id,"EMP")) {
    $n="";
    $sql1="SELECT * FROM employee WHERE employee_name= '$id' AND school_reg='$reg' ";
    $result1=mysql_query($sql1);
    $row=mysql_fetch_array($result1);
    $f=$row['first_name'];
    $l=$row['last_name'];
    $u=$row['employee_name'];
    $d=$row['designation'];
    $e=$d.", ".$f." ".$l;
  } else{
    $n="";
    $sql1="SELECT * FROM school_admin WHERE user_name= '$id' AND school_reg='$reg' ";
    $result1=mysql_query($sql1);
    $row=mysql_fetch_array($result1);
    $f=$row['first_name'];
    $l=$row['last_name'];
    $n.=$f;
    $n.=" ";
    $n.=$l;
    $e="Admin, ".$n;
  }
  ?>
  <div class="testbox" style=" min-height:30px;" >
      <?php       if (isset($_GET['status']) && $_GET['status'] == '2'){
                      echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:red'> Sorry There is some issue, Try Again </span>";
                    }
           ?>  
            </div>
<div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-2">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Add Notification</h2>
                  
                     
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                <form class="form-horizontal form-label-left input_mask" method="post" action="add_notification_process.php" >
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">From : 
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" class="form-control" name="name" readonly="true" required="required" value="<?php echo $e ; ?>" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12"> To : 
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                     <select class=" form-control " name="type" required="required" tabindex="-1">
                    <option value="">--select--</option>
                    <option value="ESP">All</option>
                    <option value="S">Students</option>
                    <option value="E">Employee</option>
                    <option value="P">Parents</option>
                    <option value="SE">Students & Employee</option>
                    <option value="SP">Students & Parents</option>
                    <option value="EP">Employee & Parents</option>
                    </select>
                    
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Title : 
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" class="form-control" name="title"  required="required" >
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
                     

                      <a href="add_notification.php">  <button type="button" class="btn btn-defalt col-md-3 col-sm-3 col-xs-12" name="cencel" style="width:120px">Cencel</button></a>
                     
                        <button type="submit" class="btn btn-success col-md-3 col-sm-3 col-xs-12" name="submit" style="width:120px">Sent</button>
                        
                      
                    </div>
                </div>
                </form>
              </div>
            </div>
            </div>
              <div class="clearfix"></div>
            <?php include("../include/down.php");