<?= $this->extend('../../public/themes/admin/template'); ?>

<?= $this->section('custom_header'); ?>

<!-- DataTables -->
<link href="<?= base_url('/public/themes/admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css'); ?>" rel="stylesheet" />

<style> .ql-editor { height: 120px; } </style>
<script> var CurrentBrandtellerID = "<?= $getProjectData['id']; ?>"; </script>

<?= $this->endSection(); ?>

<?= $this->section('content'); ?>

<div class="page-breadcrumb">
     <div class="row">
          <div class="col-12 d-flex no-block align-items-center">
               <h4 class="page-title"><?= $getProjectData['title_en'] ?> - Project Edit</h4>

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
                              <a class="nav-link active" data-bs-toggle="tab" href="#header" role="tab">
                                   <span class="hidden-sm-up"></span> <span class="hidden-xs-down">Header</span>
                              </a>
                         </li>
                         <li class="nav-item">
                              <a class="nav-link" data-bs-toggle="tab" href="#intro" role="tab">
                                   <span class="hidden-sm-up"></span> <span class="hidden-xs-down">Intro</span>
                              </a>
                         </li>
                         <li class="nav-item">
                              <a class="nav-link" data-bs-toggle="tab" href="#lm" role="tab">
                                   <span class="hidden-sm-up"></span> <span class="hidden-xs-down">Learn More</span>
                              </a>
                         </li>
                         <li class="nav-item">
                              <a class="nav-link" data-bs-toggle="tab" href="#ba" role="tab">
                                   <span class="hidden-sm-up"></span> <span class="hidden-xs-down">Brand Approach</span>
                              </a>
                         </li>
                         <?php if ($getProjectData['template'] == 1): ?>
                              <li class="nav-item">
                                   <a class="nav-link" data-bs-toggle="tab" href="#bv" role="tab">
                                        <span class="hidden-sm-up"></span> <span class="hidden-xs-down">Brand Volume</span>
                                   </a>
                              </li>
                         <?php endif; ?>
                         <li class="nav-item">
                              <a class="nav-link" data-bs-toggle="tab" href="#md" role="tab">
                                   <span class="hidden-sm-up"></span> <span class="hidden-xs-down">More Details</span>
                              </a>
                         </li>
                         <?php if ($getProjectData['template'] == 2): ?>
                              <li class="nav-item">
                                   <a class="nav-link" data-bs-toggle="tab" href="#events" role="tab">
                                        <span class="hidden-sm-up"></span> <span class="hidden-xs-down">Events</span>
                                   </a>
                              </li>
                         <?php endif; ?>
                         <li class="nav-item">
                              <a class="nav-link" data-bs-toggle="tab" href="#credits" role="tab">
                                   <span class="hidden-sm-up"></span> <span class="hidden-xs-down">Credits</span>
                              </a>
                         </li>
                    </ul>

                    <div class="tab-content tabcontent-border">
                         <div class="tab-pane fade show active" id="header" role="tabpanel">
                              <?php echo form_open_multipart("admin/projects/edit/".$getProjectData['id'], array("class" => "form-horizontal form-label-left", "id" => "frmwbintro"));?>
                                   <div class="card-body">
                                        <div class="form-group row">
                                             <label class="col-sm-2 control-label col-form-label">Banner <span class="required">*</span></label>
                                             <div class="col-sm-4">
                                                  <img src="<?= base_url('public/assets/uploads/projects/'.$getProjectData['banner']); ?>" width="150px" id="imgHBanner" style="cursor: pointer" class="img-responsive" />
                                                  <div style="display: none">
                                                       <input class="form-control" id="txtHBanner" name="txtHBanner" placeholder="" type="file" accept="image/x-png,image/jpeg" onchange="display_image(this, 'imgHBanner', '150', '0');">
                                                       <input type="hidden" id="txtOLDHBanner" name="txtOLDHBanner" value="<?= $getProjectData['banner']; ?>" />
                                                  </div>
                                             </div>
                                        </div>

                                        <div class="form-group row">
                                             <label class="col-sm-2 control-label col-form-label">Project Name (TC) <span class="required">*</span></label>
                                             <div class="col-sm-4">
                                                  <input type="text" class="form-control" id="txtHTitleTC" name="txtHTitleTC" value="<?= $getProjectData['title']; ?>" required />
                                             </div>                         
                                             <label class="col-sm-2 control-label col-form-label">Project Name (SC) <span class="required">*</span></label>
                                             <div class="col-sm-4">
                                                  <input type="text" class="form-control" id="txtHTitleSC" name="txtHTitleSC" value="<?= $getProjectData['title_sc']; ?>" required />
                                             </div>
                                        </div>
                                        <div class="form-group row">                         
                                             <label class="col-sm-2 control-label col-form-label">Project Name (EN) <span class="required">*</span></label>
                                             <div class="col-sm-4">
                                                  <input type="text" class="form-control" id="txtHTitleEN" name="txtHTitleEN" value="<?= $getProjectData['title_en']; ?>" required />
                                             </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                             <label class="col-sm-2 control-label col-form-label">Project Category <span class="required">*</span></label>
                                             <div class="col-sm-4">
                                                  <select class="form-select shadow-none" name="txtHCategory" id="txtHCategory">
                                                       <?php foreach ($getAllProjectCatagoriesData as $rowPC): ?>
                                                            <option value="<?= $rowPC['id']; ?>" <?= ($getProjectData['category_id'] == $rowPC['id']) ? "selected": ""; ?>><?= $rowPC['name_en']; ?></option>
                                                       <?php endforeach; ?>
                                                  </select>
                                             </div>

                                             <label class="col-sm-2 control-label col-form-label">Status <span class="required">*</span></label>
                                             <div class="col-sm-4">
                                                  <select class="form-select shadow-none" name="txtHStatus" id="txtHStatus">
                                                       <option value="0" <?= ($getProjectData['status'] == '0') ? "selected": ""; ?>>Unpublish</option>
                                                       <option value="1" <?= ($getProjectData['status'] == '1') ? "selected": ""; ?>>Published</option>
                                                  </select>
                                             </div>
                                        </div>

                                        <div class="form-group row">
                                             <label class="col-sm-2 control-label col-form-label">Details (TC) <span class="required">*</span></label>
                                             <div class="col-sm-10">
                                                  <textarea class="form-control" name="txtHDetailsTC" id="txtHDetailsTC" cols="30" rows="3" required><?= $getProjectData['description']; ?></textarea>
                                             </div>
                                        </div>
                                        <div class="form-group row">
                                             <label class="col-sm-2 control-label col-form-label">Details (SC) <span class="required">*</span></label>
                                             <div class="col-sm-10">
                                                  <textarea class="form-control" name="txtHDetailsSC" id="txtHDetailsSC" cols="30" rows="3" required><?= $getProjectData['description_sc']; ?></textarea>
                                             </div>
                                        </div>
                                        <div class="form-group row">
                                             <label class="col-sm-2 control-label col-form-label">Details (EN) <span class="required">*</span></label>
                                             <div class="col-sm-10">
                                                  <textarea class="form-control" name="txtHDetailsEN" id="txtHDetailsEN" cols="30" rows="3" required><?= $getProjectData['description_en']; ?></textarea>
                                             </div>
                                        </div>

                                        <div class="form-group row">
                                             <label class="col-sm-2 control-label col-form-label">Client (TC) <span class="required">*</span></label>
                                             <div class="col-sm-4">
                                                  <input type="text" class="form-control" id="txtHClientTC" name="txtHClientTC" value="<?= $getProjectData['client']; ?>" required />
                                             </div>                         
                                             <label class="col-sm-2 control-label col-form-label">Client (SC) <span class="required">*</span></label>
                                             <div class="col-sm-4">
                                                  <input type="text" class="form-control" id="txtHClientSC" name="txtHClientSC" value="<?= $getProjectData['client_sc']; ?>" required />
                                             </div>
                                        </div>
                                        <div class="form-group row">                         
                                             <label class="col-sm-2 control-label col-form-label">Client (EN) <span class="required">*</span></label>
                                             <div class="col-sm-4">
                                                  <input type="text" class="form-control" id="txtHClientEN" name="txtHClientEN" value="<?= $getProjectData['client_en']; ?>" required />
                                             </div>
                                        </div>
                                        <div class="form-group row">
                                             <label class="col-sm-2 control-label col-form-label">What We Did (TC) <span class="required">*</span></label>
                                             <div id="HWWDTC"><?= $getProjectData['wwd']; ?></div>
                                             <input type="hidden" id="txtHWWDTC" name="txtHWWDTC" value="<?= $getProjectData['wwd']; ?>" required />
                                        </div>
                                        <div class="form-group row">
                                             <label class="col-sm-2 control-label col-form-label">What We Did (SC) <span class="required">*</span></label>
                                             <div id="HWWDSC"><?= $getProjectData['wwd']; ?></div>
                                             <input type="hidden" id="txtHWWDSC" name="txtHWWDSC" value="<?= $getProjectData['wwd_sc']; ?>" required />
                                        </div>
                                        <div class="form-group row">
                                             <label class="col-sm-2 control-label col-form-label">What We Did (EN) <span class="required">*</span></label>
                                             <div id="HWWDEN"><?= $getProjectData['wwd']; ?></div>
                                             <input type="hidden" id="txtHWWDEN" name="txtHWWDEN" value="<?= $getProjectData['wwd_en']; ?>" required />
                                        </div>
                                   </div>
                                   <div class="border-top">
                                        <div class="card-body" style="text-align: right">
                                             <button type="submit" id="btnHSubmit" name="btnHSubmit" class="btn btn-<?= $systemConfiguration['theme']; ?>" value="1">Save Changes</button>
                                        </div>
                                   </div>
                              <?php echo form_close();?>
                         </div>

                         <div class="tab-pane fade show" id="intro" role="tabpanel">
                              <?php $IntroImage = (empty($getProjectData['intro_image']) ? $defaultImage : base_url('public/assets/uploads/projects/'.$getProjectData['intro_image'])); ?>
                              <?php echo form_open_multipart("admin/projects/edit/".$getProjectData['id'], array("class" => "form-horizontal form-label-left", "id" => "frmwbintro"));?>
                                   <div class="card-body">
                                        <div class="form-group row">
                                             <label class="col-sm-2 control-label col-form-label">Intro Banner <span class="required">*</span></label>
                                             <div class="col-sm-4">
                                                  <img src="<?= $IntroImage; ?>" width="150px" id="imgIBanner" style="cursor: pointer" class="img-responsive" />
                                                  <div style="display: none">
                                                       <input class="form-control" id="txtIBanner" name="txtIBanner" placeholder="" type="file" accept="image/x-png,image/jpeg" onchange="display_image(this, 'imgIBanner', '150', '0');">
                                                       <input type="hidden" id="txtOLDIBanner" name="txtOLDIBanner" value="<?= $getProjectData['intro_image']; ?>" />
                                                  </div>
                                             </div>
                                        </div>

                                        <div class="form-group row">
                                             <label class="col-sm-2 control-label col-form-label">Details (TC) <span class="required">*</span></label>
                                             <div id="IDetailsTC"><?= $getProjectData['intro_details']; ?></div>
                                             <input type="hidden" id="txtIDetailsTC" name="txtIDetailsTC" value="<?= $getProjectData['intro_details']; ?>" required />
                                        </div>
                                        <div class="form-group row">
                                             <label class="col-sm-2 control-label col-form-label">Details (SC) <span class="required">*</span></label>
                                             <div id="IDetailsSC"><?= $getProjectData['intro_details']; ?></div>
                                             <input type="hidden" id="txtIDetailsSC" name="txtIDetailsSC" value="<?= $getProjectData['intro_details_sc']; ?>" required />
                                        </div>
                                        <div class="form-group row">
                                             <label class="col-sm-2 control-label col-form-label">Details (EN) <span class="required">*</span></label>
                                             <div id="IDetailsEN"><?= $getProjectData['intro_details']; ?></div>
                                             <input type="hidden" id="txtIDetailsEN" name="txtIDetailsEN" value="<?= $getProjectData['intro_details_en']; ?>" required />
                                        </div>
                                   </div>
                                   <div class="border-top">
                                        <div class="card-body" style="text-align: right">
                                             <button type="submit" id="btnISubmit" name="btnISubmit" class="btn btn-<?= $systemConfiguration['theme']; ?>" value="1">Save Changes</button>
                                        </div>
                                   </div>
                              <?php echo form_close();?>

                              <hr>

                              <div class="card-body">
                                   <div style="text-align: left">
                                        <h5>Image Lists for Carousel</h5>
                                   </div>
                                   <div style="text-align: right">
                                        <button class="btn btn-outline btn-<?= $systemConfiguration['theme']; ?>" id="btnIntroImageUpload"><i class="fa fa-plus-circle"></i> Upload Images</button>
                                   </div>
                              </div>
                              <table id="tblIntroImageLists" class="table table-striped table-bordered hover" width="100%" cellspacing="0">
                                   <thead>
                                        <tr>
                                             <th>Image</th>
                                             <th>Sequence</th>
                                             <th>Actions</th>
                                        </tr>
                                   </thead>
                              </table>
                         </div>

                         <div class="tab-pane fade show" id="lm" role="tabpanel">
                              <?php $LearnMoreImage = (empty($getProjectData['lm_image']) ? $defaultImage : base_url('public/assets/uploads/projects/'.$getProjectData['lm_image'])); ?>
                              <?php echo form_open_multipart("admin/projects/edit/".$getProjectData['id'], array("class" => "form-horizontal form-label-left", "id" => "frmwbintro"));?>
                                   <div class="card-body">
                                        <div class="form-group row">
                                             <label class="col-sm-2 control-label col-form-label">Image <span class="required">*</span></label>
                                             <div class="col-sm-4">
                                                  <img src="<?= $LearnMoreImage; ?>" width="150px" id="imgLMImage" style="cursor: pointer" class="img-responsive" />
                                                  <div style="display: none">
                                                       <input class="form-control" id="txtLMImage" name="txtLMImage" placeholder="" type="file" accept="image/x-png,image/jpeg" onchange="display_image(this, 'imgLMImage', '150', '0');">
                                                       <input type="hidden" id="txtOLDLMImage" name="txtOLDLMImage" value="<?= $getProjectData['lm_image']; ?>" />
                                                  </div>
                                             </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                             <label class="col-sm-2 control-label col-form-label">Header (TC) <span class="required">*</span></label>
                                             <div class="col-sm-4">
                                                  <input type="text" class="form-control" id="txtLMTitleTC" name="txtLMTitleTC" value="<?= $getProjectData['lm_title']; ?>" required />
                                             </div>                         
                                             <label class="col-sm-2 control-label col-form-label">Header (SC) <span class="required">*</span></label>
                                             <div class="col-sm-4">
                                                  <input type="text" class="form-control" id="txtLMTitleSC" name="txtLMTitleSC" value="<?= $getProjectData['lm_title_sc']; ?>" required />
                                             </div>
                                        </div>
                                        <div class="form-group row">                         
                                             <label class="col-sm-2 control-label col-form-label">Header (EN) <span class="required">*</span></label>
                                             <div class="col-sm-4">
                                                  <input type="text" class="form-control" id="txtLMTitleEN" name="txtLMTitleEN" value="<?= $getProjectData['lm_title_en']; ?>" required />
                                             </div>
                                        </div>

                                        <div class="form-group row">
                                             <label class="col-sm-2 control-label col-form-label">Short Details (TC) <span class="required">*</span></label>
                                             <div class="col-sm-10">
                                                  <textarea class="form-control" name="txtLMShortDetailsTC" id="txtLMShortDetailsTC" cols="30" rows="2" required><?= $getProjectData['lm_short_details']; ?></textarea>
                                             </div>
                                        </div>    
                                        <div class="form-group row">
                                             <label class="col-sm-2 control-label col-form-label">Short Details (SC) <span class="required">*</span></label>
                                             <div class="col-sm-10">
                                                  <textarea class="form-control" name="txtLMShortDetailsSC" id="txtLMShortDetailsSC" cols="30" rows="2" required><?= $getProjectData['lm_short_details_sc']; ?></textarea>
                                             </div>
                                        </div>
                                        <div class="form-group row">
                                             <label class="col-sm-2 control-label col-form-label">Short Details (EN) <span class="required">*</span></label>
                                             <div class="col-sm-10">
                                                  <textarea class="form-control" name="txtLMShortDetailsEN" id="txtLMShortDetailsEN" cols="30" rows="2" required><?= $getProjectData['lm_short_details_en']; ?></textarea>
                                             </div>
                                        </div>

                                        <div class="form-group row">
                                             <label class="col-sm-2 control-label col-form-label">Details (TC) <span class="required">*</span></label>
                                             <div class="col-sm-10">
                                                  <textarea class="form-control" name="txtLMDetailsTC" id="txtLMDetailsTC" cols="30" rows="3" required><?= $getProjectData['lm_full_details']; ?></textarea>
                                             </div>
                                        </div>    
                                        <div class="form-group row">
                                             <label class="col-sm-2 control-label col-form-label">Details (SC) <span class="required">*</span></label>
                                             <div class="col-sm-10">
                                                  <textarea class="form-control" name="txtLMDetailsSC" id="txtLMDetailsSC" cols="30" rows="3" required><?= $getProjectData['lm_full_details_sc']; ?></textarea>
                                             </div>
                                        </div>
                                        <div class="form-group row">
                                             <label class="col-sm-2 control-label col-form-label">Details (EN) <span class="required">*</span></label>
                                             <div class="col-sm-10">
                                                  <textarea class="form-control" name="txtLMDetailsEN" id="txtLMDetailsEN" cols="30" rows="3" required><?= $getProjectData['lm_full_details_en']; ?></textarea>
                                             </div>
                                        </div>
                                   </div>
                                   <div class="border-top">
                                        <div class="card-body" style="text-align: right">
                                             <button type="submit" id="btnLMSubmit" name="btnLMSubmit" class="btn btn-<?= $systemConfiguration['theme']; ?>" value="1">Save Changes</button>
                                        </div>
                                   </div>
                              <?php echo form_close();?>

                              <hr>

                              <div class="card-body">
                                   <div style="text-align: left">
                                        <h5>Image Lists for Learn More Page Display</h5>
                                   </div>
                                   <div style="text-align: right">
                                        <button class="btn btn-outline btn-<?= $systemConfiguration['theme']; ?>" id="btnLearnMoreImageUpload"><i class="fa fa-plus-circle"></i> Upload Images</button>
                                   </div>
                              </div>
                              <table id="tblLearnMoreImageLists" class="table table-striped table-bordered hover" width="100%" cellspacing="0">
                                   <thead>
                                        <tr>
                                             <th>Image</th>
                                             <th>Sequence</th>
                                             <th>Actions</th>
                                        </tr>
                                   </thead>
                              </table>
                         </div>

                         <div class="tab-pane fade show" id="ba" role="tabpanel">
                              <?php echo form_open_multipart("admin/projects/edit/".$getProjectData['id'], array("class" => "form-horizontal form-label-left", "id" => "frmwbintro"));?>
                                   <div class="card-body">
                                        <div class="form-group row">
                                             <label class="col-sm-2 control-label col-form-label">Details (TC) <span class="required">*</span></label>
                                             <div id="BADetailsTC"><?= $getProjectData['ba_details']; ?></div>
                                             <input type="hidden" id="txtBADetailsTC" name="txtBADetailsTC" value="<?= $getProjectData['ba_details']; ?>" required />
                                        </div>
                                        <div class="form-group row">
                                             <label class="col-sm-2 control-label col-form-label">Details (SC) <span class="required">*</span></label>
                                             <div id="BADetailsSC"><?= $getProjectData['ba_details_sc']; ?></div>
                                             <input type="hidden" id="txtBADetailsSC" name="txtBADetailsSC" value="<?= $getProjectData['ba_details_sc']; ?>" required />
                                        </div>
                                        <div class="form-group row">
                                             <label class="col-sm-2 control-label col-form-label">Details (EN) <span class="required">*</span></label>
                                             <div id="BADetailsEN"><?= $getProjectData['ba_details_en']; ?></div>
                                             <input type="hidden" id="txtBADetailsEN" name="txtBADetailsEN" value="<?= $getProjectData['ba_details_en']; ?>" required />
                                        </div>
                                   </div>
                                   <div class="border-top">
                                        <div class="card-body" style="text-align: right">
                                             <button type="submit" id="btnBASubmit" name="btnBASubmit" class="btn btn-<?= $systemConfiguration['theme']; ?>" value="1">Save Changes</button>
                                        </div>
                                   </div>
                              <?php echo form_close();?>
                              <hr>

                              <div class="card-body">
                                   <div style="text-align: left">
                                        <h5>Image Lists for Brand Approach</h5>
                                   </div>
                                   <div style="text-align: right">
                                        <button class="btn btn-outline btn-<?= $systemConfiguration['theme']; ?>" id="btnBrandApproachUpload"><i class="fa fa-plus-circle"></i> Upload Images</button>
                                   </div>
                              </div>
                              <table id="tblBranchApproachImageLists" class="table table-striped table-bordered hover" width="100%" cellspacing="0">
                                   <thead>
                                        <tr>
                                             <th>Image</th>
                                             <th>Sequence</th>
                                             <th>Actions</th>
                                        </tr>
                                   </thead>
                              </table>
                         </div>

                         <div class="tab-pane fade show" id="bv" role="tabpanel">
                              <?php echo form_open_multipart("admin/projects/edit/".$getProjectData['id'], array("class" => "form-horizontal form-label-left", "id" => "frmwbintro"));?>
                                   <div class="card-body">
                                        <div class="form-group row">
                                             <label class="col-sm-2 control-label col-form-label">Details (TC) <span class="required">*</span></label>
                                             <div id="BVDetailsTC"><?= $getProjectData['to_bv_details']; ?></div>
                                             <input type="hidden" id="txtBVDetailsTC" name="txtBVDetailsTC" value="<?= $getProjectData['to_bv_details']; ?>" required />
                                        </div>
                                        <div class="form-group row">
                                             <label class="col-sm-2 control-label col-form-label">Details (SC) <span class="required">*</span></label>
                                             <div id="BVDetailsSC"><?= $getProjectData['to_bv_details_sc']; ?></div>
                                             <input type="hidden" id="txtBVDetailsSC" name="txtBVDetailsSC" value="<?= $getProjectData['to_bv_details_sc']; ?>" required />
                                        </div>
                                        <div class="form-group row">
                                             <label class="col-sm-2 control-label col-form-label">Details (EN) <span class="required">*</span></label>
                                             <div id="BVDetailsEN"><?= $getProjectData['to_bv_details_en']; ?></div>
                                             <input type="hidden" id="txtBVDetailsEN" name="txtBVDetailsEN" value="<?= $getProjectData['to_bv_details_en']; ?>" required />
                                        </div>
                                   </div>
                                   <div class="border-top">
                                        <div class="card-body" style="text-align: right">
                                             <button type="submit" id="btnBVSubmit" name="btnBVSubmit" class="btn btn-<?= $systemConfiguration['theme']; ?>" value="1">Save Changes</button>
                                        </div>
                                   </div>
                              <?php echo form_close();?>
                              <hr>

                              <div class="card-body">
                                   <div style="text-align: left">
                                        <h5>Image Lists for Brand Volume Carousel</h5>
                                   </div>
                                   <div style="text-align: right">
                                        <button class="btn btn-outline btn-<?= $systemConfiguration['theme']; ?>" id="btnBrandVolumeUpload"><i class="fa fa-plus-circle"></i> Upload Images</button>
                                   </div>
                              </div>
                              <table id="tblBrandVolumeImageLists" class="table table-striped table-bordered hover" width="100%" cellspacing="0">
                                   <thead>
                                        <tr>
                                             <th>Image</th>
                                             <th>Sequence</th>
                                             <th>Actions</th>
                                        </tr>
                                   </thead>
                              </table>
                         </div>

                         <div class="tab-pane fade show" id="md" role="tabpanel">
                              <?php echo form_open_multipart("admin/projects/edit/".$getProjectData['id'], array("class" => "form-horizontal form-label-left", "id" => "frmwbintro"));?>
                                   <div class="card-body">
                                        <div class="form-group row">
                                             <label class="col-sm-2 control-label col-form-label">Header (TC) <span class="required">*</span></label>
                                             <div class="col-sm-4">
                                                  <input type="text" class="form-control" id="txtMDTitleTC" name="txtMDTitleTC" value="<?= $getProjectData['md_title']; ?>" required />
                                             </div>                         
                                             <label class="col-sm-2 control-label col-form-label">Header (SC) <span class="required">*</span></label>
                                             <div class="col-sm-4">
                                                  <input type="text" class="form-control" id="txtMDTitleSC" name="txtMDTitleSC" value="<?= $getProjectData['md_title_sc']; ?>" required />
                                             </div>
                                        </div>
                                        <div class="form-group row">                         
                                             <label class="col-sm-2 control-label col-form-label">Header (EN) <span class="required">*</span></label>
                                             <div class="col-sm-4">
                                                  <input type="text" class="form-control" id="txtMDTitleEN" name="txtMDTitleEN" value="<?= $getProjectData['md_title_en']; ?>" required />
                                             </div>
                                        </div>

                                        <div class="form-group row">
                                             <label class="col-sm-2 control-label col-form-label">Details (TC) <span class="required">*</span></label>
                                             <div id="MDDetailsTC"><?= $getProjectData['md_details']; ?></div>
                                             <input type="hidden" id="txtMDDetailsTC" name="txtMDDetailsTC" value="<?= $getProjectData['md_details']; ?>" required />
                                        </div>
                                        <div class="form-group row">
                                             <label class="col-sm-2 control-label col-form-label">Details (SC) <span class="required">*</span></label>
                                             <div id="MDDetailsSC"><?= $getProjectData['md_details_sc']; ?></div>
                                             <input type="hidden" id="txtMDDetailsSC" name="txtMDDetailsSC" value="<?= $getProjectData['md_details_sc']; ?>" required />
                                        </div>
                                        <div class="form-group row">
                                             <label class="col-sm-2 control-label col-form-label">Details (EN) <span class="required">*</span></label>
                                             <div id="MDDetailsEN"><?= $getProjectData['md_details_en']; ?></div>
                                             <input type="hidden" id="txtMDDetailsEN" name="txtMDDetailsEN" value="<?= $getProjectData['md_details_en']; ?>" required />
                                        </div>
                                   </div>
                                   <div class="border-top">
                                        <div class="card-body" style="text-align: right">
                                             <button type="submit" id="btnMDSubmit" name="btnMDSubmit" class="btn btn-<?= $systemConfiguration['theme']; ?>" value="1">Save Changes</button>
                                        </div>
                                   </div>
                              <?php echo form_close();?>

                              <hr>

                              <div class="card-body">
                                   <div style="text-align: left">
                                        <h5>Image Lists</h5>
                                   </div>
                                   <div style="text-align: right">
                                        <button class="btn btn-outline btn-<?= $systemConfiguration['theme']; ?>" data-bs-toggle="modal" data-bs-target="#mdl_md"><i class="fa fa-plus-circle"></i> Upload Image</button>
                                   </div>
                              </div>
                              <table id="tblMoreDetailsImageLists" class="table table-striped table-bordered hover" width="100%" cellspacing="0">
                                   <thead>
                                        <tr>
                                             <th>Images</th>
                                             <th>Type</th>
                                             <th>Sequence</th>
                                             <th>Actions</th>
                                        </tr>
                                   </thead>
                              </table>
                         </div>

                         <div class="tab-pane fade show" id="events" role="tabpanel">
                              <?php echo form_open_multipart("admin/projects/edit/".$getProjectData['id'], array("class" => "form-horizontal form-label-left", "id" => "frmwbintro"));?>
                                   <div class="card-body">
                                        <div class="form-group row">
                                             <label class="col-sm-2 control-label col-form-label">Details (TC) <span class="required">*</span></label>
                                             <div id="EventDetailsTC"><?= $getProjectData['tt_events_description']; ?></div>
                                             <input type="hidden" id="txtEventDetailsTC" name="txtEventDetailsTC" value="<?= $getProjectData['tt_events_description']; ?>" required />
                                        </div>
                                        <div class="form-group row">
                                             <label class="col-sm-2 control-label col-form-label">Details (SC) <span class="required">*</span></label>
                                             <div id="EventDetailsSC"><?= $getProjectData['tt_events_description_sc']; ?></div>
                                             <input type="hidden" id="txtEventDetailsSC" name="txtEventDetailsSC" value="<?= $getProjectData['tt_events_description_sc']; ?>" required />
                                        </div>
                                        <div class="form-group row">
                                             <label class="col-sm-2 control-label col-form-label">Details (EN) <span class="required">*</span></label>
                                             <div id="EventDetailsEN"><?= $getProjectData['tt_events_description_en']; ?></div>
                                             <input type="hidden" id="txtEventDetailsEN" name="txtEventDetailsEN" value="<?= $getProjectData['tt_events_description_en']; ?>" required />
                                        </div>
                                   </div>
                                   <div class="border-top">
                                        <div class="card-body" style="text-align: right">
                                             <button type="submit" id="btnEventSubmit" name="btnEventSubmit" class="btn btn-<?= $systemConfiguration['theme']; ?>" value="1">Save Changes</button>
                                        </div>
                                   </div>
                              <?php echo form_close();?>
                              <hr>

                              <div class="card-body">
                                   <div style="text-align: left">
                                        <h5>Event Images</h5>
                                   </div>
                                   <div style="text-align: right">
                                        <button class="btn btn-outline btn-<?= $systemConfiguration['theme']; ?>" id="btnEventUpload"><i class="fa fa-plus-circle"></i> Upload Images</button>
                                   </div>
                              </div>
                              <table id="tblEventImageLists" class="table table-striped table-bordered hover" width="100%" cellspacing="0">
                                   <thead>
                                        <tr>
                                             <th>Image</th>
                                             <th>Sequence</th>
                                             <th>Actions</th>
                                        </tr>
                                   </thead>
                              </table>
                         </div>

                         <div class="tab-pane fade show" id="credits" role="tabpanel">
                              <?php echo form_open_multipart("admin/projects/edit/".$getProjectData['id'], array("class" => "form-horizontal form-label-left", "id" => "frmwbintro"));?>
                                   <div class="card-body">                                        
                                        <div class="form-group row">
                                             <label class="col-sm-2 control-label col-form-label">Creative Director <span class="required">*</span></label>
                                             <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="txtCCreativeDirector" name="txtCCreativeDirector" value="<?= $getProjectData['credits_director']; ?>" required />
                                             </div> 
                                        </div>
                                        <div class="form-group row">                   
                                             <label class="col-sm-2 control-label col-form-label">Designer <span class="required">*</span></label>
                                             <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="txtCDesigner" name="txtCDesigner" value="<?= $getProjectData['credits_designer']; ?>" required />
                                             </div>
                                        </div>
                                        <div class="form-group row">                         
                                             <label class="col-sm-2 control-label col-form-label">Copywriter <span class="required">*</span></label>
                                             <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="txtCCopywriter" name="txtCCopywriter" value="<?= $getProjectData['credits_copywriter']; ?>" required />
                                             </div>    
                                        </div>
                                        <div class="form-group row">                                                                
                                             <label class="col-sm-2 control-label col-form-label">Animator <span class="required">*</span></label>
                                             <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="txtCAnimator" name="txtCAnimator" value="<?= $getProjectData['credits_animator']; ?>" required />
                                             </div>
                                        </div>
                                        <div class="form-group row">                         
                                             <label class="col-sm-2 control-label col-form-label">Photographer <span class="required">*</span></label>
                                             <div class="col-sm-10">
                                                  <input type="text" class="form-control" id="txtCPhotographer" name="txtCPhotographer" value="<?= $getProjectData['credits_photographer']; ?>" required />
                                             </div>  
                                        </div>
                                   </div>
                                   <div class="border-top">
                                        <div class="card-body" style="text-align: right">
                                             <button type="submit" id="btnCreditsSubmit" name="btnCreditsSubmit" class="btn btn-<?= $systemConfiguration['theme']; ?>" value="1">Save Changes</button>
                                        </div>
                                   </div>
                              <?php echo form_close();?>
                         </div>
                    </div>
               </div>
          </div>
     </div>
