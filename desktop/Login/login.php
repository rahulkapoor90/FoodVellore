<!Doctype html>
<html>
<head lang="en-us">
	  <meta charset="utf-8">
	  <title>FoodVellore</title>
	  <!--Import Google Icon Font-->
      <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../materialize/css/materialize.min.css"  media="screen,projection"/>
      <!--Let browser know website is optimized for mobile-->
      <link type="text/css" rel="stylesheet" href="../css/login.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
	<div class="container">
		<div class="col s12 m12 l4 offset-l4 z-depth-5 container login_box">
			<form name="login" action="auth.php" method="post" class="container">
				<span><?php echo $_SESSION['login_err']; ?></span>
				<br />
				<h4>Username</h4>
				<input type="text" name="username" placeholder="Enter the Username" required />
				<h4>Password</h4>
				<input type="password" name="password" placeholder="Enter your password" required />
				<br />
				<div class="row">
					<div class="col l4 offset-l4 s12">
				      <button type="submit" class="btn waves-effect waves-light z-depth-2 login_submit" name="login_submit">LogIn
				      <i class="material-icons right">send</i>
				      </button>
				    </div>
				</div>
			</form>
		</div>
	</div>
	<script type="text/javascript" src="../materialize/js/materialize.min.js" />
</body>
</html>

