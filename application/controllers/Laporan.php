<?php 


class Laporan extends CI_Controller
{
  public function __construct()
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

  public function data_nasabah()
  {
    $data['nasabah']  = $this->app->getDataNasabah();
    $data['user']     = $this->app->getUserdataAdmin();
    $this->load->view('admin/laporan/data-nasabah', $data);
  }

  public function cetak_nasabah()
  {
    $data['nasabah']    = $this->app->getNasabah();
    $this->load->view('admin/laporan/cetak_nasabah', $data);
    $this->load->library('dompdf_gen');
    $html         = $this->output->get_output();
    $paper_size   = 'A4';
    $orientation  = 'Potrait';
    $this->dompdf->set_paper($paper_size, $orientation);
    $this->dompdf->load_html($html);
    $this->dompdf->render();
    $this->dompdf->stream("data-nasabah.pdf", array("Attachment" => 0));
  }

  public function cetak_pinjaman()
  {
    $data['peminjaman']    = $this->app->getAllPeminjamanSelesai();
    $this->load->view('admin/laporan/cetak_pinjaman', $data);
    $this->load->library('dompdf_gen');
    $html         = $this->output->get_output();
    $paper_size   = 'A4';
    $orientation  = 'Landscape';
    $this->dompdf->set_paper($paper_size, $orientation);
    $this->dompdf->load_html($html);
    $this->dompdf->render();
    $this->dompdf->stream("data-pinjaman.pdf", array("Attachment" => 0));
  }

  public function data_pinjaman()
  {
    $data['qty']         = $this->app->getAllTotalPeminjaman();
    $data['peminjaman']  = $this->app->getAllPeminjamanSelesai();
    $data['user']        = $this->app->getUserdataAdmin();
    $this->load->view('admin/laporan/data-pinjaman', $data);
  }
}