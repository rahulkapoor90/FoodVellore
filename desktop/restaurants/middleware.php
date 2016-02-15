<?php
session_start();
?>
<?php
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$total = $request->total;
$_SESSION["total"] = $total;
?>