<!DOCTYPE html>
<html lang="en">

<head>
    
</head>
<style>
     /* untuk mengatur tampilan aksi agar sejajar ke kanan samping */
    .btnlist{
        display: flex;
        gap: 0.5em;
        justify-content: center;
    }
      /* untuk pengaturan tampilan loading */
    .bg-custom{
        background: rgba(40,40,40,0.7);
        transition:  height 0.2s linear;
        transition-delay: 2s;
    }
     /* untuk menambahkan foto di loading */
    .bg-custom img {
        width: 50% !important;
        display: block;
    }
    /* agar tulisan yg ada pada tabel menjadi rata tengah */
    #example2 th, td{
        text-align: center;
    }
    /* untuk mengatur warna teks level persetujuan GL */
    .textorange{
        color: #ff5b22;
    }
</style>
<body class="hold-transition sidebar-mini layout-fixed">

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
                            <h1 class="m-0">Detail Transaksi</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Detail</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
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
                                    <h3 class="card-title">Data Detail Transaksi</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example2" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                        <th>Nama Barang</th>
                                        <th>Kode Barang</th>
                                        <th>Kode Warna</th>
                                        <th>Kuantitas</th>
                                        <th>Stok</th>
                                        <th>Merk</th>
                                        <th>Jenis Barang</th>
                                        <th>Harga</th>
                                        <th>Jumlah Pesanan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
                                    foreach ($barang as $row) : 
                                        $id_transaksi = $row['id_transaksi'];
                                        $nama_barang = $row['nama_barang'];
                                        $kode_barang = $row['kode_barang'];
                                        $kode_warna = $row['kode_warna'];
                                        $kuantitas = $row['kuantitas'];
                                        $stok = $row['stok']; 
                                        $merk = $row['nama_merk'];
                                        $jenis_barang = $row['nama_jenis'];
                                        $harga = $row['harga'];
                                        $jumlah_produk = $row['jumlah_produk'];
                                    ?>
                                        <tr>
                                        <td><?= $nama_barang ?></td>
                                        <td><?= $kode_barang ?></td>
                                        <td><?= $kode_warna ?></td>
                                        <td><?= $kuantitas ?></td>
                                        <td><?= $stok ?></td>
                                        <td><?= $merk ?></td>
                                        <td><?= $jenis_barang ?></td>
                                        <td><?= $harga ?></td>     
                                        <td><?= $jumlah_produk ?></td>             
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