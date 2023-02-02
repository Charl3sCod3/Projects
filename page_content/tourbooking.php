<h4 style="padding: 14px;background-color: lightgrey">Tour Package Booking</h4>
<div class="row">
<?php 
	$sql = "SELECT * FROM `package_booking` WHERE `tour_status`=0 AND `paymentgcash_status` between 0 and 1";
	$query = $con->query($sql);
	while ($trow= $query->fetch_array()) {
		extract($trow);
	$pd = "SELECT * FROM `packagedetails` WHERE `package_id`='$package_id' ";
	$pdq=$con->query($pd);
	$pdr = $pdq->fetch_array();

	$psd = "SELECT * FROM `package_sub` WHERE `pack_sub_id`='$package_sub_id'";
	$psdq = $con->query($psd);
	$psdr = $psdq->fetch_array();
	$touramount = $numpax * $tour_price_atm;
	switch ($paymentgcash_status) {
		case '1':
			$paymentStatus = "Paid";
			break;
		case '0':
			$paymentStatus = "Un-Paid";
			break;
	}
	if ($user_id == $pdr['u_id']) {
 ?>
<div class="col-md-6">
	<div class="card">
		<div class="card-header">
			<h4 class="card-title"><?php echo $pdr['packTitle'] ?></h4>
		</div>
		<div class="card-body">
			<p><?php echo $pdr['packageDisc'] ?></p>
				<h5 style="padding: 10px;background-color: grey;color:white;margin-bottom: 5px;"><small>Booked By:</small><br>
					<?php echo getUser($trow['u_id']) ?><br><small><?php echo getusercontact($trow['u_id']) ?></small></h5>
			<h5 style="padding: 10px;background-color: grey;color:white;margin-bottom: 5px;"><small>Tour Date:</small><br><?php echo date("F d, Y", strtotime($psdr['p_s_date'])) ?></h5>

			<div class="row my_row">
				<div class="col-6 my_col-66">
					<h5 style="padding: 10px;background-color: grey;color:white;margin-bottom: 5px;"><small>Tourist:</small><br><?php echo $numpax; ?> persons</h5>
				</div>
				<div class="col-6 my_col-66">
					<h5 style="padding: 10px;background-color: grey;color:white;margin-bottom: 5px;"><small>Price per Pax:</small><br><?php echo $tour_price_atm; ?></h5>
				</div>
			</div>

			<div class="row my_row">
				<div class="col-6 my_col-66">
					<h5 style="padding: 10px;background-color: grey;color:white;margin-bottom: 5px;"><small>Tour Amount:</small><br><?php echo number_format($touramount,2); ?></h5>
				</div>
				<div class="col-6 my_col-66">
					<h5 style="padding: 10px;background-color: grey;color:white;margin-bottom: 5px;"><small>Payment Status:</small><br><?php echo $paymentStatus; ?></h5>
				</div>
			</div>
		</div>
	</div>
</div>
 <?php } } ?>
 </div>