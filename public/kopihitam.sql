-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 07, 2025 at 08:13 PM
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
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE `client` (
  `id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `image`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'files/favicon.png', 1, '2025-06-07 11:35:03', '2025-06-07 11:35:03');

-- --------------------------------------------------------

--
-- Table structure for table `contact_submit`
--

DROP TABLE IF EXISTS `contact_submit`;
CREATE TABLE `contact_submit` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_submit`
--

INSERT INTO `contact_submit` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(4, 'fdsfdzs', 'ccbbaarsq@gmail.com', 'Tes Subject', 'Message Tes', '2025-06-07 09:30:53', '2025-06-07 09:30:53');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
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
-- Table structure for table `feature`
--

DROP TABLE IF EXISTS `feature`;
CREATE TABLE `feature` (
  `id` bigint UNSIGNED NOT NULL,
  `feature` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` text COLLATE utf8mb4_unicode_ci,
  `is_active` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feature`
--

INSERT INTO `feature` (`id`, `feature`, `title`, `description`, `image`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Tes Feture 1', 'Impedit facilis occaecati odio neque aperiam sit 1', '<p class=\"fst-italic abu-abu\">Eos voluptatibus quo. Odio similique illum id quidem non enim fuga. Qui natus non sunt dicta dolor et. In asperiores velit quaerat perferendis aut</p>\r\n\r\n<p>Iure officiis odit rerum. Harum sequi eum illum corrupti culpa veritatis quisquam. Neque necessitatibus illo rerum eum ut. Commodi ipsam minima molestiae sed laboriosam a iste odio. Earum odit nesciunt fugiat sit ullam. Soluta et harum voluptatem optio quae</p>', 'files/tab-4.png', 1, '2025-06-07 11:51:06', '2025-06-07 12:01:50'),
(2, 'gfd', 'Et blanditiis nemo veritatis excepturi', '<p class=\"fst-italic abu-abu\">Qui laudantium consequatur laborum sit qui ad sapiente dila parde sonata raqer a videna mareta paulona marka</p>\r\n\r\n<p>Ea ipsum voluptatem consequatur quis est. Illum error ullam omnis quia et reiciendis sunt sunt est. Non aliquid repellendus itaque accusamus eius et velit ipsa voluptates. Optio nesciunt eaque beatae accusamus lerode pakto madirna desera vafle de nideran pal</p>', 'files/tab-3.png', 1, '2025-06-07 11:52:37', '2025-06-07 11:52:37');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
CREATE TABLE `menus` (
  `id` bigint UNSIGNED NOT NULL,
  `template` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sequence_date` datetime NOT NULL,
  `is_active` int NOT NULL DEFAULT '1',
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_parent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `show_home` int DEFAULT '0',
  `position` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_embed` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permalink` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `show_started` int DEFAULT '0',
  `faq_show_home` int NOT NULL DEFAULT '0',
  `faq_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `template`, `sequence_date`, `is_active`, `banner`, `is_parent`, `show_home`, `position`, `youtube_embed`, `created_at`, `updated_at`, `label`, `meta_title`, `meta_description`, `meta_keyword`, `meta_img`, `permalink`, `show_started`, `faq_show_home`, `faq_title`) VALUES
(3, 'blank', '2025-06-06 03:13:10', 1, NULL, NULL, NULL, '[\"main\",\"bottom\"]', NULL, '2025-06-05 20:13:10', '2025-06-06 00:48:33', 'Service', NULL, NULL, NULL, NULL, NULL, 0, 0, NULL),
(4, 'service', '2025-06-20 03:14:07', 1, 'files/hero-carousel-2.jpg', '3', 1, '[\"main\",\"bottom\"]', NULL, '2025-06-05 20:14:07', '2025-06-07 13:04:18', 'Service 1 dsada', 'Service 1 Meta title', 'Meta Desc', 'Keyword', 'files/favicon.png', 'service-1-dsada', 1, 1, 'Jasa Pembuatan PT se-Indonesia Tes'),
(5, 'service', '2025-06-06 04:15:49', 1, 'files/favicon.png', '3', 1, '[\"bottom\"]', NULL, '2025-06-05 21:15:49', '2025-06-06 00:13:05', 'fsdfsa', 'fdsfasd', 'fds', 'fsda', NULL, 'fsdfsa-dss', 0, 0, NULL),
(6, 'contact', '2025-04-07 20:42:00', 1, 'files/hero-carousel-2.jpg', NULL, NULL, '[\"main\"]', NULL, '2025-06-06 06:41:25', '2025-06-06 06:42:05', 'Contact', 'Contact', 'Contact', NULL, NULL, 'contact', 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `menus_lang`
--

DROP TABLE IF EXISTS `menus_lang`;
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

DROP TABLE IF EXISTS `migrations`;
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
(16, '2025_06_05_171136_create_price_cv', 8),
(19, '2025_06_06_023459_alter_menus', 9),
(20, '2025_06_06_041952_alter_price', 10),
(21, '2025_06_07_154431_create_contact_submit', 11),
(22, '2025_06_07_181045_alter_menus', 12),
(23, '2025_06_07_182936_create_client', 13),
(24, '2025_06_07_184248_create_feture', 14),
(26, '2025_06_07_192125_create_testimoni', 15),
(27, '2025_06_07_195208_alter_menus', 16);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `price`
--

DROP TABLE IF EXISTS `price`;
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
  `link_buy` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menus_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `price`
--

INSERT INTO `price` (`id`, `title`, `harga`, `harga_coret`, `is_advance`, `is_unggulan`, `is_active`, `created_at`, `updated_at`, `link_buy`, `menus_id`) VALUES
(1, 'Free', 'Rp20<span>jt</span>', NULL, NULL, NULL, 1, '2025-06-05 23:53:12', '2025-06-06 00:17:48', 'https://google.com', '4'),
(2, 'Business', '<span>Rp1.4</span><span>jt</span>', '<span>Rp1.7</span><span>jt</span>', 1, NULL, 1, '2025-06-05 23:55:26', '2025-06-06 00:17:56', 'https://google.com', '4'),
(3, 'Free', 'Rp 10<span>jt</span>', NULL, 1, NULL, 1, '2025-06-06 00:14:01', '2025-06-06 00:18:05', 'https://google.com', '5');

-- --------------------------------------------------------

--
-- Table structure for table `price_cv`
--

DROP TABLE IF EXISTS `price_cv`;
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

DROP TABLE IF EXISTS `privillage`;
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

DROP TABLE IF EXISTS `section2_home`;
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

DROP TABLE IF EXISTS `section3_home`;
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

DROP TABLE IF EXISTS `section4_home`;
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

DROP TABLE IF EXISTS `section5_home`;
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

DROP TABLE IF EXISTS `settings`;
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
(21, 'home', 'images', 'files/hero-carousel-2.jpg', 'en', '2025-06-05 08:21:34', '2025-06-05 08:21:34'),
(22, 'home', 'title', 'Title Tes', 'en', '2025-06-05 08:21:34', '2025-06-05 08:21:34'),
(23, 'home', 'intro', 'Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut.', 'en', '2025-06-05 08:21:34', '2025-06-05 08:21:34'),
(24, 'home', 'text_link', 'Get Start', 'en', '2025-06-05 08:21:34', '2025-06-05 08:21:34'),
(25, 'home', 'link', 'https://google.com', 'en', '2025-06-05 08:21:34', '2025-06-05 08:21:34'),
(63, 'contact', 'address', 'Jalan S.parman', 'en', '2025-06-07 09:22:37', '2025-06-07 09:22:37'),
(64, 'contact', 'phone', '088787897988', 'en', '2025-06-07 09:22:37', '2025-06-07 09:22:37'),
(65, 'contact', 'email', 'dafsad@mail.com', 'en', '2025-06-07 09:22:37', '2025-06-07 09:22:37'),
(66, 'contact', 'iframe_map', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.5358897563606!2d106.79496387387886!3d-6.1927941937948106!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f69478df636f%3A0xc283f16e9eda0173!2sMenara%20Citicon!5e0!3m2!1sid!2sid!4v1749216744791!5m2!1sid!2sid', 'en', '2025-06-07 09:22:37', '2025-06-07 09:22:37'),
(67, 'contact', 'template_email', '<p>Hi %name%,<br />\r\n<br />\r\nYour email %email%<br />\r\n<br />\r\nThanks</p>', 'en', '2025-06-07 09:22:37', '2025-06-07 09:22:37'),
(68, 'setting', 'online', 'on', 'en', '2025-06-07 11:19:27', '2025-06-07 11:19:27'),
(69, 'setting', 'favicon', 'files/favicon.png', 'en', '2025-06-07 11:19:27', '2025-06-07 11:19:27'),
(70, 'setting', 'logo', 'files/logo-dummy.png', 'en', '2025-06-07 11:19:27', '2025-06-07 11:19:27'),
(71, 'setting', 'sosmed_tw', NULL, 'en', '2025-06-07 11:19:27', '2025-06-07 11:19:27'),
(72, 'setting', 'sosmed_fb', NULL, 'en', '2025-06-07 11:19:27', '2025-06-07 11:19:27'),
(73, 'setting', 'sosmed_ig', NULL, 'en', '2025-06-07 11:19:27', '2025-06-07 11:19:27'),
(74, 'setting', 'sosmed_in', NULL, 'en', '2025-06-07 11:19:27', '2025-06-07 11:19:27'),
(75, 'setting', 'copyright', NULL, 'en', '2025-06-07 11:19:27', '2025-06-07 11:19:27'),
(76, 'setting', 'link_getstart', 'https://google.com', 'en', '2025-06-07 11:19:27', '2025-06-07 11:19:27'),
(77, 'setting', 'meta_title', 'Home | PT Tess', 'en', '2025-06-07 11:19:27', '2025-06-07 11:19:27'),
(78, 'setting', 'meta_desc', 'Meta Desc', 'en', '2025-06-07 11:19:27', '2025-06-07 11:19:27'),
(79, 'setting', 'meta_keyword', 'Meta Keyword', 'en', '2025-06-07 11:19:27', '2025-06-07 11:19:27'),
(80, 'setting', 'meta_img', 'files/logo-dummy.png', 'en', '2025-06-07 11:19:27', '2025-06-07 11:19:27'),
(96, 'about', 'section_left', '<p>&ldquo;Dengan adanya Vorent saya<br />\r\nberharap dapat membantu pelaku usaha terutama UMKM agar dapat tumbuh berkembang.&rdquo;</p>\r\n\r\n<p><strong>&mdash; Fuad Ristiyanto, Vorent Founder</strong></p>', 'en', '2025-06-07 12:15:13', '2025-06-07 12:15:13'),
(97, 'about', 'image', 'files/tab-4.png', 'en', '2025-06-07 12:15:13', '2025-06-07 12:15:13'),
(98, 'about', 'section_right', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n\r\n<ul>\r\n	<li><i class=\"bi bi-check2-circle\"></i><span>Ullamco laboris nisi ut aliquip ex ea commodo consequat.</span></li>\r\n	<li><i class=\"bi bi-check2-circle\"></i><span>Duis aute irure dolor in reprehenderit in voluptate velit.</span></li>\r\n	<li><i class=\"bi bi-check2-circle\"></i><span>Ullamco laboris nisi ut aliquip ex ea commodo</span></li>\r\n</ul>', 'en', '2025-06-07 12:15:13', '2025-06-07 12:15:13'),
(99, 'about', 'active', '1', 'en', '2025-06-07 12:15:13', '2025-06-07 12:15:13'),
(104, 'localization', 'get_start', 'Get Started', 'en', '2025-06-07 13:12:38', '2025-06-07 13:12:38'),
(105, 'localization', 'wujudkan_impian', 'Mewujudkan impian <strong>Anda untuk memulai bisnis</strong>', 'en', '2025-06-07 13:12:38', '2025-06-07 13:12:38'),
(106, 'localization', 'buy_now', 'Buy Nows', 'en', '2025-06-07 13:12:38', '2025-06-07 13:12:38'),
(107, 'localization', 'faq', 'FAQ xx?', 'en', '2025-06-07 13:12:38', '2025-06-07 13:12:38');

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

DROP TABLE IF EXISTS `testimoni`;
CREATE TABLE `testimoni` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_home` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`id`, `title`, `description`, `image`, `active_home`, `created_at`, `updated_at`) VALUES
(1, 'Exercitationem repudiandae officiis neque suscipit Tes', 'Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque inventore commodi labore quia quia. Exercitationem repudiandae officiis neque suscipit non officia eaque itaque enim. Voluptatem officia accusantium nesciunt est omnis tempora consectetur dignissimos. Sequi nulla at esse enim cum deserunt eius.', 'files/tab-4.png', 1, '2025-06-07 12:35:59', '2025-06-07 12:43:40');

-- --------------------------------------------------------

--
-- Table structure for table `user_cms`
--

DROP TABLE IF EXISTS `user_cms`;
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

DROP TABLE IF EXISTS `widgets`;
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
(81, 1, 'price', 'item', '2025-06-06 07:17:48', 1, NULL, NULL),
(82, 2, 'price', 'item', '2025-06-06 07:17:56', 1, NULL, NULL),
(83, 3, 'price', 'item', '2025-06-06 07:18:05', 1, NULL, NULL),
(86, 1, 'testimoni', 'testi', '2025-06-07 19:35:59', 1, NULL, NULL),
(89, 4, 'menus', 'faq', '2025-06-07 19:57:22', 1, NULL, NULL),
(90, 4, 'menus', 'faq', '2025-06-07 19:57:22', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `widget_value`
--

DROP TABLE IF EXISTS `widget_value`;
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
(141, 81, NULL, 'items', 'Item1', NULL, NULL),
(142, 82, NULL, 'items', 'Item x', NULL, NULL),
(143, 83, NULL, 'items', 'Item sa', NULL, NULL),
(152, 86, NULL, 'category', 'Category tes', NULL, NULL),
(153, 86, NULL, 'clinet', 'Client Tes', NULL, NULL),
(154, 86, NULL, 'project_date', '2020-10-10', NULL, NULL),
(155, 86, NULL, 'project_url', 'https://google.com', NULL, NULL),
(160, 89, NULL, 'que', 'Pertanyaan 1', NULL, NULL),
(161, 89, NULL, 'ans', 'Prosesnya meliputi pemilihan nama, akta notaris, NPWP, dan pendaftaran OSS.', NULL, NULL),
(162, 90, NULL, 'que', 'Pertanyaan 2', NULL, NULL),
(163, 90, NULL, 'ans', 'PT memberikan status hukum pada bisnis, melindungi aset pribadi, dan meningkatkan kredibilitas.', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_submit`
--
ALTER TABLE `contact_submit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feature`
--
ALTER TABLE `feature`
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
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
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
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_submit`
--
ALTER TABLE `contact_submit`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `feature`
--
ALTER TABLE `feature`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menus_lang`
--
ALTER TABLE `menus_lang`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `price`
--
ALTER TABLE `price`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_cms`
--
ALTER TABLE `user_cms`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `widgets`
--
ALTER TABLE `widgets`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `widget_value`
--
ALTER TABLE `widget_value`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

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
