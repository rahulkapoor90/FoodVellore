<?php
$res= "apna";
session_start();
?>
    <?php
$_SESSION['rest_name'] = $_GET['rest_name'];
$_SESSION['username'] = $_GET['user'];
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
            <title>FoodONZ | Order Food in Vellore</title>
            <meta charset="utf-8" />
            <meta content="FoodVellore is a great platform for simplicity and Transparency." name="description" />
            <link type="image/x-icon" rel="shortcut icon" href="../images/favicon.ico" />
            <!-- Compiled and minified JavaScript -->

            <!-- Site's designed for mobile -->
            <style>
                .form-control {
                    border-color: inherit;
                    -webkit-box-shadow: none;
                    box-shadow: none;
                }
                
                input.form-control:disabled {
                    background-color: white;
                }
                
                input[type=number]::-webkit-inner-spin-button,
                input[type=number]::-webkit-outer-spin-button {
                    -webkit-appearance: none;
                    margin: 0;
                }
            </style>
        </head>

        <body ng-app="myApp" ng-init="norder=false;total=0;something='<?php echo $_SESSION['rname'] ?>'">
            <div ng-controller="restaurantController" class="container">
                <br />
                <input type="text" ng-model="search">
                <div class="panel-group" id="accordion">
                    <div ng-repeat="(key, val) in items" class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#{{key}}">
        {{key}}</a>
      </h4>
                        </div>
                        <div id="{{key}}" class="panel-collapse collapsing">
                            <div ng-repeat="item in val | filter:search">
                                <div class="row">
                                    <div class="col-sm-12 col-lg-3">
                                        <p>{{item.itemname}}</p>
                                    </div>
                                    <div class="col-sm-12 col-lg-3">
                                        <p>{{item.price}}</p>
                                    </div>
                                    <div class="col-sm-6 col-lg-6">
                                        <div class="row">
                                            <div class="col-sm-1">
                                                <a href ng-click="rprocess(item)"><span class="glyphicon glyphicon-minus"></span></a>
                                            </div>
                                            <div class="col-sm-2">
                                                <span id="quantity">0</span>
                                            </div>
                                            <div class="col-sm-1">
                                                <a href ng-click="process(item)"><span class="glyphicon glyphicon-plus"></span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <h1>Total:<span ng-model="total">{{total}}</span></h1>
                <button class="btn btn-primary" ng-show="norder" ng-click="checkout()">Book</button>
            </div>
            <script src="../angular/angular.min.js"></script>

            <script src="../angular/app.js"></script>

            <script src="../angular/restaurantController.js"></script>
            <script>
                $('#accordian').collapse("hide");
            </script>

        </body>

        </html>