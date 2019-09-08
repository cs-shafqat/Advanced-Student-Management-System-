<?php
require("../require/sessions.php");
  $check123=substr($_SESSION['username'], 0,3);
  if($check123!="SDT"){
    session_unset();
    session_destroy();
    header("location:../index.php");
    exit();
  }
 include("../include/up.php");


 ?>
 
<div class="col-md-8 col-md-offset-2">
  <div class="x_panel">
    <div class="x_title">
      <h2>Notification</h2>
      
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <ul class="list-unstyled msg_list">
        
      <?php $sql="SELECT * FROM notification WHERE school_reg='$reg' ORDER BY notification_id DESC ";
            $result=mysql_query($sql);
            if (mysql_num_rows($result)>0) {
             while ($row=mysql_fetch_array($result)) {
              if(!strchr($row['type'],"S")){continue; }
              
              
      ?>
        <li>
          <a>
            <span class="image">
           
              <img src="<?php echo "../image/".$row['image_path']; ?>" alt="img" />
           
      
            </span>
            <span>
              <span><?php echo $row['created_by']; ?></span>
              <span class="time"  ><?php $d=date("Y-m-d h:i:s");
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

            </span>
            
            <span><br><?php echo "Title:".$row['title']; ?></span>
            <span class="message"><?php echo $row['content']; ?>
            </span>
          </a>
          
        </li>
        <?php }
      }else{
        echo "    Empty Notification Box";
      } ?>
      </ul>
    </div>

  </div>
</div>
<div class="clearfix"></div>

<?php
 include("../include/down.php"); 
 
 ?>