</div>

<div style="display: none">
     <?php echo form_open_multipart("admin/projects/edit/".$getProjectData['id'], array("class" => "form-horizontal form-label-left", "id" => "frmintroimage"));?>
          <input class="form-control" id="txtIImage" name="txtIImage[]" type="file" accept="image/x-png,image/jpeg" multiple>
          <button type="submit" id="btnIImageSubmit" name="btnIImageSubmit" class="btn btn-<?= $systemConfiguration['theme']; ?>" value="1">Upload</button>
     <?php echo form_close();?>
</div>
<div style="display: none">
     <?php echo form_open_multipart("admin/projects/edit/".$getProjectData['id'], array("class" => "form-horizontal form-label-left", "id" => "frmlearnmoreimage"));?>
          <input class="form-control" id="txtLMImages" name="txtLMImages[]" type="file" accept="image/x-png,image/jpeg" multiple>
          <button type="submit" id="btnLMImageSubmit" name="btnLMImageSubmit" class="btn btn-<?= $systemConfiguration['theme']; ?>" value="1">Upload</button>
     <?php echo form_close();?>
</div>
<div style="display: none">
     <?php echo form_open_multipart("admin/projects/edit/".$getProjectData['id'], array("class" => "form-horizontal form-label-left", "id" => "frmlearnmoreimage"));?>
          <input class="form-control" id="txtBAImages" name="txtBAImages[]" type="file" accept="image/x-png,image/jpeg" multiple>
          <button type="submit" id="btnBAImageSubmit" name="btnBAImageSubmit" class="btn btn-<?= $systemConfiguration['theme']; ?>" value="1">Upload</button>
     <?php echo form_close();?>
