-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2021 at 10:27 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbkaryawan`
--

CREATE TABLE `tbkaryawan` (
  `id` int(11) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `dept` varchar(50) NOT NULL,
  `qr_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbuser`
--

CREATE TABLE `tbuser` (
  `user_id` int(5) NOT NULL,
  `user_nama` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `user_pass` varchar(100) NOT NULL,
  `level` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbuser`
--

INSERT INTO `tbuser` (`user_id`, `user_nama`, `username`, `user_pass`, `level`) VALUES
(2, 'Admin HRD', 'admin_hrd', '$2a$08$WVvmPpx8he75DF2k3V1xPOaJJnkEOqPzLtNAxI4PmbgNDNCqU/Oq2', '1'),
(3, 'Ali', 'ali', '$2a$08$8vVOlH0b6PCtik9BqWmQeOxeJ.yDhc9/I1ktclk1x.hTx0CEuVMlW', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tb_karyawan`
--

CREATE TABLE `tb_karyawan` (
  `id` int(11) NOT NULL,
  `no` int(100) NOT NULL,
  `nik` varchar(100) NOT NULL,
  `nama_pegawai` varchar(128) NOT NULL,
  `departemen` varchar(128) NOT NULL,
  `qr_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_karyawan`
--

INSERT INTO `tb_karyawan` (`id`, `no`, `nik`, `nama_pegawai`, `departemen`, `qr_code`) VALUES
(1, 5, 'MSAL1701125', 'Abdul Rohman', 'Accounting', ''),
(2, 51, 'MSAL1105020', 'Adi Winoto', 'Accounting\r\n', ''),
(3, 3, 'MSAL1411073', 'Anantha Setya Pradhana', 'Accounting', ''),
(4, 2, 'MSAL1406063', 'Josias Hartono', 'Accounting', ''),
(5, 56, 'MSAL1406064', 'Lidia Susanti Silitonga', 'Accounting', ''),
(6, 4, 'MSAL1505090', 'Muhammad Arifin', 'Accounting', ''),
(7, 52, 'MSAL1807183', 'Nelvira Githa Putri', 'Accounting', ''),
(8, 1, 'MSAL1210036', 'Rian Andriana', 'Accounting', ''),
(9, 6, 'MSAL1802154', 'Sunariyadi', 'Accounting', ''),
(10, 7, 'MSAL1703129', 'Faradila Nur Agustina', 'Agronomi', ''),
(11, 8, 'MSAL0700000', 'Andre Yennatha', 'BOD', ''),
(12, 9, 'MSAL0701007', 'Kevin Wusman', 'BOD', ''),
(13, 10, 'MSAL1405005', 'Timotius Aucky Wusman', 'BOD', ''),
(14, 11, 'MSAL1511105', 'Bagus Mulyohananto Widodo', 'BQC', ''),
(15, 12, 'MSAL0812008', 'Muhammad Jalal', 'BQC', ''),
(16, 13, 'MSAL1506094', 'Permana Zainal', 'BQC', ''),
(17, 14, 'MSAL1701126', 'Teguh Triono', 'BQC', ''),
(18, 15, 'MSAL0802004', 'Roby Trisna', 'Commercial', ''),
(19, 19, 'MSAL1511107', 'Puji Waluyo', 'Engineering', ''),
(20, 16, 'MSAL1207034', 'Syawaluddin', 'Engineering', ''),
(21, 18, 'MSAL1510104', 'Vindi Ardianto', 'Engineering', ''),
(22, 17, 'MSAL1312051', 'Yudi Syahputra', 'Engineering', ''),
(23, 57, 'MSAL2002214', 'Agil Prasetya', 'Finance', ''),
(24, 54, 'MSAL1903203', 'Elmanda Dentira Zahra', 'Finance', ''),
(25, 25, 'MSAL1410072', 'Ferry Apriyanto', 'Finance', ''),
(26, 23, 'MSAL1109022', 'Lia Rahmawati', 'Finance', ''),
(27, 22, 'MSAL1708144', 'Lidya Krisna Andani', 'Finance', ''),
(28, 55, 'MSAL1401053', 'Paskah Pricillia T.', 'Finance', ''),
(29, 20, 'MSAL1304041', 'Robert', 'Finance', ''),
(30, 21, 'MSAL1401055', 'Teguh Wibawa Suhendra', 'Finance', ''),
(33, 24, 'MSAL1207035', 'Jimmy Hermanto', 'Finance & Accounting', ''),
(34, 26, 'MSAL1004017', 'Siswanta', 'HRD & Umum', ''),
(35, 32, 'MSAL1904208', 'Bagus Nugraha Oky W.', 'HRGA', ''),
(36, 45, 'MSAL1704131', 'Derit Anova', 'HRGA', ''),
(37, 31, 'MSAL1505091', 'Hasbi Abdillah', 'HRGA', ''),
(38, 27, 'MSAL1201027', 'Heru Agus Susilo', 'HRGA', ''),
(39, 64, 'MSAL2103241', 'Nabila Anindita Humaira', 'HRGA', ''),
(40, 29, 'MSAL0705003', 'Sariyanto', 'HRGA', ''),
(41, 28, 'MSAL1502087', 'Siti Marijanka Putri Andini', 'HRGA', ''),
(42, 61, 'PEAK1805022', 'Tatang Suprayogi', 'HRGA', ''),
(43, 30, 'MSAL1702127', 'Yoga Sapta', 'HRGA', ''),
(44, 35, 'MSAL1601110', 'David Mardiansyah Wijaya', 'Internal Audit', ''),
(45, 34, 'MSAL1511108', 'Henry Delianto Girsang', 'Internal Audit', ''),
(46, 37, 'MSAL1903204', 'Kiagus Moh. Arbakah', 'Internal Audit', ''),
(47, 33, 'MSAL1509102', 'M. Ikbal Subekti', 'Internal Audit', ''),
(48, 62, 'MSAL2101235', 'Muhamad Subhan Zakaria', 'Internal Audit', ''),
(49, 36, 'MSAL1801153', 'Windy Ariewibowo', 'Internal Audit', ''),
(50, 39, 'MSAL1406066', 'Adi Teguh Prabowo', 'Legal', ''),
(51, 42, 'MSAL1802155', 'Apolos Anthonius', 'Legal', ''),
(52, 40, 'MSAL1501081', 'Debora Lamour Nainggolan', 'Legal', ''),
(53, 41, 'MSAL1606112', 'Dwi Dharmawan', 'Legal', ''),
(54, 38, 'MSAL0906010', 'Putu Sunitya Candra Dewi', 'Legal', ''),
(55, 58, 'MSAL2002215', 'Firmansyah', 'MIS', ''),
(56, 60, 'PEAK1712018', 'Iman Sutejo', 'MIS', ''),
(57, 59, 'MSAL1902239', 'Merry', 'MIS', ''),
(58, 43, 'MSAL1504089', 'Tedy Paronto', 'MIS', ''),
(59, 44, 'MSAL1606113', 'I Gede Arya Bagus Wiwaha', 'Operasional', ''),
(60, 49, 'MSAL1705136', 'Aqmarina Tasya Runidha', 'Purchasing', ''),
(61, 48, 'MSAL1307045', 'Ferdinandus B. Prawoto', 'Purchasing', ''),
(62, 47, 'MSAL0809006', 'Irvan Wijaya', 'Purchasing', ''),
(63, 46, 'MSAL0703002', 'Reymond Yulianto', 'Purchasing', ''),
(64, 50, 'MSAL1608114', 'Ribut Budiyono', 'R & D', ''),
(65, 63, 'MSAL2101236', 'Iswahyudi', 'Teknik', ''),
(66, 53, 'MSAL0904009', 'Sri Wilopo', 'Teknik', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbkaryawan`
--
ALTER TABLE `tbkaryawan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbkaryawan`
--
ALTER TABLE `tbkaryawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbuser`
--
ALTER TABLE `tbuser`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_karyawan`
--
ALTER TABLE `tb_karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
