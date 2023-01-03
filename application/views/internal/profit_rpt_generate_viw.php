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
      <!--/. container-fluid -->
      <div class="container-fluid">
        <?php //print_r($allcompanies);?>
   
      <?php 
           if($this->session->flashdata('errormsg')){
          ?>
          <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Error</strong><?php echo $this->session->flashdata('errormsg');?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php
           }
          ?>

          <?php 
           if($this->session->flashdata('successmsg')){
          ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success</strong> <?php echo $this->session->flashdata('successmsg');?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <?php
           }
        ?>
        
        <div class="card">
        <form action="" method="post">
          <div class="row">
             <div class="col-md-2">
              FROM : <input type="date" name="fromd" id="fromd" class="form-control">
             </div>
             <div class="col-md-2">
              TO<input type="date" name="tod" id="tod" class="form-control">
             </div>
             <div class="col-md-1"><br>
              <button class="btn btn-success btn-sm" name="findbtn">Find</button>
            </div>
          </div>
        </form>
        </div>    
 
        
        <div class="card-header">
          <div class="card-tools">
            <?php echo $rpt_title;?>
            
          </div>
        </div>
        <div class="card-body p-0">
          
          <table class="table table-bordered table-striped" id="example1">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          #
                      </th>
                      <th style="width: 20%">
                          Order ID
                      </th>
                      <th style="width: 30%">
                          Item
                      </th>
                      <th>
                          Quantiy
                      </th>
                      <th>Income</th>
                      <th>Expenditure</th>
                      <th>
                          Profit
                      </th>
                      
                  </tr>
              </thead>
              <tbody>
                <?php 
                $qtyttl = 0;
                  $sellpricettl = 0;
                  $actualpricettl = 0;
                  $profitttl = 0;
                if($profits){
                  $i=1;
                  
                  foreach($profits as $orders){
                
                ?>
                  <tr>
                      <td><?php echo $i;?></td>
                      <td><?php echo $orders->order_id;?></td>
                      <td><?php echo $orders->product_name;?></td>
                      <td><?php echo $orders->itmqty;?></td>
                      <td><?php echo $orders->unit_price;?></td>
                      <td><?php echo $orders->actual_price;?></td>
                      <td>
                        <?php echo ($orders->unit_price*$orders->itmqty)-($orders->actual_price*$orders->itmqty);?>
                      </td>
                  </tr>
                  
                  <?php
                   $i++;
                     $qtyttl += $orders->itmqty;
                     $sellpricettl += $orders->unit_price;
                     $actualpricettl += $orders->actual_price;
                     $profitttl += ($orders->unit_price*$orders->itmqty)-($orders->actual_price*$orders->itmqty);
                    }
                  }
                  ?>
              </tbody>
              <tfoot>
                <tr>
                      <td colspan="3"><strong>Total</strong></td>
                      <td><strong><?php echo $qtyttl;?></strong></td>
                      <td><strong><?php echo $sellpricettl;?></strong></td>
                      <td><strong><?php echo $actualpricettl;?></strong></td>
                      <td>
                        <strong><?php echo $profitttl;?></strong>
                      </td>
                  </tr>
              </tfoot>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      </div>
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

    $("#example12").DataTable({
      "responsive": true,
      "autoWidth": false,
    });

    $('.prodedit').click(function(){
        
        
        $('#prodids').val("");
        $('#eprodcat').val("");
        $('#eprodname').val("");
        $('#euprice').val("");
        $('#epqty').val("");
                        
        var prodid = $(this).attr('data-prodid');
        var prodcat = $(this).attr('data-prodcat');
        var prodnm = $(this).attr('data-prodnm');
        var unitprc = $(this).attr('data-unitprc');
        var qty = $(this).attr('data-qty');
               
        $('#prodids').val(prodid);
        $('#eprodcat').val(prodcat);
        $('#eprodname').val(prodnm);
        $('#euprice').val(unitprc);
        $('#epqty').val(qty);
        
        
       
        //$("#eptyp").val(amttype).change();
    });
      
  });
</script>
</body>
</html>
