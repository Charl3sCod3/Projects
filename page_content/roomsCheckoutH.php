<div class="row">
<?php 
$today = date("Y-m-d");
$enddate = date('Y-m-d', strtotime('+5 years'));
					$sql ="SELECT * FROM `booking` as b inner join `room_details` as rd WHERE b.room_id=rd.room_id AND rd.sd_id='$sd_iid' AND b.checkOut<='$today' AND b.status=1";
					$query = $con->query($sql);
						$nrow = $query->num_rows;
						while ($srow = $query->fetch_array()) {
							$urid = $srow['u_id'];
						if ($nrow > 0) { 
								$gacc = "SELECT * FROM `accounts` WHERE `u_id`='$urid'";
								$accq = $con->query($gacc);
								$accr = $accq->fetch_array();
								$ccname = getUser($urid);
								$chkin = $srow['checkIn'];
								$chkout = $srow['checkOut'];
								$acmail =$accr['e-address'];
								$acmobile = $accr['contactnumber'];
								$rprice = $srow['cost_id'];

							?>
							
							<!-- NOT RESERVED -->
							<div class="col-md-4">
								<div onclick="CheckoutBooking('<?php echo $srow[0] ?>','<?php echo $chkin ?>','<?php echo $chkout ?>','<?php echo $acmail ?>','<?php echo $acmobile ?>','<?php echo $ccname ?>','<?php echo $rprice ?>')" class="card" style="cursor: pointer;position:relative;<?php if ($srow['room_status1']=='Not Available'): ?>
                              border:solid red 3px;
                              <?php endif ?>">
		                              <div class="card-body">
		                                <div style="width: 100%;height: 150px; overflow: hidden; ">
		                                      <img src="images/rooms/<?php echo $srow['image'];  ?>" class="product-image" alt="Product Image" > 
		                                </div>
		                               <h6><small>Customer Name :</small><br>
		                                  <b><?php echo getUser($srow['u_id'])  ?></b>
		                                </h6>
		                                <div class="row">
		                                	<div class="col-6">
		                                		<h6 style="text-align: center;"><small>Check-in Date :</small><br>
		                                  <b><?php echo date("F d, Y", strtotime($srow['checkIn']))  ?></b>
		                                </h6>
		                                	</div>
		                                	<div class="col-6">
		                                		<h6 style="text-align: center;"><small>Check-Out Date :</small><br>
		                                  <b><?php echo date("F d, Y", strtotime($srow['checkOut']))  ?></b>
		                                </h6>
		                                	</div>
		                                </div>
		                                <h6><small>Room Name :</small><br>
		                                  <b><?php echo $srow['room_name']  ?></b>
		                                </h6>
		                                <h6 style="font-size:14px;height: 55px;"><small>Room Description :</small><br> 
		                                  <b><?php echo $srow['room_descrip']  ?></b>
		                                </h6>
		                                <div class="row">
		                                  <div class="col-6">
		                                    <h6 style="font-size:14px;">Room: <?php echo $srow['room_number'] ?></h6>
		                                  </div>
		                                  <div class="col-6">
		                                    <h6 style="font-size:14px;">Persons: <?php echo $srow['avail_id'] ?></h6>
		                                  </div>
		                                </div>
		                                <div class="bg-gray py-2 px-3 mt-4">
		                                          <h5 class="mb-0">
		                                          ₱<?php echo number_format($srow['cost_id'],2) ?>
		                                          </h5>
		                                        </div>
		                              </div>
                            </div>
							</div>
						<?php
						}
					}

 ?>
 </div>