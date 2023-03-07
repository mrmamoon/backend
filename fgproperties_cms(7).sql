-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2023 at 11:09 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fgproperties_cms`
--

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
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2023_01_05_064838_create_home_carousels_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(5, 'App\\Models\\User', 4),
(5, 'App\\Models\\User', 7),
(5, 'App\\Models\\User', 8),
(6, 'App\\Models\\User', 9);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` tinyint(4) NOT NULL DEFAULT 0,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `parent_id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 0, 'DashBoard', 'web', '2021-10-20 00:39:05', '2021-10-20 00:39:05'),
(2, 0, 'User Management', 'web', '2021-10-20 00:39:06', '2021-10-20 00:39:06'),
(3, 2, 'Users', 'web', '2021-10-20 00:39:06', '2021-10-20 00:39:06'),
(4, 3, 'users-add', 'web', '2021-10-20 00:39:06', '2021-10-20 00:39:06'),
(5, 3, 'users-view', 'web', '2021-10-20 00:39:06', '2021-10-20 00:39:06'),
(6, 3, 'users-delete', 'web', '2021-10-20 00:39:06', '2021-10-20 00:39:06'),
(7, 3, 'users-edit', 'web', '2021-10-20 00:39:06', '2021-10-20 00:39:06'),
(9, 2, 'Roles', 'web', '2021-10-20 00:39:06', '2021-10-20 00:39:06'),
(10, 9, 'roles-add', 'web', '2021-10-20 00:39:06', '2021-10-20 00:39:06'),
(11, 9, 'roles-edit', 'web', '2021-10-20 00:39:06', '2021-10-20 00:39:06'),
(12, 9, 'roles-delete', 'web', '2021-10-20 00:39:06', '2021-10-20 00:39:06'),
(14, 0, 'Website Management', 'web', NULL, NULL),
(15, 14, 'Listings', 'web', NULL, NULL),
(16, 15, 'Listings-add', 'web', NULL, NULL),
(17, 15, 'Listings-update', 'web', NULL, NULL),
(19, 14, 'Mortgage Applications', 'web', NULL, NULL),
(20, 19, 'Mortgage Applicants-approve', 'web', NULL, NULL),
(21, 15, 'Listings-delete', 'web', NULL, NULL),
(22, 15, 'Listings-status', 'web', NULL, NULL),
(24, 1, 'Dashboard-Dashboard', 'web', NULL, NULL),
(25, 24, 'Dashboard-View', 'web', NULL, NULL),
(49, 0, 'Blogs', 'web', NULL, NULL),
(50, 49, 'Blogs-Blogs', 'web', NULL, NULL),
(51, 50, 'blogs-add', 'web', NULL, NULL),
(52, 50, 'blogs-edit', 'web', NULL, NULL),
(53, 50, 'blogs-delete', 'web', NULL, NULL),
(54, 50, 'blogs-status', 'web', NULL, NULL),
(55, 0, 'SEO', 'web', NULL, NULL),
(56, 0, 'Settings', 'web', NULL, NULL),
(57, 56, 'Settings-Settings', 'web', NULL, NULL),
(58, 57, 'Settings-Edit', 'web', NULL, NULL),
(59, 55, 'SEO-SEO', 'web', NULL, NULL),
(60, 59, 'SEO-add', 'web', NULL, NULL),
(61, 59, 'SEO-edit', 'web', NULL, NULL),
(62, 0, 'Contact', 'web', NULL, NULL),
(63, 62, 'Contact-Contact', 'web', NULL, NULL),
(64, 63, 'Contact-view', 'web', NULL, NULL),
(65, 63, 'Contact-delete', 'web', NULL, NULL),
(67, 62, 'Inquiries-Inquiries', 'web', NULL, NULL),
(68, 67, 'Inquiries-view', 'web', NULL, NULL),
(69, 67, 'Inquiries-delete', 'web', NULL, NULL),
(70, 0, 'Applicants', 'web', NULL, NULL),
(71, 70, 'Applicants-Applicants', 'web', NULL, NULL),
(72, 71, 'Applicants-view', 'web', NULL, NULL),
(73, 71, 'Applicants-delete', 'web', NULL, NULL),
(74, 0, 'insights', 'web', NULL, NULL),
(75, 74, 'Insights-Insights', 'web', NULL, NULL),
(76, 75, 'Insights-view', 'web', NULL, NULL),
(77, 75, 'insights-add', 'web', NULL, NULL),
(78, 3, 'user-status', 'web', NULL, NULL);

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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super-admin', 'web', '2021-10-20 00:39:06', '2021-10-20 00:39:06'),
(5, 'Moderator', 'web', '2022-10-31 01:44:08', '2022-10-31 01:44:08'),
(6, 'LOLE', 'web', '2022-11-16 01:53:53', '2022-11-16 01:53:53');

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
(1, 5),
(1, 6),
(2, 1),
(2, 5),
(3, 1),
(3, 5),
(4, 1),
(4, 5),
(5, 1),
(5, 5),
(6, 1),
(6, 5),
(7, 1),
(7, 5),
(9, 1),
(9, 5),
(10, 1),
(10, 5),
(11, 1),
(11, 5),
(12, 1),
(12, 5),
(14, 1),
(14, 5),
(15, 1),
(15, 5),
(16, 1),
(16, 5),
(17, 1),
(17, 5),
(19, 1),
(19, 5),
(20, 1),
(20, 5),
(21, 1),
(21, 5),
(22, 1),
(22, 5),
(24, 1),
(24, 5),
(24, 6),
(25, 1),
(25, 5),
(25, 6),
(49, 1),
(49, 5),
(50, 1),
(50, 5),
(51, 1),
(51, 5),
(52, 1),
(52, 5),
(53, 1),
(53, 5),
(54, 1),
(54, 5),
(55, 1),
(55, 5),
(56, 1),
(56, 5),
(57, 1),
(57, 5),
(58, 1),
(58, 5),
(59, 1),
(59, 5),
(60, 1),
(60, 5),
(61, 1),
(61, 5),
(62, 1),
(62, 5),
(63, 1),
(63, 5),
(64, 1),
(64, 5),
(65, 1),
(65, 5),
(67, 1),
(67, 5),
(68, 1),
(68, 5),
(69, 1),
(70, 1),
(70, 5),
(71, 1),
(71, 5),
(72, 1),
(72, 5),
(73, 1),
(73, 5),
(74, 1),
(74, 5),
(75, 1),
(75, 5),
(76, 1),
(76, 5),
(77, 1),
(77, 5),
(78, 1),
(78, 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_type` tinyint(4) DEFAULT NULL COMMENT '0 is supper admin , 1 is normal',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type`, `name`, `image`, `phone`, `email`, `description`, `email_verified_at`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 0, 'Mr. Admin', 'kl270fv6UEGXHSnV7RQGULm1U0wnTzsNyf0gs1HY.jpg', '1231231234', 'admin@admin.com', NULL, '2021-10-20 00:39:08', '$2y$10$6rdfWylQuRR9GkC0OWlNlOKzs9iijuCdzQoD00TrrZHqb3Qyp8hci', 1, '8oMGDQgQNutg4Q37b18aLroiv3VMHsPOuce7uFS8nmJOvKcki5PdRRv1NCBr', '2021-10-20 00:39:08', '2022-11-10 06:14:47'),
(4, 1, 'test user', 'YJDkDFekCUupYJE4uJ0xu0V7mTd48XzBUjOoZwde.png', '1231231234', 't@a.com', NULL, NULL, '$2y$10$QgWB24Fk3y13JoAuPbmRreXCLcgY.B6CoUvPaRRXm8OE1hIre8DoS', 1, NULL, '2022-10-31 01:46:44', '2022-11-12 02:46:01'),
(7, 1, 'l', 'SUQwwF8pWMoOX7HRnTzZIPPjA3txmSQtsAxjQWb8.png', '1231231234', 'l@a.com', NULL, NULL, '$2y$10$Jm4lnrIJbKVL5447fpICwO/Mwo7fA8eeyQdBazWr1ZRNF/jana68G', 1, NULL, '2022-11-12 02:44:24', '2022-11-12 05:16:14'),
(8, 1, 'l', 'WFHMIfuAinkxQcuYxjAA3grY3omgJ4FjSzRw8ihj.png', '1231231234', 'a@a.com', 'asdhlkjaskdklbfajsdnawhdhlaksdjknasfbjakwjdkladk', NULL, '$2y$10$RGXnWvLdGnn6Ae2C2pDjROdfiKHIN4QTjKIOHhokiHlTbZQoZLjLy', 1, NULL, '2022-11-12 06:20:22', '2022-11-12 06:26:35'),
(9, 1, 'lol', 'aMF5BdbUlONQAFAUSTHNorBMPw5T01wvHxrgizPY.webp', '212155121', 'lol@lol.com', 'lol', NULL, '$2y$10$0.SuZz/ED5EPwUNuz5eZU.6XOzrZU2Aae6HLebgOuK4m6W5fZm8ea', 1, NULL, '2023-01-12 07:48:47', '2023-01-12 07:48:47');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

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
