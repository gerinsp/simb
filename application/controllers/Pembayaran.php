<?php

class Pembayaran extends CI_Controller
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

        $select = $this->db->select('*');
        $select = $this->db->join('invoice', 'invoice.id_service = service.id_service');
        $select = $this->db->where('invoice.status', 'paid');
        $select = $this->db->where('service.status', 'Selesai');
        $data['pembayaran'] = $this->m->Get_All('service', $select);

        $data['title'] = 'SIM Bengkel Garasinos | List Data Pembayaran';

        $this->load->view('templates/head', $data);
        $this->load->view('templates/navigation', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/pembayaran/pembayaran', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/script', $data);
    }
}