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
                       <div class="col-sm-12">
<p><h5>This Privacy Policy governs the manner in which FOODONZ collects, uses, maintains and discloses information collected 
from users (each, a "User") of the  website ("www.foodonz.com"). This privacy policy applies to the site and all products and services offered by FOODONZ.
</h5></p>

<h3 align="left"><u> Personal identification information</u></h3>
<p><h5>We may collect personal identification information from users in a variety of ways, including, but not limited to, 
when users visit our site, register on the site and place an order and fill out a form and in connection with other activities, 
services, features or resources we make available on our site. Users may be asked for, as appropriate, name, email address, mailing address, phone number.
<br><br>We will collect personal identification information from users only if they voluntarily submit such information to us. 
Users can always refuse to supply personally identification information, except that it may prevent them from engaging in certain site related activities.

</h5></p>

<h3 align="left"><u>Non-personal identification information</u></h3>
<p><h5>We may collect non-personal identification information about users whenever they interact with oursite.
 Non-personal identification information may include the browser name, the type of computer and technical information about users means of connection to our Site, 
such as the operating system and the Internet service providers utilized and other similar information.

</h5></p>


<h3 align="left"><u>Web browser cookies</u></h3>
<p><h5>Our Site may use "cookies" to enhance user experience. User's web browser places cookies on their hard drive for record-keeping purposes and 
sometimes to track information about them. User may choose to set their web browser to refuse cookies, or to alert you when cookies are being sent.
 If they do so, note that some parts of the Site may not function properly.
</h5></p>


<h3 align="left"><u>How we use collected information</u></h3>
<p><h5>FOODONZ collects and uses users personal information for the following purposes:<br><br>
<li><b>To improve customer service<b><br></li>
Your information helps us to more effectively respond to your customer service requests and support needs.<br>
<li><b>To personalize user experience<b></li>
We may use information in the aggregate to understand how our Users as a group use the services and resources provided on our site.
<li><b>	To improve our site<b><br></li>
We continually strive to improve our website offerings based on the information and feedback we receive from you.
<li><b>	To send periodic emails<b><br></li>
The email address users provide for order processing, will only be used to send them information and updates pertaining to their order. 
It may also be used to respond to their inquiries, and/or other requests or questions. If user decides to opt-in to our mailing list,
 they will receive emails that may include company news, updates, related product or service information, etc. If at any time the user would like to
 unsubscribe from receiving future emails, we include detailed unsubscribe instructions at the bottom of each email or user may contact us via our site.
</li>
</h5></p>


<h3 align="left"><u>How we protect your information</u></h3>
<p><h5>We adopt appropriate data collection, storage and processing practices and security measures to protect against unauthorized access, 
alteration, disclosure or destruction of your personal information, username, password, transaction information and data stored on our site.
</h5></p>


<h3 align="left"><u>Compliance with children's online privacy protection act</u></h3>
<p><h5>
Protecting the privacy of the very young is especially important. For that reason, we never collect or maintain information at our site from those we 
actually know are under 13, and no part of our website is structured to attract anyone under 13.
</h5></p>

<h3 align="left"><u>Changes to this privacy policy</u></h3>
<p><h5>
FOODONZ has the discretion to update this privacy policy at any time. When we do, post a notification on the main page of our site, 
send you an email. We encourage users to frequently check this page for any changes to stay informed about how we are helping to protect the personal
 information we collect. You acknowledge and agree that it is your responsibility to review this privacy policy periodically and become aware of modifications.
</h5></p>


<h3 align="left"><u>Your acceptance of these terms</u></h3>
<p><h5>
By using this Site, you signify your acceptance of this policy and terms of service. If you do not agree to this policy, please do not use our Site.
 Your continued use of the Site following the posting of changes to this policy will be deemed your acceptance of those changes.
</h5></p>

</div>
					</div>
					</div>
                </div>
				</div>
            </div>
        </div>
        <?php include('./footer.php') ?>