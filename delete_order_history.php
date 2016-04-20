<?php
require("./connect1.php");
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$order_no = $request->order_no;
$username = $request->username;
$rest_name = $request->rest_name;
$sql = "DELETE FROM `$username` WHERE `order_no`='$order_no'";
$coupon_select = "SELECT `coupon_applied` FROM `$username` WHERE `order_no`='$order_no'";
$rest_query = "UPDATE `$rest_name` SET `status`=3 WHERE `order_no`='$order_no'";
$user_number = "SELECT mobile,name FROM `users` WHERE `username`='$username'";
$owner_number = "SELECT mobile FROM `our_tieups` WHERE `rest_name`='$rest_name'";
mysqli_query($conn,$rest_query);
$empty_check = "SELECT * FROM `$username`";
$delete_table = "DROP TABLE `$username`";
$coupon_query = mysqli_query($conn,$coupon_select);

while($row = mysqli_fetch_assoc($coupon_query)){
$coupon = $row['coupon_applied'];
}
$owner_phone = mysqli_query($conn,$owner_number);
$owner_result = mysqli_fetch_assoc($owner_phone);
$rphone = $owner_result['mobile'];
$user_phone = mysqli_query($conn,$user_number);
while($user_result = mysqli_fetch_assoc($user_phone)){
$uphone = $user_result['mobile'];
$name = $user_result['name'];
}
    define('SENDERID','FOODON');
             define('AUTHKEY','rohit101293');
             define('PASSWORD','rohitrohit');
             function sendRest($phone){
                 global $name,$order_no,$uphone;
                 $sms_content = "Order number:".$order_no." "."by"." ".$name." "."is cancelled\nContact Number:"." ".$uphone;
$sms_text = urlencode($sms_content);

              $api_url = 'http://login.cheapsmsbazaar.com/vendorsms/pushsms.aspx?user=rohit101293&password=rohitrohit&msisdn='.$phone.'&sid=FOODON&msg='.$sms_text.'&fl=0&gwid=2';
              $response = file_get_contents($api_url);
              return $response;
              }
              function sendUser($phone){
                 global $order_no,$rest_name;
                 $sms_content = "Your order has been cancelled.\nOrder Details:\nOrder number:"." ".$order_no."\nrestaurant:"." ".$rest_name;
               $sms_text = urlencode($sms_content);
              $api_url = 'http://login.cheapsmsbazaar.com/vendorsms/pushsms.aspx?user=rohit101293&password=rohitrohit&msisdn='.$phone.'&sid=FOODON&msg='.$sms_text.'&fl=0&gwid=2';
              $response = file_get_contents($api_url);
              return $response;
              }
              $rest_response=sendRest($rphone);
              $user_respone=sendUser($uphone);
$coupon_delete = "DELETE FROM `used_coupons` WHERE `username`='$username' AND `coupon_code`='$coupon' AND `rest_name`='$rest_name'";

// $_SESSION['vv']= $coupon;
if(mysqli_query($conn,$sql)){
   $respone = mysqli_query($conn,$empty_check);
   if(empty($respone)){
     mysqli_query($conn,$delete_table);
   }
}
   if($coupon=="WELCOME50" || $coupon=="no_coupon" || $coupon=="WELCOME100"){
   	echo "done";
   }
else{
mysqli_query($conn,$coupon_delete);
echo "coupon removed";
}
?>