<?php 
include '../dbcon.php';

 $sql = "DELETE FROM `orderdetails` WHERE `o_id`='$order_id'";
	$query = $con->query($sql);

	$res = CountNumberOfItem($ur_id);
	echo $res;
 ?>