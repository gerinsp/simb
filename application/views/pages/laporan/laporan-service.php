<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Laporan Service</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active"><a class="text-info" href="<?php echo base_url() ?>listmekanik">Laporan Service</a></li>
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
                            <button class="btn btn-success btn-sm btn-export"><i class="fas fa-file-excel"></i> Export to Excel
                                </button>
                            <hr>
                            <div class="table-responsive">
                                <table style="border-collapse: 1;color: #858796;border-bottom: 2px solid #e3e6f0;" id="dataTable" class="table table-bordered table-striped table-laporan" width="100%" height="1px" cellspacing="0">
                                    <thead>
                                    <tr height="20px">
                                        <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;"><?php echo $this->lang->line('number'); ?></th>
                                        <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Nama Customer</th>
                                        <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Tanggal Mulai</th>
                                        <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Tanggal Selesai</th>
                                        <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Tipe/Merek Kendaraan</th>
                                        <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Plat Nomor</th>
                                        <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Jenis Service</th>
                                        <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Nama Mekanik</th>
                                        <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Total Harga</th>
                                        <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($read as $data) {
                                        ?>
                                        <tr>
                                            <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="3%"><?= $no ?></td>
                                            <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="12%"><?= $data->nama_customer ?></td>
                                            <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="12%"><?= format_indo(date('Y-m-d', strtotime($data->tgl_mulai))) ?></td>
                                            <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="12%"><?= format_indo(date('Y-m-d', strtotime($data->tgl_selesai))) ?></td>
                                            <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="12%"><?= $data->tipe_kendaraan ?></td>
                                            <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="12%"><?= $data->plat_nomor ?></td>
                                            <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="12%"><?= $data->nama_service ?></td>
                                            <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="12%"><?= $data->nama_mekanik ?></td>
                                            <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="12%"><?= rupiah($data->total_harga) ?></td>
                                            <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="12%">
                                                <?php if ($data->status === 'Selesai') : ?>
                                                    <span class="badge badge-success"><?= $data->status ?></span>
                                                <?php endif; ?>
                                                <?php if ($data->status === 'Menunggu Kedatangan') : ?>
                                                    <span class="badge badge-warning"><?= $data->status ?></span>
                                                <?php endif; ?>
                                                <?php if ($data->status === 'Proses Perbaikan') : ?>
                                                    <span class="badge badge-primary"><?= $data->status ?></span>
                                                <?php endif; ?>
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
</script>
<!-- End Function Javascript -->