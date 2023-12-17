<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Pengeluaran</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item">Home</li>
                  <li class="breadcrumb-item active"><a class="text-info" href="<?php echo base_url() ?>listpengeluaran">Pengeluaran</a></li>
               </ol>
            </div>
         </div>
      </div><!-- /.container-fluid -->
   </section>

   <!-- Main content -->
   <section class="content">
      <div class="container-fluid" style="padding-bottom:100px;">


         <div class="row">
            <div class="col-12">
               <!-- /.card -->
               <?= $this->session->flashdata('message'); ?>
               <div class="shadow card">
                  <div class="card-body">

                     <form action="<?php echo base_url() . 'pengeluaran/simpanpengeluaran'; ?> " enctype="multipart/form-data" method="post" accept-charset="utf-8" aria-hidden="true">
                        <div class="row">
                           <div class="col-md-2">
                              <label for="">Nama Produk</label>
                           </div>
                           <div class="col-md-5">
                              <input class="form-control" required name="namaproduk" type="text">
                           </div>
                        </div>
                         <div class="row" style="margin-top:10px">
                             <div class="col-md-2">
                                 <label for="">Merk</label>
                             </div>
                             <div class="col-md-5">
                                 <input class="form-control" required name="merk" type="text">
                             </div>
                         </div>
                        <div class="row" style="margin-top:10px">
                           <div class="col-md-2">
                              <label for="">Qty</label>
                           </div>
                           <div class="col-md-5">
                              <input class="form-control" required name="qty" type="number">
                           </div>
                        </div>
                        <div class="row" style="margin-top:10px">
                           <div class="col-md-2">
                              <label for="">Total Harga</label>
                           </div>
                           <div class="col-md-5">
                              <input class="form-control" required name="totalharga" type="number">
                           </div>
                        </div>
                        <div class="row" style="margin-top:10px">
                           <div class="col-md-2"> </div>
                           <div class="col-md-5" style="text-align: right;">
                              <button class="btn btn-sm btn-secondary">Tambah</button>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
               <div class="shadow card">

                  <!-- /.card-header -->
                  <div class="card-body">
                     <div class="table-responsive">
                        <table style="border-collapse: 1;color: #858796;border-bottom: 2px solid #e3e6f0;" id="dataTable" class="table tablelist table-bordered table-striped" width="100%" height="1px" cellspacing="0">
                           <thead>
                              <tr height="20px">
                                 <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('number'); ?></th>
                                 <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Nama Produk</th>
                                 <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Merk</th>
                                 <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Qty</th>
                                 <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Total Harga</th>
                                 <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Aksi</th>
                              </tr>
                           </thead>
                           <tbody>
                              <?php
                              $no = 1;
                              foreach ($read as $data) {
                              ?>
                                 <tr>
                                    <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="7%"><?php echo $no ?></td>
                                    <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="20%"><?php echo $data->nama_produk ?></td>
                                     <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="20%"><?php echo $data->merk ?></td>
                                    <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="20%"><?php echo $data->qty ?></td>
                                    <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="15%"><?php echo rupiah($data->total_harga) ?></td>
                                    <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="30%">
                                       <a href="#" data-toggle="modal" data-target="#modaleditpengeluaran"
                                          data-id="<?= $data->id_pengeluaran; ?>" data-namaproduk="<?= $data->nama_produk; ?>"
                                          data-qty="<?= $data->qty; ?>" data-merk="<?= $data->merk; ?>"
                                          data-totalharga="<?= $data->total_harga; ?>" onclick="modaleditpengeluaran(this, 'pengeluaran/ubahpengeluaran')"
                                          class="editpengeluaran btn btn-sm btn-success" role="button" title="Ubah">
                                           <i class=" fas fa-fw fa-pencil-alt"></i> <?php echo $this->lang->line('change'); ?> </a>
                                       <a href="#" data-toggle="modal" data-target="#deleteModal" data-id="<?= $data->id_pengeluaran; ?>" class="btn btn-sm btnOpenDeleteModal btn-danger mr-1" title="Hapus" onclick="openDeleteModal(this, 'pengeluaran/hapuspengeluaran')" class="btn btn-sm btn-danger" role="button" title="Hapus"> <i class="fas fa-fw fa-trash"></i> <?php echo $this->lang->line('delete'); ?> </a>
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
      </div>
      <!-- /.container-fluid -->
   </section>
   <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Function Javascript -->
<!-- jQuery -->
<script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('assets/plugins/jquery-ui/jquery-ui.min.js') ?>"></script>
<script>
   function modaleditpengeluaran(elem, link) {
       console.log(link)
      const id = $(elem).data("id");
      const namaproduk = $(elem).data("namaproduk");
      const merk = $(elem).data("merk");
      const qty = $(elem).data("qty");
      const totalharga = $(elem).data("totalharga");
      $("#idpengeluaran").attr("value", id);
      $("#namaproduk").attr("value", namaproduk);
      $("#qty").attr("value", qty);
      $("#merk").attr("value", merk);
      $("#totalharga").attr("value", totalharga);
      $("#formeditpengeluaran").attr("action", link);
   }
</script>
<!-- End Function Javascript -->