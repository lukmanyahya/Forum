-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2024 at 09:09 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alumni_informatika`
--

-- --------------------------------------------------------

--
-- Table structure for table `bekerja`
--

CREATE TABLE `bekerja` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `perusahaan` varchar(255) DEFAULT NULL,
  `email_perusahaan` varchar(255) DEFAULT NULL,
  `alamat_perusahaan` varchar(255) DEFAULT NULL,
  `jenis_perusahaan` varchar(255) DEFAULT NULL,
  `nama_pimpinan` varchar(255) DEFAULT NULL,
  `telepon_pimpinan` varchar(20) DEFAULT NULL,
  `posisi` varchar(255) DEFAULT NULL,
  `pendapatan` varchar(255) DEFAULT NULL,
  `tingkat_tempat_kerja` varchar(255) DEFAULT NULL,
  `kurang_6_bulan` varchar(255) DEFAULT NULL,
  `hubungan_studi` varchar(255) DEFAULT NULL,
  `tingkat_pendidikan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `belum_kerja`
--

CREATE TABLE `belum_kerja` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `alasan_belum_bekerja` varchar(255) DEFAULT NULL,
  `kualifikasi_tidak_sesuai` varchar(255) DEFAULT NULL,
  `kesulitan_mencari_pekerjaan` varchar(255) DEFAULT NULL,
  `kendala_lain` varchar(255) DEFAULT NULL,
  `dukungan_program_studi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `belum_kerja`
--

INSERT INTO `belum_kerja` (`id`, `user_id`, `alasan_belum_bekerja`, `kualifikasi_tidak_sesuai`, `kesulitan_mencari_pekerjaan`, `kendala_lain`, `dukungan_program_studi`) VALUES
(2, 6, 'banyak saingan', 'mungkin', 'banyak saingan cuy', 'gaada sih cuma itu', 'butuh');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  `nim` varchar(128) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `message_id`, `nim`, `comment`, `created_at`, `image_path`) VALUES
(21, 21, 'ADMINALUMNI1', 'uy', '2024-11-21 19:12:28', NULL),
(28, 31, 'mitra123', 'y', '2024-12-17 01:33:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lanjut_studi`
--

CREATE TABLE `lanjut_studi` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `sumber_biaya` varchar(255) DEFAULT NULL,
  `perguruan_tinggi` varchar(255) DEFAULT NULL,
  `program_studi` varchar(255) DEFAULT NULL,
  `tanggal_masuk` varchar(255) DEFAULT NULL,
  `sumber_dana_pembiayaan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  `nim` varchar(128) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `message_id`, `nim`, `created_at`) VALUES
(40, 28, '20SA1041', '2024-12-17 13:48:47'),
(41, 29, '20SA1041', '2024-12-17 13:48:47'),
(45, 30, 'mitra123', '2024-12-17 07:53:59'),
(51, 32, 'mitra123', '2024-12-17 08:44:20'),
(52, 14, 'mitra123', '2024-12-17 08:51:11');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `nim` varchar(128) NOT NULL,
  `message` text NOT NULL,
  `edited_at` timestamp NULL DEFAULT NULL,
  `suka` int(128) NOT NULL,
  `deleted` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `image_path` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `nim`, `message`, `edited_at`, `suka`, `deleted`, `created_at`, `image_path`, `file_path`) VALUES
(14, 'ADMINALUMNI1', 'satpol', '2024-08-22 02:37:01', 0, 0, '2024-08-22 07:37:01', NULL, NULL),
(20, 'ADMINALUMNI1', 'b', NULL, 0, 0, '2024-11-21 12:51:07', NULL, NULL),
(21, 'ADMINALUMNI1', 'c', NULL, 0, 0, '2024-11-21 13:11:56', NULL, NULL),
(23, 'ADMINALUMNI1', 'aaa', NULL, 0, 0, '2024-12-05 00:03:41', NULL, NULL),
(28, '20SA1041', 'ssss', NULL, 0, 0, '2024-12-05 02:12:54', NULL, NULL),
(29, '20SA1041', 'rrr', NULL, 0, 0, '2024-12-05 02:13:42', NULL, NULL),
(30, '20SA1041', 'ddd', '2024-12-05 02:19:03', 0, 0, '2024-12-05 08:19:03', NULL, NULL),
(31, 'mitra123', 'aaaaa', NULL, 0, 0, '2024-12-17 01:00:55', 'uploads/96a6775cde1b5471ab76982d216902bb.jpeg', NULL),
(32, 'mitra123', 'ssss', NULL, 0, 0, '2024-12-17 01:22:46', 'uploads/94f82b624c24040dbba9d5d12281ad8f.png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  `reply` text NOT NULL,
  `nim` varchar(128) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `image_path` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `comment_id`, `message_id`, `reply`, `nim`, `created_at`, `image_path`) VALUES
(5, 21, 21, 'h', 'ADMINALUMNI1', '2024-11-21 13:12:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tracer`
--

