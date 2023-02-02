      	<div class="card">
      		<div class="card-header bg-green">
      			<h4 class="card-title">
      				<i class="fa fa-users"></i>	USER MANAGEMENT
      			</h4>
      		</div>
      		<div class="card-body">
      		 <!--<form method="post" action="includes/queries.php?uid=<?php echo $ur_id ?>" enctype="multipart/form-data">-->
      			<table id="example1" class="table table-bordered table-striped">
	                <thead style="font-size: 10px;font-weight: bold;">
	                	<tr>
	                
	                		<th>FIRSIT NAME</th>
	                		<th>MIDDLE NAME</th>
	                		<th>LASTNAME</th>
	                		<th>POSITION</th>
	                		<th>E-ADDRESS</th>
	                		<th>CONTACT</th>
	                		<th>STATUS</th>
	                		<th>OPT</th>
	                	</tr>
	                </thead>
	                <tbody>
	                	<?php foreach ($getUsers as $key => $value): 
	                			$userpos = getposition($value[6]);
	                			$userb = getBarangay($value[7]);
	                		?>
	                		<tr>
	                			<td><?php echo strtoupper($value[3]) ?></td>
	                			<td><?php echo strtoupper($value[4]) ?></td>
	                			<td><?php echo strtoupper($value[5]) ?></td>
	                			<td><?php echo $userpos ?></td>
	                			<td><?php echo $value[10] ?></td>
	                			<td><?php echo $value[8] ?></td>
	                			<?php if ($value[6] == 3): ?>
	                				<td><span class="right badge badge-info">BUSINESS OWNER</span></td>
	                			<?php endif ?>
	                			<?php if ($value[6] == 4): ?>
	                				<td><span class="right badge badge-danger">USER</span></td>
	                			<?php endif ?>
	                			<?php if ($value[6] == 6): ?>
	                				<td><span class="right badge badge-warning">TOUR OPERATOR</span></td>
	                			<?php endif ?>
	                			<td>
	                				<?php if ($value[6] == 4): ?>
	            						NOT Applicable
	                				<?php else: ?>
	                					<button onclick="viewProfile('<?php echo $value[0] ?>')" class="btn btn-xs btn-success"><i class="fa fa-gears"></i> View Profile</button>
	                				<?php endif ?>
	                			</td>
	                		</tr>
	                	<?php endforeach ?>
        						

               
	                </tbody>

          	    </table>
          	   <!--</form>-->
      		</div>
      	</div>