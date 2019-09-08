<title>Class Record</title>
<?php 
 require("../require/connection.php");
 require("../require/sessions.php");
$reg=$_SESSION['reg'];
include("up.php");

if(isset($_GET['id']))
{
	$ses=$_GET['id'];
	$class=$_POST['class'];

	?>
	<div class="clearfix"></div>
           <div class="x_panel">
                  <div class="x_title">
                    <h2 style="align:center;">Class Record</h2>
                                        <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4" style="text-align: center;">
            <div class="tile-stats tile-gray">
                
                <h3>
                    Student Class Record               </h3>
                <h4 >
   <?php 
   ?>              
    Class : <?php echo $class ?> <br>
    Session: <?php echo $ses ?> 
    </h4>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
	 <div class="clearfix"></div>
                    <div class="table-responsive">
                      <table id="datatable-buttons" class="table table-striped jambo_table table-bordered">
                        <thead>
                               
                          <tr class="headings">
                            <th class="column-title"style="width:10%;">#</th>
                            <th class="column-title" >Student Id</th>
                            <th class="column-title">Student Name</th>
                           
                          </tr>
                        </thead>

                        <tbody>
                         <tr class="even pointer">
                            <?php
                               
                                  $sql="SELECT * FROM student_class_record WHERE class_tital='$class' AND school_reg = '$reg' AND session='$ses' ORDER BY student_id ASC";
                                  $result=mysql_query($sql);
                                 
                                  if (mysql_num_rows($result) > 0) {
                                  // output data of each row
                                  $count=1;  
                                  while($row= mysql_fetch_array( $result) ) {

                                  $f=$count;
                                  $l=$row['student_id'];
                                  $u=$row['student_name'];
                                  $count++;
                                  
                                 
                                  ?>

                            <td class=" "><?php echo $f?></td>
                            <td class=" "><?php echo $l?> </td>
                            <td class=" "><?php echo $u?> </td>
                       
                           
                            
                            

                            </tr>
                          <?php
                          
                        }
                            }  else {
                            echo "No result Found";
                            }
                            ?>
                          
  
                           
                           

                            
                          </tr>
                         
                          
                        </tbody>
                      </table>
                    </div>
              </div>
                </div>
                
              </div>
        
                <div class="clearfix"></div>
              </div>





<?php            

}
else
{
	header("Location: error.html");
}
?>




<?php include("down.php"); ?>