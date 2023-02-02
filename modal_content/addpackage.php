<?php include '../dbcon.php';?> 
<div class="modal-dialog modal-lg newProduct">
  <div class="modal-content bg-green">
    <div class="modal-header">
      <h4 class="modal-title">Add Package</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span></button>
    </div>
    <div class="tabs-module" id="tabs-1">
        <form method="post" action="includes/queries.php?uid=<?php echo $userid ?>" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                       <label class="col-form-label" for="prodname">Package Name:</label>
                       <input required="" type="text" required name="packTitle" class="form-control" id="prodname" placeholder="">
                    </div>
                    <div class="form-group">
                      <label class="col-form-label" for="proddesc">Product Description:</label>
                      <textarea id="packageDesc" required="" class="form-control" id="packageitem" name="packageDisc" placeholder=""></textarea>
                   </div>
                   <div class="row">
                     <div class="col-4">
                       <div class="form-group">
                      <label class="col-form-label" for="package-price">Price:</label>
                      <input required="" class="form-control" id="pack-price" name="pack_prize" placeholder="Price">
                    </div>
                     </div>
<!--                      <div class="col-4">
                       <div class="form-group">
                      <label class="col-form-label" for="package-price">PackageType:</label>
                    </div>
                     </div> -->
                     <div class="col-4">
                       <div class="form-group">
                        <label class="col-form-label" for="package-price">Sample Images:</label>
                        <input multiple type="file" required="" class="form-control" id="tourpackimg" name="tourpackimg[]" placeholder="Price">
                      </div>
                     </div>
                   </div>
              </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
            <button type="submit" name="addpackage" class="btn btn-outline-light">Save new package</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
