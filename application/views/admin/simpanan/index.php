<?php $this->load->view('templates/head.php'); ?>
<div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
  <?php $this->load->view('templates/header.php'); ?>
  <?php $this->load->view('templates/sidebar.php'); ?>
  <div class="page-wrapper">
    <div class="page-breadcrumb">
      <div class="row">
        <div class="col-12 align-self-center">
          <!-- <a href="<?= site_url('admin/simpanan_tambah'); ?>" class="btn btn-purple btn-lg"> Tambah Simpanan</a> -->
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
            <table class="table-bordered table table-hover" id="tableSimpanan">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Nasabah</th>
                  <th>No Telepon</th>
                  <th>Tanggal Setor</th>
                  <th>Total</th>
                  <th>Status</th>
                  <th>Opsi</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($simpanan as $key => $sim) : ?>
                  <tr>
                    <td><?= $key + 1; ?></td>
                    <td><?= $sim['nama']; ?></td>
                    <td><?= $sim['telepon']; ?></td>
                    <td><?= tgl_indo($sim['tgl_setor']); ?></td>
                    <td>Rp. <?= number_format($sim['total'], 0, ',', '.'); ?></td>
                    <td>
                      <?php if ($sim['status'] == 1) : ?>
                        <span class="badge badge-success"> Telah Disimpan</span>
                      <?php else : ?>
                        <span class="badge badge-info"> Menunggu Konfirmasi</span>
                      <?php endif; ?>
                    </td>
                    <td width="12%">
                      <?php if ($sim['status'] == 0) : ?>
                        <a href="#" class="btn btn-rounded btn-purple btn-sm" data-toggle="modal" data-target="#ubahStatus<?= $sim['id_simpanan']; ?>"><i class="fas fa-edit"></i> Edit</a>
                      <?php else : ?>
                        <a href="#" class="btn btn-purple btn-sm" data-toggle="modal" data-target="#detail<?= $sim['id_simpanan']; ?>"><i class="fas fa-eye"></i> Detail</a>
                      <?php endif ?>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
            <div class="alert mt-3 alert-light d-flex justify-content-between">
              <span><b>Total Simpanan :</b></span>
              <b>Rp. <?= number_format($subtotal->total, 0, ',', '.'); ?></b>
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
<?php foreach ($simpanan as $sim) : ?>
  <div class="modal fade" id="ubahStatus<?= $sim['id_simpanan']; ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Konfirmasi Simpanan Dana <?= ucfirst($sim['nama']) ?>? </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h4>Konfirmasi Simpanan Data dari <?= ucfirst($sim['nama']) ?> sebesar Rp. <?= number_format($sim['total']); ?>.</h4>
          <form action="<?= site_url('admin/simpanan_konfirmasi'); ?>" method="post">
            <div class="form-group">
              <input type="hidden" name="id_simpanan" value="<?= $sim['id_simpanan']; ?>">
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

<?php foreach ($simpanan as $sim) : ?>
  <div class="modal fade" id="detail<?= $sim['id_simpanan']; ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Detail Simpanan</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table">
            <tr>
              <th width="45%">NIK</th>
              <td width="5%">:</td>
              <td><?= $sim['nik']; ?></td>
            </tr>
            <tr>
              <th width="45%">Nama Nasabah</th>
              <td width="5%">:</td>
              <td><?= $sim['nama']; ?></td>
            </tr>
            <tr>
              <th width="45%">No Telepon</th>
              <td width="5%">:</td>
              <td><?= $sim['telepon']; ?></td>
            </tr>
            <tr>
              <th width="45%">Alamat Lengkap</th>
              <td width="5%">:</td>
              <td><?= $sim['alamat']; ?></td>
            </tr>
            <tr>
              <th width="45%">Tanggal Penyetoran</th>
              <td width="5%">:</td>
              <td><?= tgl_indo($sim['tgl_setor']); ?></td>
            </tr>
            <tr>
              <th width="45%">Total Simpanan</th>
              <td width="5%">:</td>
              <td>Rp. <?= number_format($sim['total'], 0, ',', '.'); ?></td>
            </tr>
            <tr>
              <th width="45%">Status</th>
              <td width="5%">:</td>
              <td>
                <?php if ($sim['status']) : ?>
                  <span class="badge badge-purple">Telah Disimpan.</span>
                <?php endif; ?>
              </td>
            </tr>
            <tr>
              <th width="45%">Tanggal Dikonfirmasi</th>
              <td width="5%">:</td>
              <td><?= $sim['tgl_konfirmasi']; ?></td>
            </tr>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>