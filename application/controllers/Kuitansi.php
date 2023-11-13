<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kuitansi extends CI_Controller
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

        $data['allkuitansi'] = $this->db
            ->order_by('tanggal', 'DESC')
            ->get('kuitansi')
            ->result();

        $data['title'] = 'SIM Bengkel Garasinos | Kuitansi';
        // echo "Selamat Datang" . $data->nama;

        $this->load->view('templates/head', $data);
        $this->load->view('templates/navigation', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/kuitansi/kuitansi', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/script', $data);
    }
}
