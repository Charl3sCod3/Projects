<?php 
include '../dbcon.php';
if (isset($loginuser) && !isset($otpcode)) { 
	$today = date("Y-m-d");
	$sql = "SELECT * FROM `accounts` WHERE `username`='$username' AND `password`='$password'";
	$query = $con->query($sql);
	$row = $query->fetch_array();
	 $numrows = $query->num_rows;
	if ($numrows > 0) {
		if ($row['position'] == 4) {
				echo "1|0";
		}else{
			if ($row['status']>0) {
				echo "1|0";
				}else{
					echo "2|0";
				} 
		}
	}else{
		$rsql="SELECT * FROM `riders` WHERE `r_username`='$username' AND `r_password`='$password' ";
		$rquery = $con->query($rsql);
		$rrow = $rquery->fetch_array();
		$rnumrows = $rquery->num_rows;
		if ($rnumrows > 0) {
			// $_SESSION['rrid'] = $rrow['r_id'];
			echo "1|0";
		}else{
			echo "0|0";
		}
	}
}
// if (isset($loginuser) && isset($otpcode)) {
// 		$today = date("Y-m-d");
// 	$sql = "SELECT * FROM `accounts` WHERE `username`='$username' AND `password`='$password'";
// 	$query = $con->query($sql);
// 	$row = $query->fetch_array();
// 	 $numrows = $query->num_rows;
// 	if ($numrows > 0) {
// 		if ($row['position'] == 4) {
// 			$_SESSION['userid'] = $row['u_id'];
// 				echo "login_success";
// 		}else{
// 			if ($row['status']>0) {
// 					$_SESSION['userid'] = $row['u_id'];
// 				echo "login_success";
// 				}else{
// 					echo "2";
// 				} 
// 		}
// 	}else{
// 		$rsql="SELECT * FROM `riders` WHERE `r_username`='$username' AND `r_password`='$password' ";
// 		$rquery = $con->query($rsql);
// 		$rrow = $rquery->fetch_array();
// 		$rnumrows = $rquery->num_rows;
// 		if ($rnumrows > 0) {
// 			$_SESSION['rrid'] = $rrow['r_id'];
// 			echo "1";
// 		}else{
// 			echo "0";
// 		}
// 	}
// }
 ?>