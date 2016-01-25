<?php
$server_name="localhost";
$user="root";
$password="";
$database="foodvellore";
$conn=mysqli_connect($server_name,$user,$password,$database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>