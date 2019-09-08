<?php include("../include/up.php");
function base64url_encode($data) { 
  return rtrim(strtr(base64_encode($data), '+/', '-_'), '='); 
} 

function base64url_decode($data) { 
  return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT)); 
} 

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
              if(!strchr($row['type'],"E")){
                if (!(substr($row['image_path'],0,8)==$_SESSION['username'])) {
                  continue;
                }
               }
              
              
      ?>
        <li>
          <a style="width:90%;">
            <span class="image">
           
              <img src="<?php echo "../image/".$row['image_path']; ?>" alt="img" />
           
      
            </span>
            <span>
              <span><?php echo $row['created_by']; ?></span>
              <span class="time" style="margin-right:34px;" ><?php $d=date("Y-m-d h:i:s");
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
          <?php if(substr($row['image_path'],0,8)==$id){ ?>
          <a style="width:10%;">
          <a type="button" class="btn btn-danger pull-right" style="height:25px;width:25px;align:center;" href="delete_notification.php?id=<?php echo base64url_encode($row['notification_id']); ?>" onclick="return confirm('Are you sure You Want To Delete this notificatin?');"><i class="fa fa-trash-o pull-right"  onclick=""></i></a>
          </a>
          <?php } ?>
          
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
if (isset($_GET['id'])) {
  $id1=base64url_decode($_GET['id']);
  if ($id1==2) {
   ?>
  <script type="text/javascript">
    alert("Your notification has been Successfully deleted");
    history.back();
  </script>
<?php
  }
}
 include("../include/down.php"); 
 
 ?>