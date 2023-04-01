<!-- Header -->
<header class="topbar" data-navbarbg="skin5">
     <nav class="navbar top-navbar navbar-expand-md navbar-dark">
          <div class="navbar-header" data-logobg="skin5">
               <a class="navbar-brand" href="<?= base_url('admin'); ?>">
                    <b class="logo-icon ps-2" style="display: none">
                         <img src="<?= base_url('/public/assets/uploads/systems/'.$systemConfiguration['logo']); ?>" alt="homepage" class="light-logo" width="25" />
                    </b>
                    <span class="logo-text ms-2">
                         <img src="<?= base_url('/public/assets/uploads/systems/'.$systemConfiguration['logo']); ?>" alt="homepage" class="light-logo" width="100%" />
                    </span>
               </a>
               <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)">
                    <i class="ti-menu ti-close"></i>
               </a>
          </div>
          <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
               <ul class="navbar-nav float-start me-auto"></ul>
               <ul class="navbar-nav float-end">
                    <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              <img src="<?= $account['photo']; ?>" alt="user" class="rounded-circle" width="31" />
                         </a>
                         <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="<?= base_url('admin/users/user_profile'); ?>">
                                   <i class="mdi mdi-account me-1 ms-1"></i> My Profile
                              </a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="<?= base_url('admin/logout'); ?>">
                                   <i class="fa fa-power-off me-1 ms-1"></i> Logout
                              </a>
                         </ul>
                    </li>
               </ul>
          </div>
     </nav>
</header>

<aside class="left-sidebar" data-sidebarbg="skin5">
     <div class="scroll-sidebar">
          <nav class="sidebar-nav">
               <ul id="sidebarnav" class="pt-4">
                    <li class="sidebar-item" style="display: none">
                         <a href="<?= base_url('admin'); ?>" class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false">
                              <i class="mdi mdi-view-dashboard"> </i><span class="hide-menu">Dashboard</span>
                         </a>
                    </li>
                    <li class="sidebar-item">
                         <a href="<?= base_url('admin/home'); ?>" class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false">
                              <i class="mdi mdi-home"> </i><span class="hide-menu">Home Content</span>
                         </a>
                    </li>
                    <li class="sidebar-item">
                         <a href="<?= base_url('admin/brandteller'); ?>" class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false">
                              <i class="mdi mdi-package"> </i><span class="hide-menu">Brandteller</span>
                         </a>
                    </li>
                    <li class="sidebar-item">
                         <a href="<?= base_url('admin/projects'); ?>" class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false">
                              <i class="mdi mdi-receipt"> </i><span class="hide-menu">Projects</span>
                         </a>
                    </li>
                    <li class="sidebar-item">
                         <a href="<?= base_url('admin/aboutus'); ?>" class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false">
                              <i class="mdi mdi-information-outline"> </i><span class="hide-menu">About Us</span>
                         </a>
                    </li>
                    <li class="sidebar-item">
                         <a href="<?= base_url('admin/contactus'); ?>" class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false">
                              <i class="mdi mdi-contact-mail"> </i><span class="hide-menu">Contact Us</span>
                         </a>
                    </li>
                    <li class="sidebar-item">
                         <a href="<?= base_url('admin/users'); ?>" class="sidebar-link waves-effect waves-dark sidebar-link" aria-expanded="false">
                              <i class="mdi mdi-account-multiple"> </i><span class="hide-menu">Accounts</span>
                         </a>
                    </li>
                    <?php if (session()->get('role') == '1' || session()->get('role') == '2'): ?>
                         <li class="sidebar-item">
                              <a href="<?= base_url('admin/systems/general'); ?>" class="sidebar-link waves-effect waves-dark" aria-expanded="false" >
                                   <i class="mdi mdi-settings"> </i><span class="hide-menu">System Config</span>
                              </a>
                         </li>
                    <?php endif; ?>
               </ul>
          </nav>
     </div>
</aside>