<?php
	require 'connect.php';
	require 'vendor/autoload.php';
	use Mailgun\Mailgun;
	
	if(isset($_POST['btn1-login']))
	{
		//$user_name = $_POST['user_name'];
		$forgot = strip_tags($_POST['user_forgot']);
		try
		{	
			$stmt = $conn->prepare("SELECT * FROM users WHERE mobile=:username OR username=:user1");
			$stmt->bindParam(":username", $forgot);
			$stmt->bindParam(":user1",$forgot);
			$stmt->execute();
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$count = $stmt->rowCount();
			
			$email = $row['email'];
			$name = $row['name'];
			$pass2 = $row['mobile'];
			$user1 = $row['username'];
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
			$password1 = generateRandomString();
			$password = password_hash($password1, PASSWORD_DEFAULT);
			if ($count>0) {
				# Instantiate the client.
$mgClient = new Mailgun('key-544c2c428251b2ebb2292e4002838d5d');
$domain = "www.foodonz.com";

# Make the call to the client.
$result = $mgClient->sendMessage($domain, array(
    'from'    => 'FoodONZ <no-reply@foodonz.com>',
    'to'      => ''.$email.'',
    'subject' => 'Reset Password - FoodONZ',
    'html'    => '<title>PayUMoney</title>
<table width="580" cellspacing="0" cellpadding="0" border="0" align="center">
<tbody>
<tr>
<td>
<table width="540" cellspacing="0" cellpadding="0" border="0" align="center">
<tbody>
<tr>
<td>
<img height="23" src="https://www.payumoney.com/media/images/mailers_img/space.gif">
</td>
</tr>
<tr>
<td>
<a href="#">
<img border="0" alt="foodonz_logo" width="140px" height="140px" src="http://i.imgur.com/PzeOPHi.png">
</a>
</td>
</tr>
<tr>
<td>
<img height="20" src="https://www.payumoney.com/media/images/mailers_img/space.gif">
</td>
</tr>
<tr>
<td style="color:#666666;font-size:15px;line-height:17px;font-family:Arial, Helvetica, sans-serif;">Dear '.$name.' ('.$user1.'), we have received a password change request from your account. </td>
</tr>
<tr>
<td style="color:#666666;font-size:15px;line-height:17px;font-family:Arial, Helvetica, sans-serif;">
is <a target="_blank" style="color:#d95b23;text-decoration:none;" href="http://www.foodonz.com">'.$password1.'</a>
as your new Password. You can later update the Password after <strong>Logging In</strong> and going to Settings Menu.
</td>
</tr>
<tr>
<td valign="top" style="color:#666666;font-size:15px;line-height:17px;font-family:Arial, Helvetica, sans-serif;">
<br>
From Team,
<br>
FoodONZ
</td>
</tr>
</tbody>
</table>
</td>
</tr>
</tbody>
</table>'
));
$sql = $conn->prepare("UPDATE users SET password=:pass WHERE mobile=:username OR username=:user1");
$sql->bindParam(":username", $forgot);
$sql->bindParam(":pass", $password);
			$sql->bindParam(":user1",$forgot);
			$sql->execute();
echo "ok";
			}
			else{
				
				echo "Username or mobile is incorrect"; // wrong details 
			}
				
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

?>