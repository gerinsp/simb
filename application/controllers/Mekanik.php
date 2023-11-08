<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mekanik extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('Models', 'm');
      cekuser();
   }

   public function listmekanik()
   {
      $table = 'user';
      $where = array(
         'id_user'      =>   $this->session->userdata('id_user')
      );

      $data['user'] = $this->m->Get_Where($where, $table);

      $select = $this->db->select('*');
      $data['read'] = $this->m->Get_All('mekanik', $select);

      $data['title'] = 'SIM Bengkel Garasinos | List Data Mekanik';
      // echo "Selamat Datang" . $data->nama;


      $this->load->view('templates/head', $data);
      $this->load->view('templates/navigation', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('pages/mekanik/listmekanik', $data);
      $this->load->view('templates/footer');
      $this->load->view('templates/script', $data);
   }
   function simpanmekanik()
   {
      $data = array(
         'nama_mekanik'          =>   $this->input->post('namamekanik'),
         'tanggal_lahir'         =>   $this->input->post('tanggallahir'),
         'alamat'                =>   $this->input->post('alamat'),
         'telepon'               =>   $this->input->post('telepon'),
      );

      $this->m->Save($data, 'mekanik');

      $this->session->set_flashdata('success', 'Data mekanik berhasil ditambah');
      redirect('listmekanik');
   }
   function ubahmekanik()
   {
      $id_mekanik = $this->input->post('idmekanik');

      $table = 'mekanik';
      $where = array(
         'id_mekanik'          =>   $id_mekanik
      );
      $data = array(
         'nama_mekanik'          =>   $this->input->post('namamekanik'),
         'tanggal_lahir'         =>   $this->input->post('tanggallahir'),
         'alamat'                =>   $this->input->post('alamat'),
         'telepon'               =>   $this->input->post('telepon'),
      );
      $this->m->Update($where, $data, $table);

      $this->session->set_flashdata('success', 'Data mekanik berhasil diubah');
      redirect('listmekanik');
   }
   function hapusmekanik()
   {
      $id_mekanik = $this->input->post('id');



      $table = 'mekanik';
      $where = array(
         'id_mekanik'          =>   $id_mekanik
      );

      // $data = array(
      //    'deleted'           =>   1
      // );
      $this->m->Delete($where, $table);

      $this->session->set_flashdata('success', 'Data mekanik berhasil dihapus');
      redirect('listmekanik');
   }
}
