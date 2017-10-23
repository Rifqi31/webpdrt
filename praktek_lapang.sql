-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 23, 2017 at 11:50 AM
-- Server version: 5.7.18
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `praktek_lapang`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('admin_permo','admin_kendali','admin_read_data') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `level`) VALUES
(1, 'admin_permo', '21232f297a57a5a743894a0e4a801fc3', 'admin_permo'),
(2, 'admin_kendali', '21232f297a57a5a743894a0e4a801fc3', 'admin_kendali'),
(3, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin_read_data');

-- --------------------------------------------------------

--
-- Table structure for table `buku_kendali_pdrt`
--

DROP TABLE IF EXISTS `buku_kendali_pdrt`;
CREATE TABLE IF NOT EXISTS `buku_kendali_pdrt` (
  `id_kendali` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pemohon` varchar(50) NOT NULL,
  `kecamatan` varchar(30) NOT NULL,
  `desa_kel` varchar(30) NOT NULL,
  `jenis_kegiatan` varchar(30) NOT NULL,
  `no_register` varchar(30) NOT NULL,
  `keterangan_register` text,
  `peninjauan_lapangan` varchar(100) DEFAULT NULL,
  `keterangan_lapangan` text,
  `perhitungan` varchar(100) DEFAULT NULL,
  `keterangan_perhitungan` text,
  `draft_ketik` varchar(100) DEFAULT NULL,
  `keterangan_ketik_pdrt` text,
  `draft_periksa` varchar(100) DEFAULT NULL,
  `keterangan_periksa_pdrt` text,
  `denda_ketik` varchar(100) DEFAULT NULL,
  `keterangan_ketik_denda` text,
  `denda_periksa` varchar(100) DEFAULT NULL,
  `keterangan_periksa_denda` text,
  `paraf_kasie` varchar(100) DEFAULT NULL,
  `paraf_kabid` varchar(100) DEFAULT NULL,
  `keterangan_kabid_kasie` text,
  `paraf_sekre` varchar(100) DEFAULT NULL,
  `paraf_dinas` varchar(100) DEFAULT NULL,
  `no_pdrt` varchar(25) DEFAULT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_kendali`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `permo_pdrt`
--

DROP TABLE IF EXISTS `permo_pdrt`;
CREATE TABLE IF NOT EXISTS `permo_pdrt` (
  `id_permo` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pemohon` varchar(50) NOT NULL,
  `kecamatan` varchar(30) NOT NULL,
  `desa_kel` varchar(30) NOT NULL,
  `fungsi_bangunan` varchar(30) NOT NULL,
  `jenis_kegiatan` varchar(30) NOT NULL,
  `luas_tanah` decimal(10,3) NOT NULL,
  `no_register` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `ilok_ppt` varchar(50) DEFAULT NULL,
  `keterangan` text,
  PRIMARY KEY (`id_permo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permo_pdrt`
--

INSERT INTO `permo_pdrt` (`id_permo`, `nama_pemohon`, `kecamatan`, `desa_kel`, `fungsi_bangunan`, `jenis_kegiatan`, `luas_tanah`, `no_register`, `tanggal`, `ilok_ppt`, `keterangan`) VALUES
(4, 'Alfonso Taluhula', 'Gunung Putri', 'Cikeas Udik', 'Campuran', 'Data Center Polri', '530.000', '640.6/50/KP/2017', '2017-10-23', '', '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku_kendali_pdrt`
--
ALTER TABLE `buku_kendali_pdrt`
  ADD CONSTRAINT `buku_kendali_pdrt_ibfk_1` FOREIGN KEY (`id_kendali`) REFERENCES `permo_pdrt` (`id_permo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
