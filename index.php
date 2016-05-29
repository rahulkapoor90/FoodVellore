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
<html>
<head>
<title>FoodONZ | Order Food Online in Vellore</title>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, user-scrollable=no,user-scalable=no, minimum-scale=1.0, initial-scale=1">
<meta name="description" content="Order food online in Vellore. We help in making ordering food so easy you will never have to wait in line ever again."/>
<meta name="Keywords" content="Restaurants in Vellore, Tamil Nadu, VIT University, Vellore, bihari dhaba, olive kitchen, limra, CMC, Order food online, Home delivery">
<meta name="robots" content="index,follow">
<meta name="revisit-after" content="3 days">
<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="google-play-app" content="app-id=com.foodonz.android">
<meta property="fb:page_id" content="1484248938482224">
<link rel="alternate" href="https://foodonz.com" hreflang="en-us"/>
<script type="text/javascript">
!function(a,b,c,d){a._pcq=a._pcq||[],a._pcq.push(["_currentTime",Date.now()]),c=b.createElement("script"),c.type="text/javascript",c.async=!0,c.src="https://cdn.pushcrew.com/js/77fd86deefe17f24c437b9f5ddbf217b.js",d=b.getElementsByTagName("script")[0],d.parentNode.insertBefore(c,d)}(window,document);
</script>
<!-- OG Tags -->
<meta property="og:title" content="FoodOnz | Order Food Online in Vellore">
<meta property="og:type" content="website">
<meta property="og:url" content="https://www.foodonz.com/">
<meta property="og:image" content="https://i.imgur.com/Wv3WAs8.jpg">
<meta property="og:description" content="Order food online in Vellore. We help in making ordering food so easy you will never have to wait in line ever again.">
<!-- Twitter -->
<meta name="twitter:card" content="summary" />
<meta name="twitter:site" content="@foodonz" />
<meta name="twitter:title" content="FoodONZ | Order Food Online in Vellore" />
<meta name="twitter:description" content="Order food online in Vellore. We help in making ordering food so easy you will never have to wait in line ever again." />
<meta name="twitter:image" content="https://i.imgur.com/Wv3WAs8.jpg" />

<!-- Icons -->
<link rel="apple-touch-icon" sizes="57x57" href="https://res.cloudinary.com/dhdglilcj/image/upload/v1461173042/apple-icon-57x57_ktdpjk.png">
<link rel="apple-touch-icon" sizes="60x60" href="https://res.cloudinary.com/dhdglilcj/image/upload/v1461173042/apple-icon-60x60_fpwdce.png">
<link rel="apple-touch-icon" sizes="72x72" href="https://res.cloudinary.com/dhdglilcj/image/upload/v1461173042/apple-icon-72x72_pfc9mj.png">
<link rel="apple-touch-icon" sizes="76x76" href="https://res.cloudinary.com/dhdglilcj/image/upload/v1461173042/apple-icon-76x76_a74sfo.png">
<link rel="apple-touch-icon" sizes="114x114" href="https://res.cloudinary.com/dhdglilcj/image/upload/v1461173043/apple-icon-114x114_otlhjz.png">
<link rel="apple-touch-icon" sizes="120x120" href="https://res.cloudinary.com/dhdglilcj/image/upload/v1461173043/apple-icon-120x120_izwclv.png">
<link rel="apple-touch-icon" sizes="144x144" href="https://res.cloudinary.com/dhdglilcj/image/upload/v1461173045/apple-icon-144x144_kyvy6q.png">
<link rel="apple-touch-icon" sizes="152x152" href="https://res.cloudinary.com/dhdglilcj/image/upload/v1461173044/apple-icon-152x152_tza5bp.png">
<link rel="apple-touch-icon" sizes="180x180" href="https://res.cloudinary.com/dhdglilcj/image/upload/v1461173043/apple-icon-180x180_vilcr0.png">
<link rel="icon" type="image/png" sizes="192x192"  href="https://res.cloudinary.com/dhdglilcj/image/upload/v1461173042/android-icon-192x192_pgrla5.png">

<link rel="icon" type="image/png" sizes="32x32" href="https://res.cloudinary.com/dhdglilcj/image/upload/v1461173053/favicon-32x32_fnzrub.png">
<link rel="icon" type="image/png" sizes="96x96" href="https://res.cloudinary.com/dhdglilcj/image/upload/v1461173053/favicon-96x96_deohty.png">
<link rel="icon" type="image/png" sizes="16x16" href="https://res.cloudinary.com/dhdglilcj/image/upload/v1461173053/favicon-16x16_mbbeox.png">
<link rel="manifest" href="https://www.foodonz.com/manifest.json">
<meta name="msapplication-TileColor" content="#D06E28">
<meta name="msapplication-TileImage" content="https://res.cloudinary.com/dhdglilcj/image/upload/v1461173073/ms-icon-144x144_wrb0va.png">
<meta name="theme-color" content="#E87E28">
<!-- Quantcast Tag -->
<script type="text/javascript">
var _qevents=_qevents||[];!function(){var a=document.createElement("script");a.src=("https:"==document.location.protocol?"https://secure":"http://edge")+".quantserve.com/quant.js",a.async=!0,a.type="text/javascript";var b=document.getElementsByTagName("script")[0];b.parentNode.insertBefore(a,b)}(),_qevents.push({qacct:"p-9ncmtDuktNwK2"});
</script>
<!-- End Quantcast tag -->

