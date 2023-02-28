<?= $this->extend('../../public/themes/frontend/template'); ?>

<!-- #Header# -->
<?= $this->section('custom_header'); ?>

<?= $this->endSection(); ?>

<!-- #Content# -->
<?= $this->section('content'); ?>

<div class="inner-page">

    <div class="section section-hero-inner ddgreen p-0">
        <div class="hero-content">
            <div class="container">
                <h1><?= $getProjectHeaderData['title'.cnvrtlng($lang)]; ?></h1>
            </div>
        </div>
    </div>

    <div class="section p-0">
        <div class="ddgreen pb-5">
            <div class="container">
                <nav class="tab-nav tab-big">
                    <ul class="tab-navs">
                        <li><a href="*" class="btn-outline active" data-toggle="filter">All</a></li>
                        <?php foreach ($getAllProjectCategories as $rowPC): ?>
                            <li><a href="prdctctgry<?= $rowPC['id'] ?>" class="btn-outline" data-toggle="filter"><?= $rowPC['name'.cnvrtlng($lang)]; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="row g-0">
            <?php foreach ($getAllProjects as $rowP): ?>
                <div class="col-sm-6 filters prdctctgry<?= $rowP['category_id']; ?>">
                    <div class="grid-img">
                        <a href="<?= base_url($lang.'/project/'.$rowP['url']); ?>">
                            <img class="img-auto lazyload" src="<?= base_url('public/assets/uploads/projects/'.$rowP['banner']); ?>" alt="">
                            <div class="gird-caption">
                                <span><?= $rowP['title'.cnvrtlng($lang)] ?></span>
                                <!-- <span>Visual Identity for <br>Hong Kong Design Centre</span> -->
                            </div>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="form-btn">
            <a href="" class="btn-block">See all projects</a>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>

<!-- #Footer# -->
<?= $this->section('custom_footer'); ?>

<?= $this->endSection(); ?>
