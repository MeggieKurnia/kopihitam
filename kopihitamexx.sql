-- MySQL dump 10.13  Distrib 9.3.0, for macos15.2 (arm64)
--
-- Host: localhost    Database: kopihitam
-- ------------------------------------------------------
-- Server version	9.3.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `client` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` VALUES (1,'files/img/clients/client-1.png',1,'2025-06-07 11:35:03','2025-06-07 13:27:20'),(2,'files/tab-4.png',1,'2025-06-07 13:24:27','2025-06-07 13:24:27'),(3,'files/grid-2.png',1,'2025-06-07 13:24:46','2025-06-07 13:24:46'),(4,'files/img/clients/client-2.png',1,'2025-06-07 13:27:37','2025-06-07 13:27:37'),(5,'files/img/clients/client-3.png',1,'2025-06-07 13:27:52','2025-06-07 13:27:52'),(6,'files/img/clients/client-4.png',1,'2025-06-07 13:28:01','2025-06-07 13:28:01'),(7,'files/img/clients/client-6.png',1,'2025-06-07 13:31:33','2025-06-07 13:31:33');
/*!40000 ALTER TABLE `client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contact_submit`
--

DROP TABLE IF EXISTS `contact_submit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contact_submit` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact_submit`
--

LOCK TABLES `contact_submit` WRITE;
/*!40000 ALTER TABLE `contact_submit` DISABLE KEYS */;
INSERT INTO `contact_submit` VALUES (4,'fdsfdzs','ccbbaarsq@gmail.com','Tes Subject','Message Tes','2025-06-07 09:30:53','2025-06-07 09:30:53');
/*!40000 ALTER TABLE `contact_submit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feature`
--

DROP TABLE IF EXISTS `feature`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `feature` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `feature` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `is_active` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feature`
--

LOCK TABLES `feature` WRITE;
/*!40000 ALTER TABLE `feature` DISABLE KEYS */;
INSERT INTO `feature` VALUES (1,'Tes Feture 1','Impedit facilis occaecati odio neque aperiam sit 1','<p class=\"fst-italic abu-abu\">Eos voluptatibus quo. Odio similique illum id quidem non enim fuga. Qui natus non sunt dicta dolor et. In asperiores velit quaerat perferendis aut</p>\r\n\r\n<p>Iure officiis odit rerum. Harum sequi eum illum corrupti culpa veritatis quisquam. Neque necessitatibus illo rerum eum ut. Commodi ipsam minima molestiae sed laboriosam a iste odio. Earum odit nesciunt fugiat sit ullam. Soluta et harum voluptatem optio quae</p>','files/tab-4.png',1,'2025-06-07 11:51:06','2025-06-07 12:01:50'),(2,'gfd','Et blanditiis nemo veritatis excepturi','<p class=\"fst-italic abu-abu\">Qui laudantium consequatur laborum sit qui ad sapiente dila parde sonata raqer a videna mareta paulona marka</p>\r\n\r\n<p>Ea ipsum voluptatem consequatur quis est. Illum error ullam omnis quia et reiciendis sunt sunt est. Non aliquid repellendus itaque accusamus eius et velit ipsa voluptates. Optio nesciunt eaque beatae accusamus lerode pakto madirna desera vafle de nideran pal</p>','files/tab-3.png',1,'2025-06-07 11:52:37','2025-06-07 11:52:37');
/*!40000 ALTER TABLE `feature` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menus` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `template` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sequence_date` datetime NOT NULL,
  `is_active` int NOT NULL DEFAULT '1',
  `banner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_parent` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `show_home` int DEFAULT '0',
  `position` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_embed` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `label` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permalink` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `show_started` int DEFAULT '0',
  `faq_show_home` int NOT NULL DEFAULT '0',
  `faq_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_intro` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_static` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_static` text COLLATE utf8mb4_unicode_ci,
  `badge_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `badge_new_line` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (3,'blank','2025-06-06 03:13:10',1,NULL,NULL,NULL,'[\"main\",\"bottom\"]',NULL,'2025-06-05 20:13:10','2025-06-06 00:48:33','Service',NULL,NULL,NULL,NULL,NULL,0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(4,'service','2025-06-20 03:14:07',1,'files/hero-carousel-2.jpg','3',1,'[\"main\",\"bottom\"]',NULL,'2025-06-05 20:14:07','2025-06-15 11:18:19','Pendirian PT','Service 1 Meta title','Meta Desc','Keyword','files/favicon.png','pendirian-pt',1,1,'Jasa Pembuatan PT se-Indonesia Tes',NULL,NULL,NULL,NULL,NULL,NULL,'Terpopuler',0),(5,'service','2025-06-06 04:15:49',1,'files/favicon.png','3',1,'[\"bottom\"]',NULL,'2025-06-05 21:15:49','2025-06-09 09:18:57','Pendirian CV','fdsfasd','fds','fsda',NULL,'pendirian-cv',0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(6,'contact','2025-03-08 20:42:00',1,'files/hero-carousel-2.jpg',NULL,NULL,'[\"main\"]',NULL,'2025-06-06 06:41:25','2025-06-09 10:29:47','Kontak Kami','Contact','Contact',NULL,NULL,'kontak-kami',0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(7,'blog','2025-03-07 21:20:57',0,'files/img/hero-carousel/hero-carousel-1.jpg',NULL,NULL,'[\"main\"]',NULL,'2025-06-09 07:21:08','2025-06-15 02:36:36','Artikel',NULL,NULL,NULL,NULL,'artikel',0,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0),(9,'about','2025-03-09 17:24:43',1,'files/img/hero-carousel/hero-carousel-3.jpg',NULL,NULL,'[\"main\"]',NULL,'2025-06-09 10:24:43','2025-06-09 10:29:37','Tentang Kami',NULL,NULL,NULL,NULL,'tentang-kami',0,0,NULL,NULL,NULL,'Neque officiis dolore maiores et exercitationem quae est seda lidera pat claero','files/about-portrait.jpg',NULL,NULL,NULL,0),(12,'static','2025-06-15 09:14:05',0,'files/img/hero-carousel/hero-carousel-1.jpg',NULL,NULL,'[\"main\"]',NULL,'2025-06-15 02:14:05','2025-06-15 02:39:10','Static Menu',NULL,NULL,NULL,NULL,'static-menu',0,0,NULL,NULL,NULL,NULL,NULL,'Title Static','<p>judul</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>ajshgdfhajsdg</p>',NULL,0),(13,'service','2025-06-15 09:20:55',1,'files/img/hero-carousel/hero-carousel-2.jpg','3',1,'[\"main\"]',NULL,'2025-06-15 02:20:55','2025-06-15 02:21:38','Pendirian Yayasan',NULL,NULL,NULL,NULL,'pendirian-yayasan',1,0,NULL,'Yayasan','asdgashjdgajsdgjask',NULL,NULL,NULL,NULL,NULL,0);
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus_lang`
--

DROP TABLE IF EXISTS `menus_lang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menus_lang` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `menus_id` bigint unsigned NOT NULL,
  `lang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permalink` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_content` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `section1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `section2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menus_lang_menus_id_foreign` (`menus_id`),
  CONSTRAINT `menus_lang_menus_id_foreign` FOREIGN KEY (`menus_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus_lang`
--

LOCK TABLES `menus_lang` WRITE;
/*!40000 ALTER TABLE `menus_lang` DISABLE KEYS */;
/*!40000 ALTER TABLE `menus_lang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2019_08_19_000000_create_failed_jobs_table',1),(4,'2021_11_09_070539_create_privillage',1),(5,'2021_11_09_070657_create_setting',1),(6,'2022_03_24_134140_create_widgets',1),(7,'2022_03_30_151448_create_menus',1),(8,'2025_05_31_173108_create_section2_home',2),(9,'2025_05_31_184029_create_section3_home',3),(10,'2025_05_31_202740_create_section4_home',4),(11,'2025_06_01_145955_create_sec5home',5),(14,'2025_06_05_160356_create_price',6),(15,'2025_06_05_170804_alter_price',7),(16,'2025_06_05_171136_create_price_cv',8),(19,'2025_06_06_023459_alter_menus',9),(20,'2025_06_06_041952_alter_price',10),(21,'2025_06_07_154431_create_contact_submit',11),(22,'2025_06_07_181045_alter_menus',12),(23,'2025_06_07_182936_create_client',13),(24,'2025_06_07_184248_create_feture',14),(26,'2025_06_07_192125_create_testimoni',15),(27,'2025_06_07_195208_alter_menus',16),(28,'2025_06_08_141445_alter_menuss',17),(29,'2025_06_08_210028_create_cache_table',17),(30,'2025_06_09_164550_alter_menusss',18),(31,'2025_06_09_172243_alter_menusssx',19),(32,'2025_06_15_180105_alter_menus',20),(33,'2025_06_16_161629_create_home_jasa_pembuatan_pt',21);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pembuatan_pt`
--

DROP TABLE IF EXISTS `pembuatan_pt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pembuatan_pt` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subtitle` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `intro` text COLLATE utf8mb4_unicode_ci,
  `is_active` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pembuatan_pt`
--

LOCK TABLES `pembuatan_pt` WRITE;
/*!40000 ALTER TABLE `pembuatan_pt` DISABLE KEYS */;
INSERT INTO `pembuatan_pt` VALUES (1,'Jasa Pembuatan PT','Jasa Buat PT Murah<br/>Mulai 3 Juta','Kami memberikan layanan jasa membuat pt dan sewa kantor virtual yang jauh lebih murah dan memiliki alamat domisili legal yang prestis. Walau tanpa kantor fisik namun tetap bisa menggunakan fasilitas Ruang Meeting yang telah disediakan',1,'2025-06-16 09:49:19','2025-06-16 09:49:19');
/*!40000 ALTER TABLE `pembuatan_pt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `price`
--

DROP TABLE IF EXISTS `price`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `price` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_coret` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_advance` int DEFAULT '0',
  `is_unggulan` int DEFAULT '0',
  `is_active` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `link_buy` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menus_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `price`
--

LOCK TABLES `price` WRITE;
/*!40000 ALTER TABLE `price` DISABLE KEYS */;
INSERT INTO `price` VALUES (1,'Free','Rp20<span>jt</span>',NULL,NULL,1,1,'2025-06-05 23:53:12','2025-06-09 10:44:24','https://google.com','4'),(2,'Business','Rp1.4<span>jt</span>','<span>Rp1.7</span><span>jt</span>',1,NULL,1,'2025-06-05 23:55:26','2025-06-09 10:57:51','https://google.com','4'),(3,'Free','Rp 10<span>jt</span>',NULL,1,NULL,1,'2025-06-06 00:14:01','2025-06-06 00:18:05','https://google.com','5'),(4,'Pendirian Yayasan','Rp1.4<span>jt</span>','Rp1.4<span>jt</span>',NULL,1,1,'2025-06-15 02:23:47','2025-06-15 02:23:47','google.com','13');
/*!40000 ALTER TABLE `price` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `price_cv`
--

DROP TABLE IF EXISTS `price_cv`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `price_cv` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_coret` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_advance` int DEFAULT '0',
  `is_unggulan` int DEFAULT '0',
  `is_active` int DEFAULT '0',
  `link_buy` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `price_cv`
--

LOCK TABLES `price_cv` WRITE;
/*!40000 ALTER TABLE `price_cv` DISABLE KEYS */;
INSERT INTO `price_cv` VALUES (1,'Free','Rp 0',NULL,NULL,NULL,1,'https://google.com','2025-06-05 10:15:12','2025-06-05 10:15:12'),(2,'Business','Rp 3 jt','<span>Rp 3.5</span><span>jt</span>',1,NULL,1,'https://google.com','2025-06-05 10:16:11','2025-06-05 10:16:11'),(3,'Developer','Rp 3jt',NULL,NULL,NULL,1,'https://google.com','2025-06-05 10:16:46','2025-06-05 10:16:46'),(4,'Ultimate','Rp 4 jt','<span>Rp 4.5</span><span>jt</span>',NULL,1,1,'https://google.com','2025-06-05 10:17:39','2025-06-05 10:17:39');
/*!40000 ALTER TABLE `price_cv` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `privillage`
--

DROP TABLE IF EXISTS `privillage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `privillage` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `module` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `action` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `privillage_user_id_index` (`user_id`),
  CONSTRAINT `privillage_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user_cms` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `privillage`
--

LOCK TABLES `privillage` WRITE;
/*!40000 ALTER TABLE `privillage` DISABLE KEYS */;
/*!40000 ALTER TABLE `privillage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `section2_home`
--

DROP TABLE IF EXISTS `section2_home`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `section2_home` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `section2_home`
--

LOCK TABLES `section2_home` WRITE;
/*!40000 ALTER TABLE `section2_home` DISABLE KEYS */;
INSERT INTO `section2_home` VALUES (1,'huuihui',1,'2025-05-31 10:40:22','2025-05-31 11:29:07');
/*!40000 ALTER TABLE `section2_home` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `section3_home`
--

DROP TABLE IF EXISTS `section3_home`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `section3_home` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `section3_home`
--

LOCK TABLES `section3_home` WRITE;
/*!40000 ALTER TABLE `section3_home` DISABLE KEYS */;
INSERT INTO `section3_home` VALUES (1,'Grab Everything <b>You Need To Be Top Notch Tes</b>',1,'2025-05-31 11:47:49','2025-05-31 12:48:56');
/*!40000 ALTER TABLE `section3_home` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `section4_home`
--

DROP TABLE IF EXISTS `section4_home`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `section4_home` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `section4_home`
--

LOCK TABLES `section4_home` WRITE;
/*!40000 ALTER TABLE `section4_home` DISABLE KEYS */;
INSERT INTO `section4_home` VALUES (1,'Where Vision <b>Meets Execution Tes</b>',1,'2025-05-31 13:35:01','2025-05-31 13:35:01');
/*!40000 ALTER TABLE `section4_home` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `section5_home`
--

DROP TABLE IF EXISTS `section5_home`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `section5_home` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `section5_home`
--

LOCK TABLES `section5_home` WRITE;
/*!40000 ALTER TABLE `section5_home` DISABLE KEYS */;
INSERT INTO `section5_home` VALUES (1,'Helping 100+ <b>Clients Grow Online</b>',1,'2025-06-01 08:05:30','2025-06-01 08:05:30');
/*!40000 ALTER TABLE `section5_home` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `module` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `lang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (21,'home','images','files/hero-carousel-2.jpg','en','2025-06-05 08:21:34','2025-06-05 08:21:34'),(22,'home','title','Title Tes','en','2025-06-05 08:21:34','2025-06-05 08:21:34'),(23,'home','intro','Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut.','en','2025-06-05 08:21:34','2025-06-05 08:21:34'),(24,'home','text_link','Get Start','en','2025-06-05 08:21:34','2025-06-05 08:21:34'),(25,'home','link','https://google.com','en','2025-06-05 08:21:34','2025-06-05 08:21:34'),(63,'contact','address','Jalan S.parman','en','2025-06-07 09:22:37','2025-06-07 09:22:37'),(64,'contact','phone','088787897988','en','2025-06-07 09:22:37','2025-06-07 09:22:37'),(65,'contact','email','dafsad@mail.com','en','2025-06-07 09:22:37','2025-06-07 09:22:37'),(66,'contact','iframe_map','https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.5358897563606!2d106.79496387387886!3d-6.1927941937948106!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f69478df636f%3A0xc283f16e9eda0173!2sMenara%20Citicon!5e0!3m2!1sid!2sid!4v1749216744791!5m2!1sid!2sid','en','2025-06-07 09:22:37','2025-06-07 09:22:37'),(67,'contact','template_email','<p>Hi %name%,<br />\r\n<br />\r\nYour email %email%<br />\r\n<br />\r\nThanks</p>','en','2025-06-07 09:22:37','2025-06-07 09:22:37'),(96,'about','section_left','<p>&ldquo;Dengan adanya Vorent saya<br />\r\nberharap dapat membantu pelaku usaha terutama UMKM agar dapat tumbuh berkembang.&rdquo;</p>\r\n\r\n<p><strong>&mdash; Fuad Ristiyanto, Vorent Founder</strong></p>','en','2025-06-07 12:15:13','2025-06-07 12:15:13'),(97,'about','image','files/tab-4.png','en','2025-06-07 12:15:13','2025-06-07 12:15:13'),(98,'about','section_right','<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>\r\n\r\n<ul>\r\n	<li><i class=\"bi bi-check2-circle\"></i><span>Ullamco laboris nisi ut aliquip ex ea commodo consequat.</span></li>\r\n	<li><i class=\"bi bi-check2-circle\"></i><span>Duis aute irure dolor in reprehenderit in voluptate velit.</span></li>\r\n	<li><i class=\"bi bi-check2-circle\"></i><span>Ullamco laboris nisi ut aliquip ex ea commodo</span></li>\r\n</ul>','en','2025-06-07 12:15:13','2025-06-07 12:15:13'),(99,'about','active','1','en','2025-06-07 12:15:13','2025-06-07 12:15:13'),(104,'localization','get_start','Get Started','en','2025-06-07 13:12:38','2025-06-07 13:12:38'),(105,'localization','wujudkan_impian','Mewujudkan impian <strong>Anda untuk memulai bisnis</strong>','en','2025-06-07 13:12:38','2025-06-07 13:12:38'),(106,'localization','buy_now','Buy Nows','en','2025-06-07 13:12:38','2025-06-07 13:12:38'),(107,'localization','faq','FAQ xx?','en','2025-06-07 13:12:38','2025-06-07 13:12:38'),(108,'setting','online','on','en','2025-06-15 11:16:57','2025-06-15 11:16:57'),(109,'setting','favicon','files/favicon.png','en','2025-06-15 11:16:57','2025-06-15 11:16:57'),(110,'setting','logo','files/logo-dummy.png','en','2025-06-15 11:16:57','2025-06-15 11:16:57'),(111,'setting','sosmed_tw',NULL,'en','2025-06-15 11:16:57','2025-06-15 11:16:57'),(112,'setting','sosmed_fb',NULL,'en','2025-06-15 11:16:57','2025-06-15 11:16:57'),(113,'setting','sosmed_ig',NULL,'en','2025-06-15 11:16:57','2025-06-15 11:16:57'),(114,'setting','sosmed_in',NULL,'en','2025-06-15 11:16:57','2025-06-15 11:16:57'),(115,'setting','copyright',NULL,'en','2025-06-15 11:16:57','2025-06-15 11:16:57'),(116,'setting','link_getstart','https://google.com','en','2025-06-15 11:16:57','2025-06-15 11:16:57'),(117,'setting','wa_text','Konsultasi Gratis Sekarang','en','2025-06-15 11:16:57','2025-06-15 11:16:57'),(118,'setting','wa_text_2','Klik Disini untuk Konsultasi','en','2025-06-15 11:16:57','2025-06-15 11:16:57'),(119,'setting','wa_num','102983012938','en','2025-06-15 11:16:57','2025-06-15 11:16:57'),(120,'setting','meta_title','Home | PT Tess','en','2025-06-15 11:16:57','2025-06-15 11:16:57'),(121,'setting','meta_desc','Meta Desc','en','2025-06-15 11:16:57','2025-06-15 11:16:57'),(122,'setting','meta_keyword','Meta Keyword','en','2025-06-15 11:16:57','2025-06-15 11:16:57'),(123,'setting','meta_img','files/logo-dummy.png','en','2025-06-15 11:16:57','2025-06-15 11:16:57');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testimoni`
--

DROP TABLE IF EXISTS `testimoni`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `testimoni` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active_home` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testimoni`
--

LOCK TABLES `testimoni` WRITE;
/*!40000 ALTER TABLE `testimoni` DISABLE KEYS */;
INSERT INTO `testimoni` VALUES (1,'Exercitationem repudiandae officiis neque suscipit Tes','Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque inventore commodi labore quia quia. Exercitationem repudiandae officiis neque suscipit non officia eaque itaque enim. Voluptatem officia accusantium nesciunt est omnis tempora consectetur dignissimos. Sequi nulla at esse enim cum deserunt eius.','files/tab-4.png',1,'2025-06-07 12:35:59','2025-06-07 12:43:40');
/*!40000 ALTER TABLE `testimoni` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_cms`
--

DROP TABLE IF EXISTS `user_cms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_cms` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `display` int NOT NULL DEFAULT '1',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_cms_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_cms`
--

LOCK TABLES `user_cms` WRITE;
/*!40000 ALTER TABLE `user_cms` DISABLE KEYS */;
INSERT INTO `user_cms` VALUES (1,'superadmin','superadmin@mail.com',NULL,'$2y$12$Xgo5JrrsPh.QZdDaADDW7OPjKzN3eRmqvqx0PwsmC7NMi4n356idu',0,NULL,NULL,NULL),(2,'admin','admin@mail.com',NULL,'$2y$12$23lu5fG9vT8Iau2L5leAcubV3kfoIjJ0FQqGxqHKDACl0IfdwgXhW',1,NULL,NULL,NULL);
/*!40000 ALTER TABLE `user_cms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `widget_value`
--

DROP TABLE IF EXISTS `widget_value`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `widget_value` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `widget_id` bigint unsigned NOT NULL,
  `lang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `widget_value_widget_id_foreign` (`widget_id`),
  CONSTRAINT `widget_value_widget_id_foreign` FOREIGN KEY (`widget_id`) REFERENCES `widgets` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=263 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `widget_value`
--

LOCK TABLES `widget_value` WRITE;
/*!40000 ALTER TABLE `widget_value` DISABLE KEYS */;
INSERT INTO `widget_value` VALUES (3,3,NULL,'images','files/logo-dummy.png',NULL,NULL),(4,4,NULL,'images','files/favicon.png',NULL,NULL),(5,5,NULL,'images','files/banner-sustainability-report.jpg',NULL,NULL),(6,6,NULL,'images','files/logo-misc.png',NULL,NULL),(52,22,NULL,'images','files/favicon.png',NULL,NULL),(53,22,NULL,'title','aaa',NULL,NULL),(54,22,NULL,'intro','bbb',NULL,NULL),(55,23,NULL,'images','files/favicon.png',NULL,NULL),(56,23,NULL,'title','ccc',NULL,NULL),(57,23,NULL,'intro','dddd',NULL,NULL),(58,24,NULL,'images','files/favicon.png',NULL,NULL),(59,24,NULL,'title','fsdfasd',NULL,NULL),(60,24,NULL,'intro','fsdfdas',NULL,NULL),(61,25,NULL,'images','files/logo-geo.svg',NULL,NULL),(62,25,NULL,'title','Lead Generation',NULL,NULL),(63,25,NULL,'intro','Attract and identify potential customers from multiple marketing channels.',NULL,NULL),(64,26,NULL,'images','files/logo-dummy.png',NULL,NULL),(65,26,NULL,'title','fsd',NULL,NULL),(66,26,NULL,'intro','dsfds',NULL,NULL),(67,27,NULL,'images','files/favicon.png',NULL,NULL),(68,27,NULL,'title','gf',NULL,NULL),(69,27,NULL,'intro','fdsfas',NULL,NULL),(70,28,NULL,'images','files/share-youtube.svg',NULL,NULL),(71,28,NULL,'title','gfs',NULL,NULL),(72,28,NULL,'intro','fsdsa',NULL,NULL),(73,29,NULL,'images','files/grid-2.png',NULL,NULL),(74,29,NULL,'title','Gapai',NULL,NULL),(75,29,NULL,'intro','fsdfadsfs',NULL,NULL),(76,29,NULL,'box1_title','fasdf',NULL,NULL),(77,29,NULL,'box1_persen','10%',NULL,NULL),(78,29,NULL,'box2_title','dsafas',NULL,NULL),(79,29,NULL,'box2_persen','20%',NULL,NULL),(80,29,NULL,'box3_title','sdfasd',NULL,NULL),(81,29,NULL,'box3_persen','30%',NULL,NULL),(82,30,NULL,'images','files/news-1.png',NULL,NULL),(83,30,NULL,'title','fsdafs',NULL,NULL),(84,30,NULL,'intro','dfsfsad',NULL,NULL),(85,30,NULL,'box1_title','fds',NULL,NULL),(86,30,NULL,'box1_persen','4%',NULL,NULL),(87,30,NULL,'box2_title','fsdfsad',NULL,NULL),(88,30,NULL,'box2_persen','5%',NULL,NULL),(89,30,NULL,'box3_title','gsdgs',NULL,NULL),(90,30,NULL,'box3_persen','6%',NULL,NULL),(91,31,NULL,'images','files/news-1.png',NULL,NULL),(143,83,NULL,'items','Item sa',NULL,NULL),(152,86,NULL,'category','Category tes',NULL,NULL),(153,86,NULL,'clinet','Client Tes',NULL,NULL),(154,86,NULL,'project_date','2020-10-10',NULL,NULL),(155,86,NULL,'project_url','https://google.com',NULL,NULL),(180,99,NULL,'que',NULL,NULL,NULL),(181,99,NULL,'ans',NULL,NULL,NULL),(206,113,NULL,'que',NULL,NULL,NULL),(207,113,NULL,'ans',NULL,NULL,NULL),(208,114,NULL,'tab_title',NULL,NULL,NULL),(209,114,NULL,'tab_content','<p class=\"fst-italic\">Consequuntur inventore voluptates consequatur aut vel et. Eos doloribus expedita. Sapiente atque consequatur minima nihil quae aspernatur quo suscipit voluptatem.</p>\r\n\r\n<div class=\"d-flex align-items-center mt-4\"><i class=\"bi bi-check2\"></i>\r\n<h4>Repudiandae rerum velit modi et officia quasi facilis</h4>\r\n</div>\r\n\r\n<p>Laborum omnis voluptates voluptas qui sit aliquam blanditiis. Sapiente minima commodi dolorum non eveniet magni quaerat nemo et.</p>\r\n\r\n<div class=\"d-flex align-items-center mt-4\"><i class=\"bi bi-check2\"></i>\r\n<h4>Incidunt non veritatis illum ea ut nisi</h4>\r\n</div>\r\n\r\n<p>Non quod totam minus repellendus autem sint velit. Rerum debitis facere soluta tenetur. Iure molestiae assumenda sunt qui inventore eligendi voluptates nisi at. Dolorem quo tempora. Quia et perferendis.</p>\r\n\r\n<div class=\"d-flex align-items-center mt-4\"><i class=\"bi bi-check2\"></i>\r\n<h4>Omnis ab quia nemo dignissimos rem eum quos..</h4>\r\n</div>\r\n\r\n<p>Eius alias aut cupiditate. Dolor voluptates animi ut blanditiis quos nam. Magnam officia aut ut alias quo explicabo ullam esse. Sunt magnam et dolorem eaque magnam odit enim quaerat. Vero error error voluptatem eum.</p>',NULL,NULL),(210,115,NULL,'que',NULL,NULL,NULL),(211,115,NULL,'ans',NULL,NULL,NULL),(212,116,NULL,'tab_title',NULL,NULL,NULL),(213,116,NULL,'tab_content',NULL,NULL,NULL),(222,121,NULL,'items','<i class=\"bi bi-check2-circle\"></i> Item1',NULL,NULL),(223,122,NULL,'items','Item x',NULL,NULL),(232,127,NULL,'que','?',NULL,NULL),(233,127,NULL,'ans','ok',NULL,NULL),(234,128,NULL,'tab_title',NULL,NULL,NULL),(235,128,NULL,'tab_content',NULL,NULL,NULL),(236,129,NULL,'items','yayasan 1',NULL,NULL),(237,130,NULL,'que',NULL,NULL,NULL),(238,130,NULL,'ans',NULL,NULL,NULL),(239,131,NULL,'tab_title',NULL,NULL,NULL),(240,131,NULL,'tab_content',NULL,NULL,NULL),(241,132,NULL,'que',NULL,NULL,NULL),(242,132,NULL,'ans',NULL,NULL,NULL),(243,133,NULL,'tab_title',NULL,NULL,NULL),(244,133,NULL,'tab_content',NULL,NULL,NULL),(245,134,NULL,'que','Pertanyaan 1',NULL,NULL),(246,134,NULL,'ans','Prosesnya meliputi pemilihan nama, akta notaris, NPWP, dan pendaftaran OSS.',NULL,NULL),(247,135,NULL,'que','Pertanyaan 2',NULL,NULL),(248,135,NULL,'ans','PT memberikan status hukum pada bisnis, melindungi aset pribadi, dan meningkatkan kredibilitas.',NULL,NULL),(249,136,NULL,'tab_title',NULL,NULL,NULL),(250,136,NULL,'tab_content',NULL,NULL,NULL),(251,137,NULL,'icon','bi bi-hand-thumbs-up',NULL,NULL),(252,137,NULL,'title','TERBAIK',NULL,NULL),(253,137,NULL,'desc','Kami memberikan pelayanan terbaik bagi klien kita, dan memastikan kepuasan pelanggan adalah prioritas bagi kita.',NULL,NULL),(254,138,NULL,'icon',NULL,NULL,NULL),(255,138,NULL,'title','TERAMAH',NULL,NULL),(256,138,NULL,'desc','Team kami memberikan pelayanan 24 jam dan responsive dalam setiap pertanyaan yang diajukan oleh para klien.',NULL,NULL),(257,139,NULL,'icon','bi bi-rocket-takeoff',NULL,NULL),(258,139,NULL,'title','TERCEPAT',NULL,NULL),(259,139,NULL,'desc','Proses kami lakukan dengan profesional dan layanan komunikasi 24 jam full sehingga buat usaha menjadi cepat dan mudah.',NULL,NULL),(260,140,NULL,'icon',NULL,NULL,NULL),(261,140,NULL,'title','TERPRAKTIS',NULL,NULL),(262,140,NULL,'desc','h bukan zamannya lagi dalam membangun usaha repot dengan sewa menyewa kantor. langsung hubungi Team kami Aja.',NULL,NULL);
/*!40000 ALTER TABLE `widget_value` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `widgets`
--

DROP TABLE IF EXISTS `widgets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `widgets` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `base_id` int NOT NULL,
  `module` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sequence` datetime NOT NULL,
  `is_active` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=141 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `widgets`
--

LOCK TABLES `widgets` WRITE;
/*!40000 ALTER TABLE `widgets` DISABLE KEYS */;
INSERT INTO `widgets` VALUES (3,1,'section2','image','2025-05-31 17:40:22',1,NULL,NULL),(4,1,'section2','image','2025-05-31 17:40:22',1,NULL,NULL),(5,1,'section2','image','2025-05-31 18:29:07',1,NULL,NULL),(6,1,'section2','image','2025-05-31 18:29:07',1,NULL,NULL),(22,1,'section3','image','2025-05-31 19:03:13',1,NULL,NULL),(23,1,'section3','image','2025-05-31 19:03:13',1,NULL,NULL),(24,1,'section3','image','2025-05-31 19:02:29',1,NULL,NULL),(25,1,'section3','image','2025-05-31 18:47:49',1,NULL,NULL),(26,1,'section3','image','2025-05-31 19:48:56',1,NULL,NULL),(27,1,'section3','image','2025-05-31 19:48:56',1,NULL,NULL),(28,1,'section3','image','2025-05-31 19:48:56',1,NULL,NULL),(29,1,'section4','image','2025-05-31 20:35:01',1,NULL,NULL),(30,1,'section4','image','2025-05-31 20:35:01',1,NULL,NULL),(31,1,'section5','image','2025-06-01 15:05:30',1,NULL,NULL),(83,3,'price','item','2025-06-06 07:18:05',1,NULL,NULL),(86,1,'testimoni','testi','2025-06-07 19:35:59',1,NULL,NULL),(99,5,'menus','faq','2025-06-09 16:18:57',1,NULL,NULL),(113,9,'menus','faq','2025-06-09 17:24:43',1,NULL,NULL),(114,9,'menus','content_about','2025-03-06 17:24:43',1,NULL,NULL),(115,6,'menus','faq','2025-06-09 16:19:39',1,NULL,NULL),(116,6,'menus','content_about','2025-06-09 17:29:47',1,NULL,NULL),(121,1,'price','item','2025-06-06 07:17:48',1,NULL,NULL),(122,2,'price','item','2025-06-06 07:17:56',1,NULL,NULL),(127,13,'menus','faq','2025-06-15 09:20:55',1,NULL,NULL),(128,13,'menus','content_about','2025-06-15 09:20:55',1,NULL,NULL),(129,4,'price','item','2025-06-15 09:23:47',1,NULL,NULL),(130,7,'menus','faq','2025-06-09 14:21:08',1,NULL,NULL),(131,7,'menus','content_about','2025-06-15 09:36:36',1,NULL,NULL),(132,12,'menus','faq','2025-06-15 09:14:05',1,NULL,NULL),(133,12,'menus','content_about','2025-06-15 09:14:05',1,NULL,NULL),(134,4,'menus','faq','2025-06-07 19:57:22',1,NULL,NULL),(135,4,'menus','faq','2025-06-07 19:57:22',1,NULL,NULL),(136,4,'menus','content_about','2025-06-15 18:18:19',1,NULL,NULL),(137,1,'pembuatan_pt','feat','2025-06-16 16:49:19',1,NULL,NULL),(138,1,'pembuatan_pt','feat','2025-06-16 16:49:19',1,NULL,NULL),(139,1,'pembuatan_pt','feat','2025-06-16 16:49:19',1,NULL,NULL),(140,1,'pembuatan_pt','feat','2025-06-16 16:49:19',1,NULL,NULL);
/*!40000 ALTER TABLE `widgets` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-06-17  0:08:24
