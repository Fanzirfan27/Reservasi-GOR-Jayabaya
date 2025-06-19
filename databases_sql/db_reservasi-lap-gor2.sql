-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 16, 2025 at 07:24 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_reservasi-lap-gor2`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `field_id` bigint UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `nama_kontak` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp_kontak` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_kontak` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_booking` int DEFAULT NULL,
  `status` enum('Pending','Approved','Done','Rejected') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `field_id`, `tanggal`, `jam_mulai`, `jam_selesai`, `nama_kontak`, `no_hp_kontak`, `alamat_kontak`, `harga_booking`, `status`, `created_at`, `updated_at`) VALUES
(5, 4, 3, '2025-05-31', '10:00:00', '11:00:00', 'purinahdatul', '+628129291192', 'tulungagung', 90000, 'Rejected', '2025-05-29 21:22:28', '2025-05-30 15:21:16'),
(6, 6, 3, '2025-05-31', '20:00:00', '21:00:00', 'bima', '0198289291', 'kedirii', 120000, 'Rejected', '2025-05-30 01:45:33', '2025-05-30 15:18:28'),
(7, 4, 1, '2025-05-31', '10:00:00', '11:00:00', 'purinahdatul', '+628129291192', 'tulungagung', 70000, 'Approved', '2025-05-30 07:46:24', '2025-05-30 07:49:03'),
(8, 4, 1, '2025-05-31', '12:00:00', '13:00:00', 'purinahdatul', '+628129291192', 'tulungagung', 70000, 'Done', '2025-05-30 07:46:50', '2025-06-01 01:07:23'),
(9, 4, 1, '2025-05-31', '21:00:00', '22:00:00', 'purinahdatul', '+628129291192', 'tulungagung', 120000, 'Done', '2025-05-30 07:48:02', '2025-05-30 08:17:23'),
(10, 4, 3, '2025-06-01', '10:00:00', '11:00:00', 'purinahdatul', '+628129291192', 'tulungagung', 90000, 'Pending', '2025-05-30 23:07:12', '2025-05-30 23:07:12'),
(11, 4, 1, '2025-05-31', '14:00:00', '15:00:00', 'purinahdatul', '+628129291192', 'tulungagung', 70000, 'Pending', '2025-05-31 00:07:51', '2025-05-31 00:07:51'),
(12, 4, 2, '2025-05-31', '12:00:00', '13:00:00', 'purinahdatul', '+628129291192', 'tulungagung', 50000, 'Pending', '2025-05-31 07:43:23', '2025-05-31 07:43:23'),
(13, 4, 3, '2025-06-02', '11:00:00', '13:00:00', 'purinahdatul', '+628129291192', 'tulungagung', 180000, 'Approved', '2025-06-01 01:05:50', '2025-06-01 01:06:51'),
(14, 4, 1, '2025-06-20', '09:10:00', '10:10:00', 'purinahdatul', '+628129291192', 'tulungagung', 70000, 'Done', '2025-06-13 04:15:29', '2025-06-13 04:19:33');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fields`
--

CREATE TABLE `fields` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_lapangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis` enum('futsal','basket','voli') COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fields`
--

INSERT INTO `fields` (`id`, `nama_lapangan`, `jenis`, `deskripsi`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'lapangan 1', 'futsal', 'Ini lapangan Futsall', '1746882933_Lap-Futsal1.jpg', '2025-04-10 07:25:22', '2025-05-10 06:15:33'),
(2, 'lapangan 1', 'basket', 'ini lapangan basket', '1745416853_basket.png', '2025-04-23 07:00:53', '2025-04-23 07:00:53'),
(3, 'lapangan 2', 'futsal', 'ini lapangan ke 2 futsal', '1746883546_Lap-Futsal2.jpg', '2025-05-08 05:44:39', '2025-05-10 06:25:46');

-- --------------------------------------------------------

--
-- Table structure for table `fields_prices`
--

CREATE TABLE `fields_prices` (
  `id` bigint UNSIGNED NOT NULL,
  `field_id` bigint UNSIGNED NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `harga` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fields_prices`
--

