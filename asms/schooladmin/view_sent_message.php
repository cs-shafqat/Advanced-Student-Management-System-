<?php include("up.php");


$reg=$_SESSION['reg'];
$id=$_SESSION['username'];
 ?>
 <div class="testbox" style=" min-height:30px;" >
      <?php       if (isset($_GET['status']) && $_GET['status'] == '1' ) {
                  echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:green'>Notification ADD Successfully!</span>";
                  }
           ?>  
      </div>
<title>Sent Messages</title>
<div class="col-md-8 col-md-offset-2">
  <div class="x_panel">
    <div class="x_title">
     <h2>Sent box</h2>
      
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <ul class="list-unstyled msg_list">
        
      <?php 
            $ip=$id.".jpg";
            $sql="SELECT * FROM message WHERE school_reg='$reg' AND image_path='$ip' ORDER BY message_id DESC ";
            $result=mysql_query($sql);
            if (mysql_num_rows($result)>0) {
             while ($row=mysql_fetch_array($result)) {
             
              
              
      ?>
        <li>
          <a >
            <span class="image">
             
                           
      <img  src="<?php echo "../image/".$row['image_path']; ?>" alt="img" style="width:68.94px; height:68.94px;"/>
           
     
            </span>
            <span>
              <span>To: <?php echo $row['message_to']; ?></span>
                  <span class="time"  ><?php date_default_timezone_set('Asia/Karachi');
                  $d=date("Y-m-d h:i:s");
                  $to_time = strtotime($d);
                  $from_time = strtotime($row['date']);
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
            
            <span><br><?php echo "subject:".$row['message_tital']; ?></span>
            <span class="message"><?php echo $row['message_content']; ?>
            </span>
          </a>
          
        </li>
        <?php }
      }else{
        echo "Empty Notification Box";
      } ?>
      </ul>
    </div>

  </div>
</div>
<div class="clearfix"></div>

<?php
 include("down.php"); 

 ?>