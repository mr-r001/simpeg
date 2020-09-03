-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2020 at 07:09 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gaji`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id` int(11) NOT NULL,
  `id_absensi` varchar(10) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `id_pegawai` varchar(10) NOT NULL,
  `hadir` int(11) NOT NULL,
  `sakit` int(11) NOT NULL,
  `ijin` int(11) NOT NULL,
  `tanpa_keterangan` int(11) NOT NULL,
  `potongan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id`, `id_absensi`, `tanggal`, `id_pegawai`, `hadir`, `sakit`, `ijin`, `tanpa_keterangan`, `potongan`) VALUES
(14, 'AB00002', 'Agustus / 2020', 'PE01', 26, 1, 2, 2, 300000),
(18, 'AB00003', 'Januari / 2020', 'PE02', 30, 1, 0, 0, 0),
(21, 'AB00006', 'Januari / 2020', 'PE03', 31, 0, 0, 0, 0),
(24, 'AB00009', 'Januari / 2020', 'PE04', 30, 0, 0, 1, 150000),
(27, 'AB00010', 'Januari / 2020', 'PE05', 29, 0, 0, 2, 300000),
(28, 'AB00011', 'Januari / 2020', 'PE06', 30, 0, 1, 0, 0),
(29, 'AB00012', 'Januari / 2020', 'PE07', 31, 0, 0, 0, 0),
(30, 'AB00013', 'Januari / 2020', 'PE08', 31, 0, 0, 0, 0),
(31, 'AB00014', 'Februari / 2020', 'PE09', 28, 0, 0, 1, 150000);

-- --------------------------------------------------------

--
-- Table structure for table `gaji`
--

CREATE TABLE `gaji` (
  `id` int(11) NOT NULL,
  `id_gaji` varchar(15) NOT NULL,
  `tanggal` date NOT NULL,
  `bulan` varchar(50) NOT NULL,
  `tahun` int(11) NOT NULL,
  `id_pegawai` varchar(10) NOT NULL,
  `golongan` int(15) NOT NULL,
  `gaji_pokok` int(15) NOT NULL,
  `tunjangan` int(15) NOT NULL,
  `potongan` int(15) NOT NULL,
  `gaji_bersih` int(15) NOT NULL,
  `potongan_absen` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gaji`
--

INSERT INTO `gaji` (`id`, `id_gaji`, `tanggal`, `bulan`, `tahun`, `id_pegawai`, `golongan`, `gaji_pokok`, `tunjangan`, `potongan`, `gaji_bersih`, `potongan_absen`) VALUES
(34, 'GA00002', '2020-08-15', 'Januari', 2020, 'PE02', 860000, 3000000, 75000, 270000, 3665000, 0),
(35, 'GA00003', '2020-08-15', 'Januari', 2020, 'PE03', 809000, 2600000, 75000, 234000, 3250000, 0),
(36, 'GA00004', '2020-08-15', 'Januari', 2020, 'PE04', 764000, 2700000, 75000, 243000, 3146000, 150000),
(37, 'GA00005', '2020-08-15', 'Januari', 2020, 'PE05', 695000, 2400000, 225000, 216000, 2804000, 300000),
(38, 'GA00006', '2020-08-15', 'Januari', 2020, 'PE06', 791000, 2400000, 225000, 216000, 3200000, 0),
(39, 'GA00007', '2020-08-15', 'Januari', 2020, 'PE07', 690000, 2300000, 75000, 207000, 2858000, 0),
(40, 'GA00008', '2020-08-15', 'Januari', 2020, 'PE08', 828000, 2300000, 75000, 207000, 2996000, 0),
(41, 'GA00009', '2020-09-02', 'Februari', 2020, 'PE09', 782000, 2300000, 225000, 207000, 2950000, 150000);

-- --------------------------------------------------------

--
-- Table structure for table `golongan`
--

CREATE TABLE `golongan` (
  `id` int(11) NOT NULL,
  `id_golongan` varchar(10) NOT NULL,
  `nama_golongan` varchar(25) NOT NULL,
  `tunjangan_golongan` int(15) NOT NULL,
  `tunjangan_pasutri` double NOT NULL,
  `tunjangan_anak` double NOT NULL,
  `tunjangan_jabatan` int(15) NOT NULL,
  `tunjangan_makan` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `golongan`
--

INSERT INTO `golongan` (`id`, `id_golongan`, `nama_golongan`, `tunjangan_golongan`, `tunjangan_pasutri`, `tunjangan_anak`, `tunjangan_jabatan`, `tunjangan_makan`) VALUES
(7, 'GO01', 'Golongan I', 175000, 5, 2, 100000, 300000),
(8, 'GO02', 'Golongan II', 180000, 5, 2, 110000, 300000),
(9, 'GO03', 'Golongan III', 185000, 5, 5, 120000, 350000),
(10, 'GO04', 'Golongan IV', 190000, 5, 2, 130000, 130000);

-- --------------------------------------------------------

--
-- Table structure for table `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id_role` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hak_akses`
--

INSERT INTO `hak_akses` (`id_role`, `role`) VALUES
(1, 'Admin'),
(2, 'Pimpinan'),
(3, 'Pegawai');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL,
  `id_jabatan` varchar(10) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL,
  `gaji_pokok` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `id_jabatan`, `nama_jabatan`, `gaji_pokok`) VALUES
