<?php 
  include '../dbcon.php';
    $food_details = "SELECT * FROM `food_details` WHERE `f_id`='$f_id'";
    $fdquery = $con->query($food_details);
    $fdrow = $fdquery->fetch_array();
 ?>
        <div class="modal-dialog modal-md">
          <div class="modal-content bg-green">
            <div class="modal-header">
              <h4 class="modal-title">EDIT FOOD DETAILS</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <form method="post" action="includes/queries.php?f_id=<?php echo $f_id ?>" enctype="multipart/form-data">
            <div class="modal-body">
                  <div class="form-group">
                            <label class="col-form-label" for="prodname">Product Name:</label>
                            <input required="" type="text" required name="prodname" value="<?php echo $fdrow['food_name'] ?>" class="form-control" id="prodname" placeholder="Ex. Tap-Silog">
                  </div>
                  <div class="form-group">
                        <label class="col-form-label" for="prodprice">Product Price:</label>
                        <input required="" type="text" required name="prodprice" value="<?php echo $fdrow['food_price'] ?>" class="form-control" id="prodprice" placeholder="Ex. 80">
                  </div>
                  <div class="form-group">
                        <label class="col-form-label" for="quantity">Quantity:</label>
                        <input required="" type="text" required name="quantity" value="<?php echo $fdrow['prodquan_id']?>" class="form-control" id="quantity" placeholder="Limit 100 ">
                  </div>
                  <div class="form-group">
                        <label class="col-form-label" for="proddesc">Product Description:</label>
                        <textarea required="" class="form-control" id="proddesc" name="proddesc" placeholder="Tapa 1pcs Egg"><?php echo $fdrow['food_desc'] ?></textarea>
                  </div>
                  <div class="form-group">
                    <!-- <label for="customFile">custom-filetom File</label> -->
                    <label  class="col-form-label" for="im">Product Image</label>
                    <div class="custom-file" id="im">
                      <input type="file" name="image" class="custom-file-input" id="customFile">
                      <label class="custom-file-label" for="customFile"><?php echo $fdrow['image'] ?></label>
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
                             <option <?php if ($fdrow['food_cat_id'] == $pcr[0]): ?>
                               selected
                             <?php endif ?> value="<?php echo $pcr[0] ?>"><?php echo $pcr[1] ?></option>
                           <?php } ?>
                        </select>
                  </div>
                  <div class="form-group">
                        <label class="col-form-label" for="status">Product Availability:</label>
                        <select required="" name="status" required class="form-control select2" id="status">
                          <option <?php if ($fdrow['food_status'] == 0): ?>
                            selected=""
                          <?php endif ?> value="0">Available</option>
                            <option <?php if ($fdrow['food_status'] == 1): ?>
                              selected=""
                            <?php endif ?> value="1">Not Available</option>
                        </select>
                  </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              <button type="submit" name="editprod" class="btn btn-outline-light">Save</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->