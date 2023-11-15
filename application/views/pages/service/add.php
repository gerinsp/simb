<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Service</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active"><a class="text-info" href="<?php echo base_url() ?>">Home</a></li>
                        <li class="breadcrumb-item">Service</li>
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
                            <form action="<?php echo base_url(); ?>service/<?= $booking->id_booking; ?>/save" method="post" accept-charset="utf-8">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="nama_customer">Nama Customer</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="form-control" required id="nama_customer" name="nama_customer" type="text" value="<?= $booking->nama; ?>" readonly>
                                    </div>
                                </div>
                                <div class="row" style="margin-top:10px">
                                    <div class="col-md-2">
                                        <label for="tipe_kendaraan">Tipe dan Seri Mobil</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="form-control" required id="tipe_kendaraan" name="tipe_kendaraan" type="text" value="<?= $booking->tipe_kendaraan; ?>" readonly>
                                    </div>
                                </div>
                                <div class="row" style="margin-top:10px">
                                    <div class="col-md-2">
                                        <label for="plat_nomor">Nomor Polisi</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="form-control" required id="plat_nomor" name="plat_nomor" type="text" value="<?= $booking->plat_nomor; ?>" readonly>
                                    </div>
                                </div>
                                <div class="row" style="margin-top:10px">
                                    <div class="col-md-2">
                                        <label for="nama_service">Jenis Service</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="form-control" required id="nama_service" name="nama_service" type="text" value="<?= $booking->nama_service; ?>" readonly>
                                    </div>
                                </div>
                                <div class="row" style="margin-top:10px">
                                    <div class="col-md-2">
                                        <label for="deskripsi">Deskripsi</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="form-control" required id="deskripsi" name="deskripsi" type="text" value="<?= $booking->deskripsi; ?>">
                                    </div>
                                </div>
                                <div class="row" style="margin-top:10px">
                                    <div class="col-md-2">
                                        <label for="tgl_mulai">Tanggal Mulai</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="form-control" required id="tgl_mulai" name="tgl_mulai" type="date">
                                    </div>
                                </div>
                                <div class="row" style="margin-top:10px">
                                    <div class="col-md-2">
                                        <label for="tgl_selesai">Tanggal Selesai</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="form-control" required id="tgl_selesai" name="tgl_selesai" type="date">
                                    </div>
                                </div>
                                <div class="row" style="margin-top:10px">
                                    <div class="col-md-2">
                                        <label for="id_mekanik">Mekanik</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select class="form-control" name="id_mekanik" id="id_mekanik" required>
                                            <?php foreach ($mekanik as $data) : ?>
                                                <option value="<?= $data->id_mekanik ?>"><?= $data->nama_mekanik ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row" style="margin-top:10px">
                                    <div class="col-md-2">
                                        <label for="total_harga">Total Harga</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input class="form-control" required id="total_harga" name="total_harga" type="number">
                                    </div>
                                </div>
                                <div class="row" style="margin-top:10px">
                                    <div class="col-md-2"> </div>
                                    <div class="col-md-8" style="text-align: right;">
                                        <button class="btn btn-sm btn-dark" style="width: 180px;height: 38px;">SIMPAN</button>
                                    </div>
                                </div>
                            </form>
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