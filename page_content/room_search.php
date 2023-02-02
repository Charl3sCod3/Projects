
		<div class="row" style="margin-top:1em;" >
			<div class="col-md-3">
				<div class="card">
					<form method="get" action="" enctype="multipart/form-data" >
					<div class="card-header">
						<h4 class="card-title">Filter your Search</h4>
					</div>
					<div class="card-body">
						<div class="form-group">
							<small>Check in date:</small>
							<input type="date" required="" name="date_start" class="form-control" value="<?php echo $date_start ?>">
						</div>
						<div class="form-group">
							<small>Check out date:</small>
							<input type="date" required="" name="date_end" class="form-control" value="<?php echo $date_end ?>">
						</div>
						<div class="form-group">
							<small>Number of Persons:</small>
							<input type="number" required="" name="num_person" class="form-control" placeholder="Ex. 2" value="<?php echo $num_person ?>">
						</div>
					</div>
					<div class="card-footer">
						<div class="form-group">
							<input type="hidden" name="q" value="room_search">
							<button type="submit" class="form-control btn btn-success btn-md" ><i class="fa fa-search"></i> Search</button>
						</div>
					</div>
					</form>
				</div>
			</div>
			<div class="col-md-9">
				<h6><?php echo $title ?> <br>
					<b>This are all the available rooms..</b>
				</h6>
				<div class="row">
				<?php 
					$thes = "SELECT * FROM `room_details` WHERE 1=1 AND `avail_id`>='$num_person' AND `rd_id`=0 ORDER BY `avail_id` ASC";
					$thesq = $con->query($thes);
					while ($srow = $thesq->fetch_array()) {
					 $rid = $srow['room_id'];
						
					$check = "SELECT * FROM `booking` WHERE `room_id`='$rid' AND ( 
						('$date_start' between `checkIn` AND `checkOut`) 
					OR ('$date_end' between `checkIn` AND `checkOut`) 
					OR (`checkIn` between '$date_start' AND '$date_end') 
					OR (`checkOut` between '$date_start' AND '$date_end'))";
					$cq = $con->query($check);
				    $cnrow = $cq->num_rows;
					if ($cnrow == 0) {
					$strlen = strlen($srow['room_descrip']);
					$romd =$srow['room_descrip'];
					if ($strlen > 40) {
						$romd = substr($romd, 0, 45) .'...';
					}
					$storename = getStoreName($srow['sd_id']);
				 ?>
				 	<div class="col-md-4">
				 		<div id="roomcont" class="card" >
				 		<div id="prod_cover">
				 			<?php if (isset($user_id) && $position == 4): ?>
				 				<button onclick="BookthisRoom('<?php echo $srow[0] ?>','<?php echo $srow['cost_id'] ?>','<?php echo $date_start; ?>','<?php echo $date_end; ?>','<?php echo $user[10]; ?>','<?php echo $user[8]; ?>','<?php echo $userfullname; ?>')" style="margin-bottom: 20%;width: 80%;margin-top:5%;" class="form-control btn btn-success btn-md"><i class="fa fa-book"></i> Book this room</button>
				 			<?php endif ?>
				 			 <?php
                                                $cv="SELECT * FROM `room_rating` WHERE `u_id`='$user_id' AND `room_id`='$rid'";
                                                $cvq = $con->query($cv);
                                                $cvnr = $cvq->num_rows;
                                                if ($position == 4 AND $cvnr < 1) { ?>
				 			 <div class="ratess1" style="padding: 0px;margin:0px !important;">
                                <input onclick="rateRoom(this.value,'<?php echo $srow[0] ?>')" type="radio" id="star5" name="rate" value="5" />
                                <label for="star5" title="text">5 stars</label>
                                <input onclick="rateRoom(this.value,'<?php echo $srow[0] ?>')" type="radio" id="star4" name="rate" value="4" />
                                <label for="star4" title="text">4 stars</label>
                                <input onclick="rateRoom(this.value,'<?php echo $srow[0] ?>')" type="radio" id="star3" name="rate" value="3" />
                                <label for="star3" title="text">3 stars</label>
                                <input onclick="rateRoom(this.value,'<?php echo $srow[0] ?>')" type="radio" id="star2" name="rate" value="2" />
                                <label for="star2" title="text">2 stars</label>
                                <input onclick="rateRoom(this.value,'<?php echo $srow[0] ?>')" type="radio" id="star1" name="rate" value="1" />
                                <label for="star1" title="text">1 star</label>
                              </div>
                          <?php } ?>
				 			<h6>Room Description</h6>
				 			<p style="text-align: justify"><?php echo $srow['room_descrip'] ?></p>
				 		</div>
				 		<?php 
				 		$getRoomRating = getRoomRating($rid);
				 		 ?>
		                              <div class="card-body">
		                              	<div class="ratess">
                                                  <?php 
                                                          if ($getRoomRating >= 1 && $getRoomRating < 2) {
                                                              echo '<i class="fa fa-star" style="color:orange;float:right;"></i>';
                                                               echo '<i class="fa fa-star" style="color:lightgray;float:right;"></i>';
                                                               echo '<i class="fa fa-star" style="color:lightgray;float:right;"></i>';
                                                               echo '<i class="fa fa-star" style="color:lightgray;float:right;"></i>';
                                                               echo '<i class="fa fa-star" style="color:lightgray;float:right;"></i>';
                                                          }elseif ($getRoomRating >=2 && $getRoomRating < 3) {
                                                              echo '<i class="fa fa-star" style="color:orange;float:right;"></i>';
                                                               echo '<i class="fa fa-star" style="color:orange;float:right;"></i>';
                                                               echo '<i class="fa fa-star" style="color:lightgray;float:right;"></i>';
                                                               echo '<i class="fa fa-star" style="color:lightgray;float:right;"></i>';
                                                               echo '<i class="fa fa-star" style="color:lightgray;float:right;"></i>';
                                                          }elseif ($getRoomRating >=3 && $getRoomRating < 4) {
                                                             echo '<i class="fa fa-star" style="color:orange;float:right;"></i>';
                                                               echo '<i class="fa fa-star" style="color:orange;float:right;"></i>';
                                                               echo '<i class="fa fa-star" style="color:orange;float:right;"></i>';
                                                               echo '<i class="fa fa-star" style="color:lightgray;float:right;"></i>';
                                                               echo '<i class="fa fa-star" style="color:lightgray;float:right;"></i>';
                                                          }elseif ($getRoomRating >=4 && $getRoomRating < 5) {
                                                            echo '<i class="fa fa-star" style="color:orange;float:right;"></i>';
                                                               echo '<i class="fa fa-star" style="color:orange;float:right;"></i>';
                                                               echo '<i class="fa fa-star" style="color:orange;float:right;"></i>';
                                                               echo '<i class="fa fa-star" style="color:orange;float:right;"></i>';
                                                               echo '<i class="fa fa-star" style="color:lightgray;float:right;"></i>';
                                                          }elseif ($getRoomRating >= 5) {
                                                             echo '<i class="fa fa-star" style="color:orange;float:right;"></i>';
                                                               echo '<i class="fa fa-star" style="color:orange;float:right;"></i>';
                                                               echo '<i class="fa fa-star" style="color:orange;float:right;"></i>';
                                                               echo '<i class="fa fa-star" style="color:orange;float:right;"></i>';
                                                               echo '<i class="fa fa-star" style="color:orange;float:right;"></i>';
                                                          }else{
                                                             echo '<i class="fa fa-star" style="color:lightgray;float:right;"></i>';
                                                               echo '<i class="fa fa-star" style="color:lightgray;float:right;"></i>';
                                                               echo '<i class="fa fa-star" style="color:lightgray;float:right;"></i>';
                                                               echo '<i class="fa fa-star" style="color:lightgray;float:right;"></i>';
                                                               echo '<i class="fa fa-star" style="color:lightgray;float:right;"></i>';
                                                          }
                                                        echo '<small style="float:right">Rating:</small>';
                                                           ?>
                                                         </div>
		                                <div style="width: 100%;height: 150px; overflow: hidden; ">
		                                      <img src="images/rooms/<?php echo $srow['image'];  ?>" class="product-image" alt="Product Image" style="height: 100%;" >
		                                </div>
		                                <br>
		                                <h6><small>Hotel Name :</small><br>
		                                  <b><?php echo $storename  ?></b>
		                                </h6>
		                                <h6><small>Room Name :</small><br>
		                                  <b><?php echo $srow['room_name']  ?></b>
		                                </h6>
		                                <h6 style="font-size:13px;min-height: 55px;max-height: 100px;"><small>Room Description :</small><br>
		                                  <b><?php echo $romd  ?></b>
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
				<?php } } ?>
				</div>
			</div>
		</div>