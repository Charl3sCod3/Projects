<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<?php 
include 'includes/header.php';
 ?>
<body class="hold-transition sidebar-collapse layout-top-nav" style="position: relative;font-family: courier new">
<div class="wrapper">
<?php 
  include 'includes/nav.php';
 ?>
  <!-- Main Sidebar Container -->
<?php if (isset($userid)): ?>
  <?php if ($position < 4): ?>
      <?php include 'includes/sidebar.php' ?>
  <?php endif ?>
<?php endif ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >
   <div class="container">
      <?php require_once($content) ?>
    </div>
  </div>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer" style="height: 100px!important">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="row" style="display: flex;justify-content: space-around;">
            <div class="col-md-4 text ">
              <a href="?q=terms">Terms and Condition</a>
            </div>
          <div class=" col-md-4 text" style="text-align: center;">
            Copyright &copy; <a href="#" style="color:  #0a58ca!important;">INSIDE DINAGAT</a>  2022. Alrights Reserved.  
          </div>
            <div class="col-md-4 text px-5" >
              <a href="?q=privacy">Privacy Policy</a>
            </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="small-text text-center">
          Version 0.1
        </div>
      </div>
    </div>
  </div>
</footer>

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<?php include 'includes/scripts.php' ?>
<?php if (isset($userid)): ?>
    <?php if ($position == 4): ?>
     <button class="btn bg-green btn-md" onclick="myCart('<?php echo $userid ?>','123123')" style="position: fixed;bottom: 100px;right: 0px;z-index: 99"><i class="fa fa-shopping-cart"></i> Cart <span class="right badge badge-danger" id="cartcounter"><?php echo CountNumberOfItem($userid) ?></span></button>
    <?php endif ?>
<?php endif ?>
<div class="modal fade" id="My_modal">
  <div id="modalContent"></div>
</div>
<div class="modal fade" id="mycart">
  <div id="mycartContent"></div>
</div>

<!--   -->
</body>
</html>
