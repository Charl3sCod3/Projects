<?php include '../dbcon.php';
  $sql ="SELECT * FROM `accounts` WHERE `u_id`='$ur_id' ";
  $query = $con->query($sql);
  $urd = $query->fetch_array();

  if ($urd['position'] == 3) {
      $gbi ="SELECT * FROM `stablishmentdetails` WHERE `u_id`='$ur_id'";
      $gbiq = $con->query($gbi);
      $gbir = $gbiq->fetch_array();
      $comLOg =$gbir['companyLogo'];
      $comName = $gbir['companyName'];
      $comEmail = $urd['e-address'];
      $comCont = $gbir['contact_number'];
      $comPermit = $gbir['busperm'];
  }else{
      $gbi ="SELECT * FROM `agent` WHERE `u_id`='$ur_id'";
      $gbiq = $con->query($gbi);
      $gbir = $gbiq->fetch_array();
      $comLOg =$gbir['comp_logo'];
      $comName = $gbir['comp_name'];
      $comEmail = $urd['e-address'];
      $comCont = $gbir['contactnumber'];
      $comPermit = $gbir['es_business_permit'];
  }

?> 
<div class="modal-dialog modal-lg">
  <div class="modal-content bg-green">
    <div class="modal-header">
      <h4 class="modal-title">User's Profile</h4>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span></button>
    </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-6">
                  <div style="width: 100%;height: 240px;overflow: hidden;border:solid white 5px;">
                    <img src="images/<?php echo $comPermit ?>" style="width: 100%height:100%;" >
                  </div>
                </div>
                <div class="col-6">
                  <h6><small>Company Name</small><br>
                    <?php echo $comName ?>
                  </h6>
                  <h6><small>Company E-mail</small><br>
                    <?php echo $comEmail ?>
                  </h6>
                  <h6><small>Company Contact</small><br>
                    <?php echo $comCont ?>
                  </h6>
                  <div class="form-group">
                    <small>Business Permit</small><br>
                    <button class="btn btn-danger btn-sm form-control" style="width: 50%;" onclick="window.open('thephoto.php?imgName=<?php echo $comPermit ?>','The Photo', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=1000, height=1200, top=100, left=500')"><i class="fa fa-eye"></i> View Permit</button>
                  </div>
                  <?php if ($urd['status'] > 0): ?>
                        <h6><small>Account Status:</small><br>
                          ACTIVATED
                        </h6>
                    <?php else: ?>
                        <h6><small>Account Status:</small><br>
                          DI-ACTIVATED
                        </h6> 
                    <?php endif ?>
                </div>
              </div>
              </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
            <?php if ($urd['status'] > 0): ?>
              <button onclick="updateUserStatus('<?php echo $ur_id ?>','DI-ACTIVATE')" class="btn btn-md btn-danger"><i class="fa fa-thumbs-down"></i> Diactivate</button>
            <?php else: ?>
              <button onclick="updateUserStatus('<?php echo $ur_id ?>','ACTIVATE')" class="btn btn-md btn-danger"><i class="fa fa-thumbs-up"></i> Activate</button>
            <?php endif ?>
          </div>
    </div>
  </div>
  <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
