<?php
include('../_includes/db_connect.php');
if(isset($_POST['login_submit'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$sql = "SELECT password FROM "
}