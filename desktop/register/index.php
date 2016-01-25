<?php
$conn = mysqli_connect("localhost","root","","foodvellore") or die(mysql_error());
if(!$conn){
	echo "Unable to connect to database.";
}
session_start();
if (isset($_SESSION['user_login'])) {
$user = $_SESSION["user_login"];
}
else {
$user = "";
}
if (!isset($_SESSION["user_login"])) {
    echo "";
}
else
{
    echo "fuck off.";	
}
?>
<?php
$reg = @$_POST['reg'];
$name = "";
$email = "";
$pswd = "";
$username = "";
$name = strip_tags(@$_POST['name']);
$email = strip_tags(@$_POST['email']);
$pswd = strip_tags(@$_POST['password']);
$username = strip_tags(@$_POST['username']);
if($reg) {
$e_check = mysqli_query($conn,"SELECT email FROM users WHERE email='$email'");
//Count the number of rows returned
$email_check = mysqli_num_rows($e_check);	
$u_check = mysqli_query($conn,"SELECT username FROM users WHERE username='$username'");
// Count the amount of rows where username = $un
$check = mysqli_num_rows($u_check);
if(empty($name) || empty($email) || empty($username) || empty($pswd)){
	echo "Please fill all the fields.";
}
else if($email_check == 1){
	echo "That email Address also exists";
}
else if($check == 1) {
	echo "Username already exists.";
}
else if(strlen($username) <5){
	echo "Username length must be more than 5 characters.";
}
else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
	echo "Invalid Email Address";
}
else if(!preg_match("/^[a-zA-Z ]*$/",$name)){
	echo "Only letters and white spaces allowed.";
}
else {
$pswd = md5($pswd);
$query = mysqli_query($conn,"INSERT INTO users VALUES ('','$username','$name','$email','$pswd','')");
header("Location: ../index.php");
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Food Vellore | Register</title>
<LINK rel="stylesheet" href="../stylesheets/reg_style.css" type="text/css">
</head>
<body class="foodvellore" role="document">
<div id="main" class="main_authentication" role="main">
<header class="header">
<a href="/">
<p>Food Vellore</p>
</a>
<h1>Food in Vellore hasn't been simpler than this.</h1>
</header>
<div id="authview">
<form id="new_user" class="simple_form authform js-new-session-form" role="form" novalidate="novalidate" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" accept-charset="UTF-8" autocomplete="off">
<fieldset>
<div class="form__group">
<input id="user_email" class="form__control" type="text" value="" autofocus="autofocus" required="required" placeholder="Your Name" name="name">
</div>
<div class="form__group">
<input id="user_email" class="form__control" type="email" value="" required="required" placeholder="Enter email" name="email">
</div>
<div class="form__group">
<input id="user_email" class="form__control" type="text" value="" autofocus="autofocus" required="required" placeholder="Username" name="username">
</div>
<div class="form__group">
<input id="user_password" class="form__control" type="password" placeholder="Enter password" name="password">
</div>
</fieldset>
<footer class="form__actions">
<input class="" type="submit" value="Register" name="reg">
</footer>
</form>
</div>
</div>
</body>
</html>