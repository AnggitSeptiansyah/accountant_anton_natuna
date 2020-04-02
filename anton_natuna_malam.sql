-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2020 at 01:29 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anton_natuna`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jabatan_id` int(11) NOT NULL,
  `kantor_id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `email`, `password`, `jabatan_id`, `kantor_id`, `img`, `date_created`) VALUES
(6, 'Anggit', 'anggitseptiansyah@gmail.com', '$2y$10$F2aXSRfNpzlmhuzNocvSYuvB1wGASZENa/E8a6u6.8hnBfEkVaH.i', 10, 1, 'default.png', 1583812274),
(7, 'Dara', 'dara@gmail.com', '$2y$10$agwUwHwfM1PrquGj0UPMceUxHudfkatoolJ5baAznjyGKL7GHZBqW', 7, 1, 'default.png', 1583975789),
(8, 'Rama', 'jabri.rama@gmail.com', '$2y$10$Z4v0RSN2DQMhTEnGRYH/tuM7XVqC62S8eqM288zflL8AafNmFflCa', 10, 1, 'default.png', 1585042426),
(10, 'Lilis', 'lilismardiana.rich09@gmail.com', '$2y$10$Q246jR6CG9sSaO13xzWDxeRg0iabr2QWYNz15sVtsGmv6zsl0TtQ6', 7, 1, 'default.png', 1585275261),
(11, 'Mita', 'mita@cv-antonnatuna.co.id', '$2y$10$Y9sSG4EkZpcO/POtrKCuf.5a/Ig./D7Bas1XuMcdH671kJj.Uwnsy', 7, 2, 'default.png', 1585461731),
(12, 'Tika', 'tika@cv-antonnatuna.co.id', '$2y$10$R9eTFMPT4AsBB4W36DT9Q.5.twkJ6.VG3OTsx.1oTmSiYFMFVUb0y', 7, 4, 'default.png', 1585482030),
(13, 'Dahlia Sari', 'lia@cv-antonnatuna.co.id', '$2y$10$cT2NZ2IfarOIcW5Z2YDlXep.s9NwSVU4s5iVREdE1cIuyuP8p5TBm', 6, 1, 'default.png', 1585630379);

-- --------------------------------------------------------

--
-- Table structure for table `cabang_kantor`
--

CREATE TABLE `cabang_kantor` (
  `id` int(11) NOT NULL,
  `kode_cabang` varchar(255) NOT NULL,
  `nama_cabang` varchar(255) NOT NULL,
  `kode_pelanggan` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `no_wa` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cabang_kantor`
--

