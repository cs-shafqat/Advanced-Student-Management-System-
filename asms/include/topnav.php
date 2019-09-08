<!-- top navigation -->
<?php $ncount;?> 

         <div class="top_nav">

          <div class="nav_menu">
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
            <div class="navbar-brand"  >
            
            <p style="color:#34495E;">ASMS</p>
          </div>
            <nav class="" role="navigation">
              

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-user fa-fw"></i><i class="fa fa-caret-down"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href=<?php
                    if($type==1)
                    {
                      ?>"super_admin_profile.php ?id=<?php echo $_SESSION['username'];?>"
                   <?php }
                   else if ($type==2) {
                      ?>
                      "../schooladmin/school_admin_profile.php "
                      <?php
                    } 
                     else if ($type=="S") {
                      ?>
                      "view_student_profile.php "
                      <?php
                    }
                    else if ($type=="P") {
                      ?>
                      "view_parent_profile.php "
                      <?php
                    } ?>
                    >  Profile</a>
                    </li>
                   
                    <li><a href=<?php
                    if($type==1)
                    {
                      ?>"password_change.php ?>"
                   <?php }
                   else if ($type==2) {
                      ?>
                      "../superadmin/password_change.php "
                      <?php
                    } ?>
                     ><i class="fa fa-lock pull-right"></i>Change Password</a>
                    </li>
                    <li><a href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a  class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-square"></i>
                    <?php 
                      if ($type==1) {
                        $sql1="SELECT message_count FROM super_admin WHERE user_name= '$id'  ";
                        $result1=mysql_query($sql1);
                        $row=mysql_fetch_array($result1);
                        if ($row['message_count']>99) { ?>
                          <span class="badge bg-green">99+</span>
                   <?php     }
                        elseif ($row['message_count']>0) {  ?>
                          <span class="badge bg-green"><?php echo $row['message_count']; ?></span>
                   <?php     }
                      } 
                      elseif ($type==2) {
                        $sql1="SELECT message_count FROM school_admin WHERE user_name= '$id' AND school_reg='$reg' ";
                        $result1=mysql_query($sql1);
                        $row=mysql_fetch_array($result1);
                        if ($row['message_count']>99) { ?>
                          <span class="badge bg-green">99+</span>
                   <?php     }
                        elseif ($row['message_count']>0) {  ?>
                          <span class="badge bg-green"><?php echo $row['message_count']; ?></span>
                   <?php     }
                      }
                      elseif ($type=="S") {
                        $sql1="SELECT message_count FROM student WHERE student_name= '$id' AND school_reg='$reg' ";
                        $result1=mysql_query($sql1);
                        $row=mysql_fetch_array($result1);
                        if ($row['message_count']>99) { ?>
                          <span class="badge bg-green">99+</span>
                   <?php     }
                        elseif ($row['message_count']>0) {  ?>
                          <span class="badge bg-green"><?php echo $row['message_count']; ?></span>
                   <?php     }
                        
                      }
                      elseif ($type=="E") {
                        $sql1="SELECT message_count FROM employee WHERE employee_name= '$id' AND school_reg='$reg' ";
                        $result1=mysql_query($sql1);
                        $row=mysql_fetch_array($result1);
                        if ($row['message_count']>99) { ?>
                          <span class="badge bg-green">99+</span>
                   <?php     }
                        elseif ($row['message_count']>0) {  ?>
                          <span class="badge bg-green"><?php echo $row['message_count']; ?></span>
                   <?php     }
                        
                      }
                      elseif ($type=="P") {
                        $sql1="SELECT message_count FROM parent WHERE parent_name= '$id' AND school_reg='$reg' ";
                        $result1=mysql_query($sql1);
                        $row=mysql_fetch_array($result1);
                        if ($row['message_count']>99) { ?>
                          <span class="badge bg-green">99+</span>
                   <?php     }
                        elseif ($row['message_count']>0) {  ?>
                          <span class="badge bg-green"><?php echo $row['message_count']; ?></span>
                   <?php     }
                        
                      }
                    ?>
                    
                  </a>
                  
                  <ul id="menu1" style="overflow:auto;" class="dropdown-menu list-unstyled msg_list" role="menu">
                  
                  <?php
                      $sql="SELECT * FROM message WHERE message_to='$id' ORDER BY message_id DESC ";
                      $result=mysql_query($sql);
                      $ncount=mysql_num_rows($result);
                      if ($ncount>0) {
                        $count=1;
                       while ($row=mysql_fetch_array($result)) {
                       if ($count>4) {
                         break;
                       }
                        if (strlen($row['message_content'])>80) {
                          $msg=substr($row['message_content'],0,80);
                          $msg.="...";
                        }
                        else{
                          $msg=$row['message_content'];
                        }
                    
                  ?>
                        <li>
                        <a href="reset_message_count.php">
                        <span class="image">
                          
                                  <img style="margin-top:20px;" src="<?php echo "../image/".$row['image_path']; ?>" alt="img" />
                           
                        </span>
                          <span>
                            <span class="time" ><?php date_default_timezone_set('Asia/Karachi'); 
                  $d=date("Y-m-d h:i:s");
                  $to_time = strtotime($d);
                  $x=$row['date'];
                  $from_time = strtotime($x);
                  $t=abs($to_time - $from_time);
                  if(($m=floor( $t/ (60*60*24*30*12)))>0){
                    echo $m." year ago";  
                  }elseif(($m=floor( $t/ (60*60*24*30)))>0){
                    echo $m." months ago";  
                  }elseif(($m=floor( $t/ (60*60*24)))>0){
                    echo $m." days ago";  
                  }elseif(($m=floor( $t/ (60*60)))>0){
                    echo $m." hours ago"; 
                  }elseif(($m=floor( $t/ (60)))>0){
                    echo $m." mins ago";  
                  }
                  else{
                    echo "few seconds ago";
                  } ?></span>
                            <br/>
                            <span ><b ><?php echo $row['message_from'] ?></b></span>
                          </span>
                          
                            <span class="message"><?php echo $msg; ?></span>
                        </a>
                        </li>
                    <?php
                     $count++;
                          }
                        }
                        else{
                          echo "     No Message ";
                        }
                      
                      ?>
                    <li>
                      <div class="text-center">
                        <a href="reset_message_count.php">
                          <strong>See All Messages</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>

                </li>


              <?php if($type!=1){?> 
                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-bell"></i>
                    
                    <?php  
                      if ($type==2) {
                        $sql1="SELECT notification_count FROM school_admin WHERE user_name= '$id' AND school_reg='$reg' ";
                        $result1=mysql_query($sql1);
                        $row=mysql_fetch_array($result1);
                        if ($row['notification_count']>99) { ?>
                          <span class="badge bg-red">99+</span>
                   <?php     }
                        elseif ($row['notification_count']>0) {  ?>
                          <span class="badge bg-red"><?php echo $row['notification_count']; ?></span>
                   <?php     }
                      }
                      elseif ($type=="S") {
                        $sql1="SELECT notification_count FROM student WHERE student_name= '$id' AND school_reg='$reg' ";
                        $result1=mysql_query($sql1);
                        $row=mysql_fetch_array($result1);
                        if ($row['notification_count']>99) { ?>
                          <span class="badge bg-red">99+</span>
                   <?php     }
                        elseif ($row['notification_count']>0) {  ?>
                          <span class="badge bg-red"><?php echo $row['notification_count']; ?></span>
                   <?php     }
                        
                      }
                      elseif ($type=="E") {
                        $sql1="SELECT notification_count FROM employee WHERE employee_name= '$id' AND school_reg='$reg' ";
                        $result1=mysql_query($sql1);
                        $row=mysql_fetch_array($result1);
                        if ($row['notification_count']>99) { ?>
                          <span class="badge bg-red">99+</span>
                   <?php     }
                        elseif ($row['notification_count']>0) {  ?>
                          <span class="badge bg-red"><?php echo $row['notification_count']; ?></span>
                   <?php     }
                        
                      }
                      elseif ($type=="P") {
                        $sql1="SELECT notification_count FROM parent WHERE parent_name= '$id' AND school_reg='$reg' ";
                        $result1=mysql_query($sql1);
                        $row=mysql_fetch_array($result1);
                        if ($row['notification_count']>99) { ?>
                          <span class="badge bg-red">99+</span>
                   <?php     }
                        elseif ($row['notification_count']>0) {  ?>
                          <span class="badge bg-red"><?php echo $row['notification_count']; ?></span>
                   <?php     }
                        
                      }
                    ?>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                  <?php
                    if ($type==2) {
                      $sql="SELECT * FROM notification WHERE school_reg='$reg' ORDER BY notification_id DESC ";
                      $result=mysql_query($sql);
                      $ncount=mysql_num_rows($result);
                      if ($ncount>0) {
                        $count=1;
                       while ($row=mysql_fetch_array($result)) {
                       if ($count>4) {
                         break;
                       }
                        if (strlen($row['content'])>80) {
                          $msg=substr($row['content'],0,80);
                          $msg.="...";
                        }
                        else{
                          $msg=$row['content'];
                        }
                    
                  ?>
                        <li>
                        <a href="reset_notification_count.php">
                        <span class="image">
                          
                                  <img style="margin-top:20px;" src="<?php echo "../image/".$row['image_path']; ?>" alt="img" />
                           
                        </span>
                          <span>
                            <span class="time" ><?php date_default_timezone_set('Asia/Karachi');
                            $d=date("Y-m-d h:i:s");
                  $to_time = strtotime($d);
                  $x=$row['date'];
                  $from_time = strtotime($x);
                  $t=abs($to_time - $from_time);
                  if(($m=floor( $t/ (60*60*24*30*12)))>0){
                    echo $m." year ago";  
                  }elseif(($m=floor( $t/ (60*60*24*30)))>0){
                    echo $m." months ago";  
                  }elseif(($m=floor( $t/ (60*60*24)))>0){
                    echo $m." days ago";  
                  }elseif(($m=floor( $t/ (60*60)))>0){
                    echo $m." hours ago"; 
                  }elseif(($m=floor( $t/ (60)))>0){
                    echo $m." mins ago";  
                  }
                  else{
                    echo "few seconds ago";
                  } ?></span>
                            <br/>
                            <span ><b ><?php echo $row['created_by'] ?></b></span>
                          </span>
                          <span><br><b><?php echo "Title:".$row['title']; ?></b></span>
                            <span class="message"><?php echo $msg; ?></span>
                        </a>
                        </li>
                    <?php
                     $count++;
                          }
                        }
                        else{
                          echo "     No Notification ";
                        }
                      }
                      elseif($type=="S"||$type=="E"||$type=="P"){
                        $sql="SELECT * FROM notification WHERE school_reg='$reg' ORDER BY notification_id DESC ";
                      $result=mysql_query($sql);
                      
                      if (mysql_num_rows($result)>0) {
                        $count=1;
                       while ($row=mysql_fetch_array($result)) {
                       if ($count>4) {
                         break;
                       }
                       if(!strchr($row['type'],$type)){continue; }
                        if (strlen($row['content'])>80) {
                          $msg=substr($row['content'],0,80);
                          $msg.="...";
                        }
                        else{
                          $msg=$row['content'];
                        }
                    
                  ?>
                        <li>
                        <a href="reset_notification_count.php">

                        <span class="image">
                         
                                  <img style="margin-top:20px;" src="<?php echo "../image/".$row['image_path']; ?>" alt="img" />
                               
                          
                        </span>
                          <span>
                            <span class="time" ><?php date_default_timezone_set('Asia/Karachi');
                             $d=date("Y-m-d h:i:s");
                  $to_time = strtotime($d);
                  $x=$row['date'];
                  $from_time = strtotime($x);
                  $t=abs($to_time - $from_time);
                  if(($m=floor( $t/ (60*60*24*30*12)))>0){
                    echo $m." year ago";  
                  }elseif(($m=floor( $t/ (60*60*24*30)))>0){
                    echo $m." months ago";  
                  }elseif(($m=floor( $t/ (60*60*24)))>0){
                    echo $m." days ago";  
                  }elseif(($m=floor( $t/ (60*60)))>0){
                    echo $m." hours ago"; 
                  }elseif(($m=floor( $t/ (60)))>0){
                    echo $m." mins ago";  
                  }
                  else{
                    echo "few seconds ago";
                  } ?></span>
                            <br/>
                            <span ><b ><?php echo $row['created_by'] ?></b></span>
                          </span>
                          <span><br><b><?php echo "Title:".$row['title']; ?></b></span>
                            <span class="message"><?php echo $msg; ?></span>
                        </a>
                        </li>
                    <?php
                     $count++;
                          }
                        }
                        else{
                          echo "     No Notification ";
                        }
                      }
                        ?>
                    <li>
                      <div class="text-center">
                        <a href="reset_notification_count.php">
                          <strong>See All Notification</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>

                  </ul>
                </li>
                <?php } ?>
              </ul>
            </nav>
          </div>

        </div>
       <!-- /top navigation -->
