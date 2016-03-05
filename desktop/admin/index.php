<?php
session_start();
$_SESSION['admin_name']=$_GET['rest_name'];
?>
    <html lang="en-us">

    <head>
        <meta charset="utf-8">
        <link type="image/x-icon" rel="shortcut icon" href="http://i.imgur.com/xl1WjhW.png" />
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <title>FoodONZ | Order Food in Vellore</title>
        <meta charset="utf-8" />
        <meta content="FoodVellore is a great platform for simplicity and Transparency." name="description" />
        <link type="image/x-icon" rel="shortcut icon" href="../images/favicon.ico" />
    </head>

    <body ng-app="myApp" ng-init="something='<?php echo $_SESSION['admin_name'] ?>'">
        <div ng-controller="adminController" class="container">
            <br />
            <div class="panel-group" id="accordion">
                <div ng-repeat="user in items" class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#{{user.order_no}}">
        {{user.order_no}}</a>
      </h4>
                    </div>
                    <div id="{{user.order_no}}" class="panel-collapse collapsing">
                        <div class="row">
                            <div class="col-sm-12 col-lg-3">
                                <p>{{user.time}}</p>
                            </div>
                            <div class="col-sm-12 col-lg-3">
                                <p>{{user.order_no}}</p>
                            </div>
                            <div class="col-sm-12 col-lg-3">
                                <p>{{user.username}}</p>
                            </div>
                            <div ng-if="user.username=='rohit'" class="col-sm-12 col-lg-3">
                                <p>{{user.username}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="../angular/angular.min.js"></script>

        <script src="../angular/app.js"></script>

        <script src="../angular/adminController.js"></script>
    </body>