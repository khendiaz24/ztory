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
                              <h2><?= $getProjectData['lm_title'.cnvrtlng($lang)]; ?></h2>
                              <p class="lead"><?= $getProjectData['lm_full_details'.cnvrtlng($lang)]; ?></p>
                         </div>
                    </div>
               </div>
          </div>
     </div>

     <div class="section dark p-0">
          <?php foreach ($getLMImagesData as $rowLM): ?>
               <div class="col-graphics border">
                    <img class="img-auto lazyload" src="<?= base_url('public/assets/uploads/projects/'.$rowLM['image']); ?>" alt="">
               </div>
          <?php endforeach; ?>
     </div>

</div>

<?= $this->endSection(); ?>

<!-- #Footer# -->
<?= $this->section('custom_footer'); ?>

<?= $this->endSection(); ?>
