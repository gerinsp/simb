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
        $data['jenisservice'] = $this->m->Get_All('tipe_service', $select);

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
            'tipe_kendaraan'     => $this->input->post('tipe_kendaraan'),
            'plat_nomor'         => $this->input->post('plat_nomor'),
            'id_tipe_service'    => $this->input->post('id_tipe_service'),
            'deskripsi'          => $this->input->post('deskripsi'),
            'is_delivery'        => $this->input->post('is_delivery'),
            'alamat'             => $this->input->post('alamat'),
            'id_user'            => $this->session->userdata('id_user'),
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
        $data['booking'] = $this->m->Get_All('booking', $select);
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

    public function upload()
    {
        $idBooking = $this->input->post('idBooking');
        if (!empty($_FILES['files']['name'])) {
            $files = $_FILES['files'];

            $data = array(
                'id_booking' => $idBooking,
            );

            foreach ($files['tmp_name'] as $key => $tmp_name) {
                $fileContent = file_get_contents($tmp_name);
                $base64File = base64_encode($fileContent);

                $data['image'] = 'data:image/png;base64,' . $base64File;

                $this->m->Save($data, 'upload_dp');

                unset($data['base64_files']);
            }

            $response = array(
                'status' => 'ok',
                'message' => 'Upload bukti pembayaran berhasil',
            );
        } else {
            $response = array(
                'status' => 'err',
                'message' => 'File tidak ada',
            );
        }

        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }

    public function lihatbuktipembayaran()
    {
        $idBooking = $this->input->post('idBooking');

        $select = $this->db->select('*');
        $select = $this->db->where('id_booking', $idBooking);
        $data['read'] = $this->m->Get_All('upload_dp', $select);

        $response = array(
            'status' => 'ok',
            'data' => $data['read']
        );

        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }

    public function lihatinvoice()
    {
    }

    public function lihatkuitansi()
    {
    }
}
