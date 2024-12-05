-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2024 at 04:36 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pariwisata`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorit_222058`
--

CREATE TABLE `favorit_222058` (
  `id_222058` int(11) NOT NULL,
  `pengguna_id_222058` int(11) DEFAULT NULL,
  `wisata_id_222058` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `favorit_222058`
--

INSERT INTO `favorit_222058` (`id_222058`, `pengguna_id_222058`, `wisata_id_222058`, `created_at`, `updated_at`) VALUES
(4, 1, 1, '2024-11-30 06:09:15', '2024-11-30 06:09:15');

-- --------------------------------------------------------

--
-- Table structure for table `foto_wisata_222058`
--

CREATE TABLE `foto_wisata_222058` (
  `id_222058` int(11) NOT NULL,
  `wisata_id_222058` int(11) DEFAULT NULL,
  `url_foto_222058` varchar(255) DEFAULT NULL,
  `deskripsi_222058` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `foto_wisata_222058`
--

INSERT INTO `foto_wisata_222058` (`id_222058`, `wisata_id_222058`, `url_foto_222058`, `deskripsi_222058`, `created_at`, `updated_at`) VALUES
(1, 1, '1-1732935543.webp', 'testing', '2024-11-30 02:59:03', '2024-11-30 02:59:03'),
(4, 4, '1-1733325698.jpg', 'TET', '2024-12-04 15:21:38', '2024-12-04 15:21:38');

-- --------------------------------------------------------

--
-- Table structure for table `jasa_travel_222058`
--

CREATE TABLE `jasa_travel_222058` (
  `id_222058` int(11) NOT NULL,
  `wisata_id_222058` int(11) DEFAULT NULL,
  `nama_travel_222058` varchar(255) DEFAULT NULL,
  `jenis_kendaraan_222058` varchar(255) DEFAULT NULL,
  `harga_perjalanan_222058` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jasa_travel_222058`
--

INSERT INTO `jasa_travel_222058` (`id_222058`, `wisata_id_222058`, `nama_travel_222058`, `jenis_kendaraan_222058`, `harga_perjalanan_222058`, `created_at`, `updated_at`) VALUES
(2, 1, 'Travel 1', 'Mobil', 200000.00, '2024-11-30 03:35:59', '2024-11-30 03:35:59'),
(3, 1, 'Travel 2', 'Motor', 300000.00, '2024-11-30 03:35:59', '2024-11-30 03:35:59'),
(6, 4, 'Travel 1', 'Mobil', 200000.00, '2024-12-04 15:21:38', '2024-12-04 15:21:38');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_07_24_184706_create_permission_tables', 1),
(5, '2020_09_12_043205_create_admins_table', 1),
(12, '2024_11_09_092643_create_pertanyaans_table', 5),
(13, '2024_11_09_122407_create_jawab_pertanyaans_table', 6),
(15, '2024_11_11_013324_create_foto_wisatas_table', 8),
(16, '2024_11_11_013336_create_jasa_travel_table', 9),
(18, '2024_11_11_005610_create_wisatas_table', 10),
(19, '2024_12_04_214858_add_column_manage_pengelola_to_pengguna_222058', 11);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_222058`
--

CREATE TABLE `pembayaran_222058` (
  `id_222058` int(11) NOT NULL,
  `tiket_id_222058` int(11) DEFAULT NULL,
  `metode_pembayaran_222058` varchar(255) DEFAULT NULL,
  `status_222058` varchar(255) DEFAULT NULL COMMENT 'completed, failed',
  `jumlah_bayar_222058` decimal(10,2) DEFAULT NULL,
  `bukti_pembayaran_222058` varchar(225) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran_222058`
--

INSERT INTO `pembayaran_222058` (`id_222058`, `tiket_id_222058`, `metode_pembayaran_222058`, `status_222058`, `jumlah_bayar_222058`, `bukti_pembayaran_222058`, `created_at`, `updated_at`) VALUES
(1, 1, 'transfer', 'pending', 460000.00, NULL, '2024-11-30 03:36:50', '2024-11-30 03:36:50'),
(2, 2, 'transfer', 'pending', 460000.00, NULL, '2024-11-30 03:42:17', '2024-11-30 03:42:17'),
(4, 4, 'transfer', 'pending', 360000.00, NULL, '2024-11-30 05:05:56', '2024-11-30 05:05:56'),
(6, 6, 'transfer', 'complate', 8600000.00, '1733325773-6.png', '2024-12-04 15:25:51', '2024-12-04 15:25:51');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna_222058`
--

CREATE TABLE `pengguna_222058` (
  `id_222058` int(11) NOT NULL,
  `nama_222058` varchar(255) DEFAULT NULL,
  `email_222058` varchar(255) DEFAULT NULL,
  `password_222058` varchar(255) DEFAULT NULL,
  `tipe_222058` varchar(255) DEFAULT NULL COMMENT 'Role of the user (pengunjung, admin, pengelola_wisata)',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_wisata_222058` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna_222058`
--

INSERT INTO `pengguna_222058` (`id_222058`, `nama_222058`, `email_222058`, `password_222058`, `tipe_222058`, `created_at`, `updated_at`, `id_wisata_222058`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$eVC5ebh1Poh6gjlAhcC0cOzUSpQiF8RpAyFTZS7m5u9qnbOLTEAPS', 'superadmin', '2024-11-30 04:30:18', '2024-11-23 07:30:28', NULL),
(2, 'pengunjung', 'pengunjung@gmail.com', '$2y$10$xZxtAqOLjg6A3wa3y.B4veYt0190r5iUuiCU4dVHfR1cPEFP9bHIu', 'pengunjung', '2024-11-23 07:53:04', '2024-11-23 07:53:04', NULL),
(3, 'pengelola', 'pengelola@gmail.com', '$2y$10$HeHbwOe0Ic1TuXSUWIKnLuKAjSqOQha1fbIwBEkpnm5iqFmLv/HQ.', 'pengelola wisata', '2024-12-04 15:21:53', '2024-12-04 15:21:53', 4),
(5, 'rizz', 'rizal@gmail.com', '$2y$10$eDNMTUFFFE8qIS6JSm0ir.XVSReIT/ZmavH4Cx0TI2usPiIhak7uC', 'superadmin', '2024-11-23 09:53:05', '2024-11-23 09:53:05', NULL),
(8, 'superadmin213', 'superadmin123@gmail.com', '$2y$10$0PZn3hmBVFUaxuPB1jNmV.H8Mmqf00HJYv7iqBUaj92wHvUTqk.TO', 'pengelola wisata', '2024-11-30 04:19:14', '2024-11-30 04:19:14', NULL),
(9, 'testing232', 'testing232@gmail.com', '$2y$10$D8nlp59XE/nvmuXfdVWeDOzUnzym5G0i5XIqm6ZzsEfHmqaRoC/7S', 'pengunjung', '2024-11-30 04:58:54', '2024-11-30 04:58:54', NULL),
(10, 'tetttt', 'tetttt@gmail.com', '$2y$10$zIMys.PSBaT1k8lKjb6MdO8IxzkfsH3ibsJwLslQDf1QzMslLz6qG', 'pengelola wisata', '2024-11-30 09:10:31', '2024-11-30 09:10:31', NULL),
(12, 'pengelola1', 'pengelola1@gmail.com', '$2y$10$RLc3poaUILLOyIIC8H9.nubIxMPyN5K85DHN7eJ/8uziNQydhHPYa', 'pengelola wisata', '2024-12-04 15:01:50', '2024-12-04 15:01:50', 1);

-- --------------------------------------------------------

--
-- Table structure for table `review_222058`
--

CREATE TABLE `review_222058` (
  `id_222058` int(11) NOT NULL,
  `pengguna_id_222058` int(11) DEFAULT NULL,
  `wisata_id_222058` int(11) DEFAULT NULL,
  `rating_222058` int(11) DEFAULT NULL,
  `komentar_222058` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review_222058`
--

INSERT INTO `review_222058` (`id_222058`, `pengguna_id_222058`, `wisata_id_222058`, `rating_222058`, `komentar_222058`, `created_at`, `updated_at`) VALUES
(2, 9, 1, 5, 'test', '2024-11-30 05:05:38', '2024-11-30 05:05:38');

-- --------------------------------------------------------

--
-- Table structure for table `tiket_222058`
--

CREATE TABLE `tiket_222058` (
  `id_222058` int(11) NOT NULL,
  `no_tiket_222058` varchar(225) NOT NULL,
  `pengguna_id_222058` int(11) DEFAULT NULL,
  `wisata_id_222058` int(11) DEFAULT NULL,
  `status_222058` varchar(255) DEFAULT NULL COMMENT 'pending, confirmed',
  `tanggal_kunjungan_222058` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `jumlah_tiket_222058` int(11) NOT NULL,
  `total_222058` decimal(10,0) NOT NULL,
  `id_jasa_travel_222058` int(11) DEFAULT NULL,
  `nama_lengkap_222058` varchar(225) NOT NULL,
  `email_222058` varchar(225) NOT NULL,
  `no_telepon_222058` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tiket_222058`
--

INSERT INTO `tiket_222058` (`id_222058`, `no_tiket_222058`, `pengguna_id_222058`, `wisata_id_222058`, `status_222058`, `tanggal_kunjungan_222058`, `created_at`, `updated_at`, `jumlah_tiket_222058`, `total_222058`, `id_jasa_travel_222058`, `nama_lengkap_222058`, `email_222058`, `no_telepon_222058`) VALUES
(1, 'TIKET-QLF4LE', 1, 1, 'pending', '2024-11-30', '2024-11-30 03:36:50', '2024-11-30 03:36:50', 2, 460000, NULL, 'daka', 'andakaramdhanisantoso@gmail.com', '097987090'),
(2, 'TIKET-K6E8WE', 1, 1, 'confirm', '2024-11-30', '2024-11-30 04:52:48', '2024-11-30 04:52:48', 2, 460000, 3, 'daka', 'andakaramdhanisantoso@gmail.com', '324324'),
(4, 'TIKET-VQSO1J', 9, 1, 'pending', '2024-11-30', '2024-11-30 05:05:56', '2024-11-30 05:05:56', 2, 360000, 2, 'daka', 'andakaramdhanisantoso@gmail.com', '097987090'),
(6, 'TIKET-BGNO91', 2, 4, 'pending', '2024-12-04', '2024-12-04 15:22:44', '2024-12-04 15:22:44', 21, 8600000, 6, 'development', 'development@gmail.com', '909299319839');

-- --------------------------------------------------------

--
-- Table structure for table `wisata_222058`
--

CREATE TABLE `wisata_222058` (
  `id_222058` int(11) NOT NULL,
  `nama_222058` varchar(255) DEFAULT NULL,
  `deskripsi_222058` text DEFAULT NULL,
  `lokasi_222058` varchar(255) DEFAULT NULL,
  `harga_222058` decimal(10,2) DEFAULT NULL,
  `jumlah_gazebo_222058` int(11) DEFAULT NULL,
  `jumlah_tiket_222058` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wisata_222058`
--

INSERT INTO `wisata_222058` (`id_222058`, `nama_222058`, `deskripsi_222058`, `lokasi_222058`, `harga_222058`, `jumlah_gazebo_222058`, `jumlah_tiket_222058`, `created_at`, `updated_at`) VALUES
(1, 'Toraja 1', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus blanditiis delectus at aperiam deserunt hic aliquam quaerat voluptatibus, quod recusandae commodi consectetur laborum? Veniam, iusto doloribus reprehenderit commodi aspernatur debitis?', 'Bekasi', 80000.00, 21, 21, '2024-11-30 02:59:03', '2024-11-30 02:59:03'),
(4, 'Wisata 2 test', 'testing', 'Bekasi', 400000.00, 30, 20, '2024-12-04 15:21:38', '2024-12-04 15:21:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `favorit_222058`
--
ALTER TABLE `favorit_222058`
  ADD PRIMARY KEY (`id_222058`),
  ADD KEY `pengguna_id_222058` (`pengguna_id_222058`),
  ADD KEY `wisata_id_222058` (`wisata_id_222058`);

--
-- Indexes for table `foto_wisata_222058`
--
ALTER TABLE `foto_wisata_222058`
  ADD PRIMARY KEY (`id_222058`),
  ADD KEY `wisata_id_222058` (`wisata_id_222058`);

--
-- Indexes for table `jasa_travel_222058`
--
ALTER TABLE `jasa_travel_222058`
  ADD PRIMARY KEY (`id_222058`),
  ADD KEY `wisata_id_222058` (`wisata_id_222058`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pembayaran_222058`
--
ALTER TABLE `pembayaran_222058`
  ADD PRIMARY KEY (`id_222058`),
  ADD KEY `tiket_id_222058` (`tiket_id_222058`);

--
-- Indexes for table `pengguna_222058`
--
ALTER TABLE `pengguna_222058`
  ADD PRIMARY KEY (`id_222058`),
  ADD UNIQUE KEY `email_222058` (`email_222058`);

--
-- Indexes for table `review_222058`
--
ALTER TABLE `review_222058`
  ADD PRIMARY KEY (`id_222058`),
  ADD KEY `pengguna_id_222058` (`pengguna_id_222058`),
  ADD KEY `wisata_id_222058` (`wisata_id_222058`);

--
-- Indexes for table `tiket_222058`
--
ALTER TABLE `tiket_222058`
  ADD PRIMARY KEY (`id_222058`),
  ADD KEY `wisata_id_222058` (`wisata_id_222058`);

--
-- Indexes for table `wisata_222058`
--
ALTER TABLE `wisata_222058`
  ADD PRIMARY KEY (`id_222058`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorit_222058`
--
ALTER TABLE `favorit_222058`
  MODIFY `id_222058` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `foto_wisata_222058`
--
ALTER TABLE `foto_wisata_222058`
  MODIFY `id_222058` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jasa_travel_222058`
--
ALTER TABLE `jasa_travel_222058`
  MODIFY `id_222058` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pembayaran_222058`
--
ALTER TABLE `pembayaran_222058`
  MODIFY `id_222058` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengguna_222058`
--
ALTER TABLE `pengguna_222058`
  MODIFY `id_222058` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `review_222058`
--
ALTER TABLE `review_222058`
  MODIFY `id_222058` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tiket_222058`
--
ALTER TABLE `tiket_222058`
  MODIFY `id_222058` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `wisata_222058`
--
ALTER TABLE `wisata_222058`
  MODIFY `id_222058` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favorit_222058`
--
ALTER TABLE `favorit_222058`
  ADD CONSTRAINT `favorit_222058_ibfk_1` FOREIGN KEY (`pengguna_id_222058`) REFERENCES `pengguna_222058` (`id_222058`),
  ADD CONSTRAINT `favorit_222058_ibfk_2` FOREIGN KEY (`wisata_id_222058`) REFERENCES `wisata_222058` (`id_222058`);

--
-- Constraints for table `foto_wisata_222058`
--
ALTER TABLE `foto_wisata_222058`
  ADD CONSTRAINT `foto_wisata_222058_ibfk_1` FOREIGN KEY (`wisata_id_222058`) REFERENCES `wisata_222058` (`id_222058`);

--
-- Constraints for table `jasa_travel_222058`
--
ALTER TABLE `jasa_travel_222058`
  ADD CONSTRAINT `jasa_travel_222058_ibfk_1` FOREIGN KEY (`wisata_id_222058`) REFERENCES `wisata_222058` (`id_222058`);

--
-- Constraints for table `pembayaran_222058`
--
ALTER TABLE `pembayaran_222058`
  ADD CONSTRAINT `pembayaran_222058_ibfk_1` FOREIGN KEY (`tiket_id_222058`) REFERENCES `tiket_222058` (`id_222058`);

--
-- Constraints for table `review_222058`
--
ALTER TABLE `review_222058`
  ADD CONSTRAINT `review_222058_ibfk_2` FOREIGN KEY (`wisata_id_222058`) REFERENCES `wisata_222058` (`id_222058`);

--
-- Constraints for table `tiket_222058`
--
ALTER TABLE `tiket_222058`
  ADD CONSTRAINT `tiket_222058_ibfk_2` FOREIGN KEY (`wisata_id_222058`) REFERENCES `wisata_222058` (`id_222058`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
