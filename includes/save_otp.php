<?php 
include '../dbcon.php';
$sql1 = "SELECT * FROM `accounts` WHERE `username`='$username' AND `password`='$password'";
	$query1 = $con->query($sql1);
	$nrow = $query1->num_rows;
	if ($nrow > 0) {
		$row = $query1->fetch_array();
		$sql = "INSERT IGNORE INTO `user_otp`(`u_id`, `otp_code`, `otp_date`) VALUES ('$row[0]','$otp_code','$otp_date')";
		$query = $con->query($sql);
		echo $row[0].'|0';
	}else{
		$rsql="SELECT * FROM `riders` WHERE `r_username`='$username' AND `r_password`='$password' ";
		$rquery = $con->query($rsql);
		$rnumrows = $rquery->num_rows;
		if ($rnumrows > 0) {
			$rrow = $rquery->fetch_array();
			$sql = "INSERT IGNORE INTO `user_otp`(`u_id`, `otp_code`, `otp_date`,`otp_status`) VALUES ('$rrow[0]','$otp_code','$otp_date',1)";
			$query = $con->query($sql);
			echo $rrow[0].'|1';
		}
	}
 ?>