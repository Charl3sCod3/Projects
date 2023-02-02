<?php 
	include '../dbcon.php';
		$sql = "SELECT * FROM `barangay` WHERE `brgy_id`='$b_id'";
		$query = $con->query($sql);
		$row = $query->fetch_array();
		echo $row['delivery_fee'];
		$updatedata = "UPDATE `orderdetails` SET `b_id`='$row[0]' WHERE `u_id`='$user_id' AND `delivery_status`=0 ";
		$updatequery = $con->query($updatedata);
 ?>