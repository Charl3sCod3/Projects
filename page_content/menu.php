<?php
$sd_id = getEstablishmentId($userid);
$room_id = getroom_details($userid);
$busCat = getBussines($bus_iid);
?>
      <div class="content-header">
        <div class="container">
          <div class="row mb-2">
            <div class="col-sm-6">
              <?php switch ($bus_iid) {
                case '2':
                ?> 
                  <h1 class="m-0 text-dark">Your Rooms<small> <i style="font-size: 15px;">All Rooms Are Listed Here</i></small></h1>
                <?php
                  break;
                case '4':
                ?>
                  <h1 class="m-0 text-dark">Your Product<small> <i style="font-size: 15px;">All product are listed here</i></small></h1>
                <?php
                  break;
              } ?>
              </div><!-- /.col -->
              <div class="col-sm-6">
                
                </div><!-- /.col -->
                </div><!-- /.row -->
                </div><!-- /.container-fluid -->
              </div>
              <div class="card">
                <div class="card-body">
                  <?php 
                  switch ($bus_iid) {
                    case '2':
                      ?>
                      <div class="row">
                            <div class="col-md-6"><p style="font-style: italic">You can add your rooms, Update Information, Or Remove a room here<br><br>
                            </p></div>
                            <div class="col-md-6">
                              <button class="btn btn-md  bg-green float-right" onclick="addnewProduct()"><i class="fa fa-plus"></i> NEW ROOM</button>
                            </div>
                          </div>
                      <?php
                      break;
                    case '4':
                      ?>
                      <div class="row">
                          <div class="col-md-6"><p style="font-style: italic">You can add your products, Update Information, Or Remove a product here<br><br>
                          </p></div>
                          <div class="col-md-6">
                            <button class="btn btn-md  bg-green float-right" onclick="addnewProduct()"><i class="fa fa-plus"></i> NEW PRODUCT</button>
                          </div>
                        </div>
                  <?php
                      break;
                  }
                   ?>
                </div>
              </div>
<?php if ($busCat[0] == 4):?>
              <?php
              $fcat = "SELECT * FROM `food_category` as fc inner join `food_details` as fd WHERE fc.fc_id=fd.food_cat_id AND fd.sd_id='$sd_id' GROUP BY fc.fc_id ";
              $fcquery = $con->query($fcat);
              while ($fcrow = $fcquery->fetch_array()) {
              $fc_id = $fcrow['fc_id'];
              ?>
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title"><?php echo $fcrow[1] ?></h4>
                </div>
                <div class="card-body">
                  <div class="row">
                    <?php
                    $getprod = "SELECT *,
                    CASE
                    WHEN `food_status` = 0 THEN 'Available'
                    WHEN `food_status` = 1 THEN 'Not Available'
                    ELSE 'IDONT KNOW' END AS food_status1
                    FROM `food_details` WHERE `sd_id` ='$sd_id' AND `food_cat_id`='$fc_id'";
                    $gpquery = $con->query($getprod);
                    while ($gprow = $gpquery->fetch_array()) {
                    ?>
                    <div class="col-md-6">
                      <div class="card" style="cursor: pointer;position: relative;<?php if ($gprow['food_status1']=='Not Available'): ?>
                        border:solid red 3px;
                        <?php endif ?>" onclick="editdetails('<?php echo $gprow[0] ?>')">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-12 col-sm-6">
                              <div style="width: 100%;height: 200px;overflow: hidden;">
                                <img src="images/<?php echo $gprow['image'] ?>" class="product-image" alt="Product Image">
                              </div>
                            </div>
                            <div class="col-12 col-sm-6">
                              <div class="form-group">
                                <strong  style="font-size: 20px;margin-bottom: 0px;height: 88px;">Food Name:</strong ><br>
                                <?php echo strtoupper($gprow['food_name']) ?>
                              </div>
                              <strong  style="font-size: 20px;margin-bottom: 0px;height: 88px;">Quantity:</strong >
                              <p><?php echo $gprow['prodquan_id'] ?><!-- <?php echo $gprow['food_desc'] ?> --></p>
                              <div class="row">
                                <div class="col-md-9">
                                  <div class="bg-gray py-2 px-3 mt-4">
                                    <h5 class="mb-0">
                                    ₱ <?php echo number_format($gprow['food_price'],2) ?>
                                    </h5>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
              <?php
              }
              ?>
  <?php endif ?>

<?php if ($busCat[0] == 2):?>
        <h6 style="padding: 10px;background-color: lightgrey;color:black;">
          List of <?php echo $busCat[1] ?>
        </h6>
                    <?php
                      $sql  = "SELECT * FROM `room_details` WHERE `sd_id`='$sd_id'";
                      $query = $con->query($sql);
                      $room = $query->fetch_array();
                      $sd_id = $room['sd_id'];
                      $room_id = $room['room_id'];
                    ?> 
                        <div class="row">
                          <?php
                          $getprod = "SELECT *,
                          CASE WHEN `rd_id` = 0 THEN 'Available' WHEN `rd_id` = 1 THEN 'Not Available' ELSE 'IDONT KNOW' END AS room_status1 FROM `room_details` WHERE `sd_id`='$sd_id' ";
                          $gpquery = $con->query($getprod);
                          $i = 1;
                          while ($gprow = $gpquery->fetch_array()) {
                          ?>
                          <div class="col-md-3">
                            <div class="card" style="cursor: pointer;position:relative;<?php if ($gprow['room_status1']=='Not Available'): ?>
                              border:solid red 3px;
                              <?php endif ?>" onclick="editroomdetails('<?php echo $gprow[0] ?>')">
                              <div id="menu_prod_cover" > 
                                Click to edit <br> data
                              </div>
                              <div class="card-body">
                                <div style="width: 100%;height: 150px; overflow: hidden; ">
                                      <img src="images/rooms/<?php echo $gprow['image'];  ?>" class="product-image" alt="Product Image" >
                                </div>
                                <h6><small>Room Name :</small><br>
                                  <b><?php echo $gprow['room_name']  ?></b>
                                </h6>
                                <h6 style="font-size:14px;height: 55px;"><small>Room Name :</small><br>
                                  <b><?php echo $gprow['room_descrip']  ?></b>
                                </h6>
                                <div class="row">
                                  <div class="col-6">
                                    <h6 style="font-size:14px;">Room: <?php echo $gprow['room_number'] ?></h6>
                                  </div>
                                  <div class="col-6">
                                    <h6 style="font-size:14px;">Persons: <?php echo $gprow['avail_id'] ?></h6>
                                  </div>
                                </div>
                                <div class="bg-gray py-2 px-3 mt-4">
                                          <h5 class="mb-0">
                                          ₱<?php echo $gprow['cost_id'] ?>
                                          </h5>
                                        </div>
                              </div>
                            </div>
                          </div>
                         <?php }?> 
                        </div>
              <?php endif ?>