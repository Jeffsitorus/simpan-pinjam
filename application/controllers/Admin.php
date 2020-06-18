<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('AppModel','app');
    if(!$this->session->userdata('username')) {
      $this->session->set_flashdata('error','Akses tidak diizinkan, Silahkan Login!');
      redirect('auth');
    }
    if($this->session->userdata('id_nasabah')){
      redirect('home');
    }
  }

  public function index()
  {
    $data['qty']          = $this->app->getAllTotalPeminjaman();
    $data['totalNasabah'] = $this->app->getTotalNasabah();
    $data['subtotal']     = $this->app->getAllTotalSimpanan();
    $data['qtySimpanan']  = $this->app->getTotalSimpananMax();
    $data['qtyPinjaman']  = $this->app->getTotalPinjamanMax();
    $data['user']         =  $this->app->getUserdataAdmin();
    $this->load->view('admin/dashboard', $data);
  }

  public function simpanan()
  {
    $data['subtotal']     = $this->app->getAllTotalSimpanan();
    $data['user']     = $this->app->getUserdataAdmin();
    $data['simpanan'] = $this->app->getAllSimpanan();
    $this->load->view('admin/simpanan/index', $data);
  }

  public function peminjaman()
  {
    $data['user']       = $this->app->getUserdataAdmin();
    $data['peminjaman'] = $this->app->getAllPeminjaman();
    $data['qty']        = $this->app->getAllTotalPeminjaman();
    $this->load->view('admin/peminjaman/index', $data);
  }

  public function peminjaman_konfirmasi()
  {
    $id       = $this->input->post('id');
    $tgl_konfirmasi = date('Y-m-d');
    $data = [
      'status'          => 1,
      'tgl_konfirmasi'  => $tgl_konfirmasi,
    ];
    $this->db->set($data);
    $this->db->where('id', $id);
    $this->db->update('peminjaman');
    $this->session->set_flashdata('success', 'Peminjaman berhasil dikonfirmasi');
    redirect('admin/peminjaman', 'refresh');
  }

  public function simpanan_konfirmasi()
  {
    $id_simpanan    = $this->input->post('id_simpanan');
    $tgl_konfirmasi = date('Y-m-d');
    $data = [
      'status'          => 1,
      'tgl_konfirmasi'  => $tgl_konfirmasi,
    ];
    $this->db->set($data);
    $this->db->where('id_simpanan', $id_simpanan);
    $this->db->update('simpanan');
    $this->session->set_flashdata('success','Simpanan berhasil dikonfirmasi');
    redirect('admin/simpanan','refresh');
  }

  public function ubah_password() 
  { 
      $this->form_validation->set_rules('password', 'password', 'trim|required', [
        'required'    => 'Password lama tidak boleh kosong',
      ]);
      $this->form_validation->set_rules('password1', 'password baru', 'trim|required|min_length[4]|max_length[8]', [
        'required'    => 'Password lama tidak boleh kosong',
        'min_length'  => 'Minimal 4 karakter',
        'max_length'  => 'Maksimal 8 karakter',
      ]);
      $this->form_validation->set_rules('password2', 'ulangi password', 'trim|required|matches[password1]', [
        'required'    => 'Ulangi password tidak boleh kosong',
        'matches'     => 'Konfirmasi password tidak cocok.'
      ]);
      if ($this->form_validation->run() == false) {
        $data['user']   = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $this->load->view('admin/ubah_password', $data);
      } else {
        $data['user'] = $this->db->get_where('admin', ['username' => $this->session->userdata('username')])->row_array();
        $pass_lama    = md5($this->input->post('password', true));
        $pass_baru    = md5($this->input->post('password1', true));
        if ($data['user']['password'] != $pass_lama) {
          $this->session->set_flashdata('error', 'Password salah.');
          redirect('admin/ubah_password', 'refresh');
        } else {
          if ($pass_lama == $pass_baru) {
            $this->session->set_flashdata('error', 'Password baru tidak boleh sama dengan password lama.');
            redirect('admin/ubah_password', 'refresh');
          } else {
          $this->db->set('password', $pass_baru);
          $this->db->where('username', $this->session->userdata('username'));
          $this->db->update('admin');
          $this->session->set_flashdata('success', 'Password berhasil diubah.');
          redirect('admin/ubah_password', 'refresh');
        }
      }
    }
  }
}