(2, 'JA01', 'Pimpinan', 3000000),
(3, 'JA02', 'Sekretaris', 2700000),
(4, 'JA03', 'Bendahara', 2600000),
(5, 'JA04', 'Koordinator', 2400000),
(6, 'JA05', 'Anggota', 2300000);

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `id_pegawai` varchar(10) NOT NULL,
  `nip` int(11) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `id_jabatan` varchar(10) NOT NULL,
  `id_golongan` varchar(10) NOT NULL,
  `jenis_kelamin` char(1) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `status_kawin` char(1) NOT NULL,
  `jumlah_anak` int(11) NOT NULL,
  `bank` varchar(35) NOT NULL,
  `no_rekening` int(20) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  `img` varchar(50) NOT NULL DEFAULT 'default.png',
  `role` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `id_pegawai`, `nip`, `nama`, `id_jabatan`, `id_golongan`, `jenis_kelamin`, `alamat`, `no_hp`, `status_kawin`, `jumlah_anak`, `bank`, `no_rekening`, `username`, `password`, `img`, `role`) VALUES
(6, 'PE01', 110000001, 'Rival', 'JA01', 'GO01', 'L', 'Maj', '67989', '0', 0, 'BCA', 567, 'rival', '8cb2237d0679ca88db6464eac60da96345513964', '3.png', '1'),
(27, 'PE02', 110000002, 'Gadang Wijaya', 'JA01', 'GO02', 'L', 'Brebes', '089122223333', '1', 2, 'BNI', 12345, 'gadang', '8cb2237d0679ca88db6464eac60da96345513964', '1.jpg', '2'),
(28, 'PE03', 110000003, 'Hasna Puspasari', 'JA03', 'GO01', 'P', 'Brebes', '089922223333', '1', 2, 'BRI', 12345, 'hasna', '8cb2237d0679ca88db6464eac60da96345513964', '79.jpg', '1'),
(29, 'PE04', 110000004, 'Nasori', 'JA02', 'GO01', 'L', 'Tegal', '089922223333', '1', 1, 'BRI', 12345, 'nasori', '8cb2237d0679ca88db6464eac60da96345513964', '15.jpg', '3'),
(30, 'PE05', 110000005, 'Firmansyah', 'JA04', 'GO01', 'L', 'Brebes', '089922223333', '0', 0, 'BNI', 12345, 'friman', '8cb2237d0679ca88db6464eac60da96345513964', '51.jpg', '3'),
(31, 'PE06', 110000006, 'Indah Wulandari', 'JA04', 'GO01', 'P', 'Brebes', '089944445555', '1', 2, 'BCA', 12345, 'indah', '8cb2237d0679ca88db6464eac60da96345513964', '12.jpg', '3'),
(32, 'PE07', 110000006, 'Yahya Suryono', 'JA05', 'GO01', 'L', 'Brebes', '089955556666', '0', 0, 'BCA', 12345, 'yahya', '8cb2237d0679ca88db6464eac60da96345513964', '61.jpg', '3'),
(33, 'PE08', 110000008, 'Silvia Permata', 'JA05', 'GO01', 'P', 'Tegal', '089922223333', '1', 3, 'BNI', 12345, 'silvia', '8cb2237d0679ca88db6464eac60da96345513964', '76.jpg', '3'),
(34, 'PE09', 909090, 'Udin', 'JA05', 'GO01', 'L', 'Tegal', '089000', '1', 2, 'BRI', 8989898, 'udin2', '8cb2237d0679ca88db6464eac60da96345513964', '1_PSWesternScreechOwl2-1.jpg', '3');

