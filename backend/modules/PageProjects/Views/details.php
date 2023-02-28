<?= $this->extend('../../public/themes/frontend/template'); ?>

<!-- #Header# -->
<?= $this->section('custom_header'); ?>

<?= $this->endSection(); ?>

<!-- #Content# -->
<?= $this->section('content'); ?>

<div class="inner-page">
    <!-- Banner -->
    <div class="section section-hero-inner p-0">
        <img class="img-objectfit lazyload" src="<?= base_url('public/assets/uploads/projects/'.$getProjectData['banner']); ?>" alt="">
    </div>
    
    <!-- Header -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="col-content col-content-md">
                        <h2><?= $getProjectData['title'.cnvrtlng($lang)]; ?></h2>
                        <p class="lead"><?= $getProjectData['description'.cnvrtlng($lang)]; ?></p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="col-content">
                        <h4 class="title-border-sm"><?= displaylanguage($lang, 'Client', 'Client', 'Client'); ?></h4>
                        <ul class="list">
                            <li><?= $getProjectData['client'.cnvrtlng($lang)]; ?></li>
                        </ul>
                        <h4 class="title-border-sm mt-5"><?= displaylanguage($lang, 'What We Did', 'What We Did', 'What We Did'); ?></h4>
                        <?= $getProjectData['wwd'.cnvrtlng($lang)]; ?>
                    </div>
                </div>
            </div>
            <div class="col-graphics mt-5 pt-4">
                <img class="img-fluid lazyload" src="<?= base_url('public/assets/uploads/projects/'.$getProjectData['intro_image']); ?>" alt="">
            </div>
        </div>
    </div>

    <!-- Intro -->
    <div class="section ddgreen">
        <?php
            $intro_details = $getProjectData['intro_details'.cnvrtlng($lang)];
            $xIntroDetails = explode("<p>", $intro_details);
        ?>
        <div class="container">
            <div class="col-content-md ms-auto">
                <p class="lead"><?= $xIntroDetails[1]; ?></p>
            </div>
        </div>
        <div class="swiper-holder mt-7 mb-7">
            <div class="swiper" data-loop="true" data-center="true" data-effect="slide" data-delay="3500" data-gap="40" data-sm-perview="1" data-md-perview="2" data-lg-perview="3">
                <div class="swiper-wrapper">
                    <?php foreach ($getIntroImagesData as $rowI): ?>
                        <div class="swiper-slide">
                            <img class="img-fluid lazyload" src="<?= base_url('public/assets/uploads/projects/'.$rowI['image']); ?>" alt="">
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="swiper-pagination-holder">
                <div class="swiper-pagination"></div>
            </div>
        </div>
        <div class="container">
            <div class="col-content-md ms-auto">
                <?php 
                    for ($i = 2; $i < count($xIntroDetails); $i++) {
                        echo "<p class='lead'>".$xIntroDetails[$i]."</p>";
                    }
                ?>
            </div>
        </div>
    </div>

    <!-- Learn More & Brand Approach -->
    <div class="section">
        <div class="container">
            <!-- Learn More -->
            <div class="row gx-lg-5 gy-5 align-items-center">
                <div class="col-md-6">
                    <div class="col-graphics">
                        <img class="img-fluid lazyload" src="<?= base_url('public/assets/uploads/projects/'.$getProjectData['lm_image']); ?>" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col-content">
                        <h3><?= $getProjectData['lm_title'.cnvrtlng($lang)]; ?></h3>
                        <p class="lead"><?= $getProjectData['lm_short_details'.cnvrtlng($lang)]; ?></p>
                        <a href="<?= base_url($lang.'/learn_more_about_project/'.$getProjectData['url']); ?>" class="btn-link mt-4">
                        <?= displaylanguage($lang, 'LEARN MORE ABOUT', 'LEARN MORE ABOUT', 'LEARN MORE ABOUT'); ?> <?= strtoupper($getProjectData['lm_title'.cnvrtlng($lang)]); ?>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Brand Approach -->
            <div class="row gx-lg-5 mt-5 mb-5">
                <div class="col-md-6">
                    <div class="col-content">
                        <h3><?= displaylanguage($lang, 'Brand Approach', 'Brand Approach', 'Brand Approach'); ?></h3>
                        <?php
                            $ba_details = $getProjectData['ba_details'.cnvrtlng($lang)];
                            $xBADetails = explode("<p>", $ba_details);

                            for ($i = 0; $i < count($xBADetails); $i++) {
                                if (!empty($xBADetails[$i])) {
                                    echo "<p class='lead'>".$xBADetails[$i]."</p>";
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>

            <?php foreach ($getBAData as $rowBA): ?>
                <div class="col-graphics mb-4">
                    <img class="img-fluid lazyload" src="<?= base_url('public/assets/uploads/projects/'.$rowBA['image']); ?>" alt="">
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <?php if ($getProjectData['template'] == '1'): ?>
        <!-- Brand Volume - Template 1 -->
        <div class="section">
            <div class="container">
                <div class="col-content-md ms-auto">
                    <h3><?= displaylanguage($lang, 'Brand Volume', 'Brand Volume', 'Brand Volume'); ?></h3>
                    <?php
                            $bv_details = $getProjectData['to_bv_details'.cnvrtlng($lang)];
                            $xBVDetails = explode("<p>", $bv_details);

                            for ($i = 0; $i < count($xBVDetails); $i++) {
                                if (!empty($xBVDetails[$i])) {
                                    echo "<p class='lead'>".$xBVDetails[$i]."</p>";
                                }
                            }
                        ?>
                </div>
            </div>
            <div class="swiper-holder mt-5">
                <div class="swiper" data-loop="true" data-center="" data-effect="slide" data-delay="3500" data-gap="30" data-sm-perview="auto" data-md-perview="auto" data-lg-perview="auto">
                    <div class="swiper-wrapper">
                        <?php foreach ($getBVData as $rowBV): ?>
                            <div class="swiper-slide w-80">
                                <img class="img-fluid lazyload" src="<?= base_url('public/assets/uploads/projects/'.$rowBV['image']); ?>" alt="">
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="swiper-pagination-holder">
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>

        <!-- More Details & Credits - Template 1 -->
        <div class="section">
            <div class="container">
                <!-- More Details -->
                <div class="col-content-md mb-5">
                    <h3><?= $getProjectData['md_title'.cnvrtlng($lang)]; ?></h3>
                    <?php
                        $md_details = $getProjectData['md_details'.cnvrtlng($lang)];
                        $xMDDetails = explode("<p>", $md_details);

                        for ($i = 0; $i < count($xMDDetails); $i++) {
                            if (!empty($xMDDetails[$i])) {
                                echo "<p class='lead'>".$xMDDetails[$i]."</p>";
                            }
                        }
                    ?>
                </div>
                <div class="row gx-4">
                    <?php foreach ($getMDData as $rowMD): ?>
                        <?php if ($rowMD['type'] == '1') { ?>
                            <!-- Full Width -->
                            <div class="col-12">
                                <div class="col-graphics mb-4">
                                    <img class="img-fluid lazyload" src="<?= base_url('public/assets/uploads/projects/'.$rowMD['full_width_image']); ?>" alt="">
                                </div>
                            </div>
                        <?php } else if ($rowMD['type'] == '2') { ?>
                            <!-- Side to Side Image -->
                            <div class="col-md-6">
                                <div class="col-graphics mb-4">
                                    <img class="img-fluid lazyload" src="<?= base_url('public/assets/uploads/projects/'.$rowMD['left_image_2']); ?>" alt="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-graphics mb-4">
                                    <img class="img-fluid lazyload" src="<?= base_url('public/assets/uploads/projects/'.$rowMD['right_image_2']); ?>" alt="">
                                </div>
                            </div>
                        <?php } else if ($rowMD['type'] == '3') { ?>
                            <!-- 3 Image Display -->
                            <div class="col-md-6">
                                <div class="col-graphics mb-4">
                                    <img class="img-fluid lazyload" src="<?= base_url('public/assets/uploads/projects/'.$rowMD['left_image_3']); ?>" alt="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-graphics mb-4">
                                    <img class="img-fluid lazyload" src="<?= base_url('public/assets/uploads/projects/'.$rowMD['right_top_image_3']); ?>" alt="">
                                </div>
                                <div class="col-graphics mb-4">
                                    <img class="img-fluid lazyload" src="<?= base_url('public/assets/uploads/projects/'.$rowMD['right_bottom_image_3']); ?>" alt="">
                                </div>
                            </div>
                        <?php } ?>
                    <?php endforeach; ?>
                </div>

                <!-- Credits -->
                <div class="col-content authors-list mt-5">
                    <span class="title-border-sm mb-4"></span>
                    <span>Creative Director: <?= $getProjectData['credits_director']; ?></span>
                    <span>Designer: <?= $getProjectData['credits_designer']; ?></span>
                    <span>Copywriter: <?= $getProjectData['credits_copywriter']; ?></span>
                    <span>Animator: <?= $getProjectData['credits_animator']; ?></span>
                    <span>Photographer: <?= $getProjectData['credits_photographer']; ?></span>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($getProjectData['template'] == '2'): ?>
        <!-- Template 2 -->
        <div class="section">
            <div class="container">
                <!-- More Details - Template 2 -->
                <div class="col-content-md mb-5">
                    <h3><?= $getProjectData['md_title'.cnvrtlng($lang)]; ?></h3>
                    <?php
                        $md_details = $getProjectData['md_details'.cnvrtlng($lang)];
                        $xMDDetails = explode("<p>", $md_details);

                        for ($i = 0; $i < count($xMDDetails); $i++) {
                            if (!empty($xMDDetails[$i])) {
                                echo "<p class='lead'>".$xMDDetails[$i]."</p>";
                            }
                        }
                    ?>
                </div>
                <div class="row gx-4">
                    <?php foreach ($getMDData as $rowMD): ?>
                        <?php if ($rowMD['type'] == '1') { ?>
                            <!-- Full Width -->
                            <div class="col-12">
                                <div class="col-graphics mb-4">
                                    <img class="img-fluid lazyload" src="<?= base_url('public/assets/uploads/projects/'.$rowMD['full_width_image']); ?>" alt="">
                                </div>
                            </div>
                        <?php } else if ($rowMD['type'] == '2') { ?>
                            <!-- Side to Side Image -->
                            <div class="col-md-6">
                                <div class="col-graphics mb-4">
                                    <img class="img-fluid lazyload" src="<?= base_url('public/assets/uploads/projects/'.$rowMD['left_image_2']); ?>" alt="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-graphics mb-4">
                                    <img class="img-fluid lazyload" src="<?= base_url('public/assets/uploads/projects/'.$rowMD['right_image_2']); ?>" alt="">
                                </div>
                            </div>
                        <?php } else if ($rowMD['type'] == '3') { ?>
                            <!-- 3 Image Display -->
                            <div class="col-md-6">
                                <div class="col-graphics mb-4">
                                    <img class="img-fluid lazyload" src="<?= base_url('public/assets/uploads/projects/'.$rowMD['left_image_3']); ?>" alt="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-graphics mb-4">
                                    <img class="img-fluid lazyload" src="<?= base_url('public/assets/uploads/projects/'.$rowMD['right_top_image_3']); ?>" alt="">
                                </div>
                                <div class="col-graphics mb-4">
                                    <img class="img-fluid lazyload" src="<?= base_url('public/assets/uploads/projects/'.$rowMD['right_bottom_image_3']); ?>" alt="">
                                </div>
                            </div>
                        <?php } ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <div class="section">
            <!-- Events -->
            <div class="container">
                <div class="col-content-md ms-auto">
                    <h3><?= displaylanguage($lang, 'Event', 'Event', 'Event'); ?></h3>
                    <?php
                        $events_details = $getProjectData['tt_events_description'.cnvrtlng($lang)];
                        $xEventsDetails = explode("<p>", $events_details);

                        for ($i = 0; $i < count($xEventsDetails); $i++) {
                            if (!empty($xEventsDetails[$i])) {
                                echo "<p class='lead'>".$xEventsDetails[$i]."</p>";
                            }
                        }
                    ?>
                </div>
            </div>
            <div class="swiper-holder mt-5">
                <div class="swiper" data-loop="true" data-center="" data-effect="slide" data-delay="3500" data-gap="30" data-sm-perview="auto" data-md-perview="auto" data-lg-perview="auto">
                    <div class="swiper-wrapper">
                        <?php foreach ($getEventImagesData as $rowEvents): ?>
                            <div class="swiper-slide w-80">
                                <img class="img-fluid lazyload" src="<?= base_url('public/assets/uploads/projects/'.$rowEvents['image']); ?>" alt="">
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <div class="swiper-pagination-holder">
                    <div class="swiper-pagination"></div>
                </div>
            </div>
            <!-- Credits -->
            <div class="container">
                <div class="col-content authors-list mt-5">
                    <span class="title-border-sm mb-4"></span>
                    <span>Creative Director: <?= $getProjectData['credits_director']; ?></span>
                    <span>Designer: <?= $getProjectData['credits_designer']; ?></span>
                    <span>Copywriter: <?= $getProjectData['credits_copywriter']; ?></span>
                    <span>Animator: <?= $getProjectData['credits_animator']; ?></span>
                    <span>Photographer: <?= $getProjectData['credits_photographer']; ?></span>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

<?= $this->endSection(); ?>

<!-- #Footer# -->
<?= $this->section('custom_footer'); ?>

<?= $this->endSection(); ?>
