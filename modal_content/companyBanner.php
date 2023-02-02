<?php 
  include '../dbcon.php';
 ?>
        <div class="modal-dialog modal-sm">
          <div class="modal-content bg-green">
            <div class="modal-header">
              <h4 class="modal-title">Update Banner</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <form method="post" action="includes/queries.php?uid=<?php echo $u_id ?>&sd_id=<?php echo $sd_id ?>" enctype="multipart/form-data">
            <div class="modal-body">

                  <div class="form-group">
                    <!-- <label for="customFile">custom-filetom File</label> -->
                    <label  class="col-form-label" for="im">Banner Image</label>
                    <div class="custom-file" id="im">
                      <input required="" type="file" name="image" class="custom-file-input" id="customFile">
                      <label class="custom-file-label" for="customFile">Choose Picture</label>
                    </div>
                  </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              <button type="submit" name="banner" class="btn btn-outline-light">Save</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->