-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2023 at 02:16 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_spk_pkh`
--

-- --------------------------------------------------------

--
-- Table structure for table `calon_pkhs`
--

CREATE TABLE `calon_pkhs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `calon_pkhs`
--

INSERT INTO `calon_pkhs` (`id`, `nik`, `nama`, `alamat`) VALUES
(7, '1234567', 'qwertyu', 'frdgtfyguhkgjfjljkhg'),
(9, '1234456', 'debi', 'jakarta'),
(10, '888888', 'syndi', 'jak');

-- --------------------------------------------------------

--
-- Table structure for table `criterias`
--

CREATE TABLE `criterias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `criterias`
--

INSERT INTO `criterias` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'Kepemilikan Rumah', '2023-10-10 07:02:28', '2023-10-10 07:02:28'),
(3, 'Jenis Lantai', '2023-10-10 07:03:09', '2023-10-10 07:03:09'),
(4, 'Jenis Dinding', '2023-10-10 07:03:22', '2023-10-10 07:03:22'),
(5, 'Sumber Penerangan', '2023-10-10 07:03:34', '2023-10-10 07:03:34'),
(6, 'Pekerjaan', '2023-10-10 07:03:44', '2023-10-10 07:03:44'),
(7, 'Kepemilikan Binatang', '2023-10-10 07:04:04', '2023-10-10 07:04:04'),
(8, 'Tanggungan', '2023-10-10 07:04:24', '2023-10-10 07:04:24'),
(9, 'Penghasilan', '2023-10-10 07:04:37', '2023-10-10 07:04:37');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_terbobots`
--

CREATE TABLE `kriteria_terbobots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bobot` double(8,2) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 1,
  `min` double(8,2) DEFAULT NULL,
  `max` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(8, '2014_10_12_000000_create_users_table', 1),
