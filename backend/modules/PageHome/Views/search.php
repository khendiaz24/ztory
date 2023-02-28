<?= $this->extend('../../public/themes/frontend/template'); ?>

<!-- #Header# -->
<?= $this->section('custom_header'); ?>

<?= $this->endSection(); ?>

<!-- #Content# -->
<?= $this->section('content'); ?>

<div class="section">
     <div class="container">
          <p><?= $Keyword; ?> <?= displaylanguage($lang, '搜尋結果：', 'Search results:'); ?><?= (empty($Keyword) ? "0" : count($getAllSearchResults)); ?></p>
					
          <div class="row mt-5 gy-4 align-items-center">
               <?php if (empty($Keyword) || count($getAllSearchResults) == 0) { ?>
                    <span><?= displaylanguage($lang, '無相關搜尋結果。', 'No relevant search results.'); ?></span>
               <?php } else { ?>
                    <?php foreach ($getAllSearchResults as $row): ?>
                         <div class="col-md-6 col-lg-4">
                              <div class="results" data-bs-toggle="modal" data-bs-target="#mdl<?= $row['id']; ?>">
                                   <span><?= $row['result_header'.cnvrtlng($lang)] ?></span>
                                   <i class="far fa-chevron-right"></i>
                              </div>
                         </div>
                    <?php endforeach; ?>
               <?php } ?>
          </div>
     </div>
</div>

<?= $this->endSection(); ?>

<!-- #Footer# -->
<?= $this->section('custom_footer'); ?>

<?php foreach ($getAllSearchResults as $rowMDL): ?>
<div class="modal result-modal fade" id="mdl<?= $rowMDL['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               <div class="modal-body">
                    <h2><?= $rowMDL['result_title'.cnvrtlng($lang)]; ?></h2>
                    <p><?= $rowMDL['result_details'.cnvrtlng($lang)]; ?></p>
               </div>
          </div>
     </div>
</div>
<?php endforeach; ?>


<?= $this->endSection(); ?>