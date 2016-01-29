<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
<link rel="stylesheet" href="materialize/css/materialize.min.css">

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<title>FoodVellore</title>
<link rel="stylesheet" href="stylesheets/style.css" type="text/css"/>
 <meta charset="utf-8"/>
 <meta content="FoodVellore is a great platform for simplicity and Transparency." name="description"/>
<link type="image/x-icon" rel="shortcut icon" href="images/favicon.ico"/>
  <!-- Compiled and minified JavaScript -->
 
   <!-- Site's designed for mobile -->
 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/> 
</head>
<body>
  <nav>
    <div class="nav-wrapper">
      <a href="#!" class="brand-logo">FoodVellore</a>
  <!--    <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a> -->
  <ul class="right hide-on-med-and-down">
    <li><a href="#!">Home</a></li>
    <li><a href="#!">Contact Us</a></li>
    <li><a href="login/login.php">Login</a></li>
    <li><a href="register/index.php">SignUp</a></li>
    <li><a href="explore/events.html">Explore</a></li>
  </ul>
  <ul id="slide-out" class="side-nav">
    <li><a href="#!">Home</a></li>
    <li><a href="#!">Contact Us</a></li>
    <li><a href="login/login.php">Login</a></li>
    <li><a href="register/index.php">SignUp</a></li>
    <li><a href="explore/events.html">Explore</a></li>
  </ul>
  <a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
</nav>
 <div class="slider">
    <ul class="slides">
      <li>
        <img src="http://lorempixel.com/580/250/nature/1"> <!-- random image -->
        <div class="caption center-align">
          <h3>Meet And Eat!</h3>
          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
        </div>
      </li>
      <li>
        <img src="http://lorempixel.com/580/250/nature/2"> <!-- random image -->
        <div class="caption left-align">
          <h3>Meet And Eat!</h3>
          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
        </div>
      </li>
      <li>
        <img src="http://lorempixel.com/580/250/nature/3"> <!-- random image -->
        <div class="caption right-align">
          <h3>Meet And Eat1</h3>
          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
        </div>
      </li>
      <li>
        <img src="http://lorempixel.com/580/250/nature/4"> <!-- random image -->
        <div class="caption center-align">
          <h3>Meet And Eat!</h3>
          <h5 class="light grey-text text-lighten-3">Here's our small slogan.</h5>
        </div>
      </li>
    </ul>
    </div>
    <footer class="page-footer">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Meet And Eat!</h5>
              <!--  <p class="grey-text text-lighten-4">You can use rows and columns here to organize your footer content.</p> -->
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!">About Us</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Privacy Policy</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Terms And Conditions</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2016 Food Vellore
            <a class="grey-text text-lighten-4 right" href="#!">facebook</a>
            </div>
          </div>
        </footer>
<script src="materialize/js/materialize.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.1/js/materialize.min.js"></script>
<script>
$(document).ready(function(){ 
$('.button-collapse').sideNav({
      menuWidth: 240, // Default is 240
      edge: 'left', // Choose the horizontal origin
      closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
    }
  )});
$(document).ready(function(){
      $('.slider').slider({full_width: true});
    });
        
</script>
</body>
</html>