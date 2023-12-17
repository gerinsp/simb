<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengeluaran extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('Models', 'm');
      cekuser();
   }

   public function listpengeluaran()
   {
      $table = 'user';
      $where = array(
         'id_user'      =>   $this->session->userdata('id_user')
      );

      $data['user'] = $this->m->Get_Where($where, $table);

      $select = $this->db->select('*');
      $data['read'] = $this->m->Get_All('pengeluaran', $select);

      $data['title'] = 'SIM Bengkel Garasinos | List Data Mekanik';
      // echo "Selamat Datang" . $data->nama;


      $this->load->view('templates/head', $data);
      $this->load->view('templates/navigation', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('pages/pengeluaran/listpengeluaran', $data);
      $this->load->view('templates/footer');
      $this->load->view('templates/script', $data);
   }
   function simpanpengeluaran()
   {
      $data = array(
         'nama_produk' => $this->input->post('namaproduk'),
         'merk'        => $this->input->post('merk'),
         'qty'         => $this->input->post('qty'),
         'total_harga' => $this->input->post('totalharga'),
      );

      $this->m->Save($data, 'pengeluaran');

      $this->session->set_flashdata('success', 'Data pengeluaran berhasil ditambahkan');
      redirect('listpengeluaran');
   }
   function ubahpengeluaran()
   {
      $id_pengeluaran = $this->input->post('idpengeluaran');

      $table = 'pengeluaran';
      $where = array(
         'id_pengeluaran'          =>   $id_pengeluaran
      );
      $data = array(
          'nama_produk' => $this->input->post('namaproduk'),
          'merk'        => $this->input->post('merk'),
          'qty'         => $this->input->post('qty'),
          'total_harga' => $this->input->post('totalharga'),
      );
      $this->m->Update($where, $data, $table);

      $this->session->set_flashdata('success', 'Data pengeluaran berhasil diubah');
      redirect('listpengeluaran');
   }
   function hapuspengeluaran()
   {
      $id_pengeluaran = $this->input->post('id');

      $table = 'pengeluaran';
      $where = array(
         'id_pengeluaran'          =>   $id_pengeluaran
      );

      // $data = array(
      //    'deleted'           =>   1
      // );
      $this->m->Delete($where, $table);

      $this->session->set_flashdata('success', 'Data pengeluaran berhasil dihapus');
      redirect('listpengeluaran');
   }
}
