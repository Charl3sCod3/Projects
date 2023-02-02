<div class="row">
	<div class="col-3"></div>
	<div class="col-md-6">
		<div class="card card-primary" style="margin-top:4em">
			<div class="card-header">
				<h4 class="card-title">Authentication Form</h4>
			</div>
			<form id="otpcodeForm" method="get" action="includes/queries.php">
				<div class="card-body">
					<h5>For our clients safety we send otp codes to their phone for protection:</h5>
					<div class="form-group">
						<p>Please Enter the 6 digits verification code sent to your phone here</p>
						<input style="text-align: center;" type="text" name="theotpcode" id="theotpcode" class="form-control" id="control" placeholder="Enter 6 digit code here">
						<input type="hidden" name="otpp" id="otpp" value="<?php echo $acuserayd ?>">
						<input type="hidden" name="who" id="who" value="<?php echo $who ?>">
					</div>
					</div>
					<div class="card-footer">
						<button class="btn btn-md btn-primary float-right">Submit</button>
					</div>
			</form>
		</div>
	</div>
	<div class="col-3"></div>
</div>