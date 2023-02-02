<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <?php switch ($bus_iid) {
            case '2':
                 ?>
                 <li class="nav-item">
                      <a href="?q=foods" class="nav-link">
                        <i class="nav-icon fa fa-home"></i>
                        <p>
                          Your Rooms
                         <!--  <span class="right badge badge-danger">Manage</span> -->
                        </p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="?q=unoccupiedRoomsH" class="nav-link">
                        <i class="nav-icon fa fa-home"></i>
                        <p>
                          Available Rooms
                         <!--  <span class="right badge badge-danger">Manage</span> -->
                        </p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="?q=roomsCheckoutH" class="nav-link">
                        <i class="nav-icon fa fa-door-open"></i>
                        <p>
                         Checkout Today
                         <!--  <span class="right badge badge-danger">Manage</span> -->
                        </p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="?q=reservationH" class="nav-link">
                        <i class="nav-icon fa fa-book"></i>
                        <p>
                          Reservations
                         <!--  <span class="right badge badge-danger">Manage</span> -->
                        </p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="?q=occupiedRoomsH" class="nav-link">
                        <i class="nav-icon fa fa-door-closed"></i>
                        <p>
                          Occupied Rooms
                         <!--  <span class="right badge badge-danger">Manage</span> -->
                        </p>
                      </a>
                    </li>
                 <?php
              break;
            case '4':
                  ?>
                  <li class="nav-item">
                      <a href="?q=foods" class="nav-link">
                        <i class="nav-icon fa fa-book"></i>
                        <p>
                          Your Products
                          <span class="right badge badge-danger">Manage</span>
                        </p>
                      </a>
                    </li>

                    <li class="nav-item">
                      <a href="?q=orders" class="nav-link">
                        <i class="nav-icon fa fa-book"></i>
                        <p>
                          Orders
                          <span class="right badge badge-danger">Manage</span>
                        </p>
                      </a>
                    </li>
                <?php
              break;
            
                 } ?>
         
 <!--          <li class="nav-header">PRINTABLE LIST</li>
          <li class="nav-item">
            <a href="page_content/hhandfamilies.php" class="nav-link">
              <i class="nav-icon fa fa-list"></i>
              <p>
                HH AND FAMILIES
              
              </p>
            </a>
          </li> -->
        </ul>