-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: cars
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.25-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `capacidadecarro`
--

DROP TABLE IF EXISTS `capacidadecarro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `capacidadecarro` (
  `idCapacidade` int(11) NOT NULL AUTO_INCREMENT,
  `idNome` int(11) DEFAULT NULL,
  `capacidade` char(1) DEFAULT NULL,
  PRIMARY KEY (`idCapacidade`),
  KEY `idNome` (`idNome`),
  CONSTRAINT `capacidadecarro_ibfk_1` FOREIGN KEY (`idNome`) REFERENCES `nomecarro` (`idNome`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `capacidadecarro`
--

LOCK TABLES `capacidadecarro` WRITE;
/*!40000 ALTER TABLE `capacidadecarro` DISABLE KEYS */;
INSERT INTO `capacidadecarro` VALUES (1,1,'5'),(2,2,'5'),(3,3,'5'),(4,4,'5'),(5,5,'5'),(6,6,'7'),(7,7,'5'),(8,8,'5'),(9,9,'5'),(10,10,'5'),(11,11,'2'),(12,12,'5'),(13,13,'5'),(14,14,'5'),(15,15,'5'),(16,16,'5'),(17,17,'5'),(18,18,'5');
/*!40000 ALTER TABLE `capacidadecarro` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-09-22 20:47:55
