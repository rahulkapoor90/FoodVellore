<?php
$reg = @$_POST['reg'];
$name = "";
$email = "";
$pswd = "";
$username = "";
$error = "";
$name = strip_tags(@$_POST['name']);
$email = strip_tags(@$_POST['email']);
$pswd = strip_tags(@$_POST['password']);
$username = strip_tags(@$_POST['username']);
$mobile = strip_tags(@$_POST['mobile']);

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
  $_SESSION['otp']=$otp;
if($reg) {
$e_check = $conn->prepare("SELECT email FROM users WHERE email=:email");
$e_check->bindParam(':email', $email);
$e_check->execute();
$u_check = $conn->prepare("SELECT username FROM users WHERE username=:username");
$u_check->bindParam(':username', $username);
$u_check->execute();
// Count the amount of rows where username = $un

if(empty($name) || empty($email) || empty($username) || empty($pswd) || empty($mobile)){
	$error =  "<div style='width:80%;
	background-color: #d9534f;
  padding:10px;
  margin:10px auto;
  font-size: 16px;'>Please fill all the fields.</div>";
}
else if($e_check->rowCount() == 1){
	$error = "<div style='width:80%;
	background-color: #d9534f;
  padding:10px;
  margin:10px auto;
  font-size: 16px;'>That email Address already exists.</div>";
}
else if($u_check->rowCount() == 1) {
	$error = "<div style='width:80%;
	background-color: #d9534f;
  padding:10px;
  margin:10px auto;
  font-size: 16px;'>Username already exists.</div>";
}
else if(strlen($username) <5){
	$error = "<div style='width:80%;
	background-color: #d9534f;
  padding:10px;
  margin:10px auto;
  font-size: 16px;'>Username length must be more than 5 characters.</div>";
}
else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
	$error = "<div style='width:80%;
	background-color: #d9534f;
  padding:10px;
  margin:10px auto;
  font-size: 16px;'>Invalid Email Address</div>";
}
else if(!preg_match("/^[a-zA-Z ]*$/",$name)){
	$error = "<div style='width:80%;
	background-color: #d9534f;
  padding:10px;
  margin:10px auto;
  font-size: 16px;'>Only letters and white spaces allowed for name.</div>";
}
else if(!preg_match("/^[0-9 ]*$/",$mobile)){
	$error = "<div style='width:80%;
	background-color: #d9534f;
  padding:10px;
  margin:10px auto;
  font-size: 16px;'>Only numbers allowed for mobile.</div>";
}
else if(!(strlen($mobile)==10)){
	$error = "<div style='width:80%;
	background-color: #d9534f;
  padding:10px;
  margin:10px auto;
  font-size: 16px;'>Not a valid mobile number.</div>";
}
else {
$pswd = password_hash($pswd, PASSWORD_DEFAULT);
$query = $conn->prepare("INSERT INTO users(id,name,email,username,password,mobile) VALUES ('',:name,:email,:username,:pswd,:mobile)");
$query->bindParam(':name', $name);
$query->bindParam(':username', $username);
$query->bindParam(':email', $email);
$query->bindParam(':pswd', $pswd);
$query->bindParam(':mobile', $mobile);
$to = "$email";							 
		$from = "auto_responder@yoursitename.com";
		$subject = 'yoursitename Account Activation';
		$message = '<!DOCTYPE html><html><head><meta charset="UTF-8"><title>yoursitename Message</title></head><body style="margin:0px; font-family:Tahoma, Geneva, sans-serif;"><div style="padding:10px; background:#333; font-size:24px; color:#CCC;"><a href="http://www.yoursitename.com"><img src="http://www.yoursitename.com/images/logo.png" width="36" height="30" alt="yoursitename" style="border:none; float:left;"></a>yoursitename Account Activation</div><div style="padding:24px; font-size:17px;">Hello '.$username.',<br /><br />Click the link below to activate your account when ready:<br /><br /><a href="http://www.yoursitename.com/activation.php?id='.$mobile.'&u='.$username.'&e='.$email.'&p='.$pswd.'">Click here to activate your account now</a><br /><br />Login after successful activation using your:<br />* E-mail Address: <b>'.$pswd.'</b></div></body></html>';
		$headers = "From: $from\n";
        $headers .= "MIME-Version: 1.0\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\n";
		mail($to, $subject, $message, $headers);
//sendOtp($otp,$mobile);
$query->execute();

}
}
?>