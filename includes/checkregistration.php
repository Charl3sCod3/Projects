<?php 
include '../dbcon.php';
 ?>
<?php if ($position == 3): ?>
	<div class="form-group">
		<label class="col-form-label" for="cname">COMPANY NAME:</label>
		<input type="text" required="" name="cname" class="form-control" id="cname" placeholder="">
	</div>
	<div class="form-group">
		<label class="col-form-label" for="cbranch">NUMBER OF BRANCHES:</label>
		<input type="number" required="" name="cbranch" class="form-control" id="cbranch" placeholder="Ex. 229">
	</div>
	<div class="form-group">
		<label class="col-form-label" for="cnumber">CONTACT NUMBER:</label>
		<input type="text" required="" name="cnumber" class="form-control" id="cnumber" placeholder="Ex. O9098767667">
	</div>
	<div class="form-group">
		<label class="col-form-label" for="busper">BUSINESS PERMIT:</label>
		<input type="file" required="" name="busper" class="form-control" id="busper" >
	</div>
	  	<div class="form-group py-2">
            <label class="col-form-label" for="buscat">BUSINESS CATEGORY:</label>
            <select name="buscat" required class="form-control" id="buscat">
            	<option selected="">Select</option>
            	<?php $allbuscat = getallBussinesCat();
            		foreach ($allbuscat as $key => $value) {
            			echo '<option value="'.$value[0].'">'.strtoupper($value[1]).'</option>';
            		}
            	 ?>
            </select>
      	</div>

    <div class="card">
    	<div class="row">
    		<div class="card-header">
    			<strong>Term's and Agreement</strong>
    		</div>
    		<div class="card-body">
    			<div class="form-group">
                    If the business owner wants to promote certain business products and services, the company provides a condition that you will give 5% to the system as a commission which will be imposed in every products, services, goods, packages, accommodations, foods, rents.
    			</div>
    			<div class="text-wrapper-wrap">
    				<div class="checkbox-holder pr-2">
    					<input type="checkbox" name="checkbox" required>
    				</div>
    				<div class="text-holder">
    					<strong>Accept Term's and Agreement</strong>
    				</div>
    				
    			</div>
    			
    		</div>
    	</div>
    </div>

<?php endif ?>
<?php if ($position == 6): ?>
    <div class="form-group">
        <label class="col-form-label" for="tcname">COMPANY NAME:</label>
        <input type="text" required="" name="tcname" class="form-control" id="tcname" placeholder="">
    </div>
    <div class="form-group">
        <label class="col-form-label" for="tcnumber">CONTACT NUMBER:</label>
        <input type="text" required="" name="tcnumber" class="form-control" id="tcnumber" placeholder="Ex. O9098767667">
    </div>
    <div class="form-group">
        <label class="col-form-label" for="temail">EMAIL ADDRESS:</label>
        <input type="email" required="" name="temail" class="form-control" id="temail" placeholder="Ex. jorge@gmail.com">
    </div>
    <div class="form-group">
        <label class="col-form-label" for="tbusper">BUSINESS PERMIT:</label>
        <input type="file" required="" name="tbusper" class="form-control" id="tbusper" >
    </div>
    <div class="card">
        <div class="row">
            <div class="card-header">
                <strong>Term's and Agreement</strong>
            </div>
            <div class="card-body">
                <div class="form-group">
                   tourist services providers promotions made available through Service may be governed by rules that are separate from these Terms of Service. If you participate in any Promotions, please review the applicable rules as well as our Privacy Policy. 
                </div>
                <div class="text-wrapper-wrap">
                    <div class="checkbox-holder pr-2">
                        <input type="checkbox" name="checkbox" required>
                    </div>
                    <div class="text-holder">
                        <strong>Accept Term's and Agreement</strong>
                    </div>
                    
                </div>
                
            </div>
        </div>
    </div>
<?php endif ?>
