-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 04, 2023 at 07:03 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bkk-system`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_lamarans`
--

CREATE TABLE `detail_lamarans` (
  `id` int(11) NOT NULL,
  `lowongan_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `waktu_melamar` datetime DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `no_skck` varchar(20) DEFAULT NULL,
  `no_ijazah` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_lamarans`
--

INSERT INTO `detail_lamarans` (`id`, `lowongan_id`, `user_id`, `waktu_melamar`, `alamat`, `no_skck`, `no_ijazah`) VALUES
(1, 1, 2, '2023-11-04 12:59:20', 'Batang', '11234', '7218');

-- --------------------------------------------------------

--
-- Table structure for table `lowongans`
--

CREATE TABLE `lowongans` (
  `id` int(11) NOT NULL,
  `perusahaan_id` int(11) DEFAULT NULL,
  `posisi` varchar(100) DEFAULT NULL,
  `kuota` int(11) DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `min_age` int(11) DEFAULT NULL,
  `max_age` int(11) DEFAULT NULL,
  `sistem_pelamaran` enum('online','offline') DEFAULT NULL,
  `pengalaman` varchar(100) DEFAULT NULL,
  `pendidikan_terakhir` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lowongans`
--

INSERT INTO `lowongans` (`id`, `perusahaan_id`, `posisi`, `kuota`, `start_time`, `end_time`, `notes`, `min_age`, `max_age`, `sistem_pelamaran`, `pengalaman`, `pendidikan_terakhir`) VALUES
(1, 1, 'Back-end Developer', 1, '2023-11-02 12:57:07', '2024-02-02 12:57:07', 'Hello World', 18, 35, 'online', 'bekerja 2 tahun sebagai back-end Developer', 'SMA');

-- --------------------------------------------------------

--
-- Table structure for table `perusahaans`
--

CREATE TABLE `perusahaans` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `kontrak_kerja` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `perusahaans`
--

INSERT INTO `perusahaans` (`id`, `nama`, `email`, `alamat`, `no_hp`, `logo`, `kontrak_kerja`) VALUES
(1, 'Dicoding', 'dicoding@gmail.com', 'Bandung', '0898', 'dicoding.jpg', '5 tahun');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nik` varchar(50) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') DEFAULT NULL,
  `agama` enum('islam','katolik','kristen','hindu','budha','konghuchu') DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` datetime DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `pendidikan_terakhir` varchar(100) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `status_pernikahan` enum('sudah menikah','belum menikah') DEFAULT NULL,
  `role` enum('pelamar','admin') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nik`, `nama`, `alamat`, `no_hp`, `jenis_kelamin`, `agama`, `tempat_lahir`, `tanggal_lahir`, `email`, `pendidikan_terakhir`, `password`, `foto`, `status_pernikahan`, `role`) VALUES
(1, '77820', 'Admin', 'SMKN 1 Kandeman', '0888', 'laki-laki', 'islam', 'Kaliongkek', '2023-11-01 10:29:17', 'admin@gmail.com', 'S3', '$2y$10$FmsylfBsehywfYf4OInIS.x9hsC7ZlPYkE9xXzPSxPj9teT7sRlpu', 'admin.jpg', 'belum menikah', 'admin'),
(2, '216630', 'Dela Fajar Mulia', 'Batang', '0889', 'perempuan', 'islam', 'Batang', '2007-02-02 11:58:09', 'dela.fjr08@gmail.com', 'SMP', '$2y$10$pv6YYYaSIwY7/Aeipi7IReelvEct0w.K4uJY8IeJMNF9BEzBPN83i', 'dela.jpg', 'belum menikah', 'pelamar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_lamarans`
--
ALTER TABLE `detail_lamarans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lowongan_id` (`lowongan_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `lowongans`
--
ALTER TABLE `lowongans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_lowongan_perusahaan` (`perusahaan_id`);

--
-- Indexes for table `perusahaans`
--
ALTER TABLE `perusahaans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_lamarans`
--
ALTER TABLE `detail_lamarans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `lowongans`
--
ALTER TABLE `lowongans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `perusahaans`
--
ALTER TABLE `perusahaans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_lamarans`
--
ALTER TABLE `detail_lamarans`
  ADD CONSTRAINT `detail_lamarans_ibfk_1` FOREIGN KEY (`lowongan_id`) REFERENCES `lowongans` (`id`),
  ADD CONSTRAINT `detail_lamarans_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `lowongans`
--
ALTER TABLE `lowongans`
  ADD CONSTRAINT `fk_lowongan_perusahaan` FOREIGN KEY (`perusahaan_id`) REFERENCES `perusahaans` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
