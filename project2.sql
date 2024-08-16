-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: project2
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `activities`
--

DROP TABLE IF EXISTS `activities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `activities` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `operation` enum('C','U','D') COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `activities_user_id_foreign` (`user_id`),
  CONSTRAINT `activities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activities`
--

LOCK TABLES `activities` WRITE;
/*!40000 ALTER TABLE `activities` DISABLE KEYS */;
INSERT INTO `activities` VALUES (1,'C','╪╖╪د┘╪ذ',1,'╪ز┘à ╪ح╪╢╪د┘╪ر ╪د┘╪╖╪د┘╪ذ ╪▒┘ê╪د┘ ╪╣┘à╪▒ ┘à┘ ┘é╪ذ┘ admin','2024-07-19 02:30:59'),(2,'C','╪╖╪د┘╪ذ',1,'╪ز┘à ╪ح╪╢╪د┘╪ر ╪د┘╪╖╪د┘╪ذ ┘à╪ج┘à┘ ╪▒╪╢┘ê╪د┘ ┘à┘ ┘é╪ذ┘ admin','2024-07-19 02:31:00'),(3,'C','╪╖╪د┘╪ذ',1,'╪ز┘à ╪ح╪╢╪د┘╪ر ╪د┘╪╖╪د┘╪ذ ╪╣┘┘è ╪│╪╣┘è╪» ┘à┘ ┘é╪ذ┘ admin','2024-07-19 02:31:00'),(4,'C','╪╖╪د┘╪ذ',1,'╪ز┘à ╪ح╪╢╪د┘╪ر ╪د┘╪╖╪د┘╪ذ ╪▒┘ê╪د┘ ┘à╪ص┘à╪» ┘à┘ ┘é╪ذ┘ admin','2024-07-19 02:31:00'),(5,'C','╪╖╪د┘╪ذ',1,'╪ز┘à ╪ح╪╢╪د┘╪ر ╪د┘╪╖╪د┘╪ذ ╪د╪ص┘à╪» ╪د╪ص┘à╪» ┘à┘ ┘é╪ذ┘ admin','2024-07-19 02:31:00'),(6,'C','╪╖╪د┘╪ذ',1,'╪ز┘à ╪ح╪╢╪د┘╪ر ╪د┘╪╖╪د┘╪ذ ╪ث╪ص┘à╪» ╪د╪ص┘à╪» ┘à┘ ┘é╪ذ┘ admin','2024-07-19 02:31:00'),(7,'C','╪╖╪د┘╪ذ',1,'╪ز┘à ╪ح╪╢╪د┘╪ر ╪د┘╪╖╪د┘╪ذ ╪╣┘à╪▒ ┘à╪ج┘à┘ ┘à┘ ┘é╪ذ┘ admin','2024-07-19 02:31:00'),(8,'C','╪╖╪د┘╪ذ',1,'╪ز┘à ╪ح╪╢╪د┘╪ر ╪د┘╪╖╪د┘╪ذ ╪╣┘à╪د╪▒ ╪╣╪ذ╪» ╪د┘┘┘ç ┘à┘ ┘é╪ذ┘ admin','2024-07-19 02:31:00'),(9,'C','╪╖╪د┘╪ذ',1,'╪ز┘à ╪ح╪╢╪د┘╪ر ╪د┘╪╖╪د┘╪ذ ╪╣╪ذ╪» ╪د┘┘┘ç ┘à╪ص┘à╪» ┘à┘ ┘é╪ذ┘ admin','2024-07-19 02:31:00'),(10,'C','╪╖╪د┘╪ذ',1,'╪ز┘à ╪ح╪╢╪د┘╪ر ╪د┘╪╖╪د┘╪ذ ╪▒┘ê╪د┘ ╪╣╪ذ╪» ╪د┘┘┘ç ┘à┘ ┘é╪ذ┘ admin','2024-07-19 02:31:00'),(11,'C','╪╖╪د┘╪ذ',1,'╪ز┘à ╪ح╪╢╪د┘╪ر ╪د┘╪╖╪د┘╪ذ ╪╣╪ذ╪» ╪د┘┘┘ç ╪╣┘┘è ┘à┘ ┘é╪ذ┘ admin','2024-07-19 02:31:00'),(12,'C','╪╖╪د┘╪ذ',1,'╪ز┘à ╪ح╪╢╪د┘╪ر ╪د┘╪╖╪د┘╪ذ ╪ث╪│╪د┘à╪ر ╪╣┘┘è ┘à┘ ┘é╪ذ┘ admin','2024-07-19 02:31:00'),(13,'C','╪╖╪د┘╪ذ',1,'╪ز┘à ╪ح╪╢╪د┘╪ر ╪د┘╪╖╪د┘╪ذ ┘à╪ص┘à╪» ╪╣┘┘è ┘à┘ ┘é╪ذ┘ admin','2024-07-19 02:31:00'),(14,'C','╪╖╪د┘╪ذ',1,'╪ز┘à ╪ح╪╢╪د┘╪ر ╪د┘╪╖╪د┘╪ذ ┘è┘ê╪┤╪╣ ╪│╪╣┘è╪» ┘à┘ ┘é╪ذ┘ admin','2024-07-19 02:31:00'),(15,'C','╪╖╪د┘╪ذ',1,'╪ز┘à ╪ح╪╢╪د┘╪ر ╪د┘╪╖╪د┘╪ذ ╪╣┘à╪▒ ╪╣┘┘è ┘à┘ ┘é╪ذ┘ admin','2024-07-19 02:31:00'),(16,'C','╪╖╪د┘╪ذ',1,'╪ز┘à ╪ح╪╢╪د┘╪ر ╪د┘╪╖╪د┘╪ذ ╪╣┘à╪د╪▒ ┘à╪ج┘à┘ ┘à┘ ┘é╪ذ┘ admin','2024-07-19 02:31:00'),(17,'C','╪╖╪د┘╪ذ',1,'╪ز┘à ╪ح╪╢╪د┘╪ر ╪د┘╪╖╪د┘╪ذ ╪│╪╣┘è╪» ╪ث╪│╪د┘à╪ر ┘à┘ ┘é╪ذ┘ admin','2024-07-19 02:31:00'),(18,'C','╪╖╪د┘╪ذ',1,'╪ز┘à ╪ح╪╢╪د┘╪ر ╪د┘╪╖╪د┘╪ذ ╪╣╪ذ╪» ╪د┘┘┘ç ╪▒╪╢┘ê╪د┘ ┘à┘ ┘é╪ذ┘ admin','2024-07-19 02:31:00'),(19,'C','╪╖╪د┘╪ذ',1,'╪ز┘à ╪ح╪╢╪د┘╪ر ╪د┘╪╖╪د┘╪ذ ╪│╪╣┘è╪» ╪ث╪ص┘à╪» ┘à┘ ┘é╪ذ┘ admin','2024-07-19 02:31:00'),(20,'C','╪╖╪د┘╪ذ',1,'╪ز┘à ╪ح╪╢╪د┘╪ر ╪د┘╪╖╪د┘╪ذ ┘à╪ص┘à╪» ╪▒╪╢┘ê╪د┘ ┘à┘ ┘é╪ذ┘ admin','2024-07-19 02:31:00'),(21,'C','╪ث╪│╪ز╪د╪░',1,'╪ز┘à ╪ح╪╢╪د┘╪ر ╪د┘╪ث╪│╪ز╪د╪░ ╪╣╪ذ╪» ╪د┘┘┘ç ┘à╪ص┘à╪» ┘à┘ ┘é╪ذ┘ admin','2024-07-19 02:32:25'),(22,'C','╪ث╪│╪ز╪د╪░',1,'╪ز┘à ╪ح╪╢╪د┘╪ر ╪د┘╪ث╪│╪ز╪د╪░ ╪╣┘à╪▒ ╪ث╪ص┘à╪» ┘à┘ ┘é╪ذ┘ admin','2024-07-19 02:32:25'),(23,'C','╪ث╪│╪ز╪د╪░',1,'╪ز┘à ╪ح╪╢╪د┘╪ر ╪د┘╪ث╪│╪ز╪د╪░ ╪ث╪ص┘à╪» ╪ث╪│╪د┘à╪ر ┘à┘ ┘é╪ذ┘ admin','2024-07-19 02:32:25'),(24,'C','╪ث╪│╪ز╪د╪░',1,'╪ز┘à ╪ح╪╢╪د┘╪ر ╪د┘╪ث╪│╪ز╪د╪░ ┘è┘ê╪┤╪╣ ╪╣┘à╪▒ ┘à┘ ┘é╪ذ┘ admin','2024-07-19 02:32:25'),(25,'C','╪ث╪│╪ز╪د╪░',1,'╪ز┘à ╪ح╪╢╪د┘╪ر ╪د┘╪ث╪│╪ز╪د╪░ ╪╣╪ذ╪» ╪د┘┘┘ç ╪▒┘ê╪د┘ ┘à┘ ┘é╪ذ┘ admin','2024-07-19 02:32:25'),(26,'C','╪ث╪│╪ز╪د╪░',1,'╪ز┘à ╪ح╪╢╪د┘╪ر ╪د┘╪ث╪│╪ز╪د╪░ ┘è┘ê╪┤╪╣ ╪ث╪│╪د┘à╪ر ┘à┘ ┘é╪ذ┘ admin','2024-07-19 02:32:25'),(27,'C','╪ث╪│╪ز╪د╪░',1,'╪ز┘à ╪ح╪╢╪د┘╪ر ╪د┘╪ث╪│╪ز╪د╪░ ┘à╪ص┘à╪» ╪ث╪│╪د┘à╪ر ┘à┘ ┘é╪ذ┘ admin','2024-07-19 02:32:25'),(28,'C','╪ث╪│╪ز╪د╪░',1,'╪ز┘à ╪ح╪╢╪د┘╪ر ╪د┘╪ث╪│╪ز╪د╪░ ╪▒┘ê╪د┘ ╪╣┘┘è ┘à┘ ┘é╪ذ┘ admin','2024-07-19 02:32:25'),(29,'C','╪ث╪│╪ز╪د╪░',1,'╪ز┘à ╪ح╪╢╪د┘╪ر ╪د┘╪ث╪│╪ز╪د╪░ ╪╣┘à╪▒ ╪▒╪╢┘ê╪د┘ ┘à┘ ┘é╪ذ┘ admin','2024-07-19 02:32:25'),(30,'C','╪ث╪│╪ز╪د╪░',1,'╪ز┘à ╪ح╪╢╪د┘╪ر ╪د┘╪ث╪│╪ز╪د╪░ ╪╣╪ذ╪» ╪د┘┘┘ç ┘à╪ص┘à╪» ┘à┘ ┘é╪ذ┘ admin','2024-07-19 02:32:25'),(31,'C','╪ث╪│╪ز╪د╪░',1,'╪ز┘à ╪ح╪╢╪د┘╪ر ╪د┘╪ث╪│╪ز╪د╪░ ╪د╪ص┘à╪» ┘à╪ص┘à╪» ┘à┘ ┘é╪ذ┘ admin','2024-07-19 02:32:25'),(32,'C','╪ث╪│╪ز╪د╪░',1,'╪ز┘à ╪ح╪╢╪د┘╪ر ╪د┘╪ث╪│╪ز╪د╪░ ╪╣╪ذ╪» ╪د┘┘┘ç ╪╣┘à╪▒ ┘à┘ ┘é╪ذ┘ admin','2024-07-19 02:32:25'),(33,'C','╪ث╪│╪ز╪د╪░',1,'╪ز┘à ╪ح╪╢╪د┘╪ر ╪د┘╪ث╪│╪ز╪د╪░ ╪╣╪ذ╪» ╪د┘┘┘ç ╪│╪╣┘è╪» ┘à┘ ┘é╪ذ┘ admin','2024-07-19 02:32:25'),(34,'C','╪ث╪│╪ز╪د╪░',1,'╪ز┘à ╪ح╪╢╪د┘╪ر ╪د┘╪ث╪│╪ز╪د╪░ ╪د╪ص┘à╪» ╪▒┘ê╪د┘ ┘à┘ ┘é╪ذ┘ admin','2024-07-19 02:32:25'),(35,'C','╪ث╪│╪ز╪د╪░',1,'╪ز┘à ╪ح╪╢╪د┘╪ر ╪د┘╪ث╪│╪ز╪د╪░ ╪▒╪╢┘ê╪د┘ ╪▒┘ê╪د┘ ┘à┘ ┘é╪ذ┘ admin','2024-07-19 02:32:25'),(36,'C','╪ث╪│╪ز╪د╪░',1,'╪ز┘à ╪ح╪╢╪د┘╪ر ╪د┘╪ث╪│╪ز╪د╪░ ╪ث╪ص┘à╪» ┘è┘ê╪┤╪╣ ┘à┘ ┘é╪ذ┘ admin','2024-07-19 02:32:25'),(37,'C','╪ث╪│╪ز╪د╪░',1,'╪ز┘à ╪ح╪╢╪د┘╪ر ╪د┘╪ث╪│╪ز╪د╪░ ┘à╪ص┘à╪» ╪╣╪ذ╪» ╪د┘┘┘ç ┘à┘ ┘é╪ذ┘ admin','2024-07-19 02:32:25'),(38,'C','╪ث╪│╪ز╪د╪░',1,'╪ز┘à ╪ح╪╢╪د┘╪ر ╪د┘╪ث╪│╪ز╪د╪░ ┘à╪ص┘à╪» ╪د╪ص┘à╪» ┘à┘ ┘é╪ذ┘ admin','2024-07-19 02:32:25'),(39,'C','╪ث╪│╪ز╪د╪░',1,'╪ز┘à ╪ح╪╢╪د┘╪ر ╪د┘╪ث╪│╪ز╪د╪░ ┘è┘ê╪┤╪╣ ╪د╪ص┘à╪» ┘à┘ ┘é╪ذ┘ admin','2024-07-19 02:32:25'),(40,'C','╪ث╪│╪ز╪د╪░',1,'╪ز┘à ╪ح╪╢╪د┘╪ر ╪د┘╪ث╪│╪ز╪د╪░ ╪│╪╣┘è╪» ╪ث╪ص┘à╪» ┘à┘ ┘é╪ذ┘ admin','2024-07-19 02:32:25'),(41,'C','┘à┘ê╪╕┘',1,'╪ز┘à ╪ح╪╢╪د┘╪ر ╪د┘┘à┘ê╪╕┘ ╪▒╪╢┘ê╪د┘ ╪╣┘à╪▒ ┘à┘ ┘é╪ذ┘ admin','2024-07-25 01:29:18'),(42,'C','┘à┘ê╪╕┘',1,'╪ز┘à ╪ح╪╢╪د┘╪ر ╪د┘┘à┘ê╪╕┘ ╪│╪╣┘è╪» ╪ث╪ص┘à╪» ┘à┘ ┘é╪ذ┘ admin','2024-07-25 01:29:18'),(43,'C','┘à┘ê╪╕┘',1,'╪ز┘à ╪ح╪╢╪د┘╪ر ╪د┘┘à┘ê╪╕┘ ╪│╪╣┘è╪» ╪│╪╣┘è╪» ┘à┘ ┘é╪ذ┘ admin','2024-07-25 01:29:18'),(44,'C','┘à┘ê╪╕┘',1,'╪ز┘à ╪ح╪╢╪د┘╪ر ╪د┘┘à┘ê╪╕┘ ╪│╪╣┘è╪» ╪╣┘à╪▒ ┘à┘ ┘é╪ذ┘ admin','2024-07-25 01:29:18'),(45,'C','┘à┘ê╪╕┘',1,'╪ز┘à ╪ح╪╢╪د┘╪ر ╪د┘┘à┘ê╪╕┘ ╪│╪╣┘è╪» ┘à╪ج┘à┘ ┘à┘ ┘é╪ذ┘ admin','2024-07-25 01:29:18'),(46,'C','┘à┘ê╪╕┘',1,'╪ز┘à ╪ح╪╢╪د┘╪ر ╪د┘┘à┘ê╪╕┘ ╪ث╪│╪د┘à╪ر ┘à╪ص┘à╪» ┘à┘ ┘é╪ذ┘ admin','2024-07-25 01:29:18'),(47,'C','┘à┘ê╪╕┘',1,'╪ز┘à ╪ح╪╢╪د┘╪ر ╪د┘┘à┘ê╪╕┘ ┘à╪ص┘à╪» ╪▒╪╢┘ê╪د┘ ┘à┘ ┘é╪ذ┘ admin','2024-07-25 01:29:18'),(48,'C','┘à┘ê╪╕┘',1,'╪ز┘à ╪ح╪╢╪د┘╪ر ╪د┘┘à┘ê╪╕┘ ┘à╪ج┘à┘ ╪╣┘┘è ┘à┘ ┘é╪ذ┘ admin','2024-07-25 01:29:18'),(49,'C','┘à┘ê╪╕┘',1,'╪ز┘à ╪ح╪╢╪د┘╪ر ╪د┘┘à┘ê╪╕┘ ╪د╪ص┘à╪» ╪▒╪╢┘ê╪د┘ ┘à┘ ┘é╪ذ┘ admin','2024-07-25 01:29:18'),(50,'C','┘à┘ê╪╕┘',1,'╪ز┘à ╪ح╪╢╪د┘╪ر ╪د┘┘à┘ê╪╕┘ ╪▒┘ê╪د┘ ╪╣┘à╪د╪▒ ┘à┘ ┘é╪ذ┘ admin','2024-07-25 01:29:18'),(51,'C','┘à┘ê╪╕┘',1,'╪ز┘à ╪ح╪╢╪د┘╪ر ╪د┘┘à┘ê╪╕┘ ╪╣┘à╪د╪▒ ╪╣┘┘è ┘à┘ ┘é╪ذ┘ admin','2024-07-25 01:29:18'),(52,'C','┘à┘ê╪╕┘',1,'╪ز┘à ╪ح╪╢╪د┘╪ر ╪د┘┘à┘ê╪╕┘ ┘è┘ê╪┤╪╣ ╪╣╪ذ╪» ╪د┘┘┘ç ┘à┘ ┘é╪ذ┘ admin','2024-07-25 01:29:18'),(53,'C','┘à┘ê╪╕┘',1,'╪ز┘à ╪ح╪╢╪د┘╪ر ╪د┘┘à┘ê╪╕┘ ╪╣╪ذ╪» ╪د┘┘┘ç ┘à╪ص┘à╪» ┘à┘ ┘é╪ذ┘ admin','2024-07-25 01:29:18'),(54,'C','┘à┘ê╪╕┘',1,'╪ز┘à ╪ح╪╢╪د┘╪ر ╪د┘┘à┘ê╪╕┘ ╪╣╪ذ╪» ╪د┘┘┘ç ╪د╪ص┘à╪» ┘à┘ ┘é╪ذ┘ admin','2024-07-25 01:29:18'),(55,'C','┘à┘ê╪╕┘',1,'╪ز┘à ╪ح╪╢╪د┘╪ر ╪د┘┘à┘ê╪╕┘ ╪╣┘┘è ╪ث╪ص┘à╪» ┘à┘ ┘é╪ذ┘ admin','2024-07-25 01:29:18'),(56,'C','┘à┘ê╪╕┘',1,'╪ز┘à ╪ح╪╢╪د┘╪ر ╪د┘┘à┘ê╪╕┘ ╪╣┘à╪د╪▒ ╪▒╪╢┘ê╪د┘ ┘à┘ ┘é╪ذ┘ admin','2024-07-25 01:29:18'),(57,'C','┘à┘ê╪╕┘',1,'╪ز┘à ╪ح╪╢╪د┘╪ر ╪د┘┘à┘ê╪╕┘ ╪ث╪│╪د┘à╪ر ╪╣┘à╪▒ ┘à┘ ┘é╪ذ┘ admin','2024-07-25 01:29:18'),(58,'C','┘à┘ê╪╕┘',1,'╪ز┘à ╪ح╪╢╪د┘╪ر ╪د┘┘à┘ê╪╕┘ ╪╣╪ذ╪» ╪د┘┘┘ç ╪▒┘ê╪د┘ ┘à┘ ┘é╪ذ┘ admin','2024-07-25 01:29:18'),(59,'C','┘à┘ê╪╕┘',1,'╪ز┘à ╪ح╪╢╪د┘╪ر ╪د┘┘à┘ê╪╕┘ ╪▒┘ê╪د┘ ┘à╪ج┘à┘ ┘à┘ ┘é╪ذ┘ admin','2024-07-25 01:29:18'),(60,'C','┘à┘ê╪╕┘',1,'╪ز┘à ╪ح╪╢╪د┘╪ر ╪د┘┘à┘ê╪╕┘ ╪╣┘┘è ┘è┘ê╪┤╪╣ ┘à┘ ┘é╪ذ┘ admin','2024-07-25 01:29:18'),(61,'C','╪»┘ê╪▒╪ر',1,'╪ز┘à ╪د┘╪┤╪د╪ة ╪»┘ê╪▒╪ر ╪ش╪»┘è╪»╪ر ┘à┘ ┘é╪ذ┘ admin ┘┘┘à╪د╪»╪ر 594 ╪د┘â╪│┘','2024-07-27 14:11:40'),(62,'C','╪»┘ê╪▒╪ر',1,'╪ز┘à ╪د┘╪┤╪د╪ة ╪»┘ê╪▒╪ر ╪ش╪»┘è╪»╪ر ┘à┘ ┘é╪ذ┘ admin ┘┘┘à╪د╪»╪ر 594 ╪د┘â╪│┘','2024-07-27 14:12:20'),(63,'C','╪»┘ê╪▒╪ر',1,'╪ز┘à ╪د┘╪┤╪د╪ة ╪»┘ê╪▒╪ر ╪ش╪»┘è╪»╪ر ┘à┘ ┘é╪ذ┘ admin ┘┘┘à╪د╪»╪ر 594 ╪د┘â╪│┘','2024-07-27 14:12:52'),(64,'U','┘à╪د╪»╪ر ┘à╪«╪▓┘',1,'╪ز┘à ╪ز╪ص╪»┘è╪س ┘à╪╣┘┘ê┘à╪د╪ز ┘à╪د╪»╪ر ╪د┘┘à╪«╪▓┘ aperiam ┘à┘ ┘é╪ذ┘ admin','2024-07-27 14:49:00'),(65,'C','╪»┘ê╪▒╪ر',1,'╪ز┘à ╪د┘╪┤╪د╪ة ╪»┘ê╪▒╪ر ╪ش╪»┘è╪»╪ر ┘à┘ ┘é╪ذ┘ admin ┘┘┘à╪د╪»╪ر 080 ╪ز╪ش┘à┘è┘','2024-08-09 23:17:08'),(66,'C','╪»┘ê╪▒╪ر',1,'╪ز┘à ╪د┘╪┤╪د╪ة ╪»┘ê╪▒╪ر ╪ش╪»┘è╪»╪ر ┘à┘ ┘é╪ذ┘ admin ┘┘┘à╪د╪»╪ر 080 ╪ز╪ش┘à┘è┘','2024-08-09 23:18:13'),(67,'C','╪╖╪د┘╪ذ',1,'╪ز┘à ╪ح╪╢╪د┘╪ر ╪د┘╪╖╪د┘╪ذ ╪ث╪ص┘à╪» ┘à┘ ┘é╪ذ┘ admin','2024-08-10 19:34:37');
/*!40000 ALTER TABLE `activities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `additional_sub_accounts`
--

