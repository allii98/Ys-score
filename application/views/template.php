<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>

    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link href="<?php echo base_url() ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="<?php echo base_url() ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <link href="<?php echo base_url() ?>assets/vendors/nprogress/nprogress.css" rel="stylesheet">

    <link href="<?php echo base_url() ?>assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">

    <link href="<?php echo base_url() ?>assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css"
        rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css"
        rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css"
        rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css"
        rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css"
        rel="stylesheet">



    <link href="<?php echo base_url() ?>assets/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css"
        rel="stylesheet">

    <link href="<?php echo base_url() ?>assets/build/css/custom.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">

    <!-- <link href="<?php echo base_url() ?>assets/build/css/custom.css" rel="stylesheet"> -->
    <meta name="robots" content="noindex, nofollow">

</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="<?= base_url('Home') ?>" class="site_title"><i class="fa fa-paw"></i>
                            <span>Ys-Score</span></a>
                    </div>
                    <div class="clearfix"></div>

                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="<?php echo base_url() ?>assets/production/images/img.jpg" alt="..."
                                class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2>John Doe</h2>
                        </div>
                    </div>

                    <br />

                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>General</h3>
                            <ul class="nav side-menu">

                                <li><a href="<?= base_url('Home') ?>"><i class="fa fa-home"></i> Home</a></li>
                                <li><a><i class="fa fa-edit"></i> Data <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="<?= base_url('User') ?>">User</a></li>
                                        <li><a href="<?= base_url('Pertandingan') ?>">Input pertandingan</a></li>
                                        <li><a href="<?= base_url('Sejarah') ?>">Sejarah</a></li>
                                        <li><a href="<?= base_url('About') ?>">About</a></li>
                                        <li><a href="<?= base_url('Url') ?>">Url</a></li>
                                    </ul>

                                </li>

                            </ul>
                        </div>

                    </div>




                </div>
            </div>

            <div class="top_nav">
                <div class="nav_menu">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <nav class="nav navbar-nav">
                        <ul class=" navbar-right">
                            <li class="nav-item dropdown open" style="padding-left: 15px;">
                                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true"
                                    id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                    <img src="<?php echo base_url() ?>assets/production/images/img.jpg" alt="">John Doe
                                </a>
                                <div class="dropdown-menu dropdown-usermenu pull-right"
                                    aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="<?= base_url('Login/logout') ?>"><i
                                            class="fa fa-sign-out pull-right"></i>
                                        Log Out</a>
                                </div>
                            </li>

                        </ul>
                    </nav>
                </div>
            </div>

            <script src="<?php echo base_url() ?>assets/vendors/jquery/dist/jquery.min.js"></script>
            <script src="<?php echo base_url() ?>assets/vendors/pnotify/dist/pnotify.js"></script>
            <script src="<?php echo base_url() ?>assets/vendors/pnotify/dist/pnotify.buttons.js"></script>
            <script src="<?php echo base_url() ?>assets/vendors/pnotify/dist/pnotify.nonblock.js"></script>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

            <script src="<?php echo base_url() ?>assets/vendors/moment/min/moment.min.js"></script>
            <script src="<?php echo base_url() ?>assets/vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
            <script src="https://cdn.ckeditor.com/4.19.0/standard/ckeditor.js"></script>
            <script
                src="<?php echo base_url() ?>assets/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js">
            </script>


            <!-- untuk load js nya -->
            <?php if (!empty($js) || $js != '') : echo $this->load->view('js/' . $js . '.php');
            endif; ?>
            <!-- end load js nya -->

            <div class="right_col" role="main">
                <?php echo $contents ?>


            </div>

            <footer>
                <div class="pull-right">
                    Ys-Score
                </div>
                <div class="clearfix"></div>
            </footer>

        </div>
    </div>


    <script src="<?php echo base_url() ?>assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <script src="<?php echo base_url() ?>assets/vendors/fastclick/lib/fastclick.js"></script>

    <script src="<?php echo base_url() ?>assets/vendors/nprogress/nprogress.js"></script>

    <script src="<?php echo base_url() ?>assets/vendors/iCheck/icheck.min.js"></script>

    <script src="<?php echo base_url() ?>assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js">
    </script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js">
    </script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js">
    </script>
    <script src="<?php echo base_url() ?>assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/jszip/dist/jszip.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendors/pdfmake/build/vfs_fonts.js"></script>


    <script src="<?php echo base_url() ?>assets/build/js/custom.min.js"></script>
</body>

</html>