<!-- Begin Inspectlet Embed Code -->
<script type="text/javascript" id="inspectletjs">
window.__insp=window.__insp||[],__insp.push(["wid",461510451]),function(){function a(){if("undefined"==typeof window.__inspld){window.__inspld=1;var a=document.createElement("script");a.type="text/javascript",a.async=!0,a.id="inspsync",a.src=("https:"==document.location.protocol?"https":"http")+"://cdn.inspectlet.com/inspectlet.js";var b=document.getElementsByTagName("script")[0];b.parentNode.insertBefore(a,b)}}setTimeout(a,500),"complete"!=document.readyState?window.attachEvent?window.attachEvent("onload",a):window.addEventListener("load",a,!1):a()}();
</script>
<!-- End Inspectlet Embed Code -->
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
	<link href="./themes/orange/pace-theme-flat-top.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="./stylesheets/index_style.css">
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<link type="image/x-icon" rel="shortcut icon" href="https://i.imgur.com/xl1WjhW.png"/>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-76243332-1', 'auto');
  ga('send', 'pageview');

</script>
<style>
body.modal-open {
    overflow: hidden !important;
}
.logo-img {
    height: 80px !important;
    margin: 0 auto !important;
    width: 210px !important;
}
</style>
</head>
	<body class="landing">
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6&appId=442861082492923";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
		<div id="page-wrapper">
	<!-- Header -->
				<header id="header" class="alt">
					<nav id="nav">
						<ul>
							
							 <?php 

                if(isset($_SESSION['user_login']))
                {
						echo '<li><a href="./logout.php">Logout</a></li><li><a href="./settings.php">Settings</a></li>';
				}
				?>
							<li>Contact Us <a href="tel:+918220034880" class="button">+918220034880</a></li>
						</ul>
					</nav>
				</header>
 <div class="modal fade" id="signup-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                   <div class="modal-header header-signin" style="text-align:center;">
				    <img alt="FoodOnz" src="https://i.imgur.com/PrhpUCC.png">
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
							   <input type="text" name="username" id="usernamesignup" class="form-control margin-signup" autocomplete="off" placeholder="Username">

								<input type="text" name="email" id="user_email" class="form-control margin-signup" autocomplete="off" placeholder="Email Address">
 
								<input type="password" name="password" id="passsignup" class="form-control margin-signup" autocomplete="off" placeholder="Password">
                                <span id="result"></span>
								</div>
								<input type="tel" name="mobile" id="mobilesignup" class="form-control margin-signup" autocomplete="off" placeholder="Mobile Number">
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
		<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-hidden="true" style="overflow-y:auto;">
            <div class="modal-dialog">
                <div class="modal-content">
                   <div class="modal-header header-signin" style="text-align:center;">
				   <img alt="FoodOnz" src="https://i.imgur.com/PrhpUCC.png">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
					</button>
				</div>
                    <div class="modal-body">
                        <form class="form-signin" method="post" id="login-form">
						 <div id="error1">
        </div>
		<span style="color:#777 !important;">Username</span>
		<div class="input-group margin-bottom-sm">
  <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
  <input class="form-control" name="user_username" id="user_username" autocomplete="off" type="text" placeholder="Enter your Username">
</div>

<span style="color:#777 !important;">Password</span>
<div class="input-group">
  <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
  <input class="form-control" name="password" id="password" autocomplete="off" type="password" placeholder="Enter your Password">
