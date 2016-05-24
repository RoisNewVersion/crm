-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2016 at 03:03 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `macam_kegiatan`
--

CREATE TABLE IF NOT EXISTS `macam_kegiatan` (
`id_macam` int(2) NOT NULL,
  `nama_keluhan` varchar(30) NOT NULL,
  `detail_pesan` varchar(160) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `macam_kegiatan`
--

INSERT INTO `macam_kegiatan` (`id_macam`, `nama_keluhan`, `detail_pesan`) VALUES
(1, 'Tune Up', 'Pelanggan Yth, waktu perawatan mobil anda sudah jatuh tempo, silahkan kembali ke bengkel untuk Tune Up selanjutnya.'),
(2, 'Radiator', 'Pelanggan Yth, waktu perawatan mobil anda sudah jatuh tempo, silahkan kembali ke bengkel untuk pengecekan Radiator selanjutnya.'),
(3, 'Ganti Oli', 'Pelanggan Yth, waktu perawatan mobil anda sudah jatuh tempo, silahkan kembali ke bengkel untuk pengecekan Oli selanjutnya.'),
(4, 'Kampas Rem', 'Pelanggan Yth, waktu perawatan mobil anda sudah jatuh tempo, silahkan kembali ke bengkel untuk pengecekan kampas rem selanjutnya.'),
(5, 'Freon AC', 'Pelanggan Yth, waktu perawatan mobil anda sudah jatuh tempo, silahkan kembali ke bengkel untuk pengecekan Freon AC selanjutnya.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `macam_kegiatan`
--
ALTER TABLE `macam_kegiatan`
 ADD PRIMARY KEY (`id_macam`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `macam_kegiatan`
--
ALTER TABLE `macam_kegiatan`
MODIFY `id_macam` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
