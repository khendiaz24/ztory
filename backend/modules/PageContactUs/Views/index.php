<?= $this->extend('../../public/themes/frontend/template'); ?>

<!-- #Header# -->
<?= $this->section('custom_header'); ?>

<?= $this->endSection(); ?>

<!-- #Content# -->
<?= $this->section('content'); ?>

<div class="inner-page">
    <!-- Header -->
    <div class="section hero-inner-2 ddgreen text-center p-0 pb-5">
        <div class="hero-content-2 container-md">
            <h1><?= $contactus_content['header'.cnvrtlng($lang)] ?></h1>
        </div>		
    </div>

    <div class="section ddgreen">
        <div class="container text-center container-md">
            <div class="contact-form">
                <h4><?= displaylanguage($lang, 'Looking  for creative solutions?', 'Looking  for creative solutions?', 'Looking  for creative solutions?'); ?></h4>
                <div class="form mt-5 pt-5">
                    <?php echo form_open_multipart($lang."/contactus", array("class" => "form-horizontal form-label-left", "id" => "frmcntcts")); ?>
                        <div class="row gy-5 gx-lg-5">
                            <div class="col-sm-6">
                                <input type="text" required class="form-control" name="txtCompany" id="txtCompany" placeholder="Company">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" required class="form-control" name="txtName" id="txtName" placeholder="Name">
                            </div>
                            <div class="col-sm-6">
                                <input type="email" required class="form-control" name="txtEmail" id="txtEmail" placeholder="Email">
                            </div>
                            <div class="col-sm-6">
                                <input type="text" required class="form-control" name="txtNumber" id="txtNumber" placeholder="Contact No.">
                            </div>
                            <div class="col-12">
                                <label for="">Request</label>
                                <textarea class="form-control border" name="txtRequest" id="txtRequest" cols="0" rows="0" required></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit" id="btnSubmit" name="btnSubmit" class="btn-link mt-4" value="1"><?= displaylanguage($lang, 'SUBMIT', 'SUBMIT', 'SUBMIT'); ?></button>
                            </div>
                        </div>
                    <?php echo form_close();?>
                </div>
            </div>	

            <div class="contact-bottom pt-5 ps-4 pe-4">
                <div class="grids grid-center mt-5">
                
                    <div class="col-grid col-grid-big text-center">
                        <div class="col-circle mb-5">
                            <div class="col-circle-inner">
                                <i class="fab fa-whatsapp"></i>
                                <a href="<?= $footer_content['soc_wa'] ?>" class="btn-link white big"><?= $contactus_content['wa_text'.cnvrtlng($lang)]; ?></a>
                                <a href="mailto:<?= $contactus_content['con_email'] ?>"><?= $contactus_content['con_email'] ?></a>
                                <a href="tel:<?= $contactus_content['con_number'] ?>"><?= $contactus_content['con_number'] ?></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-grid col-grid-big text-center">
                        <div class="col-circle mb-5">
                            <div class="col-circle-inner">
                                <i class="fas fa-map-marker-alt"></i>
                                <span><?= $contactus_content['con_address']; ?></span>
                                <a href="" class="btn-link white"><?= displaylanguage($lang, 'Find Us On Map', 'Find Us On Map', 'Find Us On Map'); ?></a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>

<!-- #Footer# -->
<?= $this->section('custom_footer'); ?>

<script src="<?= base_url() ?>/modules/PageContactUs/JSCSS/index.js"></script>

<?= $this->endSection(); ?>
