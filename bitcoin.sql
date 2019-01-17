-- MySQL dump 10.13  Distrib 5.7.24, for Linux (x86_64)
--
-- Host: localhost    Database: bitcoin
-- ------------------------------------------------------
-- Server version	5.7.24-0ubuntu0.16.04.1

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `ecurrency_details` varchar(100) DEFAULT NULL,
  `account_name` varchar(100) DEFAULT NULL,
  `account_number` varchar(10) DEFAULT NULL,
  `bank_name` varchar(50) DEFAULT NULL,
  `phone_no` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'BITCOINEX','kayzeebiz@gamil.com','8f142fcf2a183ca85c905e22668b89a2',NULL,'asdfghj','saliu moshood','999022210','Diamond Bank',NULL);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `buy`
--

DROP TABLE IF EXISTS `buy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `buy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `E_currency` varchar(20) DEFAULT NULL,
  `Amount` bigint(20) DEFAULT NULL,
  `e_currency_details` text,
  `invoice_email_addy` varchar(40) DEFAULT NULL,
  `invoice_sent_status` varchar(1) DEFAULT NULL,
  `upoad_file` blob,
  `username` varchar(20) DEFAULT NULL,
  `completed` char(1) DEFAULT NULL,
  `creation_date` date DEFAULT NULL,
  `completion_date` date DEFAULT NULL,
  `order_id` varchar(50) DEFAULT NULL,
  `upload_file_status` varchar(1) DEFAULT NULL,
  `rate` int(11) DEFAULT NULL,
  `total_amount_naira` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buy`
--

LOCK TABLES `buy` WRITE;
/*!40000 ALTER TABLE `buy` DISABLE KEYS */;
INSERT INTO `buy` VALUES (2,'bitcoin',2233,'fghjkl;','kayzeebiz@gmail.com',NULL,NULL,'botnet','Y','2019-01-12','2019-01-15','df1c1f9c76102cc1f4562170ec67aa2a','N',356,794948),(3,'bitcoin',345,'dfghjkl','kayzeebiz@gmail.com',NULL,NULL,'botnet','Y','2019-01-13','2019-01-15','196ad531ca17ff7c659f95c0d4c5de6d','N',356,122820),(4,'bitcoin',56,'jasffggv5gvbhhnnjjkklkkn8bnbghPIpolk','moshoodk.saliu@gmail.com',NULL,NULL,'botnet','N','2019-01-13',NULL,'ef646802892b225e2b5d042cc15168a4','N',356,19936),(5,'bitcoin',67,'dfghjklkjhgfdcvbnmvdf','moshoodk.saliu@gmail.com',NULL,NULL,'botnet','N','2019-01-13',NULL,'bcd4a4432237c609b675e6e1e18f962c','N',356,23852),(6,'bitcoin',80,'dfghjklkjhgfdsdfghjkljhgfghj','moshoodk.saliu@gmail.com',NULL,NULL,'botnet','N','2019-01-13',NULL,'1ff7c745f8a3863b2eb049e0005d230c','N',356,28480),(7,'bitcoin',23,'sdfghjkljhgfdsasdfghj','moshoodk.saliu@gmail.com',NULL,NULL,'botnet','N','2019-01-13',NULL,'047a2ed9eec1b79083fc60b5216543d7','N',356,8188),(8,'bitcoin',8,'hjjhhssjsjjsjsjsjsjs','moshoodk.saliu@gmail.com',NULL,NULL,'botnet','N','2019-01-13',NULL,'f8fcbcf4b1a6af9a3ffee3d02f80f759','N',356,2848),(9,'bitcoin',9,'njnnnn','moshoodk.saliu@gmail.com',NULL,NULL,'botnet','Y','2019-01-13','2019-01-15','b207868b23c799fbbd92041bfa63db6d','N',356,3204);
/*!40000 ALTER TABLE `buy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `e_currency`
--

DROP TABLE IF EXISTS `e_currency`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `e_currency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `currency` varchar(20) DEFAULT NULL,
  `exchange_amount` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `e_currency`
--

LOCK TABLES `e_currency` WRITE;
/*!40000 ALTER TABLE `e_currency` DISABLE KEYS */;
INSERT INTO `e_currency` VALUES (1,'bitcoin','234');
/*!40000 ALTER TABLE `e_currency` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sell`
--

DROP TABLE IF EXISTS `sell`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sell` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `E_currency` varchar(20) DEFAULT NULL,
  `Amount` bigint(20) DEFAULT NULL,
  `account_details` text,
  `invoice_email_addy` varchar(40) DEFAULT NULL,
  `invoice_sent_status` varchar(1) DEFAULT NULL,
  `upoad_file` blob,
  `username` varchar(20) DEFAULT NULL,
  `completed` char(1) DEFAULT NULL,
  `creation_date` date DEFAULT NULL,
  `completion_date` date DEFAULT NULL,
  `invoice_id` varchar(50) DEFAULT NULL,
  `upload_file_status` varchar(1) DEFAULT NULL,
  `rate` int(11) DEFAULT NULL,
  `total_amount_naira` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sell`
--

