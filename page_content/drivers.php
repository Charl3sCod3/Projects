<div class="row" style="margin-top: 1em;">
	 		<div class="col-md-12">
	 			<div class="card">
			 		<div class="card-header">
			 			<h4 class="card-title">Riders</h4>
			 			<button class="btn btn-danger btn-md float-right" onclick="newRider()"><i class="fa fa-plus"></i> RIDER</button>
			 		</div>
			 		<div class="card-body">
			 			<table id="example2" class="table table-bordered table-striped dataTable no-footer dtr-inline collapsed">
			 				<thead>
			 					<tr>
			 						<th>First Name</th>
			 						<th>Middle Name</th>
			 						<th>Last Name</th>
			 						<th>Address</th>
			 						<th>Contact Number</th>
			 						<th>Act</th>
			 					</tr>
			 				</thead>
			 				<tbody>
			 					<?php 
			 						$gr = "SELECT * FROM `riders`";
			 						$grq = $con->query($gr);
			 						while ($grrow = $grq->fetch_array()) {
			 							extract($grrow)
			 					 ?>
			 					 <tr>
			 					 	<td><?php echo $fname ?></td>
			 					 	<td><?php echo $mname ?></td>
			 					 	<td><?php echo $lname ?></td>
			 					 	<td><?php echo $address ?></td>
			 					 	<td><?php echo $contnum ?></td>
			 					 	<td>
			 					 		<div class="btn-group">
						                    <button type="button" class="btn btn-danger btn-sm">Act</button>
						                    <button type="button" class="btn btn-danger dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
						                      <span class="sr-only">Toggle Dropdown</span>
						                      <div class="dropdown-menu" role="menu" style="">
						                        <a class="dropdown-item" href="#" onclick="editrider(<?php echo $r_id ?>)">Edit Details</a>
						                        <a class="dropdown-item" href="#" onclick="deleteRider('<?php echo $r_id ?>')">Delete Rider</a>
						                      </div>
						                    </button>
					                  </div>
			 					 	</td>
			 					 </tr>
			 					<?php }  ?>
			 				</tbody>
			 			</table>
			 		</div>
			 	</div>
			 </div>
</div>