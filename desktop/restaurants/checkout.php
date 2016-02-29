<?php
session_start();
?>
    <?php
$jstring = $_SESSION['order'];
$jobj = json_decode($jstring,true);
echo '<h1>Your Orders Are</h1>';
foreach($jobj as $arr){
	echo '<h3>'.$arr['name'].'</h3>';
	echo '<p>Price:'.$arr['price'].'</p>';
	echo '<p>Quantity:'.$arr['quantity'].'</p>';
}
?>
        <html lang="en-us">

        <head>
            <meta charset="utf-8">
            <link type="image/x-icon" rel="shortcut icon" href="http://i.imgur.com/xl1WjhW.png" />
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <script src="../angular/angular.min.js"></script>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
            <title>FoodONZ | Order Food in Vellore</title>
            <meta charset="utf-8" />
            <meta content="FoodVellore is a great platform for simplicity and Transparency." name="description" />
            <link type="image/x-icon" rel="shortcut icon" href="../images/favicon.ico" />
            <!-- Compiled and minified JavaScript -->

            <!-- Site's designed for mobile -->
            <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        </head>

        <body ng-app="myApp" ng-init="disable=false;rest_name='apnadhaba';total='<?php echo $_SESSION['bill'] ?>'">
            <div ng-controller="couponController">
                <p>Bill Amount:{{total}}</p>
                Have a coupon?
                <input type="text" ng-model="coupon" ng-disabled="disable"><span ng-model="status"></span>{{status}}
                <button ng-show="cstatus" ng-click="cprocess()">Apply</button>
                <br />
                <br />
                <center>
                    <button ng-click="payment()">Proceed to Payment</button>
                    <center>
            </div>
            <script src="../angular/app.js"></script>
            <script src="../angular/couponController.js"></script>
        </body>