<?php 

include ('./connect.php'); 
include ('./session.php');

?>
    <?php include ('./header.php'); ?>
<style>
.coupon-big .discount-part.Percentage .discount-container, .coupon-big .discount-part.Amount .discount-container {
    border: 2px solid #3bc4b7 !important;
}
.coupon-big .discount-container {
    border-top-left-radius: 3px;
    border-top-right-radius: 3px;
    height: 115px;
    margin: 15px auto 15px 10px;
    padding: 0;
    width: 115px;
}
.coupon-big .discount-part.Percentage .discount-sec1, .coupon-big .discount-part.Amount .discount-sec1 {
    color: #3bc4b7;
}
.coupon-big .discount-sec1 {
    display: flex;
    flex-direction: column;
    font-size: 15px;
    font-weight: bold;
    height: 115px;
    justify-content: center;
    padding: 5px;
    text-align: center;
    word-break: break-all;
}
.coupon-big .discount-sec1 p {
    margin-top: 0;
}

#offer-title {
    color: #494a4a;
    cursor: pointer;
    font-size: 27px;
    font-weight: bold;
    font-style: normal;
	line-height: 1.42857;
}
.coupon-big .meta.offer-desc {
    color: #494a4a;
    font-size: 15px;
    text-align: justify;
}
.coupon-list-item .coupon-type > span::before {
    background-color: #a6ba89;
    color: #fff;
    content: "CODE";
    display: block;
    font-size: 12px;
    margin: 12px -12px -12px;
    padding: 2px;
    text-align: center;
}
</style>
        <div id="product-list">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-sm-12 col-lg-8" id="carousel">
                       <!-- <ul>
                            <li><img src="images/food_bg.jpg"></li>
                            <li><img src="images/food_bg.jpg"></li>
                            <li><img src="images/web2.jpg"></li>
                        </ul>-->
                    </div>
                    <div class="col-lg-2"></div>

                </div>
                <div class="flex-container">
                    <div class="flex-big">
                        <div class="row">
<div class="panel panel-default">
  <div class="panel-heading"><p style="font-size:16px;font-weight:bold; margin-top:4px;text-align:center;">Offer #1</p></div>
  <div class="panel-body">
  <div class="col-sm-12 col-lg-2">
<div class="row">
<div class="coupon-type">
<span>Flat 20% DISCOUNT</span>
</div>
</div>
  </div>
  <div class="col-sm-12 col-lg-10">
  <p id="offer-title">Get 20% off on Apna Dhaba chicken</p>
  <div class="offer-desc" style="word-wrap: break-word;"> CouponDunia Exclusive: Flat 40% cashback on payment via MobiKwik Wallet. Maximum cashback of Rs. 100 per transaction. </div>
  </div>
  </div>
  <div class="panel-footer">
<div class="row">
<div class="col-sm-4">
 <a itemprop="menu" href="http://deebowl.com/delhi/food/pasta-hub-mukherjee-nagar/menu"><i class="fa fa-calendar fa-fw fa-lg"></i>Ends on 31st March, 2016</a></div>
 <div class="col-sm-4">
<a href="http://deebowl.com/delhi/food/pasta-hub-mukherjee-nagar/gallery"><i class="fa fa-check fa-fw fa-lg"></i>Verified</a></div>		
</div>
</div>
</div>

<div class="panel panel-default">
  <div class="panel-heading"><p style="font-size:16px;font-weight:bold; margin-top:4px;text-align:center;">Offer #2</p></div>
  <div class="panel-body">
  <div class="col-sm-12 col-lg-2">
<div class="discount-container">
<div class="discount-sec1">
<p class="discount-type">FLAT 40%</p>
<p class="percent-off">
<span class="percent"> CASHBACK </span>
</p>
</div>
</div>

  </div>
  <div class="col-sm-12 col-lg-10">
  <p id="offer-title">Get 20% off on Apna Dhaba chicken</p>
  <br>
  <div class="offer-desc" style="word-wrap: break-word;"> CouponDunia Exclusive: Flat 40% cashback on payment via MobiKwik Wallet. Maximum cashback of Rs. 100 per transaction. </div>
  </div>
  </div>
  <div class="panel-footer">
<div class="row">
<div class="col-sm-4">
 <a itemprop="menu" href="http://deebowl.com/delhi/food/pasta-hub-mukherjee-nagar/menu"><i class="fa fa-calendar fa-fw fa-lg"></i>Ends on 31st March, 2016</a></div>
 <div class="col-sm-4">
<a href="http://deebowl.com/delhi/food/pasta-hub-mukherjee-nagar/gallery"><i class="fa fa-check fa-fw fa-lg"></i>Verified</a></div>		
</div>
</div>
</div>
                    </div>
                </div>
				</div>
            </div>
        </div>

        <?php include('./footer.php') ?>