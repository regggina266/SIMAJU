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
<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>

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
                            <h1 class="m-0">Akun</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Akun</li>
                            </ol>
                        </div><!-- /.col -->
                        <button type="button" class="btn btn-primary mt-3" data-toggle="modal"
                            data-target="#exampleModal">
                            + Tambah Akun
                        </button>
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
                                    <h3 class="card-title">Data Akun Pegawai</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Level</th>
                                            <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 0;
                                        foreach ($akun as $row) : 
                                            $no++;
                                            $idakun = $row['idakun'];
                                            $nama = $row['nama'];
                                            $username = $row['username'];
                                            $level = $row['level'];
                                            $password = $row['password'];
                                        ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= $nama ?></td>
                                                <td><?= $username ?></td>
                                                <td><?= $level?></td>
                                                <td class="btnlist">
                                                    <a href="<?php echo base_url('Akun/edit/') . $idakun ?>" data-toggle="modal" data-target="#edit<?= $idakun ?>"class="btn btn-warning"><i class="fas fa-edit" title="Edit"></i>
                                                    </a>
                                                    <a href="<?php echo base_url('Akun/delete/') . $idakun ?>" data-toggle="modal" data-target="#delete<?= $idakun ?>"class="btn btn-danger"><i class="fas fa-trash" title="Hapus"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <!-- Modal Hapus Data Akun -->
                                        <div class="modal fade" id="delete<?= $idakun ?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header modal-colored-header bg-danger">
                                                            <h4 class="modal-title" id="exampleModalLabel">Hapus Data
                                                                Akun
                                                            </h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="<?php echo base_url()?>Akun/delete"
                                                                method="post" enctype="multipart/form-data">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <input type="hidden" name="idakun"
                                                                            value="<?php echo $idakun?>" />
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

                                            <!-- Modal Edit Akun -->
                                            <div class="modal fade" id="edit<?=$idakun?>" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header modal-colored-header bg-warning">
                                                            <h4 class="modal-title" id="exampleModalLabel">Edit
                                                                Akun</h4>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="<?=base_url();?>Akun/edit"
                                                                method="POST">
                                                                <input type="hidden" name="idakun" id="idakun"
                                                                    value="<?php echo $idakun?>" hidden>
                                                                    <div class="form-group">
                                                                        <label for="nama">Nama</label>
                                                                        <input type="text" class="form-control" id="nama" aria-describedby="nama"
                                                                            name="nama" value="<?=$nama?>" required autocomplete="off">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="username">Username</label>
                                                                        <input type="text" class="form-control" id="username" aria-describedby="username"
                                                                            name="username" value="<?=$username?>" required autocomplete="off">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="col-form-label">Level</label>
                                                                        <input type="text" class="form-control" id="level" aria-describedby="level"
                                                                            name="level" value="<?=$level?>" required autocomplete="off">
                                                                        </div>
                                                                    <div class="form-group">
                                                                        <label class="col-form-label">Password</label>
                                                                        <input type="text" class="form-control" id="password" aria-describedby="password"
                                                                            name="password" value="<?=$password?>" required autocomplete="off">
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
            <!-- Modal Tambah Akun -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header modal-colored-header bg-primary">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Akun</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="<?=base_url();?>Akun/tambah" method="POST" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="nama">Nama</label>
                                    <input required type="text" class="form-control" id="nama" aria-describedby="nama"
                                        name="nama" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input required type="text" class="form-control" id="username" aria-describedby="username"
                                        name="username" autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Level</label>
                                    <input required type="text" class="form-control" id="level" aria-describedby="level"
                                        name="level" autocomplete="off">
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