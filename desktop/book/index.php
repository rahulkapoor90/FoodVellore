<?php
$user = "root";
$res_jname = $_GET['u'];
$_SESSION['rname'] = $res_jname+'.json';
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
<html lang="en-US">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>FoodONZ | Dashboard</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<link href="../stylesheets/dash_style.css" rel="stylesheet">
<link href="../stylesheets/timeline_dash.css" rel="stylesheet">
<link href="../stylesheets/side_bar.css" rel="stylesheet">
<link rel="stylesheet" href="../materialize/css/materialize.min.css">
<link type="image/x-icon" rel="shortcut icon" href="http://i.imgur.com/xl1WjhW.png"/>
	<link href='http://fonts.googleapis.com/css?family=Lato:400,300' rel='stylesheet' type='text/css'>
	<link href="http://netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>
<script src="../angular/angular.min.js"></script>
<script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
</head>
<body ng-app="myApp" ng-init="norder=false;total=0;something='<?php echo $_SESSION['rname'] ?>'">
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
<!--
<div id="dvLoading"></div>
<script>
$(window).load(function(){
  $('#dvLoading').fadeOut(2300);
});
</script>
-->
<div ng-controller="restaurantController"  class="main">
  <div class="div_right">
    <span class="first"> 
Valley Junction's Menu
</span>
    <div class="col l4 s4 container">
    <label>Search</label>    <input type="text" ng-model="search.name">
  </div>
    <div ng-repeat="item in items | filter:search" class="container">
      <h3>{{item.foodname}}</h3>
      <p>category:{{item.type}}</p>
      <p>price:INR {{item.price}} /-</p>
      <br/>
      <input type="number" ng-hide="item.added" placeholder="enter quantity" ng-model="item.quantity" required>
      <button ng-hide="item.added"  ng-click="process(item)">Add</button>
      <button ng-show="item.added" ng-click="rprocess(item)" class="ng-cloak">Remove</button>
    </div>
    <h1>Total:<span ng-model="total">{{something}}</span></h1>
    <button data-target="modal1" class="btn modal-trigger">Your Orders</button>
    <div id="modal1" class="modal bottom-sheet">
        <div class="modal-content">
          <h1 ng-show="norder">Your have ordered</h1>
          <p ng-hide="norder">You have not ordered anything</p>
    <div class="container" ng-repeat="order in orders">
      <h3>{{order.name}}</h3>
      <p>Price:{{order.price}}</p>
      <p>Quantity:{{order.quantity}}</p>
    </div>
    <h3 ng-show="norder">Bill Amount:{{total}}</h3>
  </div>
</div>
        <button class="btn waves-light" ng-show="norder" ng-click="checkout()">Book</button>
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
<footer>
  
</footer>
<script src="../angular/app.js"></script>
  <script src="../angular/restaurantController.js"></script>
  <script src="../materialize/js/materialize.min.js"></script>
  <script>
  $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
  });
  </script>
</body>
</html>