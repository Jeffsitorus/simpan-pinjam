<?php $this->load->view('templates/head.php'); ?>
<div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
  <?php $this->load->view('templates/header.php'); ?>
  <?php $this->load->view('templates/sidebar.php'); ?>
  <div class="page-wrapper">
    <div class="page-breadcrumb">
      <div class="row">
        <div class="col-12 align-self-center">
          <!-- <a href="<?= site_url('simpanan/tambah'); ?>" class="btn btn-purple btn-lg"> Tambah Simpanan</a> -->
        </div>
      </div>
      <?php if (!empty($this->session->flashdata('success'))) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
          </button>
          <?= $this->session->flashdata('success'); ?>
        </div>
      <?php endif; ?>
      <div class="card mt-3">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table-bordered table table-hover" id="tablePinjaman">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Nasabah</th>
                  <th>No Telepon</th>
                  <th>Tanggal Pinjam</th>
                  <th>Nominal</th>
                  <th>Bunga Pinjaman</th>
                  <th>Status</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($peminjaman as $key => $pinjam) : ?>
                  <tr>
                    <td><?= $key + 1; ?></td>
                    <td><?= $pinjam['nama']; ?></td>
                    <td><?= $pinjam['telepon']; ?></td>
                    <td><?= tgl_indo($pinjam['tgl_pinjam']); ?></td>
                    <td>Rp. <?= number_format($pinjam['nominal'], 0, ',', '.'); ?></td>
                    <td>Rp. <?= number_format($pinjam['bunga_pinjam'],0,',','.'); ?></td>
                    <td>
                      <?php if ($pinjam['status'] == 1) : ?>
                        <span class="badge badge-success"> Telah Disimpan</span>
                      <?php else : ?>
                        <span class="badge badge-info"> Menunggu Konfirmasi</span>
                      <?php endif; ?>
                    </td>
                    <td width="12%">
                      <?php if ($pinjam['status'] == 0) : ?>
                        <a href="#" class="btn btn-rounded btn-purple btn-sm" data-toggle="modal" data-target="#ubahStatus<?= $pinjam['id']; ?>"><i class="fas fa-edit"></i> Edit</a>
                      <?php else : ?>
                        <a href="#" class="btn btn-purple btn-sm" data-toggle="modal" data-target="#detail<?= $pinjam['id']; ?>"><i class="fas fa-eye"></i> Detail</a>
                      <?php endif ?>
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

<!-- Modal -->
<?php foreach ($peminjaman as $pinjam) : ?>
  <div class="modal fade" id="ubahStatus<?= $pinjam['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Konfirmasi Peminjaman Dana <?= ucfirst($pinjam['nama']) ?>? </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h4>Konfirmasi Peminjaman Dana dari <?= ucfirst($pinjam['nama']) ?> sebesar Rp. <?= number_format($pinjam['nominal']); ?>.</h4>
          <form action="<?= site_url('admin/peminjaman_konfirmasi'); ?>" method="post">
            <div class="form-group">
              <input type="hidden" name="id" value="<?= $pinjam['id']; ?>">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Konfirmasi</button>
        </div>
        </form>
      </div>
    </div>
  </div>

<?php endforeach; ?>
<!-- Modal -->

<?php foreach ($peminjaman as $pinjam) : ?>
  <div class="modal fade" id="detail<?= $pinjam['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Detail Peminjaman Dana <?= ucfirst($pinjam['nama']) ?>? </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table">
            <tr>
              <th width="45%">NIK</th>
              <td width="5%">:</td>
              <td><?= $pinjam['nik']; ?></td>
            </tr>
            <tr>
              <th width="45%">Nama Nasabah</th>
              <td width="5%">:</td>
              <td><?= $pinjam['nama']; ?></td>
            </tr>
            <tr>
              <th width="45%">No Telepon</th>
              <td width="5%">:</td>
              <td><?= $pinjam['telepon']; ?></td>
            </tr>
            <tr>
              <th width="45%">Alamat</th>
              <td width="5%">:</td>
              <td><?= $pinjam['alamat']; ?></td>
            </tr>
            <tr>
              <th width="45%">Tanggal Meminjam</th>
              <td width="5%">:</td>
              <td><?= tgl_indo($pinjam['tgl_pinjam']); ?></td>
            </tr>
            <tr>
              <th width="45%">Total Pinjaman</th>
              <td width="5%">:</td>
              <td>Rp. <?= number_format($pinjam['nominal'], 0, ',', '.'); ?></td>
            </tr>
            <tr>
              <th width="45%">Bunga Pinjaman</th>
              <td width="5%">:</td>
              <td>Rp. <?= number_format($pinjam['bunga_pinjam'], 0, ',', '.'); ?></td>
            </tr>
            <tr>
              <th width="45%">Status</th>
              <td width="5%">:</td>
              <td>
                <?php if ($pinjam['status']) : ?>
                  <span class="badge badge-purple">Telah Disetujui.</span>
                <?php endif; ?>
              </td>
            </tr>
            <tr>
              <th width="45%">Tanggal Dikonfirmasi</th>
              <td width="5%">:</td>
              <td><?= tgl_indo($pinjam['tgl_konfirmasi']); ?></td>
            </tr>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<?php endforeach; ?>