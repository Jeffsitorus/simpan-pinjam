<?php $this->load->view('templates/head.php'); ?>
<div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
  <?php $this->load->view('templates/header_nasabah.php'); ?>
  <?php $this->load->view('templates/sidebar_nasabah.php'); ?>
  <div class="page-wrapper">
    <div class="page-breadcrumb">
      <div class="row">
        <div class="col-12 align-self-center">
          <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Welcome back <?= $this->session->userdata('nama'); ?>!</h3>
          <div class="d-flex align-items-center">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb m-0 p-0">
                <li class="breadcrumb-item"><a href="#">Dashboard</a>
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="card-group">
        <div class="card border-right">
          <div class="card-body">
            <div class="d-flex d-lg-flex d-md-block align-items-center">
              <div>
                <div class="d-inline-flex align-items-center">
                  <h3 class="text-dark mb-3 font-weight-medium"><?= $user['created_at']; ?></h3>
                </div>
                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Terdaftar Pada Web Simpan Pinjam.</h6>
              </div>
              <div class="ml-auto mt-md-3 mt-lg-0">
                <span class="opacity-7 text-muted"><i data-feather="user-plus"></i></span>
              </div>
            </div>
          </div>
        </div>
        <div class="card border-right">
          <div class="card-body">
            <div class="d-flex d-lg-flex d-md-block align-items-center">
              <div>
                <h3 class="text-dark mb-3 w-100 text-truncate font-weight-medium"><sup class="set-doller">Rp.</sup><?= number_format($subtotal->total, 0, ',', '.'); ?></h3>
                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Simpanan
                </h6>
              </div>
              <div class="ml-auto mt-md-3 mt-lg-0">
                <span class="opacity-7 text-muted"><i data-feather="dollar-sign"></i></span>
              </div>
            </div>
          </div>
        </div>
        <div class="card border-right">
          <div class="card-body">
            <div class="d-flex d-lg-flex d-md-block align-items-center">
              <div>
                <h3 class="text-dark mb-3 w-100 text-truncate font-weight-medium"><sup class="set-doller">Rp.</sup><?= number_format($qty->nominal, 0, ',', '.'); ?></h3>
                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Pinjaman
                </h6>
              </div>
              <div class="ml-auto mt-md-3 mt-lg-0">
                <span class="opacity-7 text-muted"><i data-feather="dollar-sign"></i></span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col-4">
          <div class="card">
            <img class="card-img-top img-fluid" src="<?= base_url('assets/images/upload/' . $user['foto']) ?>" alt="Card image cap">
            <div class="card-body">
              <h4 class="card-title"><?= $user['nama']; ?></h4>
              <p class="card-text"><?= $user['alamat']; ?></p>
            </div>
          </div>
        </div>
        <div class="col-8">
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
              <h4 class="card-title">Profil</h4>
              <p class="card-text">
                <table class="table">
                  <tr>
                    <th width="35%">Nama</th>
                    <td width="5%">:</td>
                    <td><?= $user['nama']; ?></td>
                  </tr>
                  <tr>
                    <th>Username</th>
                    <td>:</td>
                    <td><?= $user['username']; ?></td>
                  </tr>
                  <tr>
                    <th>No Telepon</th>
                    <td>:</td>
                    <td>
                      <?php if (!$user['telepon']) :  ?>
                        <span>-</span>
                      <?php else : ?>
                        <?= $user['telepon'] ?>
                      <?php endif; ?>
                    </td>
                  </tr>
                  <tr>
                    <th>Alamat Lengkap</th>
                    <td>:</td>
                    <td>
                      <?php if (!$user['alamat']) :  ?>
                        <span>-</span>
                      <?php else : ?>
                        <?= $user['alamat'] ?>
                      <?php endif; ?>
                    </td>
                  </tr>
                  <tr>
                    <th>Usia</th>
                    <td>:</td>
                    <td>
                      <?php if (!$user['usia']) :  ?>
                        <span>-</span>
                      <?php else : ?>
                        <?= $user['usia'] . '' . ' tahun' ?>
                      <?php endif; ?>
                    </td>
                  </tr>
                </table>
              </p>
              <?php if ($user['upload_ktp']) : ?>
                <a href="<?= site_url('home/edit_profil'); ?>" class="btn btn-purple"><i class="fas fa-edit"></i> Edit Profil</a>
              <?php else : ?>
                <a href="<?= site_url('home/lengkapi_data'); ?>" class="btn btn-primary"> Lengkapi Data</a>
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