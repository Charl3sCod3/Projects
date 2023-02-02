
        <div class="modal-dialog modal-md">
          <div class="modal-content bg-green">
            <div class="modal-header">
              <h4 class="modal-title">Employ New Rider</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <form method="post" action="includes/queries.php" enctype="multipart/form-data">
            <div class="modal-body">
                  <div class="form-group">
                            <label class="col-form-label" for="fname">First Name:</label>
                            <input required="" type="text" required name="fname"  class="form-control" id="fname" placeholder="">
                  </div>
                  <div class="form-group">
                            <label class="col-form-label" for="mname">Middle Name:</label>
                            <input required="" type="text" required name="mname"  class="form-control" id="mname" placeholder="">
                  </div>
                  <div class="form-group">
                            <label class="col-form-label" for="lname">Last Name:</label>
                            <input required="" type="text" required name="lname"  class="form-control" id="lname" placeholder="">
                  </div>
                  <div class="form-group">
                            <label class="col-form-label" for="adres">Address:</label>
                            <input required="" type="text" required name="adres"  class="form-control" id="adres" placeholder="Purok  |  Barangay  |  Municipality">
                  </div>
                  <div class="form-group">
                            <label class="col-form-label" for="contnum">Contact Number:</label>
                            <input required="" type="text" required name="contnum"  class="form-control" id="contnum" placeholder="Ex. 09838379492">
                  </div>
                  <div class="form-group">
                            <label class="col-form-label" for="usernamer">Username:</label>
                            <input required="" type="text" required name="usernamer"  class="form-control" id="usernamer" placeholder="Ex. Firstname">
                  </div>
                  <div class="form-group">
                            <label class="col-form-label" for="passwordr">Password:</label>
                            <input required="" type="password" required name="passwordr"  class="form-control" id="passwordr" placeholder="Ex. FavoriteSinger">
                  </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              <button type="submit" name="newrider" class="btn btn-outline-light">Save</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->