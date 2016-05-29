<?php 
include ('./connect.php'); 
include('./header.php');

?>
<title>Cart Display | FoodONZ</title>
<?php
if (!isset($_SESSION["user_login"])) {
	echo '<script>window.location.href="./index.php";</script>';
}
else
{
}
?>
<?php
if($_SESSION['back']==2){
echo '<script>window.location.href="./food.php";</script>';
}
?>
<style>
body{
    font-family:'Quicksand', sans-serif !important;
}
.subline{
color: #0079ae;
font-weight: bold;
}
.item-name{
    width:40%;
}
.final-msg{
    font-size:20px;
    font-weight:bold;
}
.radio-text{
font-size:19px;
}
@media only screen and (max-width: 479px) {
.table{font-size:16px !important;}
.final-msg{font-size: 23px !important;}
#cart-display{padding:0px !important;}
.page-header{border-bottom:0px !important;
font-size:}
.mobile-btn{
margin-bottom: 10px;
margin-left: auto;
margin-right: auto;
}
.footer-bar{font-size:14px !important; }
.mobile-final{margin-top: 20px !important; }
.footer-mobile{
font-size: 16px !important;
color: #fff !important;
}
.mobile-form{
font-size:18px !important;
margin-bottom: 15px !important;}

}
.time-display{
width:60%
}
</style>
        <div id="cart-display" ng-app="myApp" ng-init="disable=false;user='<?php echo $_SESSION['user_login'] ?>';rest_name='<?php echo $_SESSION['rest_name'] ?>';total='<?php echo $_SESSION['customer_bill'] ?>'">
            <div class="container">
                <h1 class="page-header"><i class="fa fa-lock" aria-hidden="true"></i>
 Cart Items</h1>
                <div ng-controller="couponController">
                    <table class="table" ng-cloak>
                        <tr>
                            <th>Item Name</th>
                            <th>Price</th>
                            <th colspan="3">Quantity</th>
                        </tr>
                        <tr ng-repeat="item in items">
                            <td>
                                {{item.itemname}}
                            </td>
                            <td ng-cloak><i class="fa fa-inr"></i> {{item.price}} </td>
                            <td ng-cloak><span>{{item.quantity}}</span></td>
                        </tr>

                    </table>
                    <p class="final-msg" ng-cloak>Amount: <span style="color:green;"> <i class="fa fa-inr"></i> {{total}}</span></p>
    <h2>Order Details</h2>
    <form role="form" method="post" action="order_store.php">
    <div class="row">
      <div class="col-lg-6 col-sm-12 col-md-6">
        <div class="row">
            <div class="col-sm-12">
         <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" ng-model="name" id="name" required>
        </div>
    </div>
</div>
<div class="row">
            <div class="col-sm-12">
         <div class="form-group">
            <label for="remarks">Any special requirements for your order:</label>
            <input type="text" class="form-control" name="remarks" ng-model="remarks" id="remarks">
        </div>
    </div>
</div>
<div class="row">
            <div class="col-sm-12">
         <div class="form-group">
            <label for="city">City</label>
            <input type="text" class="form-control" name="city" ng-model="city" id="city" ng-disabled="disable" required>
        </div>
    </div>
</div>   
<div class="row">
            <div class="col-sm-12">
         <div class="form-group">
            <label for="state">State</label>
            <input type="text" class="form-control" id="state" name="state" ng-disabled ="disable" ng-model="state" required>
        </div>
    </div>
</div>
</div>   
  </div>
  <div class="row">
    <div class="col-sm-12 col-md-4 col-lg-4 col-xs-4">
        <div class="form-group">
            <div class="radio radio-text">
                <label>
                    <input type="radio" ng-keyup="callOnEnter($event,'pickup')" ng-model="pickup" ng-click="radioEvent('pickup')" name="utype" value="pickup">Pickup
                </label>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4 col-xs-4">
        <div class="form-group">
            <div class="radio radio-text">
                <label>
                    <input type="radio" ng-model="Dine" ng-keyup="callOnEnter($event,'pickup')" ng-click="radioEvent('dine')" name="utype" value="dine">Dine
                </label>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-4 col-lg-4 col-xs-8">
        <div class="form-group" ng-show="dell">
            <div class="radio radio-text">
                <label>
                    <input type="radio" ng-model="Delivery"  ng-keyup="callOnEnter($event,'pickup')" ng-click="radioEvent('delivery')" name="utype" value="delivery">Delivery 
                </label>
            </div>
        </div>
    </div>
</div>
<div class="row">
            <div class="col-sm-12">
         <div class="form-group" ng-show="dat_show">
            <label for="address_line1">Please, Enter your delivery Address:<br>
<span style="font-size:14px;">(Note: Delivery for VIT Student is only till Main Gate and Packaging charges are separately added.)</span>
</label>      
            <input type="text" class="form-control" name="address_line1" ng-model="address_line1" id="address_line1" {{required}}>
        </div>
    </div>
</div>
<div class="row">
            <div class="col-sm-12">
         <div class="form-group" ng-show="dat_show">
            <label for="address_line2">Delivery Address line 2:</label>
            <input type="text" class="form-control" name="address_line2" ng-model="address_line2" id="address_line2" {{required}}>
        </div>
    </div>
</div>
  <p>{{text}}</p>
    <div class="row">
        <div class='col-sm-6'>
            <div class="form-group" ng-show="date_show">
                <div class='input-group date' id='datetimepicker'>
                    <input type='text' name="time" class="form-control date" readonly/>
                    <span class="input-group-addon time-display">
                        <span class="glyphicon glyphicon-time"></span><b> Select Time</b>
                    </span>
                </div>
            </div>
            <button class="btn btn-lg btn-success mobile-btn" ng-show="date_show" name="submit" type="submit">Place Order</button>
        </div>
    </div>
</form>
</div>
                    </div>
        </div>

        <script src="./angular/couponController.js"></script>
        <script type="text/javascript">
          $(document).ready(function() {
  $(window).keydown(function(event){
    if(event.keyCode == 13) {
      event.preventDefault();
      return false;
    }
  });
});
        </script>
        <?php include('./footer.php'); ?>