CREATE TABLE `tracer` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `telepon` varchar(20) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `npwp` varchar(15) NOT NULL,
  `tahun_lulus` int(4) NOT NULL,
  `ipk` decimal(3,2) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tracer`
--

INSERT INTO `tracer` (`id`, `user_id`, `telepon`, `alamat`, `nik`, `npwp`, `tahun_lulus`, `ipk`, `status`) VALUES
(49, 11, '089158018900', 'Purwokerto', '4565464564564564', '927637582637486', 2024, 3.80, 2),
(50, 6, '089158018900', 'Pemalang', '3453453453535434', '534345345434353', 2023, 3.83, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tracer_lanjutan`
--

CREATE TABLE `tracer_lanjutan` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `perkuliahan` varchar(20) NOT NULL,
  `praktikum` varchar(20) NOT NULL,
  `diskusi` varchar(20) NOT NULL,
  `partisipasi_riset` varchar(20) NOT NULL,
  `magang` varchar(20) NOT NULL,
  `kerja_lapangan` varchar(20) NOT NULL,
  `demonstrasi` varchar(20) NOT NULL,
  `pendidikan` varchar(20) NOT NULL,
  `penelitian` varchar(20) NOT NULL,
  `pengabdian` varchar(20) NOT NULL,
  `aktif_cari_pekerjaan` varchar(5) NOT NULL,
  `mulai_cari_pekerjaan` varchar(255) NOT NULL,
  `bagaimana_cari_pekerjaan` text NOT NULL,
  `lamaran_pertama` varchar(255) NOT NULL,
  `respon_lamaran` varchar(255) NOT NULL,
  `undangan_interview` varchar(255) NOT NULL,
  `alasan_pekerjaan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tracer_lanjutan`
--

