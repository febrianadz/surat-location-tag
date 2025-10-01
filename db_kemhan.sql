-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2024 at 05:15 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kemhan`
--

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `no_surat` int(11) NOT NULL,
  `no_agenda` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `asal_surat` varchar(50) NOT NULL,
  `tujuan_surat` varchar(50) NOT NULL,
  `tembusan` varchar(50) NOT NULL,
  `hal` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `derajat_surat` varchar(50) NOT NULL,
  `sarana` varchar(50) NOT NULL,
  `isi` varchar(50) NOT NULL,
  `jenis` enum('E','I','ER','IR') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`no_surat`, `no_agenda`, `tanggal`, `asal_surat`, `tujuan_surat`, `tembusan`, `hal`, `jumlah`, `derajat_surat`, `sarana`, `isi`, `jenis`) VALUES
(1, 'no agenda', '1212-12-12', 'asal', 'kepada', 'tembusan', 'hal', 2, 'derajat', 'sarana', 'Text (1).pdf', 'I'),
(2, '123123', '1212-12-12', 'asdasd', 'asdasd', 'asdasd', 'asdasd', 12, 'asdasd', 'asdasd', 'HOW TO INPUT DATA ON WEBSITE KOI ORGANIZE.pdf', 'ER');

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `no_surat` int(11) NOT NULL,
  `no_agenda` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `asal_surat` varchar(50) NOT NULL,
  `tujuan_surat` varchar(50) NOT NULL,
  `tembusan` varchar(50) NOT NULL,
  `hal` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `derajat_surat` varchar(50) NOT NULL,
  `sarana` varchar(50) NOT NULL,
  `isi` varchar(50) NOT NULL,
  `jenis` enum('E','I','ER','IR') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`no_surat`, `no_agenda`, `tanggal`, `asal_surat`, `tujuan_surat`, `tembusan`, `hal`, `jumlah`, `derajat_surat`, `sarana`, `isi`, `jenis`) VALUES
(2, 'no agenda', '1212-12-12', 'asal', 'kepada', 'tembusan', 'hal', 2, 'derajat', 'sarana', 'Text (1).pdf', 'E');

-- --------------------------------------------------------

--
-- Table structure for table `tb_divisi`
--

CREATE TABLE `tb_divisi` (
  `id_divisi` int(11) NOT NULL,
  `divisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_divisi`
--

INSERT INTO `tb_divisi` (`id_divisi`, `divisi`) VALUES
(1, 'PUSLITBANG');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`id_jabatan`, `jabatan`) VALUES
(1, 'Supervisor'),
(2, 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `tb_laporan`
--

CREATE TABLE `tb_laporan` (
  `id_laporan` int(11) NOT NULL,
  `nama_penerima` varchar(50) NOT NULL,
  `instansi` varchar(50) NOT NULL,
  `alamat_ins` text NOT NULL,
  `lang` varchar(100) NOT NULL,
  `lat` varchar(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_laporan`
--

INSERT INTO `tb_laporan` (`id_laporan`, `nama_penerima`, `instansi`, `alamat_ins`, `lang`, `lat`, `time`, `foto`) VALUES
(1, 'admin', 'PT Pertamina', 'Indonesia', '106.79505349999999452848', '-6.13080099999999994509', '2024-12-11 20:20:54', '675a4886e804c.png'),
(2, 'admin', 'PT Pertamina', 'Indonesia', '106.79415266666666184392', '-6.13167149999999949728', '2024-12-11 20:21:46', '675a48ba94e5e.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `no_telfon` varchar(50) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_divisi` int(11) NOT NULL,
  `level` enum('1','2') NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `name`, `tgl_lahir`, `no_telfon`, `id_jabatan`, `id_divisi`, `level`, `email`, `password`, `foto`) VALUES
(1, 'Admin PUSDATIN', '1999-01-02', '089999999', 0, 0, '1', 'admin.pusdatin@gmail.com', '3c9a6c8628573e2af5ad10dbaf23eeaa', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`no_surat`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`no_surat`);

--
-- Indexes for table `tb_divisi`
--
ALTER TABLE `tb_divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indexes for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `tb_laporan`
--
ALTER TABLE `tb_laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  MODIFY `no_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  MODIFY `no_surat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_divisi`
--
ALTER TABLE `tb_divisi`
  MODIFY `id_divisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_laporan`
--
ALTER TABLE `tb_laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
