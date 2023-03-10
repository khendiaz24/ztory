<?= $this->extend('../../public/themes/admin/template'); ?>

<?= $this->section('custom_header'); ?>

<!-- DataTables -->
<link href="<?= base_url('/public/themes/admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css'); ?>" rel="stylesheet" />

<style> .ql-editor { height: 250px; } </style>

<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="page-breadcrumb">
     <div class="row">
          <div class="col-12 d-flex no-block align-items-center">
               <h4 class="page-title">Projects</h4>

               <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb" style="display: none">
                         <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="#">Home</a></li>
                              <li class="breadcrumb-item active" aria-current="page">
                                   Library
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
                    <ul class="nav nav-tabs" role="tablist">
                         <li class="nav-item">
                              <a class="nav-link active" data-bs-toggle="tab" href="#lists" role="tab">
                                   <span class="hidden-sm-up"></span> <span class="hidden-xs-down">Lists</span>
                              </a>
                         </li>
                         <li class="nav-item">
                              <a class="nav-link" data-bs-toggle="tab" href="#categories" role="tab">
                                   <span class="hidden-sm-up"></span> <span class="hidden-xs-down">Categories</span>
                              </a>
                         </li>
                         <li class="nav-item">
                              <a class="nav-link" data-bs-toggle="tab" href="#banner" role="tab">
                                   <span class="hidden-sm-up"></span> <span class="hidden-xs-down">Banner</span>
                              </a>
                         </li>
                    </ul>

                    <div class="tab-content tabcontent-border">
                         <div class="tab-pane fade show active" id="lists" role="tabpanel">
                              <div class="card-body">
                                   <div style="text-align: left">
                                        <h5></h5>
                                   </div>
                                   <div style="text-align: right">
                                        <button class="btn btn-outline btn-<?= $systemConfiguration['theme']; ?>" data-bs-toggle="modal" data-bs-target="#mdl"><i class="fa fa-plus-circle"></i> Add New</button>
                                   </div>
                              </div>
                              <table id="tblLists" class="table table-striped table-bordered hover" width="100%" cellspacing="0">
                                   <thead>
                                        <tr>
                                             <th>#</th>
                                             <th>Banner</th>
                                             <th>Project Name</th>
                                             <th>Client</th>
                                             <th>Status</th>
                                             <th>Actions</th>
                                        </tr>
                                   </thead>
                              </table>
                         </div>

                         <div class="tab-pane fade show" id="categories" role="tabpanel">
                              <div class="card-body">
                                   <div style="text-align: left">
                                        <h5></h5>
                                   </div>
                                   <div style="text-align: right">
                                        <button class="btn btn-outline btn-<?= $systemConfiguration['theme']; ?>" data-bs-toggle="modal" data-bs-target="#mdl_cat"><i class="fa fa-plus-circle"></i> Add New</button>
                                   </div>
                              </div>
                              <table id="tblCatLists" class="table table-striped table-bordered hover" width="100%" cellspacing="0">
                                   <thead>
                                        <tr>
                                             <th>#</th>
                                             <th>Name (TC)</th>
                                             <th>Name (SC)</th>
                                             <th>Name (EN)</th>
                                             <th>Actions</th>
                                        </tr>
                                   </thead>
                              </table>
                         </div>

                         <div class="tab-pane fade show" id="banner" role="tabpanel">
                              <?php echo form_open_multipart("admin/projects", array("class" => "form-horizontal form-label-left", "id" => "frm"));?>
                                   <div class="card-body">
                                        <div class="form-group row">
                                             <label class="col-sm-2 control-label col-form-label">Title (TC) <span class="required">*</span></label>
                                             <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="txtBNTitleTC" name="txtBNTitleTC" value="<?= $getProjectHeaderData['title']; ?>" required />
                                             </div>
                                        </div>
                                        <div class="form-group row">
                                             <label class="col-sm-2 control-label col-form-label">Title (SC) <span class="required">*</span></label>
                                             <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="txtBNTitleSC" name="txtBNTitleSC" value="<?= $getProjectHeaderData['title_sc']; ?>" required />
                                             </div>
                                        </div>
                                        <div class="form-group row">
                                             <label class="col-sm-2 control-label col-form-label">Title (EN) <span class="required">*</span></label>
                                             <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="txtBNTitleEN" name="txtBNTitleEN" value="<?= $getProjectHeaderData['title_en']; ?>" required />
                                             </div>
                                        </div>
                                   </div>
                                   <div class="modal-footer">
                                        <button type="submit" id="btnBNSubmit" name="btnBNSubmit" class="btn btn-<?= $systemConfiguration['theme']; ?>" value="1">Save Changes</button>
                                   </div>
                              <?php echo form_close();?>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>

