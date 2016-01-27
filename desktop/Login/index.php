<?php
$conn = mysqli_connect("localhost","root","","foodvellore") or die(mysql_error());
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
//Login Script
if (isset($_POST["user_login"]) && isset($_POST["password_login"])) {
    $user_login = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["user_login"]); // filter everything but numbers and letters
    $password_login = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password_login"]); // filter everything but numbers and letters
    $md5password_login = md5($password_login);
    $sql = mysqli_query($conn, "SELECT id FROM users WHERE username='$user_login' LIMIT 1"); // query the person
    //Check for their existance
    $userCount = mysqli_num_rows($sql); //Count the number of rows returned
    if ($userCount == 1) {
        while($row = mysqli_fetch_array($sql,MYSQLI_ASSOC)) {
             $rahul = $row["id"];
        }
        $_SESSION["id"] = $rahul;
        $_SESSION["user_login"] = $user_login;
        $_SESSION["password_login"] = $password_login;
        // exit("<meta http-equiv=\"refresh\" content=\"0\">");
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
	  <title>Food Vellore | Register</title>
	  <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <!--Let browser know website is optimized for mobile-->
      <link type="text/css" rel="stylesheet" href="../stylesheets/reg_style.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body class="foodvellore" role="document">
<div id="main" class="main_authentication" role="main">
<header class="header">
<a href="/">
<p>Food Vellore</p>
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
<input class="" type="submit" value="Register" name="reg">
</footer>
</form>
</div>
</div>
</body>
</html>

