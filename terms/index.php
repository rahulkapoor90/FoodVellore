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
$_SESSION['rest_name'] = $res_name;
$_SESSION['rname'] = './json/'.$res_name.'.json';
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

</style>
        <div id="product-list">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-sm-12 col-lg-8" id="carousel">
                    </div>
                    <div class="col-lg-2"></div>

                </div>
                <div class="flex-container" ng-app="myApp" ng-init="buy_items=0;norder=false;total=0;something='<?php echo $_SESSION['rname'] ?>';user='<?php echo $_SESSION['user_login'] ?>';rest_name='<?php echo $_SESSION['rest_name'] ?>'">
                    <div class="flex-big" ng-controller="restaurantController">
                        <div class="row">
						<div class="container">
						<div class="row">
						<div class="col-lg-8 col-sm-12">
						<div class="menu-container">
<h1 style="font-size:26px;"><i class="em em-hamburger"></i> Menu:</h1>
<p style="font-size:14px;color:#333;font-weight:bold;">Your food is waiting for you..let's begin.</p>
</div>
</div>
<div class="col-lg-4 col-sm-12 final-pay">
<h3>Bill Amount: <i class="fa fa-inr"></i> {{total}}</h3>
<h4 style="font-size:15px;" ng-show="norder ==0"><i class="em em-anguished"></i> Aren't you hungry?</h4>
<h4 style="font-size:17px;" ng-show="norder"><i class="em em-smiley"></i> Ohhh..Nice, we're happy to serve you.</h4>
<button class="btn btn-primary checkout-btn" ng-show="norder" ng-click="checkout()" style="font-size:16px;">Proceed to Checkout</button>
</div>

</div>
</div>

            <br />
			<a href="#top-bar" data-toggle="modal"  ng-show="norder" data-target="#cart-modal"><div id="cart"><span class="badge">{{buy_items}}</span> <br>

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

						<h3 ng-show="norder">Bill Amount: <i class="fa fa-inr"></i> {{total}}</h3>
						<button class="btn btn-primary checkout-btn" ng-show="norder" ng-click="checkout()" style="font-size:16px;">Proceed to Checkout</button>
                    </div>

                </div>
            </div>
        </div>
		<div class="row inside-menu">
		
		
					</div>
					</div>
                </div>
				</div>
            </div>
        </div>
        <?php include('./footer.php') ?>