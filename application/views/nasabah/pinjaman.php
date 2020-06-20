<?php $this->load->view('templates/head.php'); ?>
<div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
  <?php $this->load->view('templates/header_nasabah.php'); ?>
  <?php $this->load->view('templates/sidebar_nasabah.php'); ?>
  <div class="page-wrapper">
    <div class="page-breadcrumb">
      <div class="row">
        <div class="col-12 align-self-center">
          <?php if ($user['upload_ktp'] == '') : ?>
            <a href="<?= site_url('home/lengkapi_data'); ?>" class="btn btn-primary btn-lg">Buat Pinjaman</a>
          <?php else : ?>
            <a href="<?= site_url('peminjaman/tambah'); ?>" class="btn btn-purple btn-lg"> Buat Pinjaman</a>
          <?php endif; ?>
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
            <table class="table-bordered table table-hover">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Mulai Pinjam</th>
                  <th>Nominal</th>
                  <th>Durasi Waktu</th>
                  <th>Bunga Pinjaman</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($peminjaman as $key => $pinjam) : ?>
                  <tr>
                    <td><?= $key + 1; ?></td>
                    <td><?= $pinjam['tgl_pinjam']; ?></td>
                    <td>Rp. <?= number_format($pinjam['nominal'], 0, ',', '.'); ?></td>
                    <td><?= $pinjam['durasi']; ?> bulan</td>
                    <td><?= number_format($pinjam['bunga_pinjam']); ?></td>
                    <td width="23%" align="center">
                      <?php if ($pinjam['status'] == 0) : ?>
                        <a href="<?= site_url('peminjaman/edit/' . $pinjam['id']); ?>" class="btn btn-purple"><i class="fas fa-edit"></i> Edit</a>
                        <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#delete<?= $pinjam['id'] ?>"><i class="fas fa-trash"></i> Hapus</a>
                      <?php else : ?>
                        <!-- <a href="" class="btn btn-success btn-sm"><i class="fas fa-paper-plane"></i> Cicil</a> -->
                        <a href="#" data-toggle="modal" data-target="#detail<?= $pinjam['id']; ?>" class="btn btn-info btn-sm"><i class="fas fa-eye"></i> Lihat Detail</a>
                      <?php endif ?>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
            <div class="alert alert-light d-flex justify-content-between">
              <span><b>Total Pinjaman Anda:</b></span>
              <?php if ($subtotal->nominal) : ?>
                <b>Rp. <?= number_format($subtotal->nominal, 0, ',', '.'); ?></b>
              <?php else : ?>
                <b>Rp. 0, Buat Pinjaman anda. :)</b>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php $this->load->view('templates/footer.php'); ?>
  </div>
</div>
<?php $this->load->view('templates/js.php'); ?>


<?php foreach ($peminjaman as $pinjam) : ?>
  <!-- Modal -->
  <div class="modal fade" id="delete<?= $pinjam['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Anda yakin ingin membatalkan pinjaman ini?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <h4>Klik hapus untuk membatalkan pinjaman dana sebesar Rp. <?= number_format($pinjam['nominal'], 0, ',', '.'); ?></h4>
            <form action="<?= site_url('peminjaman/delete') ?>" method="post">
              <input type="hidden" name="id" id="id" value="<?= $pinjam['id']; ?>">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-purple" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-danger">Hapus</button>
        </div>
        </form>
      </div>
    </div>
  </div>

  <script>
    $('#exampleModal').on('show.bs.modal', event => {
      var button = $(event.relatedTarget);
      var modal = $(this);
    });
  </script>
<?php endforeach; ?>


<?php foreach ($peminjaman as $pinjam) : ?>
  <div class="modal fade" id="detail<?= $pinjam['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Detail Peminjaman</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!--  -->
          <table class="table">
            <tr>
              <th width="45%">Tanggal Pinjam</th>
              <td width="5%">:</td>
              <td><?= $pinjam['tgl_pinjam']; ?></td>
            </tr>
            <tr>
              <th width="45%">Total Pinjaman</th>
              <td width="5%">:</td>
              <td>Rp. <?= number_format($pinjam['nominal'], 0, ',', '.'); ?></td>
            </tr>
            <tr>
              <th width="45%">Jangka Waktu Pinjaman</th>
              <td width="5%">:</td>
              <td><?= $pinjam['durasi']; ?> bulan</td>
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
              <td><?= $pinjam['tgl_konfirmasi']; ?></td>
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