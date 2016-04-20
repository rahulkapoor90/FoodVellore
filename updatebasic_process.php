<?php
require 'connect.php';
require('./php/user_session.php'); 
$upname = strip_tags($_POST['upname']);
$upemail = strip_tags($_POST['upemail']);
try{
$stmt = $conn->prepare("SELECT * FROM users WHERE username=:user");
			$stmt->bindParam(":user",$user);
			$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$count = $stmt->rowCount();
$name = $row['name'];
$email = $row['email'];
if ($name == $upname && $email == $upemail) {
echo "You haven't made any changes to your basic information";
}
else{
$stmt1 = $conn->prepare("UPDATE users SET name=:name WHERE username=:user");
			$stmt1->bindParam(":user",$user);
                        $stmt1->bindParam(":name",$upname);
			$stmt1->execute();
$stmt2 = $conn->prepare("UPDATE users SET email=:email WHERE username=:user");
			$stmt2->bindParam(":user",$user);
                        $stmt2->bindParam(":email",$upemail);
			$stmt2->execute();
echo "okay";
}

}
		catch(PDOException $e){
			echo $e->getMessage();
		}
?>