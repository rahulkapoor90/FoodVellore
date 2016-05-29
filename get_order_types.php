<?php
require('./connect1.php');
session_start();
$rest=$_SESSION['rest_name'];
$sql = "select order_types from our_tieups where rest_name='$rest'";
$result = mysqli_query($conn,$sql);
$response = mysqli_fetch_assoc($result);
$ot=$response['order_types'];
echo $ot;
?>