</div>
<div style="display: none">
     <?php echo form_open_multipart("admin/projects/edit/".$getProjectData['id'], array("class" => "form-horizontal form-label-left", "id" => "frmlearnmoreimage"));?>
          <input class="form-control" id="txtBVImages" name="txtBVImages[]" type="file" accept="image/x-png,image/jpeg" multiple>
          <button type="submit" id="btnBVImageSubmit" name="btnBVImageSubmit" class="btn btn-<?= $systemConfiguration['theme']; ?>" value="1">Upload</button>
     <?php echo form_close();?>
</div>
<div class="modal fade" id="mdl_md" aria-labelledby="rolesmodal" tabindex="-1" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
     <div class="modal-dialog modal-lg">
          <div class="modal-content">
               <?php echo form_open_multipart("admin/projects/edit/".$getProjectData['id'], array("class" => "form-horizontal form-label-left", "id" => "frm"));?>
                    <div class="modal-header">
                         <h5 class="modal-title">More Details</h5>
                         <button type="button" class="btn-close" id="btnMDCLose"></button>
                    </div>
                    <div class="modal-body">
                         <div class="form-group row">
                              <label class="col-sm-2 control-label col-form-label">Image Type <span class="required">*</span></label>
                              <div class="col-sm-10">
                                   <select class="form-select shadow-none" name="txtMDImageType" id="txtMDImageType">
                                        <?php foreach (project_md_image_types() as $key => $value): ?>
                                             <option value="<?= $key; ?>"><?= $value; ?></option>
                                        <?php endforeach; ?>
                                   </select>
                              </div>
                         </div>
                         <div class="form-group row" id="imgtype1">
                              <label class="col-sm-2 control-label col-form-label">Image <span class="required">*</span></label>
                              <div class="col-sm-10">
                                   <img src="<?= base_url('public/themes/global/images/default_image.jpg'); ?>" width="150px" id="imgMDFWImage" style="cursor: pointer" class="img-responsive" />
                                   <div style="display: none">
                                        <input class="form-control" id="txtMDFWImage" name="txtMDFWImage" placeholder="" type="file" accept="image/x-png,image/jpeg" onchange="display_image(this, 'imgMDFWImage', '150', '0');">
                                   </div>
                              </div>
                         </div>
                         <div class="form-group row" id="imgtype2" style="display: none">
                              <label class="col-sm-2 control-label col-form-label">Image (Left) <span class="required">*</span></label>
                              <div class="col-sm-4">
                                   <img src="<?= base_url('public/themes/global/images/default_image.jpg'); ?>" width="150px" id="imgMDLImage2" style="cursor: pointer" class="img-responsive" />
                                   <div style="display: none">
                                        <input class="form-control" id="txtMDLImage2" name="txtMDLImage2" placeholder="" type="file" accept="image/x-png,image/jpeg" onchange="display_image(this, 'imgMDLImage2', '150', '0');">
                                   </div>
                              </div>
                              <label class="col-sm-2 control-label col-form-label">Image (Right) <span class="required">*</span></label>
                              <div class="col-sm-4">
                                   <img src="<?= base_url('public/themes/global/images/default_image.jpg'); ?>" width="150px" id="imgMDRImage2" style="cursor: pointer" class="img-responsive" />
                                   <div style="display: none">
                                        <input class="form-control" id="txtMDRImage2" name="txtMDRImage2" placeholder="" type="file" accept="image/x-png,image/jpeg" onchange="display_image(this, 'imgMDRImage2', '150', '0');">
                                   </div>
                              </div>
                         </div>
                         <div id="imgtype3" style="display: none">
                              <div class="form-group row">
                                   <label class="col-sm-4 control-label col-form-label">Image (Left) <span class="required">*</span></label>
                                   <div class="col-sm-8">
                                        <img src="<?= base_url('public/themes/global/images/default_image.jpg'); ?>" width="150px" id="imgMDLImage3" style="cursor: pointer" class="img-responsive" />
                                        <div style="display: none">
                                             <input class="form-control" id="txtMDLImage3" name="txtMDLImage3" placeholder="" type="file" accept="image/x-png,image/jpeg" onchange="display_image(this, 'imgMDLImage3', '150', '0');">
                                        </div>
                                   </div>
                              </div>
                              <div class="form-group row">
                                   <label class="col-sm-4 control-label col-form-label">Image (Right Top)<span class="required">*</span></label>
                                   <div class="col-sm-8">
                                        <img src="<?= base_url('public/themes/global/images/default_image.jpg'); ?>" width="150px" id="imgMDRTImage3" style="cursor: pointer" class="img-responsive" />
                                        <div style="display: none">
                                             <input class="form-control" id="txtMDRTImage3" name="txtMDRTImage3" placeholder="" type="file" accept="image/x-png,image/jpeg" onchange="display_image(this, 'imgMDRTImage3', '150', '0');">
                                        </div>
                                   </div>
                              </div>
                              <div class="form-group row">
                                   <label class="col-sm-4 control-label col-form-label">Image (Right Bottom)<span class="required">*</span></label>
                                   <div class="col-sm-8">
                                        <img src="<?= base_url('public/themes/global/images/default_image.jpg'); ?>" width="150px" id="imgMDRBImage3" style="cursor: pointer" class="img-responsive" />
                                        <div style="display: none">
                                             <input class="form-control" id="txtMDRBImage3" name="txtMDRBImage3" placeholder="" type="file" accept="image/x-png,image/jpeg" onchange="display_image(this, 'imgMDRBImage3', '150', '0');">
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>

                    <div class="modal-footer">
                         <button type="submit" id="btnMDImages" name="btnMDImages" class="btn btn-<?= $systemConfiguration['theme']; ?>" value="1">Save</button>
                    </div>
               <?php echo form_close();?>
          </div>
     </div>
