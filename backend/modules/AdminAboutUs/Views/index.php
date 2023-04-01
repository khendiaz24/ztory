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
               <h4 class="page-title">About Us</h4>

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
                              <a class="nav-link active" data-bs-toggle="tab" href="#intro" role="tab">
                                   <span class="hidden-sm-up"></span> <span class="hidden-xs-down">Introduction</span>
                              </a>
                         </li>
                         <li class="nav-item">
                              <a class="nav-link" data-bs-toggle="tab" href="#obb" role="tab">
                                   <span class="hidden-sm-up"></span> <span class="hidden-xs-down">Our Brand Blueprint</span>
                              </a>
                         </li>
                         <li class="nav-item">
                              <a class="nav-link" data-bs-toggle="tab" href="#obp" role="tab">
                                   <span class="hidden-sm-up"></span> <span class="hidden-xs-down">Our Brand Philosophy</span>
                              </a>
                         </li>
                         <li class="nav-item">
                              <a class="nav-link" data-bs-toggle="tab" href="#oc" role="tab">
                                   <span class="hidden-sm-up"></span> <span class="hidden-xs-down">Our Concept</span>
                              </a>
                         </li>
                         <li class="nav-item">
                              <a class="nav-link" data-bs-toggle="tab" href="#os" role="tab">
                                   <span class="hidden-sm-up"></span> <span class="hidden-xs-down">Our Services</span>
                              </a>
                         </li>
                         <li class="nav-item">
                              <a class="nav-link" data-bs-toggle="tab" href="#owc" role="tab">
                                   <span class="hidden-sm-up"></span> <span class="hidden-xs-down">Our Wonderful Clients</span>
                              </a>
                         </li>
                    </ul>

                    <div class="tab-content tabcontent-border">
                         <div class="tab-pane fade show active" id="intro" role="tabpanel">
                              <?php echo form_open_multipart("admin/aboutus", array("class" => "form-horizontal form-label-left", "id" => "frmintro"));?>
                                   <div class="card-body">
                                        <div class="form-group row">
                                             <label class="col-sm-2 control-label col-form-label">Banner <span class="required">*</span></label>
                                             <div class="col-sm-4">
                                                  <img src="<?= base_url('public/assets/uploads/aboutus/'.$getAboutUsData['banner']); ?>" width="150px" id="imgBanner" style="cursor: pointer" class="img-responsive" />
                                                  <div style="display: none">
                                                       <input class="form-control" id="txtIMGBanner" name="txtIMGBanner" placeholder="" type="file" accept="image/x-png,image/jpeg" onchange="display_image(this, 'imgBanner', '150', '0');">
                                                       <input type="hidden" id="txtOLDIMGBanner" name="txtOLDIMGBanner" value="<?= $getAboutUsData['banner']; ?>" />
                                                  </div>
                                             </div>
                                        </div>
                                        <div class="form-group row">
                                             <label class="col-sm-2 control-label col-form-label">Header (TC) <span class="required">*</span></label>
                                             <div class="col-sm-10">
                                                  <input type="text"  class="form-control" id="txtTitleTC" name="txtTitleTC" required value="<?= $getAboutUsData['title']; ?>" />
                                             </div>
                                        </div>
                                        <div class="form-group row">
                                             <label class="col-sm-2 control-label col-form-label">Header (SC) <span class="required">*</span></label>
                                             <div class="col-sm-10">
                                                  <input type="text"  class="form-control" id="txtTitleSC" name="txtTitleSC" required value="<?= $getAboutUsData['title_sc']; ?>" />
                                             </div>
                                        </div>
                                        <div class="form-group row">
                                             <label class="col-sm-2 control-label col-form-label">Header (EN) <span class="required">*</span></label>
                                             <div class="col-sm-10">
                                                  <input type="text"  class="form-control" id="txtTitleEN" name="txtTitleEN" required value="<?= $getAboutUsData['title_en']; ?>" />
                                             </div>
                                        </div>

                                        <div class="form-group row">
                                             <label class="col-sm-2 control-label col-form-label">Introduction (TC) <span class="required">*</span></label>
                                             <textarea class="form-control" name="txtIntroTC" id="txtIntroTC" cols="30" rows="5"><?= $getAboutUsData['introduction']; ?></textarea>
                                        </div>
                                        <div class="form-group row">
                                             <label class="col-sm-2 control-label col-form-label">Introduction (SC) <span class="required">*</span></label>
                                             <textarea class="form-control" name="txtIntroSC" id="txtIntroSC" cols="30" rows="5"><?= $getAboutUsData['introduction_sc']; ?></textarea>
                                        </div>
                                        <div class="form-group row">
                                             <label class="col-sm-2 control-label col-form-label">Introduction (EN) <span class="required">*</span></label>
                                             <textarea class="form-control" name="txtIntroEN" id="txtIntroEN" cols="30" rows="5"><?= $getAboutUsData['introduction_en']; ?></textarea>
                                        </div>

                                        <div class="form-group row">
                                             <label class="col-sm-2 control-label col-form-label">Details (TC) <span class="required">*</span></label>
                                             <textarea class="form-control" name="txtDetailsTC" id="txtDetailsTC" cols="30" rows="5"><?= $getAboutUsData['description']; ?></textarea>
                                        </div>
                                        <div class="form-group row">
                                             <label class="col-sm-2 control-label col-form-label">Details (SC) <span class="required">*</span></label>
                                             <textarea class="form-control" name="txtDetailsSC" id="txtDetailsSC" cols="30" rows="5"><?= $getAboutUsData['description_sc']; ?></textarea>
                                        </div>
                                        <div class="form-group row">
                                             <label class="col-sm-2 control-label col-form-label">Details (EN) <span class="required">*</span></label>
                                             <textarea class="form-control" name="txtDetailsEN" id="txtDetailsEN" cols="30" rows="5"><?= $getAboutUsData['description_en']; ?></textarea>
                                        </div>
                                   </div>
                                   <div class="border-top">
                                        <div class="card-body" style="text-align: right">
                                             <button type="submit" id="btnISubmit" name="btnISubmit" class="btn btn-<?= $systemConfiguration['theme']; ?>" value="1">Save Changes</button>
                                        </div>
                                   </div>
                              <?php echo form_close();?>
                         </div>

                         <div class="tab-pane fade show" id="obb" role="tabpanel">
                              <div class="card-body">
                                   <div style="text-align: left">
                                        <h5>Our Brand Blueprint</h5>
                                   </div>
                                   <div style="text-align: right">
                                        <button class="btn btn-outline btn-<?= $systemConfiguration['theme']; ?>" data-bs-toggle="modal" data-bs-target="#mdl_obb"><i class="fa fa-plus-circle"></i> Add New</button>
                                   </div>
                              </div>
                              <table id="tblOBB" class="table table-striped table-bordered hover" width="100%" cellspacing="0">
                                   <thead>
                                        <tr>
                                             <th>#</th>
                                             <th>Icon</th>
                                             <th>Label (TC)</th>
                                             <th>Label (SC)</th>
                                             <th>Label (EN)</th>
                                             <th>Sequence</th>
                                             <th>Actions</th>
                                        </tr>
                                   </thead>
                              </table>
                         </div>

                         <div class="tab-pane fade show" id="obp" role="tabpanel">
                              <?php echo form_open_multipart("admin/aboutus", array("class" => "form-horizontal form-label-left", "id" => "frmobp"));?>
                                   <div class="card-body">
                                        <div class="form-group row">
                                             <label class="col-sm-2 control-label col-form-label">Details (TC) <span class="required">*</span></label>
                                             <textarea class="form-control" name="txtOBPDetailsTC" id="txtOBPDetailsTC" cols="30" rows="5"><?= $getAboutUsData['obp_details']; ?></textarea>
                                        </div>
                                        <div class="form-group row">
                                             <label class="col-sm-2 control-label col-form-label">Details (SC) <span class="required">*</span></label>
                                             <textarea class="form-control" name="txtOBPDetailsSC" id="txtOBPDetailsSC" cols="30" rows="5"><?= $getAboutUsData['obp_details_sc']; ?></textarea>
                                        </div>
                                        <div class="form-group row">
                                             <label class="col-sm-2 control-label col-form-label">Details (EN) <span class="required">*</span></label>
                                             <textarea class="form-control" name="txtOBPDetailsEN" id="txtOBPDetailsEN" cols="30" rows="5"><?= $getAboutUsData['obp_details_en']; ?></textarea>
                                        </div>
                                   </div>
                                   <div class="border-top">
                                        <div class="card-body" style="text-align: right">
                                             <button type="submit" id="btnOBPSubmit" name="btnOBPSubmit" class="btn btn-<?= $systemConfiguration['theme']; ?>" value="1">Save Changes</button>
                                        </div>
                                   </div>
                              <?php echo form_close(); ?>
                         </div>

                         <div class="tab-pane fade show" id="oc" role="tabpanel">
                              <div class="card-body">
                                   <div style="text-align: left">
                                        <h5>Our Concept</h5>
                                   </div>
                                   <div style="text-align: right">
                                        <button class="btn btn-outline btn-<?= $systemConfiguration['theme']; ?>" data-bs-toggle="modal" data-bs-target="#mdl_oc"><i class="fa fa-plus-circle"></i> Add New</button>
                                   </div>
                              </div>
                              <table id="tblOC" class="table table-striped table-bordered hover" width="100%" cellspacing="0">
                                   <thead>
                                        <tr>
                                             <th>#</th>
                                             <th>Title</th>
                                             <th>Details</th>
                                             <th>Actions</th>
                                        </tr>
                                   </thead>
                              </table>
                         </div>

                         <div class="tab-pane fade show" id="os" role="tabpanel">
                              <?php echo form_open_multipart("admin/aboutus", array("class" => "form-horizontal form-label-left", "id" => "frmos"));?>
                                   <div class="card-body">
                                        <div class="form-group row">
                                             <label class="col-sm-2 control-label col-form-label">Details (TC) <span class="required">*</span></label>
                                             <textarea class="form-control" name="txtOSDetailsTC" id="txtOSDetailsTC" cols="30" rows="5"><?= $getAboutUsData['os_details']; ?></textarea>
                                        </div>
                                        <div class="form-group row">
                                             <label class="col-sm-2 control-label col-form-label">Details (SC) <span class="required">*</span></label>
                                             <textarea class="form-control" name="txtOSDetailsSC" id="txtOSDetailsSC" cols="30" rows="5"><?= $getAboutUsData['os_details_sc']; ?></textarea>
                                        </div>
                                        <div class="form-group row">
                                             <label class="col-sm-2 control-label col-form-label">Details (EN) <span class="required">*</span></label>
                                             <textarea class="form-control" name="txtOSDetailsEN" id="txtOSDetailsEN" cols="30" rows="5"><?= $getAboutUsData['os_details_en']; ?></textarea>
                                        </div>
                                   </div>
                                   <div class="border-top">
                                        <div class="card-body" style="text-align: right">
                                             <button type="submit" id="btnOSPSubmit" name="btnOSPSubmit" class="btn btn-<?= $systemConfiguration['theme']; ?>" value="1">Save Changes</button>
                                        </div>
                                   </div>
                              <?php echo form_close(); ?>

                              <div class="card-body">
                                   <hr>
                              </div>

                              
                              <div class="card-body">
                                   <div style="text-align: left">
                                        <h5>Our Services</h5>
                                   </div>
                                   <div style="text-align: right">
                                        <button class="btn btn-outline btn-<?= $systemConfiguration['theme']; ?>" data-bs-toggle="modal" data-bs-target="#mdl_os"><i class="fa fa-plus-circle"></i> Add New</button>
                                   </div>
                              </div>
                              <table id="tblOS" class="table table-striped table-bordered hover" width="100%" cellspacing="0">
                                   <thead>
                                        <tr>
                                             <th>#</th>
                                             <th>Category</th>
                                             <th>Details</th>
                                             <th>Actions</th>
                                        </tr>
                                   </thead>
                              </table>
                         </div>

                         <div class="tab-pane fade show" id="owc" role="tabpanel">
                              <div class="card-body">
                                   <div style="text-align: left">
                                        <h5>Our Wonderful Clients</h5>
                                   </div>
                                   <div style="text-align: right">
                                        <button class="btn btn-outline btn-<?= $systemConfiguration['theme']; ?>" id="btnUOWCClientLogo"><i class="fa fa-plus-circle"></i> Upload Client Logo</button>
                                   </div>
                              </div>
                              <table id="tblOWC" class="table table-striped table-bordered hover" width="100%" cellspacing="0">
                                   <thead>
                                        <tr>
                                             <th>#</th>
                                             <th>Client Logo</th>
                                             <th>Actions</th>
                                        </tr>
                                   </thead>
                              </table>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>

