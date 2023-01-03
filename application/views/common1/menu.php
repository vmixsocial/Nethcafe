<header>
		<!-- Header desktop -->
		<div class="wrap-menu-header gradient1 trans-0-4">
			<div class="container h-full">
				<div class="wrap_header trans-0-3">
					<!-- Logo -->
					<div class="logo">
						<a href="index.html">
							<img src="<?php echo base_url();?>assets/images/icons/logo.png" alt="IMG-LOGO" data-logofixed="<?php echo base_url();?>assets/images/icons/logo2.png">
						</a>
					</div>

					<!-- Menu -->
					<div class="wrap_menu p-l-45 p-l-0-xl">
						<nav class="menu">
							<ul class="main_menu">
								<li>
									<a href="<?php echo base_url();?>index.php/home">Home</a>
								</li>

								<li>
									<a href="<?php echo base_url();?>index.php/home/menus">Menu</a>
								</li>

								<li>
									<a href="<?php echo base_url();?>index.php/home/reservations">Reservation</a>
								</li>

								<li>
									<a href="<?php echo base_url();?>index.php/home/about">About</a>
								</li>

								<li>
									<a href="<?php echo base_url();?>index.php/home/contact">Contact</a>
								</li>
							</ul>
						</nav>
					</div>

					<!-- Social -->
					<div class="social flex-w flex-l-m p-r-20">
						
						<a href="#" data-toggle="modal" data-target="#signinModal">Sign In</a>&nbsp;&nbsp;
						<a href="#" data-toggle="modal" data-target="#signupModal">Sign Up</a>

						<button class="btn-show-sidebar m-l-33 trans-0-4"></button>
					</div>
				</div>
			</div>
		</div>
	</header>

	<!-- Sidebar -->
	<aside class="sidebar trans-0-4">
		<!-- Button Hide sidebar -->
		<button class="btn-hide-sidebar ti-close color0-hov trans-0-4"></button>

		<!-- - -->
		<ul class="menu-sidebar p-t-95 p-b-70">
			<li class="t-center m-b-13">
				<a href="<?php echo base_url();?>index.php/home" class="txt19">Home</a>
			</li>

			<li class="t-center m-b-13">
				<a href="<?php echo base_url();?>index.php/home/menus" class="txt19">Menu</a>
			</li>

			<li class="t-center m-b-13">
				<a href="<?php echo base_url();?>index.php/home/about" class="txt19">About</a>
			</li>

			<li class="t-center m-b-33">
				<a href="<?php echo base_url();?>index.php/home/contact" class="txt19">Contact</a>
			</li>

			<li class="t-center">
				<!-- Button3 -->
				<a href="<?php echo base_url();?>index.php/home/reservations" class="btn3 flex-c-m size13 txt11 trans-0-4 m-l-r-auto">
					Reservation
				</a>
			</li>
		</ul>

		<!-- - -->
		<div class="gallery-sidebar t-center p-l-60 p-r-60 p-b-40">
			<!-- - -->
			<h4 class="txt20 m-b-33">
				Gallery
			</h4>

			<!-- Gallery -->
			<div class="wrap-gallery-sidebar flex-w">
				<a class="item-gallery-sidebar wrap-pic-w" href="<?php echo base_url();?>assets/images/photo-gallery-01.jpg" data-lightbox="gallery-footer">
					<img src="<?php echo base_url();?>assets/images/photo-gallery-thumb-01.jpg" alt="GALLERY">
				</a>

				<a class="item-gallery-sidebar wrap-pic-w" href="<?php echo base_url();?>assets/images/photo-gallery-02.jpg" data-lightbox="gallery-footer">
					<img src="<?php echo base_url();?>assets/images/photo-gallery-thumb-02.jpg" alt="GALLERY">
				</a>

				<a class="item-gallery-sidebar wrap-pic-w" href="<?php echo base_url();?>assets/images/photo-gallery-03.jpg" data-lightbox="gallery-footer">
					<img src="<?php echo base_url();?>assets/images/photo-gallery-thumb-03.jpg" alt="GALLERY">
				</a>

				<a class="item-gallery-sidebar wrap-pic-w" href="<?php echo base_url();?>assets/images/photo-gallery-05.jpg" data-lightbox="gallery-footer">
					<img src="<?php echo base_url();?>assets/images/photo-gallery-thumb-05.jpg" alt="GALLERY">
				</a>

				<a class="item-gallery-sidebar wrap-pic-w" href="<?php echo base_url();?>assets/images/photo-gallery-06.jpg" data-lightbox="gallery-footer">
					<img src="<?php echo base_url();?>assets/images/photo-gallery-thumb-06.jpg" alt="GALLERY">
				</a>

				<a class="item-gallery-sidebar wrap-pic-w" href="<?php echo base_url();?>assets/images/photo-gallery-07.jpg" data-lightbox="gallery-footer">
					<img src="<?php echo base_url();?>assets/images/photo-gallery-thumb-07.jpg" alt="GALLERY">
				</a>

				<a class="item-gallery-sidebar wrap-pic-w" href="<?php echo base_url();?>assets/images/photo-gallery-09.jpg" data-lightbox="gallery-footer">
					<img src="<?php echo base_url();?>assets/images/photo-gallery-thumb-09.jpg" alt="GALLERY">
				</a>

				<a class="item-gallery-sidebar wrap-pic-w" href="<?php echo base_url();?>assets/images/photo-gallery-10.jpg" data-lightbox="gallery-footer">
					<img src="<?php echo base_url();?>assets/images/photo-gallery-thumb-10.jpg" alt="GALLERY">
				</a>

				<a class="item-gallery-sidebar wrap-pic-w" href="<?php echo base_url();?>assets/images/photo-gallery-11.jpg" data-lightbox="gallery-footer">
					<img src="<?php echo base_url();?>assets/images/photo-gallery-thumb-11.jpg" alt="GALLERY">
				</a>
			</div>
		</div>
	</aside>


  <!--signin Modal -->
