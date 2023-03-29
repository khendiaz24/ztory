<?= $this->extend('../../public/themes/frontend/template'); ?>

<!-- #Header# -->
<?= $this->section('custom_header'); ?>

<?= $this->endSection(); ?>

<!-- #Content# -->
<?= $this->section('content'); ?>

<div class="inner-page">

    <!-- INTRO -->
    <div class="section hero-inner-2 text-center p-0">
        <div class="hero-content-2 container-md">
            <h1><?= $getAboutUsData['title'.cnvrtlng($lang)]; ?></h1>
            <p class="lead-big"><?= $getAboutUsData['introduction'.cnvrtlng($lang)]; ?></p>
        </div>
        <img class="img-fluid lazyload" src="<?= base_url('public/assets/uploads/aboutus/'.$getAboutUsData['banner']); ?>" alt="">
    </div>

    <div class="section ddgreen">
        <div class="section-inner container">
            <div class="container-sm text-center">
                <h2 class="mb-5 pb-5"><?= $getAboutUsData['description'.cnvrtlng($lang)]; ?></h2>
                <span class="text-green lead-big"><?= displaylanguage($lang, 'To Know What We Do and How We Do It - TC', 'To Know What We Do and How We Do It - SC', 'To Know What We Do and How We Do It'); ?></span>
            </div>
        </div>

        <!-- OBB -->
        <div class="section-inner container">
            <h3><em>01</em><?= displaylanguage($lang, 'Our Branding Blueprint TC', 'Our Branding Blueprint SC', 'Our Branding Blueprint'); ?></h3>
            <div class="row grid2 gy-4 justify-content-center mt-5">
                <?php foreach ($getAllOBBData as $rowOBB): ?>
                    <div class="col-sm-6 col-md-4 col-lg">
                        <div class="col-grid text-center">
                            <img class="img-fluid lazyload" src="<?= base_url('public/assets/uploads/aboutus/'.$rowOBB['image']); ?>" alt="">
                            <h4><?= $rowOBB['label'.cnvrtlng($lang)]; ?></h4>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- OBP -->
        <div class="section-inner container">
            <div class="row gy-4">
                <div class="col-lg-5">
                    <h3><em>02</em> <?= displaylanguage($lang, 'Our Brand Philosophy TC', 'Our Brand Philosophy SC', 'Our Brand Philosophy'); ?></h3>
                </div>
                <div class="col-lg-7">
                    <div class="col-content">
                        <p class="lead"><?= $getAboutUsData['obp_details'.cnvrtlng($lang)]; ?></p>
                    </div>
                </div>
            </div>
        </div>

        <!-- OC -->
        <div class="section-inner container">
            <h3><em>03</em> <?= displaylanguage($lang, 'Our Concept TC', 'Our Concept SC', 'Our Concept'); ?></h3>

            <div class="ms-3 me-3">
                <div class="grids grid-center mt-5">
                    <?php foreach ($getAllOCData as $rowOC): ?>
                        <div class="col-grid text-center">
                            <div class="col-circle mb-5">
                                <h2><?= $rowOC['title'.cnvrtlng($lang)]; ?></h2>
                            </div>
                            <p><?= $rowOC['details'.cnvrtlng($lang)]; ?></p>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>

        <!-- OS -->
        <div class="section-inner mb-0 pb-4">

            <div class="container">
                <div class="row gy-4">
                    <div class="col-lg-5">
                        <h3><em>04</em> <?= displaylanguage($lang, 'Our Services TC', 'Our Services SC', 'Our Services'); ?></h3>
                    </div>
                    <div class="col-lg-7">
                        <div class="col-content">
                            <p class="lead"><?= $getAboutUsData['os_details'.cnvrtlng($lang)]; ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- OSB -->
            <div class="swiper-holder swiper-holder-folder mt-5">
                <div class="swiper" data-loop="true" data-center="" data-effect="slide" data-delay="3500" data-gap="0" data-sm-perview="auto" data-md-perview="auto" data-lg-perview="4">
                    <div class="swiper-wrapper">
                        <?php foreach ($getAllOSData as $rowOS): ?>
                            <div class="swiper-slide">
                                <div class="col-list">
                                    <div class="col-list-inner">
                                        <h4><?= $rowOS['category'.cnvrtlng($lang)]; ?></h4>
                                        <?= $rowOS['details'.cnvrtlng($lang)]; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- OWC -->
    <div class="section">
        <div class="container">
            <h2><?= displaylanguage($lang, 'Our Wonderful Clients TC', 'Our Wonderful Clients SC', 'Our Wonderful Clients'); ?></h2>
            <div class="row mt-5 gy-5">
                <?php foreach ($getAllOWCData as $rowOWC): ?>
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="col-graphics text-center">
                            <img class="img-fluid lazyload" src="<?= base_url('public/assets/uploads/aboutus/'.$rowOWC['image']); ?>" alt="">
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>

<!-- #Footer# -->
<?= $this->section('custom_footer'); ?>

<script src="<?= base_url() ?>/modules/PageAboutUs/JSCSS/index.js"></script>

<?= $this->endSection(); ?>
