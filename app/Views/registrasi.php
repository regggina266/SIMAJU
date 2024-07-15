<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>WEB CV TOKO ARYA | SI-MAJU</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
    <meta content="Coderthemes" name="author">
    <!-- App favicon -->
    <link rel="icon" type="image/png" href="<?= base_url();?>assets/login/images/cv arya.png">

    <!-- App css -->
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

    <script src="<?= base_url() ?>node_modules/sweetalert/dist/sweetalert.min.js"></script>

    <style>
        body.authentication-bg {
            background: #f5f5f5; /* Warna latar belakang untuk halaman registrasi */
        }

        .account-pages {
            margin: 5% auto;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #3b5998; /* Warna latar belakang untuk header card */
            border-bottom: none;
            padding: 20px;
            text-align: center;
        }

        .card-header a {
            text-decoration: none;
            color: #ffffff;
            font-size: 24px;
            font-weight: bold;
        }

        .card-body {
            padding: 20px;
        }

        .form-control-lg {
            height: calc(2.5rem + 2px);
            font-size: 1.125rem; /* Ukuran font untuk input besar */
        }

        .btn-primary {
            background-color: #3b5998; /* Warna tombol registrasi */
            border: none;
            width: 100%;
            padding: 15px;
            font-size: 18px;
            font-weight: bold;
        }

        .btn-primary:hover {
            background-color: #293e69; /* Warna tombol saat dihover */
        }

        .footer {
            text-align: center;
            padding: 20px 0;
            color: #888;
            background-color: #f9f9f9; /* Warna latar belakang footer */
            border-top: 1px solid #eaeaea;
            font-size: 14px;
        }

        .footer-alt {
            background-color: #ffffff; /* Warna latar belakang alternatif untuk footer */
            color: #666;
        }
    </style>

</head>

<body class="loading authentication-bg" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>

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

    <div class="account-pages">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-4 col-lg-7">
                    <div class="card">

                        <!-- Logo -->
                        <div class="card-header" style="background-color: #75c2ef; border-color: #75c2ef;" >
                            <a href="<?= base_url("beranda") ?>">
                                <span class="text-light font-20">CV Toko Arya</span>
                            </a>
                        </div>

                        <div class="card-body p-4">

                            <div class="text-center w-75 m-auto">
                                <h4 class="text-dark-50 text-center pb-0 fw-bold">Buat Akun</h4>
                                <p class="text-muted mb-4">Mohon lengkapi formulir di bawah ini untuk membuat akun baru.</p>
                            </div>

                            <form method="post" action="<?= base_url('registrasi/add_pelanggan') ?>" enctype="multipart/form-data" class="needs-validation" novalidate>
                                <?php if (session()->getFlashdata('danger')) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?= session()->getFlashdata('danger') ?>
                                    </div>
                                <?php endif; ?>

                                <div class="mb-2 row">
                                    <label for="validationCustom01" class="col-sm-3 col-form-label col-form-label-lg-2">Nama</label>
                                    <div class="col-sm-9">
                                        <input class="form-control form-control-lg" type="text" name="nama_pelanggan" required placeholder="Nama lengkap" id="validationCustom01">
                                        <div class="invalid-feedback">
                                            Masukkan nama lengkap!
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="validationCustom02" class="col-sm-3 col-form-label col-form-label-lg-2">Username</label>
                                    <div class="col-sm-9">
                                        <input class="form-control form-control-lg" type="text" name="username_pelanggan" required placeholder="Username" id="validationCustom02">
                                        <div class="invalid-feedback">
                                            Masukkan Username!
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="validationCustom03" class="col-sm-3 col-form-label col-form-label-lg-2">Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control form-control-lg" name="password_pelanggan" placeholder="Password" id="validationCustom03" minlength="8" required>
                                        <div class="invalid-feedback">
                                            Masukkan Password (minimal 8 karakter)!
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="example-select" class="col-sm-3 col-form-label col-form-label-lg-2">Jenis Kelamin</label>
                                    <div class="col-sm-9">
                                        <select name="jenis_kelamin" class="form-control form-control-lg" id="example-select" required>
                                            <option value="" disabled selected hidden>- Pilih -</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Pilih jenis kelamin!
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="validationCustom04" class="col-sm-3 col-form-label col-form-label-lg-2">Nomor WhatsApp</label>
                                    <div class="col-sm-9">
                                        <input class="form-control form-control-lg" type="number" min="0" onKeyPress="if(this.value.length==16) return false;" name="nohp" required placeholder="Nomor WhatsApp" id="validationCustom04">
                                        <div class="invalid-feedback">
                                            Masukkan Nomor WhatsApp!
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="validationCustom05" class="col-sm-3 col-form-label col-form-label-lg-2">NIK</label>
                                    <div class="col-sm-9">
                                        <input class="form-control form-control-lg" type="text" minlength="16" maxlength="16" onkeyup="validateNumberInput(this)" name="no_ktp" required placeholder="Nomor KTP" id="validationCustom05">
                                        <div class="invalid-feedback">
                                            Masukkan Nomor KTP (16 digit)!
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-2 row">
                                    <label for="validationCustom06" class="col-sm-3 col-form-label col-form-label-lg-2">Foto KTP</label>
                                    <div class="col-sm-9">
                                        <input class="form-control form-control-lg" type="file" name="foto_ktp" required placeholder="Foto KTP" id="validationCustom06">
                                        <div class="invalid-feedback">
                                            Upload Foto KTP!
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4 row">
                                    <label for="validationCustom07" class="col-sm-3 col-form-label col-form-label-lg-2">Alamat</label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control form-control-lg" rows="5" maxlength="250" name="alamat" required placeholder="Alamat" id="validationCustom07"></textarea>
                                        <div class="invalid-feedback">
                                            Masukkan Alamat!
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3 mb-0 text-center">
                                    <button class="btn btn-primary" type="submit" style="background-color: #75c2ef; border-color: #75c2ef;"> Registrasi </button>
                                </div>

                            </form>
                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-muted">Sudah memiliki akun? <a href="<?= base_url("auth") ?>" class="text-muted ms-1"><b>Login</b></a></p>
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <footer class="footer">
        <div class="container">
            2023 © Gallery Seserahan Lia
        </div>
    </footer>

    <!-- bundle -->
    <script src="<?= base_url("assets/js/vendor.min.js") ?>"></script>
    <script src="<?= base_url("assets/js/app.min.js") ?>"></script>

    <!-- custom script -->
    <script>
        // Function to validate NIK input
        function validateNumberInput(input) {
            var value = input.value;

            // Remove non-numeric characters
            value = value.replace(/\D/g, '');

            // Limit the input length to 16 characters
            if (value.length > 16) {
                value = value.slice(0, 16);
            }

            // Ensure the input value is exactly 16 characters long
            if (value.length < 16) {
                input.setCustomValidity('Input must be exactly 16 characters long');
            } else {
                input.setCustomValidity('');
            }

            // Update the input value after filtering
            input.value = value;
        }
    </script>

    <!--===============================================================================================-->
    <script src="<?= base_url(); ?>assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url(); ?>assets/login/vendor/bootstrap/js/popper.js"></script>
    <script src="<?= base_url(); ?>assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url(); ?>assets/login/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?= base_url(); ?>assets/login/vendor/tilt/tilt.jquery.min.js"></script>
    

</body>

</html>
