-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2018 at 07:06 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dss_grab`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatives`
--

CREATE TABLE `alternatives` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alternatives`
--

INSERT INTO `alternatives` (`id`, `nama`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Amanda', NULL, '2018-06-05 16:50:02', '2018-06-05 16:50:02'),
(2, 'Lisa', NULL, '2018-06-05 16:50:27', '2018-06-05 16:50:27'),
(3, 'Tomi', NULL, '2018-06-05 16:50:54', '2018-06-05 16:50:54'),
(4, 'Dika', NULL, '2018-06-05 16:51:16', '2018-06-05 16:51:16'),
(5, 'Wira', NULL, '2018-06-05 16:51:47', '2018-06-05 16:51:47'),
(6, 'adit', NULL, '2018-06-05 17:07:18', '2018-06-05 17:07:18');

-- --------------------------------------------------------

--
-- Table structure for table `crips`
--

CREATE TABLE `crips` (
  `id` int(10) UNSIGNED NOT NULL,
  `criteria_id` int(11) NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `crips`
--

INSERT INTO `crips` (`id`, `criteria_id`, `keterangan`, `nilai`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bintang 1', 1, '2018-06-05 16:41:30', '2018-06-05 16:41:30'),
(2, 1, 'Bintang 2', 2, '2018-06-05 16:41:40', '2018-06-05 16:41:40'),
(3, 1, 'Bintang 3', 3, '2018-06-05 16:41:54', '2018-06-05 16:41:54'),
(4, 1, 'Bintang 4', 4, '2018-06-05 16:42:03', '2018-06-05 16:42:03'),
(5, 1, 'Bintang 5', 5, '2018-06-05 16:42:13', '2018-06-05 16:42:13'),
(6, 2, 'Rentang nilai 0-20%', 1, '2018-06-05 16:42:35', '2018-06-05 16:42:35'),
(7, 2, 'Rentang nilai 20-40%', 2, '2018-06-05 16:42:54', '2018-06-05 16:42:54'),
(8, 2, 'Rentang nilai 40-60%', 3, '2018-06-05 16:43:15', '2018-06-05 16:43:15'),
(9, 2, 'Rentang nilai 60-80%', 4, '2018-06-05 16:43:29', '2018-06-05 16:43:29'),
(10, 2, 'Rentang nilai 80-100%', 5, '2018-06-05 16:43:42', '2018-06-05 16:43:42'),
(11, 3, 'Komentar kosong', 1, '2018-06-05 16:44:10', '2018-06-05 16:44:10'),
(12, 3, 'Komentar buruk', 2, '2018-06-05 16:44:30', '2018-06-05 16:44:30'),
(13, 3, 'Komentar cukup', 3, '2018-06-05 16:44:54', '2018-06-05 16:44:54'),
(14, 3, 'Komentar baik', 4, '2018-06-05 16:45:10', '2018-06-05 16:45:10'),
(15, 3, 'Komentar kosong', 5, '2018-06-05 16:45:26', '2018-06-05 16:45:26'),
(16, 4, 'Rp 1.000.000 – Rp 3.000.000', 1, '2018-06-05 16:45:51', '2018-06-05 16:45:51'),
(17, 4, 'Rp 3.000.000 – Rp 5.000.000', 2, '2018-06-05 16:46:13', '2018-06-05 16:46:13'),
(18, 4, 'Rp 5.000.000 – Rp 7.000.000', 3, '2018-06-05 16:46:42', '2018-06-05 16:46:42'),
(19, 4, 'Rp 7.000.000 – Rp 10.000.000', 4, '2018-06-05 16:47:02', '2018-06-05 16:47:02'),
(20, 4, '> Rp 10.000.000', 5, '2018-06-05 16:47:51', '2018-06-05 16:47:51'),
(21, 5, '0-50', 1, '2018-06-05 16:48:07', '2018-06-05 16:48:07'),
(22, 5, '50-100', 2, '2018-06-05 16:48:21', '2018-06-05 16:48:21'),
(23, 5, '100-150', 3, '2018-06-05 16:48:35', '2018-06-05 16:48:35'),
(24, 5, '150-200', 4, '2018-06-05 16:48:45', '2018-06-05 16:48:45'),
(25, 5, '> 200', 5, '2018-06-05 16:49:06', '2018-06-05 16:49:06'),
(26, 6, 'whatever1', 1, '2018-06-05 17:06:06', '2018-06-05 17:06:06'),
(27, 6, 'whatever2', 2, '2018-06-05 17:06:42', '2018-06-05 17:06:42'),
(28, 6, 'whatever3', 3, '2018-06-05 17:06:54', '2018-06-05 17:06:54');

-- --------------------------------------------------------

--
-- Table structure for table `criterias`
--

CREATE TABLE `criterias` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `atribut` enum('cost','benefit') COLLATE utf8mb4_unicode_ci NOT NULL,
  `bobot` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `criterias`
--

INSERT INTO `criterias` (`id`, `nama`, `atribut`, `bobot`, `created_at`, `updated_at`) VALUES
(1, 'Bintang', 'benefit', 40, '2018-06-05 16:39:48', '2018-06-05 16:39:48'),
(2, 'Nilai Penerimaan', 'benefit', 20, '2018-06-05 16:40:04', '2018-06-05 17:05:49'),
(3, 'Komentar Penumpang', 'benefit', 10, '2018-06-05 16:40:20', '2018-06-05 16:40:20'),
(4, 'Pendapatan Tertinggi', 'benefit', 10, '2018-06-05 16:40:35', '2018-06-05 16:40:35'),
(5, 'Mitra Dengan Grab Pay Terbanyak', 'benefit', 10, '2018-06-05 16:40:49', '2018-06-05 16:40:49'),
(6, 'Whatever', 'cost', 10, '2018-06-05 17:05:29', '2018-06-05 17:05:29');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(30, '2018_06_03_014456_update_perhitungan_table', 3),
(37, '2018_06_03_014119_update_alternative_table', 4),
(44, '2014_10_12_000000_create_users_table', 5),
(45, '2014_10_12_100000_create_password_resets_table', 5),
(46, '2018_05_31_023846_create_alternatives_table', 5),
(47, '2018_05_31_023905_create_criterias_table', 5),
(48, '2018_05_31_024115_create_crips_table', 5),
(49, '2018_06_02_065042_create_perhitungans_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `perhitungans`
--

CREATE TABLE `perhitungans` (
  `id` int(10) UNSIGNED NOT NULL,
  `alternative_id` int(11) NOT NULL,
  `criteria_id` int(11) NOT NULL,
  `crips_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perhitungans`
--

INSERT INTO `perhitungans` (`id`, `alternative_id`, `criteria_id`, `crips_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 4, '2018-06-05 16:50:02', '2018-06-05 16:50:02'),
(2, 1, 2, 9, '2018-06-05 16:50:02', '2018-06-05 16:50:02'),
(3, 1, 3, 11, '2018-06-05 16:50:02', '2018-06-05 16:50:02'),
(4, 1, 4, 18, '2018-06-05 16:50:02', '2018-06-05 16:50:02'),
(5, 1, 5, 25, '2018-06-05 16:50:02', '2018-06-05 16:50:02'),
(6, 2, 1, 4, '2018-06-05 16:50:27', '2018-06-05 16:50:27'),
(7, 2, 2, 10, '2018-06-05 16:50:27', '2018-06-05 16:50:27'),
(8, 2, 3, 13, '2018-06-05 16:50:27', '2018-06-05 16:50:27'),
(9, 2, 4, 17, '2018-06-05 16:50:27', '2018-06-05 16:50:27'),
(10, 2, 5, 23, '2018-06-05 16:50:27', '2018-06-05 16:50:27'),
(11, 3, 1, 5, '2018-06-05 16:50:54', '2018-06-05 16:50:54'),
(12, 3, 2, 10, '2018-06-05 16:50:54', '2018-06-05 16:50:54'),
(13, 3, 3, 14, '2018-06-05 16:50:54', '2018-06-05 16:50:54'),
(14, 3, 4, 17, '2018-06-05 16:50:54', '2018-06-05 16:50:54'),
(15, 3, 5, 23, '2018-06-05 16:50:54', '2018-06-05 16:50:54'),
(16, 4, 1, 4, '2018-06-05 16:51:16', '2018-06-05 16:51:16'),
(17, 4, 2, 9, '2018-06-05 16:51:16', '2018-06-05 16:51:16'),
(18, 4, 3, 11, '2018-06-05 16:51:16', '2018-06-05 16:51:16'),
(19, 4, 4, 16, '2018-06-05 16:51:16', '2018-06-05 16:51:16'),
(20, 4, 5, 24, '2018-06-05 16:51:16', '2018-06-05 16:51:16'),
(21, 5, 1, 3, '2018-06-05 16:51:47', '2018-06-05 16:51:47'),
(22, 5, 2, 10, '2018-06-05 16:51:47', '2018-06-05 16:51:47'),
(23, 5, 3, 15, '2018-06-05 16:51:47', '2018-06-05 16:51:47'),
(24, 5, 4, 16, '2018-06-05 16:51:47', '2018-06-05 16:51:47'),
(25, 5, 5, 23, '2018-06-05 16:51:47', '2018-06-05 16:51:47'),
(26, 6, 1, 5, '2018-06-05 17:07:18', '2018-06-05 17:07:18'),
(27, 6, 2, 10, '2018-06-05 17:07:18', '2018-06-05 17:07:18'),
(28, 6, 3, 12, '2018-06-05 17:07:18', '2018-06-05 17:07:18'),
(29, 6, 4, 20, '2018-06-05 17:07:18', '2018-06-05 17:07:18'),
(30, 6, 5, 25, '2018-06-05 17:07:18', '2018-06-05 17:07:18'),
(31, 6, 6, 28, '2018-06-05 17:07:18', '2018-06-05 17:07:18'),
(32, 5, 6, 26, '2018-06-05 17:07:35', '2018-06-05 17:07:35'),
(33, 1, 6, 26, '2018-06-05 17:07:40', '2018-06-05 17:07:40'),
(34, 2, 6, 26, '2018-06-05 17:07:47', '2018-06-05 17:07:47'),
(35, 3, 6, 28, '2018-06-05 17:07:54', '2018-06-05 17:07:54'),
(36, 4, 6, 28, '2018-06-05 17:08:03', '2018-06-05 17:08:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$rOHFJyfgs3moevVaZkP94.4qaqaVFae2Q8NgrP8Q9ZZwnIbGZfSwy', 'zaEL9qeHJjJkBuKkKy58Eb8JnIjdXJsv8MNvAFdsEujfdojml02YXrai1Rza', '2018-06-05 08:12:02', '2018-06-05 08:12:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatives`
--
ALTER TABLE `alternatives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crips`
--
ALTER TABLE `crips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `criterias`
--
ALTER TABLE `criterias`
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
-- Indexes for table `perhitungans`
--
ALTER TABLE `perhitungans`
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
-- AUTO_INCREMENT for table `alternatives`
--
ALTER TABLE `alternatives`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `crips`
--
ALTER TABLE `crips`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `criterias`
--
ALTER TABLE `criterias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `perhitungans`
--
ALTER TABLE `perhitungans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
