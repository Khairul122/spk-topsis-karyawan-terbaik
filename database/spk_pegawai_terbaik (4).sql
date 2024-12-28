-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2024 at 02:16 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_pegawai_terbaik`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id` int(11) NOT NULL,
  `nrk` varchar(25) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `masa_aktif` varchar(50) DEFAULT NULL,
  `level_akun` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id`, `nrk`, `nama`, `jabatan`, `masa_aktif`, `level_akun`) VALUES
(71, '0501', 'Ayup Saputra, A.Md', 'Anggota', '2021-07-08', 0),
(72, '0092', 'Khalilullah', 'Anggota', '2013-02-01', 0),
(73, '0249', 'Abdul Manan', 'Anggota', '2016-07-11', 0),
(74, '0228', 'Mulyadi', 'Anggota', '2015-11-26', 0),
(75, '0295', 'Safi\'i', 'Anggota', '2017-11-13', 0),
(76, '0310', 'Muhammad Irvan', 'Anggota', '2018-07-21', 0),
(77, '0629', 'Saifan Nur', 'Anggota', '2022-08-29', 0),
(78, '0492', 'Fahreza Muhammad Akbar', 'Anggota', '2021-07-08', 0),
(79, '0250', 'Mansyur S', 'Anggota', '2016-07-23', 0),
(80, '0052', 'Hermansyah Putra Tanjung', 'Anggota', '2011-11-20', 0),
(81, '0224', 'Suhari', 'Anggota', '2015-07-27', 0),
(82, '0270', 'Zulkarnain Hasibuan', 'Anggota', '2017-09-26', 0),
(83, '0672', 'Fadlon', 'Anggota', '2023-10-04', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` varchar(3) NOT NULL,
  `nama` varchar(55) NOT NULL,
  `bobot` int(11) NOT NULL,
  `jenis` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `nama`, `bobot`, `jenis`) VALUES
('K1', 'Kehadiran', 4, 'benefit'),
('K2', 'Keahlian', 5, 'benefit'),
('K3', 'Kerja Sama', 4, 'benefit'),
('K4', 'Kepribadian', 4, 'benefit'),
('K5', 'Kepemimpinan', 4, 'benefit'),
('K6', 'Masa Kerja', 3, 'benefit'),
('K7', 'Disiplin', 4, 'benefit');

-- --------------------------------------------------------

--
-- Table structure for table `matrix`
--

CREATE TABLE `matrix` (
  `id` int(11) NOT NULL,
  `id_alternatif` int(11) NOT NULL,
  `id_kriteria` varchar(3) NOT NULL,
  `nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `matrix`
--

INSERT INTO `matrix` (`id`, `id_alternatif`, `id_kriteria`, `nilai`) VALUES
(158, 71, 'K1', 60),
(159, 71, 'K2', 80),
(160, 71, 'K3', 100),
(161, 71, 'K4', 100),
(162, 71, 'K5', 80),
(163, 71, 'K6', 80),
(164, 71, 'K7', 100),
(165, 72, 'K1', 40),
(166, 72, 'K2', 40),
(167, 72, 'K3', 40),
(168, 72, 'K4', 60),
(169, 72, 'K5', 80),
(170, 72, 'K6', 80),
(171, 72, 'K7', 80),
(172, 73, 'K1', 40),
(173, 73, 'K2', 40),
(174, 73, 'K3', 60),
(175, 73, 'K4', 60),
(176, 73, 'K5', 80),
(177, 73, 'K6', 60),
(178, 73, 'K7', 80),
(179, 74, 'K1', 40),
(180, 74, 'K2', 40),
(181, 74, 'K3', 40),
(182, 74, 'K4', 40),
(183, 74, 'K5', 40),
(184, 74, 'K6', 60),
(185, 74, 'K7', 60),
(186, 75, 'K1', 80),
(187, 75, 'K2', 60),
(188, 75, 'K3', 60),
(189, 75, 'K4', 80),
(190, 75, 'K5', 60),
(191, 75, 'K6', 60),
(192, 75, 'K7', 60),
(193, 76, 'K1', 40),
(194, 76, 'K2', 80),
(195, 76, 'K3', 80),
(196, 76, 'K4', 100),
(197, 76, 'K5', 80),
(198, 76, 'K6', 80),
(199, 76, 'K7', 80),
(200, 77, 'K1', 60),
(201, 77, 'K2', 80),
(202, 77, 'K3', 80),
(203, 77, 'K4', 60),
(204, 77, 'K5', 100),
(205, 77, 'K6', 80),
(206, 77, 'K7', 80),
(207, 78, 'K1', 80),
(208, 78, 'K2', 60),
(209, 78, 'K3', 80),
(210, 78, 'K4', 60),
(211, 78, 'K5', 80),
(212, 78, 'K6', 80),
(213, 78, 'K7', 60),
(214, 79, 'K1', 60),
(215, 79, 'K2', 100),
(216, 79, 'K3', 100),
(217, 79, 'K4', 60),
(218, 79, 'K5', 100),
(219, 79, 'K6', 80),
(220, 79, 'K7', 60),
(221, 80, 'K1', 80),
(222, 80, 'K2', 80),
(223, 80, 'K3', 100),
(224, 80, 'K4', 80),
(225, 80, 'K5', 80),
(226, 80, 'K6', 60),
(227, 80, 'K7', 80),
(228, 81, 'K1', 60),
(229, 81, 'K2', 80),
(230, 81, 'K3', 80),
(231, 81, 'K4', 60),
(232, 81, 'K5', 80),
(233, 81, 'K6', 100),
(234, 81, 'K7', 60),
(235, 82, 'K1', 60),
(236, 82, 'K2', 100),
(237, 82, 'K3', 60),
(238, 82, 'K4', 100),
(239, 82, 'K5', 80),
(240, 82, 'K6', 80),
(241, 82, 'K7', 100),
(242, 83, 'K1', 60),
(243, 83, 'K2', 80),
(244, 83, 'K3', 60),
(245, 83, 'K4', 80),
(246, 83, 'K5', 60),
(247, 83, 'K6', 100),
(248, 83, 'K7', 80);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  `status` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `status`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'pimpinan', 'pimpinan', 'pimpinan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matrix`
--
ALTER TABLE `matrix`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_alternatif` (`id_alternatif`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;
--
-- AUTO_INCREMENT for table `matrix`
--
ALTER TABLE `matrix`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=249;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `matrix`
--
ALTER TABLE `matrix`
  ADD CONSTRAINT `matrix_ibfk_1` FOREIGN KEY (`id_alternatif`) REFERENCES `alternatif` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `matrix_ibfk_2` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
