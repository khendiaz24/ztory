<?= $this->extend('../../public/themes/frontend/template'); ?>

<!-- #Header# -->
<?= $this->section('custom_header'); ?>

<?= $this->endSection(); ?>

<!-- #Content# -->
<?= $this->section('content'); ?>

<div class="inner-page">

     <div class="section section-hero-inner p-0">
          <img class="img-objectfit lazyload" src="<?= base_url('public/assets/uploads/projects/'.$getProjectData['banner']); ?>" alt="">
     </div>

     <div class="section">
          <div class="container">
               <div class="row">
                    <div class="col-lg-8">
                         <div class="col-content col-content-md">
                              <h2 class="green-text uppercase"><?= $getProjectData['lm_title'.cnvrtlng($lang)]; ?></h2>
                              <p class="lead"><?= $getProjectData['lm_full_details'.cnvrtlng($lang)]; ?></p>
                         </div>
                    </div>
               </div>
          </div>
     </div>

     <div class="section dark p-0">
          <?php foreach ($getLMImagesData as $rowLM): ?>
               <?php if (!empty($rowLM['link'])) { ?>
                    <div class="video-banner video-thumbs" data-toggle="video">
                      <img class="img-auto lazyload" src="<?= base_url('public/assets/uploads/projects/'.$rowLM['image']); ?>" alt="" title="">
                      <iframe class="video-player" src="<?= $rowLM['link']; ?>&color=ef0800&title=0&byline=0&portrait=0" width="640" height="360" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
                  </div>
               <?php } else { ?>
                    <div class="col-graphics border text-center pl-24 pr-24">
                         <img class="img-max lazyload" src="<?= base_url('public/assets/uploads/projects/'.$rowLM['image']); ?>" alt="">
                    </div>
               <?php } ?>
          <?php endforeach; ?>
     </div>

</div>

<?= $this->endSection(); ?>

<!-- #Footer# -->
<?= $this->section('custom_footer'); ?>

<?= $this->endSection(); ?>
