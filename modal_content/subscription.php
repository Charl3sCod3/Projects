<?php 
  include '../dbcon.php';
    $ur_id = $_GET['ur_id'];

    $sql = "SELECT * FROM `accounts` WHERE `u_id`='$ur_id'";
    $query = $con->query($sql);
    $row = $query->fetch_array();
 ?>
        <div class="modal-dialog modal-md">
          <div class="modal-content bg-green">
            <div class="modal-header">
              <h4 class="modal-title"><?php echo $row['lname'].', '.$row['fname'].' '.$row['mname'][0].'.' ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <form method="post" action="includes/queries.php?uid=<?php echo $ur_id ?>" enctype="multipart/form-data">
            <div class="modal-body">
              <table class="table" style="border-collapse: collapse;" border="1px">
                <thead>
                  
                </thead>
                <tbody>
          
                </tbody>
              </table>
                  <div class="form-group">
                      
                  </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              <button type="submit" name="updatesubs" class="btn accept-user btn-outline-light">update</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->