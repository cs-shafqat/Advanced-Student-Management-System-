<?php
require("../require/connection.php");
  require("../require/sessions.php") ;
  $id=$_SESSION['username'];
  
  $ses=$_SESSION['ses'];

 if (isset($_POST['submit'])) {
  $r=$_SESSION['reg'];
 
  $sql="UPDATE session SET session_end_date = now() , status = '0' WHERE status='1' AND school_reg='$r'";
  $result=mysql_query($sql);
  
   if($result)
   {
      $title=$_POST['title'];
      $sql1="INSERT INTO session(session_tital,session_start_date,school_reg,status) VALUES('$title',now(),'$r','1')";
      $result1=mysql_query($sql1);
      if($result1)
      {
        
        $_SESSION['ses']=$title;
        
      }
    }
  }
   


 
  include("up.php");
 

  ?>

<div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-2">

              <div class="x_panel">
                <div class="x_title">
                  <h2>Start Session</h2>
                  
                     
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                <form onsubmit="return startses();" class="form-horizontal form-label-left input_mask" method="post" action="start_session.php" >
                
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Session Title : 
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" class="form-control" name="title" id="session" data-inputmask="'mask' : '2099-99'" required="required" onkeyup="return sesCheck(this);" >
                    </div>
                  
                     

                       
                        <button type="submit" class="btn btn-success col-md-3 col-sm-3 col-xs-12" name="submit" style="width:120px">Start</button>
                       <div class="form-group">
                  <div class="col-md-3 col-sm-3 col-xs-12 " >
                  
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12 " id="sesError">
                  
                  </div>
                </div> 
                      
                    </div>
                </div>
                </form>
              </div>
            </div>
              <div class="clearfix"></div>
            <?php  include("down.php");