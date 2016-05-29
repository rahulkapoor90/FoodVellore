<?php
require("./header.php");
require("./connect.php");
?>
<?php
if (!isset($_SESSION["user_login"])) {
    echo "<meta http-equiv=\"refresh\" content=\"0; url=./index.php\">";
}
?>
<?php
$name = $conn->prepare("SELECT name FROM users WHERE username=:user");
$name->bindParam(':user', $user);
$name->execute();
 while($row = $name->fetch()) {
             $name1 = $row["name"];
  }
?>
<script src="./angular/historyController.js"></script>
<title><?php echo $name1; ?> | Your Orders</title>
<link rel="stylesheet" type="text/css" href="./stylesheets/orderhistory.css">
<div id="product-list" ng-app="myApp" ng-init="user='<?php echo $_SESSION['user_login'] ?>'">
<div class="container" ng-controller="historyController">
<span id="main-title"><i class="fa fa-history" aria-hidden="true"></i> Order History</span>
<h2 class="modal-title" id="signup-modal-label" style="text-align:left;">List of orders you made recently</h2>
<div class="highlight"><i class="fa fa-info-circle" aria-hidden="true"></i>
 Note: Cancel your recent order by clicking on particular tab</div>
	       <div class="panel-group show-order" id="accordion">
        <a data-toggle="collapse" data-parent="#accordion" href="#{{user.order_no}}">

                <div ng-repeat="user in items" class="panel panel-default menu-panel">
                    <div class="panel-heading panel-types">
                        <h4 class="panel-title">
        Order from <strong>{{user.rest_name}}</strong> on <strong>{{user.order_time | date : 'dd/MM/yyyy'}}</strong>
    <span><i class="fa fa-chevron-down pull-right"></i></span>

                            </a>
      </h4>
                    </div>
                    <div id="{{user.order_no}}" class="panel-collapse collapsing order-display">
                       <h3>Order Information</h3>
                           <table>
      <tbody>
      <tr>
        <td>
          Order Number:
        </td>
        <td>
          {{user.order_no}}
        </td>
      </tr>
      <tr>
        <td>
          Date Ordered:
        </td>
        <td>
          {{user.order_time}}
        </td>
      </tr>
      <tr>
        <td>
          Total Amount:
        </td>
        <td>
          {{user.amount}}
        </td>
      </tr>
      </tbody>
    </table>
                        <br>
                        <h4>Hey! Your Orders were:</h4>
	<div class="row" style="width:75%; margin-left: 15px;margin-top:15px;margin-bottom:12px;">
		<div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Item Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <tr ng-repeat="ord in getValue(items)">
            <td>{{ord.itemname}}</td>
            <td>{{ord.quantity}}</td>
            <td>{{ord.price}}</td>
            <td><span class="label label-primary">Completed</span></td>
          </tr>
        </tbody>
      </table>
    </div>
	</div>
                        <div class="row" ng-if="check(user)" style="margin-bottom:10px;">
                        <div class="col-sm-6 col-lg-4 col-xs-4">
                          
                        <center><button ng-click="delete_order(user)" class="btn btn-danger">Cancel Order</button><center>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
</div>
<?php
require("./footer.php");
?>