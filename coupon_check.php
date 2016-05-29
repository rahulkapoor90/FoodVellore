<?php
require('./php/connect_database.php');
session_start();
?>
<?php
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$func_status = $request->func_status;
$coupon = strtoupper($request->coupon);
if($coupon=="WELCOME100" || $coupon=="WELCOME50" || $coupon=="TEE5"|| $coupon=="TEE10" || $coupon=="TEE15"){
$rest_name = "ALL";
}
else{
$rest_name = $request->rest_name;
}
$user = $request->user;
if($func_status=="apply"){
$amount = $request->bill_amount;
$coupche = $conn->prepare("SELECT * FROM used_coupons WHERE username=:user AND coupon_code=:coupon AND rest_name=:restname");
$coupche->bindParam(':user', $user);
$coupche->bindParam(':coupon',$coupon);
$coupche->bindParam(':restname',$rest_name);
if($coupche->execute()){
	$numqueries = $coupche->rowCount();
	if($numqueries>0){
		echo 'zero';
	}
	else{
		$disc = $conn->prepare("SELECT discount,cashback FROM coupons WHERE coupon_code=:coupon1 AND rest_name=:restname");
		$disc->bindParam(':coupon1',$coupon);
		$disc->bindParam(':restname',$rest_name);
		$respone = $disc->execute();
		$data = array();
		if($respone){
			$numrows = $disc->rowCount();
			if($numrows >0){
				$bill_check = $conn->prepare("SELECT min_bill_amt FROM coupons WHERE coupon_code=:coupon AND rest_name=:restn");
				$bill_check->bindParam(':coupon',$coupon);
				$bill_check->bindParam(':restn',$rest_name);
				if($bill_check->execute()){
					while($row = $bill_check->fetch()) {
             $total = $row["min_bill_amt"];
        }
				if(intval($total)<=intval($amount)){
				while($row1 = $disc->fetch()){
				$discount = $row1['discount'];
                                $cashback = $row1['cashback'];
				}
					$_SESSION['coupon'] = $coupon;
				if($discount==0 || $discount==5){
                                 echo "0".strval($discount).$cashback;
}else{
echo $discount.$cashback;
}
			}
			else{
				echo $total.'bill_error';
			}
		}
			}
			else{
				echo 'one';
			}
		}
		else{
		echo "sadasds";
		}
	}
}
else{
	echo "rahul";
}
}

		

?>