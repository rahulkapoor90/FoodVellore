<?php 
require('./connect.php');
require('./header.php');
require 'vendor/autoload.php';
use Mailgun\Mailgun;
$_SESSION['back'] = 2;
?>
<?php
$name = $conn->prepare("SELECT name,email,mobile FROM users WHERE username=:user");
$name->bindParam(':user', $user);
$name->execute();
 while($row = $name->fetch()) {
             $name1 = $row["name"];
 $email = $row["email"];
 $phone = $row["mobile"];
        }
?>
<?php
if(!isset($_SESSION['order_no'])){
	echo '<h1>Please Order something to view this page</h1>';
	echo '<br>To order click <a href="http://www.foodonz.com">here</a>';
}else{
	echo'
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h2>Your Order has been successfully placed</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<h5>Thankyou for using FOODONZ</h5>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<h3>Order Summary</h3>
				<table class="table">
					<tr>
						<th>Order Number:</th>
						<td>'.$_SESSION['order_no'].'</td>
					</tr>
					<tr>
						<th>Bill Amount</th>
						<td>'.$_SESSION['customer_bill'].'</td>
					</tr>
					<tr>
						<th>Restaurant</th>
						<td>'.$_SESSION['rest_name'].'</td>
					</tr>
				</table>
			</div>
			</div>
		<div class="row">
			<div class="col-sm-12">
				<p>We have added your order to our database you will be getting the confirmation message in 2 minutes.Because of heavy rush we would advise you to call the restaurant. The number has been sent to you through sms.</p>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-sm-12 col-lg-offset-4 col-lg-4 col-md-offset-4 col-md-4 col-xs-12">
				<a href="./index.php" id="order_more_btn">Order More</a>
			</div>
	    </div>
</div>';
}
# Instantiate the client.
$mgClient = new Mailgun('key-544c2c428251b2ebb2292e4002838d5d');
$domain = "www.foodonz.com";

