-- MySQL dump 10.13  Distrib 8.0.18, for Win64 (x86_64)
--
-- Host: localhost    Database: wrkorder
-- ------------------------------------------------------
-- Server version	8.0.18

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
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comment` (
  `Comment_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Comment_Title` varchar(45) NOT NULL,
  `Comment_Author` varchar(45) NOT NULL,
  `Comment_Date` date NOT NULL,
  `Comment_Status` varchar(45) NOT NULL DEFAULT 'Unread',
  `Comment_Content` longtext NOT NULL,
  `wkorder_ID` int(11) NOT NULL,
  PRIMARY KEY (`Comment_ID`),
  KEY `wkorder_ID_idx` (`wkorder_ID`),
  CONSTRAINT `wkorder_ID` FOREIGN KEY (`wkorder_ID`) REFERENCES `worder` (`wkorder_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` VALUES (1,'Greeting','Sadiq','2020-07-01','Unread','Asalaamu Alikum brother. See you latter inshaAllah Ta,aalaa',1),(2,'Another greeting','Sadiq','2020-07-01','Unread','Asalaamu Alikum sisters.',1),(3,'Greeting','Sadiq','2020-07-01','Unread','Asalaamu Alikum brothers.',1),(4,'Greeting','Sadiq','2020-07-01','Unread','Asalaamu Alikum brothers. I really love you so much. Thank you so much.',1),(5,'Greeting','Sadiq','2020-07-01','Unread','Asallamu Alikum brothers and sisters.',1),(6,'Greeting','Sadiq','2020-07-01','Unread','Asalaamu Alikum.',1),(7,'Greeting','Sadiq','2020-07-01','Unread','Asallamu Alikum',1),(8,'Another greeting','Sadiq','2020-07-01','Unread','Asalaamu Alikum Abdigafaar.',1),(9,'Greeting','Sadiq','2020-07-01','Unread','Asalaamu Alikum',1),(10,'Greeting','Sadiq','2020-07-08','Unread','Asalaamu Alikum sister.',1),(11,'Greeting','Sadiq','2020-07-08','Unread','Asalaamu ALIKUM BRO.',1),(12,'Greeting','Sadiq','2020-07-21','Unread','This is not that important.',3),(13,'Guul','Sadiq','2020-07-21','Unread','Alhamdulilaah, it is very good.',3),(14,'Guul Wacan','Sadiq','2020-07-21','Unread','I love you',2),(15,'Guul Wacan','Sadiq','2020-07-21','Unread','Asalaamu Alikum',2),(16,'Guul Wacan','Sadiq','2020-07-21','Unread','why he can not answer the phone',2),(17,'Guul Wacan','Sadiq','2020-07-30','Unread','hey',2),(18,'Guul','Sadiq','2020-07-22','Unread','Already fixed this work order',5),(19,'Greeting','Sadiq','2020-07-22','Unread','Masha Allah, Allahu Akbar. Subxaana Allah Walxamdulilaah.',5),(20,'Guul Wacan','Sadiq','2020-07-30','Unread','HAVE A GOOD DAY',7),(21,'Another greeting','Sadiq','2020-07-31','Unread','ggggggggggggggg',7),(22,'Guul','Sadiq','2020-07-25','Unread','hhhhhhhhhh',6),(23,'how are you?','Sadiq','2020-08-15','Unread','Example2.',8),(24,'Manager','Sadiq','2020-08-15','Unread','I did finish the wrk.',8);
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `maintenance`
--

DROP TABLE IF EXISTS `maintenance`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `maintenance` (
  `Maintenance_ID` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(45) NOT NULL,
  `LastName` varchar(45) NOT NULL,
  `StreetAdress` varchar(45) NOT NULL,
  `AptNumber` varchar(5) DEFAULT NULL,
  `State` varchar(2) NOT NULL DEFAULT 'MN',
  `City` varchar(15) NOT NULL,
  `ZipCode` varchar(10) NOT NULL,
  `PhoneNumber` varchar(10) NOT NULL,
  `UserName` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `DateHired` date NOT NULL,
  `HourlyWage` decimal(10,0) NOT NULL,
  PRIMARY KEY (`Maintenance_ID`),
  UNIQUE KEY `UserName_UNIQUE` (`UserName`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `maintenance`
--

LOCK TABLES `maintenance` WRITE;
/*!40000 ALTER TABLE `maintenance` DISABLE KEYS */;
INSERT INTO `maintenance` VALUES (1,'Sadiq','Hassan','1866 Lee blvd apt 21','9','MN','North Mankato','56003','6124830436','sadiqhar@hotmail.com','RaageAbdi','2020-07-08',12),(2,'admission','Hassan','620 cedar Ave apt 22','','MN','Saint Paul','55106','6517931302','sadiqhjja@hotmail.com','RaageAbdi','2020-07-08',14);
/*!40000 ALTER TABLE `maintenance` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `manager`
--

DROP TABLE IF EXISTS `manager`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `manager` (
  `Manager_ID` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(45) NOT NULL,
  `LastName` varchar(45) NOT NULL,
  `StreetAdress` varchar(45) NOT NULL,
  `AptNumber` varchar(10) DEFAULT NULL,
  `City` varchar(45) NOT NULL,
  `State` varchar(2) NOT NULL DEFAULT 'MN',
  `ZipCode` varchar(5) NOT NULL,
  `PhoneNumber` varchar(45) NOT NULL,
  `UserName` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `DateHired` date NOT NULL,
  `AnnualSalary` decimal(10,0) NOT NULL,
  PRIMARY KEY (`Manager_ID`),
  UNIQUE KEY `UserName_UNIQUE` (`UserName`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `manager`
--

LOCK TABLES `manager` WRITE;
/*!40000 ALTER TABLE `manager` DISABLE KEYS */;
INSERT INTO `manager` VALUES (1,'Sadiq','Mohamed','620 Cedar ave','404','Minneapolis','MN','55454','6124835256','sadiqhassan772@gmail.com','RaageAbdi','2000-01-20',90000);
/*!40000 ALTER TABLE `manager` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resident`
--

