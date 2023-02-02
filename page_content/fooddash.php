<?php 
if (isset($user_id)) {
if ($position == 3) {
  $sd_id  =   getEstablishmentId($user[0]);
}

}
  $stabdetails ="SELECT * FROM `stablishmentdetails` WHERE `sd_id`='$sd_id'";
  $sdquery = $con->query($stabdetails);
  $sdrow = $sdquery->fetch_array();
  $stabbanner = $sdrow['stabbanner'];
  $stablogo = $sdrow['companyLogo'];
  $cu_id = $sdrow['u_id'];
  $bcats = $sdrow['bus_id'];

  $bcat = "SELECT * FROM `buscat` WHERE `bus_id`='$bcats' ";
  $bquery = $con->query($bcat);
  $brow = $bquery->fetch_array();

 ?>

      <div class="card card-widget widget-user" style="">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-info" style="height: 380px;background-image:url('images/<?php echo $stabbanner ?>');background-size: cover;background-repeat: no-repeat;position: relative;">
               
              <div class="widget-user-image" style="width: 200px;height:200px;bottom:100px;left: -66px;z-index: 2;position: relative;">
                  <?php 
                  if(isset($userid)){
                  if ($userid == $cu_id) { ?>
                    <img onclick="comapnyLogoUpdate('<?php echo $userid ?>','<?php echo $sd_id ?>')" class="img-circle elevation-2" src="images/<?php echo $stablogo ?>" alt="User Avatar" style="width: 100%;height: 200px;cursor: pointer;">
                <?php  }else{
               ?>
               <img  class="img-circle elevation-2" src="images/<?php echo $stablogo ?>" alt="Insert Company Logo " style="width: 100%;height: 200px;">
             <?php }}else{ ?>
                <img  class="img-circle elevation-2" src="images/<?php echo $stablogo ?>" alt="User Avatar" style="width: 100%;height: 200px;">
             <?php } ?>
              </div>

              <p class="CnameDesign"><?php echo $sdrow['companyName'] ?></p>
             <?php if (isset($userid)): ?>
                 <?php if ($userid == $cu_id): ?>
                  <button  onclick="companyBanner('<?php echo $userid ?>','<?php echo $sd_id ?>')" class="btn btn-sm btn-primary" style="position: absolute;bottom: 0px;right: 0px;opacity: 0.8;z-index: 3;background: transparent;border:transparent;"><i class="fa fa-camera"></i></button>
               <?php endif ?>
             <?php endif ?>
            </div>
            <!-- /.widget-user -->
        </div>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"><?php echo $brow['bus_cat'] ?></h4>
              </div>
              <div class="card-body">
                <div class="row">
                <?php 

                    switch ($bcats) {
                      case '2':
                            $dsql = "SELECT * FROM `room_details` WHERE `sd_id`='$sd_id' AND `rd_id`=0";
                        break;   
                      case '4':
                            $dsql = "SELECT * FROM `food_category` as fc inner join food_details as fd WHERE fc.fc_id=fd.food_cat_id AND fd.sd_id='$sd_id' GROUP BY fc.fc_id";
                        break;  
                                       }
                        $dquery = $con->query($dsql);
                        while ($drow = $dquery->fetch_array()) {
                 ?>

                  <div class="col-md-6">
                   
                        <?php if ($bcats == 4): ?>
                          <?php 
                                                       $percentaddition = $drow['food_price'] * 0.05;
                                                        $price = $drow['food_price'] + $percentaddition;
                           ?>
                 
                                  <div class="card" style="cursor: pointer;" id="product_containerD">
                                    <small style="position: absolute;bottom: 10px;left: 20px;font-size: 
                                    10px;z-index: 1;background: white;padding:5px;border-radius: 8px;border:red solid 1px; ">Prep Time:<?php echo $drow['preparation_time'] ?> mins</small>
                                      <div class="card-body">
                                          <div class="row">
                                            <div class="col-12 col-sm-6">
                                              <div class="col-12">
                                                <img src="images/<?php echo $drow['image'] ?>" class="product-image" alt="Product Image" style="height:155px !important;" title="<?php echo $drow['food_desc']  ?>">
                                              </div>
                                              
                                            </div>
                                            <div class="col-12 col-sm-6">
                                              <p style="font-size: 14px;margin-bottom: 0px;height: 88px;">
                                                <b><?php echo strtoupper($drow['food_name']) ?></b><br>
                                                <?php echo $drow['food_desc'] ?></p>
                                              <div class="row">
                                                <div class="col-md-9">
                                                  <div class="bg-gray py-2 px-3 mt-4" style="">
                                                    <h5 class="mb-0">
                                                      ₱ <?php echo number_format($drow['food_price']+$percentaddition,2) ?>
                                                    </h5> 
                                                  </div>
                                                </div>
                                                <div class="col-md-3">
                                           <!-- Guest addtocart -->
                                                <?php if (isset($userid)): ?>
                                                <?php
                                                if ($user_id != $cu_id AND $position == 4) { ?>
                                                <div class="mt-4 float-right">
                                                  <div onclick="addtocart('<?php echo $drow['f_id'] ?>','<?php echo $userid ?>')" class="btn btn-primary btn-md btn-flat">
                                                    <i class="fas fa-cart-plus fa-md mr-2"></i>
                                                  </div>
                                                </div>
                                                <?php }else{ ?>
                                                <?php  } ?>
                                                <?php endif ?>
                                                </div>
                                              </div>
                                            </div>
                                            </div>
                                    </div>
                                   </div> 
                             
                        <?php endif ?>
                     
                        <?php if ($bcats == 2): ?>
                          <div class="card">
                           <div class="card-body">
                             <div class="row">
                               <div class="col-6 col-12 col-sm-6">
                                 <div style="width: 100%;height: 200px; overflow: hidden;">
                                   <img src="images/rooms/<?php echo $drow['image'] ?>" class="product-image" >
                                 </div>
                               </div>
                               <div class="col-6">
                                  <div style="padding: 1em;">
                                      <div class="form-group">
                                         <small>Room Description:</small><br>
                                         <label><?php echo $drow['room_descrip'] ?></label>
                                      </div>
                                     <div class="form-group">
                                       <small>Number of Beds:</small><br>
                                       <label><?php echo $drow['avail_id'] ?></label>
                                     </div>
                                     <div class="form-group">
                                       <small>Room Price</small><br>
                                       <div class="bg-gray py-2 px-3 mt-4">
                                           <label style="margin: 0!important;padding:0 !important;">₱ <?php echo $drow['cost_id'] ?></label>
                                       </div>
                                     </div>
                                 </div>
                               </div>
                             </div>
                           </div>
                         </div>
                        <?php endif ?>
                  </div>
               <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
