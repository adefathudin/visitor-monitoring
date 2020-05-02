-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 02, 2020 at 12:13 PM
-- Server version: 10.1.44-MariaDB-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adefathudin_alvin`
--

-- --------------------------------------------------------

--
-- Table structure for table `visitor_detail`
--

CREATE TABLE `visitor_detail` (
  `id` int(12) NOT NULL,
  `id_card` varchar(16) DEFAULT NULL,
  `nik` varchar(15) DEFAULT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `status_profesi` varchar(50) DEFAULT NULL,
  `nama_perusahaan` varchar(50) DEFAULT NULL,
  `nomor_telepon` varchar(12) DEFAULT NULL,
  `blokir` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitor_detail`
--

INSERT INTO `visitor_detail` (`id`, `id_card`, `nik`, `nama_lengkap`, `status_profesi`, `nama_perusahaan`, `nomor_telepon`, `blokir`) VALUES
(22, '1001058426', '01779320', 'VENNY FEBRIANI', 'Kontraktor', 'telkom', '085313757299', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `visitor_detail`
--
ALTER TABLE `visitor_detail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `visitor_detail`
--
ALTER TABLE `visitor_detail`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
