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
			 						<th>Fullname</th>
			 						<th>Gcash Code</th>
			 						<th>Amount</th>
			 						<th>Order_date</th>
			 						<th>Payment Status</th>
			 						<th>Payment</th>
			 					</tr>
			 				</thead>
			 				<tbody>
			 					<?php 
			 					$o ="SELECT *,
			 					CASE 
			 						WHEN `delivery_status`= 1 THEN 'Being Prepaired'
			 						WHEN `delivery_status`= 2 THEN 'On Delivery'
			 					END as delstat
			 					 FROM `orderdetails` WHERE  `delivery_status` > 0 AND `delivery_status` <=3 AND `gcash_code`!='' GROUP BY `order_id` ASC";
				 				$oquery = $con->query($o);
				 				$onumrows =$oquery->num_rows;
				 				$grandtotal = 0;
				 				while ($or = $oquery->fetch_array()) {
				 					extract($or);
				 					$fullname = getUser($u_id);
				 					$amount = getTotalAmountOfOrder($order_id);
				 					$addedamount = $amount;
				 					$gcashcode = $or['gcash_code'];
			 					 ?>
			 					 <tr>
			 					 	<td><?php echo $fullname ?></td>
			 					 	<td><?php echo $or['gcash_code'] ?></td>
			 					 	<td><?php echo $addedamount  ?></td>
			 					 	<td><?php echo $delivery_date ?></td>
			 					 	<td><?php echo $delstat ?></td>
			 					 	<td>
			 					 		<?php if ($paymentGcash > 0): ?>
			 					 			PAID ON GCASH
			 					 			<?php else: ?>
			 					 				<button onclick="updatefoodgcashStat('<?php echo $order_id ?>','<?php echo $gcashcode ?>')" class="btn btn-sm btn-primary"><i class="fa fa-check"></i> PAID?</button>
			 					 				<!-- <a href="includes/queries.php?gcashPaid=true&order_id=<?php echo $order_id ?>" class="btn btn-xs btn-info">Payed on Gcash</a> -->
			 					 			</td>
			 					 		<?php endif ?>	
			 					 </tr>

			 					<?php } ?>
			 				</tbody>
			 			</table>
			 		</div>
			 	</div>
			 </div>
	 	</div>