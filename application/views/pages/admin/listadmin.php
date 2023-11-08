<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Admin</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item">Home</li>
                  <li class="breadcrumb-item active"><a class="text-info" href="<?php echo base_url() ?>listadmin">Admin</a></li>
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

                     <form action="<?php echo base_url() . 'admin/simpanadmin'; ?> " enctype="multipart/form-data" method="post" accept-charset="utf-8" aria-hidden="true">
                        <div class="row">
                           <div class="col-md-2">
                              <label for="">Nama Admin</label>
                           </div>
                           <div class="col-md-5">
                              <input class="form-control" required name="namaadmin" type="text">
                           </div>
                        </div>
                        <div class="row" style="margin-top:10px">
                           <div class="col-md-2">
                              <label for="">Username</label>
                           </div>
                           <div class="col-md-5">
                              <input class="form-control" required name="username" type="text">
                           </div>
                        </div>
                        <div class="row" style="margin-top:10px">
                           <div class="col-md-2">
                              <label for="">Password </label>
                           </div>
                           <div class="col-md-5">
                              <div class="input-group">
                                 <input type="password" class="form-control" id="new_password1" value="12345" readonly name="password">
                                 <div class="input-group-append">
                                    <div class="input-group-text bg-white border-left-0">
                                       <a role="button" onclick="previewPassword(this, 'new_password1')"><span class="fa fa-fw fa-sm fa-eye-slash text-black-50"></span></a>
                                    </div>
                                 </div>
                              </div>
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
                                 <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Username</th>
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
                                    <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="20%"><?php echo $data->nama ?></td>
                                    <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="20%"><?php echo $data->username ?></td>
                                    <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="30%">
                                       <a href="#" data-toggle="modal" data-target="#modaleditadmin" data-id="<?= $data->id_user; ?>" data-namaadmin="<?= $data->nama; ?>" data-username="<?= $data->username; ?>" onclick="modaleditadmin(this, 'admin/ubahadmin')" class="editadmin btn btn-sm btn-success" role="button" title="Ubah"><i class=" fas fa-fw fa-pencil-alt"></i> <?php echo $this->lang->line('change'); ?> </a>
                                       <a href="#" data-toggle="modal" data-target="#deleteModal" data-id="<?= $data->id_user; ?>" class="btn btn-sm btnOpenDeleteModal btn-danger mr-1" title="Hapus" onclick="openDeleteModal(this, 'admin/hapusadmin')" class="btn btn-sm btn-danger" role="button" title="Hapus"> <i class="fas fa-fw fa-trash"></i> <?php echo $this->lang->line('delete'); ?> </a>
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
   function modaleditadmin(elem, link) {
      const id = $(elem).data("id");
      const namaadmin = $(elem).data("namaadmin");
      const username = $(elem).data("username");
      $("#idadmin").attr("value", id);
      $("#namaadmin").attr("value", namaadmin);
      $("#username").attr("value", username);
      $("#formeditadmin").attr("action", link);
   }
</script>
<!-- End Function Javascript -->