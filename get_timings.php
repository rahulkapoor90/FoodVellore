<?php
include("./connect1.php");
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$rest_name = $request->rest_name;
$sql="SELECT * FROM `our_tieups` WHERE `rest_name`='$rest_name'";
if($result = mysqli_query($conn,$sql)){
	if(mysqli_num_rows($result)>0){
		$data = array();
		while($row = mysqli_fetch_assoc($result)){
			$data[] = $row;
		}
		print json_encode($data);
	}
	else{
		echo "zero";
	}
}
else{
	echo mysqli_error($conn);
}
?>