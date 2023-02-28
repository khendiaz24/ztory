<div class="row ps-4 pe-4 g-3 mt-5">
     <div class="col-md-8 col-lg-6">
          <h3 class="grid-text"><?= displaylanguage($lang, '為何選擇史丹福', 'Why choose Stanford'); ?>?</h3>
     </div>

     <?php foreach ($footerHighlights as $highlights): ?>
          <div class="col-md-4 col-lg-3">
               <div class="card-colored" style="background: <?= $highlights['bgcolor']; ?>;">
                    <span>0<?= $highlights['order']; ?></span>
                    <div class="card-colored-body">
                         <h4 class="mb-4"><?= $highlights['title'.cnvrtlng($lang)] ?></h4>
                         <div class="card-colored-img">
                              <img class="img-fluid lazyload" src="<?= base_url('public/assets/uploads/page_setup/'.$highlights['icon']); ?>" alt="">
                         </div>
                         <p><?= $highlights['details'.cnvrtlng($lang)] ?></p>
                    </div>
               </div>
          </div>
     <?php endforeach; ?>
</div>