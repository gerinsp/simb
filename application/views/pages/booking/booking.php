<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Booking</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active"><a class="text-info" href="<?php echo base_url() ?>listmekanik">Booking</a></li>
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

                            <form action="<?php echo base_url() . 'booking/save'; ?> " enctype="multipart/form-data" method="post" accept-charset="utf-8" aria-hidden="true">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="">Tanggal</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="form-control" required name="tanggal" type="date">
                                    </div>
                                </div>
                                <div class="row" style="margin-top:10px">
                                    <div class="col-md-2">
                                        <label for="">Tipe dan Seri Mobil</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="form-control" required name="jeniskendaraan" type="text">
                                    </div>
                                </div>
                                <div class="row" style="margin-top:10px">
                                    <div class="col-md-2">
                                        <label for="">Jenis Service</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select class="form-control" name="jenisservice" id="jenisservice" required>
                                        <?php foreach ($read as $data) : ?>
                                            <option value="<?= $data->id_tipe_service ?>"><?= $data->nama_service ?></option>
                                        <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row" style="margin-top:10px">
                                    <div class="col-md-2">
                                        <label for="">Plat Nomor</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="form-control" required name="platnomor" type="text">
                                    </div>
                                </div>
                                <div class="row" style="margin-top:10px">
                                    <div class="col-md-2">
                                        <label for="">Deskripsi</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="form-control" required name="deskripsi" type="text">
                                    </div>
                                </div>
                                <div class="row" style="margin-top:10px">
                                    <div class="col-md-2">
                                        <label for="">Pengantaran dan Pengambilan Mobil</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select class="form-control" name="isdelivery" id="isdelivery" required>
                                            <option value="1">Pribadi</option>
                                            <option value="0">Non Pribadi</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row" style="margin-top:10px">
                                    <div class="col-md-2">
                                        <label for="">Alamat</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="form-control" required name="alamat" type="text">
                                    </div>
                                </div>
                                <div class="row" style="margin-top:10px">
                                    <div class="col-md-2"> </div>
                                    <div class="col-md-8" style="text-align: right;">
                                        <button class="btn btn-sm btn-dark" style="width: 180px;height: 38px;">BOOKING </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="shadow card">

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