<div class="modal fade" id="mdl_obb" aria-labelledby="rolesmodal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
     <div class="modal-dialog modal-lg">
          <div class="modal-content">
               <?php echo form_open_multipart("admin/aboutus", array("class" => "form-horizontal form-label-left", "id" => "frm"));?>
                    <div class="modal-header">
                         <h5 class="modal-title">Our Branding Blueprint</h5>
                         <button type="button" class="btn-close" id="btnOBBClose"></button>
                    </div>
                    <div class="modal-body">
                         <div class="form-group row">
                              <label class="col-sm-2 control-label col-form-label">Icon <span class="required">*</span></label>
                              <div class="col-sm-10">
                                   <img src="<?= base_url('public/themes/global/images/default_image.jpg'); ?>" width="150px" id="imgOBBIcon" style="cursor: pointer" class="img-responsive" />
                                   <div style="display: none">
                                        <input class="form-control" id="txtOBBIMGIcon" name="txtOBBIMGIcon" placeholder="" type="file" accept="image/x-png,image/jpeg" onchange="display_image(this, 'imgOBBIcon', '150', '0');" required>
                                        <input type="hidden" id="txtOLDOBBIMGIcon" name="txtOLDOBBIMGIcon" />
                                   </div>
                              </div>
                         </div>
                         <div class="form-group row">
                              <label class="col-sm-2 control-label col-form-label">Label (TC) <span class="required">*</span></label>
                              <div class="col-sm-10">
                                   <input type="text" class="form-control" id="txtOBBLabelTC" name="txtOBBLabelTC" required />
                              </div>
                         </div>
                         <div class="form-group row">                         
                              <label class="col-sm-2 control-label col-form-label">Label (SC) <span class="required">*</span></label>
                              <div class="col-sm-10">
                                   <input type="text" class="form-control" id="txtOBBLabelSC" name="txtOBBLabelSC" required />
                              </div>
                         </div>
                         <div class="form-group row">                         
                              <label class="col-sm-2 control-label col-form-label">Label (EN) <span class="required">*</span></label>
                              <div class="col-sm-10">
                                   <input type="text" class="form-control" id="txtOBBLabelEN" name="txtOBBLabelEN" required />
                              </div>
                         </div>
                    </div>

                    <input type="hidden" id="txtOBBID" name="txtOBBID" value="" />
                    <input type="hidden" id="txtOBBProcess" name="txtOBBProcess" value="add" />

                    <div class="modal-footer">
                         <button type="submit" id="btnOBBSubmit" name="btnOBBSubmit" class="btn btn-<?= $systemConfiguration['theme']; ?>" value="1">Save</button>
                    </div>
               <?php echo form_close();?>
          </div>
     </div>
