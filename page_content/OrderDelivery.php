<style type="text/css">
				  				 				table thead th,table tbody td{
				 				 					font-size: 13px;
				 				 					text-align: center;
				 				 				}
				 				 			</style>
<div class="card">
	<div class="card-header">
		<h4 class="card-title">
			Orders
		</h4>
	</div>
	<div class="card-body">
		<div class="row">
			<?php 
				 				$o ="SELECT * FROM `orderdetails` WHERE `d_id`=0 AND `delivery_status` between 1 and 2  GROUP BY `order_id` ASC";
				 				$oquery = $con->query($o);
				 				$onumrows =$oquery->num_rows;
				 				while ($or = $oquery->fetch_array()) {
				 					$or_id = $or['order_id'];
				 					$id = $or['u_id'];
				 					$client = getUser($id);
				 					$getnumber = getnumber($id);
				 					$b_id = $or['b_id'];
				 					if ($or['paymentGcash'] > 0 || empty($or['gcash_code'])) {
				 				 ?>
				 				 <div class="col-md-6">
				 				 	<div class="card">
				 				 		<div class="card-header">
				 				 			<h4 class="card-title">Iside Dinagat | Food Delivery</h4>
				 				 		</div>
				 				 		<div class="card-body">
				 				 			<p style="font-size:13px;"><small>Customer Name:</small><br>
				 				 			<?php echo strtoupper($client) ?>
				 								<br>
				 								<small>Contact Number:</small><br>
				 				 			<?php echo strtoupper($getnumber) ?>
				 				 				<br>
				 				 				<small>Address:</small><br>
				 				 			<?php echo strtoupper(getBarangay($b_id).' '.$or['delivery_address']) ?>
				 				 			</p>
				 				 			<h6 style="margin:0px;font-size:14px;">WHERE TO PICK UP</h6>
				 				 			<table border="1px" style="width: 100%;border-collapse: collapse;margin-top:30px;">
				 				 				<thead>
				 				 					<tr>
				 				 						<th>#</th>
				 				 						<th>Item</th>
				 				 						<th>Price</th>
				 				 						<th>Qty</th>
				 				 						<th>Total</th>
				 				 					</tr>
				 				 				</thead>
				 				 				<tbody>
				 				 					<?php 
				 				 				$theorder = "SELECT *,
				 				 				CASE
				 				 					WHEN `delivery_status` = 1 THEN 'Not Ready'
				 				 					WHEN `delivery_status` = 2	Then 'Ready'
				 				 				END as dstatus
 				 				 				 FROM `orderdetails` WHERE `order_id`='$or_id'";
				 				 				$toquery = $con->query($theorder);
				 				 				$i=0;
				 				 				$total = 0;
				 				 				while ($torow=$toquery->fetch_array()) {
				 				 					 $b_id=$torow['b_id'];
				 				 					$store = getStoreName($torow['sd_id']);
				 				 					$i++;
				 				 					$pricetag = $torow['prod_price'];
				 				 					$adiitional = (5 / 100) * $pricetag;
				 				 					$pricetag = $pricetag+$adiitional;
				 				 					$ammount = $pricetag*$torow['qtty'];
				 				 					$total1 = $total + $ammount ;
				 				 					$total = $total1;
				 				 					$b_iid = $or['b_id'];
				 				 					$bsql = "SELECT * FROM `barangay` WHERE `brgy_id`='$b_iid'";
				 				 					$bquery = $con->query($bsql);
				 				 					$brow = $bquery->fetch_array();
				 				 					
				 				 			 ?>
				 				 			 	<tr>
				 				 				<td style="<?php if ($torow['delivery_status']==1): ?>
				 				 					background-color: red;color:white;
				 				 				<?php else:; ?> background-color: green;color:white; <?php endif ?>"><?php echo $i ?></td>
				 				 				<td><?php echo $torow['prod_name'] ?></td>
				 				 				<td><?php echo $pricetag?></td>
				 				 				<td><?php echo $torow['qtty'] ?></td>
				 				 				<td><?php echo $ammount ?></td>
				 				 			</tr>
				 				 			<div style="display: flex;font-size:13px;border-bottom: solid grey 1px;">
				 				 				<div style="width: 50%;padding-bottom: 3px;">
				 				 					<?php echo $torow['prod_name'] ?>
				 				 				</div>
				 				 				<div style="width: 50%;padding-bottom: 3px;">
				 				 					<?php echo $store ?>
				 				 				</div>
				 				 			</div>
				 				 			<?php } ?>
				 				 			<tr style="font-weight: bold;">
				 				 				<td colspan="3" style="padding: 2px;">Delivery Fee</td>
				 				 				<td colspan="2" style="text-align: right;padding: 2px;">Php <?php echo number_format($brow['delivery_fee'],2) ?></td>
				 				 			</tr>
				 				 			<tr style="font-weight: bold;">
				 				 				<td colspan="2" style="padding: 2px;">TOTAL</td>
				 				 				<td colspan="2" style="text-align: right;padding: 2px;">Php <?php echo number_format($total+$brow['delivery_fee'],2) ?></td>
				 				 				<td colspan="1" style="text-align: center;font-weight: bold;color:red">
				 				 					<?php if ($or['paymentGcash'] > 0): ?>GCASH
			 					 			<?php endif ?>
				 				 				</td>
				 				 				
				 				 			</tr>
				 				 				</tbody>
				 				 			</table>
				 				 		</div>
				 				 		<div class="card-footer">
				 				 		<button onclick="setRider('<?php echo $rrid ?>','<?php echo $or_id ?>') " class="btn btn-danger btn-md"><i class="fa fa-truck"></i> Take this order!</button>
				 				 		</div>
				 				 	</div>
				 				 </div>
				 				<?php } } ?>
		</div>
	</div>
</div>