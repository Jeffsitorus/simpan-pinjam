<script src="<?= base_url() ?>/assets/libs/jquery/dist/jquery.min.js"></script>
<script src="<?= base_url() ?>/assets/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="<?= base_url() ?>/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>/assets/dist/js/app-style-switcher.js"></script>
<script src="<?= base_url() ?>/assets/dist/js/feather.min.js"></script>
<script src="<?= base_url() ?>/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="<?= base_url() ?>/assets/dist/js/sidebarmenu.js"></script>
<script src="<?= base_url() ?>/assets/dist/js/custom.min.js"></script>

<script src="<?= base_url() ?>/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/dist/js/pages/datatable/datatable-basic.init.js"></script>
<script src="<?= base_url('assets/datatable/custom.dataTables.js'); ?>"></script>

<script src="<?= base_url() ?>/assets/extra-libs/c3/d3.min.js"></script>
<script src="<?= base_url() ?>/assets/extra-libs/c3/c3.min.js"></script>
<script src="<?= base_url() ?>/assets/libs/chartist/dist/chartist.min.js"></script>
<script src="<?= base_url() ?>/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
<script src="<?= base_url() ?>/assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
<script src="<?= base_url() ?>/assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
<script src="<?= base_url() ?>/assets/dist/js/pages/dashboards/dashboard1.min.js"></script>
</body>

</html>

<!-- Modal -->
<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Anda yakin ingin keluar?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Klik ya jika ingin keluar, Batal jika tidak ingin keluar!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-dismiss="modal">Batal</button>
        <a href="<?= site_url('auth/logout') ?>" class="btn btn-purple">Ya, Keluar.</a>
      </div>
    </div>
  </div>
</div>