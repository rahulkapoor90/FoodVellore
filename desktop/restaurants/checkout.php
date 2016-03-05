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
            <title>FoodONZ | Order Food in Vellore</title>
            <meta charset="utf-8" />
            <meta content="FoodVellore is a great platform for simplicity and Transparency." name="description" />
            <link type="image/x-icon" rel="shortcut icon" href="../images/favicon.ico" />
            <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
            <link rel="stylesheet" href="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/a549aa8780dbda16f6cff545aeabc3d71073911e/build/css/bootstrap-datetimepicker.css">
            <!-- jQuery library -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
            <script src="moment.min.js"></script>
            <!-- Latest compiled JavaScript -->
            <script src="../angular/angular.min.js"></script>
            <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
            <script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/a549aa8780dbda16f6cff545aeabc3d71073911e/src/js/bootstrap-datetimepicker.js"></script>
            <!-- Compiled and minified JavaScript -->

            <!-- Site's designed for mobile -->
            <script src="../angular/app.js"></script>
            <script src="../angular/couponController.js"></script>
            <script type="text/javascript">
                $(function () {
                    $('#datetimepicker3').datetimepicker({
                        format: 'LT',
                        enabledHours: [9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20]
                    });
                });
            </script>

        </head>

        <body>
            <div ng-app="myApp" ng-init="disable=false;rest_name='apnadhaba';total='<?php echo $_SESSION['bill'] ?>'" ng-controller="couponController">
                <p>Bill Amount:{{total}}</p>
                Have a coupon?
                <input type="text" ng-model="coupon" ng-disabled="disable"><span ng-model="status"></span>{{status}}
                <button ng-show="cstatus" ng-click="cprocess()">Apply</button>
                <br />
                <br />
            </div>
            <form name="time_picker" method="post" action="order_store.php">
                <div class="form-group">
                    <div class='input-group date' id='datetimepicker3'>
                        <input type='text' class="form-control" name="time" required/>
                        <span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                        </span>
                    </div>
                </div>
                <center>
                    <button type="submit" name="submit">Proceed to payment</button>
                </center>
            </form>

        </body>