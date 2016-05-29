<?php
require_once('twilio-php-master/Services/Twilio.php'); // Loads the library

$version = "2010-04-01"; // Twilio REST API version

// Set our Account SID and AuthToken
$AccountSid = "ACb19eeeaf4f63fcc78b19b293d54b490c";
$AuthToken = "44452addcb1df3e80171a8491953d6e7";

$client = new Services_Twilio($AccountSid, $AuthToken, $version); //initialise the Twilio client

try{
$message = $client->account->messages->create(array(
    "From" => "+19546076780",
    "To" => "+918220584301",
    "Body" => "Test message!",
));

// Display a confirmation message on the screen
echo "Sent message";
}catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
?>