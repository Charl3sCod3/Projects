<?php 
	include '../dbcon.php';
	$update = "UPDATE `orderdetails` SET `qtty`='$value' WHERE `o_id`='$o_id' AND `u_id`='$ur_id' AND `delivery_status`=0 ";
	$uquery = $con->query($update);
	echo $ur_id;
 ?>