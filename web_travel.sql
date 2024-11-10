-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2024 at 08:19 PM
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
(1, 'Super Admin', 'superadmin@gmail.com', 'superadmin', NULL, '$2y$10$RC07kinPd3eT5NoczoHq3eIjKvaMg1bmvioqQfxpNVBnsOKvjtiIW', NULL, '2024-09-13 15:06:22', '2024-09-13 15:06:22');

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
-- Table structure for table `forms`
--

CREATE TABLE `forms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_monitoring` date NOT NULL,
  `nama_petugas` varchar(255) NOT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longtitude` varchar(255) DEFAULT NULL,
  `no_kk` varchar(255) NOT NULL,
  `nama_kepala_keluarga` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `rt` varchar(255) NOT NULL,
  `rw` varchar(255) NOT NULL,
  `jumlah_jiwa` varchar(255) NOT NULL,
  `jumlah_jiwa_menetap` varchar(255) NOT NULL,
  `desa_kelurahan` varchar(255) NOT NULL,
  `pertanyaan_1_pilar_1` varchar(255) NOT NULL,
  `pertanyaan_2_pilar_1` varchar(255) NOT NULL,
  `pertanyaan_3_pilar_1` varchar(255) NOT NULL,
  `pertanyaan_4_pilar_1` varchar(255) NOT NULL,
  `pertanyaan_5_pilar_1` varchar(255) NOT NULL,
  `pertanyaan_6_pilar_1` varchar(255) NOT NULL,
  `pertanyaan_7_pilar_1` varchar(255) NOT NULL,
  `pertanyaan_1_pilar_2` varchar(255) NOT NULL,
  `pertanyaan_2_pilar_2` varchar(255) NOT NULL,
  `pertanyaan_3_pilar_2` varchar(255) NOT NULL,
  `pertanyaan_4_pilar_2` varchar(255) NOT NULL,
  `pertanyaan_5_pilar_2` varchar(255) NOT NULL,
  `pertanyaan_6_pilar_2` varchar(255) NOT NULL,
  `pertanyaan_7_pilar_2` varchar(255) NOT NULL,
  `pertanyaan_8_pilar_2` varchar(255) NOT NULL,
  `pertanyaan_1_pilar_3` varchar(255) NOT NULL,
  `pertanyaan_2_pilar_3` varchar(255) NOT NULL,
  `pertanyaan_3_pilar_3` varchar(255) NOT NULL,
  `pertanyaan_4_pilar_3` varchar(255) NOT NULL,
  `pertanyaan_5_pilar_3` varchar(255) NOT NULL,
  `pertanyaan_6_pilar_3` varchar(255) NOT NULL,
  `pertanyaan_7_pilar_3` varchar(255) NOT NULL,
  `pertanyaan_8_pilar_3` varchar(255) NOT NULL,
  `pertanyaan_9_pilar_3` varchar(255) NOT NULL,
  `pertanyaan_10_pilar_3` varchar(255) NOT NULL,
  `pertanyaan_11_pilar_3` varchar(255) NOT NULL,
  `pertanyaan_12_pilar_3` varchar(255) NOT NULL,
  `pertanyaan_13_pilar_3` varchar(255) NOT NULL,
  `pertanyaan_14_pilar_3` varchar(255) NOT NULL,
  `pertanyaan_15_pilar_3` varchar(255) NOT NULL,
  `pertanyaan_16_pilar_3` varchar(255) NOT NULL,
  `pertanyaan_1_pilar_4` varchar(255) NOT NULL,
  `pertanyaan_2_pilar_4` varchar(255) NOT NULL,
  `pertanyaan_3_pilar_4` varchar(255) NOT NULL,
  `pertanyaan_4_pilar_4` varchar(255) NOT NULL,
  `pertanyaan_1_pilar_5` varchar(255) NOT NULL,
  `pertanyaan_2_pilar_5` varchar(255) NOT NULL,
  `pertanyaan_3_pilar_5` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dusun_posyandu` varchar(255) DEFAULT NULL,
  `pertanyaan_phbs_1` int(11) DEFAULT NULL,
  `pertanyaan_phbs_2` int(11) DEFAULT NULL,
  `pertanyaan_phbs_3` int(11) DEFAULT NULL,
  `pertanyaan_phbs_4` int(11) DEFAULT NULL,
  `pertanyaan_phbs_5` int(11) DEFAULT NULL,
  `pertanyaan_phbs_6` int(11) DEFAULT NULL,
  `pertanyaan_phbs_7` int(11) DEFAULT NULL,
  `pertanyaan_phbs_8` int(11) DEFAULT NULL,
  `pertanyaan_phbs_9` int(11) DEFAULT NULL,
  `pertanyaan_phbs_10` int(11) DEFAULT NULL,
  `pertanyaan_phbs_11` int(11) DEFAULT NULL,
  `pertanyaan_phbs_12` int(11) DEFAULT NULL,
  `pertanyaan_phbs_13` int(11) DEFAULT NULL,
  `pertanyaan_phbs_14` int(11) DEFAULT NULL,
  `pertanyaan_phbs_15` int(11) DEFAULT NULL,
  `pertanyaan_phbs_16` int(11) DEFAULT NULL,
  `pertanyaan_phbs_17` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forms`
--

INSERT INTO `forms` (`id`, `id_user`, `tanggal_monitoring`, `nama_petugas`, `latitude`, `longtitude`, `no_kk`, `nama_kepala_keluarga`, `alamat`, `rt`, `rw`, `jumlah_jiwa`, `jumlah_jiwa_menetap`, `desa_kelurahan`, `pertanyaan_1_pilar_1`, `pertanyaan_2_pilar_1`, `pertanyaan_3_pilar_1`, `pertanyaan_4_pilar_1`, `pertanyaan_5_pilar_1`, `pertanyaan_6_pilar_1`, `pertanyaan_7_pilar_1`, `pertanyaan_1_pilar_2`, `pertanyaan_2_pilar_2`, `pertanyaan_3_pilar_2`, `pertanyaan_4_pilar_2`, `pertanyaan_5_pilar_2`, `pertanyaan_6_pilar_2`, `pertanyaan_7_pilar_2`, `pertanyaan_8_pilar_2`, `pertanyaan_1_pilar_3`, `pertanyaan_2_pilar_3`, `pertanyaan_3_pilar_3`, `pertanyaan_4_pilar_3`, `pertanyaan_5_pilar_3`, `pertanyaan_6_pilar_3`, `pertanyaan_7_pilar_3`, `pertanyaan_8_pilar_3`, `pertanyaan_9_pilar_3`, `pertanyaan_10_pilar_3`, `pertanyaan_11_pilar_3`, `pertanyaan_12_pilar_3`, `pertanyaan_13_pilar_3`, `pertanyaan_14_pilar_3`, `pertanyaan_15_pilar_3`, `pertanyaan_16_pilar_3`, `pertanyaan_1_pilar_4`, `pertanyaan_2_pilar_4`, `pertanyaan_3_pilar_4`, `pertanyaan_4_pilar_4`, `pertanyaan_1_pilar_5`, `pertanyaan_2_pilar_5`, `pertanyaan_3_pilar_5`, `created_at`, `updated_at`, `dusun_posyandu`, `pertanyaan_phbs_1`, `pertanyaan_phbs_2`, `pertanyaan_phbs_3`, `pertanyaan_phbs_4`, `pertanyaan_phbs_5`, `pertanyaan_phbs_6`, `pertanyaan_phbs_7`, `pertanyaan_phbs_8`, `pertanyaan_phbs_9`, `pertanyaan_phbs_10`, `pertanyaan_phbs_11`, `pertanyaan_phbs_12`, `pertanyaan_phbs_13`, `pertanyaan_phbs_14`, `pertanyaan_phbs_15`, `pertanyaan_phbs_16`, `pertanyaan_phbs_17`) VALUES
(3, 2, '2024-09-14', 'Lorem ut consequat', 'Sit magna et duis id', 'Consequuntur proiden', '3294992349328043820', 'Repellendus Ullam a', 'Omnis commodo velit', '46', '11', '24', '81', 'Desa Cikuya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Tidak', 'Ya', 'Ya', 'Ya', 'Ya', 'Tidak', 'Ya', 'Tidak', 'Ya', 'Ya', 'Tidak', 'Ya', 'Ya', 'Ya', 'Tidak', 'Tidak', 'Tidak', 'Tidak', 'Ya', 'Ya', 'Ya', 'Tidak', 'Ya', 'Tidak', 'Tidak', 'Ya', 'Ya', 'Tidak', 'Ya', 'Tidak', 'Ya', 'Ya', '2024-09-14 06:41:12', '2024-11-04 08:10:03', 'test', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 1, '2024-09-15', 'Petugas Superadmin 123', 'Eiusmod quos cupidit', 'Ad doloribus commodo', 'Voluptas aut vel vel', 'Esse irure dolore as', 'Cupiditate praesenti', '25', '58', '81', '42', 'Fugiat magni neque', 'Ya', 'Tidak', 'Ya', 'Tidak', 'Tidak', 'Tidak', 'Ya', 'Ya', 'Ya', 'Ya', 'Tidak', 'Tidak', 'Tidak', 'Ya', 'Tidak', 'Tidak', 'Tidak', 'Ya', 'Ya', 'Tidak', 'Ya', 'Tidak', 'Tidak', 'Ya', 'Ya', 'Tidak', 'Ya', 'Tidak', 'Ya', 'Ya', 'Ya', 'Tidak', 'Ya', 'Tidak', 'Tidak', 'Tidak', 'Ya', 'Ya', '2024-09-14 06:50:50', '2024-09-14 06:52:35', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 2, '2024-09-12', 'Petugas Andaka 123', 'Ex nisi et omnis rem', 'Tempora ut quos mole', 'Autem voluptatem In', 'Excepturi adipisicin', 'Aperiam dolores volu', '4', '12', '89', '16', 'Desa Mekarlaksana', 'Tidak', 'Ya', 'Ya', 'Tidak', 'Ya', 'Tidak', 'Tidak', 'Ya', 'Tidak', 'Tidak', 'Ya', 'Ya', 'Ya', 'Ya', 'Tidak', 'Tidak', 'Tidak', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Tidak', 'Ya', 'Ya', 'Tidak', 'Tidak', 'Tidak', 'Ya', 'Ya', 'Tidak', 'Ya', 'Ya', 'Tidak', 'Ya', 'Ya', 'Tidak', 'Ya', '2024-09-14 06:57:26', '2024-09-14 07:42:05', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 2, '2024-09-14', 'Incidunt voluptas u', 'Alias nihil non ut d', 'Qui eligendi reicien', 'Temporibus et offici', 'Minim doloremque lib', 'In sit recusandae C', '88', '67', '53', '55', 'Desa Bojongsari', 'Ya', 'Tidak', 'Ya', 'Tidak', 'Tidak', 'Ya', 'Ya', 'Tidak', 'Tidak', 'Tidak', 'Ya', 'Ya', 'Tidak', 'Ya', 'Tidak', 'Tidak', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Ya', 'Tidak', 'Ya', 'Tidak', 'Ya', 'Tidak', 'Tidak', 'Tidak', 'Ya', 'Tidak', 'Ya', 'Tidak', 'Tidak', 'Ya', 'Tidak', 'Ya', 'Tidak', '2024-09-14 07:44:01', '2024-09-14 07:44:01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 1, '2024-09-19', 'Eligendi earum quam', 'Vitae explicabo Sit', 'Quas adipisci in cor', 'Et dolores qui illo', 'Testing', 'Lorem deleniti eu eo', '28', '90', '22', '1', 'Desa Cipicung', 'Tidak', 'Tidak', 'Tidak', 'Ya', 'Ya', 'Tidak', 'Tidak', 'Ya', 'Ya', 'Tidak', 'Tidak', 'Ya', 'Ya', 'Ya', 'Ya', 'Tidak', 'Tidak', 'Ya', 'Tidak', 'Ya', 'Tidak', 'Ya', 'Tidak', 'Ya', 'Tidak', 'Tidak', 'Tidak', 'Ya', 'Ya', 'Ya', 'Ya', 'Tidak', 'Ya', 'Tidak', 'Ya', 'Tidak', 'Tidak', 'Tidak', '2024-09-19 04:06:27', '2024-09-19 04:06:27', 'Dusun 1', 1, 1, 1, 0, 1, 1, 0, 0, 1, 0, 0, 0, 0, 1, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `foto_wisatas`
--

CREATE TABLE `foto_wisatas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_wisata` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `foto_wisatas`
--

INSERT INTO `foto_wisatas` (`id`, `id_wisata`, `foto`, `created_at`, `updated_at`) VALUES
(1, 1, 'public/foto_wisata/n6lHjehBvUDeUffgxQ1oZ8D6FQhdJeWZqiUlnW7k.webp', '2024-11-10 18:42:41', '2024-11-10 18:42:41'),
(2, 1, 'public/foto_wisata/ov5pDAErQsbxJHzZzKi9I6dFraTSD1nstRzqfdpL.jpg', '2024-11-10 18:42:41', '2024-11-10 18:42:41'),
(6, 1, '1-1731265470.jpg', '2024-11-10 19:04:30', '2024-11-10 19:04:30');

-- --------------------------------------------------------

--
-- Table structure for table `jasa_travel`
--

CREATE TABLE `jasa_travel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_wisata` int(11) NOT NULL,
  `nama_travel` varchar(255) NOT NULL,
  `jenis_kendaraan` varchar(255) NOT NULL,
  `tarif` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jasa_travel`
