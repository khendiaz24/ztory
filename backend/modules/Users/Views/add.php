<?= $this->extend('../../public/themes/admin/template'); ?>

<!-- #Header# -->
<?= $this->section('custom_header'); ?>

<?= $this->endSection(); ?>

<!-- #Content# -->
<?= $this->section('content'); ?>

<div class="page-breadcrumb">
  <div class="row">
    <div class="col-12 d-flex no-block align-items-center">
      <h4 class="page-title">Add New Account</h4>
      <div class="ms-auto text-end">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url('admin/users'); ?>">Manage Accounts</a></li>
            <li class="breadcrumb-item active" aria-current="page">
              Add New Account
            </li>
          </ol>
        </nav>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <form class="form-horizontal">
                    <div class="card-body">
                        <h4 class="card-title">User Form</h4>

                        <div class="form-group row">
                            <label class="col-sm-2 control-label col-form-label">Photo <span class="required">*</span></label>
                            <div class="col-sm-3">
                                <img src="<?= base_url(); ?>/public/themes/global/images/user.png" width="150px" id="imgUserPhoto" style="cursor: pointer" class="img-responsive" />
                                <div style="display: none">
                                    <input class="form-control" id="txtUserPhoto" name="txtUserPhoto" placeholder="" type="file" accept="image/x-png,image/jpeg" onchange="display_image(this, 'imgUserPhoto', '150', '100', 'txtUserPhotoHolder');">

                                    <input type="hidden" id="txtUserPhotoHolder" name="txtUserPhotoHolder" />
                                </div>
                            </div>
                            <label class="col-sm-2 control-label col-form-label">User Role <span class="required">*</span></label>
                            <div class="col-sm-5">
                                <select class="form-select shadow-none" id="role" name="role">
                                    <?php foreach ($getAllRoles as $rowRoles): ?>
                                        <option value="<?= $rowRoles['id']; ?>"><?= $rowRoles['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 control-label col-form-label">Full Name <span class="required">*</span></label>
                            <div class="col-sm-5">
                                <input type="text"  class="form-control" id="first_name" name="first_name" placeholder="First Name" />
                            </div>
                            <div class="col-sm-5">
                                <input type="text"  class="form-control" id="last_name" name="last_name" placeholder="Last Name" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 control-label col-form-label">Email Address <span class="required">*</span><br/><small>(This will be your username)</small></label>
                            <div class="col-sm-10">
                                <input type="text"  class="form-control" id="email" name="email" placeholder="Email Address" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 control-label col-form-label">Contact Number <span class="required">*</span></label>
                            <div class="col-sm-10">
                                <input type="text"  class="form-control" id="phone" name="phone" placeholder="Mobile or Phone" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 control-label col-form-label">Staff ID <small>(Optional)</small></label>
                            <div class="col-sm-4">
                                <input type="text"  class="form-control" id="staffid" name="staffid" placeholder="Staff ID" />
                            </div>
                            <label class="col-sm-2 control-label col-form-label">Position <small>(Optional)</small></label>
                            <div class="col-sm-4">
                                <input type="text"  class="form-control" id="position" name="position" placeholder="Position" />
                            </div>
                        </div>
                    </div>

                    <div class="border-top">
                        <div class="card-body text-end">
                            <a href="<?= base_url(); ?>/admin/users" class="btn btn-warning">Cancel</a>
                            <button type="button" class="btn btn-<?= $systemConfiguration['theme']; ?>" id="btnPostSubmit" name="btnPostSubmit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<?= $this->endSection(); ?>

<!-- #Footer# -->
<?= $this->section('custom_footer'); ?>

<script src="<?= base_url() ?>/modules/Users/JSCSS/users_add.js"></script>

<?= $this->endSection(); ?>
