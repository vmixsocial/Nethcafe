<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title><?php echo com_title;?></title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url()?>business/plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url()?>business/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>business/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link rel="stylesheet" href="<?php echo base_url()?>business/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?php echo base_url()?>business/plugins/toastr/toastr.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>business/dist/css/adminlte.min.css">


  <link rel="stylesheet" href="<?php echo base_url()?>business/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>business/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">

</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <?php $this->load->view('internal/common/navbar_viw');?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php $this->load->view('internal/common/aside_viw');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?php echo $subTitle;?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#"><?php echo $mainTitle;?></a></li>
              <li class="breadcrumb-item active"><?php echo $subTitle;?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> NETH CAFE.
                    <small class="float-right">Date: <?php echo date("Y-m-d");?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        From
        <address>
          <strong>Neth cafe.</strong><br>
          Gampaha<br>
          
          Phone: 0254778947<br>
          Email: nethcafe@gmail.com
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        To
        <address>
          <strong><?php echo $order_data['customer'];?></strong><br>
          Delivery To : <?php echo $order_data['delivery_address'];?><br>
          Phone: <?php echo $order_data['contact'];?><br>
          
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <b>bill #<?php echo $order_data['order_id'];?></b><br>
        <br>
        
      </div>
      <!-- /.col -->
    </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
          <thead>
          <tr>
            
            <th>Product</th>
            <th>Unit Price</th>
            <th>Qty</th>
            <th>Subtotal (Rs)</th>
          </tr>
          </thead>
          <tbody>
          <?php
          foreach($order_data['order_items'] as $ordritm){

          ?>  
          <tr>
            <td><?php echo $ordritm->product_name;?></td>
            <td><?php echo number_format($ordritm->unit_price,2);?></td>
            <td><?php echo $ordritm->itmqty;?></td>
            <td><?php echo number_format($ordritm->unit_price*$ordritm->itmqty,2);?></td>
          </tr>
          <?php
           } 
          ?>
          
          </tbody>
        </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
        <p class="lead">Payment Methods:</p>
        Cash On Delivery
        <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
          Make Sure IF you get All the Food Before Give Money
        </p>
      </div>
                <!-- /.col -->
                <div class="col-6">
                  

                  <div class="table-responsive">
                    <table class="table">
                      
                      <tr>
                        <th>Total:</th>
                        <td>Rs <?php echo number_format($order_data['total_price'],2);?></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="<?php echo base_url()?>index.php/dashboard/bill_print/<?php echo $order_data['order_id'];?>" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  <a type="button" class="btn btn-success float-right" href="<?php echo base_url()?>index.php/dashboard/bill_save/<?php echo $order_data['order_id'];?>"><i class="far fa-credit-card"></i> Submit
                    Payment
                  </a>
                  
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

 









  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  
  <?php $this->load->view('internal/common/footer_viw')?>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?php echo base_url()?>business/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url()?>business/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url()?>business/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()?>business/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="<?php echo base_url()?>business/dist/js/demo.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?php echo base_url()?>business/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?php echo base_url()?>business/plugins/raphael/raphael.min.js"></script>
<script src="<?php echo base_url()?>business/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?php echo base_url()?>business/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url()?>business/plugins/chart.js/Chart.min.js"></script>

<!-- PAGE SCRIPTS -->
<script src="<?php echo base_url()?>business/dist/js/pages/dashboard2.js"></script>
<script src="<?php echo base_url()?>business/js/company_setup.js"></script>
<script src="<?php echo base_url()?>business/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?php echo base_url()?>business/plugins/toastr/toastr.min.js"></script>

<script src="<?php echo base_url()?>business/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>business/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url()?>business/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>

<script type="text/javascript">
  $(document).ready( function() {

    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });

   
      
  });
</script>
</body>
</html>
