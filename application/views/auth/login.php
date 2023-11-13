<body class="hold-transition login-page">
   <div class="login-box">
      <div class="login-logo">
         <a href=""><b>Sistem Informasi Manajemen Bengkel</b></a>
      </div>
      <!-- /.login-logo -->
      <div class="login-box-body">
         <p class="login-box-msg">Sign in to start your session</p>
         <?= $this->session->flashdata('message'); ?>
         <form method="post" action="<?= base_url('login') ?>">
            <div class="form-group has-feedback">
               <input type="text" name="username" class="form-control" placeholder="Username" value="<?= isset($_COOKIE['username']) ? $_COOKIE['username'] : '' ?>">
               <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group has-feedback">
               <input type="password" value="<?= isset($_COOKIE['password']) ? $_COOKIE['password'] : '' ?>" class="form-control form-control-user" id="password" name="password" placeholder="Password">
               <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="row">
               <div class="col-xs-8">
                  <div class="checkbox icheck">
                     <label>
                        <input type="checkbox" value="" id="rememberMe" name="rememberMe" <?= (isset($_COOKIE['username']) && isset($_COOKIE['password'])) ? "checked" : '' ?>> Remember Me
                     </label>
                  </div>
               </div>
               <!-- /.col -->
               <div class="col-xs-4">
                  <button type="submit" class="btn btn-primary btn-block btn-flat">Login</button>
               </div>
               <!-- /.col -->
            </div>
             <p class="mb-0 mt-5">
                 Don't you have an account yet?
                 <a href="<?= base_url('registration') ?>" class="link-primary text-center">
                     Register here
                 </a>
             </p>
         </form>


      </div>
      <!-- /.login-box-body -->
   </div>
   <!-- /.login-box -->