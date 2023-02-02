
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="index.php" class="navbar-brand" style="width:200px; height:100%; ">
        <img src="image/logo1.png" alt="Inside Dinagat" class="img-fluid elevation-3"
             >
      </a>
      
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <?php if (isset($userid) AND isset($position) AND $position < 4): ?>
            <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <?php endif ?>
           <li class="nav-item">
            <a href="index.php" class="nav-link">HOME</a>
          </li>

          <?php if ($position != 6): ?>
             <li class="nav-item">
            <a href="?q=aboutUs" class="nav-link">ABOUT US</a>
          </li> 
             <li class="nav-item">
              <a href="?q=rent" class="nav-link">WANT TO RENT A SERVICE?</a>
            </li> 
          <?php else: ?>
                         <li class="nav-item">
                          <a href="?t=addtourpackage" class="nav-link">Add Package</a>
                        </li>
                        <li class="nav-item">
                          <a href="?t=tourbooking" class="nav-link">Tour Booking</a>
                        </li>
                        <li class="nav-item">
                          <a href="#" class="nav-link">Tour history</a>
                        </li>
          <?php endif ?>
             <?php if (isset($userid)): ?>
                <?php if ($position == 4): ?>
                   <li class="nav-item dropdown">
                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Orders</a>
                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                      <li><a href="?q=customerOrder" class="dropdown-item">Track Orders</a></li>
                      <li><a href="?q=transhistory" class="dropdown-item">Transaction History</a></li>
                    </ul>
                  </li>
                <?php endif ?>
                <li class="nav-item" id="phoneView">
                    <a class="nav-link"  href="includes/queries.php?logout=true" role="button"><i
                        class="fa fa-door"></i>Logout</a>
                  </li>
              <?php endif ?>
              <?php if (!isset($userid)): ?>
                 <li class="nav-item" id="phoneView">
                <a class="nav-link"  href="?q=login" role="button"><i
                    class="fa fa-door"></i>Login</a>
              </li>
               <?php endif ?>
        </ul>
      </div>
      <!-- Right navbar links -->
      <ul id="desktopView" class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">







       <?php if (isset($userid) && $position == 1): ?>
        <li class="nav-item dropdown " id="foodnotification">

        <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="true">
          <i class="fa fa-truck"></i>
          <span class="badge badge-warning navbar-badge"><?php echo foodnotificationNum() ?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right " style="left: inherit; right: 0px;">
          <span class="dropdown-item dropdown-header"><?php echo foodnotificationNum() ?> Food Orders</span>
          <?php 
            $gao =  foodnotification();
            while ($gaor = $gao->fetch_array()) {
              $client = getUser($gaor['u_id']);
           ?>
          <a href="?q=fordelivery" class="dropdown-item">
            <i class="fas fa-shopping-cart mr-2"></i> <?php echo $client ?>
          </a>
        <?php } ?>
          <div class="dropdown-divider"></div>
          <a href="?q=fordelivery" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>

      </li>
         <?php endif ?>








         <?php if (isset($userid)): ?>
           <li class="nav-item">
          <a class="nav-link"  href="includes/queries.php?logout=true" role="button"><i
              class="fa fa-door"></i>Logout</a>
        </li>
         <?php endif ?>
         <?php if (!isset($userid)): ?>
           <li class="nav-item">
          <a class="nav-link"  href="?q=login" role="button"><i
              class="fa fa-door"></i>Login</a>
        </li>
         <?php endif ?>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button"><i
              class="fas fa-th-large"></i></a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar 