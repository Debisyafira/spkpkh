-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2023 at 07:50 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_pkh`
--

-- --------------------------------------------------------

--
-- Table structure for table `calon_pkhs`
--

CREATE TABLE `calon_pkhs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `calon_pkhs`
--

INSERT INTO `calon_pkhs` (`id`, `nama`, `alamat`) VALUES
(41, 'DAHLIAR', '-'),
(42, 'NURNIDA', '-'),
(43, 'RINTEKA', '-'),
(44, 'ROSNI', '-'),
(45, 'SYAFRIDA', '-');

-- --------------------------------------------------------

--
-- Table structure for table `criterias`
--

CREATE TABLE `criterias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `code` varchar(255) NOT NULL,
  `type` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `criterias`
--

INSERT INTO `criterias` (`id`, `name`, `created_at`, `updated_at`, `code`, `type`) VALUES
(2, 'Kepemilikan Rumah', '2023-10-10 07:02:28', '2023-11-21 11:55:32', 'C1', 1),
(3, 'Jenis Lantai', '2023-10-10 07:03:09', '2023-11-21 11:57:25', 'C2', 1),
(4, 'Jenis Dinding', '2023-10-10 07:03:22', '2023-11-21 11:58:38', 'C3', 1),
(5, 'Sumber Penerangan', '2023-10-10 07:03:34', '2023-11-21 11:58:42', 'C4', 1),
(6, 'Pekerjaan', '2023-10-10 07:03:44', '2023-11-21 11:58:19', 'C5', 1),
(7, 'Kepemilikan Binatang', '2023-10-10 07:04:04', '2023-12-01 22:57:35', 'C6', 0),
(8, 'Tanggungan', '2023-10-10 07:04:24', '2023-11-21 11:57:42', 'C7', 0),
(9, 'Penghasilan', '2023-10-10 07:04:37', '2023-11-21 11:57:53', 'C8', 0);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_terbobots`
--

CREATE TABLE `kriteria_terbobots` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `criteria_id` bigint(20) UNSIGNED NOT NULL,
  `total` double(8,2) NOT NULL,
  `average` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kriteria_terbobots`
--

INSERT INTO `kriteria_terbobots` (`id`, `criteria_id`, `total`, `average`, `created_at`, `updated_at`) VALUES
(1, 2, 1.43, 0.18, NULL, NULL),
(2, 3, 1.21, 0.15, NULL, NULL),
(3, 4, 1.08, 0.14, NULL, NULL),
(4, 5, 1.17, 0.15, NULL, NULL),
(5, 6, 0.95, 0.12, NULL, NULL),
(6, 7, 1.03, 0.13, NULL, NULL),
(7, 8, 0.58, 0.07, NULL, NULL),
(8, 9, 0.54, 0.07, NULL, NULL);

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
(8, '2014_10_12_000000_create_users_table', 1),
(9, '2014_10_12_100000_create_password_resets_table', 1),
(10, '2019_08_19_000000_create_failed_jobs_table', 1),
(11, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(12, '2023_07_30_061817_create_criterias_table', 1),
(13, '2023_07_30_062354_create_ratio_criterias_table', 1),
(17, '2023_11_16_082416_create_subkriteria_table', 3),
(22, '2023_10_24_090310_create_kriteria_terbobots_table', 5),
(23, '2023_11_21_133610_alter_criterias_table', 5),
(27, '2023_10_08_145401_create_calon_pkhs_table', 6),
(28, '2023_11_21_062223_create_pkh_sub_criteria_table', 6);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pkh_sub_criteria`
--

CREATE TABLE `pkh_sub_criteria` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `calon_pkh_id` bigint(20) UNSIGNED NOT NULL,
  `criteria_id` bigint(20) UNSIGNED NOT NULL,
  `subkriteria_id` bigint(20) UNSIGNED NOT NULL,
  `value` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pkh_sub_criteria`
--

INSERT INTO `pkh_sub_criteria` (`id`, `calon_pkh_id`, `criteria_id`, `subkriteria_id`, `value`, `created_at`, `updated_at`) VALUES
(170, 41, 2, 38, '3', '2023-12-03 06:29:26', '2023-12-03 06:29:26'),
(171, 41, 3, 43, '4', '2023-12-03 06:29:26', '2023-12-03 06:29:26'),
(172, 41, 4, 45, '2', '2023-12-03 06:29:26', '2023-12-03 06:29:26'),
(173, 41, 5, 47, '1', '2023-12-03 06:29:26', '2023-12-03 06:29:26'),
(174, 41, 6, 53, '4', '2023-12-03 06:29:26', '2023-12-03 06:29:26'),
(175, 41, 7, 55, '1', '2023-12-03 06:29:26', '2023-12-03 06:29:26'),
(176, 41, 8, 59, '1', '2023-12-03 06:29:26', '2023-12-03 06:29:26'),
(177, 41, 9, 63, '1', '2023-12-03 06:29:26', '2023-12-03 06:29:26'),
(178, 42, 2, 36, '1', '2023-12-03 06:33:08', '2023-12-03 06:33:08'),
(179, 42, 3, 40, '1', '2023-12-03 06:33:08', '2023-12-03 06:33:08'),
(180, 42, 4, 44, '1', '2023-12-03 06:33:08', '2023-12-03 06:33:08'),
(181, 42, 5, 47, '1', '2023-12-03 06:33:08', '2023-12-03 06:33:08'),
(182, 42, 6, 53, '4', '2023-12-03 06:33:08', '2023-12-03 06:33:08'),
(183, 42, 7, 55, '1', '2023-12-03 06:33:09', '2023-12-03 06:33:09'),
(184, 42, 8, 59, '1', '2023-12-03 06:33:09', '2023-12-03 06:33:09'),
(185, 42, 9, 63, '1', '2023-12-03 06:33:09', '2023-12-03 06:33:09'),
(186, 43, 2, 39, '4', '2023-12-03 06:35:32', '2023-12-03 06:35:32'),
(187, 43, 3, 43, '4', '2023-12-03 06:35:32', '2023-12-03 06:35:32'),
(188, 43, 4, 46, '3', '2023-12-03 06:35:32', '2023-12-03 06:35:32'),
(189, 43, 5, 47, '1', '2023-12-03 06:35:32', '2023-12-03 06:35:32'),
(190, 43, 6, 52, '3', '2023-12-03 06:35:32', '2023-12-03 06:35:32'),
(191, 43, 7, 57, '3', '2023-12-03 06:35:32', '2023-12-03 06:35:32'),
(192, 43, 8, 61, '3', '2023-12-03 06:35:32', '2023-12-03 06:35:32'),
(193, 43, 9, 64, '2', '2023-12-03 06:35:32', '2023-12-03 06:35:32'),
(194, 44, 2, 36, '1', '2023-12-03 06:36:29', '2023-12-03 06:36:29'),
(195, 44, 3, 41, '2', '2023-12-03 06:36:29', '2023-12-03 06:36:29'),
(196, 44, 4, 44, '1', '2023-12-03 06:36:29', '2023-12-03 06:36:29'),
(197, 44, 5, 47, '1', '2023-12-03 06:36:29', '2023-12-03 06:36:29'),
(198, 44, 6, 53, '4', '2023-12-03 06:36:29', '2023-12-03 06:36:29'),
(199, 44, 7, 56, '2', '2023-12-03 06:36:29', '2023-12-03 06:36:29'),
(200, 44, 8, 59, '1', '2023-12-03 06:36:29', '2023-12-03 06:36:29'),
(201, 44, 9, 63, '1', '2023-12-03 06:36:29', '2023-12-03 06:36:29'),
(218, 45, 2, 36, '1', '2023-12-03 10:13:43', '2023-12-03 10:13:43'),
(219, 45, 3, 43, '4', '2023-12-03 10:13:43', '2023-12-03 10:13:43'),
(220, 45, 4, 44, '1', '2023-12-03 10:13:43', '2023-12-03 10:13:43'),
(221, 45, 5, 47, '1', '2023-12-03 10:13:43', '2023-12-03 10:13:43'),
(222, 45, 6, 52, '3', '2023-12-03 10:13:43', '2023-12-03 10:13:43'),
(223, 45, 7, 58, '4', '2023-12-03 10:13:43', '2023-12-03 10:13:43'),
(224, 45, 8, 60, '2', '2023-12-03 10:13:43', '2023-12-03 10:13:43'),
(225, 45, 9, 64, '2', '2023-12-03 10:13:43', '2023-12-03 10:13:43');

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
-- Table structure for table `subkriteria`
--

CREATE TABLE `subkriteria` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `nilai` varchar(255) NOT NULL,
  `criteria_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subkriteria`
--

INSERT INTO `subkriteria` (`id`, `name`, `nilai`, `criteria_id`, `created_at`, `updated_at`) VALUES
(36, 'Milik sendiri', '1', 2, '2023-12-01 22:48:50', '2023-12-01 22:48:50'),
(37, 'Milik Orang tua', '2', 2, '2023-12-01 22:49:00', '2023-12-01 22:49:00'),
(38, 'Manumpang', '3', 2, '2023-12-01 22:49:11', '2023-12-01 22:49:11'),
(39, 'Kontrak', '4', 2, '2023-12-01 22:49:25', '2023-12-01 22:49:25'),
(40, 'Granit', '1', 3, '2023-12-01 22:49:43', '2023-12-01 22:49:43'),
(41, 'Kramik', '2', 3, '2023-12-01 22:49:55', '2023-12-01 22:49:55'),
(42, 'Semen', '3', 3, '2023-12-01 22:50:12', '2023-12-01 22:50:12'),
(43, 'Kayu', '4', 3, '2023-12-01 22:50:21', '2023-12-01 22:50:21'),
(44, 'Tembok', '1', 4, '2023-12-01 22:51:27', '2023-12-01 22:51:27'),
(45, 'Kayu', '2', 4, '2023-12-01 22:51:56', '2023-12-01 22:51:56'),
(46, 'Bambu', '3', 4, '2023-12-01 22:52:12', '2023-12-01 22:52:12'),
(47, 'Listrik PLN', '1', 5, '2023-12-01 22:52:40', '2023-12-01 22:52:40'),
(48, 'Non PLN', '2', 5, '2023-12-01 22:52:54', '2023-12-01 22:52:54'),
(49, 'PNS/BUMN/TNI/POLRI', '0', 6, '2023-12-01 22:53:36', '2023-12-01 22:53:36'),
(50, 'Pensiunan', '1', 6, '2023-12-01 22:53:51', '2023-12-01 22:53:51'),
(51, 'Ojek/Sopir', '2', 6, '2023-12-01 22:54:13', '2023-12-01 22:54:13'),
(52, 'Petani/Nelayan/Buruh/Penjahit', '3', 6, '2023-12-01 22:54:50', '2023-12-01 22:54:50'),
(53, 'Ibu rumah tangga', '4', 6, '2023-12-01 22:55:04', '2023-12-01 22:55:04'),
(54, 'Tidak bekerja', '5', 6, '2023-12-01 22:55:17', '2023-12-01 22:55:17'),
(55, '0', '1', 7, '2023-12-01 22:56:05', '2023-12-01 22:56:05'),
(56, '1', '2', 7, '2023-12-01 22:56:15', '2023-12-01 22:56:15'),
(57, '2-5', '3', 7, '2023-12-01 22:56:25', '2023-12-01 22:56:25'),
(58, '>5', '4', 7, '2023-12-01 22:56:39', '2023-12-01 22:56:39'),
(59, '0', '1', 8, '2023-12-01 22:58:13', '2023-12-01 22:58:13'),
(60, '1', '2', 8, '2023-12-01 22:58:21', '2023-12-01 22:58:21'),
(61, '2-5', '3', 8, '2023-12-01 22:58:31', '2023-12-01 22:58:31'),
(62, '>5', '4', 8, '2023-12-01 22:58:40', '2023-12-01 22:58:40'),
(63, '0-500000', '1', 9, '2023-12-01 22:59:08', '2023-12-01 22:59:08'),
(64, '1000000-1500000', '2', 9, '2023-12-01 22:59:22', '2023-12-01 22:59:22'),
(65, '>1500000', '3', 9, '2023-12-01 22:59:31', '2023-12-01 22:59:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` tinyint(1) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `kriteria_terbobots_criteria_id_foreign` (`criteria_id`);

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
-- Indexes for table `pkh_sub_criteria`
--
ALTER TABLE `pkh_sub_criteria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pkh_sub_criteria_calon_pkh_id_foreign` (`calon_pkh_id`),
  ADD KEY `pkh_sub_criteria_criteria_id_foreign` (`criteria_id`),
  ADD KEY `pkh_sub_criteria_subkriteria_id_foreign` (`subkriteria_id`);

