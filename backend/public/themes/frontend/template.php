<!doctype html>
<html class="no-js" lang="<?= $lang; ?>">
<head>
<meta charset="utf-8">
<title><?= $systemConfiguration['name']; ?> | <?= $page_title; ?></title>
     <meta name="robots" content="index, follow">
     <meta name="description" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <meta name="msapplication-TileImage" content="img/favicon/windows-tile-icon.png">
     <meta name="msapplication-TileColor" content="#86BF40">

     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="<?= base_url(); ?>/public/themes/frontend/dist/css/base.css" media="all"/>

     <!-- Custom Stylesheet -->
     <link rel="stylesheet" href="<?= base_url(); ?>/public/themes/frontend/dist/css/style.css" media="all"/>

     <script src="<?= base_url(); ?>/public/themes/frontend/dist/js/pace.min.js"></script>

     <!-- Favicons -->
     <link rel="shortcut icon" href="<?= base_url(); ?>/public/themes/frontend/dist/images/favicon/favicon.ico">
     <link rel="apple-touch-icon" href="<?= base_url(); ?>/public/themes/frontend/dist/images/favicon/apple-touch-icon.png">
     <link rel="icon" href="<?= base_url(); ?>/public/themes/frontend/dist/images/favicon/android-touch-icon.png">

     <script> var BASE_URL = '<?= base_url(); ?>'; </script>

     <?= $this->renderSection('custom_header'); ?>
