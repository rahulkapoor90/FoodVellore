<?php 
require('./connect.php'); 
require('./header.php');
?>
<?php
if (!isset($_SESSION["user_login"])) {
	header('location:./index.php');
}
else
{
}
?>
<?php
$res_name = $_GET['rest_name'];
$_SESSION['resname'] = $_GET['name'];
$_SESSION['rest_name'] = $res_name;
$_SESSION['rname'] = './njson/'.$res_name.'.json';
$_SESSION['coupon'] = "removed";
$name = $conn->prepare("SELECT name FROM users WHERE username=:user");
$name->bindParam(':user', $user);
$name->execute();
 while($row = $name->fetch()) {
             $name1 = $row["name"];
        }
?>
<link href="./stylesheets/menu_style.css" rel="stylesheet">
<style>
.menu-order{
	background-color: #f5f5f5;
}
.menu-container h1{
    background: #f0f0f0;
    color: #2d2d2d;
    padding: 10px 15px;
    border-bottom: 1px solid #fff;
    font-weight: 400;
}
.panel-title{
	font-size: 15px;
	font-weight:bold;
	color: #2d2d2d;
}
.3dapply {
  border-radius: 5px;
  padding: 15px 25px;
  font-size: 22px;
  font-weight:bold;
  text-decoration: none;
  color: #fff !important;
  position: relative;
}

.3dapply:active {
  transform: translate(0px, 5px);
  -webkit-transform: translate(0px, 5px);
  box-shadow: 0px 1px 0px 0px;
}
.green {
  background-color: #2ecc71;
  color:#fff !important;
  font-weight:bold;
  box-shadow: 0px 5px 0px 0px #27ae60;
}
input, button{
    margin:0;
}

.green:hover {
  background-color: #2ecc71;
}
.cart-card{
    background: #fbfafa;
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
    padding: 1em;
}
.cart-card h1 {
    margin-top: 0;
    margin-bottom: 3px;
    font-size: 1.25em;
    text-transform: uppercase;
}
.card-display{
border: 1px solid #CCCCCC;
	border-radius: 3px;
}
.coupons{
	margin-left:10px;
	margin-bottom:10px;
}
.final-total {
    color: #69bb27;
    font-weight: bold;
	    border-bottom: 1px solid #f6f6f6;
    background-color: #fbfafa;
    padding: .5em 1em;
}
.panel-heading .accordion-toggle h4:after {
    /* symbol for "opening" panels */
    font-family: 'Glyphicons Halflings';  
    content: "\e114";    
    float: right;        
    color: black;        
    overflow: no-display;
}
.panel-heading .accordion-toggle.collapse h4:after {
    /* symbol for "collapsed" panels */
    content: "\e080";    
}
a.accordion-toggle{
    text-decoration: none;
}
#search-form {
    width: 60%;
    padding: 11px 0 12px 1em;
    color: #333;
    outline: none;
}
.glyphicon.spinning {
    animation: spin 1s infinite linear;
    -webkit-animation: spin2 1s infinite linear;
}
@keyframes spin {
    from {
        transform: scale(1) rotate(0deg);
    }
    to {
        transform: scale(1) rotate(360deg);
    }
}
@-webkit-keyframes spin2 {
    from {
        -webkit-transform: rotate(0deg);
    }
    to {
        -webkit-transform: rotate(360deg);
    }
}
@media only screen and (max-width: 479px) {
   #search-form{
width:100% !important;
font-size: 14px !important;
}
.main-container{
padding-left: 0px !important;
padding-right: 0px !important;
}
.flex-big{
padding: 20px !important;
}
.btn-success{display: none !important;}
.em-hamburger{display: none !important;}
.mobile-img{display: none; !important;}
.food-title{display: none; !important;}
.card-display{display: none; !important;}
.desktop-btn{display: none; !important;}
.main-food{
font-size:18px !important;
padding: 10px 7px !important;
font-weight: bold !important;
}
.sosyal{margin-right: 25px !important;}
.coupon-input{width:100% !important;}

