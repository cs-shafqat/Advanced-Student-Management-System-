
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Change Password</title>

    <!-- Bootstrap Core CSS -->
    <link href="../gent/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../gent/vendors/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../gent/production/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../gent/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

   

</head>
<?php   require("../require/connection.php"); 
         require("../require/sessions.php");
             
         if(!isset($_SESSION)) {
           session_start();
        }
    
          
    
            $sql = "SELECT * FROM employee where employee_name ='{$_SESSION['username']}'";
            $result=mysql_query($sql);
            
            if (mysql_num_rows($result) == 1)
            {
            $row = mysql_fetch_array( $result );
            }
            // output data of each row
            
?>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    
                    <div class="panel-body">
                        <form role="form" method="post" action="firstpasschange_process.php?id=1">
                            <fieldset>
                                 <div class="form-group">
                                    <input class="form-control" value="<?php echo $_SESSION['username'];?>" readonly="true" type="text" id="id" name="id" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Old Password" type="password" id="oldpass" name="oldpass" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="New Password" type="password" id="password" name="password" value="">
                                </div>
                                 <div class="form-group">
                                    <input class="form-control" placeholder="Confirm Password" type="password" id="confirm_password" name="confirm_password" value="">
                                </div>
                            
                                <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                            </fieldset>
                        </form>
                        <?php
                             
                            if(isset($_SESSION['error_message'])){?>
                               &nbsp;&nbsp; <span style="color: #e74c3c"><?php echo $_SESSION['error_message'];?><span>
                                       <?php
                               unset($_SESSION['error_message']);
                               session_destroy();
                               }
                        ?>  
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../gent/vendors/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../gent/vendors/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../gent/vendors/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../gent/production/dist/js/sb-admin-2.js"></script>

</body>

</html>
<?php mysql_close($connection);?>