--
-- Indexes for table `ratio_criterias`
--
ALTER TABLE `ratio_criterias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subkriteria_criteria_id_foreign` (`criteria_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `criterias`
--
ALTER TABLE `criterias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kriteria_terbobots`
--
ALTER TABLE `kriteria_terbobots`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pkh_sub_criteria`
--
ALTER TABLE `pkh_sub_criteria`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=226;

--
-- AUTO_INCREMENT for table `ratio_criterias`
--
ALTER TABLE `ratio_criterias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `subkriteria`
--
ALTER TABLE `subkriteria`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kriteria_terbobots`
--
ALTER TABLE `kriteria_terbobots`
  ADD CONSTRAINT `kriteria_terbobots_criteria_id_foreign` FOREIGN KEY (`criteria_id`) REFERENCES `criterias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pkh_sub_criteria`
--
ALTER TABLE `pkh_sub_criteria`
  ADD CONSTRAINT `pkh_sub_criteria_calon_pkh_id_foreign` FOREIGN KEY (`calon_pkh_id`) REFERENCES `calon_pkhs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pkh_sub_criteria_criteria_id_foreign` FOREIGN KEY (`criteria_id`) REFERENCES `criterias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pkh_sub_criteria_subkriteria_id_foreign` FOREIGN KEY (`subkriteria_id`) REFERENCES `subkriteria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subkriteria`
--
ALTER TABLE `subkriteria`
  ADD CONSTRAINT `subkriteria_criteria_id_foreign` FOREIGN KEY (`criteria_id`) REFERENCES `criterias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
