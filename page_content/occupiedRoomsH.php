<table class="table table-bordered">
	<thead style="text-align: center;background-color: blue;color:white;">
		<tr>
			<th style="vertical-align: middle;">#</th>
			<th style="vertical-align: middle;">Full Name</th>
			<th style="vertical-align: middle;">Check In <br> Date</th>
			<th style="vertical-align: middle;">Check Out <br> Date</th>
			<th style="vertical-align: middle;">Room Name</th>
			<th style="vertical-align: middle;">Number of <br> Persons</th>
			<th style="vertical-align: middle;">Room <br> Number</th>
		</tr>
	</thead>
	<tbody>
		<?php 
				$ocq = occupiedRooms($stab[0]);
				$i=0;
				while($row = $ocq->fetch_array()){
					$i++;
					$customer = getUser($row['u_id']);
		 ?>	
		 	<tr style="text-align: center;cursor: pointer" onclick="occupiedActions('<?php echo $row['booking_id'] ?>')">
		 		<td><?php echo $i ?></td>
		 		<td><?php echo $customer ?></td>
		 		<td><?php echo $row['checkIn'] ?></td>
		 		<td><?php echo $row['checkOut'] ?></td>
		 		<td><?php echo $row['room_name'] ?></td>
		 		<td><?php echo $row['avail_id'] ?></td>
		 		<td><?php echo $row['room_number'] ?></td>
		 	</tr>
		<?php } ?>
	</tbody>
</table>