<?php
session_start();
	require 'connect.php';
require 'vendor/autoload.php';
use Mailgun\Mailgun;
$otp = strip_tags(@$_POST['otp']);
$signupname = $_SESSION['signupname'];
$signupmobile = $_SESSION['signupmobile'];
$signupemail = $_SESSION['signupemail'];
$password = $_SESSION['signuppass'];
$username = $_SESSION['signupusername'];

$otp_verify =  $_SESSION['otp'];
$user_name = $_SESSION['username'];
if($otp == $otp_verify){
$query = $conn->prepare("INSERT INTO users(id,name,email,username,password,mobile,verified,address_line1,address_line2) VALUES ('',:name,:email,:username,:pswd,:mobile,'1','','')");
$query->bindParam(':name', $signupname);
$query->bindParam(':username', $username);
$query->bindParam(':email', $signupemail);
$query->bindParam(':pswd', $password);
$query->bindParam(':mobile', $signupmobile);
$query->execute();
# Instantiate the client.
$mgClient = new Mailgun('key-544c2c428251b2ebb2292e4002838d5d');
$domain = "www.foodonz.com";

# Make the call to the client.
$result = $mgClient->sendMessage($domain, array(
    'from'    => 'FoodONZ <no-reply@foodonz.com>',
    'to'      => ''.$signupemail.'',
    'subject' => 'Welcome to FoodONZ, '.$name,
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
<span style="color:#ffffff;display:none!important;font-size:1px">  Your account has been created – it will now be easier than ever to share and connect with your friends.   Here are three ways for you to get the most out of it:   Find Friends Find people you know on Facebook using our simple tools. Upload a Profile photo Personalise your profile and help your friends recognise you. Edit your Profile Describe personal interests, contact information and affiliations.  </span>
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
<span style="font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:16px;line-height:21px;color:#141823">Your account has been created – it will now be easier than ever to order food online in Vellore.<br> Use your first Sign Up Coupon <strong>WELCOME50</strong>.</span>
</td>
</tr>
<tr>
<td height="14" style="line-height:14px"> </td>
</tr>
<tr>
<td>
<span style="font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:16px;line-height:21px;font-weight:bold;color:#141823">Here are three ways FoodONZ is best for you:</span>
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
<td width="100%" valign="top" style="padding-right:10px">
<span style="font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:16px;line-height:21px;color:#141823">
<a target="_blank" style="color:#3b5998;text-decoration:none" href="">Privacy Protected</a>
</span>
<br>
<span style="font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:14px;line-height:19px;color:#898f9c">With encyption at every level we ensure that user security is never compromised.</span>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td>
<table width="100%" cellspacing="0" cellpadding="0" align="left" style="border-collapse:collapse;min-width:420px">
<tbody>
<tr>
<td valign="top" style="padding-right:10px;font-size:0px">
<img class="CToWUd" style="border:0" src="https://ci3.googleusercontent.com/proxy/2FYehjsU6qIMpt74KbUZiNbXLKh6ozsPxiHb75Dc93RA5YcPfUYYU0LmXHqkOzLqNKR1pJhoggxLkXF_eycmce1T_BocKyC822Wr-AbdLdKfZI_aiL4=s0-d-e1-ft#https://fbstatic-a.akamaihd.net/rsrc.php/v2/yN/r/Btw6qZ0ihGS.gif">
</td>
<td width="100%" valign="top" style="padding-right:10px">
<span style="font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:16px;line-height:21px;color:#141823">
<a target="_blank" style="color:#3b5998;text-decoration:none" href="https://www.facebook.com/n/?profile.php&medium=email&mid=52e55ba2d4966G5af5c8fba0b2G0G4bG22864bf0&bcode=1.1458321849.Abl6HpbIRGkagduo&n_m=rahulkapoor1995hoot%40gmail.com">Access to Wide range of Coupons</a>
</span>
<br>
<span style="font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:14px;line-height:19px;color:#898f9c">With our tested restaurant owner satisfaction, we are able to provide you with the best deals that pretty much exclusive.</span>
</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
<td>
<table width="100%" cellspacing="0" cellpadding="0" align="left" style="border-collapse:collapse;min-width:420px">
<tbody>
<tr>
<td valign="top" style="padding-right:10px;font-size:0px">
<img class="CToWUd" style="border:0" src="https://ci3.googleusercontent.com/proxy/QwyakdFdIK9cKcCh8TJP_a9ZfK8QTsog82K0d1FtheVrVK5wuuWtAm-CDtY-7hq9NR1WBTsvbLalip9PoNVvgPygB_PJBSsL00RFEN-m9129-3YMwws=s0-d-e1-ft#https://fbstatic-a.akamaihd.net/rsrc.php/v2/y-/r/oXpwcGCi58A.gif">
</td>
<td width="100%" valign="top" style="padding-right:10px">
<span style="font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:16px;line-height:21px;color:#141823">
<a target="_blank" style="color:#3b5998;text-decoration:none" href="https://www.facebook.com/n/?profile.php&v=info&edit_info=all&medium=email&mid=52e55ba2d4966G5af5c8fba0b2G0G4bG22864bf0&bcode=1.1458321849.Abl6HpbIRGkagduo&n_m=rahulkapoor1995hoot%40gmail.com">COD and Online Payment</a>
</span>
<br>
<span style="font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:14px;line-height:19px;color:#898f9c">We provide you with multiple options to pay so that you have many options to choose from.</span>
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
<td width="15" style="display:block;width:15px">   </td>
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
<a target="_blank" style="color:#3b5998;text-decoration:none" href="https://www.facebook.com/n/?find-friends%2F&medium=email&mid=52e55ba2d4966G5af5c8fba0b2G0G4bG22864bf0&bcode=1.1458321849.Abl6HpbIRGkagduo&n_m=rahulkapoor1995hoot%40gmail.com&lloc=email">
<table width="100%" cellspacing="0" cellpadding="0" style="border-collapse:collapse">
<tbody>
<tr>
<td style="border-collapse:collapse;border-radius:2px;text-align:center;display:block;border:solid 1px #E87E28;background:#E87E28;padding:7px 16px 11px 16px">
<a target="_blank" style="color:#3b5998;text-decoration:none;display:block" href="http://www.foodonz.com">
<center>
<font size="3">
<span style="font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;white-space:nowrap;font-weight:bold;vertical-align:middle;color:#ffffff;font-size:14px;line-height:14px">Get Started</span>
</font>
</center>
</a>
</td>
</tr>
</tbody>
</table>
</a>
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
<a target="_blank" style="color:#3b5998;text-decoration:none" href="mailto:'.$signupemail.'">'.$signupemail.'</a>
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
$get_name = $conn->prepare("SELECT name,email FROM users WHERE username=:user");
$get_name->bindParam(':user', $username);
$get_name->execute();
 while($row = $get_name->fetch()) {
             $id1 = $row["id"];
        }
$_SESSION["id"] = $id1;
$_SESSION["user_login"] = $username;
$_SESSION["password_login"] = $pswd;
unset($_SESSION["signuppass"]);
unset($_SESSION["signupemail"]);
unset($_SESSION["signupusername"]);
unset($_SESSION["signupmobile"]);
unset($_SESSION["signupname"]);
echo "okay";
}
else {
	echo "Your OTP is incorrect";
}

?>