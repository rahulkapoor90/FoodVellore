<?php
session_start();
?>
    <?php
    if($_GET['demand']=="orders"){
$order = $_SESSION['order'];
echo $order;
}
if($_GET['demand']=="user_details"){
	require("./connect1.php");
	$user = $_SESSION['user_login'];
	$sql = "SELECT name,address_line1,address_line2 FROM users WHERE username='$user'";
	if($gresult = mysqli_query($conn,$sql)){
        $data = array();
        while ($row = mysqli_fetch_array($gresult)) {
           $data[] = $row;
}
    print json_encode($data);
    }
    else{
        echo mysqli_error($conn);
    }
}
?>