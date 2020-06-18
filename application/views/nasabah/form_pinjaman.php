<?php $this->load->view('templates/head.php'); ?>
<div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
  <?php $this->load->view('templates/header_nasabah.php'); ?>
  <?php $this->load->view('templates/sidebar_nasabah.php'); ?>
  <div class="page-wrapper">
    <div class="page-breadcrumb">
      <div class="row">
        <div class="col-12 align-self-center">
          <a href="<?= site_url('peminjaman'); ?>" class="btn btn-purple"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
          <?php if (!empty($this->session->flashdata('success'))) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
              </button>
              <?= $this->session->flashdata('success'); ?>
            </div>
          <?php endif; ?>
        </div>
      </div>
      <div class="card mt-3">
        <div class="card-body">
          <div class="col-6 offset-3">
            <form action="<?= site_url('peminjaman/tambah') ?>" method="post">
              <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" name="nama" id="nama" class="form-control" value="<?= $user['nama'] ?>" readonly>
              </div>
              <div class="form-group">
                <label for="tgl_pinjam">Tanggal Peminjaman </label>
                <input type="text" name="tgl_pinjam" value="<?= date('Y-m-d'); ?>" id="tgl_pinjam" class="form-control" readonly>
                <?= form_error('tgl_pinjam', '<div class="text-danger small">', '</div>'); ?>
              </div>
              <div class="form-group">
                <label for="nominal">Nominal Pinjam</label>
                <input type="text" name="nominal" id="nominal" class="form-control" placeholder="Rp.0">
                <?= form_error('nominal', '<div class="text-danger small">', '</div>'); ?>
              </div>
              <div class="form-group">
                <label for="durasi">Jangka Waktu</label>
                <input type="text" name="durasi" id="durasi" class="form-control" placeholder="Misal : 3 bulan, 9 atau 12 bulan">
                <?= form_error('durasi', '<div class="text-danger small">', '</div>'); ?>
              </div>
              <div class="form-group">
                <label for="bunga_pinjam">Bunga Pinjaman</label>
                <input type="text" name="bunga_pinjam" id="bunga_pinjam" class="form-control" placeholder="Rp.0" readonly>
                <?= form_error('bunga_pinjam', '<div class="text-danger small">', '</div>'); ?>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-purple">Simpan</button>
                <button type="reset" class="btn btn-danger">Batal</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php $this->load->view('templates/footer.php'); ?>
  </div>
</div>
<?php $this->load->view('templates/js.php'); ?>

<script>
  $(document).ready(function() {
    $('#durasi').keyup(function() {
      let nominal = parseInt($('#nominal').val());
      let durasi = parseInt($('#durasi').val());
      let bunga_pinjam = nominal * (0.025);
      let totalBunga   = bunga_pinjam * durasi;
      $('#bunga_pinjam').val(totalBunga);
    });
  });
</script>