<?php include '../dbcon.php';?>
<div class="modal-dialog modal-md newProduct">
  <div class="modal-content bg-green">
     <form id="addnewProductForm" method="post" action="includes/queries.php?uid=<?php echo $userid ?>" enctype="multipart/form-data">
    <div class="modal-header">
      <h4 class="modal-title">ADD NEW PRODUCT/SERVICES</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span></button>
    </div>
    <div class="modal-body">
       <?php 
            switch ($bus_iid) {
              case '2':
              ?>
            <div class="form-group">
              <label class="col-form-label" for="room_descrip">Room Name:</label>
              <input required="" type="text" required name="room_name" class="form-control" id="room_name" placeholder="Ex. Deluxe">
            </div>
            <div class="form-group">
              <label class="col-form-label" for="room_descrip">Room Description:</label>
              <textarea required="" class="form-control room_descrip" id="room_descrip" name="room_descrip" placeholder="2bed 1comfort room free meal"></textarea>
            </div>
            <div class="row">
              <div class="col-6">
                <div class="form-group">
                    <label class="col-form-label" for="roomavail">Room Number</label>
                    <input required="" type="number" required name="room_number" class="form-control" id="room_number" placeholder="Ex. 2">
                  </div>
              </div>
              <div class="col-6">
                <div class="form-group">
                    <label class="col-form-label" for="roomavail">Number of Persons</label>
                    <input required="" type="number" required name="roomavail" class="form-control roomavail" id="roomavail" placeholder="Ex. 2">
                  </div>
              </div>
            </div>
            <div class="form-group">
              <label class="col-form-label" for="cost_room">Room Price:</label>
              <input required="" type="number" required name="cost_room" class="form-control cost_room" id="cost_room" placeholder="Ex. 800">
            </div>
            <div class="form-group">
              <!-- <label for="customFile">custom-filetom File</label> -->
              <label  class="col-form-label" for="im">Product Image</label>
              <div class="custom-file" id="im">
                <input required="" type="file" name="image" class="custom-file-input" id="image">
                <label class="custom-file-label" for="image">Choose Picture</label>
              </div>
            </div>
            </div>
            <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
            <input type="hidden" name="addnewproductroom" id="addnewproductroom" value="true">
            <button type="submit" name="addnewproductroom" class="btn btn-outline-light submit_room">Save</button>
          </div>
                <?php
                break;
              case '3':
                  ?>
                   <li><a href="#tab-3" data-num="tabs-2" class="subscribe-item">Rent</a></li>
                <?php
                break;
              case '4':
                ?>
            <div class="form-group">
              <label class="col-form-label" for="prodname">Product Name:</label>
              <input required="" type="text" required name="prodname" class="form-control" id="prodname" placeholder="Ex. Tap-Silog">
            </div>
            <div class="form-group">
              <label class="col-form-label" for="prodprice">Product Price:</label>
              <input required="" type="text" required name="prodprice" class="form-control" id="prodprice" placeholder="Ex. 80">
            </div>
            <div class="form-group">
              <label class="col-form-label" for="quantity">Product Quantity:</label>
              <input required="" type="text" required name="quantity" class="form-control" id="quantity" placeholder="product limit 100 per day">
            </div>
            <div class="form-group">
              <label class="col-form-label" for="proddesc">Product Description:</label>
              <textarea required="" class="form-control" id="proddesc" name="proddesc" placeholder="Tapa 1pcs Egg"></textarea>
            </div>
            <div class="form-group">
              <!-- <label for="customFile">custom-filetom File</label> -->
              <label  class="col-form-label" for="im">Product Image</label>
              <div class="custom-file" id="im">
                <input required="" type="file" name="image" class="custom-file-input" id="image">
                <label class="custom-file-label" for="image">Choose Picture</label>
              </div>
            </div>
            <div class="form-group">
              <label class="col-form-label" for="prodcat">Product Category:</label>
              <select required="" name="prodcat" required class="form-control select2" id="prodcat">
                <option selected="" disabled="true">SELECT FOOD CATEGORY</option>
                <?php
                $pc = "SELECT * FROM `food_category` ";
                $pcq = $con->query($pc);
                while ($pcr = $pcq -> fetch_array()) {
                ?>
                <option value="<?php echo $pcr[0] ?>"><?php echo $pcr[1] ?></option>
                <?php } ?>
              </select>
            </div>
            </div>
            <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
            <input type="hidden" name="addnewproduct" id="addnewproduct" value="true">
            <button type="submit" name="addnewproduct" class="btn btn-outline-light submit_room">Save</button>
          </div>
                <?php
                break;
            }
           ?>
         </form>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->