.mobile-p{font-size:16px !important; }
.mobile-price{font-weight: bold !important; }
.mobile-no{font-size: 28px !important;}
.fa-minus-circle{font-size:34px !important; }
.fa-plus-circle{font-size:34px !important; }
.item-namemobile{font-size:1.15em !important;}
.have-coupon{font-size:12px !important;}
.table{font-size:14px !important; }
.modal-title{font-size:25px !important; }
.footer-bar{font-size:14px !important; }
.mobile-final{margin-top: 20px !important; }
.checkout-btn{width:100% !important;}
.coupons{font-size:15px !important;}
.footer-mobile{
font-size: 16px !important;
color: #fff !important;
}
}
@media only screen and (min-width: 479px) {
   .mobile-btn{ display: none !important; }
}

</style>
        <div id="product-list">
            <div class="container main-container">

                <div class="flex-container" ng-app="myApp" ng-init="buy_items=0;norder=false;ptotal=0;total=0;something='<?php echo $_SESSION['rname'] ?>';user='<?php echo $_SESSION['user_login'] ?>';rest_name='<?php echo $_SESSION['rest_name'] ?>';resname='<?php echo $_SESSION['resname'] ?>';">
                    <div class="flex-big" ng-controller="restaurantController">
                        <input id='search-form' ng-model="search.itemname" name='q' placeholder='Search food item' autocomplete="off" type='text'/>

                        <div class="row">
<title>{{resname}} Menu</title>
						<div class="container">
						<div class="row">
						<div class="col-lg-8 col-sm-12">
						<div class="menu-container" ng-cloak>
<h1 style="font-size:26px;" class="main-food" data-step="3" data-intro="Finally, proceeed to checkout by clicking on right side button when you add some item."><i class="em em-hamburger"></i> Food Menu for<span style="color:orange"> "{{resname}}"</span></h1>
<p style="font-size:14px;color:#333;font-weight:bold;">Your food is waiting for you..let's begin.
<a class="btn btn-large btn-success" href="javascript:void(0);" onclick="javascript:introJs().start();">Show me how to order</a></p>
</div>
</div>
<div class="col-lg-4 col-sm-12 final-pay" data-step="2" data-intro="This shows your total account bill." ng-cloak>
<h3 ng-cloak>Bill Amount:<span style="color:green;"> <i class="fa fa-inr"></i> {{ptotal}}</span></h3>
<h4 style="font-size:15px;" ng-show="norder ==0"><i class="em em-anguished"></i> Aren't you hungry?</h4>
<h4 style="font-size:17px;" ng-show="norder"><i class="em em-smiley"></i> Ohhh..Nice, we're happy to serve you.</h4>
<button class="btn btn-primary checkout-btn desktop-btn" ng-show="norder" ng-click="checkout()" style="font-size:16px;"><span ng-show="proceed_button == 'Proceeding'"><i class="glyphicon glyphicon-refresh spinning"></i></span> {{proceed_button}}</button>
<button class="btn btn-primary checkout-btn mobile-btn" ng-show="norder" data-toggle="modal" data-target="#cart-modal" style="font-size:16px;">Show my cart</button>
</div>

</div>
</div>

            <br />
			<a ng-cloak href="#top-bar" data-toggle="modal"  ng-show="norder" data-target="#cart-modal"><div id="cart"><span class="badge">{{buy_items}}</span> <br>

            <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
            </div></a>
					<div class="modal fade" id="cart-modal" tabindex="-1" role="dialog" aria-labelledby="signup-modal-label" aria-hidden="true">
            <div  class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h2 class="modal-title" id="signup-modal-label final-msg"><?php echo $name1; ?>, Your final orders are:</h2>
                    </div>
                    <div class="modal-body">
					<table ng-show="norder" class="table">
						<tr>
						<th class="menu-item">Item Name</th>
						<th>Price</th>
						<th colspan="3">Quantity</th>
						</tr>
						<tr ng-repeat="order in orders">
						<td>{{order.itemname}}</td>
						<td><i class="fa fa-inr"></i> {{order.price}}</td>
						<td>{{order.quantity}}</td>
						</tr>
						</table>

						<h3 ng-show="norder">Bill Amount:<span style="color:green;"> <i class="fa fa-inr"></i> {{ptotal}}</span></h3>
