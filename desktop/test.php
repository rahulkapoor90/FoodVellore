<?php
$user = "root";
$password = "";
$database_name = "foodvellore";
$hostname = "localhost";
$dsn = 'mysql:dbname=' . $database_name . ';host=' . $hostname;
try{
$conn = new PDO($dsn, $user, $password);
array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
	echo "An error occured with the connection";
}
session_start();
if (isset($_SESSION['user_login'])) {
$user = $_SESSION["user_login"];
}
else {
$user = "";
}
if (!isset($_SESSION["user_login"])) {
    echo "<meta http-equiv=\"refresh\" content=\"0; url=../index.php\">";	
}
else
{
}
?>
<?php
$name = $conn->prepare("SELECT name,username FROM users WHERE username=:user");
$name->bindParam(':user', $user);
$name->execute();
$row = $name->fetch();
$name = $row['name'];
$username = $row['username'];

?>
<!DOCTYPE html>
<html>
<head>
<script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<style type="text/css">
@import url(http://fonts.googleapis.com/css?family=Lato:300,400,700);

body, html { 
  font-size: 100%; 
  padding: 0; 
  margin: 0;
}
*,*:after,*:before {
	-webkit-box-sizing: border-box;
	   -moz-box-sizing: border-box;
	        box-sizing: border-box;
}
.clearfix:before,.clearfix:after {
	content: " ";
	display: table;
}
.clearfix:after {	clear: both;}
body {
	font-family: 'Lato', Calibri, Arial, sans-serif;
	background: #fff;
	font-weight: 300;
}
a {
	text-decoration: none;
}
footer {
  margin: 0 auto;
  overflow: hidden;
  padding: 20px 20px 40px;
  position: relative;
  text-align: center;
}
.main,.container > header {
	width: 100%;
	margin: 0 auto;
	padding: 0 1.875em 3.125em 1.875em;
}
.main {
	max-width: 69em;
	min-height: 600px;
	padding: 2em 0 0 0;
}
.side {
	float: right;
	width: 30%;
	padding-right: 20px;
	min-width: 320px;
	box-shadow: 1px 0 rgba(0,0,0,0.1);
}
.main .div_right {
	padding: 0 1em;
	margin: 0;
	float: right;
	width: 70%;
}
.container > header {
	padding: 2.875em 1.875em 2.875em;
	text-align: center;
	background: rgba(0,0,0,0.10);
}
.container > header h1 {
	font-size: 2.625em;
	line-height: 1.3;
	margin: 0;
	color: #fff;
	font-weight: 300;
}
.container > header span {
	display: block;
	font-size: 60%;
	color: rgba(255,255,255,0.7);
	padding: 0 0 0.6em 0.1em;
}
.dr-menu {
	width: 100%;
	max-width: 400px;
	min-width: 300px;
	position: relative;
	font-size: 1.3em;
	line-height: 2.5;
	font-weight: 400;
	color: #673;
	padding-top: 2em;
}
.dr-menu > div  {
	cursor: pointer;
	position: absolute;
	width: 100%;
	z-index: 100;
}
.dr-menu > div .dr-icon {
	top: 0;
	left: 0;
	position: absolute;
	font-size: 150%;
	line-height: 1.6;
	padding: 0 10px;
	-webkit-transition: all 0.2s ease;
	   -moz-transition: all 0.2s ease;
	        transition: all 0.2s ease;
}
.dr-menu.dr-menu-open > div .dr-icon {
	color: #673;
	left: 100%;
	-webkit-transform: translateX(-100%);
	   -moz-transform: translateX(-100%);
	    -ms-transform: translateX(-100%);
	        transform: translateX(-100%);
}
.dr-menu > div .dr-icon:after {
	content: "\f0d9";
	position: absolute;
	font-size: 50%;
	line-height: 3.25;
	left: -10%;
	opacity: 0;
}
.dr-menu.dr-menu-open > div .dr-icon:after {opacity: 1;}
.dr-menu > div .dr-label {
	padding-left: 3em;
	position: relative;
	display: block;
	color: #673;
	font-size: 0.9em;
	font-weight: 700;
	letter-spacing: 1px;
	text-transform: uppercase;
	line-height: 2.75;
	-webkit-transition: all 0.2s ease;
	   -moz-transition: all 0.2s ease;
	        transition: all 0.2s ease;
}
.dr-menu.dr-menu-open > div .dr-label {
	-webkit-transform: translateY(-90%);
	   -moz-transform: translateY(-90%);
	    -ms-transform: translateY(-90%);
	        transform: translateY(-90%);
}
.dr-menu ul {
	padding: 0;
	margin: 0 3em 0 0;
	list-style: none;
	opacity: 0;
	position: relative;
	z-index: 0;
	pointer-events: none;
	-webkit-transition: opacity 0s linear 205ms;
	   -moz-transition: opacity 0s linear 205ms;
	        transition: opacity 0s linear 205ms;
}
.dr-menu.dr-menu-open ul {
	opacity: 1;
	z-index: 200;
	pointer-events: auto;
	-webkit-transition: opacity 0s linear 0s;
	   -moz-transition: opacity 0s linear 0s;
	        transition: opacity 0s linear 0s;
}
.dr-menu ul li {
	display: block;
	margin: 0 0 5px 0;
	opacity: 0;
	-webkit-transition: opacity 0.3s ease;
	   -moz-transition: opacity 0.3s ease;
	        transition: opacity 0.3s ease;
}
.dr-menu.dr-menu-open ul li {opacity: 1;}
.dr-menu.dr-menu-open ul li:nth-child(2) {
	-webkit-transition-delay: 35ms;
	   -moz-transition-delay: 35ms;
	        transition-delay: 35ms;
}
.dr-menu.dr-menu-open ul li:nth-child(3) {
	-webkit-transition-delay: 70ms;
	   -moz-transition-delay: 70ms;
	        transition-delay: 70ms;
}
.dr-menu.dr-menu-open ul li:nth-child(4) {
	-webkit-transition-delay: 105ms;
	   -moz-transition-delay: 105ms;
	        transition-delay: 105ms;
}
.dr-menu.dr-menu-open ul li:nth-child(5) {
	-webkit-transition-delay: 140ms;
	   -moz-transition-delay: 140ms;
	        transition-delay: 140ms;
}
.dr-menu.dr-menu-open ul li:nth-child(6) {
	-webkit-transition-delay: 175ms;
	   -moz-transition-delay: 175ms;
	        transition-delay: 175ms;
}
.dr-menu.dr-menu-open ul li:nth-child(7) {
	-webkit-transition-delay: 205ms;
	   -moz-transition-delay: 205ms;
	        transition-delay: 205ms;
}
.dr-menu ul li a {
	display: inline-block;
	padding: 0 20px;
	color: #673;
}
.dr-menu ul li a:hover {color: #673;}
.dr-icon:before, .dr-icon:after {
	position: relative;
	font-family: 'FontAwesome';
	speak: none;
	font-style: normal;
	font-weight: normal;
	font-variant: normal;
	text-transform: none;
	-webkit-font-smoothing: antialiased;
}
.dr-menu ul .dr-icon:before {margin-right: 15px;}
.dr-icon-bullhorn:before {content: "\f234";}
.dr-icon-camera:before {content: "\f03d";}
.dr-icon-heart:before {content: "\f08a";}
.dr-icon-settings:before {content: "\f1de";}
.dr-icon-switch:before {content: "\f011";}
.dr-icon-download:before {content: "\f019";}
.dr-icon-user:before {content: "\f007";}
.dr-icon-menu:before {content: "\f0c9";}
@media screen and (max-width: 66.9375em) {
	.side, .main p {
		float: none;
		width: 100%;
		box-shadow: none;
		padding: 1em;
	}
	.main p {font-size: 130%;}
}
@import url('http://fonts.googleapis.com/css?family=Quicksand');
#navbar{
  background-color:#E87E28;
  height:65px;
  width:100%;
  top:0;left:0;right:0;
  position:fixed;
  border-bottom:#CE6C1B 5px solid;
  font-family:'Quicksand', sans-serif;
  color:#fff;
 -webkit-box-shadow: inset 0px -4px 13px 0px rgba rgb(237,140,28);
  -moz-box-shadow:    inset 0px -4px 13px 0px rgb(237,140,28);
  box-shadow:         inset 0px -4px 13px 0px rgb(237,140,28);
  z-index:999;
}
#navbar a{
  color:#fff;
  text-decoration:none;
}
#navbar ul{
  list-style-type:none;
  float:left;
  padding:0;
  margin:0;
  margin-left:5px;
}
#navbar ul li{
  display:inline-block;
  padding-top:5px;
  font-size:16px;
  padding-left:10px;
  padding-right:8px;
}
#navbar li ul{
  display:none;
  background-color:#ED8C1C;
  border:#111 1px solid;
  position:absolute;
  padding-right:25px;
  z-index:9991;
}
#navbar li:hover ul{
  display:block;
}
#navbar li ul li{
  display:block;
  margin-top:-6px;
  margin-left:-30px;
  padding:7px;
  font-size:16px;
}
#navwrap{
  margin-top:16px;
}
.element_avatar.tiny img{
  width:24px;
  height:24px;
}
#enjin-bar .right{
  position:fixed;
  font-size: 24px;
  font-family: 'Quicksand', sans-serif;
  top: 30px;
  z-index:99999;
}
#logo_main {
	margin-top: -14px;
	float:left;
	margin-left:5px;
}
* {
  box-sizing: border-box;
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
}

