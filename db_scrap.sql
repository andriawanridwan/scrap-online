-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 10, 2020 at 10:28 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_scrap`
--

-- --------------------------------------------------------

--
-- Table structure for table `iot_admin`
--

CREATE TABLE `iot_admin` (
  `id` int(11) NOT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `no_rbap` varchar(100) DEFAULT NULL,
  `tanggal_rbap` date DEFAULT NULL,
  `produk_kemasan` varchar(100) DEFAULT NULL,
  `jenis_hasil` varchar(100) DEFAULT NULL,
  `qty` double DEFAULT NULL,
  `satuan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iot_admin`
--

INSERT INTO `iot_admin` (`id`, `tanggal_selesai`, `no_rbap`, `tanggal_rbap`, `produk_kemasan`, `jenis_hasil`, `qty`, `satuan`) VALUES
(3, '2019-11-19', '0113/PSA/NFI/IX/2019', '2019-11-28', 'Kemasan IOT', '17', 5, 'Kg'),
(4, '2019-11-22', 'Test', '2019-11-22', 'Kemasan IOT', '13', 10, 'Kg'),
(5, '2019-12-10', '100', '2019-12-10', 'Kemasan IOT', '13', 100, 'Kg'),
(6, '2019-12-11', '1000lk', '2019-12-11', 'Kemasan IOT', '13', 1000, 'Kg'),
(7, '2019-12-11', '1008', '2019-12-11', 'Kemasan IOT', '13', 10, 'Kg');

-- --------------------------------------------------------

--
-- Table structure for table `iot_gudang`
--

CREATE TABLE `iot_gudang` (
  `id` int(11) NOT NULL,
  `tanggal_keluar` date DEFAULT NULL,
  `tujuan` varchar(100) DEFAULT NULL,
  `jenis_transaksi` varchar(100) DEFAULT NULL,
  `kategori_pengurangan` varchar(100) DEFAULT NULL,
  `no_spr` varchar(100) DEFAULT NULL,
  `qty` double DEFAULT NULL,
  `satuan` varchar(100) DEFAULT NULL,
  `kategori` varchar(100) DEFAULT NULL,
  `keterangan` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iot_gudang`
--

INSERT INTO `iot_gudang` (`id`, `tanggal_keluar`, `tujuan`, `jenis_transaksi`, `kategori_pengurangan`, `no_spr`, `qty`, `satuan`, `kategori`, `keterangan`) VALUES
(2, '2019-11-18', '2', 'Dijual', 'Reuse', '12345', 123, 'Kg', 'Kertas', 'mantul');

-- --------------------------------------------------------

--
-- Table structure for table `iot_user`
--