<div class="coupons">
            <p ng-show="norder" style="font-weight:bold;" class="have-coupon">Have a coupon? (<a href="#offer" data-toggle="modal" data-dismiss="modal" data-target="#offers-modal"> See my coupons </a>)</p>
                <input type="text" style="text-transform:uppercase; font-weight:bold;" class="coupon-input" ng-model="coupon" ng-show="norder" ng-keyup="callOnEnter($event)" ng-disabled="disable"><p ng-model="status"></p>{{status}}
                <button ng-show="cstatus" class="btn 3dapply green" ng-click="cprocess()"><span ng-show="applyText == 'Applying'"><i class="glyphicon glyphicon-refresh spinning"></i></span>{{applyText}}</button>
				<button ng-show="csuccess" class="btn 3dapply green" ng-click="delete_coupon()">Remove</button>
				</div>

						<button class="btn btn-primary checkout-btn" ng-show="norder" ng-click="checkout()" style="font-size:16px;"><span ng-show="proceed_button == 'Proceeding'"><i class="glyphicon glyphicon-refresh spinning"></i></span> {{proceed_button}}</button>
                    </div>

                </div>
            </div>
        </div>
		<div class="row inside-menu">
		
		<div class="col-lg-8 col-sm-12 ng-cloak">
            <div class="panel-group" id="accordion" data-step="1" data-intro="Click on these categories to start your order.">
                <div ng-repeat="key in notSorted(items) track by $index" class="panel panel-default menu-panel" ng-init="value = items[key]" style="margin-bottom:10px;">
				                <a class="accordian-toggle" data-toggle="collapse" data-parent="#accordion" id="menu-link" href="#{{key}}" >

                <div class="panel-heading panel-types">
                        <h4 class="panel-title">
						{{key|removeUnderscores}}
                                                <span><i class="fa fa-chevron-down pull-right"></i>     </span>
						
      </h4>
               </a>
