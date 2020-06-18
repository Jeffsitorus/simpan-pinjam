<?php $this->load->view('templates/head.php'); ?>
<div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
  <?php $this->load->view('templates/header.php'); ?>
  <?php $this->load->view('templates/sidebar.php'); ?>
  <div class="page-wrapper">
    <div class="page-breadcrumb">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <a href="<?= site_url('nasabah/tambah'); ?>" class="btn btn-purple btn-rounded mb-3"> Tambah Nasabah</a>
            <?php if (!empty($this->session->flashdata('success'))) : ?>
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  <span class="sr-only">Close</span>
                </button>
                <?= $this->session->flashdata('success'); ?>
              </div>
            <?php endif; ?>
            <div class="card">
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-hover table-bordered" id="tableNasabah">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama Nasabah</th>
                        <th>No Telepon</th>
                        <th>Alamat</th>
                        <th>Foto</th>
                        <th>Usia</th>
                        <th>Opsi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($nasabah as $key => $nb) : ?>
                        <tr>
                          <td><?= $key + 1 ?></td>
                          <td><?= $nb['nik']; ?></td>
                          <td><?= $nb['nama']; ?></td>
                          <td><?= $nb['telepon']; ?></td>
                          <td><?= $nb['alamat']; ?></td>
                          <td>
                            <img src="<?= base_url('./assets/images/upload/' . $nb['foto']); ?>" class="rounded-circle" width="35" data-toggle="tooltip" title="<?= $nb['nama']; ?>" alt="image">
                          </td>
                          <td><?= $nb['usia']; ?> tahun.</td>
                          <td width="12%">
                            <a href="<?= site_url('nasabah/edit/' . $nb['id_nasabah']); ?>" class="btn btn-purple btn-sm"><i class="fas fa-edit"></i></a>
                            <a href="#" data-target="#delete<?= $nb['id_nasabah'] ?>" data-toggle="modal" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
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
<?php foreach($nasabah as $nb) : ?>
<!-- Modal -->
<div class="modal fade" id="delete<?= $nb['id_nasabah']; ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Anda yakin menghapus data <?= $nb['nama'] ?>?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <h4>Data yang dihapus akan secara permanen!</h4>
        <form action="<?= site_url('nasabah/delete'); ?>" method="post">
          <input type="hidden" name="id_nasabah" value="<?= $nb['id_nasabah']; ?>">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-light" data-dismiss="modal">Tidak</button>
          <button type="submit" class="btn btn-primary">Ya, Hapus!</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php endforeach; ?>