<?php
require("./header.php");
require("./php/user_session.php");
?>
<?php
if (!isset($_SESSION["user_login"])) {
    echo "<meta http-equiv=\"refresh\" content=\"0; url=/index.php\">";
}
else
{
}
$name = $conn->prepare("SELECT name,email FROM users WHERE username=:user");
$name->bindParam(':user', $user);
$name->execute();
 while($row = $name->fetch()) {
             $name1 = $row["name"];
$email = $row["email"];
        }
?>
<link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.indigo-amber.min.css">
<script defer src="https://code.getmdl.io/1.1.3/material.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script type="text/javascript" src="validation.min.js"></script>
<script type="text/javascript" src="update-pass.js"></script>
<script type="text/javascript" src="update-basic.js"></script>
<div id="product-list">
<div class="container">
<h2 style="font-family: 'Quicksand' !important;">Settings</h2>
<span>Change your account details and manage your settings</span>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12">
<h3 style="font-family: 'Quicksand' !important;">Change Password</h3>
<form class="form-horizontal" role="form" method="post" id="update-pass">
 <div id="uperror">
        <!-- error will be shown here ! -->
        </div>
<div class="form-group">
    <label class="control-label col-sm-2" for="email">Old Password:</label>
    <div class="col-sm-10">
      <input type="password" class="form-control pass" id="oldpass" name="oldpass" placeholder="Enter Old Password" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">New Password:</label>
    <div class="col-sm-10"> 
      <input type="password" class="form-control pass" id="newpass" name="newpass" placeholder="Enter new password">
    </div>
  </div>
 <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Repeat Password:</label>
    <div class="col-sm-10"> 
      <input type="password" class="form-control pass" id="newpass1" name="newpass1" placeholder="Enter password again">
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect" name="senddata" id="senddata">
    		<span class="glyphicon glyphicon-log-in"></span> &nbsp; Update Password
			</button> 
    </div>
  </div>
</form>
</div>
<div class="col-md-6 col-xs-12 col-sm-6">
<h3  style="font-family: 'Quicksand' !important;">Basic Information</h3>
<form class="form-horizontal" role="form" method="post" id="update-basic">
 <div id="uperror1">
        <!-- error will be shown here ! -->
        </div>
<div class="form-group">
    <label class="control-label col-sm-2" for="name">Your Name:</label>
    <div class="col-sm-10">
      <input type="text" class="form-control pass" id="upname" name="upname" value="<?php echo $name1; ?>" placeholder="Update your name" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Your Email:</label>
    <div class="col-sm-10"> 
      <input type="text" class="form-control pass" id="upemail" name="upemail" value="<?php echo $email; ?>" placeholder="Enter new Email">
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-2 col-sm-10">
 <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored mdl-js-ripple-effect" name="sendbasic" id="sendbasic">
    		<span class="glyphicon glyphicon-log-in"></span> &nbsp; Update Information
			</button> 
    </div>
  </div>
</div>
</form>
</div>
</div>

</div>
</div>

<?php
require("./footer.php");
?>