<div class="modal fade" id="mdl" aria-labelledby="rolesmodal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
     <div class="modal-dialog modal-lg">
          <div class="modal-content">
               <?php echo form_open_multipart("admin/projects", array("class" => "form-horizontal form-label-left", "id" => "frm"));?>
                    <div class="modal-header">
                         <h5 class="modal-title">Add New Projects</h5>
                         <button type="button" class="btn-close" id="btnClose"></button>
                    </div>
                    <div class="modal-body">
                         <div class="form-group row">
                              <label class="col-sm-2 control-label col-form-label">Banner <span class="required">*</span></label>
                              <div class="col-sm-10">
                                   <img src="<?= base_url('public/themes/global/images/default_image.jpg'); ?>" width="150px" id="imgBanner" style="cursor: pointer" class="img-responsive" />
                                   <div style="display: none">
                                        <input class="form-control" id="txtIMGBanner" name="txtIMGBanner" placeholder="" type="file" accept="image/x-png,image/jpeg" onchange="display_image(this, 'imgBanner', '150', '0');" required>
                                   </div>
                              </div>
                         </div>

                         <div class="form-group row">
                              <label class="col-sm-2 control-label col-form-label">Project Name (TC) <span class="required">*</span></label>
                              <div class="col-sm-10">
                                   <input type="text" class="form-control" id="txtTitleTC" name="txtTitleTC" required />
                              </div>
                         </div>
                         <div class="form-group row">                         
                              <label class="col-sm-2 control-label col-form-label">Project Name (SC) <span class="required">*</span></label>
                              <div class="col-sm-10">
                                   <input type="text" class="form-control" id="txtTitleSC" name="txtTitleSC" required />
                              </div>
                         </div>
                         <div class="form-group row">                         
                              <label class="col-sm-2 control-label col-form-label">Project Name (EN) <span class="required">*</span></label>
                              <div class="col-sm-10">
                                   <input type="text" class="form-control" id="txtTitleEN" name="txtTitleEN" required />
                              </div>
                         </div>
                         
                         <div class="form-group row">
                              <label class="col-sm-2 control-label col-form-label">Details (TC) <span class="required">*</span></label>
                              <textarea class="form-control" name="txtDetailsTC" id="txtDetailsTC" cols="30" rows="5"></textarea>
                         </div>
                         <div class="form-group row">
                              <label class="col-sm-2 control-label col-form-label">Details (SC) <span class="required">*</span></label>
                              <textarea class="form-control" name="txtDetailsSC" id="txtDetailsSC" cols="30" rows="5"></textarea>
                         </div>
                         <div class="form-group row">
                              <label class="col-sm-2 control-label col-form-label">Details (EN) <span class="required">*</span></label>
                              <textarea class="form-control" name="txtDetailsEN" id="txtDetailsEN" cols="30" rows="5"></textarea>
                         </div>

                         <div class="form-group row">
                              <label class="col-sm-2 control-label col-form-label">Client (TC) <span class="required">*</span></label>
                              <div class="col-sm-10">
                                   <input type="text" class="form-control" id="txtClientTC" name="txtClientTC" required />
                              </div>
                         </div>
                         <div class="form-group row">                         
                              <label class="col-sm-2 control-label col-form-label">Client (SC) <span class="required">*</span></label>
                              <div class="col-sm-10">
                                   <input type="text" class="form-control" id="txtClientSC" name="txtClientSC" required />
                              </div>
                         </div>
                         <div class="form-group row">                         
                              <label class="col-sm-2 control-label col-form-label">Client (EN) <span class="required">*</span></label>
                              <div class="col-sm-10">
                                   <input type="text" class="form-control" id="txtClientEN" name="txtClientEN" required />
                              </div>
                         </div>

                         <div class="form-group row">
                              <label class="col-sm-2 control-label col-form-label">Project Category <span class="required">*</span></label>
                              <div class="col-sm-10">
                                   <select class="form-select shadow-none" name="txtCategory" id="txtCategory" required>
                                        <option value="">- Select Project Category -</option>
                                        <?php foreach ($getAllProjectCatagoriesData as $rowPC): ?>
                                             <option value="<?= $rowPC['id']; ?>"><?= $rowPC['name_en']; ?></option>
                                        <?php endforeach; ?>
                                   </select>
                              </div>
                         </div>

                         <div class="form-group row">
                              <label class="col-sm-2 control-label col-form-label">Template <span class="required">*</span></label>
                              <div class="col-sm-10">
                                   <select class="form-select shadow-none" name="txtTemplate" id="txtTemplate">
                                        <option value="1">Template 1</option>
                                        <option value="2">Template 2</option>
                                   </select>
                              </div>
                         </div>
                    </div>

                    <div class="modal-footer">
                         <button type="submit" id="btnSubmit" name="btnSubmit" class="btn btn-<?= $systemConfiguration['theme']; ?>" value="1">Save</button>
                    </div>
               <?php echo form_close();?>
          </div>
     </div>
