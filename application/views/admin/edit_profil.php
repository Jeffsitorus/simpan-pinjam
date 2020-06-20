<?php $this->load->view('templates/head.php'); ?>
<div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
  <?php $this->load->view('templates/header.php'); ?>
  <?php $this->load->view('templates/sidebar.php'); ?>
  <div class="page-wrapper">
    <div class="page-breadcrumb">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <a href="<?= site_url('admin'); ?>" class="btn btn-info mb-3"><i class="fas fa-arrow-alt-circle-left"></i> Kembali</a>
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
                <form action="<?= site_url('admin/edit_profil'); ?>" method="post" enctype="multipart/form-data">
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                        <label for="nama">Nama<sup class="text-danger">*</sup></label>
                        <input type="text" name="nama" id="nama" value="<?= $user['nama']; ?>" class="form-control" placeholder="Masukkan nama">
                        <?= form_error('nama', '<div class="text-danger small">', '</div>'); ?>
                      </div>
                      <div class="form-group">
                        <label for="username">Username<sup class="text-danger">*</sup></label>
                        <input type="text" name="username" id="username" value="<?= $user['username']; ?>" class="form-control" placeholder="Masukkan username">
                        <?= form_error('username', '<div class="text-danger small">', '</div>'); ?>
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
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Upload</span>
                          </div>
                          <div class="custom-file">
                            <input type="file" name="foto" class="custom-file-input" id="inputGroupFile01">
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                          </div>
                        </div>
                        <span>Foto harus formal maksimal 1mb, dengan format (jpg,png,jpeg,pdf).</span>
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