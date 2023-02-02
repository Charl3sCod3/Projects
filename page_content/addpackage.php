		<div class="row">
			<div class="col-md-12">
				<div class="inner-wrapper"> 
					<div class="card" style="padding: 10px 10px">
						<div class="package-control"> 
							<div class="package-control-title text-title text-md">
								Add Package
							</div>
              
						</div>
						<div class="button">
					 		<button class="btn btn-md  bg-green float-right" onclick="addnewPackage()"><i class="fa fa-plus"></i> ADD NEW PACKAGE</button>
						</div>
					</div>
				</div>
			</div>
           	 	<div class="card" style="width: 100%;">
           	 		<div class="card-header">
                 	 	<h1 class="text-title">Your Tour Packages</h1>
           	 		</div>
           	 	</div>


            <div class="row">
                    <?php
                    $sql  = "SELECT * FROM `packagedetails` WHERE `u_id`='$user_id'";
                    $query = $con->query($sql);
                    while ($packoom = $query->fetch_array()) {
                        $packageDisc = $packoom['packageDisc'];
                    ?> 
                    <div class="col-md-6">
                      <div class="card <?php if ($packoom['user_packID'] == 1): ?>
                        card-danger
                      <?php endif ?>">
                        <div class="card-header">
                          <div class="card-title"><strong  style="font-size: 20px;margin-bottom: 0px;height: 88px;"><?php echo $packoom['packTitle']  ?></strong ><br></div>
                          <div class="card-tools">
                            <button class="btn btn-xs btn-secondary float-right" data-toggle="dropdown" style="height: 28px;width: 28px;border-radius: 50%;"><i class="fa fa-ellipsis-v"></i>
                              <div class="dropdown-menu" role="menu">
                                <a style="color:black;" class="dropdown-item" onclick="editPackage('<?php echo $packoom[0] ?>')" >Edit Data</a>
                               <!--  <a style="color:black;" class="dropdown-item" onclick="adddatetopackage('<?php echo $packoom[0] ?>')" >Schedule date</a> -->
                                <!-- <a class="dropdown-item" >Edit Status</a> -->
                              </div>
                            </button>
                          </div>
                        </div>
                        <div id="packimgcontouter" class="card-body">
                              <?php 
                                $getimgs = "SELECT * FROM `packageimg` WHERE `package_id`='$packoom[0]' Limit 4";
                                $imgq = $con->query($getimgs);
                                $imgnr = $imgq->num_rows;
                                $i=0;
                                while ($imgr = $imgq->fetch_array()) {
                                  $i++;
                               ?>
                               <div class="packimgscont">
                                <img  src="tourpackages/<?php echo $imgr[2] ?>" style="width: 100%;cursor: pointer;">
                               </div>
                           <?php } ?>
                              </div>
                        <div class="card-body">
                          <h5>Tour Schedule</h5>
                          <ul>
                          <?php 
                          $gdates = "SELECT * FROM `package_sub` WHERE `package_id`='$packoom[0]' ";
                          $gdatesq = $con->query($gdates);
                          while ($gdrow = $gdatesq->fetch_array()) {
                           ?>
                           <li><?php echo date("F d, Y" ,strtotime($gdrow['p_s_date'])) ?></li>
                         <?php } ?>
                         </ul>
                            <div class="wrapper-text">
                              <p><?php echo $packageDisc ?></p>
                              <div class="row">
                                <div class="col-12">
                                </div>
                              </div>
                            </div>
                            <div class="bg-gray py-2 px-3 " style="width: 100%;"> 
                                    <h5 class="mb-0">
                                     <strong >Price:</strong > ₱<?php echo number_format($packoom['pack_prize'],2) ?>
                                    </h5>
                                  </div>
                        </div>
                      </div>
                    </div>
         			 <?php } ?>
		</div>
	</div>