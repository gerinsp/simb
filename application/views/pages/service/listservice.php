<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>Service</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item">Home</li>
                  <li class="breadcrumb-item active"><a class="text-info" href="<?php echo base_url() ?>listservice">Service</a></li>
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

                  <!-- /.card-header -->
                  <div class="card-body">
                     <div class="table-responsive">
                        <table style="border-collapse: 1;color: #858796;border-bottom: 2px solid #e3e6f0;" id="dataTable" class="table tablelist table-bordered table-striped" width="100%" height="1px" cellspacing="0">
                           <thead>
                              <tr height="20px">
                                 <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('number'); ?></th>
                                 <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('name'); ?></th>
                                 <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Tanggal Mulai</th>
                                 <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Tanggal Selesai</th>
                                 <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Tipe Mobil</th>
                                 <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">No Polisi</th>
                                 <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Jenis Service</th>
                                 <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Total Harga</th>
                                 <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Status</th>
                                 <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Aksi</th>
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
                                    <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="10%"><?php echo $data->nama_customer ?></td>
                                    <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="10%"><?php echo date("d/m/y", strtotime($data->tgl_mulai)); ?></td>
                                    <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="10%"><?php echo date("d/m/y", strtotime($data->tgl_selesai)); ?></td>
                                    <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="10%"><?php echo $data->tipe_kendaraan ?></td>
                                    <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="10%"><?php echo $data->plat_nomor ?></td>
                                    <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="15%"><?php echo $data->nama_service ?></td>
                                    <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="10%"><?php echo number_format($data->total_harga, '0', ',', '.') ?></td>
                                    <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="10%"><?php echo $data->status ?></td>
                                    <td style="vertical-align: top;border-top: 1px solid #e3e6f0;text-align: center;" width="32%">

                                       <?php if ($data->status == "Menunggu Kedatangan") :  ?>
                                          <a href="#" data-toggle="modal" data-target="#modaleditservice" data-id="<?= $data->id_service; ?>" data-namacustomer="<?= $data->nama_customer; ?>" data-tanggalmulai="<?= date("Y-m-d", strtotime($data->tgl_mulai)) ?>" data-tanggalselesai="<?= date("Y-m-d", strtotime($data->tgl_selesai)) ?>" data-tipekendaraan="<?= $data->tipe_kendaraan ?>" data-nopolisi="<?= $data->plat_nomor ?>" data-jenisservice="<?= $data->nama_service ?>" data-totalharga="<?= $data->total_harga ?>" data-deskripsi="<?= $data->deskripsi ?>" onclick="modaleditservice(this, 'service/ubahservice')" class="editservice btn btn-sm btn-success" style="width: 150px;margin-bottom:5px" role="button" title="Ubah"><i class=" fas fa-fw fa-pencil-alt"></i> <?php echo $this->lang->line('change'); ?> </a><br>
                                          <a href="#" data-toggle="modal" data-target="#deleteModal" data-id="<?= $data->id_service; ?>" class="btn btn-sm btnOpenDeleteModal btn-danger mr-1" title="Hapus" onclick="openDeleteModal(this, 'service/hapusservice')" class="btn btn-sm btn-danger" role="button" style="width: 150px;margin-bottom:5px" title="Hapus"> <i clasgits="fas fa-fw fa-trash"></i> <?php echo $this->lang->line('delete'); ?> </a><br>
                                          <a href="#" data-toggle="modal" data-target="#modalupdatestatusservice" data-id="<?= $data->id_service; ?>" class="updatestatus btn btn-sm btn-secondary mr-1" title="Hapus" style="width: 150px;margin-bottom:5px" onclick="modalupdatestatus(this, 'service/updatestatusservice/<?= $data->id_booking ?>')" class="btn btn-sm btn-danger" role="button" title="Hapus"> <i class="fas fa-fw fa-pencil-alt"></i>Update Status </a>
                                       <?php endif ?>
                                       <?php if ($data->status == "Proses Perbaikan") :  ?>
                                          <a href="#" data-toggle="modal" data-target="#modaleditservice" data-id="<?= $data->id_service; ?>" data-namacustomer="<?= $data->nama_customer; ?>" data-tanggalmulai="<?= date("Y-m-d", strtotime($data->tgl_mulai)) ?>" data-tanggalselesai="<?= date("Y-m-d", strtotime($data->tgl_selesai)) ?>" data-tipekendaraan="<?= $data->tipe_kendaraan ?>" data-nopolisi="<?= $data->plat_nomor ?>" data-jenisservice="<?= $data->nama_service ?>" data-totalharga="<?= $data->total_harga ?>" data-deskripsi="<?= $data->deskripsi ?>" onclick="modaleditservice(this, 'service/ubahservice')" style="width: 150px;margin-bottom:5px" class="editservice disabled btn btn-sm btn-success" role="button" title="Ubah"><i class=" fas fa-fw fa-pencil-alt"></i> <?php echo $this->lang->line('change'); ?> </a>
                                          <a href="#" data-toggle="modal" data-target="#deleteModal" data-id="<?= $data->id_service; ?>" class="btn btn-sm btnOpenDeleteModal  disabled btn-danger mr-1" title="Hapus" onclick="openDeleteModal(this, 'service/hapusservice')" role="button" style="width: 150px;margin-bottom:5px" title="Hapus"> <i class="fas fa-fw fa-trash"></i> <?php echo $this->lang->line('delete'); ?> </a><br>
                                          <a href="#" data-toggle="modal" data-target="#modalupdatestatusservice" data-id="<?= $data->id_service; ?>" class="updatestatus btn btn-sm btn-secondary mr-1" title="Hapus" onclick="modalupdatestatus(this, 'service/updatestatusservice/<?= $data->id_booking ?>')" class="btn btn-sm btn-danger" style="width: 150px;margin-bottom:5px" role="button" title="Hapus"> <i class="fas fa-fw fa-pencil-alt"></i>Update Status </a>
                                       <?php endif ?>
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
   function modaleditservice(elem, link) {
      const id = $(elem).data("id");
      const namacustomer = $(elem).data("namacustomer");
      const tanggalmulai = $(elem).data("tanggalmulai");
      const tanggalselesai = $(elem).data("tanggalselesai");
      const tipekendaraan = $(elem).data("tipekendaraan");
      const nopolisi = $(elem).data("nopolisi");
      const jenisservice = $(elem).data("jenisservice");
      const totalharga = $(elem).data("totalharga");
      const deskripsi = $(elem).data("deskripsi");
      $("#idservice").attr("value", id);
      $("#namacustomerservice").attr("value", namacustomer);
      $("#tanggalmulai").attr("value", tanggalmulai);
      $("#tanggalselesai").attr("value", tanggalselesai);
      $("#tipekendaraan").attr("value", tipekendaraan);
      $("#nopolisi").attr("value", nopolisi);
      $("#jenisservice").attr("value", jenisservice);
      $("#totalharga").attr("value", totalharga);
      $("#deskripsi").attr("value", deskripsi);
      $("#formeditservice").attr("action", link);
   }

   function modalupdatestatus(elem, link) {
      const id = $(elem).data("id");
      $("#idserviceupdatestatus").attr("value", id);
      $("#formupdatestatusservice").attr("action", link);
   }
</script>
<!-- End Function Javascript -->