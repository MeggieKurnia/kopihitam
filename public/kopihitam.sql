	-- phpMyAdmin SQL Dump
	-- version 5.2.0
	-- https://www.phpmyadmin.net/
	--
	-- Host: localhost
	-- Generation Time: Jun 05, 2025 at 05:25 PM
	-- Server version: 8.0.31-0ubuntu0.22.04.1
	-- PHP Version: 8.3.20
	
	SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
	START TRANSACTION;
	SET time_zone = "+00:00";
	
	
	/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
	/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
	/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
	/*!40101 SET NAMES utf8mb4 */;
	
	--
	-- Database: `kopihitam`
	--
	
	-- --------------------------------------------------------
	
	--
	-- Table structure for table `failed_jobs`
	--
	
	CREATE TABLE `failed_jobs` (
	  `id` bigint UNSIGNED NOT NULL,
	  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
	  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
	  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
	  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
	  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
	) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
	
	-- --------------------------------------------------------
	
	--
	-- Table structure for table `menus`
	--
	
	CREATE TABLE `menus` (
	  `id` bigint UNSIGNED NOT NULL,
	  `template` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	  `sequence_date` datetime NOT NULL,
	  `is_active` int NOT NULL DEFAULT '1',
	  `banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	  `is_parent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	  `show_home` int DEFAULT NULL,
	  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	  `youtube_embed` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	  `created_at` timestamp NULL DEFAULT NULL,
	  `updated_at` timestamp NULL DEFAULT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
	
	-- --------------------------------------------------------
	
	--
	-- Table structure for table `menus_lang`
	--
	
	CREATE TABLE `menus_lang` (
	  `id` bigint UNSIGNED NOT NULL,
	  `menus_id` bigint UNSIGNED NOT NULL,
	  `lang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
	  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
	  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	  `permalink` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	  `title_content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	  `section1` text COLLATE utf8mb4_unicode_ci,
	  `section2` text COLLATE utf8mb4_unicode_ci,
	  `meta_description` text COLLATE utf8mb4_unicode_ci,
	  `created_at` timestamp NULL DEFAULT NULL,
	  `updated_at` timestamp NULL DEFAULT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
	
	-- --------------------------------------------------------
	
	--
	-- Table structure for table `migrations`
	--
	
	CREATE TABLE `migrations` (
	  `id` int UNSIGNED NOT NULL,
	  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
	  `batch` int NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
	
	--
	-- Dumping data for table `migrations`
	--
	
	INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2021_11_09_070539_create_privillage', 1),
	(5, '2021_11_09_070657_create_setting', 1),
	(6, '2022_03_24_134140_create_widgets', 1),
	(7, '2022_03_30_151448_create_menus', 1),
	(8, '2025_05_31_173108_create_section2_home', 2),
	(9, '2025_05_31_184029_create_section3_home', 3),
	(10, '2025_05_31_202740_create_section4_home', 4),
	(11, '2025_06_01_145955_create_sec5home', 5),
	(14, '2025_06_05_160356_create_price', 6),
	(15, '2025_06_05_170804_alter_price', 7),
	(16, '2025_06_05_171136_create_price_cv', 8);
	
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
	-- Table structure for table `price`
	--
	
	CREATE TABLE `price` (
	  `id` bigint UNSIGNED NOT NULL,
	  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
	  `harga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
	  `harga_coret` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	  `is_advance` int DEFAULT '0',
	  `is_unggulan` int DEFAULT '0',
	  `is_active` int DEFAULT '0',
	  `created_at` timestamp NULL DEFAULT NULL,
	  `updated_at` timestamp NULL DEFAULT NULL,
	  `link_buy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
	
	--
	-- Dumping data for table `price`
	--
	
	INSERT INTO `price` (`id`, `title`, `harga`, `harga_coret`, `is_advance`, `is_unggulan`, `is_active`, `created_at`, `updated_at`, `link_buy`) VALUES
	(1, 'Free', 'Rp 0', NULL, NULL, NULL, 1, '2025-06-05 09:16:42', '2025-06-05 10:10:27', 'https://google.com'),
	(2, 'Business', 'Rp 2.5 <span>jt</span>', '<span>Rp 6.5</span> <span>jt</span>', NULL, 1, 1, '2025-06-05 09:17:23', '2025-06-05 10:10:38', 'https://google.com'),
	(3, 'Developer', 'Rp 300.000', NULL, NULL, NULL, 1, '2025-06-05 09:17:47', '2025-06-05 10:10:49', 'https://google.com'),
	(4, 'Ultimate', 'Rp 1.000.000 / Bulan', 'Rp 1.300.000', 1, NULL, 1, '2025-06-05 09:18:18', '2025-06-05 10:10:57', 'https://google.com');
	
	-- --------------------------------------------------------
	
	--
	-- Table structure for table `price_cv`
	--
	
	CREATE TABLE `price_cv` (
	  `id` bigint UNSIGNED NOT NULL,
	  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
	  `harga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
	  `harga_coret` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	  `is_advance` int DEFAULT '0',
	  `is_unggulan` int DEFAULT '0',
	  `is_active` int DEFAULT '0',
	  `link_buy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	  `created_at` timestamp NULL DEFAULT NULL,
	  `updated_at` timestamp NULL DEFAULT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
	
	--
	-- Dumping data for table `price_cv`
	--
	
	INSERT INTO `price_cv` (`id`, `title`, `harga`, `harga_coret`, `is_advance`, `is_unggulan`, `is_active`, `link_buy`, `created_at`, `updated_at`) VALUES
	(1, 'Free', 'Rp 0', NULL, NULL, NULL, 1, 'https://google.com', '2025-06-05 10:15:12', '2025-06-05 10:15:12'),
	(2, 'Business', 'Rp 3 jt', '<span>Rp 3.5</span><span>jt</span>', 1, NULL, 1, 'https://google.com', '2025-06-05 10:16:11', '2025-06-05 10:16:11'),
	(3, 'Developer', 'Rp 3jt', NULL, NULL, NULL, 1, 'https://google.com', '2025-06-05 10:16:46', '2025-06-05 10:16:46'),
	(4, 'Ultimate', 'Rp 4 jt', '<span>Rp 4.5</span><span>jt</span>', NULL, 1, 1, 'https://google.com', '2025-06-05 10:17:39', '2025-06-05 10:17:39');
	
	-- --------------------------------------------------------
	
	--
	-- Table structure for table `privillage`
	--
	
	CREATE TABLE `privillage` (
	  `id` bigint UNSIGNED NOT NULL,
	  `user_id` bigint UNSIGNED NOT NULL,
	  `module` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
	  `action` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
	  `created_at` timestamp NULL DEFAULT NULL,
	  `updated_at` timestamp NULL DEFAULT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
	
	-- --------------------------------------------------------
	
	--
	-- Table structure for table `section2_home`
	--
	
	CREATE TABLE `section2_home` (
	  `id` bigint UNSIGNED NOT NULL,
	  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	  `is_active` int NOT NULL DEFAULT '1',
	  `created_at` timestamp NULL DEFAULT NULL,
	  `updated_at` timestamp NULL DEFAULT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
	
	--
	-- Dumping data for table `section2_home`
	--
	
	INSERT INTO `section2_home` (`id`, `title`, `is_active`, `created_at`, `updated_at`) VALUES
	(1, 'huuihui', 1, '2025-05-31 10:40:22', '2025-05-31 11:29:07');
	
	-- --------------------------------------------------------
	
	--
	-- Table structure for table `section3_home`
	--
	
	CREATE TABLE `section3_home` (
	  `id` bigint UNSIGNED NOT NULL,
	  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	  `is_active` int NOT NULL DEFAULT '1',
	  `created_at` timestamp NULL DEFAULT NULL,
	  `updated_at` timestamp NULL DEFAULT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
	
	--
	-- Dumping data for table `section3_home`
	--
	
	INSERT INTO `section3_home` (`id`, `title`, `is_active`, `created_at`, `updated_at`) VALUES
	(1, 'Grab Everything <b>You Need To Be Top Notch Tes</b>', 1, '2025-05-31 11:47:49', '2025-05-31 12:48:56');
	
	-- --------------------------------------------------------
	
	--
	-- Table structure for table `section4_home`
	--
	
	CREATE TABLE `section4_home` (
	  `id` bigint UNSIGNED NOT NULL,
	  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	  `is_active` int NOT NULL DEFAULT '1',
	  `created_at` timestamp NULL DEFAULT NULL,
	  `updated_at` timestamp NULL DEFAULT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
	
	--
	-- Dumping data for table `section4_home`
	--
	
	INSERT INTO `section4_home` (`id`, `title`, `is_active`, `created_at`, `updated_at`) VALUES
	(1, 'Where Vision <b>Meets Execution Tes</b>', 1, '2025-05-31 13:35:01', '2025-05-31 13:35:01');
	
	-- --------------------------------------------------------
	
	--
	-- Table structure for table `section5_home`
	--
	
	CREATE TABLE `section5_home` (
	  `id` bigint UNSIGNED NOT NULL,
	  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	  `is_active` int NOT NULL DEFAULT '1',
	  `created_at` timestamp NULL DEFAULT NULL,
	  `updated_at` timestamp NULL DEFAULT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
	
	--
	-- Dumping data for table `section5_home`
	--
	
	INSERT INTO `section5_home` (`id`, `title`, `is_active`, `created_at`, `updated_at`) VALUES
	(1, 'Helping 100+ <b>Clients Grow Online</b>', 1, '2025-06-01 08:05:30', '2025-06-01 08:05:30');
	
	-- --------------------------------------------------------
	
	--
	-- Table structure for table `settings`
	--
	
	CREATE TABLE `settings` (
	  `id` bigint UNSIGNED NOT NULL,
	  `module` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
	  `key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	  `value` text COLLATE utf8mb4_unicode_ci,
	  `lang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	  `created_at` timestamp NULL DEFAULT NULL,
	  `updated_at` timestamp NULL DEFAULT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
	
	--
	-- Dumping data for table `settings`
	--
	
	INSERT INTO `settings` (`id`, `module`, `key`, `value`, `lang`, `created_at`, `updated_at`) VALUES
	(4, 'setting', 'online', 'on', 'en', '2025-05-31 09:54:42', '2025-05-31 09:54:42'),
	(5, 'setting', 'favicon', 'files/favicon.png', 'en', '2025-05-31 09:54:42', '2025-05-31 09:54:42'),
	(6, 'setting', 'logo', 'files/logo-dummy.png', 'en', '2025-05-31 09:54:42', '2025-05-31 09:54:42'),
	(21, 'home', 'images', 'files/hero-carousel-2.jpg', 'en', '2025-06-05 08:21:34', '2025-06-05 08:21:34'),
	(22, 'home', 'title', 'Title Tes', 'en', '2025-06-05 08:21:34', '2025-06-05 08:21:34'),
	(23, 'home', 'intro', 'Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut.', 'en', '2025-06-05 08:21:34', '2025-06-05 08:21:34'),
	(24, 'home', 'text_link', 'Get Start', 'en', '2025-06-05 08:21:34', '2025-06-05 08:21:34'),
	(25, 'home', 'link', 'https://google.com', 'en', '2025-06-05 08:21:34', '2025-06-05 08:21:34'),
	(26, 'localization', 'paket_pt', 'Paket Pendirian PT', 'en', '2025-06-05 10:24:30', '2025-06-05 10:24:30'),
	(27, 'localization', 'paket_cv', 'Paket Pendirian CV', 'en', '2025-06-05 10:24:30', '2025-06-05 10:24:30'),
	(28, 'localization', 'buy_now', 'Buy Nows', 'en', '2025-06-05 10:24:30', '2025-06-05 10:24:30');
	
	-- --------------------------------------------------------
	
	--
	-- Table structure for table `user_cms`
	--
	
	CREATE TABLE `user_cms` (
	  `id` bigint UNSIGNED NOT NULL,
	  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
	  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
	  `email_verified_at` timestamp NULL DEFAULT NULL,
	  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
	  `display` int NOT NULL DEFAULT '1',
	  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	  `created_at` timestamp NULL DEFAULT NULL,
	  `updated_at` timestamp NULL DEFAULT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
	
	--
	-- Dumping data for table `user_cms`
	--
	
	INSERT INTO `user_cms` (`id`, `name`, `email`, `email_verified_at`, `password`, `display`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'superadmin', 'superadmin@mail.com', NULL, '$2y$12$Xgo5JrrsPh.QZdDaADDW7OPjKzN3eRmqvqx0PwsmC7NMi4n356idu', 0, NULL, NULL, NULL),
	(2, 'admin', 'admin@mail.com', NULL, '$2y$12$23lu5fG9vT8Iau2L5leAcubV3kfoIjJ0FQqGxqHKDACl0IfdwgXhW', 1, NULL, NULL, NULL);
	
	-- --------------------------------------------------------
	
	--
	-- Table structure for table `widgets`
	--
	
	CREATE TABLE `widgets` (
	  `id` bigint UNSIGNED NOT NULL,
	  `base_id` int NOT NULL,
	  `module` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
	  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
	  `sequence` datetime NOT NULL,
	  `is_active` int NOT NULL DEFAULT '1',
	  `created_at` timestamp NULL DEFAULT NULL,
	  `updated_at` timestamp NULL DEFAULT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
	
	--
	-- Dumping data for table `widgets`
	--
	
	INSERT INTO `widgets` (`id`, `base_id`, `module`, `name`, `sequence`, `is_active`, `created_at`, `updated_at`) VALUES
	(3, 1, 'section2', 'image', '2025-05-31 17:40:22', 1, NULL, NULL),
	(4, 1, 'section2', 'image', '2025-05-31 17:40:22', 1, NULL, NULL),
	(5, 1, 'section2', 'image', '2025-05-31 18:29:07', 1, NULL, NULL),
	(6, 1, 'section2', 'image', '2025-05-31 18:29:07', 1, NULL, NULL),
	(22, 1, 'section3', 'image', '2025-05-31 19:03:13', 1, NULL, NULL),
	(23, 1, 'section3', 'image', '2025-05-31 19:03:13', 1, NULL, NULL),
	(24, 1, 'section3', 'image', '2025-05-31 19:02:29', 1, NULL, NULL),
	(25, 1, 'section3', 'image', '2025-05-31 18:47:49', 1, NULL, NULL),
	(26, 1, 'section3', 'image', '2025-05-31 19:48:56', 1, NULL, NULL),
	(27, 1, 'section3', 'image', '2025-05-31 19:48:56', 1, NULL, NULL),
	(28, 1, 'section3', 'image', '2025-05-31 19:48:56', 1, NULL, NULL),
	(29, 1, 'section4', 'image', '2025-05-31 20:35:01', 1, NULL, NULL),
	(30, 1, 'section4', 'image', '2025-05-31 20:35:01', 1, NULL, NULL),
	(31, 1, 'section5', 'image', '2025-06-01 15:05:30', 1, NULL, NULL),
	(52, 1, 'price', 'item', '2025-06-05 16:26:21', 1, NULL, NULL),
	(53, 1, 'price', 'item', '2025-06-05 16:26:21', 1, NULL, NULL),
	(54, 1, 'price', 'item', '2025-06-05 16:26:21', 1, NULL, NULL),
	(55, 1, 'price', 'item', '2025-06-05 16:26:21', 1, NULL, NULL),
	(56, 2, 'price', 'item', '2025-06-05 16:27:34', 1, NULL, NULL),
	(57, 2, 'price', 'item', '2025-06-05 16:27:34', 1, NULL, NULL),
	(58, 3, 'price', 'item', '2025-06-05 16:27:44', 1, NULL, NULL),
	(59, 4, 'price', 'item', '2025-06-05 16:27:54', 1, NULL, NULL),
	(60, 1, 'price_cv', 'item', '2025-06-05 17:15:12', 1, NULL, NULL),
	(61, 2, 'price_cv', 'item', '2025-06-05 17:16:11', 1, NULL, NULL),
	(62, 3, 'price_cv', 'item', '2025-06-05 17:16:46', 1, NULL, NULL),
	(63, 4, 'price_cv', 'item', '2025-06-05 17:17:39', 1, NULL, NULL);
	
	-- --------------------------------------------------------
	
	--
	-- Table structure for table `widget_value`
	--
	
	CREATE TABLE `widget_value` (
	  `id` bigint UNSIGNED NOT NULL,
	  `widget_id` bigint UNSIGNED NOT NULL,
	  `lang` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	  `key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	  `value` text COLLATE utf8mb4_unicode_ci,
	  `created_at` timestamp NULL DEFAULT NULL,
	  `updated_at` timestamp NULL DEFAULT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
	
	--
	-- Dumping data for table `widget_value`
	--
	
	INSERT INTO `widget_value` (`id`, `widget_id`, `lang`, `key`, `value`, `created_at`, `updated_at`) VALUES
	(3, 3, NULL, 'images', 'files/logo-dummy.png', NULL, NULL),
	(4, 4, NULL, 'images', 'files/favicon.png', NULL, NULL),
	(5, 5, NULL, 'images', 'files/banner-sustainability-report.jpg', NULL, NULL),
	(6, 6, NULL, 'images', 'files/logo-misc.png', NULL, NULL),
	(52, 22, NULL, 'images', 'files/favicon.png', NULL, NULL),
	(53, 22, NULL, 'title', 'aaa', NULL, NULL),
	(54, 22, NULL, 'intro', 'bbb', NULL, NULL),
	(55, 23, NULL, 'images', 'files/favicon.png', NULL, NULL),
	(56, 23, NULL, 'title', 'ccc', NULL, NULL),
	(57, 23, NULL, 'intro', 'dddd', NULL, NULL),
	(58, 24, NULL, 'images', 'files/favicon.png', NULL, NULL),
	(59, 24, NULL, 'title', 'fsdfasd', NULL, NULL),
	(60, 24, NULL, 'intro', 'fsdfdas', NULL, NULL),
	(61, 25, NULL, 'images', 'files/logo-geo.svg', NULL, NULL),
	(62, 25, NULL, 'title', 'Lead Generation', NULL, NULL),
	(63, 25, NULL, 'intro', 'Attract and identify potential customers from multiple marketing channels.', NULL, NULL),
	(64, 26, NULL, 'images', 'files/logo-dummy.png', NULL, NULL),
	(65, 26, NULL, 'title', 'fsd', NULL, NULL),
	(66, 26, NULL, 'intro', 'dsfds', NULL, NULL),
	(67, 27, NULL, 'images', 'files/favicon.png', NULL, NULL),
	(68, 27, NULL, 'title', 'gf', NULL, NULL),
	(69, 27, NULL, 'intro', 'fdsfas', NULL, NULL),
	(70, 28, NULL, 'images', 'files/share-youtube.svg', NULL, NULL),
	(71, 28, NULL, 'title', 'gfs', NULL, NULL),
	(72, 28, NULL, 'intro', 'fsdsa', NULL, NULL),
	(73, 29, NULL, 'images', 'files/grid-2.png', NULL, NULL),
	(74, 29, NULL, 'title', 'Gapai', NULL, NULL),
	(75, 29, NULL, 'intro', 'fsdfadsfs', NULL, NULL),
	(76, 29, NULL, 'box1_title', 'fasdf', NULL, NULL),
	(77, 29, NULL, 'box1_persen', '10%', NULL, NULL),
	(78, 29, NULL, 'box2_title', 'dsafas', NULL, NULL),
	(79, 29, NULL, 'box2_persen', '20%', NULL, NULL),
	(80, 29, NULL, 'box3_title', 'sdfasd', NULL, NULL),
	(81, 29, NULL, 'box3_persen', '30%', NULL, NULL),
	(82, 30, NULL, 'images', 'files/news-1.png', NULL, NULL),
	(83, 30, NULL, 'title', 'fsdafs', NULL, NULL),
	(84, 30, NULL, 'intro', 'dfsfsad', NULL, NULL),
	(85, 30, NULL, 'box1_title', 'fds', NULL, NULL),
	(86, 30, NULL, 'box1_persen', '4%', NULL, NULL),
	(87, 30, NULL, 'box2_title', 'fsdfsad', NULL, NULL),
	(88, 30, NULL, 'box2_persen', '5%', NULL, NULL),
	(89, 30, NULL, 'box3_title', 'gsdgs', NULL, NULL),
	(90, 30, NULL, 'box3_persen', '6%', NULL, NULL),
	(91, 31, NULL, 'images', 'files/news-1.png', NULL, NULL),
	(112, 52, NULL, 'items', 'Item 1', NULL, NULL),
	(113, 53, NULL, 'items', 'Item 2', NULL, NULL),
	(114, 54, NULL, 'items', 'Item 3', NULL, NULL),
	(115, 55, NULL, 'items', 'Item 4', NULL, NULL),
	(116, 56, NULL, 'items', 'Item 1', NULL, NULL),
	(117, 57, NULL, 'items', 'Item 2', NULL, NULL),
	(118, 58, NULL, 'items', 'Item 1', NULL, NULL),
	(119, 59, NULL, 'items', 'Item x', NULL, NULL),
	(120, 60, NULL, 'items', 'Item 1', NULL, NULL),
	(121, 61, NULL, 'items', 'item 1', NULL, NULL),
	(122, 62, NULL, 'items', 'Item1', NULL, NULL),
	(123, 63, NULL, 'items', 'Item 1', NULL, NULL);
	
	--
	-- Indexes for dumped tables
	--
	
	--
	-- Indexes for table `failed_jobs`
	--
	ALTER TABLE `failed_jobs`
	  ADD PRIMARY KEY (`id`);
	
	--
	-- Indexes for table `menus`
	--
	ALTER TABLE `menus`
	  ADD PRIMARY KEY (`id`);
	
	--
	-- Indexes for table `menus_lang`
	--
	ALTER TABLE `menus_lang`
	  ADD PRIMARY KEY (`id`),
	  ADD KEY `menus_lang_menus_id_foreign` (`menus_id`);
	
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
	-- Indexes for table `price`
	--
	ALTER TABLE `price`
	  ADD PRIMARY KEY (`id`);
	
	--
	-- Indexes for table `price_cv`
	--
	ALTER TABLE `price_cv`
	  ADD PRIMARY KEY (`id`);
	
	--
	-- Indexes for table `privillage`
	--
	ALTER TABLE `privillage`
	  ADD PRIMARY KEY (`id`),
	  ADD KEY `privillage_user_id_index` (`user_id`);
	
	--
	-- Indexes for table `section2_home`
	--
	ALTER TABLE `section2_home`
	  ADD PRIMARY KEY (`id`);
	
	--
	-- Indexes for table `section3_home`
	--
	ALTER TABLE `section3_home`
	  ADD PRIMARY KEY (`id`);
	
	--
	-- Indexes for table `section4_home`
	--
	ALTER TABLE `section4_home`
	  ADD PRIMARY KEY (`id`);
	
	--
	-- Indexes for table `section5_home`
	--
	ALTER TABLE `section5_home`
	  ADD PRIMARY KEY (`id`);
	
	--
	-- Indexes for table `settings`
	--
	ALTER TABLE `settings`
	  ADD PRIMARY KEY (`id`);
	
	--
	-- Indexes for table `user_cms`
	--
	ALTER TABLE `user_cms`
	  ADD PRIMARY KEY (`id`),
	  ADD UNIQUE KEY `user_cms_email_unique` (`email`);
	
	--
	-- Indexes for table `widgets`
	--
	ALTER TABLE `widgets`
	  ADD PRIMARY KEY (`id`);
	
	--
	-- Indexes for table `widget_value`
	--
	ALTER TABLE `widget_value`
	  ADD PRIMARY KEY (`id`),
	  ADD KEY `widget_value_widget_id_foreign` (`widget_id`);
	
	--
	-- AUTO_INCREMENT for dumped tables
	--
	
	--
	-- AUTO_INCREMENT for table `failed_jobs`
	--
	ALTER TABLE `failed_jobs`
	  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
	
	--
	-- AUTO_INCREMENT for table `menus`
	--
	ALTER TABLE `menus`
	  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
	
	--
	-- AUTO_INCREMENT for table `menus_lang`
	--
	ALTER TABLE `menus_lang`
	  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
	
	--
	-- AUTO_INCREMENT for table `migrations`
	--
	ALTER TABLE `migrations`
	  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
	
	--
	-- AUTO_INCREMENT for table `price`
	--
	ALTER TABLE `price`
	  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
	
	--
	-- AUTO_INCREMENT for table `price_cv`
	--
	ALTER TABLE `price_cv`
	  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
	
	--
	-- AUTO_INCREMENT for table `privillage`
	--
	ALTER TABLE `privillage`
	  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;
	
	--
	-- AUTO_INCREMENT for table `section2_home`
	--
	ALTER TABLE `section2_home`
	  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
	
	--
	-- AUTO_INCREMENT for table `section3_home`
	--
	ALTER TABLE `section3_home`
	  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
	
	--
	-- AUTO_INCREMENT for table `section4_home`
	--
	ALTER TABLE `section4_home`
	  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
	
	--
	-- AUTO_INCREMENT for table `section5_home`
	--
	ALTER TABLE `section5_home`
	  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
	
	--
	-- AUTO_INCREMENT for table `settings`
	--
	ALTER TABLE `settings`
	  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
	
	--
	-- AUTO_INCREMENT for table `user_cms`
	--
	ALTER TABLE `user_cms`
	  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
	
	--
	-- AUTO_INCREMENT for table `widgets`
	--
	ALTER TABLE `widgets`
	  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
	
	--
	-- AUTO_INCREMENT for table `widget_value`
	--
	ALTER TABLE `widget_value`
	  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;
	
	--
	-- Constraints for dumped tables
	--
	
	--
	-- Constraints for table `menus_lang`
	--
	ALTER TABLE `menus_lang`
	  ADD CONSTRAINT `menus_lang_menus_id_foreign` FOREIGN KEY (`menus_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;
	
	--
	-- Constraints for table `privillage`
	--
	ALTER TABLE `privillage`
	  ADD CONSTRAINT `privillage_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user_cms` (`id`) ON DELETE CASCADE;
	
	--
	-- Constraints for table `widget_value`
	--
	ALTER TABLE `widget_value`
	  ADD CONSTRAINT `widget_value_widget_id_foreign` FOREIGN KEY (`widget_id`) REFERENCES `widgets` (`id`) ON DELETE CASCADE;
	COMMIT;
	
	/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
	/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
	/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
