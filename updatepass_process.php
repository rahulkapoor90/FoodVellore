<?php
require 'connect.php';
require('./php/user_session.php'); 

$oldpass = strip_tags($_POST['oldpass']);
$newpass = strip_tags($_POST['newpass']);
$newpass1 = strip_tags($_POST['newpass1']);
try{
$stmt = $conn->prepare("SELECT * FROM users WHERE username=:user");
			$stmt->bindParam(":user",$user);
			$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$count = $stmt->rowCount();
$db_pass = $row['password'];
$pswd = password_hash($oldpass, PASSWORD_DEFAULT);
$new = password_hash($newpass, PASSWORD_DEFAULT);
$new1 = password_hash($newpass1, PASSWORD_DEFAULT);

if (password_verify($oldpass, $db_pass)) {
if ($newpass == $newpass1) {
$pswd1 = password_hash($newpass1, PASSWORD_DEFAULT);
$stmt1 = $conn->prepare("UPDATE users SET password=:pass WHERE username=:user");
			$stmt1->bindParam(":user",$user);
                        $stmt1->bindParam(":pass",$pswd1);
			$stmt1->execute();
echo "ok";
}
else{
echo "Your new and repeat passwords does not match, please try again";
}
}
else{
echo "Your old password is incorrect, please try again";
}
}
		catch(PDOException $e){
			echo $e->getMessage();
		}

?>