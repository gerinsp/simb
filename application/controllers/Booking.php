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
        $idBooking = $this->input->post('idBooking');

        $select = $this->db->select('*');
        $select = $this->db->join('service', 'service.id_service = invoice.id_service');
        $select = $this->db->where('id_booking', $idBooking);
        $data['read'] = $this->m->Get_All('invoice', $select);

        $data['invoices'] = [];

        foreach ($data['read'] as $invoice) {
            $data['invoices'][] = [
                'no_invoice' => $invoice->no_invoice,
                'nama_customer' => strtolower($invoice->nama_customer),
                'tanggal' => format_indo($invoice->tanggal),
                'tipe_mobil' => $invoice->tipe_kendaraan,
                'jenis_service' => $invoice->nama_service,
                'dp' => rupiah($invoice->down_payment),
                'total' => rupiah($invoice->total_harga),
                'sisa' => rupiah($invoice->rest_bill),
            ];
        }

        $response = array(
            'status' => 'ok',
            'data' => $data['invoices'][0]
        );

        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }

    public function lihatkuitansi()
    {
        $idBooking = $this->input->post('idBooking');

        $this->db->select('*');
        $this->db->from('kuitansi');
        $this->db->join('invoice', 'invoice.no_invoice = kuitansi.no_invoice', 'left');
        $this->db->join('service', 'service.id_service = invoice.id_service', 'left');
        $this->db->where('id_booking', 1);
        $query = $this->db->get();
        $data['read'] = $query->result();

        $data['kwitansi'] = [];

        foreach ($data['read'] as $kwitansi) {
            $data['kwitansi'][] = [
                'no_invoice' => $kwitansi->no_invoice,
                'no_kwitansi' => $kwitansi->no_kuitansi,
                'nama_customer' => ucwords($kwitansi->nama_customer),
                'tanggal' => format_indo($kwitansi->tanggal),
                'tipe_mobil' => strtoupper($kwitansi->tipe_kendaraan),
                'jenis_service' => strtoupper($kwitansi->nama_service),
                'total' => rupiah($kwitansi->total_harga),
                'total_harga' => ucwords(convertToWords($kwitansi->total_harga))
            ];
        }

        $response = array(
            'status' => 'ok',
            'data' => $data['kwitansi'][0]
        );

        $this->output->set_content_type('application/json')->set_output(json_encode($response));
    }
}