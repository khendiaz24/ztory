<!-- jQuery -->
<script src="<?= base_url() ?>/public/themes/admin/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url() ?>/public/themes/admin/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script> $.widget.bridge('uibutton', $.ui.button) </script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>/public/themes/admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<?= $this->renderSection('custom_footer'); ?>

<!-- overlayScrollbars -->
<script src="<?= base_url() ?>/public/themes/admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>/public/themes/admin/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>/public/themes/admin/dist/js/demo.js"></script>
<!-- Global Javascript -->
<script src="<?= base_url() ?>/public/themes/admin/global/global_functions.js"></script>