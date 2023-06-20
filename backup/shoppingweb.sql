-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2023 at 11:16 AM
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
-- Database: `shoppingweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 4, 24, 1, '2023-06-14 23:06:41', '2023-06-14 23:06:41'),
(3, 4, 43, 1, '2023-06-14 23:08:18', '2023-06-14 23:08:18'),
(8, 4, 43, 1, '2023-06-14 23:27:36', '2023-06-14 23:27:36');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_05_20_011350_create_carts_table', 1),
(6, '2023_05_22_014558_create_riwayat_pesanan_table', 1),
(7, '2023_05_27_231628_create_produk_table', 2);

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` varchar(15) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `user_id`, `produk_id`, `jumlah`, `status`, `created_at`, `updated_at`) VALUES
(3, 1, 24, 1, 'Cancelled', '2023-06-13 12:29:35', '2023-06-16 01:26:55'),
(4, 1, 24, 1, 'Cancelled', '2023-06-13 12:29:35', '2023-06-16 01:27:18'),
(5, 1, 24, 1, 'Cancelled', '2023-06-13 12:29:35', '2023-06-16 01:28:48'),
(6, 4, 24, 1, 'Delivered', '2023-06-13 12:29:35', '2023-06-16 01:30:59'),
(7, 1, 38, 1, 'Cancelled', '2023-06-13 12:29:35', '2023-06-16 01:40:17'),
(8, 1, 24, 1, 'Delivered', '2023-06-14 22:01:47', '2023-06-16 01:30:51'),
(9, 1, 24, 1, 'Delivered', '2023-06-14 22:02:09', '2023-06-16 01:31:02'),
(10, 1, 24, 1, 'Delivered', '2023-06-14 22:03:16', '2023-06-16 01:31:01'),
(11, 4, 24, 1, 'Delivered', '2023-06-14 22:50:42', '2023-06-16 01:40:20'),
(12, 1, 43, 1, 'Cancelled', '2023-06-15 03:33:15', '2023-06-16 01:37:17'),
(13, 1, 43, 1, 'Cancelled', '2023-06-15 03:50:19', '2023-06-16 01:37:14'),
(14, 1, 43, 2, 'Cancelled', '2023-06-15 03:50:19', '2023-06-16 01:38:09'),
(15, 1, 43, 2, 'Delivered', '2023-06-15 03:51:12', '2023-06-16 23:22:20'),
(16, 1, 43, 2, 'Delivered', '2023-06-15 03:59:42', '2023-06-16 01:39:57'),
(17, 1, 43, 1, 'Delivered', '2023-06-15 04:47:25', '2023-06-17 00:19:59'),
(18, 1, 43, 1, 'Delivered', '2023-06-15 06:35:14', '2023-06-17 00:20:00'),
(19, 1, 43, 3, 'Cancelled', '2023-06-16 23:35:11', '2023-06-16 23:35:23'),
(20, 1, 43, 1, 'Delivered', '2023-06-17 00:04:05', '2023-06-17 00:04:28'),
(21, 1, 38, 1, 'Delivered', '2023-06-17 00:19:21', '2023-06-17 00:19:58'),
(22, 1, 38, 1, 'Delivered', '2023-06-17 00:22:30', '2023-06-17 00:22:44'),
(23, 1, 24, 1, 'Cancelled', '2023-06-17 00:28:30', '2023-06-17 00:28:39');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(11) NOT NULL,
  `stock` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama`, `deskripsi`, `harga`, `stock`, `created_at`, `updated_at`) VALUES
(24, 'Iphone 12 Max Pro', 'Iphone masih baru , boleh punya', 12000000, 0, '2023-06-11 07:29:47', '2023-06-17 00:28:22'),
(33, 'Samsung galaxy a21s', 'Handphone samsung', 1600000, 1, '2023-06-12 06:02:51', '2023-06-15 04:52:56'),
(38, 'Redmi Note 11', 'Hp gaming punya amer', 5000000, 0, '2023-06-12 07:52:18', '2023-06-17 00:22:21'),
(43, 'ROG phone 5', 'Handphone samsung', 100000, 0, '2023-06-14 21:02:30', '2023-06-17 00:03:57');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_pesanan`
--

CREATE TABLE `riwayat_pesanan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_pesanan` datetime NOT NULL,
  `pesanan` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `riwayat_pesanan`
--

INSERT INTO `riwayat_pesanan` (`id`, `user_id`, `tanggal_pesanan`, `pesanan`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-06-17 07:06:58', '38', '2023-06-17 00:19:58', '2023-06-17 00:19:58'),
(2, 1, '2023-06-17 07:06:59', '43', '2023-06-17 00:19:59', '2023-06-17 00:19:59'),
(3, 1, '2023-06-17 07:06:00', '43', '2023-06-17 00:20:00', '2023-06-17 00:20:00'),
(4, 1, '2023-06-17 07:06:44', '22', '2023-06-17 00:22:44', '2023-06-17 00:22:44'),
(5, 1, '2023-06-17 07:06:39', '23', '2023-06-17 00:28:39', '2023-06-17 00:28:39');

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
  `role` varchar(255) NOT NULL DEFAULT 'student',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'chandra', 'galaxytab17072014@gmail.com', NULL, '$2y$10$sKulKALTlwXgWpbZDfztx.vOjY3E2kTOI8q1lv5IxWVB3G2BZGjg.', 'student', NULL, '2023-06-09 06:30:48', '2023-06-15 05:29:40'),
(4, 'chandra', 'sj724014@gmail.com', NULL, '$2y$10$4USUGN.y5S61CmDmjVIjd.u/1e7/ML9F0WwqBlTLTwNOTdwj15tnO', 'admin', NULL, '2023-06-09 21:24:36', '2023-06-09 21:24:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pesanan_user_id_foreign` (`user_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riwayat_pesanan`
--
ALTER TABLE `riwayat_pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `riwayat_pesanan_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `riwayat_pesanan`
--
ALTER TABLE `riwayat_pesanan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `riwayat_pesanan`
--
ALTER TABLE `riwayat_pesanan`
  ADD CONSTRAINT `riwayat_pesanan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
