<?php $this->load->view('templates/head.php'); ?>
<div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
    <?php $this->load->view('templates/header.php'); ?>
    <?php $this->load->view('templates/sidebar.php'); ?>
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 align-self-center">
                    <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Welcome back <?= $this->session->userdata('nama'); ?>!</h3>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-0 p-0">
                                <li class="breadcrumb-item"><a href="<?= site_url('admin'); ?>">Dashboard</a>
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
                                    <h3 class="text-dark mb-3 font-weight-medium"><?= $totalNasabah; ?> orang</h3>
                                </div>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Jumlah Nasabah</h6>
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
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Simpanan Nasabah
                                </h6>
                            </div>
                            <div class="ml-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"><i data-feather="dollar-sign"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center">
                            <div>
                                <h3 class="text-dark mb-1 font-weight-medium"><sup>Rp.</sup> <?= number_format($qty->nominal, 0, ',', '.'); ?></h3>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Dana Telah Dipinjam</h6>
                            </div>
                            <div class="ml-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"><i data-feather="dollar-sign"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-group">
                <div class="card border-right">
                    <div class="card-body">
                        <div class="d-flex d-lg-flex d-md-block align-items-center">
                            <div>
                                <h3 class="text-dark mb-3 w-100 text-truncate font-weight-medium"><sup class="set-doller">Rp.</sup><?= number_format($qtySimpanan->total, 0, ',', '.'); ?></h3>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Simpanan Nasabah Tertinggi
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
                                <h3 class="text-dark mb-3 w-100 text-truncate font-weight-medium"><sup class="set-doller">Rp.</sup><?= number_format($qtyPinjaman->nominal, 0, ',', '.'); ?></h3>
                                <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Total Pinjaman Nasabah Terbanyak
                                </h6>
                            </div>
                            <div class="ml-auto mt-md-3 mt-lg-0">
                                <span class="opacity-7 text-muted"><i data-feather="dollar-sign"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-4">
                                <h4 class="card-title">Top Leaders</h4>
                                <div class="ml-auto">
                                    <div class="dropdown sub-dropdown">
                                        <button class="btn btn-link text-muted dropdown-toggle" type="button" id="dd1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i data-feather="more-vertical"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table no-wrap v-middle mb-0">
                                    <thead>
                                        <tr class="border-0">
                                            <th class="border-0 font-14 font-weight-medium text-muted">Leader
                                            </th>
                                            <th class="border-0 font-14 font-weight-medium text-muted px-2">Profesi
                                            </th>
                                            <th class="border-0 font-14 font-weight-medium text-muted">Tim</th>
                                            <th class="border-0 font-14 font-weight-medium text-muted text-center">
                                                Status
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="border-top-0 px-2 py-4">
                                                <div class="d-flex no-block align-items-center">
                                                    <div class="mr-3"><img src="<?= base_url() ?>/assets/images/users/widget-table-pic1.jpg" alt="user" class="rounded-circle" width="45" height="45" /></div>
                                                    <div class="">
                                                        <h5 class="text-dark mb-0 font-16 font-weight-medium">Rizky Audina
                                                        </h5>
                                                        <span class="text-muted font-14">smantykuy@gmail.com</span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="border-top-0 text-muted px-2 py-4 font-14">Ketua Koperasi</td>
                                            <td class="border-top-0 px-2 py-4">
                                                <div class="popover-icon">
                                                    <a class="btn btn-primary rounded-circle btn-circle font-12" href="javascript:void(0)">DS</a>
                                                    <a class="btn btn-danger rounded-circle btn-circle font-12 popover-item" href="javascript:void(0)">SS</a>
                                                </div>
                                            </td>
                                            <td class="border-top-0 text-center px-2 py-4"><i class="fa fa-circle text-primary font-12" data-toggle="tooltip" data-placement="top" title="Aktif"></i></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $this->load->view('templates/footer.php'); ?>
    </div>
</div>
<?php $this->load->view('templates/js.php'); ?>