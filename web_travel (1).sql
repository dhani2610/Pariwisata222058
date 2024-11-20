-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2024 at 07:46 PM
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
-- Database: `web_travel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `username`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'superadmin@gmail.com', 'superadmin', NULL, '$2y$10$RC07kinPd3eT5NoczoHq3eIjKvaMg1bmvioqQfxpNVBnsOKvjtiIW', NULL, '2024-09-13 15:06:22', '2024-09-13 15:06:22'),
(5, 'daka', 'daka@gmail.com', 'daka', NULL, '$2y$10$WH.Nf0Pnkn2eCHyfoXjSuehDddb2TFV//1nwePAsASEfuipYEIg7q', NULL, '2024-11-20 15:39:15', '2024-11-20 15:39:15'),
(6, 'usertest', 'usertest@gmail.com', 'usertest', NULL, '$2y$10$fOCyxCLDCU0ZVHAFTAqqQupcaqbTtwCbF6va0nMEbSCxLyajyMZXG', NULL, '2024-11-20 16:36:16', '2024-11-20 16:36:16');

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
(2, 3, '1-1732094727.png', 'test', '2024-11-20 09:25:27', '2024-11-20 09:25:27'),
(3, 3, '1-1732095098.jpg', NULL, '2024-11-20 09:31:38', '2024-11-20 09:31:38'),
(5, 3, '1-1732099094.jpg', NULL, '2024-11-20 10:38:14', '2024-11-20 10:38:14'),
(6, 3, '2-1732099094.jpg', NULL, '2024-11-20 10:38:14', '2024-11-20 10:38:14'),
(7, 3, '3-1732099094.jpg', NULL, '2024-11-20 10:38:14', '2024-11-20 10:38:14'),
(8, 3, '4-1732099094.jpg', NULL, '2024-11-20 10:38:14', '2024-11-20 10:38:14'),
(9, 3, '5-1732099094.jpg', NULL, '2024-11-20 10:38:14', '2024-11-20 10:38:14'),
(10, 3, '6-1732099094.jpg', NULL, '2024-11-20 10:38:14', '2024-11-20 10:38:14'),
(11, 3, '7-1732099094.jpg', NULL, '2024-11-20 10:38:14', '2024-11-20 10:38:14'),
(12, NULL, '1-1732120498.jpg', 'testt', '2024-11-20 16:34:58', '2024-11-20 16:34:58'),
(13, NULL, '2-1732120498.jpg', 'testtt', '2024-11-20 16:34:58', '2024-11-20 16:34:58'),
(14, NULL, '3-1732120498.jpg', 'testtt', '2024-11-20 16:34:58', '2024-11-20 16:34:58'),
(15, NULL, '1-1732120978.jpg', 'testt', '2024-11-20 16:42:58', '2024-11-20 16:42:58'),
(16, NULL, '1-1732121036.jpg', 'testt', '2024-11-20 16:43:56', '2024-11-20 16:43:56');

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
(4, NULL, 'Non ratione saepe in', 'Cupidatat nihil natu', 8.00, '2024-11-20 09:32:15', '2024-11-20 09:32:15'),
(5, 3, 'Travel 1100', 'Mobil', 200000.00, '2024-11-20 10:38:14', '2024-11-20 10:38:14'),
(6, 3, 'Travel 2', 'Motor', 100000.00, '2024-11-20 10:38:14', '2024-11-20 10:38:14'),
(7, 5, 'Travel Jaya', 'Mini Buss', 200000.00, '2024-11-20 16:41:56', '2024-11-20 16:34:58'),
(8, 5, 'Travel Abadi', 'Mini Buss', 300000.00, '2024-11-20 16:42:01', '2024-11-20 16:34:58'),
(9, 6, 'Travel Jaya', 'Mini Buss', 200000.00, '2024-11-20 16:42:58', '2024-11-20 16:42:58'),
(10, 7, 'Travel Jaya', 'Mini Buss', 200000.00, '2024-11-20 16:43:56', '2024-11-20 16:43:56'),
(11, 7, 'Travel Serakah Jaya', 'Motor', 200000.00, '2024-11-20 16:43:56', '2024-11-20 16:43:56');

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
(18, '2024_11_11_005610_create_wisatas_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\Admin', 1),
(1, 'App\\Models\\Admin', 5),
(3, 'App\\Models\\Admin', 6);

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
(1, 5, 'transfer', 'failed', 24600000.00, '1732114104-1.jpg', '2024-11-20 15:27:48', '2024-11-20 15:27:48'),
(2, 6, 'transfer', 'complate', 400000.00, '1732115456-2.jpeg', '2024-11-20 15:27:07', '2024-11-20 15:27:07'),
(3, 7, 'transfer', 'complate', 600000.00, '1732117676-3.jpg', '2024-11-20 15:50:10', '2024-11-20 15:50:10'),
(4, 8, 'transfer', 'complate', 2000000.00, '1732120678-4.jpeg', '2024-11-20 16:38:44', '2024-11-20 16:38:44');

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
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `group_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `group_name`, `created_at`, `updated_at`) VALUES
(1, 'dashboard.view', 'admin', 'dashboard', '2024-09-13 15:06:22', '2024-09-13 15:06:22'),
(2, 'admin.create', 'admin', 'admin', '2024-09-13 15:06:22', '2024-09-13 15:06:22'),
(3, 'admin.view', 'admin', 'admin', '2024-09-13 15:06:22', '2024-09-13 15:06:22'),
(4, 'admin.edit', 'admin', 'admin', '2024-09-13 15:06:22', '2024-09-13 15:06:22'),
(5, 'admin.delete', 'admin', 'admin', '2024-09-13 15:06:22', '2024-09-13 15:06:22'),
(6, 'role.create', 'admin', 'role', '2024-09-13 15:06:22', '2024-09-13 15:06:22'),
(7, 'role.view', 'admin', 'role', '2024-09-13 15:06:22', '2024-09-13 15:06:22'),
(8, 'role.edit', 'admin', 'role', '2024-09-13 15:06:22', '2024-09-13 15:06:22'),
(9, 'role.delete', 'admin', 'role', '2024-09-13 15:06:22', '2024-09-13 15:06:22'),
(10, 'master.data.view', 'admin', 'master data', '2024-09-13 15:06:22', '2024-09-13 15:06:22'),
(11, 'barang.jasa.create', 'admin', 'barang.jasa', '2024-09-13 15:06:22', '2024-09-13 15:06:22'),
(12, 'barang.jasa.view', 'admin', 'barang.jasa', '2024-09-13 15:06:22', '2024-09-13 15:06:22'),
(13, 'barang.jasa.edit', 'admin', 'barang.jasa', '2024-09-13 15:06:22', '2024-09-13 15:06:22'),
(14, 'barang.jasa.delete', 'admin', 'barang.jasa', '2024-09-13 15:06:22', '2024-09-13 15:06:22'),
(15, 'merk.create', 'admin', 'merk', '2024-09-13 15:06:22', '2024-09-13 15:06:22'),
(16, 'merk.view', 'admin', 'merk', '2024-09-13 15:06:22', '2024-09-13 15:06:22'),
(17, 'merk.edit', 'admin', 'merk', '2024-09-13 15:06:22', '2024-09-13 15:06:22'),
(18, 'merk.delete', 'admin', 'merk', '2024-09-13 15:06:22', '2024-09-13 15:06:22'),
(19, 'satuan.create', 'admin', 'satuan', '2024-09-13 15:06:22', '2024-09-13 15:06:22'),
(20, 'satuan.view', 'admin', 'satuan', '2024-09-13 15:06:22', '2024-09-13 15:06:22'),
(21, 'satuan.edit', 'admin', 'satuan', '2024-09-13 15:06:22', '2024-09-13 15:06:22'),
(22, 'satuan.delete', 'admin', 'satuan', '2024-09-13 15:06:22', '2024-09-13 15:06:22'),
(23, 'customer.create', 'admin', 'customer', '2024-09-13 15:06:22', '2024-09-13 15:06:22'),
(24, 'customer.view', 'admin', 'customer', '2024-09-13 15:06:22', '2024-09-13 15:06:22'),
(25, 'customer.edit', 'admin', 'customer', '2024-09-13 15:06:22', '2024-09-13 15:06:22'),
(26, 'customer.delete', 'admin', 'customer', '2024-09-13 15:06:22', '2024-09-13 15:06:22'),
(27, 'pph.create', 'admin', 'pph', '2024-09-13 15:06:23', '2024-09-13 15:06:23'),
(28, 'pph.view', 'admin', 'pph', '2024-09-13 15:06:23', '2024-09-13 15:06:23'),
(29, 'pph.edit', 'admin', 'pph', '2024-09-13 15:06:23', '2024-09-13 15:06:23'),
(30, 'pph.delete', 'admin', 'pph', '2024-09-13 15:06:23', '2024-09-13 15:06:23'),
(31, 'transaksi.create', 'admin', 'transaksi', '2024-09-13 15:06:23', '2024-09-13 15:06:23'),
(32, 'transaksi.view', 'admin', 'transaksi', '2024-09-13 15:06:23', '2024-09-13 15:06:23'),
(33, 'transaksi.edit', 'admin', 'transaksi', '2024-09-13 15:06:23', '2024-09-13 15:06:23'),
(34, 'transaksi.delete', 'admin', 'transaksi', '2024-09-13 15:06:23', '2024-09-13 15:06:23'),
(35, 'transaksi.invoice', 'admin', 'transaksi', '2024-09-13 15:06:23', '2024-09-13 15:06:23'),
(36, 'transaksi.rekap', 'admin', 'transaksi', '2024-09-13 15:06:23', '2024-09-13 15:06:23'),
(37, 'transaksi.update.status', 'admin', 'transaksi', '2024-09-13 15:06:23', '2024-09-13 15:06:23'),
(38, 'laporan.view', 'admin', 'laporan', '2024-09-13 15:06:23', '2024-09-13 15:06:23');

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
(2, 1, 3, 5, 'testt', '2024-11-20 16:18:07', '2024-11-20 16:18:07'),
(3, 1, 3, 5, 'Halooo', '2024-11-20 16:19:08', '2024-11-20 16:19:08'),
(4, 1, 3, 5, 'Halooo testt', '2024-11-20 16:19:32', '2024-11-20 16:19:32'),
(5, 1, 3, 4, 'Goodd', '2024-11-20 16:25:39', '2024-11-20 16:25:39'),
(6, 6, 5, 5, 'Keren', '2024-11-20 16:39:26', '2024-11-20 16:39:26'),
(7, 6, 3, 3, 'Good', '2024-11-20 16:39:52', '2024-11-20 16:39:52');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'superadmin', 'admin', '2024-09-13 15:06:22', '2024-09-13 15:06:22'),
(3, 'pengunjung', 'admin', '2024-09-14 06:17:19', '2024-11-20 15:29:45'),
(4, 'pengelola wisata', 'admin', '2024-11-20 15:30:15', '2024-11-20 15:30:15');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(1, 3),
(1, 4),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1);

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
(5, 'TIKET-KFWBR3', 1, 3, 'confirm', '2024-11-20', '2024-11-20 18:27:00', '2024-11-20 18:27:00', 123, 24600000, NULL, 'development', 'development@gmail.com', '909299319839'),
(6, 'TIKET-QIHUFI', 1, 3, 'confirm', '2024-11-20', '2024-11-20 18:28:17', '2024-11-20 18:28:17', 2, 400000, NULL, 'daka', 'asdasdas@gmail.com', '097987090'),
(7, 'TIKET-AK20LJ', 5, 3, 'confirm', '2024-11-20', '2024-11-20 18:38:26', '2024-11-20 18:38:26', 3, 600000, NULL, 'daka', 'daka@gmail.com', '097987090'),
(8, 'TIKET-BO3J1Z', 6, 3, 'confirm', '2024-11-20', '2024-11-20 18:38:55', '2024-11-20 18:38:55', 10, 2000000, NULL, 'dakatest', 'test@gmail.com', '097987090234');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, 'Toraja', 'testsadas', 'Bekasi', 200000.00, 23, 20000, '2024-11-20 09:31:38', '2024-11-20 09:31:38'),
(5, 'Toraja 2', 'Deskripsi toraja 2', 'Sulawesi', 100000.00, 200, 20000, '2024-11-20 16:34:58', '2024-11-20 16:34:58'),
(6, 'Toraja 3', NULL, 'Sulawesi', 100000.00, 200, 20000, '2024-11-20 16:42:58', '2024-11-20 16:42:58'),
(7, 'Toraja 4', 'Halooo selamat datang', 'Sulawesi', 100000.00, 200, 20000, '2024-11-20 16:43:56', '2024-11-20 16:43:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_username_unique` (`username`);

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
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review_222058`
--
ALTER TABLE `review_222058`
  ADD PRIMARY KEY (`id_222058`),
  ADD KEY `pengguna_id_222058` (`pengguna_id_222058`),
  ADD KEY `wisata_id_222058` (`wisata_id_222058`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `tiket_222058`
--
ALTER TABLE `tiket_222058`
  ADD PRIMARY KEY (`id_222058`),
  ADD KEY `wisata_id_222058` (`wisata_id_222058`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wisata_222058`
--
ALTER TABLE `wisata_222058`
  ADD PRIMARY KEY (`id_222058`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favorit_222058`
--
ALTER TABLE `favorit_222058`
  MODIFY `id_222058` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foto_wisata_222058`
--
ALTER TABLE `foto_wisata_222058`
  MODIFY `id_222058` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `jasa_travel_222058`
--
ALTER TABLE `jasa_travel_222058`
  MODIFY `id_222058` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pembayaran_222058`
--
ALTER TABLE `pembayaran_222058`
  MODIFY `id_222058` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengguna_222058`
--
ALTER TABLE `pengguna_222058`
  MODIFY `id_222058` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `review_222058`
--
ALTER TABLE `review_222058`
  MODIFY `id_222058` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tiket_222058`
--
ALTER TABLE `tiket_222058`
  MODIFY `id_222058` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wisata_222058`
--
ALTER TABLE `wisata_222058`
  MODIFY `id_222058` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tiket_222058`
--
ALTER TABLE `tiket_222058`
  ADD CONSTRAINT `tiket_222058_ibfk_2` FOREIGN KEY (`wisata_id_222058`) REFERENCES `wisata_222058` (`id_222058`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
