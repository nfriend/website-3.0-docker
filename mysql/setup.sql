CREATE DATABASE inspirograph;

CREATE USER 'inspirographer'@'%' IDENTIFIED WITH mysql_native_password BY 'inspiropass';
GRANT INSERT, UPDATE, SELECT, DELETE ON inspirograph.* TO 'inspirographer'@'%';

USE inspirograph;

-- MySQL dump 10.13  Distrib 5.5.37, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: inspirograph
-- ------------------------------------------------------
-- Server version	5.5.37-0ubuntu0.14.04.1

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
-- Table structure for table `image`
--

DROP TABLE IF EXISTS `image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `imgur_id` varchar(50) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `datetime` datetime NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `animated` tinyint(4) DEFAULT '0',
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `size` int(11) DEFAULT NULL,
  `views` int(11) DEFAULT NULL,
  `bandwidth` int(11) DEFAULT NULL,
  `deletehash` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `section` varchar(50) DEFAULT NULL,
  `link` varchar(100) NOT NULL,
  `gifv` varchar(100) DEFAULT NULL,
  `mp4` varchar(100) DEFAULT NULL,
  `webm` varchar(100) DEFAULT NULL,
  `looping` tinyint(4) DEFAULT '0',
  `favorite` tinyint(4) DEFAULT '0',
  `nsfw` tinyint(4) DEFAULT '0',
  `vote` varchar(50) DEFAULT NULL,
  `account_url` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `datetime` (`datetime`)
) ENGINE=InnoDB AUTO_INCREMENT=202776 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-09-09 14:24:11