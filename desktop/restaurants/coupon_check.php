<?php
include('../_includes/db_connect.php');
session_start();
?>
<?php
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$coupon = $request->coupon;
$rest_name = $request->rest_name;
$sql = "SELECT discount FROM coupons WHERE coupon_code='$coupon' AND rest_name='$rest_name'";
$result = mysqli_query($conn,$sql);
if(mysqli_num_rows($result)>0){
	$row = mysqli_fetch_assoc($result);
	$data = $row['discount'];
	echo $data;
}
else{
	echo "no";
}
?>