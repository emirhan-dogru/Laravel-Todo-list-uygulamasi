-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 19 Ara 2021, 23:42:11
-- Sunucu sürümü: 10.4.21-MariaDB
-- PHP Sürümü: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `todo-list`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `failed_jobs`
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
-- Tablo için tablo yapısı `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_12_18_165258_create_todo_lists_table', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `personal_access_tokens`
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
-- Tablo için tablo yapısı `todo_lists`
--

CREATE TABLE `todo_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `todo_lists`
--

INSERT INTO `todo_lists` (`id`, `user_id`, `name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ekmek Al', '1', '2021-12-19 06:33:13', '2021-12-19 07:03:52'),
(4, 1, 'Ekmek Al', '1', '2021-12-19 06:33:13', '2021-12-19 07:03:52'),
(5, 1, 'yürüş yap', '1', '2021-12-19 06:33:13', '2021-12-19 07:03:52'),
(6, 1, 'Ekmek Al', '1', '2021-12-19 06:33:13', '2021-12-19 07:03:52'),
(7, 1, 'Ekmek Al', '1', '2021-12-19 06:33:13', '2021-12-19 07:03:52'),
(8, 1, 'Ekmek Al', '1', '2021-12-19 06:33:13', '2021-12-19 07:03:52'),
(9, 1, 'Ekmek Al', '1', '2021-12-19 06:33:13', '2021-12-19 07:03:52'),
(10, 1, 'su Al', '1', '2021-12-19 06:33:13', '2021-12-19 07:03:52'),
(11, 1, 'Ekmek Al', '1', '2021-12-19 06:33:13', '2021-12-19 07:03:52'),
(12, 1, 'Ekmek Al', '1', '2021-12-19 06:33:13', '2021-12-19 07:03:52'),
(13, 1, 'Ekmek Al', '1', '2021-12-19 06:33:13', '2021-12-19 07:03:52'),
(14, 1, 'Ekmek Al', '1', '2021-12-19 06:33:13', '2021-12-19 07:03:52'),
(15, 1, 'Ekmek Al', '1', '2021-12-19 06:33:13', '2021-12-19 07:03:52'),
(16, 1, 'Ekmek Al', '1', '2021-12-19 06:33:13', '2021-12-19 07:03:52'),
(17, 1, 'Ekmek Al', '1', '2021-12-19 06:33:13', '2021-12-19 07:03:52'),
(18, 1, 'Ekmek Al', '1', '2021-12-19 06:33:13', '2021-12-19 07:03:52'),
(19, 1, 'Ekmek Al', '1', '2021-12-19 06:33:13', '2021-12-19 07:03:52'),
(20, 1, 'Ekmek Al', '1', '2021-12-19 06:33:13', '2021-12-19 07:03:52'),
(21, 1, 'Ekmek Al', '1', '2021-12-19 06:33:13', '2021-12-19 07:03:52'),
(22, 1, 'Ekmek Al', '1', '2021-12-19 06:33:13', '2021-12-19 07:03:52'),
(23, 1, 'Ekmek Al', '1', '2021-12-19 06:33:13', '2021-12-19 07:03:52'),
(24, 1, 'Ekmek Al', '1', '2021-12-19 06:33:13', '2021-12-19 07:03:52'),
(25, 1, 'Ekmek Al', '1', '2021-12-19 06:33:13', '2021-12-19 07:03:52'),
(26, 1, 'Ekmek Al', '1', '2021-12-19 06:33:13', '2021-12-19 07:03:52'),
(27, 1, 'Ekmek Al', '1', '2021-12-19 06:33:13', '2021-12-19 07:03:52'),
(28, 1, 'Ekmek Al', '1', '2021-12-19 06:33:13', '2021-12-19 07:03:52'),
(29, 1, 'Ekmek Al', '1', '2021-12-19 06:33:13', '2021-12-19 07:03:52'),
(30, 1, 'Ekmek Al', '1', '2021-12-19 06:33:13', '2021-12-19 07:03:52'),
(31, 1, 'Ekmek Al', '1', '2021-12-19 06:33:13', '2021-12-19 07:03:52'),
(32, 1, 'Ekmek Al', '1', '2021-12-19 06:33:13', '2021-12-19 07:03:52'),
(33, 1, 'Ekmek Al', '1', '2021-12-19 06:33:13', '2021-12-19 07:03:52'),
(34, 1, 'Ekmek Al', '1', '2021-12-19 06:33:13', '2021-12-19 07:03:52'),
(36, 2, 'Ekmek Al', '1', '2021-12-19 18:40:27', NULL),
(38, 4, 'Ekmek Al', '1', '2021-12-19 19:31:38', NULL),
(39, 4, 'Su Al', '1', '2021-12-19 19:33:12', NULL),
(40, 4, 'Kıyafet Al', '0', '2021-12-19 19:33:19', '2021-12-19 19:33:53'),
(41, 4, 'Ayakkabı Al', '1', '2021-12-19 19:33:25', NULL),
(42, 4, 'Kod Yaz', '0', '2021-12-19 19:33:49', '2021-12-19 19:33:52');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('1','2') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Emirhan DOĞRU', 'emirhan-dogru@hotmail.com', NULL, '$2y$10$2oDpxFmAHFhnso6hpJInEOBygxZbqiJR7e0H027oTqCazbtlbwary', '1', NULL, '2021-12-19 19:39:51', NULL),
(3, 'admin', 'admin@gmail.com', NULL, '$2y$10$8sXHXYWoyUQ1iLzZf4wu5eQh8FU6zuuTxd7IOCsKOYgNjbO7x3ypG', '2', 'hd2RQngbtVR9tMpDbfv3mVewaw45etMqFv87qXMzjtwRZjVkPqrazMT4GW4b', '2021-12-19 18:52:43', NULL),
(4, 'Deneme', 'deneme@gmail.com', NULL, '$2y$10$yDF6Ian/Q6C9NI0aZNEuPeWJLa9lZuTOMibxOhUl.5zYJHeA0B5wW', '1', NULL, '2021-12-19 19:30:29', NULL);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Tablo için indeksler `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Tablo için indeksler `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Tablo için indeksler `todo_lists`
--
ALTER TABLE `todo_lists`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `todo_lists`
--
ALTER TABLE `todo_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
