CREATE DATABASE  IF NOT EXISTS `cars` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `cars`;
-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: cars
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

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
-- Table structure for table `nomecarro`
--

DROP TABLE IF EXISTS `nomecarro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `nomecarro` (
  `idNome` int(11) NOT NULL AUTO_INCREMENT,
  `idFiltro` int(11) DEFAULT NULL,
  `nome` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idNome`),
  KEY `idFiltro` (`idFiltro`),
  CONSTRAINT `nomecarro_ibfk_1` FOREIGN KEY (`idFiltro`) REFERENCES `filtrocarros` (`idFiltro`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nomecarro`
--

LOCK TABLES `nomecarro` WRITE;
/*!40000 ALTER TABLE `nomecarro` DISABLE KEYS */;
INSERT INTO `nomecarro` VALUES (1,1,'Honda Zr-V 2.0 Touring CVT 202'),(2,1,'Volkswagen Nivus 1.0 200 TSI C'),(3,1,'Hyundai Creta 1.6 Action (Aut)'),(4,1,'Honda CR-V 1.5 Touring CVT 4wd'),(5,1,'Chevrolet Tracker 1.0 Turbo (A'),(6,1,'Volkswagen Tiguan Allspace 2.0'),(7,2,'Chevrolet Onix 1.0 SPE/4 2024'),(8,2,'Hyundai HB20 1.0 Comfort Plus '),(9,2,'Chevrolet Celta  LT 1.0 (Flex)'),(10,2,'Volkswagen Gol 1.0 MPI (Flex) '),(11,2,'Smart Fortwo Coupe 1.0 62kw Pa'),(12,2,'Chevrolet Astra Advantage 2.0 '),(13,3,'Hyundai HB20S 1.0 Comfort 2024'),(14,3,'Hyundai Azera 3.0 V6 (Aut) 202'),(15,3,'Volkswagen Passat Highline 2.0'),(16,3,'Toyota Corolla 2.0 GLi CVT 202'),(17,3,'Honda City 1.5 EX CVT 2024'),(18,3,'Chevrolet Onix Plus 1.0 LT 202');
/*!40000 ALTER TABLE `nomecarro` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-07-21 22:56:28
