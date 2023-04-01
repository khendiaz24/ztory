<!DOCTYPE html >
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="robots" content="noindex,nofollow" />

        <title>Login | <?= $systemConfiguration['name']; ?> - Content Managemeny System</title>
        <!-- Favicon icon -->
        <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url(); ?>/public/themes/frontend/dist/images/favicon/windows-tile-icon.png" />

        <link href="<?= base_url(); ?>/public/themes/admin/dist/css/style.min.css" rel="stylesheet" />
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="hold-transition login-page bg-dark">
        <div class="main-wrapper">
            <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="padding-top: 120px">
                <div class="auth-box bg-dark border-top border-secondary col-4">
                    <div id="loginform">
                        <div class="text-center pt-3 pb-3">
                            <span class="db"><img src="<?= base_url('/public/assets/uploads/systems/'.$systemConfiguration['logo']); ?>" alt="logo" /></span>
                        </div>

                        <?php if (isset($validation)): ?>
                        <div class="mb-3">
                            <div class="alert" role="alert" style="font-size: 14px; color: #fff">
                                <i><small>*</small> <?= $validation; ?></i>
                            </div>
                        </div>
                        <?php endif; ?>

                        <form class="form-horizontal mt-3" id="loginform" action="<?= base_url('admin/login'); ?>" method="POST" onsubmit="return validate_login()">
                            <div class="row pb-4">
                                <div class="col-12">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-<?= $systemConfiguration['theme']; ?> text-white h-100" id="basic-addon1">
                                                <i class="mdi mdi-account fs-4"></i>
                                            </span>
                                        </div>
                                        <input type="text" id="username" name="email" class="form-control form-control-lg" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" required="" />
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-<?= $systemConfiguration['theme']; ?> text-white h-100" id="basic-addon2">
                                                <i class="mdi mdi-lock fs-4"></i>
                                            </span>
                                        </div>
                                        <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" required="" />
                                    </div>
                                </div>
                            </div>
                            <div class="text-center pb-4" style="color: #FFF; font-size: 13px">
                                <strong>© Generic CMS <?= date("Y", time()); ?>. All Rights Reserved.</strong>
                            </div>
                            <div class="row border-top border-secondary">
                                <div class="col-12">
                                    <div class="form-group">
                                        <div class="pt-3">
                                            <button class="btn btn-<?= $systemConfiguration['theme']; ?> float-end text-white" type="submit">Login</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="<?= base_url() ?>/public/themes/admin/assets/libs/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap tether Core JavaScript -->
        <script src="<?= base_url() ?>/public/themes/admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="<?= base_url() ?>/public/themes/global/js/global_functions.js"></script>
        <script src="<?= base_url() ?>/modules/Users/JSCSS/users_login.js"></script>
    </body>
</html>
