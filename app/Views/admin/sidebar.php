<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url(); ?>" class="brand-link">
        <img src="<?= base_url('assets/login/images/cv arya.png'); ?>" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><b>CV TOKO ARYA</b></span>
    </a>
    <style>
        .bg-s {
            background: rgb(173, 216, 230) !important; /* Warna biru muda menggunakan RGB */
        }
        .nav-sidebar .nav-link {
        color: black !important; /* Mengubah warna font menjadi hitam */
        }
        .nav-sidebar .nav-link p {
            color: black !important; /* Mengubah warna font dalam elemen <p> menjadi hitam */
        }
        .brand-link {
            background-color: #ADD8E6; /* Warna latar belakang biru muda */
        }
        .form-inline {
            background-color: #ADD8E6; /* Warna latar belakang biru muda */
        }
        .brand-link .brand-text {
            color: black !important; /* Mengubah warna font menjadi hitam */
        }
        .user-panel .info a {
            color: black !important; /* Mengubah warna font menjadi hitam */
        }
        .form-control-sidebar {
            background-color: #ADD8E6 !important; /* Warna abu-abu */
            border: 1px solid #ccc;
            color: black; /* Warna teks kotak pencarian */
        }
        .btn-sidebar {
            background-color: #ADD8E6 !important; /* Warna abu-abu */
            border: 1px solid #ccc;
            color: black; /* Warna teks tombol */
        }
        .btn-sidebar i {
            color: black; /* Warna ikon di tombol */
        }
    </style>
    <!-- Sidebar -->
    <div class="sidebar bg-s">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('assets/dist/img/orang.png'); ?>" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= session('nama') ?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" >
                <div class="input-group-append">
            </div>
        </div>
        <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="/dashboard" class="nav-link">
                    <i class="nav-icon fas fa-home"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('/barang'); ?>" class="nav-link">
                    <i class="nav-icon fas fa-box-open"></i>
                    <p>Barang</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('/transaksi'); ?>" class="nav-link">
                    <i class="nav-icon fas fa-list-alt"></i>
                    <p>Transaksi</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url('/laporan'); ?>" class="nav-link">
                    <i class="nav-icon fas fa-copy"></i>
                    <p>Laporan Penjualan</p>
                </a>
            </li>
        </ul>
    </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
