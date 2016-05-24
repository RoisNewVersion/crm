-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 21. Maret 2016 jam 14:22
-- Versi Server: 5.5.16
-- Versi PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `crm1`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(1) unsigned NOT NULL AUTO_INCREMENT,
  `nama_admin` varchar(30) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`) VALUES
(1, 'admin gahul', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'admn kedua', 'admin2', 'c84258e9c39059a89ab77d846ddab909');

-- --------------------------------------------------------

--
-- Struktur dari tabel `daemons`
--

CREATE TABLE IF NOT EXISTS `daemons` (
  `Start` text NOT NULL,
  `Info` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `gammu`
--

CREATE TABLE IF NOT EXISTS `gammu` (
  `Version` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `gammu`
--

INSERT INTO `gammu` (`Version`) VALUES
(13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `inbox`
--

CREATE TABLE IF NOT EXISTS `inbox` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ReceivingDateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Text` text NOT NULL,
  `SenderNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text NOT NULL,
  `SMSCNumber` varchar(20) NOT NULL DEFAULT '',
  `Class` int(11) NOT NULL DEFAULT '-1',
  `TextDecoded` text NOT NULL,
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `RecipientID` text NOT NULL,
  `Processed` enum('false','true') NOT NULL DEFAULT 'false',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Trigger `inbox`
--
DROP TRIGGER IF EXISTS `inbox_timestamp`;
DELIMITER //
CREATE TRIGGER `inbox_timestamp` BEFORE INSERT ON `inbox`
 FOR EACH ROW BEGIN
    IF NEW.ReceivingDateTime = '0000-00-00 00:00:00' THEN
        SET NEW.ReceivingDateTime = CURRENT_TIMESTAMP();
    END IF;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan`
--

