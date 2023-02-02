<?php include '../dbcon.php';?> 
<div class="modal-dialog modal-sm">
  <div class="modal-content bg-green">
    <div class="modal-header">
      <h4 class="modal-title">Extend Stay</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span></button>
    </div>
        <form id="extendBooking" method="post" action="includes/queries.php?uid=<?php echo $userid ?>" enctype="multipart/form-data">
                <div class="modal-body">
                  <div class="form-group">
                    <small>Number of Days</small>
                    <input type="number" name="numberofdays" id="numberofdays" class="form-control" value="1" min="1">
                    <input type="hidden" name="booking_idx" id="booking_idx" value="<?php echo $booking_id ?>">
                  </div>
              </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
            <input type="hidden" name="extendBookingx" id="extendBookingx" value="true">
            <button type="submit" name="extendBookingx" id="extendBookingx" class="btn btn-outline-light">Extend</button>
          </div>
        </form>
    </div>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
