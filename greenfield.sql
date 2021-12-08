-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 08, 2021 at 10:25 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `greenfield`
--

-- --------------------------------------------------------

--
-- Table structure for table `apartments`
--

CREATE TABLE `apartments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `building_type` enum('Flat','Detached House','Semi-detached House','Terraced House','Bungalow','Town House','Shop','Office Space','Developing Building') COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_of_3_bedroom` tinyint(4) DEFAULT NULL,
  `number_of_2_bedroom` tinyint(4) DEFAULT NULL,
  `number_of_room_and_palour` tinyint(4) DEFAULT NULL,
  `number_of_self_contain` tinyint(4) DEFAULT NULL,
  `number_of_shop` tinyint(4) DEFAULT NULL,
  `number_of_office_space` tinyint(4) DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci,
  `transformer` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `apartments`
--

INSERT INTO `apartments` (`id`, `user_id`, `property_id`, `building_type`, `number_of_3_bedroom`, `number_of_2_bedroom`, `number_of_room_and_palour`, `number_of_self_contain`, `number_of_shop`, `number_of_office_space`, `description`, `transformer`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Flat', NULL, 3, 4, 3, NULL, NULL, 'It is a two-story', NULL, '2021-09-09 11:20:49', '2021-09-09 11:20:49'),
(2, 9, 3, 'Flat', NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, '2021-10-16 09:53:22', '2021-10-16 09:53:22');

-- --------------------------------------------------------

--
-- Table structure for table `biodatas`
--

CREATE TABLE `biodatas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `gender` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `religion` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `occupation` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_moved_in` date DEFAULT NULL,
  `marital_status` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_of_spouse` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wedding_aniversary_date` date DEFAULT NULL,
  `phone_number_home` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number_whatsapp` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `are_you_a_resident` tinyint(1) DEFAULT NULL,
  `next_of_kin` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relationship_with_next_of_kin` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `next_of_kin_phone_number` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `biodatas`
--

INSERT INTO `biodatas` (`id`, `user_id`, `gender`, `date_of_birth`, `religion`, `occupation`, `nationality`, `date_moved_in`, `marital_status`, `name_of_spouse`, `wedding_aniversary_date`, `phone_number_home`, `phone_number_whatsapp`, `are_you_a_resident`, `next_of_kin`, `relationship_with_next_of_kin`, `next_of_kin_phone_number`, `created_at`, `updated_at`) VALUES
(1, 1, 'Male', '1990-04-06', 'Christianity', 'Web Developer', 'Nigeria', NULL, 'Single', NULL, NULL, '07032189024', '09022590998', 1, 'Juwon Odusanya', 'Brother', '08062137505', NULL, '2021-09-04 17:46:56'),
(2, 5, 'Male', '1990-04-06', 'Christainity', 'Web Developer', 'Nigerian', '2016-09-16', 'Single', NULL, NULL, NULL, '09022590998', 1, 'Odusanya Olajuwon', 'Brother', '08062137505', '2021-09-10 13:30:36', '2021-09-22 18:50:51'),
(3, 6, 'Male', '1988-08-07', 'Christainity', 'Accountant', 'Nigeria', '2020-08-09', 'Single', NULL, NULL, NULL, '08036327542', 1, 'John', 'Brother', '08037821902', '2021-09-28 07:12:55', '2021-09-28 09:48:14'),
(4, 7, 'Male', '1990-04-06', 'Christianity', 'Web Developer', 'Nigeria', '2016-08-12', 'Single', NULL, NULL, NULL, '07032189024', 1, 'Olajuwon Odusanya', 'Brother', '08062137505', '2021-09-29 14:08:15', '2021-09-29 15:14:41'),
(5, 8, 'Male', '1974-08-18', 'Muslim', 'Pensioner', 'Nigeria', '2011-09-12', 'Married', NULL, NULL, NULL, '08032324956', 1, 'Abiola Odusanya', 'Son', '08032324956', '2021-10-04 10:19:55', '2021-10-04 11:48:02'),
(6, 9, 'Male', '1990-04-06', 'Christainity', 'Web Developer', 'Nigeria', '2015-08-12', 'Single', NULL, NULL, NULL, '07032189024', 1, 'Abiola Odusanya', 'Brother', '08032324956', '2021-10-16 08:35:25', '2021-10-16 09:37:43'),
(7, 10, 'Male', '1988-09-12', 'Muslim', 'Vulganiser', 'Nigeria', '2017-09-02', 'Married', NULL, NULL, NULL, '08043218923', 1, 'Malik Akinpelu', 'Brother', '08038921902', '2021-10-16 10:02:05', '2021-10-16 10:07:49');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_09_01_052914_create_biodatas_table', 2),
(5, '2021_09_04_134717_create_properties_table', 3),
(7, '2021_09_04_162215_create_apartments_table', 4),
(11, '2021_09_10_071716_create_tenants_table', 5),
(12, '2021_10_06_135131_create_services_table', 6),
(13, '2021_10_06_135920_create_monthly_payments_table', 7),
(14, '2021_10_06_141105_create_one_off_payments_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `monthly_payments`
--

CREATE TABLE `monthly_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `year` smallint(6) NOT NULL,
  `january` tinyint(1) NOT NULL DEFAULT '0',
  `february` tinyint(1) NOT NULL DEFAULT '0',
  `march` tinyint(1) NOT NULL DEFAULT '0',
  `april` tinyint(1) NOT NULL DEFAULT '0',
  `may` tinyint(1) NOT NULL DEFAULT '0',
  `june` tinyint(1) NOT NULL DEFAULT '0',
  `july` tinyint(1) NOT NULL DEFAULT '0',
  `august` tinyint(1) NOT NULL DEFAULT '0',
  `september` tinyint(1) NOT NULL DEFAULT '0',
  `october` tinyint(1) NOT NULL DEFAULT '0',
  `november` tinyint(1) NOT NULL DEFAULT '0',
  `december` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `monthly_payments`
--

INSERT INTO `monthly_payments` (`id`, `user_id`, `service_id`, `year`, `january`, `february`, `march`, `april`, `may`, `june`, `july`, `august`, `september`, `october`, `november`, `december`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2021, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, '2021-10-08 12:31:14', '2021-10-08 12:31:14'),
(2, 5, 1, 2021, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, '2021-10-08 12:31:14', '2021-10-08 12:31:14'),
(3, 6, 1, 2021, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, '2021-10-08 12:31:14', '2021-10-08 12:31:14'),
(4, 7, 1, 2021, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, '2021-10-08 12:31:14', '2021-10-08 12:31:14'),
(5, 8, 1, 2021, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, '2021-10-08 12:31:14', '2021-10-08 12:31:14'),
(6, 1, 2, 2021, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, '2021-10-11 12:31:03', '2021-10-11 12:31:03'),
(7, 5, 2, 2021, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, 0, '2021-10-11 12:31:03', '2021-10-11 12:31:03'),
(8, 6, 2, 2021, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, '2021-10-11 12:31:03', '2021-10-11 12:31:03'),
(9, 7, 2, 2021, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, '2021-10-11 12:31:03', '2021-10-11 12:31:03'),
(10, 8, 2, 2021, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, '2021-10-11 12:31:03', '2021-10-11 12:31:03'),
(11, 9, 1, 2021, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, '2021-10-16 08:35:25', '2021-10-16 08:35:25'),
(12, 9, 2, 2021, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, '2021-10-16 08:35:25', '2021-10-16 08:35:25'),
(13, 10, 1, 2021, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, '2021-10-16 10:02:05', '2021-10-16 10:02:05'),
(14, 10, 2, 2021, 1, 1, 1, 1, 1, 1, 1, 1, 1, 0, 0, 0, '2021-10-16 10:02:05', '2021-10-16 10:02:05');

-- --------------------------------------------------------

--
-- Table structure for table `one_off_payments`
--

CREATE TABLE `one_off_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `service_id` bigint(20) UNSIGNED NOT NULL,
  `year` smallint(6) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `one_off_payments`
--

INSERT INTO `one_off_payments` (`id`, `user_id`, `service_id`, `year`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 2021, 0, '2021-09-15 03:15:35', '2021-10-17 03:15:35'),
(2, 5, 3, 2021, 0, '2021-10-17 03:15:35', '2021-10-17 03:15:35'),
(3, 6, 3, 2021, 0, '2021-10-17 03:15:35', '2021-10-17 03:15:35'),
(4, 7, 3, 2021, 0, '2021-10-17 03:15:35', '2021-10-17 03:15:35'),
(5, 8, 3, 2021, 0, '2021-10-17 03:15:35', '2021-10-17 03:15:35'),
(6, 9, 3, 2021, 0, '2021-10-17 03:15:35', '2021-10-17 03:15:35'),
(7, 10, 3, 2021, 0, '2021-10-17 03:15:35', '2021-10-17 03:15:35');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('joy.dammie@gmail.com', '8Y5c2nNXJqoxKNSv8cSn6J4TrLi6IEAFH1l172CDCxFp1C1e7F9RZnblwx4R', '2021-09-24 18:05:45');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `house_number` tinyint(4) NOT NULL,
  `street_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `property_class` enum('Stand alone Private Residential','Private &amp; Commercial Joint','Fully Commerial') COLLATE utf8mb4_unicode_ci NOT NULL,
  `property_category` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `property_type` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `user_id`, `house_number`, `street_name`, `property_class`, `property_category`, `property_type`, `created_at`, `updated_at`) VALUES
(2, 1, 2, 'Moses Afolabi Street', 'Fully Commerial', 'Residential', 'Flat', '2021-09-07 16:38:58', '2021-09-08 15:37:36'),
(3, 9, 22, 'Raji Owolegbon', 'Private &amp; Commercial Joint', 'Residential', 'Bungalow', '2021-10-16 08:51:50', '2021-10-16 08:51:50');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `audience` enum('Landlords/Landladies','Tenants','Both') COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `payment_type` enum('Monthly','One-off') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `audience`, `amount`, `payment_type`, `created_at`, `updated_at`) VALUES
(1, 'Lawma', 'Both', 4000, 'Monthly', '2021-10-08 12:31:14', '2021-10-08 12:31:14'),
(2, 'Security', 'Both', 3000, 'Monthly', '2021-10-11 12:31:03', '2021-10-11 12:31:03'),
(3, 'Street light construction', 'Both', 4000, 'One-off', '2021-10-17 03:15:35', '2021-10-17 03:15:35');

-- --------------------------------------------------------

--
-- Table structure for table `tenants`
--

CREATE TABLE `tenants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `landlord_user_id` bigint(20) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `apartment_id` bigint(20) UNSIGNED NOT NULL,
  `property_id` bigint(20) UNSIGNED NOT NULL,
  `apartment_type` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `third_party_name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `third_party_phone` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `third_party_email` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `third_party_whatsapp` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tenants`
--

INSERT INTO `tenants` (`id`, `landlord_user_id`, `user_id`, `apartment_id`, `property_id`, `apartment_type`, `third_party_name`, `third_party_phone`, `third_party_email`, `third_party_whatsapp`, `created_at`, `updated_at`) VALUES
(2, 1, 5, 1, 2, 'Room & Palour', 'Abiola Odusanya', '08032324956', 'ab4single@yahoo.com', '08032324956', '2021-09-10 13:30:36', '2021-09-22 18:50:51'),
(3, 1, 6, 1, 2, 'Self Contain', NULL, NULL, NULL, NULL, '2021-09-28 07:12:55', '2021-09-28 09:48:14'),
(4, 9, 10, 2, 3, 'Room & Palour', NULL, NULL, NULL, NULL, '2021-10-16 10:02:05', '2021-10-16 10:02:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `salutation` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middlename` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `firstname` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_phone` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(4) NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `salutation`, `lastname`, `middlename`, `firstname`, `mobile_phone`, `role`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mr', 'Odusanya', 'Sodiq', 'Damilare', '07032189024', 2, 'joy.dammie@yahoo.com', '$2y$10$GUdeVQBYfPmby2wbFzX/4.Xo48xZ9X8XA5rC4d/TGqygkWnGb/HXC', NULL, '2021-09-01 11:57:19', '2021-09-04 17:46:56'),
(5, 'Mr', 'Odusanya', 'Sodiq', 'Dare', '09022590998', 3, 'joy.dammie@gmail.com', '$2y$10$Oj3kayFaBoGPDxBIVgeOGexNPjijQpTIsOhJ.h187lKpCJxba4qiS', NULL, '2021-09-10 13:30:36', '2021-09-24 18:18:27'),
(6, 'Dr', 'Ajayi', 'Matthew', 'Oluwakayode', '08036327542', 3, 'ajayi.kayode@gmail.com', '$2y$10$Jihtpw6CVOhlt9PN0qIWmOfJtlix5M/croxxOOuDmeLiYGCaLjXoi', NULL, '2021-09-28 07:12:55', '2021-09-28 09:48:14'),
(7, 'Mr', 'Odusanya', 'Sodiq', 'Dare', '07032189024', 1, 'admin@greenfieldestate.org', '$2y$10$WqEmuWkwbRXFluMW9hz0vu3diuUXI/r98wedXpryJJNh5EX17Jrje', NULL, '2021-09-29 14:08:15', '2021-09-29 15:14:41'),
(8, 'Mr', 'Odusanya', 'Saliu', 'Adesunji', '08062137505', 2, 'adesunji.odusanya@gmail.com', '$2y$10$urSV6j1XVJi8s0Oa6PGWVe6RMp6NixKqkl5iZ8Dn7yRP1BboT0XWy', NULL, '2021-10-04 10:19:55', '2021-10-04 11:48:02'),
(9, 'Mr', 'Odusanya', 'Dare', 'Ayorinde', '07032189024', 2, 'ayorindeodusanya@gmail.com', '$2y$10$ElHw32LPIsOQ/px1P79FquNPIELppUPDrL8wLuC5rBCcFNJegL2Wi', NULL, '2021-10-16 08:35:25', '2021-10-16 09:37:43'),
(10, 'Mr', 'Akinpelu', 'Sule', 'Dauda', '08043218923', 3, 'akinpelu.dauda@gmail.com', '$2y$10$XA3Ah6TNg5vjUcjriDeInOgc2mSUyUiSyooweBld9agQPdZaHpXOG', NULL, '2021-10-16 10:02:05', '2021-10-16 10:07:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apartments`
--
ALTER TABLE `apartments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `apartments_user_id_foreign` (`user_id`),
  ADD KEY `apartments_property_id_foreign` (`property_id`);

--
-- Indexes for table `biodatas`
--
ALTER TABLE `biodatas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `biodatas_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monthly_payments`
--
ALTER TABLE `monthly_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `monthly_payments_user_id_foreign` (`user_id`),
  ADD KEY `monthly_payments_service_id_foreign` (`service_id`);

--
-- Indexes for table `one_off_payments`
--
ALTER TABLE `one_off_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `one_off_payments_user_id_foreign` (`user_id`),
  ADD KEY `one_off_payments_service_id_foreign` (`service_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `properties_user_id_foreign` (`user_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tenants`
--
ALTER TABLE `tenants`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tenants_user_id_foreign` (`user_id`),
  ADD KEY `tenants_apartment_id_foreign` (`apartment_id`),
  ADD KEY `tenants_property_id_foreign` (`property_id`);

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
-- AUTO_INCREMENT for table `apartments`
--
ALTER TABLE `apartments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `biodatas`
--
ALTER TABLE `biodatas`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `monthly_payments`
--
ALTER TABLE `monthly_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `one_off_payments`
--
ALTER TABLE `one_off_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tenants`
--
ALTER TABLE `tenants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `apartments`
--
ALTER TABLE `apartments`
  ADD CONSTRAINT `apartments_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `apartments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `biodatas`
--
ALTER TABLE `biodatas`
  ADD CONSTRAINT `biodatas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `monthly_payments`
--
ALTER TABLE `monthly_payments`
  ADD CONSTRAINT `monthly_payments_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `monthly_payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `one_off_payments`
--
ALTER TABLE `one_off_payments`
  ADD CONSTRAINT `one_off_payments_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `one_off_payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `properties`
--
ALTER TABLE `properties`
  ADD CONSTRAINT `properties_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tenants`
--
ALTER TABLE `tenants`
  ADD CONSTRAINT `tenants_apartment_id_foreign` FOREIGN KEY (`apartment_id`) REFERENCES `apartments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tenants_property_id_foreign` FOREIGN KEY (`property_id`) REFERENCES `properties` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tenants_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