.bubble {
  width: 100%;
  padding: .5em 1em;
  line-height: 1.4em;
  padding: 40px;
  background-color: #ecf0f1;
  position: relative;
  -webkit-border-radius: 8px;
  -moz-border-radius: 8px;
  -ms-border-radius: 8px;
  -o-border-radius: 8px;
  border-radius: 8px;
  text-align: left;
  display: inline-block; }
  .bubble:hover > .over-bubble {
    opacity: 1; }
	
#hover_link {
	text-decoration:none;
}
.bubble-container {
  width: 75%;
  display: block;
  position: relative;
  padding-left: 20px;
  vertical-align: top;
  display: inline-block; }

.arrow {
  content: '';
  display: block;
  position: absolute;
  left: 12px;
  bottom: 25%;
  height: 0;
  width: 0;
  border-top: 20px solid transparent;
  border-bottom: 20px solid transparent;
  border-right: 20px solid #ecf0f1; }

.timeline {
  width: 100%;
  display: block;
  margin: auto;
  background-color: #dde1e2;
  padding-bottom: 2em;
  -webkit-box-shadow: #bdc3c7 0 5px 5px;
  -moz-box-shadow: #bdc3c7 0 5px 5px;
  box-shadow: #bdc3c7 0 5px 5px;
  -moz-border-radius-bottomleft: 8px;
  -webkit-border-bottom-left-radius: 8px;
  border-bottom-left-radius: 8px;
  -moz-border-radius-bottomright: 8px;
  -webkit-border-bottom-right-radius: 8px;
  border-bottom-right-radius: 8px;
  margin-bottom: 2em; }
  .first {
  width: 100%;
  display: block;
  margin: auto;
  background-color: #3498db;
  text-shadow: #2084c7 1px 1px 0;
  padding: 1em 0 !important;
  color: white;
  text-align: center;
  margin-top: 1em;
  font-family: "Lato";
  font-size: 1.6em;
  -moz-border-radius-topleft: 8px;
  -webkit-border-top-left-radius: 8px;
  border-top-left-radius: 8px;
  -moz-border-radius-topright: 8px;
  -webkit-border-top-right-radius: 8px;
  border-top-right-radius: 8px;
  position: relative; }
  .timeline li {
    padding: 1em 0; }
  .timeline li:nth-child(even) {
    background-color: #d3d7d8; }

.avatar {
  width: 18%;
  display: inline-block;
  vertical-align: top;
  position: relative;
  overflow: hidden;
  margin-top: 1%;
  margin-left: 2%; }
  .avatar img {
    width: 100%;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    -ms-border-radius: 50%;
    -o-border-radius: 50%;
    border-radius: 50%;
	height: 150px;
    border: 5px solid #ecf0f1;
    position: relative; }
  .avatar:hover > .hover {
    cursor: pointer;
    opacity: 1; }

.hover {
  position: absolute;
  width: 100%;
  height: 100%;
  background-color: #3498db;
  top: 0;
  font-size: 1.8em;
  border: 5px solid #5cc0ff;
  -webkit-border-radius: 50%;
  -moz-border-radius: 50%;
  -ms-border-radius: 50%;
  -o-border-radius: 50%;
  border-radius: 50%;
  text-align: center;
  color: white;
  padding-top: 24%;
  opacity: 0;
  font-family: 'FontAwesome';
  font-weight: 300;
  -webkit-transition-property: all;
  -moz-transition-property: all;
  -o-transition-property: all;
  transition-property: all;
  -webkit-transition-duration: 0.5s;
  -moz-transition-duration: 0.5s;
  -o-transition-duration: 0.5s;
  transition-duration: 0.5s;
  -webkit-transition-timing-function: ease;
  -moz-transition-timing-function: ease;
  -o-transition-timing-function: ease;
  transition-timing-function: ease; }

.icon-twitter {
  font-size: 1.5em; }

.new {
  position: absolute;
  right: 5%; }

.over-bubble {
  line-height: 1.4em;
  padding-top: 10%;
  background-color: rgba(236, 240, 241, 0.8);
  position: relative;
  -webkit-border-radius: 8px;
  -moz-border-radius: 8px;
  -ms-border-radius: 8px;
  -o-border-radius: 8px;
  border-radius: 8px;
  text-align: center;
  display: inline-block;
  position: absolute !important;
  height: 100%;
  width: 100%;
  opacity: 0;
  top: 0;
  left: 0;
  z-index: 999;
  -webkit-transition-property: all;
  -moz-transition-property: all;
  -o-transition-property: all;
  transition-property: all;
  -webkit-transition-duration: 0.3s;
  -moz-transition-duration: 0.3s;
  -o-transition-duration: 0.3s;
  transition-duration: 0.3s;
  -webkit-transition-timing-function: ease-in;
  -moz-transition-timing-function: ease-in;
  -o-transition-timing-function: ease-in;
  transition-timing-function: ease-in;
  font-size: 2.8em;
  text-shadow: white 1px 1px 0; }


.icon-star {
  -webkit-transition-property: all;
  -moz-transition-property: all;
  -o-transition-property: all;
  transition-property: all;
  -webkit-transition-duration: 0.2s;
  -moz-transition-duration: 0.2s;
  -o-transition-duration: 0.2s;
  transition-duration: 0.2s;
  -webkit-transition-timing-function: ease;
  -moz-transition-timing-function: ease;
  -o-transition-timing-function: ease;
  transition-timing-function: ease; }
  .icon-star:hover {
    cursor: pointer;
    color: #f39c12; }


h3 {
  font-size: 1.2em;
  font-weight: bold;
  font-family: 'Lato';
  display: inline-block;
  margin-top: -14px;
  margin-bottom: .2em;
  color: #95a5a6; }

</style>
</head>
<div class="container">
<div id="navbar">
  <div id="navwrap">
  <a href="/dashboard"><img src="http://i.imgur.com/PrhpUCC.png" width="160px" height="50px" id="logo_main"></img></a>
    <ul>
     <!--<li><a href="#"><?php echo $name; ?></a></li>
      <li><a href="/foodonz-desktop/settings">Settings</a></li>
      <li><a href="/foodonz-desktop/desktop/logout">Logout</a></li>-->
    </ul>
  </div>
</div><br><br><br>
			  <div class="main">
				    <div class="div_right">
					<span class="first"> 
Restaurant's in Vellore
</span>
<ul class="timeline">
<li>
<div class="avatar">
<img src="https://irs3.4sqi.net/img/general/width960/40263607_5vbrHX57X45AJIi4qjICQOLpxp3RC7EbPw-Gpdxls6Q.jpg" alt="Tom's Diner" title="Tom's Diner">
</div>
<div class="bubble-container">
<div class="bubble">
<h3>Tom's Diner</h3><br/>
American diner setting with mostly continental food. Some items on the menu are amazing, others are just there to fill up the page. Located right in front of the main gate in the lane which has aunty mess & apna dhaba.
<div class="over-bubble">
<a id="hover_link" href="/foodonz-desktop/desktop/logout"><div class="icon-star"></div></a>
</div>
</div>
<div class="arrow"></div>
</div>
</li>
</ul>
					
					</div>
				    <div class="side">
					      <nav class="dr-menu dr-menu-open">
						        <div class="dr-trigger">
          <a class="dr-label">Account</a>
        </div>
						        <ul>
							          <li><a class="dr-icon dr-icon-user" href="#"><?php echo $name; ?></a></li>
							          <li><a class="dr-icon dr-icon-heart" href="/foodonz-desktop/desktop/favorites">Favorites</a></li>
							          <li><a class="dr-icon dr-icon-bullhorn" href="/foodonz-desktop/desktop/share">Coupons</a></li>
							          <li><a class="dr-icon dr-icon-settings" href="/foodonz-desktop/desktop/settings">Settings</a></li>
							          <li><a class="dr-icon dr-icon-switch" href="/foodonz-desktop/desktop/logout">Logout</a></li>
						        </ul>
					      </nav>
				    </div>
			  </div>
		</div>
<footer>
  
</footer>