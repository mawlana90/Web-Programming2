<?php
defined('BASEPATH') or exit('no direct script access allowed');

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //cek login
        if ($this->session->userdata('status') != "login") {
            redirect(base_url() . 'welcome?pesan=belumlogin');
        }
    }

    function index()
    {
        $data['transaksi'] = $this->db->query("select * from transaksi order by id_pinjam desc limit 10")->result();
        $data['anggota'] = $this->db->query("select * from anggota order by id_anggota desc limit 10")->result();
        $data['buku'] = $this->db->query("select * from buku order by id_buku desc limit 10")->result();

        $this->load->view('admin/header');
        $this->load->view('admin/index', $data);
        $this->load->view('admin/footer');
    }

    function logout()
    {
        $this->sesion->sess_destroy();
        redirect(base_url() . 'welcome?pesan=logout');
    }
    function ganti_password()
    {
        $this->load->view('admin/header');
        $this->load->view('admin/ganti_password');
        $this->load->view('admin/footer');
    }

    function ganti_password_act()
    {
        $pass_baru = $this->input->post('pass_baru');
        $ulang_pass = $this->input->post('ulang_pass');

        $this->form_validation->set_rules('pass_baru', 'Password Baru', 'required|matches[ulang_pass]');
        $this->form_validation->set_rules('ulang_pass', 'Ulangi Password Baru', 'required');
        if ($this->form_validation->run() != false) {
            $data = array('password' => md5($pass_baru));
            $w = array('id_admin' => $this->session->userdata('id'));
            $this->M_perpus->update_data($w, $data, 'admin');
            redirect(base_url() . 'admin/ganti_password?pesan=berhasil');
        } else {
            $this->load->view('admin/header');
            $this->load->view('admin/ganti_password');
            $this->load->view('admin/footer');
        }
    }
    function buku()
    {
        $data['buku'] = $this->M_perpus->get_data('buku')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/buku', $data);
        $this->load->view('admin/footer');
    }

    function tambah_buku()
    {
        $data['kategori'] = $this->M_perpus->get_data('kategori')->result();
        $this->load->view('admin/header');
        $this->load->view('admin/tambahbuku', $data);
        $this->load->view('admin/footer');
    }

    function tambah_buku_act()
    {
        $tgl_input = date('Y-m-d');
        $id_kategori = $this->input->post('id_kategori', true);
        $judul = $this->input->post('judul_buku', true);
        $pengarang = $this->input->post('pengarang', true);
        $penerbit = $this->input->post('penerbit', true);
        $thn_terbit = $this->input->post('thn_terbit', true);
        $isbn = $this->input->post('isbn', true);
        $jumlah_buku = $this->input->post('jumlah_buku', true);
        $lokasi = $this->input->post('lokasi', true);
        $status = $this->input->post('status', true);
        $this->form_validation->set_rules('id_kategori', 'Kategori', 'required');
        $this->form_validation->set_rules('judul_buku', 'Judul Buku', 'required');
        $this->form_validation->set_rules('status', 'Status Buku', 'required');
        if ($this->form_validation->run() != false) {
            $config['upload_path'] = './assets/upload/';
            $config['allowed_types'] = '*';
            $config['max_size'] = '2048';
            $config['file_name'] = 'gambar' . time();
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('foto')) {
                $image = $this->upload->data();
                $data = array(
                    'id_kategori' => $id_kategori,
                    'judul_buku' => $judul,
                    'pengarang' => $pengarang,
                    'penerbit' => $penerbit,
                    'thn_terbit' => $thn_terbit, 'isbn' => $isbn,
                    'jumlah_buku' => $jumlah_buku,
                    'lokasi' => $lokasi,
                    'gambar' => $image['file_name'],
                    'tgl_input' => $tgl_input,
                    'status_buku' => $status
                );
                $this->M_perpus->insert_data('buku', $data);
                redirect(base_url() . 'admin/buku');
            } else {
                echo "gagal upload gambar";
            }
            echo validation_errors();
        } else {
            echo validation_errors();
            $data['kategori'] = $this->M_perpus->get_data('kategori')->result();
            $this->load->view('admin/header');
            $this->load->view('admin/tambahbuku', $data);
            $this->load->view('admin/footer');
        }
    }
    function hapus_buku($id)
    {
        $where = array('id_buku' => $id);
        $this->M_perpus->delete_data($where, 'buku');
        redirect(base_url() . 'admin/buku');
    }
}
