	 		<div class="row" style="margin-top: 1em;">
	 		<div class="col-md-12">
	 			<div class="card">
			 		<div class="card-header">
			 			<h4 class="card-title">LIST OF Gcash Online Food Orders</h4>
			 		</div>
			 		<div class="card-body">
			 			<table id="roombok" class="table table-bordered">
			 				<thead>
			 					<tr>
			 						<td>Order Id</td>
			 						<th>Fullname</th>
			 						<th>Amount</th>
			 						<th>Order_date</th>
			 						<th>Rider Name</th>
			 						<th>Payment</th>
			 						<th>Status</th>
			 					</tr>
			 				</thead>
			 				<tbody>
			 					<?php 
			 					$o ="SELECT *,
			 					CASE 
			 						WHEN `delivery_status`= 1 THEN 'Being Prepaired'
			 						WHEN `delivery_status`= 2 THEN 'On Delivery'
			 						WHEN `delivery_status`= 3 THEN 'Delivered'
			 						WHEN `delivery_status`= 4 THEN 'Canceled'
			 					END as delstat
			 					 FROM `orderdetails` WHERE  `delivery_status` > 2  GROUP BY `order_id` ASC";
				 				$oquery = $con->query($o);
				 				$onumrows =$oquery->num_rows;
				 				$grandtotal = 0;
				 				while ($or = $oquery->fetch_array()) {
				 					$driver = getRider($or['d_id']);
				 					extract($or);
				 					$fullname = getUser($u_id);
				 					$amount = getTotalAmountOfOrder($order_id);
				 					$addedamount = $amount;
				 					$gcashcode = $or['gcash_code'];
			 					 ?>
			 					 <tr>
			 					 	<td><?php echo $or['order_id'] ?></td>
			 					 	<td><?php echo $fullname ?></td>
			 					 	<td><?php echo $addedamount  ?></td>
			 					 	<td><?php echo $delivery_date ?></td>
			 					 	<td><?php echo $driver ?></td>
			 					 	<td>
			 					 		<?php if (empty($gcash_code)): ?>
			 					 			COD
			 					 			<?php else: ?>
			 					 				GCASH
			 					 			</td>
			 					 		<?php endif ?>	
			 					 		<td><?php echo $or['delstat'] ?></td>
			 					 </tr>

			 					<?php } ?>
			 				</tbody>
			 			</table>
			 		</div>
			 	</div>
			 </div>
	 	</div>