</div>

<div class="modal fade" id="mdl_cat" aria-labelledby="rolesmodal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
     <div class="modal-dialog modal-lg">
          <div class="modal-content">
               <?php echo form_open_multipart("admin/projects", array("class" => "form-horizontal form-label-left", "id" => "frm"));?>
                    <div class="modal-header">
                         <h5 class="modal-title">Project Categories</h5>
                         <button type="button" class="btn-close" id="btnCClose"></button>
                    </div>
                    <div class="modal-body">
                         <div class="form-group row">
                              <label class="col-sm-2 control-label col-form-label">Name (TC) <span class="required">*</span></label>
                              <div class="col-sm-10">
                                   <input type="text" class="form-control" id="txtCNameTC" name="txtCNameTC" required />
                              </div>
                         </div>
                         <div class="form-group row">                         
                              <label class="col-sm-2 control-label col-form-label">Name (SC) <span class="required">*</span></label>
                              <div class="col-sm-10">
                                   <input type="text" class="form-control" id="txtCNameSC" name="txtCNameSC" required />
                              </div>
                         </div>
                         <div class="form-group row">                         
                              <label class="col-sm-2 control-label col-form-label">Name (EN) <span class="required">*</span></label>
                              <div class="col-sm-10">
                                   <input type="text" class="form-control" id="txtCNameEN" name="txtCNameEN" required />
                              </div>
                         </div>
                    </div>

                    <input type="hidden" id="txtCID" name="txtCID" value="" />
                    <input type="hidden" id="txtCProcess" name="txtCProcess" value="add" />

                    <div class="modal-footer">
                         <button type="submit" id="btnCSubmit" name="btnCSubmit" class="btn btn-<?= $systemConfiguration['theme']; ?>" value="1">Save</button>
                    </div>
               <?php echo form_close();?>
          </div>
     </div>
</div>

<?= $this->endSection(); ?>

<?= $this->section('custom_footer'); ?>

<!-- DataTables -->
<script src="<?= base_url('/public/themes/admin/assets/extra-libs/DataTables/datatables.min.js'); ?>"></script>
<!-- Global -->
<script src="<?= base_url('/public/themes/global/js/global_datatable.js') ?>"></script>

<!-- Specific -->
<script src="<?= base_url() ?>/modules/AdminProjects/JSCSS/index.js"></script>

<?= $this->endSection(); ?>
