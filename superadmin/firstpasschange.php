
<!DOCTYPE html>
<html lang="en">

<head>
    <?php   require("../require/connection.php"); 
         require("../require/sessions.php");
             
         if(!isset($_SESSION)) {
           session_start();
        }
    
          
    
            $sql = "SELECT * FROM super_admin where user_name ='{$_SESSION['username']}'";
            $result=mysql_query($sql);
            
            if (mysql_num_rows($result) == 1)
            {
            $row = mysql_fetch_array( $result );
            }
            // output data of each row
    $id=$_SESSION['username'];        
?>  

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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<script type="text/javascript">
function handleinput(){
    if(!(onblurpasw(document.getElementById("password")))) {
       return false;
    }
    if(!(onblurpaswcon(document.getElementById("confirm_password")))) {
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
        function onblurpaswcon(t){
            if(document.getElementById("password").value==""){return error("passwordconError","");}
            if(document.getElementById("password").value==t.value){return success("passwordconError","password match");}
            else{ return error("passwordconError","password not match");}
        }

</script>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Change Password</h3>
                    </div>
                    <div class="panel-body">
                        <form onsubmit="return handleinput();" role="form" method="post" action="firstpasschange_process.php?id=1">
                            <fieldset>
                                 <div class="form-group">
                                    <input class="form-control" value="<?php echo $_SESSION['username'];?>" readonly="true" type="text" id="id" name="id" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Old Password" required="true" type="password" id="oldpass" name="oldpass" autofocus >
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="New Password" required="true" type="password" id="password" name="password" value=""  onkeyup="return onblurpasw(this);" onblur="return onblurpasw(this);"><span id="passwordError" ></span>
                                </div>
                                 <div class="form-group">
                                    <input class="form-control" placeholder="Confirm Password" required="true" type="password" id="confirm_password" name="confirm_password" value=""  onkeyup="return onblurpaswcon(this);" onblur="return onblurpaswcon(this);"><span id="passwordconError" ></span>
                                </div>
                            
                                <button type="submit" class="btn btn-lg btn-success btn-block">Login</button>
                            </fieldset>
                        </form>
                       
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




        <!-- <div class="login_box">
            
            <form action="firstpasschange_process.php?id=<?php echo $row['id'];?>"  method="post" id="login_form">
                <div class="top_b" >Change password</div>    
                
                <div class="cnt_b">
                    
                    <div class="formRow">
                        <div class="input-prepend">
                            <span class="add-on"><i class="icon-lock"></i></span><input type="password" id="oldpass" name="oldpass" placeholder="Old Password" />
                        </div>
                    </div>
                    <div class="formRow">
                        <div class="input-prepend">
                            <span class="add-on"><i class="icon-lock"></i></span><input type="password" id="password" name="password" placeholder="New Password" />
                        </div>
                    </div>
                    <div class="formRow">
                        <div class="input-prepend">
                            <span class="add-on"><i class="icon-lock"></i></span><input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password" />
                        </div>
                    </div>
                    <div class="formRow">
                       <input type="submit"  class="button pull-right " style="background-color:blue; color:white;"  name="Submit" value="Save" />
                    </div>
                </div>
                     <script type="text/javascript">
                        
                       $('#password, #confirm_password').on('keyup', function () {
                        
                        if ($('#password').val()==="" && $('#confirm_password').val()==="") {
                            $('#messagepass').css("display","none");
                        } 
                          
                        if ($('#password').val() === $('#confirm_password').val()) {
                            $('#messagepass').html('Matching').css('color', 'green');
                        } else 
                            $('#messagepass').html('Not Matching').css('color', 'red');
                    });
                        
                        </script>
                        
                        </br>
                        
            </form>
            
           
            
   
        </div>
        
        <script src="../H1/js/jquery.min.js"></script>
        <script src="../H1/js/jquery.actual.min.js"></script>
        <script src="../H1/lib/validation/jquery.validate.min.js"></script>
        <script src="../H1/bootstrap/js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function(){
                
                //* boxes animation
                form_wrapper = $('.login_box');
                function boxHeight() {
                    form_wrapper.animate({ marginTop : ( - ( form_wrapper.height() / 2) - 24) },400);   
                };
                form_wrapper.css({ marginTop : ( - ( form_wrapper.height() / 2) - 24) });
                $('.linkform a,.link_reg a').on('click',function(e){
                    var target  = $(this).attr('href'),
                        target_height = $(target).actual('height');
                    $(form_wrapper).css({
                        'height'        : form_wrapper.height()
                    }); 
                    $(form_wrapper.find('form:visible')).fadeOut(400,function(){
                        form_wrapper.stop().animate({
                            height   : target_height,
                            marginTop: ( - (target_height/2) - 24)
                        },500,function(){
                            $(target).fadeIn(400);
                            $('.links_btm .linkform').toggle();
                            $(form_wrapper).css({
                                'height'        : ''
                            }); 
                        });
                    });
                    e.preventDefault();
                });
                
                //* validation
                $('#login_form').validate({
                    onkeyup: false,
                    errorClass: 'error',
                    validClass: 'valid',
                    rules: {
                        username: { required: true, minlength: 3 },
                        password: { required: true, minlength: 3 }
                    },
                    highlight: function(element) {
                        $(element).closest('div').addClass("f_error");
                        setTimeout(function() {
                            boxHeight()
                        }, 200)
                    },
                    unhighlight: function(element) {
                        $(element).closest('div').removeClass("f_error");
                        setTimeout(function() {
                            boxHeight()
                        }, 200)
                    },
                    errorPlacement: function(error, element) {
                        $(element).closest('div').append(error);
                    }
                });
            });
        </script>
 -->   
</html>
