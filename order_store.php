<?php
include('./connect1.php');
session_start();
$insert_sql="";
date_default_timezone_set("Asia/Calcutta");
$ctime = date("H:i:s", strtotime($_POST['time']));
$time = date("Y-m-d H:i:s");
$ttt = date("H:i:s");
if($ctime<$ttt){
    echo '<script>
    alert("Please select an appropriate time");
    window.location.href = "cartdisplay.php";
</script>';
}
else{
    $rest_name = $_SESSION['rest_name'];
    $orders = $_SESSION['order'];
    $user = $_SESSION['user_login'];
    $bill = $_SESSION['bill'];
    $customer_bill = $_SESSION['customer_bill'];
    $cashback = $_SESSION['cashback'];
        if(empty($_POST['name'])||empty($_POST['utype'])){
            header('Location:./cartdisplay.php');
        }else{
        $name=$_POST['name'];
        $address_line1 = $_POST['address_line1'];
        $address_line2 = $_POST['address_line2'];
if(!empty($_POST['remarks'])){
        $remarks = $_POST['remarks'];
}else{
$remarks="nil";
}
        $utype  = $_POST['utype'];
    }
    $order_query = "SELECT `order_count` FROM `order_number`";
    $rest_id_query = "SELECT `rest_id` FROM `our_tieups` WHERE `rest_name`='$rest_name'";
    $rest_response = mysqli_query($conn,$rest_id_query);
    $row = mysqli_fetch_assoc($rest_response);
    $rest_id = $row['rest_id'];
    $check="SELECT `order_no` FROM `$rest_name`";
    $user_check = "SELECT `order_no` FROM `$user`";
    $owner_number = "SELECT `mobile` FROM `our_tieups` WHERE `rest_name` = '$rest_name'";
    $user_number = "SELECT `mobile` FROM `users` WHERE `username` = '$user'";
    $result = mysqli_query($conn,$check);
    if(empty($result)){
    $queryCreateRestTable = "CREATE TABLE `$rest_name` (
    `order_no` VARCHAR(60) NOT NULL,
    `orders` TEXT NOT NULL,
    `amount` int(11) NOT NULL,
    `discounted_bill` int(11) NOT NULL,
    `time` time NOT NULL,
    `order_time` datetime NOT NULL,
    `username` varchar(60) NOT NULL,
    `name` varchar(60) NOT NULL,
    `order_mode` varchar(60) NOT NULL,
    `remarks` varchar(200),
    `mobile` VARCHAR(60) NOT NULL,
    `status` INT(11) NOT NULL default 0,
    PRIMARY KEY  (`order_no`)
)";
    mysqli_query($conn,$queryCreateRestTable);
}
    
    $response = mysqli_query($conn,$user_check);
    if(empty($response)){
    $queryCreateUsersTable = "CREATE TABLE `$user` (
    `order_no` VARCHAR(60) NOT NULL,
    `orders` TEXT NOT NULL,
    `amount` int(11) NOT NULL,
    `discounted_bill` int(11) NOT NULL,
    `time` time NOT NULL,
    `order_time` datetime NOT NULL,
    `rest_name` varchar(60) NOT NULL,
    `coupon_applied` VARCHAR(60) NOT NULL,
    PRIMARY KEY  (`order_no`)
)";
    mysqli_query($conn,$queryCreateUsersTable);
    }
     if($_SESSION['coupon']!="removed"){
    $coupon = $_SESSION['coupon'];
if($coupon=="WELCOME50" || $coupon=="WELCOME100"){
$coupon_insert = "INSERT INTO `used_coupons` VALUES('$user','$coupon','ALL')";
}else{
    $coupon_insert = "INSERT INTO `used_coupons` VALUES('$user','$coupon','$rest_name')";
}
    mysqli_query($conn,$coupon_insert);
}
else{
    $coupon = "no_coupon";
}
$order_result = mysqli_query($conn,$order_query);
$order_row = mysqli_fetch_assoc($order_result);
$order_number = $order_row['order_count'];
$order_no = intval($order_number)+1;
$order_n = strval($order_no);
$order_update = "UPDATE `order_number` SET `order_count`='$order_n'";
mysqli_query($conn,$order_update);
         $_SESSION['order_no'] = $order_no;
         $user_ins = "UPDATE `users` SET `address_line1`='$address_line1',`address_line2`='$address_line2' WHERE `username`='$user'";
 if($mobile_res = mysqli_query($conn,$owner_number)){
             $mobile_result = mysqli_fetch_assoc($mobile_res);
             $rphone = $mobile_result['mobile'];
             $sphone = "9865294828";
            $mobile_user = mysqli_query($conn,$user_number);
            $mobile_usern = mysqli_fetch_assoc($mobile_user);
            $phone = $mobile_usern['mobile'];
        }
