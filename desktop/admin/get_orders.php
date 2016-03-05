<?php
include('../_includes/db_connect.php');
session_start();
$table = $_SESSION['admin_name'];
    $get_string = "SELECT * FROM $table  WHERE `status`=0 ";
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