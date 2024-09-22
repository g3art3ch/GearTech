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
-- Table structure for table `usocarro`
--

DROP TABLE IF EXISTS `usocarro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usocarro` (
  `idUso` int(11) NOT NULL AUTO_INCREMENT,
  `idNome` int(11) DEFAULT NULL,
  `tipoUso` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idUso`),
  KEY `idNome` (`idNome`),
  CONSTRAINT `usocarro_ibfk_1` FOREIGN KEY (`idNome`) REFERENCES `nomecarro` (`idNome`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usocarro`
--

LOCK TABLES `usocarro` WRITE;
/*!40000 ALTER TABLE `usocarro` DISABLE KEYS */;
INSERT INTO `usocarro` VALUES (1,1,'Diário'),(2,2,'Diário'),(3,3,'Diário'),(4,4,'Diário'),(5,5,'Diário'),(6,6,'Passeio'),(7,7,'Diário'),(8,8,'Diário'),(9,9,'Diário'),(10,10,'Diário'),(11,11,'Diário'),(12,12,'Passeio'),(13,13,'Diário'),(14,14,'Passeio'),(15,15,'Passeio'),(16,16,'Passeio'),(17,17,'Diário'),(18,18,'Diário');
/*!40000 ALTER TABLE `usocarro` ENABLE KEYS */;
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