INSERT INTO `fields_prices` (`id`, `field_id`, `jam_mulai`, `jam_selesai`, `harga`, `created_at`, `updated_at`) VALUES
(1, 1, '20:00:00', '23:00:00', 120000, '2025-04-10 08:25:38', '2025-04-10 08:25:38'),
(2, 1, '06:30:00', '16:30:00', 70000, '2025-04-10 08:29:59', '2025-04-10 08:29:59'),
(3, 2, '10:00:00', '16:00:00', 50000, '2025-04-27 20:57:23', '2025-04-27 20:57:23'),
(4, 3, '09:00:00', '16:00:00', 90000, '2025-05-08 05:45:09', '2025-05-08 05:45:09'),
(5, 3, '16:00:00', '22:00:00', 120000, '2025-05-08 05:45:34', '2025-05-08 05:45:34');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laporan_pendapatan`
--

CREATE TABLE `laporan_pendapatan` (
  `id` bigint UNSIGNED NOT NULL,
  `booking_id` bigint UNSIGNED NOT NULL,
  `tanggal_laporan` date NOT NULL,
  `nama_pemesan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_lapangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `harga_booking` int NOT NULL,
  `status_pembayaran` enum('Pending','Done','Rejected') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laporan_pendapatan`
--

INSERT INTO `laporan_pendapatan` (`id`, `booking_id`, `tanggal_laporan`, `nama_pemesan`, `nama_lapangan`, `tanggal`, `jam_mulai`, `jam_selesai`, `harga_booking`, `status_pembayaran`, `created_at`, `updated_at`) VALUES
(1, 9, '2025-06-13', 'purinahdatul', 'lapangan 1', '2025-05-31', '21:00:00', '22:00:00', 120000, 'Done', '2025-05-31 14:18:08', '2025-06-13 04:22:36'),
(2, 5, '2025-06-13', 'purinahdatul', 'lapangan 2', '2025-05-31', '10:00:00', '11:00:00', 90000, 'Rejected', '2025-05-31 14:44:03', '2025-06-13 04:22:36'),
(3, 6, '2025-06-13', 'bima', 'lapangan 2', '2025-05-31', '20:00:00', '21:00:00', 120000, 'Rejected', '2025-05-31 14:44:03', '2025-06-13 04:22:36'),
(4, 7, '2025-06-13', 'purinahdatul', 'lapangan 1', '2025-05-31', '10:00:00', '11:00:00', 70000, 'Pending', '2025-05-31 14:44:03', '2025-06-13 04:22:36'),
(5, 8, '2025-06-13', 'purinahdatul', 'lapangan 1', '2025-05-31', '12:00:00', '13:00:00', 70000, 'Done', '2025-05-31 14:44:03', '2025-06-13 04:22:36'),
(6, 10, '2025-06-13', 'purinahdatul', 'lapangan 2', '2025-06-01', '10:00:00', '11:00:00', 90000, 'Pending', '2025-05-31 14:44:03', '2025-06-13 04:22:36'),
(7, 11, '2025-06-13', 'purinahdatul', 'lapangan 1', '2025-05-31', '14:00:00', '15:00:00', 70000, 'Pending', '2025-05-31 14:44:03', '2025-06-13 04:22:36'),
(8, 12, '2025-06-13', 'purinahdatul', 'lapangan 1', '2025-05-31', '12:00:00', '13:00:00', 50000, 'Pending', '2025-05-31 14:44:03', '2025-06-13 04:22:36'),
(9, 13, '2025-06-13', 'purinahdatul', 'lapangan 2', '2025-06-02', '11:00:00', '13:00:00', 180000, 'Pending', '2025-06-01 01:08:00', '2025-06-13 04:22:36'),
(10, 14, '2025-06-13', 'purinahdatul', 'lapangan 1', '2025-06-20', '09:10:00', '10:10:00', 70000, 'Done', '2025-06-13 04:22:36', '2025-06-13 04:22:36');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_04_08_143705_create_fields_table', 1),
(5, '2025_04_08_150709_create_fields_prices_table', 1),
(6, '2025_05_02_034124_create_bookings_table', 2),
(7, '2025_05_02_041305_add_harga_booking_to_bookings_table', 3),
(11, '2025_05_03_033902_add_users_table', 5),
(12, '2025_05_02_123603_create_payments_table', 6),
(13, '2025_05_31_210015_create_laporan_pendapatan_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint UNSIGNED NOT NULL,
  `booking_id` bigint UNSIGNED NOT NULL,
  `bukti_struk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int NOT NULL,
  `status` enum('pending','done','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `booking_id`, `bukti_struk`, `jumlah`, `status`, `created_at`, `updated_at`) VALUES
(1, 6, 'public/bukti_struk/CshLC7W89UOT9wwrkqtxP3V3jo65PmPNxADrHrEV.jpg', 120000, 'rejected', '2025-05-30 01:58:35', '2025-05-30 15:18:28'),
(2, 5, 'public/bukti_struk/uvOQMKvplYQZQgZoHwCcvl4OOupJcts8qDgQY2eI.jpg', 90000, 'rejected', '2025-05-30 06:48:20', '2025-05-30 15:21:16'),
(3, 9, 'bukti_struk/KmsgreWSpMaUKzmsX5tFNzpV7tVpcM41ZZnT6dVg.jpg', 120000, 'done', '2025-05-30 07:50:10', '2025-05-30 08:17:23'),
(4, 8, 'bukti_struk/7Wk73xFYyQS0ndG4gWShEsO0RaIWd2sf2Zen1hB2.jpg', 70000, 'done', '2025-06-01 01:04:46', '2025-06-01 01:07:23'),
(5, 14, 'bukti_struk/8ODl8sR6icOEUc3k6ws6fBr4oaZZLp2Ia8kVfNLP.jpg', 70000, 'done', '2025-06-13 04:17:51', '2025-06-13 04:19:33');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('pvhlVkA3RRrAchRWsOR7C5uSgtKZ845LwS7fMXTp', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36 Edg/137.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoickpLYXVnVUtGY0FGOXE2MzlrdTZzRDlPeDI3d1ZwSjRkSExuSEsxMiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9ib29raW5nLzkvZXhwb3J0LXBkZiI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjQ7fQ==', 1749801207),
('XPKIbJ4moMSgwPsUobR5oO7yi6YCgmhWCx5sln18', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36 Edg/137.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZUw2ZXdCOXhXb0xKdnRVNkpYbEZQYVRiSWtFMW5DMmMzY2d3NjBGWiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9wZW55ZXdhYW4tbGFwYW5nYW4vZnV0c2FsIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NDt9', 1750040099);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telp` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `alamat`, `no_telp`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'irfan', 'irfannuril7@gmail.com', NULL, '$2y$12$.8SWGaKG65Qb/Qp0MXeFC.qNRyZREYbkUcIJmV4ZSQ3WYbW2laKdm', NULL, NULL, 'admin', 'Ui4uV0gusqvTDZY5R831Kn6oGPiITY8l57mJjzYV6vlosgCg2Ada9ZQq53Ew', '2025-05-01 17:44:02', '2025-05-02 23:06:37'),
(4, 'purinahdatul', 'puri1@gmail.com', NULL, '$2y$12$2AzuuqpI4Iv/1YSlAXF/k.RnKLohPx7fCIZyOrp.GeCsYqlAuW/cK', 'tulungagung', '+628129291192', 'user', NULL, '2025-05-02 22:18:19', '2025-05-23 16:21:01'),
(5, 'tarkam', 'tarkam1@gmail.com', NULL, '$2y$12$qRtSzOPyLJAWgfCLqAC.VeUPjqRbRqIRRECLFV2YSR7/sPQeFUmFe', NULL, '01821292212', 'admin', NULL, '2025-05-29 05:45:25', '2025-05-29 06:01:16'),
(6, 'bima', 'bima1@gmail.com', NULL, '$2y$12$zccWZ93kDqGvP2i2NPzlu.bB2dB7ayhZx8rlEpF3zwwXS4y.UcG82', NULL, '0198289291', 'user', NULL, '2025-05-29 05:52:28', '2025-05-29 05:52:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_user_id_foreign` (`user_id`),
  ADD KEY `bookings_field_id_foreign` (`field_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fields`
--
ALTER TABLE `fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fields_prices`
--
ALTER TABLE `fields_prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fields_prices_field_id_foreign` (`field_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laporan_pendapatan`
--
ALTER TABLE `laporan_pendapatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laporan_pendapatan_booking_id_foreign` (`booking_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_booking_id_foreign` (`booking_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fields`
--
ALTER TABLE `fields`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fields_prices`
--
ALTER TABLE `fields_prices`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laporan_pendapatan`
--
ALTER TABLE `laporan_pendapatan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_field_id_foreign` FOREIGN KEY (`field_id`) REFERENCES `fields` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fields_prices`
--
ALTER TABLE `fields_prices`
  ADD CONSTRAINT `fields_prices_field_id_foreign` FOREIGN KEY (`field_id`) REFERENCES `fields` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `laporan_pendapatan`
--
ALTER TABLE `laporan_pendapatan`
  ADD CONSTRAINT `laporan_pendapatan_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_booking_id_foreign` FOREIGN KEY (`booking_id`) REFERENCES `bookings` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
