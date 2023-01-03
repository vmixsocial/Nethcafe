<header>
		<!-- Header desktop -->
		<div class="wrap-menu-header gradient1 trans-0-4">
			<div class="container h-full">
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
				<div class="wrap_header trans-0-3">
					<!-- Logo -->
					<div class="logo">
						<a href="<?php echo base_url();?>index.php/home">
							<img src="<?php echo base_url();?>assets/images/icons/logo.jpg" alt="IMG-LOGO" data-logofixed="<?php echo base_url();?>assets/images/icons/logo.jpg">
						</a>
					</div>

					<!-- Menu -->
					<div class="wrap_menu p-l-45 p-l-0-xl">
						<nav class="menu">
							<ul class="main_menu">
								<li>
									<a href="<?php echo base_url();?>index.php/home">Home</a>
								</li>

               <?php 
               if($this->session->userdata('emp_id')){
               ?>
								<li>
									<a href="<?php echo base_url();?>index.php/home/menus_for_order">Menu</a>
								</li>
                <?php
                }else{
                 ?>
                 <li>
                  <a href="<?php echo base_url();?>index.php/home/menus">Menu</a>
                </li>
                 <?php 
                }
                ?>

								<!--<li>
									<a href="<?php echo base_url();?>index.php/home/reservations">Reservation</a>
								</li>-->

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
						<?php 
               if(!$this->session->userdata('emp_id')){
               ?>
						<a href="#" data-toggle="modal" data-target="#signinModal">Sign In</a>&nbsp;&nbsp;
						<a href="#" data-toggle="modal" data-target="#signupModal">Sign Up</a>&nbsp;&nbsp;
            <?php 
                }
                ?>

            <?php 
               if($this->session->userdata('emp_id')){
               ?>
            <a href="<?php echo base_url();?>index.php/home/load_cart">Cart</a>
            <a href="<?php echo base_url();?>index.php/home/my_orders">My Orders</a>
            <?php 
                }
                ?>
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

			<!--<li class="t-center">
				<!-- Button3 -->
				<!--<a href="<?php echo base_url();?>index.php/home/reservations" class="btn3 flex-c-m size13 txt11 trans-0-4 m-l-r-auto">
					Reservation
				</a>
			</li>-->
		</ul>

		<!-- - -->
		
	</aside>


  <!--signin Modal -->
<div id="signinModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <form action="<?php echo base_url();?>index.php/home/signin" method="post">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Sign In</h4>
      </div>
      <div class="modal-body">
         <div class="row">
           <div class="col-md-6">
            <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="username" placeholder="Username">
           </div>
           <div class="col-md-6">
            <input class="bo-rad-10 sizefull txt10 p-l-20" type="password" name="password" placeholder="Password">
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
  </form>

  </div>
</div>


<!--signup Modal -->
<div id="signupModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <form action="<?php echo base_url();?>index.php/home/signup" method="post">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Sign Up</h4>
      </div>
      <div class="modal-body">
        <div class="row">
           <div class="col-md-6">
            <input class="bo-rad-10 sizefull txt10 p-l-20" type="text" name="customername" placeholder="Name">
           </div>
        </div>
        <div class="row">
           <div class="col-md-6">
            &nbsp;
           </div>
        </div>
        <div class="row">
           <div class="col-md-6">
            <input class="bo-rad-10 sizefull txt10 p-l-20" type="number" name="contact" placeholder="Contact Number">
           </div>
        </div>
        <div class="row">
           <div class="col-md-6">
            &nbsp;
           </div>
        </div>
        <div class="row">
           <div class="col-md-6">
            <input class="bo-rad-10 sizefull txt10 p-l-20" type="email" name="cusemail" placeholder="E-mail(this is login username)">
           </div>
        </div>
                
        <div class="row">
           <div class="col-md-6">
            &nbsp;
           </div>
        </div>
        <div class="row">
           <div class="col-md-6">
            <input class="bo-rad-10 sizefull txt10 p-l-20" type="password" name="pw" id="pw" placeholder="Password">
           </div>
        </div>

        <div class="row">
           <div class="col-md-6">
            &nbsp;
           </div>
        </div>
        <div class="row">
           <div class="col-md-6">
            <input class="bo-rad-10 sizefull txt10 p-l-20" type="password" name="cpw" id="cpw" placeholder="Confirm Password">
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
  </form>

  </div>
</div>