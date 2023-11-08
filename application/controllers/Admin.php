<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('Models', 'm');
      cekuser();
   }

   public function listadmin()
   {
      $table = 'user';
      $where = array(
         'id_user'      =>   $this->session->userdata('id_user')
      );

      $data['user'] = $this->m->Get_Where($where, $table);

      $select = $this->db->select('*');
      $select = $this->db->where('role_id', 2);
      $data['read'] = $this->m->Get_All('user', $select);

      $data['title'] = 'SIM Bengkel Garasinos | List Data Admin';
      // echo "Selamat Datang" . $data->nama;


      $this->load->view('templates/head', $data);
      $this->load->view('templates/navigation', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('pages/admin/listadmin', $data);
      $this->load->view('templates/footer');
      $this->load->view('templates/script', $data);
   }
   function simpanadmin()
   {
      $data = array(
         'nama'              =>   $this->input->post('namaadmin'),
         'image'             =>   'default.png',
         'username'          =>   $this->input->post('username'),
         'password'          =>   password_hash($this->input->post('password'), PASSWORD_DEFAULT),
         'role_id'           =>   2,
         'is_active'         =>   1,
         'tanggal_daftar'    =>   date("Y-m-d"),
      );

      $this->m->Save($data, 'user');

      $this->session->set_flashdata('success', 'Data admin berhasil ditambah');
      redirect('listadmin');
   }
   function ubahadmin()
   {

      $table = 'user';
      $where = array(
         'id_user'          =>   $this->input->post('idadmin')
      );

      $data = array(
         'nama'              =>   $this->input->post('namaadmin'),
         'username'          =>   $this->input->post('username'),
         'password'          =>   password_hash($this->input->post('password'), PASSWORD_DEFAULT),
      );
      $this->m->Update($where, $data, $table);

      $this->session->set_flashdata('success', 'Data admin berhasil diubah');
      redirect('listadmin');
   }
   function hapusadmin()
   {
      $id_admin = $this->input->post('id');



      $table = 'user';
      $where = array(
         'id_user'          =>   $id_admin
      );

      // $data = array(
      //    'deleted'           =>   1
      // );
      $this->m->Delete($where, $table);

      $this->session->set_flashdata('success', 'Data admin berhasil dihapus');
      redirect('listadmin');
   }
}
