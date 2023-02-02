<table id="example1" class=" reservationTable table-bordered table" style="font-size:14px;">
	<thead style="text-align: center;">
		<tr>
			<th style="vertical-align: middle;">#</th>
			<th style="vertical-align: middle;">Full Name</th>
			<th style="vertical-align: middle;">Check In <br> Date</th>
			<th style="vertical-align: middle;">Check Out <br> Date</th>
			<th style="vertical-align: middle;">Room Name</th>
			<th style="vertical-align: middle;">Room <br> Number</th>
			<th style="vertical-align: middle;">Booking Code</th>
		</tr>
	</thead>
	<tbody>
		<?php 
				$today = date("Y-m-d");
				$enddate = date('Y-m-d', strtotime('+5 years'));	
				$thes = "SELECT * FROM `room_details` WHERE 1=1 AND  `rd_id`=0 and `sd_id`='$stab[0]'  ORDER BY `avail_id` ASC";
								$thesq = $con->query($thes);
								$i=0;
								while ($srow = $thesq->fetch_array()) {
								 $rid = $srow['room_id'];
								 $sql="SELECT * FROM  `booking` WHERE `paymentgcash_status` > 0 AND `room_id`='$rid' AND `status`=0 AND `checkIn` between '$today' AND '$enddate' ";
									$query =  $con->query($sql);
									$brow = $query->fetch_array();
									$nrow = $query->num_rows;
									if ($nrow > 0) { $i++; ?>
										<tr onclick="CheckInClient('<?php echo $brow[0] ?>')">
											<td><?php echo $i ?></td>
											<td><?php echo getUser($brow['u_id']); ?></td>
											<td><?php echo $brow['checkIn'] ?></td>
											<td><?php echo $brow['checkOut'] ?></td>
											<td><?php echo $srow['room_name'] ?></td>
											<td style="text-align: center"><?php echo $srow['room_number'] ?></td>
											<td style="text-align: center;"><?php echo $brow['book_code'] ?></td>
										</tr>
									<?php } }  ?>
	</tbody>
</table>