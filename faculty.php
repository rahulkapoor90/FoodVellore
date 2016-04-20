<!DOCTYPE html>
<html lang="en">
<head>
     <!-- Meta Tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Faculty Availability</title>
	
	<!-- External Stylesheets -->
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
	<link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intro.js/2.0.0/introjs.css">
    <!-- Fonts API -->
    <link href='https://fonts.googleapis.com/css?family=Poiret+One' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Tangerine' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>

    <!-- External Javascript -->
	<script src="./angular/angular.min.js"></script>
	<script src="//code.angularjs.org/1.2.28/angular-sanitize.min.js"></script>
    <script src="./angular/app.js"></script>
    <script src="./angular/facultyController.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	<style>
	body{
		padding:20px;
		margin-top:20px;
		background-color: gray;
	}
	.panel .panel-default{
		padding:20px;
	}
	span{
		font-size: 18px;
		font-weight: 600;
        font-family: 'Poiret One', cursive;
        color:black;
	}
	h4{
		font-family: 'Poiret One', cursive;
		color:orange;
	}
	</style>
    </head>
    <body ng-app = "myApp">
    	<div class="container" ng-controller = "facultyController">
    		<div class="panel panel-default col-sm-6 col-xs-12 col-md-6 col-lg-6" ng-repeat = "item in items">
    		<div class="panel-body">
    			<div class="row">
    				<div class="col-lg-6 col-md-6">
    			<img src="./images/profile.jpg">
    		</div>
    		<div class="col-lg-6 col-md-6">
    			<h4><strong>Name:</strong><span>{{item.name}}</span></h4>
    			<h4><strong>School:</strong><span>{{item.school}}</span></h4>
    			<h4><strong>Cabin Details:</strong><span>{{item.block}}-{{item.cabin}}</span></h4>
    			<h4><strong>Email:</strong><span>{{item.email}}</span></h4>
    			<h4><strong>Mobile:</strong><span>{{item.mobile}}</span></h4>
    		</div>
    		</div>
    		</div>
    		</div>
    	</div>
    </body>
    </html>