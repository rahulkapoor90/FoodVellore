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
.terms-content{
    padding-bottom: 50px;
    min-height: 500px;
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
<h1 style="font-size:26px;"><i class="fa fa-info"></i> Terms and Conditions:</h1>
</div>
</div>
</div>
</div>
<br />

<h1 align="center"><b><u>Terms and Conditions</b></u></h1>
<br>
<br>
<p><h4>Please read these Terms of Use carefully (including our Security & Privacy Policy  before using our
 website  www.foodonz.com  and our Services,
 so that you are aware of your legal rights and obligations with respect to Foodonz.
<br>
</h4></p>

<p><h4>
In General
Foodonz (“www.foodonz.com”) owns and operate this Website. 
 This document governs your relationship with www.foodonz.com. 
Access to and use of this Website and the products and services available through this Website
 (collectively, the "Services") are subject to the following terms, conditions and notices (the "Terms of Service").
 By using the Services, you are agreeing to all of the Terms of Service,
 as may be updated by us from time to time. You should check this page regularly to take notice of
 any changes we may have made to the Terms of Service.</p></h4>

<p><h4>
Access to this Website is permitted on a temporary basis, and we reserve the right to withdraw or
 amend the Services without notice. We will not be liable if for any reason this Website is unavailable at 
any time or for any period. From time to time, we may restrict access to some parts or all of this Website.
This Website may contain links to other websites , 
which are not operated by www.foodonz.com. Foodonz has no control 
over the Linked Sites and accepts no responsibility for them or for any loss or damage that 
may arise from your use of them. Your use of the Linked Sites will be subject to the terms of use and
 service contained within each such site.
</p></h4>

<h2 align="left" ><u>Prohibitions</u></h2>
<p><h4>You must not misuse this Website. You will not: commit or encourage a criminal offense; transmit or distribute a virus, 
trojan, worm, logic bomb or any other material which is malicious, technologically harmful, in breach of confidence or in any way offensive
 or obscene; hack into any aspect of the Service; corrupt data; cause annoyance to other users; infringe upon the rights of any other person's 
proprietary rights; send any unsolicited advertising or promotional material, commonly referred to as "spam"; or attempt to affect the performance
 or functionality of any computer facilities of or accessed through this Website. Breaching this provision would constitute a criminal
 offense and www.foodonz.com will report any such breach to the relevant law enforcement authorities and disclose your identity to them.
<br>
We will not be liable for any loss or damage caused by a distributed denial-of-service attack, viruses or other technologically harmful material 
that may infect your computer equipment, computer programs, data or other proprietary material due to your use of this Website or to your 
downloading of any material posted on it, or on any website linked to it.
</h4></p>


<h2 align="left"><u>Intellectual Property,Content</u></h2>
<p><h4>The intellectual property rights in content (including photographic images) made available to you on
 or through this Website remains the property of Foodonz or its licensors and are protected by copyright laws 
and treaties around the world. All such rights are reserved by Foodonz and its licensors.
 You may store, print and display the content supplied solely for your own personal use.
 You are not permitted to publish, manipulate, distribute or otherwise reproduce, in any format, any of the content or copies of the 
content supplied to you or which appears on this Website nor may you use any such content in connection with any business or commercial enterprise.

</h4></p>
</div>
					</div>
					</div>
                </div>
				</div>
            </div>
        </div>
        <?php include('./footer.php') ?>