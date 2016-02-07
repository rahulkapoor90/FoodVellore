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
$error = "";
$name = strip_tags(@$_POST['name']);
$email = strip_tags(@$_POST['email']);
$pswd = strip_tags(@$_POST['password']);
$username = strip_tags(@$_POST['username']);
if($reg) {
$e_check = $conn->prepare("SELECT email FROM users WHERE email=:email");
$e_check->bindParam(':email', $email);
$e_check->execute();
$u_check = $conn->prepare("SELECT username FROM users WHERE username=:username");
$u_check->bindParam(':username', $username);
$u_check->execute();
// Count the amount of rows where username = $un

if(empty($name) || empty($email) || empty($username) || empty($pswd)){
	$error =  "<div style='width:80%;
	background-color: #d9534f;
  padding:10px;
  margin:10px auto;
  font-size: 16px;'>Please fill all the fields.</div>";
}
else if($e_check->rowCount() == 1){
	$error = "<div style='width:80%;
	background-color: #d9534f;
  padding:10px;
  margin:10px auto;
  font-size: 16px;'>That email Address already exists.</div>";
}
else if($u_check->rowCount() == 1) {
	$error = "<div style='width:80%;
	background-color: #d9534f;
  padding:10px;
  margin:10px auto;
  font-size: 16px;'>Username already exists.</div>";
}
else if(strlen($username) <5){
	$error = "<div style='width:80%;
	background-color: #d9534f;
  padding:10px;
  margin:10px auto;
  font-size: 16px;'>Username length must be more than 5 characters.</div>";
}
else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
	$error = "<div style='width:80%;
	background-color: #d9534f;
  padding:10px;
  margin:10px auto;
  font-size: 16px;'>Invalid Email Address</div>";
}
else if(!preg_match("/^[a-zA-Z ]*$/",$name)){
	$error = "<div style='width:80%;
	background-color: #d9534f;
  padding:10px;
  margin:10px auto;
  font-size: 16px;'>Only letters and white spaces allowed for name.</div>";
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
<title>FoodOnz | Register</title>
<link rel="stylesheet" href="../stylesheets/reg_style.css" type="text/css">
<link href="../stylesheets/login_nav.css" rel="stylesheet">
 <link type="image/x-icon" rel="shortcut icon" href="http://i.imgur.com/xl1WjhW.png"/>
</head>
<body class="foodvellore" role="document">
<div id="navbar">
  <div id="navwrap">
  <a href="http://www.foodonz.com"><img src="http://i.imgur.com/PrhpUCC.png" width="160px" height="50px" id="logo_main"></img></a>
    <ul>
      <li><a href="/foodonz-desktop/desktop/login">Log In</a></li>
      <li><a href="/foodonz-desktop/desktop/register">Register</a></li>
    </ul>
  </div>
</div>
<div id="main" class="main_authentication" role="main">
<header class="header">
<a href="/">
<p>FoodONZ</p>
</a>
<h1>Food in Vellore hasn't been simpler than this.</h1>
<?php echo $error; ?>
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