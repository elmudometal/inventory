-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 03, 2017 at 12:44 AM
-- Server version: 5.7.19-0ubuntu1
-- PHP Version: 7.1.8-1ubuntu1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventario`
--

-- --------------------------------------------------------

--
-- Table structure for table `depots`
--

CREATE TABLE `depots` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `depots`
--

INSERT INTO `depots` (`id`, `description`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Level Euro 1310', 1, '2017-09-30 02:20:48', '2017-09-30 02:20:48'),
(2, 'sd', 1, '2017-09-30 06:54:36', '2017-09-30 06:54:36'),
(3, 'sd', 1, '2017-09-30 06:56:35', '2017-09-30 06:56:35'),
(4, 'casa de cambios', 1, '2017-09-30 06:56:52', '2017-09-30 06:56:52'),
(5, 'casa', 1, '2017-10-02 03:32:55', '2017-10-02 03:32:55'),
(6, 'casa de hernan', 1, '2017-10-02 03:33:15', '2017-10-02 03:33:15');

-- --------------------------------------------------------

--
-- Table structure for table `egresses`
--

CREATE TABLE `egresses` (
  `id` int(100) NOT NULL,
  `date` datetime NOT NULL,
  `provider_id` int(100) NOT NULL,
  `depot_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `egresses`
--

