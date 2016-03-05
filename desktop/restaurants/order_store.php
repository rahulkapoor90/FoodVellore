<?php
include('../_includes/db_connect.php');
session_start();
$insert_sql="";
$ctime = date("H:i:s", strtotime($_POST['time']));
$time = date("H:i:s", strtotime(time()));
$ttt = time();
 $rest_name = $_SESSION['rest_name'];
    
    $order = $_SESSION['order'];
    $user = $_SESSION['username'];
    $bill = $_SESSION['bill'];
if((strtotime($_POST['time']))<$ttt){
    echo '<script>
    alert("'.$ctime.'and'.$time.'");
    window.location.href = "checkout.php";
</script>';
}
else{
    $check="SELECT `order_id` FROM `$rest_name`";
    $result = mysqli_query($conn,$check);
    if(empty($result)){
    $queryCreateUsersTable = "CREATE TABLE `$rest_name` (
    `order_id` int(11) unsigned NOT NULL auto_increment,
    `orders` varchar(500) NOT NULL,
    `amount` int(11) NOT NULL,
    `time` time NOT NULL,
    `order_time` datetime NOT NULL default CURRENT_TIMESTAMP,
    `username` varchar(60) NOT NULL,
    PRIMARY KEY  (`order_id`)
)";
    if(mysqli_query($conn,$queryCreateUsersTable)){
        echo "Table Created";
    }
    else{
        echo mysqli_error($conn);
    }
    }
         $insert_sql = "INSERT INTO $rest_name (`orders`,`amount`,`time`,`username`)  VALUES('$order', $bill, '$ctime','$user')";
   
        if(mysqli_query($conn,$insert_sql)){
            echo "yayaya";
        }
            else{
                echo mysqli_error($conn);
            }
}
?>