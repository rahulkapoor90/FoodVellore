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
<html ng-app="events" lang="en-US">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>FoodONZ | Dashboard</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<link href="../stylesheets/dash_style.css" rel="stylesheet">
<link href="../stylesheets/timeline_dash.css" rel="stylesheet">
<link href="../stylesheets/side_bar.css" rel="stylesheet">
<link type="image/x-icon" rel="shortcut icon" href="http://i.imgur.com/xl1WjhW.png"/>
	<link href='http://fonts.googleapis.com/css?family=Lato:400,300' rel='stylesheet' type='text/css'>
	<link href="http://netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
<script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
</head>
<body>
<!--
<div id="dvLoading"></div>
<script>
$(window).load(function(){
  $('#dvLoading').fadeOut(2300);
});
</script>
-->
<div class="container">
<div id="navbar">
  <div id="navwrap">
  <a href="/dashboard"><img src="http://i.imgur.com/PrhpUCC.png" width="160px" height="50px" id="logo_main"></img></a>
    <ul>
     <li><a href="#"><?php echo $name; ?></a></li>
      <li><a href="/foodonz-desktop/settings">Settings</a></li>
      <li><a href="/foodonz-desktop/desktop/logout">Logout</a></li>
    </ul>
  </div>
</div><br><br><br>
<div class="main">
<div class="div_right">
<span class="first"> 
Valley Junction's Menu
</span>
<?php
$string = file_get_contents("./rest_info.json");
$jfo = json_decode($string);
$posts = $jfo->rest_info;
foreach ($posts as $post) {
    echo $post->foodname;
	echo "<br>";
	echo $post->price;
	echo "<br>";
	echo $post->type;
	echo "<br>";
	echo "<br>";
}
?>
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
</body>
</html>