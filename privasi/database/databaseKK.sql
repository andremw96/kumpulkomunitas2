-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               10.1.19-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table kumpulkomunitas.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table kumpulkomunitas.category: ~14 rows (approximately)
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`id`, `category`, `description`, `parent_id`, `created_at`, `user_id`, `updated_at`, `updated_by`, `deleted_at`) VALUES
	(1, 'General Discussion', 'Ngobrol - Ngobrol tentang Komunitas', 0, '2016-12-06 04:02:40', 1, '2016-12-06 04:02:40', NULL, NULL),
	(2, 'General Discussion - The Lounge', 'Ngobrol Apa aja disini', 1, '2016-12-06 04:03:52', 1, '2016-12-06 04:03:52', NULL, NULL),
	(3, 'General Discussion - FAQ', 'Tanyakan apa kebingunganmu disini', 1, '2016-12-06 04:03:52', 1, '2016-12-06 04:03:52', NULL, NULL),
	(4, 'Hiburan', '', 0, '2016-12-06 04:03:52', 1, '2016-12-06 04:03:52', NULL, NULL),
	(5, 'Kendaraan', '', 0, '2016-12-06 04:03:52', 1, '2016-12-06 04:03:52', NULL, NULL),
	(8, 'Alat Elektronik', '', 0, '2016-12-06 04:03:42', 1, '2016-12-06 04:03:42', NULL, NULL),
	(10, 'Kendaraan Roda 2', 'Kumpul semua komunitas pemilik kendaraan roda 2', 5, NULL, 1, NULL, NULL, NULL),
	(11, 'Kendaraan Roda 4', 'Kumpul semua komunitas pemilik kendaraan roda 4', 5, NULL, 1, NULL, NULL, NULL),
	(12, 'Sepeda', 'Kumpul semua komunitas pemilik Sepeda', 5, NULL, 1, NULL, NULL, NULL),
	(13, 'Komputer', '', 3, NULL, 1, NULL, NULL, NULL),
	(14, 'TV XXX', 'nonton tv yook', 4, NULL, 1, '2016-12-17 13:33:03', 1, NULL),
	(15, 'DVD Player', '', 3, NULL, 1, NULL, NULL, NULL),
	(17, 'Komputer', 'Bahas semua tentang komputer disiniii', 4, '2016-12-17 12:43:01', 1, '2016-12-17 12:43:01', NULL, NULL),
	(18, 'xxxxxxxxxxxxx', 'Kompas', 8, '2016-12-17 12:44:27', 1, '2016-12-17 13:36:21', NULL, '2016-12-17 13:36:21');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;

