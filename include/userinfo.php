<?php
$type=$_SESSION['type'];
if($type!=1){
  $reg=$_SESSION['reg'];
}

$id=$_SESSION['username'];
  if ($type==1) {
         $sql="SELECT * FROM super_admin WHERE user_name='$id'";
         $result=mysql_query($sql);
         $row=mysql_fetch_array($result); 
                       
  }
  elseif ($type==2) {
    $sql1="SELECT * FROM school_admin WHERE user_name= '$id' AND school_reg='$reg' ";
    $result1=mysql_query($sql1);
    $row=mysql_fetch_array($result1);
    
    
  }
  
    elseif ($type=="S"){
      $sql="SELECT * FROM student WHERE student_name='$id'";
      $result=mysql_query($sql);
      $row=mysql_fetch_array($result);
      
    }
    elseif ($type=="E") {
      $sql1="SELECT * FROM employee WHERE employee_name= '$id' AND school_reg='$reg' ";
    $result1=mysql_query($sql1);
    $row=mysql_fetch_array($result1);
    
    }
    elseif ($type=="P") {
      $sql1="SELECT * FROM parent WHERE parent_name= '$id' AND school_reg='$reg' ";
    $result1=mysql_query($sql1);
    $row=mysql_fetch_array($result1);
    
    }
   $image_path="../image/".$row['image_path'];
  
  $name=$row['first_name']." ".$row['last_name'];
  ?>
<!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic">

                <img src="<?php echo $image_path;?>"  alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $name;?></h2>
                <small><?php echo $id;?></small>
                
              </div>
            </div>
            <div class="clearfix"></div>

            <!-- /menu profile quick info -->