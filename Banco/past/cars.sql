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

USE cars;


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

--
-- Table structure for table `filtrocarros`
--

DROP TABLE IF EXISTS `filtrocarros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `filtrocarros` (
  `idFiltro` int(11) NOT NULL AUTO_INCREMENT,
  `estilo` varchar(10) NOT NULL,
  PRIMARY KEY (`idFiltro`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `filtrocarros`
--

LOCK TABLES `filtrocarros` WRITE;
/*!40000 ALTER TABLE `filtrocarros` DISABLE KEYS */;
INSERT INTO `filtrocarros` VALUES (1,'SUV'),(2,'Hatch'),(3,'Sedan'),(4,'SUV'),(5,'Hatch'),(6,'Sedan');
/*!40000 ALTER TABLE `filtrocarros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `identificador`
--

DROP TABLE IF EXISTS `identificador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `identificador` (
  `idIden` varchar(100) NOT NULL,
  `idNome` int(11) DEFAULT NULL,
  `urlCarro` varchar(30) NOT NULL,
  `Marca` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idIden`),
  KEY `idNome` (`idNome`),
  CONSTRAINT `identificador_ibfk_1` FOREIGN KEY (`idNome`) REFERENCES `nomecarro` (`idNome`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `identificador`
--

LOCK TABLES `identificador` WRITE;
/*!40000 ALTER TABLE `identificador` DISABLE KEYS */;
INSERT INTO `identificador` VALUES ('Chevrolet_Astra_Advantage_2.0_(Flex)_2011',12,'../car_images/','Chevrolet'),('Chevrolet_Celta_LT_1.0_(Flex)_2016',9,'../car_images/','Chevrolet'),('Chevrolet_Onix 1.0_SPE4_2024',7,'../car_images/','Chevrolet'),('Chevrolet_Onix_Plus_1.0_LT_2024',18,'../car_images/','Chevrolet'),('Chevrolet_Tracker_1.0_Turbo_(Aut)_2024',5,'../car_images/','Chevrolet'),('Honda_City_1.5_EX_CVT_2024',17,'../car_images/','Honda'),('Honda_CR-V_1.5_Touring_CVT_4wd_2021',4,'../car_images/','Honda'),('Honda_Zr-V_2.0_Touring_CVT_2024',1,'../car_images/','Honda'),('Hyundai_Azera_3.0_V6_(Aut)_2020',14,'../car_images/','Hyundai'),('Hyundai_Creta_1.6_Action_(Aut)_2024',3,'../car_images/','Hyundai'),('Hyundai_HB20S_1.0_Comfort_2024',13,'../car_images/','Hyundai'),('Hyundai_HB20_1.0_Comfort_Plus_2025',8,'../car_images/','Hyundai'),('Smart_Fortwo_Coupe_1.0_62kw_Passion_2015',11,'../car_images/','Smart'),('Toyota_Corolla_2.0_GLi_CVT_2024',16,'../car_images/','Toyota'),('Volkswagen_Gol_1.0_MPI_(Flex)_2023',10,'../car_images/','Volkswagen'),('Volkswagen_Nivus_1.0_200_TSI_Comfortline_2024',2,'../car_images/','Volkswagen'),('Volkswagen_Passat_Highline_2.0_TSI_DSG_2019',15,'../car_images/','Volkswagen'),('Volkswagen_Tiguan_Allspace_2.0_TSI_R-Line_2024',6,'../car_images/','Volkswagen');
/*!40000 ALTER TABLE `identificador` ENABLE KEYS */;
UNLOCK TABLES;

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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nomecarro`
--

LOCK TABLES `nomecarro` WRITE;
/*!40000 ALTER TABLE `nomecarro` DISABLE KEYS */;
INSERT INTO `nomecarro` VALUES (1,1,'Honda Zr-V 2.0 Touring CVT 202'),(2,1,'Volkswagen Nivus 1.0 200 TSI C'),(3,1,'Hyundai Creta 1.6 Action (Aut)'),(4,1,'Honda CR-V 1.5 Touring CVT 4wd'),(5,1,'Chevrolet Tracker 1.0 Turbo (A'),(6,1,'Volkswagen Tiguan Allspace 2.0'),(7,2,'Chevrolet Onix 1.0 SPE/4 2024'),(8,2,'Hyundai HB20 1.0 Comfort Plus '),(9,2,'Chevrolet Celta  LT 1.0 (Flex)'),(10,2,'Volkswagen Gol 1.0 MPI (Flex) '),(11,2,'Smart Fortwo Coupe 1.0 62kw Pa'),(12,2,'Chevrolet Astra Advantage 2.0 '),(13,3,'Hyundai HB20S 1.0 Comfort 2024'),(14,3,'Hyundai Azera 3.0 V6 (Aut) 202'),(15,3,'Volkswagen Passat Highline 2.0'),(16,3,'Toyota Corolla 2.0 GLi CVT 202'),(17,3,'Honda City 1.5 EX CVT 2024'),(18,3,'Chevrolet Onix Plus 1.0 LT 202');
/*!40000 ALTER TABLE `nomecarro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orcamentocarro`
--

DROP TABLE IF EXISTS `orcamentocarro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orcamentocarro` (
  `idOrcamento` int(11) NOT NULL AUTO_INCREMENT,
  `idNome` int(11) DEFAULT NULL,
  `orcamento` decimal(10,3) DEFAULT NULL,
  PRIMARY KEY (`idOrcamento`),
  KEY `idNome` (`idNome`),
  CONSTRAINT `orcamentocarro_ibfk_1` FOREIGN KEY (`idNome`) REFERENCES `nomecarro` (`idNome`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orcamentocarro`
--

LOCK TABLES `orcamentocarro` WRITE;
/*!40000 ALTER TABLE `orcamentocarro` DISABLE KEYS */;
INSERT INTO `orcamentocarro` VALUES (1,1,214.500),(2,2,129.190),(3,3,114.690),(4,4,229.445),(5,5,127.690),(6,6,278.990),(7,7,84.390),(8,8,89.490),(9,9,34.516),(10,10,74.150),(11,11,69.172),(12,12,34.958),(13,13,90.690),(14,14,234.256),(15,15,142.296),(16,16,148.990),(17,17,118.700),(18,18,96.390);
/*!40000 ALTER TABLE `orcamentocarro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipocombustivel`
--

DROP TABLE IF EXISTS `tipocombustivel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tipocombustivel` (
  `idCombustivel` int(11) NOT NULL AUTO_INCREMENT,
  `idNome` int(11) DEFAULT NULL,
  `combustivel` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idCombustivel`),
  KEY `idNome` (`idNome`),
  CONSTRAINT `tipocombustivel_ibfk_1` FOREIGN KEY (`idNome`) REFERENCES `nomecarro` (`idNome`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipocombustivel`
--

LOCK TABLES `tipocombustivel` WRITE;
/*!40000 ALTER TABLE `tipocombustivel` DISABLE KEYS */;
INSERT INTO `tipocombustivel` VALUES (1,1,'Gasolina'),(2,2,'Flex'),(3,3,'Flex'),(4,4,'Gasolina'),(5,5,'Flex'),(6,6,'Gasolina'),(7,7,'Flex'),(8,8,'Flex'),(9,9,'Flex'),(10,10,'Flex'),(11,11,'Gasolina'),(12,12,'Flex'),(13,13,'Flex'),(14,14,'Gasolina'),(15,15,'Gasolina'),(16,16,'Flex'),(17,17,'Flex'),(18,18,'Flex');
/*!40000 ALTER TABLE `tipocombustivel` ENABLE KEYS */;
UNLOCK TABLES;

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

USE cars;

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

-- Dump completed on 2024-09-22 20:48:06
