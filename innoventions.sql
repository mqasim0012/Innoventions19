-- MySQL dump 10.13  Distrib 8.0.26, for Linux (x86_64)
--
-- Host: localhost    Database: innoventions
-- ------------------------------------------------------
-- Server version	8.0.26-0ubuntu0.20.04.3

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `eventscount`
--

DROP TABLE IF EXISTS `eventscount`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `eventscount` (
  `e_id` int NOT NULL AUTO_INCREMENT,
  `Mathalon` int NOT NULL,
  `Panacea` int NOT NULL,
  `Renaissance` int NOT NULL,
  `Novum` int NOT NULL,
  `Artifice` int NOT NULL,
  `Kryptos` int NOT NULL,
  `ProjectX` int NOT NULL,
  `Enfilade` int NOT NULL,
  `Fantasm` int NOT NULL,
  `CrimeConundrum` int NOT NULL,
  `BitbyBit` int NOT NULL,
  `Envirothon` int NOT NULL,
  `FinalProblem` int NOT NULL,
  `institutionCount` int NOT NULL,
  `teamCount` int NOT NULL,
  `participantCount` int NOT NULL,
  PRIMARY KEY (`e_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eventscount`
--

LOCK TABLES `eventscount` WRITE;
/*!40000 ALTER TABLE `eventscount` DISABLE KEYS */;
INSERT INTO `eventscount` VALUES (1,1,0,0,1,1,0,0,0,1,1,0,0,1,1,1,6);
/*!40000 ALTER TABLE `eventscount` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `teams` (
  `t_id` int NOT NULL AUTO_INCREMENT,
  `t_institution` varchar(256) NOT NULL,
  `t_institutionContact` varchar(256) NOT NULL,
  `t_institutionEmail` varchar(256) NOT NULL,
  `t_accomodations` varchar(256) NOT NULL,
  `team_id` varchar(256) NOT NULL,
  `t_prefA` varchar(256) NOT NULL,
  `t_prefB` varchar(256) NOT NULL,
  `tm_img` varchar(256) NOT NULL,
  `tm_name` varchar(256) NOT NULL,
  `tm_hd` varchar(128) NOT NULL,
  `tm_contact` varchar(128) NOT NULL,
  `tm_email` varchar(128) NOT NULL,
  `teamNum` varchar(128) NOT NULL,
  PRIMARY KEY (`t_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teams`
--

LOCK TABLES `teams` WRITE;
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;
INSERT INTO `teams` VALUES (1,'abc','123456789','abc@mail.con','Yes','A','Mathalon, Artifice, CrimeConundrum','Novum, Fantasm, FinalProblem','abcAabc.png','abc','Yes','1234567898765','abc@mail.com','1'),(2,'abc','123456789','abc@mail.con','Yes','A','Mathalon, Artifice, CrimeConundrum','Novum, Fantasm, FinalProblem','abcAasdfghdf.png','asdfghdf','No','123456789876543','','1'),(3,'abc','123456789','abc@mail.con','Yes','A','Mathalon, Artifice, CrimeConundrum','Novum, Fantasm, FinalProblem','abcAasdfg.png','asdfg','No','1234567893','','1'),(4,'abc','123456789','abc@mail.con','Yes','A','Mathalon, Artifice, CrimeConundrum','Novum, Fantasm, FinalProblem','abcAwert.png','wert','No','12345678234','','1'),(5,'abc','123456789','abc@mail.con','Yes','A','Mathalon, Artifice, CrimeConundrum','Novum, Fantasm, FinalProblem','abcAasdfghyjklkjhgf.png','asdfghyjklkjhgf','No','123456781234','','1'),(6,'abc','123456789','abc@mail.con','Yes','A','Mathalon, Artifice, CrimeConundrum','Novum, Fantasm, FinalProblem','abcAasdfghj.png','asdfghj','No','1234567890','','1'),(7,'abc','123456789','abc@mail.com','Yes','B','Mathalon, Enfilade, CrimeConundrum','Novum, Fantasm, FinalProblem','abcBsadfgh.png','sadfgh','Yes','123456789','abc@mail.com','1'),(8,'abc','123456789','abc@mail.com','Yes','B','Mathalon, Enfilade, CrimeConundrum','Novum, Fantasm, FinalProblem','abcBasdfghj.png','asdfghj','No','123456789','','1'),(9,'abc','123456789','abc@mail.com','Yes','B','Mathalon, Enfilade, CrimeConundrum','Novum, Fantasm, FinalProblem','abcBqwertyui.png','qwertyui','No','123456789','','1'),(10,'abc','123456789','abc@mail.com','Yes','B','Mathalon, Enfilade, CrimeConundrum','Novum, Fantasm, FinalProblem','abcBasdfghjk.png','asdfghjk','No','1234567890','','1'),(11,'abc','123456789','abc@mail.com','Yes','B','Mathalon, Enfilade, CrimeConundrum','Novum, Fantasm, FinalProblem','abcBqwertyui5.png','qwertyui5','No','1234567890','','1'),(12,'abc','123456789','abc@mail.com','Yes','B','Mathalon, Enfilade, CrimeConundrum','Novum, Fantasm, FinalProblem','abcBwertyuio.png','wertyuio','No','1234567890','','1'),(13,'def','123456789','asdfg@msil.com','Yes','A','Mathalon, Artifice, CrimeConundrum','Novum, Fantasm, FinalProblem','defAadsfgh.png','adsfgh','Yes','123456789','abc@mail.com','1'),(14,'def','123456789','asdfg@msil.com','Yes','A','Mathalon, Artifice, CrimeConundrum','Novum, Fantasm, FinalProblem','defAqwerty.png','qwerty','No','123456789','','1'),(15,'def','123456789','asdfg@msil.com','Yes','A','Mathalon, Artifice, CrimeConundrum','Novum, Fantasm, FinalProblem','defAsdfghj.png','sdfghj','No','123456789','','1'),(16,'def','123456789','asdfg@msil.com','Yes','A','Mathalon, Artifice, CrimeConundrum','Novum, Fantasm, FinalProblem','defAwerty.png','werty','No','123456789','','1'),(17,'def','123456789','asdfg@msil.com','Yes','A','Mathalon, Artifice, CrimeConundrum','Novum, Fantasm, FinalProblem','defAasdfghj.png','asdfghj','No','123456789','','1'),(18,'def','123456789','asdfg@msil.com','Yes','A','Mathalon, Artifice, CrimeConundrum','Novum, Fantasm, FinalProblem','defAasdfgh.png','asdfgh','No','123456789','','1'),(19,'afsdf','123456789','abc@mail.com','Yes','A','Mathalon, Artifice, CrimeConundrum','Novum, Fantasm, FinalProblem','afsdfAasdfghjk.png','asdfghjk','Yes','1234567890','abc@mail.com','1'),(20,'afsdf','123456789','abc@mail.com','Yes','A','Mathalon, Artifice, CrimeConundrum','Novum, Fantasm, FinalProblem','afsdfAsdfghjk.png','sdfghjk','No','1234567890','','1'),(21,'afsdf','123456789','abc@mail.com','Yes','A','Mathalon, Artifice, CrimeConundrum','Novum, Fantasm, FinalProblem','afsdfAasdfghjk3.png','asdfghjk3','No','1234567890','','1'),(22,'afsdf','123456789','abc@mail.com','Yes','A','Mathalon, Artifice, CrimeConundrum','Novum, Fantasm, FinalProblem','afsdfAwqersgfdh.png','wqersgfdh','No','1234567890','','1'),(23,'afsdf','123456789','abc@mail.com','Yes','A','Mathalon, Artifice, CrimeConundrum','Novum, Fantasm, FinalProblem','afsdfAqwertyui.png','qwertyui','No','1234567890','','1'),(24,'afsdf','123456789','abc@mail.com','Yes','A','Mathalon, Artifice, CrimeConundrum','Novum, Fantasm, FinalProblem','afsdfAqwertyuio.png','qwertyuio','No','1234567890','','1');
/*!40000 ALTER TABLE `teams` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-10-19 22:32:56
