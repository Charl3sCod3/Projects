<form id="registerForm" method="post" action="includes/queries.php" enctype="multipart/form-data" >
      	<div class="card">
      		<div class="card-header bg-green">
      			<h4 class="card-title">
      				FILL UP THE REGISTRATION FORM
      			</h4>
      		</div>
      		<div class="card-body">
      			<div class="row">
      				<div class="col-md-6">

      					<div class="form-group">
		                    <label class="col-form-label" for="fname">FIRST NAME:</label>
		                    <input type="text" required name="fname"  class="form-control" id="fname">
	                  	</div>
	                  	<div class="form-group">
		                    <label class="col-form-label" for="mname">MIDDLE NAME:</label>
		                    <input type="text" required name="mname"  class="form-control" id="mname" >
	                  	</div>
	                  	<div class="form-group">
		                    <label class="col-form-label" for="lname">LAST NAME:</label>
		                    <input type="text" required name="lname" class="form-control" id="lname" >
	                  	</div>
	                  	<div class="form-group">
		                    <label class="col-form-label" for="cnum">CONTACT #:</label>
		                    <input type="number" required name="cnum" class="form-control" id="cnum" >
	                  	</div>
	                  	<div class="form-group">
		                    <label class="col-form-label" for="email">Email @:</label>
		                    <input type="mail" required name="email"  oninput="checkusername()" class="form-control" id="email" placeholder="Example@gmail.com">
	                  	</div>


	                  	<div class="form-group">
		                    <label class="col-form-label" for="brgy">BARANGAY:</label>
		                    <select name="brgy" required class="form-control" id="brgy">
		                    	<option selected="" disabled="true">SELECT BARANGAY</option>
		                    	<?php $brgy =  getAllBarangay();
		                    		foreach ($brgy as $key => $value) {
		                    			echo '<option value="'.$value[0].'">'.strtoupper($value[1]).'</option>';
		                    		}
		                    	 ?>
		                    </select>
	                  	</div>

	                  	<div class="form-group">
		                    <label class="col-form-label" for="purok">PUROK:</label>
		                    <input type="text" required name="purok" class="form-control" id="purok" placeholder="Ex. 7">
	                  	</div>


	      				<div class="form-group">
		                    <label class="col-form-label" for="username">USER NAME:</label>
		                    <input type="text" required name="username" oninput="checkusername()" class="form-control" id="username" placeholder="Ex. johndoe2018">
	                  	</div>
	                  	<div class="form-group">
		                    <label class="col-form-label" for="pass">PASSWORD:</label>
		                    <input type="password" required name="pass" class="form-control" id="pass" placeholder="Ex. *******">
	                  	</div>

	                  	<div class="form-group">
		                    <select name="up" required class="form-control" readonly="" id="up" onchange="checkregistration()">
		                    	<?php 
		                    	$sql = "SELECT * FROM `account_category` WHERE `cat_id`=4 ";
								$query = $con->query($sql);
		                    		while($value = $query->fetch_array()) {
		                    			echo '<option value="'.$value[0].'">'.strtoupper($value[1]).'</option>';
		                    		}
		                    	 ?>
		                    </select>
	                  	</div>
	                  	<div class="form-group pt-2">
	                  		<input type="hidden" name="register" >
	                  		<button type="submit" name="register" class="btn btn-lg bg-green">REGISTER NOW</button>
	                  	</div>
      				</div>
      				<div class="col-md-6">
      					<div id="part2">
      						
      					</div>
      				</div>
      			</div>
      		</div>
      	</div>
      </form>