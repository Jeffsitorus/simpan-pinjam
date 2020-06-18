<?php if(!defined('BASEPATH'))exit('No direct script access allowed');

class Home extends CI_Controller
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
    $data['qty']       = $this->app->getTotalPinjamanNasabah($id);
    $data['subtotal']  = $this->app->getTotalSimpanan($id);
    $data['user']      = $this->db->get_where('nasabah', ['id_nasabah' => $this->session->userdata('id_nasabah')])->row_array();
    $this->load->view('welcome', $data);
  }

  public function lengkapi_data()
  {
    $this->form_validation->set_rules('nik', 'NIK', 'trim|required|min_length[16]|max_length[16]|numeric',[
      'required'    => 'NIK harus diisi',
      'max_length'  => 'NIK maksimal 16 digit angka!',
      'min_length'  => 'NIK minimal 16 digit angka',
      'numeric'     => 'NIK hanya berupa digit angka',
    ]);
    $this->form_validation->set_rules('nama', 'Nama', 'trim|required',[
      'required'    => 'Nama lengkap harus diisi',
    ]);
    $this->form_validation->set_rules('alamat', 'alamat', 'trim|required',[
      'required'    => 'Alamat lengkap harus diisi',
    ]);
    $this->form_validation->set_rules('no_telepon', 'no_telepon', 'trim|required|max_length[12]|numeric', [
      'required'    => 'No telepon tidak boleh kosong',
      'numeric'     => 'No telepon hanya berupa digit angka',
    ]);
    $this->form_validation->set_rules('usia', 'Usia', 'trim|required|numeric',[
      'required'    => 'Usia tidak boleh kosong',
      'numeric'     => 'Hanya berupa digit angka',
    ]);
    if($this->form_validation->run() == false) {
      $data['user'] = $this->db->get_where('nasabah', ['id_nasabah' => $this->session->userdata('id_nasabah')])->row_array();
      $this->load->view('nasabah/lengkapi_data', $data);
    } else {
      if($_FILES['upload_ktp']['name']) {
        $data['user'] = $this->db->get_where('nasabah', ['id_nasabah' => $this->session->userdata('id_nasabah')])->row_array();
        $config['upload_path']    = './assets/images/upload/';
        $config['allowed_types']  = 'jpg|png|pdf|jpeg';
        $config['max_size']       = '1024';
        $config['file_name']      = 'ktp_' . $data['user']['nama'];
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('upload_ktp')) {
          $error = $this->upload->display_errors();
          $this->session->set_flashdata('error_upload', $error);
          $data['user'] = $this->db->get_where('nasabah', ['id_nasabah' => $this->session->userdata('id_nasabah')])->row_array();
          $this->load->view('nasabah/lengkapi_data', $data);
        } else {
          $upload     = array('upload_data' => $this->upload->data());
          $nama       = htmlspecialchars($this->input->post('nama'));
          $nik        = htmlspecialchars($this->input->post('nik'));
          $no_telepon = htmlspecialchars($this->input->post('no_telepon'));
          $alamat     = htmlspecialchars($this->input->post('alamat'));
          $usia       = htmlspecialchars($this->input->post('usia'));
          $data   = [
            'nik'         => $nik,
            'nama'        => $nama,
            'telepon'     => $no_telepon,
            'alamat'      => $alamat,
            'usia'        => $usia,
            'upload_ktp'  => $upload['upload_data']['file_name'],
          ];
          $this->db->set($data);
          $this->db->where('id_nasabah', $this->session->userdata('id_nasabah'));
          $this->db->update('nasabah');
          $this->session->set_flashdata('success','Data berhasil dilengkapi, lakukan pinjaman sekarang juga.');
          redirect('peminjaman/tambah');
        }
      } else {
        $this->session->set_flashdata('error', 'Harus mengunggah foto KTP.');
        redirect('home/lengkapi_data');
      }
    }
  }

  public function edit_profil()
  {
    $this->form_validation->set_rules('nik', 'NIK', 'trim|required|min_length[16]|max_length[16]|numeric', [
      'required'    => 'NIK harus diisi',
      'max_length'  => 'NIK maksimal 16 digit angka!',
      'min_length'  => 'NIK minimal 16 digit angka',
      'numeric'     => 'NIK hanya berupa digit angka',
    ]);
    $this->form_validation->set_rules('nama', 'Nama', 'trim|required', [
      'required'    => 'Nama lengkap harus diisi',
    ]);
    $this->form_validation->set_rules('alamat', 'alamat', 'trim|required', [
      'required'    => 'Alamat lengkap harus diisi',
    ]);
    $this->form_validation->set_rules('no_telepon', 'no_telepon', 'trim|required|max_length[12]|numeric', [
      'required'    => 'No telepon tidak boleh kosong',
      'numeric'     => 'No telepon hanya berupa digit angka',
    ]);
    $this->form_validation->set_rules('usia', 'Usia', 'trim|required|numeric', [
      'required'    => 'Usia tidak boleh kosong',
      'numeric'     => 'Hanya berupa digit angka',
    ]);
    if($this->form_validation->run() == false) {
      $data['user']  = $this->db->get_where('nasabah', ['id_nasabah' => $this->session->userdata('id_nasabah')])->row_array();
      $this->load->view('nasabah/edit_profil', $data);
    } else {
      if($_FILES['foto']['name']) {
        $config['upload_path']    = './assets/images/upload/';
        $config['allowed_types']  = 'gif|jpg|png|jpeg';
        $config['max_size']       = '1024';
        $config['file_name']      = 'img_' . time();
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('foto')){
          $error = $this->upload->display_errors();
          $this->session->set_flashdata('error_upload', $error);
          $data['user']  = $this->db->get_where('nasabah', ['id_nasabah' => $this->session->userdata('id_nasabah')])->row_array();
          $this->load->view('nasabah/edit_profil', $data);
        } else {
          $upload     = array('upload_data' => $this->upload->data());
          $nik        = trim($this->input->post('nik'));
          $nama       = htmlspecialchars($this->input->post('nama'));
          $username   = htmlspecialchars($this->input->post('username'));
          $no_telepon = htmlspecialchars($this->input->post('no_telepon'));
          $alamat     = trim($this->input->post('alamat'));
          $usia       = trim($this->input->post('usia'));
          $data   = [
              'nik'       => $nik,
              'nama'      => $nama,
              'username'  => $username,
              'telepon'   => $no_telepon,
              'alamat'    => $alamat,
              'foto'      => $upload['upload_data']['file_name'],
              'usia'      => $usia,
            ];
          $this->db->set($data);
          $this->db->where('id_nasabah', $this->session->userdata('id_nasabah'));
          $this->db->update('nasabah');
          $this->session->set_flashdata('success', 'Profil berhasil diupdate');
          redirect('home');
        }
      } else {
        $nik        = trim($this->input->post('nik'));
        $nama       = htmlspecialchars($this->input->post('nama'));
        $username   = htmlspecialchars($this->input->post('username'));
        $no_telepon = htmlspecialchars($this->input->post('no_telepon'));
        $alamat     = trim($this->input->post('alamat'));
        $usia       = trim($this->input->post('usia'));
        $data   = [
          'nik'       => $nik,
          'nama'      => $nama,
          'username'  => $username,
          'telepon'   => $no_telepon,
          'alamat'    => $alamat,
          'usia'      => $usia,
        ];
        $this->db->set($data);
        $this->db->where('id_nasabah', $this->session->userdata('id_nasabah'));
        $this->db->update('nasabah');
        $this->session->set_flashdata('success', 'Profil berhasil diupdate');
        redirect('home');
      }
    }
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
      $data['user']   = $this->db->get_where('nasabah', ['id_nasabah' => $this->session->userdata('id_nasabah')])->row_array();
      $this->load->view('nasabah/ubah_password', $data);
    } else {
      $data['user'] = $this->db->get_where('nasabah', ['id_nasabah' => $this->session->userdata('id_nasabah')])->row_array();
      $pass_lama    = md5($this->input->post('password', true));
      $pass_baru    = md5($this->input->post('password1', true));
      if ($data['user']['password'] != $pass_lama) {
        $this->session->set_flashdata('error', 'Password salah.');
        redirect('home/ubah_password', 'refresh');
      } else {
        if ($pass_lama == $pass_baru) {
          $this->session->set_flashdata('error', 'Password baru tidak boleh sama dengan password lama.');
          redirect('home/ubah_password', 'refresh');
        } else {
          $this->db->set('password', $pass_baru);
          $this->db->where('id_nasabah', $this->session->userdata('id_nasabah'));
          $this->db->update('nasabah');
          $this->session->set_flashdata('success', 'Password berhasil diubah.');
          redirect('home/ubah_password', 'refresh');
        }
      }
    }
  }
}