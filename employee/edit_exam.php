<?php
require("../require/connection.php");
  require("../require/sessions.php") ;
  $id=$_SESSION['username'];
  $reg=$_SESSION['reg'];
 include("up.php");
 ?>
  <div class="testbox" style=" min-height:30px;" >
<?php       
if (isset($_GET['status']) && $_GET['status'] == '1' ) {
   echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:green'>Record Entered Successfully!</span>";
 } else if (isset($_GET['status']) && $_GET['status'] == '2'){
  echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:red'> Sorry There is some issue, Try Again</span>";
 }
 else if (isset($_GET['status']) && $_GET['status'] == '3'){
 echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:red'> Class Name Already Exist. </span>";
 }
?>  
</div>
  <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-2">

             
<?php
if(isset($_GET['id']))
{
  $id=$_GET['id'];

  $Id1=$_GET['id1'];
  $sql="SELECT * FROM term_exam WHERE exam_tital='$id' AND exam_class='$Id1'";
  $result=mysql_query($sql);
  $row=mysql_fetch_array($result);
 ?>
              <div class="x_panel">
                <div class="x_title">
                  <h2>Edit Exam</h2>
                  
                     
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                <form  onsubmit="return addexam();" class="form-horizontal form-label-left input_mask" method="post" action="update_exam.php" >
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Exam Title 
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" class="form-control" readonly="true" name="title" id="title" value="<?php echo $row['exam_tital'] ?>"  required="required" >
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Class 
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" class="form-control" readonly="true"  id="class" name="class" value="<?php echo $row['exam_class'] ?>"   required="required" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Start Date
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input class="date-picker form-control col-md-7 col-xs-12" id="sdate" name="sdate" value="<?php echo $row['start_date'] ?>" required="required" type="date"  onblur="return onblursDate(this,1);" onchange="return onblursDate(this,1);">
                </div>
                  </div>
                  <div class="form-group">
                  <div class="col-md-3 col-sm-3 col-xs-12 ">
                  
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12 " id="sdateError">
                  
                  </div>
                </div>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">End Date
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input class="date-picker form-control col-md-7 col-xs-12" id="edate" name="edate" value="<?php echo $row['end_date'] ?>" required="required" type="date"  onblur="return onblurDate(this,1);" onchange="return onblurDate(this,1);">
                </div>
                  </div>
                  <div class="form-group">
                  <div class="col-md-3 col-sm-3 col-xs-12 ">
                  
                  </div>
                  <div class="col-md-6 col-sm-6 col-xs-12 " id="dateError">
                  
                  </div>
                </div>
                  <div class="ln_solid"></div>
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                    <div class="form-group ">
                     

                                           
                        <button type="submit" class="btn btn-success col-md-6 col-md-offset-6 col-sm-3 col-xs-12" name="submit" style="width:120px">Update</button>
                        
                      
                    </div>
                </div>
                </form>
              </div>
            </div>
              <div class="clearfix"></div>
            <?php } include("down.php");?>