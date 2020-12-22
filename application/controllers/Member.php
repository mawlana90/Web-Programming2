<?php
defined('BASEPATH') or exit('no direct script access allowed');

class Member extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //cek login
        if ($this->session->userdata('status') != "login" && $this->uri->segment(2) != 'registration' && $this->uri->segment(2) != 'save_anggota') {
            redirect(base_url() . 'welcome?pesan=belumlogin');
        }
    }

    function index()
    {
        $data['transaksi'] = $this->db->query("select * from transaksi order by id_pinjam desc limit 10")->result();
        $data['anggota'] = $this->db->query("select * from anggota order by id_anggota desc limit 10")->result();
        $data['buku'] = $this->db->query("select * from buku order by id_buku desc limit 10")->result();

        $this->load->view('member/header');
        $this->load->view('member/index', $data);
        $this->load->view('member/footer');
    }

    function buku()
    {
        $data['buku'] = $this->M_perpus->get_data('buku')->result();
        $this->load->view('member/header');
        $this->load->view('member/buku', $data);
        $this->load->view('member/footer');
    }


    function pinjam_buku($id)
    {
        $where = array('id_buku' => $id);
        $data['buku'] = $this->M_perpus->edit_data($where, 'buku')->row();
        $this->load->view('member/header');
        $this->load->view('member/pinjam_buku', $data);
        $this->load->view('member/footer');
    }

    function tambah_peminjaman()
    {
        $data['buku'] = $this->M_perpus->get_data('buku')->result();
        $this->load->view('member/header');
        $this->load->view('member/tambah_peminjaman', $data);
        $this->load->view('member/footer');
    }

    function tambah_peminjaman_act()
    {
        $tgl_pencatatan = date('Y-m-d H:i:s');
        $anggota = $this->session->userdata('id_agt');
        $buku = $this->input->post('id_buku');
        $tgl_pinjam = $this->input->post('tgl_pinjam');
        $tgl_kembali = $this->input->post('tgl_kembali');


        $this->form_validation->set_rules(
            'tgl_pinjam',
            'Tanggal Pinjam',
            'required'
        );
        $this->form_validation->set_rules(
            'tgl_kembali',
            'Tanggal Kembali',
            'required'
        );

        if ($this->form_validation->run() != false) {
            $data = array(
                'tgl_pencatatan' => $tgl_pencatatan,
                'id_anggota' => $anggota,
                'id_buku' => $buku,
                'tgl_pinjam' => $tgl_pinjam,
                'tgl_kembali' => $tgl_kembali,

                'tgl_pengembalian' => '0000-00-00',
                'total_denda' => '0',
                'status_pengembalian' => '0',
                'status_peminjaman' => '0'
            );
            $this->M_perpus->insert_data(
                'transaksi',
                $data
            );

            redirect(base_url() . 'member/transaksi');
        } else {
            $w = array('status_buku' => '1');
            $data['buku'] =
                $this->M_perpus->edit_data(
                    $w,
                    'buku'
                )->result();
            $this->load->view('member/header');
            $this->load->view(
                'member/tambah_peminjaman',
                $data
            );
            $this->load->view('member/footer');
        }
    }

    function transaksi()
    {
        $data['transaksi'] = $this->M_perpus->transaksi_peruser($this->session->userdata('id_agt'))->result();
        $this->load->view('member/header');
        $this->load->view('member/transaksi', $data);
        $this->load->view('member/footer');
    }
}
