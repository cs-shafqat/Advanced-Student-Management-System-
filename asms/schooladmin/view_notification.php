<?php include("up.php");

function base64url_encode($data) { 
  return rtrim(strtr(base64_encode($data), '+/', '-_'), '='); 
} 

function base64url_decode($data) { 
  return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT)); 
} 
$reg=$_SESSION['reg'];

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
      <h2>Notification</h2><small class="pull-right">Total <?php echo $ncount; ?></small>
      
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <ul class="list-unstyled msg_list">
        
      <?php $sql="SELECT * FROM notification WHERE school_reg='$reg' ORDER BY notification_id DESC ";
            $result=mysql_query($sql);
            if (mysql_num_rows($result)>0) {
             while ($row=mysql_fetch_array($result)) {
              $a=$row['type'];
              if($a=="ESP"){$a="For All";}
              elseif($a=="S"){$a="For Students";}
              elseif($a=="E"){$a="For Employee";}
              elseif($a=="P"){$a="For Parents";}
              elseif($a=="SE"){$a="For Students And Employee";}
              elseif($a=="SP"){$a="For Students And Parents";}
              elseif($a=="EP"){$a="For Employee And Parents";}
              
              
      ?>
        <li>
          <a style="width:90%;">
            <span class="image">
             
                           
      <img  src="<?php echo "../image/".$row['image_path']; ?>" alt="img" style="width:68.94px; height:68.94px;"/>
           
     
            </span>
            <span>
              <span><?php echo $row['created_by']; ?></span>
                  <span class="time" style="margin-right:34px;" ><?php $d=date("Y-m-d h:i:s");
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
            <span><br><?php echo $a; ?></span>
            <span><br><?php echo "Title:".$row['title']; ?></span>
            <span class="message"><?php echo $row['content']; ?>
            </span>
          </a>
          <a style="width:10%;">
          <a type="button" class="btn btn-danger pull-right" style="height:25px;width:25px;align:center;" href="delete_notification.php?id=<?php echo base64url_encode($row['notification_id']);?>" onclick="return confirm('Are you sure You Want To Delete this notificatin?');"><i class="fa fa-trash-o pull-right"  onclick=""></i></a>
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
 if (isset($_GET['id'])) {
  $id=base64url_decode($_GET['id']);
  if ($id==2) {
   ?>
  <script type="text/javascript">
    alert("Your notification has been Successfully deleted");
    history.back();
  </script>
<?php
  }
}
 ?>