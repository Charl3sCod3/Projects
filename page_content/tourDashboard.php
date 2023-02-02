<div class="card">
	<div class="card-header">
		<h4 class="card-title">Tour Schedules</h4>
	</div>
	<div class="card-body">
		<div class="row">
		<?php 
		$today = date("Y-m-d");
			 $sched = "SELECT * FROM `package_sub` WHERE `p_s_date` >= '$today' ORDER BY `p_s_date` ASC";
			$schedq = $con->query($sched);
			$nrow = $schedq->num_rows;
			while ($srow = $schedq->fetch_array()) {
				extract($srow);
				$tbook = "SELECT * FROM `package_booking` WHERE `package_sub_id`='$pack_sub_id'";
			$tbq = $con->query($tbook);
			 $tnrow = $tbq->num_rows;
			$tbr = $tbq->fetch_array();
			$pd = "SELECT * FROM `packagedetails` WHERE `package_id`='$package_id' ";
			$pdq=$con->query($pd);
			$tnrow = $pdq->num_rows;
			$pdr = $pdq->fetch_array();
			if ($user_id == $pdr['u_id']) {
			if ($tbr['paymentgcash_status']>0) {
		 ?>
			<div class="col-md-6">
				<div class="info-box">
              <span class="info-box-icon bg-info"><i class="far fa-calendar"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Tour Date: <?php echo date("F d, Y", strtotime($p_s_date)) ?></span>
                <span class="info-box-text">Tour Title: <?php echo $pdr['packTitle'] ?></span>
                <span class="info-box-text">Client: <?php echo $tbr['client_name'] ?></span>
                <span class="info-box-number">Pax: <?php echo $tbr['numpax'] ?></span>
              </div>
              <!-- /.info-box-content -->
         </div>
			</div>
     <?php } } } ?>
     </div>
	</div>
</div>