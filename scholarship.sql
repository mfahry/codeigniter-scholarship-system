-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 06, 2016 at 04:20 
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `scholarship`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`username`, `password`, `nama`) VALUES
('mfahry', 'e807f1fcf82d132f9bb018ca6738a19f', 'Muhammad Fahry');

-- --------------------------------------------------------

--
-- Table structure for table `ambil`
--

CREATE TABLE IF NOT EXISTS `ambil` (
  `kode_ambil` int(10) NOT NULL AUTO_INCREMENT,
  `nis` int(10) NOT NULL,
  `kode_beasiswa` int(10) NOT NULL,
  `status` int(20) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  PRIMARY KEY (`kode_ambil`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `ambil`
--

INSERT INTO `ambil` (`kode_ambil`, `nis`, `kode_beasiswa`, `status`, `keterangan`) VALUES
(1, 30110078, 21, 0, '-'),
(2, 12345, 21, 0, '-'),
(3, 30110194, 21, 0, '-'),
(4, 30110123, 21, 0, '-'),
(5, 30110129, 21, 0, '-'),
(6, 654321, 21, 0, '-'),
(7, 3011987, 21, 0, '-'),
(10, 3011078, 21, 0, '-'),
(13, 3011078, 22, 0, '-'),
(14, 30987654, 21, 0, '-'),
(15, 30110176, 21, 0, '-'),
(16, 30110954, 21, 0, '-'),
(17, 30113426, 21, 0, '-'),
(19, 980000, 21, 0, '-'),
(20, 111406286, 21, 0, '-'),
(21, 111739513, 21, 0, '-'),
(24, 111963951, 21, 0, '-'),
(25, 111606284, 21, 0, '-'),
(26, 111795173, 21, 0, '-'),
(27, 111517395, 21, 0, '-'),
(28, 111628404, 21, 0, '-'),
(29, 111339517, 21, 0, '-'),
(33, 111210177, 21, 0, '-'),
(34, 111082840, 21, 0, '-'),
(35, 111280692, 21, 0, '-'),
(36, 111963951, 11, 0, '-'),
(37, 111082840, 11, 0, '-'),
(38, 111210177, 11, 0, '-'),
(39, 111339517, 11, 0, '-'),
(40, 111606284, 11, 0, '-'),
(41, 111428406, 11, 0, '-'),
(42, 111517399, 11, 0, '-'),
(43, 111874062, 11, 0, '-'),
(44, 111517395, 11, 0, '-'),
(45, 111851731, 11, 0, '-'),
(46, 111517399, 12, 0, '-');

-- --------------------------------------------------------

--
-- Table structure for table `beasiswa`
--

CREATE TABLE IF NOT EXISTS `beasiswa` (
  `kode_beasiswa` int(10) NOT NULL AUTO_INCREMENT,
  `nama_beasiswa` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `terima` int(11) NOT NULL,
  `standar` float NOT NULL,
  PRIMARY KEY (`kode_beasiswa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `beasiswa`
--

INSERT INTO `beasiswa` (`kode_beasiswa`, `nama_beasiswa`, `keterangan`, `terima`, `standar`) VALUES
(11, 'Beasiswa Berprestasi', 'Beasiswa Yang diberikan kepada siswa dengan prestasi akademik yang tinggi', 5, 0.8);

-- --------------------------------------------------------

--
-- Table structure for table `bobot`
--

CREATE TABLE IF NOT EXISTS `bobot` (
  `kode_bobot` int(10) NOT NULL AUTO_INCREMENT,
  `kode_beasiswa` int(10) NOT NULL,
  `kode_kriteria` int(10) NOT NULL,
  `persentase` int(10) NOT NULL,
  PRIMARY KEY (`kode_bobot`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `bobot`
--

INSERT INTO `bobot` (`kode_bobot`, `kode_beasiswa`, `kode_kriteria`, `persentase`) VALUES
(23, 11, 12, 40),
(24, 11, 13, 10),
(25, 11, 15, 30),
(26, 11, 16, 10),
(27, 11, 14, 10),
(28, 12, 16, 0);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE IF NOT EXISTS `kriteria` (
  `kode_kriteria` int(10) NOT NULL DEFAULT '0',
  `nama_kriteria` varchar(100) DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `maksimal` int(10) DEFAULT NULL,
  `perbandingan` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`kode_kriteria`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`kode_kriteria`, `nama_kriteria`, `keterangan`, `maksimal`, `perbandingan`) VALUES
(12, 'rataraport', 'Rata-rata nilai rapor', 100, 'Linear'),
(13, 'penghasilan', 'Jumlah Penghasilan Orang Tua Tiap Bulan', 1000000, 'Terbalik'),
(14, 'tanggungan', 'Jumlah Tanggungan Anggota Keluarga yang Ditanggung Orang Tua', 5, 'Linear'),
(15, 'prestasi', 'Prestasi akademik yang diraih oleh siswa', 5, 'Linear'),
(16, 'aktif', 'Prestasi non akademik yang diraih oleh siswa', 5, 'Linear');

-- --------------------------------------------------------

--
-- Table structure for table `lampiran`
--

CREATE TABLE IF NOT EXISTS `lampiran` (
  `Nis` int(11) NOT NULL,
  `url_akademik` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ranking`
--

CREATE TABLE IF NOT EXISTS `ranking` (
  `nis` varchar(20) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ranking`
--

INSERT INTO `ranking` (`nis`, `nilai`) VALUES
('111082840', 0.614),
('111210177', 0.711),
('111339517', 0.436),
('111428406', 0.452),
('111517395', 0.671),
('111517399', 0.518),
('111606284', 0.687),
('111851731', 0.704),
('111874062', 0.492),
('111963951', 0.456);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
  `nis` int(10) NOT NULL AUTO_INCREMENT,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `rataraport` float NOT NULL,
  `penghasilan` int(10) NOT NULL,
  `tanggungan` int(10) NOT NULL,
  `prestasi` int(10) NOT NULL,
  `aktif` int(11) NOT NULL,
  `status` int(5) NOT NULL,
  `url_foto` varchar(100) NOT NULL,
  `url_raport` varchar(100) NOT NULL,
  `url_slip` varchar(100) NOT NULL,
  `url_kk` varchar(100) NOT NULL,
  `url_ktm` varchar(100) NOT NULL,
  `url_sertifikat` varchar(100) NOT NULL,
  `url_akademik1` varchar(100) NOT NULL,
  `url_akademik2` varchar(100) NOT NULL,
  `url_aktif` varchar(100) NOT NULL,
  `url_aktif1` varchar(100) NOT NULL,
  `url_aktif2` varchar(100) NOT NULL,
  PRIMARY KEY (`nis`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1000000000 ;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`nis`, `password`, `nama`, `rataraport`, `penghasilan`, `tanggungan`, `prestasi`, `aktif`, `status`, `url_foto`, `url_raport`, `url_slip`, `url_kk`, `url_ktm`, `url_sertifikat`, `url_akademik1`, `url_akademik2`, `url_aktif`, `url_aktif1`, `url_aktif2`) VALUES
(111210177, '111210177', 'Rahmah Putri', 98, 1750000, 7, 3, 6, 25, 'images/foto/foto111210177.jpg', 'images/raport/raport111210177.jpg', 'images/slip/slip111210177.jpg', 'images/kk/kk.jpg', 'images/ktm/ktm111210177.jpg', 'images/sertifikat/sertifikat111210177.jpg', '', '', '', '', ''),
(111339517, '111339517', 'Rahmad Arief', 62, 2250000, 4, 2, 3, 0, 'images/foto/foto111339517.jpg', 'images/raport/raport111339517.jpg', 'images/slip/slip111339517.jpg', 'images/kk/kk.jpg', 'images/ktm/ktm111339517.jpg', 'images/sertifikat/sertifikat111339517.jpg', '', '', '', '', ''),
(111428406, '111428406', 'Nurul Afifah', 81, 950000, 3, 1, 2, 0, 'images/foto/foto111428406.jpg', 'images/raport/raport111428406.jpg', 'images/slip/slip111428406.jpg', 'images/kk/kk.jpg', 'images/ktm/ktm111428406.jpg', 'images/sertifikat/sertifikat111428406.jpg', '', '', '', '', ''),
(111517395, '111517395', 'Shagy Reghita', 71, 635000, 8, 6, 1, 14, 'images/foto/foto111517395.jpg', 'images/raport/raport111517395.jpg', 'images/slip/slip111517395.jpg', 'images/kk/kk.jpg', 'images/ktm/ktm111517395.jpg', 'images/sertifikat/sertifikat111517395.jpg', '', '', '', '', ''),
(111606284, '111606284', 'Fandi Ahmad', 88, 158000, 6, 2, 5, 18, 'images/foto/foto111606284.jpg', 'images/raport/raport111606284.jpg', 'images/slip/slip111606284.jpg', 'images/kk/kk.jpg', 'images/ktm/ktm111606284.jpg', 'images/sertifikat/sertifikat111606284.jpg', '', '', '', '', ''),
(111795173, '111795173', 'Fita Azyyati Erawan', 69, 3450000, 1, 0, 0, 0, 'images/foto/foto111795173.jpg', 'images/raport/raport111795173.jpg', 'images/slip/slip111795173.jpg', 'images/kk/kk.jpg', 'images/ktm/ktm111795173.jpg', 'images/sertifikat/sertifikat111795173.jpg', '', '', '', '', ''),
(111874062, '111874062', 'Belatrix Proborini Puspitaningrum', 91, 5230000, 2, 2, 1, 2, 'images/foto/foto111874062.jpg', 'images/raport/raport111874062.jpg', 'images/slip/slip111874062.jpg', 'images/kk/kk.jpg', 'images/ktm/ktm111874062.jpg', 'images/sertifikat/sertifikat111874062.jpg', '', '', '', '', ''),
(111963951, '111963951', 'Deasy Nurfitriyani', 59, 156000, 9, 0, 1, 2, 'images/foto/foto111963951.jpg', 'images/raport/raport111963951.jpg', 'images/slip/slip111963951.jpg', 'images/kk/kk.jpg', 'images/ktm/ktm111963951.jpg', 'images/sertifikat/sertifikat111963951.jpg', '', '', '', '', ''),
(111082840, '111082840', 'Adzani Tristan Aulia', 90, 850000, 1, 4, 3, 14, 'images/foto/foto111082840.jpg', 'images/raport/raport111082840.jpg', 'images/slip/slip111082840.jpg', 'images/kk/kk.jpg', 'images/ktm/ktm111082840.jpg', 'images/sertifikat/sertifikat111082840.jpg', '', '', '', '', ''),
(111851731, '111851731', 'Fathur Almain', 67, 925000, 6, 7, 3, 19, 'images/foto/foto111851731.jpg', 'images/raport/raport111851731.jpg', 'images/slip/slip111851731.jpg', 'images/kk/kk.jpg', 'images/ktm/ktm111851731.jpg', 'images/sertifikat/sertifikat111851731.jpg', '', '', '', '', ''),
(111940622, '111940622', 'Althof Muhammad', 78, 315000, 5, 6, 2, 0, 'images/foto/foto111940622.jpg', 'images/raport/raport111940622.jpg', 'images/slip/slip111940622.jpg', 'images/kk/kk.jpg', 'images/ktm/ktm111940622.jpg', 'images/sertifikat/sertifikat111940622.jpg', '', '', '', '', ''),
(111739513, '111739513', 'Alvaro Moratha', 83, 478000, 4, 5, 1, 0, 'images/foto/foto111739513.jpg', 'images/raport/raport111739513.jpg', 'images/slip/slip111739513.jpg', 'images/kk/kk.jpg', 'images/ktm/ktm111739513.jpg', 'images/sertifikat/sertifikat111739513.jpg', '', '', '', '', ''),
(111628404, '111628404', 'Sergio Ramos', 76, 950000, 5, 2, 2, 0, 'images/foto/foto111628404.jpg', 'images/raport/raport111628404.jpg', 'images/slip/slip111628404.jpg', 'images/kk/kk.jpg', 'images/ktm/ktm111628404.jpg', 'images/sertifikat/sertifikat111628404.jpg', '', '', '', '', ''),
(111517399, '111517399', 'Adele Syahla Indra', 81, 3750000, 4, 3, 1, 2, 'images/foto/foto111517399.jpg', 'images/raport/raport111517399.jpg', 'images/slip/slip111517399.jpg', 'images/kk/kk.jpg', 'images/ktm/ktm111517399.jpg', 'images/sertifikat/sertifikat111517399.jpg', '', '', '', '', ''),
(111406286, '111406286', 'Shelby Khalila', 97, 1000000, 3, 4, 0, 0, 'images/foto/foto111406286.jpg', 'images/raport/raport111406286.jpg', 'images/slip/slip111406286.jpg', 'images/kk/kk.jpg', 'images/ktm/ktm111406286.jpg', 'images/sertifikat/sertifikat111406286.jpg', '', '', '', '', ''),
(111280692, '111280692', 'Cyntami Anabel Aulia', 80, 888888, 2, 2, 1, 0, 'images/foto/foto111280692.jpg', 'images/raport/raport111280692.jpg', 'images/slip/slip111280692.jpg', 'images/kk/kk.jpg', 'images/ktm/ktm111280692.jpg', 'images/sertifikat/sertifikat111280692.jpg', '', '', '', '', ''),
(111777888, '111777888', 'Ticia Amera', 85, 1987000, 6, 6, 5, 0, '', '', '', '', '', '', '', '', '', '', ''),
(111287987, '111287987', 'Fatimah ', 78, 760000, 2, 2, 1, 0, 'images/foto/foto111287987.jpg', 'images/raport/raport111287987.jpg', 'images/slip/slip111287987.jpg', 'images/kk/kk.jpg', 'images/ktm/ktm111287987.jpg', 'images/sertifikat/sertifikat111287987.jpg', '', '', '', '', ''),
(123456789, '123456789', 'boby', 77, 789000, 1, 3, 2, 0, 'images/foto/foto123456789.jpg', 'images/raport/raport123456789.jpg', 'images/slip/slip123456789.jpg', 'images/kk/kk.jpg', 'images/ktm/ktm123456789.jpg', 'images/sertifikat/sertifikat123456789.jpg', '', '', '', '', ''),
(111987987, '111987987', 'Abdian Prestanegoro', 88, 765000, 2, 2, 3, 0, 'images/foto/foto111987987.jpg', 'images/raport/raport111987987.jpg', 'images/slip/slip111987987.jpg', 'images/kk/kk.jpg', 'images/ktm/ktm111987987.jpg', 'images/sertifikat/sertifikat111987987.jpg', '', '', '', '', ''),
(111333444, '111333444', 'Puan Salamah', 77, 875000, 2, 2, 3, 0, 'images/foto/foto111333444.jpg', 'images/raport/raport111333444.jpg', 'images/slip/slip111333444.jpg', 'images/kk/kk.jpg', 'images/ktm/ktm111333444.jpg', 'images/sertifikat/sertifikat111333444.jpg', '', '', '', '', ''),
(111234567, '111234567', 'Gani Andri Pratama', 73, 1325000, 2, 1, 3, 0, 'images/foto/foto111234567.jpg', 'images/raport/raport111234567.jpg', 'images/slip/slip111234567.jpg', 'images/kk/kk.jpg', 'images/ktm/ktm111234567.jpg', 'images/sertifikat/sertifikat111234567.jpg', '', '', '', '', ''),
(111888999, '111888999', 'Tiara Sari', 99, 768000, 1, 2, 4, 1, 'images/foto/foto111888999.jpg', 'images/raport/raport111888999.jpg', 'images/slip/slip111888999.jpg', 'images/kk/kk.jpg', 'images/ktm/ktm111888999.jpg', 'images/sertifikat/sertifikat111888999.jpg', '', '', '', '', ''),
(999999999, '999999999', 'abigunal', 88, 1190000, 1, 2, 3, 0, 'images/foto/foto999999999.jpg', 'images/raport/raport999999999.jpg', 'images/slip/slip999999999.jpg', 'images/kk/kk.jpg', 'images/ktm/ktm999999999.jpg', 'images/sertifikat/sertifikat999999999.jpg', 'images/akademik/akademik999999999.jpg', '', '', '', ''),
(444555666, '444555666', 'khailil', 33, 565000, 1, 2, 3, 0, 'images/foto/foto444555666.jpg', 'images/raport/raport444555666.jpg', 'images/slip/slip444555666.jpg', 'images/kk/kk.jpg', 'images/ktm/ktm444555666.jpg', 'images/sertifikat/sertifikat444555666.jpg', 'images/akademik/akademik444555666.jpg', 'images/akademik1/akademik444555666.jpg', 'images/aktif/aktif444555666.jpg', '', 'images/aktif2/akademik444555666.jpg'),
(888666555, '888666555', 'astri', 66, 4000000, 1, 1, 2, 0, 'images/foto/foto888666555.jpg', 'images/raport/raport888666555.jpg', 'images/slip/slip888666555.jpg', 'images/kk/kk.jpg', 'images/ktm/ktm888666555.jpg', 'images/sertifikat/sertifikat888666555.jpg', 'images/akademik/akademik888666555.jpg', 'images/akademik1/akademik888666555.jpg', 'images/aktif/aktif888666555.jpg', '', 'images/aktif2/akademik888666555.jpg'),
(8526376, '08536376', 'Jermi ', 88, 996000, 1, 2, 3, 0, 'images/foto/foto08526376.jpg', 'images/raport/raport08526376.jpg', 'images/slip/slip08526376.jpg', 'images/kk/kk.jpg', 'images/ktm/ktm08526376.jpg', 'images/sertifikat/sertifikat08526376.jpg', 'images/akademik/akademik08526376.jpg', 'images/akademik1/akademik108526376.jpg', 'images/aktif/aktif08526376.jpg', '', 'images/aktif2/aktif208526376.jpg'),
(898025, '0898025', 'Andra ', 88, 199000, 1, 2, 3, 0, 'images/foto/foto0898025.jpg', 'images/raport/raport0898025.jpg', 'images/slip/slip0898025.jpg', 'images/kk/kk.jpg', 'images/ktm/ktm0898025.jpg', 'images/sertifikat/sertifikat0898025.jpg', 'images/akademik/akademik0898025.jpg', 'images/akademik1/akademik10898025.jpg', 'images/aktif/aktif0898025.jpg', '', 'images/aktif2/aktif20898025.jpg'),
(17171717, '17171717', 'Rezi', 77, 879000, 1, 2, 3, 0, 'images/foto/17171717.jpg', 'images/raport/17171717.jpg', 'images/slip/17171717.jpg', 'images/kk/.jpg', 'images/ktm/17171717.jpg', 'images/sertifikat/17171717.jpg', 'images/akademik/17171717.jpg', 'images/akademik1/17171717.jpg', 'images/aktif/17171717.jpg', '', 'images/aktif2/17171717.jpg'),
(280692, '280692', 'Alberto', 77, 67000, 1, 2, 3, 0, 'images/foto/280692.jpg', 'images/raport/280692.jpg', 'images/slip/280692.jpg', 'images/kk/.jpg', 'images/ktm/280692.jpg', 'images/sertifikat/280692.jpg', 'images/akademik1/280692.jpg', '', 'images/aktif1/280692.jpg', '', 'images/aktif2/280692.jpg'),
(44444444, '44444444', 'Alvadino', 65, 1250000, 1, 2, 3, 0, 'images/foto/44444444.jpg', 'images/raport/44444444.jpg', 'images/slip/44444444.jpg', 'images/kk/.jpg', 'images/ktm/44444444.jpg', 'images/sertifikat/44444444.jpg', 'images/akademik1/44444444.jpg', '', 'images/aktif1/44444444.jpg', '', 'images/aktif2/44444444.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
