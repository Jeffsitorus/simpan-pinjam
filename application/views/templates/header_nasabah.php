<header class="topbar" data-navbarbg="skin6">
  <nav class="navbar top-navbar navbar-expand-md">
    <div class="navbar-header" data-logobg="skin6">
      <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
      <div class="navbar-brand">
        <a href="<?= site_url('admin'); ?>">
          <b class="logo-icon">
            <!-- <img src="<?= base_url() ?>/assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
            <img src="<?= base_url() ?>/assets/images/logo-icon.png" alt="homepage" class="light-logo" /> -->
          </b>
          <span class="logo-text">
            Simpan-Pinjam
            <!-- <img src="<?= base_url() ?>/assets/images/logo-text.png" alt="homepage" class="dark-logo" />
            <img src="<?= base_url() ?>/assets/images/logo-light-text.png" class="light-logo" alt="homepage" /> -->
          </span>
        </a>
      </div>
      <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
    </div>
    <div class="navbar-collapse collapse" id="navbarSupportedContent">
      <ul class="navbar-nav float-left mr-auto ml-3 pl-1">
      </ul>
      <ul class="navbar-nav float-right">
        <li class="nav-item d-none d-md-block">
          <a class="nav-link" href="javascript:void(0)">
            <form>
              <div class="customize-input">
                <input class="form-control custom-shadow custom-radius border-0 bg-white" type="search" placeholder="Search" aria-label="Search">
                <i class="form-control-icon" data-feather="search"></i>
              </div>
            </form>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="<?= base_url('/assets/images/upload/'. $user['foto']); ?>" alt="user" class="rounded-circle" width="40">
            <span class="ml-2 d-none d-lg-inline-block"><span>Hello,</span> <span class="text-dark"><?= $this->session->userdata('nama'); ?></span> <i data-feather="chevron-down" class="svg-icon"></i></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
            <a class="dropdown-item" href="<?= site_url('home'); ?>"><i data-feather="user" class="svg-icon mr-2 ml-1"></i>
              My Profile</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?= site_url('home/edit_profil'); ?>"><i data-feather="edit" class="svg-icon mr-2 ml-1"></i>
              Edit Profil</a>
            <a class="dropdown-item" href="<?= site_url('home/ubah_password'); ?>"><i data-feather="settings" class="svg-icon mr-2 ml-1"></i>
              Pengaturan</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?= site_url('auth/logout'); ?>"><i data-feather="power" class="svg-icon mr-2 ml-1"></i>
              Logout</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
</header>