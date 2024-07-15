-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Jul 2024 pada 11.06
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cvarya`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `idakun` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `level` varchar(1) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`idakun`, `nama`, `level`, `username`, `password`) VALUES
(1, 'Puji Kurniawati', '3', 'puji', '$2y$10$4WZTvIe/XuKuBfOo.igCLe3ZptkI1qL/5J7YAhCLZGnQ1oPXqlThS'),
(2, 'Ayu Lina Marisa', '4', 'ayu', '$2y$10$4sCz92uYWsDmpzaC8JfhAOy.KnuKO1QuEhyT6uRnsnPzqjMirodoS'),
(3, 'dina h', '2', 'dina', '$2y$10$wgbfji/iZMhvymDRQ0GqWOleDt6sy24jDgzU3NSYWfSZ3yGwEcDwi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `idbarang` int(11) NOT NULL,
  `nama_barang` varchar(120) NOT NULL,
  `kode_barang` varchar(120) NOT NULL,
  `kode_warna` varchar(100) NOT NULL,
  `kuantitas` varchar(100) NOT NULL,
  `harga` varchar(20) NOT NULL,
  `stok` int(11) NOT NULL,
  `status` enum('Tersedia','Tidak Tersedia','','') NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `idmerk` int(11) NOT NULL,
  `idjenis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`idbarang`, `nama_barang`, `kode_barang`, `kode_warna`, `kuantitas`, `harga`, `stok`, `status`, `gambar`, `idmerk`, `idjenis`) VALUES