$insert_sql = "INSERT INTO $rest_name VALUES('$order_no','$orders',$bill,$customer_bill,'$ctime','$time','$user','$name','$utype','$remarks','$phone','0')";
         $user_sql = "INSERT INTO $user VALUES('$order_no','$orders', $bill,$customer_bill, '$ctime','$time','$rest_name','$coupon')";
        if(mysqli_query($conn,$insert_sql)){
             if(mysqli_query($conn,$user_sql)){
            if(mysqli_query($conn,$user_ins)){
             define('SENDERID','FOODON');
             define('AUTHKEY','105058Aah3DsrrB56c1bd03');
             function sendRest($rphone, $orders){
                  global $bill,$utype,$name,$ctime,$remarks,$address_line1,$address_line2,$rest_name,$customer_bill,$cashback,$phone,$order_no;
                  $t = json_decode($orders,true);
                  $sms_content = "Order Number:".$order_no."\nOrder by"." ".$name." "."\nfor time ".date('H:i:s',strtotime($ctime))."\nOrders are:\n";
                  foreach($t as $ord){
                      $sms_content = $sms_content.$ord['itemname']." "."quantity:".$ord['quantity']."\n";
                  }
                 if($utype=="delivery"){
                      $sms_content = $sms_content."\nOrder Type:Delivery\nAddress:".$address_line1."\n".$address_line2;
                  }else if($utype=="dine"){
                      $sms_content = $sms_content."\nOrder Type:Dine\n";
                  }else if($utype=="pickup"){
                      $sms_content = $sms_content."\nOrder Type:Pickup\n";
                  }
                   $sms_content = $sms_content."Extra Remarks:".$remarks."\n\nTotal Bill Amount:".$bill."\n\nDiscount From FoodONZ:".$cashback."\n\nAmount to be collected from customer:".$customer_bill."\n\nCustomer Contact Number:".$phone."\n\nNote:delivery and packaging charges are not included";
               $sms_text = urlencode($sms_content);
               $api_url = 'https://control.msg91.com/api/sendhttp.php?authkey='.AUTHKEY.'&mobiles='.$rphone.'&message='.$sms_text.'&sender='.SENDERID.'&route=4&response=json';
               $response = file_get_contents($api_url);
               return $response;
               }
               function sendUser($phone){
                  global $bill,$rest_name,$rphone,$customer_bill,$order_no;
                  $sms_content = "Thank You for placing your order with FoodONZ.\n\nYour order number:".$order_no." "."for amount"." ".$customer_bill." "."at"." ".$rest_name." "."is confirmed.\nThe restaurants contact number is:".$rphone."\n\nIn Case of any change or delay, you can call the restaurant owner for any queries.\n\nYou can also check your order in the order history section of our website.\n\nNote:delivery and packaging charges are not included in this bill amount.\nEnjoy Your Meal!";
                $sms_text = urlencode($sms_content);
               $api_url = 'https://control.msg91.com/api/sendhttp.php?authkey='.AUTHKEY.'&mobiles='.$phone.'&message='.$sms_text.'&sender='.SENDERID.'&route=4&response=json';
               $response = file_get_contents($api_url);
               return $response;
               }
			   function sendSarawagi($sphone, $orders){
                  global $bill,$utype,$name,$ctime,$remarks,$address_line1,$address_line2,$rest_name,$customer_bill,$cashback,$phone,$order_no,$rest_name;
                  $t = json_decode($orders,true);
                  $sms_content = "Shubham! Order by"." ".$name." "."\nYour order number:"." ".$order_no." "."\nRestaurant Name:"." ".$rest_name." "."\nfor ".date('H:i:s',strtotime($ctime))."\nOrders are:\n";
                  foreach($t as $ord){
                      $sms_content = $sms_content.$ord['itemname']." "."quantity:".$ord['quantity']."\n";
                  }
                 if($utype=="delivery"){
                      $sms_content = $sms_content."\nOrder Type:Delivery\nAddress:".$address_line1."\n".$address_line2;
                  }else if($utype=="dine"){
                      $sms_content = $sms_content."\nOrder Type:Dine\n";
                  }else if($utype=="pickup"){
                      $sms_content = $sms_content."\nOrder Type:Pickup\n";
                  }
                   $sms_content = $sms_content."Extra Remarks:".$remarks."\n\nTotal Bill Amount:".$bill."\n\nDiscount From FoodONZ:".$cashback."\n\nAmount to be collected from customer:".$customer_bill."\n\nCustomer Contact Number:".$phone."\n\nNote:delivery and packaging charges are not included";
               $sms_text = urlencode($sms_content);
 $api_url = 'https://control.msg91.com/api/sendhttp.php?authkey='.AUTHKEY.'&mobiles='.$sphone.'&message='.$sms_text.'&sender='.SENDERID.'&route=4&response=json';               $response = file_get_contents($api_url);
               return $response;
               }
			   
               $rest_response=sendRest($rphone,$orders);
               $postdata = json_decode($rest_response);
               $errorMessage = $postdata->type;
               if($errorMessage=="success"){
                $user_response=sendUser($phone);
                $postdata_user = json_decode($user_response);
               $errorUserMessage = $postdata_user->type;
               if($errorUserMessage=="success"){
define('SENDERID','FOODON');
             define('AUTHKEY','105058Aah3DsrrB56c1bd03');
sendSarawagi($sphone,$orders);
                header('Location:./order_successful.php');
}else{
header('Location:./error.php');
}
}else{
header('Location:./error.php');
}             
                    }else{
header('Location:./error.php');
}
}else{
header('Location:./error.php');
}
}else{
header('Location:./error.php');
}
                   
             }
?>