</head>
<body>
     <div id="main-container">
          <header>
               <div class="header <?= $added_nav_class; ?>">
                    <div class="container">
                         <div class="logo">
                              <a href="<?= base_url($lang.'/home'); ?>">
                                   <img src="<?= base_url(); ?>/public/themes/frontend/dist/images/page_template/logo.png" width="122" height="31" alt="">
                              </a>
                         </div>
                         <div class="header-right">
                              <nav class="menu">
                                   <ul>
                                        <li>
                                             <a href="<?= base_url($lang.'/projects'); ?>"><?= displaylanguage($lang, 'Projects TC', 'Projects SC', 'Projects'); ?></a>
                                        </li>
                                        <li>
                                             <a href="<?= base_url($lang.'/aboutus'); ?>"><?= displaylanguage($lang, 'About TC', 'About SC', 'About'); ?></a>
                                        </li>
                                        <li>
                                             <a href="<?= base_url($lang.'/brandteller'); ?>"><?= displaylanguage($lang, 'Brandteller TC', 'Brandteller SC', 'Brandteller'); ?></a>
                                        </li>
                                        <li>
                                             <a href="<?= base_url($lang.'/contactus'); ?>"><?= displaylanguage($lang, 'Contact TC', 'Contact SC', 'Contact'); ?></a>
                                        </li>
                                   </ul>
                              </nav>
                              <div class="user">
                                   <a href="" class="sns"><i class="fab fa-whatsapp"></i></a>
                                   <div class="lang" data-toggle="dropdown">
                                        <span><?= displaylanguage($lang, '繁', '简', 'EN'); ?> <i class="fal fa-chevron-down"></i></span>
                                        <ul class="dropdown dropdown-sm" aria-hidden="true">
                                             <li>
                                                  <a href="<?= switch_lang($lang, 'en'); ?>">EN</a>
                                             </li>
                                             <li>
                                                  <a href="<?= switch_lang($lang, 'tc'); ?>">繁</a>
                                             </li>
                                             <li>
                                                  <a href="<?= switch_lang($lang, 'sc'); ?>">简</a>
                                             </li>
                                        </ul>
                                   </div>
                              </div>
                         </div>

                         <div class="burger-menu" data-toggle="menu" aria-controls="mobile-menu">
                              <i class="fal fa-bars"></i>
                         </div>
                    </div>
               </div>
          </header>

          <!-- main start -->
          <main id="main-wrapper" class="z-index">
               <?= $this->renderSection('content'); ?>
          </main>

          <!-- footer start -->
          <footer>
               <div class="container">
                    <div class="footer">
                         <img src="<?= base_url(); ?>/public/assets/uploads/contactus/<?= $footer_content['foo_logo'] ?>" width="122" height="31" alt="">
                         <div class="footer-bottom">
                              <div class="footer-left">
                                   <a href="mailto:<?= $contactus_content['con_email']; ?>"><?= $contactus_content['con_email']; ?></a>
                                   <a href="tel:<?= $contactus_content['con_number']; ?>"><?= $contactus_content['con_number']; ?></a>
                                   <span><?= $footer_content['copyrights'.cnvrtlng($lang)]; ?></span>
                              </div>
                              <div class="footer-right">
                                   <a href="<?= $footer_content['soc_wa'] ?>" class="footer-icon">
                                        <i class="fab fa-whatsapp"></i>
                                        <span><?= $contactus_content['wa_text'.cnvrtlng($lang)] ?></span>
                                   </a>
                                   <div class="footer-sns">
                                        <a href="<?= $footer_content['soc_fb'] ?>"><i class="fab fa-facebook-f"></i></a>
                                        <a href="<?= $footer_content['soc_ins'] ?>"><i class="fab fa-instagram"></i></a>
                                        <a href="<?= $footer_content['soc_yt'] ?>"><i class="fab fa-youtube"></i></a>
                                        <a href="<?= $footer_content['soc_vm'] ?>"><i class="fab fa-vimeo-v"></i></a>
                                        <a href="<?= $footer_content['soc_pin'] ?>"><i class="fab fa-pinterest"></i></a>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </footer>
          <!-- footer end -->
     </div>

     <!-- mobile menu start -->
     <div class="mobile-menu" id="mobile-menu">
          <div class="menu-container">
               <div class="mobile-menu-header">
                    <img class="img-fluid lazyload" src="<?= base_url(); ?>/public/themes/frontend/dist/images/page_template/logo.png" alt="">
                    <button class="menu-close" data-toggle="close" aria-controls="mobile-menu"><i class="fal fa-times"></i></button>
               </div>
               <div class="menu-holder mt-4">
                    <ul>
                         <li>
                              <a href="<?= base_url($lang.'/projects'); ?>"><?= displaylanguage($lang, 'Projects TC', 'Projects SC', 'Projects'); ?></a>
                         </li>
                         <li>
                              <a href="<?= base_url($lang.'/aboutus'); ?>"><?= displaylanguage($lang, 'About TC', 'About SC', 'About'); ?></a>
                         </li>
                         <li>
                              <a href="<?= base_url($lang.'/brandteller'); ?>"><?= displaylanguage($lang, 'Brandteller TC', 'Brandteller SC', 'Brandteller'); ?></a>
                         </li>
                         <li>
                              <a href="<?= base_url($lang.'/contactus'); ?>"><?= displaylanguage($lang, 'Contact TC', 'Contact SC', 'Contact'); ?></a>
                         </li>
                    </ul>

                    
                    <div class="mobile-lang">
                         <a href="<?= switch_lang($lang, 'en'); ?>">EN</a>
                         <a href="<?= switch_lang($lang, 'tc'); ?>">繁</a>
                         <a href="<?= switch_lang($lang, 'sc'); ?>">简</a>
                    </div>
               </div>

               <div class="mobile-menu-footer">
                    <a href="<?= $footer_content['soc_wa'] ?>" class="mobile-whatsapp">
                         <i class="fab fa-whatsapp"></i>
                         <span><?= $contactus_content['wa_text'.cnvrtlng($lang)] ?></span>
                    </a>
                    <div class="mobile-sns">
                         <a href="<?= $footer_content['soc_fb'] ?>"><i class="fab fa-facebook-f"></i></a>
                         <a href="<?= $footer_content['soc_ins'] ?>"><i class="fab fa-instagram"></i></a>
                         <a href="<?= $footer_content['soc_yt'] ?>"><i class="fab fa-youtube"></i></a>
                         <a href="<?= $footer_content['soc_vm'] ?>"><i class="fab fa-vimeo-v"></i></a>
                         <a href="<?= $footer_content['soc_pin'] ?>"><i class="fab fa-pinterest"></i></a>
                    </div>
               </div>
          </div>
     </div>
     <!-- mobile menu end -->

     <!-- backdrop start -->
     <div class="layout-backdrop" aria-hidden="true"></div>
     <!-- backdrop menu end -->

     <script src="<?= base_url(); ?>/public/themes/frontend/dist/js/base.min.js"></script>
     <script src="<?= base_url(); ?>/public/themes/frontend/dist/js/all.min.js"></script>

     <script src="<?= base_url(); ?>/public/themes/global/js/global_functions.js"></script>
     <script> var lang = "<?= $lang; ?>"; </script>

     <script>
          var srchkywrd = document.getElementById('txtSearchKeyword');
          srchkywrd.onkeydown = function(e) {
               if (e.keyCode == 13) {
                    document.getElementById('btnSubmitSearchKeyword').click();
               }
               // e.preventDefault();
          }
     </script>

     <?= $this->renderSection('custom_footer'); ?>
</body>
</html>