(9, '2014_10_12_100000_create_password_resets_table', 1),
(10, '2019_08_19_000000_create_failed_jobs_table', 1),
(11, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(12, '2023_07_30_061817_create_criterias_table', 1),
(13, '2023_07_30_062354_create_ratio_criterias_table', 1),
(14, '2023_10_08_145401_create_calon_pkhs_table', 1),
(15, '2023_10_24_090310_create_kriteria_terbobots_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ratio_criterias`
--

CREATE TABLE `ratio_criterias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `h_criteria_id` int(10) UNSIGNED NOT NULL,
  `v_criteria_id` int(10) UNSIGNED NOT NULL,
  `value` double(8,2) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratio_criterias`
--

INSERT INTO `ratio_criterias` (`id`, `h_criteria_id`, `v_criteria_id`, `value`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 1.00, '2023-10-10 07:07:26', '2023-10-10 07:07:26'),
(2, 2, 3, 1.00, '2023-10-10 07:07:26', '2023-10-10 07:07:26'),
(3, 4, 2, 1.00, '2023-10-10 07:07:42', '2023-10-10 07:07:42'),
(4, 2, 4, 1.00, '2023-10-10 07:07:42', '2023-10-10 07:07:42'),
(5, 5, 2, 2.00, '2023-10-10 07:07:52', '2023-10-10 07:07:52'),
(6, 2, 5, 0.50, '2023-10-10 07:07:52', '2023-10-10 07:07:52'),
(7, 6, 2, 2.00, '2023-10-10 07:08:29', '2023-10-10 07:08:29'),
(8, 2, 6, 0.50, '2023-10-10 07:08:29', '2023-10-10 07:08:29'),
(9, 7, 2, 2.00, '2023-10-10 07:08:39', '2023-10-10 07:08:39'),
(10, 2, 7, 0.50, '2023-10-10 07:08:39', '2023-10-10 07:08:39'),
(11, 8, 2, 2.00, '2023-10-10 07:09:02', '2023-10-10 07:09:02'),
(12, 2, 8, 0.50, '2023-10-10 07:09:02', '2023-10-10 07:09:02'),
(13, 9, 2, 3.00, '2023-10-10 07:09:26', '2023-10-10 07:09:26'),
(14, 2, 9, 0.33, '2023-10-10 07:09:26', '2023-10-10 07:09:26'),
(15, 4, 3, 1.00, '2023-10-10 07:16:31', '2023-10-10 07:16:31'),
(16, 3, 4, 1.00, '2023-10-10 07:16:31', '2023-10-10 07:16:31'),
(17, 5, 3, 2.00, '2023-10-10 07:17:00', '2023-10-10 07:17:00'),
(18, 3, 5, 0.50, '2023-10-10 07:17:00', '2023-10-10 07:17:00'),
(19, 6, 3, 2.00, '2023-10-10 20:00:57', '2023-10-10 20:00:57'),
(20, 3, 6, 0.50, '2023-10-10 20:00:57', '2023-10-10 20:00:57'),
(21, 7, 3, 1.00, '2023-10-10 20:02:06', '2023-10-10 20:02:06'),
(22, 3, 7, 1.00, '2023-10-10 20:02:06', '2023-10-10 20:02:06'),
(23, 8, 3, 2.00, '2023-10-10 20:02:23', '2023-10-10 20:02:23'),
(24, 3, 8, 0.50, '2023-10-10 20:02:23', '2023-10-10 20:02:23'),
(25, 9, 3, 1.00, '2023-10-10 20:02:35', '2023-10-10 20:02:35'),
(26, 3, 9, 1.00, '2023-10-10 20:02:35', '2023-10-10 20:02:35'),
(27, 5, 4, 1.00, '2023-10-10 20:02:57', '2023-10-10 20:02:57'),
(28, 4, 5, 1.00, '2023-10-10 20:02:57', '2023-10-10 20:02:57'),
(29, 6, 4, 2.00, '2023-10-10 20:03:27', '2023-10-10 20:03:27'),
(30, 4, 6, 0.50, '2023-10-10 20:03:27', '2023-10-10 20:03:27'),
(31, 7, 4, 1.00, '2023-10-10 20:03:41', '2023-10-10 20:03:41'),
(32, 4, 7, 1.00, '2023-10-10 20:03:41', '2023-10-10 20:03:41'),
(33, 8, 4, 2.00, '2023-10-10 20:03:59', '2023-10-10 20:03:59'),
(34, 4, 8, 0.50, '2023-10-10 20:03:59', '2023-10-10 20:03:59'),
(35, 9, 4, 1.00, '2023-10-10 20:04:11', '2023-10-10 20:04:11'),
(36, 4, 9, 1.00, '2023-10-10 20:04:11', '2023-10-10 20:04:11'),
(37, 6, 5, 3.00, '2023-10-10 20:05:57', '2023-10-10 20:05:57'),
(38, 5, 6, 0.33, '2023-10-10 20:05:57', '2023-10-10 20:05:57'),
(39, 7, 5, 1.00, '2023-10-10 20:06:57', '2023-10-10 20:06:57'),
(40, 5, 7, 1.00, '2023-10-10 20:06:57', '2023-10-10 20:06:57'),
(41, 8, 5, 3.00, '2023-10-10 20:07:18', '2023-10-10 20:07:18'),
(42, 5, 8, 0.33, '2023-10-10 20:07:18', '2023-10-10 20:07:18'),
(43, 9, 5, 3.00, '2023-10-10 20:07:33', '2023-10-10 20:07:33'),
(44, 5, 9, 0.33, '2023-10-10 20:07:33', '2023-10-10 20:07:33'),
(45, 7, 6, 2.00, '2023-10-10 20:08:22', '2023-10-10 20:08:22'),
(46, 6, 7, 0.50, '2023-10-10 20:08:22', '2023-10-10 20:08:22'),
(47, 8, 6, 3.00, '2023-10-10 20:08:35', '2023-10-10 20:08:35'),
(48, 6, 8, 0.33, '2023-10-10 20:08:35', '2023-10-10 20:08:35'),
(49, 9, 6, 3.00, '2023-10-10 20:09:18', '2023-10-10 20:09:18'),
(50, 6, 9, 0.33, '2023-10-10 20:09:18', '2023-10-10 20:09:18'),
(51, 8, 7, 3.00, '2023-10-10 20:10:20', '2023-10-10 20:10:20'),
(52, 7, 8, 0.33, '2023-10-10 20:10:20', '2023-10-10 20:10:20'),
(53, 9, 7, 3.00, '2023-10-10 20:10:32', '2023-10-10 20:10:32'),
(54, 7, 9, 0.33, '2023-10-10 20:10:32', '2023-10-10 20:10:32'),
(55, 9, 8, 3.00, '2023-10-10 20:11:15', '2023-10-10 20:11:15'),
(56, 8, 9, 0.33, '2023-10-10 20:11:15', '2023-10-10 20:11:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(1) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'super', 'super1@gmail.com', 2, NULL, '$2y$10$3WxFP2ZYvYJCsbLVEDb3QOEzrW1OzUxUUkBXW7oEkGtzCtlpWAErC', NULL, '2023-10-08 10:53:35', '2023-10-08 10:53:35'),
(3, 'admiin', 'adminn@gmail.com', NULL, NULL, '$2y$10$k7nyBNM9FjJ1I50OkMV60u1MRH4mgQFn7u9yVZSrqih7tWfQ5Kur6', NULL, '2023-10-21 00:29:50', '2023-10-21 00:29:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `calon_pkhs`
--
ALTER TABLE `calon_pkhs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `criterias`
--
ALTER TABLE `criterias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `criterias_name_unique` (`name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kriteria_terbobots`
--
ALTER TABLE `kriteria_terbobots`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `ratio_criterias`
--
ALTER TABLE `ratio_criterias`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `calon_pkhs`
--
ALTER TABLE `calon_pkhs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `criterias`
--
ALTER TABLE `criterias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kriteria_terbobots`
--
ALTER TABLE `kriteria_terbobots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ratio_criterias`
--
ALTER TABLE `ratio_criterias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