-- --------------------------------------------------------

--
-- Table structure for table `potongan`
--

CREATE TABLE `potongan` (
  `id` int(11) NOT NULL,
  `id_potongan` varchar(10) NOT NULL,
  `nama_potongan` varchar(25) NOT NULL,
  `besar_potongan` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `potongan`
--

INSERT INTO `potongan` (`id`, `id_potongan`, `nama_potongan`, `besar_potongan`) VALUES
(6, 'PO01', 'BPJS', 2),
(7, 'PO02', 'Tabungan Hari Tua', 5),
(8, 'PO03', 'PPh', 2);

-- --------------------------------------------------------

--
-- Table structure for table `potongan_pegawai`
--

CREATE TABLE `potongan_pegawai` (
  `id` int(11) NOT NULL,
  `id_pegawai` varchar(10) NOT NULL,
  `id_potongan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `potongan_pegawai`
--

INSERT INTO `potongan_pegawai` (`id`, `id_pegawai`, `id_potongan`) VALUES
(48, 'PE01', 'PO01'),
(109, 'PE02', 'PO01'),
(110, 'PE02', 'PO02'),
(111, 'PE02', 'PO03'),
(112, 'PE03', 'PO01'),
(113, 'PE03', 'PO02'),
(114, 'PE03', 'PO03'),
(115, 'PE04', 'PO01'),
(116, 'PE04', 'PO02'),
(117, 'PE04', 'PO03'),
(121, 'PE06', 'PO01'),
(122, 'PE06', 'PO02'),
(123, 'PE06', 'PO03'),
(124, 'PE07', 'PO01'),
(125, 'PE07', 'PO02'),
(126, 'PE07', 'PO03'),
(127, 'PE08', 'PO01'),
(128, 'PE08', 'PO02'),
(129, 'PE08', 'PO03'),
(130, 'PE09', 'PO01'),
(131, 'PE09', 'PO02'),
(132, 'PE09', 'PO03'),
(133, 'PE05', 'PO01'),
(134, 'PE05', 'PO02'),
(135, 'PE05', 'PO03');

-- --------------------------------------------------------

--
-- Table structure for table `tunjangan`
--

CREATE TABLE `tunjangan` (
  `id` int(11) NOT NULL,
  `id_tunjangan` varchar(10) NOT NULL,
  `nama_tunjangan` varchar(25) NOT NULL,
  `besar_tunjangan` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tunjangan`
--

INSERT INTO `tunjangan` (`id`, `id_tunjangan`, `nama_tunjangan`, `besar_tunjangan`) VALUES
(2, 'TU01', 'Tunjangan Beras', 75000);

-- --------------------------------------------------------

--
-- Table structure for table `tunjangan_pegawai`
--

CREATE TABLE `tunjangan_pegawai` (
  `id` int(11) NOT NULL,
  `id_pegawai` varchar(10) NOT NULL,
  `id_tunjangan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tunjangan_pegawai`
--

INSERT INTO `tunjangan_pegawai` (`id`, `id_pegawai`, `id_tunjangan`) VALUES
(95, 'PE01', 'TU01'),
(96, 'PE01', 'TU02'),
(156, 'PE02', 'TU01'),
(157, 'PE03', 'TU01'),
(158, 'PE04', 'TU01'),
(161, 'PE06', 'TU01'),
(162, 'PE06', 'TU02'),
(163, 'PE07', 'TU01'),
(164, 'PE08', 'TU01'),
(165, 'PE09', 'TU01'),
(166, 'PE09', 'TU02'),
(167, 'PE05', 'TU01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role` (`role`),
  ADD KEY `role_2` (`role`);

--
-- Indexes for table `potongan`
--
ALTER TABLE `potongan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `potongan_pegawai`
--
ALTER TABLE `potongan_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tunjangan`
--
ALTER TABLE `tunjangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tunjangan_pegawai`
--
ALTER TABLE `tunjangan_pegawai`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `gaji`
--
ALTER TABLE `gaji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `golongan`
--
ALTER TABLE `golongan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hak_akses`
--
ALTER TABLE `hak_akses`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `potongan`
--
ALTER TABLE `potongan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `potongan_pegawai`
--
ALTER TABLE `potongan_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `tunjangan`
--
ALTER TABLE `tunjangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tunjangan_pegawai`
--
ALTER TABLE `tunjangan_pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
