-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2023 at 08:04 AM
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
-- Database: `pizzahouse`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`, `updated_at`, `created_at`) VALUES
(1, 'Louise Raphael Dela Cruz', 'aaa@gmail.com', 'gadgdadgha', '2023-11-27 01:22:07', '2023-11-27 01:22:07'),
(2, 'sample', 'louise@gmail.com', 'hfgshf', '2023-11-27 01:28:16', '2023-11-27 01:28:16'),
(3, 'Louise Raphael Dela Cruz', 'sample@gmail.com', 'pizza', '2023-12-06 02:29:37', '2023-12-06 02:29:37'),
(4, 'Louise', 'louise@gmail.com', 'The pizza is very delicious!', '2023-12-08 21:31:02', '2023-12-08 21:31:02');

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
-- Table structure for table `inventories`
--

CREATE TABLE `inventories` (
  `id` int(255) NOT NULL,
  `pizza_id` int(255) NOT NULL,
  `current_stock` int(255) NOT NULL,
  `critical_no` int(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inventories`
--

INSERT INTO `inventories` (`id`, `pizza_id`, `current_stock`, `critical_no`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 3, '2023-11-29 04:29:42', '2023-12-08 21:35:08'),
(2, 2, 3, 3, '2023-11-29 04:29:42', '2023-12-05 08:27:47'),
(3, 3, 2, 3, '2023-11-29 04:29:42', '2023-11-29 04:29:42'),
(4, 4, 3, 3, '2023-11-29 04:29:42', '2023-12-06 02:30:38'),
(5, 5, 5, 3, '2023-11-29 04:29:42', '2023-12-06 01:59:08');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `activity` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `username`, `ip`, `activity`, `created_at`, `updated_at`) VALUES
(1, 'Louise Raphael Dela Cruz', '127.0.0.1', 'Logout', '2023-12-19 04:39:47', '2023-12-19 04:39:47'),
(2, 'Louise Raphael Dela Cruz', '127.0.0.1', 'Login', '2023-12-19 05:24:56', '2023-12-19 05:24:56'),
(3, 'Louise Raphael Dela Cruz', '127.0.0.1', 'Logout', '2023-12-19 05:37:57', '2023-12-19 05:37:57'),
(4, 'Louise Raphael Dela Cruz', '127.0.0.1', 'Login', '2023-12-19 05:38:05', '2023-12-19 05:38:05'),
(5, 'Louise Raphael Dela Cruz', '127.0.0.1', 'Logout', '2023-12-19 05:38:08', '2023-12-19 05:38:08');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_10_08_045542_create_pizzas_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `pizza_type` varchar(255) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `total_amount` int(255) NOT NULL,
  `paid_amount` int(255) NOT NULL,
  `change` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `pizza_type`, `customer_name`, `total_amount`, `paid_amount`, `change`, `created_at`, `updated_at`) VALUES
(1, 'Pepperoni', 'sample', 1098, 1100, '2', '2023-11-28 23:04:54', '2023-11-28 23:04:54'),
(2, 'Supreme', 'Raphael', 998, 1000, '2', '2023-11-28 23:15:11', '2023-11-28 23:15:11'),
(3, 'Pepperoni', 'Louise', 549, 600, '51', '2023-11-28 23:18:41', '2023-11-28 23:18:41'),
(4, 'Pepperoni', 'Louise', 549, 600, '51', '2023-11-28 23:19:16', '2023-11-28 23:19:16'),
(5, 'Garlic Butter Prawns', 'Louise', 549, 550, '1', '2023-12-06 01:56:04', '2023-12-06 01:56:04'),
(6, 'BBQ Meatlovers', 'Raphael', 499, 500, '1', '2023-12-06 02:30:38', '2023-12-06 02:30:38'),
(7, 'Pepperoni', 'Customer', 1098, 1100, '2', '2023-12-08 21:35:08', '2023-12-08 21:35:08');

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
-- Table structure for table `pizzas`
--

CREATE TABLE `pizzas` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `base` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pizzas`
--

INSERT INTO `pizzas` (`id`, `type`, `base`, `name`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Pepperoni', 'Thick', 'PizzaHouse', 549, '2023-11-29 04:22:16', '2023-12-08 21:29:30'),
(2, 'Supreme', 'Thick', 'PizzaHouse', 499, '2023-11-29 04:22:16', '2023-11-29 04:22:16'),
(3, 'Hawaiian', 'Thick', 'PizzaHouse', 449, '2023-11-29 04:22:16', '2023-11-29 04:22:16'),
(4, 'BBQ Meatlovers', 'Thick', 'PizzaHouse', 499, '2023-11-29 04:22:16', '2023-11-29 04:22:16'),
(5, 'Garlic Butter Prawns', 'Thin', 'PizzaHouse', 549, '2023-11-29 04:22:16', '2023-11-29 04:22:16'),
(6, 'Mozzarella', 'Thick', 'PizzaHouse', 499, '2023-12-08 21:37:09', '2023-12-08 21:37:09');

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

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Louise Raphael Dela Cruz', 'louiseraphael.lrdc@gmail.com', NULL, '$2y$10$yA9B9HnLm6.ygGrjvOA44OB7k1/EruiUspt6JJR9nuTVnNcEabhrS', NULL, '2023-10-21 07:26:48', '2023-10-21 07:26:48'),
(2, 'Louise Raphael Dela Cruz', 'lradelacruz@donbosco.edu.ph', NULL, '$2y$10$Qnq5VhtdqI/rSwem557W.eYkIh0L.wRv876gW5Y3rwIPZwwuuhepC', NULL, '2023-11-04 05:41:55', '2023-11-04 05:41:55'),
(3, 'Louise', 'louise@gmail.com', NULL, '$2y$10$GYIj6h8aNJiRSedhnvqt2eeR5KC4yqudDv5wI2eBlBzE0iQYLYjEW', NULL, '2023-12-08 20:48:12', '2023-12-08 20:48:12'),
(4, 'Raphael', 'raphael@gmail.com', NULL, '$2y$10$VwKy57S5RU/KRUQWhd8To.EVTUP2WBMSRpGGGbluBdnmAJBUvs2Pe', NULL, '2023-12-08 21:05:12', '2023-12-08 21:05:12'),
(5, 'Dela Cruz', 'dc@gmail.com', NULL, '$2y$10$X/F7zlR2uC/pBvd/sOdxr.DPxvDMiW536hDEC8kft2UA5wGF8o0Ca', NULL, '2023-12-08 21:39:50', '2023-12-08 21:39:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `inventories`
--
ALTER TABLE `inventories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- Indexes for table `pizzas`
--
ALTER TABLE `pizzas`
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
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `inventories`
--
ALTER TABLE `inventories`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pizzas`
--
ALTER TABLE `pizzas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
