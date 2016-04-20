<?php
session_start();
if (isset($_SESSION['user_login'])) {
$user = $_SESSION["user_login"];
}
else {
$user = "";
}
?>
<?php
$server_name="localhost";
$user="root";
$password="";
$database="foodonz";
$conn=mysqli_connect($server_name,$user,$password,$database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
<?php
// AJAX CALLS THIS LOGIN CODE TO EXECUTE
if(isset($_POST["e"])){
	// CONNECT TO THE DATABASE
	// GATHER THE POSTED DATA INTO LOCAL VARIABLES AND SANITIZE
	$e = mysqli_real_escape_string($conn, $_POST['e']);
	$p = md5($_POST['p']);
	// FORM DATA ERROR HANDLING
	if($e == "" || $p == ""){
		echo "login_failed";
        exit();
	} else {
	// END FORM DATA ERROR HANDLING
		$sql = "SELECT id, username, password FROM users WHERE username='$e' LIMIT 1";
        $query = mysqli_query($db_conx, $sql);
        $row = mysqli_fetch_row($query);
		$db_id = $row[0];
		$db_username = $row[1];
        $db_pass_str = $row[2];
		if($p != $db_pass_str){
			echo "login_failed";
            exit();
		} else {
			// CREATE THEIR SESSIONS AND COOKIES
		 $_SESSION["id"] = $db_id;
        $_SESSION["user_login"] = $db_username;
        $_SESSION["password_login"] = $db_pass_str;
			echo $db_username;
		    exit();
		}
	}
	exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Log In</title>
<style type="text/css">
#loginform{
	margin-top:24px;	
}
#loginform > div {
	margin-top: 12px;	
}
#loginform > input {
	width: 200px;
	padding: 3px;
	background: #F3F9DD;
}
#loginbtn {
	font-size:15px;
	padding: 10px;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>

<script>
function emptyElement(x){
	(x).innerHTML = "";
}
function login(){
	var e = ("email").value;
	var p = ("password").value;
	if(e == "" || p == ""){
		("status").innerHTML = "Fill out all of the form data";
	} else {
		("loginbtn").style.display = "none";
		("status").innerHTML = 'please wait ...';
		var ajax = ajaxObj("POST", "test.php");
        ajax.onreadystatechange = function() {
	        if(ajaxReturn(ajax) == true) {
	            if(ajax.responseText == "login_failed"){
					("status").innerHTML = "Login unsuccessful, please try again.";
					("loginbtn").style.display = "block";
				} else {
					window.location = "user.php?u="+ajax.responseText;
				}
	        }
        }
        ajax.send("e="+e+"&p="+p);
	}
}
</script>
</head>
<body>
<div id="pageMiddle">
  <h3>Log In Here</h3>
  <!-- LOGIN FORM -->
  <form id="loginform" onsubmit="return false;">
    <div>Email Address:</div>
    <input type="text" name="e" id="email" onfocus="emptyElement('status')" maxlength="88">
    <div>Password:</div>
    <input type="password" name="p" id="password" onfocus="emptyElement('status')" maxlength="100">
    <br /><br />
    <button id="loginbtn" onclick="login()">Log In</button> 
    <p id="status"></p>
    <a href="#">Forgot Your Password?</a>
  </form>
  <!-- LOGIN FORM -->
</div>
</body>
</html>