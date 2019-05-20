-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         5.7.24 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             9.5.0.5332
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para automovil
CREATE DATABASE IF NOT EXISTS `automovil` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `automovil`;

-- Volcando estructura para tabla automovil.clients
CREATE TABLE IF NOT EXISTS `clients` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location_id` bigint(20) unsigned NOT NULL,
  `dealership_id` bigint(20) unsigned NOT NULL,
  `statu_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `clients_location_id_foreign` (`location_id`),
  KEY `clients_dealership_id_foreign` (`dealership_id`),
  KEY `clients_statu_id_foreign` (`statu_id`),
  CONSTRAINT `clients_dealership_id_foreign` FOREIGN KEY (`dealership_id`) REFERENCES `dealerships` (`id`) ON DELETE CASCADE,
  CONSTRAINT `clients_location_id_foreign` FOREIGN KEY (`location_id`) REFERENCES `locations` (`id`) ON DELETE CASCADE,
  CONSTRAINT `clients_statu_id_foreign` FOREIGN KEY (`statu_id`) REFERENCES `status` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla automovil.clients: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` (`id`, `name`, `location_id`, `dealership_id`, `statu_id`, `created_at`, `updated_at`) VALUES
	(1, 'testghjk', 1, 2, 1, '2019-05-19 01:35:32', '2019-05-19 16:35:43'),
	(2, 'asd', 4, 2, 2, '2019-05-18 22:13:33', '2019-05-18 22:13:36'),
	(3, 'testdfd', 1, 2, 2, '2019-05-19 02:17:02', '2019-05-19 16:39:20'),
	(4, 'test', 1, 1, 2, '2019-05-19 02:17:07', '2019-05-19 16:56:05'),
	(5, 'test', 1, 2, 2, '2019-05-19 16:56:22', '2019-05-19 16:56:58'),
	(6, 'ghjkghjk', 2, 2, 1, '2019-05-19 16:56:28', '2019-05-19 16:56:34'),
	(7, 'ewrwe', 3, 3, 1, '2019-05-19 16:57:41', '2019-05-19 16:59:24'),
	(8, 'qwerqwer', 1, 1, 2, '2019-05-19 16:57:47', '2019-05-19 16:58:03'),
	(9, 'asdfasdf', 2, 1, 1, '2019-05-19 16:57:54', '2019-05-19 16:57:54');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;

-- Volcando estructura para tabla automovil.dealerships
CREATE TABLE IF NOT EXISTS `dealerships` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla automovil.dealerships: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `dealerships` DISABLE KEYS */;
INSERT INTO `dealerships` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'Sumarca', '2019-05-18 21:27:20', '2019-05-18 21:27:21'),
	(2, 'Ruficar', NULL, NULL),
	(3, 'Expomarca', NULL, NULL);
/*!40000 ALTER TABLE `dealerships` ENABLE KEYS */;

-- Volcando estructura para tabla automovil.locations
CREATE TABLE IF NOT EXISTS `locations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla automovil.locations: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;
INSERT INTO `locations` (`id`, `location`, `created_at`, `updated_at`) VALUES
	(1, 'caracas', '2019-05-18 21:30:27', '2019-05-18 21:30:29'),
	(2, 'barquisimeto', '2019-05-18 21:30:37', '2019-05-18 21:30:39'),
	(3, 'valencia', '2019-05-18 21:30:48', '2019-05-18 21:30:50'),
	(4, 'barcelona', '2019-05-18 21:31:00', '2019-05-18 21:31:01');
/*!40000 ALTER TABLE `locations` ENABLE KEYS */;

-- Volcando estructura para tabla automovil.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla automovil.migrations: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(15, '2014_10_12_000000_create_users_table', 1),
	(16, '2014_10_12_100000_create_password_resets_table', 1),
	(17, '2019_05_17_125113_create_locations_table', 1),
	(18, '2019_05_17_140427_create_dealerships_table', 1),
	(19, '2019_05_19_010351_create_status_table', 1),
	(20, '2019_05_20_141045_create_clients_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Volcando estructura para tabla automovil.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla automovil.password_resets: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Volcando estructura para tabla automovil.status
CREATE TABLE IF NOT EXISTS `status` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla automovil.status: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'activo', '2019-05-18 21:31:52', '2019-05-18 21:31:54'),
	(2, 'inactivo', '2019-05-18 21:32:12', '2019-05-18 21:32:14');
/*!40000 ALTER TABLE `status` ENABLE KEYS */;

-- Volcando estructura para tabla automovil.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla automovil.users: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
