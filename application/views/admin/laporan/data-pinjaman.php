<?php $this->load->view('templates/head.php'); ?>
<div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
  <?php $this->load->view('templates/header.php'); ?>
  <?php $this->load->view('templates/sidebar.php'); ?>
  <div class="page-wrapper">
    <div class="page-breadcrumb">
      <div class="row">
        <div class="col-12 align-self-center">
          <a href="<?= site_url('laporan/cetak_pinjaman'); ?>" target="_blank" class="btn btn-purple btn-lg"> Cetak Pdf</a>
        </div>
      </div>
      <div class="card mt-3">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table-bordered table table-hover" id="tableSimpanan">
              <thead>
                <tr>
                  <th>No</th>
                  <th>NIK</th>
                  <th>Nama Nasabah</th>
                  <th>No Telepon</th>
                  <th>Tanggal Pinjam</th>
                  <th>Nominal</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($peminjaman as $key => $pinjam) : ?>
                  <tr>
                    <td><?= $key + 1; ?></td>
                    <td><?= $pinjam['nik']; ?></td>
                    <td><?= $pinjam['nama']; ?></td>
                    <td><?= $pinjam['telepon']; ?></td>
                    <td><?= tgl_indo($pinjam['tgl_pinjam']); ?></td>
                    <td>Rp. <?= number_format($pinjam['nominal'], 0, ',', '.'); ?></td>
                    <td>
                      <?php if ($pinjam['status'] == 1) : ?>
                        <span class="badge badge-success"> Telah Disetujui</span>
                      <?php else : ?>
                        <span class="badge badge-info"> Menunggu Konfirmasi</span>
                      <?php endif; ?>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
            <div class="alert mt-3 alert-light d-flex justify-content-between">
              <span><b>Total Peminjaman :</b></span>
              <b>Rp. <?= number_format($qty->nominal, 0, ',', '.'); ?></b>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php $this->load->view('templates/footer.php'); ?>
  </div>
</div>
<?php $this->load->view('templates/js.php'); ?>