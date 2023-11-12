<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
   <!-- Sidebar -->
   <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <a href="<?= base_url('profile') ?>" class="d-block">
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
               <img src="<?= base_url('assets/img/profile/') . $user->image ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
               <p style="margin-bottom: 0px;"><?= $user->nama ?></p>
            </div>
         </div>
      </a>

      <!-- SidebarSearch Form -->
      <!-- <div class="form-inline">
         <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
               <button class="btn btn-sidebar">
                  <i class="fas fa-search fa-fw"></i>
               </button>
            </div>
         </div>
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
               <a href="<?= base_url('dashboard') ?>" class="nav-link <?php if ($this->uri->segment(1) == "dashboard") {
                                                                           echo "active";
                                                                        } ?>"">
                  <i class=" nav-icon fas fa-tachometer-alt"></i>
                  <p>
                     Dashboard
                  </p>
               </a>
            </li>
            <?php if ($this->session->userdata('role_id') == 2) { ?>
               <li class="nav-item">
                  <a href="<?= base_url('listmekanik') ?>" class="nav-link <?php if ($this->uri->segment(1) == "listmekanik") {
                                                                              echo "active";
                                                                           } ?>">
                     <i class=" nav-icon fas fa-users"></i>
                     <p>
                        Data Mekanik
                     </p>
                  </a>
               </li>
               <li class="nav-item">
                  <a href="<?= base_url('listadmin') ?>" class="nav-link <?php if ($this->uri->segment(1) == "listadmin") {
                                                                              echo "active";
                                                                           } ?>">
                     <i class=" nav-icon fas fa-users"></i>
                     <p>
                        Data Admin
                     </p>
                  </a>
               </li>
               <li class="nav-item">
                  <a href="<?= base_url('listcustomer') ?>" class="nav-link <?php if ($this->uri->segment(1) == "listcustomer") {
                                                                                 echo "active";
                                                                              } ?>">
                     <i class=" nav-icon fas fa-users"></i>
                     <p>
                        Data Customer
                     </p>
                  </a>
                  <a href="<?= base_url('listservice') ?>" class="nav-link <?php if ($this->uri->segment(1) == "listservice") {
                                                                              echo "active";
                                                                           } ?>">
                     <i class=" nav-icon fas fa-book"></i>
                     <p>
                        Data Service
                     </p>
                  </a>
               </li>
            <?php } ?>
            <?php if ($this->session->userdata('role_id') == 3) { ?>
               <li class="nav-item">
                  <a href="<?= base_url('booking') ?>" class="nav-link <?php if ($this->uri->segment(1) == "booking") {
                                                                           echo "active";
                                                                        } ?>">
                     <i class="nav-icon fas fa-calendar-alt"></i>
                     <p>
                        Booking
                     </p>
                  </a>
               </li>

               <li class="nav-item">
                  <a href="<?= base_url('upload-pembayaran') ?>" class="nav-link <?php if ($this->uri->segment(1) == "upload-pembayaran") {
                                                                                    echo "active";
                                                                                 } ?>">
                     <i class="nav-icon fas fa-cloud-upload-alt"></i>
                     <p>
                        Upload Pembayaran
                     </p>
                  </a>
               </li>

               <li class="nav-item">
                  <a href="<?= base_url('detail-booking') ?>" class="nav-link <?php if ($this->uri->segment(1) == "detail-booking") {
                                                                                 echo "active";
                                                                              } ?>">
                     <i class="nav-icon fas fa-info-circle"></i>
                     <p>
                        Detail Booking
                     </p>
                  </a>
               </li>

            <?php } ?>
            <?php if ($this->session->userdata('role_id') == 4) : ?>
               <li class="nav-item">
                  <a href="<?= base_url('laporan-service') ?>" class="nav-link <?php if ($this->uri->segment(1) == "laporan-service") {
                                                                                    echo "active";
                                                                                 } ?>">
                     <i class="nav-icon fas fa-cogs"></i>
                     <p>
                        Laporan Service
                     </p>
                  </a>
               </li>

               <li class="nav-item">
                  <a href="<?= base_url('laporan-mekanik') ?>" class="nav-link <?php if ($this->uri->segment(1) == "laporan-mekanik") {
                                                                                    echo "active";
                                                                                 } ?>">
                     <i class="nav-icon fas fa-wrench"></i>
                     <p>
                        Laporan Mekanik
                     </p>
                  </a>
               </li>
            <?php endif; ?>
            <li class="nav-header">Profil</li>
            <li class="nav-item">
               <a href="<?= base_url('profile') ?>" class="nav-link <?php if ($this->uri->segment(1) == "profile") {
                                                                        echo "active";
                                                                     } ?>">
                  <i class=" nav-icon fas fa-user"></i>
                  <p>Profil</p>
               </a>
            </li>
            <li class="nav-header">Keluar</li>
            <li class="nav-item">
               <a href="#" data-toggle="modal" data-target="#logoutModal" class="nav-link">
                  <i class="nav-icon fas fa-sign-out-alt"></i>
                  <p>Logout</p>
               </a>
            </li>
         </ul>
      </nav>
      <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
</aside>