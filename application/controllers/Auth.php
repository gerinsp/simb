<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->library('form_validation');
      $this->load->model('Models', 'm');
   }
   public function index()
   {

      $this->form_validation->set_rules(
         'username',
         'Username',
         'required|trim',
         [
            'required' => 'Username Tidak Boleh Kosong',
         ]
      );
      $this->form_validation->set_rules(
         'password',
         'Password',
         'required|trim',
         [
            'required' => 'Password Tidak Boleh Kosong'
         ]
      );

      if ($this->form_validation->run() == false) {
         $data['title'] = "SIM Bengkel Garasinos | Login ";
         $this->load->view('auth/header', $data);
         $this->load->view('auth/login');
         $this->load->view('auth/footer');
      } else {
         $this->_login();
      }
   }

   private function _login()
   {

      $user = [
         $username   =   $this->input->post('username'),
         $password   =   $this->input->post('password')

      ];
      $user = $this->m->Get_Where(['username' => $username], 'user');

      if ($user) {

         if ($user->is_active == 1) {

            if (password_verify($password, $user->password)) {

               $data = [
                  'id_user' => $user->id_user,
                  'username' => $user->username,
                  'role_id' => $user->role_id,
                  'nama' => $user->nama
               ];

               if (isset($_POST['rememberMe'])) {
                  /**
                   * Store Login Credential
                   */
                  setcookie('username', $username, (time() + ((365 * 24 * 60 * 60) * 3)));
                  setcookie('password', $password, (time() + ((365 * 24 * 60 * 60) * 3)));
               } else {
                  /**
                   * Delete Login Credential
                   */
                  setcookie('username', $username, (time() - (24 * 60 * 60)));
                  setcookie('password', $password, (time() - (24 * 60 * 60)));
               }
               $this->session->set_userdata($data);
               // $this->session->set_flashdata('success', 'Anda berhasil login');
               redirect('dashboard');
            } else {
               $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password anda salah <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div> ');
               redirect('login');
            }
         } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Akun Tidak Aktif<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div> ');
            redirect('login');
         }
      } else {
         $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username Tidak Terdaftar<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button></div> ');
         redirect('login');
      }
   }
   public function reg()
   {
      $data['title'] = "SIM Bengkel Garasinos | Registration";
      $this->load->view('auth/header', $data);
      $this->load->view('auth/registration');
      $this->load->view('auth/footer');
   }
   public function registration()
   {
      if ($this->session->userdata('username')) {
         if ($this->session->userdata('role_id') == 1) {
            redirect('owner');
         }
         if ($this->session->userdata('role_id') == 2) {
            redirect('admin');
         } else {
            redirect('user');
         }
      };
      $this->form_validation->set_rules(
         'nama',
         'Name Lengkap',
         'required|min_length[3]',
         [
            'required' => '{field} Tidak Boleh Kosong',
            'min_length' => '{field} Minimal 3 Karakter'
         ]
      );
      $this->form_validation->set_rules(
         'username',
         'Username',
         'required|alpha_numeric|is_unique[tbl_user.username]',
         [
            'required' => '{field} Tidak Boleh Kosong',
            'alpha_numeric' => '{field} Hanya Boleh Alphabet & Nomor',
            'is_unique' => '{field} Sudah Terdaftar'
         ]
      );
      $this->form_validation->set_rules(
         'password',
         'Password',
         'required|min_length[4]|matches[password2]',
         [
            'required' => '{field} Tidak Boleh Kosong',
            'min_length' => '{field} minimal 4 karakter',
            'matches' => '{field} Tidak Sama'
         ]
      );
      $this->form_validation->set_rules('password2', 'Password', 'required|min_length[4]|matches[password]');
      $this->form_validation->set_rules(
         'isAgree',
         'Terms',
         'required',
         [
            'required' => '{field} Harus Disetujui'
         ]
      );

      if ($this->form_validation->run() == false) {
         $data['title'] = "SIM Bengkel Garasinos | Registration";
         $this->load->view('auth/header', $data);
         $this->load->view('auth/registration');
         $this->load->view('auth/footer');
      } else {
         $data = array(
            'nama'           =>   htmlspecialchars($this->input->post('nama', true)),
            'username'       =>   htmlspecialchars($this->input->post('username', true)),
            'image'          =>   'default.png',
            'password'       =>   password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'role_id'        =>   '3',
            'is_active'      =>   '1',
            'tanggal_daftar' =>   date('y-m-d')
         );

         $this->m->Save($data, 'tbl_user');

         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Akun berhasil dibuat, Silahkan login<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span></button> </div> ');
         redirect('login');
      }
   }

   public function logout()
   {

      session_start();
      session_destroy();
      $this->session->unset_userdata('username');
      $this->session->unset_userdata('role_id');
      $this->session->set_flashdata('success', 'Anda berhasil logout');
      redirect('login');
   }
   public function blocked()
   {
      $table = 'user';
      $where = array(
         'id_user'      =>   $this->session->userdata('id_user')
      );


      $data['user'] = $this->m->Get_Where($where, $table);
      $data['title'] = 'Akses Ditolak';
      $this->load->view('auth/header', $data);
      $this->load->view('auth/blocked');
      $this->load->view('auth/script');
   }
}
