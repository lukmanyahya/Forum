-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2024 at 08:46 AM
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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `message_id`, `nim`, `comment`, `created_at`) VALUES
(1, 4, 'ADMINALUMNI1', 'uy', '2024-08-20 06:01:09'),
(2, 5, 'ADMINALUMNI1', 'hallo', '2024-08-20 06:05:31'),
(3, 4, 'mitra123', 'yo', '2024-08-20 06:12:01');

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nim` varchar(128) NOT NULL,
  `title` varchar(256) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `forum`
--

INSERT INTO `forum` (`id`, `user_id`, `nim`, `title`, `content`) VALUES
(1, 5, '', 'vfb', 'dbb');

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
  `nim` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `message_id`, `nim`) VALUES
(3, 4, '20SA1041'),
(4, 5, '20SA1041'),
(6, 7, '20SA1041'),
(7, 4, 'ADMINALUMNI1'),
(8, 4, 'mitra123');

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
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `nim`, `message`, `edited_at`, `suka`, `deleted`, `created_at`) VALUES
(4, '20SA1041', 'a', NULL, 2, 1, '2024-08-16 07:57:06'),
(5, '20SA1041', 'edd', NULL, 2, 1, '2024-08-16 07:57:10'),
(6, '20SA1041', 'aa', NULL, 0, 1, '2024-08-16 08:03:03'),
(7, '20SA1041', 'ghvhgv', '2024-08-16 03:10:33', 0, 0, '2024-08-16 08:10:33'),
(8, '20SA1041', 'sss', NULL, 0, 1, '2024-08-16 08:05:32'),
(9, '20SA1041', 'fhgfftyftfytf', '2024-08-16 03:10:15', 0, 0, '2024-08-16 08:10:15'),
(10, 'ADMINALUMNI1', 'uy', NULL, 0, 0, '2024-08-20 01:05:12'),
(11, 'mitra123', 'hallo', NULL, 0, 0, '2024-08-20 01:12:12');

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
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nim` (`nim`),
  ADD UNIQUE KEY `nim_2` (`nim`),
  ADD UNIQUE KEY `user_id` (`user_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lanjut_studi`
--
ALTER TABLE `lanjut_studi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
-- Constraints for table `forum`
--
ALTER TABLE `forum`
  ADD CONSTRAINT `forum_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

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
