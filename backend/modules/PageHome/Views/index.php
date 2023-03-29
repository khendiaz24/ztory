<?= $this->extend('../../public/themes/frontend/template'); ?>

<!-- #Header# -->
<?= $this->section('custom_header'); ?>

<?= $this->endSection(); ?>

<!-- #Content# -->
<?= $this->section('content'); ?>

<div class="home">

    <!-- Banner / Header -->
    <div class="section section-hero p-0">
        <div class="video-banner">
            <video class="video-player" autoplay loop muted playsinline>
                <source src="<?= base_url('public/assets/uploads/home/'.$getHomeContentData['banner']); ?>" type="video/mp4" />
            </video>
		</div>
        <div class="hero-content">
            <div class="container">
                <h1><?= $getHomeContentData['header'.cnvrtlng($lang)]; ?></h1>
            </div>
        </div>
    </div>

    <!-- Projects -->
    <div class="section p-0">
        <div class="row g-0">
            <?php foreach ($getProjectData as $rowP): ?>
                <div class="col-sm-6">
                    <a href="<?= base_url($lang.'/project/'.$rowP['url']); ?>">
                        <div class="grid-img">
                            <img class="img-auto lazyload" src="<?= base_url('public/assets/uploads/projects/'.$rowP['banner']); ?>" alt="">
                            <div class="gird-caption">
                                <div class="grid-inner">
                                    <span><?= $rowP['title'.cnvrtlng($lang)] ?></span>
                                    <h5><?= $rowP['client'.cnvrtlng($lang)] ?></h5>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="form-btn">
            <a href="<?= base_url($lang.'/projects/'); ?>" class="btn-block"><?= displaylanguage($lang, 'See all projects', 'See all projects', 'See all projects'); ?></a>
        </div>
    </div>

    <!-- Brandteller -->
    <div class="section">
        <div class="container">
            <h2><?= displaylanguage($lang, 'Brandteller', 'Brandteller', 'Brandteller'); ?></h2>
            <div class="row gx-lg-5 gy-5">
                <div class="col-md-6">
                    <div class="col-content">
                        <p class="lead"><?= $getHomeContentData['bt_header'.cnvrtlng($lang)]; ?></p>
                        <a href="<?= base_url($lang.'/brandteller'); ?>" class="btn-link mt-4"><?= displaylanguage($lang, 'SEE ALL CASE STUDIES', 'SEE ALL CASE STUDIES', 'SEE ALL CASE STUDIES'); ?></a>
                        <div class="tab-panel mt-7 d-none d-md-block">
                            <div class="col-graphics filters tab0" style="display:block;">
                                <img class="img-fluid lazyload" src="<?= base_url('public/assets/uploads/home/'.$getHomeContentData['bt_image']); ?>" alt="">
                            </div>
                            <div class="col-graphics filters tab1">
                                <img class="img-fluid lazyload" src="<?= base_url('public/assets/uploads/home/'.$getHomeContentData['bt_image']); ?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <nav class="tab-nav">
                        <ul class="tab-navs">
                            <?php $FBCtrli = 0; ?>
                            <?php foreach ($getFeaturedBrandtellerData as $rowFB): ?>
                                <li>
                                    <a href="tab<?= $FBCtrli; ?>" class="<?= ($FBCtrli == 0) ? 'active' :''; ?>" data-toggle="filter">0<?= $FBCtrli + 1; ?></a>
                                </li>
                                <?php $FBCtrli++; ?>
                            <?php endforeach; ?>
                        </ul>
                    </nav>

                    <div class="tab-panel mt-4 mt-md-5">
                        <?php $FBCtr = 0; ?>
                        <?php foreach ($getFeaturedBrandtellerData as $rowFB): ?>
                            <div class="filters tab<?= $FBCtr; ?>" style="<?= ($FBCtr == 0) ? 'display:block' :''; ?>">
                                <div class="card-big">
                                    <h3><?= $brandtellerDataLists[$rowFB['brandteller_id']]['name']; ?></h3>
                                    <p><?= $brandtellerDataLists[$rowFB['brandteller_id']]['details']; ?></p>
                                </div>
                            </div>
                            <?php $FBCtr++; ?>
                        <?php endforeach; ?>
                    </div>

                    <div class="tab-panel mt-3 d-block d-md-none">
                        <div class="col-graphics filters tab0" style="display:block;">
                            <img class="img-fluid lazyload" src="<?= base_url('public/assets/uploads/home/'.$getHomeContentData['bt_image']); ?>" alt="">
                        </div>
                        <div class="col-graphics filters tab1">
                            <img class="img-fluid lazyload" src="<?= base_url('public/assets/uploads/home/'.$getHomeContentData['bt_image']); ?>" alt="">
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

<script src="https://player.vimeo.com/api/player.js"></script>

<?= $this->endSection(); ?>
