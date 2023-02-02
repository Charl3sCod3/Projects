<?php 
include '../dbcon.php';
		$amm = 0;
	foreach ($o_id as $key => $value) {
		$quantity = $qtty[$key];
		$ammount = $amount[$key]-5;
		$amm = $amm +$ammount;

		$update  = "UPDATE `orderdetails` SET `qtty`='$quantity' WHERE `o_id`='$value' ";
		$uquery = $con->query($update);
	}
	// echo $amm;
	  $guserdata = "SELECT * FROM `accounts` WHERE `u_id`='$uid'";
	  $gudquery = $con->query($guserdata);
	  $gudrow = $gudquery->fetch_array();
	  $fullname = $gudrow['lname'].', '.$gudrow['fname'];
	  $contact = $gudrow['contactnumber'];
	  $todate = date("Y-m-d");
	  $random_color = '-' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
	  $orderId = date("Y-m").$random_color;
	  $updateOrder = "UPDATE `orderdetails` SET `delivery_status` = 1 , `delivery_date` = '$todate', `order_id`='$orderId',`delivery_address` = '$del_add',`b_id`= '$barangay' WHERE `u_id`='$uid' AND `delivery_status` = 0 ";
	$uoquery = $con->query($updateOrder);
		if ($uoquery) {
			echo '<script> window.location.href="'.$_SERVER['HTTP_REFERER'].'"</script>';
		}

 ?>
