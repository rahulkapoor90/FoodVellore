<?php
$user = "root";
$password = "";
$database_name = "foodvellore";
$hostname = "localhost";
$dsn = 'mysql:dbname=' . $database_name . ';host=' . $hostname;
try{
$conn = new PDO($dsn, $user, $password);
array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
	echo "An error occured with the connection";
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
    echo "<meta http-equiv=\"refresh\" content=\"0; url=../home.php\">";	
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
$e_check = $conn->prepare("SELECT email FROM users WHERE email=:email");
$e_check->bindParam(':email', $email);
$u_check = $conn->prepare("SELECT username FROM users WHERE username=:username");
$u_check->bindParam(':username', $username);
// Count the amount of rows where username = $un

if(empty($name) || empty($email) || empty($username) || empty($pswd)){
	echo "Please fill all the fields.";
}
else if($e_check->rowCount() == 1){
	echo "That email Address also exists";
}
else if($u_check->rowCount() == 1) {
	echo "Username already exists.";
}
else if(strlen($username) <5){
	echo "Username length must be more than 5 characters.";
}
else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
	echo "Invalid Email Address";
}
else if(!preg_match("/^[a-zA-Z ]*$/",$name)){
	echo "Only letters and white spaces allowed for name.";
}
else {
$pswd = md5($pswd);
$query = $conn->prepare("INSERT INTO users(id,username,name,email,password,contact_number) VALUES ('',:username,:name,:email,:pswd,'')");
$query->bindParam(':name', $name);
$query->bindParam(':username', $username);
$query->bindParam(':email', $email);
$query->bindParam(':pswd', $pswd);
 
$query->execute();
header("Location: ../login");
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Food Vellore | Register</title>
<link rel="stylesheet" href="../stylesheets/reg_style.css" type="text/css">
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