<?php
session_start();
?>
<?php
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$orders = $request->total;
$bill = $request->amount;
$customer_amount= $request->bill_amount;
$cashback= $request->cashback;
$_SESSION["order"] = $orders;
$_SESSION["bill"] = $bill;
$_SESSION["customer_bill"] = $customer_amount;
$_SESSION["cashback"] = $cashback;
?>