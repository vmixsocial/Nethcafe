<!DOCTYPE html>
<html lang="en">
<head>
	<title>Menu</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="<?php echo base_url();?>assets/images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/fonts/themify/themify-icons.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/vendor/lightbox2/css/lightbox.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/css/main.css">
<!--===============================================================================================-->
</head>
<body class="animsition">

	<!-- Header -->
	
    <?php $this->load->view('common/menu');?>

	<!-- Title Page -->
	<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(<?php echo base_url();?>assets/images/menuimg.jpg);">
		<h2 class="tit6 t-center">
			Neth Cafe Menu
		</h2>
	</section>


	<!-- Main menu -->


    <?php
    if($menuitem){
      foreach($menuitem as $mitm){	
    ?>
	<!-- Lunch -->
	<section class="section-lunch bgwhite">
		<!--<div class="header-lunch parallax0 parallax100" style="background-image: url(<?php echo base_url();?>assets/images/header-menu-01.jpg);">
			<div class="bg1-overlay t-center p-t-170 p-b-165">
				<h2 class="tit4 t-center">
					Lunch
				</h2>
			</div>
		</div>-->
        <div align="center" style="padding-top: 30px;font-size: 32px"><?php echo $mitm['prodcatname'];?></div>
		<div class="container">
			<div class="row p-t-108 p-b-70">
                <?php
                $i=1;
                if($mitm['prodcatname']){
                	foreach($mitm['products'] as $prds){
                   	if($i%2==0){	
                ?>

				<div class="col-md-8 col-lg-6 m-l-r-auto">
					<!-- Block3 -->
					<div class="blo3 flex-w flex-col-l-sm m-b-30">
						<div class="pic-blo3 size20 bo-rad-10 hov-img-zoom m-r-28">
							<a href="#"><img src="<?php echo base_url();?>assets/images/soup/s1.jpg" alt="IMG-MENU"></a>
						</div>

						<div class="text-blo3 size21 flex-col-l-m">
							<a href="#" class="txt21 m-b-3">
								<?php echo $prds->product_name;?>
							</a>

							<span class="txt23">
								Available Qty <?php echo $prds->qty;?>
							</span>

							<span class="txt22 m-t-20">
								Rs <?php echo number_format($prds->unit_price,2);?>
							</span>
							<span class="txt22 m-t-20">
								<form action="<?php echo base_url();?>index.php/home/add_to_cart" method="post">
								<input type="number" name="quantity" style="border: 2px;border-color: #000000;" min="1" value="1">
								<input type="hidden" name="product_id" value="<?php echo $prds->product_id;?>">
								<input type="hidden" name="product_name" value="<?php echo $prds->product_name;?>">
								<input type="hidden" name="product_price" value="<?php echo $prds->unit_price;?>">
								<button class="btn btn-success btn-sm" type="submit">Add To Cart</button>
							    </form>
							</span>
						</div>
					</div>

					<!-- Block3 -->
					

					
				</div>
				<?php
                 }else{
				?>

				<div class="col-md-8 col-lg-6 m-l-r-auto">
					<!-- Block3 -->
					<div class="blo3 flex-w flex-col-l-sm m-b-30">
						<div class="pic-blo3 size20 bo-rad-10 hov-img-zoom m-r-28">
							<a href="#"><img src="<?php echo base_url();?>assets/images/soup/s3.jpg" alt="IMG-MENU"></a>
						</div>

						<div class="text-blo3 size21 flex-col-l-m">
							<a href="#" class="txt21 m-b-3">
								<?php echo $prds->product_name;?>
							</a>

							<span class="txt23">
								Available Qty <?php echo $prds->qty;?>
							</span>

							<span class="txt22 m-t-20">
								Rs <?php echo number_format($prds->unit_price,2);?>
							</span>
							<span class="txt22 m-t-20">
								<form action="<?php echo base_url();?>index.php/home/add_to_cart" method="post">
								<input type="number" name="quantity" style="border: 2px;border-color: #000000;" min="1" value="1">
								<input type="hidden" name="product_id" value="<?php echo $prds->product_id;?>">
								<input type="hidden" name="product_name" value="<?php echo $prds->product_name;?>">
								<input type="hidden" name="product_price" value="<?php echo $prds->unit_price;?>">
								<button class="btn btn-success btn-sm" type="submit">Add To Cart</button>
							    </form>
							</span>
						</div>
					</div>

				</div>
                <?php
                    }
                   }
                 }else{
                 	echo "No Available Products";
                 }
                ?>

			</div>
		</div>
	</section>
    <hr>
	<?php
      }
    }
    ?>


	<!-- Dinner -->
	


	

	<!-- Footer -->
	
    <?php $this->load->view('common/footer');?>

	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>


<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url();?>assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url();?>assets/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url();?>assets/vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url();?>assets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url();?>assets/vendor/daterangepicker/moment.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url();?>assets/vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url();?>assets/vendor/parallax100/parallax100.js"></script>
	<script type="text/javascript">
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url();?>assets/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url();?>assets/vendor/lightbox2/js/lightbox.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url();?>assets/js/main.js"></script>

</body>
</html>