INSERT INTO `tracer_lanjutan` (`id`, `user_id`, `perkuliahan`, `praktikum`, `diskusi`, `partisipasi_riset`, `magang`, `kerja_lapangan`, `demonstrasi`, `pendidikan`, `penelitian`, `pengabdian`, `aktif_cari_pekerjaan`, `mulai_cari_pekerjaan`, `bagaimana_cari_pekerjaan`, `lamaran_pertama`, `respon_lamaran`, `undangan_interview`, `alasan_pekerjaan`) VALUES
(21, 11, 'Kurang', 'Besar', 'Kurang', 'Sangat Besar', 'Tidak Sama Sekali', 'Besar', 'Sangat Besar', 'Cukup', 'Sangat Baik', 'Baik', 'Ya', 'kapan2', 'afsadasdasd', '5', '1', 'gada', 'adssadasd'),
(22, 6, 'Kurang', 'Besar', 'Cukup Besar', 'Tidak Sama Sekali', 'Besar', 'Kurang', 'Tidak Sama Sekali', 'Baik', 'Kurang', 'Sangat Baik', 'Ya', 'kapan2', 'asdasdasd', '5', '1', 'gada', 'dasasd');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `nim` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `nim`, `email`, `image`, `password`, `role_id`, `is_active`) VALUES
(5, 'Admin Alumni 1', 'ADMINALUMNI1', 'admin1@gmail.com', 'default.png', '$2y$10$7abMFnHeB2PTHB7bw8a//ukllCJPiVDWM.mgFdotaDrwdtVx.3lKW', 1, 1),
(6, 'Ipang Muflih', '20SA1041', 'ipang41@gmail.com', 'ADM12341.png', '$2y$10$281S4ABJ5Hq3E7PVjPuWIO.JMXJeftJaWM0r/eEutWgr2c5P7d8FK', 2, 1),
(8, 'Pengguna 47', '20SA1047', 'user47@gmail.com', 'ADM123471.jpg', '$2y$10$aWUAmpIXBGPqUo8buAXOGOn233unmUPUI4jyQ94.Xpdstw3Q43HlC', 2, 1),
(11, 'Kaldi Sal', '20SA1042', 'kaldi@gmail.com', 'ADM12342.jpg', '$2y$10$VLs9T.uIa/Vme0V1B54xKuWeNb1/x.gZ/YEUn0zPvj2gjocX4Cheq', 2, 1),
(15, 'Mitra', '12345', '', 'default.png', '$2y$10$YlfeTFvntmj6LuZQqJdg.eBxFym3.C9m0/9pK3pXPg/ycerIsw8PS', 2, 1),
(16, 'Alumni', 'Alumni', '', 'default.png', '$2y$10$mV9/c/nZzPZl8ELAh5it5enFzL72ZvxZXoqU1mLCjunbWppGN3wy.', 2, 1),
(18, 'cok', 'mitra123', 'mitra@gmail.com', 'default.png', '$2y$10$GtYuJdQTUMd2GNiv0XZVhOeR04iM3Z4dsrUpI9Sl0EA5FBqq.tA3y', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `wiraswasta`
--

CREATE TABLE `wiraswasta` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama_bidang_usaha` varchar(255) DEFAULT NULL,
  `alamat_tempat_usaha` varchar(255) DEFAULT NULL,
  `pendapatan_wiraswasta` varchar(255) DEFAULT NULL,
  `jenis_usaha` varchar(255) DEFAULT NULL,
  `tingkat_bidang_usaha` varchar(255) DEFAULT NULL,
  `hubungan_studi_wiraswasta` varchar(255) DEFAULT NULL,
  `tingkat_pendidikan_wiraswasta` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wiraswasta`
--

INSERT INTO `wiraswasta` (`id`, `user_id`, `nama_bidang_usaha`, `alamat_tempat_usaha`, `pendapatan_wiraswasta`, `jenis_usaha`, `tingkat_bidang_usaha`, `hubungan_studi_wiraswasta`, `tingkat_pendidikan_wiraswasta`) VALUES
(0, 11, 'Pt cinta abadi', 'Purwokerto', 'asdasda', 'asdasdasd', 'asdasd', 'asda', 'dasdasd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bekerja`
--
ALTER TABLE `bekerja`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `belum_kerja`
--
ALTER TABLE `belum_kerja`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `message_id` (`message_id`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `lanjut_studi`
--
ALTER TABLE `lanjut_studi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `message_id` (`message_id`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_messages_users` (`nim`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_id` (`comment_id`),
  ADD KEY `nim` (`nim`);

--
-- Indexes for table `tracer`
--
ALTER TABLE `tracer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tracer_user_id` (`user_id`);

--
-- Indexes for table `tracer_lanjutan`
--
ALTER TABLE `tracer_lanjutan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_nim` (`nim`);

--
-- Indexes for table `wiraswasta`
--
ALTER TABLE `wiraswasta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bekerja`
--
ALTER TABLE `bekerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `belum_kerja`
--
ALTER TABLE `belum_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `lanjut_studi`
--
ALTER TABLE `lanjut_studi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tracer`
--
ALTER TABLE `tracer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tracer_lanjutan`
--
ALTER TABLE `tracer_lanjutan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bekerja`
--
ALTER TABLE `bekerja`
  ADD CONSTRAINT `bekerja_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `belum_kerja`
--
ALTER TABLE `belum_kerja`
  ADD CONSTRAINT `belum_kerja_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`message_id`) REFERENCES `messages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`nim`) REFERENCES `users` (`nim`) ON DELETE CASCADE;

--
-- Constraints for table `lanjut_studi`
--
ALTER TABLE `lanjut_studi`
  ADD CONSTRAINT `lanjut_studi_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `likes_ibfk_1` FOREIGN KEY (`message_id`) REFERENCES `messages` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `likes_ibfk_2` FOREIGN KEY (`nim`) REFERENCES `users` (`nim`) ON DELETE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `fk_messages_users` FOREIGN KEY (`nim`) REFERENCES `users` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `replies`
--
ALTER TABLE `replies`
  ADD CONSTRAINT `replies_ibfk_1` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `replies_ibfk_2` FOREIGN KEY (`nim`) REFERENCES `users` (`nim`) ON DELETE CASCADE;

--
-- Constraints for table `tracer`
--
ALTER TABLE `tracer`
  ADD CONSTRAINT `fk_tracer_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tracer_lanjutan`
--
ALTER TABLE `tracer_lanjutan`
  ADD CONSTRAINT `tracer_lanjutan_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wiraswasta`
--
ALTER TABLE `wiraswasta`
  ADD CONSTRAINT `wiraswasta_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
