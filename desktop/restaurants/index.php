<?php
$res= "apna";
$_SESSION['rname'] = $res.'.json';
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
        <script src="../angular/angular.min.js"></script>
        <title>FoodONZ | Order Food in Vellore</title>
        <meta charset="utf-8" />
        <meta content="FoodVellore is a great platform for simplicity and Transparency." name="description" />
        <link type="image/x-icon" rel="shortcut icon" href="../images/favicon.ico" />
        <!-- Compiled and minified JavaScript -->

        <!-- Site's designed for mobile -->

    </head>

    <body ng-app="myApp" ng-init="norder=false;total=0;something='<?php echo $_SESSION['rname'] ?>'">
        <div ng-controller="restaurantController" class="container">
            <div class="col-lg-12 col-sm-12 container">
                <label>Search</label>
                <input type="text" ng-model="search.name">
            </div>
            <br />
            <div class="panel-group" id="accordion">
                <div ng-repeat="user in items" class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#{{user.type}}">
        {{user.type}}</a>
      </h4>
                    </div>
                    <div id="{{user.type}}" class="panel-collapse collapse in">
                        <div ng-repeat="item in user.options">
                            <div class="row">
                                <div class="col-sm-12 col-lg-3">
                                    <p>{{item.name}}</p>
                                </div>
                                <div class="col-sm-12 col-lg-3">
                                    <p>{{item.price}}</p>
                                </div>
                                <div class="col-sm-12 col-lg-3">
                                    <input type="number" ng-hide="item.added" placeholder="enter quantity" ng-model="item.quantity" required>
                                </div>
                                <div class="col-sm-12 col-lg-3">
                                    <button ng-hide="item.added" ng-click="process(item)">Add</button>
                                    <button ng-show="item.added" ng-click="rprocess(item)" class="ng-cloak">Remove</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
            <button class="btn btn-primary" ng-show="norder" ng-click="checkout()">Book</button>
        </div>
        <script src="../angular/app.js"></script>
        <script src="../angular/restaurantController.js"></script>

    </body>

    </html>