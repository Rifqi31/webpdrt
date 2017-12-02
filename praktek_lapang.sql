-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2017 at 04:15 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

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

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('admin_permo','admin_kendali','admin_read_data') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `buku_kendali_pdrt` (
  `id` int(11) NOT NULL,
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
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku_kendali_pdrt`
--

INSERT INTO `buku_kendali_pdrt` (`id`, `nama_pemohon`, `kecamatan`, `desa_kel`, `jenis_kegiatan`, `no_register`, `keterangan_register`, `peninjauan_lapangan`, `keterangan_lapangan`, `perhitungan`, `keterangan_perhitungan`, `draft_ketik`, `keterangan_ketik_pdrt`, `draft_periksa`, `keterangan_periksa_pdrt`, `denda_ketik`, `keterangan_ketik_denda`, `denda_periksa`, `keterangan_periksa_denda`, `paraf_kasie`, `paraf_kabid`, `keterangan_kabid_kasie`, `paraf_sekre`, `paraf_dinas`, `no_pdrt`, `tanggal`) VALUES
(5, 'Maman Suparman', 'Babakan Madang', 'Babakan Madang', 'Hotel', '654.5/KPP/2017', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-01'),
(6, 'Andrian Harid', 'Bojonggede', 'Bojong Baru', 'Ruko', '654.5/KPP/2017', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-01'),
(7, 'Maman Suparman', 'Caringin', 'Ciherang Pondok', 'Masjid', '654.5/KPP/2017', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2017-12-02');

-- --------------------------------------------------------

--
-- Table structure for table `permo_pdrt`
--

CREATE TABLE `permo_pdrt` (
  `id` int(11) NOT NULL,
  `nama_pemohon` varchar(50) NOT NULL,
  `kecamatan` varchar(30) NOT NULL,
  `desa_kel` varchar(30) NOT NULL,
  `fungsi_bangunan` varchar(30) NOT NULL,
  `jenis_kegiatan` varchar(30) NOT NULL,
  `luas_tanah` decimal(10,3) NOT NULL,
  `no_register` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `ilok_ppt` varchar(50) DEFAULT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permo_pdrt`
--

INSERT INTO `permo_pdrt` (`id`, `nama_pemohon`, `kecamatan`, `desa_kel`, `fungsi_bangunan`, `jenis_kegiatan`, `luas_tanah`, `no_register`, `tanggal`, `ilok_ppt`, `keterangan`) VALUES
(5, 'Maman Suparman', 'Babakan Madang', 'Babakan Madang', 'Hunian', 'Hotel', '1112.000', '654.5/KPP/2017', '2017-12-01', '', ''),
(6, 'Andrian Harid', 'Bojonggede', 'Bojong Baru', 'Campuran', 'Ruko', '1112.000', '654.5/KPP/2017', '2017-12-01', '', ''),
(7, 'Maman Suparman', 'Caringin', 'Ciherang Pondok', 'Keagmaan', 'Masjid', '1112.000', '654.5/KPP/2017', '2017-12-02', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buku_kendali_pdrt`
--
ALTER TABLE `buku_kendali_pdrt`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `permo_pdrt`
--
ALTER TABLE `permo_pdrt`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `buku_kendali_pdrt`
--
ALTER TABLE `buku_kendali_pdrt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `permo_pdrt`
--
ALTER TABLE `permo_pdrt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku_kendali_pdrt`
--
ALTER TABLE `buku_kendali_pdrt`
  ADD CONSTRAINT `buku_kendali_pdrt_ibfk_1` FOREIGN KEY (`id`) REFERENCES `permo_pdrt` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
