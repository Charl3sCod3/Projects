<?php 
include '../dbcon.php';

	$update = "UPDATE `orderdetails` SET `prep_time`='$value' WHERE `order_id`='$o_id'";
	$upquery = $con->query($update);
 ?>