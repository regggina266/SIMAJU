<!DOCTYPE html>
<html lang="en">

<head>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
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
        #example1 th,
        td {
            text-align: center;
            font-size: 0.9em;
        }

        /* untuk mengatur tampilan modal agar lebih luas */
        .modal-dialog {
            max-width: 900px;
        }

        /* memberi jarak pada textbox modal agar berjarak dengan yg dibawahnya */
        .col-md-6 {
            margin-bottom: 1em;
        }

        /* memberi jarak pada textbox modal agar berjarak dengan yg dibawahnya  */
        .col-12 {
            margin-bottom: 1em;
        }

        /* memperkecil tulisan pada tabel*/
        label {
            font-weight: 400 !important;
        }

        /* agar tulisan daftar item tidak berjarak dengan tulisan di bawahnya*/
        .nomargin {
            margin: 0;
        }

        /* melengkungkan pinggiran modal*/
        .modal-content {
            border-radius: 1em !important;
        }

        /* melengkungkan pinggiran modal*/
        .modal-header {
            border-radius: 1em 1em 0 0;
        }

        /* memindahkan button tambah barang di modal menjadi ke sebelah kanan ujung*/
        .rights {
            flex: 1;
            display: flex;
            gap: 1em;
            justify-content: flex-end;
            padding-right: 1em;
        }

        /* memperkecil font pada table*/
        body {
            font-size: 0.9em;
        }

        /* memindahkan button submit di modal menjadi ke sebelah kanan ujung*/
        .modal-footer {
            flex: 1;
            display: flex;
            gap: 0;
            justify-content: flex-end;
            padding-right: 0;
        }

        .list-tbl {
            width: 100% !important;
        }

        /* untuk mengatur tulisan tabel header menjadi rata tengah */
        th {
            text-align: center;
        }

        /* untuk mengatur warna tabel header dan ketebalan garisnya */
        #list-item-update {
            background: rgb(240, 240, 240);
            border: 1px solid rgb(200, 200, 200) !important;
        }
        /* modal akun */
        .akunmdl {
            padding-right: 0;
        }
    </style>

    <body class="hold-transition sidebar-mini layout-fixed">

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
                                <h1 class="m-0">Transaksi</h1>
                            </div><!-- /.col -->
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Transaksi</li>
                                </ol>
                            </div><!-- /.col -->
                            <button type="button" class="btn btn-primary mt-3 btnupdate" data-toggle="modal" data-target="#exampleModal">
                                + Tambah Transaksi
                            </button>
                            <br>
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->
                <?php if (session()->get('message')) : ?>
                <div class="alert alert-success alert-dismissible fade show bg-lightgreen" role="alert">
                Data Transaksi Berhasil <strong><?= session()->getFlashdata('message'); ?></strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>

        <?php if (session()->get('err')) : ?>
            <div class="alert alert-danger" role="alert">
                <?= session()->get('err') ?>
                <?php session()->remove('err'); ?>
            </div>
        <?php endif; ?>

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Data Transaksi</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Tanggal Transaksi</th>
                                                <th>Nama Pegawai</th>
                                                <th>Nama Pelanggan</th>
                                                <th>Jenis Pembayaran</th>
                                                <th>Total Harga</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $counter = 1; // Initialize counter variable
                                            foreach ($transaksi as $row) :
                                                $tgl_transaksi = date('d-m-Y', strtotime($row['tgl_transaksi']));
                                                $nama = $row['nama'];
                                                $nama_pelanggan = $row['nama_pelanggan'];
                                                $jenis_pembayaran = $row['jenis_pembayaran'];
                                                $total_harga = $row['total_harga'];
                                            ?>
                                                <tr>
                                                    <td><?= $counter++ ?></td> <!-- Increment and display the counter -->
                                                    <td><?= $tgl_transaksi ?></td>
                                                    <td><?= $nama ?></td>
                                                    <td><?= $nama_pelanggan ?></td>
                                                    <td><?= $jenis_pembayaran ?></td>
                                                    <td><?= $total_harga ?></td>
                                                    <td>
                                                    <button type="button" class="btn btn-sm btn-info mr-1" onclick="window.open('<?php echo base_url('Transaksi/detail/'.$row['idtransaksi']) ?>', '_blank')">
                                                        <i class="fas fa-info-circle" title="Detail Laporan"></i>
                                                    </button>
                                                    </td>
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
                <!-- /.content -->
                <!-- Modal Tambah Transaksi -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header modal-colored-header bg-info">
                                <h4 class="modal-title fs-5" id="exampleModalLabel">Tambah Data Transaksi</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <form action="<?=base_url();?>Transaksi/tambah/1" method="POST" enctype="multipart/form-data">
                                <div class="col-md-6">
                                    <label for="tgl_transaksi">Tanggal Transaksi</label>
                                    <input type="date" min="<?= date('d-m-Y'); ?>" class="form-control" id="tgl_transaksi" name="tgl_transaksi" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="nama_pelanggan">Nama Pelanggan</label>
                                    <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" required autocomplete="off">
                                </div>
                                <div class="col-md-6">
                                    <label for="jumlah_produk">Jumlah Produk</label>
                                    <input type="text" class="form-control" id="jumlah_produk" name="jumlah_produk" required autocomplete="off" readonly>
                                </div>
                                <hr>
                                <div id="product-forms">
                                    <div class="product-form">
                                        <div class="col-md-6">
                                            <label for="kode_barang">Kode Barang</label>
                                            <input type="text" class="form-control kode_barang" name="kode_barang[]" required autocomplete="off" onkeyup="fetchPrice(this)">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="nama_barang">Nama Barang</label>
                                            <input type="text" class="form-control nama_barang" name="nama_barang[]" required autocomplete="off" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="kode_warna">Kode Warna</label>
                                            <input type="text" class="form-control kode_warna" name="kode_warna[]" required autocomplete="off" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="kuantitas">Kuantitas</label>
                                            <input type="text" class="form-control kuantitas" name="kuantitas[]" required autocomplete="off" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="stok">Stok</label>
                                            <input type="text" class="form-control stok" name="stok[]" required autocomplete="off" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="nama_merk">Merk</label>
                                            <input type="text" class="form-control nama_merk" name="nama_merk[]" required autocomplete="off" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="nama_jenis">Jenis</label>
                                            <input type="text" class="form-control nama_jenis" name="nama_jenis[]" required autocomplete="off" readonly>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="harga">Harga</label>
                                            <input type="text" class="form-control harga" name="harga[]" required autocomplete="off" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-4 col-12" id="ini">
                                    <div class="mb-3">
                                        <button class="btn btn-info" type="button" id="btn-tambah-form">Tambah</button>
                                        <button class="btn btn-danger" type="button" id="btn-reset-form">Reset</button>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="total">Total Harga</label>
                                    <input type="text" onkeyup="formatTotal(this)" name="total_harga" class="form-control" id="total" required autocomplete="off" readonly>
                                </div>
                                <script>
                                function formatTotal(input) {
                                    // Menghapus karakter non-digit
                                    let formattedValue = input.value.replace(/\D/g, '');
                                    
                                    // Menambahkan titik setiap 3 digit dari belakang
                                    formattedValue = formattedValue.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
                                    
                                    // Menetapkan nilai input yang sudah diformat
                                    input.value = formattedValue;
                                }
                                </script>
                                <div class="col-md-6">
                                    <label for="jenis_pembayaran">Jenis Pembayaran</label>
                                    <select class="form-control" name="jenis_pembayaran" id="jenis_pembayaran" required autocomplete="off">
                                        <option value="">Pilih Jenis Pembayaran</option>
                                        <option value="Cash">Cash</option>
                                        <option value="Transfer">Transfer</option>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-info mb-3">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- /.content-wrapper -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->

        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
            
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
<script>
    function fetchPrice(element) {
        var kode_barang = $(element).val();
        if (kode_barang.length > 0) {
            $.ajax({
                url: '<?= base_url(); ?>Transaksi/getPrice',
                type: 'POST',
                data: { kode_barang: kode_barang },
                dataType: 'json',
                success: function (response) {
                    if (response.error) {
                        alert(response.error);
                    } else {
                        var parent = $(element).closest('.product-form');
                        parent.find('.harga').val(response.harga);
                        parent.find('.nama_barang').val(response.nama_barang);
                        parent.find('.kode_warna').val(response.kode_warna);
                        parent.find('.kuantitas').val(response.kuantitas);
                        parent.find('.stok').val(response.stok);
                        parent.find('.nama_merk').val(response.nama_merk);
                        parent.find('.nama_jenis').val(response.nama_jenis);
                        calculateTotals();
                    }
                },
                error: function (xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        }
    }

    function calculateTotals() {
        var totalHarga = 0;
        var totalProduk = 0;
        $('.product-form').each(function() {
            var harga = parseFloat($(this).find('.harga').val()) || 0;
            totalHarga += harga;
            totalProduk += 1;
        });
        $('#total').val(totalHarga.toFixed(0));
        $('#jumlah_produk').val(totalProduk);
    }

    $(document).ready(function() {
        $("#btn-tambah-form").click(function() {
            $("#product-forms").append(
                `<hr>
                <div class="product-form">
                    <div class="col-md-6">
                        <label for="kode_barang">Kode Barang</label>
                        <input type="text" class="form-control kode_barang" name="kode_barang[]" required autocomplete="off" onkeyup="fetchPrice(this)">
                    </div>
                    <div class="col-md-6">
                        <label for="nama_barang">Nama Barang</label>
                        <input type="text" class="form-control nama_barang" name="nama_barang[]" required autocomplete="off" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="kode_warna">Kode Warna</label>
                        <input type="text" class="form-control kode_warna" name="kode_warna[]" required autocomplete="off" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="kuantitas">Kuantitas</label>
                        <input type="text" class="form-control kuantitas" name="kuantitas[]" required autocomplete="off" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="stok">Stok</label>
                        <input type="text" class="form-control stok" name="stok[]" required autocomplete="off" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="nama_merk">Merk</label>
                        <input type="text" class="form-control nama_merk" name="nama_merk[]" required autocomplete="off" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="nama_jenis">Jenis</label>
                        <input type="text" class="form-control nama_jenis" name="nama_jenis[]" required autocomplete="off" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="harga">Harga</label>
                        <input type="text" class="form-control harga" name="harga[]" required autocomplete="off" readonly>
                    </div>
                </div>`
            );
        });

        $("#btn-reset-form").click(function() {
            $("#product-forms").html("");
            $('#total').val(0);
            $('#jumlah_produk').val(0);
        });
    });
</script>

    </body>

</html>