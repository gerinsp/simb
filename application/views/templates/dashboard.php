  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <div class="content-header">
        <div class="container-fluid">
           <div class="row mb-2">
              <div class="col-sm-6">
                 <h1 class="m-0">Dashboard</h1>
              </div><!-- /.col -->
              <div class="col-sm-6">
                 <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                 </ol>
              </div><!-- /.col -->
           </div><!-- /.row -->
        </div><!-- /.container-fluid -->
     </div>
     <!-- /.content-header -->

     <!-- Main content -->
     <section class="content">
        <?php if ($this->session->userdata('role_id') == 2) { ?>
           <div class="container-fluid">

              <!-- Small boxes (Stat box) -->
              <div class="row">

                 <!-- ./col

              ./col -->
                 <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                       <div class="inner">
                          <h3><?php foreach ($databooking as $databooking) ?> <?= $databooking->jumlahbooking ?></h3>

                          <p>Data Booking</p>
                       </div>
                       <div class="icon">
                          <i class=" nav-icon fas fa-calendar-alt"></i>
                       </div>

                    </div>
                 </div>
                 <!-- ./col -->
                 <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                       <div class="inner">
                          <h3><?php foreach ($datainvoice as $datainvoice) ?> <?= $datainvoice->jumlahinvoice ?></h3>

                          <p>Data Invoice</p>
                       </div>
                       <div class="icon">
                          <i class=" nav-icon fas fa-file-invoice-dollar"></i>
                       </div>
                    </div>
                 </div>
                 <!-- ./col -->
              </div>
              <!-- /.row -->
              <!-- Main row -->
              <!-- /.row (main row) -->
           </div><!-- /.container-fluid -->
        <?php } ?>

     </section>
     <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->