<footer class="main-footer">
   <strong>Copyright &copy; 2023 <a href="<?= base_url('dashboard') ?>">SIM Bengkel Grasinos</a>.</strong>
   All rights reserved.
   <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
   </div>
</footer>
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><?php echo $this->lang->line('confirmlogout'); ?></h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">×</span>
            </button>
         </div>
         <div class="modal-body"><?php echo $this->lang->line('messagelogout'); ?></div>
         <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal"><?php echo $this->lang->line('cancel'); ?></button>
            <a class="btn btn-info" href="<?= base_url('auth/logout') ?>"><?php echo $this->lang->line('logout'); ?></a>
         </div>
      </div>
   </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="logoutLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="logoutLabel"><?php echo $this->lang->line('headconfirmdelete'); ?></h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">×</span>
            </button>
         </div>
         <div class="modal-body"><?php echo $this->lang->line('confirmdelete'); ?></div>
         <div class="modal-footer">
            <?= form_open('', 'class="d-inline" id="formLinkDelete"') ?>
            <input type="hidden" name="id" id="valueId">
            <button type="submit" class="btn btn-danger"> <?php echo $this->lang->line('yes'); ?> </button> <button class="btn btn-secondary" type="button" data-dismiss="modal"><?php echo $this->lang->line('no'); ?></button>
            <?= form_close(); ?>
         </div>
      </div>
   </div>
</div>

<div class="modal fade" id="modaleditmekanik" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="logoutLabel">Ubah Mekanik</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">×</span>
            </button>
         </div>
         <?= form_open('', 'class="d-inline" id="formeditmekanik"') ?>
         <div class="modal-body">
            <div class="row">
               <div class="col-md-3">
                  <label for="">Nama Mekanik</label>
               </div>
               <div class="col-md-9">
                  <input class="form-control" required name="namamekanik" id="namamekanik" type="text">
                  <input class="form-control" name="idmekanik" id="idmekanik" type="hidden">
               </div>
            </div>
            <div class="row" style="margin-top:10px">
               <div class="col-md-3">
                  <label for="">Tanggal Lahir</label>
               </div>
               <div class="col-md-9">
                  <input class="form-control" required name="tanggallahir" id="tanggallahir" type="date">
               </div>
            </div>
            <div class="row" style="margin-top:10px">
               <div class="col-md-3">
                  <label for="">Alamat</label>
               </div>
               <div class="col-md-9">
                  <input class="form-control" required name="alamat" id="alamat" type="text">
               </div>
            </div>
            <div class="row" style="margin-top:10px">
               <div class="col-md-3">
                  <label for="">Telepon</label>
               </div>
               <div class="col-md-9">
                  <input class="form-control" required name="telepon" id="telepon" type="number">
               </div>
            </div>
         </div>
         <div class="modal-footer">
            <button type="submit" class="btn btn-success"> <?php echo $this->lang->line('change'); ?> </button> <button class="btn btn-danger" type="button" data-dismiss="modal"><?php echo $this->lang->line('cancel'); ?></button>
         </div>
         <?= form_close(); ?>
      </div>
   </div>
</div>

<div class="modal fade" id="modaleditpengeluaran" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutLabel">Ubah Data Pengeluaran</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <?= form_open('', 'class="d-inline" id="formeditpengeluaran"') ?>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-3">
                        <label for="">Nama Produk</label>
                    </div>
                    <div class="col-md-9">
                        <input class="form-control" required name="namaproduk" id="namaproduk" type="text">
                        <input class="form-control" name="idpengeluaran" id="idpengeluaran" type="hidden">
                    </div>
                </div>
                <div class="row" style="margin-top:10px">
                    <div class="col-md-3">
                        <label for="">Merk</label>
                    </div>
                    <div class="col-md-9">
                        <input class="form-control" required name="merk" id="merk" type="text">
                    </div>
                </div>
                <div class="row" style="margin-top:10px">
                    <div class="col-md-3">
                        <label for="">Qty</label>
                    </div>
                    <div class="col-md-9">
                        <input class="form-control" required name="qty" id="qty" type="number">
                    </div>
                </div>
                <div class="row" style="margin-top:10px">
                    <div class="col-md-3">
                        <label for="">Total Harga</label>
                    </div>
                    <div class="col-md-9">
                        <input class="form-control" required name="totalharga" id="totalharga" type="number">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success"> <?php echo $this->lang->line('change'); ?> </button> <button class="btn btn-danger" type="button" data-dismiss="modal"><?php echo $this->lang->line('cancel'); ?></button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<div class="modal fade" id="modaleditadmin" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="logoutLabel">Ubah Admin</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">×</span>
            </button>
         </div>
         <?= form_open('', 'class="d-inline" id="formeditadmin"') ?>
         <div class="modal-body">
            <div class="row">
               <div class="col-md-3">
                  <label for="">Nama Admin</label>
               </div>
               <div class="col-md-9">
                  <input class="form-control" required name="namaadmin" id="namaadmin" type="text">
                  <input class="form-control" required name="idadmin" id="idadmin" type="hidden">
               </div>
            </div>
            <div class="row" style="margin-top:10px">
               <div class="col-md-3">
                  <label for="">Username</label>
               </div>
               <div class="col-md-9">
                  <input class="form-control" required name="username" id="username" type="text">
               </div>
            </div>
            <div class="row" style="margin-top:10px">
               <div class="col-md-3">
                  <label for="">Password </label>
               </div>
               <div class="col-md-9">
                  <div class="input-group">
                     <input type="password" class="form-control" id="new_password" name="password">
                     <div class="input-group-append">
                        <div class="input-group-text bg-white border-left-0">
                           <a role="button" onclick="previewPassword(this, 'new_password')"><span class="fa fa-fw fa-sm fa-eye-slash text-black-50"></span></a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="modal-footer">
            <button type="submit" class="btn btn-success"> <?php echo $this->lang->line('change'); ?> </button> <button class="btn btn-danger" type="button" data-dismiss="modal"><?php echo $this->lang->line('cancel'); ?></button>
         </div>
         <?= form_close(); ?>
      </div>
   </div>
