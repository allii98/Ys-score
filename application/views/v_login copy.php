<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Log In | Generate QRCODE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/images/favicon.ico">

    <!-- App css -->
    <link href="<?php echo base_url() ?>assets/css/bootstrap-creative.min.css" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="<?php echo base_url() ?>assets/css/app-creative.min.css" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

    <link href="<?php echo base_url() ?>assets/css/bootstrap-creative-dark.min.css" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" />
    <link href="<?php echo base_url() ?>assets/css/app-creative-dark.min.css" rel="stylesheet" type="text/css" id="app-dark-stylesheet" />

    <!-- icons -->
    <link href="<?php echo base_url() ?>assets/css/icons.min.css" rel="stylesheet" type="text/css" />

</head>

<body class="loading authentication-bg authentication-bg-pattern">

    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-pattern">

                        <div class="card-body p-4">

                            <div class="text-center w-75 m-auto">
                                <div class="auth-logo">
                                    <!-- <a href="<?= base_url('Login') ?>" class="logo logo-dark text-center">
                                        <span class="logo-lg">
                                            <img src="<?php echo base_url() ?>assets/images/logo-dark.png" alt="" height="22">
                                        </span>
                                    </a>

                                    <a href="<?= base_url('Login') ?>" class="logo logo-light text-center">
                                        <span class="logo-lg">
                                            <img src="<?php echo base_url() ?>assets/images/logo-light.png" alt="" height="22">
                                        </span>
                                    </a> -->
                                    <font face="verdana">
                                        <h3><b>MSAL QRCODE</b></h3>
                                    </font>

                                </div>
                                <p><?php echo $this->session->flashdata('pesan'); ?></p>
                            </div>

                            <form action="<?= base_url('Login/proses') ?>" method="POST">

                                <div class="form-group mb-3">
                                    <label for="emailaddress" style="font-family: Verdana, Geneva, Tahoma, sans-serif; font-size:small">Username</label>
                                    <input class="form-control" type="text" id="username" name="username" required="true" placeholder="Enter your username" autocomplete="off">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password" style="font-family: Verdana, Geneva, Tahoma, sans-serif; font-size:small">Password</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" class="form-control" name="pass" placeholder="Enter your password">
                                        <div class="input-group-append" data-password="false">
                                            <div class="input-group-text">
                                                <span class="password-eye"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>




                                <div class="form-group mb-2 text-center">
                                    <!-- <button class="btn btn-primary btn-block" type="submit"> Log In </button> -->
                                    <input type="submit" class="btn btn-primary btn-block" name="submit" style="font-family: Verdana, Geneva, Tahoma, sans-serif; font-size:small" value="Log in">
                                </div>



                            </form>
                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">

                    </div>
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->


    <footer class="footer footer-alt text-white-50">
        <script>
            document.write(new Date().getFullYear())
        </script> &copy; <font face="verdana"> Copyright </font> <a href="http://msalgroup.com" style="color: #fff; font-family: Verdana, Geneva, Tahoma, sans-serif; font-size:small">MIS@2021 MSAL GROUP</a>
    </footer>

    <!-- Vendor js -->
    <script src="<?php echo base_url() ?>assets/js/vendor.min.js"></script>

    <!-- App js -->
    <script src="<?php echo base_url() ?>assets/js/app.min.js"></script>

</body>

</html>