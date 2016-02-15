<?php
$res= "apna";
$_SESSION['rname'] = $res.'.json';
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
<link type="image/x-icon" rel="shortcut icon" href="../images/favicon.ico"/>
  <!-- Compiled and minified JavaScript -->
 
   <!-- Site's designed for mobile -->
 <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/> 
</head>
<body ng-app="myApp" ng-init="norder=false;total=0;something='<?php echo $_SESSION['rname'] ?>'">
	<div ng-controller="restaurantController"  class="container">
		<div class="col l4 s4 container">
		<label>Search</label>    <input type="text" ng-model="search.name">
	</div>
		<div ng-repeat="item in items | filter:search" class="container">
			<h3>{{item.name}}</h3>
			<p>category:{{item.category}}</p>
			<p>price:INR {{item.price}} /-</p>
			<br/>
			<input type="number" ng-hide="item.added" placeholder="enter quantity" ng-model="item.quantity" required>
			<button ng-hide="item.added"  ng-click="process(item)">Add</button>
			<button ng-show="item.added" ng-click="rprocess(item)" class="ng-cloak">Remove</button>
		</div>
		<h1>Total:<span ng-model="total">{{total}}</span></h1>
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
