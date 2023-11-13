<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Invoice extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Models', 'm');
        cekuser();
    }

    public function index()
    {
        $data['user'] = $this->m->Get_Where(['id_user' => $this->session->userdata('id_user')], 'user');

        $data['allinvoice'] = $this->db
            // ->join('tipe_service', 'tipe_service.id_tipe_service = invoice.id_service')
            ->order_by('tanggal', 'DESC')
            ->get('invoice')
            ->result();
        $data['unpaidinvoice'] = $this->db
            ->order_by('tanggal', 'DESC')
            ->get_where('invoice', ['invoice.status' => 'unpaid'])
            ->result();

        $data['title'] = 'SIM Bengkel Garasinos | Invoice';
        // echo "Selamat Datang" . $data->nama;

        $this->load->view('templates/head', $data);
        $this->load->view('templates/navigation', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/invoice/invoice', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/script', $data);
    }

    public function invoice($id_invoice)
    {
        $data['user'] = $this->m->Get_Where(['id_user' => $this->session->userdata('id_user')], 'user');

        $invoice = $this->db->select('invoice.nama_customer, nama_service, invoice.total_harga')
            ->join('tipe_service', 'tipe_service.id_tipe_service = invoice.id_service')
            ->get_where('invoice', ['id_invoice' => $id_invoice])->row();

        $now = date('d/m/Y');
        $no_kuitansi = "KWT" . mt_rand(1000, 9999) . $now;
        $data_kuitansi = [
            'no_kuitansi' => $no_kuitansi,
            'id_invoice' => $id_invoice,
            'nama_customer' => $invoice->nama_customer,
            'nama_service' => $invoice->nama_service,
            'total_harga' => $invoice->total_harga
        ];

        $this->db->update('invoice', ['status' => 'paid'], ['id_invoice' => $id_invoice]);
        $result1 = $this->db->affected_rows();
        $this->db->insert('kuitansi', $data_kuitansi);
        $result2 = $this->db->affected_rows();

        if ($result1 && $result2) {
            $this->session->set_flashdata('success', 'Invoice Telah Dibayar');
            return redirect('invoice');
        } else {
            $this->session->set_flashdata('error', 'Invoice Gagal Dikonfirmasi');
            return redirect('invoice');
        }
    }
}
