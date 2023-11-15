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
           'id_service' => $this->input->post('idserviceupdatestatus')
       );

       $currentStatus = $this->m->getSingleRow($table, $where)->status;

       $newStatus = '';
       switch ($currentStatus) {
           case 'Menunggu Kedatangan':
               $newStatus = 'Proses Perbaikan';
               break;
           case 'Proses Perbaikan':
               $newStatus = 'Selesai';
               break;
       }

       // Update status
       $data = array(
           'status' => $newStatus,
       );
       $this->m->Update($where, $data, $table);

       $this->session->set_flashdata('success', 'Berhasil update status service menjadi Selesai');
       redirect('invoice');
   }
   public function add($id_booking)
   {
      $data['user'] = $this->m->Get_Where(['id_user' => $this->session->userdata('id_user')], 'user');

      $data['booking'] = $this->db->select('user.nama, tipe_service.nama_service, booking.id_booking, booking.tipe_kendaraan, booking.plat_nomor, booking.deskripsi')
         ->join('tipe_service', 'tipe_service.id_tipe_service = booking.id_tipe_service')
         ->join('user', 'user.id_user = booking.id_user')
         ->get_where('booking', ['id_booking' => $id_booking])->row();

      $data['mekanik'] = $this->db->get('mekanik')->result();

      $data['title'] = 'SIM Bengkel Garasinos | Tambah Service';

      $this->load->view('templates/head', $data);
      $this->load->view('templates/navigation', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('pages/service/add', $data);
      $this->load->view('templates/footer');
      $this->load->view('templates/script', $data);
   }
   public function reject($id_booking)
   {
      $this->db->update('booking', ['id_status_booking' => 3], ['id_booking' => $id_booking]);

      $this->session->set_flashdata('success', 'Booking berhasil direject');
      redirect('book');
   }
   public function save($id_booking)
   {
       $result = $this->db
           ->get_where('booking', array('id_booking' => $id_booking))
           ->row();
      $this->db->insert('service', [
         'id_booking' => $id_booking,
         'nama_customer' => $this->input->post('nama_customer'),
         'tipe_kendaraan' => $this->input->post('tipe_kendaraan'),
         'plat_nomor' => $this->input->post('plat_nomor'),
         'nama_service' => $this->input->post('nama_service'),
         'deskripsi' => $this->input->post('deskripsi'),
         'tgl_mulai' => $this->input->post('tgl_mulai'),
         'tgl_selesai' => $this->input->post('tgl_selesai'),
         'id_mekanik' => $this->input->post('id_mekanik'),
         'total_harga' => $this->input->post('total_harga'),
         'status' => 'Menunggu Kedatangan'
      ]);
       $id_service = $this->db->insert_id();

       $now = date('d/m/Y');
       $no_invoice = "INV" . mt_rand(1000, 9999) . $now;

      $this->db->insert('invoice', [
          'no_invoice' => $no_invoice,
          'id_service' => $id_service,
          'nama_customer' => $this->input->post('nama_customer'),
          'tanggal' => date('Y-m-d'),
          'deskripsi' => $this->input->post('deskripsi'),
          'total_harga' => $this->input->post('total_harga'),
          'down_payment' => $result->total_dp,
          'rest_bill' => $this->input->post('total_harga') - $result->total_dp,
          'status' => 'unpaid'
      ]);

      $this->db->update('booking', ['id_status_booking' => 2], ['id_booking' => $id_booking]);

      $this->session->set_flashdata('success', 'Berhasil menambahkan service dan generate invoice');
      redirect('listservice');
   }
}
