<div class="row">
<?php 
$today = date("Y-m-d");
$enddate = date('Y-m-d', strtotime('+5 years'));
	global $con;
	$thes = "SELECT * FROM `room_details` WHERE 1=1 AND  `rd_id`=0 AND `sd_id`='$stab[0]' ORDER BY `avail_id` ASC";
					$thesq = $con->query($thes);
					$i=0;
					$ii=0;
					while ($srow = $thesq->fetch_array()) {
					 $rid = $srow['room_id'];
					$sql="SELECT * FROM  `booking` WHERE `room_id`='$rid' AND `status`=1 AND `checkOut` >= '$today' ";
						$query =  $con->query($sql);
						$nrow = $query->num_rows;
						$brow=$query->fetch_array();
						if ($nrow > 0) { ?>
							
					<?php	}else{ ?>
							<!-- NOT RESERVED -->
							<div class="col-md-3">
								<div class="card" style="cursor: pointer;position:relative;<?php if ($srow['room_status1']=='Not Available'): ?>
                              border:solid red 3px;
                              <?php endif ?>">
		                              <div class="card-body">
		                                <div style="width: 100%;height: 150px; overflow: hidden; ">
		                                      <img src="images/rooms/<?php echo $srow['image'];  ?>" class="product-image" alt="Product Image" >
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