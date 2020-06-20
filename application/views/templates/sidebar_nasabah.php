<aside class="left-sidebar" data-sidebarbg="skin6">
  <div class="scroll-sidebar" data-sidebarbg="skin6">
    <nav class="sidebar-nav">
      <ul id="sidebarnav">
        <li class="sidebar-item <?php if ($this->uri->segment(1) == 'home' xor $this->uri->segment(2) == 'ubah_password') {
                                  echo "selected";
                                } ?>"> <a class="sidebar-link sidebar-link <?php if ($this->uri->segment(1) == 'active') {
                                                                              echo "selected";
                                                                            } ?>" href="<?= site_url('home'); ?>" aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span class="hide-menu">Beranda</span></a></li>
        <li class="list-divider"></li>
        <li class="nav-small-cap"><span class="hide-menu">Menu Utama</span></li>
        </li>
        <li class="sidebar-item <?php if ($this->uri->segment(1) == 'peminjaman') {
                                  echo "selected";
                                } ?>">
          <a class="sidebar-link sidebar-link <?php if ($this->uri->segment(1) == 'peminjaman') {
                                                echo "active";
                                              } ?>" href="<?= site_url('peminjaman'); ?>" aria-expanded="false"><i data-feather="sidebar" class="feather-icon"></i>
            <span class="hide-menu">Data Peminjaman</span>
          </a>
        </li>
        <li class="sidebar-item <?php if ($this->uri->segment(1) == 'simpanan') {
                                  echo "selected";
                                } ?>">
          <a class="sidebar-link sidebar-link <?php if ($this->uri->segment(1) == 'simpanan') {
                                                echo "active";
                                              } ?>" href="<?= site_url('simpanan'); ?>" aria-expanded="false"><i data-feather="save" class="feather-icon"></i>
            <span class="hide-menu">Simpanan</span>
          </a>
        </li>
        <li class="list-divider"></li>
        <li class="nav-small-cap"><span class="hide-menu">Settings</span></li>
        <li class="sidebar-item <?php if ($this->uri->segment(2) == 'ubah_password') {
                                  echo "selected";
                                } ?>">
          <a class="sidebar-link sidebar-link <?php if ($this->uri->segment(2) == 'ubah_password') {
                                                echo "active";
                                              } ?>" href="<?= site_url('home/ubah_password'); ?>" aria-expanded="false"><i data-feather="settings" class="feather-icon"></i>
            <span class="hide-menu">Pengaturan</span></a>
        </li>
        <li class="sidebar-item"> <a class="sidebar-link sidebar-link text-danger" href="#" data-target="#keluar" data-toggle="modal" aria-expanded="false"><i data-feather="log-out" class="feather-icon"></i><span class="hide-menu">Logout</span></a></li>
      </ul>
    </nav>
  </div>
</aside>