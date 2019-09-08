<?php
include("up.php");
 ?>
 <title>Add Parent</title>
 <div class="col-md-8 col-md-offset-2 ">
 	         <div class="testbox" style=" min-height:30px;" >
                      <?php       if (isset($_GET['status']) && $_GET['status'] == '1' ) {
                                  echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:green'>Record Entered Successfully!</span>";
                                  } else if (isset($_GET['status']) && $_GET['status'] == '2'){
                                      echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:red'> Sorry There is some issue, Try Again</span>";
                                    }
                           ?>  
                            </div>
                            <?php
                            if(isset($_GET['id'])){
                              $id=$_GET['id'];
                            }
                             if (!isset($_post['submit_cnic']) && isset($_GET['id2']) ) { 
                              include("parent_form.php");
                            } else {?>
                             
                            <form class="form-horizontal form-label-left input_mask" method="post" action="search_parent_cnic.php?id=<?php echo $id?>">
                            <div class="form-group">
                              <label class="control-label col-md-3 col-sm-3 col-xs-12">Enter Parent CNIC</label>
                              <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" class="form-control" autofocus name="pcnic" required="required" data-inputmask="'mask' : '99999-9999999-9'">
                                
                              </div>
                              <div class="col-md-3 col-sm-3 col-xs-12">
                              <button type="submit" class="btn btn-info" name="submit_cnic" style="width:150px">Enter</button>
                                
                              </div>
                            </div>
                            </form>
   
    
 <?php }
    ?>

              <div class="clearfix"></div>
                
              </div>
<?php
include("down.php");
?>