<?php
define("HOST", "localhost");
define("USER", "foodvellore");
define("PASSWORD","foodvellore");
define("DATABASE","foodvellore");

try{
	$mysqli = new mysqli(HOST,USER,PASSWORD,DATABASE);
} catch(Exception $e) {
	echo "Service unavailable";
	echo "messsge: " . $e->message;
	exit;
}
?>