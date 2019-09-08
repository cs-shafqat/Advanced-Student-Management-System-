
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Bootstrap Core CSS -->
    <link href="gent/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="gent/vendors/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="gent/production/dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="gent/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<script type="text/javascript">
function handleinput(){
    if(!(onblurpasw(document.getElementById("password")))) {
       return false;
    }
   
    return true;   
}
    function error(id,message){
            
            document.getElementById(id).innerHTML = "<div style='color:red;margin-bottom: 20px;'>"+message+"</div>";
            return false;
        }
        function success(id,message){
            
            document.getElementById(id).innerHTML = "<div style='color:green;margin-bottom: 20px;'>"+message+"</div>";
            return true;
        }
    function onblurpasw(t){
            var str=t.value;
            if(str.length<6){
                return error("passwordError","minimum length should be 6");
            }else{
                return success("passwordError","");
            }
        }
       function checkUsername(e,t){
           try {
                if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                    var charCode =  e.which;
                }
                else { return true; }
                if(e.target.selectionStart==0){
                
                    if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123)){
                        return success("usernameError","");
                    }
                    else{
                        return error("usernameError","input start with only [A-Z]or[a-z]");
                    }
                }
                if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123)|| (charCode >47 && charCode < 58))
                    return success("usernameError","");
                else
                    return error("usernameError","input only [A-Z]or[a-z] or[0-9]");
            }
            catch (err) {
                alert(err.Description);
            }
        }

</script>
   

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form onsubmit=" return handleinput(); " role="form" method="post" action="index_process.php">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="User_ID" required="true" id="username" name="username" type="text" autofocus  onkeypress="return checkUsername(event,this);" ><span id="usernameError"></span>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" required="true" id="password" name="password" type="password" value=""  onkeyup="return onblurpasw(this);" onblur="return onblurpasw(this);"><span id="passwordError" ></span>
                                </div>
                                <div class="form-group">
                                    <select class="form-control" required="true" id="type" name="type" >
                                        <option vlaue="1">Employee</option>
                                        <option vlaue="2">Student</option>
                                        <option vlaue="3">Parent</option>
                                    </select>
                                </div>
                                
                                <!-- Change this to a button or input when using this as a form -->
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
    <script src="gent/vendors/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="gent/vendors/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="gent/vendors/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="gent/production/dist/js/sb-admin-2.js"></script>

</body>

</html>
