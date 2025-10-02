-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 01, 2025 at 09:04 PM
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
-- Database: `vacation-rental`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(7, 'own', 'hotelown@gmail.com', '$2y$12$EFdWhux2RmcoyAO4Q3T.RuWZyhvHrniJj6xIl9nnh1gzIPEVE9fpW', '2025-10-01 02:31:49', '2025-10-01 02:31:49'),
(8, 'hotelmanager', 'hotelmanager@gmail.com', '$2y$12$3auRVkk7pDteBlSENeSdPOjlSfutOEQ81G0IW0jhVEVxMJS.Cgf96', '2025-10-01 03:22:19', '2025-10-01 03:22:19'),
(9, 'hoteladmin', 'hoteladmin@yahoo.com', '$2y$12$VBDl7mEiW4cYMnb1/4tZ9eAsNbTF1LQkG0dZikQoL0ToFzpwJmTPm', '2025-10-01 03:25:04', '2025-10-01 03:25:04');

-- --------------------------------------------------------

--
-- Table structure for table `apartments`
--

CREATE TABLE `apartments` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `max_persons` int(10) NOT NULL,
  `size` int(10) NOT NULL,
  `view` varchar(200) NOT NULL,
  `num_beds` int(10) NOT NULL,
  `price` varchar(10) NOT NULL,
  `hotel_id` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `apartments`
--

