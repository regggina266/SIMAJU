<!DOCTYPE html>
<html lang="en">

<head>
    <title>WEB-CV ARYA | SI-MAJU</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="shortcut icon" href="<?= base_url() ?>assets/login/images/cv arya.png">

    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/login/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/login/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/login/css/main.css">
    <!--===============================================================================================-->
    <!-- Sweetalert -->
    <script src="<?= base_url() ?>node_modules/sweetalert/dist/sweetalert.min.js"></script>
</head>
<style>
    /* untuk mengedit box login */
    .box {
        padding: 50px;
        justify-content: flex-start;
        gap: 6em;
        align-items: center;
    }

    /* untuk mengatur logo dalam box login */
    .box img {
        width: 150%;
        max-width: 350px;
    }

    /* untuk mengatur tampilan background login */
.custom-bg {
    position: relative;
    background-image: url("assets/login/images/112.jpg");
    background-size: cover;
    background-repeat: no-repeat;
    background-position: bottom;
}

/* overlay untuk efek berbayang */
.custom-bg::before {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5); /* Warna hitam dengan transparansi 50% */
    z-index: 1; /* Pastikan overlay berada di atas background tetapi di bawah konten lain */
}

/* konten di dalam .custom-bg */
.custom-bg > * {
    position: relative;
    z-index: 2; /* Konten tetap terlihat di atas overlay */
}
    /* untuk mengatur luas box login */
    .wrap-login100 {
        width: auto !important
    }

    /* untuk mengatur warna pada login */
    .input100:focus~span>i {
        color: steelblue;
    }

    /* untuk mengatur lebar dan luas pada background logn */
    .wrap-login100 {
        width: auto !important;
        border: 0.05em solid rgb(240, 240, 240);
        box-shadow: 2px 2px 2px 0 rgb(240, 240, 240);
    }
</style>

<body>

    <div class="limiter">
        <div class="container-login100 custom-bg">
            <div class="wrap-login100 box">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="<?= base_url(); ?>assets/login/images/cv arya.png" alt="IMG">
                </div>

                <form class="login100-form validate-form" action="<?= base_url(); ?>Auth/cek_login" method="POST">
                    <span class="login100-form-title">
                        Sistem Informasi Manajemen Penjualan pada CV Toko Arya
                    </span>

                    <!-- Menampilkan pesan error jika login gagal -->
                    <!-- Tampilkan pesan umum -->
                        <?php if (!empty($pesan)) : ?>
                            <div class="alert alert-success">
                                <?= $pesan; ?>
                            </div>
                        <?php endif; ?>

                        <!-- Tampilkan pesan kesalahan -->
                        <?php if (!empty($errors)) : ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php foreach ($errors as $error) : ?>
                                        <li><?= $error; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                    <div class="wrap-input100 validate-input" data-validate="username">
                        <input class="input100" type="text" name="username" placeholder="Username" autocomplete="off" required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password" placeholder="Password" autocomplete="off" required>
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" style="background: #6cb6e0;">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--===============================================================================================-->
    <script src="<?= base_url(); ?>assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url(); ?>assets/login/vendor/bootstrap/js/popper.js"></script>
    <script src="<?= base_url(); ?>assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url(); ?>assets/login/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url(); ?>assets/login/vendor/tilt/tilt.jquery.min.js"></script>
    
