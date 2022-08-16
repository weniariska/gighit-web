-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2021 at 12:55 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gighit-project-db`
--

-- --------------------------------------------------------

--
-- Table structure for table `drinks`
--

CREATE TABLE `drinks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'drinks//drink.jpg',
  `price` int(11) NOT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `drinks`
--

INSERT INTO `drinks` (`id`, `name`, `image`, `price`, `desc`, `created_at`, `updated_at`) VALUES
(1, 'GREEN TEA', 'drinks//greenTea.jpg', 18000, 'with green tea and fresh milk', '2021-12-02 03:42:39', '2021-12-02 03:42:39'),
(2, 'ICE BOBA', 'drinks//iceBoba.jpg', 25000, 'fresh ice topped with boba', '2021-12-02 03:42:39', '2021-12-02 03:42:39'),
(3, 'ICE MOCCA', 'drinks//iceMocca.jpg', 20000, 'a tasty ice mocca', '2021-12-02 03:42:39', '2021-12-02 03:42:39'),
(4, 'LIME TEA', 'drinks//limeTea.jpg', 15000, 'a fresh lime and tea', '2021-12-02 03:42:39', '2021-12-02 03:42:39'),
(5, 'OREO', 'drinks//oreo.jpg', 22000, 'a tasty oreo with fresh pop ice', '2021-12-02 03:42:39', '2021-12-02 03:42:39'),
(6, 'OVALTINE', 'drinks//ovaltine.jpg', 23000, 'sweet ovaltine and fresh milk', '2021-12-02 03:42:39', '2021-12-02 03:42:39'),
(7, 'TARO', 'drinks//taro.jpg', 20000, 'sweet taro and fresh milk', '2021-12-02 03:42:39', '2021-12-02 03:42:39');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_11_21_144317_create_shoppingcart_table', 1),
(7, '2021_11_21_150700_create_pizzas_table', 1),
(8, '2021_11_21_152736_create_drinks_table', 1),
(9, '2021_11_21_153911_create_starters_table', 1),
(10, '2021_11_21_154828_create_transactions_table', 1),
(11, '2021_11_23_151242_create_sessions_table', 1);

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
-- Table structure for table `pizzas`
--

CREATE TABLE `pizzas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'pizzas//pizza.jpg',
  `price` int(11) NOT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pizzas`
--

INSERT INTO `pizzas` (`id`, `name`, `image`, `price`, `desc`, `created_at`, `updated_at`) VALUES
(1, 'AI FUNGI', 'pizzas//aifungi.jpg', 90000, 'fresh mushrooms with mozzarella cheese', '2021-12-02 03:42:39', '2021-12-02 03:42:39'),
(2, 'BBQ CHICKEN', 'pizzas//bbqChicken.jpg', 80000, 'chicken decked with red onion and tasty bbq sauce', '2021-12-02 03:42:39', '2021-12-02 03:42:39'),
(3, 'CAPRICCIOSA', 'pizzas//capricciosa.jpg', 85000, 'meat, egg slice, mushrooms in a cheese sauce base', '2021-12-02 03:42:39', '2021-12-02 03:42:39'),
(4, 'FARMHOUSE', 'pizzas//farmhouse.jpg', 75000, 'fresh mushrooms, tomato sauce, ham, mozzarella cheese', '2021-12-02 03:42:39', '2021-12-02 03:42:39'),
(5, 'HAWAIIAN', 'pizzas//hawaiian.jpg', 100000, 'cheese sauce base topped with meat and pepperoni', '2021-12-02 03:42:39', '2021-12-02 03:42:39'),
(6, 'MARGHERITA', 'pizzas//margherita.jpg', 102000, 'a tomato sauce base, mozzarella, tomato chunks, oreqano', '2021-12-02 03:42:39', '2021-12-02 03:42:39'),
(7, 'MEAT LOVERS', 'pizzas//meatLovers.jpg', 105000, 'pepperoni, spicy beef, ham and spicy pork on a tomato sauce base', '2021-12-02 03:42:39', '2021-12-02 03:42:39'),
(8, 'PEPPERONI LOVERS', 'pizzas//pepperoniLovers.jpg', 80000, 'a tomato sauce base topped with mozzarella cheese, chunks and ham', '2021-12-02 03:42:39', '2021-12-02 03:42:39'),
(9, 'SUPREME', 'pizzas//supreme.jpg', 95000, 'pepperoni, meat, mushrooms and mozzarella cheese', '2021-12-02 03:42:39', '2021-12-02 03:42:39');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('MBKRatHpvEkmkcya32o5PzaUPWWxdlTDZHVX6HL1', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36 Edg/96.0.1054.29', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRTFOTVYxcWxjVmJwUVdwVnZDNmd0NkI0UzVRT3lJRGlXdDdwWllIZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1638445401);

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `identifier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `starters`
--

CREATE TABLE `starters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'starters//starter.jpg',
  `price` int(11) NOT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `starters`
--

INSERT INTO `starters` (`id`, `name`, `image`, `price`, `desc`, `created_at`, `updated_at`) VALUES
(1, 'BREAD STICKS', 'starters//breadSticks.jpg', 18000, 'tasty and crispy bread sticks', '2021-12-02 03:42:39', '2021-12-02 03:42:39'),
(2, 'CHICKEN STRIPS', 'starters//chickenStrips.jpg', 25000, 'tasty chicken strips', '2021-12-02 03:42:40', '2021-12-02 03:42:40'),
(3, 'CHICKEN WRAP', 'starters//chickenWrap.jpg', 20000, 'tortilla with spicy chicken slice', '2021-12-02 03:42:40', '2021-12-02 03:42:40'),
(4, 'GARLIC BREAD', 'starters//garlicBread.jpg', 15000, 'tasty garlic bread', '2021-12-02 03:42:40', '2021-12-02 03:42:40'),
(5, 'MOZZA BREAD', 'starters//mozzaGarlicBread.jpg', 22000, 'tasty garlic bread topped with mozzarella', '2021-12-02 03:42:40', '2021-12-02 03:42:40'),
(6, 'VEGETARIAN WRAP', 'starters//vegetarianWrap.jpg', 23000, 'healthy and delicious vegetarian wrap', '2021-12-02 03:42:40', '2021-12-02 03:42:40');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `custName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `orderDate` date NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `userType` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'customer',
  `saldo` decimal(10,2) NOT NULL DEFAULT 0.00,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullName`, `email`, `address`, `username`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `userType`, `saldo`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin Gighit', 'admin_gighit@gmail.com', 'Jalan Gighit', 'iamGIGmin', '$2y$10$yzS0jn4oc0HxdqvZvgzhKubD.nJL6Elgv83QztqdBHADd3/2PqhFS', NULL, NULL, 'admin', '0.00', NULL, '2021-12-02 03:42:39', '2021-12-02 03:42:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `drinks`
--
ALTER TABLE `drinks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `drinks_name_unique` (`name`);

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
  ADD KEY `password_resets_email_index` (`email`);

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
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pizzas_name_unique` (`name`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`identifier`,`instance`);

--
-- Indexes for table `starters`
--
ALTER TABLE `starters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `starters_name_unique` (`name`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `drinks`
--
ALTER TABLE `drinks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pizzas`
--
ALTER TABLE `pizzas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `starters`
--
ALTER TABLE `starters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
