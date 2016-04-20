<?php
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
 $phone = strip_tags(@$_POST['mobile']);

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