CREATE TABLE IF NOT EXISTS `kegiatan` (
  `id_kegiatan` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `id_pelanggan` int(5) unsigned NOT NULL,
  `id_mobil` int(5) unsigned NOT NULL,
  `keluhan` varchar(100) NOT NULL,
  `kegiatan` varchar(100) NOT NULL,
  `tanggal_masuk` date NOT NULL,
  `perkiraan_kembali` date NOT NULL,
  `status_kirim` enum('B','K') NOT NULL,
  PRIMARY KEY (`id_kegiatan`),
  KEY `FK_kegiatan_mobil` (`id_mobil`),
  KEY `FK_kegiatan_pelanggan` (`id_pelanggan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `kegiatan`
--

INSERT INTO `kegiatan` (`id_kegiatan`, `id_pelanggan`, `id_mobil`, `keluhan`, `kegiatan`, `tanggal_masuk`, `perkiraan_kembali`, `status_kirim`) VALUES
(2, 1, 1, 'Sering Mati', 'Memperbaiki Busi', '2016-01-25', '2016-04-25', 'B'),
(3, 1, 1, 'Ganti Oli', 'Ganti Oli', '2016-03-21', '2016-03-21', 'B'),
(4, 1, 1, 'Ganti Oli', 'Ganti Oli', '2016-03-21', '2016-03-22', 'B');

-- --------------------------------------------------------

--
-- Struktur dari tabel `macam_kegiatan`
--

CREATE TABLE IF NOT EXISTS `macam_kegiatan` (
  `id_macam` int(2) NOT NULL AUTO_INCREMENT,
  `nama_keluhan` varchar(30) NOT NULL,
  `detail_pesan` varchar(150) NOT NULL,
  PRIMARY KEY (`id_macam`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `macam_kegiatan`
--

INSERT INTO `macam_kegiatan` (`id_macam`, `nama_keluhan`, `detail_pesan`) VALUES
(1, 'Ganti Oli', 'Pelanggan Yth, waktu perawatan mobil anda sdh jatuh tempo, mohon segera kembali lg ke bengkel.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mobil`
--

CREATE TABLE IF NOT EXISTS `mobil` (
  `id_mobil` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `id_pelanggan` int(5) unsigned NOT NULL,
  `jenis_mobil` varchar(30) NOT NULL,
  `plat_nomor` varchar(15) NOT NULL,
  PRIMARY KEY (`id_mobil`),
  KEY `FK_mobil_pelanggan` (`id_pelanggan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `mobil`
--

INSERT INTO `mobil` (`id_mobil`, `id_pelanggan`, `jenis_mobil`, `plat_nomor`) VALUES
(1, 1, 'Mitshubishi', 'H2234EJ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifikasi`
--

CREATE TABLE IF NOT EXISTS `notifikasi` (
  `id_notifikasi` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `id_pelanggan` int(5) unsigned NOT NULL,
  `isi_notifikasi` varchar(140) NOT NULL,
  `jenis_notifikasi` enum('K','U') NOT NULL,
  PRIMARY KEY (`id_notifikasi`),
  KEY `FK_notifikasi_pelanggan` (`id_pelanggan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `notifikasi`
--

INSERT INTO `notifikasi` (`id_notifikasi`, `id_pelanggan`, `isi_notifikasi`, `jenis_notifikasi`) VALUES
(2, 6, 'Selamat Ulang Tahun', 'U');

-- --------------------------------------------------------

--
-- Struktur dari tabel `outbox`
--

CREATE TABLE IF NOT EXISTS `outbox` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `SendingDateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `SendBefore` time NOT NULL DEFAULT '23:59:59',
  `SendAfter` time NOT NULL DEFAULT '00:00:00',
  `Text` text,
  `DestinationNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text,
  `Class` int(11) DEFAULT '-1',
  `TextDecoded` text NOT NULL,
  `ID` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `MultiPart` enum('false','true') DEFAULT 'false',
  `RelativeValidity` int(11) DEFAULT '-1',
  `SenderID` varchar(255) DEFAULT NULL,
  `SendingTimeOut` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `DeliveryReport` enum('default','yes','no') DEFAULT 'default',
  `CreatorID` text NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `outbox_date` (`SendingDateTime`,`SendingTimeOut`),
  KEY `outbox_sender` (`SenderID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Trigger `outbox`
--
DROP TRIGGER IF EXISTS `outbox_timestamp`;
DELIMITER //
CREATE TRIGGER `outbox_timestamp` BEFORE INSERT ON `outbox`
 FOR EACH ROW BEGIN
    IF NEW.InsertIntoDB = '0000-00-00 00:00:00' THEN
        SET NEW.InsertIntoDB = CURRENT_TIMESTAMP();
    END IF;
    IF NEW.SendingDateTime = '0000-00-00 00:00:00' THEN
        SET NEW.SendingDateTime = CURRENT_TIMESTAMP();
    END IF;
    IF NEW.SendingTimeOut = '0000-00-00 00:00:00' THEN
        SET NEW.SendingTimeOut = CURRENT_TIMESTAMP();
    END IF;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `outbox_multipart`
--

CREATE TABLE IF NOT EXISTS `outbox_multipart` (
  `Text` text,
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text,
  `Class` int(11) DEFAULT '-1',
  `TextDecoded` text,
  `ID` int(10) unsigned NOT NULL DEFAULT '0',
  `SequencePosition` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`ID`,`SequencePosition`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pbk`
--

CREATE TABLE IF NOT EXISTS `pbk` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `GroupID` int(11) NOT NULL DEFAULT '-1',
  `Name` text NOT NULL,
  `Number` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pbk_groups`
--

CREATE TABLE IF NOT EXISTS `pbk_groups` (
  `Name` text NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
  `id_pelanggan` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_telepon` varchar(12) NOT NULL,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `alamat`, `tanggal_lahir`, `no_telepon`) VALUES
(1, 'Suparjo 123', 'Demak Bintoro', '2016-01-24', '08985716073'),
(3, 'Abdullah S', 'Banjarejo', '2016-01-26', '08985716073'),
(4, 'Imam Fairuza', 'Demak Bintoro', '2016-01-26', '08985716073'),
(5, 'Anas Nabila', 'Demak Bintoro', '2016-01-26', '08985716073'),
(6, 'Ahmad Roisul Musthofa', 'Guntur', '2016-01-26', '08985716073'),
(7, 'Istari Widodo', 'Demak', '1993-03-21', '085865665333');

-- --------------------------------------------------------

--
-- Struktur dari tabel `phones`
--

CREATE TABLE IF NOT EXISTS `phones` (
  `ID` text NOT NULL,
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `TimeOut` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Send` enum('yes','no') NOT NULL DEFAULT 'no',
  `Receive` enum('yes','no') NOT NULL DEFAULT 'no',
  `IMEI` varchar(35) NOT NULL,
  `Client` text NOT NULL,
  `Battery` int(11) NOT NULL DEFAULT '-1',
  `Signal` int(11) NOT NULL DEFAULT '-1',
  `Sent` int(11) NOT NULL DEFAULT '0',
  `Received` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`IMEI`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `phones`
--

INSERT INTO `phones` (`ID`, `UpdatedInDB`, `InsertIntoDB`, `TimeOut`, `Send`, `Receive`, `IMEI`, `Client`, `Battery`, `Signal`, `Sent`, `Received`) VALUES
('', '2016-01-26 15:08:31', '2016-01-26 13:35:16', '2016-01-26 15:08:41', 'yes', 'yes', '357133034947299', 'Gammu 1.33.0, Windows Server 2007, GCC 4.7, MinGW 3.11', 0, 78, 5, 0),
('', '2016-03-21 13:22:37', '2016-03-21 13:20:34', '2016-03-21 13:22:47', 'yes', 'yes', '354661034090358', 'Gammu 1.33.0, Windows Server 2007, GCC 4.7, MinGW 3.11', 100, 39, 2, 0);

--
-- Trigger `phones`
--
DROP TRIGGER IF EXISTS `phones_timestamp`;
DELIMITER //
CREATE TRIGGER `phones_timestamp` BEFORE INSERT ON `phones`
 FOR EACH ROW BEGIN
    IF NEW.InsertIntoDB = '0000-00-00 00:00:00' THEN
        SET NEW.InsertIntoDB = CURRENT_TIMESTAMP();
    END IF;
    IF NEW.TimeOut = '0000-00-00 00:00:00' THEN
        SET NEW.TimeOut = CURRENT_TIMESTAMP();
    END IF;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sentitems`
--

CREATE TABLE IF NOT EXISTS `sentitems` (
  `UpdatedInDB` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `InsertIntoDB` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `SendingDateTime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `DeliveryDateTime` timestamp NULL DEFAULT NULL,
  `Text` text NOT NULL,
  `DestinationNumber` varchar(20) NOT NULL DEFAULT '',
  `Coding` enum('Default_No_Compression','Unicode_No_Compression','8bit','Default_Compression','Unicode_Compression') NOT NULL DEFAULT 'Default_No_Compression',
  `UDH` text NOT NULL,
  `SMSCNumber` varchar(20) NOT NULL DEFAULT '',
  `Class` int(11) NOT NULL DEFAULT '-1',
  `TextDecoded` text NOT NULL,
  `ID` int(10) unsigned NOT NULL DEFAULT '0',
  `SenderID` varchar(255) NOT NULL,
  `SequencePosition` int(11) NOT NULL DEFAULT '1',
  `Status` enum('SendingOK','SendingOKNoReport','SendingError','DeliveryOK','DeliveryFailed','DeliveryPending','DeliveryUnknown','Error') NOT NULL DEFAULT 'SendingOK',
  `StatusError` int(11) NOT NULL DEFAULT '-1',
  `TPMR` int(11) NOT NULL DEFAULT '-1',
  `RelativeValidity` int(11) NOT NULL DEFAULT '-1',
  `CreatorID` text NOT NULL,
  PRIMARY KEY (`ID`,`SequencePosition`),
  KEY `sentitems_date` (`DeliveryDateTime`),
  KEY `sentitems_tpmr` (`TPMR`),
  KEY `sentitems_dest` (`DestinationNumber`),
  KEY `sentitems_sender` (`SenderID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `sentitems`
--

INSERT INTO `sentitems` (`UpdatedInDB`, `InsertIntoDB`, `SendingDateTime`, `DeliveryDateTime`, `Text`, `DestinationNumber`, `Coding`, `UDH`, `SMSCNumber`, `Class`, `TextDecoded`, `ID`, `SenderID`, `SequencePosition`, `Status`, `StatusError`, `TPMR`, `RelativeValidity`, `CreatorID`) VALUES
('2016-01-26 13:36:20', '2016-01-26 13:36:20', '2016-01-26 13:36:20', NULL, '0074006500730074', '08985716073', 'Default_No_Compression', '', '+62816124', -1, 'test', 1, '', 1, 'SendingOKNoReport', -1, 5, 255, 'Gammu 1.33.0'),
('2016-01-26 13:38:25', '2016-01-26 13:38:25', '2016-01-26 13:38:25', NULL, '00480069002C00200052004F00690073002E0020006D0061006C0061006D00200069006E0069002000640069006E00670069006E0020006C0068006F002E002E002E00200020002F006E002000420079003A00200059006F0075007200200042006F0074', '08985716073', 'Default_No_Compression', '', '+62816124', -1, 'Hi, ROis. malam ini dingin lho...  /n By: Your Bot', 2, '', 1, 'SendingOKNoReport', -1, 6, 255, 'Gammu 1.33.0'),
('2016-01-26 14:12:30', '2016-01-26 14:12:30', '2016-01-26 14:12:30', NULL, '00530065006C0061006D0061007400200044006100740061006E0067002000410068006D0061006400200052006F006900730075006C0020004D0075007300740068006F00660061002000640069002000420065006E0067006B0065006C002000540065006D0062006900720069006E00670020004100750074006F002000440065006D0061006B', '08985716073', 'Default_No_Compression', '', '+62816124', -1, 'Selamat Datang Ahmad Roisul Musthofa di Bengkel Tembiring Auto Demak', 3, '', 1, 'SendingOKNoReport', -1, 7, 255, 'Gammu'),
('2016-01-26 15:02:37', '2016-01-26 15:02:37', '2016-01-26 15:02:37', NULL, '00530065006C0061006D0061007400200055006C0061006E006700200054006100680075006E', '08985716073', 'Default_No_Compression', '', '+62816124', -1, 'Selamat Ulang Tahun', 5, '', 1, 'SendingOKNoReport', -1, 9, 255, 'Gammu'),
('2016-03-21 13:21:02', '2016-03-21 13:21:02', '2016-03-21 13:21:02', NULL, '00500065006C0061006E006700670061006E0020005900740068002C002000770061006B00740075002000700065007200610077006100740061006E0020006D006F00620069006C00200061006E0064006100200073006400680020006A0061007400750068002000740065006D0070006F002C0020006D006F0068006F006E00200073006500670065007200610020006B0065006D00620061006C00690020006C00670020006B0065002000620065006E0067006B0065006C002E', '08985716073', 'Default_No_Compression', '', '+62816124', -1, 'Pelanggan Yth, waktu perawatan mobil anda sdh jatuh tempo, mohon segera kembali lg ke bengkel.', 8, '', 1, 'SendingOKNoReport', -1, 6, 255, 'Gammu'),
('2016-03-21 13:21:05', '2016-03-21 13:21:05', '2016-03-21 13:21:05', NULL, '00530065006C0061006D00610074', '08985716073', 'Default_No_Compression', '', '+62816124', -1, 'Selamat', 9, '', 1, 'SendingOKNoReport', -1, 7, 255, 'Gammu');

--
-- Trigger `sentitems`
--
DROP TRIGGER IF EXISTS `sentitems_timestamp`;
DELIMITER //
CREATE TRIGGER `sentitems_timestamp` BEFORE INSERT ON `sentitems`
 FOR EACH ROW BEGIN
    IF NEW.InsertIntoDB = '0000-00-00 00:00:00' THEN
        SET NEW.InsertIntoDB = CURRENT_TIMESTAMP();
    END IF;
    IF NEW.SendingDateTime = '0000-00-00 00:00:00' THEN
        SET NEW.SendingDateTime = CURRENT_TIMESTAMP();
    END IF;
END
//
DELIMITER ;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD CONSTRAINT `FK_kegiatan_mobil` FOREIGN KEY (`id_mobil`) REFERENCES `mobil` (`id_mobil`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_kegiatan_pelanggan` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `mobil`
--
ALTER TABLE `mobil`
  ADD CONSTRAINT `FK_mobil_pelanggan` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD CONSTRAINT `FK_notifikasi_pelanggan` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