-- Dumping structure for table kumpulkomunitas.counters
CREATE TABLE IF NOT EXISTS `counters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(50) NOT NULL DEFAULT '0',
  `date` date NOT NULL,
  `visit_date` date NOT NULL,
  `visit_time` time NOT NULL,
  `hits` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ip` (`ip`,`date`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Dumping data for table kumpulkomunitas.counters: ~6 rows (approximately)
/*!40000 ALTER TABLE `counters` DISABLE KEYS */;
INSERT INTO `counters` (`id`, `ip`, `date`, `visit_date`, `visit_time`, `hits`, `created_at`, `updated_at`) VALUES
	(1, 'xxx', '2016-12-19', '2016-12-19', '15:15:21', 24, '2016-12-19 13:42:30', '2016-12-19 15:15:21'),
	(4, '0', '2016-12-20', '2016-12-20', '15:42:29', 23, NULL, '2016-12-20 15:42:29'),
	(7, '::1', '2016-12-20', '2016-12-20', '15:49:36', 3, '2016-12-20 15:45:14', '2016-12-20 15:49:36'),
	(8, '::1', '2016-12-21', '2016-12-21', '15:13:51', 32, '2016-12-21 08:34:45', '2016-12-21 15:13:51'),
	(9, '::1', '2016-12-23', '2016-12-23', '12:23:52', 334, '2016-12-23 08:35:25', '2016-12-23 12:23:52'),
	(10, '0', '2016-12-23', '2016-12-23', '10:27:16', 51, '2016-12-23 10:27:10', '2016-12-23 10:27:16');
/*!40000 ALTER TABLE `counters` ENABLE KEYS */;

-- Dumping structure for table kumpulkomunitas.events
CREATE TABLE IF NOT EXISTS `events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `komunitas` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT ' ',
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_time` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `post_id` (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table kumpulkomunitas.events: ~12 rows (approximately)
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` (`id`, `user_id`, `post_id`, `komunitas`, `title`, `start_time`, `end_time`, `created_at`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
	(3, '1', 0, ' Yamaha R15', 'wkwkwkwk', '2016-12-15 13:03:21', '2016-12-18 00:00:00', '2016-12-15 08:40:37', '2016-12-15 13:03:21', NULL, '2016-12-15 13:03:21', NULL),
	(4, '1', 0, ' ', 'wkwkwkwkxxxx', '2016-12-15 12:51:20', '2016-12-18 00:00:00', '2016-12-15 08:41:01', '2016-12-15 08:41:01', NULL, NULL, NULL),
	(5, '4', 0, ' Lenovo Laptop', 'wewwrwrwrxx', '2016-12-15 13:19:14', '2016-12-20 23:00:00', '2016-12-15 08:41:48', '2016-12-15 13:19:14', 1, NULL, NULL),
	(6, '4', 0, ' ', 'wewwrwrwr', '2016-12-23 12:22:46', '2016-12-20 23:00:00', '2016-12-15 08:45:41', '2016-12-23 12:22:46', NULL, '2016-12-23 12:22:46', NULL),
	(7, '4', 0, ' ', 'wewwrwrwr', '2016-12-23 12:23:04', '2016-12-20 23:00:00', '2016-12-15 08:45:57', '2016-12-23 12:23:04', NULL, '2016-12-23 12:23:04', NULL),
	(8, '4', 0, ' ', 'wewwrwrwr', '2016-12-19 00:00:00', '2016-12-20 23:00:00', '2016-12-15 08:46:09', '2016-12-15 08:46:09', NULL, NULL, NULL),
	(9, '2', 0, ' ', 'wqeqweqeqwe', '2016-12-23 00:00:00', '2016-12-25 19:00:00', '2016-12-15 08:47:54', '2016-12-15 08:47:54', NULL, NULL, NULL),
	(10, '2', 0, ' ', 'wqeqweqeqwe', '2016-12-23 00:00:00', '2016-12-25 19:00:00', '2016-12-15 08:48:47', '2016-12-15 08:48:47', NULL, NULL, NULL),
	(11, '2', 0, ' ', 'wqeqweqeqwe', '2016-12-23 00:00:00', '2016-12-25 19:00:00', '2016-12-15 08:49:09', '2016-12-15 08:49:09', NULL, NULL, NULL),
	(12, '2', 0, ' ', 'wqeqweqeqwe', '2016-12-23 00:00:00', '2016-12-25 19:00:00', '2016-12-15 08:49:35', '2016-12-15 08:49:35', NULL, NULL, NULL),
	(13, '2', 0, ' ', 'wqeqweqeqwe', '2016-12-23 00:00:00', '2016-12-25 19:00:00', '2016-12-15 08:52:14', '2016-12-15 08:52:14', NULL, NULL, NULL),
	(14, '2', 0, ' ASUS Laptop', 'kopdar xxxxxxxx', '2016-12-23 12:21:04', '2016-12-31 10:00:00', '2016-12-15 08:59:20', '2016-12-23 12:21:04', 1, NULL, NULL),
	(15, '1', 1, 'nyoba akh', 'coba cobaxzcxzczxczxc', '2016-12-23 12:22:15', '2016-12-19 23:59:59', '2016-12-19 09:42:40', '2016-12-23 12:22:15', 1, NULL, NULL),
	(16, '1', 1, 'nyoba akh', 'pertemuan kedua', '2017-01-01 10:00:00', '2017-01-01 17:00:00', '2016-12-19 10:06:40', '2016-12-19 10:06:40', NULL, NULL, NULL),
	(17, '1', NULL, 'xx', 'xxxx', '2016-12-24 11:00:00', '2017-01-29 11:00:00', '2016-12-23 11:53:35', '2016-12-23 11:53:35', NULL, NULL, NULL);
/*!40000 ALTER TABLE `events` ENABLE KEYS */;

-- Dumping structure for view kumpulkomunitas.jmlhcomment
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `jmlhcomment` (
	`category_id` INT(11) NOT NULL,
	`JmlhComment` BIGINT(21) NOT NULL,
	`LastPost` TIMESTAMP NULL
) ENGINE=MyISAM;

-- Dumping structure for view kumpulkomunitas.jmlhpost
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `jmlhpost` (
	`id` INT(10) UNSIGNED NOT NULL,
	`category` VARCHAR(255) NOT NULL COLLATE 'utf8_unicode_ci',
	`parent_id` INT(11) NOT NULL,
	`description` VARCHAR(255) NOT NULL COLLATE 'utf8_unicode_ci',
	`JmlhPost` BIGINT(21) NOT NULL
) ENGINE=MyISAM;

-- Dumping structure for table kumpulkomunitas.message
CREATE TABLE IF NOT EXISTS `message` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id_pengirim` int(11) NOT NULL,
  `user_id_penerima` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `isi` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_pengirim` (`user_id_pengirim`),
  KEY `user_id_penerima` (`user_id_penerima`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table kumpulkomunitas.message: ~9 rows (approximately)
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
INSERT INTO `message` (`id`, `user_id_pengirim`, `user_id_penerima`, `title`, `isi`, `created_at`, `updated_at`) VALUES
	(1, 1, 2, 'halo vroh', 'kenalan gan', '2016-12-19 10:50:52', '2016-12-19 10:50:52'),
	(2, 2, 1, 'bum bum', 'bom bom', '2016-12-19 11:15:00', '2016-12-19 11:15:00'),
	(3, 1, 2, 'halo agus123', 'haloooooooooooooo', '2016-12-19 11:29:30', '2016-12-19 11:29:30'),
	(4, 1, 2, 'hallo juga', 'awkowakowako', '2016-12-19 11:56:20', '2016-12-19 11:56:20'),
	(5, 1, 4, 'Thread Dibuat', 'Hallo, Thread Request anda sudah berhasil dibuat, klik disini untuk melihat', NULL, NULL),
	(6, 1, 1, 'Thread Dibuat', 'Hallo, Thread Request anda sudah berhasil dibuat, klik disini untuk melihat', '2016-12-19 12:09:11', '2016-12-19 12:09:11'),
	(7, 1, 4, 'Thread Dibuat', 'Hallo, Thread Request anda sudah berhasil dibuat, <a href="{{ route("thread.show", $post_id )}}">klik disini</a> untuk melihat', '2016-12-19 12:18:01', '2016-12-19 12:18:01'),
	(8, 1, 2, 'eeeeeeee', '<p>wwwww</p>', '2016-12-23 08:49:19', '2016-12-23 08:49:19'),
	(9, 1, 2, 'asasassa', 'asssasasaas', '2016-12-23 10:37:05', '2016-12-23 10:37:05'),
	(10, 1, 2, 'crot vrweoqwe', 'qwkeoqwkeoqwkoe', '2016-12-23 10:43:11', '2016-12-23 10:43:11');
/*!40000 ALTER TABLE `message` ENABLE KEYS */;

-- Dumping structure for table kumpulkomunitas.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table kumpulkomunitas.migrations: ~8 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2016_12_05_065742_create_category_table', 1),
	(4, '2016_12_05_084044_create_tblaccount_table', 1),
	(5, '2016_12_05_084113_create_tbladmin_table', 1),
	(6, '2016_12_05_084127_create_tblcomment_table', 1),
	(7, '2016_12_05_084138_create_tblpost_table', 1),
	(8, '2016_12_05_084147_create_tbluser_table', 1),
	(9, '2016_12_12_185548_create_table_request', 2),
	(10, '2016_12_14_132233_create_events_table', 3),
	(11, '2016_12_16_105935_CreateAdminsTable', 4),
	(12, '2016_12_19_101115_create_tbl_message', 5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table kumpulkomunitas.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table kumpulkomunitas.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
	('andre19961@gmail.com', 'c0b1621e83618158238ac9f3da4efdb1b148dca1c82dd5625030f2d26b8a18fe', '2016-12-07 02:32:23');
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table kumpulkomunitas.requestcom
CREATE TABLE IF NOT EXISTS `requestcom` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `namaKomunitas` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deskipsi` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `disetujui` int(11) NOT NULL DEFAULT '0',
  `post_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table kumpulkomunitas.requestcom: ~4 rows (approximately)
/*!40000 ALTER TABLE `requestcom` DISABLE KEYS */;
INSERT INTO `requestcom` (`id`, `user_id`, `namaKomunitas`, `deskipsi`, `created_at`, `updated_at`, `disetujui`, `post_id`) VALUES
	(1, 1, 'apa yah', 'ya apah', '2016-12-13 08:20:21', '2016-12-13 08:20:21', 1, 17),
	(2, 2, 'JAV Lover', 'Tempat komunitas pecinta JAV Movie ( Java Movie )', '2016-12-19 09:15:54', '2016-12-19 09:15:54', 1, 15),
	(3, 4, 'MILF Lover', 'Kumpul pecinta rokok uMILF', '2016-12-19 12:04:23', '2016-12-19 12:04:23', 1, 16),
	(4, 4, 'NYOBA WOI', 'WOI WOI', '2016-12-19 12:17:27', '2016-12-19 12:17:27', 1, 18);
/*!40000 ALTER TABLE `requestcom` ENABLE KEYS */;

-- Dumping structure for table kumpulkomunitas.tblcomment
CREATE TABLE IF NOT EXISTS `tblcomment` (
  `comment_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `created_at_ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT ' ',
  `updated_at_ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT ' ',
  PRIMARY KEY (`comment_id`),
  KEY `user_id` (`user_id`),
  KEY `post_id` (`post_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table kumpulkomunitas.tblcomment: ~14 rows (approximately)
/*!40000 ALTER TABLE `tblcomment` DISABLE KEYS */;
INSERT INTO `tblcomment` (`comment_id`, `comment`, `post_id`, `user_id`, `username`, `created_at`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`, `created_at_ip`, `updated_at_ip`) VALUES
	(1, ' ini komentar pertamaaa lhoo', 1, 1, 'admin', '2016-12-10 09:48:57', '2016-12-15 13:15:05', 1, NULL, NULL, ' ', ' '),
	(2, 'ini komentar keduaa', 1, 1, 'admin', '2016-12-10 10:01:42', '2016-12-10 10:01:42', NULL, NULL, NULL, ' ', ' '),
	(3, 'ya memang,,,\r\nmau gmn lagi,,,kwaokwaokawo', 8, 1, 'admin', '2016-12-10 11:04:00', '2016-12-10 11:04:00', NULL, NULL, NULL, ' ', ' '),
	(5, 'ketigaxxx', 1, 1, 'admin', '2016-12-13 11:24:56', '2016-12-13 11:24:56', NULL, NULL, NULL, ' ', ' '),
	(6, 'keempatxx', 1, 2, 'agus123', '2016-12-13 11:25:33', '2016-12-13 11:25:33', NULL, NULL, NULL, ' ', ' '),
	(7, 'komen', 10, 1, 'admin', '2016-12-15 08:16:54', '2016-12-15 08:16:54', NULL, NULL, NULL, ' ', ' '),
	(9, 'aaaaa', 2, 1, 'admin', '2016-12-15 13:01:49', '2016-12-15 13:01:57', NULL, '2016-12-15 13:01:57', NULL, ' ', ' '),
	(10, 'kkkkkkkkkk', 13, 1, 'admin', '2016-12-17 10:52:19', '2016-12-17 10:52:19', NULL, NULL, NULL, ' ', ' '),
	(11, 'oooooooooooo', 13, 1, 'admin', '2016-12-17 10:52:32', '2016-12-17 10:52:32', NULL, NULL, NULL, ' ', ' '),
	(12, 'oooooooooooooooooo', 14, 1, 'admin', '2016-12-17 11:05:19', '2016-12-17 11:05:19', NULL, NULL, NULL, ' ', ' '),
	(13, 'iiiiiiiii', 14, 1, 'admin', '2016-12-17 11:05:25', '2016-12-17 11:05:25', NULL, NULL, NULL, ' ', ' '),
	(14, 'hay hay', 15, 1, 'admin', '2016-12-21 14:18:28', '2016-12-21 14:18:28', NULL, NULL, NULL, ' ', ' '),
	(15, 'xcxx', 20, 1, 'admin', '2016-12-21 14:19:02', '2016-12-21 14:19:02', NULL, NULL, NULL, ' ', ' '),
	(16, 'vuvuvuvuvuvu', 21, 1, 'admin', '2016-12-21 14:20:06', '2016-12-21 14:20:06', NULL, NULL, NULL, ' ', ' ');
/*!40000 ALTER TABLE `tblcomment` ENABLE KEYS */;

-- Dumping structure for table kumpulkomunitas.tblpost
CREATE TABLE IF NOT EXISTS `tblpost` (
  `post_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `updated_by` int(10) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `deleted_by` int(10) DEFAULT NULL,
  `created_at_ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT ' ',
  `updated_at_ip` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT ' ',
  `request_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`post_id`),
  KEY `category_id` (`category_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table kumpulkomunitas.tblpost: ~13 rows (approximately)
/*!40000 ALTER TABLE `tblpost` DISABLE KEYS */;
INSERT INTO `tblpost` (`post_id`, `title`, `content`, `user_id`, `username`, `category_id`, `created_at`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`, `created_at_ip`, `updated_at_ip`, `request_id`) VALUES
	(1, 'nyoba akh', '  wkwkkwk kwkwkwkwkw ckckckckckc\r\n ', 1, 'admin', 1, '2016-12-08 04:03:52', '2016-12-15 13:10:50', 1, NULL, NULL, '', '', NULL),
	(2, 'General Discsuaisdoasid', 'qwoinqwonmakslmakslvm,z.x,vmaosinfqownmqwlemk1o2k312noiknr12klfqwdd', 1, 'admin', 1, NULL, NULL, NULL, NULL, NULL, ' ', ' ', NULL),
	(3, 'kakak saya mau tanya', 'ini forum apa yah,,,\r\nwkaoawkowakoawkoawk', 2, 'agus123', 3, NULL, NULL, NULL, NULL, NULL, ' ', ' ', NULL),
	(8, 'kakak saya mau tanya lagi', 'ini kok buysuk bener yah forumnya wakoakwoakwo', 1, 'admin', 3, '2016-12-10 10:03:15', '2016-12-10 10:03:15', NULL, NULL, NULL, ' ', ' ', NULL),
	(9, 'askdoaskodk', 'wkoeqwkoekqwoek', 1, 'admin', 1, '2016-12-10 10:05:04', '2016-12-10 10:05:04', NULL, NULL, NULL, ' ', ' ', NULL),
	(10, 'tgtgtgtgt', 'rfrferferferf', 1, 'admin', 1, '2016-12-15 08:16:37', '2016-12-15 08:16:37', NULL, NULL, NULL, ' ', ' ', NULL),
	(11, 'ggg', 'ggggg', 1, 'admin', 1, '2016-12-15 08:23:02', '2016-12-15 12:58:27', NULL, '2016-12-15 12:58:27', NULL, ' ', ' ', NULL),
	(12, 'zxczxczx', 'zxczxczxczxc', 2, 'agus123', 1, '2016-12-16 12:55:23', '2016-12-16 12:55:23', NULL, NULL, NULL, ' ', ' ', NULL),
	(13, 'kimochieeeeeeeeeeeg', 'asdasdasdasd', 1, 'admin', 2, '2016-12-17 10:14:27', '2016-12-17 10:14:27', NULL, NULL, NULL, ' ', ' ', NULL),
	(14, 'kokokokokoko', 'okokokokokojojojojo', 1, 'admin', 3, '2016-12-17 11:05:11', '2016-12-17 11:05:11', NULL, NULL, NULL, ' ', ' ', NULL),
	(15, 'JAV Lover', 'Tempat komunitas pecinta JAV Movie ( Java Movie )', 2, 'agus123', 4, '2016-12-19 09:16:41', '2016-12-19 09:16:41', NULL, NULL, NULL, ' ', ' ', 2),
	(16, 'MILF Lover', 'Kumpul pecinta rokok uMILF', 4, 'wkwk', 4, '2016-12-19 12:05:37', '2016-12-19 12:05:37', NULL, NULL, NULL, ' ', ' ', 3),
	(17, 'apa yah', 'ya apah', 1, 'admin', 3, '2016-12-19 12:09:11', '2016-12-19 12:09:11', NULL, NULL, NULL, ' ', ' ', 1),
	(18, 'NYOBA WOI', 'WOI WOI', 4, 'wkwk', 1, '2016-12-19 12:18:01', '2016-12-19 12:18:01', NULL, NULL, NULL, ' ', ' ', 4),
	(19, 'Bro tanya dong,,,', '<p><strong>gw tanya ini apa sohh</strong></p>\r\n', 4, 'wkwk', 3, '2016-12-19 12:28:35', '2016-12-19 12:28:35', NULL, NULL, NULL, ' ', ' ', NULL),
	(20, 'nyhngh', 'hnghnhgnghn', 1, 'admin', 1, '2016-12-21 14:18:51', '2016-12-21 14:18:51', NULL, NULL, NULL, ' ', ' ', NULL),
	(21, 'xxxx movie', 'xxxxx', 1, 'admin', 14, '2016-12-21 14:19:37', '2016-12-21 14:19:37', NULL, NULL, NULL, ' ', ' ', NULL);
/*!40000 ALTER TABLE `tblpost` ENABLE KEYS */;

-- Dumping structure for table kumpulkomunitas.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TglLahir` date NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at_ip` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at_ip` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `HakAkses` varchar(50) COLLATE utf8_unicode_ci DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table kumpulkomunitas.users: ~6 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `username`, `gender`, `TglLahir`, `password`, `remember_token`, `created_at_ip`, `updated_at_ip`, `created_at`, `updated_at`, `deleted_at`, `HakAkses`) VALUES
	(1, 'Andrea Metta W', 'andre19961@gmail.com', 'admin', 'Laki - Laki', '2016-12-01', '$2y$10$vwJ.ttUnsxxZsUeqmalhTu2bGjNf3.dUn1Cp5DK4seZ6.25mVuxm6', 'xy7ZSjwPjRrb108PaVLqheARd3e1vGF9I8UXcn8F24b2LOz9EkcH6ijU1gvZ', NULL, NULL, '2016-12-07 02:09:46', '2016-12-20 15:18:30', NULL, 'Admin'),
	(2, 'Agus', 'agus@yahoo.com', 'agus123', 'Laki - Laki', '1991-12-10', '$2y$10$K7P8nj3MgDDnOSy0R/DxhOwHS3.NwcF3hck48jNO06JPctm2P/O9e', 'JLry5KxUnPBZ94mu3AJqdPuenAbUB5f8Vk55a7At33eivL476yTIVRqtfIbV', NULL, NULL, '2016-12-07 04:10:01', '2016-12-19 14:49:04', NULL, 'User'),
	(3, 'ahayyy', 'ahay@gmail.com', 'admin2', 'Laki - Laki', '2016-12-01', '$2y$10$ja2Z4a01rwso1L6FBdQKz.zZsHnnRCgrftvfKwbde6KKpDyvLPRxC', 'AO6t4bOl4HzATFFLnzz9fyNQhvrnhEMxsR9DE3jYEynWxLeCYnPKNOVWKFT6', NULL, NULL, '2016-12-08 06:19:28', '2016-12-08 06:19:35', NULL, 'Admin'),
	(4, 'kwkwkwkw', 'kwkwk@yahoo.com', 'wkwk', 'Laki - Laki', '2016-10-01', '$2y$10$shAFzHE5K1pe96GAHv./3.X6A7n4wjONwIcI5JqA2y9.6jxA5Ipa6', 'LnhhPhZeLHvjZAIOar47UZScNfQm40HaUXYQWpOhTUFMnfnXDkD6LiMmb87C', NULL, NULL, '2016-12-09 01:56:20', '2016-12-19 15:17:43', NULL, 'User'),
	(5, 'wkowkowkow', 'wkowko@yahoo.com', 'owow', 'Perempuan', '2016-12-01', '$2y$10$fqhZF1kP/W.zAF/1pSM0Iuq9KBoF1Taw./LxIBgbnDOAxsTk4kKq2', 'ZalSCj6AJKCgRLek46Y4B2jF8kUu5N8GersAQu7QGR5ARxCnVto6DE2vuqeW', NULL, NULL, '2016-12-09 01:57:37', '2016-12-09 02:47:05', NULL, 'User'),
	(6, 'asdasdasd', 'aaaaaa@gmail.com', 'admin5', 'Laki - Laki', '2016-12-01', '$2y$10$URkDtLpMSpFeQ/Jqy2ZMPuJUi2z26yCJ1E9EFd0U1WBBTLML55d9m', 'MrJCcf8os2gv2nCUKM4CJ6l1mZp4UcwYFvf9LWT7tUuq0ASblf8xQ2VUzZEB', NULL, NULL, '2016-12-16 11:47:23', '2016-12-16 11:48:11', NULL, 'Admin');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for view kumpulkomunitas.jmlhcomment
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `jmlhcomment`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `jmlhcomment` AS select p.category_id, count(p.post_id) as JmlhComment, max(c.updated_at) as LastPost from tblpost p, tblcomment c where c.post_id = p.post_id group by p.category_id ;

-- Dumping structure for view kumpulkomunitas.jmlhpost
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `jmlhpost`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `jmlhpost` AS select c.id, c.category, c.parent_id, c.description, count(p.title) as JmlhPost from category c left join tblpost p on c.id = p.category_id group by c.id ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
