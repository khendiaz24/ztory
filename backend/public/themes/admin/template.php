<!DOCTYPE html>
<html dir="ltr" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="keywords" content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Matrix lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Matrix admin lite design, Matrix admin lite dashboard bootstrap 5 dashboard template" />
    <meta name="description" content="Matrix Admin Lite Free Version is powerful and clean admin dashboard template, inpired from Bootstrap Framework" />
    <meta name="robots" content="noindex,nofollow" />
    <title><?= $pageTitle; ?> | <?= $systemConfiguration['name']; ?> - Content Management System</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url(); ?>/public/themes/frontend/dist/images/favicon/windows-tile-icon.png" />
    <!-- Custom CSS -->
    <link href="<?= base_url('/public/themes/admin/plugins/quill/quill.snow.css'); ?>" rel="stylesheet" />
    <link href="<?= base_url(); ?>/public/themes/admin/dist/css/style.min.css" rel="stylesheet" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <?= $this->renderSection('custom_header'); ?>

    <script>
      var BASE_URL = '<?= base_url(); ?>';
    </script>
    <style>textarea { resize: none; }</style>
  </head>
  <body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
      <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
      </div>
    </div>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">

      <!-- Navbar -->
      <?php require_once(ROOTPATH . 'public/themes/admin/partials/navigation.php'); ?>

      <div class="page-wrapper">
        <?= $this->renderSection('content'); ?>

        <footer class="footer" style="font-size: 10px; text-align: right">
          WeWantWebs CMS 1.0
        </footer>
      </div>

    </div>

    <script src="<?= base_url(); ?>/public/themes/admin/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/public/themes/admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?= base_url(); ?>/public/themes/admin/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="<?= base_url(); ?>/public/themes/admin/assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="<?= base_url(); ?>/public/themes/admin/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?= base_url(); ?>/public/themes/admin/dist/js/sidebarmenu.js"></script>
    <!-- Quill JS -->
    <script src="<?= base_url('/public/themes/admin/plugins/quill/quill.js'); ?>"></script>
    <!--Custom JavaScript -->
    <script src="<?= base_url(); ?>/public/themes/admin/dist/js/custom.min.js"></script>
    <!-- Global Javascript -->
    <script src="<?= base_url(); ?>/public/themes/global/js/global_functions.js"></script>

    <?= $this->renderSection('custom_footer'); ?>

  </body>
</html>
