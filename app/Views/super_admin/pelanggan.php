<!DOCTYPE html>
<html lang="en">

<head></head>
<style>
    /* untuk meratakan letak button aksi */
    .btnlist{
        display: flex;
        gap: 0.5em;
        justify-content: center;
    }
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
     /* agar tulisan yg ada pada tabel menjadi rata tengah */
    #example1 th, td{
        text-align: center;
    }
    /* melengkungkan pinggiran modal*/
    .modal-content{
        border-radius: 1em !important;
    }
     /* melengkungkan pinggiran modal*/
    .modal-header{
        border-radius: 1em 1em 0 0;
    }
    /* memindahkan button submit di modal menjadi ke sebelah kanan ujung*/
    .modal_footer {
        flex: 1;
        display: flex;
        gap: 0;
        justify-content: flex-end;
    }
    /* modal akun */
    .akunmdl {
        padding-right: 0;
    }
    /* jarak button */
    .ml {
        margin-left: .5em;
    }
    /* memindahkan button tambah barang di modal menjadi ke sebelah kanan ujung*/
    .rights{
        flex: 1;
        display: flex;
        gap: 1em;
        justify-content: flex-end;
        padding-right: 1em;
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
                            <h1 class="m-0">Pelanggan</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Pelanggan</li>
                            </ol>
                        </div><!-- /.col -->
                        <br>
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
                                    <h3 class="card-title">Data Pelanggan</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>No HP</th>
                                            <th>Alamat</th>
                                            <th>Jenis Kelamin</th>
                                            <th>No KTP </th>
                                            <th>Foto KTP </th>
                                            <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 0;
                                        foreach ($pelanggan as $row) : 
                                            $no++;
                                            $idpelanggan = $row['idpelanggan'];
                                            $username_pelanggan = $row['username_pelanggan'];
                                            $nama_pelanggan = $row['nama_pelanggan'];
                                            $nohp = $row['nohp'];
                                            $alamat = $row['alamat'];
                                            $jenis_kelamin = $row['jenis_kelamin'];
                                            $no_ktp = $row['no_ktp'];
                                            $foto_ktp = $row['foto_ktp'];
                                        ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= $username_pelanggan ?></td>
                                                <td><?= $nama_pelanggan ?></td>
                                                <td><?= $nohp ?></td>
                                                <td><?= $alamat?></td>
                                                <td><?= $jenis_kelamin?></td>
                                                <td><?= $no_ktp?></td>
                                                <td><?= $foto_ktp?></td>
                                                <td class="btnlist">
                                                    <a href="<?php echo base_url('Pelanggan/delete/') . $idpelanggan ?>" data-toggle="modal" data-target="#delete<?= $idpelanggan ?>" class="btn btn-danger"><i class="fas fa-trash" title="Hapus"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <!-- Modal Hapus Data Pelanggan -->
                                        <div class="modal fade" id="delete<?= $idpelanggan ?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header modal-colored-header bg-danger">
                                                            <h4 class="modal-title" id="exampleModalLabel">Hapus Data
                                                                Pelanggan
                                                            </h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="<?php echo base_url()?>Pelanggan/delete"
                                                                method="post" enctype="multipart/form-data">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <input type="hidden" name="idpelanggan"
                                                                            value="<?php echo $idpelanggan?>" />
                                                                        <p>Apakah kamu yakin ingin menghapus data
                                                                            ini?</i></b></p>
                                                                    </div>
                                                                </div>
                                                                <div class="modal_footer akunmdl">
                                                                    <button type="button" class="btn btn-danger ripple "
                                                                        data-dismiss="modal">Tidak</button>
                                                                    <button type="submit"
                                                                        class="btn btn-success ripple save-category ml">Ya</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Modal Edit Pelanggan -->
                                            <div class="modal fade" id="edit<?=$idpelanggan?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header modal-colored-header bg-warning">
                                                            <h4 class="modal-title" id="exampleModalLabel">Edit
                                                                Pelanggan</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="<?=base_url();?>Pelanggan/edit"
                                                                method="POST">
                                                                <input type="hidden" name="idpelanggan" id="idpelanggan" value="<?php echo $idpelanggan?>">
                                                                    <div class="form-group">
                                                                        <label for="nama_pelanggan">Nama</label>
                                                                        <input type="text" class="form-control" id="nama_pelanggan" aria-describedby="nama_pelanggan"
                                                                            name="nama_pelanggan" value="<?=$nama_pelanggan?>" required autocomplete="off">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="nohp">No Hp</label>
                                                                        <input type="text" class="form-control" id="nohp" aria-describedby="nohp"
                                                                            name="nohp" value="<?=$nohp?>" required autocomplete="off">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="alamat">Alamat</label>
                                                                        <input type="text" class="form-control" id="alamat" aria-describedby="alamat"
                                                                            name="alamat" value="<?=$alamat?>" required autocomplete="off">
                                                                    </div>
                                                                    <div class="modal_footer akunmdl">
                                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                                    </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
            <!-- Modal Tambah Pelanggan -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header modal-colored-header bg-primary">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Pelanggan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?=base_url();?>Pelanggan/tambah" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="nama_pelanggan">Nama</label>
                                    <input required type="text" class="form-control" id="nama_pelanggan" aria-describedby="nama_pelanggan"
                                        name="nama_pelanggan" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="nohp">No Hp</label>
                                    <input required type="text" class="form-control" id="nohp" aria-describedby="nohp"
                                        name="nohp" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input required type="text" class="form-control" id="alamat" aria-describedby="alamat"
                                        name="alamat" autocomplete="off">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
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