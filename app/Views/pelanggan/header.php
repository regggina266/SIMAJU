<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?= base_url("assets") ?>/images/logo-gs.jpeg">

    <!-- third party css -->
    <link href="<?= base_url("assets") ?>/css/vendor/dataTables.bootstrap5.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url("assets") ?>/css/vendor/responsive.bootstrap5.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url("assets") ?>/css/vendor/buttons.bootstrap5.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url("assets") ?>/css/vendor/select.bootstrap5.css" rel="stylesheet" type="text/css">
    <!-- third party css end -->

    <!-- App css -->
    <link href="<?= base_url("assets") ?>/css/icons.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url("assets") ?>/css/app.min.css" rel="stylesheet" type="text/css" id="light-style">
    <link href="<?= base_url("assets") ?>/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style">

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


</head>

<body class="loading" data-layout="topnav" data-layout-config='{"layoutBoxed":false,"darkMode":false,"showRightSidebarOnStart": false}'>

    <div id="preloader">
        <div id="status">
            <div class="bouncing-loader">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
    </div>
    <!-- End Preloader-->

    <!-- Begin page -->
    <div class="wrapper">

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">
                <!-- Topbar Start -->
                <div class="navbar-custom topnav-navbar">
                    <div class="container-fluid">

                        <!-- LOGO -->
                        <a href="" class="topnav-logo">
                            <span class=" top-nav-lg font-16 text-primary">
                                <b>GALLERY SESERAHAN LIA</b>
                            </span>
                        </a>

                        <ul class="list-unstyled topbar-menu float-end mb-0">
                            <li class="p-3">
                                <a href="<?= base_url("customer") ?>">
                                    <span class="font-16 text-dark ">
                                        <b>HOME</b>
                                    </span>
                                </a>
                            </li>
                            <li class="p-3">
                                <a href="<?= base_url("transaksi/transaksi_customer") ?>">
                                    <span class="font-16 text-dark ">
                                        <b>TRANSAKSI</b>
                                    </span>
                                </a>
                            </li>
                            <li class="notification-list">
                                <a class="nav-link" href="<?= base_url("keranjang") ?>">
                                    <i class="dripicons-cart noti-icon text-dark"></i>
                                </a>
                            </li>

                            <li class="dropdown notification-list">
                                <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" id="topbar-userdrop" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                    <span class="account-user-avatar">
                                        <img src="<?= base_url("assets") ?>/images/users/free-user.png" alt="user-image" class="rounded-circle">
                                    </span>
                                    <span class="account-user-name text-dark pt-1"><?= session('nama') ?></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown" aria-labelledby="topbar-userdrop">
                                    <!-- item-->
                                    <div class=" dropdown-header noti-title">
                                        <a href="<?= base_url('profil/' . session('id')); ?>" class=" text-dark text-overflow m-0"><i class="uil-edit font-20"></i> Profil</a>
                                    </div>
                                    <div class=" dropdown-header noti-title">
                                        <a href="<?= base_url("auth/logout") ?>" class=" text-dark text-overflow m-0"><i class="uil-exit font-20"></i> Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- end content -->