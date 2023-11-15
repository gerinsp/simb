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
                        <li class="breadcrumb-item active"><a class="text-info" href="<?php echo base_url('dashboard') ?>">Home</a></li>
                        <li class="breadcrumb-item">Booking</li>
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
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Deskripsi</th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Pengantaran dan Pengambilan</th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Alamat</th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Status</th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($onprocessbooking as $data) {
                                        ?>
                                            <tr>
                                                <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="3%"><?php echo $no ?></td>
                                                <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="12%"><?php echo format_indo($data->tanggal) ?></td>
                                                <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="12%"><?php echo $data->tipe_kendaraan ?></td>
                                                <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="12%"><?php echo $data->plat_nomor ?></td>
                                                <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="12%"><?php echo $data->deskripsi ?></td>
                                                <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="12%"><?php echo $data->is_delivery == 1 ? 'Pribadi' : 'Non Pribadi'; ?></td>
                                                <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="12%"><?php echo $data->alamat ?></td>
                                                <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="12%">
                                                    <span class="badge badge-primary"><?= $data->nama ?></span>
                                                </td>
                                                <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="30%">
                                                    <button id="btn-confirm" data-idbooking="<?= $data->id_booking ?>" class="btn btn-sm btn-success" data-toggle="modal" data-target="#exampleModal">Konfirmasi</button>
<!--                                                    <a href="--><?php //= base_url() ?><!--service/--><?php //= $data->id_booking; ?><!--/add" class="btn btn-sm btn-success">Konfirmasi</a>-->
                                                    <a href="<?= base_url() ?>service/<?= $data->id_booking; ?>/reject" class="btn btn-sm btn-danger">Tolak</a>
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
                    <h2 style="margin-top: 2rem;">All Booking</h2>
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
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Deskripsi</th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Pengantaran dan Pengambilan</th>
                                            <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Alamat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($allbooking as $data) {
                                        ?>
                                            <tr>
                                                <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="3%"><?php echo $no ?></td>
                                                <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="12%"><?php echo format_indo($data->tanggal) ?></td>
                                                <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="12%"><?php echo $data->tipe_kendaraan ?></td>
                                                <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="12%"><?php echo $data->plat_nomor ?></td>
                                                <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="12%"><?php echo $data->deskripsi ?></td>
                                                <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="12%"><?php echo $data->is_delivery == 1 ? 'Pribadi' : 'Non Pribadi'; ?></td>
                                                <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="12%"><?php echo $data->alamat ?></td>
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
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content" id="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modal-title">Konfirmasi Pembayaran</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body" id="modal-body">

                                </div>
                                <div class="modal-footer" id="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" id="btn-save">Simpan</button>
                                </div>
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
<script src="<?= base_url('assets/plugins/jquery/jquery.min.js') ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('assets/plugins/jquery-ui/jquery-ui.min.js') ?>"></script>
<!-- /.content-wrapper -->
<script>
    const modalBody = document.getElementById('modal-body')
    const btnConfirm = document.getElementById('btn-confirm');
    btnConfirm.addEventListener('click', () => {
        const idBooking = btnConfirm.getAttribute('data-idbooking');
        const formData = new FormData()

        formData.append('idBooking', idBooking)

        fetch('booking/lihatbuktipembayaran', {
            method: 'POST',
            body: formData
        })
            .then(response => response.json())
            .then(data => {
                console.log('Server response:', data);
                if (data.status === 'ok') {
                    modalBody.innerHTML = '';

                    let kolom = 0;
                    if (data.data.length == 1) {
                        kolom = 12
                    } else if (data.data.length == 2) {
                        kolom = 6
                    } else {
                        kolom = 4
                    }

                    const divElement = document.createElement('div')
                    divElement.classList.add('d-flex', 'flex-wrap');
                    data.data.forEach((item, index) => {
                        const imgElement = document.createElement('img');

                        imgElement.src = item.image;
                        imgElement.style.width = '250px'

                        imgElement.alt = 'Image ' + (index + 1);

                        imgElement.classList.add('img-fluid');

                        const columnDiv = document.createElement('div');

                        columnDiv.classList.add('col-md-' + kolom, 'mb-4');

                        columnDiv.appendChild(imgElement);
                        divElement.appendChild(columnDiv);
                        modalBody.appendChild(divElement);
                    });
                    const form = `
                        <div class="form-group">
                            <label for="exampleInputEmail1">Total DP</label>
                            <input type="number" class="form-control" name="total_dp" id="total_dp" placeholder="Masukan Total DP">
                        </div>
                    `;

                    modalBody.insertAdjacentHTML('beforeend', form);

                }

            })
            .catch(error => console.error('Error:', error));


        document.getElementById('btn-save').addEventListener('click', () => {
            const total_dp = $('#total_dp').val()
            if (!total_dp) {
                alert('Total dp harus diisi.')
            } else {
                formData.append('total_dp', total_dp)
                fetch('booking/konfirmasi-pembayaran', {
                    method: 'POST',
                    body: formData
                })
                    .then(response => response.json())
                    .then(data => {
                        // Handle the response from the server
                        console.log('Server response:', data);
                        if (data.status == 'ok') {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: data.message
                            }).then(function () {
                                window.location.href = '<?= base_url() ?>service/<?= $data->id_booking; ?>/add';
                            });
                        }


                    })
                    .catch(error => console.error('Error:', error));
            }
        })
    })
</script>