<?php
$server_name="localhost";
$user = "foodwcpp_foodonz";
$password = "Foodonz9";
$database = "foodwcpp_foodonz";
$conn=mysqli_connect($server_name,$user,$password,$database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>