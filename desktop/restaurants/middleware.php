<?php
session_start();
?>
<?php
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$orders = $request->total;
$bill = $request->amount;
$_SESSION["order"] = $orders;
$_SESSION["bill"] = $bill;
?>