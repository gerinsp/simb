<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Service extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('Models', 'm');
      cekuser();
   }

   public function listservice()
   {
      $table = 'user';
      $where = array(
         'id_user'      =>   $this->session->userdata('id_user')
      );

      $data['user'] = $this->m->Get_Where($where, $table);

      $select = $this->db->select('*');
      $data['read'] = $this->m->Get_All('service', $select);

      $data['title'] = 'SIM Bengkel Garasinos | List Data Service';
      // echo "Selamat Datang" . $data->nama;


      $this->load->view('templates/head', $data);
      $this->load->view('templates/navigation', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('pages/service/listservice', $data);
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
   function ubahservice()
   {

      $table = 'service';
      $where = array(
         'id_service'          =>   $this->input->post('idservice')
      );

      $data = array(
         'nama_customer'     =>   $this->input->post('namacustomerservice'),
         'tgl_mulai'         =>   $this->input->post('tanggalmulai'),
         'tgl_selesai'       =>   $this->input->post('tanggalselesai'),
         'tipe_kendaraan'    =>   $this->input->post('tipekendaraan'),
         'plat_nomor'        =>   $this->input->post('nopolisi'),
         'nama_service'      =>   $this->input->post('jenisservice'),
         'total_harga'       =>   $this->input->post('totalharga'),
         'deskripsi'         =>   $this->input->post('deskripsi'),
      );
      $this->m->Update($where, $data, $table);

      $this->session->set_flashdata('success', 'Data service berhasil diubah');
      redirect('listservice');
   }
   function hapusservice()
   {
      $id_service = $this->input->post('id');



      $table = 'service';
      $where = array(
         'id_service'          =>   $id_service
      );
      $this->m->Delete($where, $table);

      $this->session->set_flashdata('success', 'Data service berhasil dihapus');
      redirect('listservice');
   }
   function updatestatusservice()
   {

      $table = 'service';
      $where = array(
         'id_service'          =>   $this->input->post('idserviceupdatestatus')
      );

      $data = array(
         'status'     =>   "Proses Perbaikan",
      );
      $this->m->Update($where, $data, $table);

      $this->session->set_flashdata('success', 'Status service berhasil diupdate');
      redirect('listservice');
   }
}
