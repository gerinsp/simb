<!-- Content Wrapper. Contains page content -->
<style>
</style>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Pembayaran</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">Home</li>
                        <li class="breadcrumb-item active"><a class="text-info" href="<?php echo base_url() ?>listmekanik">Detail Pembayaran</a></li>
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
                                        <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Jenis Service</th>
                                        <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Upload Bukti Pembayaran</th>
                                        <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Lihat Bukti Pembayaran</th>
                                        <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Invoice</th>
                                        <th style=" padding: 0.75rem;vertical-align: top;border-top: 1px solid #e3e6f0;">Kuitansi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($read as $data) {
                                        ?>
                                        <tr>
                                            <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="3%"><?php echo $no ?></td>
                                            <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="12%"><?php echo format_indo($data->tanggal) ?></td>
                                            <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="12%"><?php echo $data->tipe_kendaraan ?></td>
                                            <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="12%"><?php echo $data->nama_service ?></td>
                                            <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="12%"><button id="btn-upload" data-idbooking="<?= $data->id_booking ?>" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal">Upload</button></td>
                                            <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="12%"><button id="btn-lihat" data-idbooking="<?= $data->id_booking ?>" class="btn btn-sm btn-success" data-toggle="modal" data-target="#exampleModal">Lihat</button></td>
                                            <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="12%"><button class="btn btn-sm btn-warning">Lihat Invoice</button></td>
                                            <td style="vertical-align: top;border-top: 1px solid #e3e6f0;" width="12%"><button class="btn btn-sm btn-info">Lihat Kuitansi</button></td>
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
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-title">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="modal-body">

                    </div>
                    <div class="modal-footer" id="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="btn-save">Save changes</button>
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
    const modalTitle = document.getElementById('modal-title')
    const modalBody = document.getElementById('modal-body')
    const btnSave = document.getElementById('btn-save')
    const btnUpload = document.getElementById('btn-upload')
    const btnLihat = document.getElementById('btn-lihat')
    const modalFooter = document.getElementById('modal-footer')

    btnLihat.addEventListener('click', () => {
        modalTitle.innerText = 'Bukti Pembayaran'
        modalFooter.innerHTML = ''
        const idBooking = btnUpload.getAttribute('data-idbooking');
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
                    // Bersihkan konten modalBody sebelum menambahkan gambar-gambar baru
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
                    // Loop melalui setiap elemen gambar dalam data
                    data.data.forEach((item, index) => {
                        // Buat elemen gambar
                        const imgElement = document.createElement('img');

                        // Atur atribut src dengan data.image dari setiap item
                        imgElement.src = item.image;
                        imgElement.style.width = '250px'

                        // Atur atribut lain sesuai kebutuhan (contoh: alt)
                        imgElement.alt = 'Image ' + (index + 1);

                        // Tambahkan kelas untuk mengatur gaya dan tata letak gambar
                        imgElement.classList.add('img-fluid');

                        // Buat kolom Bootstrap
                        const columnDiv = document.createElement('div'); // Ganti 'md' dengan ukuran yang sesuai

                        columnDiv.classList.add('col-md-' + kolom, 'mb-4');

                        // Tambahkan elemen gambar ke dalam kolom
                        columnDiv.appendChild(imgElement);
                        // Tambahkan kelas Bootstrap untuk tata letak flex
                        divElement.appendChild(columnDiv)
                        // Tambahkan kolom ke dalam modalBdy
                        modalBody.appendChild(divElement);
                    });
                }

            })
            .catch(error => console.error('Error:', error));
    })

    let fileCount = 1; // To track the number of file inputs

    btnUpload.addEventListener('click', () => {
        modalBody.innerHTML = ''
        const idBooking = btnUpload.getAttribute('data-idbooking');

        console.log('test', modalTitle);
        modalTitle.innerText = "Upload Bukti Transfer";
        modalFooter.innerHTML = `
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="btn-save">Upload</button>
                        `;

        modalBody.innerHTML = `
        <div id="fileInputs">
            <div class="input-group mb-2">
                <input type="file" class="form-control mr-2" name="input" id="input1" multiple />
                <button class="btn btn-success add-file" type="button" style="font-weight: bolder;">+</button>
            </div>
        </div>
    `;

        // Function to add a new file input
        function addFileInput() {
            fileCount++;
            const newInput = `
        <div class="input-group mb-2">
            <input type="file" class="form-control mr-2" name="input" id="input${fileCount}" multiple />
            <button class="btn btn-danger remove-file" type="button" style="font-weight: bolder;width: 35px;">-</button>
        </div>
    `;
            document.getElementById('fileInputs').insertAdjacentHTML('beforeend', newInput);
        }

        // Function to remove the last file input
        function removeLastFileInput() {
            if (fileCount > 1) {
                document.getElementById(`input${fileCount}`).parentElement.remove();
                fileCount--;
            }
        }

        // Add event listener for the "Tambah" button
        document.getElementById('fileInputs').addEventListener('click', function (event) {
            if (event.target.classList.contains('add-file')) {
                addFileInput();
            } else if (event.target.classList.contains('remove-file')) {
                removeLastFileInput();
            }
        });

        document.getElementById('btn-save').addEventListener('click', () => {
            // Use plain JavaScript to get the value of input with the name 'input'
            const files = document.getElementsByName('input');

            // Create FormData object to hold file data
            const formData = new FormData();

            files.forEach((input, index) => {
                const fileInput = input;
                for (let i = 0; i < fileInput.files.length; i++) {
                    // Append each file to FormData
                    formData.append(`files[${index}]`, fileInput.files[i]);
                }
            });

            formData.append('idBooking', idBooking)

            // Perform a POST request to the server
            fetch('booking/upload', {
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
                            window.location.reload();
                        });
                    }

                })
                .catch(error => console.error('Error:', error));
        });
    });



</script>
<!-- End Function Javascript -->