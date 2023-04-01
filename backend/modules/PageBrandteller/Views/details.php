<?= $this->extend('../../public/themes/frontend/template'); ?>

<!-- #Header# -->
<?= $this->section('custom_header'); ?>

<?= $this->endSection(); ?>

<!-- #Content# -->
<?= $this->section('content'); ?>

<div class="inner-page">

    <div class="section">
        <div class="container">
            <!-- Banner and Header -->
            <div class="row gx-lg-0 gy-5 align-items-center mt-10">
                <div class="col-lg-6 order-lg-2">
                    <div class="col-graphics">
                        <img class="img-objectfit lazyload" src="<?= base_url('public/assets/uploads/brandteller/'.$getBrandtellerData['big_image']); ?>" alt="">
                    </div>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <div class="col-content col-content-sm">
                        <h2><?= $getBrandtellerData['name'.cnvrtlng($lang)]; ?></h2>
                        <p class="lead-big"><?= $getBrandtellerData['details'.cnvrtlng($lang)]; ?></p>
                        <span class="badge mt-3"><?= $brand_categories[$getBrandtellerData['category_id']]; ?></span>
                    </div>
                </div>
            </div>

            <div class="row gy-5 gx-lg-0 mt-10">
                <!-- Content -->
                <div class="col-lg-6">
                    <article class="article-sm">
                        <?php foreach ($getContentByBrandtellerID as $rowC): ?>
                            <img class="img-auto lazyload" src="<?= base_url('public/assets/uploads/brandteller/'.$rowC['image']); ?>" alt="">
                            <small><?= $rowC['title'.cnvrtlng($lang)]; ?></small>
                            <?= $rowC['details'.cnvrtlng($lang)]; ?>
                        <?php endforeach; ?>                        
                    </article>
                </div>

                <!-- Tags -->
                <div class="col-lg-6">
                    <div class="card-right">
                        <h4><?= displaylanguage($lang, 'The Latest Brandteller TC', 'The Latest Brandteller SC', 'The Latest Brandteller'); ?></h4>
                        <div class="cards">
    
                            <?php foreach ($getLatestBrandtellersData as $rowT): ?>
                                <div class="card card-bg">
                                    <div class="card-img">
                                        <a href="<?= base_url($lang.'/brandteller/'.$rowT['url']); ?>">
                                            <img class="img-objectfit lazyload" src="<?= base_url('public/assets/uploads/brandteller/'.$rowT['small_image']); ?>" alt="">
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h4><?= $rowT['name'.cnvrtlng($lang)]; ?></h4>
                                        <span class="badge mt-3"><?= $brand_categories[$rowT['category_id']]; ?></span>
                                    </div>
                                </div>
                            <?php endforeach; ?>
    
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

<script src="<?= base_url() ?>/modules/PageBrandteller/JSCSS/index.js"></script>

<?= $this->endSection(); ?>