</div>

<div class="modal fade" id="mdl_oc" aria-labelledby="rolesmodal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
     <div class="modal-dialog modal-lg">
          <div class="modal-content">
               <?php echo form_open_multipart("admin/aboutus", array("class" => "form-horizontal form-label-left", "id" => "frm"));?>
                    <div class="modal-header">
                         <h5 class="modal-title">Our Concept</h5>
                         <button type="button" class="btn-close" id="btnOCClose"></button>
                    </div>
                    <div class="modal-body">
                         <div class="form-group row">
                              <label class="col-sm-2 control-label col-form-label">Title (TC) <span class="required">*</span></label>
                              <div class="col-sm-10">
                                   <input type="text" class="form-control" id="txtOCTitleTC" name="txtOCTitleTC" required />
                              </div>
                         </div>
                         <div class="form-group row">                         
                              <label class="col-sm-2 control-label col-form-label">Title (SC) <span class="required">*</span></label>
                              <div class="col-sm-10">
                                   <input type="text" class="form-control" id="txtOCTitleSC" name="txtOCTitleSC" required />
                              </div>
                         </div>
                         <div class="form-group row">                         
                              <label class="col-sm-2 control-label col-form-label">Title (EN) <span class="required">*</span></label>
                              <div class="col-sm-10">
                                   <input type="text" class="form-control" id="txtOCTitleEN" name="txtOCTitleEN" required />
                              </div>
                         </div>

                         <div class="form-group row">
                              <label class="col-sm-2 control-label col-form-label">Details (TC) <span class="required">*</span></label>
                              <textarea class="form-control" name="txtOCDetailsTC" id="txtOCDetailsTC" cols="30" rows="5"></textarea>
                         </div>
                         <div class="form-group row">
                              <label class="col-sm-2 control-label col-form-label">Details (SC) <span class="required">*</span></label>
                              <textarea class="form-control" name="txtOCDetailsSC" id="txtOCDetailsSC" cols="30" rows="5"></textarea>
                         </div>
                         <div class="form-group row">
                              <label class="col-sm-2 control-label col-form-label">Details (EN) <span class="required">*</span></label>
                              <textarea class="form-control" name="txtOCDetailsEN" id="txtOCDetailsEN" cols="30" rows="5"></textarea>
                         </div>
                    </div>

                    <input type="hidden" id="txtOCID" name="txtOCID" value="" />
                    <input type="hidden" id="txtOCProcess" name="txtOCProcess" value="add" />

                    <div class="modal-footer">
                         <button type="submit" id="btnOCSubmit" name="btnOCSubmit" class="btn btn-<?= $systemConfiguration['theme']; ?>" value="1">Save</button>
                    </div>
               <?php echo form_close();?>
          </div>
     </div>
