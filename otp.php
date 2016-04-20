<?php
if($_GET['type']=="success"){
    echo '<form method="post" action="otp_verify.php">
         <input type="text" name="otp" placeholder="Please enter the otp" required>
         <br />
         <input type="submit" name="submit" value="submit">
         </form>';
}
    ?>