<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon ">
        <i class="fas fa-utensils"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Restoran</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo base_url('welcome')?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Menu
      </div>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="<?php  echo base_url('kategori/main_course')?>">
        <i class="fas fa-utensil-spoon"></i>
          <span>Main Course</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('kategori/drinks') ?>">
        <i class="fas fa-wine-glass"></i>
          <span>Drinks</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('kategori/snacks') ?>">
        <i class="fas fa-cookie"></i>
          <span>Snacks</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="<?php echo base_url('kategori/desserts') ?>">
        <i class="fas fa-ice-cream"></i>
          <span>Desserts</span></a>
      </li>

      

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <?php echo form_open('dashboard/search') ?>
            <div class="input-group">
              <input type="text" name="keyword" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                  <i class="fas fa-search fa-sm"></i> 
                </button>
              </div>
            </div>
          <?php echo form_close() ?>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>
            
            <!-- penambahan keranjang belanja -->

            <div class="navbar">
              <ul class="nav navbar-nav navbar-right ">
                <li class="mt-2">
                <?php $keranjang = $this->cart->total_items()?>  
                
                <?php echo anchor('dashboard/detailKeranjang', '<i data-toggle="tooltip" data-placement="bottom" title="Keranjang Belanja" class="fas fa-shopping-cart">: '.$keranjang.'</i>') ?> items
                
                </li>
              </ul>
            </div>

            <div class="topbar-divider d-none d-sm-block"></div>

          <!-- Nav Item - User Information -->
          <li class="nav-item dropdown no-arrow">
            <?php if ($this->session->userdata('username')) {?>
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $this->session->userdata('username') ?></span>
                <i class="fas fa-user fa-2x"></i>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                
                
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
            <?php }else { ?>
              <ul class="nav navbar-nav navbar-right">
              <li><?php echo anchor('auth/login', '<div class="btn btn-sm btn-primary mt-2">Login</div>')?></li>
              </ul>
            <?php }?>
            

          
          

        </nav>
        <!-- End of Topbar -->
        <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Yakin Ingin Keluar?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih "Logout" Jika Kamu Yakin Ingin Keluar.</div>
        <div class="modal-footer">
          <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <?php echo anchor('auth/logout', '<div class="btn btn-sm btn-danger">Logout</div>')?>
        </div>
      </div>
    </div>
  </div>