<div id="signinModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Sign In</h4>
      </div>
      <div class="modal-body">
         <div class="row">
           <div class="col-md-6">
            <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="name" placeholder="Username">
           </div>
           <div class="col-md-6">
            <input class="bo-rad-10 sizefull txt10 p-l-20" type="password" name="name" placeholder="Password">
           </div>
         </div>
      </div>
      <div class="modal-footer">
      <div class="wrap-btn-booking flex-c-m m-t-13">
					<!-- Button3 -->
					<button type="submit" class="btn3 flex-c-m size36 txt11 trans-0-4">
						Login
					</button>
				</div>
        
      </div>
    </div>

  </div>
</div>


<!--signup Modal -->
<div id="signupModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Sign Up</h4>
      </div>
      <div class="modal-body">
        <div class="row">
           <div class="col-md-6">
            <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="name" placeholder="Name">
           </div>
        </div>
        <div class="row">
           <div class="col-md-6">
            &nbsp;
           </div>
        </div>
        <div class="row">
           <div class="col-md-6">
            <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="name" placeholder="Contact Number">
           </div>
        </div>
        <div class="row">
           <div class="col-md-6">
            &nbsp;
           </div>
        </div>
        <div class="row">
           <div class="col-md-6">
            <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="name" placeholder="E-mail">
           </div>
        </div>
        <div class="row">
           <div class="col-md-6">
            &nbsp;
           </div>
        </div>
        <div class="row">
           <div class="col-md-6">
            <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="name" placeholder="Username">
           </div>
        </div>
        <div class="row">
           <div class="col-md-6">
            &nbsp;
           </div>
        </div>
        <div class="row">
           <div class="col-md-6">
            <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="name" placeholder="Password">
           </div>
        </div>
      </div>
      <div class="modal-footer">
      <div class="wrap-btn-booking flex-c-m m-t-13">
					<!-- Button3 -->
					<button type="submit" class="btn3 flex-c-m size36 txt11 trans-0-4">
						Register
					</button>
				</div>
      </div>
    </div>

  </div>
</div>