</div>

<div class="modal fade" id="mdl_os" aria-labelledby="rolesmodal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
     <div class="modal-dialog modal-lg">
          <div class="modal-content">
               <?php echo form_open_multipart("admin/aboutus", array("class" => "form-horizontal form-label-left", "id" => "frm"));?>
                    <div class="modal-header">
                         <h5 class="modal-title">Our Services</h5>
                         <button type="button" class="btn-close" id="btnOSBClose"></button>
                    </div>
                    <div class="modal-body">
                         <div class="form-group row">
                              <label class="col-sm-2 control-label col-form-label">Category (TC) <span class="required">*</span></label>
                              <div class="col-sm-10">
                                   <input type="text" class="form-control" id="txtOSBCategoryTC" name="txtOSBCategoryTC" required />
                              </div>
                         </div>
                         <div class="form-group row">                         
                              <label class="col-sm-2 control-label col-form-label">Category (SC) <span class="required">*</span></label>
                              <div class="col-sm-10">
                                   <input type="text" class="form-control" id="txtOSBCategorySC" name="txtOSBCategorySC" required />
                              </div>
                         </div>
                         <div class="form-group row">                         
                              <label class="col-sm-2 control-label col-form-label">Category (EN) <span class="required">*</span></label>
                              <div class="col-sm-10">
                                   <input type="text" class="form-control" id="txtOSBCategoryEN" name="txtOSBCategoryEN" required />
                              </div>
                         </div>

                         <div class="form-group row">
                              <label class="col-sm-2 control-label col-form-label">Details (EN) <span class="required">*</span></label>
                              <div id="OSBDetailsTC"></div>
                              <input type="hidden" id="txtOSBDetailsTC" name="txtOSBDetailsTC" required />
                         </div>
                         <div class="form-group row">
                              <label class="col-sm-2 control-label col-form-label">Details (TC) <span class="required">*</span></label>
                              <div id="OSBDetailsSC"></div>
                              <input type="hidden" id="txtOSBDetailsSC" name="txtOSBDetailsSC" required />
                         </div>
                         <div class="form-group row">
                              <label class="col-sm-2 control-label col-form-label">Details (TC) <span class="required">*</span></label>
                              <div id="OSBDetailsEN"></div>
                              <input type="hidden" id="txtOSBDetailsEN" name="txtOSBDetailsEN" required />
                         </div>
                    </div>

                    <input type="hidden" id="txtOSBID" name="txtOSBID" value="" />
                    <input type="hidden" id="txtOSBProcess" name="txtOSBProcess" value="add" />

                    <div class="modal-footer">
                         <button type="submit" id="txtOSBSubmit" name="txtOSBSubmit" class="btn btn-<?= $systemConfiguration['theme']; ?>" value="1">Save</button>
                    </div>
               <?php echo form_close();?>
          </div>
     </div>
</div>

<div style="display: none">
<?php echo form_open_multipart("admin/aboutus", array("class" => "form-horizontal form-label-left", "id" => "frmowc"));?>
     <input class="form-control" id="txtOWCLogo" name="txtOWCLogo" placeholder="" type="file" accept="image/x-png,image/jpeg" required>
     <button type="submit" id="btnOWCSubmit" name="btnOWCSubmit" class="btn btn-<?= $systemConfiguration['theme']; ?>" value="1">Upload</button>
<?php echo form_close();?>
</div>

<?= $this->endSection(); ?>

<?= $this->section('custom_footer'); ?>

<!-- DataTables -->
<script src="<?= base_url('/public/themes/admin/assets/extra-libs/DataTables/datatables.min.js'); ?>"></script>
<!-- Global -->
<script src="<?= base_url('/public/themes/global/js/global_datatable.js') ?>"></script>

<!-- Specific -->
<script src="<?= base_url() ?>/modules/AdminAboutUs/JSCSS/index.js"></script>

<?= $this->endSection(); ?>
