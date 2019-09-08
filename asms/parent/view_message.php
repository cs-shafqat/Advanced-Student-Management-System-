<?php
 require("../require/sessions.php");
  $check123=substr($_SESSION['username'], 0,3);
  if($check123!="PAR"){
    session_unset();
    session_destroy();
    header("location:../index.php");
    exit();
  }
 include("../include/up.php");
$reg=$_SESSION['reg'];
$id=$_SESSION['username'];
 ?>
 <div class="testbox" style=" min-height:30px;" >
      <?php       if (isset($_GET['status']) && $_GET['status'] == '1' ) {
                  echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='color:green'>Notification ADD Successfully!</span>";
                  }
           ?>  
      </div>
<div class="col-md-8 col-md-offset-2">
  <div class="x_panel">
    <div class="x_title">
     <h2>Inbox</h2>
      
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <ul class="list-unstyled msg_list">
        
      <?php $sql="SELECT * FROM message WHERE message_to='$id' ORDER BY message_id DESC ";
            $result=mysql_query($sql);
            if (mysql_num_rows($result)>0) {
             while ($row=mysql_fetch_array($result)) {
             
              
              
      ?>
        <li>
          <a style="width:90%;">
            <span class="image">
             
                           
      <img  src="<?php echo "../image/".$row['image_path']; ?>" alt="img" style="width:68.94px; height:68.94px;"/>
           
     
            </span>
            <span>
              <span><?php echo $row['message_from']; ?></span>
                  <span class="time" style="margin-right:34px;" ><?php date_default_timezone_set('Asia/Karachi');
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
          <?php if(substr($row['image_path'],0,3)=="EMP"){ ?>
          <a style="width:10%;">
         <?php $l=strlen($row['image_path']);
               $l-=4;
               $n=substr($row['image_path'],0,$l); 
         ?>
          <a type="button" class="btn btn-primary pull-right" title="reply" style="height:25px;width:25px;align:center;" href="compose_message.php?id=<?php echo $n ; ?> " ><i class="fa fa-reply pull-right" ></i></a>
          </a>
          <?php } ?>
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
 include("../include/down.php"); 

 ?>