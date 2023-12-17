<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Models', 'm');
        cekuser();
    }

    public function laporan_service()
    {
        $table = 'user';
        $where = array(
            'id_user'      =>   $this->session->userdata('id_user')
        );

        $data['user'] = $this->m->Get_Where($where, $table);

        $select = $this->db->select('*');
        $select = $this->db->join('mekanik', 'mekanik.id_mekanik = service.id_mekanik');
        $select = $this->db->where('status', 'Selesai');
        $data['read'] = $this->m->Get_All('service', $select);

        $data['title'] = 'SIM Bengkel Garasinos | Laporan Service';
        // echo "Selamat Datang" . $data->nama;

        $this->load->view('templates/head', $data);
        $this->load->view('templates/navigation', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/laporan/laporan-service', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/script', $data);
    }

    public function laporan_mekanik()
    {
        $table = 'user';
        $where = array(
            'id_user'      =>   $this->session->userdata('id_user')
        );

        $data['user'] = $this->m->Get_Where($where, $table);

        $select = $this->db->select('*');
        $data['read'] = $this->m->Get_All('mekanik', $select);

        $data['title'] = 'SIM Bengkel Garasinos | Laporan Mekanik';
        // echo "Selamat Datang" . $data->nama;


        $this->load->view('templates/head', $data);
        $this->load->view('templates/navigation', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/laporan/laporan-mekanik', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/script', $data);
    }

    public function laporan_pengeluaran()
    {
        $table = 'user';
        $where = array(
            'id_user'      =>   $this->session->userdata('id_user')
        );

        $data['user'] = $this->m->Get_Where($where, $table);

        $select = $this->db->select('*');
        $data['read'] = $this->m->Get_All('pengeluaran', $select);

        $data['title'] = 'SIM Bengkel Garasinos | Laporan Pengeluaran';
        // echo "Selamat Datang" . $data->nama;


        $this->load->view('templates/head', $data);
        $this->load->view('templates/navigation', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('pages/laporan/laporan-pengeluaran', $data);
        $this->load->view('templates/footer');
        $this->load->view('templates/script', $data);
    }
}