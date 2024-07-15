<!DOCTYPE html>
<html lang="en">

<head></head>
<style>
    /* untuk mengatur tampilan aksi agar sejajar ke kanan samping */
    .btnlist {
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
                        <h2 class="m-0">List Pesanan Pelanggan</h2>
                    </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Jenis Pembayaran </th>
                                    <th>Total Harga</th>
                                    <th>Status Transaksi </th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $counter = 1; // Initialize counter variable
                                foreach ($transaksi as $row) :
                                    $tgl_transaksi = date('d-m-Y', strtotime($row['tgl_transaksi']));
                                    $jenis_pembayaran = $row['jenis_pembayaran'];
                                    $total_harga = $row['total_harga'];
                                    $status_transaksi = $row['status_transaksi'];
                                ?>
                                    <tr>
                                        <td><?= $counter++ ?></td> <!-- Increment and display the counter -->
                                        <td><?= $tgl_transaksi ?></td>
                                        <td><?= $jenis_pembayaran ?></td>
                                        <td><?= $total_harga ?></td>
                                        <td><?= $status_transaksi ?></td>
                                        <td>
                                            <a href="<?php echo base_url('Transaksi/setujuLevel1/') ?>" class="btn btn-sm btn-success mr-1" data-toggle="modal" data-target="#Disetujui"><i class="nav-icon fas fa-check" title="Setuju"></i>
                                            </a>
                                            <a href="" data-toggle="modal" data-target="#Ditolak" class="btn btn-sm btn-danger mr-1"><i class="nav-icon fas fa-times" title="Tolak"></i>
                                            </a>
                                        <button type="button" class="btn btn-sm btn-info mr-1" onclick="window.open('<?php echo base_url('Transaksi/detail/'.$row['idtransaksi']) ?>', '_blank')">
                                            <i class="fas fa-info-circle" title="Detail Laporan"></i>
                                        </button>
                                        </td>
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
