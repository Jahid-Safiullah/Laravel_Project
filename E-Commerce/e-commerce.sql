-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2023 at 03:36 AM
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
-- Database: `e-commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_catagory` varchar(255) DEFAULT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL DEFAULT '1',
  `image` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `catagories`
--

CREATE TABLE `catagories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `catagory_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `catagories`
--

INSERT INTO `catagories` (`id`, `catagory_name`, `created_at`, `updated_at`) VALUES
(2, 'pant', '2023-10-08 09:17:05', '2023-10-08 09:17:05'),
(3, 'panjabi', '2023-10-08 09:40:08', '2023-10-08 09:40:08'),
(4, 'shirt', '2023-10-08 09:52:09', '2023-10-08 09:52:09'),
(5, 'shirt', '2023-10-08 09:55:36', '2023-10-08 09:55:36'),
(7, 'pant', '2023-10-10 04:42:30', '2023-10-10 04:42:30'),
(8, 'Cap', '2023-10-10 10:40:38', '2023-10-10 10:40:38'),
(9, 'Phone', '2023-10-16 08:35:14', '2023-10-16 08:35:14');

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
(8, '2014_10_12_000000_create_users_table', 1),
(9, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(10, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(11, '2019_08_19_000000_create_failed_jobs_table', 1),
(12, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(13, '2023_10_01_132520_create_sessions_table', 1),
(14, '2023_10_07_061733_create_catagories_table', 1),
(15, '2023_10_09_064128_create_products_table', 2),
(16, '2023_10_11_182135_create_carts_table', 3),
(17, '2023_10_15_092832_create_orders_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `delivery_status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `address`, `user_id`, `product_title`, `quantity`, `price`, `image`, `product_id`, `payment_status`, `delivery_status`, `created_at`, `updated_at`) VALUES
(12, 'rakib', 'rakib@gamil.com', '01521319764', 'Mirpur', '6', 'Cap', '1', '2', '1696956105.jpg', '9', 'cash on delivery', 'Delivered', '2023-10-15 04:42:13', '2023-10-17 09:41:00'),
(13, 'rakib', 'rakib@gamil.com', '01521319764', 'Mirpur', '6', 'Long Sleeve Shirt for Men', '1', '20', '1697001655.jpg', '10', 'cash on delivery', 'processing', '2023-10-15 04:42:13', '2023-10-15 04:42:13'),
(14, 'jahid', 'jahidsafiulla16@gmail.com', '01521319764', 'mohammadpur', '5', 'Semi Long Panjabi', '2', '40', '1697104704.jpg', '13', 'cash on delivery', 'Delivered', '2023-10-15 04:45:35', '2023-10-17 10:34:13'),
(15, 'jahid', 'jahidsafiulla16@gmail.com', '01521319764', 'mohammadpur', '5', 'Long Sleeve Shirt for Men', '2', '40', '1697001655.jpg', '10', 'cash on delivery', 'Delivered', '2023-10-15 06:46:20', '2023-10-17 09:54:49'),
(16, 'jahid', 'jahidsafiulla16@gmail.com', '01521319764', 'mohammadpur', '5', 'kabli panjabi', '2', '100', '1697002860.webp', '12', 'paid', 'Delivered', '2023-10-15 06:46:20', '2023-10-17 18:51:28'),
(17, 'jahid', 'jahidsafiulla16@gmail.com', '01521319764', 'mohammadpur', '5', 'Cotton Panjabi', '2', '98', '1697105042.webp', '14', 'Paid', 'processing', '2023-10-16 12:17:40', '2023-10-16 12:17:40'),
(18, 'rakib', 'rakib@gamil.com', '01521319764', 'Mirpur', '6', 'Collar Casual Shirt', '1', '200', '1697467652.jpg', '17', 'Paid', 'processing', '2023-10-16 12:59:14', '2023-10-16 12:59:14'),
(19, 'user', 'user@gmail.com', '01743670965', 'Dhanmondi', '4', 'kabli panjabi', '1', '0', '1697002860.webp', '12', 'Paid BY Card', 'Processing', '2023-10-18 06:53:08', '2023-10-18 06:53:08'),
(20, 'user', 'user@gmail.com', '01743670965', 'Dhanmondi', '4', 'Cotton Panjabi', '2', '98', '1697105042.webp', '14', 'Paid BY Card', 'Processing', '2023-10-18 06:53:08', '2023-10-18 06:53:08'),
(21, 'user', 'user@gmail.com', '01743670965', 'Dhanmondi', '4', 'pant', '2', '2', '1697002260.jpg', '11', 'Paid BY Card', 'Processing', '2023-10-18 06:53:08', '2023-10-18 06:53:08'),
(22, 'jahid', 'jahidsafiulla16@gmail.com', '01521319764', 'mohammadpur', '5', 'pant', '1', '5', '1697002260.jpg', '11', 'Cash on delivery', 'Processing', '2023-10-18 06:55:25', '2023-10-18 06:55:25'),
(23, 'jahid', 'jahidsafiulla16@gmail.com', '01521319764', 'mohammadpur', '5', 'kabli panjabi', '2', '100', '1697002860.webp', '12', 'Cash on delivery', 'Processing', '2023-10-18 06:55:25', '2023-10-18 06:55:25'),
(24, 'admin', 'admin@gmail.com', '01521319764', 'mohammadpur', '3', 'iPhone 15 128GB Black', '3', '4800', '1697467056.jpg', '15', 'Cash on delivery', 'Processing', '2023-10-21 22:49:26', '2023-10-21 22:49:26'),
(25, 'jahid', 'jahidsafiulla16@gmail.com', '01521319764', 'mohammadpur', '5', 'iPhone 15 128GB Black', '4', '6400', '1697467056.jpg', '15', 'Cash on delivery', 'Processing', '2023-10-21 22:52:33', '2023-10-21 22:52:33'),
(26, 'jahid', 'jahidsafiulla16@gmail.com', '01521319764', 'mohammadpur', '5', 'iPhone 15 128GB Black', '3', '4800', '1697467056.jpg', '15', 'Cash on delivery', 'Processing', '2023-10-21 23:08:27', '2023-10-21 23:08:27'),
(27, 'jahid', 'jahidsafiulla16@gmail.com', '01521319764', 'mohammadpur', '5', 'iPhone 15 128GB Black', '4', '6400', '1697467056.jpg', '15', 'Cash on delivery', 'Processing', '2023-10-21 23:13:11', '2023-10-21 23:13:11'),
(28, 'jahid', 'jahidsafiulla16@gmail.com', '01521319764', 'mohammadpur', '5', 'iPhone 15 128GB Black', '4', '6400', '1697467056.jpg', '15', 'Cash on delivery', 'Processing', '2023-10-21 23:14:28', '2023-10-21 23:14:28'),
(29, 'jahid', 'jahidsafiulla16@gmail.com', '01521319764', 'mohammadpur', '5', 'iPhone 15 128GB Black', '3', '4800', '1697467056.jpg', '15', 'Cash on delivery', 'Processing', '2023-10-21 23:16:26', '2023-10-21 23:16:26'),
(30, 'jahid', 'jahidsafiulla16@gmail.com', '01521319764', 'mohammadpur', '5', 'Long Sleeve Shirt for Men', '8', '160', '1697001655.jpg', '10', 'Cash on delivery', 'Processing', '2023-10-21 23:17:41', '2023-10-21 23:17:41'),
(31, 'jahid', 'jahidsafiulla16@gmail.com', '01521319764', 'mohammadpur', '5', 'iPhone 15 128GB Black', '2', '3200', '1697467056.jpg', '15', 'Cash on delivery', 'Processing', '2023-10-22 00:36:40', '2023-10-22 00:36:40'),
(32, 'jahid', 'jahidsafiulla16@gmail.com', '01521319764', 'mohammadpur', '5', 'iPhone 15 128GB Black', '2', '3200', '1697467056.jpg', '15', 'Cash on delivery', 'Processing', '2023-10-22 00:38:16', '2023-10-22 00:38:16'),
(33, 'jahid', 'jahidsafiulla16@gmail.com', '01521319764', 'mohammadpur', '5', 'iPhone 15 128GB Black', '2', '3200', '1697467056.jpg', '15', 'Cash on delivery', 'Processing', '2023-10-22 00:39:13', '2023-10-22 00:39:13'),
(34, 'jahid', 'jahidsafiulla16@gmail.com', '01521319764', 'mohammadpur', '5', 'iPhone 15 128GB Black', '2', '3200', '1697467056.jpg', '15', 'Cash on delivery', 'Processing', '2023-10-22 00:40:17', '2023-10-22 00:40:17'),
(35, 'jahid', 'jahidsafiulla16@gmail.com', '01521319764', 'mohammadpur', '5', 'iPhone 15 128GB Black', '2', '3200', '1697467056.jpg', '15', 'Cash on delivery', 'Processing', '2023-10-22 00:41:00', '2023-10-22 00:41:00'),
(36, 'jahid', 'jahidsafiulla16@gmail.com', '01521319764', 'mohammadpur', '5', 'iPhone 15 128GB Black', '1', '1600', '1697467056.jpg', '15', 'Cash on delivery', 'Processing', '2023-10-22 00:42:20', '2023-10-22 00:42:20'),
(37, 'jahid', 'jahidsafiulla16@gmail.com', '01521319764', 'mohammadpur', '5', 'iPhone 15 128GB Black', '1', '1600', '1697467056.jpg', '15', 'Cash on delivery', 'Processing', '2023-10-22 00:53:44', '2023-10-22 00:53:44'),
(38, 'jahid', 'jahidsafiulla16@gmail.com', '01521319764', 'mohammadpur', '5', 'iPhone 15 128GB Black', '1', '1600', '1697467056.jpg', '15', 'Cash on delivery', 'Processing', '2023-10-22 00:55:28', '2023-10-22 00:55:28'),
(39, 'jahid', 'jahidsafiulla16@gmail.com', '01521319764', 'mohammadpur', '5', 'iPhone 15 128GB Black', '1', '1600', '1697467056.jpg', '15', 'Cash on delivery', 'Processing', '2023-10-22 00:57:41', '2023-10-22 00:57:41'),
(40, 'jahid', 'jahidsafiulla16@gmail.com', '01521319764', 'mohammadpur', '5', 'pant', '10', '50', '1697002260.jpg', '11', 'Cash on delivery', 'Processing', '2023-10-22 06:04:49', '2023-10-22 06:04:49');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `catagory` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `discount_price` varchar(255) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `image`, `catagory`, `quantity`, `price`, `discount_price`, `category_id`, `created_at`, `updated_at`) VALUES
(10, 'Long Sleeve Shirt for Men', 'New Casual Cotton Long Sleeve Shirt for Men/Man', '1697001655.jpg', 'shirt', '-12', '50', '20', NULL, '2023-10-10 23:20:55', '2023-10-14 22:23:03'),
(11, 'pant', 'heigh  quality product', '1697002260.jpg', 'pant', '-2', '45', '5', NULL, '2023-10-10 23:31:00', '2023-10-14 22:24:16'),
(12, 'kabli panjabi', 'this panjabi is good for helth', '1697002860.webp', 'panjabi', '0', '200', '50', NULL, '2023-10-10 23:41:00', '2023-10-14 22:23:32'),
(13, 'Semi Long Panjabi', 'GoodMan Premium Coffee Color Semi Long Panjabi for Men.', '1697104704.jpg', 'panjabi', '-1', '120', '20', NULL, '2023-10-12 03:58:24', '2023-10-12 03:58:24'),
(14, 'Cotton Panjabi', 'Maroon Jamdani Cotton Panjabi', '1697105042.webp', 'panjabi', '178', '199', '49', NULL, '2023-10-12 04:03:11', '2023-10-12 04:13:41'),
(15, 'iPhone 15 128GB Black', 'Apple iPhone 15 128GB Black', '1697467056.jpg', 'Phone', '28', '1649', '1600', NULL, '2023-10-16 08:37:36', '2023-10-16 08:37:36'),
(16, 'Printed Shirt', 'Lymio Casual Shirt for Men', '1697467539.jpg', 'shirt', '-2', '339', '300', NULL, '2023-10-16 08:45:39', '2023-10-16 08:45:39'),
(17, 'Collar Casual Shirt', 'Men Regular Fit Solid Spread Collar Casual Shirt', '1697467652.jpg', 'shirt', '228', '399', '200', NULL, '2023-10-16 08:47:32', '2023-10-16 08:47:32'),
(18, 'Casual Shirt', 'Mens Long Sleeve Button Up Shirt Bamboo Fiber', '1697467798.jpg', 'shirt', '178', '250', '200', NULL, '2023-10-16 08:49:58', '2023-10-16 08:49:58');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('8ZEuzXym9HuD4km2dIhawtA0tsdcmzoFNwAdayFo', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoibTNjSExVWTdORHJiVmowRUpDMUJVcUpSWlVqQXA0QUZLU1EwUFVlUiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzQ6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zaG93X3Byb2R1Y3QiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo1O30=', 1697976339),
('bT4HNpLqsL6Q7FjEQDUH255q8i7QoJreH2OlZpHD', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoick1yVWlHNkVzdWlYdDlYSnFnTFpLdFZpVEVqb1ZhU2RRT2haZW5YRCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1698024924);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL DEFAULT '0',
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `usertype`, `phone`, `address`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(3, 'admin', 'admin@gmail.com', '1', '01521319764', 'mohammadpur', NULL, '$2y$10$DbRk2ekY7lewekdnTr0oSeoNmRkQ00YVmiV/x75VZkZ.q3NkWQ3sO', NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-08 08:54:12', '2023-10-08 08:54:12'),
(4, 'user', 'user@gmail.com', '0', '01743670965', 'Dhanmondi', NULL, '$2y$10$3qs1BtF.7mgg5Sh1ttVamOmthqB.PWiLabhXqnMP9jZ0gnDxkSDtu', NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-08 08:56:11', '2023-10-08 08:56:11'),
(5, 'jahid', 'jahidsafiulla16@gmail.com', '0', '01521319764', 'mohammadpur', NULL, '$2y$10$XTbsqcJv56J/OZewqg2hSO1vLYBb5AHIdIz6kd80MI4Ka01XChsFq', NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-14 21:50:04', '2023-10-14 21:50:04'),
(6, 'rakib', 'rakib@gamil.com', '0', '01521319764', 'Mirpur', NULL, '$2y$10$0lkOO1YMBu0Rujt83WQsVu/wbc4r0dFV.oE.TASLw0RQHmBbY1EjC', NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-14 22:20:48', '2023-10-14 22:20:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catagories`
--
ALTER TABLE `catagories`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `catagories`
--
ALTER TABLE `catagories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
