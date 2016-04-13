CREATE DATABASE  IF NOT EXISTS `exemple_dbname` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `exemple_dbname`;
-- MySQL dump 10.13  Distrib 5.5.47, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: exemple_dbname
-- ------------------------------------------------------
-- Server version	5.5.47-0ubuntu0.14.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `example`
--

DROP TABLE IF EXISTS `example`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `example` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `example`
--

LOCK TABLES `example` WRITE;
/*!40000 ALTER TABLE `example` DISABLE KEYS */;
INSERT INTO `example` VALUES (1,'update test',0),(2,'test',0),(3,'test',0),(4,'test',0),(5,'test',0),(6,'test',0),(7,'test',0),(8,'test',0),(9,'test',0),(10,'test',0),(11,'test',0),(12,'test',0),(13,'test',0),(14,'test',0),(15,'test',0),(16,'test',0),(17,'test',0),(18,'test',0),(19,'test',0),(20,'test',0),(21,'test',0),(22,'test',0),(23,'test',0),(24,'test',0),(25,'test',0),(26,'test',0),(27,'test',0),(28,'test',0),(29,'test',0),(30,'test',0),(31,'test',0),(32,'test',0),(33,'test',0),(34,'test',0),(35,'test',0),(36,'test',0),(37,'test',0),(38,'test',0),(39,'test',0),(40,'test',0),(41,'test',0),(42,'test',0),(43,'test',0),(44,'test',0),(45,'test',0),(46,'test',0),(47,'test',0),(48,'test',0),(49,'test',0),(50,'test',0),(51,'test',0),(52,'test',0),(53,'test',0),(54,'test',0),(55,'test',0),(56,'test',0),(57,'test',0),(58,'test',0),(59,'test',0),(60,'test',0),(61,'test',0),(62,'test',0),(63,'test',0),(64,'test',0),(65,'test',0),(66,'test',0),(67,'test',0),(68,'test',0),(69,'test',0),(70,'test',0),(71,'test',0),(72,'test',0),(73,'test',0),(74,'test',0),(75,'test',0),(76,'test',0),(77,'test',0),(78,'test',0),(79,'test',0),(80,'test',0),(81,'test',0),(82,'test',0),(83,'test',0),(84,'test',0),(85,'test',0),(86,'test',0),(87,'test',0),(88,'test',0),(89,'test',0),(90,'test',0),(91,'test',0),(92,'test',0),(93,'test',0),(94,'test',0),(95,'test',0),(96,'test',0),(97,'test',0),(98,'test',0),(99,'test',0),(100,'test',0),(101,'test',0);
/*!40000 ALTER TABLE `example` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-04-08  7:57:30
