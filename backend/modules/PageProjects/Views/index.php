<?= $this->extend('../../public/themes/frontend/template'); ?>

<!-- #Header# -->
<?= $this->section('custom_header'); ?>

<?= $this->endSection(); ?>

<!-- #Content# -->
<?= $this->section('content'); ?>

<div class="inner-page">

    <div class="section section-hero-inner ddgreen p-0">
        <div class="hero-content">
            <div class="container pt-5">
                <h1><?= $getProjectHeaderData['title'.cnvrtlng($lang)]; ?></h1>
            </div>
        </div>
    </div>

    <div class="section p-0 mb-5 pb-2">
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
                <?php
                    $xCategories = explode("|", $rowP['category_id']);
                    $cCategories = "";
                    foreach ($xCategories as $key => $value)
                    {
                        if (!empty($value))
                        {
                            $cCategories .= "prdctctgry".$value." ";
                        }
                    }
                ?>
                <div class="col-sm-6 filters <?= $cCategories; ?>">
                    <?php
                        $DisplayImage = $rowP['banner'];
                        if (!empty($rowP['thumbnail'])) {
                            $DisplayImage = $rowP['thumbnail'];
                        }
                    ?>
                    <div class="grid-img">
                        <a href="<?= base_url($lang.'/project/'.$rowP['url']); ?>">
                            <img class="img-auto lazyload" src="<?= base_url('public/assets/uploads/projects/'.$DisplayImage); ?>" alt="">
                            <div class="gird-caption">
                                <div class="grid-img">
                                    <img class="img-auto lazyload" src="<?= base_url('public/assets/uploads/projects/'.$DisplayImage); ?>" alt="">
                                    <div class="gird-caption">
                                        <div class="grid-inner">
                                            <span><h5><?= $rowP['client'.cnvrtlng($lang)] ?></h5></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="form-btn" style="display: none">
            <a href="" class="btn-block"><?= displaylanguage($lang, '查看所有項目', '查看所有项目', 'See all projects'); ?></a>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>

<!-- #Footer# -->
<?= $this->section('custom_footer'); ?>

<?= $this->endSection(); ?>
