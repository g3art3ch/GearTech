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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `identificador`
--

LOCK TABLES `identificador` WRITE;
/*!40000 ALTER TABLE `identificador` DISABLE KEYS */;
INSERT INTO `identificador` VALUES ('Chevrolet_Astra_Advantage_2.0_(Flex)_2011',12,'../car_images/','Chevrolet'),('Chevrolet_Celta_LT_1.0_(Flex)_2016',9,'../car_images/','Chevrolet'),('Chevrolet_Onix 1.0_SPE4_2024',7,'../car_images/','Chevrolet'),('Chevrolet_Onix_Plus_1.0_LT_2024',18,'../car_images/','Chevrolet'),('Chevrolet_Tracker_1.0_Turbo_(Aut)_2024',5,'../car_images/','Chevrolet'),('Honda_City_1.5_EX_CVT_2024',17,'../car_images/','Honda'),('Honda_CR-V_1.5_Touring_CVT_4wd_2021',4,'../car_images/','Honda'),('Honda_Zr-V_2.0_Touring_CVT_2024',1,'../car_images/','Honda'),('Hyundai_Azera_3.0_V6_(Aut)_2020',14,'../car_images/','Hyundai'),('Hyundai_Creta_1.6_Action_(Aut)_2024',3,'../car_images/','Hyundai'),('Hyundai_HB20S_1.0_Comfort_2024',13,'../car_images/','Hyundai'),('Hyundai_HB20_1.0_Comfort_Plus_2025',8,'../car_images/','Hyundai'),('Smart_Fortwo_Coupe_1.0_62kw_Passion_2015',11,'../car_images/','Smart'),('Toyota_Corolla_2.0_GLi_CVT_2024',16,'../car_images/','Toyota'),('Volkswagen_Gol_1.0_MPI_(Flex)_2023',10,'../car_images/','Volkswagen'),('Volkswagen_Nivus_1.0_200_TSI_Comfortline_2024',2,'../car_images/','Volkswagen'),('Volkswagen_Passat_Highline_2.0_TSI_DSG_2019',15,'../car_images/','Volkswagen'),('Volkswagen_Tiguan_Allspace_2.0_TSI_R-Line_2024',6,'../car_images/','Volkswagen');
/*!40000 ALTER TABLE `identificador` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-07-21 22:56:29
