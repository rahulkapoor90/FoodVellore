<?php
include('./connect1.php');
session_start();
$table = $_SESSION['user_login'];
    $get_string = "SELECT * FROM `$table`";
    if($gresult = mysqli_query($conn,$get_string)){
        $data = array();
        while ($row = mysqli_fetch_array($gresult)) {
  $data[] = $row;
}
    print json_encode($data);
    }
    else{
        echo mysqli_error($conn);
    }
?>