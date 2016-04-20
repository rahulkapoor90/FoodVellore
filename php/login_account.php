<?php
//Login Script
if(isset($_POST["e"])){
    $e = strip_tags($_POST['user_login']); // filter everything but numbers and letters
    $password_login = strip_tags(@$_POST['password_login']); // filter everything but numbers and letters
    $p = md5($password_login);
    if($e == "" || $p == ""){
        echo "login_failed";
        exit();
    } else {
    $sql = $conn->prepare("SELECT id,username FROM users WHERE username=:userlogin LIMIT 1"); 
	$sql->bindParam(':userlogin', $user_login);
	$sql->execute();
    //Check for their existance
    $userCount = $sql->rowCount(); //Count the number of rows returned
    if ($userCount == 1) {
        while($row = $sql->fetch()) {
             $rahul = $row["id"];
             $username = $row["username"];
        }
        $_SESSION["id"] = $rahul;
        $_SESSION["user_login"] = $user_login;
        $_SESSION["password_login"] = $password_login;
        echo $username;
        exit();
    } else {
        echo 'That information is incorrect, try again';
        exit();
    }
}
}
?>