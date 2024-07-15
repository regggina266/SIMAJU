<!DOCTYPE html>
<html lang="en">

<head></head>
<style>
 /* untuk mengedit tampilan loading */
 .bg-custom{
        background: rgba(40,40,40,0.7);
        transition:  height 0.2s linear;
        transition-delay: 2s;
    }
    /* untuk mengedit tampilan gambar loading */
    .bg-custom img {
        width: 50% !important;
        display: block;
    }
</style>
<body class="hold-transition sidebar-mini layout-fixed">   

    <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center bg-custom">
            <img src="<?= base_url();?>assets/dist/img/Loading.svg"
                alt="AdminLTELogo" />
        </div>

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                        <h2 class="m-0">Data Laporan Penjualan</h2>
                            <div class="btnlist float-right">
                                <a href="<?= base_url('Laporan/exportPDF') ?>" class="btn btn-danger">Cetak PDF</a>
                                <a href="<?= base_url('Laporan/exportExcel') ?>" class="btn btn-success">Cetak Excel</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="laporan_table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Tanggal Transaksi</th>
                                        <th>Nama Pegawai</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Nama Barang</th>
                                        <th>Kode Barang</th>
                                        <th>Kode Warna</th>
                                        <th>Kuantitas</th>
                                        <th>Jenis</th>
                                        <th>Merk</th>
                                        <th>Stok</th>
                                        <th>Harga</th>
                                        <th>Jumlah Produk</th>
                                        <th>Total Pembelian</th>
                                        <th>Jenis Pembayaran</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($transaksi as $row) :
                                            $tgl_transaksi = $row['tgl_transaksi'];
                                            $nama = $row['nama'];
                                            $nama_pelanggan = $row['nama_pelanggan'];
                                            $jumlah_produk = $row['jumlah_produk'];
                                            $total_harga = $row['total_harga'];
                                            $jenis_pembayaran = $row['jenis_pembayaran'];
                                            $nama_barang = $row['nama_barang'];
                                            $kode_barang = $row['kode_barang'];
                                            $kode_warna = $row['kode_warna'];
                                            $kuantitas = $row['kuantitas'];
                                            $nama_jenis = $row['nama_jenis'];
                                            $nama_merk = $row['nama_merk'];
                                            $stok = $row['stok'];
                                            $harga = $row['harga'];
                                        ?>
                                        <tr>
                                            <td><?= $tgl_transaksi ?></td>
                                            <td><?= $nama ?></td>
                                            <td><?= $nama_pelanggan ?></td>
                                            <td><?= $nama_barang ?></td>
                                            <td><?= $kode_barang ?></td>
                                            <td><?= $kode_warna ?></td>
                                            <td><?= $kuantitas ?></td>
                                            <td><?= $nama_jenis ?></td>
                                            <td><?= $nama_merk ?></td>
                                            <td><?= $stok ?></td>
                                            <td><?= $harga ?></td>
                                            <td><?= $jumlah_produk ?></td>
                                            <td><?= $total_harga ?></td>
                                            <td><?= $jenis_pembayaran ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</div>
        <!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->

</body>
<script>
       // pengaturan pada loading sistem //
    const img = document.querySelector('.preloader img')
    setTimeout(() => {
        img.style = 'display: block'
    },500)
    setTimeout(() => {
        img.style = 'display: none'
    },2200)
</script>
</html>
