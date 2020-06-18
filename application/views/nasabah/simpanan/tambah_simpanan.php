<?php $this->load->view('templates/head.php'); ?>
<div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
  <?php $this->load->view('templates/header_nasabah.php'); ?>
  <?php $this->load->view('templates/sidebar_nasabah.php'); ?>
  <div class="page-wrapper">
    <div class="page-breadcrumb">
      <div class="row">
        <div class="col-12 align-self-center">
          <a href="<?= site_url('simpanan'); ?>" class="btn btn-purple"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
        </div>
      </div>
      <div class="card mt-3">
        <div class="card-body">
          <div class="col-6 offset-3">
            <form action="<?= site_url('simpanan/tambah') ?>" method="post">
              <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" name="nama" id="nama" class="form-control" value="<?= $user['nama'] ?>" readonly>
              </div>
              <div class="form-group">
                <label for="tgl_setor">Tanggal Setor </label>
                <input type="text" name="tgl_setor" value="<?= date('Y-m-d'); ?>" id="tgl_setor" class="form-control" readonly>
                <?= form_error('tgl_setor', '<div class="text-danger small">', '</div>'); ?>
              </div>
              <div class="form-group">
                <label for="total">Nominal Simpanan</label>
                <input type="text" name="total" id="total" class="form-control" placeholder="Rp.0">
                <?= form_error('total', '<div class="text-danger small">', '</div>'); ?>
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