</div>
                    <div id="{{key}}" style="transistion:height 0.6cm;" class="panel-collapse collapsing menu-items">
					<div class="row menu-buy food-title">
					<div class="col-sm-4 col-lg-5">
					<h2 style="font-size:15px; font-weight:bold; class=">Item Name</h2>
					</div>
					<div class="col-sm-4 col-lg-3">
					<h2 style="font-size:15px; font-weight:bold;">Price</h2>
					</div>
					<div class="col-sm-4 col-lg-4">
					<h2 style="font-size:15px; font-weight:bold;">Quantity</h2>
					</div>
					</div>
                        <div ng-repeat="item in value | filter:search">
                            <div class="row menu-buy">
                                <div class="col-sm-4 col-lg-5">
                                    <p class="item-name">
									<span ng-if="item.itemtype=='veg'" class="hidden-sm  fa-stack fa-lg text-success" title="Veg"> <i class="fa fa-square-o fa-stack-2x"></i> <i class="fa fa-circle fa-stack-1x"></i> </span>
									<span ng-if="item.itemtype=='nonveg'" class="hidden-sm fa-stack fa-lg text-danger" title="Non Veg"> <i class="fa fa-square-o fa-stack-2x"></i> <i class="fa fa-circle fa-stack-1x"></i></span>
									<p class="item-namemobile">{{item.itemname}}</p>
									</p>
                                </div>
                                <div class="col-sm-4 col-lg-3">
                                    <p class="mobile-price"><i class="fa fa-inr"></i> {{item.price}}</p>
                                </div>
                                <div class="col-sm-4 col-lg-4">
                                       
                                            <a href ng-click="rprocess(item)" id="menu-icon"><i class="fa fa-minus-circle" style="font-size:22px;"></i></a>
                                     
                              <span class="mobile-no" ng-bind-html="item.quantity|| 0" style="font-size:20px;"></span>
                                       
                                            <a href ng-click="process(item)" id="menu-icon"><i class="fa fa-plus-circle" style="font-size:22px;"></i></a>
                                     
                                 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

			</div>
			</div>
			<div ng-show="norder == 0" class="col-lg-4 col-sm-12">
			<img class="mobile-img" src="http://mhs.github.io/scout-app/images/webelo.png" height="400px">
			</div>
			<div ng-show="norder" class="col-lg-4 col-sm-12 ng-cloak">
			<div class="card-display">
			<div ng-show="norder" class="cart-card">
        <h1>Your Cart</h1>
    </div>
			<table ng-show="norder" class="table">
						<tr>
						<th class="menu-item">Item Name</th>
						<th>Price</th>
						<th colspan="3">Quantity</th>
						</tr>
						<tr ng-repeat="order in orders">
						<td>{{order.itemname}}</td>
						<td><i class="fa fa-inr"></i> {{order.price}}</td>
						<td>{{order.quantity}}</td>
						</tr>
						</table>
						<div ng-show="norder" class="final-total">
            <h5 style="text-align:right; font-weight:bold;">Grand Total&nbsp;: <i class="fa fa-inr"></i> {{total}}
            </h5>
            <h5 ng-show="csuccess" style="text-align:right; font-weight:bold;">Your Cashback: <i class="fa fa-inr"></i> {{cashback}}
            </h5>
            <h6 ng-show="maxcash" style="font-weight:bold;color:red;font-size:15px;">Note:(Maximum cashback is {{cashback}})</h6>
            <h5 ng-show="csuccess" style="text-align:right; font-weight:bold;">Amount to be paid: <i class="fa fa-inr"></i> {{ptotal}}
            </h5>
        </div>
						<div class="coupons">
            <p ng-show="norder" style="font-weight:bold;">Have a coupon? (<a href="#offer" data-toggle="modal" data-target="#offers-modal"> See my coupons </a>)</p>
                <input type="text" style="text-transform:uppercase; font-weight:bold;" ng-model="coupon" ng-show="norder" ng-keyup="callOnEnter($event)" ng-disabled="disable"><p ng-model="status"></p>{{status}}
                <button ng-show="cstatus" class="btn 3dapply green" ng-click="cprocess()"><span ng-show="applyText == 'Applying'"><i class="glyphicon glyphicon-refresh spinning"></i></span>{{applyText}}</button>
				<button ng-show="csuccess" class="btn 3dapply green" ng-click="delete_coupon()">Remove</button>
				</div>
				
					</div>
					</div>
					</div>
					</div>
                </div>
				</div>
            </div>
        </div>
        <script>
        myApp.controller('restaurantController', ['$scope', '$http', function ($scope, $http) {
    $http.get($scope.something).success(function (data) {
        $scope.items = data;
    }).error(function (data) {
        console.log(data);
    });
    $scope.applyText = "Apply";
    $scope.proceed_button = "Proceed to Checkout";
    $scope.orders = [];
    $scope.norder = false;
    var coupon_check = 0;
    $scope.maxcash = false;
    $scope.cashback = 0;
    $scope.disable = false;
    $scope.csuccess = false;
    var reduced_amount = 0;
    var discount = 0;
    var min_bill_amt="";
       $scope.callOnEnter = function ($event) {
        if ($event.keyCode === 13) {
            $scope.cprocess();
        }
    }

    
    $scope.process = function (item) {
        if($scope.cstatus==false){
            $scope.delete_coupon();
            $scope.status = " ";
        }
         $scope.status = " ";
        if (isNaN(item.quantity)) {
            item.quantity = 1;
        } else {
            item.quantity = item.quantity + 1;
        }
        $scope.norder = true;
        $scope.cstatus=true;
        $scope.total = parseInt($scope.total) + parseInt(item.price);
        $scope.ptotal = $scope.total;
        item.added = true;
        if (item.quantity > 1) {
            for (var i = 0; i < $scope.orders.length; i++) {
                if (($scope.orders[i].itemname) === (item.itemname)) {
                    ($scope.orders).splice(i, 1);
                    break;
                }
            }
        }
        if(item.quantity==1){
            $scope.buy_items = $scope.buy_items + 1;
        }
        var curItem = {};
        curItem.itemname = item.itemname;
        curItem.price = item.quantity * parseInt(item.price);
        curItem.quantity = item.quantity;
        $scope.orders.push(curItem);
        console.log($scope.orders);

    }
    $scope.notSorted = function (obj) {
        if (!obj) {
            return [];
        }
        return Object.keys(obj);
    }
    $scope.rprocess = function (item) {
         if($scope.cstatus==false){
            $scope.delete_coupon();
            $scope.status = " ";
        }
 $scope.status = " ";
        if (isNaN(item.quantity) || item.quantity == 0) {
            item.quantity = 0;
        } else {
            if ($scope.total != 0 && item.quantity != 0) {
                $scope.total = parseInt($scope.total) - parseInt(item.price);
                $scope.ptotal = $scope.total;
            }
            if($scope.total<0){
                    $scope.total=0;
                    $scope.ptotal=0;
                }
                item.added = false;
                if ($scope.total == 0) {
                    $scope.norder = false;
                }
                item.quantity = item.quantity - 1;
                for (var i = 0; i < $scope.orders.length; i++) {
                    if (($scope.orders[i].itemname)===item.itemname) {
                        if (item.quantity == 0) {
                            ($scope.orders).splice(i, 1);
                            $scope.buy_items = $scope.buy_items - 1;
                        } else if (item.quantity > 0) {
                            $scope.orders[i].quantity = item.quantity;
                        }
                        break;
                    }
                }
            }
        }
        $scope.cprocess = function () {
        if ($scope.coupon == "" || $scope.coupon == null) {
            alert("enter the coupon code");
        }
    else {
                $scope.applyText = "Applying";
                $http({
                url: "./coupon_check.php",
                method: 'POST',
                data: {
                    func_status:"apply",
                    coupon: $scope.coupon,
                    rest_name: $scope.rest_name,
                    bill_amount:$scope.total,
                    user : $scope.user
                }
            }).success(function (data, status, headers, config) {
                $scope.applyText = "Apply";
               if(data=='zero'){
                $scope.status = 'This coupon has already been applied for this account';
               }else if(data=='one'){
                $scope.status = 'No such coupon exists for this restaurant';
               }else if(data.indexOf("bill")!=-1){
                var ind = data.indexOf("bill");
                min_bill_amt = data.substring(0,ind);
                $scope.status = 'Minimum bill amount for this coupon to be applied should be'+' '+min_bill_amt;
               }else{
                if(coupon_check==0){
               discount = data.substring(0,2);
                var c = data.substring(2);
                reduced_amount = (parseInt(discount)*$scope.total)/100;
                if(reduced_amount==0||reduced_amount>parseInt(c)){
                    reduced_amount = parseInt(c);
                    $scope.maxcash=true;
                }
                $scope.cashback = reduced_amount;
                $scope.ptotal = $scope.total - reduced_amount;
                $scope.status = 'Coupon applied sucessfully';
                $scope.disable = true;
                $scope.csuccess = true;
                $scope.cstatus = false;
                coupon_check=1;
               
            }
            else{
                $scope.status = "Dont act smart";
            }
               }
            }).error(function (data, status, headers, config) {
                console.log("not done");
            });
        }
    }

    $scope.delete_coupon = function () {
                discount = 0;
                $scope.cashback = 0;
                $scope.ptotal = $scope.total;
                $scope.disable = false;
                $scope.cstatus = true;
                $scope.status = "Coupon Removed";
                $scope.csuccess = false;
                $scope.maxcash = false;
                coupon_check = 0;
    }
    
    $scope.checkout = function () {
        $scope.proceed_button="Proceeding";
        $http({
            url: "./get_timings.php",
            method: 'POST',
            data: {
                rest_name:$scope.rest_name
            }
        }).success(function (data, status, headers, config) {
            $scope.proceed_button = "Proceed to Checkout";
            var hours = new Date().getHours();
            var minutes = new Date().getMinutes();
            var min = parseInt(minutes)+10;
            var time = hours.toString();
            time=time+ min.toString();
            var mor_time = data[0].opening_time;
            var eve_time = data[0].closing_time;
            if(parseInt(time)>parseInt(mor_time) && parseInt(time)<parseInt(eve_time)){
             if($scope.rest_name!="limragarden" && $scope.total<100){
              alert("Minimum order value for this restaurant is Rs100/-");
}
else{
                $http({
            url: "./middleware.php",
            method: 'POST',
            data: {
                total: JSON.stringify($scope.orders),
                amount: $scope.total,
                bill_amount:$scope.ptotal,
                cashback:$scope.cashback
            }
        }).success(function (data, status, headers, config) {
            window.location.href = './cartdisplay.php';
        }).error(function (data, status, headers, config) {
            console.log("not done");
        });
}
           }
            else{
               
               var am = "AM";
               var pm = "PM";
               if(mor_time.length==3){
               var mor_check_hours = parseInt(mor_time.substring(0,1));
               var mor_check_minutes = parseInt(mor_time.substring(1,3))-10;
}else if(mor_time.length==4){
               var mor_check_hours = parseInt(mor_time.substring(0,2));
               var mor_check_minutes = parseInt(mor_time.substring(2,4))-10;
}
               var eve_check_hours = parseInt(eve_time.substring(0,2))-12;
               var eve_check_minutes = parseInt(eve_time.substring(2,4))-10;
               if(mor_check_minutes<10){
                  mor_check_minutes = "0"+mor_check_minutes.toString();
            }
               if(eve_check_minutes<10){
                  eve_check_minutes = "0"+eve_check_minutes.toString();
            }
               if(mor_check_hours==12){
                     am="PM";
}
mor_time = mor_check_hours.toString()+":"+mor_check_minutes.toString();
eve_time = eve_check_hours.toString()+":"+eve_check_minutes.toString();
alert("Sorry the restaurant functions from"+" "+mor_time+am+" "+"to"+" "+eve_time+pm);
$scope.proceed_button = "Proceed to Checkout";
}
        }).error(function (data, status, headers, config) {
            console.log("not done");
        });

        // $http({
        //     url: "./middleware.php",
        //     method: 'POST',
        //     data: {
        //         total: JSON.stringify($scope.orders),
        //         amount: $scope.total
        //     }
        // }).success(function (data, status, headers, config) {
        //     console.log(data);
        //     window.location.href = './cartdisplay.php';
        // }).error(function (data, status, headers, config) {
        //     console.log("not done");
        // });
    }
            }]);
            
    myApp.filter('removeUnderscores', [function() {
return function(string) {
    if (!angular.isString(string)) {
        return string;
    }
    return string.replace(/[/_/]/g, ' ');
 };
}])
        </script>
<script type="text/javascript">
		$('#burger').on('click',function(e){
    if($(this).parents('.panel').children('.panel-collapse').hasClass('menu-items')){
        e.stopPropagation();
    }
});
</script>


        <?php include('./footer.php') ?>