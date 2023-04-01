<?= $this->extend('../../public/themes/admin/template'); ?>

<!-- #Header# -->
<?= $this->section('custom_header'); ?>

<?= $this->endSection(); ?>

<!-- #Content# -->
<?= $this->section('content'); ?>

<div class="page-breadcrumb">
  <div class="row">
    <div class="col-12 d-flex no-block align-items-center">
      <h4 class="page-title">User Profile</h4>
      <div class="ms-auto text-end">
        <nav aria-label="breadcrumb">
        </nav>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid">
    <div class="row">

        <div class="col-md-12">
            <div class="card">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#userprofile" role="tab">
                            <span class="hidden-sm-up"></span> <span class="hidden-xs-down">User Profile</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#changepassword" role="tab">
                            <span class="hidden-sm-up"></span> <span class="hidden-xs-down">Change Password</span>
                        </a>
                    </li>
                </ul>

                <div class="tab-content tabcontent-border">
                    <div class="tab-pane fade show active" id="userprofile" role="tabpanel">
                        <form class="form-horizontal">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 control-label col-form-label">Photo <span class="required">*</span></label>
                                    <div class="col-sm-3">
                                        <img src="<?= $getUserDataForUpdate['photo']; ?>" width="150px" id="imgUserPhoto" style="cursor: pointer" class="img-responsive" />
                                        <div style="display: none">
                                            <input class="form-control" id="txtUserPhoto" name="txtUserPhoto" placeholder="" type="file" accept="image/x-png,image/jpeg" onchange="display_image(this, 'imgUserPhoto', '150', '100', 'txtUserPhotoHolder');">

                                            <input type="hidden" id="txtUserPhotoHolder" name="txtUserPhotoHolder" value="<?= $getUserDataForUpdate['photo'] ?>" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 control-label col-form-label">Full Name <span class="required">*</span></label>
                                    <div class="col-sm-5">
                                        <input type="text"  class="form-control" id="first_name" name="first_name" placeholder="First Name" value="<?= $getUserDataForUpdate['first_name']; ?>" />
                                    </div>
                                    <div class="col-sm-5">
                                        <input type="text"  class="form-control" id="last_name" name="last_name" placeholder="Last Name" value="<?= $getUserDataForUpdate['last_name']; ?>" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 control-label col-form-label">Contact Number <span class="required">*</span></label>
                                    <div class="col-sm-10">
                                        <input type="text"  class="form-control" id="phone" name="phone" placeholder="Mobile or Phone" value="<?= $getUserDataForUpdate['phone']; ?>" />
                                    </div>
                                </div>

                                <hr>

                                <div class="form-group row">
                                    <label class="col-sm-2 control-label col-form-label">Email Address </label>
                                    <div class="col-sm-10">
                                        <label class="form-control"><?= $getUserDataForUpdate['email']; ?></label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 control-label col-form-label">Staff ID </label>
                                    <div class="col-sm-4">
                                        <label class="form-control"><?= $getUserDataForUpdate['staff_id']; ?></label>
                                    </div>
                                    <label class="col-sm-2 control-label col-form-label">Position </label>
                                    <div class="col-sm-4">
                                        <label class="form-control"><?= $getUserDataForUpdate['title']; ?></label>
                                    </div>
                                </div>
                            </div>

                            <div class="border-top">
                                <div class="card-body text-end">
                                    <button type="button" class="btn btn-<?= $systemConfiguration['theme']; ?>" id="btnPostSubmit" name="btnPostSubmit">Save Changes</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane fade show" id="changepassword" role="tabpanel">
                        <form action="" class="form-horizontal">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label class="col-sm-2 control-label col-form-label">Old Password <span class="required">*</span></label>
                                    <div class="col-sm-5">
                                        <input type="password"  class="form-control" id="oldPassword" name="oldPassword" placeholder="Enter your old password" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 control-label col-form-label">New Password <span class="required">*</span></label>
                                    <div class="col-sm-5">
                                        <input type="password"  class="form-control" id="newPassword" name="newPassword" placeholder="Enter your new password" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-2 control-label col-form-label">Confirm Password <span class="required">*</span></label>
                                    <div class="col-sm-5">
                                        <input type="password"  class="form-control" id="confirmNewPassword" name="confirmNewPassword" placeholder="Confirm your new password" />
                                    </div>
                                </div>
                            </div>
                            <div class="border-top">
                                <div class="card-body text-end">
                                    <button type="button" class="btn btn-<?= $systemConfiguration['theme']; ?>" id="btnCPPostSubmit" name="btnCPPostSubmit">Change Password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <input type="hidden" id="txtUserID" name="txtUserID" value="<?= $getUserDataForUpdate['id']; ?>" />

    </div>
</div>

<?= $this->endSection(); ?>

<!-- #Footer# -->
<?= $this->section('custom_footer'); ?>

<script src="<?= base_url() ?>/modules/Users/JSCSS/users_profile.js"></script>

<?= $this->endSection(); ?>
