<?php  
require('./php/connect_database.php'); 
require('./php/user_session.php'); 
require('./php/register_account.php');
?> 
<?php
$name = $conn->prepare("SELECT name FROM users WHERE username=:user");
$name->bindParam(':user', $user);
$name->execute();
 while($row = $name->fetch()) {
             $name1 = $row["name"];
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name ="viewport"  content ="width=device-width, initial-scale=1, maximum-scale = 1,user-scalable=no">
    <title>FoodOnz | Order Food in Vellore</title>
	<link type="image/x-icon" rel="shortcut icon" href="https://i.imgur.com/xl1WjhW.png"/>
	
	<!-- External Stylesheets -->
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link href="./stylesheets/hint.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./stylesheets/style.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="./stylesheets/main_style.css">
	<link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="stylesheets/sty.css" rel="stylesheet" type="text/css" media="screen">
	<link rel="stylesheet" href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/a549aa8780dbda16f6cff545aeabc3d71073911e/build/css/bootstrap-datetimepicker.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intro.js/2.0.0/introjs.css">
	<link href="./themes/orange/pace-theme-corner-indicator.css" rel="stylesheet" media="screen"/>
        <link rel="stylesheet" type="text/css" href="./themes/orange/pace-theme-flash.css" media="handheld" />
<script type="text/javascript">
(function(p,u,s,h){
    p._pcq=p._pcq||[];
    p._pcq.push(['_currentTime',Date.now()]);
    s=u.createElement('script');
    s.type='text/javascript';
    s.async=true;
    s.src='https://cdn.pushcrew.com/js/77fd86deefe17f24c437b9f5ddbf217b.js';
    h=u.getElementsByTagName('script')[0];
    h.parentNode.insertBefore(s,h);
})(window,document);
</script>
<script type="application/ld+json">
{
  "@context" : "http://schema.org",
  "@type" : "Organization",
  "url" : "https://www.foodonz.com",
  "logo" : "https://i.imgur.com/PzeOPHi.png",
  "contactPoint" : [{
    "@type" : "ContactPoint",
    "telephone" : "+918220034880",
    "contactType" : "customer service"
  }]
}
</script>
<script type="application/ld+json">
{
  "@context" : "http://schema.org",
  "@type" : "Organization",
  "name" : "FoodONZ",
  "url" : "https://www.foodonz.com",
  "sameAs" : [
    "http://www.facebook.com/fudonz",
    "https://www.instagram.com/foodonz"
  ]
}
</script>
<!-- Begin Inspectlet Embed Code -->
<script type="text/javascript" id="inspectletjs">
window.__insp = window.__insp || [];
__insp.push(['wid', 461510451]);
(function() {
function ldinsp(){if(typeof window.__inspld != "undefined") return; window.__inspld = 1; var insp = document.createElement('script'); insp.type = 'text/javascript'; insp.async = true; insp.id = "inspsync"; insp.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://cdn.inspectlet.com/inspectlet.js'; var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(insp, x); };
setTimeout(ldinsp, 500); document.readyState != "complete" ? (window.attachEvent ? window.attachEvent('onload', ldinsp) : window.addEventListener('load', ldinsp, false)) : ldinsp();
})();
</script>
<!-- End Inspectlet Embed Code -->        
    <!-- Fonts API -->
    <link href='https://fonts.googleapis.com/css?family=Tangerine' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="css/component.css" />
    <!-- External Javascript -->
	<script src="./angular/angular.min.js"></script>
	<script src="//code.angularjs.org/1.2.28/angular-sanitize.min.js"></script>
    <script src="./angular/app.js"></script>
    <script src="./angular/offersController.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
 <script src="js/modernizr.custom.js"></script>

    <script type="text/javascript" src="validation.min.js"></script>
	<script type="text/javascript" src="script.js"></script>
	<script type="text/javascript" src="script1.js"></script>
	<script type="text/javascript" src="script2.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <script src="./js/moment.min.js"></script>
<script src="js/classie.js"></script>
        <script src="js/modalEffects.js"></script>
        <script>
            // this is important for IEs
            var polyfilter_scriptpath = '/js/';
        </script>
        <script src="js/cssParser.js"></script>
        <script src="js/css-filters-polyfill.js"></script>
	  <script src="./pace.js"></script>
    <script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/a549aa8780dbda16f6cff545aeabc3d71073911e/src/js/bootstrap-datetimepicker.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/intro.js/2.0.0/intro.js"></script>
	<style type="text/css">
			@import url('https://fonts.googleapis.com/css?family=Quicksand');
	body {
		font-family:'Quicksand', sans-serif !important;
	}
	.otp{
		width: 50%;
		margin-left:60px;
	}
	.otp-tag{
		font-weight:bold;
		font-size:14px;
		margin-top:7px;
	}
	#result{
		font-weight:bold;
		margin-top:10px;
	}
	.strongpass{
		color: #006400;
	}
	.weakpass{
		color: #E66C2C;
	}
	.goodpass{
		color: #2D98F3;
	}
	.weakpass{
		color: #FF0000;
	}
@media only screen and (max-width: 479px) {
   .logout-button{ display: none !important; }
   .desktop-toggle{ display: none !important; }
.mobile-none{ display: none !important; }
  .mobile-toggle{background-color: #e6e6e6 !important; }
  .icon-bar {background-color: #888 !important; }
  .mobile-logo {width:110px !important;
height:40px !important;}
}
@media only screen and (min-width: 479px) {
   .logout-button1{ display: none !important; }
   .mobile-toggle{display: none !important; }
.mobile-menu{display: none !important; }
.toggle-menu{display: none !important; }
.desktop-menu{display: none !important; }
}

	</style>

</head>
<body ng-app="myApp">
<?php echo $error; ?>
<div id="top-bar">
            <div class="container">
                <div class="clear-fix">
              		<a href="./index.php"><img class="mobile-logo" src="https://res.cloudinary.com/dhdglilcj/image/upload/v1460622258/beta_logo_new_eehxxp.png" width="160px" height="50px" id="logo_main"></img></a>

                    <div class="top-nav-bar pull-right">
                        <ul class="list-unstyled list-inline">

                            <?php 

                if(isset($_SESSION['user_login']))
                {
                   echo '<li class="top-menu"><div class="dropdown">
                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span> 
                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-expanded="true">
                     My Account
                    
                    </button>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu2">
                      <div class="text-center">
                      <li id="no-change" role="presentation">
                          <h3>Hey!</h3>
                          <h4>'.$name1.'</h4>
                       </li>
                         <a href="./orderhistory.php" style="text-decoration:none;"><li class="dropdown-links">History</li></a>
<a href="./settings.php" style="text-decoration:none;"><li class="dropdown-links">Settings</li></a>
                      </div>
                    </ul>
                  </div>
                </li>
   <button type="button" class="navbar-toggle collapsed mobile-toggle" data-toggle="collapse" data-target="#bs-exae-navbar-collapse-2">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                   <li class="logout-button"><a href="logout.php"> Logout </a></li>';
                }
                else{
                echo  '
				<li class="top-menu">
				<a href="#top-bar"data-toggle="modal" class="top-bar-link" data-target="#login-modal"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>  Login</a></li>
                </li>
                <li class="top-menu logout-button"><a href="#top-bar" data-toggle="modal" data-target="#signup-modal"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Sign Up</a></li>
				<li class="top-menu logout-button"><a href="#top-bar"><span class="glyphicon glyphicon-bullhorn" aria-hidden="true"></span> +918220034880</a></li>';
              }
                 
                  ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="signup-modal" tabindex="-1" role="dialog" aria-labelledby="signup-modal-label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                   <div class="modal-header" align="center">
					<img class="img-circle" id="img_logo" src="https://i.imgur.com/PzeOPHi.png">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
					</button>
				</div>
                    <div class="modal-body">
                       <form method="post" id="signup-form">
									 <div id="error">
        <!-- error will be shown here ! -->
        </div>
<div id="otperror">
        <!-- error will be shown here ! -->
        </div>
		<span style="color:#777 !important; font-size:22px !important; margin-bottom:10px">Sign Up to Get Started.</span>
                            <div class="form-group">
 <input type="text" name="name" class="form-control margin-signup" style="text-transform: capitalize !important;" id="namesignup" autocomplete="off" placeholder="Enter your full name.">

							   <input type="text" name="username" id="usernamesignup" class="form-control margin-signup" id="username" autocomplete="off" placeholder="Username">

								<input type="text" name="email" id="user_email" class="form-control margin-signup" id="email" autocomplete="off" placeholder="Email Address">
 
								<input type="password" name="password" id="passsignup" class="form-control margin-signup" autocomplete="off" id="password" placeholder="Password">
                                <span id="result"></span>
								</div>
								<input type="tel" name="mobile" id="mobilesignup" class="form-control margin-signup" autocomplete="off" id="mobile" placeholder="Mobile Number">
								<div id="phone">
								
								</div>
								
							</div>
							<div class="modal-footer modalsignup">
                           <button type="submit" class="btn btn-default" name="btn-signup" id="btn-signup">
    		<span class="glyphicon glyphicon-log-in"></span> &nbsp; Register
			</button> 
</div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
		<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="login-modal-label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                   <div class="modal-header" align="center">
					<img class="img-circle" id="img_logo" src="https://i.imgur.com/PzeOPHi.png">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
					</button>
				</div>
                    <div class="modal-body">
                        <form class="form-signin" method="post" id="login-form">
						 <div id="error1">
        <!-- error will be shown here ! -->
        </div>
		<div class="input-group margin-bottom-sm">
  <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
  <input class="form-control" name="user_username" id="user_username" autocomplete="off" type="text" placeholder="Username / Phone">
  <span id="check-e"></span>
</div>
<div class="input-group">
  <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
  <input class="form-control" name="password" id="password" autocomplete="off" type="password" placeholder="Password">
</div>
                           <div class="modal-footer">
                            <div>	
                           <button type="submit" class="btn btn-default" name="btn-login" id="btn-login">
    		<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In
			</button>
<a href="#top-bar" data-toggle="modal" data-target="#forgot-modal" data-dismiss="modal">Forgot Password?</a>

                          </div>
						  
				        </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
		
<div class="modal fade" id="forgot-modal" tabindex="-1" role="dialog" aria-labelledby="forgot-modal-label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                   <div class="modal-header" align="center">
					<img class="img-circle" id="img_logo" src="https://i.imgur.com/PzeOPHi.png">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
					</button>
				</div>
                    <div class="modal-body">
					<div id="error2"></div>
					<div id="div-login-msg">
                                <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                                <span id="text-login-msg">Reset your password.</span>
                            </div><br>
                        <form class="form-forgot" method="post" id="forgot-form">
 <input type="text" name="user_forgot" id="user_forgot" autocomplete="off" class="form-control" placeholder="Username/Mobile">
                           <div class="modal-footer">
                            <div>
                           <button type="submit" class="btn btn-default" name="btn1-login" id="btn1-login">
    		<span class="glyphicon glyphicon-log-in"></span> &nbsp; Reset Password
			</button> 
                          </div>
				        </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
	<script type="text/javascript">
 function verifyotp(){
	 var data = $("#signup-form").serialize();
		   $.ajax({
			   type : 'POST',
			   url  : 'verifyotp.php',
			   data : data,
                        beforeSend: function()
			{	
				$("#otperror").fadeOut();
				$("#mobile").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
			},
			   success : function(resp)
			   {
				   if(resp == "okay"){
                                                $(".modalsignup").html('<button class="btn btn-default" id="mobile" onclick="verifyotp()"><img src="images/btn-ajax-loader.gif" /> &nbsp; Please Wait ... </button>');
							setTimeout(' window.location.href = "index.php"; ',4000);
				   }
				   else{
					   $("#otperror").fadeIn(1000, function(){						
				$("#otperror").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+resp+'!</div>');
						});
  $(".modalsignup").html('<button class="btn btn-default" id="mobile" onclick="verifyotp()"><span class="glyphicon glyphicon-log-in"></span> Verify Again! </button>');
				   }
				   
			   }
		   });
	   }
	   </script>	
		<div class="modal fade" id="offers-modal" tabindex="-1" role="dialog" aria-labelledby="forgot-modal-label" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content" ng-controller="offersController">
                    <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Offers by FOODONZ</h4>
            </div>
            <div class="modal-body" id="offers_body">
                  <div class="panel panel-default" ng-repeat="item in items">
                    <div class="panel-body">
                      <div class="row">
                        <div class="col-sm-12 col-lg-5 col-md-5 col-xs-12">
                          <img style="border-radius: 178px; display: block; height:150px; width:150px;" src="{{item.thumbnail}}">
                        </div>
                        <div class="col-sm-12 col-lg-7 col-md-5 col-xs-12">
                            <h1 style="font-size:17px;">{{item.offer_line1}}</h1>
                            <p>{{item.offer_line2}}:<span style="color:orange";><strong>{{item.offer_line3}}</strong></span></p>
<h6>{{item.offer_line4}}</h6>

                        </div>
                    </div>
                  </div>
                </div>
            </div>
            </div>
        </div>
    </div> 
<nav class="navbar navbar-default mobile-none">
            <div class="container-fluid">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="index.php"><i class="fa fa-home"></i> HOME</a></li>
                            <li><a href="food.php"><i class="fa fa-shopping-cart"></i> ORDER</a></li>
                            <li style="outline:none;"><a href="#offer" data-toggle="modal" data-target="#offers-modal"> <i class="fa fa-bullhorn"></i> OFFERS</a></li>
<li class="logout-button1"><a href="logout.php"><i class="fa fa-shopping-cart"></i> LOGOUT</a></li>

                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
            </div>

        </nav>
<div class="container-fluid desktop-menu">
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-exae-navbar-collapse-2">

                        <ul class="nav navbar-nav1 navbar-right">
                            <li><a href="index.php"><i class="fa fa-home"></i> HOME</a></li>
                            <li><a href="food.php"><i class="fa fa-shopping-cart"></i> ORDER</a></li>
                            <li style="outline:none;"><a href="#offer" data-toggle="modal" data-target="#offers-modal"> <i class="fa fa-bullhorn"></i> OFFERS</a></li>
<li class="logout-button1"><a href="logout.php"><i class="fa fa-shopping-cart"></i> LOGOUT</a></li>

                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
            </div>
</body>

</html>