</div>
                           <div class="modal-footer">
                            <div>	
                           <button type="submit" class="btn btn-default" name="btn-login" id="btn-login">
    		<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In
			</button> 

                          </div>	
							<div style="margin-top:8px;">
							<a href="#top-bar" data-toggle="modal" data-target="#forgot-modal" data-dismiss="modal">Forgot Password?</a>
							</div>
				        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
		<div class="modal fade" id="forgot-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                   <div class="modal-header" style="text-align:center;">
					<img class="img-circle" id="img_logo" alt="foodonz" src="https://i.imgur.com/PzeOPHi.png">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
					</button>
				</div>
                    <div class="modal-body">
					<div id="error2"></div>
					<div id="div-login-msg">
                                <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                                <span id="text-login-msg">Reset your password.</span>
                            </div>
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
 function verifyotp(){var a=$("#signup-form").serialize();$.ajax({type:"POST",url:"verifyotp.php",data:a,beforeSend:function(){$("#otperror").fadeOut(),$("#mobile").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...')},success:function(a){"okay"==a?($(".modalsignup").html('<button class="btn btn-default" id="mobile" onclick="verifyotp()"><img src="images/btn-ajax-loader.gif" /> &nbsp; Please Wait ... </button>'),setTimeout(' window.location.href = "index.php"; ',4e3)):($("#otperror").fadeIn(1e3,function(){$("#otperror").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+a+"!</div>")}),$(".modalsignup").html('<button class="btn btn-default" id="mobile" onclick="verifyotp()"><span class="glyphicon glyphicon-log-in"></span> Verify Again! </button>'))}})}
	   </script>
			<!-- Banner -->
				<section id="banner">
					<h2 style="display:inline-block;"><img style="display:inline-block;user-drag: none; -moz-user-select: none; -webkit-user-drag: none;" alt="FoodOnz" src="https://res.cloudinary.com/dhdglilcj/image/upload/v1461495472/PzeOPHi-min_tegooq.png" width="250" height="250"></h2>
					<p>Ordering Food in Vellore, made Simple.</p>
					<ul class="actions">
					 <?php 

                if(!isset($_SESSION['user_login']))
                {
						echo '<li><a href="#top-bar" data-toggle="modal" data-target="#signup-modal"  class="button special">Sign Up</a></li>
						<li><a href="#top-bar" data-toggle="modal" data-target="#login-modal" class="button">Log In</a></li>';
				}
				else {
					echo '<li><a href="./food.php"  class="button special">Order Now</a></li>';
				}
				?>
					</ul>
				</section>

			<!-- Main -->
				<section id="main" class="container">
					<section class="box special">
						<header class="major">
							<h2>You will never have to wait for your food ever again.</h2>
							<p>At FoodONZ, we have spent countless hours working in developing products that help you not just order food but 
							provide such a convienience that has never been provided before.</p>
<div class="fb-like" data-href="https://facebook.com/fudonz" data-layout="button_count" data-action="like" data-show-faces="true" data-share="true"></div>
<a href="https://twitter.com/intent/tweet?button_hashtag=Foodonz" class="twitter-hashtag-button" data-url="http://foodonz.com">Tweet #Foodonz</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
						</header>
					</section>

					<section class="box special features">
						<div class="features-row">
							<section>
								<span class="icon major fa-bolt accent2"></span>
								<h3>Lightening Fast Ordering Process</h3>
								<p>You just have to choose a restaurant, select items, apply coupons and then order it. It's that Simple.</p>
							</section>
							<section>
								<span class="icon major fa-lock accent5"></span>
								<h3>100% Secure</h3>
								<p>We respect your Privacy, and we are always committed to provide the highest level of security to keep your information safe and secure.</p>
							</section>
						</div>
					</section>
				</section>
		</div>
	<section id="cta">

					<h2>Now experience the best of Vellore on your Mobile and Desktop.</h2>
					<p>Download The App Now.</p><br>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-lg-6 col-sm-6">
           
							<a target="_blank" href='https://play.google.com/store/apps/details?id=com.foodonz.android&hl=en&utm_source=global_co&utm_medium=prtnr&utm_content=Mar2515&utm_campaign=PartBadge&pcampaignid=MKT-Other-global-all-co-prtnr-py-PartBadge-Mar2515-1'><img alt='Get it on Google Play' class="img-responsive logo-img" src='https://play.google.com/intl/en_us/badges/images/generic/en_badge_web_generic.png'/></a>
        </div>
        <div class="col-xs-12 col-lg-6 col-sm-6">
           <img alt='Get it on App Store' class="img-responsive logo-img" src='https://www.pustaka.co.in/images/app-store-icon.png'/>
        </div>
    </div>
</div>
				</section>
<div id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <ul style="list-style:none;">
					<li><a  style="color: #fff !important;text-decoration: none !important;" href="./terms.php">Terms and Conditions</a></li>
					<li><a style="color: #fff !important;text-decoration: none !important;" href="./privacy.php">Privacy Policy</a></li>
				</ul>
            </div>

            <div class="col-md-offset-4 col-md-4">
                <h4>OUR MOTTO</h4>
                <p>FoodONZ aims to change the way the food is ordered and delivered in and around Vellore.
<h4>OUR SPONSORS</h4>
<a href="https://msg91.com/startups/?utm_source=startup-banner"><img src="https://msg91.com/images/startups/msg91Badge.png" width="120" height="90" title="MSG91 - SMS for Startups" alt="Bulk SMS - MSG91"></a>

</p>
            </div>
        </div>
    </div>
</div>
<div class="footer-bar">
    <p class="text-center">&copy; 2016 FoodONZ All rights reserved.</p>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	 <script src="./pace.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
   <script type="text/javascript" src="validation.min.js"></script>
	<script type="text/javascript" src="script1.js"></script>
	<script type="text/javascript" src="script.js"></script>
	<script type="text/javascript" src="script2.js"></script>

	</body>