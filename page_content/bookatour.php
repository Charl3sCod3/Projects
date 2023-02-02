<div class="row" style="padding-top: 1em;">
	<?php
		        $today = date("Y-m-d");
		        $sql  = "SELECT * FROM `packagedetails` WHERE `package_id`='$package_id' ";
		        $query = $con->query($sql);
				$row = $query->fetch_array();
		          $descStrLen = strlen($row['packageDisc']);
		            $packageDisc = $row['packageDisc'];
		         
		        ?> 
	 <div class=" col-sm-12 col-xs-12 col-md-6">
		          <div class="card" style="position: relative;">
		            <div class="card-header">
		              <div class="card1-title"><strong  style="font-size: 20px;margin-bottom: 0px;height: 88px;"><?php echo $row['packTitle']  ?></strong ><br></div>
		            </div>
		            <div id="packimgcontouter" class="card-body">
		            <?php 
		            	$getimgs = "SELECT * FROM `packageimg` WHERE `package_id`='$row[0]' Limit 4";
		            	$imgq = $con->query($getimgs);
		            	$imgnr = $imgq->num_rows;
		            	$i=0;
		            	while ($imgr = $imgq->fetch_array()) {
		            		$i++;
		             ?>
		             <div class="packimgscont">
		             	<img src="tourpackages/<?php echo $imgr[2] ?>" style="width: 100%;">
		             </div>
		         <?php } ?>
		            </div>
		            <div class="card-body" style="min-height: 420px;z-index: 2;background-color: white;">
		                <div class="wrapper-text">
		                  <p><?php echo $packageDisc ?></p>
		                  <div class="row">
		                    <div class="col-12">
		                    </div>
		                  </div>
		                </div>
		            </div>
		            <div class="card-footer">
		            	<div class="bg-gray py-2 px-3 " style="width: 100%;display: flex;justify-content: space-between;"> 
		                        <h5 class="mb-0" style="width: 60%;padding: 10px;">
		                         <strong >Price:</strong > ₱<?php echo number_format($row['pack_prize'],2) ?>
		                        </h5>
		                      </div>
		            </div>
		          </div>
		        </div>
	<div class="col-md-6">
		<!-- <form id="bookatourForm"> -->
		<?php if ($row['bookType'] > 0): ?>
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Set A date for tour</h4>
				</div>
				<div class="card-body">
					<div class="form-group">
						<input type="hidden" name="bookthistour" id="bookthistour" value="true">
						<input type="hidden" name="package_id" id="package_idxx" value="<?php echo $package_id ?>">
						<small>Tour Date:</small>
						<input type="date" name="tourdate" id="tourdate" class="form-control"> 
					</div>
					<div class="form-group">
						<small>Client Name</small>
						<input type="text" name="client" id="client" readonly="" value="<?php echo $userfullname ?>"  class="form-control">
					</div>
					<div class="form-group">
						<small>Client Contact</small>
					<input type="text" name="clientContact" id="clientContact" readonly="" value="<?php echo $user['contactnumber'] ?>" class="form-control">
					</div>
					<div class="form-group">
						<small>Number of Persons</small>
						<input oninput="caltourprice(this.value,'<?php echo $row[3] ?>')" type="number" name="numpax" id="numpax" class="form-control">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
					<div class="card">
						<div class="card-body">
							<div class="form-group">
								<h6>Price per pax</h6>
								<h5 style="font-weight: 600;text-indent: 50px;">₱<?php echo number_format($row['pack_prize']) ?></h5>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="card">
						<div class="card-body">
							<div class="form-group">
								<h6>Total Price</h6>
								<input class="form-control" type="hidden" id="tourtotal1" readonly="" name="tourtotal1" style="background-color: transparent;margin:0px;border:transparent;">
								<input class="form-control" type="text" id="tourtotal" readonly="" name="tourtotal" style="background-color: transparent;margin:0px;border:transparent;font-weight: 600;font-size:20px;">
							</div>
						</div>
					</div>
				</div>
			</div>	
			<div class="card">
				<div class="card-body">
						<button onclick="gcashTour('<?php echo $user[10] ?>','<?php echo $user[8] ?>','<?php echo $userfullname ?>','Book a tour At INSIDE DINAGAT','<?php echo $package_id ?>')" style="float: right" class="btn btn-lg btn-primary float-right"><i class="fa fa-book"></i> Book Tour</button>
				</div>
			</div>
		<?php else: ?>
		<?php endif ?>
	<!-- </form> -->
	</div>
</div>