</div>

<div class="modal fade" id="modaleditcustomer" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="logoutLabel">Ubah Customer</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">×</span>
            </button>
         </div>
         <?= form_open('', 'class="d-inline" id="formeditcustomer"') ?>
         <div class="modal-body">
            <div class="row">
               <div class="col-md-3">
                  <label for="">Nama Customer</label>
               </div>
               <div class="col-md-9">
                  <input class="form-control" required name="namacustomer" id="namacustomer" type="text">
                  <input class="form-control" required name="idcustomer" id="idcustomer" type="hidden">
               </div>
            </div>
            <div class="row" style="margin-top:10px">
               <div class="col-md-3">
                  <label for="">Username</label>
               </div>
               <div class="col-md-9">
                  <input class="form-control" required name="username" id="usernamecustomer" type="text">
               </div>
            </div>
            <div class="row" style="margin-top:10px">
               <div class="col-md-3">
                  <label for="">Password </label>
               </div>
               <div class="col-md-9">
                  <div class="input-group">
                     <input type="password" class="form-control" id="new_password" name="password">
                     <div class="input-group-append">
                        <div class="input-group-text bg-white border-left-0">
                           <a role="button" onclick="previewPassword(this, 'new_password')"><span class="fa fa-fw fa-sm fa-eye-slash text-black-50"></span></a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="modal-footer">
            <button type="submit" class="btn btn-success"> <?php echo $this->lang->line('change'); ?> </button> <button class="btn btn-danger" type="button" data-dismiss="modal"><?php echo $this->lang->line('cancel'); ?></button>
         </div>
         <?= form_close(); ?>
      </div>
   </div>
</div>


<div class="modal fade" id="modaleditservice" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="logoutLabel">Ubah Service</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">×</span>
            </button>
         </div>
         <?= form_open('', 'class="d-inline" id="formeditservice"') ?>
         <div class="modal-body">
            <div class="row">
               <div class="col-md-4">
                  <label for="">Nama Customer</label>
               </div>
               <div class="col-md-8">
                  <input class="form-control" required name="namacustomerservice" id="namacustomerservice" type="text">
                  <input class="form-control" name="idservice" id="idservice" type="hidden">
               </div>
            </div>
            <div class="row" style="margin-top:10px">
               <div class="col-md-4">
                  <label for="">Tanggal Mulai</label>
               </div>
               <div class="col-md-8">
                  <input class="form-control" required name="tanggalmulai" id="tanggalmulai" type="date">
               </div>
            </div>
            <div class="row" style="margin-top:10px">
               <div class="col-md-4">
                  <label for="">Tanggal Selesai</label>
               </div>
               <div class="col-md-8">
                  <input class="form-control" required name="tanggalselesai" id="tanggalselesai" type="date">
               </div>
            </div>
            <div class="row" style="margin-top:10px">
               <div class="col-md-4">
                  <label for="">Tipe Mobil</label>
               </div>
               <div class="col-md-8">
                  <input class="form-control" required name="tipekendaraan" id="tipekendaraan" type="text">
               </div>
            </div>
            <div class="row" style="margin-top:10px">
               <div class="col-md-4">
                  <label for="">No Polisi</label>
               </div>
               <div class="col-md-8">
                  <input class="form-control" required name="nopolisi" id="nopolisi" type="text">
               </div>
            </div>
            <div class="row" style="margin-top:10px">
               <div class="col-md-4">
                  <label for="">Jenis Service</label>
               </div>
               <div class="col-md-8">
                  <input class="form-control" required name="jenisservice" id="jenisservice" type="text">
               </div>
            </div>
            <div class="row" style="margin-top:10px">
               <div class="col-md-4">
                  <label for="">Total Harga</label>
               </div>
               <div class="col-md-8">
                  <input class=" form-control" required name="totalharga" id="totalharga" type="text">
               </div>
            </div>
            <div class="row" style="margin-top:10px">
               <div class="col-md-4">
                  <label for="">Deskripsi</label>
               </div>
               <div class="col-md-8">
                  <input class="form-control" required name="deskripsi" id="deskripsi" type="text">
               </div>
            </div>
         </div>
         <div class="modal-footer">
            <button type="submit" class="btn btn-success"> <?php echo $this->lang->line('change'); ?> </button> <button class="btn btn-danger" type="button" data-dismiss="modal"><?php echo $this->lang->line('cancel'); ?></button>
         </div>
         <?= form_close(); ?>
      </div>
   </div>
</div>

<div class="modal fade" id="modalupdatestatusservice" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="logoutLabel">Update Status Service</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">×</span>
            </button>
         </div>
         <?= form_open('', 'class="d-inline" id="formupdatestatusservice"') ?>
         <div class="modal-body">
            <div class="row">
               Apakah anda yakin ingin update status service ini?
               <input class="form-control" required name="idserviceupdatestatus" id="idserviceupdatestatus" type="hidden">
            </div>
         </div>
         <div class="modal-footer">
            <button type="submit" class="btn btn-success"> <?php echo $this->lang->line('yes'); ?> </button> <button class="btn btn-danger" type="button" data-dismiss="modal"><?php echo $this->lang->line('cancel'); ?></button>
         </div>
         <?= form_close(); ?>
      </div>
   </div>
</div>
</div>
<!-- ./wrapper -->