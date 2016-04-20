<?php
require('./connect1.php');
session_start();
$rest_name = $_SESSION['rest_name'];
$user = $_SESSION['user_login'];
$order_no = $_SESSION['order_no'];
$coupon = $_SESSION['coupon'];
$rest_table = "DELETE FROM `$rest_name` WHERE `order_no`='$order_no'";
$user_table = "DELETE FROM `$user` WHERE `order_no`='$order_no'";
$coupon_table = "DELETE FROM `used_coupons` WHERE `username`='$user' AND `rest_name`='$rest_name' AND `coupon`='$coupon'";
header('Location:final_errors.php');
?>