(5, 'Thinner Super', '10320300250', '00', '250 Liter', '200000', 6, 'Tersedia', '1721024418_606a86e6bfbe6f2c3ab7.jpg', 8, 3),
(6, 'Kuas', '104205000', '00', '1', '30000', 5, 'Tersedia', '1721024013_e37d828b41e4079ac170.jpg', 4, 5),
(7, 'Dempul', '101202021', '02', '1 Liter', '90000', 10, 'Tersedia', '1721024606_ffb4070f06708072729c.png', 9, 6),
(8, 'Thinner A Special', '10120400250', '00', '250 Liter', '200000', 10, 'Tersedia', '1721024472_09bf408238a6e608a985.jpg', 7, 4),
(23, 'Cat Super Panel Nippon', '12345', '54', '1 liter', '3', 553, 'Tersedia', '1721024663_7db9d3a76cece4954839.jpg', 6, 1),
(29, 'amplas', '99001010', '00', '1', '10000', 10, 'Tersedia', '1721024572_94d86642829c7150cdc4.jpg', 4, 7),
(30, 'cat nippon', '1234567', '099', '1 liter', '90.000', 11, 'Tersedia', '1721024647_6696cc97ad6b76fdd061.jpg', 6, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_barang`
--

CREATE TABLE `jenis_barang` (
  `idjenis` int(11) NOT NULL,
  `nama_jenis` varchar(100) NOT NULL,
  `kode_jenis` varchar(11) NOT NULL,
  `idmerk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jenis_barang`
--

INSERT INTO `jenis_barang` (`idjenis`, `nama_jenis`, `kode_jenis`, `idmerk`) VALUES
(1, 'Cat PU', '201', 1),
(2, 'Cat NC', '202', 1),
(3, 'Thinner NC', '203', 1),
(4, 'Thinner PU', '204', 1),
(5, 'Kuas sedang', '205', 4),
(6, 'Dempul', '206', 9),
(7, 'Amplas', '207', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `idkeranjang` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `idbarang` int(11) NOT NULL,
  `idpelanggan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `keranjang`
--

INSERT INTO `keranjang` (`idkeranjang`, `jumlah`, `idbarang`, `idpelanggan`) VALUES
(4, 0, 5, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `merk`
--

CREATE TABLE `merk` (
  `idmerk` int(11) NOT NULL,
  `nama_merk` varchar(50) NOT NULL,
  `kode_merk` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `merk`
--

INSERT INTO `merk` (`idmerk`, `nama_merk`, `kode_merk`) VALUES
(1, 'laba-laba', '101'),
(2, 'Nikken', '102'),
(3, 'steelglos', '103'),
(4, 'Lain-lain', '104'),
(5, 'Top Color', '105'),
(6, 'Nippon Paint', '106'),
(7, 'A Special', '107'),
(8, 'Super', '108'),
(9, 'Alfagloss', '109');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `idpelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `username_pelanggan` varchar(120) NOT NULL,
  `password_pelanggan` varchar(120) NOT NULL,
  `nohp` varchar(20) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan','','') NOT NULL,
  `no_ktp` varchar(50) NOT NULL,
  `foto_ktp` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`idpelanggan`, `nama_pelanggan`, `username_pelanggan`, `password_pelanggan`, `nohp`, `alamat`, `jenis_kelamin`, `no_ktp`, `foto_ktp`) VALUES
(2, 'iyan', '', '', '081326684875', 'jl atu atu', 'Laki-laki', '', ''),
(4, 'nana', '', '', '1234567890', 'pelaiharii', 'Laki-laki', '', ''),
(8, 'aluh', '', '', '08779890877', 'ds bajuin', 'Laki-laki', '', ''),
(57, 'lia', 'lia', 'lia', '098765432', 'matah', 'Laki-laki', '1234567678', '1720792051_db1e8c42c08218be1571.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `idpembayaran` int(11) NOT NULL,
  `nama_bank` varchar(100) NOT NULL,
  `no_bank` varchar(50) NOT NULL,
  `atas_nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`idpembayaran`, `nama_bank`, `no_bank`, `atas_nama`) VALUES
(1, 'BRI', '00998877123', 'Ayu Lina Marisa'),
(2, 'BNI', '223344556677', 'Puji Kurniawati');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `idtransaksi` int(11) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `jenis_pembayaran` enum('Cash','Transfer','','') DEFAULT NULL,
  `total_harga` varchar(100) DEFAULT NULL,
  `status_transaksi` enum('Tunggu Konfirmasi','Proses','Selesai','Siap Diantar','Ambil Pesanan') NOT NULL,
  `idakun` int(11) DEFAULT NULL,
  `idpelanggan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`idtransaksi`, `tgl_transaksi`, `jenis_pembayaran`, `total_harga`, `status_transaksi`, `idakun`, `idpelanggan`) VALUES
(75, '2024-06-08', 'Cash', '', 'Tunggu Konfirmasi', 1, 8),
(102, '2024-07-13', NULL, NULL, 'Tunggu Konfirmasi', NULL, 1),
(103, '2024-07-13', NULL, NULL, 'Tunggu Konfirmasi', NULL, 1),
(104, '2024-07-13', NULL, NULL, 'Tunggu Konfirmasi', NULL, 1),
(105, '2024-07-13', NULL, NULL, 'Tunggu Konfirmasi', NULL, 1),
(106, '2024-07-13', NULL, NULL, 'Tunggu Konfirmasi', NULL, 1),
(107, '2024-07-13', NULL, NULL, 'Tunggu Konfirmasi', NULL, 1),
(108, '2024-07-13', NULL, NULL, 'Tunggu Konfirmasi', NULL, 1),
(109, '2024-07-13', NULL, NULL, 'Tunggu Konfirmasi', NULL, 1),
(110, '2024-07-13', NULL, NULL, 'Tunggu Konfirmasi', NULL, 1),
(111, '2024-07-13', NULL, NULL, 'Tunggu Konfirmasi', NULL, 1),
(112, '2024-07-13', NULL, NULL, 'Tunggu Konfirmasi', NULL, 1),
(113, '2024-07-13', NULL, NULL, 'Tunggu Konfirmasi', NULL, 1),
(114, '2024-07-13', NULL, NULL, 'Tunggu Konfirmasi', NULL, 1),
(115, '2024-07-13', NULL, NULL, 'Tunggu Konfirmasi', NULL, 1),
(116, '2024-07-13', NULL, NULL, 'Tunggu Konfirmasi', NULL, 1),
(117, '2024-07-13', NULL, NULL, 'Tunggu Konfirmasi', NULL, 1),
(118, '2024-07-13', NULL, NULL, 'Tunggu Konfirmasi', NULL, 1),
(119, '2024-07-13', NULL, NULL, 'Tunggu Konfirmasi', NULL, 1),
(120, '2024-07-13', NULL, NULL, 'Tunggu Konfirmasi', NULL, 1),
(121, '2024-07-15', NULL, NULL, 'Tunggu Konfirmasi', NULL, 1),
(122, '2024-07-15', NULL, NULL, 'Tunggu Konfirmasi', NULL, 1),
(123, '2024-07-15', NULL, NULL, 'Tunggu Konfirmasi', NULL, 1),
(124, '2024-07-15', NULL, NULL, 'Tunggu Konfirmasi', NULL, 1),
(125, '2024-07-15', NULL, NULL, 'Tunggu Konfirmasi', NULL, 1),
(126, '2024-07-15', NULL, NULL, 'Tunggu Konfirmasi', NULL, 1),
(127, '2024-07-15', NULL, NULL, 'Tunggu Konfirmasi', NULL, 1),
(128, '2024-07-15', NULL, NULL, 'Tunggu Konfirmasi', NULL, 1),
(129, '2024-07-15', NULL, NULL, 'Tunggu Konfirmasi', NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_barang`
--

CREATE TABLE `transaksi_barang` (
  `id_transaksi_barang` int(11) NOT NULL,
  `id_transaksi` varchar(50) NOT NULL,
  `kode_barang` varchar(50) NOT NULL,
  `jumlah_produk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi_barang`
--

INSERT INTO `transaksi_barang` (`id_transaksi_barang`, `id_transaksi`, `kode_barang`, `jumlah_produk`) VALUES
(95, '92', '12345', '1'),
(99, '95', '10320300250', '2'),
(100, '95', '10320300250', '2'),
(101, '96', '102201011', '1'),
(102, '97', '102201011', '2'),
(103, '97', '102201011', '2'),
(104, '98', '10112045999', '1'),
(105, '99', '10112045999', '1'),
(106, '', '4', '1'),
(107, '', '4', '2'),
(108, '', '4', '1'),
(109, '', '3', '1'),
(110, '', '4', '1'),
(111, '', '3', '1'),
(112, '114', '4', '1'),
(113, '114', '3', '1'),
(114, '128', '5', '1'),
(115, '129', '5', '1');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`idakun`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`idbarang`),
  ADD KEY `idmerk` (`idmerk`),
  ADD KEY `idjenis` (`idjenis`);

--
-- Indeks untuk tabel `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`idjenis`),
  ADD KEY `idmerk` (`idmerk`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`idkeranjang`);

--
-- Indeks untuk tabel `merk`
--
ALTER TABLE `merk`
  ADD PRIMARY KEY (`idmerk`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`idpelanggan`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`idpembayaran`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`idtransaksi`),
  ADD KEY `idakun` (`idakun`),
  ADD KEY `idpelanggan` (`idpelanggan`);

--
-- Indeks untuk tabel `transaksi_barang`
--
ALTER TABLE `transaksi_barang`
  ADD PRIMARY KEY (`id_transaksi_barang`),
  ADD KEY `id_transaksi` (`id_transaksi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `idakun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `jenis_barang`
--
ALTER TABLE `jenis_barang`
  MODIFY `idjenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `idkeranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `merk`
--
ALTER TABLE `merk`
  MODIFY `idmerk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `idpelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `idpembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `idtransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT untuk tabel `transaksi_barang`
--
ALTER TABLE `transaksi_barang`
  MODIFY `id_transaksi_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD CONSTRAINT `jenis_barang_ibfk_1` FOREIGN KEY (`idmerk`) REFERENCES `merk` (`idmerk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`idakun`) REFERENCES `akun` (`idakun`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
