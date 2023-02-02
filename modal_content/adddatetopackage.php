<?php 
  include '../dbcon.php';
   $sql  = "SELECT * FROM `packagedetails` WHERE `package_id`='$package_id'";
      $query = $con->query($sql);
      $row = $query->fetch_array();
 ?>
        <div class="modal-dialog modal-md">
          <div class="modal-content bg-green">
            <div class="modal-header">
              <h4 class="modal-title">Schedule a tour</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <form id="adddatetopackageForm" method="post" action="includes/queries.php?uid=<?php echo $ur_id ?>" enctype="multipart/form-data">
            <div class="modal-body">
              <h6><small>Tour Package Title:</small><br>
                <b><?php echo $row['packTitle'] ?></b>
              </h6>
              <div class="form-group">
                <small>Tour Date</small>
                <input type="date" name="tour_date" class="form-control">
              </div>
              <div class="form-group">
                <small>Number of Person</small>
                <input type="number" name="tour_pax" class="form-control">
              </div>
            </div> 
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              <input type="hidden" name="package_id" value="<?php echo $package_id ?>">
              <input type="hidden" name="adddatetopackageX" value="true">
              <button type="submit" class="btn accept-user btn-outline-light">Add Schedule</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog --> 