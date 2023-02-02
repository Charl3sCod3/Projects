 <?php  
  include '../dbcon.php';
    $sql="SELECT * FROM `booking` as b inner join `room_details` as rd WHERE b.room_id=rd.room_id AND b.booking_id='$book_id'";
    $query = $con->query($sql);
    $srow = $query->fetch_array();
    $balance = $totam - $srow['payed_amount'];
  ?>
 <div class="modal-dialog modal-lg">
          <div class="modal-content bg-lightblue">
            <div class="modal-header">
              <h4 class="modal-title">CHECKOUT BOOKING</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <form id="checkoutBookingForm" method="post" action="includes/queries.php" enctype="multipart/form-data">
              <input type="hidden" name="checkoutbookingnow" id="checkoutbookingnow" value="<?php echo $book_id ?>">
              <input type="hidden" name="" id="" value="">
            <div class="modal-body">
              <div class="row">
                <div class="col-6">
                    <div class="card" style="cursor: pointer;position:relative;color:black;">
                                  <div class="card-body">
                                    <div style="width: 100%;height: 150px; overflow: hidden; ">
                                          <img src="images/rooms/<?php echo $srow['image'];  ?>" class="product-image" alt="Product Image" > 
                                    </div>
                                    <h6><small>Room Name :</small><br>
                                      <b><?php echo $srow['room_name']  ?></b>
                                    </h6>
                                    <h6 style="font-size:14px;height: 55px;"><small>Room Description :</small><br> 
                                      <b><?php echo $srow['room_descrip']  ?></b>
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
                                              <small>PRICE PER DAY:</small> ₱<?php echo number_format($srow['cost_id'],2) ?>
                                              </h5>
                                            </div>
                                  </div>
                            </div>
                </div>
                <div class="col-6">
                  <div class="card">
                    <div class="card-body" style="color:black;padding: 10px">
                      <h6><small>Customer Name :</small><br>
                                      <b><?php echo getUser($srow['u_id'])  ?></b>
                                    </h6>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-body" style="color:black;padding: 10px">
                      <div class="row">
                                      <div class="col-6">
                                        <h6 style="text-align: center;"><small>Check-in Date :</small><br>
                                      <b><?php echo date("F d, Y", strtotime($srow['checkIn']))  ?></b>
                                    </h6>
                                      </div>
                                      <div class="col-6">
                                        <h6 style="text-align: center;"><small>Check-Out Date :</small><br>
                                      <b><?php echo date("F d, Y", strtotime($srow['checkOut']))  ?></b>
                                    </h6>
                                      </div>
                                    </div>
                    </div>
                  </div>
                      <div class="row">
                            <div class="col-6">
                                 <div class="card">
                                    <div class="card-body" style="color:black;padding: 10px">                   
                                              <h6 style="text-align: center;"><small>Days :</small><br>
                                            <b><?php echo $numdays;  ?></b>
                                          </h6>
                                       </div>
                                  </div>
                            </div>
                            <div class="col-6">
                                <div class="card">
                                    <div class="card-body" style="color:black;padding: 10px">
                                            <h6 style="text-align: center;"><small>Total Amount</small><br>
                                          <b>₱<?php echo number_format($srow['payed_amount'],2) ?></b>
                                        </h6>
                                      </div>
                                </div>
                             </div>
                        </div>
                   
                  <div class="row">
                    <div class="col-6">
                        <div class="card">
                      <div class="card-body" style="color:black;padding: 10px">
                            <h5 style="margin:0px;"><small style="font-size:14px;">Already paid:</small><br>
                              <h5 style="text-align: right;margin:0px;"><b>₱<?php echo number_format($totam,2) ?></b></h5>
                            </h5>
                          </div>
                        </div>
                    </div>
                    <div class="col-6">
                      <div class="card">
                      <div class="card-body" style="color:black;padding: 10px">
                        <h5 style="margin:0px;"><small style="font-size:14px;">Balance:</small><br>
                          <h5 style="text-align: right;margin:0px;"><b>₱<?php echo number_format($balance,2) ?></b></h5>
                        </h5>
                      </div>
                    </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              <button type="submit" name="newrider" class="btn btn-outline-light">CheckOut</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
</div>
        <!-- /.modal-dialog -->