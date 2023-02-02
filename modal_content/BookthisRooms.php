<?php 
  include '../dbcon.php';
  $thes = "SELECT * FROM `room_details` WHERE `room_id`='$room_id'";
          $thesq = $con->query($thes);
          $srow = $thesq->fetch_array();
          $storename = getStoreName($srow['sd_id']);
          $romd =$srow['room_descrip'];
 ?>
<div class="modal-dialog modal-lg">
    <div class="modal-content bg-secondary">
        <div class="modal-header">
            <h4 class="modal-title">Room Booking form.</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
        </div>
        <form method="post" action="includes/queries.php?uid=<?php echo $ur_id ?>" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="row">
              <div class="col-6">
                <div id="roomcont" class="card" style="color:black;" >
                                  <div class="card-body">
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
              <div class="col-6">
                 <div class="form-group">
                      <small>Check-In Date</small>
                      <input type="date" id="startDate" name="startDate" class="form-control">
                    </div>
                  <div class="form-group">
                      <small>Check-Out Date</small>
                      <input type="date" id="endDate" name="endDate" class="form-control">
                    </div>
              </div>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              <button type="submit" name="updatesubs" class="btn accept-user btn-outline-light">Book</button>
        </div>
        </form>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->