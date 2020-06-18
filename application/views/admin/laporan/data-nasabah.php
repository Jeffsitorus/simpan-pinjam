<?php $this->load->view('templates/head.php'); ?>
<div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
  <?php $this->load->view('templates/header.php'); ?>
  <?php $this->load->view('templates/sidebar.php'); ?>
  <div class="page-wrapper">
    <div class="page-breadcrumb">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <a href="<?= site_url('laporan/cetak_nasabah'); ?>" target="_blank" class="btn btn-danger btn-rounded mb-3"><i class="fas fa-print"></i> Cetak Pdf</a>
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
                        <th>Usia</th>
                        <th>Foto</th>
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
                          <td><?= $nb['usia']; ?></td>
                          <td>
                            <img src="<?= base_url('./assets/images/upload/' . $nb['foto']); ?>" class="rounded-circle" width="35" data-toggle="tooltip" title="<?= $nb['nama']; ?>" alt="image">
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