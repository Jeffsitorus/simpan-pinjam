<?php $this->load->view('templates/head.php'); ?>
<div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
  <?php $this->load->view('templates/header_nasabah.php'); ?>
  <?php $this->load->view('templates/sidebar_nasabah.php'); ?>
  <div class="page-wrapper">
    <div class="page-breadcrumb">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <a href="<?= site_url('home'); ?>" class="btn btn-info mb-3"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
            <?php if (!empty($this->session->flashdata('error'))) : ?>
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  <span class="sr-only">Close</span>
                </button>
                <?= $this->session->flashdata('error'); ?>
              </div>
            <?php endif; ?>
            <div class="card">
              <div class="card-body">
                <form action="<?= site_url('home/lengkapi_data'); ?>" method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="nik">NIK<sup class="text-danger">*</sup></label>
                        <input type="text" name="nik" id="nik" value="<?= set_value('nik'); ?>" class="form-control" placeholder="Masukkan nik">
                        <?= form_error('nik', '<div class="text-danger small">', '</div>'); ?>
                      </div>
                      <div class="form-group">
                        <label for="nama">Nama Lengkap<sup class="text-danger">*</sup></label>
                        <input type="text" name="nama" id="nama" value="<?= $user['nama']; ?>" class="form-control" placeholder="Masukkan nama">
                        <?= form_error('nama', '<div class="text-danger small">', '</div>'); ?>
                      </div>
                      <div class="form-group">
                        <label for="usia">Usia<sup class="text-danger bold">*</sup></label>
                        <input type="text" name="usia" id="usia" value="<?= set_value('usia'); ?>" class="form-control" placeholder="Masukkan usia">
                        <?= form_error('usia', '<div class="text-danger small">', '</div>'); ?>
                      </div>
                      <div class="form-group">
                        <label for="no_telepon">No Telepon<sup class="text-danger">*</sup></label>
                        <input type="tel" name="no_telepon" id="no_telepon" value="<?= $user['telepon']; ?>" class="form-control" placeholder="Misal +620180281">
                        <?= form_error('no_telepon', '<div class="text-danger small">', '</div>'); ?>
                      </div>
                      <div class="form-group">
                        <label for="alamat">Alamat<sup class="text-danger">*</sup></label>
                        <textarea name="alamat" id="alamat" class="form-control"><?= set_value('alamat'); ?></textarea>
                        <?= form_error('alamat', '<div class="text-danger small">', '</div>'); ?>
                      </div>
                    </div>
                    <div class="col-6">
                      <?php if (!empty($this->session->flashdata('error_upload'))) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                          </button>
                          <?= strip_tags(str_replace('</p>', '', $this->session->flashdata('error_upload'))); ?>
                        </div>
                      <?php endif; ?>
                      <div class="form-group">
                        <div class="card border-light">
                          <img src="<?= base_url('assets/images/ktp.jpg') ?>" class="img-fluid image" alt="images" height="100px">
                          <div class="card-title mt-3 text-center">
                            <h3>Contoh Upload KTP.</h3>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Upload</span>
                          </div>
                          <div class="custom-file">
                            <input type="file" name="upload_ktp" class="custom-file-input" id="inputGroupFile01">
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                          </div>
                        </div>
                        <span>Foto Ktp maksimal 1mb, dengan format (jpg,png,jpeg,pdf).</span>
                      </div>
                      <div class="form-group">
                        <button type="submit" class="btn btn-success"> Simpan</button>
                        <button type="reset" class="btn btn-danger"> Batal</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php $this->load->view('templates/footer.php'); ?>
  </div>
</div>
<?php $this->load->view('templates/js.php'); ?>