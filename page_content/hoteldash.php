<?php 
	switch ($view) {
		case 'occupiedRoomsH':
			$hoteldashTitle = "Occupied Rooms";
			$hoteldashContent="page_content/occupiedRoomsH.php";
			break;
		case 'unoccupiedRoomsH':
			$hoteldashTitle = "Un-Occupied Rooms";
			$hoteldashContent="page_content/unoccupiedRoomsH.php";
			break;
		
		case 'roomsCheckoutH':
			$hoteldashTitle = "Rooms for Checkout Today";
			$hoteldashContent="page_content/roomsCheckoutH.php";
			break;
		default:
			$hoteldashTitle = "LIST OF RESERVATIONS";
			$hoteldashContent="page_content/reservationH.php";
			break;
	}
 ?>
     	<div class="row my_row">
     		<div class="col-md-3 my_col-6">
     			<div class="small-box bg-primary">
		              <div class="inner">
		                <h3><?php echo Reservations($stab[0]); ?></h3>

		                <p>Reservations</p>
		              </div>
		              <div class="icon">
		                <i class="fas fa-home"></i>
		              </div>
		              <a href="?q=reservationH" class="small-box-footer">
		                More info <i class="fas fa-arrow-circle-right"></i>
		              </a>
		            </div>
     		</div>
     		<div class="col-md-3 my_col-6">
     			<div class="small-box bg-info">
		              <div class="inner">
		                <h3><?php $ocq = occupiedRooms($stab[0]);
		                	$ocnrow = $ocq->num_rows;
		                	echo $ocnrow;
		                 ?></h3>

		                <p>Occupied Rooms</p>
		              </div>
		              <div class="icon">
		                <i class="fas fa-home"></i>
		              </div>
		              <a href="?q=occupiedRoomsH" class="small-box-footer">
		                More info <i class="fas fa-arrow-circle-right"></i>
		              </a>
		            </div>
     		</div>
     		<div class="col-md-3 my_col-6">
     			<div class="small-box bg-warning">
		              <div class="inner">
		                <h3><?php echo UnoccupiedRooms($stab[0]) ?></h3>

		                <p>Available Rooms Today</p>
		              </div>
		              <div class="icon">
		                <i class="fas fa-home"></i>
		              </div>
		              <a href="?q=unoccupiedRoomsH" class="small-box-footer">
		                More info <i class="fas fa-arrow-circle-right"></i>
		              </a>
		            </div>
     		</div>
     		<div class="col-md-3 my_col-6">
     			<div class="small-box bg-success">
		              <div class="inner">
		                <h3><?php echo forcheckout($stab[0]); ?></h3>

		                <p>Rooms for checkout today</p>
		              </div>
		              <div class="icon">
		                <i class="fas fa-door-open"></i>
		              </div>
		              <a href="?q=roomsCheckoutH" class="small-box-footer">
		                More info <i class="fas fa-arrow-circle-right"></i>
		              </a>
		            </div>
     		</div>
     	</div>
     	<div class="card" id="hoteldashcont">
     		<div class="card-header">
     			<div class="card-title"><?php echo $hoteldashTitle ?></div>
     		</div>
     		<div class="card-body">
     			<?php 
     				require_once($hoteldashContent);
     			 ?>
     		</div>
     	</div>
