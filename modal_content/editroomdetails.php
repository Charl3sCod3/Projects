<?php 
  include '../dbcon.php';
    $rDetails = "SELECT * FROM `room_details` WHERE `room_id`='$room_id'";
    $rquery = $con->query($rDetails);
    $rdrow = $rquery->fetch_array();
 ?>
        <div class="modal-dialog modal-md">
          <div class="modal-content bg-green">
            <div class="modal-header">
              <h4 class="modal-title">EDIT ROOM DETAILS</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <form id="editroomdetailsForm" method="post" action="includes/queries.php" enctype="multipart/form-data">
                <div class="modal-body">
                  <div class="form-group">
                  <label class="col-form-label" for="room_descrip">Room Name:</label>
                  <input required="" type="text" required name="room_name" class="form-control" id="room_name" value="<?php echo $rdrow['room_name'] ?>"placeholder="Room name">
                </div>
              <input type="hidden" name="room_id" id="room_id" value="<?php echo $room_id ?>">
                  <div class="form-group">
                  <label class="col-form-label" for="room_descrip">Room Description:</label>
                  <input required="" type="text" required name="room_descrip" class="form-control" id="room_descrip" value="<?php echo $rdrow['room_descrip'] ?>"placeholder="product limit per day">
                </div>
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                            <label class="col-form-label" for="avail_id">No. of Persons</label>
                            <input required="" type="text" required name="avail_id" value="<?php echo $rdrow['avail_id'] ?>" class="form-control" id="avail_id" placeholder="Ex. 80">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                            <label class="col-form-label" for="avail_id">Room Number</label>
                            <input required="" type="text" required name="room_number" value="<?php echo $rdrow['room_number'] ?>" class="form-control" id="room_number" placeholder="Ex. 80">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                        <label class="col-form-label" for="cost_room">Room Price:</label>
                        <input required="" type="text" required name="cost_room" id="cost_room" value="<?php echo $rdrow['cost_id'] ?>" class="form-control" placeholder="Ex. ₱ 80">
                  </div>
                  <div class="form-group">
                    <!-- <label for="customFile">custom-filetom File</label> -->
                    <label  class="col-form-label" for="im">Product Image</label>
                    <div class="custom-file" id="im">
                      <input type="file" name="image" class="custom-file-input" id="image">
                      <label class="custom-file-label" for="customFile"><?php echo $rdrow['image'] ?></label>
                    </div>
                  </div>
                  <div class="form-group">
                        <label class="col-form-label" for="status">Product Availability:</label>
                        <select required="" name="status" id="status" required class="form-control select2" id="status">
                          <option <?php if ($rdrow['rd_id'] == 0): ?>
                            selected=""
                          <?php endif; ?> value="0">Available</option>
                            <option <?php if ($rdrow['rd_id'] == 1): ?>
                              selected=""
                            <?php endif; ?> value="1">Not Available</option>
                        </select>
                  </div>
                  <input type="hidden" name="editprodroom" id="editprodroom" value="true">
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              <button type="submit" name="editprodroom" class="btn btn-outline-light">Save</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->