<?php
include('../_includes/db_connect.php');
if(isset($_POST['login_submit'])){
	$username = $_POST['username'];
	$password = $_POST['password'];
	$sql = "SELECT password FROM users WHERE username='$username'";
	$result = mysqli_query($conn,$sql);
	if(mysqli_num_rows($result)==0){
		$_SESSION['login_err'] = "No such user exists";
		header('Location:login.php');

	}
	else if(mysqli_num_rows($result)>0){
		$pass = mysqli_fetch_assoc($result);
		if(md5($password)==$pass['password']){
			$_SESSION['user_login'] = $username;
			header('Location:../index.php');
		}
		else{
			$_SESSION['login_err'] = "Password is incorrect";
			header('Location:login.php');
		}
	}
}
?>
