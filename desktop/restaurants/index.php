<?php
$_SESSION['restaurant'] = "apna_dhaba";
?>
<html lang="en-us">
<head>
  <meta charset="utf-8">
<link rel="stylesheet" href="../materialize/css/materialize.min.css">
 <link type="image/x-icon" rel="shortcut icon" href="http://i.imgur.com/xl1WjhW.png"/>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src="../angular/angular.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<title>FoodONZ | Order Food in Vellore</title>
 <meta charset="utf-8"/>
 <meta content="FoodVellore is a great platform for simplicity and Transparency." name="description"/>
<link type="image/x-icon" rel="shortcut icon" href="images/favicon.ico"/>
  <!-- Compiled and minified JavaScript -->
 
   <!-- Site's designed for mobile -->
 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/> 
</head>
<body ng-app="myApp">
	<div ng-controller="restaurantController" ng-init="total=0" clas="container">
		<div class="col l4 s4 container">
		<label>Search</label>    <input type="text" ng-model="search.name">
	</div>
		<div ng-repeat="item in items | filter:search" class="container">
			<h3>{{item.name}}</h3>
			<p>category:{{item.category}}</p>
			<p>price:INR {{item.price}} /-</p>
			<br/>
			<button ng-click="process(item.name,item.price)">Add</button>
		</div>
		<h1>Total:<span ng-model="total">{{total}}</span></h1>
	</div>
	<script src="../angular/app.js"></script>
	<script src="../angular/restaurantController.js"></script>
	<script src="../materialize/js/materialize.min.js"></script>
</body>
</html>
