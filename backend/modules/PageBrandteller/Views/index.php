<?= $this->extend('../../public/themes/frontend/template'); ?>

<!-- #Header# -->
<?= $this->section('custom_header'); ?>

<?= $this->endSection(); ?>

<!-- #Content# -->
<?= $this->section('content'); ?>

<div class="inner-page">

    <div class="section hero-inner-2 text-center p-0 pb-5">
        <div class="hero-content-2 container-md">
            <h1>Analyse the inspirational branding success stories</h1>
        </div>		
    </div>

    <div class="section">
        <div class="container">
            <div class="row gy-5">
                <!-- Featured -->
                <div class="col-lg-6">
                    <div class="card card-lg">
                        <div class="card-img">
                            <a href="<?= base_url($lang.'/brandteller/'.$getFeaturedData['url']); ?>">
                                <img class="img-objectfit lazyload" src="<?= base_url('public/assets/uploads/brandteller/'.$getFeaturedData['big_image']); ?>" alt="">
                            </a>
                        </div>
                        <div class="card-body">
                            <h4><?= $getFeaturedData['name'.cnvrtlng($lang)] ?></h4>
                            <span class="badge mt-3"><?= $brand_categories[$getFeaturedData['category_id']]; ?></span>
                        </div>
                    </div>
                </div>

                <!-- All Item -->
                <?php foreach ($getAllProducts as $rowData): ?>
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="card">
                            <div class="card-img">
                                <a href="<?= base_url($lang.'/brandteller/'.$rowData['url']); ?>">
                                    <img class="img-objectfit lazyload" src="<?= base_url('public/assets/uploads/brandteller/'.$rowData['small_image']) ?>" alt="">
                                </a>
                            </div>
                            <div class="card-body">
                                <h4><?= $rowData['name'.cnvrtlng($lang)]; ?></h4>
                                <span class="badge mt-3"><?= $brand_categories[$rowData['category_id']]; ?></span>
                            </div>
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

<script src="<?= base_url() ?>/modules/PageBrandteller/JSCSS/index.js"></script>

<?= $this->endSection(); ?>
