<?php
require('./connect1.php');
$rest_name = $_SESSION['rest_name'];
$user = $_SESSION['user_login'];
$bill = $_SESSION['customer_bill'];
$sql="SELECT `order_no`,`status`,`mobile` FROM `$rest_name` WHERE `username`='$user'";
if($result = mysqli_query($conn,$sql)){
if(empty($result)){
echo '<script>alert("Oops we are sorry but we didn't find any order from this account to this restaurant. Please order again");
window.location.href="www.foodonz.com";</script>';
}
else{
while($row= mysqli_fetch_assoc($result)){
$status = $row['status'];
$phone = $row['mobile'];
}
if(intval($status)==3){
echo '<script>alert("Oops its seems that you have cancelled this order. Please order again");
window.location.href="www.foodonz.com";</script>';
}
else{
$_SESSION['count']=$_SESSION['count']-1;
if($_SESSION['count']==0){
echo '<script>alert("Sorry but you have exceeded your limit. Please order again");window.location.href="www.foodonz.com";</script>';
}
else{
define('SENDERID','FOODON');
define('AUTHKEY','rohit101293');
define('PASSWORD','rohitrohit');
function sendUser($phone){
           global $bill,$rest_name;
           $sms_content = "Your order for amount"." ".$bill." "."at"." ".$rest_name." "."is confirmed";
                $sms_text = urlencode($sms_content);
               $api_url = 'http://login.cheapsmsbazaar.com/vendorsms/pushsms.aspx?user=rohit101293&password=rohitrohit&msisdn='.$phone.'&sid=FOODON&msg='.$sms_text.'&fl=0&gwid=2';
               $response = file_get_contents($api_url);
               return $response;
               }
               $rapi=sendUser($phone);
               echo '<script>alert("We have sent the confirmation message to your registered mobile number.If you still didn't receive the sms please order again");window.location.href="www.order_successful.php";<script>';
} 
}

?>
