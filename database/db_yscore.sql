-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jun 2022 pada 19.06
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_yscore`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `user_id` int(5) NOT NULL,
  `user_nama` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `user_pass` varchar(100) NOT NULL,
  `level` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`user_id`, `user_nama`, `username`, `user_pass`, `level`) VALUES
(2, 'Admin HRD', 'admin', '$2a$08$WVvmPpx8he75DF2k3V1xPOaJJnkEOqPzLtNAxI4PmbgNDNCqU/Oq2', '1'),
(84, 'Ali', 'ali', '$2a$08$8vVOlH0b6PCtik9BqWmQeOxeJ.yDhc9/I1ktclk1x.hTx0CEuVMlW', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keys`
--

CREATE TABLE `keys` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `key` varchar(40) NOT NULL,
  `level` int(2) NOT NULL,
  `ignore_limits` tinyint(1) NOT NULL DEFAULT 0,
  `is_private_key` tinyint(1) NOT NULL DEFAULT 0,
  `ip_addresses` text DEFAULT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `date_created`) VALUES
(1, 3, 'yscore', 1, 0, 0, NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbkaryawan`
--

CREATE TABLE `tbkaryawan` (
  `id` int(11) NOT NULL,
  `nik` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `dept` varchar(50) NOT NULL,
  `qr_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbkaryawan`
--

INSERT INTO `tbkaryawan` (`id`, `nik`, `nama`, `dept`, `qr_code`) VALUES
(1, 'MSAL1701125', 'Abdul Rohman', 'Accounting', 'MSAL1701125.png'),
(2, 'MSAL1105020', 'Adi Winoto', 'Accounting', 'MSAL1105020.png'),
(3, 'MSAL1411073', 'Anantha Setya Pradhana', 'Accounting', 'MSAL1411073.png'),
(4, 'MSAL1406063', 'Josias Hartono', 'Accounting', 'MSAL1406063.png'),
(5, 'MSAL1406064', 'Lidia Susanti Silitonga', 'Accounting', 'MSAL1406064.png'),
(6, 'MSAL1505090', 'Muhammad Arifin', 'Accounting', 'MSAL1505090.png'),
(7, 'MSAL1807183', 'Nelvira Githa Putri', 'Accounting', 'MSAL1807183.png'),
(8, 'MSAL1210036', 'Rian Andriana', 'Accounting', 'MSAL1210036.png'),
(9, 'MSAL1802154', 'Sunariyadi', 'Accounting', 'MSAL1802154.png'),
(10, 'MSAL1703129', 'Faradila Nur Agustina', 'Agronomi', 'MSAL1703129.png'),
(11, 'MSAL0700000', 'Andre Yennatha', 'BOD', 'MSAL0700000.png'),
(12, 'MSAL0701007', 'Kevin Wusman', 'BOD', 'MSAL0701007.png'),
(13, 'MSAL1405005', 'Timotius Aucky Wusman', 'BOD', 'MSAL1405005.png'),
(14, 'MSAL1511105', 'Bagus Mulyohananto Widodo', 'BQC', 'MSAL1511105.png'),
(15, 'MSAL0812008', 'Muhammad Jalal', 'BQC', 'MSAL0812008.png'),
(16, 'MSAL1506094', 'Permana Zainal', 'BQC', 'MSAL1506094.png'),
(17, 'MSAL1701126', 'Teguh Triono', 'BQC', 'MSAL1701126.png'),
(18, 'MSAL0802004', 'Roby Trisna', 'Commercial', 'MSAL0802004.png'),
(19, 'MSAL1511107', 'Puji Waluyo', 'Engineering', 'MSAL1511107.png'),
(20, 'MSAL1207034', 'Syawaluddin', 'Engineering', 'MSAL1207034.png'),
(21, 'MSAL1510104', 'Vindi Ardianto', 'Engineering', 'MSAL1510104.png'),
(22, 'MSAL1312051', 'Yudi Syahputra', 'Engineering', 'MSAL1312051.png'),
(23, 'MSAL2002214', 'Agil Prasetya', 'Finance', 'MSAL2002214.png'),
(24, 'MSAL1903203', 'Elmanda Dentira Zahra', 'Finance', 'MSAL1903203.png'),
(25, 'MSAL1410072', 'Ferry Apriyanto', 'Finance', 'MSAL1410072.png'),
(26, 'MSAL1109022', 'Lia Rahmawati', 'Finance', 'MSAL1109022.png'),
(27, 'MSAL1708144', 'Lidya Krisna Andani', 'Finance', 'MSAL1708144.png'),
(28, 'MSAL1401053', 'Paskah Pricillia T.', 'Finance', 'MSAL1401053.png'),
(29, 'MSAL1304041', 'Robert', 'Finance', 'MSAL1304041.png'),
(30, 'MSAL1401055', 'Teguh Wibawa Suhendra', 'Finance', 'MSAL1401055.png'),
(31, 'MSAL1207035', 'Jimmy Hermanto', 'Finance & Accounting', 'MSAL1207035.png'),
(32, 'MSAL1004017', 'Siswanta', 'HRD & Umum', 'MSAL1004017.png'),
(33, 'MSAL1904208', 'Bagus Nugraha Oky W.', 'HRGA', 'MSAL1904208.png'),
(34, 'MSAL1704131', 'Derit Anova', 'HRGA', 'MSAL1704131.png'),
(35, 'MSAL1505091', 'Hasbi Abdillah', 'HRGA', 'MSAL1505091.png'),
(36, 'MSAL1201027', 'Heru Agus Susilo', 'HRGA', 'MSAL1201027.png'),
(37, 'MSAL2103241', 'Nabila Anindita Humaira', 'HRGA', 'MSAL2103241.png'),
(38, 'MSAL0705003', 'Sariyanto', 'HRGA', 'MSAL0705003.png'),
(39, 'MSAL1502087', 'Siti Marijanka Putri Andini', 'HRGA', 'MSAL1502087.png'),
(40, 'PEAK1805022', 'Tatang Suprayogi', 'HRGA', 'PEAK1805022.png'),
(41, 'MSAL1702127', 'Yoga Sapta', 'HRGA', 'MSAL1702127.png'),
(42, 'MSAL1601110', 'David Mardiansyah Wijaya', 'Internal Audit', 'MSAL1601110.png'),
(43, 'MSAL1511108', 'Henry Delianto Girsang', 'Internal Audit', 'MSAL1511108.png'),
(44, 'MSAL1903204', 'Kiagus Moh. Arbakah', 'Internal Audit', 'MSAL1903204.png'),
(45, 'MSAL1509102', 'M. Ikbal Subekti', 'Internal Audit', 'MSAL1509102.png'),
(46, 'MSAL2101235', 'Muhamad Subhan Zakaria', 'Internal Audit', 'MSAL2101235.png'),
(47, 'MSAL1801153', 'Windy Ariewibowo', 'Internal Audit', 'MSAL1801153.png'),
(48, 'MSAL1406066', 'Adi Teguh Prabowo', 'Legal', 'MSAL1406066.png'),
(49, 'MSAL1802155', 'Apolos Anthonius', 'Legal', 'MSAL1802155.png'),
(50, 'MSAL1501081', 'Debora Lamour Nainggolan', 'Legal', 'MSAL1501081.png'),
(51, 'MSAL1606112', 'Dwi Dharmawan', 'Legal', 'MSAL1606112.png'),
(52, 'MSAL0906010', 'Putu Sunitya Candra Dewi', 'Legal', 'MSAL0906010.png'),
(53, 'MSAL2002215', 'Firmansyah', 'MIS', 'MSAL2002215.png'),
(54, 'PEAK1712018', 'Iman Sutejo', 'MIS', 'PEAK1712018.png'),
(55, 'MSAL1902239', 'Merry', 'MIS', 'MSAL1902239.png'),
(56, 'MSAL1504089', 'Tedy Paronto', 'MIS', 'MSAL1504089.png'),
(57, 'MSAL1606113', 'I Gede Arya Bagus Wiwaha', 'Operasional', 'MSAL1606113.png'),
(58, 'MSAL1705136', 'Aqmarina Tasya Runidha', 'Purchasing', 'MSAL1705136.png'),
(59, 'MSAL1307045', 'Ferdinandus B. Prawoto', 'Purchasing', 'MSAL1307045.png'),
(60, 'MSAL0809006', 'Irvan Wijaya', 'Purchasing', 'MSAL0809006.png'),
(61, 'MSAL0703002', 'Reymond Yulianto', 'Purchasing', 'MSAL0703002.png'),
(62, 'MSAL1608114', 'Ribut Budiyono', 'R & D', 'MSAL1608114.png'),
(63, 'MSAL2101236', 'Iswahyudi', 'Teknik', 'MSAL2101236.png'),
(64, 'MSAL0904009', 'Sri Wilopo', 'Teknik', 'MSAL0904009.png'),
(65, 'MSAL1010018', 'Bambang EK', 'HRGA', 'MSAL1010018.png'),
(66, 'MSAL1202029', 'Sugianto', 'HRGA', 'MSAL1202029.png'),
(67, 'MSAL1302039', 'Yudi Subono', 'HRGA', 'MSAL1302039.png'),
(68, 'MSAL1312050', 'Sugiyo', 'HRGA', 'MSAL1312050.png'),
(69, 'MSAL1409074', 'Ahmad Andi Kurniawan', 'HRGA', 'MSAL1409074.png'),
(70, 'MSAL1508095', 'B. Susanto', 'Purchasing', 'MSAL1508095.png'),
(71, 'MSAL1601109', 'Anggun Suhartini', 'Accounting', 'MSAL1601109.png'),
(72, 'MSAL1606118', 'Sanusi', 'HRGA', 'MSAL1606118.png'),
(73, 'MSAL1606119', 'Deni Sudiar', 'HRGA', 'MSAL1606119.png'),
(74, 'MSAL1611120', 'Ari Sugianto', 'HRGA', 'MSAL1611120.png'),
(75, 'MSAL1707139', 'Predianto', 'HRGA', 'MSAL1707139.png'),
(76, 'MSAL1808184', 'Elon Suparto', 'HRGA', 'MSAL1808184.png'),
(77, 'MSAL1809190', 'Pradana Niko Setyawan', 'HRGA', 'MSAL1809190.png'),
(78, 'MSAL1912212', 'Wahyu Akbar Aryandi', 'HRGA', 'MSAL1912212.png'),
(79, 'MSAL2008224', 'Ayu Diah Dwi Astuti', 'MIS', 'MSAL2008224.png'),
(80, 'MSAL2008225', 'Elda Maulidiawati Putri', 'Finance', 'MSAL2008225.png'),
(81, 'MSAL2104244', 'Sunu Tri Cahyo', 'HRGA', 'MSAL2104244.png'),
(82, 'MSAL2104245', 'Saiful Huda', 'MIS', 'MSAL2104245.png'),
(83, 'MSAL2104246', 'Ismiya Pebri Yani', 'Finance', 'MSAL2104246.png'),
(84, 'MSAL2105247', 'Ali', 'MIS', 'MSAL2105247.png'),
(85, 'MSAL2105248', 'Mohamad Gensza Vernando', 'MIS', 'MSAL2105248.png'),
(86, 'MSAL2106250', 'Asmar Subakti', 'R & D', 'MSAL2106250.png'),
(87, 'MSAL2106252', 'Rahma Yusni Oksafia', 'Engineering', 'MSAL2106252.png'),
(88, 'MSAL2107253', 'Bilal Dewantara', 'HRGA', 'MSAL2107253.png'),
(89, 'MSAL2107258', 'Muhammad Furqon Khoirudin', 'Accounting', 'MSAL2107258.png'),
(90, 'MSAL2107259', 'Muhammad Alvi Bisyri', 'Agronomi', 'MSAL2107259.png'),
(91, 'MSAL2109260', 'Trilindah Sari', 'HRGA', 'MSAL2109260.png'),
(92, 'MSAL2109261', 'Arifudin Gani', 'MIS', 'MSAL2109261.png'),
(93, 'MSAL2102263', 'Ananda Aqilla Sabrina', 'Accounting', 'MSAL2102263.png'),
(94, 'MSAL2102264', 'Endah Sulistyani', 'HRGA', 'MSAL2102264.png'),
(95, 'MSAL2102265', 'Saepul Bahri', 'HRGA', 'MSAL2102265.png'),
(96, 'MSAL2103266', 'Muhammad Asep Kurniawan', 'HRGA', 'MSAL2103266.png'),
(97, 'MSAL2104267', 'Resa Junita Anwar', 'HRGA', 'MSAL2104267.png'),
(98, 'MSAL2109268', 'Fifih Lidia Syahri', 'MIS', 'MSAL2109268.png'),
(99, 'MG001', 'Magang 1', '-', 'MG001.png'),
(100, 'MG002', 'Magang 2', '-', 'MG002.png'),
(101, 'MG003', 'Magang 3', '-', 'MG003.png'),
(102, 'MG004', 'Magang 4', '-', 'MG004.png'),
(103, 'MG005', 'Magang 5', '-', 'MG005.png'),
(104, 'MG006', 'Magang 6', '-', 'MG006.png'),
(105, 'MG007', 'Magang 7', '-', 'MG007.png'),
(106, 'MG008', 'Magang 8', '-', 'MG008.png'),
(107, 'MG009', 'Magang 9', '-', 'MG009.png'),
(108, 'MG010', 'Magang 10', '-', 'MG010.png'),
(109, 'TM001', 'Tamu 1', '-', 'TM001.png'),
(110, 'TM002', 'Tamu 2', '-', 'TM002.png'),
(111, 'TM003', 'Tamu 3', '-', 'TM003.png'),
(112, 'TM004', 'Tamu 4', '-', 'TM004.png'),
(113, 'TM005', 'Tamu 5', '-', 'TM005.png'),
(114, 'TM006', 'Tamu 6', '-', 'TM006.png'),
(115, 'TM007', 'Tamu 7', '-', 'TM007.png'),
(116, 'TM008', 'Tamu 8', '-', 'TM008.png'),
(117, 'TM009', 'Tamu 9', '-', 'TM009.png'),
(118, 'TM010', 'Tamu 10', '-', 'TM010.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbpertandingan`
--

CREATE TABLE `tbpertandingan` (
  `id` int(11) NOT NULL,
  `id_key` int(11) NOT NULL DEFAULT 1,
  `nama_club1` varchar(100) NOT NULL,
  `icon_club1` text NOT NULL,
  `score_club1` int(11) NOT NULL,
  `nama_club2` varchar(100) NOT NULL,
  `icon_club2` text NOT NULL,
  `score_club2` int(11) NOT NULL,
  `waktu` varchar(50) NOT NULL,
  `trending` int(11) NOT NULL DEFAULT 0,
  `masuk` int(11) NOT NULL DEFAULT 0,
  `keluar` int(11) NOT NULL DEFAULT 0,
  `tgl` date NOT NULL,
  `jam` time NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = belum mulai\r\n1= sedang mulai\r\n2 = selesai'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbpertandingan`
--

INSERT INTO `tbpertandingan` (`id`, `id_key`, `nama_club1`, `icon_club1`, `score_club1`, `nama_club2`, `icon_club2`, `score_club2`, `waktu`, `trending`, `masuk`, `keluar`, `tgl`, `jam`, `status`) VALUES
(2, 1, 'Arsenal FC', '1653884191991.png', 1, 'Barcelona', '16538841919911.png', 0, '1', 1, 0, 0, '2022-05-30', '14:15:00', 2),
(3, 1, 'Manchester city', '1653895605426.png', 0, 'Manchester united', '16538956054261.png', 0, '3', 1, 2, 0, '2022-05-31', '17:25:00', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbuser`
--

CREATE TABLE `tbuser` (
  `user_id` int(5) NOT NULL,
  `user_nama` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_pass` varchar(100) NOT NULL,
  `user_foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbuser`
--

INSERT INTO `tbuser` (`user_id`, `user_nama`, `username`, `email`, `user_pass`, `user_foto`) VALUES
(1, 'Elda Maulidia', 'elda', 'elda@gmail.com', '$2a$08$CKU96RIB8rRulGHow3cTd.VZuAC2TFkm2.eU3wZz3q8R9A04P2V6.', '1653820370769.jpg'),
(2, 'Abdul Rohaman', 'oman', 'oman@gmail.com', '$2a$08$zahBc7A/psu/MhnyqGjtZuWNYXbLZbbw4tdikEstaDsSJVm3t6x9O', '1653820471260.png'),
(9, 'Regitha', 'regitha', 'regitha@gmail.com', '$2a$08$vkDWRKULeZlZUVkpLBM1suip/cSfzQxsTNMFjTbbMJcbF28Wl6Mkq', '1653818604478.jpg'),
(10, 'Lidya Krisna Andani', 'lidya', 'lidya@gmail.com', '$2a$08$A.lwYDMhYCqSkmpDx45W/eNXqdHAQelQRX9jACCccPTsor/1ZQbFi', '1653820687349.jpg'),
(12, 'Ali', 'ali', 'ali@gmail.com', '$2a$08$G3r9h7zFp1Rd8/ZxTapL8.Rmm9v3RQarSkjC4BKh0kuvvbGTZ7a9O', 'default.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_about`
--

CREATE TABLE `tb_about` (
  `id` int(11) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_about`
--

INSERT INTO `tb_about` (`id`, `isi`) VALUES
(1, '<h2>What is Lorem Ipsum?</h2>\r\n\r\n<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sejarah`
--

CREATE TABLE `tb_sejarah` (
  `id` int(11) NOT NULL,
  `foto` text NOT NULL,
  `judul` text NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_sejarah`
--

INSERT INTO `tb_sejarah` (`id`, `foto`, `judul`, `isi`) VALUES
(1, '1654067189182.png', 'Lapangan  Yos Sudarso', '<h2>Where does it come from?</h2>\r\n\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`);

--
-- Indeks untuk tabel `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbkaryawan`
--
ALTER TABLE `tbkaryawan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbpertandingan`
--
ALTER TABLE `tbpertandingan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`user_id`);

--
-- Indeks untuk tabel `tb_about`
--
ALTER TABLE `tb_about`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_sejarah`
--
ALTER TABLE `tb_sejarah`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT untuk tabel `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbkaryawan`
--
ALTER TABLE `tbkaryawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT untuk tabel `tbpertandingan`
--
ALTER TABLE `tbpertandingan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbuser`
--
ALTER TABLE `tbuser`
  MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tb_about`
--
ALTER TABLE `tb_about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_sejarah`
--
ALTER TABLE `tb_sejarah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
