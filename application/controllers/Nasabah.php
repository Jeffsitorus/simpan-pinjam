<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Nasabah extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $this->load->model('AppModel','app');
    if (!$this->session->userdata('username')) {
      $this->session->set_flashdata('error', 'Akses tidak diizinkan, Silahkan Login!');
      redirect('auth');
    }
    if ($this->session->userdata('id_nasabah')) {
      redirect('home');
    }
  }
  public function index()
  {
    $data['nasabah']  = $this->app->getNasabah();
    $data['user'] = $this->db->get_where('admin',['id' => $this->session->userdata('id')])->row_array();
    $this->load->view('nasabah/index', $data);
  }

  public function tambah()
  {
    $this->_rules();
    if($this->form_validation->run() == false) {
      $data['user'] = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();
      $this->load->view('nasabah/tambah-nasabah', $data);
    } else {
      $foto   = $_FILES['foto']['name'];
      if($foto){
        $config['upload_path']    = './assets/images/upload/';
        $config['allowed_types']  = 'jpg|png|jpeg';
        $config['max_size']       = '1024';
        $config['file_name']      = 'img_'. time();
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('foto')){
          $error = $this->upload->display_errors();
          $this->session->set_flashdata('error_upload', $error);
          $data['user'] = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();
          $this->load->view('nasabah/tambah-nasabah', $data);
        } else{
          $upload       = array('upload_data' => $this->upload->data());
          $nik          = htmlspecialchars($this->input->post('nik'));
          $nama         = htmlspecialchars($this->input->post('nama'));
          $username     = htmlspecialchars($this->input->post('username'));
          $no_telepon   = htmlspecialchars($this->input->post('no_telepon'));
          $alamat       = $this->input->post('alamat');
          $usia         = htmlspecialchars($this->input->post('usia'));
          $password     = md5($this->input->post('password'));
          $data   = [
            'nik'       => $nik,
            'nama'      => $nama,
            'username'  => $username,
            'password'  => $password,
            'telepon'   => $no_telepon,
            'alamat'    => $alamat,
            'foto'      => $upload['upload_dat']['file_name'],
            'usia'      => $usia,
          ];
          $this->app->insertNasabah($data);
          $this->session->set_flashdata('success','Data nasabah berhasil ditambahkan!');
          redirect('nasabah');
        }
      } else {
        $nik          = htmlspecialchars($this->input->post('nik'));
        $nama         = htmlspecialchars($this->input->post('nama'));
        $username     = htmlspecialchars($this->input->post('username'));
        $no_telepon   = htmlspecialchars($this->input->post('no_telepon'));
        $alamat       = $this->input->post('alamat');
        $usia         = htmlspecialchars($this->input->post('usia'));
        $password     = md5($this->input->post('password'));
        $data   = [
          'nik'       => $nik,
          'nama'      => $nama,
          'username'  => $username,
          'password'  => $password,
          'telepon'   => $no_telepon,
          'alamat'    => $alamat,
          'usia'      => $usia,
        ];
        $this->app->insertNasabah($data);
        $this->session->set_flashdata('success', 'Data nasabah berhasil ditambahkan!');
        redirect('nasabah');
      }
    }
  }

  public function edit($id)
  {
    $this->form_validation->set_rules('nik', 'NIK', 'trim|required', [
      'required'    => 'Nik tidak boleh kosong!',
    ]);
    $this->form_validation->set_rules('nama', 'nama', 'trim|required', [
      'required'    => 'Nama tidak boleh kosong!',
    ]);
    $this->form_validation->set_rules('username', 'username', 'trim|required', [
      'required'    => 'Username tidak boleh kosong!',
    ]);
    $this->form_validation->set_rules('no_telepon', 'telepon', 'trim|required|max_length[12]', [
      'required'    => 'No telepon harus diisi.',
    ]);
    $this->form_validation->set_rules('usia', 'usia', 'trim|required', [
      'required'    => 'Usia harus diisi.',
    ]);
    $this->form_validation->set_rules('alamat', 'alamat', 'trim|required', [
      'required'    => 'Alamat harus diisi.'
    ]);
    if ($this->form_validation->run() == false) {
      $data['nasabah']  = $this->app->getIdNasabah($id);
      $data['user'] = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();
      $this->load->view('nasabah/edit-nasabah', $data);
    } else {
      $foto   = $_FILES['foto']['name'];
      if ($foto) {
        $config['upload_path']    = './assets/images/upload/';
        $config['allowed_types']  = 'jpg|png|jpeg';
        $config['max_size']       = '1024';
        $config['file_name']      = 'img_' . time();
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('foto')) {
          $error = $this->upload->display_errors();
          $this->session->set_flashdata('error_upload', $error);
          $data['nasabah']  = $this->app->getIdNasabah($id);
          $data['user'] = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();
          $this->load->view('nasabah/edit-nasabah', $data);
        } else {
          $data['user'] = $this->db->get_where('admin', ['id' => $this->session->userdata('id')])->row_array();
          if($data['user']['foto'] != 'default.png') {
            unlink(FCPATH . './assets/images/upload/'. $data['user']['foto']);
          }
          $upload       = array('upload_data' => $this->upload->data());
          $nik          = htmlspecialchars($this->input->post('nik'));
          $nama         = htmlspecialchars($this->input->post('nama'));
          $username     = htmlspecialchars($this->input->post('username'));
          $no_telepon   = htmlspecialchars($this->input->post('no_telepon'));
          $alamat       = $this->input->post('alamat');
          $usia         = htmlspecialchars($this->input->post('usia'));
          $data   = [
            'nik'       => $nik,
            'nama'      => $nama,
            'username'  => $username,
            'telepon'   => $no_telepon,
            'alamat'    => $alamat,
            'foto'      => $upload['upload_data']['file_name'],
            'usia'      => $usia,
          ];
          $row  = ['id_nasabah' => $id];
          $this->app->updateNasabah($row,$data);
          $this->session->set_flashdata('success', 'Data nasabah berhasil diubah!');
          redirect('nasabah');
        }
      } else {
        $nik          = htmlspecialchars($this->input->post('nik'));
        $nama         = htmlspecialchars($this->input->post('nama'));
        $username     = htmlspecialchars($this->input->post('username'));
        $no_telepon   = htmlspecialchars($this->input->post('no_telepon'));
        $alamat       = $this->input->post('alamat');
        $usia         = htmlspecialchars($this->input->post('usia'));
        $password     = $this->input->post('password');
        $data   = [
          'nik'       => $nik,
          'nama'      => $nama,
          'username'  => $username,
          'telepon'   => $no_telepon,
          'alamat'    => $alamat,
          'usia'      => $usia,
        ];
        $row  = ['id_nasabah' => $id];
        $this->app->updateNasabah($row,$data);
        $this->session->set_flashdata('success', 'Data nasabah berhasil diubah!');
        redirect('nasabah');
      }
    }
  }

  public function delete()
  {
    $id   = $this->input->post('id_nasabah');
    $row  = ['id_nasabah' => $id];
    $this->app->deleteNasabah($row);
    $this->session->set_flashdata('success', 'Data nasabah berhasil dihapus!');
    redirect('nasabah');
  }

  public function _rules()
  {
    $this->form_validation->set_rules('nik', 'NIK', 'trim|required', [
      'required'    => 'Nik tidak boleh kosong!',
    ]);
    $this->form_validation->set_rules('nama', 'nama', 'trim|required', [
      'required'    => 'Nama tidak boleh kosong!',
    ]);
    $this->form_validation->set_rules('username', 'username', 'trim|required',[
      'required'    => 'Username tidak boleh kosong!',
    ]);
    $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[5]', [
      'required'    => 'Password tidak boleh kosong.',
      'min_length'  => 'Password minimal 5 karakter',
    ]);
    $this->form_validation->set_rules('password1', 'password', 'trim|required|matches[password]', [
      'required'    => 'Ulangi password tidak boleh kosong.',
      'matches'     => 'Password tidak sama!',
    ]);
    $this->form_validation->set_rules('no_telepon', 'telepon', 'trim|required|max_length[12]', [
      'required'    => 'No telepon harus diisi.',
    ]);
    $this->form_validation->set_rules('usia', 'usia', 'trim|required',[
      'required'    => 'Usia harus diisi.',
    ]);
    $this->form_validation->set_rules('alamat', 'alamat', 'trim|required', [
      'required'    => 'Alamat harus diisi.'
    ]);
  }
}