CREATE TABLE `iot_user` (
  `id` int(11) NOT NULL,
  `bulan` varchar(100) DEFAULT NULL,
  `tanggal_date` date DEFAULT NULL,
  `no_dokumen` varchar(100) DEFAULT NULL,
  `dept` varchar(100) DEFAULT NULL,
  `workcenter` varchar(100) DEFAULT NULL,
  `plant` varchar(100) DEFAULT NULL,
  `qty` double DEFAULT NULL,
  `satuan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iot_user`
--

INSERT INTO `iot_user` (`id`, `bulan`, `tanggal_date`, `no_dokumen`, `dept`, `workcenter`, `plant`, `qty`, `satuan`) VALUES
(26, 'November', '2019-11-19', '050/KMS/LBD/VII/19', '14', '61', '16', 500, 'Pcs');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `srs_admin`
--

CREATE TABLE `srs_admin` (
  `id` int(11) NOT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `no_rbap` varchar(100) DEFAULT NULL,
  `tanggal_rbap` date DEFAULT NULL,
  `produk_kemasan` varchar(100) DEFAULT NULL,
  `jenis_hasil` varchar(100) DEFAULT NULL,
  `qty` double DEFAULT NULL,
  `satuan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `srs_gudang`
--

CREATE TABLE `srs_gudang` (
  `id` int(11) NOT NULL,
  `tanggal_keluar` date DEFAULT NULL,
  `tujuan` varchar(100) DEFAULT NULL,
  `jenis_transaksi` varchar(100) DEFAULT NULL,
  `kategori_pengurangan` varchar(100) DEFAULT NULL,
  `no_spr` varchar(100) DEFAULT NULL,
  `qty` double DEFAULT NULL,
  `satuan` varchar(100) DEFAULT NULL,
  `kategori` varchar(100) DEFAULT NULL,
  `keterangan` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `srs_user`
--

CREATE TABLE `srs_user` (
  `id` int(11) NOT NULL,
  `bulan` varchar(100) DEFAULT NULL,
  `tanggal_date` date DEFAULT NULL,
  `no_dokumen` varchar(100) DEFAULT NULL,
  `dept` varchar(100) DEFAULT NULL,
  `workcenter` varchar(100) DEFAULT NULL,
  `plant` varchar(100) DEFAULT NULL,
  `qty` double DEFAULT NULL,
  `satuan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_deptiot`
--

CREATE TABLE `tb_deptiot` (
  `id` int(11) NOT NULL,
  `deptiot` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_deptiot`
--

INSERT INTO `tb_deptiot` (`id`, `deptiot`) VALUES
(4, 'DTA');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis_hasil_iot`
--

CREATE TABLE `tb_jenis_hasil_iot` (
  `id` int(11) NOT NULL,
  `jenis_hasil_iot` varchar(50) NOT NULL,
  `harga` int(50) NOT NULL,
  `satuan` varchar(25) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jenis_hasil_iot`
--

INSERT INTO `tb_jenis_hasil_iot` (`id`, `jenis_hasil_iot`, `harga`, `satuan`, `qty`) VALUES
(11, 'alifoil', 2000, 'Kg', 0),
(13, 'Alfoil', 200, 'Kg', 975),
(14, 'Ban bekas', 1000, 'Kg', 80),
(15, 'Beling', 350, 'Kg', 0),
(16, 'Besi', 4250000, 'Kg', 0),
(17, 'Botol', 1900, 'Kg', 0),
(18, 'Cones', 550, 'Kg', 0),
(19, 'Duplek', 500, 'Kg', 0),
(20, 'Emberan', 1900, 'Kg', 0),
(21, 'Emberan Hitam', 900, 'Kg', 0),
(22, 'Impect', 400, 'Kg', 0),
(23, 'Kantong Kresek', 150, 'Kg', 0),
(24, 'Kardus/Box', 1100, 'Kg', 0),
(25, 'Karung Acid', 900, 'Kg', 0),
(26, 'Karung Noblem', 900, 'Kg', 0),
(27, 'Kertas Warna', 500, 'Kg', 0),
(28, 'Metalufo', 500, 'Kg', 0),
(29, 'Plastik PE', 2200, 'Kg', 0),
(30, 'Plastik PP', 800, 'Kg', 0),
(31, 'PPC', 800, 'Kg', 0),
(32, 'Tali Rapia', 250, 'Kg', 0),
(33, 'Tetrapack', 125, 'Kg', 0),
(34, 'Triplek 9 mm sortiran', 3000, 'Kg', 0),
(35, 'Zak susu', 1300, 'Kg', 0),
(36, 'Karung gula', 700, 'Kg', 0),
(37, 'Tepon', 10000, 'Kg', 0),
(38, 'Drum Kaleng', 36000, 'Kg', 0),
(39, 'Drum Surbitol', 100000, 'Kg', 0),
(40, 'Ember', 2500, 'Kg', 0),
(41, 'IBC', 500000, 'Kg', 0),
(42, 'Jerigen 20 Lt', 8000, 'Kg', 0),
(43, 'Jerigen 30 Lt', 12000, 'Kg', 0),
(44, 'Pallet Kayu (Jabel) Sortiran', 15000, 'Kg', 0),
(45, 'Pallet Kayu (Jabel)', 30000, 'Kg', 0),
(46, 'Blok Kayu ex Pallet', 2000, 'Kg', 0),
(47, 'Pallet Kayu Non Standar', 8000, 'Kg', 0),
(48, 'Triplek 3 mm', 5000, 'Kg', 0),
(49, 'Triplek 9 mm', 10000, 'Kg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_keranjang`
--

CREATE TABLE `tb_keranjang` (
  `id` int(11) NOT NULL,
  `barang` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `satuan` varchar(25) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_keranjang`
--

INSERT INTO `tb_keranjang` (`id`, `barang`, `harga`, `satuan`, `qty`) VALUES
(1, 'Ban bekas', 1000, 'Kg', 5),
(2, 'Alfoil', 200, 'Kg', 975);

-- --------------------------------------------------------

--
-- Table structure for table `tb_plant`
--

CREATE TABLE `tb_plant` (
  `id` int(11) NOT NULL,
  `plant` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_plant`
--

INSERT INTO `tb_plant` (`id`, `plant`) VALUES
(5, 'Ciawi'),
(16, 'Ciawi'),
(17, 'Cibitung'),
(18, 'Jabar 01'),
(19, 'Jabar 02'),
(20, 'Jabar 03'),
(21, 'Jabar 04'),
(22, 'Jabar 05'),
(23, 'Jabar 06'),
(24, 'Jakarta'),
(25, 'Sentul');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tujuan_iot`
--

CREATE TABLE `tb_tujuan_iot` (
  `id` int(11) NOT NULL,
  `tujuan_iot` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tujuan_iot`
--

INSERT INTO `tb_tujuan_iot` (`id`, `tujuan_iot`) VALUES
(2, 'Kel. SindangSari'),
(7, 'PT Holcim'),
(8, 'Harjasari 01/04'),
(9, 'CV ELJ'),
(10, 'Sindangsari 01/03'),
(11, 'Harjasari 02/04');

-- --------------------------------------------------------

--
-- Table structure for table `tb_workcenter`
--

CREATE TABLE `tb_workcenter` (
  `id` int(11) NOT NULL,
  `workcenter` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_workcenter`
--

INSERT INTO `tb_workcenter` (`id`, `workcenter`) VALUES
(33, 'Ciawi'),
(61, 'Gd Kemas'),
(62, 'Fillpack H1 & G2'),
(63, 'Gd Baku'),
(64, 'Gd Tanah Baru'),
(65, 'Maklon'),
(66, 'Gd Baku A'),
(67, 'Gd Baku B'),
(68, 'Fillpack H2'),
(69, 'Mix Fillpack'),
(71, 'Gd Jadi'),
(72, 'Gd Karyawan');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `iot_admin`
--
ALTER TABLE `iot_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iot_gudang`
--
ALTER TABLE `iot_gudang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iot_user`
--
ALTER TABLE `iot_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `srs_admin`
--
ALTER TABLE `srs_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `srs_gudang`
--
ALTER TABLE `srs_gudang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `srs_user`
--
ALTER TABLE `srs_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_deptiot`
--
ALTER TABLE `tb_deptiot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_jenis_hasil_iot`
--
ALTER TABLE `tb_jenis_hasil_iot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_plant`
--
ALTER TABLE `tb_plant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_tujuan_iot`
--
ALTER TABLE `tb_tujuan_iot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_workcenter`
--
ALTER TABLE `tb_workcenter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `iot_admin`
--
ALTER TABLE `iot_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `iot_gudang`
--
ALTER TABLE `iot_gudang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `iot_user`
--
ALTER TABLE `iot_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `srs_admin`
--
ALTER TABLE `srs_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `srs_gudang`
--
ALTER TABLE `srs_gudang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `srs_user`
--
ALTER TABLE `srs_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_deptiot`
--
ALTER TABLE `tb_deptiot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_jenis_hasil_iot`
--
ALTER TABLE `tb_jenis_hasil_iot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_plant`
--
ALTER TABLE `tb_plant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_tujuan_iot`
--
ALTER TABLE `tb_tujuan_iot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_workcenter`
--
ALTER TABLE `tb_workcenter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
