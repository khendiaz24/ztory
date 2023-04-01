<?= $this->extend('../../public/themes/admin/template'); ?>

<!-- #Header# -->
<?= $this->section('custom_header'); ?>

<!-- DataTables -->
<link href="<?= base_url(); ?>/public/themes/admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet" />

<?= $this->endSection(); ?>

<!-- #Content# -->
<?= $this->section('content'); ?>

<div class="page-breadcrumb">
  <div class="row">
    <div class="col-12 d-flex no-block align-items-center">
      <h4 class="page-title">Manage Accounts</h4>
    </div>
  </div>
</div>

<div class="container-fluid">
    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-0">Accounts</h5>

                    <div style="float: right">
                        <a class="btn btn-<?= $systemConfiguration['theme']; ?>" href="<?= base_url(); ?>/admin/users/add_new_user"><i class="fa fa-plus-circle"></i> Add New</a>
                    </div>
                </div>
                <table id="UserLists" class="table table-striped table-bordered hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Contact #</th>
                            <th>Position</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>

    </div>
</div>

<?= $this->endSection(); ?>

<!-- #Footer# -->
<?= $this->section('custom_footer'); ?>

<!-- DataTables -->
<script src="<?= base_url(); ?>/public/themes/admin/assets/extra-libs/DataTables/datatables.min.js"></script>

<script src="<?= base_url() ?>/modules/Users/JSCSS/users_index.js"></script>

<?= $this->endSection(); ?>
