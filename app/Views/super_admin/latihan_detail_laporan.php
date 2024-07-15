<section class="content">
    <div class="box">
        <div class="box-header">
            <div class="card">
                <form action="/laporan_bm" method="get">
                    <div class="mt-3 ml-3 mb-3 row">
                        <div class="col-sm-2">
                            <label class="col-form-label">Pilih Jenis Laporan:</label>
                            <div class="input-group">
                                <select class="form-control" name="jenis_laporan" id="jenis_laporan">
                                    <option value="harian" <?= ($jenis_laporan == 'harian') ? 'selected' : ''; ?>>Harian</option>
                                    <option value="bulanan" <?= ($jenis_laporan == 'bulanan') ? 'selected' : ''; ?>>Bulanan</option>
                                    <option value="tahunan" <?= ($jenis_laporan == 'tahunan') ? 'selected' : ''; ?>>Tahunan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-form-label">Pilih Tanggal/Bulan/Tahun:</label>
                            <div class="input-group">
                                <form method="get" action="/cetak_bm">
                                    <?php if ($jenis_laporan == 'harian') : ?>
                                        <input type="date" class="form-control" name="tanggal" id="tanggal" value="<?= $tanggal; ?>">
                                    <?php elseif ($jenis_laporan == 'bulanan') : ?>
                                        <input type="month" class="form-control" name="bulan_tahun" id="bulan_tahun" value="<?= $bulan_tahun; ?>">
                                    <?php elseif ($jenis_laporan == 'tahunan') : ?>
                                        <input type="number" class="form-control" name="tahun" id="tahun" value="<?= $tahun; ?>" placeholder="Tahun">
                                    <?php endif; ?>
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-warning btn float">Lihat Laporan</button>
                                        <!-- Tambahkan parameter tanggal ke URL saat mencetak laporan -->
                                        <a href="/cetak_bm?jenis_laporan=<?= $jenis_laporan ?>&tgl=<?= $tanggal ?>&bulan_tahun=<?= $bulan_tahun ?>&tahun=<?= $tahun ?>" class="btn btn-danger btn float">
                                            <i class="fas fa-print"></i> Print Laporan
                                        </a>
                                        <button onclick="exportToExcel()" class="btn btn-success"> <i class="fas fa-file-excel"></i> Excel</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </form>

                <div class="card-body">
                    <?php if (!empty($laporan)) : ?>
                        <table id="myTable" class="table table-striped table-bordered second ">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal Transaksi</th>
                                    <th>Nama Pegawai</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Nama Barang</th>
                                    <th>Kode Barang</th>
                                    <th>Kode Warna</th>
                                    <th>Kuantitas</th>
                                    <th>Stok</th>
                                    <th>Merk</th>
                                    <th>Jenis Barang</th>
                                    <th>Harga Per Satuan</th>
                                    <th>Jumlah Produk</th>
                                    <th>Total Pembelian</th>
                                    <th>Jenis Pembayaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1 ?>
                                <?php foreach ($laporan as $item) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $item['tgl_transaksi'] ?? 'Belum Dikategorikan' ?></td>
                                        <td><?= $item['nama'] ?></td>
                                        <td><?= $item['nama_pelanggan'] ?? 0 ?></td>
                                        <td><?= $item['nama_barang'] ?? 0 ?></td>
                                        <td><?= $item['kode_barang'] ?? 0 ?></td>
                                        <td><?= $item['kode_warna'] ?? 0 ?></td>
                                        <td><?= $item['kuantitas'] ?? 0 ?></td>
                                        <td><?= $item['stok'] ?? 0 ?></td>
                                        <td><?= $item['merk'] ?? 0 ?></td>
                                        <td><?= $item['jenis_barang'] ?? 0 ?></td>
                                        <td><?= $item['harga'] ?? 0 ?></td>
                                        <td><?= $item['jumlah_produk'] ?? 0 ?></td>
                                        <td><?= $item['total_harga'] ?? 0 ?></td>
                                        <td><?= $item['jenis_pembayaran'] ?? 0 ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else : ?>
                        <div class="alert alert-info text-center" role="alert">
                            <h5>Tidak ada data untuk ditampilkan.</h5>
                        <?php endif; ?>
                        </div>
                </div>
            </div>
        </div>
        <script>
            let table = new DataTable('#myTable');
            function exportToExcel() {
        // Menghentikan event default formulir
        event.preventDefault();
        window.location.href = '/Laporan/exportToBM?jenis_laporan=<?= $jenis_laporan ?>&tgl=<?= $tanggal ?>&bulan_tahun=<?= $bulan_tahun ?>&tahun=<?= $tahun ?>';
    }
        </script>
    </div>
</section>