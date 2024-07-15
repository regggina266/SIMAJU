<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cetak Laporan Penjualan</title>
    <style>

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

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .header {
            text-align: center;
            margin-bottom: 10px;
        }
        .header img {
            width: 50px;
            height: 50px;
            margin-right: 10px;
        }


        h1 {
            color: #333;
        }

        .sub-header {
            margin-bottom: 10px;
        }

        .sub-header p {
            margin: 0;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th,
        td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
            font-size: 12px;
        }

        th {
            background-color: skyblue;
            color: white;
        }

        .footer {
            margin-top: 5px;
            text-align: right;
        }

        .signature {
            margin-top: 50px;
            text-align: right;
        }
    </style>
</head>

<body>
    
<div class="header">
<?= isset($html_content) ? $html_content : '' ?>

    <h1>Laporan Transaksi Penjualan Barang</h1>
</div>
                        <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Tgl</th>
                                        <th>N.Pegawai</th>
                                        <th>N.Pelanggan</th>
                                        <th>N.Barang</th>
                                        <th>K.Barang</th>
                                        <th>K.Warna</th>
                                        <th>Kuantitas</th>
                                        <th>Jenis</th>
                                        <th>Merk</th>
                                        <th>Stok</th>
                                        <th>Harga</th>
                                        <th>J.Beli</th>
                                        <th>Payment</th>
                                        <th>Total Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($transaksi as $row) :
                                            $tgl_transaksi = date('d-m-Y', strtotime($row['tgl_transaksi']));
                                            $nama = $row['nama'];
                                            $nama_pelanggan = $row['nama_pelanggan'];
                                            $nama_barang = $row['nama_barang'];
                                            $kode_barang = $row['kode_barang'];
                                            $kode_warna = $row['kode_warna'];
                                            $kuantitas = $row['kuantitas'];
                                            $nama_jenis = $row['nama_jenis'];
                                            $nama_merk = $row['nama_merk'];
                                            $stok = $row['stok'];
                                            $harga = $row['harga'];   
                                            $jumlah_produk = $row['jumlah_produk'];
                                            $jenis_pembayaran = $row['jenis_pembayaran'];
                                            $total_harga = $row['total_harga'];
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
                                            <td><?= $jenis_pembayaran ?></td>
                                            <td><?= $total_harga ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
        <div class="footer">
        <p>Pelaihari, </p>
        <p>Tanda Tangan</p>
        </div>
        <div class="signature">
            <p>---------------</p>
        </div>
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