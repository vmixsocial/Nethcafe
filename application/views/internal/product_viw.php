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
        <div class="card-header">
          <div class="card-tools">
            
            <button type="button" class="btn btn-tool" title="adds" data-toggle="modal" data-target="#add-product">Add New &nbsp;
              <i class="fas fa-plus"></i></button>
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
                          Category
                      </th>
                      <th style="width: 30%">
                          Product Name
                      </th>
                      <th>
                          Price
                      </th>
                      <th style="width: 8%" class="text-center">
                          Qty
                      </th>
                      <th style="width: 8%" class="text-center">
                          Status
                      </th>
                      <th style="width: 20%">
                      </th>
                  </tr>
              </thead>
              <tbody>
                <?php 
                if($product_list){
                  $i=1;
                  foreach($product_list as $prod){
                
                ?>
                  <tr>
                      <td><?php echo $i;?></td>
                      <td><?php echo $prod->product_category;?></td>
                      <td><?php echo $prod->product_name;?></td>
                      <td><?php echo $prod->unit_price;?></td>
                      <td><?php echo $prod->qty;?></td>
                      <td><?php if($prod->active_stts==1){ echo "Product Showing"; }else{ echo "Product Not Showing"; }?></td>
                      <td class="project-actions text-right">
                        <?php 
                        if($prod->active_stts==1){ 
                        ?>
                        <form action="<?php echo base_url();?>index.php/dashboard/inactive" method="post">
                         <input type="hidden" name="prodid" value="<?php echo $prod->product_id;?>"> 
                        <button class="btn btn-danger btn-sm" name="inactive">Inactive Me</button>
                        </form>
                        <?php
                        }else{ 
                        ?>
                        <form action="<?php echo base_url();?>index.php/dashboard/active" method="post">
                         <input type="hidden" name="prodid" value="<?php echo $prod->product_id;?>"> 
                        <button class="btn btn-success btn-sm" name="active">Active Me</button>
                        </form>
                        <?php
                        }
                        ?>
                          <button class="btn btn-info btn-sm prodedit" data-toggle="modal" data-target="#edit-product" data-prodid="<?php echo $prod->product_id;?>" data-prodcat="<?php echo $prod->prod_category;?>" data-prodnm="<?php echo $prod->product_name;?>" data-unitprc="<?php echo $prod->unit_price;?>" data-qty="<?php echo $prod->qty;?>" data-stkitms="<?php echo $prod->is_stock_item;?>">
                              <i class="fas fa-pencil-alt">
                              </i>
                              Edit
                          </button>
                          
                      </td>
                  </tr>
                  
                  <?php
                   $i++;
                    }
                  }
                  ?>
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <div class="modal fade" id="add-product">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Product</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="<?php echo base_url();?>index.php/dashboard/add_product" method="post" id="company-add-form">
            <div class="modal-body">
              <div class="row">
                <div class="col-md-4" align="right">Product Category</div>
                <div class="col-md-8"><select name="prodcat" id="prodcat" class="form-control" required="required">
                  <option value="">Select Category</option>
                  <option value="0">No Category</option>
                  <?php
                  if($product_cat){
                    foreach($product_cat as $pcat){
                  ?>
                  <option value="<?php echo $pcat->prod_cat_id;?>"><?php echo $pcat->product_category;?></option>
                  <?php
                    }
                  }
                  ?>
                  
                </select>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4" align="right">Stock Item</div>
                <div class="col-md-8"><select name="stkitm" id="stkitm" class="form-control" required="required">
                  <option value="">Select options</option>
                  <option value="2">Yes</option>
                  <option value="1">No</option>
                </select>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4" align="right">Product Name</div>
                <div class="col-md-8"><input type="text" name="prodname" id="prodname" class="form-control" required="required"></div>
              </div>
              <div class="row">
                <div class="col-md-4" align="right">Price</div>
                <div class="col-md-8"><input type="number" name="uprice" id="uprice" class="form-control" required="required"></div>
              </div>
              <div class="row">
                <div class="col-md-4" align="right">Qty</div>
                <div class="col-md-8"><input type="number" name="pqty" id="pqty" class="form-control" required="required"></div>
              </div>
              
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>




      <div class="modal fade" id="edit-product">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Product</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="<?php echo base_url();?>index.php/dashboard/edit_product" method="post" id="company-add-form">
            <div class="modal-body">
              <input type="hidden" name="prodids" id="prodids">
              <div class="row">
                <div class="col-md-4" align="right">Product Category</div>
                <div class="col-md-8"><select name="eprodcat" id="eprodcat" class="form-control" required="required">
                  <option value="">Select Category</option>
                  <?php
                  if($product_cat){
                    foreach($product_cat as $pcat){
                  ?>
                  <option value="<?php echo $pcat->prod_cat_id;?>"><?php echo $pcat->product_category;?></option>
                  <?php
                    }
                  }
                  ?>
                  
                </select>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4" align="right">Stock Item</div>
                <div class="col-md-8"><select name="estkitm" id="estkitm" class="form-control" required="required">
                  <option value="">Select options</option>
                  <option value="2">Yes</option>
                  <option value="1">No</option>
                </select>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4" align="right">Product Name</div>
                <div class="col-md-8"><input type="text" name="eprodname" id="eprodname" class="form-control" required="required"></div>
              </div>
              <div class="row">
                <div class="col-md-4" align="right">Price</div>
                <div class="col-md-8"><input type="number" name="euprice" id="euprice" class="form-control" required="required"></div>
              </div>
              <div class="row">
                <div class="col-md-4" align="right">Qty</div>
                <div class="col-md-8"><input type="number" name="epqty" id="epqty" class="form-control" required="required"></div>
              </div>

             
              
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>






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

    $('.prodedit').click(function(){
        
        
        $('#prodids').val("");
        $('#eprodcat').val("");
        $('#eprodname').val("");
        $('#euprice').val("");
        $('#epqty').val("");
        $('#estkitm').val(""); 

        var prodid = $(this).attr('data-prodid');
        var prodcat = $(this).attr('data-prodcat');
        var prodnm = $(this).attr('data-prodnm');
        var unitprc = $(this).attr('data-unitprc');
        var qty = $(this).attr('data-qty');
        var stkitms = $(this).attr('data-stkitms');
               
        $('#prodids').val(prodid);
        $('#eprodcat').val(prodcat);
        $('#eprodname').val(prodnm);
        $('#euprice').val(unitprc);
        $('#epqty').val(qty);
        $('#estkitm').val(stkitms); 
        
        
       
        //$("#eptyp").val(amttype).change();
    });
      
  });
</script>
</body>
</html>
