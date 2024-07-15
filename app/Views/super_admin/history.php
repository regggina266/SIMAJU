<!DOCTYPE html>
<html lang="en">

<head>

</head>
<style>
    /* untuk mengatur tampilan aksi agar sejajar ke kanan samping */
    .btnlist {
        display: flex;
        gap: 0.5em;
        justify-content: center;
    }

    /* untuk pengaturan tampilan loading */
    .bg-custom {
        background: rgba(40, 40, 40, 0.7);
        transition: height 0.2s linear;
        transition-delay: 2s;
    }

    /* untuk menambahkan foto di loading */
    .bg-custom img {
        width: 50% !important;
        display: block;
    }

    /* agar tulisan yg ada pada tabel menjadi rata tengah */
    #example2 th,
    td {
        text-align: center;
    }

    /* untuk mengatur warna teks level persetujuan GL */
    .textorange {
        color: #ff5b22;
    }
</style>

<body class="hold-transition sidebar-mini layout-fixed">
    <?php if ($this->session->flashdata('input')) { ?>
        <script>
            swal({
                title: "Success!",
                text: "Data Berhasil Ditambahkan!",
                icon: "success"
            });
        </script>
    <?php } ?>

    <?php if ($this->session->flashdata('eror')) { ?>
        <script>
            swal({
                title: "Erorr!",
                text: "Data Gagal Ditambahkan!",
                icon: "error"
            });
        </script>
    <?php } ?>

    <?php if ($this->session->flashdata('edit')) { ?>
        <script>
            swal({
                title: "Success!",
                text: "Data Berhasil Diedit!",
                icon: "success"
            });
        </script>
    <?php } ?>

    <?php if ($this->session->flashdata('eror_edit')) { ?>
        <script>
            swal({
                title: "Erorr!",
                text: "Data Gagal Diedit!",
                icon: "error"
            });
        </script>
    <?php } ?>

    <?php if ($this->session->flashdata('hapus')) { ?>
        <script>
            swal({
                title: "Success!",
                text: "Data Berhasil Dihapus!",
                icon: "success"
            });
        </script>
    <?php } ?>

    <?php if ($this->session->flashdata('eror_hapus')) { ?>
        <script>
            swal({
                title: "Erorr!",
                text: "Data Gagal Dihapus !",
                icon: "error"
            });
        </script>
    <?php } ?>

    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center bg-custom">
            <img src="<?= base_url();?>assets/dist/img/Loading.svg"
                alt="AdminLTELogo" />
        </div>

        <!-- Navbar -->

        <!-- /.navbar -->

        <!-- Main Sidebar Container -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">History</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">History</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    <?= $this->session->flashdata('pesan'); ?>
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">History Transaksi</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example2" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Nama Pegawai</th>
                                                <th>Kode Barang</th>
                                                <th>Tanggal Transaksi</th>
                                                <th>Pelanggan</th>
                                                <th>Jumlah Barang</th>
                                                <th>Jenis Pembayaran</th>
                                                <th>Total Harga</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($history as $row) :
                                                $idtransaksi = $row['idtransaksi'];
                                                $idakun = $row['idakun'];
                                                $idpelanggan = $row['idpelanggan'];
                                                $nama = $row['nama'];
                                                $nama_pelanggan = $row['nama_pelanggan'];
                                                $kode_barang = $row['kode_barang'];
                                                $tgl_aksi = $row['tgl_aksi'];
                                                $jumlah_produk = $row['jumlah_produk'];
                                                $total_harga = $row['total_harga'];
                                                $jenis_pembayaran = $row['jenis_pembayaran'];
                                                $idhistory = $row['idhistory'];
                                            ?>
                                                <tr>
                                                    <td><?= $nama ?></td>
                                                    <td><?= $kode_barang ?></td>
                                                    <td><?= $tgl_aksi ?></td>
                                                    <td><?= $nama_pelanggan ?></td>
                                                    <td><?= $jumlah_produk ?></td>
                                                    <td><?= $total_harga ?></td>
                                                    <td><?= $jenis_pembayaran ?></td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->

        <?php $this->load->view("components/js.php") ?>
</body>
<script>
    // pengaturan pada loading sistem //
    const img = document.querySelector('.preloader img')
    setTimeout(() => {
        img.style = 'display: block'
    }, 500)
    setTimeout(() => {
        img.style = 'display: none'
    }, 2200)
</script>
</html>