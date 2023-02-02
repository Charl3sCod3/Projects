<?php 
	$stabdetails ="SELECT * FROM `stablishmentdetails` WHERE `u_id`='$userid'";
	$sdquery = $con->query($stabdetails);
	$sdrow = $sdquery->fetch_array();
	$stabbanner = $sdrow['stabbanner'];
	$stablogo = $sdrow['companyLogo'];
	$sd_id = $sdrow['sd_id'];
 ?>
	 	<div class="row" style="padding-top: 1em;">
	 		<div class="col-md-12">
		 			<div class="card">
				 		<div class="card-header">
				 			<h4 class="card-title">LIST OF ORDERS</h4>
				 		</div>
				 		<div class="card-body">
				 			<div class="row">
				 				<?php 
				 				$o ="SELECT * FROM `orderdetails` WHERE `sd_id`='$sd_id' AND `delivery_status`=1  GROUP BY `order_id` ASC";
				 				$oquery = $con->query($o);
				 				$onumrows =$oquery->num_rows;
				 				while ($or = $oquery->fetch_array()) {
				 					$or_id = $or['order_id'];
				 					$id = $or['u_id'];
				 					$client = getUser($id);
				 				 ?>
				 				 <div class="col-md-6">
				 				 	<div class="card">
				 				 	<div class="card-header">
				 				 		<h4 class="card-title" style="width: 100%;font-size: 15px;">Name: <?php echo $client ?> <small style="width: 40%;" class="float-right">Prep: <input type="number" name="preptime" onchange="preptime(this.value,'<?php echo $or_id ?>')" value="<?php echo getpreptime($or_id) ?>" style="width:50%;"></small></h4>
				 				 		
				 				 	</div>
				 				 	<div class="card-body">
				 				 		<table class="table" style="border-collapse: collapse;width: 100%;font-size:12px;" border="1px;">
				 				 			<tr>
				 				 				<th>#</th>
				 				 				<th style="text-align: center;">Food Item</th>
				 				 				<th style="text-align: center;">Price</th>
				 				 				<th style="text-align: center;">Qtty</th>
				 				 				<th style="text-align: center;">Amount</th>
				 				 				<th style="text-align: center;">Preparation Time</th>
				 				 			</tr>
				 				 			<?php 
				 				 				$theorder = "SELECT * FROM `orderdetails` WHERE `order_id`='$or_id' AND `sd_id`='$sd_id'";
				 				 				$toquery = $con->query($theorder);
				 				 				$i=0;
				 				 				$total = 0;
				 				 				while ($torow=$toquery->fetch_array()) {
				 				 					$i++;
				 				 					$ammount = $torow['prod_price']*$torow['qtty'];
				 				 					$total = $total + $ammount;
				 				 					$pt = $torow['prep_time'];
				 				 			 ?>
				 				 			 	<tr>
				 				 			 		<td style="padding: 2px;"><?php echo $i; ?></td>
				 				 			 		<td style="padding: 2px;"><?php echo $torow['prod_name'] ?></td>
				 				 			 		<td style="padding: 2px;"><?php echo $torow['prod_price'] ?></td>
				 				 			 		<td style="padding: 2px;"><?php echo $torow['qtty'] ?></td>
				 				 			 		<td style="padding: 2px;"><?php echo $ammount ?></td>

				 				 			 		<td style="padding: 2px;text-indent: 10px;" ><small id="prept"><?php echo $torow['prep_time'] ?> m</small>
				 				 			 		</td>
				 				 			 	</tr>
				 				 			<?php } ?>
				 				 			<tr style="font-weight: bold;">
				 				 				<td colspan="3" style="padding: 2px;">TOTAL</td>
				 				 				<td colspan="3" style="text-align: right;padding: 2px;">Php <?php echo number_format($total,2) ?></td>
				 				 			</tr>
				 				 		</table>
				 				 	</div>
				 				 	<div class="card-footer">
				 				 		<a href="includes/queries.php?forpickup=true&order_id=<?php echo $or_id ?>&sd_id=<?php echo $sd_id ?>" class="btn btn-danger btn-sm float-right"> For Pickup</a>
				 				 	</div>
				 				 </div>
				 				 </div>
				 				<?php } ?>
				 				<?php if ($onumrows < 1): ?>
				 					<div class="col-md-12">
				 						<h6 class="text-muted" style="text-align: center;">No Orders Yet</h6>
				 					</div>
				 				<?php endif ?>
				 			</div>
				 		</div>
				 	</div>
	 		</div>
	 	</div>