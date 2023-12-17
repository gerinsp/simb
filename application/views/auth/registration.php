<body class="hold-transition login-page">
   <div class="login-box">
      <div class="login-logo">
         <a href=""><b>Sistem Informasi Manajemen Bengkel</b></a>
      </div>
      <!-- /.login-logo -->
      <div class="login-box-body">
         <p class="login-box-msg">Sign up to start your session</p>
         <?= $this->session->flashdata('message'); ?>
         <form method="post" action="<?= base_url('registration') ?>">
            <div class="form-group has-feedback">
               <label for="nama">Nama Lengkap</label>
               <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" value="<?= isset($_COOKIE['nama']) ? $_COOKIE['nama'] : '' ?>">
               <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group has-feedback">
               <label for="username">Username</label>
               <input type="text" name="username" class="form-control" placeholder="Username" value="<?= isset($_COOKIE['username']) ? $_COOKIE['username'] : '' ?>">
               <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group has-feedback">
               <label for="password">Password</label>
               <input type="password" value="<?= isset($_COOKIE['password']) ? $_COOKIE['password'] : '' ?>" class="form-control form-control-user" id="password" name="password" placeholder="Password">
               <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat Password">
               <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="row">
               <div class="col-xs-8">
                  <div class="checkbox icheck">
                     <label>
                        <input type="checkbox" value="yes" required id="isAgree" name="isAgree" <?= (isset($_COOKIE['username']) && isset($_COOKIE['password'])) ? "checked" : '' ?>> I agree to the terms
                     </label> <br>
                     <?= form_error('isAgree', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
               </div>
               <!-- /.col -->
               <div class="col-xs-4">
                  <button type="submit" class="btn btn-warning btn-block btn-flat">Daftar</button>
               </div>
               <!-- /.col -->
            </div>
         </form>
         <p class="mb-0">
            already have an account?
            <a href="<?= base_url('login') ?>" class="link-primary text-center">
               Login is here
            </a>
         </p>


      </div>
      <!-- /.login-box-body -->
   </div>
   <!-- /.login-box -->