INSERT INTO `cabang_kantor` (`id`, `kode_cabang`, `nama_cabang`, `kode_pelanggan`, `alamat`, `no_hp`, `no_wa`, `email`) VALUES
(1, 'CS', 'Surabaya', 'PS', 'Jl. Surabaya no.43-45', '', '', ''),
(2, 'TRT', 'Teratai', 'PT', 'Jl. Teratai no', '', '', ''),
(3, 'KR', 'Kepri', 'PKR', 'Jl. Daeng no. 8', '', '', ''),
(4, 'ARG', 'Arengka', 'PA', 'Jl. Soekarno Hatta', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `developer`
--

CREATE TABLE `developer` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` int(11) NOT NULL,
  `telp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `history_pembayaran`
--

CREATE TABLE `history_pembayaran` (
  `id` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `history_pembayaran` int(11) NOT NULL,
  `id_jenis_pembayaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history_pembayaran`
--

INSERT INTO `history_pembayaran` (`id`, `id_transaksi`, `history_pembayaran`, `id_jenis_pembayaran`) VALUES
(1, 1, 25000, 0),
(2, 2, 100000, 0),
(3, 3, 50000, 0),
(4, 4, 200000, 0),
(5, 5, 100000, 0),
(6, 6, 1000000, 0),
(7, 7, 100000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan_admin`
--

CREATE TABLE `jabatan_admin` (
  `id` int(11) NOT NULL,
  `nama_jabatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan_admin`
--

INSERT INTO `jabatan_admin` (`id`, `nama_jabatan`) VALUES
(6, 'Financial Accounting'),
(7, 'Admin'),
(8, 'Program Development'),
(9, 'Directur'),
(10, 'Developer');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pembayaran`
--

CREATE TABLE `jenis_pembayaran` (
  `id` int(11) NOT NULL,
  `kode_jenis_pembayaran` varchar(255) NOT NULL,
  `nama_jenis_pembayaran` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_pembayaran`
--

INSERT INTO `jenis_pembayaran` (`id`, `kode_jenis_pembayaran`, `nama_jenis_pembayaran`) VALUES
(1, '1001', 'kas'),
(2, '2001', 'bank');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_worksheet`
--

CREATE TABLE `jenis_worksheet` (
  `id` int(11) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `nama_jenis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_worksheet`
--

INSERT INTO `jenis_worksheet` (`id`, `kode`, `nama_jenis`) VALUES
(1, '4001', 'Gaji Karyawan'),
(2, '4002', 'Listrik'),
(3, '4003', 'Langganan Telfon / Jaringan Wifi'),
(4, '4004', 'Operational Produksi'),
(5, '4005', 'Transport'),
(6, '4006', 'Umum / Kantor'),
(7, '4007', 'Entertainment / Relaksasi'),
(8, '4008', 'BPJS'),
(9, '4009', 'Servis Mesin');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_bank_harian`
--

CREATE TABLE `laporan_bank_harian` (
  `id` int(11) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_pelanggan` int(11) NOT NULL,
  `no_reff` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `no_acc` varchar(255) NOT NULL,
  `masuk` int(11) NOT NULL,
  `keluar` int(11) NOT NULL,
  `saldo` int(11) NOT NULL,
  `id_kantor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laporan_bank_harian`
--

INSERT INTO `laporan_bank_harian` (`id`, `tanggal`, `id_pelanggan`, `no_reff`, `keterangan`, `no_acc`, `masuk`, `keluar`, `saldo`, `id_kantor`) VALUES
(1, '2020-03-31 16:18:21', 0, '', 'Terima Setoran', '', 1300000, 0, 1300000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `laporan_kas_harian`
--

CREATE TABLE `laporan_kas_harian` (
  `id` int(11) NOT NULL,
  `id_kantor` int(11) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_pelanggan` int(11) NOT NULL,
  `no_reff` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `no_acc` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `masuk` int(11) NOT NULL,
  `keluar` int(11) NOT NULL,
  `saldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laporan_kas_harian`
--

INSERT INTO `laporan_kas_harian` (`id`, `id_kantor`, `tanggal`, `id_pelanggan`, `no_reff`, `keterangan`, `no_acc`, `jumlah`, `masuk`, `keluar`, `saldo`) VALUES
(1, 1, '2020-03-31 14:27:36', 45, '1', 'Pemesanan spanduk', '3002', 40000, 25000, 0, 25000),
(2, 1, '2020-03-31 14:28:02', 45, '2', 'Pemesanan spanduk 5x2', '3002', 240000, 100000, 0, 125000),
(3, 1, '2020-03-31 14:29:37', 45, '3', 'Pemesanan spanduk 3x1', '3002', 144000, 50000, 0, 175000),
(4, 1, '2020-03-31 14:30:12', 46, '4', 'Pemesanan spanduk 3x2', '3002', 240000, 200000, 0, 375000),
(5, 1, '2020-03-31 14:31:23', 45, '5', 'Pemesanan spanduk 5x2', '3002', 128000, 100000, 0, 475000),
(6, 1, '2020-03-31 14:33:03', 45, '6', 'Pemesanan spanduk 8x3', '3002', 1120000, 1000000, 0, 1475000),
(7, 1, '2020-03-31 14:50:19', 0, '', 'Membeli minyak mobil', '4005', 50000, 0, 50000, 1425000),
(8, 1, '2020-03-31 14:50:42', 0, '', 'Membeli minyak motor', '4005', 15000, 0, 15000, 1410000),
(9, 1, '2020-03-31 14:51:03', 0, '', 'Beli makanan untuk karyawan', '4006', 20000, 0, 20000, 1390000),
(10, 1, '2020-03-31 16:18:20', 0, '', 'SETORAN', '', 1300000, 0, 1300000, 90000),
(11, 2, '2020-03-31 18:25:25', 0, '', 'uang minyak mobil', '4005', 150000, 0, 150000, -150000),
(12, 2, '2020-03-31 18:26:29', 49, '1', 'Pemesanan spanduk 5x2', '3002', 200000, 100000, 0, -50000),
(13, 2, '2020-03-31 18:26:51', 49, '1', 'Pelunasan', '3002', 200000, 100000, 0, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(11) NOT NULL,
  `kode_pelanggan` varchar(255) NOT NULL,
  `nama_pelanggan` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telp` varchar(255) NOT NULL,
  `id_kantor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `kode_pelanggan`, `nama_pelanggan`, `alamat`, `telp`, `id_kantor`) VALUES
(45, 'PS00001', 'ikhsan', 'jl. simpang tiga', '082387321832', 1),
(46, 'PS00002', 'susanto', 'jl. rindang', '082387321834', 1),
(47, 'PS00003', 'Budiman', 'jl. banda aceh', '085312128080', 1),
(48, 'PS00004', 'Rama', 'Jl. Lembah Raya no.24', '082387321833', 1),
(49, 'PT00001', 'Budi', 'Jl. teratai', '0813123011312', 2);

-- --------------------------------------------------------

--
-- Table structure for table `piutang`
--

CREATE TABLE `piutang` (
  `id` int(11) NOT NULL,
  `id_kantor` int(11) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_pelanggan` int(11) NOT NULL,
  `no_reff` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `no_acc` varchar(255) NOT NULL,
  `debet` int(11) NOT NULL,
  `kredit` int(11) NOT NULL,
  `saldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `piutang`
--

INSERT INTO `piutang` (`id`, `id_kantor`, `tanggal`, `id_pelanggan`, `no_reff`, `keterangan`, `no_acc`, `debet`, `kredit`, `saldo`) VALUES
(1, 1, '2020-03-31 14:27:36', 45, '1', 'Pemesanan spanduk', '3002', 15000, 0, 15000),
(2, 1, '2020-03-31 14:28:03', 45, '2', 'Pemesanan spanduk 5x2', '3002', 140000, 0, 155000),
(3, 1, '2020-03-31 14:29:37', 45, '3', 'Pemesanan spanduk 3x1', '3002', 94000, 0, 249000),
(4, 1, '2020-03-31 14:30:12', 46, '4', 'Pemesanan spanduk 3x2', '3002', 40000, 0, 289000),
(5, 1, '2020-03-31 14:31:23', 45, '5', 'Pemesanan spanduk 5x2', '3002', 28000, 0, 317000),
(6, 1, '2020-03-31 14:33:03', 45, '6', 'Pemesanan spanduk 8x3', '3002', 120000, 0, 437000),
(7, 2, '2020-03-31 18:26:29', 49, '1', 'Pemesanan spanduk 5x2', '3002', 100000, 0, 100000),
(8, 2, '2020-03-31 18:26:51', 49, '1', 'Pelunasan', '3002', 0, 100000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `setor_ke_bank`
--

CREATE TABLE `setor_ke_bank` (
  `id` int(11) NOT NULL,
  `id_kantor` int(11) NOT NULL,
  `total_setor` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setor_ke_bank`
--

INSERT INTO `setor_ke_bank` (`id`, `id_kantor`, `total_setor`, `keterangan`, `tanggal`, `created_by`) VALUES
(1, 1, 1300000, 'Setor Ke Bank', '2020-03-31 16:18:20', 'Anggit');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `kode_supplier` int(11) NOT NULL,
  `nama_supplier` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `no_wa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `no_faktur` varchar(255) NOT NULL,
  `costumer_id` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `diskon` int(11) NOT NULL,
  `uang_masuk` int(11) NOT NULL,
  `total_yang_dibayar` int(11) NOT NULL,
  `tanggal` datetime DEFAULT CURRENT_TIMESTAMP,
  `no_acc` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `id_kantor` int(11) NOT NULL,
  `id_jenis_pembayaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `no_faktur`, `costumer_id`, `total`, `diskon`, `uang_masuk`, `total_yang_dibayar`, `tanggal`, `no_acc`, `created_by`, `id_kantor`, `id_jenis_pembayaran`) VALUES
(1, '1', 45, 40000, 0, 25000, 40000, '2020-03-31 14:27:36', '3002', 'Dara', 1, 0),
(2, '2', 45, 240000, 0, 100000, 240000, '2020-03-31 14:28:02', '3002', 'Dara', 1, 0),
(3, '3', 45, 144000, 0, 50000, 144000, '2020-03-31 14:29:37', '3002', 'Dara', 1, 0),
(4, '4', 46, 240000, 0, 200000, 240000, '2020-03-31 14:30:12', '3002', 'Dara', 1, 0),
(5, '5', 45, 128000, 0, 100000, 128000, '2020-03-31 14:31:23', '3002', 'Dara', 1, 0),
(6, '6', 45, 1120000, 0, 1000000, 1120000, '2020-03-31 14:33:03', '3002', 'Dara', 1, 0),
(7, '1', 49, 200000, 0, 200000, 200000, '2020-03-31 18:26:29', '3002', 'Mita', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_produk`
--

CREATE TABLE `transaksi_produk` (
  `id` int(11) NOT NULL,
  `transaksi_id` int(11) NOT NULL,
  `barang` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `satuan` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_produk`
--

INSERT INTO `transaksi_produk` (`id`, `transaksi_id`, `barang`, `qty`, `satuan`, `harga`, `total_harga`) VALUES
(1, 1, 'spanduk 3x2', 2, 'lbr', 20000, 40000),
(2, 2, 'spanduk 5x2', 2, 'lbr', 120000, 240000),
(3, 3, 'Spanduk 3M', 2, 'lbr', 72000, 144000),
(4, 4, 'spanduk 3x2', 2, 'lbr', 120000, 240000),
(5, 5, 'Spanduk 3M', 2, 'lbr', 64000, 128000),
(6, 6, 'Spanduk 8x3', 2, 'lbr', 560000, 1120000),
(7, 7, 'Spanduk 5x2', 2, 'lbr', 100000, 200000);

-- --------------------------------------------------------

--
-- Table structure for table `transfer_ke_kas`
--

CREATE TABLE `transfer_ke_kas` (
  `id` int(11) NOT NULL,
  `id_kantor` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `total_transfer` int(11) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `worksheet`
--

CREATE TABLE `worksheet` (
  `id` int(11) NOT NULL,
  `jenis_biaya` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `jumlah` varchar(255) NOT NULL,
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_kantor` int(11) NOT NULL,
  `id_jenis_pembayaran` int(11) NOT NULL,
  `created_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `worksheet`
--

INSERT INTO `worksheet` (`id`, `jenis_biaya`, `keterangan`, `jumlah`, `tanggal`, `id_kantor`, `id_jenis_pembayaran`, `created_by`) VALUES
(1, 4005, 'Membeli minyak mobil', '50000', '2020-03-31 14:50:19', 1, 1, 'Dara'),
(2, 4005, 'Membeli minyak motor', '15000', '2020-03-31 14:50:42', 1, 1, 'Dara'),
(3, 4006, 'Beli makanan untuk karyawan', '20000', '2020-03-31 14:51:03', 1, 1, 'Dara'),
(4, 4005, 'uang minyak mobil', '150000', '2020-03-31 18:25:25', 2, 1, 'Mita');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cabang_kantor`
--
ALTER TABLE `cabang_kantor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `developer`
--
ALTER TABLE `developer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history_pembayaran`
--
ALTER TABLE `history_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jabatan_admin`
--
ALTER TABLE `jabatan_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_pembayaran`
--
ALTER TABLE `jenis_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_worksheet`
--
ALTER TABLE `jenis_worksheet`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode` (`kode`);

--
-- Indexes for table `laporan_bank_harian`
--
ALTER TABLE `laporan_bank_harian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan_kas_harian`
--
ALTER TABLE `laporan_kas_harian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `piutang`
--
ALTER TABLE `piutang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setor_ke_bank`
--
ALTER TABLE `setor_ke_bank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi_produk`
--
ALTER TABLE `transaksi_produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transfer_ke_kas`
--
ALTER TABLE `transfer_ke_kas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `worksheet`
--
ALTER TABLE `worksheet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jenis_biaya` (`jenis_biaya`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cabang_kantor`
--
ALTER TABLE `cabang_kantor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `developer`
--
ALTER TABLE `developer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `history_pembayaran`
--
ALTER TABLE `history_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jabatan_admin`
--
ALTER TABLE `jabatan_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jenis_pembayaran`
--
ALTER TABLE `jenis_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jenis_worksheet`
--
ALTER TABLE `jenis_worksheet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `laporan_bank_harian`
--
ALTER TABLE `laporan_bank_harian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `laporan_kas_harian`
--
ALTER TABLE `laporan_kas_harian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `piutang`
--
ALTER TABLE `piutang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `setor_ke_bank`
--
ALTER TABLE `setor_ke_bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaksi_produk`
--
ALTER TABLE `transaksi_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transfer_ke_kas`
--
ALTER TABLE `transfer_ke_kas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `worksheet`
--
ALTER TABLE `worksheet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
