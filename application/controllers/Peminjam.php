<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Peminjam extends CI_Controller {

    public function construct() { 
        parent::construct();
        $this->load->helper('pustaka_helper');
        cek_login();

 
    }

    public function peminjam()
    {
        $data['judul'] = 'Data Peminjam';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['peminjam']=$this->ModelPeminjam->getPeminjam()->result_array();
        $data['buku'] = $this->ModelBuku->getBuku()->result_array();
        $this->form_validation->set_rules('nama_peminjam', 'Nama Peminjam', 'required|min_length[3]', [ 'required' => 'Nama Peminjam harus diisi', 'min_length' => 'Nama terlalu pendek' ]); 
        $this->form_validation->set_rules('judul_buku', 'Judul Buku','required' , [ 'required' => 'Judul Buku  harus diisi' ]);
        $this->form_validation->set_rules('tanggal_pinjam', 'Tanggal Pinjam', 'required|min_length[3]', [ 'required' => 'tanggal pinjam harus diisi']); 
        $this->form_validation->set_rules('tanggal_kembali', 'Tanggal Kembali', 'required|min_length[3]', [ 'required' => 'Tanggal Kembali harus diisi']); 
        $this->form_validation->set_rules('tanggal_dikembalikan', 'Tanggal DiKembalikan', 'required|min_length[3]', [ 'required' => 'Tanggal Dikembalikan harus diisi']);
        $this->form_validation->set_rules('total_denda', 'Total Denda','required'); 
        $this->form_validation->set_rules('status', 'Status','required'); 
        if ($this->form_validation->run()==false)
        {
            $this->load->view('admin/header', $data);
            $this->load->view('admin/sidebar', $data);
            $this->load->view('admin/topbar', $data);
            $this->load->view('peminjam/index', $data);
            $this->load->view('admin/footer');
        }
        else
        {
            $data = [ 
                'nama_peminjam' => $this->input->post('nama_peminjam', true), 
                'judul_buku' => $this->input->post('judul_buku', true), 
                'tanggal_pinjam' => $this->input->post('tanggal_pinjam', true), 
                'tanggal_kembali' => $this->input->post('tanggal_kembali', true), 
                'tanggal_dikembalikan' => $this->input->post('tanggal_dikembalikan', true), 
                'total_denda' => $this->input->post('total_denda', true), 
                'status' => $this->input->post('status', true), 
            ]; 
            $this->ModelPeminjam->simpanPeminjam($data); 
            $this->session->set_flashdata('pesan', 'Ditambah');
            redirect('Peminjam/peminjam/', 'refresh'); 
        }
    }

    public function ubahPeminjam()
    {
        
        $data['judul'] = 'Ubah Data Peminjam';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['peminjam'] = $this->ModelPeminjam->peminjamWhere(['id_peminjam' => $this->uri->segment(3)])->result_array();
        $data['buku'] = $this->ModelBuku->getBuku()->result_array();
    
        $this->form_validation->set_rules('nama_peminjam', 'Nama Peminjam', 'required|min_length[3]', [ 'required' => 'Nama Peminjam harus diisi', 'min_length' => 'Nama terlalu pendek' ]); 
        $this->form_validation->set_rules('judul_buku', 'Judul Buku'); 
        $this->form_validation->set_rules('tanggal_pinjam', 'Tanggal Pinjam', 'required|min_length[3]', [ 'required' => 'tanggal pinjam harus diisi']); 
        $this->form_validation->set_rules('tanggal_kembali', 'Tanggal Kembali', 'required|min_length[3]', [ 'required' => 'Tanggal Kembali harus diisi']); 
        $this->form_validation->set_rules('tanggal_dikembalikan', 'Tanggal DiKembalikan', 'required|min_length[3]', [ 'required' => 'Tanggal Dikembalikan harus diisi']);
        $this->form_validation->set_rules('total_denda', 'Total Denda','required'); 
        $this->form_validation->set_rules('status', 'Status','required'); 
        
    if ($this->form_validation->run()==false) {
        $this->load->view('admin/header', $data); 
        $this->load->view('admin/sidebar', $data); 
        $this->load->view('admin/topbar', $data); 
        $this->load->view('peminjam/ubah_peminjam', $data); 
        $this->load->view('admin/footer'); 
    } else {
        $data = [ 
            'nama_peminjam' => $this->input->post('nama_peminjam', true), 
            'judul_buku' => $this->input->post('judul_buku', true), 
            'tanggal_pinjam' => $this->input->post('tanggal_pinjam', true), 
            'tanggal_kembali' => $this->input->post('tanggal_kembali', true), 
            'tanggal_dikembalikan' => $this->input->post('tanggal_dikembalikan', true), 
            'total_denda' => $this->input->post('total_denda', true), 
            'status' => $this->input->post('status', true), 
        ]; 

            $this->ModelPeminjam->updatePeminjam($data, ['id_peminjam' => $this->input->post('id_peminjam')]);
            $this->session->set_flashdata('pesan', 'Diubah');
            redirect('Peminjam/peminjam/', 'refresh');
        }
    }

    public function hapusPeminjam()
    {
        $where = ['id_peminjam' => $this->uri->segment(3)];
        $this->ModelPeminjam->hapusPeminjam($where);
        $this->session->set_flashdata('pesan', 'Dihapus');
        redirect('Peminjam/peminjam/', 'refresh');
    }


}

