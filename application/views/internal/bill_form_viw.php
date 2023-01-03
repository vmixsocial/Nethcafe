f<!DOCTYPE html>
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
              <?php //print_r($prodlist);?>        
          </div>
        </div>
        <div class="card-body p-0">
           <div class="row">
             <div class="col-md-2">
               Bill No <input type="text" class="form-control" name="billno" id="billno" readonly="readonly" value="<?php echo $nextbillno;?>">
             </div>
             <div class="col-md-3">
               Product <select class="form-control" name="prodid" id="prodid">
                          <option value="">Select Product</option>
                        <?php
                        if($prodlist){
                         foreach($prodlist as $plst){
                        ?>
                        <option value="<?php echo $plst->product_id;?>" data-curstock="<?php echo $plst->stock_qty;?>" data-stkitm="<?php echo $plst->is_stock_item;?>" data-untprice="<?php echo $plst->unit_price;?>"><?php echo $plst->product_name;?></option>
                        <?php
                         }
                        }
                        ?>
                          
                       </select>
             </div>
             <div class="col-md-2">Current Qty<input type="text" name="curstk" id="curstk" class="form-control" readonly="readonly"><input type="hidden" name="is_stock" id="is_stock" class="form-control" readonly="readonly"></div>
             <div class="col-md-2">Unit Price<input type="text" name="uprice" id="uprice" class="form-control" readonly="readonly"></div>
             <div class="col-md-2">Request Qty<input type="text" class="form-control" name="req_qty" id="req_qty" required="required"></div>
             <div class="col-md-1"><br><button class="btn btn-success btn-sm" id="additm">Add</div>

           </div> 
            <br><hr><br>
           <div class="row">
             <div class="col-md-2">&nbsp;</div>
             <div class="col-md-8">
               <table class="table">
                <tr>
                   <td colspan="3"><strong>Total</strong></td>
                   <td><input type="text" name="totalamt" id="totalamt" readonly="readonly" class="form-control"></td>
                   <td><a class="btn btn-info btn-sm" href="<?php echo base_url()?>index.php/dashboard/print_bill/<?php echo $nextbillno;?>">Save & Print</a></td>
                 </tr>
                 <tr>
                   <td>Item</td>
                   <td>Unit Price</td>
                   <td>Qty</td>
                   <td>Sub Total</td>
                   <td></td>
                 </tr>
                 <tbody id="billitm"></tbody>
               </table>
             </div>
           </div>      
        </div>
        <!-- /.card-body -->
        <br><br>
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
    var baselink = "<?php echo base_url()?>";
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });

    $('#prodid').change(function(){
      $('#curstk').val("");
      $('#is_stock').val("");
      $('#req_qty').val("");
      $('#uprice').val("");
      var curstock = $("#prodid option:selected").attr('data-curstock');
      var isstk = $("#prodid option:selected").attr('data-stkitm');
      var untprice = $("#prodid option:selected").attr('data-untprice');
      //$('#curstk').val(curstock);
      $('#is_stock').val(isstk);
      $('#uprice').val(untprice);

      var prodid = $('#prodid').val();
      get_qty(prodid);

    });

    function get_qty(prodid){
      $.ajax({
                                type: 'POST',
                                url:baselink+'index.php/dashboard/get_stock_qty',
                                dataType: 'json',
                                data:{'prodid':prodid},
                                success: function(response){
                                   $('#curstk').val(response);                                    
                                },
                                error: function(e){
                                    console.log(e);
                                    //destroymodel();
                                }
      }); 
    }

    $('#additm').click(function(){
      $('#billitm').html("");
      $('#totalamt').val("");
      var billno = $('#billno').val();
      var prodid = $('#prodid').val();
      var curstk = $('#curstk').val();
      var is_stock = $('#is_stock').val();
      var req_qty = $('#req_qty').val();
      var untprice = $('#uprice').val();
      
      if(is_stock==2){
        if(curstk<req_qty){
            alert("Requested Quantity is Grater than Current Stock")
        }else{
           additems_func(billno,prodid,curstk,is_stock,req_qty,untprice); 
        }
      }else{
        additems_func(billno,prodid,curstk,is_stock,req_qty,untprice);
      }

      
    });

    function additems_func(billno,prodid,curstk,is_stock,req_qty,untprice){
      $.ajax({
                                type: 'POST',
                                url:baselink+'index.php/dashboard/add_bill_item',
                                dataType: 'json',
                                data:{'billno':billno,'prodid':prodid,'curstk':curstk,'is_stock':is_stock,'req_qty':req_qty,'untprice':untprice},
                                success: function(response){
                                   if(response==1){
                                    alert("Item Added Succesfully")
                                   }else{
                                    alert("error adding Items")
                                   }
                                   get_current_bill_items(billno);                
                                },
                                error: function(e){
                                    console.log(e);
                                    //destroymodel();
                                }

              });
    }

    function get_current_bill_items(billno){
      $.ajax({
                                type: 'POST',
                                url:baselink+'index.php/dashboard/get_bill_data',
                                dataType: 'json',
                                data:{'billno':billno},
                                success: function(response){
                                  var ttl = 0;
                                  $.each(response, function( index, value ) {
                                    $('#billitm').append("<tr><td>"+value.product_name+"</td><td>"+value.unit_price+"</td><td>"+value.itmqty+"</td><td>"+value.unit_price*value.itmqty+"</td><td><button class='btn btn-danger btn-sm btndelete' data-prd='"+value.product_id+"' data-qtys='"+value.itmqty+"'>Delete</button></td></tr>");

                                    ttl = ttl+(value.unit_price*value.itmqty); 
                                   }); 
                                   console.log("total "+ttl)
                                   $('#totalamt').val(ttl);                    
                                                 
                                },
                                error: function(e){
                                    console.log(e);
                                    //destroymodel();
                                }
      }); 
    }

    $(document).on("click",".btndelete",function() {
      $('#billitm').html("");
      var billno = $('#billno').val();
      var prd = $(this).attr('data-prd');
      var qtys = $(this).attr('data-qtys');
      $.ajax({
                                type: 'POST',
                                url:baselink+'index.php/dashboard/delete_bill_item',
                                dataType: 'json',
                                data:{'prd':prd,'qtys':qtys,'billno':billno},
                                success: function(response){
                                  if(response==1){
                                    alert("Succesfully Deleted")
                                  }else{
                                    alert("error")
                                  }
                                   
                                   get_current_bill_items(billno);                                   
                                },
                                error: function(e){
                                    console.log(e);
                                    get_current_bill_items(billno);
                                    //destroymodel();
                                }
      }); 
    });



      
  });
</script>
</body>
</html>