--

INSERT INTO `jasa_travel` (`id`, `id_wisata`, `nama_travel`, `jenis_kendaraan`, `tarif`, `created_at`, `updated_at`) VALUES
(10, 1, 'Alias quaerat impedi', 'Enim labore quia rep', '32', '2024-11-10 19:04:30', '2024-11-10 19:04:30'),
(11, 1, 'Obcaecati ipsam sunt', 'Et quis nemo qui quo', '88', '2024-11-10 19:04:30', '2024-11-10 19:04:30'),
(12, 1, 'Magni reprehenderit', 'Minus elit natus sa', '65', '2024-11-10 19:04:30', '2024-11-10 19:04:30');

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
(1, 'App\\Models\\Admin', 1);

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
(3, 'user', 'admin', '2024-09-14 06:17:19', '2024-09-14 06:17:19');

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
-- Table structure for table `wisatas`
--

CREATE TABLE `wisatas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_wisata` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `harga_tiket` varchar(255) NOT NULL,
  `jumlah_tiket` int(11) NOT NULL,
  `jumlah_gazebo` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wisatas`
--

INSERT INTO `wisatas` (`id`, `nama_wisata`, `deskripsi`, `lokasi`, `harga_tiket`, `jumlah_tiket`, `jumlah_gazebo`, `created_at`, `updated_at`) VALUES
(1, 'Error pariatur Repu', 'Irure officia est re', 'Rerum enim in vel od', '40', 46, 47, '2024-11-10 18:42:40', '2024-11-10 18:42:40');

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
-- Indexes for table `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foto_wisatas`
--
ALTER TABLE `foto_wisatas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jasa_travel`
--
ALTER TABLE `jasa_travel`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wisatas`
--
ALTER TABLE `wisatas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forms`
--
ALTER TABLE `forms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `foto_wisatas`
--
ALTER TABLE `foto_wisatas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jasa_travel`
--
ALTER TABLE `jasa_travel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wisatas`
--
ALTER TABLE `wisatas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

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
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
