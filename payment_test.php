<?php
$MERCHANT_KEY="psuoYOFt";
$SALT = "K4stP5f05X";
$PAYU_BASE_URL = "https://secure.payu.in";
$txnid = "DEMO1";
$amount = "50";
$productinfo = "Foodonz order";
$firstname="gopal";
$email="gopalchandak95@gmail.com";
$success = "https://foodonz.com/success.php";
$failure = "https://foodonz.com/failure.php";
$phone="8148277632";
$hash_string = $MERCHANT_KEY.'|'.$txnid.'|'.$amount.'|'.$productinfo.'|'.$firstname.'|'.$email.'|'.''.'|'.''.'|'.''.'|'.''.'|'.''.'|'.''.'|'.''.'|'.''.'|'.''.'|'.''.'|'.'';
$hash_string=$hash_string.$SALT;
$hash = strtolower(hash('sha512', $hash_string));
$action = $PAYU_BASE_URL . '/_payment';
?>
<form action="<?php echo $action; ?>" method="post" name="payuForm">
      <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
        <input type="hidden" name="hash_abc" value="<?php echo $hash_string ?>"/>
      <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
     <input type="hidden" name="service_provider" value="payu_paisa" />
      <table>
        <tr>
          <td>Amount: </td>
          <td><input name="amount" value="<?php echo $amount?>" /></td>
          <td>First Name: </td>
          <td><input name="firstname" id="firstname" value="<?php echo $firstname ?>" /></td>
        </tr>
        <tr>
          <td>Email: </td>
          <td><input name="email" id="email" value="<?php echo $email?>" /></td>
          <td>Phone: </td>
          <td><input name="phone" value="<?php echo $phone?>" /></td>
        </tr>
        <tr>
          <td>Product Info: </td>
          <td colspan="3"><textarea name="productinfo"><?php echo $productinfo ?></textarea></td>
        </tr>
        <tr>
          <td>Success URI: </td>
          <td colspan="3"><input name="surl" value="<?php echo $success?>" size="64" /></td>
        </tr>
        <tr>
          <td>Failure URI: </td>
          <td colspan="3"><input name="furl" value="<?php echo $failure?>" size="64" /></td>
        </tr>
        <tr>
            <td colspan="4"><input type="submit" value="Submit" /></td>
        </tr>
      </table>
    </form>