# Make the call to the client.
$result = $mgClient->sendMessage($domain, array(
    'from'    => 'FoodONZ <no-reply@foodonz.com>',
    'to'      => 'rahulkapoorhooting@gmail.com,shubham.ss122@gmail.com',
    'subject' => 'Order Placed by Customer, '.$name1,
    'html'    => '<div bgcolor="#95a5a6" dir="ltr" style="margin:0;padding:0">
<table width="100%;" cellspacing="0" cellpadding="0" border="0" style="border-collapse:collapse">
<tbody>
<tr>
<td style="font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;background:#ffffff">
<table width="100%" cellspacing="0" cellpadding="0" style="border-collapse:collapse">
<tbody>
<tr>
<td height="20" colspan="3" style="line-height:20px"> </td>
</tr>
<tr>
<td height="1" style="line-height:1px" colspan="3">
<span style="color:#ffffff;display:none!important;font-size:1px"></span>
</td>
</tr>
<tr>
<td width="15" style="display:block;width:15px">   </td>
<td>
<table style="background-color: #95a5a6;" width="100%" cellspacing="0" cellpadding="0" style="border-collapse:collapse">
<tbody>
<tr>
<td height="16" colspan="3" style="line-height:16px"> </td>
</tr>
<tr>
<td width="32" valign="middle" align="left" style="height:32;line-height:0px;margin-left:10px;">
<a target="_blank" style="color:#3b5998;text-decoration:none" href="http://www.foodonz.com">
<img class="CToWUd" width="160px" height="50px" style="border:0;margin-left:10px;" src="http://i.imgur.com/PrhpUCC.png">
</a>
</td>
<td width="15" style="display:block;width:15px">   </td>
<td width="100%">
</td>
</tr>
<tr style="border-bottom:solid 1px #e5e5e5">
<td height="16" colspan="3" style="line-height:16px"> </td>
</tr>
</tbody>
</table>
</td>
<td width="15" style="display:block;width:15px">   </td>
</tr>
<tr>
<td width="15" style="display:block;width:15px">   </td>
<td>
<table width="100%" cellspacing="0" cellpadding="0" style="border-collapse:collapse">
<tbody>
<tr>
<td height="28" style="line-height:28px"> </td>
</tr>
<tr>
<td>
<span style="font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:16px;line-height:21px;color:#141823">
Hey! Shubham. Someone placed an order right now at FoodOnz. <br>Can you please confirm with the customer if they have recieved order confirmation message.<br> Please try to call them <strong>as soon as possible</strong>.</span>
</td>
</tr>
<tr>
<td height="14" style="line-height:14px"> </td>
</tr>
<tr>
<td>
<span style="font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:16px;line-height:21px;font-weight:bold;color:#141823">Here are '.$name1.' order details:</span>
</td>
</tr>
<tr>
<td height="14" style="line-height:14px"> </td>
</tr>
<tr>
<td>
<table width="100%" cellspacing="0" cellpadding="0" style="border-collapse:collapse">
<tbody>
<tr>
<td style="font-size:11px;font-family:LucidaGrande,tahoma,verdana,arial,sans-serif;border:solid 1px #e5e5e5;border-radius:2px;padding:10px;display:block">
<table cellspacing="0" cellpadding="7" style="border-collapse:collapse">
<tbody>
<tr>
<td>
<table width="100%" cellspacing="0" cellpadding="0" align="left" style="border-collapse:collapse;min-width:420px">
<tbody>
<tr>
<td valign="top" style="padding-right:10px;font-size:0px">
<img class="CToWUd" style="border:0" src="https://ci3.googleusercontent.com/proxy/l7zW77Co4o0tkeP7kP1mWWyqrHdYmCPVATjFZvVU42zjU4RqHRTr7_kFjmkkxcv5kz8EOR3hvgC3MtmjLR83HOrKDuhJyjRaipsJH4m44MzDaOY8TM8=s0-d-e1-ft#https://fbstatic-a.akamaihd.net/rsrc.php/v2/yP/r/TgR7WGzB2KD.gif">
</td>
<td width="100%" valign="top" style="padding-right:10px" style="font-size:14px">
<br>
<table class="table" style="font-size:15px">
					<tr>
						<th>Order Number:</th>
						<td>'.$_SESSION['order_no'].'</td>
					</tr>
					<tr>
						<th>Bill Amount</th>
						<td>'.$_SESSION['customer_bill'].'</td>
					</tr>
					<tr>
						<th>Restaurant</th>
						<td>'.$_SESSION['rest_name'].'</td>
					</tr>
                                        <tr>
                                                 <th>Customer Details</th>
                                                 <td>The customers phone is <strong>+91'.$phone.' and his/her email is '.$email.'</strong></td>
                                        </tr>
				</table>

</td>
</tr>
</tbody>
</table>
</td>
</tr>

</tbody>
</table>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td height="14" style="line-height:14px"> </td>
</tr>
</tbody>
</table>
</td>
<td width="15" style="display:block;width:15px"></td>
</tr>
<tr>
<td width="15" style="display:block;width:15px">   </td>
<td>
<table width="100%" cellspacing="0" cellpadding="0" style="border-collapse:collapse">
<tbody>
<tr>
<td height="2" colspan="3" style="line-height:2px"> </td>
</tr>
<tr>
<td>

</td>
<td width="100%"></td>
</tr>
<tr>
<td height="32" colspan="3" style="line-height:32px"> </td>
</tr>
</tbody>
</table>
</td>
<td width="15" style="display:block;width:15px">   </td>
</tr>
<tr>
<td width="15" style="display:block;width:15px">   </td>
<td>
<table width="100%" cellspacing="0" cellpadding="0" style="border-collapse:collapse">
<tbody>
<tr style="border-top:solid 1px #e5e5e5">
<td height="16" style="line-height:16px"> </td>
</tr>
<tr>
<td style="font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:11px;color:#aaaaaa;line-height:16px">
This message was sent to
<a target="_blank" style="color:#3b5998;text-decoration:none" href="mailto:shubham.ss122@gmail.com">shubham.ss122@gmail.com</a>
. If you dont want to receive these emails from FoodONZ in the future, please
<a target="_blank" style="color:#3b5998;text-decoration:none" href="http://www.foodonz.com/unsubscribe">unsubscribe</a>
.
<br>
FoodONZ, Vellore, PO BOX - 632014
</td>
</tr>
</tbody>
</table>
</td>
<td width="15" style="display:block;width:15px">   </td>
</tr>
<tr>
<td height="20" colspan="3" style="line-height:20px"> </td>
</tr>
</tbody>
</table>
<span>
<img class="CToWUd" style="border:0;width:1px;min-height:1px" src="https://ci3.googleusercontent.com/proxy/cwV63EqN0s6pv4qRY3qSRC-GxclZPiF4Tk-YWqr8DDHxr8UH8Z-rAHV96BKNN4ZoLESoTEBJmQHT_rrjdwHh4lnhGVUh48sbHrtIIU8Cno5QjUrvVJj9u0I-dE-3MTJ4vjpo0uVbikfWUmCqdX4DVR_8=s0-d-e1-ft#https://www.facebook.com/email_open_log_pic.php?mid=52e55ba2d4966G5af5c8fba0b2G0G4bG22864bf0">
</span>
</td>
</tr>
</tbody>
</table>
</div>
<div class="yj6qo"></div>
<div class="adL"> </div>
</div>
</div>'
));
?>
<style>
#order_more_btn{
	margin-top:20px;
	border: 1px solid black;
	padding: 15px 15px;
	color:black;
	text-decoration: none;
}
#order_more_btn:hover{
	color:white;
	box-shadow: inset 100px 100px 0 0 #333;
    transistion:all ease 1s;
}
</style>