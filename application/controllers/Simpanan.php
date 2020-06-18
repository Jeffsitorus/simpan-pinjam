<?php

class Simpanan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('AppModel','app');
    if (!$this->session->userdata('id_nasabah')) {
      $this->session->set_flashdata('error', 'Akses tidak diizinkan, Silahkan Login!');
      redirect('auth/login');
    }
    if ($this->session->userdata('username')) {
      redirect('admin');
    }
  }

  public function index()
  {
    $id     = $this->session->userdata('id_nasabah');
    $data['user']   = $this->db->get_where('nasabah', ['id_nasabah' => $this->session->userdata('id_nasabah')])->row_array();
    $data['subtotal']  = $this->app->getTotalSimpanan($id);
    $data['simpanan']  = $this->app->getSimpananNasabah($id);
    $this->load->view('nasabah/simpanan/index', $data);
  }

  public function tambah()
  {
    $this->form_validation->set_rules('tgl_setor', 'Tanggal', 'trim|required', [
      'required'    => 'Tanggal tidak boleh dikosongkan!',
    ]);
    $this->form_validation->set_rules('total', 'Total', 'trim|required|numeric',[
      'required'    => 'Total nominal harus diisi!',
      'numeric'     => 'Hanya berupa digit angka!',
    ]);
    if($this->form_validation->run() == false) {
      $data['user']   = $this->db->get_where('nasabah', ['id_nasabah' => $this->session->userdata('id_nasabah')])->row_array();
      $this->load->view('nasabah/simpanan/tambah_simpanan', $data);
    } else {
      $total      = $this->input->post('total');
      $tgl_setor  = $this->input->post('tgl_setor');
      $data       = [
        'tgl_setor' => $tgl_setor,
        'total'     => $total,
        'nasabah_id'=> $this->session->userdata('id_nasabah'),
      ];
      $this->app->insertSimpanan($data);
      $this->session->set_flashdata('success','Data simpanan berhasil ditambah');
      redirect('simpanan','refresh');
    }
  }

  public function edit($id)
  {
    $this->form_validation->set_rules('tgl_setor', 'Tanggal', 'trim|required', [
      'required'    => 'Tanggal tidak boleh dikosongkan!',
    ]);
    $this->form_validation->set_rules('total', 'Total', 'trim|required|numeric',[
      'required'    => 'Total nominal harus diisi!',
      'numeric'     => 'Hanya berupa digit angka!',
    ]);
    if($this->form_validation->run() == false) {
      $data['simpanan'] = $this->app->getIdSimpanan($id);
      $data['user']   = $this->db->get_where('nasabah', ['id_nasabah' => $this->session->userdata('id_nasabah')])->row_array();
      $this->load->view('nasabah/simpanan/edit_simpanan', $data);
    } else {
      $total      = $this->input->post('total');
      $tgl_setor  = $this->input->post('tgl_setor');
      $data       = [
        'tgl_setor' => $tgl_setor,
        'total'     => $total,
        'nasabah_id'=> $this->session->userdata('id_nasabah'),
      ];
      $row = ['id_simpanan' => $id];
      $this->app->updateSimpanan($row,$data);
      $this->session->set_flashdata('success','Data simpanan berhasil diubah');
      redirect('simpanan','refresh');
    }
  }

  public function delete()
  {
    $id   = $this->input->post('id_simpanan');
    $this->app->deleteSimpanan($id);
    $this->session->set_flashdata('success', 'Data simpanan berhasil ditambah');
    redirect('simpanan', 'refresh');
  } 
}