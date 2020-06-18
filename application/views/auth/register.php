<!DOCTYPE html>
<html dir="ltr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>/assets/images/favicon.png">
  <title>Simpan Pinjam - Register</title>
  <link href="<?= base_url() ?>/assets/dist/css/style.min.css" rel="stylesheet">
</head>

<body>
  <div class="main-wrapper">
    <div class="preloader">
      <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
      </div>
    </div>
    <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative" style="background:url(<?= base_url('assets/images/big/auth-bg.jpg') ?>) no-repeat center center;">
      <div class="auth-box row text-center">
        <div class="col-lg-6 col-md-5 modal-bg-img" style="background-image: url(<?= base_url('assets/images/big/3.png') ?>);">
        </div>
        <div class="col-lg-6 col-md-7 bg-white">
          <div class="p-3">
            <img src="<?= base_url() ?>/assets/images/big/icon.png" alt="wrapkit">
            <h2 class="mt-3 text-center">Daftar Sekarang!</h2>
            <form class="mt-4" action="<?= site_url('auth/register') ?>" method="POST">
              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group">
                    <input class="form-control" type="text" name="nama" placeholder="Masukkan nama">
                    <?= form_error('nama', '<div class="text-danger text-justify small">', '</div>'); ?>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group">
                    <input class="form-control" type="texts" name="username" placeholder="Username">
                    <?= form_error('username', '<div class="text-danger text-justify small">', '</div>'); ?>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group">
                    <input class="form-control" type="tel" name="no_telepon" placeholder="No telepon">
                    <?= form_error('no_telepon', '<div class="text-danger text-justify small">', '</div>'); ?>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group">
                    <input class="form-control" type="password" name="password" placeholder="password">
                    <?= form_error('password', '<div class="text-danger text-justify small">', '</div>'); ?>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="form-group">
                    <input class="form-control" type="password" name="password1" placeholder="Konfirmasi password">
                    <?= form_error('password1', '<div class="text-danger text-justify small">', '</div>'); ?>
                  </div>
                </div>
                <div class="col-lg-12 text-center">
                  <button type="submit" class="btn btn-block btn-primary">Daftar</button>
                </div>
                <div class="col-lg-12 text-center mt-5">
                  Sudah punya akun? <a href="<?= site_url('auth'); ?>" class="text-danger">Login Sekarang!</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="<?= base_url() ?>/assets/libs/jquery/dist/jquery.min.js "></script>
  <script src="<?= base_url() ?>/assets/libs/popper.js/dist/umd/popper.min.js "></script>
  <script src="<?= base_url() ?>/assets/libs/bootstrap/dist/js/bootstrap.min.js "></script>
  <script>
    $(".preloader ").fadeOut();
  </script>
</body>

</html>