<?php include '../dbcon.php';
$stabdetails ="SELECT * FROM `packagedetails` WHERE `package_id`='$pak_id'";
  $sdquery = $con->query($stabdetails);
  $sdrow = $sdquery->fetch_array();
?> 
<div class="modal-dialog modal-lg">
  <div class="modal-content bg-green">
    <div class="modal-header">
      <h4 class="modal-title">Edit Packages</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span></button>
    </div>
    <form id="editPackageForm" method="post" action="includes/queries.php">
            <div class="modal-body">
                    <div class="form-group">
                       <label class="col-form-label" for="packTitle">Package Name:</label>
                       <input required="" type="text" required name="packTitle" class="form-control" id="packTitle" placeholder="" value="<?php echo $sdrow['packTitle'] ?>">
                    </div>
                    <div class="form-group">
                      <label class="col-form-label" for="packageDesc">Product Description:</label>
                      <textarea id="packageDesc" required="" class="form-control"  name="packageDesc" placeholder=""><?php echo $sdrow['packageDisc'] ?></textarea>
                   </div>
                   <div class="row">
                     <div class="col-4">
                       <div class="form-group">
                      <label class="col-form-label" for="package-price">Price:</label>
                      <input required="" class="form-control" id="pack-price" name="pack_prize" placeholder="Price" value="<?php echo $sdrow['pack_prize'] ?>">
                    </div>
                     </div>
                     <div class="col-4">
                       <div class="form-group">
                        <label class="col-form-label" for="package-price">Package Status</label>
                        <select name="packstatus" id="packstatus"  class="form-control">
                          <option value="0">Available</option>
                          <option value="1">Not Available</option>
                        </select>
                      </div>
                     </div>
                   </div>
              </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
            <input type="hidden" name="editPackageData" id="editPackageData" value="<?php echo $pak_id ?>">
          <button type="submit" name="a" class="btn btn-outline-light">Update</button>
          </div>
</form>
    </div>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
