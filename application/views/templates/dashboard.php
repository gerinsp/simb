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

           <div class="container-fluid">
             <?php if ($this->session->userdata('role_id') == 2) { ?>
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
             <?php } ?>
             <?php if ($this->session->userdata('role_id') == 3) { ?>
               <div class="row">

                     <!-- ./col

                  ./col -->
                     <div class="col-lg-3 col-6">
                         <!-- small box -->
                         <a href="<?= base_url('detail-booking?status=1') ?>">
                             <div class="small-box bg-warning">
                                 <div class="inner">
                                     <h3><?= $on_proses ?></h3>

                                     <p>On Process</p>
                                 </div>
                                 <div class="icon">
                                     <i class=" nav-icon fas fa-history"></i>
                                 </div>

                             </div>
                         </a>
                     </div>
                     <!-- ./col -->
                     <div class="col-lg-3 col-6">
                         <!-- small box -->
                         <a href="<?= base_url('detail-booking?status=2') ?>">
                             <div class="small-box bg-success">
                                 <div class="inner">
                                     <h3><?= $confirm ?></h3>

                                     <p>Confirmed</p>
                                 </div>
                                 <div class="icon">
                                     <i class=" nav-icon fas fa-check"></i>
                                 </div>
                             </div>
                         </a>
                     </div>
                     <div class="col-lg-3 col-6">
                         <!-- small box -->
                         <a href="<?= base_url('detail-booking?status=4') ?>">
                             <div class="small-box bg-primary">
                                 <div class="inner">
                                     <h3><?= $done ?></h3>

                                     <p>Done</p>
                                 </div>
                                 <div class="icon">
                                     <i class=" nav-icon fas fa-check-circle"></i>
                                 </div>
                             </div>
                         </a>
                     </div>
                     <div class="col-lg-3 col-6">
                         <!-- small box -->
                         <a href="<?= base_url('detail-booking?status=3') ?>">
                             <div class="small-box bg-danger">
                                 <div class="inner">
                                     <h3><?= $reject ?></h3>

                                     <p>Reject</p>
                                 </div>
                                 <div class="icon">
                                     <i class=" nav-icon fas fa-times-circle"></i>
                                 </div>
                             </div>
                         </a>
                     </div>
                     <!-- ./col -->
                 </div>
             <?php } ?>
             <?php if ($this->session->userdata('role_id') == 4) { ?>
               <div class="row">

                       <!-- ./col

                    ./col -->
                       <div class="col-lg-3 col-6">
                           <!-- small box -->
                               <div class="small-box bg-warning">
                                   <div class="inner">
                                       <h3><?= $repaint ?></h3>

                                       <p>Repaint</p>
                                   </div>
                                   <div class="icon">
                                       <i class=" nav-icon fas fa-paint-brush"></i>
                                   </div>

                               </div>
                       </div>
                       <!-- ./col -->
                       <div class="col-lg-3 col-6">
                           <!-- small box -->
                               <div class="small-box bg-success">
                                   <div class="inner">
                                       <h3><?= $repair ?></h3>

                                       <p>Repair</p>
                                   </div>
                                   <div class="icon">
                                       <i class=" nav-icon fas fa-tools"></i>
                                   </div>
                               </div>
                       </div>
                       <div class="col-lg-3 col-6">
                           <!-- small box -->
                               <div class="small-box bg-primary">
                                   <div class="inner">
                                       <h3><?= $restore ?></h3>

                                       <p>Restore</p>
                                   </div>
                                   <div class="icon">
                                       <i class=" nav-icon fas fa-undo"></i>
                                   </div>
                               </div>
                       </div>
                       <div class="col-lg-3 col-6">
                           <!-- small box -->
                               <div class="small-box bg-danger">
                                   <div class="inner">
                                       <h3><?= $modify ?></h3>

                                       <p>Modify</p>
                                   </div>
                                   <div class="icon">
                                       <i class=" nav-icon fas fa-car"></i>
                                   </div>
                               </div>
                       </div>
                       <!-- ./col -->
                   </div>
               <div class="row">
                     <div class="col-12">
                         <!-- /.card -->
                         <?= $this->session->flashdata('message'); ?>

                         <div class="card">

                             <!-- /.card-header -->
                             <div class="card-body">
                                 <div class="table-responsive">
                                     <table style="border-collapse: 1;color: #858796;border-bottom: 2px solid #e3e6f0;" id="dataTable" class="table" width="100%" height="1px" cellspacing="0">
                                         <thead>
                                         <tr height="20px">
                                             <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('number'); ?></th>
                                             <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Tipe Mobil</th>
                                             <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Tanggal Mulai</th>
                                             <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Tanggal Selesai</th>
                                             <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">No Polisi</th>
                                             <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Jenis Service</th>
                                             <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Total Harga</th>
                                             <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Status</th>
                                         </tr>
                                         </thead>
                                         <tbody>
                                         <?php
                                         $no = 1;
                                         foreach ($read as $data) {
                                             // var_dump($data->tgl_mulai)
                                             ?>
                                             <tr>
                                                 <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="4%"><?php echo $no ?></td>
                                                 <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="10%"><?php echo $data->tipe_kendaraan ?></td>
                                                 <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="10%"><?php echo format_indo(date('Y-m-d', strtotime($data->tgl_mulai))) ?></td>
                                                 <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="10%"><?php echo format_indo(date('Y-m-d', strtotime($data->tgl_selesai))) ?></td>
                                                 <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="10%"><?php echo $data->plat_nomor ?></td>
                                                 <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="15%"><?php echo $data->nama_service ?></td>
                                                 <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="10%"><?php echo rupiah($data->total_harga) ?></td>
                                                 <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="10%">
                                                     <span class="badge badge-warning">On Process</span>
                                                 </td>
                                             </tr>
                                             <?php
                                             $no++;
                                         }
                                         ?>
                                         </tbody>
                                     </table>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             <?php } ?>
           </div>

     </section>
     <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->