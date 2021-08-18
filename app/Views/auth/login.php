<!DOCTYPE html>
<html dir="ltr">

<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/images/favicon.png">
    <title>Agbing Magbuhos Dental Clinic</title>
    <!-- Custom CSS -->
    <link href="./dist/css/style.min.css" rel="stylesheet">
    <link href="./dist/css/auth/login.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./assets/extra-libs/prism/prism.css">
</head>

<body>
    <div class="main-wrapper bg-blue">

        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative"
           >
            <div class="auth-box row">
                <div class="col-lg-7 col-md-5 modal-bg-img" style="background-image: url(./assets/images/login-bg.png);">
                </div>
                <div class="col-lg-5 col-md-7 bg-white">
                    <div class="p-3">
                        <div class="text-center">
                            <img src="./assets/images/logo-text.png" width="150" alt="wrapkit">
                        </div>
                        <h2 class="mt-3 text-center">Sign In</h2>
                        <p class="text-center">Enter your email address and password to access admin panel.</p>
                        <form class="mt-4" method="post" action="verify_login">
                        <?php echo csrf_field(); ?>

                        <?php if(!empty(session()->getFlashdata('fail'))): ?>
                                <div class="alert alert-danger"><?php echo session()->getFlashdata('fail'); ?></div>
                        <?php endif ?>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-dark" for="email">Email</label>
                                        <input class="form-control" name="email"  id="email" type="text"
                                            placeholder="enter your email" value="<?php echo set_value('email') ?>" >
                                            <span class="text-danger"><?php echo isset($validation) ? display_error($validation, 'email') : '' ;?> </span>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-dark" for="password">Password</label>
                                        <input class="form-control" name="password" id="password" type="password"
                                            placeholder="enter your password" value="<?php echo set_value('password') ?>" >
                                            <span class="text-danger"><?php echo isset($validation) ? display_error($validation, 'password') : '' ;?> </span>
                                    </div>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="btn btn-block btn-dark">Sign In</button>
                                </div>
                                <div class="col-lg-12 text-center mt-5">
                                    Don't have an account? <a href="#" class="text-danger">Sign Up</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="./assets/libs/jquery/dist/jquery.min.js "></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="./assets/libs/popper.js/dist/umd/popper.min.js "></script>
    <script src="./assets/libs/bootstrap/dist/js/bootstrap.min.js "></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
        $(".preloader ").fadeOut();
    </script>
</body>

</html>