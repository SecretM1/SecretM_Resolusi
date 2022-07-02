-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2022 at 05:25 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_2122e_si4k_2022500005`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dosen`
--

CREATE TABLE `tbl_dosen` (
  `nim` char(10) NOT NULL,
  `nama` varchar(80) NOT NULL,
  `kehadiran` char(100) NOT NULL,
  `agama` enum('1','2','3','4','5','6') NOT NULL,
  `tugas` varchar(10) NOT NULL,
  `uts` varchar(10) NOT NULL,
  `uas` varchar(10) NOT NULL,
  `nilaiakhir` varchar(100) NOT NULL,
  `grade` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_dosen`
--

INSERT INTO `tbl_dosen` (`nim`, `nama`, `kehadiran`, `agama`, `tugas`, `uts`, `uas`, `nilaiakhir`, `grade`) VALUES
('0211062204', 'Muhamad Ramadhan S.KOM', '100', '', '100', '100', '100', '100', 'A'),
('0215062206', 'Yuliansyah', '70', '', '80', '90', '76', '80.4', 'B'),
('0215062207', 'Reni Aprilia', '60', '', '50', '70', '80', '69', 'C'),
('0220062201', 'Yusuf Darmana S.KOM', '60', '', '90', '80', '100', '88', 'A'),
('0220062203', 'Rini Ariska S.KOM.', '90', '', '70', '65', '100', '82.5', 'A'),
('0227062202', 'Yunub', '80', '', '71', '60', '30', '52.2', 'D');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  ADD PRIMARY KEY (`nim`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
