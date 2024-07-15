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
    #example1 th,
    td {
        text-align: center;
    }

    /* melengkungkan pinggiran modal*/
    .modal-content {
        border-radius: 1em !important;
    }

    /* melengkungkan pinggiran modal*/
    .modal-header {
        border-radius: 1em 1em 0 0;
    }

    /* memindahkan button submit di modal menjadi ke sebelah kanan ujung*/
    .modal-footer {
        flex: 1;
        display: flex;
        gap: 0;
        justify-content: flex-end;
        padding-right: 0;
    }
</style>

<body class="hold-transition sidebar-mini layout-fixed">


<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center bg-custom">
            <img src="<?= base_url();?>assets/dist/img/Loading.svg"
                alt="AdminLTELogo" />
        </div>

        </div>
        
          <script>
        // Menampilkan gambar preloader setelah 5 detik (5000 milidetik)
        setTimeout(() => {
        document.getElementById('preloaderImg').style.display = 'block';
        }, 5000);
        </script>
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
                            <h1 class="m-0">Barang</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Barang</li>
                            </ol>
                        </div><!-- /.col -->
                            <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#modalTambah">
                                + Tambah Data
                            </button>
                       
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
              <?php if (session()->get('message')) : ?>
                <div class="alert alert-success alert-dismissible fade show bg-lightgreen" role="alert">
                Data Barang Berhasil <strong><?= session()->getFlashdata('message'); ?></strong>
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
                                    <h3 class="card-title">Data Barang</h3>
                                </div>
                                        <div class="card-body">
                                            <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama Barang</th>
                                                <th>Kode Barang</th>
                                                <th>Kode Warna</th>
                                                <th>Kuantitas</th>
                                                <th>Jenis</th>
                                                <th>Merk</th>
                                                <th>Stok</th>
                                                <th>Harga</th>
                                                <th>Status</th>
                                                <th>Gambar</th>
                                                <th>Aksi</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $i = 0;
                                            foreach ($all_data_barang as $index => $row) : 
                                                $i++;
                                            ?>
                                                <tr>
                                                    <td><?= $i; ?></td>
                                                    <td><?= $row['nama_barang']; ?></td>
                                                    <td><?= $row['kode_barang']; ?></td>
                                                    <td><?= $row['kode_warna']; ?></td> 
                                                    <td><?= $row['kuantitas']; ?></td> 
                                                    <td><?= $row['nama_jenis']; ?></td>
                                                    <td><?= $row['nama_merk']; ?></td>
                                                    <td><?= $row['stok']; ?></td>
                                                    <td><?= $row['harga']; ?></td> 
                                                    <td><?= $row['status']; ?></td> 
                                                    <td><img width="45px"src="<?= base_url('uploads/' . $row['gambar']); ?>" alt="<?= $row['nama_barang']; ?>" />
                                                    </td>  
                                                    <td class="d-flex justify-content-center">
                                                        <button type="button" data-toggle="modal" data-target="#modalEdit<?php echo $row['idbarang']?>"  class="btn btn-sm btn-warning mr-1">
                                                            <i class="fas fa-edit"></i>
                                                        </button>
                                                        <button type="button" data-toggle="modal" data-target="#modalHapus<?php echo $row['idbarang']?>" class="btn btn-sm btn-danger">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                                <!-- Modal Hapus Data Barang -->
                                                <?php foreach ($all_data_barang as $index => $row) : ?>
                                                <div class="modal fade" id="modalHapus<?= $row['idbarang'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalHapusLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header modal-colored-header bg-danger">
                                                                <h4 class="modal-title" id="exampleModalLabel">Hapus Data
                                                                    Barang
                                                                </h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                            <form action="<?= base_url('barang/delete/'); ?>" method="post">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <input type="hidden" name="idbarang" value="<?= $row['idbarang'] ?>" />
                                                                            <p>Apakah kamu yakin ingin menghapus data
                                                                                ini?</i></b></p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-danger ripple" data-dismiss="modal">Tidak</button>
                                                                        <button type="submit" class="btn btn-success ripple save-category">Ya</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endforeach; ?>

                                                <!-- Modal Edit Barang -->
                                                <?php foreach ($all_data_barang as $index => $row) : ?>
                                                <div class="modal fade" id="modalEdit<?= $row['idbarang'] ?>" tabindex="-1" role="document">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header modal-colored-header bg-warning">
                                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data Barang</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="<?= base_url('barang/edit'); ?>" method="POST" enctype="multipart/form-data">
                                                                    <input type="hidden" name="idbarang" value="<?= $row['idbarang'] ?>">
                                                                    <div class="form-group">
                                                                        <label for="nama_barang">Nama Barang</label>
                                                                        <input type="text" class="form-control" name="nama_barang" value="<?= $row['nama_barang'] ?>" required>
                                                                    </div>
                                                                    <div class="form-group">

                                                                        <label for="kode_barang">Kode Barang</label>
                                                                        <input type="text" class="form-control" name="kode_barang" value="<?= $row['kode_barang'] ?>" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="kode_warna">Kode Warna</label>
                                                                        <input type="text" class="form-control" name="kode_warna" value="<?= $row['kode_warna'] ?>" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="kuantitas">Kuantitas</label>
                                                                        <input type="text" class="form-control" name="kuantitas" value="<?= $row['kuantitas'] ?>">
                                                                        
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="idjenis">Jenis</label>
                                                                        <select class="form-control" name="idjenis">
                                                                            <option value="">Pilih Jenis Barang</option> <!-- Pindahkan ke luar foreach -->
                                                                            <?php foreach ($jenisB as $jenis): ?>
                                                                                <option value="<?= $jenis['idjenis']; ?>" <?= $row['idjenis'] == $jenis['idjenis'] ? 'selected' : ''; ?>>
                                                                                    <?= $jenis['nama_jenis']; ?>
                                                                                </option>
                                                                            <?php endforeach; ?>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                    <label class="idmerk">Merk</label>
                                                                    <select class="form-control" name="idmerk">
                                                                        <option value="">Pilih Merk</option>
                                                                        <?php foreach ($merks as $merk): ?>
                                                                            <option value="<?= $merk['idmerk']; ?>" <?= $row['idmerk'] == $merk['idmerk'] ? 'selected' : ''; ?>>
                                                                                <?= $merk['nama_merk']; ?>
                                                                            </option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="stok">Stok</label>
                                                                        <input type="number" class="form-control" name="stok" value="<?= $row['stok'] ?>" required>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="harga">Harga</label>
                                                                        <input type="text" class="form-control" name="harga" value="<?= $row['harga'] ?>" required onkeyup="formatHarga(this)">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="status">Status</label>
                                                                        <select name="status" class="form-control" id="status" required>
                                                                            <?php $status = $row['status'] ?>
                                                                            <option value="Tersedia" <?= $status == 'Tersedia' ? "selected" : null; ?>>Tersedia</option>
                                                                            <option value="Tidak Tersedia" <?= $status == 'Tidak Tersedia' ? "selected" : null; ?>>Tidak Tersedia</option>
                                                                        </select>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="gambar">Gambar (JPG/JPEG/PNG)</label>
                                                                        <input type="file" class="form-control" size="20" name="gambar" id="nama" value="<?= $row['gambar'] ?>" required>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
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
 <!-- Modal Tambah Barang -->
    <div class="modal" id="modalTambah">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-primary">
                <h5 class="modal-title">Tambah Data Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="<?= base_url('barang/tambah'); ?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="nama_barang">Nama Barang</label>
                    <input type="text" class="form-control" id="nama_barang" aria-describedby="nama_barang" name="nama_barang" required autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="kode_barang">Kode Barang</label>
                    <input type="text" class="form-control" id="kode_barang" aria-describedby="kode_barang" name="kode_barang" required autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="kode_warna">Kode Warna</label>
                    <input type="text" class="form-control" id="kode_warna" aria-describedby="kode_warna" name="kode_warna" required autocomplete="off">
                </div>
                <div class="mb-3">
                    <label class="kuantitas">Kuantitas</label>
                    <input type="text" class="form-control" id="kuantitas" aria-describedby="kuantitas" name="kuantitas" required autocomplete="off">
                </div>
                <div class="mb-3">
                    <label class="idjenis">Jenis Barang</label>
                    <select class="form-control" name="idjenis" required>
                        <option value="">Pilih Jenis Barang</option>
                        <?php foreach ($jenisB as $jenis): ?>
                            <option value="<?= $jenis['idjenis']; ?>">
                                <?= $jenis['nama_jenis']; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="idmerk">Merk</label>
                    <select class="form-control" name="idmerk" required>
                        <option value="">Pilih Merk</option>
                    <?php foreach ($merks as $merk): ?>
                        <option value="<?= $merk['idmerk']; ?>">
                            <?= $merk['nama_merk']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                </div>
                <div class="form-group">
                    <label for="stok">Stok</label>
                    <input type="text" class="form-control" id="stok" aria-describedby="stok" name="stok" required autocomplete="off">
                </div>
                <div class="form-group">
                    <label for="harga">Harga </label>
                    <input type="text" class="form-control" id="harga" onkeyup="formatHarga(this)" name="harga" required autocomplete="off">
                </div>
                <script>
                    function formatHarga(input) {
                        // Menghapus karakter non-digit
                        let formattedValue = input.value.replace(/\D/g, '');
                        
                        // Menambahkan titik setiap 3 digit dari belakang
                        formattedValue = formattedValue.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
                        
                        // Menetapkan nilai input yang sudah diformat
                        input.value = formattedValue;
                    }
                    </script>
                <div class="form-group">
                    <label for="status">Status </label>
                    <select name="status" class="form-control" id="status" required>
                            <option value="">-Pilih-</option>
                            <option value="Tersedia" <?= set_value('status') == 'Tersedia' ? "selected" : null; ?>>Tersedia</option>
                            <option value="Tidak Tersedia" <?= set_value('status') == 'Tidak Tersedia' ? "selected" : null; ?>>Tidak Tersedia</option>
                        </select>
                </div>
                <div class="form-group">
                    <label for="gambar">Gambar (JPG/JPEG/PNG)</label>
                    <input type="file" class="form-control" size="20" id="gambar" name="gambar" required autocomplete="off">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
                
<script>
const img = document.querySelector('.preloader img')
setTimeout(()=>{
  img.style = 'display: block'
},500)
setTimeout(() => {
  img.style = 'display: none'
}, 3200);
</script>

