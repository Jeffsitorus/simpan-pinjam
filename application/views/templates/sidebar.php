<aside class="left-sidebar" data-sidebarbg="skin6">
  <div class="scroll-sidebar" data-sidebarbg="skin6">
    <nav class="sidebar-nav">
      <ul id="sidebarnav">
        <li class="sidebar-item <?php if ($this->uri->segment(1) == 'admin' xor $this->uri->segment(2) == 'simpanan' xor $this->uri->segment(2) == 'peminjaman' xor $this->uri->segment(2) == 'ubah_password') {
                                  echo "selected";
                                } ?>"> <a class="sidebar-link sidebar-link <?php if ($this->uri->segment(1) == 'active') {
                                                                              echo "selected";
                                                                            } ?>" href="<?= site_url('admin') ?>" aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span class="hide-menu">Dashboard</span></a></li>
        <li class="list-divider"></li>
        <li class="nav-small-cap"><span class="hide-menu">Menu Utama</span></li>
        </li>
        <li class="sidebar-item <?php if ($this->uri->segment(1) == 'nasabah') {
                                  echo "selected";
                                } ?>">
          <a class="sidebar-link sidebar-link <?php if ($this->uri->segment(1) == 'nasabah') {
                                                echo "active";
                                              } ?>" href="<?= site_url('nasabah'); ?>" aria-expanded="false"><i data-feather="users" class="feather-icon"></i>
            <span class="hide-menu">Nasabah</span>
          </a>
        </li>
        <li class="sidebar-item <?php if ($this->uri->segment(2) == 'peminjaman') {
                                  echo "selected";
                                } ?>">
          <a class="sidebar-link sidebar-link <?php if ($this->uri->segment(2) == 'peminjaman') {
                                                echo "active";
                                              } ?>" href="<?= site_url('admin/peminjaman'); ?>" aria-expanded="false"><i data-feather="sidebar" class="feather-icon"></i>
            <span class="hide-menu">Peminjaman</span>
          </a>
        </li>
        <li class="sidebar-item <?php if ($this->uri->segment(1) == 'simpanan') {
                                  echo "selected";
                                } ?>">
          <a class="sidebar-link sidebar-link <?php if ($this->uri->segment(2) == 'simpanan') {
                                                echo "active";
                                              } ?>" href="<?= site_url('admin/simpanan'); ?>" aria-expanded="false"><i data-feather="save" class="feather-icon"></i>
            <span class="hide-menu">Simpanan</span>
          </a>
        </li>
        <li class="sidebar-item <?php if ($this->uri->segment(1) == 'laporan' xor $this->uri->segment(2) == 'data_pinjaman') {
                                  echo "selected";
                                } ?>">
          <a class="sidebar-link sidebar-link <?php if ($this->uri->segment(1) == 'laporan' xor $this->uri->segment(2) == 'data_pinjaman') {
                                                echo "active";
                                              } ?>" href=" <?= site_url('laporan/data_nasabah') ?>" aria-expanded="false"><i data-feather="folder" class="feather-icon"></i>
            <span class="hide-menu">Laporan Nasabah</span>
          </a>
        </li>
        <li class="sidebar-item <?php if ($this->uri->segment(2) == 'data_pinjaman') {
                                  echo "selected";
                                } ?>">
          <a class="sidebar-link sidebar-link <?php if ($this->uri->segment(2) == 'data_pinjaman') {
                                                echo "active";
                                              } ?>" href="<?= site_url('laporan/data_pinjaman') ?>" aria-expanded="false"><i data-feather="folder" class="feather-icon"></i>
            <span class="hide-menu">Laporan Pinjaman</span>
          </a>
        </li>
        <li class="list-divider"></li>
        <li class="nav-small-cap"><span class="hide-menu">Settings</span></li>
        <li class="sidebar-item <?php if ($this->uri->segment(2) == 'ubah_password') {
                                  echo "selected";
                                } ?>">
          <a class="sidebar-link sidebar-link <?php if ($this->uri->segment(2) == 'ubah_password') {
                                                echo "active";
                                              } ?>" href="<?= site_url('admin/ubah_password'); ?>" aria-expanded="false"><i data-feather="settings" class="feather-icon"></i>
            <span class="hide-menu">Pengaturan</span></a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link sidebar-link text-danger" href="#" data-target="#logout" data-toggle="modal" aria-expanded="false"><i data-feather="log-out" class="feather-icon"></i>
            <span class="hide-menu">Logout</span></a>
        </li>
      </ul>
    </nav>
  </div>
</aside>