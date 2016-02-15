<?php
include('../_includes/db_connect.php');
echo "done";
$username = $_GET['user'];
$password = $_GET['pass'];
$email = "";
$sql = "SELECT email FROM users WHERE username='$username'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0){
	$row = mysqli_fetch_assoc($result);
	$email = $row['email'];
}
else{
	echo "no such user exists";
}
$to = $email;
$from = "gopalchandak95@gmail.com";
$message = "
<html>
<head>
<title>Password Reset</title>
</head>
<body>
<p>Please click on this link to reset your passowrd</p>
<a href='www.foodonz.com/login/reset.php?user=".$username."'>Rest Password</a>
</body>
</html>
";
$subject = "Password Reset";
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <gopalchandak95@gmail.com>' . "\r\n";
mail($to,$subject,$message,$headers);
echo '<script>alert("Password reset mail has been sent to'.$email.'");</script>';
?>