<?php
require("./header.php");
?>
<script src="./angular/historyController.js"></script>
<style>
.show-order{
	margin-top:45px;
}

.faq-cat-content {
    margin-top: 25px;
}

.faq-cat-tabs li a {
    padding: 15px 10px 15px 10px;
    background-color: #ffffff;
    border: 1px solid #dddddd;
    color: #777777;
}

.nav-tabs li a:focus,
.panel-heading a:focus {
    outline: none;
}

.panel-heading a,
.panel-heading a:hover,
.panel-heading a:focus {
    text-decoration: none;
    color: #777777;
}

.faq-cat-content .panel-heading:hover {
    background-color: #efefef;
}

.active-faq {
    border-left: 5px solid #888888;
}

.panel-faq .panel-heading .panel-title span {
    font-size: 13px;
    font-weight: normal;
}
</style>
<div id="product-list" ng-app="myApp" ng-init="user='<?php echo $_SESSION['user_login'] ?>'">
<div class="container" ng-controller="historyController">
<h2 class="modal-title" id="signup-modal-label" style="text-align:left;">List of orders you made recently</h2>
<span>Note: Cancel your recent order by clicking on particular tab</span>
	       <div class="panel-group show-order" id="accordion">
                <div ng-repeat="user in items" class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#{{user.order_no}}">
        Order from {{user.rest_name}} on {{user.order_time | date : 'dd/MM/yyyy'}}
                            </a>
      </h4>
                    </div>
                    <div id="{{user.order_no}}" class="panel-collapse collapsing">
                        <p>Order No: {{user.order_no}}</p>
                        <p>Ordered on {{user.order_time}}</p>
                        <p>Bill Amount:{{user.amount}}</p>
                        <p>Orders are:</p>
                        <div ng-repeat="ord in getValue(items)">
                            <div class="row">
                                <div class="col-sm-12 col-lg-3">
                                    <p>{{ord.itemname}}</p>
                                </div>
                                <div class="col-sm-12 col-lg-3">
                                    <p>{{ord.price}}</p>
                                </div>
                                <div class="col-sm-12 col-lg-3">
                                    <p>{{ord.quantity}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row" ng-if="check(user)">
                        <div class="col-sm-6 col-lg-4">
                        <center><button ng-click="delete_order(user)" class="btn btn-danger">Cancel</button><center>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
</div>
<?php
require("./footer.php");
?>