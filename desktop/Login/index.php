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
    echo "<meta http-equiv=\"refresh\" content=\"0; url=../dashboard\">";	
}
?>
<?php
//Login Script
if (isset($_POST["user_login"]) && isset($_POST["password_login"])) {
    $user_login = strip_tags($_POST['user_login']); // filter everything but numbers and letters
    $password_login = strip_tags(@$_POST['password_login']); // filter everything but numbers and letters
    $md5password_login = md5($password_login);
    $sql = $conn->prepare("SELECT id FROM users WHERE username=:userlogin LIMIT 1"); 
	$sql->bindParam(':userlogin', $user_login);
	$sql->execute();
    //Check for their existance
    $userCount = $sql->rowCount(); //Count the number of rows returned
    if ($userCount == 1) {
        echo "Yo";
        while($row = $sql->fetch()) {
             $rahul = $row["id"];
        }
        $_SESSION["id"] = $rahul;
        $_SESSION["user_login"] = $user_login;
        $_SESSION["password_login"] = $password_login;
        exit("<meta http-equiv=\"refresh\" content=\"0\">");
    } else {
        echo 'That information is incorrect, try again';
        exit();
    }
}
?>
<!Doctype html>
<html>
<head lang="en-us">
	  <meta charset="utf-8">
	  <title>FoodONZ | Log In</title>
	  <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <!--Let browser know website is optimized for mobile-->
      <link type="text/css" rel="stylesheet" href="../stylesheets/reg_style.css">
	  <link type="image/x-icon" rel="shortcut icon" href="http://i.imgur.com/xl1WjhW.png"/>
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	  <link href="../stylesheets/login_nav.css" rel="stylesheet">
</head>
<body class="foodvellore" role="document">
<div class="container">
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
<a href="http://www.foodonz.com">
<p><img src="http://i.imgur.com/PzeOPHi.png" width="200px" height="180px"></img></p>
</a>
<h1 style="text-align: center;">Log In to get started.</h1>
</header>
<div id="authview">
<form id="new_user" class="simple_form authform js-new-session-form" role="form" novalidate="novalidate" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" accept-charset="UTF-8" autocomplete="off">
<fieldset>
<div class="form__group">
<input id="user_email" class="form__control" type="text" value="" autofocus="autofocus" required="required" placeholder="Your Email ID" name="user_login">
</div>
<div class="form__group">
<input id="user_password" class="form__control" type="password" placeholder="Enter password" name="password_login">
</div>
</fieldset>
<footer class="form__actions">
<input class="" type="submit" value="Log In" name="reg">
</footer>
</form>
</div>
</div>
</body>
</html>