DROP TABLE IF EXISTS `resident`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `resident` (
  `Resident_ID` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(45) NOT NULL,
  `LastName` varchar(45) NOT NULL,
  `StreetAdress` varchar(45) NOT NULL DEFAULT '1701 Metro Ave',
  `AptNumber` varchar(45) DEFAULT NULL,
  `City` varchar(45) NOT NULL DEFAULT 'St Paul',
  `State` varchar(45) NOT NULL DEFAULT 'MN',
  `ZipCode` varchar(45) NOT NULL DEFAULT '55130',
  `PhoneNumber` varchar(45) NOT NULL,
  `UserName` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `DateMovedIn` date NOT NULL,
  `Amount_Of_Rent` decimal(10,0) NOT NULL,
  PRIMARY KEY (`Resident_ID`),
  UNIQUE KEY `UserName_UNIQUE` (`UserName`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resident`
--

LOCK TABLES `resident` WRITE;
/*!40000 ALTER TABLE `resident` DISABLE KEYS */;
INSERT INTO `resident` VALUES (26,'Sadiq','Mohamed','1701 Metro Ave','200','St Paul','MN','55130','6124830436','sadiqhar@hotmail.com','RaageAbdi','2020-06-30',1000),(27,'Abdulqaadir','Ali','1701 Metro Ave','200','St Paul','MN','55130','6124895555','sadiqhassan663@gmail.com','RaageAbdi','2020-07-08',4500);
/*!40000 ALTER TABLE `resident` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `worder`
--

DROP TABLE IF EXISTS `worder`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `worder` (
  `wkorder_ID` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(256) NOT NULL,
  `Dat_requested` date NOT NULL,
  `Dat_completed` date DEFAULT NULL,
  `Status` varchar(45) NOT NULL DEFAULT 'Uncompleted',
  `Priority` varchar(45) NOT NULL,
  `Resident_ID` int(11) NOT NULL,
  `Maintenance_ID` int(11) DEFAULT NULL,
  `Manager_ID` int(11) DEFAULT NULL,
  PRIMARY KEY (`wkorder_ID`),
  KEY `Resident_ID_idx` (`Resident_ID`),
  KEY `Maintenance_ID_idx` (`Maintenance_ID`),
  KEY `Manager_ID_idx` (`Manager_ID`),
  CONSTRAINT `Maintenance_ID` FOREIGN KEY (`Maintenance_ID`) REFERENCES `maintenance` (`Maintenance_ID`),
  CONSTRAINT `Manager_ID` FOREIGN KEY (`Manager_ID`) REFERENCES `manager` (`Manager_ID`),
  CONSTRAINT `Resident_ID` FOREIGN KEY (`Resident_ID`) REFERENCES `resident` (`Resident_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `worder`
--

LOCK TABLES `worder` WRITE;
/*!40000 ALTER TABLE `worder` DISABLE KEYS */;
INSERT INTO `worder` VALUES (1,'Thank you for coming everybody','2020-07-09','2020-06-10','completed','Medium',26,1,1),(2,'Hey I want to visit you my dear brother.','2020-07-09','2020-07-01','completed','Medium',27,1,1),(3,'How is everybody?','2020-07-20','2020-07-16','completed','Low',26,1,1),(5,'good luck','2020-07-22','2020-08-15','completed','Urgent',26,1,NULL),(6,'very nice','2020-08-06','2020-07-25','completed','Urgent',26,1,1),(7,'EXAMPLE','2020-07-30',NULL,'Uncompleted','Low',26,1,NULL),(8,'Example.','2020-08-15',NULL,'Uncompleted','Medium',26,1,NULL);
/*!40000 ALTER TABLE `worder` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-08-15 16:39:25
