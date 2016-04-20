<?php
include("./connect1.php");
$sql="SELECT * FROM `fac_info` WHERE `uid`IN (SELECT `uidnum` FROM `facstatus`)";
if($result = mysqli_query($conn,$sql)){
	if(mysqli_num_rows($result)>0){
		$data = array();
		while($row = mysqli_fetch_assoc($result)){
			$data[] = $row;
		}
		print json_encode($data);
	}
	else{
		echo "no faculty online";
	}
}
else{
	echo mysqli_error($conn);
}
?>