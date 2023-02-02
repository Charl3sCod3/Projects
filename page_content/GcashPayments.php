<?php if ($position==1): ?>
	<div class="row">
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Gcash Payments ON Room Booking</h4>
				</div>
				<div class="card-body">
			
					<table class="table table-bordered" id="roombok">
						<thead> 
							<tr>
								<th>Gcash Code</th>
								<th>Status</th>
								<th style="width:15%">Opt</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$sql="SELECT * FROM `booking` WHERE 1=1  AND `gcash_code`!='' ORDER BY `paymentgcash_status`,`booking_id`  DESC ";
								$query = $con->query($sql);
								while ($row =$query->fetch_array()) {
									extract($row);
							 ?>
							 <tr>
							 	<td><?php echo $gcash_code ?></td>
							 	<?php if ($paymentgcash_status > 0): ?>
							 		<td style="text-align: center;">Paid</td>
							 		<td></td>
							 	<?php else: ?>
							 		<td style="text-align: center;">Un-paid</td>
							 		<td><button onclick="setGcashStatusbooking('<?php echo $paymentgcash_status ?>','<?php echo $gcash_code ?>')" class="btn btn-sm btn-danger"><i class="fa fa-check"></i></button></td>
							 	<?php endif ?>
							 </tr>
							<?php }	 ?>
						</tbody>
						
					</table>
					
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Gcash Payments ON Packages</h4>
				</div>
				<div class="card-body">
					<table class="table table-bordered" id="packbok">
						<thead>
							<tr>
								<th>Gcash Code</th>
								<th>Status</th>
								<th>Opt</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$gtb1 = "SELECT * FROM `package_booking` WHERE 1=1 AND `paymentgcash_status` Between 0 and 1";
								$gtbq1 = $con->query($gtb1);
								while ($gbtr =$gtbq1->fetch_array()) {
								$tourstatus =$gbtr['paymentgcash_status'];
								$tourgcash_code = $gbtr['gcash_code'];
							 ?>
							 <tr>
							 	<td><?php echo $gbtr['gcash_code'] ?></td>
							 	<?php if ($gbtr['paymentgcash_status'] > 0): ?>
							 		<td>Paid</td>
							 		<td></td>
							 	<?php else: ?>
							 		<td>Un-Paid</td>
								 	<td><button onclick="setGcashStatustour('<?php echo $tourstatus ?>','<?php echo $tourgcash_code ?>')" class="btn btn-sm btn-danger"><i class="fa fa-check"></i></button></td>
							 	<?php endif ?>
							 </tr>
							<?php } ?>
						</tbody>
					</table>
					
				</div>
			</div>
		</div>
	</div>
<?php endif ?>