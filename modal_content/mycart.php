<?php 
  include '../dbcon.php';
$o1 = "SELECT * FROM `orderdetails` WHERE `u_id`='$user_id' AND `delivery_status` = 0 GROUP BY `b_id` ";
$oquery1 = $con->query($o1);
$orow1 = $oquery1->fetch_array();
$bb_id = $orow1['b_id'];

$nakoss = "SELECT * FROM `barangay` WHERE `brgy_id`='$bb_id'";
$getdeliveryprice = $con->query($nakoss);
$drow = $getdeliveryprice->fetch_array();
$deliveryfeexxx = $drow['delivery_fee'];
 ?>
        <div class="modal-dialog modal-md">
          <div class="modal-content bg-green">
            <div class="modal-header text-center">
              <h4 class="modal-title"><strong>Your Cart</strong></h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
            </div>
            <br>(for FOOD DELIVERY Municipality of San Jose Only)
            <form method="post" action="includes/suborder.php?uid=<?php echo $userid ?>&sd_id=<?php echo $sd_id ?>" enctype="multipart/form-data">
            <div class="modal-body">
              <div class="form-group">
                <select name="barangay" id="barangay" onchange="deliveryfee(this.value,'<?php echo $user_id ?>')" class="form-control">
                  <option selected=""  disabled="true">SELECT BARANGAY</option>
                  <?php 
                    $gb  = "SELECT * FROM `barangay`";
                    $gbq = $con->query($gb);
                    while ($gbrow = $gbq->fetch_array()) {
                   ?>
                    <option <?php if ($bb_id==$gbrow[0]): ?>
                      selected
                    <?php endif ?> value="<?php echo $gbrow[0] ?>"><?php echo $gbrow[1] ?></option>
                 <?php } ?>
                  
                </select>
              </div>
              <div class="form-group">
                <input type="text" required="" name="del_add" id="del_add" class="form-control" placeholder="Purok |  ilhanan">
              </div>
              <table style="width: 100%;border-collapse: collapse;" border="1px">
                <tr>
                  <th style="text-align: center;">Product</th>
                  <th style="text-align: center;width: 100px;">Price</th>
                  <th style="text-align: center;width:80px;">Qtty</th>  
                  <th style="text-align: center;">Amount</th>
                  <th style="text-align: center;">X</th>
                </tr>
                <?php 
                  $o = "SELECT * FROM `orderdetails` WHERE `u_id`='$user_id' AND `delivery_status` = 0 ";
                  $oquery = $con->query($o);
                  $onumrow = $oquery->num_rows;
                  $i=0;
                  $totalamount = 0;
                  $totalgcash =0;
                  while ($orow = $oquery->fetch_array()) {
                    $i++;
                    $percentaddition = (5 / 100) * $orow['prod_price'];
                    $price = $orow['prod_price'] + $percentaddition;
                    $am = $price * $orow['qtty'];
                    $amm = $orow['prod_price'] * $orow['qtty'];
                    $amname = "amount".$i;
                    $totalamount = $totalamount + $am;
                    $totalgcash = $totalgcash + $amm;
                    $orderId = $orow[0];
                 ?>
                 <input type="hidden" name="o_id[]" value="<?php echo $orow[0] ?>">
                <tr>
                  <td><input type="text" style="width: 100%;" readonly="" value="<?php echo $orow['prod_name'] ?>"></td>
                  <td><input type="text" style="width: 100%;" readonly="" value="<?php echo $orow['prod_price']+$percentaddition ?>"></td>
                  <td><input type="text" name="qtty[]" required="" onchange="cartcalcprice(this.value,'<?php echo $orow[0] ?>','<?php echo $user_id ?>')" style="width: 100%;" value="<?php echo $orow['qtty'] ?>" ></td>
                  <td><input type="text" name="amount[]" id="<?php echo $amname ?>" style="width: 100%;" readonly="" value="<?php echo number_format($am,2) ?>"></td>
                  <td><button onclick="removeCartOrder('<?php echo $userid ?>','<?php echo $sd_id ?>','<?php echo $orderId ?>')" class="btn btn-xs btn-danger">x</button></td>
                </tr>
                <?php }
                   $totalamount = $totalamount+$deliveryfeexxx;
                 ?>
                <tr>
                  <td colspan="3" style="text-align: right;font-weight: bold;" >Delivery fee - </td>
                  <td colspan="1" style="text-align: right;"><input type="text" readonly="" value="<?php echo $deliveryfeexxx ?>" id="delfee" style="width: 100%;"></td>
                </tr>
                <tr>
                  <td colspan="3" style="text-align: right;font-weight: bold;" >Total - </td>
                  <td colspan="1" style="text-align: right;"><input type="text" readonly="" value="<?php echo $totalamount ?>" name="total" id="totalx" style="width: 100%;"></td>
                </tr>
                <?php if ($onumrow = 0): ?>
                   <tr><td colspan="4" style="text-align: center;">No Data</td></tr>
                 <?php endif ?>
              </table>
              <p style="padding: 10px;background-color: white;margin-top: 5px;font-size:10px;" class="text-muted">Note: if you pay through Gcash Delivery fee will not be included instead give it directly to the rider thanks!</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              <div style="width: 30%;display: flex;justify-content: space-around;">
                <div>
                <button type="submit" id="codbtn" name="cod" class="btn btn-outline-light" style="color:black;">COD</button>
               <!-- <button type="submit" name="" class="btn btn-outline-light">GCASH</button> -->
              </div>
              <a class="btn btn-primary btn-md" onclick="gcashtest1('<?php echo $totalgcash ?>','<?php echo $user[10]; ?>','<?php echo $user[8]; ?>','<?php echo $userfullname ?>','INSIDE DINAGAT Online Food Order','orderdetails','<?php echo $user_id ?>','u_id')">GCASH</a>
              </div>
            </div>
            </form>
          </div> 
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->