</div>
<div style="display: none">
     <?php echo form_open_multipart("admin/projects/edit/".$getProjectData['id'], array("class" => "form-horizontal form-label-left", "id" => "frmlearnmoreimage"));?>
          <input class="form-control" id="txtEventImages" name="txtEventImages[]" type="file" accept="image/x-png,image/jpeg" multiple>
          <button type="submit" id="btnEventImageSubmit" name="btnEventImageSubmit" class="btn btn-<?= $systemConfiguration['theme']; ?>" value="1">Upload</button>
     <?php echo form_close();?>
</div>

<?= $this->endSection(); ?>

<?= $this->section('custom_footer'); ?>

<!-- DataTables -->
<script src="<?= base_url('/public/themes/admin/assets/extra-libs/DataTables/datatables.min.js'); ?>"></script>
<!-- Global -->
<script src="<?= base_url('/public/themes/global/js/global_datatable.js') ?>"></script>

<!-- Specific -->
<script src="<?= base_url() ?>/modules/AdminProjects/JSCSS/headerintro.js"></script>
<script src="<?= base_url() ?>/modules/AdminProjects/JSCSS/learnmore.js"></script>
<script src="<?= base_url() ?>/modules/AdminProjects/JSCSS/brandapproach.js"></script>
<script src="<?= base_url() ?>/modules/AdminProjects/JSCSS/brandvolume.js"></script>
<script src="<?= base_url() ?>/modules/AdminProjects/JSCSS/moredetails.js"></script>
<script src="<?= base_url() ?>/modules/AdminProjects/JSCSS/events.js"></script>

<?= $this->endSection(); ?>