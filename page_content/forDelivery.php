<div class="card" style="margin-top: 1em;">
	<div class="card-header">
		<h4 class="card-title">
			ORDERS
		</h4>
		<div class="card-tools">
			<button onclick="PrintElem()" class="btn btn-md btn-danger float-right"> Print</button>
		</div>
	</div>
	<div class="card-body" id="toprint">
		<div class="row">
		<?php 
			$o ="SELECT * FROM `orderdetails` WHERE `delivery_status` between 1 and 2  GROUP BY `order_id` ASC";
			$oquery = $con->query($o);
			$onumrows =$oquery->num_rows;
			while ($or = $oquery->fetch_array()) {
				$or_id = $or['order_id'];
				$id = $or['u_id'];
				$client = getUser($id);
				$getnumber = getnumber($id);
				$b_id = $or['b_id'];
			 ?>
			 <div class="col-md-6">
			 	<div class="card">
			 		<div class="card-header">
			 			<h4 class="card-title">
			 				Inside Dinagat | Food Delivery
			 			</h4>
			 			<div class="card-tools">
			 				 <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
								                  </button>
			 			</div>
			 		</div>
			 		<div class="card-body">
			 			<table id="deltable" class="table table-bordered" style="border-collapse: collapse;font-size:12px;" border="1px;">
				 				 			<tr>
				 				 				<th colspan="1" style="font-size: 10px;text-align: left">FN:</th>
				 				 				<th colspan=6 style="font-size: 10px;text-align: left"><?php echo strtoupper($client) ?></th>
				 				 			</tr>
				 				 			<tr>
				 				 				<th colspan="1" style="font-size: 10px;text-align: left">#:</th>
				 				 				<th colspan="6" style="font-size: 10px;text-align: left"><?php echo strtoupper($getnumber) ?></th>
				 				 			</tr>
				 				 			<tr>
				 				 				<th colspan="1" style="font-size: 10px;text-align: left">Loc:</th>
				 				 				<th colspan="6" style="font-size: 10px;text-align: left"><?php echo strtoupper(getBarangay($b_id).' '.$or['delivery_address']) ?></th>
				 				 			</tr>
				 				 			<tr>
				 				 				<th colspan="2" style="font-size: 10px;text-align: left">Delivery Rider</th>
				 				 				<th colspan="5" style="font-size: 10px;text-align: left">
				 				 					<div class="form-group">
				 				 						
				 				 						<?php 
				 				 						$ddid = $or['d_id'];
				 				 							$getR = "SELECT * FROM `riders` WHERE `r_id`='$ddid'";
				 				 							$Rquery = $con->query($getR);
				 				 							$Rrow = $Rquery->fetch_array();
				 				 							$Rnrow = $Rquery->num_rows;
				 				 							 ?>
				 				 							<?php echo $Rrow[3].", ".$Rrow[1] ?>
				 				 							<?php if ($Rnrow==0): ?>
				 				 								No Rider Yet
				 				 							<?php endif ?>
				 				 					</div>
				 				 				</th>
				 				 			</tr>
				 				 			<tr>
				 				 				<th>#</th>
				 				 				<th style="text-align: center;">Food Item</th>
				 				 				<th style="text-align: center;">Price</th>
				 				 				<th style="text-align: center;">Qtty</th>
				 				 				<th style="text-align: center;">Amount</th>
				 				 				<th style="text-align: center;">Store</th>
				 				 				<th>Status</th>
				 				 			</tr>
				 				 		
				 				 		<?php 
				 				 				$theorder = "SELECT *,
				 				 				CASE
				 				 					WHEN `delivery_status` = 1 THEN 'Not Ready'
				 				 					WHEN `delivery_status` = 2	Then 'Ready'
				 				 				END as dstatus
 				 				 				 FROM `orderdetails` WHERE `order_id`='$or_id' ORDER BY `paymentGcash` DESC";
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
				 				 					
				 				 			 ?>
				 				 			 <tr>
				 				 			 		<td style="padding: 2px;"><?php echo $i; ?></td>
				 				 			 		<td style="padding: 2px;"><?php echo $torow['prod_name'] ?></td>
				 				 			 		<td style="padding: 2px;text-align: right;"><?php echo $pricetag?></td>
				 				 			 		<td style="padding: 2px;text-align: center;"><?php echo $torow['qtty'] ?></td>
				 				 			 		<td style="padding: 2px;text-align: right;"><?php echo $ammount ?></td>
				 				 			 		<td><?php echo $store ?></td>
				 				 			 		<td <?php if ($torow['delivery_status'] == 1): ?>
				 				 			 			style="background-color: red;color:white;"
				 				 			 		<?php endif ?>
				 				 			 		<?php if ($torow['delivery_status'] == 2): ?>
				 				 			 			style="background-color: green;color:white;"
				 				 			 		<?php endif ?>><?php echo $torow['dstatus'] ?></td>
				 				 			 	</tr>

				 				 			<?php } 
				 				 					$b_iid = $or['b_id'];
				 				 					$bsql = "SELECT * FROM `barangay` WHERE `brgy_id`='$b_iid'";
				 				 					$bquery = $con->query($bsql);
				 				 					$brow = $bquery->fetch_array();
				 				 			?>
				 				 			<tr style="font-weight: bold;">
				 				 				<td colspan="3" style="padding: 2px;">Delivery Fee</td>
				 				 				<td colspan="2" style="text-align: right;padding: 2px;">Php <?php echo number_format($brow['delivery_fee'],2) ?></td>
				 				 				<td></td>
				 				 				<td></td>
				 				 			</tr>
				 				 			<tr style="font-weight: bold;">
				 				 				<td colspan="3" style="padding: 2px;">TOTAL</td>
				 				 				<td colspan="2" style="text-align: right;padding: 2px;">Php <?php echo number_format($total+$brow['delivery_fee'],2) ?></td>
				 				 				<td colspan="2" style="text-align: center;font-weight: bold;<?php if ($or['paymentGcash'] > 0): ?>
				 				 					background-color:green;
				 				 					color:white;
				 				 				<?php else: ?>
				 				 					background-color:red;
				 				 					color:white;
				 				 				<?php endif ?>
				 				 					">
				 				 					<?php if ($or['paymentGcash'] > 0 || !empty($or['gcash_code']) ): ?>
						 					 			<?php if ($or['paymentGcash']>0): ?>
						 					 				<b >PAID ON GCASH</b>
						 					 			<?php else: ?>
						 					 				<b>PAID on Gcash</b>
						 					 			<?php endif ?>
						 					 		<?php else: ?>
						 					 			COD
						 					 		<?php endif ?>
				 				 				</td>
				 				 				
				 				 			</tr>
				 				 			<tfoot>
				 				 				<tr>
				 				 					<th style="padding: 1px;text-align: center;" colspan="2">ORDER ID:</th>
				 				 				<th style="padding: 1px;text-align: center;" colspan="3"><?php echo $or_id ?></th>
				 				 				<th colspan="2" rowspan="2" style="text-align: center;"><?php echo $gcash_code ?></th>
				 				 				</tr>
				 				 				<tr>
					 				 				<th colspan="5" style="padding: 1px;text-align: center;text-align: right" colspan="2">Customer's Signature:</th>
					 				 				
				 				 				</tr>
				 				 				
				 				 			</tfoot>	
				 				 			</table>
			 		</div>
			 	</div>
			 </div>
			<?php } ?>
		</div>
	</div>
</div>