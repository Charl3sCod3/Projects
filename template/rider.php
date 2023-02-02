<!DOCTYPE html>
<html>
<?php include 'includes/header.php' ?>
<body class="hold-transition sidebar-collapse layout-top-nav">
<div class="wrapper">
   <!-- Navbar -->
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
<!--           <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li> -->
          <li class="nav-item">
            <a href="?q=hahaha" class="nav-link">Active Delivery</a>
          </li>
          <li class="nav-item">
            <a href="?q=OrderDelivery" class="nav-link">For Delivery</a>
          </li>
          <li class="nav-item">
            <a href="?q=diliveredtoday" class="nav-link">Delivered Today</a>
          </li>
<!--           <li class="nav-item">
            <a href="?q=riderDeliveryHistory" class="nav-link">Delivery History</a>
          </li> -->
          
          <li class="nav-item">
            <a href="includes/queries.php?logout=true" class="nav-link">Logout</a>
          </li>
        </ul>
      </div>

    </div>
  </nav>
  <!-- /.navbar -->
    <div class="content-wrapper" >
   <div class="container">
      <?php require_once($content) ?>
    </div>
  </div>

</div>
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<script type="text/javascript">
  function setRider(that,orid){

  $.ajax({
         url:'includes/queries.php',
          type:'GET',
          data:{r_id:that,order_id:orid,setRider:'true'},
          dataType:'html',
          }).done(function(data){
               // alert(data)
             window.location.reload();
        })
}
        $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#textx').summernote();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
        const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
  });
</script>
</body>
</html>