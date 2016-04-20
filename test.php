<?php
session_start();

if(isset($_SESSION['user_session'])!="")
{
	header("Location: home.php");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login Form using jQuery Ajax and PHP MySQL</title>
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="css/bootstrap-theme.min.css" rel="stylesheet" media="screen"> 
<script type="text/javascript" src="jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript" src="validation.min.js"></script>
<link href="stylesheets/sty.css" rel="stylesheet" type="text/css" media="screen">
<script type="text/javascript" src="script.js"></script>

</head>

<body>
    <a href="#top-bar" data-toggle="modal" class="top-bar-link" data-target="#login-modal"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>  Login</a></li>
	<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="signup-modal-label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                   <div class="modal-header" align="center">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
					</button>
				</div>
                    <div class="modal-body">
					<div id="div-login-msg">
                                <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                                <span id="text-login-msg">Type your username and password.</span>
                            </div>
                        <form class="form-signin" method="post" id="login-form">
						 <div id="error">
        <!-- error will be shown here ! -->
        </div>
        
                                <input type="text" name="user_email" id="user_email" class="form-control" placeholder="Username">
<span id="check-e"></span>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                           <div class="modal-footer">
                            <div>
                           <button type="submit" class="btn btn-default" name="btn-login" id="btn-login">
    		<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In
			</button> 
                          </div>
				        </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    
<script src="js/bootstrap.min.js"></script>

</body>
</html>