INSERT INTO `apartments` (`id`, `name`, `image`, `max_persons`, `size`, `view`, `num_beds`, `price`, `hotel_id`, `created_at`, `updated_at`) VALUES
(1, 'Suite Room', 'room-1.jpg', 2, 45, 'Sea View', 2, '200', 1, '2025-09-12 17:44:00', '2025-09-12 17:44:00'),
(2, 'Standard Room', 'room-2.jpg', 3, 40, 'Sea View', 1, '100', 2, '2025-09-12 17:44:00', '2025-09-12 17:44:00'),
(3, 'Family Room', 'room-3.jpg', 4, 55, 'Mountain View', 4, '300', 3, '2025-09-12 17:44:00', '2025-09-12 17:44:00'),
(7, 'Room1', 'room-4.jpg', 4, 60, 'Sea', 2, '200', 2, '2025-10-01 08:24:57', '2025-10-01 08:24:57');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone_number` varchar(40) NOT NULL,
  `check_in` varchar(200) NOT NULL,
  `check_out` varchar(200) NOT NULL,
  `days` int(10) NOT NULL,
  `price` int(30) NOT NULL,
  `user_id` int(10) NOT NULL,
  `room_name` varchar(200) NOT NULL,
  `hotel_name` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL DEFAULT 'SUCCESS',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `name`, `email`, `phone_number`, `check_in`, `check_out`, `days`, `price`, `user_id`, `room_name`, `hotel_name`, `status`, `created_at`, `updated_at`) VALUES
(49, 'Rohan Gupta', 'rohan123@gmail.com', '545416265165', '2025-10-02', '2025-10-08', 6, 1200, 1, 'Suite Room', 'Sherton', 'pending', '2025-10-01 06:25:30', '2025-10-01 08:38:07'),
(50, 'Rohan Gupta', 'rohan123@gmail.com', '545416265165', '2025-10-01', '2025-10-03', 2, 400, 1, 'Suite Room', 'Sherton', 'cancelled', '2025-10-01 06:30:09', '2025-10-01 06:49:12'),
(52, 'Rohan Gupta', 'rohan123@gmail.com', '545416265165', '2025-10-01', '2025-10-07', 6, 1800, 1, 'Family Room', 'The Ritz', 'confirmed', '2025-10-01 06:46:00', '2025-10-01 06:48:54'),
(53, 'Rohan Gupta', 'rohan123@gmail.com', '545416265165', '2025-10-01', '2025-10-03', 2, 600, 1, 'Family Room', 'The Ritz', 'confirmed', '2025-10-01 06:47:13', '2025-10-01 08:39:17'),
(55, 'Pranjal Patel', 'pranjal123@gmail.com', '5465465465+6562', '2025-10-01', '2025-10-15', 14, 1400, 4, 'Standard Room', 'The Plaza Hotel', 'cancelled', '2025-10-01 08:21:03', '2025-10-01 08:23:28');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `location` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `name`, `image`, `description`, `location`, `created_at`, `updated_at`) VALUES
(1, 'Sherton', 'image_4.jpg', 'Progressively deliver cutting-edge imperatives via functional benefits. Seamlessly disintermediate low-risk high-yield innovation vis-a-vis viral niche markets. Appropriately develop out-of-the-box architectures before compelling technologies. Proactively mesh.', 'Cairo', '2025-09-12 16:50:22', '2025-09-12 16:50:22'),
(2, 'The Plaza Hotel', 'services-1.jpg', 'Assertively deliver standardized infrastructures and mission-critical e-business. Seamlessly reintermediate market-driven testing procedures whereas effective infomediaries. Completely repurpose front-end total linkage and multifunctional users. Proactively reintermediate.', 'New York', '2025-09-12 16:50:22', '2025-09-12 16:50:22'),
(3, 'The Ritz', 'image_4.jpg', 'Enthusiastically initiate magnetic collaboration and idea-sharing for alternative customer service. Monotonectally provide access to ubiquitous services vis-a-vis B2B vortals. Distinctively underwhelm plug-and-play value whereas robust.', 'Paris', '2025-09-12 16:50:22', '2025-09-12 16:50:22');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1);

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
('ag0gB8kthVDVnUclxZWt98UFE04Q86O9EtCQBWlI', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoic0N3VWI0Z3hnM2xnUEhtSjVwUUlHSGQxUUlXOHlWWXVOMEtUbWx4UCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9ob3RlbHMvcGF5Ijt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NDtzOjQ6ImF1dGgiO2E6MTp7czoyMToicGFzc3dvcmRfY29uZmlybWVkX2F0IjtpOjE3NTkzMjY1OTM7fXM6NToicHJpY2UiO3M6NzoiMTQwMC4wMCI7fQ==', 1759326663),
('DFVgFZNsSsHDTJ4HNadNUZ9OZnjoFIBlkPrWkEfw', 4, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoicjVXM3V5d1VKUzZVUjhnZ1dpTFVZRldLRTk0NjJkUEhIekFGZEhkZiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9ob3RlbHMvcGF5Ijt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6NDtzOjQ6ImF1dGgiO2E6MTp7czoyMToicGFzc3dvcmRfY29uZmlybWVkX2F0IjtpOjE3NTkzMjYyNDA7fXM6NToicHJpY2UiO3M6NjoiOTAwLjAwIjt9', 1759326316),
('fFrrRO8Sbx6nm2VoDnvoTDo7J9Rb7gBiHBlIIiDs', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiMTNSODJhWjRUUEhETXkzTXlTSDNWZjlMQjlWWWFZN1podklEN2pWUyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9sb2dpbiI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czo0OiJhdXRoIjthOjE6e3M6MjE6InBhc3N3b3JkX2NvbmZpcm1lZF9hdCI7aToxNzU5MzM0NjMxO31zOjM6InVybCI7YToxOntzOjg6ImludGVuZGVkIjtzOjMzOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYWRtaW4vaW5kZXgiO319', 1759334897),
('JqQU922soHaxEtcnEYzC23wUGq3i1nMzXziBGSdp', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/141.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZnlGNHJlQWRaUVY3VlI4S29wcjM5blJwWjJLQWhoZXlzbkxzNU9iNCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTQ6Imh0dHA6Ly9xdWFkcml2aWFsLWdseW5kYS1wcmVzY3JpcHRpdmVseS5uZ3Jvay1mcmVlLmRldiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1759334498),
('kpfIygOLqkZiwMxmTiziKYNtTaXebyZj5HYSi4gm', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiR2daTUd2TTlpa1J1OVdlQklBV0F5VndwU2l6NE56SEpvRG9CNWp6aSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9ob3RlbHMvcGF5Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjQ6ImF1dGgiO2E6MTp7czoyMToicGFzc3dvcmRfY29uZmlybWVkX2F0IjtpOjE3NTkzMjEwMTM7fXM6NToicHJpY2UiO3M6NjoiNjAwLjAwIjt9', 1759321033),
('LY1Buq0bDuEuEJ3F99TfGcwdWWks1HC2fYbyUDVr', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTo4OntzOjY6Il90b2tlbiI7czo0MDoicU5CSnhZOW1TR0ZYQ3FjWTJaU05mU0JrVW1HM1g3U1dwaHEzTHVlcyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9ob3RlbHMvcGF5Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czo0OiJhdXRoIjthOjE6e3M6MjE6InBhc3N3b3JkX2NvbmZpcm1lZF9hdCI7aToxNzU5MzIwNTE1O31zOjUyOiJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjc7czo1OiJwcmljZSI7czo3OiIxODAwLjAwIjt9', 1759320960),
('Vdw9ps0H3moAL11ppZqMEZGQLwSRElGX5L9lB5zP', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/140.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoidGpBR2RYZEhjMmo5aVFPbVNNSUlPck1HODJiSWo4V1VJWGdPcUpVbCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9ob3RlbHMvcGF5Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjQ6ImF1dGgiO2E6MTp7czoyMToicGFzc3dvcmRfY29uZmlybWVkX2F0IjtpOjE3NTkzMTg3OTc7fXM6NToicHJpY2UiO3M6NzoiMTQwMC4wMCI7fQ==', 1759320375);

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
(1, 'Rohan Gupta', 'rohan123@gmail.com', NULL, '$2y$12$OZQHTOtkShCHvnNvKNNeeeaiN8nAK6tsNvTqqZb9ggaXHPmpuZ/De', NULL, '2025-09-10 14:57:10', '2025-09-10 14:57:10'),
(4, 'Pranjal Patel', 'pranjal123@gmail.com', NULL, '$2y$12$eax3zuAPwRh4SSyYwQ7ZNuu5gVRs5JOcKnAlrKJ1L.slU3ogaFsDi', NULL, '2025-10-01 08:13:42', '2025-10-01 08:13:42'),
(5, 'Rahul Singh', 'rahul88@yahoo.com', NULL, '$2y$12$8J30tDdhnT.VHzC8UUIBk.X6WW/I0Umpeeq79b9vWO3jHOqWw9srO', NULL, '2025-10-01 08:41:42', '2025-10-01 08:41:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apartments`
--
ALTER TABLE `apartments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `apartments`
--
ALTER TABLE `apartments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
