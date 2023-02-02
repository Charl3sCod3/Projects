<?php 
include '../dbcon.php';
if (isset($bookthisroom)) {
		$book_code = date("ydm").'-'.$user_id.date("his").$room_id;
		$sql = "INSERT IGNORE INTO `booking`
		( `checkIn`, `checkOut`, `u_id`, `room_id`, `book_code`) VALUES 
		('$date_start','$date_end','$user_id','$room_id','$book_code')";
		$query = $con->query($sql);
		$uu_id = $con->insert_id;
		echo $uu_id;
	}
 ?>