DROP TABLE IF EXISTS `additional_sub_accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `additional_sub_accounts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `additional_sub_accounts`
--

LOCK TABLES `additional_sub_accounts` WRITE;
/*!40000 ALTER TABLE `additional_sub_accounts` DISABLE KEYS */;
/*!40000 ALTER TABLE `additional_sub_accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'╪د┘┘â┘┘è╪▓┘è','2024-07-19 01:37:17','2024-07-19 01:37:17'),(2,'╪ص┘╪د┘é╪ر','2024-07-19 01:37:17','2024-07-19 01:37:17'),(3,'ICDL','2024-07-19 01:37:17','2024-07-19 01:37:17'),(4,'╪ز╪ش┘à┘è┘','2024-07-19 01:37:17','2024-07-19 01:37:17'),(5,'┘╪▒┘╪│┘è','2024-07-19 01:37:17','2024-07-19 01:37:17'),(6,'╪د┘â╪│┘','2024-07-19 01:37:17','2024-07-19 01:37:17');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `certificates`
--

DROP TABLE IF EXISTS `certificates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `certificates` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `certificate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_ar_x` double NOT NULL,
  `name_ar_y` double NOT NULL,
  `name_en_x` double NOT NULL,
  `name_en_y` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `certificates`
--

LOCK TABLES `certificates` WRITE;
/*!40000 ALTER TABLE `certificates` DISABLE KEYS */;
/*!40000 ALTER TABLE `certificates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `courses` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `subject_id` bigint(20) unsigned NOT NULL,
  `schedule_id` bigint(20) unsigned NOT NULL,
  `teacher_id` bigint(20) unsigned NOT NULL,
  `room_id` bigint(20) unsigned NOT NULL,
  `minimum_students` int(11) NOT NULL,
  `start_at` date NOT NULL,
  `end_at` date NOT NULL,
  `salary_type` enum('C','S') COLLATE utf8mb4_unicode_ci NOT NULL,
  `salary_amount` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `certificate_cost` int(11) NOT NULL,
  `status` enum('C','P','O') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `courses_subject_id_foreign` (`subject_id`),
  KEY `courses_schedule_id_foreign` (`schedule_id`),
  KEY `courses_teacher_id_foreign` (`teacher_id`),
  KEY `courses_room_id_foreign` (`room_id`),
  CONSTRAINT `courses_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE,
  CONSTRAINT `courses_schedule_id_foreign` FOREIGN KEY (`schedule_id`) REFERENCES `schedules` (`id`) ON DELETE CASCADE,
  CONSTRAINT `courses_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE,
  CONSTRAINT `courses_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses`
--

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` VALUES (11,1,31,2,2,15,'2024-03-03','2024-04-03','C',100000,50000,1000,'P','2024-07-27 14:12:52','2024-07-27 14:12:52'),(13,2,33,20,2,55,'2024-03-03','2024-07-03','C',3000,3000,500,'O','2023-08-09 23:18:13','2023-08-09 23:18:13');
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `days_of_week`
--

DROP TABLE IF EXISTS `days_of_week`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `days_of_week` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `schedule_id` bigint(20) unsigned NOT NULL,
  `day` enum('0','1','2','3','4','5','6') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `days_of_week_schedule_id_foreign` (`schedule_id`),
  CONSTRAINT `days_of_week_schedule_id_foreign` FOREIGN KEY (`schedule_id`) REFERENCES `schedules` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `days_of_week`
--

LOCK TABLES `days_of_week` WRITE;
/*!40000 ALTER TABLE `days_of_week` DISABLE KEYS */;
INSERT INTO `days_of_week` VALUES (1,1,'4','2024-07-19 01:37:17','2024-07-19 01:37:17'),(2,1,'1','2024-07-19 01:37:17','2024-07-19 01:37:17'),(3,1,'4','2024-07-19 01:37:17','2024-07-19 01:37:17'),(4,1,'3','2024-07-19 01:37:17','2024-07-19 01:37:17'),(5,2,'4','2024-07-19 01:37:17','2024-07-19 01:37:17'),(6,2,'0','2024-07-19 01:37:17','2024-07-19 01:37:17'),(7,2,'0','2024-07-19 01:37:17','2024-07-19 01:37:17'),(8,2,'1','2024-07-19 01:37:17','2024-07-19 01:37:17'),(9,3,'2','2024-07-19 01:37:17','2024-07-19 01:37:17'),(10,3,'3','2024-07-19 01:37:17','2024-07-19 01:37:17'),(11,3,'3','2024-07-19 01:37:17','2024-07-19 01:37:17'),(12,3,'5','2024-07-19 01:37:17','2024-07-19 01:37:17'),(13,4,'0','2024-07-19 01:37:17','2024-07-19 01:37:17'),(14,4,'1','2024-07-19 01:37:17','2024-07-19 01:37:17'),(15,4,'4','2024-07-19 01:37:17','2024-07-19 01:37:17'),(16,4,'6','2024-07-19 01:37:17','2024-07-19 01:37:17'),(17,5,'1','2024-07-19 01:37:17','2024-07-19 01:37:17'),(18,5,'4','2024-07-19 01:37:17','2024-07-19 01:37:17'),(19,5,'5','2024-07-19 01:37:17','2024-07-19 01:37:17'),(20,5,'3','2024-07-19 01:37:17','2024-07-19 01:37:17'),(21,6,'2','2024-07-19 01:37:17','2024-07-19 01:37:17'),(22,6,'5','2024-07-19 01:37:17','2024-07-19 01:37:17'),(23,6,'3','2024-07-19 01:37:17','2024-07-19 01:37:17'),(24,6,'0','2024-07-19 01:37:17','2024-07-19 01:37:17'),(25,7,'6','2024-07-19 01:37:18','2024-07-19 01:37:18'),(26,7,'2','2024-07-19 01:37:18','2024-07-19 01:37:18'),(27,7,'0','2024-07-19 01:37:18','2024-07-19 01:37:18'),(28,7,'1','2024-07-19 01:37:18','2024-07-19 01:37:18'),(29,8,'1','2024-07-19 01:37:18','2024-07-19 01:37:18'),(30,8,'3','2024-07-19 01:37:18','2024-07-19 01:37:18'),(31,8,'6','2024-07-19 01:37:18','2024-07-19 01:37:18'),(32,8,'6','2024-07-19 01:37:18','2024-07-19 01:37:18'),(33,9,'4','2024-07-19 01:37:18','2024-07-19 01:37:18'),(34,9,'1','2024-07-19 01:37:18','2024-07-19 01:37:18'),(35,9,'2','2024-07-19 01:37:18','2024-07-19 01:37:18'),(36,9,'1','2024-07-19 01:37:18','2024-07-19 01:37:18'),(37,10,'3','2024-07-19 01:37:18','2024-07-19 01:37:18'),(38,10,'0','2024-07-19 01:37:18','2024-07-19 01:37:18'),(39,10,'6','2024-07-19 01:37:18','2024-07-19 01:37:18'),(40,10,'0','2024-07-19 01:37:18','2024-07-19 01:37:18'),(41,11,'6','2024-07-19 01:37:18','2024-07-19 01:37:18'),(42,11,'1','2024-07-19 01:37:18','2024-07-19 01:37:18'),(43,11,'2','2024-07-19 01:37:18','2024-07-19 01:37:18'),(44,11,'4','2024-07-19 01:37:18','2024-07-19 01:37:18'),(45,12,'6','2024-07-19 01:37:18','2024-07-19 01:37:18'),(46,12,'1','2024-07-19 01:37:18','2024-07-19 01:37:18'),(47,12,'2','2024-07-19 01:37:18','2024-07-19 01:37:18'),(48,12,'0','2024-07-19 01:37:18','2024-07-19 01:37:18'),(49,13,'2','2024-07-19 01:37:18','2024-07-19 01:37:18'),(50,13,'0','2024-07-19 01:37:18','2024-07-19 01:37:18'),(51,13,'2','2024-07-19 01:37:18','2024-07-19 01:37:18'),(52,13,'4','2024-07-19 01:37:18','2024-07-19 01:37:18'),(53,14,'0','2024-07-19 01:37:18','2024-07-19 01:37:18'),(54,14,'2','2024-07-19 01:37:18','2024-07-19 01:37:18'),(55,14,'2','2024-07-19 01:37:18','2024-07-19 01:37:18'),(56,14,'6','2024-07-19 01:37:18','2024-07-19 01:37:18'),(57,15,'6','2024-07-19 01:37:18','2024-07-19 01:37:18'),(58,15,'1','2024-07-19 01:37:18','2024-07-19 01:37:18'),(59,15,'6','2024-07-19 01:37:18','2024-07-19 01:37:18'),(60,15,'4','2024-07-19 01:37:18','2024-07-19 01:37:18'),(61,16,'6','2024-07-19 01:37:18','2024-07-19 01:37:18'),(62,16,'0','2024-07-19 01:37:18','2024-07-19 01:37:18'),(63,16,'0','2024-07-19 01:37:18','2024-07-19 01:37:18'),(64,16,'2','2024-07-19 01:37:18','2024-07-19 01:37:18'),(65,17,'2','2024-07-19 01:37:18','2024-07-19 01:37:18'),(66,17,'4','2024-07-19 01:37:18','2024-07-19 01:37:18'),(67,17,'1','2024-07-19 01:37:18','2024-07-19 01:37:18'),(68,17,'2','2024-07-19 01:37:18','2024-07-19 01:37:18'),(69,18,'3','2024-07-19 01:37:18','2024-07-19 01:37:18'),(70,18,'6','2024-07-19 01:37:18','2024-07-19 01:37:18'),(71,18,'3','2024-07-19 01:37:18','2024-07-19 01:37:18'),(72,18,'6','2024-07-19 01:37:18','2024-07-19 01:37:18'),(73,19,'1','2024-07-19 01:37:18','2024-07-19 01:37:18'),(74,19,'3','2024-07-19 01:37:18','2024-07-19 01:37:18'),(75,19,'5','2024-07-19 01:37:18','2024-07-19 01:37:18'),(76,19,'1','2024-07-19 01:37:18','2024-07-19 01:37:18'),(77,20,'0','2024-07-19 01:37:18','2024-07-19 01:37:18'),(78,20,'4','2024-07-19 01:37:18','2024-07-19 01:37:18'),(79,20,'2','2024-07-19 01:37:18','2024-07-19 01:37:18'),(80,20,'2','2024-07-19 01:37:18','2024-07-19 01:37:18'),(81,21,'6','2024-07-19 01:37:18','2024-07-19 01:37:18'),(82,21,'1','2024-07-19 01:37:18','2024-07-19 01:37:18'),(83,21,'0','2024-07-19 01:37:18','2024-07-19 01:37:18'),(84,21,'5','2024-07-19 01:37:18','2024-07-19 01:37:18'),(85,22,'0','2024-07-19 01:37:18','2024-07-19 01:37:18'),(86,22,'1','2024-07-19 01:37:18','2024-07-19 01:37:18'),(87,22,'1','2024-07-19 01:37:18','2024-07-19 01:37:18'),(88,22,'5','2024-07-19 01:37:18','2024-07-19 01:37:18'),(89,23,'5','2024-07-19 01:37:18','2024-07-19 01:37:18'),(90,23,'0','2024-07-19 01:37:18','2024-07-19 01:37:18'),(91,23,'5','2024-07-19 01:37:18','2024-07-19 01:37:18'),(92,23,'4','2024-07-19 01:37:18','2024-07-19 01:37:18'),(93,24,'3','2024-07-19 01:37:18','2024-07-19 01:37:18'),(94,24,'4','2024-07-19 01:37:18','2024-07-19 01:37:18'),(95,24,'2','2024-07-19 01:37:18','2024-07-19 01:37:18'),(96,24,'3','2024-07-19 01:37:18','2024-07-19 01:37:18'),(97,25,'6','2024-07-19 01:37:18','2024-07-19 01:37:18'),(98,25,'4','2024-07-19 01:37:18','2024-07-19 01:37:18'),(99,25,'3','2024-07-19 01:37:18','2024-07-19 01:37:18'),(100,25,'6','2024-07-19 01:37:18','2024-07-19 01:37:18'),(101,26,'2','2024-07-19 01:37:18','2024-07-19 01:37:18'),(102,26,'5','2024-07-19 01:37:18','2024-07-19 01:37:18'),(103,26,'4','2024-07-19 01:37:18','2024-07-19 01:37:18'),(104,26,'1','2024-07-19 01:37:18','2024-07-19 01:37:18'),(105,27,'2','2024-07-19 01:37:18','2024-07-19 01:37:18'),(106,27,'0','2024-07-19 01:37:18','2024-07-19 01:37:18'),(107,27,'0','2024-07-19 01:37:18','2024-07-19 01:37:18'),(108,27,'1','2024-07-19 01:37:18','2024-07-19 01:37:18'),(109,28,'5','2024-07-19 01:37:18','2024-07-19 01:37:18'),(110,28,'1','2024-07-19 01:37:18','2024-07-19 01:37:18'),(111,28,'5','2024-07-19 01:37:18','2024-07-19 01:37:18'),(112,28,'3','2024-07-19 01:37:18','2024-07-19 01:37:18'),(113,29,'1','2024-07-27 14:11:40','2024-07-27 14:11:40'),(114,29,'2','2024-07-27 14:11:40','2024-07-27 14:11:40'),(115,29,'3','2024-07-27 14:11:40','2024-07-27 14:11:40'),(116,30,'1','2024-07-27 14:12:20','2024-07-27 14:12:20'),(117,30,'2','2024-07-27 14:12:20','2024-07-27 14:12:20'),(118,30,'3','2024-07-27 14:12:20','2024-07-27 14:12:20'),(119,31,'1','2024-07-27 14:12:52','2024-07-27 14:12:52'),(120,31,'2','2024-07-27 14:12:52','2024-07-27 14:12:52'),(121,31,'3','2024-07-27 14:12:52','2024-07-27 14:12:52'),(122,32,'5','2024-08-09 23:17:08','2024-08-09 23:17:08'),(123,33,'5','2024-08-09 23:18:13','2024-08-09 23:18:13');
/*!40000 ALTER TABLE `days_of_week` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employees` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credentials` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shift_id` bigint(20) unsigned NOT NULL,
  `job_id` bigint(20) unsigned NOT NULL,
  `account_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `employees_shift_id_foreign` (`shift_id`),
  KEY `employees_job_id_foreign` (`job_id`),
  KEY `employees_account_id_foreign` (`account_id`),
  CONSTRAINT `employees_account_id_foreign` FOREIGN KEY (`account_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `employees_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `job_titles` (`id`),
  CONSTRAINT `employees_shift_id_foreign` FOREIGN KEY (`shift_id`) REFERENCES `shifts` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees`
--

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` VALUES (1,'╪▒╪╢┘ê╪د┘ ╪╣┘à╪▒','2023-09-01','6359421738','credentials 1 2 3',1,1,2,'2024-07-19 01:37:18','2024-07-19 01:37:18',NULL),(2,'╪│╪╣┘è╪» ╪ث╪ص┘à╪»','2013-10-06','9867719098','credentials 1 2 3',2,4,3,'2024-07-19 01:37:18','2024-07-19 01:37:18',NULL),(3,'╪│╪╣┘è╪» ╪│╪╣┘è╪»','2019-01-25','2976163405','credentials 1 2 3',3,3,4,'2024-07-19 01:37:18','2024-07-19 01:37:18',NULL),(4,'╪│╪╣┘è╪» ╪╣┘à╪▒','1979-06-09','4849784767','credentials 1 2 3',4,3,NULL,'2024-07-19 01:37:18','2024-07-19 01:37:18',NULL),(5,'╪│╪╣┘è╪» ┘à╪ج┘à┘','1982-02-27','1832377107','credentials 1 2 3',5,1,6,'2024-07-19 01:37:18','2024-07-19 01:37:18',NULL),(6,'╪ث╪│╪د┘à╪ر ┘à╪ص┘à╪»','1983-01-05','8524897200','credentials 1 2 3',6,4,NULL,'2024-07-19 01:37:18','2024-07-19 01:37:18',NULL),(7,'┘à╪ص┘à╪» ╪▒╪╢┘ê╪د┘','2019-09-01','7581814740','credentials 1 2 3',7,4,8,'2024-07-19 01:37:18','2024-07-19 01:37:18',NULL),(8,'┘à╪ج┘à┘ ╪╣┘┘è','1985-05-10','9416749351','credentials 1 2 3',8,3,9,'2024-07-19 01:37:18','2024-07-19 01:37:18',NULL),(9,'╪د╪ص┘à╪» ╪▒╪╢┘ê╪د┘','2007-04-12','4106621703','credentials 1 2 3',9,4,10,'2024-07-19 01:37:18','2024-07-19 01:37:18',NULL),(10,'╪▒┘ê╪د┘ ╪╣┘à╪د╪▒','1989-12-04','5039929914','credentials 1 2 3',10,1,NULL,'2024-07-19 01:37:18','2024-07-19 01:37:18',NULL),(11,'╪╣┘à╪د╪▒ ╪╣┘┘è','2009-10-24','1830835197','credentials 1 2 3',11,1,12,'2024-07-19 01:37:18','2024-07-19 01:37:18',NULL),(12,'┘è┘ê╪┤╪╣ ╪╣╪ذ╪» ╪د┘┘┘ç','1990-10-30','7186729087','credentials 1 2 3',12,4,NULL,'2024-07-19 01:37:18','2024-07-19 01:37:18',NULL),(13,'╪╣╪ذ╪» ╪د┘┘┘ç ┘à╪ص┘à╪»','1979-04-17','1269538743','credentials 1 2 3',13,4,14,'2024-07-19 01:37:18','2024-07-19 01:37:18',NULL),(14,'╪╣╪ذ╪» ╪د┘┘┘ç ╪د╪ص┘à╪»','2006-11-04','3830716250','credentials 1 2 3',14,2,NULL,'2024-07-19 01:37:18','2024-07-19 01:37:18',NULL),(15,'╪╣┘┘è ╪ث╪ص┘à╪»','1970-08-17','2997569501','credentials 1 2 3',15,1,NULL,'2024-07-19 01:37:18','2024-07-19 01:37:18',NULL),(16,'╪╣┘à╪د╪▒ ╪▒╪╢┘ê╪د┘','2024-06-05','5653561745','credentials 1 2 3',16,3,NULL,'2024-07-19 01:37:18','2024-07-19 01:37:18',NULL),(17,'╪ث╪│╪د┘à╪ر ╪╣┘à╪▒','2004-10-10','2781987159','credentials 1 2 3',17,4,NULL,'2024-07-19 01:37:18','2024-07-19 01:37:18',NULL),(18,'╪╣╪ذ╪» ╪د┘┘┘ç ╪▒┘ê╪د┘','1970-10-05','2251431136','credentials 1 2 3',18,4,NULL,'2024-07-19 01:37:18','2024-07-19 01:37:18',NULL),(19,'╪▒┘ê╪د┘ ┘à╪ج┘à┘','2018-07-20','0478377428','credentials 1 2 3',19,2,NULL,'2024-07-19 01:37:18','2024-07-19 01:37:18',NULL),(20,'╪╣┘┘è ┘è┘ê╪┤╪╣','1985-04-17','0041233991','credentials 1 2 3',20,3,21,'2024-07-19 01:37:18','2024-07-19 01:37:18',NULL);
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enrollments`
--

DROP TABLE IF EXISTS `enrollments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enrollments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` bigint(20) unsigned NOT NULL,
  `course_id` bigint(20) unsigned NOT NULL,
  `with_certificate` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `enrollments_student_id_foreign` (`student_id`),
  KEY `enrollments_course_id_foreign` (`course_id`),
  CONSTRAINT `enrollments_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  CONSTRAINT `enrollments_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enrollments`
--

LOCK TABLES `enrollments` WRITE;
/*!40000 ALTER TABLE `enrollments` DISABLE KEYS */;
INSERT INTO `enrollments` VALUES (3,1,11,1,'2024-08-06 01:59:49','2024-08-06 01:59:49');
/*!40000 ALTER TABLE `enrollments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
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
-- Table structure for table `job_titles`
--

DROP TABLE IF EXISTS `job_titles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `job_titles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `base_salary` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_titles`
--

LOCK TABLES `job_titles` WRITE;
/*!40000 ALTER TABLE `job_titles` DISABLE KEYS */;
INSERT INTO `job_titles` VALUES (1,'╪╣╪د┘à┘',15000,'2024-07-19 01:37:18','2024-07-19 01:37:18'),(2,'┘à╪│╪ج┘ê┘ ┘à╪│╪ز┘ê╪»╪╣',2000,'2024-07-19 01:37:18','2024-07-19 01:37:18'),(3,'┘à╪ص╪د╪│╪ذ',2000,'2024-07-19 01:37:18','2024-07-19 01:37:18'),(4,'┘à╪▒╪د┘é╪ذ ╪»┘ê╪د┘à',2000,'2024-07-19 01:37:18','2024-07-19 01:37:18');
/*!40000 ALTER TABLE `job_titles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_100000_create_password_resets_table',1),(2,'2019_08_19_000000_create_failed_jobs_table',1),(3,'2019_12_14_000001_create_personal_access_tokens_table',1),(4,'2024_05_23_223101_create_persons_table',1),(5,'2024_05_23_223602_create_stocks_table',1),(6,'2024_05_23_223826_create_rooms_table',1),(7,'2024_05_23_223827_create_categories_table',1),(8,'2024_05_23_224020_create_subjects_table',1),(9,'2024_05_23_224131_create_teachers_table',1),(10,'2024_05_23_224817_create_users_table',1),(11,'2024_05_23_224818_create_students_table',1),(12,'2024_05_23_225106_create_sub_accounts_table',1),(13,'2024_05_23_230609_create_schedules_table',1),(14,'2024_05_23_230813_create_days_of_week_table',1),(15,'2024_05_23_231551_create_courses_table',1),(16,'2024_05_23_231552_create_permissions_table',1),(17,'2024_05_23_231552_create_transactions_table',1),(18,'2024_05_23_231553_create_roles_table',1),(19,'2024_05_23_231554_create_role_permissions_table',1),(20,'2024_06_05_232457_create_shopping_lists_table',1),(21,'2024_06_16_135337_enrollments',1),(22,'2024_06_16_140116_create_shifts',1),(23,'2024_06_17_041659_create_job_titles',1),(24,'2024_06_17_041660__create_employees_table',1),(25,'2024_06_17_063253_create_shopping_items_table',1),(26,'2024_06_19_000707_create_certificates_table',1),(27,'2024_06_29_145807_create_activities_table',1),(28,'2024_07_13_104149_create_additional_sub_accounts_table',1),(29,'2024_07_13_121525_main_accounts',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
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
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'╪ح╪»╪د╪▒╪ر ╪د┘╪╖┘╪د╪ذ','2024-07-19 01:37:14','2024-07-19 01:37:14'),(2,'╪ح╪»╪د╪▒╪ر ╪د┘┘à╪│╪ز┘ê╪»╪╣','2024-07-19 01:37:14','2024-07-19 01:37:14'),(3,'╪ح╪»╪د╪▒╪ر ╪د┘╪ص╪│╪د╪ذ╪د╪ز','2024-07-19 01:37:14','2024-07-19 01:37:14'),(4,'╪ح╪»╪د╪▒╪ر ╪د┘┘à╪ص╪د╪│╪ذ╪ر','2024-07-19 01:37:14','2024-07-19 01:37:14'),(5,'╪ح╪»╪د╪▒╪ر ╪د┘╪ث╪│╪د╪ز╪░╪ر','2024-07-19 01:37:14','2024-07-19 01:37:14'),(6,'╪ح╪»╪د╪▒╪ر ╪د┘╪»┘ê╪▒╪د╪ز','2024-07-19 01:37:14','2024-07-19 01:37:14'),(7,'╪ح╪»╪د╪▒╪ر ╪د┘┘à┘ê╪╕┘┘è┘','2024-07-19 01:37:14','2024-07-19 01:37:14'),(8,'╪ح╪»╪د╪▒╪ر ╪د┘╪┤┘ç╪د╪»╪د╪ز','2024-07-19 01:37:14','2024-07-19 01:37:14'),(9,'╪ح╪»╪د╪▒╪ر ╪د┘╪╡┘╪»┘ê┘é','2024-07-19 01:37:14','2024-07-19 01:37:14'),(10,'╪ز╪╡╪»┘è╪▒ ┘ê╪د╪│╪ز┘è╪▒╪د╪ز ┘à┘┘╪د╪ز ╪ح┘â╪│┘','2024-07-19 04:52:31','2024-07-19 04:52:31');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
INSERT INTO `personal_access_tokens` VALUES (1,'App\\Models\\User',1,'admin','4c941874643ff08513c2224ac7e9ee798e243565de11376e292947bb77b791bb','[\"*\"]','2024-08-06 01:56:29',NULL,'2024-07-19 02:07:01','2024-08-06 01:56:29'),(2,'App\\Models\\User',1,'admin','bd514eec1a36827f516b289b61cc0a0cba5e0d6f93312e76e0d41d7abbfb6ada','[\"*\"]','2024-07-25 01:29:17',NULL,'2024-07-25 01:28:08','2024-07-25 01:29:17'),(3,'App\\Models\\User',1,'admin','23b5138101364ff821eb244c64b15fb4bf68a32ff53aa41f62d1e5a7e59592e3','[\"*\"]',NULL,NULL,'2024-07-26 22:18:06','2024-07-26 22:18:06'),(4,'App\\Models\\User',1,'admin','10dc8bb103ad4ead094c9a31dfee3796da17e3597974a8b3ba0cdc7d1fce5d08','[\"*\"]','2024-08-15 19:57:54',NULL,'2024-07-27 15:15:46','2024-08-15 19:57:54');
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `persons`
--

DROP TABLE IF EXISTS `persons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `persons` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('T','E','S') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `persons`
--

LOCK TABLES `persons` WRITE;
/*!40000 ALTER TABLE `persons` DISABLE KEYS */;
INSERT INTO `persons` VALUES (1,'╪ث╪ص┘à╪»','1990-06-02','0988745545','S','2024-07-19 01:37:14','2024-07-19 01:37:14',NULL);
/*!40000 ALTER TABLE `persons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_permissions`
--

DROP TABLE IF EXISTS `role_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint(20) unsigned NOT NULL,
  `permission_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_permissions_role_id_foreign` (`role_id`),
  KEY `role_permissions_permission_id_foreign` (`permission_id`),
  CONSTRAINT `role_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_permissions`
--

LOCK TABLES `role_permissions` WRITE;
/*!40000 ALTER TABLE `role_permissions` DISABLE KEYS */;
INSERT INTO `role_permissions` VALUES (1,1,1,NULL,NULL),(2,1,2,NULL,NULL),(3,1,3,NULL,NULL),(4,1,4,NULL,NULL),(5,1,5,NULL,NULL),(6,1,6,NULL,NULL),(7,1,7,NULL,NULL),(8,1,8,NULL,NULL),(9,1,9,NULL,NULL);
/*!40000 ALTER TABLE `role_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'┘à╪»┘è╪▒','2024-07-19 01:37:14','2024-07-19 01:37:14'),(2,'╪╢┘è┘','2024-07-19 01:37:14','2024-07-19 01:37:14');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rooms` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rooms`
--

LOCK TABLES `rooms` WRITE;
/*!40000 ALTER TABLE `rooms` DISABLE KEYS */;
INSERT INTO `rooms` VALUES (1,'╪║╪▒┘╪ر65','2024-07-19 01:37:17','2024-07-19 01:37:17'),(2,'╪║╪▒┘╪ر15','2024-07-19 01:37:17','2024-07-19 01:37:17'),(3,'╪║╪▒┘╪ر28','2024-07-19 01:37:17','2024-07-19 01:37:17'),(4,'╪║╪▒┘╪ر50','2024-07-19 01:37:17','2024-07-19 01:37:17'),(5,'╪║╪▒┘╪ر09','2024-07-19 01:37:17','2024-07-19 01:37:17'),(6,'╪║╪▒┘╪ر19','2024-07-19 01:37:17','2024-07-19 01:37:17'),(7,'╪║╪▒┘╪ر76','2024-07-19 01:37:17','2024-07-19 01:37:17'),(8,'╪║╪▒┘╪ر36','2024-07-19 01:37:17','2024-07-19 01:37:17'),(9,'╪║╪▒┘╪ر69','2024-07-19 01:37:17','2024-07-19 01:37:17'),(10,'╪║╪▒┘╪ر04','2024-07-19 01:37:17','2024-07-19 01:37:17');
/*!40000 ALTER TABLE `rooms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schedules`
--

DROP TABLE IF EXISTS `schedules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schedules` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schedules`
--

LOCK TABLES `schedules` WRITE;
/*!40000 ALTER TABLE `schedules` DISABLE KEYS */;
INSERT INTO `schedules` VALUES (1,'21:19:00','23:19:00','2024-07-19 01:37:17','2024-07-19 01:37:17'),(2,'14:03:00','16:03:00','2024-07-19 01:37:17','2024-07-19 01:37:17'),(3,'04:43:00','06:43:00','2024-07-19 01:37:17','2024-07-19 01:37:17'),(4,'18:34:00','20:34:00','2024-07-19 01:37:17','2024-07-19 01:37:17'),(5,'04:15:00','06:15:00','2024-07-19 01:37:17','2024-07-19 01:37:17'),(6,'10:24:00','12:24:00','2024-07-19 01:37:17','2024-07-19 01:37:17'),(7,'05:02:00','07:02:00','2024-07-19 01:37:18','2024-07-19 01:37:18'),(8,'15:26:00','17:26:00','2024-07-19 01:37:18','2024-07-19 01:37:18'),(9,'00:11:00','02:11:00','2024-07-19 01:37:18','2024-07-19 01:37:18'),(10,'08:27:00','10:27:00','2024-07-19 01:37:18','2024-07-19 01:37:18'),(11,'03:00:00','05:00:00','2024-07-19 01:37:18','2024-07-19 01:37:18'),(12,'15:18:00','17:18:00','2024-07-19 01:37:18','2024-07-19 01:37:18'),(13,'09:51:00','11:51:00','2024-07-19 01:37:18','2024-07-19 01:37:18'),(14,'11:05:00','13:05:00','2024-07-19 01:37:18','2024-07-19 01:37:18'),(15,'22:30:00','00:30:00','2024-07-19 01:37:18','2024-07-19 01:37:18'),(16,'07:41:00','09:41:00','2024-07-19 01:37:18','2024-07-19 01:37:18'),(17,'03:35:00','05:35:00','2024-07-19 01:37:18','2024-07-19 01:37:18'),(18,'09:52:00','11:52:00','2024-07-19 01:37:18','2024-07-19 01:37:18'),(19,'11:34:00','13:34:00','2024-07-19 01:37:18','2024-07-19 01:37:18'),(20,'12:22:00','14:22:00','2024-07-19 01:37:18','2024-07-19 01:37:18'),(21,'11:12:00','13:12:00','2024-07-19 01:37:18','2024-07-19 01:37:18'),(22,'21:17:00','23:17:00','2024-07-19 01:37:18','2024-07-19 01:37:18'),(23,'03:18:00','05:18:00','2024-07-19 01:37:18','2024-07-19 01:37:18'),(24,'14:32:00','16:32:00','2024-07-19 01:37:18','2024-07-19 01:37:18'),(25,'15:11:00','17:11:00','2024-07-19 01:37:18','2024-07-19 01:37:18'),(26,'15:30:00','17:30:00','2024-07-19 01:37:18','2024-07-19 01:37:18'),(27,'02:53:00','04:53:00','2024-07-19 01:37:18','2024-07-19 01:37:18'),(28,'11:12:00','13:12:00','2024-07-19 01:37:18','2024-07-19 01:37:18'),(29,'10:00:00','11:00:00','2024-07-27 14:11:40','2024-07-27 14:11:40'),(30,'10:00:00','11:00:00','2024-07-27 14:12:20','2024-07-27 14:12:20'),(31,'10:00:00','11:00:00','2024-07-27 14:12:52','2024-07-27 14:12:52'),(32,'10:00:00','11:00:00','2024-08-09 23:17:08','2024-08-09 23:17:08'),(33,'10:00:00','11:00:00','2024-08-09 23:18:13','2024-08-09 23:18:13');
/*!40000 ALTER TABLE `schedules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shifts`
--

DROP TABLE IF EXISTS `shifts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shifts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `schedule_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `shifts_schedule_id_foreign` (`schedule_id`),
  CONSTRAINT `shifts_schedule_id_foreign` FOREIGN KEY (`schedule_id`) REFERENCES `schedules` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shifts`
--

LOCK TABLES `shifts` WRITE;
/*!40000 ALTER TABLE `shifts` DISABLE KEYS */;
INSERT INTO `shifts` VALUES (1,'╪╡╪ذ╪د╪ص┘è',9,'2024-07-19 01:37:18','2024-07-19 01:37:18'),(2,'┘à╪│╪د╪خ┘è',10,'2024-07-19 01:37:18','2024-07-19 01:37:18'),(3,'╪╡╪ذ╪د╪ص┘è',11,'2024-07-19 01:37:18','2024-07-19 01:37:18'),(4,'┘à╪│╪د╪خ┘è',12,'2024-07-19 01:37:18','2024-07-19 01:37:18'),(5,'╪╡╪ذ╪د╪ص┘è',13,'2024-07-19 01:37:18','2024-07-19 01:37:18'),(6,'╪╡╪ذ╪د╪ص┘è',14,'2024-07-19 01:37:18','2024-07-19 01:37:18'),(7,'╪╡╪ذ╪د╪ص┘è',15,'2024-07-19 01:37:18','2024-07-19 01:37:18'),(8,'╪╡╪ذ╪د╪ص┘è',16,'2024-07-19 01:37:18','2024-07-19 01:37:18'),(9,'╪╡╪ذ╪د╪ص┘è',17,'2024-07-19 01:37:18','2024-07-19 01:37:18'),(10,'┘à╪│╪د╪خ┘è',18,'2024-07-19 01:37:18','2024-07-19 01:37:18'),(11,'┘à╪│╪د╪خ┘è',19,'2024-07-19 01:37:18','2024-07-19 01:37:18'),(12,'┘à╪│╪د╪خ┘è',20,'2024-07-19 01:37:18','2024-07-19 01:37:18'),(13,'┘à╪│╪د╪خ┘è',21,'2024-07-19 01:37:18','2024-07-19 01:37:18'),(14,'╪╡╪ذ╪د╪ص┘è',22,'2024-07-19 01:37:18','2024-07-19 01:37:18'),(15,'┘à╪│╪د╪خ┘è',23,'2024-07-19 01:37:18','2024-07-19 01:37:18'),(16,'╪╡╪ذ╪د╪ص┘è',24,'2024-07-19 01:37:18','2024-07-19 01:37:18'),(17,'┘à╪│╪د╪خ┘è',25,'2024-07-19 01:37:18','2024-07-19 01:37:18'),(18,'┘à╪│╪د╪خ┘è',26,'2024-07-19 01:37:18','2024-07-19 01:37:18'),(19,'╪╡╪ذ╪د╪ص┘è',27,'2024-07-19 01:37:18','2024-07-19 01:37:18'),(20,'┘à╪│╪د╪خ┘è',28,'2024-07-19 01:37:18','2024-07-19 01:37:18');
/*!40000 ALTER TABLE `shifts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shopping_items`
--

DROP TABLE IF EXISTS `shopping_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shopping_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `course_id` int(11) DEFAULT NULL,
  `amount` int(10) unsigned NOT NULL,
  `item_id` bigint(20) unsigned NOT NULL,
  `per_student` tinyint(1) NOT NULL DEFAULT 0,
  `bought` int(11) NOT NULL DEFAULT 0,
  `list_name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_bought` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `shopping_items_item_id_foreign` (`item_id`),
  CONSTRAINT `shopping_items_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `stocks` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopping_items`
--

LOCK TABLES `shopping_items` WRITE;
/*!40000 ALTER TABLE `shopping_items` DISABLE KEYS */;
INSERT INTO `shopping_items` VALUES (1,11,10,1,0,0,NULL,0,'2024-07-27 14:12:52','2024-07-27 14:12:52'),(2,11,5,2,1,5,NULL,0,'2024-07-27 14:12:52','2024-08-06 01:59:50'),(4,13,10,1,1,0,NULL,0,'2024-08-09 23:18:13','2024-08-09 23:18:13'),(5,13,20,2,0,0,NULL,0,'2024-08-09 23:18:13','2024-08-09 23:18:13');
/*!40000 ALTER TABLE `shopping_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock_details`
--

DROP TABLE IF EXISTS `stock_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stock_details` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `course_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `stock_details_course_id_foreign` (`course_id`),
  CONSTRAINT `stock_details_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock_details`
--

LOCK TABLES `stock_details` WRITE;
/*!40000 ALTER TABLE `stock_details` DISABLE KEYS */;
/*!40000 ALTER TABLE `stock_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stocks`
--

DROP TABLE IF EXISTS `stocks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stocks` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(10) unsigned NOT NULL,
  `source` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stocks`
--

LOCK TABLES `stocks` WRITE;
/*!40000 ALTER TABLE `stocks` DISABLE KEYS */;
INSERT INTO `stocks` VALUES (1,'aperiam',930,'Tempora at ea et aut. Ipsam impedit voluptas natus fugit voluptatem. Modi ullam et hic delectus. Aut dolorem laudantium est quia vel asperiores culpa.','2024-07-19 01:37:18','2024-07-27 14:49:00'),(2,'molestias',281,'Iste exercitationem amet officiis incidunt voluptatem velit quia. Voluptatem ipsum dicta et nam deserunt voluptatum dolor.','2024-07-19 01:37:18','2024-07-19 01:37:18'),(3,'rerum',624,'Aut ut est perspiciatis quia blanditiis. Quod ea reiciendis earum qui rerum consequatur molestias. Dolor corporis ea aut ea.','2024-07-19 01:37:18','2024-07-19 01:37:18'),(4,'voluptatum',857,'Et officia est et molestiae. Enim unde earum vel. Suscipit omnis et et. Recusandae sint quia nemo.','2024-07-19 01:37:18','2024-07-19 01:37:18'),(5,'provident',589,'Aut et natus consectetur quaerat eum delectus eum consequatur. Nostrum aut incidunt dolorem minus at. Est quia sunt possimus alias.','2024-07-19 01:37:18','2024-07-19 01:37:18'),(6,'et',648,'Enim possimus earum quisquam voluptatem dicta nihil error. Ratione reiciendis ut debitis vero ea totam. Deserunt quia sequi assumenda. Rerum incidunt minus tempora consequatur.','2024-07-19 01:37:18','2024-07-19 01:37:18'),(7,'eligendi',318,'Voluptate voluptatem laudantium aut quo. Soluta iure fuga aspernatur maxime dignissimos et nihil. Asperiores dolores fuga eum illum tenetur non. Repellat aut fugiat aut quam.','2024-07-19 01:37:18','2024-07-19 01:37:18'),(8,'ipsa',505,'Est earum quod ut vitae omnis minus est quisquam. Magnam tempore eligendi a sed perspiciatis aut.','2024-07-19 01:37:18','2024-07-19 01:37:18'),(9,'explicabo',49,'Fuga et eaque optio debitis sit quo. Iusto beatae molestiae quis aut culpa voluptatem provident. Alias modi qui non. Cum repellendus rerum est enim.','2024-07-19 01:37:18','2024-07-19 01:37:18'),(10,'error',546,'Nemo quisquam asperiores explicabo. Officiis beatae et a saepe officiis porro odit. Dolorem animi esse eveniet nemo accusantium sed modi.','2024-07-19 01:37:18','2024-07-19 01:37:18'),(11,'est',815,'Dolore eos qui dolorum voluptatem corporis quae. Non dolore incidunt nihil veritatis mollitia. Enim distinctio ut vero dolor molestiae. Ipsum quo est nemo voluptatem doloremque fuga.','2024-07-19 01:37:18','2024-07-19 01:37:18'),(12,'quasi',929,'Delectus sed eveniet voluptas repellendus officiis corporis ut. Asperiores eius sit quod illo. Commodi dolorum tenetur animi. Vero labore aperiam ut quae tenetur sint perferendis.','2024-07-19 01:37:18','2024-07-19 01:37:18'),(13,'ut',935,'Dignissimos id pariatur repellat tempore consequatur temporibus vitae. Sit deserunt dolor voluptas consequuntur earum. Aut ut id neque ea molestiae.','2024-07-19 01:37:18','2024-07-19 01:37:18'),(14,'nisi',711,'Sint cupiditate est fuga et minima. Cumque minima aut eaque repudiandae nisi consequatur. Non in animi est eos. Debitis aliquam est delectus blanditiis ducimus.','2024-07-19 01:37:18','2024-07-19 01:37:18'),(15,'quidem',473,'Sed temporibus voluptate repellat velit. Et dolore sit ea voluptatum autem voluptatem quam.','2024-07-19 01:37:18','2024-07-19 01:37:18'),(16,'saepe',206,'Et dignissimos aut eum quod. Impedit error minima corporis quia dolorem earum labore. Et quae dolores autem saepe eaque sed ut. Amet qui repudiandae quos assumenda qui quia ut.','2024-07-19 01:37:18','2024-07-19 01:37:18'),(17,'quos',415,'Delectus nesciunt aperiam non unde harum debitis. Ab atque et accusamus. Ut dolor laborum eum voluptates et autem veniam.','2024-07-19 01:37:18','2024-07-19 01:37:18'),(18,'voluptate',890,'Voluptatem ad et nisi quos dolores. Aut praesentium consequatur perspiciatis tempora quidem quae. Ipsam accusamus magni incidunt libero.','2024-07-19 01:37:18','2024-07-19 01:37:18'),(19,'architecto',615,'Et deleniti sed et. Placeat beatae earum ea eos mollitia.','2024-07-19 01:37:18','2024-07-19 01:37:18'),(20,'magni',49,'Eum officia vel voluptatem non quod reiciendis rerum. Facilis est aut quia unde commodi at.','2024-07-19 01:37:18','2024-07-19 01:37:18');
/*!40000 ALTER TABLE `stocks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `students` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('M','F') COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_name_en` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `line_phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `national_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nationality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `education_level` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (1,'╪▒┘ê╪د┘ ╪╣┘à╪▒','2020-01-06','9067797861','╪╣╪ذ╪» ╪د┘┘┘ç ╪╣┘à╪د╪▒','┘ê┘╪د╪ة ┘è┘ê╪┤╪╣','M','Ulises','Marley','Retta','0111103846','6952499644524','syrian','╪س╪د┘┘ê┘è╪ر ┘à┘ç┘┘è╪ر','2024-07-19 01:37:17','2024-07-19 01:37:17',NULL),(2,'┘à╪ج┘à┘ ╪▒╪╢┘ê╪د┘','1976-05-13','6300314455','╪ث╪ص┘à╪» ╪╣┘┘è','╪╣╪د╪خ╪┤╪ر ╪╣┘à╪د╪▒','M','Adrian','Brady','Providenci','0111458490','1252133594361','syrian','╪س╪د┘┘ê┘è╪ر ╪╣╪د┘à╪ر','2024-07-19 01:37:17','2024-07-19 01:37:17',NULL),(3,'╪╣┘┘è ╪│╪╣┘è╪»','2014-04-25','9573535183','┘à╪ص┘à╪» ╪╣┘┘è','╪╣╪د╪خ╪┤╪ر ╪ث╪│╪د┘à╪ر','F','Llewellyn','Lorenz','Alta','0113622879','1450115882747','syrian','╪س╪د┘┘ê┘è╪ر ┘à┘ç┘┘è╪ر','2024-07-19 01:37:17','2024-07-19 01:37:17',NULL),(4,'╪▒┘ê╪د┘ ┘à╪ص┘à╪»','1974-01-29','7655694156','╪╣┘┘è ┘è┘ê╪┤╪╣','┘à┘┘ë ╪╣┘┘è','F','Curtis','Xavier','Jazmin','0117962214','4897886019683','syrian','╪د╪╣╪»╪د╪»┘è','2024-07-19 01:37:17','2024-07-19 01:37:17',NULL),(5,'╪د╪ص┘à╪» ╪د╪ص┘à╪»','2007-10-02','3640855956','╪د╪ص┘à╪» ╪╣┘à╪▒','┘à┘┘ë ┘è┘ê╪┤╪╣','M','Miles','Talon','Rachael','0118861598','3453066314515','syrian','╪س╪د┘┘ê┘è╪ر ╪╣╪د┘à╪ر','2024-07-19 01:37:17','2024-07-19 01:37:17',NULL),(6,'╪ث╪ص┘à╪» ╪د╪ص┘à╪»','1972-03-27','8120482990','╪╣┘à╪▒ ╪ث╪ص┘à╪»','╪س┘╪د╪ة ╪╣┘à╪د╪▒','M','Curtis','Ned','Luz','0114846923','1062519840660','syrian','╪س╪د┘┘ê┘è╪ر ┘à┘ç┘┘è╪ر','2024-07-19 01:37:17','2024-07-19 01:37:17',NULL),(7,'╪╣┘à╪▒ ┘à╪ج┘à┘','2016-11-22','4777581887','╪╣┘à╪د╪▒ ╪╣┘à╪▒','╪س┘╪د╪ة ┘à╪ص┘à╪»','F','Ransom','Lindsey','Renee','0114761949','8406218998465','syrian','╪س╪د┘┘ê┘è╪ر ╪╣╪د┘à╪ر','2024-07-19 01:37:17','2024-07-19 01:37:17',NULL),(8,'╪╣┘à╪د╪▒ ╪╣╪ذ╪» ╪د┘┘┘ç','1985-01-14','5287167633','┘à╪ج┘à┘ ╪╣╪ذ╪» ╪د┘┘┘ç','╪│╪د╪▒╪ر ╪╣┘à╪▒','M','Norris','Jamar','Jacklyn','0118513047','7683193914538','syrian','╪س╪د┘┘ê┘è╪ر ╪د╪»╪ذ┘è','2024-07-19 01:37:17','2024-07-19 01:37:17',NULL),(9,'╪╣╪ذ╪» ╪د┘┘┘ç ┘à╪ص┘à╪»','1982-06-30','1505115712','┘à╪ص┘à╪» ┘è┘ê╪┤╪╣','╪╣╪د╪خ╪┤╪ر ╪│╪╣┘è╪»','M','Vladimir','Eugene','Kathryn','0115629615','1035858663042','syrian','╪س╪د┘┘ê┘è╪ر ╪╣╪د┘à╪ر','2024-07-19 01:37:17','2024-07-19 01:37:17',NULL),(10,'╪▒┘ê╪د┘ ╪╣╪ذ╪» ╪د┘┘┘ç','2024-05-17','9223041439','╪╣╪ذ╪» ╪د┘┘┘ç ╪╣┘à╪▒','╪«╪»┘è╪ش╪ر ╪ث╪ص┘à╪»','F','Gianni','Timothy','Justina','0112478717','3042048851109','syrian','╪س╪د┘┘ê┘è╪ر ╪╣╪د┘à╪ر','2024-07-19 01:37:17','2024-07-19 01:37:17',NULL),(11,'╪╣╪ذ╪» ╪د┘┘┘ç ╪╣┘┘è','1985-02-09','4180540750','┘à╪ص┘à╪» ╪╣┘à╪د╪▒','╪╡┘┘è╪ر ╪د╪ص┘à╪»','M','Wilbert','Frederick','Marcella','0110928341','5100215447193','syrian','╪س╪د┘┘ê┘è╪ر ╪╣╪د┘à╪ر','2024-07-19 01:37:17','2024-07-19 01:37:17',NULL),(12,'╪ث╪│╪د┘à╪ر ╪╣┘┘è','1997-05-15','5528815726','╪╣┘à╪▒ ╪ث╪ص┘à╪»','╪«╪»┘è╪ش╪ر ╪╣┘à╪▒','M','Rickie','Cristina','Ashleigh','0115220483','3597402473515','syrian','╪س╪د┘┘ê┘è╪ر ╪╣╪د┘à╪ر','2024-07-19 01:37:17','2024-07-19 01:37:17',NULL),(13,'┘à╪ص┘à╪» ╪╣┘┘è','1982-05-27','1659643037','┘è┘ê╪┤╪╣ ┘è┘ê╪┤╪╣','┘à┘┘ë ╪│╪╣┘è╪»','F','Skye','Imani','Yadira','0119796041','2268027442708','syrian','╪س╪د┘┘ê┘è╪ر ╪╣╪د┘à╪ر','2024-07-19 01:37:17','2024-07-19 01:37:17',NULL),(14,'┘è┘ê╪┤╪╣ ╪│╪╣┘è╪»','1974-07-06','4722743505','╪╣┘à╪▒ ╪د╪ص┘à╪»','╪╡┘┘è╪ر ┘à╪ص┘à╪»','M','Rowan','Wilfred','Katlynn','0110334896','5348160105667','syrian','╪س╪د┘┘ê┘è╪ر ┘à┘ç┘┘è╪ر','2024-07-19 01:37:17','2024-07-19 01:37:17',NULL),(15,'╪╣┘à╪▒ ╪╣┘┘è','2001-05-03','6175000729','╪│╪╣┘è╪» ╪ث╪ص┘à╪»','╪╡┘┘è╪ر ╪▒╪╢┘ê╪د┘','F','Kameron','Dereck','Veronica','0115832615','0823626341479','syrian','╪س╪د┘┘ê┘è╪ر ╪╣╪د┘à╪ر','2024-07-19 01:37:17','2024-07-19 01:37:17',NULL),(16,'╪╣┘à╪د╪▒ ┘à╪ج┘à┘','1976-08-21','8223135799','╪╣┘┘è ╪ث╪ص┘à╪»','┘à╪▒┘è┘à ╪▒┘ê╪د┘','F','Dock','Jake','Sabina','0110524790','5239018089119','syrian','╪س╪د┘┘ê┘è╪ر ╪╣╪د┘à╪ر','2024-07-19 01:37:17','2024-07-19 01:37:17',NULL),(17,'╪│╪╣┘è╪» ╪ث╪│╪د┘à╪ر','1973-06-21','8075784301','╪╣╪ذ╪» ╪د┘┘┘ç ┘è┘ê╪┤╪╣','╪│╪د╪▒╪ر ╪╣╪ذ╪» ╪د┘┘┘ç','F','Erwin','Dewayne','Annabel','0110471737','4153557148165','syrian','╪س╪د┘┘ê┘è╪ر ╪╣╪د┘à╪ر','2024-07-19 01:37:17','2024-07-19 01:37:17',NULL),(18,'╪╣╪ذ╪» ╪د┘┘┘ç ╪▒╪╢┘ê╪د┘','1998-07-08','5892524093','╪▒╪╢┘ê╪د┘ ╪ث╪│╪د┘à╪ر','╪╡┘┘è╪ر ┘è┘ê╪┤╪╣','F','Alford','Johan','Kayla','0113012713','4447993824982','syrian','╪س╪د┘┘ê┘è╪ر ╪╣╪د┘à╪ر','2024-07-19 01:37:17','2024-07-19 01:37:17',NULL),(19,'╪│╪╣┘è╪» ╪ث╪ص┘à╪»','2018-01-11','9922662004','┘à╪ص┘à╪» ╪د╪ص┘à╪»','╪«╪»┘è╪ش╪ر ╪▒╪╢┘ê╪د┘','M','Jarrod','Seth','Liliana','0114728121','9319019939681','syrian','╪س╪د┘┘ê┘è╪ر ╪د╪»╪ذ┘è','2024-07-19 01:37:17','2024-07-19 01:37:17',NULL),(20,'┘à╪ص┘à╪» ╪▒╪╢┘ê╪د┘','1982-04-16','3828448939','╪│╪╣┘è╪» ╪╣┘à╪▒','╪╡┘┘è╪ر ┘è┘ê╪┤╪╣','F','Jaleel','Randi','Adelia','0111424281','8798865062584','syrian','╪س╪د┘┘ê┘è╪ر ┘à┘ç┘┘è╪ر','2024-07-19 01:37:17','2024-07-19 01:37:17',NULL),(21,'╪ث╪ص┘à╪»','2024-01-01','09887755452','╪▓┘è╪د╪»','┘à╪ص┘à╪» ╪ث╪ص┘à╪»','M','ahmad','Ziad','Rna Ahmad','011645284521','54542584156','Syrian','Bacaloria','2024-08-10 19:34:37','2024-08-10 19:34:37',NULL);
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sub_accounts`
--

DROP TABLE IF EXISTS `sub_accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sub_accounts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `main_account` enum('╪د┘┘à╪╡╪د╪▒┘è┘','╪د┘╪ح┘è╪▒╪د╪»╪د╪ز','╪د┘╪╖┘╪د╪ذ','╪د┘╪ث╪│╪د╪ز╪░╪ر','╪د┘╪╡┘╪»┘ê┘é','╪▒╪ث╪│ ╪د┘┘à╪د┘','╪د┘┘à┘ê╪╕┘┘è┘') COLLATE utf8mb4_unicode_ci NOT NULL,
  `accountable_id` bigint(20) unsigned DEFAULT NULL,
  `accountable_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sub_accounts`
--

LOCK TABLES `sub_accounts` WRITE;
/*!40000 ALTER TABLE `sub_accounts` DISABLE KEYS */;
INSERT INTO `sub_accounts` VALUES (1,'╪د┘╪ث╪│╪د╪ز╪░╪ر',1,'App\\Models\\Teacher','2024-08-19 01:37:17','2024-07-19 01:37:17'),(2,'╪د┘╪ث╪│╪د╪ز╪░╪ر',2,'App\\Models\\Teacher','2024-07-19 01:37:17','2024-07-19 01:37:17'),(3,'╪د┘╪ث╪│╪د╪ز╪░╪ر',3,'App\\Models\\Teacher','2024-07-19 01:37:17','2024-07-19 01:37:17'),(4,'╪د┘╪ث╪│╪د╪ز╪░╪ر',4,'App\\Models\\Teacher','2024-07-19 01:37:17','2024-07-19 01:37:17'),(5,'╪د┘╪ث╪│╪د╪ز╪░╪ر',5,'App\\Models\\Teacher','2024-07-19 01:37:17','2024-07-19 01:37:17'),(6,'╪د┘╪ث╪│╪د╪ز╪░╪ر',6,'App\\Models\\Teacher','2024-07-19 01:37:17','2024-07-19 01:37:17'),(7,'╪د┘╪ث╪│╪د╪ز╪░╪ر',7,'App\\Models\\Teacher','2024-07-19 01:37:17','2024-07-19 01:37:17'),(8,'╪د┘╪ث╪│╪د╪ز╪░╪ر',8,'App\\Models\\Teacher','2024-07-19 01:37:17','2024-07-19 01:37:17'),(9,'╪د┘╪ث╪│╪د╪ز╪░╪ر',9,'App\\Models\\Teacher','2024-07-19 01:37:17','2024-07-19 01:37:17'),(10,'╪د┘╪ث╪│╪د╪ز╪░╪ر',10,'App\\Models\\Teacher','2024-07-19 01:37:17','2024-07-19 01:37:17'),(11,'╪د┘╪ث╪│╪د╪ز╪░╪ر',11,'App\\Models\\Teacher','2024-07-19 01:37:17','2024-07-19 01:37:17'),(12,'╪د┘╪ث╪│╪د╪ز╪░╪ر',12,'App\\Models\\Teacher','2024-07-19 01:37:17','2024-07-19 01:37:17'),(13,'╪د┘╪ث╪│╪د╪ز╪░╪ر',13,'App\\Models\\Teacher','2024-07-19 01:37:17','2024-07-19 01:37:17'),(14,'╪د┘╪ث╪│╪د╪ز╪░╪ر',14,'App\\Models\\Teacher','2024-07-19 01:37:17','2024-07-19 01:37:17'),(15,'╪د┘╪ث╪│╪د╪ز╪░╪ر',15,'App\\Models\\Teacher','2024-07-19 01:37:17','2024-07-19 01:37:17'),(16,'╪د┘╪ث╪│╪د╪ز╪░╪ر',16,'App\\Models\\Teacher','2024-07-19 01:37:17','2024-07-19 01:37:17'),(17,'╪د┘╪ث╪│╪د╪ز╪░╪ر',17,'App\\Models\\Teacher','2024-07-19 01:37:17','2024-07-19 01:37:17'),(18,'╪د┘╪ث╪│╪د╪ز╪░╪ر',18,'App\\Models\\Teacher','2024-07-19 01:37:17','2024-07-19 01:37:17'),(19,'╪د┘╪ث╪│╪د╪ز╪░╪ر',19,'App\\Models\\Teacher','2024-07-19 01:37:17','2024-07-19 01:37:17'),(20,'╪د┘╪ث╪│╪د╪ز╪░╪ر',20,'App\\Models\\Teacher','2024-07-19 01:37:17','2024-07-19 01:37:17'),(21,'╪د┘╪╖┘╪د╪ذ',1,'App\\Models\\Student','2024-07-19 01:37:17','2024-07-19 01:37:17'),(22,'╪د┘╪╖┘╪د╪ذ',2,'App\\Models\\Student','2024-07-19 01:37:17','2024-07-19 01:37:17'),(23,'╪د┘╪╖┘╪د╪ذ',3,'App\\Models\\Student','2024-07-19 01:37:17','2024-07-19 01:37:17'),(24,'╪د┘╪╖┘╪د╪ذ',4,'App\\Models\\Student','2024-07-19 01:37:17','2024-07-19 01:37:17'),(25,'╪د┘╪╖┘╪د╪ذ',5,'App\\Models\\Student','2024-07-19 01:37:17','2024-07-19 01:37:17'),(26,'╪د┘╪╖┘╪د╪ذ',6,'App\\Models\\Student','2024-07-19 01:37:17','2024-07-19 01:37:17'),(27,'╪د┘╪╖┘╪د╪ذ',7,'App\\Models\\Student','2024-07-19 01:37:17','2024-07-19 01:37:17'),(28,'╪د┘╪╖┘╪د╪ذ',8,'App\\Models\\Student','2024-07-19 01:37:17','2024-07-19 01:37:17'),(29,'╪د┘╪╖┘╪د╪ذ',9,'App\\Models\\Student','2024-07-19 01:37:17','2024-07-19 01:37:17'),(30,'╪د┘╪╖┘╪د╪ذ',10,'App\\Models\\Student','2024-07-19 01:37:17','2024-07-19 01:37:17'),(31,'╪د┘╪╖┘╪د╪ذ',11,'App\\Models\\Student','2024-07-19 01:37:17','2024-07-19 01:37:17'),(32,'╪د┘╪╖┘╪د╪ذ',12,'App\\Models\\Student','2024-07-19 01:37:17','2024-07-19 01:37:17'),(33,'╪د┘╪╖┘╪د╪ذ',13,'App\\Models\\Student','2024-07-19 01:37:17','2024-07-19 01:37:17'),(34,'╪د┘╪╖┘╪د╪ذ',14,'App\\Models\\Student','2024-07-19 01:37:17','2024-07-19 01:37:17'),(35,'╪د┘╪╖┘╪د╪ذ',15,'App\\Models\\Student','2024-07-19 01:37:17','2024-07-19 01:37:17'),(36,'╪د┘╪╖┘╪د╪ذ',16,'App\\Models\\Student','2024-07-19 01:37:17','2024-07-19 01:37:17'),(37,'╪د┘╪╖┘╪د╪ذ',17,'App\\Models\\Student','2024-07-19 01:37:17','2024-07-19 01:37:17'),(38,'╪د┘╪╖┘╪د╪ذ',18,'App\\Models\\Student','2024-07-19 01:37:17','2024-07-19 01:37:17'),(39,'╪د┘╪╖┘╪د╪ذ',19,'App\\Models\\Student','2024-07-19 01:37:17','2024-07-19 01:37:17'),(40,'╪د┘╪╖┘╪د╪ذ',20,'App\\Models\\Student','2024-07-19 01:37:17','2024-07-19 01:37:17'),(41,'╪د┘┘à┘ê╪╕┘┘è┘',1,'App\\Models\\Employee','2024-07-19 01:37:18','2024-07-19 01:37:18'),(42,'╪د┘┘à┘ê╪╕┘┘è┘',2,'App\\Models\\Employee','2024-07-19 01:37:18','2024-07-19 01:37:18'),(43,'╪د┘┘à┘ê╪╕┘┘è┘',3,'App\\Models\\Employee','2024-07-19 01:37:18','2024-07-19 01:37:18'),(44,'╪د┘┘à┘ê╪╕┘┘è┘',4,'App\\Models\\Employee','2024-07-19 01:37:18','2024-07-19 01:37:18'),(45,'╪د┘┘à┘ê╪╕┘┘è┘',5,'App\\Models\\Employee','2024-07-19 01:37:18','2024-07-19 01:37:18'),(46,'╪د┘┘à┘ê╪╕┘┘è┘',6,'App\\Models\\Employee','2024-07-19 01:37:18','2024-07-19 01:37:18'),(47,'╪د┘┘à┘ê╪╕┘┘è┘',7,'App\\Models\\Employee','2024-07-19 01:37:18','2024-07-19 01:37:18'),(48,'╪د┘┘à┘ê╪╕┘┘è┘',8,'App\\Models\\Employee','2024-07-19 01:37:18','2024-07-19 01:37:18'),(49,'╪د┘┘à┘ê╪╕┘┘è┘',9,'App\\Models\\Employee','2024-07-19 01:37:18','2024-07-19 01:37:18'),(50,'╪د┘┘à┘ê╪╕┘┘è┘',10,'App\\Models\\Employee','2024-07-19 01:37:18','2024-07-19 01:37:18'),(51,'╪د┘┘à┘ê╪╕┘┘è┘',11,'App\\Models\\Employee','2024-07-19 01:37:18','2024-07-19 01:37:18'),(52,'╪د┘┘à┘ê╪╕┘┘è┘',12,'App\\Models\\Employee','2024-07-19 01:37:18','2024-07-19 01:37:18'),(53,'╪د┘┘à┘ê╪╕┘┘è┘',13,'App\\Models\\Employee','2024-07-19 01:37:18','2024-07-19 01:37:18'),(54,'╪د┘┘à┘ê╪╕┘┘è┘',14,'App\\Models\\Employee','2024-07-19 01:37:18','2024-07-19 01:37:18'),(55,'╪د┘┘à┘ê╪╕┘┘è┘',15,'App\\Models\\Employee','2024-07-19 01:37:18','2024-07-19 01:37:18'),(56,'╪د┘┘à┘ê╪╕┘┘è┘',16,'App\\Models\\Employee','2024-07-19 01:37:18','2024-07-19 01:37:18'),(57,'╪د┘┘à┘ê╪╕┘┘è┘',17,'App\\Models\\Employee','2024-07-19 01:37:18','2024-07-19 01:37:18'),(58,'╪د┘┘à┘ê╪╕┘┘è┘',18,'App\\Models\\Employee','2024-07-19 01:37:18','2024-07-19 01:37:18'),(59,'╪د┘┘à┘ê╪╕┘┘è┘',19,'App\\Models\\Employee','2024-07-19 01:37:18','2024-07-19 01:37:18'),(60,'╪د┘┘à┘ê╪╕┘┘è┘',20,'App\\Models\\Employee','2024-07-19 01:37:18','2024-07-19 01:37:18'),(61,'╪د┘╪╖┘╪د╪ذ',21,'App\\Models\\Student','2024-08-10 19:34:38','2024-08-10 19:34:38'),(62,'╪▒╪ث╪│ ╪د┘┘à╪د┘',NULL,NULL,'2024-08-11 16:31:04','2024-08-11 16:31:04'),(64,'╪د┘╪ح┘è╪▒╪د╪»╪د╪ز',NULL,NULL,'2024-08-11 17:02:38','2024-08-11 17:02:38'),(65,'╪د┘┘à╪╡╪د╪▒┘è┘',NULL,NULL,'2024-08-11 17:03:33','2024-08-11 17:03:33'),(66,'╪د┘╪╡┘╪»┘ê┘é',NULL,NULL,'2024-08-11 17:08:35','2024-08-11 17:08:35');
/*!40000 ALTER TABLE `sub_accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subjects` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subjects_category_id_foreign` (`category_id`),
  CONSTRAINT `subjects_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subjects`
--

LOCK TABLES `subjects` WRITE;
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;
INSERT INTO `subjects` VALUES (1,3,'594 ╪د┘â╪│┘','2024-07-19 01:37:17','2024-07-19 01:37:17'),(2,6,'080 ╪ز╪ش┘à┘è┘','2024-07-19 01:37:17','2024-07-19 01:37:17'),(3,3,'502 ┘╪▒┘╪│┘è','2024-07-19 01:37:17','2024-07-19 01:37:17'),(4,4,'105 ┘╪▒┘╪│┘è','2024-07-19 01:37:17','2024-07-19 01:37:17'),(5,2,'014 ╪ز╪ش┘à┘è┘','2024-07-19 01:37:17','2024-07-19 01:37:17'),(6,5,'076 ICDL','2024-07-19 01:37:17','2024-07-19 01:37:17'),(7,2,'260 ICDL','2024-07-19 01:37:17','2024-07-19 01:37:17'),(8,4,'521 ╪ص┘╪د┘é╪ر','2024-07-19 01:37:17','2024-07-19 01:37:17'),(9,1,'114 ╪د┘â╪│┘','2024-07-19 01:37:17','2024-07-19 01:37:17'),(10,5,'742 ╪د┘â╪│┘','2024-07-19 01:37:17','2024-07-19 01:37:17'),(11,6,'705 ╪ص┘╪د┘é╪ر','2024-07-19 01:37:17','2024-07-19 01:37:17'),(12,2,'040 ╪ص┘╪د┘é╪ر','2024-07-19 01:37:17','2024-07-19 01:37:17'),(13,6,'097 ┘╪▒┘╪│┘è','2024-07-19 01:37:17','2024-07-19 01:37:17'),(14,1,'322 ╪د┘â╪│┘','2024-07-19 01:37:17','2024-07-19 01:37:17'),(15,3,'723 ┘╪▒┘╪│┘è','2024-07-19 01:37:17','2024-07-19 01:37:17'),(16,4,'224 ╪ز╪ش┘à┘è┘','2024-07-19 01:37:17','2024-07-19 01:37:17'),(17,4,'520 ICDL','2024-07-19 01:37:17','2024-07-19 01:37:17'),(18,2,'617 ╪د┘┘â┘┘è╪▓┘è','2024-07-19 01:37:17','2024-07-19 01:37:17'),(19,1,'227 ╪ص┘╪د┘é╪ر','2024-07-19 01:37:17','2024-07-19 01:37:17'),(20,4,'819 ╪د┘┘â┘┘è╪▓┘è','2024-07-19 01:37:17','2024-07-19 01:37:17');
/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teachers`
--

DROP TABLE IF EXISTS `teachers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teachers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` date NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credentials` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teachers`
--

LOCK TABLES `teachers` WRITE;
/*!40000 ALTER TABLE `teachers` DISABLE KEYS */;
INSERT INTO `teachers` VALUES (1,'╪╣╪ذ╪» ╪د┘┘┘ç ┘à╪ص┘à╪»','1985-10-16','2854277626','credentials 073','2024-07-19 01:37:17','2024-07-19 01:37:17',NULL),(2,'╪╣┘à╪▒ ╪ث╪ص┘à╪»','1977-01-12','4752540644','credentials 770','2024-07-19 01:37:17','2024-07-19 01:37:17',NULL),(3,'╪ث╪ص┘à╪» ╪ث╪│╪د┘à╪ر','1987-11-30','4912226264','credentials 426','2024-07-19 01:37:17','2024-07-19 01:37:17',NULL),(4,'┘è┘ê╪┤╪╣ ╪╣┘à╪▒','2001-04-28','9656404254','credentials 376','2024-07-19 01:37:17','2024-07-19 01:37:17',NULL),(5,'╪╣╪ذ╪» ╪د┘┘┘ç ╪▒┘ê╪د┘','2018-12-25','5174059442','credentials 759','2024-07-19 01:37:17','2024-07-19 01:37:17',NULL),(6,'┘è┘ê╪┤╪╣ ╪ث╪│╪د┘à╪ر','1987-08-24','6891974531','credentials 855','2024-07-19 01:37:17','2024-07-19 01:37:17',NULL),(7,'┘à╪ص┘à╪» ╪ث╪│╪د┘à╪ر','1980-02-06','6729231645','credentials 386','2024-07-19 01:37:17','2024-07-19 01:37:17',NULL),(8,'╪▒┘ê╪د┘ ╪╣┘┘è','1986-12-01','4679669949','credentials 003','2024-07-19 01:37:17','2024-07-19 01:37:17',NULL),(9,'╪╣┘à╪▒ ╪▒╪╢┘ê╪د┘','2014-02-11','8154099545','credentials 931','2024-07-19 01:37:17','2024-07-19 01:37:17',NULL),(10,'╪╣╪ذ╪» ╪د┘┘┘ç ┘à╪ص┘à╪»','1989-05-27','2820177197','credentials 211','2024-07-19 01:37:17','2024-07-19 01:37:17',NULL),(11,'╪د╪ص┘à╪» ┘à╪ص┘à╪»','1998-06-25','9095394784','credentials 601','2024-07-19 01:37:17','2024-07-19 01:37:17',NULL),(12,'╪╣╪ذ╪» ╪د┘┘┘ç ╪╣┘à╪▒','1972-11-01','4610406145','credentials 787','2024-07-19 01:37:17','2024-07-19 01:37:17',NULL),(13,'╪╣╪ذ╪» ╪د┘┘┘ç ╪│╪╣┘è╪»','1983-06-15','2666690484','credentials 389','2024-07-19 01:37:17','2024-07-19 01:37:17',NULL),(14,'╪د╪ص┘à╪» ╪▒┘ê╪د┘','1987-06-24','5466245474','credentials 253','2024-07-19 01:37:17','2024-07-19 01:37:17',NULL),(15,'╪▒╪╢┘ê╪د┘ ╪▒┘ê╪د┘','1972-06-16','0064011866','credentials 828','2024-07-19 01:37:17','2024-07-19 01:37:17',NULL),(16,'╪ث╪ص┘à╪» ┘è┘ê╪┤╪╣','1971-10-28','9316982707','credentials 188','2024-07-19 01:37:17','2024-07-19 01:37:17',NULL),(17,'┘à╪ص┘à╪» ╪╣╪ذ╪» ╪د┘┘┘ç','1997-04-04','0133890039','credentials 954','2024-07-19 01:37:17','2024-07-19 01:37:17',NULL),(18,'┘à╪ص┘à╪» ╪د╪ص┘à╪»','1970-03-29','6506236379','credentials 149','2024-07-19 01:37:17','2024-07-19 01:37:17',NULL),(19,'┘è┘ê╪┤╪╣ ╪د╪ص┘à╪»','1986-01-16','2682013023','credentials 570','2024-07-19 01:37:17','2024-07-19 01:37:17',NULL),(20,'╪│╪╣┘è╪» ╪ث╪ص┘à╪»','1976-10-07','1526584665','credentials 753','2024-07-19 01:37:17','2024-07-19 01:37:17',NULL);
/*!40000 ALTER TABLE `teachers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transactions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `subaccount_id` bigint(20) unsigned NOT NULL,
  `type` enum('E','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `transactions_course_id_foreign` (`course_id`),
  KEY `transactions_subaccount_id_foreign` (`subaccount_id`),
  CONSTRAINT `transactions_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  CONSTRAINT `transactions_subaccount_id_foreign` FOREIGN KEY (`subaccount_id`) REFERENCES `sub_accounts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` VALUES (1,21,'P',51000,'594 ╪د┘â╪│┘',11,'2024-07-27 15:18:58','2024-07-27 15:18:58'),(2,21,'E',2299,'594 ╪د┘â╪│┘',11,'2024-07-27 15:18:58','2024-07-27 15:18:58'),(3,21,'P',51000,'594 ╪د┘â╪│┘',11,'2024-08-06 01:59:50','2024-08-06 01:59:50'),(4,21,'E',2299,'594 ╪د┘â╪│┘',11,'2024-08-06 01:59:50','2024-08-06 01:59:50'),(5,41,'P',10000,'╪▒╪د╪ز╪ذ',NULL,'2024-08-11 16:18:58','2024-08-11 16:18:58'),(6,62,'P',500000,'╪▒╪ث╪│ ╪د┘┘à╪د┘',NULL,'2024-08-11 16:31:04','2024-08-11 16:31:04'),(10,66,'E',100000,'╪د┘╪╡┘╪»┘ê┘é',NULL,'2024-08-11 17:08:35','2024-08-11 17:08:35');
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','$2y$10$RBfftrfMWq3QJl/EytRG1euzBHh2ge9w8BLrwe.alxMnSf8onF7hG',1,'2024-07-19 01:37:14','2024-07-19 01:37:14',NULL),(2,'chad70','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',2,'2024-07-19 01:37:18','2024-07-19 01:37:18',NULL),(3,'zboncak.miracle','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',2,'2024-07-19 01:37:18','2024-07-19 01:37:18',NULL),(4,'zander80','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',2,'2024-07-19 01:37:18','2024-07-19 01:37:18',NULL),(5,'koepp.amiya','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',2,'2024-07-19 01:37:18','2024-07-19 01:37:18',NULL),(6,'rowe.hiram','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',2,'2024-07-19 01:37:18','2024-07-19 01:37:18',NULL),(7,'wcummerata','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',2,'2024-07-19 01:37:18','2024-07-19 01:37:18',NULL),(8,'langworth.yasmeen','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',2,'2024-07-19 01:37:18','2024-07-19 01:37:18',NULL),(9,'alana37','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',2,'2024-07-19 01:37:18','2024-07-19 01:37:18',NULL),(10,'alexie65','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',2,'2024-07-19 01:37:18','2024-07-19 01:37:18',NULL),(11,'mayer.chance','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',2,'2024-07-19 01:37:18','2024-07-19 01:37:18',NULL),(12,'bergnaum.tabitha','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',2,'2024-07-19 01:37:18','2024-07-19 01:37:18',NULL),(13,'kris.wallace','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',2,'2024-07-19 01:37:18','2024-07-19 01:37:18',NULL),(14,'mnikolaus','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',2,'2024-07-19 01:37:18','2024-07-19 01:37:18',NULL),(15,'barton26','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',2,'2024-07-19 01:37:18','2024-07-19 01:37:18',NULL),(16,'leonardo06','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',2,'2024-07-19 01:37:18','2024-07-19 01:37:18',NULL),(17,'oherzog','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',2,'2024-07-19 01:37:18','2024-07-19 01:37:18',NULL),(18,'noble33','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',2,'2024-07-19 01:37:18','2024-07-19 01:37:18',NULL),(19,'trever.abbott','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',2,'2024-07-19 01:37:18','2024-07-19 01:37:18',NULL),(20,'uritchie','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',2,'2024-07-19 01:37:18','2024-07-19 01:37:18',NULL),(21,'marge.mraz','$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',2,'2024-07-19 01:37:18','2024-07-19 01:37:18',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-08-16  3:25:19
