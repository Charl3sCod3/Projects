	 		<div class="card">
	 			<div class="card-header">
	 				<h4 class="card-title">Your Order</h4>
	 			</div>
	 			<div class="card-body">

	 				<?php 
	 					$getorder = "SELECT * FROM `orderdetails`  WHERE `u_id`='$userid' AND `delivery_status` BETWEEN 1 AND 2  GROUP BY `order_id` ORDER BY `d_id` DESC ";
	 					$orquery = $con->query($getorder);
	 					while ($orrow = $orquery->fetch_array()) {
	 						$oorid = $orrow['order_id'];
	 						$driver = getRider($orrow['d_id']);
	 						$driverCont = getRiderCont($orrow['d_id'])
	 				 ?> 
	 				 <div class="card <?php if ($orrow['d_id'] == 0): ?>
	 				 card-primary
	 				 	<?php else: ?>
	 				 		card-success
	 				 <?php endif ?> collapsed-card">
			              <div class="card-header">
			                <h3  class="card-title" style="font-size:20px;">ORDER ID :<br><small><?php echo $orrow['order_id'] ?></small></h3>
			               
			                 <div class="card-tools">
			                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
			                  </button>
			                </div>
			                 <h3  class="card-title float-right" style="margin-right: 1em;font-size:20px;">Date Ordered :<br><small><?php echo date("F d, Y", strtotime($orrow['delivery_date'])) ?></small></h3> 
			                <!-- /.card-tools -->
			              </div>
			              <!-- /.card-header -->
			              <div class="card-body" style="display: none;">
			              	<h6>Rider: <?php echo $driver ?></h6>
			              	<h6>Contact: <?php echo $driverCont ?> <small class="float-right">Preperation Time:
			              		<?php echo getpreptime($oorid) ?> mins</small></h6>
			                	<table id="roombok" class="table table-bordered" style="border-collapse: collapse;width: 100%;" border="1px">
			                		<tr></tr>
			                		<thead>
			                			<tr>
			                				<th style="text-align: center;">#</th>
			                				<th style="text-align: center;">Item</th>
			                				<th style="text-align: center;">Item Desc</th>
			                				<th style="text-align: center;">item Price</th>
			                				<th style="text-align: center;">Qtty</th>
			                				<th style="text-align: center;">amount</th>
			                			</tr>
			                		</thead>
			                		<tbody>
				                			<?php 
							 					$getorder1 = "SELECT *,
							 					CASE 
							 						WHEN `delivery_status` = 1 THEN 'Being Prepaired'
							 						WHEN `delivery_status` = 2 AND `d_id` = 0 THEN 'For Pickup'
							 						WHEN `delivery_status` = 2 AND `d_id` > 0 THEN 'On Delivery'
							 						ELSE 'DONT KNOW'
							 					END AS delstat
							 					 FROM `orderdetails` WHERE `order_id`='$oorid' ";
							 					$orquery1 = $con->query($getorder1);
							 					$i=0;
							 					$totalamount = 0;
							 					$delstat ="";
							 					while ($orrow1 = $orquery1->fetch_array()) {
							 						$b_id = $orrow1['b_id'];
							 						$i++;
							 						$delstat = $orrow1['delstat'];
							 						 $percentaddition = $orrow1['prod_price'] * 0.05;
                   									 $pricetag = $orrow1['prod_price'] + $percentaddition;
							 						
							 						$amount = $pricetag * $orrow1['qtty'];
							 						$totalamount = $totalamount + $amount;
							 				 ?>	

							 				 		<tr>
							 				 			<td><?=$i?></td>
							 				 			<td><?=$orrow1['prod_name']?></td>
							 				 			<td><?=$orrow1['prod_desc']?></td>
							 				 			<td><?=$orrow1['prod_price']+5?></td>
							 				 			<td><?=$orrow1['qtty']?></td>
							 				 			<td><?=$amount?></td>
							 				 		</tr>

							 				<?php } ?>
							 	
			                		</tbody>

			                	</table>
			              </div>
			              <!-- /.card-body -->
		            </div>
	 				<?php } ?>
	 			</div>
	 		</div>