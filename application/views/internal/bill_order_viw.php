<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Neth Cafe</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 4 -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url()?>business/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>business/dist/css/adminlte.min.css">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h2 class="page-header">
          <i class="fas fa-globe"></i> NETH CAFE.
          <small class="float-right">Date: <?php echo date("Y-m-d");?></small>
        </h2>
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
          <?php echo $order_data['delivery_address'];?><br>
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
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->

<script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script>
</body>
</html>
