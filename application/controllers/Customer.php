<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('Models', 'm');
      cekuser();
   }

   public function listcustomer()
   {
      $table = 'user';
      $where = array(
         'id_user'      =>   $this->session->userdata('id_user')
      );

      $data['user'] = $this->m->Get_Where($where, $table);

      $select = $this->db->select('*');
      $select = $this->db->where('role_id', 3);
      $data['read'] = $this->m->Get_All('user', $select);

      $data['title'] = 'SIM Bengkel Garasinos | List Data Customer';
      // echo "Selamat Datang" . $data->nama;


      $this->load->view('templates/head', $data);
      $this->load->view('templates/navigation', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('pages/customer/listcustomer', $data);
      $this->load->view('templates/footer');
      $this->load->view('templates/script', $data);
   }
   function simpancustomer()
   {
      $data = array(
         'nama'              =>   $this->input->post('namacustomer'),
         'image'             =>   'default.png',
         'username'          =>   $this->input->post('username'),
         'password'          =>   password_hash($this->input->post('password'), PASSWORD_DEFAULT),
         'role_id'           =>   3,
         'is_active'         =>   1,
         'tanggal_daftar'    =>   date("Y-m-d"),
      );

      $this->m->Save($data, 'user');

      $this->session->set_flashdata('success', 'Data customer berhasil ditambah');
      redirect('listcustomer');
   }
   function ubahcustomer()
   {

      $table = 'user';
      $where = array(
         'id_user'          =>   $this->input->post('idcustomer')
      );

      $data = array(
         'nama'              =>   $this->input->post('namacustomer'),
         'username'          =>   $this->input->post('username'),
         'password'          =>   password_hash($this->input->post('password'), PASSWORD_DEFAULT),
      );
      $this->m->Update($where, $data, $table);

      $this->session->set_flashdata('success', 'Data customer berhasil diubah');
      redirect('listcustomer');
   }
   function hapuscustomer()
   {
      $id_customer = $this->input->post('id');



      $table = 'user';
      $where = array(
         'id_user'          =>   $id_customer
      );

      // $data = array(
      //    'deleted'           =>   1
      // );
      $this->m->Delete($where, $table);

      $this->session->set_flashdata('success', 'Data customer berhasil dihapus');
      redirect('listcustomer');
   }
}