INSERT INTO `egresses` (`id`, `date`, `provider_id`, `depot_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '2017-10-03 03:02:31', 1, 1, 2, '2017-10-03 03:02:31', '2017-10-03 03:02:31'),
(2, '2017-10-03 03:03:13', 1, 1, 2, '2017-10-03 03:03:13', '2017-10-03 03:03:13'),
(3, '2017-10-03 03:03:42', 1, 1, 2, '2017-10-03 03:03:42', '2017-10-03 03:03:42'),
(4, '2017-10-03 03:04:19', 1, 1, 2, '2017-10-03 03:04:19', '2017-10-03 03:04:19'),
(5, '2017-10-03 03:05:03', 1, 1, 2, '2017-10-03 03:05:03', '2017-10-03 03:05:03'),
(6, '2017-10-03 03:06:16', 1, 1, 2, '2017-10-03 03:06:16', '2017-10-03 03:06:16'),
(7, '2017-10-03 03:07:56', 1, 1, 2, '2017-10-03 03:07:56', '2017-10-03 03:07:56'),
(8, '2017-10-03 03:08:19', 1, 1, 2, '2017-10-03 03:08:19', '2017-10-03 03:08:19');

-- --------------------------------------------------------

--
-- Table structure for table `egress_details`
--

CREATE TABLE `egress_details` (
  `id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `egress_id` int(100) NOT NULL,
  `amount` int(50) NOT NULL,
  `quantity` int(5) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `egress_details`
--

INSERT INTO `egress_details` (`id`, `product_id`, `egress_id`, `amount`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 4, 8, 1901, 1, '2017-10-03 03:08:19', '2017-10-03 03:08:19');

-- --------------------------------------------------------

--
-- Table structure for table `entries`
--

CREATE TABLE `entries` (
  `id` int(100) NOT NULL,
  `date` datetime NOT NULL,
  `provider_id` int(100) NOT NULL,
  `depot_id` int(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `entries`
--

INSERT INTO `entries` (`id`, `date`, `provider_id`, `depot_id`, `created_at`, `updated_at`) VALUES
(1, '2017-10-02 01:49:35', 5, 1, '2017-10-02 01:49:35', '2017-10-02 01:49:35'),
(2, '2017-10-02 01:49:39', 5, 1, '2017-10-02 01:49:39', '2017-10-02 01:49:39'),
(3, '2017-10-02 01:58:21', 5, 1, '2017-10-02 01:58:21', '2017-10-02 01:58:21'),
(4, '2017-10-02 02:01:46', 5, 1, '2017-10-02 02:01:46', '2017-10-02 02:01:46'),
(5, '2017-10-02 02:02:27', 5, 1, '2017-10-02 02:02:27', '2017-10-02 02:02:27'),
(6, '2017-10-02 02:07:22', 5, 1, '2017-10-02 02:07:22', '2017-10-02 02:07:22'),
(7, '2017-10-02 02:08:13', 5, 1, '2017-10-02 02:08:13', '2017-10-02 02:08:13'),
(8, '2017-10-02 02:08:54', 5, 1, '2017-10-02 02:08:54', '2017-10-02 02:08:54'),
(9, '2017-10-02 02:09:38', 5, 1, '2017-10-02 02:09:38', '2017-10-02 02:09:38'),
(10, '2017-10-02 02:10:03', 5, 1, '2017-10-02 02:10:03', '2017-10-02 02:10:03');

-- --------------------------------------------------------

--
-- Table structure for table `entry_details`
--

CREATE TABLE `entry_details` (
  `id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `entry_id` int(100) NOT NULL,
  `amount` int(50) NOT NULL,
  `quantity` int(5) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `entry_details`
--

INSERT INTO `entry_details` (`id`, `product_id`, `entry_id`, `amount`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 8, 666, 66, '2017-10-02 02:08:54', '2017-10-02 02:08:54'),
(2, 4, 8, 300, 2, '2017-10-02 02:08:54', '2017-10-02 02:08:54'),
(3, 1, 9, 666, 66, '2017-10-02 02:09:38', '2017-10-02 02:09:38'),
(4, 4, 9, 300, 2, '2017-10-02 02:09:38', '2017-10-02 02:09:38'),
(5, 1, 10, 1, 1, '2017-10-02 02:10:03', '2017-10-02 02:10:03');

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
(8, '2014_10_12_000000_create_users_table', 1),
(9, '2014_10_12_100000_create_password_resets_table', 1),
(10, '2017_09_20_134459_create_depot_table', 1),
(11, '2017_09_20_134609_create_product_table', 1),
(12, '2017_10_02_205132_create_personals_table', 2);

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
-- Table structure for table `personals`
--

CREATE TABLE `personals` (
  `id` int(10) UNSIGNED NOT NULL,
  `rut` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fullname` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(130) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personals`
--

INSERT INTO `personals` (`id`, `rut`, `fullname`, `email`, `role_id`, `created_at`, `updated_at`) VALUES
(1, '25.814.431-7', 'hernan', 'hernan.guzman@arca.cl', 1, '2017-10-03 05:19:37', '2017-10-03 05:19:37'),
(2, '25.814.431-7', 'hernan66', 'anastasiaroseguzman@gmail.com', 2, '2017-10-03 05:21:52', '2017-10-03 05:21:52');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `identifier` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `min` int(11) NOT NULL,
  `max` int(11) NOT NULL,
  `price` double(8,2) NOT NULL,
  `type` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `identifier`, `description`, `min`, `max`, `price`, `type`, `created_at`, `updated_at`) VALUES
(1, 'xasa', 'casa', 1, 2, 100.00, 1, '2017-10-01 06:02:42', '2017-10-01 06:02:42'),
(2, 'xasa', 'casa', 1, 2, 100.00, 1, '2017-10-01 06:03:48', '2017-10-01 06:03:48'),
(3, 'xasa', 'casa', 1, 2, 100.00, 1, '2017-10-01 06:05:00', '2017-10-01 06:05:00'),
(4, 'CHGCUVJJNL', 'CASASK  AS A SASAK', 1, 1, 1900.00, 1, NULL, NULL);

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
(1, 'hernan', 'hernan.guzman@arca.cl', '$2y$10$/LyqV462xYblWRaGtNrq5ehqcNAgEX1Pm0gAGJBdJP8X7R.zEqTs6', NULL, '2017-09-27 04:34:28', '2017-09-27 04:34:28'),
(2, 'csa', 'guzman@gmail.com', '$2y$10$AVMZ/sp0YqKNn//o.EUkIeVHnAQUwg5r8qBzLV.CZwZ6yNCn4U/qe', 'vksB6nQxsemB8rPM77VCaqmaavLIDpXeO61yEZKkXjCov3MDqUDodoO5Y1nI', '2017-10-03 04:20:29', '2017-10-03 04:20:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `depots`
--
ALTER TABLE `depots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `egresses`
--
ALTER TABLE `egresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `egress_details`
--
ALTER TABLE `egress_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entries`
--
ALTER TABLE `entries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entry_details`
--
ALTER TABLE `entry_details`
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
-- Indexes for table `personals`
--
ALTER TABLE `personals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `depots`
--
ALTER TABLE `depots`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `egresses`
--
ALTER TABLE `egresses`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `egress_details`
--
ALTER TABLE `egress_details`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `entries`
--
ALTER TABLE `entries`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `entry_details`
--
ALTER TABLE `entry_details`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `personals`
--
ALTER TABLE `personals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
