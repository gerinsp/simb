<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
      $this->load->model('Models', 'm');
      cekuser();
   }

   public function index()
   {
      $table = 'user';
      $where = array(
         'id_user'      =>   $this->session->userdata('id_user')
      );

      $data['user'] = $this->m->Get_Where($where, $table);

      // $select = $this->db->select('*, count(kode_barang) as jumlahbarang');
      // $data['read']=$this->m->Get_All('barang',$select);
      $data['title'] = 'SIM Bengkel Garasinos | Dashboard';
      // echo "Selamat Datang" . $data->nama;

       if ($this->session->userdata('role_id') == 2) {
           $select = $this->db->select('*, count(id_booking) as jumlahbooking');
           $select = $this->db->where('tanggal', date('y-m-d'));
           $data['databooking'] = $this->m->Get_All('booking', $select);

           $select = $this->db->select('*, count(id_invoice) as jumlahinvoice');
           $select = $this->db->where('tanggal', date('y-m-d'));
           $data['datainvoice'] = $this->m->Get_All('invoice', $select);
       }

      if ($this->session->userdata('role_id') == 3) {
          $this->db->where('id_status_booking', 1);
          $this->db->where('id_user', $this->session->userdata('id_user'));
          $data['on_proses'] = $this->db->count_all_results('booking');
          $this->db->where('id_status_booking', 2);
          $this->db->where('id_user', $this->session->userdata('id_user'));
          $data['confirm'] = $this->db->count_all_results('booking');
          $this->db->where('id_status_booking', 3);
          $this->db->where('id_user', $this->session->userdata('id_user'));
          $data['reject'] = $this->db->count_all_results('booking');
          $this->db->where('id_status_booking', 4);
          $this->db->where('id_user', $this->session->userdata('id_user'));
          $data['done'] = $this->db->count_all_results('booking');
      }

       if ($this->session->userdata('role_id') == 4) {
           $this->db->where('id_status_booking', 2);
           $this->db->where('id_tipe_service', 1);
           $data['repair'] = $this->db->count_all_results('booking');
           $this->db->where('id_status_booking', 2);
           $this->db->where('id_tipe_service', 2);
           $data['repaint'] = $this->db->count_all_results('booking');
           $this->db->where('id_status_booking', 2);
           $this->db->where('id_tipe_service', 3);
           $data['restore'] = $this->db->count_all_results('booking');
           $this->db->where('id_status_booking', 2);
           $this->db->where('id_tipe_service', 4);
           $data['modify'] = $this->db->count_all_results('booking');

           $select = $this->db->select('*');
           $select = $this->db->join('service', 'service.id_booking = booking.id_booking', 'left');
           $select = $this->db->where('service.status', 'Proses Perbaikan');
           $data['read'] = $this->m->Get_All('booking', $select);
       }

      $this->load->view('templates/head', $data);
      $this->load->view('templates/navigation', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('templates/dashboard', $data);
      $this->load->view('templates/footer');
      $this->load->view('templates/script', $data);
   }

}
