-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2020 at 06:48 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simpan-pinjam`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `foto` varchar(128) NOT NULL DEFAULT 'default.png',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama`, `username`, `password`, `jenis_kelamin`, `foto`, `created_at`) VALUES
(1, 'Rizky Audina', 'admin', '0192023a7bbd73250516f069df18b500', 'Laki-Laki', 'default.png', '2020-06-15 08:25:35');

-- --------------------------------------------------------

--
-- Table structure for table `nasabah`
--

CREATE TABLE `nasabah` (
  `id_nasabah` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telepon` varchar(12) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(128) DEFAULT 'default.png',
  `usia` int(11) NOT NULL,
  `upload_ktp` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nasabah`
--

INSERT INTO `nasabah` (`id_nasabah`, `nik`, `nama`, `username`, `password`, `telepon`, `alamat`, `foto`, `usia`, `upload_ktp`, `created_at`) VALUES
(1, '1212071910970002', 'Siti Solehah', 'nasabah123', '827ccb0eea8a706c4c34a16891f84e7b', '08122329312', 'Purwakarta, Jawa Barat', 'default.png', 31, '', '2020-06-15 14:26:02'),
(2, '1212071910890003', 'Nurlela', 'nurlela', 'ed1e56ef963bb91c45a14a50c2f3cd95', '021000999', 'Purwakarta, Jawa Barat', 'img_1592382653.png', 34, 'ktp_Nurlela.jpg', '2020-06-16 02:47:28'),
(3, '1212071910970004', 'Ratna Sari', 'ratna', '827ccb0eea8a706c4c34a16891f84e7b', '0823723121', 'Purwakarta, Jawa Barat', 'default.png', 30, 'ktp_Ratna_Sari.jpg', '2020-06-16 10:02:28'),
(4, '', 'Ade Sudaryono', 'adesd', 'fa6a6bd136dec26a1dd5e326b7e43254', '08381212121', '', 'default.png', 0, NULL, '2020-06-17 04:01:16'),
(5, '', 'Pandu Alifa', 'pandu', '827ccb0eea8a706c4c34a16891f84e7b', '0123', '', 'default.png', 0, NULL, '2020-06-18 04:44:43');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(11) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `nominal` double NOT NULL,
  `nasabah_id` varchar(16) NOT NULL,
  `durasi` varchar(20) NOT NULL,
  `bunga_pinjam` double NOT NULL,
  `status` int(1) NOT NULL,
  `tgl_konfirmasi` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `tgl_pinjam`, `nominal`, `nasabah_id`, `durasi`, `bunga_pinjam`, `status`, `tgl_konfirmasi`) VALUES
(2, '2020-06-17', 1000000, '2', '6', 120000, 1, '2020-06-17'),
(3, '2020-06-17', 2000000, '3', '12', 600000, 1, '2020-06-17');

-- --------------------------------------------------------

--
-- Table structure for table `simpanan`
--

CREATE TABLE `simpanan` (
  `id_simpanan` int(11) NOT NULL,
  `tgl_setor` date NOT NULL,
  `total` double NOT NULL,
  `nasabah_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `tgl_konfirmasi` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `simpanan`
--

INSERT INTO `simpanan` (`id_simpanan`, `tgl_setor`, `total`, `nasabah_id`, `status`, `tgl_konfirmasi`) VALUES
(2, '2020-06-16', 500000, 2, 1, '2020-06-16'),
(3, '2020-06-16', 2000000, 2, 1, '2020-06-16'),
(5, '2020-06-17', 500000, 2, 1, '2020-06-17'),
(6, '2020-06-17', 5000000, 3, 1, '2020-06-17'),
(7, '2020-06-17', 3000000, 3, 1, '2020-06-17'),
(8, '2020-06-17', 500000, 4, 1, '2020-06-17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nasabah`
--
ALTER TABLE `nasabah`
  ADD PRIMARY KEY (`id_nasabah`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `simpanan`
--
ALTER TABLE `simpanan`
  ADD PRIMARY KEY (`id_simpanan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nasabah`
--
ALTER TABLE `nasabah`
  MODIFY `id_nasabah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `simpanan`
--
ALTER TABLE `simpanan`
  MODIFY `id_simpanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
