<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('AuthModel','auth');
  }

  public function index()
  {
    if ($this->session->userdata('id_nasabah')) {
      redirect('home');
    } 
    if ($this->session->userdata('username')) {
      redirect('admin');
    }
    $this->form_validation->set_rules('username', 'username', 'trim|required', [
      'required'    => 'Username harus diisi!',
    ]);
    $this->form_validation->set_rules('password', 'password', 'trim|required', [
      'required'    => 'Password tidak boleh kosong!',
    ]);
    if ($this->form_validation->run() == false) {
      $this->load->view('auth/login');
    } else {
      $username   = $this->input->post('username');
      $password   = md5($this->input->post('password'));
      $user       = $this->auth->checkUser($username, $password);
      if ($user == true) {
        if ($user['password'] != $password) {
          $this->session->set_flashdata('error', 'Password yang dimasukkan salah!');
          redirect('auth', 'refresh');
        } else {
          $data  = [
            'id'        => $user['id'],
            'nama'      => $user['nama'],
            'username'  => $user['username'],
          ];
          $this->session->set_userdata($data);
          redirect('admin', 'refresh');
        }
      } else {
        $this->session->set_flashdata('error', 'Password yang dimasukkan salah!');
        redirect('auth', 'refresh');
      }
    }
  }

  public function register()
  {
    if ($this->session->userdata('id_nasabah')) {
      redirect('home');
    }
    if ($this->session->userdata('username')) {
      redirect('admin');
    }
    $this->form_validation->set_rules('nama', 'nama', 'trim|required', [
      'required'    => 'Nama tidak boleh kosong!',
    ]);
    $this->form_validation->set_rules('username', 'username', 'trim|required', [
      'required'    => 'Username tidak boleh kosong!',
    ]);
    $this->form_validation->set_rules('no_telepon', 'telepon', 'trim|required', [
      'required'    => 'No telepon tidak boleh kosong!',
    ]);
    $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[5]',[
      'required'    => 'Password tidak boleh kosong',
      'min_length'  => 'Password minimal 5 karakter',
    ]);
    $this->form_validation->set_rules('password1', 'konfirmasi password', 'trim|required|matches[password]', [
      'required'    => 'Konfirmasi password harus diisi!',
      'matches'     => 'Konfirmasi password tidak sama!',
    ]);
    if($this->form_validation->run() == false) {
      $this->load->view('auth/register');
    } else {
      $nama         = htmlspecialchars($this->input->post('nama'));
      $username     = htmlspecialchars($this->input->post('username'));
      $no_telepon   = htmlspecialchars($this->input->post('no_telepon'));
      $password     = md5($this->input->post('password'));
      $data   = [
        'nama'      => $nama,
        'username'  => $username,
        'password'  => $password,
        'telepon'   => $no_telepon,
      ];
      $this->auth->insertNasabah($data);
      $this->session->set_flashdata('success','Akun berhasil terdaftar silahkan login.!');
      redirect('auth/login');
    }
  }

  public function login()
  {
    if ($this->session->userdata('id_nasabah')) {
      redirect('home');
    } else if ($this->session->userdata('username')) {
      redirect('admin');
    }
    $this->form_validation->set_rules('username', 'username', 'trim|required', [
      'required'    => 'Username harus diisi!',
    ]);
    $this->form_validation->set_rules('password', 'password', 'trim|required', [
      'required'    => 'Password tidak boleh kosong!',
    ]);
    if($this->form_validation->run() == false){
      $this->load->view('auth/login_nasabah');
    } else {
      $username   = $this->input->post('username');
      $password   = md5($this->input->post('password'));
      $user       = $this->auth->checkNasabah($username, $password);
      if ($user == true) {
        if ($user['password'] != $password) {
          $this->session->set_flashdata('error', 'Password yang dimasukkan salah!');
          redirect('auth/login', 'refresh');
        } else {
          $data  = [
            'id_nasabah'=> $user['id_nasabah'],
            'nama'      => $user['nama'],
          ];
          $this->session->set_userdata($data);
          redirect('home', 'refresh');
        }
      } else {
        $this->session->set_flashdata('error', 'Password yang dimasukkan salah!');
        redirect('auth/login', 'refresh');
      }
    }
  }

  public function logout()
  {
    $this->session->sess_destroy();
    redirect('auth','refresh');
  }
}
/* End of file auth.php */
