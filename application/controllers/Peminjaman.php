<?php

class Peminjaman extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('AppModel','app');
    if (!$this->session->userdata('id_nasabah')) {
      $this->session->set_flashdata('error', 'Akses tidak diizinkan, Silahkan Login!');
      redirect('auth/login');
    }
    if($this->session->userdata('username')) {
      redirect('admin');
    }
  }

  public function index()
  {
    $data['user']         = $this->db->get_where('nasabah', ['id_nasabah' => $this->session->userdata('id_nasabah')])->row_array();
    $id       = $this->session->userdata('id_nasabah');
    $data['subtotal']     = $this->app->getTotalPinjamanNasabah($id);
    $data['peminjaman']   = $this->app->getPinjamanNasabah($id);
    $this->load->view('nasabah/pinjaman', $data);
  }

  public function tambah()
  {
    $this->form_validation->set_rules('nominal', 'nominal', 'trim|required|numeric',[
      'required'    => 'Nominal harus diisi',
      'numeric'     => 'Nominal hanya berupa digit angka'
    ]);
    $this->form_validation->set_rules('tgl_pinjam', 'Tanggal pinjam', 'trim|required',[
      'required'    => 'Tanggal pinjam harus diisi',
    ]);
    $this->form_validation->set_rules('durasi', 'Durasi', 'trim|required|numeric',[
      'required'    => 'Jangka waktu harus diisi',
      'numeric'     => 'Masukkan digit angka',
    ]);
    if($this->form_validation->run() == false) {
      $data['user']         = $this->db->get_where('nasabah', ['id_nasabah' => $this->session->userdata('id_nasabah')])->row_array();
      $this->load->view('nasabah/form_pinjaman', $data);
    } else {
      $id_nasabah   = $this->session->userdata('id_nasabah');
      $tgl_pinjam   = $this->input->post('tgl_pinjam');
      $nominal      = $this->input->post('nominal');
      $durasi       = $this->input->post('durasi');
      $bunga_pinjam = $this->input->post('bunga_pinjam');
      $data   = [
        'tgl_pinjam'  => $tgl_pinjam,
        'nominal'     => $nominal,
        'nasabah_id'  => $id_nasabah,
        'durasi'      => $durasi,
        'bunga_pinjam'=> $bunga_pinjam,
        'status'      => 0,
      ];
      $this->app->insertPinjaman($data);
      $this->session->set_flashdata('success','Data pinjaman berhasil dibuat! Silahkan menunggu konfirmasi');
      redirect('peminjaman');
    }
  }

  public function edit($id)
  {
    $this->form_validation->set_rules('nominal', 'nominal', 'trim|required|numeric',[
      'required'    => 'Nominal harus diisi',
      'numeric'     => 'Nominal hanya berupa digit angka'
    ]);
    $this->form_validation->set_rules('tgl_pinjam', 'Tanggal pinjam', 'trim|required',[
      'required'    => 'Tanggal pinjam harus diisi',
    ]);
    $this->form_validation->set_rules('durasi', 'Durasi', 'trim|required|numeric',[
      'required'    => 'Jangka waktu harus diisi',
      'numeric'     => 'Masukkan digit angka',
    ]);

    if($this->form_validation->run() == false) {
      $data['peminjaman']   = $this->app->getIdPeminjaman($id);
      $data['user']         = $this->db->get_where('nasabah', ['id_nasabah' => $this->session->userdata('id_nasabah')])->row_array();
      $this->load->view('nasabah/edit_pinjaman', $data);
    } else {
      $id_nasabah   = $this->session->userdata('id_nasabah');
      $tgl_pinjam   = $this->input->post('tgl_pinjam');
      $nominal      = $this->input->post('nominal');
      $durasi       = $this->input->post('durasi');
      $bunga_pinjam = $this->input->post('bunga_pinjam');
      $data   = [
        'tgl_pinjam'  => $tgl_pinjam,
        'nominal'     => $nominal,
        'nasabah_id'  => $id_nasabah,
        'durasi'      => $durasi,
        'bunga_pinjam'=> $bunga_pinjam,
        'status'      => 0,
      ];
      $row = ['id' => $id];
      $this->app->updatePinjaman($row, $data);
      $this->session->set_flashdata('success','Data pinjaman berhasil diubah! Silahkan menunggu konfirmasi');
      redirect('peminjaman');
    }
  }

  public function delete()
  {
    $id   = $this->input->post('id');
    $row  = ['id' => $id];
    $this->app->deletePinjaman($row);
    $this->session->set_flashdata('success', 'Pinjaman berhasil dibatalkan!');
    redirect('peminjaman');
  }
}