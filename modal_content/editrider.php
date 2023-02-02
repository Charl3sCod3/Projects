<?php 
include '../dbcon.php';
    $sql ="SELECT * FROM `riders` WHERE `r_id`='$r_id'";
    $query = $con->query($sql);
    $row = $query->fetch_array();
 ?>
        <div class="modal-dialog modal-md"> 
          <div class="modal-content bg-green">
            <div class="modal-header">
              <h4 class="modal-title">Employ New Rider <?php echo $r_id ?></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <form method="post" action="includes/queries.php?r_id=<?php echo $r_id ?>" enctype="multipart/form-data">
            <div class="modal-body">
                  <div class="form-group">
                            <label class="col-form-label" for="fname">First Name:</label>
                            <input required="" type="text" value="<?php echo $row['fname'] ?>" required name="fname"  class="form-control" id="fname" placeholder="Ex. Scooby">
                  </div>
                  <div class="form-group">
                            <label class="col-form-label" for="mname">Middle Name:</label>
                            <input required="" type="text" required value="<?php echo $row['mname'] ?>" name="mname"  class="form-control" id="mname" placeholder="Ex. Doobii">
                  </div>
                  <div class="form-group">
                            <label class="col-form-label" for="lname">Last Name:</label>
                            <input required="" type="text" required value="<?php echo $row['lname'] ?>" name="lname"  class="form-control" id="lname" placeholder="Ex. Doo">
                  </div>
                  <div class="form-group">
                            <label class="col-form-label" for="adres">Address:</label>
                            <input required="" type="text" required name="adres" value="<?php echo $row['address'] ?>"  class="form-control" id="adres" placeholder="Purok  |  Barangay  |  Municipality">
                  </div>
                  <div class="form-group">
                            <label class="col-form-label" for="contnum">Contact Number:</label>
                            <input required="" type="text" required value="<?php echo $row['contnum'] ?>" name="contnum"  class="form-control" id="contnum" placeholder="Ex. 09838379492">
                  </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              <button type="submit" name="editrider" class="btn btn-outline-light">Save</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->