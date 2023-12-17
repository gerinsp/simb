<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1>History Service</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item">Home</li>
                  <li class="breadcrumb-item active"><a class="text-info" href="<?php echo base_url() ?>history-service">History Service</a></li>
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
                                    <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="10%"><?php echo $data->status ?></td>
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