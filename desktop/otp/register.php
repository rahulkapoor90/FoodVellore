<?php
define('SENDERID','FD-ONZ');
define('AUTHKEY','105058Aah3DsrrB56c1bd03');
define('SMSUSER','rohit101293');
define('PASSWORD','rohitmishra');
 function sendOtp($otp, $phone){
 $sms_content = "Your FoodONZ verification code is"." ".$otp;
 $sms_text = urlencode($sms_content);
 $api_url = 'https://control.msg91.com/api/sendhttp.php?authkey='.AUTHKEY.'&mobiles='.$phone.'&message='.$sms_content.'&sender='.SENDERID.'&route=4&country=91';
 $response = file_get_contents($api_url);
 return $response;
 }
 $phone = 9629783543;
 $otp = rand(100000, 999999);
 require_once('db_connect.php');
 $sql = "INSERT INTO smscodes (mobile, otp) values ('$phone',$otp)";
 if(mysqli_query($conn,$sql)){
            echo(sendOtp($otp,$phone));
 }else{
 echo '{"ErrorMessage":"Failure"}';
 } 
 mysqli_close($conn);
?>