<?php
	require 'connect.php';
require 'vendor/autoload.php';
use Mailgun\Mailgun;
//$user_name = $_POST['user_name'];
$name = strip_tags(@$_POST['name']);
$email = strip_tags(@$_POST['email']);
$password = strip_tags(@$_POST['password']);
$username = strip_tags(@$_POST['username']);
$mobile = strip_tags(@$_POST['mobile']);
		try
		{	
define('SENDERID','FOODON');
define('AUTHKEY','rohit101293');
define('PASSWORD','rohitrohit');
function sendOtp($otp, $phone){
 $sms_content = "Your FoodONZ verification code is"." ".$otp;
 $sms_text = urlencode($sms_content);
 $api_url = 'http://login.cheapsmsbazaar.com/vendorsms/pushsms.aspx?user=rohit101293&password=rohitrohit&msisdn='.$phone.'&sid=FOODON&msg='.$sms_text.'&fl=0&gwid=2';
 $response = file_get_contents($api_url);
 return $response;
 }
  $otp = rand(100000, 999999);
$e_check = $conn->prepare("SELECT email FROM users WHERE email=:email");
$e_check->bindParam(':email', $email);
$e_check->execute();
$m_check = $conn->prepare("SELECT mobile FROM users WHERE mobile=:mobile");
$m_check->bindParam(':mobile', $mobile);
$m_check->execute();
$u_check = $conn->prepare("SELECT username FROM users WHERE username=:username");
$u_check->bindParam(':username', $username);
$u_check->execute();
if(empty($name) || empty($email) || empty($username) || empty($password) || empty($mobile)){
	echo "Please fill all the fields.";
}
else if($e_check->rowCount() == 1){
	echo "That email Address already exists";
}
else if($m_check->rowCount() == 1){
	echo "That mobile number already exists";
}
else if($username == $mobile){
echo "Username and Phone cannot be same";
}
else if(ctype_digit($username)){
echo "Username cannot have only numbers, please try again";
}
else if($u_check->rowCount() == 1) {
	echo "Username already exists.";
}
else if(strlen($username) <5){
	echo "Username length must be more than 5 characters";
}
else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
	echo "Invalid Email Address.";
}
else if(!preg_match("/^[a-zA-Z ]*$/",$name)){
	echo "Only letters and white spaces allowed for name";
}
else if(!preg_match("/^[0-9 ]*$/",$mobile)){
	echo "Only numbers allowed for mobile";
}
else if(!(strlen($mobile)==10)){
	echo "Not a valid mobile number.";
}
else {
$pswd = password_hash($password, PASSWORD_BCRYPT);
$res= sendOtp($otp,$mobile);
session_start();
$_SESSION['signupname'] = $name;
$_SESSION['signupmobile'] = $mobile;
$_SESSION['signupemail'] = $email;
$_SESSION['signuppass'] = $pswd;
$_SESSION['signupusername'] = $username;
$_SESSION["otp"] = $otp;
$_SESSION["username"] = $username;
# Instantiate the client.
$mgClient = new Mailgun('key-544c2c428251b2ebb2292e4002838d5d');
$domain = "www.foodonz.com";

# Make the call to the client.
$result = $mgClient->sendMessage($domain, array(
    'from'    => 'FoodONZ <no-reply@foodonz.com>',
    'to'      => 'rahulkapoorhooting@gmail.com,shubham.ss122@gmail.com',
    'subject' => 'Phone Verification at FoodONZ',
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
Hey! Please use the Verification Code given below as your OTP while signing up at FoodONZ. Valid only till sign up is open.</span>
</td>
</tr>
<tr>
<td height="14" style="line-height:14px"> </td>
</tr>
<tr>
<td>
<span style="font-family:Helvetica Neue,Helvetica,Lucida Grande,tahoma,verdana,arial,sans-serif;font-size:16px;line-height:21px;font-weight:bold;color:#141823">Here are the details:</span>
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
<td width="100%" valign="top" style="padding-right:10px" style="font-size:19px">
<br>
Hi, '.$name.' Your OTP for phone verification is <strong>'.$otp.'.</strong><br>We have sent you this email in case you didnt recieved the <strong>OTP message</strong> on the phone number you entered recently.
you entered.
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
<a target="_blank" style="color:#3b5998;text-decoration:none" href="mailto:'.$email.'">'.$email.'/a>
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
$postdata = json_decode($res);
$reply = $postdata->ErrorMessage;
if($reply == "Success"){
echo "ok";
}
else{
echo "A problem with messaging service occurred";
}
}		
				
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
?>