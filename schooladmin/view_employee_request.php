<?php include("up.php");

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
     <h2>Employee's Requests</h2>
      
      <div class="clearfix"></div>
    </div>
    <div class="x_content">
      <ul class="list-unstyled msg_list">
        
      <?php 
            $t="E";
            $sql="SELECT * FROM request WHERE   type='$t' ORDER BY request_id DESC ";
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
              <span><?php echo $row['request_from']; ?></span>
                  <span class="time"  ><?php echo $row['date_of_request']?></span>

            </span>
            
            <span><br><?php echo "subject:".$row['request_tital']; ?></span>
            <span class="message"><?php echo $row['request_content']; ?>
            </span>
          </a>
          
        </li>
        <?php }
      }else{
        echo "Empty Request Box";
      } ?>
      </ul>
    </div>

  </div>
</div>
<div class="clearfix"></div>

<?php
 include("down.php"); 

 ?>