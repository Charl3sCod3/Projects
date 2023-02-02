
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<!-- <script src="plugins/toastr/toastr.min.js"></script> -->
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script async src="dist/js/adminlte.min.js"></script>

<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>

<!-- <script src="dist/js/demo.js"></script> -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- <script src="plugins/jquery-validation/jquery.validate.min.js"></script> -->
<!-- <script src="plugins/jquery-validation/additional-methods.min.js"></script> -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<script async  src="includes/myscript.js"></script>

<?php if (isset($q)): ?>
  <?php if ($view == "deliveryHistory"): ?>
    <script type="text/javascript">

      $(document).ready(function(){
     $.ajax({
      url: 'ajax/deliveryHistory.php',
      datatype:'html',
      type:'GET',
      // data:{c_id:C_id,b_id:B_id},
      })
     .done(function(data) {
      $("#deliveryHistory").html('');
      $("#deliveryHistory").html(data);
     });
  
    });
      function setpage(Page){
        $.ajax({
      url: 'ajax/deliveryHistory.php',
      datatype:'html',
      type:'GET',
      data:{page:Page},
      })
     .done(function(data) {
      $("#deliveryHistory").html('');
      $("#deliveryHistory").html(data);
     });
      }
      function searchTransaction(that){
        $.ajax({
      url: 'ajax/deliveryHistory.php',
      datatype:'html',
      type:'GET',
      data:{search:that},
      })
     .done(function(data) {
      $("#deliveryHistory").html('');
      $("#deliveryHistory").html(data);
     });
      }
</script>
  <?php endif ?>
<?php endif ?>
<?php if (isset($q)): ?>
  <?php if ($view == "transhistory"): ?>
    <script type="text/javascript">

      $(document).ready(function(){
     $.ajax({
      url: 'ajax/transactionHistory.php',
      datatype:'html',
      type:'GET',
      data:{userid:'<?php echo $userid ?>'},
      })
     .done(function(data) {
      $("#transactionHistory").html('');
      $("#transactionHistory").html(data);
     });
  
    });
      function setpage(Page){
        $.ajax({
      url: 'ajax/transactionHistory.php',
      datatype:'html',
      type:'GET',
      data:{page:Page,userid:'<?php echo $userid ?>'},
      })
     .done(function(data) {
      $("#transactionHistory").html('');
      $("#transactionHistory").html(data);
     });
      }
      function searchTransaction(that){
        $.ajax({
      url: 'ajax/transactionHistory.php',
      datatype:'html',
      type:'GET',
      data:{search:that,userid:'<?php echo $userid ?>'},
      })
     .done(function(data) {
      $("#transactionHistory").html('');
      $("#transactionHistory").html(data);
     });
      }
</script>
  <?php endif ?>
<?php endif ?>
<?php if (isset($q)): ?>
  <?php if ($view == "orderhistoy"): ?>
    <script type="text/javascript">

      $(document).ready(function(){
     $.ajax({
      url: 'ajax/orderhistoy.php',
      datatype:'html',
      type:'GET',
      data:{userid:'<?php echo $userid ?>'},
      })
     .done(function(data) {
      $("#orderhistoy").html('');
      $("#orderhistoy").html(data);
     });
  
    });
      function setpage(Page){
        $.ajax({
      url: 'ajax/orderhistoy.php',
      datatype:'html',
      type:'GET',
      data:{page:Page,userid:'<?php echo $userid ?>'},
      })
     .done(function(data) {
      $("#orderhistoy").html('');
      $("#orderhistoy").html(data);
     });
      }
      function searchTransaction(that){
        $.ajax({
      url: 'ajax/orderhistoy.php',
      datatype:'html',
      type:'GET',
      data:{search:that,userid:'<?php echo $userid ?>'},
      })
     .done(function(data) {
      $("#orderhistoy").html('');
      $("#orderhistoy").html(data);
     });
      }
</script>
  <?php endif ?>
<?php endif ?>