<!DOCTYPE html>
<html dir="ltr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url() ?>/assets/images/favicon.png">
  <title>Simpan Pinjam - Login</title>
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
      <div class="auth-box row">
        <div class="col-lg-7 col-md-5 modal-bg-img" style="background-image: url(<?= base_url('/assets/images/big/3.png') ?>);">
        </div>
        <div class="col-lg-5 col-md-7 bg-white">
          <div class="p-3">
            <div class="text-center">
              <img src="<?= base_url() ?>/assets/images/big/icon.png" alt="wrapkit">
            </div>
            <h2 class="mt-3 text-center">Login</h2>
            <p class="text-center">Masukkan Username dan Password</p>
            <form class="mt-4" action="<?= site_url('auth') ?>" method="POST">
              <div class="row">
                <div class="col-lg-12">
                  <?php if(!empty($this->session->flashdata('error'))) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                      </button>
                      <?= $this->session->flashdata('error'); ?>
                    </div>
                  <?php endif; ?>
                  <div class="form-group">
                    <label class="text-dark" for="uname">Username</label>
                    <input class="form-control" id="uname" name="username" type="text" value="<?= set_value('username'); ?>" placeholder="enter your username">
                  </div>
                  <?= form_error('username', '<div class="text-danger mt-n3 small">', '</div>'); ?>
                </div>
                <div class="col-lg-12">
                  <div class="form-group">
                    <label class="text-dark" for="pwd">Password</label>
                    <input class="form-control" id="pwd" name="password" type="password" placeholder="enter your password">
                  </div>
                  <?= form_error('password', '<div class="text-danger mt-n3 small">', '</div>'); ?>
                </div>
                <div class="col-lg-12 text-center">
                  <button type="submit" class="btn btn-block mt-4 btn-primary">Login</button>
                </div>
                <div class="col-lg-12 text-center mt-5">
                  Belum punya akun? <a href="<?= site_url('auth/register') ?>" class="text-danger">Daftar Sekarang!</a>
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