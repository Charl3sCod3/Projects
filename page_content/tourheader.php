<?php 
$stabdetails ="SELECT * FROM `agent` WHERE `u_id`='$user_id'";
  $sdtuery = $con->query($stabdetails);
  $sdrow = $sdtuery->fetch_array();
  $stablogo = $sdrow['comp_logo']; 
  $stabbanner = $sdrow['comp_banner'];
 ?>
 <div class="card card-widget widget-user" style="">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-info" style="height: 380px;background-image:url('images/<?php echo $stabbanner ?>');background-size: cover;background-repeat: no-repeat;position: relative;">
               
              <div class="widget-user-image" style="width: 200px;height:200px;bottom:100px;left: -66px;z-index: 2;position: relative;">
                  <img onclick="comapnyLogoUpdate('<?php echo $userid ?>','202020')" class="img-circle elevation-2" src="images/<?php echo $stablogo ?>" alt="User Avatar" style="width: 100%;height: 200px;cursor: pointer;">
              </div>

              <p class="CnameDesign" style="text-indent: 0px;"><?php echo $sdrow['comp_name'] ?></p>
                  <button  onclick="companyBanner('<?php echo $userid ?>','202020')" class="btn btn-sm btn-primary" style="position: absolute;bottom: 0px;right: 0px;opacity: 0.8;z-index: 3;background: transparent;border:transparent;"><i class="fa fa-camera"></i></button>
            </div> 
            <!-- /.widget-user -->
        </div>
<?php 
	$tview = (isset($_GET['t']) && $_GET['t'] != '') ? $_GET['t'] : '';
	switch ($tview) {
	 case 'addtourpackage':
    $tcontent ="page_content/addpackage.php";
    break;	
    case 'tourbooking':
    $tcontent ="page_content/tourbooking.php";
    break;	
    default:
			$tcontent ="page_content/tourDashboard.php";
			break;
	}
	require_once($tcontent);
 ?>