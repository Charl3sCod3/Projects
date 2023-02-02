<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link text-center">
      <span class="brand-text font-weight-light">Inside Dinagat</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block" style="font-size: 12px;"><?php echo $userfullname ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <?php 
          if (isset($position)) {
           switch ($position) {
            case '1':
              $theSidebar = "sidebar/admin.php";
              break;
              case '2':
              $theSidebar = "sidebar/rider.php";
              break;
              case '3':
              $theSidebar = "sidebar/store.php";
              break;
              
            
          }
          require_once($theSidebar);
          }
         ?>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>