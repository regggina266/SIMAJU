<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WEB CV TOKO ARYA | SI-MAJU</title>

    <link rel="icon" type="image/png" href="<?= base_url('assets/login/images/cv arya.png'); ?>" />
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets/css/font-awesome.min.css'); ?>" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets/css/elegant-icons.css'); ?>" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets/css/nice-select.css'); ?>" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets/css/jquery-ui.min.css'); ?>" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets/css/owl.carousel.min.css'); ?>" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets/css/slicknav.min.css'); ?>" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>" type="text/css">
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
                <!-- Tempat untuk informasi header -->
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header__logo">
                        <a href="<?= base_url('/dashboardp'); ?>"><img src="<?= base_url('assets/logo.png'); ?>" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <!-- Menu navigasi -->
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <li><a href="<?= base_url('/login'); ?>"><i class="fa fa-user"></i> Login</a></li>
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

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="<?= base_url('assets/banner1.png'); ?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="<?= base_url('/'); ?>">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
                    <form id="cart-form" action="<?= base_url('/keranjang/checkout'); ?>" method="POST">
                        <table>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Select</th> <!-- Kolom untuk checkbox -->
                                    <th class="shoping__product">Barang</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($all_data_barang)) : ?>
                                    <?php $no = 1; ?>
                                    <?php foreach ($all_data_barang as $value) : ?>
                                        <tr data-harga="<?= $value['harga']; ?>">
                                            <td><?= $no++; ?></td>
                                            <td>
                                                <input type="checkbox" name="selected_items[]" value="<?= $value['idbarang']; ?>" class="product-checkbox">
                                            </td>
                                            <td class="shoping__cart__item">
                                                <img src="<?= base_url('uploads/' . $value['gambar']); ?>" width="100" height="100" alt="">
                                                <h5><?= $value['nama_barang']; ?></h5>
                                            </td>
                                            <td class="shoping__cart__price">
                                                Rp<?= number_format($value['harga']); ?>
                                            </td>
                                            <td class="shoping__cart__quantity">
                                                <!-- Hapus div "quantity" dan "pro-qty" -->
                                                <input type="number" class="form-control qty" name="jumlah[]" value="1" min="1" data-price="<?= $value['harga']; ?>">
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr>
                                        <td colspan="6">Keranjang belanja kosong.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>

                        <div class="row">
            <div class="col-lg-6">
                <div class="shoping__continue">
                    <!-- Tempat untuk lanjut berbelanja -->
                </div>
            </div>
            <div class="col-lg-6">
                <div class="shoping__checkout">
                    <h5>Cart Total</h5>
                    <ul>
                        <li>Subtotal <span id="subtotal"></span></li>
                        <li>Total <span id="grandtotal"></span></li>
                    </ul>
                    <button type="submit" class="primary-btn">PROCEED TO CHECKOUT</button>
                </div>
            </div>
        </div>
                    </form>
                </div>
            </div>
        </div>
       
    </div>
</section>

<script>
    // Ambil semua checkbox produk
    const checkboxes = document.querySelectorAll('.product-checkbox');
    // Ambil semua elemen input kuantitas
    const quantities = document.querySelectorAll('.qty');

    // Fungsi untuk menghitung ulang subtotal dan total
    function calculateTotals() {
        let subtotal = 0;

        checkboxes.forEach(checkbox => {
            if (checkbox.checked) {
                const row = checkbox.closest('tr');
                const price = parseFloat(row.getAttribute('data-harga'));
                const qty = parseInt(row.querySelector('.qty').value);
                const total = price * qty;
                subtotal += total;
            }
        });

        // Update subtotal dan total di halaman
        document.getElementById('subtotal').textContent = 'Rp' + subtotal.toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        document.getElementById('grandtotal').textContent = 'Rp' + subtotal.toFixed(0).replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    // Panggil fungsi calculateTotals saat halaman dimuat dan setiap kali checkbox atau kuantitas berubah
    window.onload = function() {
        calculateTotals();

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', calculateTotals);
        });

        quantities.forEach(quantity => {
            quantity.addEventListener('change', calculateTotals);
        });
    };
</script>

    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text">
                            <p>&copy; 2024, <a href="#">CV Toko Arya.</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="<?= base_url('assets/js/jquery-3.3.1.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/jquery.nice-select.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/jquery-ui.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/jquery.slicknav.js'); ?>"></script>
    <script src="<?= base_url('assets/js/mixitup.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/owl.carousel.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/main.js'); ?>"></script>
</body>

</html>
