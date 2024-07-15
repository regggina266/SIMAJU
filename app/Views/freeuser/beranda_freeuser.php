<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WEB CV TOKO ARYA | SI-MAJU</title>

    <link rel="icon" type="image/png" href="<?= base_url();?>assets/login/images/cv arya.png"  />
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="assets/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="assets/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header__logo">
                        <a href="<?= base_url('/dashboardp'); ?>"><img src="assets/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="<?= base_url('/registrasi'); ?>"><i class="fa fa-user-plus"></i> Register</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <input type="text" placeholder="Apa yang anda butuhkan?">
                                <button type="submit" class="site-btn" style="background-color: #75c2ef; border-color: #75c2ef;">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone" style="color: #75c2ef;"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+62 819-3385-4194</h5>
                                <span>Siap Melayani Anda</span>
                            </div>
                        </div>
                    </div>
                    <div class="hero__item set-bg" data-setbg="assets/awal.png">
                        <div class="hero__text">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="assets/berbagai-cat.jpg">
                            <h5><a href="assets/#">Cat</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="assets/berbagai-thinner.png">
                            <h5><a href="assets/#">Thinner</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="assets/berbagai-amplas.jpg">
                            <h5><a href="assets/#">Amplas</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="assets/berbagai-dempul.jpg">
                            <h5><a href="assets/#">Dempul</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="assets/alat-cat.jpg">
                            <h5><a href="assets/#">Lain-lain</a></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Berbagai Produk</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            <li data-filter=".cat">Cat</li>
                            <li data-filter=".thinner">Thinner</li>
                            <li data-filter=".amplas">Amplas</li>
                            <li data-filter=".dempul">Dempul</li>
                            <li data-filter=".lain-lain">Lain-lain</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                <?php
                foreach ($all_data_barang as $value) {
                    # code...
                    ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix cat">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="<?= base_url('uploads/' . $value['gambar']); ?>">
                            <ul class="featured__item__pic__hover">
                                <li>
                                    <a href="#" data-toggle="modal" data-target="#detail1" onclick="showProductDetail('Cat Nippon', '90.000', 'Deskripsi produk Cat Nippon', 'assets/cat-nippon.jpg')">
                                        <i class="fa fa-eye" title="Detail"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#"><?php echo $value['nama_barang'] ?></a></h6>
                            <h5><?php echo $value['harga'] ?></h5>
                        </div>
                    </div>
                </div>
                    <?php
                }

                ?>
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Modal Detail -->
<div class="modal fade" id="detail1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-danger">
                <h4 class="modal-title" id="exampleModalLabel">Detail Produk</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="productDetailBody">
                <div class="row">
                    <div class="col-md-12">
                        <form id="detailForm">
                            <input type="hidden" name="idbarang" id="idbarang">
                            <div class="form-group">
                                <label for="nama_produk">Nama Produk:</label>
                                <input type="text" class="form-control" id="nama_barang" name="nama_barang" readonly>
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga:</label>
                                <input type="text" class="form-control" id="harga" name="harga" readonly>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi:</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" readonly></textarea>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Fungsi untuk menampilkan modal detail produk berdasarkan ID barang yang diklik
    function showDetail(id_barang) {
        // Mengambil data produk dari server menggunakan AJAX
        $.ajax({
            url: '<?php echo base_url() ?>Freeuser/detail1', // Ganti dengan URL endpoint untuk mengambil detail produk
            type: 'POST',
            dataType: 'json',
            data: {
                id_barang: id_barang
            },
            success: function(response) {
                // Mengisi nilai field pada form detail produk
                $('#id_barang').val(response.id_barang);
                $('#nama_produk').val(response.nama_produk);
                $('#harga').val(response.harga);
                $('#deskripsi').val(response.deskripsi);

                // Menampilkan modal
                $('#detailModal').modal('show');
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                // Menampilkan pesan kesalahan jika terjadi kesalahan dalam pengambilan data
                alert('Terjadi kesalahan dalam mengambil data produk.');
            }
        });
    }
</script>
         
    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="assets/banner1.png" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="assets/banner2.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Blog Section Begin -->
    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title" >
                        <h2>Tentang Kami</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_phone" style="color: #75c2ef;"></span>
                        <h4>No HP</h4>
                        <p>+62 819-3385-4194</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_pin_alt" style="color: #75c2ef;"></span>
                        <h4>Alamat</h4>
                        <p>Jalan Ambawang, Sarang Halang, Kecamatan Pelaihari, Kabupaten Tanah Laut, Kalimantan Selatan.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_clock_alt"style="color: #75c2ef;" ></span>
                        <h4>Open time</h4>
                        <p>07:00 am to 18:00 pm</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 text-center">
                    <div class="contact__widget">
                        <span class="icon_mail_alt" style="color: #75c2ef;"></span>
                        <h4>Email</h4>
                        <p>cvtokoarya@gmail.com</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

     <!-- Map Section Begin -->
    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3312.817952709552!2d114.78162765004151!3d-3.814778492495437!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2de6f1f9704eca31%3A0x903b4bed1a0fdfd!2stoko%20cat%20oplosan%20ARYA!5e0!3m2!1sid!2sid!4v1720773327478!5m2!1sid!2sid" 
            height="500" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>
    <!-- Map Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                </div>
                <div class="col-lg-4 col-md-12">
                <div class="footer__widget">
                    <h6>Kritik dan saran</h6>
                    <p>Mari kirimkan kritik dan saran yang membangun kepada CV Toko Arya.</p>
                    <form action="#">
                            <input type="text" placeholder="Enter your email">
                            <button type="submit" class="site-btn" style="background-color: #75c2ef; border-color: #75c2ef;">Subscribe</button>
                        </form>
                        <div class="footer__widget__social">
                            <a href="https://www.facebook.com"><i class="fa fa-facebook"></i></a>
                            <a href="https://www.instagram.com"><i class="fa fa-instagram"></i></a>
                            <a href="https://www.youtube.com"><i class="fa fa-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            <strong>Copyright &copy; 2024, <a>CV Toko Arya.</a></strong>
                          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.nice-select.min.js"></script>
    <script src="assets/js/jquery-ui.min.js"></script>
    <script src="assets/js/jquery.slicknav.js"></script>
    <script src="assets/js/mixitup.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/main.js"></script>



</body>

</html>