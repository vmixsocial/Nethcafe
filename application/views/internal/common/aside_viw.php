  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo base_url()?>index.php/dashboard" class="brand-link">
      
      <span class="brand-text font-weight-light"><?php echo com_title;?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo base_url()?>business/dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $this->session->userdata('emp_name');?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <?php
       if($this->session->userdata('user_level')==1){
      ?>
      
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?php echo base_url()?>index.php/dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                
              </p>
            </a>
          </li>
 
         <li class="nav-item">
            <a href="<?php echo base_url()?>index.php/dashboard/employee_mgt" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Create Employee
                
              </p>
            </a>
          </li>

         <li class="nav-item">
            <a href="<?php echo base_url()?>index.php/dashboard/products" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Product
                
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url()?>index.php/dashboard/grn_process" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                GRN
                
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url()?>index.php/dashboard/stock" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Stock
                
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url()?>index.php/dashboard/pending_orders" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
               Today Pending Orders
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url()?>index.php/dashboard/processing_orders" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
               Today processing Orders
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url()?>index.php/dashboard/ready_to_pickup" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
               Ready to pickup
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url()?>index.php/dashboard/done_pickups" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
               Done pickup
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url()?>index.php/dashboard/ready_to_delivery" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
               Ready to deliver
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url()?>index.php/dashboard/delivery_orders" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
               Delivery Orders
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url()?>index.php/dashboard/done_orders" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
               Today Done Orders
              </p>
            </a>
          </li>



          <li class="nav-item">
            <a href="<?php echo base_url()?>index.php/dashboard/bill" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Bills
                
              </p>
            </a>
          </li>
         
          </ul>
      </nav>
      <?php
       }else if($this->session->userdata('user_level')==2){
        ?>
        <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?php echo base_url()?>index.php/dashboard" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                
              </p>
            </a>
          </li>
 
         

         <li class="nav-item">
            <a href="<?php echo base_url()?>index.php/dashboard/products" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Product
                
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url()?>index.php/dashboard/pending_orders" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
               Today Pending Orders
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url()?>index.php/dashboard/processing_orders" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
               Today processing Orders
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url()?>index.php/dashboard/ready_to_delivery" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
               Ready to deliver
              </p>
            </a>
          </li>

          

          <li class="nav-item">
            <a href="<?php echo base_url()?>index.php/dashboard/done_orders" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
               Today Done Orders
              </p>
            </a>
          </li>




          <li class="nav-item">
            <a href="<?php echo base_url()?>index.php/dashboard/bill" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Bills
                
              </p>
            </a>
          </li>
         
          </ul>
      </nav>
        <?php
       }else{
        ?>
       <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
         
          <li class="nav-item">
            <a href="<?php echo base_url()?>index.php/dashboard/delivery_orders" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
               Delivery Orders
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url()?>index.php/dashboard/my_deliveries" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
               My Deliveries
              </p>
            </a>
          </li>

          

          </ul>
      </nav>
        <?php
       }
      ?>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>