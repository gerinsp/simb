<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Booking</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active"><a class="text-info" href="<?php echo base_url() ?>listmekanik">Detail Booking</a></li>
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
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Tanggal Booking</th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Tipe dan Seri Mobil</th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Plat Nomor</th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Jenis Service</th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Deskripsi</th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Pengantaran dan Pengambilan</th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Alamat</th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($booking as $data) {
                                        ?>
                                            <tr>
                                                <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="3%"><?php echo $no ?></td>
                                                <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="12%"><?php echo format_indo($data->tanggal) ?></td>
                                                <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="12%"><?php echo $data->tipe_kendaraan ?></td>
                                                <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="12%"><?php echo $data->plat_nomor ?></td>
                                                <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="12%"><?php echo $data->nama_service ?></td>
                                                <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="12%"><?php echo $data->deskripsi ?></td>
                                                <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="12%"><?php echo $data->is_delivery == 1 ? 'Pribadi' : 'Non Pribadi'; ?></td>
                                                <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="12%"><?php echo $data->alamat ?></td>
                                                <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="12%">
                                                    <span class="badge badge-primary"><?= $data->nama ?></span>
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
<!--<script src="--><?php //= base_url('assets/plugins/jquery/jquery.min.js') 
                    ?><!--"></script>-->
<!--<!-- jQuery UI 1.11.4 -->-->
<!--<script src="--><?php //= base_url('assets/plugins/jquery-ui/jquery-ui.min.js') 
                    ?><!--"></script>-->
<!--<script>-->
<!--    function modaleditmekanik(elem, link) {-->
<!--        const id = $(elem).data("id");-->
<!--        const namamekanik = $(elem).data("namamekanik");-->
<!--        const tanggallahir = $(elem).data("tanggallahir");-->
<!--        const alamat = $(elem).data("alamat");-->
<!--        const telepon = $(elem).data("telepon");-->
<!--        $("#idmekanik").attr("value", id);-->
<!--        $("#namamekanik").attr("value", namamekanik);-->
<!--        $("#tanggallahir").attr("value", tanggallahir);-->
<!--        $("#alamat").attr("value", alamat);-->
<!--        $("#telepon").attr("value", telepon);-->
<!--        $("#formeditmekanik").attr("action", link);-->
<!--    }-->
<!--</script>-->
<!-- End Function Javascript -->