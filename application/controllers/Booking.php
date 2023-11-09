<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Booking extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Models', 'm');
        cekuser();
    }

    public function booking()
    {
        $table = 'user';
        $where = array(
            'id_user'      =>   $this->session->userdata('id_user')
        );

        $data['user'] = $this->m->Get_Where($where, $table);

        $select = $this->db->select('*');
        $data['read'] = $this->m->Get_All('tipe_service', $select);

        $data['title'] = 'SIM Bengkel Garasinos | Booking';
        // echo "Selamat Datang" . $data->nama;

        $this->load->view('templates/head', $data);
        $this->load->view('templates/navigation', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/booking/booking', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/script', $data);
    }

    public function save()
    {
        $data = array(
            'tanggal'            => $this->input->post('tanggal'),
            'tipe_kendaraan'     => $this->input->post('jeniskendaraan'),
            'plat_nomor'         => $this->input->post('platnomor'),
            'id_tipe_service'    => $this->input->post('jenisservice'),
            'deskripsi'          => $this->input->post('deskripsi'),
            'is_delivery'        => $this->input->post('isdelivery'),
            'alamat'             => $this->input->post('alamat'),
            'id_user'            => $this->session->userdata('id_user'),
            'down_payment_image' => '',
            'id_status_booking'  => 1,
        );

        $this->m->Save($data, 'booking');

        $this->session->set_flashdata('success', 'Berhasil melakukan Booking');
        redirect('detail-booking');
    }

    public function detail_booking()
    {
        $table = 'user';
        $where = array(
            'id_user'      =>   $this->session->userdata('id_user')
        );

        $data['user'] = $this->m->Get_Where($where, $table);

        $select = $this->db->select('*');
        $select = $this->db->join('tipe_service', 'tipe_service.id_tipe_service = booking.id_tipe_service', 'left');
        $select = $this->db->join('status_booking', 'status_booking.id_status_booking = booking.id_status_booking', 'left');
        $data['read'] = $this->m->Get_All('booking', $select);
//        dd($data['read']);
        $data['title'] = 'SIM Bengkel Garasinos | Detail Booking';
        // echo "Selamat Datang" . $data->nama;

        $this->load->view('templates/head', $data);
        $this->load->view('templates/navigation', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/booking/detail-booking', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/script', $data);
    }

    public function upload_pembayaran()
    {
        $table = 'user';
        $where = array(
            'id_user'      =>   $this->session->userdata('id_user')
        );

        $data['user'] = $this->m->Get_Where($where, $table);

        $select = $this->db->select('*');
        $select = $this->db->join('tipe_service', 'tipe_service.id_tipe_service = booking.id_tipe_service', 'left');
        $data['read'] = $this->m->Get_All('booking', $select);
//        dd($data['read']);
        $data['title'] = 'SIM Bengkel Garasinos | Detail Booking';
        // echo "Selamat Datang" . $data->nama;

        $this->load->view('templates/head', $data);
        $this->load->view('templates/navigation', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/booking/upload-pembayaran', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/script', $data);
    }
}