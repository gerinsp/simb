<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Mekanik</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item">Home</li>
                  <li class="breadcrumb-item active"><a class="text-info" href="<?php echo base_url() ?>listmekanik">Mekanik</a></li>
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

                     <form action="<?php echo base_url() . 'mekanik/simpanmekanik'; ?> " enctype="multipart/form-data" method="post" accept-charset="utf-8" aria-hidden="true">
                        <div class="row">
                           <div class="col-md-2">
                              <label for="">Nama Mekanik</label>
                           </div>
                           <div class="col-md-5">
                              <input class="form-control" required name="namamekanik" type="text">
                           </div>
                        </div>
                        <div class="row" style="margin-top:10px">
                           <div class="col-md-2">
                              <label for="">Tanggal Lahir</label>
                           </div>
                           <div class="col-md-5">
                              <input class="form-control" required name="tanggallahir" type="date">
                           </div>
                        </div>
                        <div class="row" style="margin-top:10px">
                           <div class="col-md-2">
                              <label for="">Alamat Mekanik</label>
                           </div>
                           <div class="col-md-5">
                              <input class="form-control" required name="alamat" type="text">
                           </div>
                        </div>
                        <div class="row" style="margin-top:10px">
                           <div class="col-md-2">
                              <label for="">Telepon Mekanik</label>
                           </div>
                           <div class="col-md-5">
                              <input class="form-control" required name="telepon" type="number">
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
                                 <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('name'); ?></th>
                                 <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Tanggal Lahir</th>
                                 <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Alamat</th>
                                 <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Nomer Telepon</th>
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
                                    <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="20%"><?php echo $data->nama_mekanik ?></td>
                                    <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="20%"><?php echo format_indo($data->tanggal_lahir) ?></td>
                                    <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="15%"><?php echo $data->alamat ?></td>
                                    <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="15%"><?php echo $data->telepon ?></td>
                                    <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="30%">
                                       <a href="#" data-toggle="modal" data-target="#modaleditmekanik"
                                          data-id="<?= $data->id_mekanik; ?>" data-namamekanik="<?= $data->nama_mekanik; ?>"
                                          data-tanggallahir="<?= $data->tanggal_lahir; ?>" data-alamat="<?= $data->alamat; ?>"
                                          data-telepon="<?= $data->telepon; ?>" onclick="modaleditmekanik(this, 'mekanik/ubahmekanik')"
                                          class="editmekanik btn btn-sm btn-success" role="button" title="Ubah">
                                           <i class=" fas fa-fw fa-pencil-alt"></i> <?php echo $this->lang->line('change'); ?> </a>
                                       <a href="#" data-toggle="modal" data-target="#deleteModal" data-id="<?= $data->id_mekanik; ?>" class="btn btn-sm btnOpenDeleteModal btn-danger mr-1" title="Hapus" onclick="openDeleteModal(this, 'mekanik/hapusmekanik')" class="btn btn-sm btn-danger" role="button" title="Hapus"> <i class="fas fa-fw fa-trash"></i> <?php echo $this->lang->line('delete'); ?> </a>
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
   function modaleditmekanik(elem, link) {
      const id = $(elem).data("id");
      const namamekanik = $(elem).data("namamekanik");
      const tanggallahir = $(elem).data("tanggallahir");
      const alamat = $(elem).data("alamat");
      const telepon = $(elem).data("telepon");
      $("#idmekanik").attr("value", id);
      $("#namamekanik").attr("value", namamekanik);
      $("#tanggallahir").attr("value", tanggallahir);
      $("#alamat").attr("value", alamat);
      $("#telepon").attr("value", telepon);
      $("#formeditmekanik").attr("action", link);
   }
</script>
<!-- End Function Javascript -->