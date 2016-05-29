<title>Add Coupons</title>
<?php
require('./connect.php');
$senddata = @$_POST['add_coupon'];
if ($senddata) {
$rest = strip_tags(@$_POST['rest_name']);
$coupon = strip_tags(@$_POST['coupon_code']);
$discount = strip_tags(@$_POST['discount']);
$min = strip_tags(@$_POST['min_bill_amt']);
$validity = strip_tags(@$_POST['validity']);
$cashback = strip_tags(@$_POST['cashback']);
$secret = strip_tags(@$_POST['secret']);
$coupon1 = strtoupper($coupon);

try{
if(!preg_match("/^[0-9 ]*$/",$discount)){
	echo "Only numbers allowed for discount";
}
else if(!preg_match("/^[0-9 ]*$/",$min)){
	echo "Only numbers allowed for min bill amount";
}
else if(!preg_match("/^[0-9 ]*$/",$validity)){
	echo "Only numbers allowed for validity";
}
else if(!preg_match("/^[0-9 ]*$/",$cashback)){
	echo "Only numbers allowed for cashback";
}
else if($secret == "foodonzforever"){
$query = $conn->prepare("INSERT INTO coupons VALUES ('',:rest,:coupon,:discount,:min,:validity,:cashback)");
$query->bindParam(':rest', $rest);
$query->bindParam(':coupon', $coupon1);
$query->bindParam(':discount', $discount);
$query->bindParam(':min', $min);
$query->bindParam(':validity', $validity);
$query->bindParam(':cashback', $cashback);
$query->execute();
echo "Your Coupon has been added";
}
else{
echo "Your secret code is wrong!";
}
}
catch(PDOException $e){
echo $e->getMessage();
}
}
?>
<h2>Add Coupons (For Admins)</h2>
<form method="post" action="add_offers.php">
<input type="text" name="rest_name" placeholder="Add restaurant name without space in between" size="50"><br><br>
<input type="text" name="coupon_code" placeholder="Add Coupon Code"><br><br>
<input type="text" name="discount" placeholder="Add Discount"><br><br>
<input type="text" name="min_bill_amt" placeholder="Add minimum bill amount" size="20"><br><br>
<input type="text" name="validity" placeholder="Add validity"><br><br>
<input type="text" name="cashback" placeholder="Add Cashback"><br><br>
<input type="password" name="secret" placeholder="Enter Secret Code"><br><br>
<input type="submit" value="Submit Coupon" name="add_coupon">
</form>