LOCK TABLES `sell` WRITE;
/*!40000 ALTER TABLE `sell` DISABLE KEYS */;
INSERT INTO `sell` VALUES (1,'bitcoin',34,'saliu moshood kolawole\r\n3046507407\r\nfirstbank','kayzeebiz@gmail.com',NULL,NULL,'botnet','N','2019-01-12',NULL,'5ea83dcdc13f5e4384d4a618ccdfa9c0','N',356,12104),(2,'bitcoin',12,'Saliu Moshood Kolawole\r\n3040507407','moshoodk.saliu@gmail.com',NULL,NULL,'botnet','N','2019-01-13',NULL,'8336e0419bdc4e2080455ee537628f6d','N',356,4272),(3,'bitcoin',12,'sdfghgfffddf','moshoodk.saliu@gmail.com',NULL,NULL,'botnet','Y','2019-01-13','2019-01-15','263c572ab1b5ea18e2928fdcba8bf989','N',356,4272);
/*!40000 ALTER TABLE `sell` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `testimony`
--

DROP TABLE IF EXISTS `testimony`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `testimony` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `testimony` text,
  `rating` int(1) DEFAULT NULL,
  `entered_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `testimony`
--

LOCK TABLES `testimony` WRITE;
/*!40000 ALTER TABLE `testimony` DISABLE KEYS */;
INSERT INTO `testimony` VALUES (1,'botnet','kayzeebiz@gmail.com','akure','im very grateful',3,'2019-01-12'),(2,'botnet','kayzeebiz@gmail.com','akure','im very grateful',3,'2019-01-12'),(3,'botnet','kayzeebiz@gmail.com','akure','im very grateful',3,'2019-01-12'),(4,'botnet','kayzeebiz@gmail.com','sdfghjkl','zxcvbnm,l.',4,'2019-01-12'),(5,'botnet','kayzeebiz@gmail.com','nm,.','cvbnm,./',4,'2019-01-12'),(6,'botnet','kayzeebiz@gmail.com','cvbnm,.','ghjkl',4,'2019-01-12'),(7,'botnet','kayzeebiz@gmail.com','ghjkl;','bndmdmdm,d',1,'2019-01-12'),(8,'botnet','kayzeebiz@gmail.com','ghjkl;','xc',3,'2019-01-12'),(9,'botnet','kayzeebiz@gmail.com','fghjkl;','lkjhgc',3,'2019-01-12'),(10,'botnet','kayzeebiz@gmail.com','vb','zg',4,'2019-01-12'),(11,'botnet','kayzeebiz@gmail.com','sdfb','sdf',4,'2019-01-12'),(12,'botnet','kayzeebiz@gmail.com','ssdfg','sdfghn',4,'2019-01-12'),(13,'botnet','kayzeebiz@gmail.com','SGH','SFG',3,'2019-01-12'),(14,'botnet','kayzeebiz@gmail.com','zxcvb','sdfv',1,'2019-01-12'),(15,'botnet','kayzeebiz@gmail.com','dfghjk','fghjkl',4,'2019-01-12'),(16,'botnet','kayzeebiz@gmail.com','fghjk','ghjkl',2,'2019-01-12'),(17,'botnet','kayzeebiz@gmail.com','gjkl','m,',3,'2019-01-12'),(18,'botnet','kayzeebiz@gmail.com','ghjkl;','hjkl',2,'2019-01-12'),(19,'botnet','kayzeebiz@gmail.com','bnm,','vbnm,',3,'2019-01-12'),(20,'botnet','kayzeebiz@gmail.com','jkl;','dfghjkl',2,'2019-01-12'),(21,'botnet','kayzeebiz@gmail.com','dfghjkl;','fghjkl;',2,'2019-01-12'),(22,'botnet','kayzeebiz@gmail.com','fghjkl','ghjkl',2,'2019-01-12'),(23,'botnet','kayzeebiz@gmail.com','fghjk','dfghjkl;',1,'2019-01-12'),(24,'botnet','kayzeebiz@gmail.com','xcvbnm,.','fghjkl',2,'2019-01-12'),(25,'botnet','kayzeebiz@gmail.com','fvbnm,','dfghjkl',2,'2019-01-12'),(26,'botnet','kayzeebiz@gmail.com','fghjkl','fghjkl',2,'2019-01-12'),(27,'botnet','kayzeebiz@gmail.com','dkl','fghjk',2,'2019-01-12'),(28,'botnet','kayzeebiz@gmail.com','zsdfg','sdfgh',1,'2019-01-13'),(29,'botnet','kayzeebiz@gmail.com','sdfgh','fgh',1,'2019-01-13'),(30,'botnet','kayzeebiz@gmail.com','sdfghjkl','dfghjkl',2,'2019-01-13');
/*!40000 ALTER TABLE `testimony` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phoneNo` varchar(15) DEFAULT NULL,
  `addy` varchar(100) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  `reg_date` date DEFAULT NULL,
  `last_seen` date DEFAULT NULL,
  `activation_id` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (62,'moshood','saliu','botnet','7be3953e2d3257711d2379e1d6048d63','moshoodk.saliu@gmail.com','08137877844','ketu','V','2019-01-15',NULL,'cb37f959a7ddabb1654c5b2b120e6367');
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

-- Dump completed on 2019-01-15 12:38:08
