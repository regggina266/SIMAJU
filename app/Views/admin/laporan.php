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
                            <h1 class="m-0">Filter Laporan</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Filter Laporan</li>
                            </ol>
                        </div>
                    </div>
                    <form method="GET" action="<?= base_url('Laporan/filter_laporan') ?>">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="start_date">Tanggal Mulai</label>
                                <input type="date" class="form-control" name="start_date" id="start_date">
                            </div>
                            <div class="col-md-3">
                                <label for="end_date">Tanggal Selesai</label>
                                <input type="date" class="form-control" name="end_date" id="end_date">
                            </div>
                            <div class="col-md-3">
                                <label for="month">Bulan</label>
                                <input type="month" class="form-control" name="month" id="month">
                            </div>
                            <div class="col-md-3">
                                <label for="year">Tahun</label>
                                <input type="number" class="form-control" name="year" id="year" min="2000" max="<?= date('Y') ?>">
                            </div>
                            <div class="col-md-3 mt-4">
                                <button type="submit" class="btn btn-primary">Filter</button>
                            </div>
                        </div>
                    </form>
                </div>
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
