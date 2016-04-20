<?php
	require 'connect.php';

	if(isset($_POST['btn-login']))
	{
		//$user_name = $_POST['user_name'];
		$username = trim($_POST['user_username']);
		$user_password = strip_tags($_POST['password']);
		try
		{	
		
			$stmt = $conn->prepare("SELECT * FROM users WHERE mobile=:username OR username=:user1");
			$stmt->bindParam(":username", $username);
			$stmt->bindParam(":user1",$username);
			$stmt->execute();
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$count = $stmt->rowCount();
			
			$pass1 = $row['password'];
			$pass2 = $row['mobile'];
			$user1 = $row['username'];

			if (password_verify($user_password, $pass1)) {
				
				echo "signed"; // log in
				session_start();
				$_SESSION["id"] = $row['id'];
				$_SESSION["user_login"] = $user1;
				$_SESSION["password_login"] = $user_password;
				
			}
			else{
				
				echo "Username or Password is incorrect"; // wrong details 
			}
				
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

?>