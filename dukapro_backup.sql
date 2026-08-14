-- MySQL dump 10.13  Distrib 9.7.1, for macos14.8 (x86_64)
--
-- Host: localhost    Database: dukapro
-- ------------------------------------------------------
-- Server version	9.7.1

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
SET @MYSQLDUMP_TEMP_LOG_BIN = @@SESSION.SQL_LOG_BIN;
SET @@SESSION.SQL_LOG_BIN= 0;

--
-- GTID state at the beginning of the backup 
--

SET @@GLOBAL.GTID_PURGED=/*!80000 '+'*/ 'afb16970-7b65-11f1-844c-1bc58b6867cb:1-6378';

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_code` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `status` enum('Active','Inactive') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Active',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `category_code` (`category_code`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'CAT001','Beverages','Soft drinks, juices, water and energy drinks','Active','2026-08-07 14:45:01','2026-08-07 14:45:01'),(2,'CAT002','Groceries','Staple food items and cooking ingredients','Active','2026-08-07 14:45:01','2026-08-07 14:45:01'),(3,'CAT003','Snacks','Biscuits, crisps, chocolates and confectionery','Active','2026-08-07 14:45:01','2026-08-07 14:45:01'),(4,'CAT004','Personal Care','Toiletries and personal hygiene products','Active','2026-08-07 14:45:01','2026-08-07 14:45:01'),(5,'CAT005','Household Essentials','Cleaning and household products','Active','2026-08-07 14:45:01','2026-08-07 14:45:01');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_general_ci,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (1,'Mrs. Gerda Yundt','0762757901','mgrimes@example.net','267 Hermiston Wells Apt. 066\nNew Reaganside, GA 93706','2026-08-07 12:07:16','2026-08-07 12:07:16'),(2,'Mr. Keyon Kautzer','0798479874','claire01@example.com','2157 Florencio Expressway\nAgneshaven, FL 23129','2026-08-07 12:07:16','2026-08-07 12:07:16'),(3,'Carli Spinka','0735563428','alexis63@example.com','8947 Clifford Bridge\nSallymouth, LA 70202-0203','2026-08-07 12:07:16','2026-08-07 12:07:16'),(4,'Jackeline Fahey DVM','0780140395','ona11@example.com','9228 Jefferey Streets\nLake Freddiefort, WV 10990-1561','2026-08-07 12:07:16','2026-08-07 12:07:16'),(5,'Verdie Hermann','0786748411','schiller.nicolette@example.com','9879 Keon Lock Suite 361\nSouth Oran, DC 78283-6451','2026-08-07 12:07:16','2026-08-07 12:07:16'),(6,'Montana Kunde V','0725310537','ttorp@example.org','598 Dicki Cliff\nEnashire, WI 52681-9823','2026-08-07 12:07:16','2026-08-07 12:07:16'),(7,'Miss Chanel Johns MD','0786340904','haylee83@example.net','9308 Haley Turnpike\nTodton, OR 39087','2026-08-07 12:07:16','2026-08-07 12:07:16'),(8,'Dustin Luettgen','0760067774','jbotsford@example.com','727 Durgan Drives\nDannystad, KY 18990','2026-08-07 12:07:16','2026-08-07 12:07:16'),(9,'Leola Beahan','0785424780','tabshire@example.net','4725 Pfannerstill Ports\nNorth Leonieville, AL 15212-0733','2026-08-07 12:07:16','2026-08-07 12:07:16'),(10,'Prof. Diego Labadie','0737357238','helga.gleichner@example.com','6483 Johnson Stream\nLake Quincyfurt, AL 51000-0271','2026-08-07 12:07:16','2026-08-07 12:07:16'),(11,'Anna Okuneva','0779031154','scarlett.kihn@example.org','961 Langosh Ford Apt. 083\nKarianechester, FL 99988-8544','2026-08-07 12:07:16','2026-08-07 12:07:16'),(12,'Rolando Ankunding','0759683256','burdette.rosenbaum@example.net','5495 Bria Branch Suite 004\nLake Doyleview, TX 02646-6255','2026-08-07 12:07:16','2026-08-07 12:07:16'),(13,'Ms. Marcia Abshire I','0786050408','dooley.torey@example.com','9353 Jacobson Key Apt. 380\nLaronfort, VA 57690-9531','2026-08-07 12:07:16','2026-08-07 12:07:16'),(14,'Mr. Kole Emard','0793334392','wolff.jakayla@example.net','9820 Pfannerstill Lodge\nSchroederside, NH 34132','2026-08-07 12:07:16','2026-08-07 12:07:16'),(15,'Edgar Raynor','0755431127','amelie03@example.com','791 Daisha Mount\nPowlowskiland, MN 67748-5606','2026-08-07 12:07:16','2026-08-07 12:07:16'),(16,'Amie McDermott','0763138833','madge84@example.com','31632 Ardith River\nEnochshire, NE 53259-6525','2026-08-07 12:07:16','2026-08-07 12:07:16'),(17,'Susanna Emmerich','0762107186','rempel.manuel@example.com','2476 Daniel Pike Apt. 903\nNorth Lucile, AR 61839','2026-08-07 12:07:16','2026-08-07 12:07:16'),(18,'Jordane Dickens PhD','0781609034','epredovic@example.org','3027 Josefina Fords\nLake Pattie, MT 50265-5748','2026-08-07 12:07:16','2026-08-07 12:07:16'),(19,'Rowena Kulas','0780548604','veum.zula@example.com','926 Rowe Estates\nRodrigueztown, NH 45339-6192','2026-08-07 12:07:16','2026-08-07 12:07:16'),(20,'Tyler Leuschke','0771361326','rebecca.altenwerth@example.com','216 Tatyana Motorway\nGutkowskiside, NE 79615','2026-08-07 12:07:16','2026-08-07 12:07:16'),(21,'Zackery Stroman','0777564352','marquardt.vinnie@example.net','435 Chris Forks\nMuraziktown, GA 36688','2026-08-07 12:07:16','2026-08-07 12:07:16'),(22,'Prof. Freeman Treutel V','0736339611','marshall.leuschke@example.org','35356 Murray Glens\nSouth Luellastad, OR 20059','2026-08-07 12:07:16','2026-08-07 12:07:16'),(23,'Timmothy Orn V','0763504673','otis69@example.net','372 Hoeger Rapids\nLake Oswald, NV 12603','2026-08-07 12:07:16','2026-08-07 12:07:16'),(24,'Amely Frami','0721041534','keeley.gusikowski@example.net','8445 Heaven Branch\nStromanmouth, OR 81086-0819','2026-08-07 12:07:16','2026-08-07 12:07:16'),(25,'Freddy Rosenbaum V','0797680891','selina.bashirian@example.net','4216 Constantin Shores\nTremblayfort, UT 14753','2026-08-07 12:07:16','2026-08-07 12:07:16'),(26,'Prof. Arlene Fahey','0774223084','vbartoletti@example.net','5465 Yundt Landing\nWest Jace, WY 54302-2410','2026-08-07 12:07:16','2026-08-07 12:07:16'),(27,'Ms. Eda Armstrong Jr.','0771119293','nikolaus.janie@example.net','6030 Nedra Shore Apt. 794\nPort Bertrand, WY 51947-6368','2026-08-07 12:07:16','2026-08-07 12:07:16'),(28,'Mr. Issac Veum','0724153541','iwalsh@example.org','5870 Lempi Ridges\nMedhurstchester, TN 90859-6849','2026-08-07 12:07:16','2026-08-07 12:07:16'),(29,'Sabrina Leannon II','0753934657','renner.zakary@example.net','373 Hettinger Rapids Apt. 462\nKingmouth, KY 99836-5572','2026-08-07 12:07:16','2026-08-07 12:07:16'),(30,'Prof. Jordan Marvin PhD','0765076939','feeney.alize@example.com','377 Lynch Crest Apt. 408\nSchulistland, ME 91119','2026-08-07 12:07:16','2026-08-07 12:07:16'),(31,'Brenda Miller','0763353577','yolanda95@example.com','8998 O\'Kon Camp Suite 757\nMarcellafort, TX 74510-9600','2026-08-07 12:07:16','2026-08-07 12:07:16'),(32,'Prof. Elbert Berge','0773870653','bessie.cronin@example.org','2415 Wiley Fords Apt. 921\nWest Jaren, NJ 60943-5105','2026-08-07 12:07:16','2026-08-07 12:07:16'),(33,'Kristofer Schultz','0746134006','khamill@example.org','33901 Jessyca Forge Apt. 197\nHandport, WV 75592','2026-08-07 12:07:16','2026-08-07 12:07:16'),(34,'Dr. Kyla Trantow','0775955355','koelpin.randy@example.org','699 Maudie Way\nNew Jonathan, TN 92267-7824','2026-08-07 12:07:16','2026-08-07 12:07:16'),(35,'Euna Fisher','0769968741','vpouros@example.org','69943 Eda Haven Apt. 852\nOtischester, NH 06240','2026-08-07 12:07:16','2026-08-07 12:07:16'),(36,'Rosamond Volkman','0710171286','casper.fiona@example.net','3545 Elvis Mission Apt. 296\nAnaisside, NY 85555-8180','2026-08-07 12:07:16','2026-08-07 12:07:16'),(37,'Prof. Vanessa Jacobs I','0747840904','gia.emard@example.com','2848 Skiles Land\nHackettmouth, GA 50145','2026-08-07 12:07:16','2026-08-07 12:07:16'),(38,'Annabel Terry','0745187128','lheathcote@example.org','4799 Glenna Garden\nGulgowskiville, AR 42029','2026-08-07 12:07:16','2026-08-07 12:07:16'),(39,'Lloyd Doyle','0735983523','tjacobs@example.com','38995 Prohaska Hollow\nGlovertown, MI 04266','2026-08-07 12:07:16','2026-08-07 12:07:16'),(40,'Erika Cummings','0730527615','jillian.kulas@example.com','6649 Granville Roads\nSouth Maidashire, KS 80857-1797','2026-08-07 12:07:16','2026-08-07 12:07:16'),(41,'Prof. Timothy Schinner III','0763047026','lauren.langosh@example.com','137 Ziemann Mission\nSouth Rosalia, PA 54909-8942','2026-08-07 12:07:16','2026-08-07 12:07:16'),(42,'Mr. Amos Windler','0734967313','doyle.gonzalo@example.net','901 Emmerich Route Apt. 078\nLake Catharine, MA 92480','2026-08-07 12:07:16','2026-08-07 12:07:16'),(43,'Ms. Bert Schimmel MD','0792812684','zmonahan@example.com','5763 London Fall\nHartmannfurt, RI 19910','2026-08-07 12:07:16','2026-08-07 12:07:16'),(44,'Mikel Kihn','0728579086','wilderman.vance@example.org','243 Alyson Canyon Suite 288\nAlizafurt, CT 43651-7558','2026-08-07 12:07:16','2026-08-07 12:07:16'),(45,'Melody Kilback DDS','0768894390','tmarks@example.com','1031 Marcelle Junctions\nKylatown, CA 97935-5006','2026-08-07 12:07:16','2026-08-07 12:07:16'),(46,'Peyton Padberg','0746464107','jstroman@example.com','4684 Lupe Rue\nJenningsfurt, NY 00637-7393','2026-08-07 12:07:16','2026-08-07 12:07:16'),(47,'Dr. Drake Grady PhD','0768125795','jokuneva@example.com','8546 Sonya Freeway\nKendraton, WY 24786','2026-08-07 12:07:16','2026-08-07 12:07:16'),(48,'Ellen Kris','0755249728','eda.larkin@example.org','380 Rippin Canyon\nSouth Lavina, AL 79008-4713','2026-08-07 12:07:16','2026-08-07 12:07:16'),(49,'Garrison Torp','0738493788','jacobi.ike@example.com','19010 Klein Village Suite 668\nKatherineshire, TN 01157','2026-08-07 12:07:16','2026-08-07 12:07:16'),(50,'Prof. Lisandro Schmidt DVM','0778909133','lnienow@example.com','3090 Erick Mount Suite 540\nRohanshire, TX 77506','2026-08-07 12:07:16','2026-08-07 12:07:16');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `class` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `group` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `namespace` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `time` int NOT NULL,
  `batch` int unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2026-07-31-064631','App\\Database\\Migrations\\CreateCategoryTable','default','App',1786102362,1),(2,'2026-07-31-064700','App\\Database\\Migrations\\CreateProductsTable','default','App',1786102362,1),(3,'2026-07-31-092202','App\\Database\\Migrations\\CreateSuppliersTable','default','App',1786102362,1),(4,'2026-07-31-110730','App\\Database\\Migrations\\AddSupplierIdToProducts','default','App',1786102362,1),(5,'2026-08-04-082326','App\\Database\\Migrations\\CreatePurchasesTable','default','App',1786102362,1),(6,'2026-08-04-082518','App\\Database\\Migrations\\CreatePurchaseItemsTable','default','App',1786102362,1),(7,'2026-08-05-060000','App\\Database\\Migrations\\CreateUsersTable','default','App',1786102362,1),(8,'2026-08-05-070000','App\\Database\\Migrations\\CreateCustomersTable','default','App',1786102362,1),(9,'2026-08-05-074450','App\\Database\\Migrations\\CreateSalesTable','default','App',1786102362,1),(10,'2026-08-05-074640','App\\Database\\Migrations\\CreateSaleItemsTable','default','App',1786102362,1),(11,'2026-08-13-072259','App\\Database\\Migrations\\AddPaymentReferenceToSales','default','App',1786606100,2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `sku` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `barcode` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `category_id` bigint unsigned NOT NULL,
  `supplier_id` bigint unsigned DEFAULT NULL,
  `brand` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `unit` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Piece',
  `cost_price` decimal(10,2) NOT NULL,
  `selling_price` decimal(10,2) NOT NULL,
  `stock` int NOT NULL DEFAULT '0',
  `min_stock` int NOT NULL DEFAULT '5',
  `status` enum('Active','Inactive') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Active',
  `image` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `sku` (`sku`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'PRD000001','628000000001','Coca-Cola Original 500ml',1,6,'Coca-Cola','Bottle',55.00,80.00,135,10,'Active','1786342753_e8640ea32b76f2fbd991.jpeg','2026-08-07 15:00:11','2026-08-10 09:19:13'),(2,'PRD000002','628000000002','Coca-Cola Zero 500ml',1,6,'Coca-Cola','Bottle',55.00,80.00,52,10,'Active','1786342769_86cf3db75f159645a385.jpeg','2026-08-07 15:00:11','2026-08-10 09:19:29'),(3,'PRD000003','628000000003','Fanta Orange 500ml',1,6,'Fanta','Bottle',55.00,80.00,66,10,'Active','1786342890_8278ab39b63c2f5c7bf0.jpeg','2026-08-07 15:00:11','2026-08-10 09:21:30'),(4,'PRD000004','628000000004','Sprite 500ml',1,6,'Sprite','Bottle',55.00,80.00,139,10,'Active','1786343008_52d5de7c1ee3aa46747d.jpeg','2026-08-07 15:00:11','2026-08-10 09:23:28'),(5,'PRD000005','628000000005','Krest Bitter Lemon 300ml',1,6,'Krest','Bottle',60.00,90.00,69,10,'Active','1786342942_424fd96e46535d69f3dd.jpeg','2026-08-07 15:00:11','2026-08-10 09:22:22'),(6,'PRD000006','628000000006','Minute Maid Mango 400ml',1,6,'Minute Maid','Bottle',70.00,100.00,107,10,'Active','1786343063_3a6b273ccffaa621d432.jpeg','2026-08-07 15:00:11','2026-08-10 09:24:23'),(7,'PRD000007','628000000007','Dasani Water 1L',1,6,'Dasani','Bottle',45.00,70.00,23,10,'Active','1786342839_3d10f2114590af143ef6.jpeg','2026-08-07 15:00:11','2026-08-10 09:20:39'),(8,'PRD000008','628000000008','Predator Energy Drink',1,6,'Predator','Can',85.00,120.00,79,10,'Active','1786107490_54a3d9e089f38beafdca.jpeg','2026-08-07 15:00:11','2026-08-07 15:58:10'),(9,'PRD000009','628000000009','Stoney Tangawizi 500ml',1,6,'Stoney','Bottle',60.00,90.00,150,10,'Active','1786343134_3eb7f1387cd21a512e8e.jpeg','2026-08-07 15:00:11','2026-08-10 09:25:34'),(10,'PRD000010','628000000010','Schweppes Tonic 300ml',1,6,'Schweppes','Bottle',65.00,95.00,58,10,'Active','1786343368_57773fd4d7d2a046560e.jpeg','2026-08-07 15:00:11','2026-08-10 09:29:28'),(11,'PRD000011','628000000011','Unga Maize Flour 2kg',2,7,'Jogoo','Pack',145.00,180.00,66,10,'Active','1786343416_1a39803a189cc54dda83.jpeg','2026-08-07 15:00:11','2026-08-13 10:29:29'),(12,'PRD000012','628000000012','Hostess Wheat Flour 2kg',2,7,'Hostess','Pack',170.00,210.00,150,10,'Active','1786343454_29feff5729a18ff46e9a.jpeg','2026-08-07 15:00:11','2026-08-10 09:30:54'),(13,'PRD000013','628000000013','Pishori Rice 2kg',2,9,'Pishori','Pack',280.00,350.00,102,10,'Active','1786343544_a96328d0cf33c60fa182.jpeg','2026-08-07 15:00:11','2026-08-10 09:32:24'),(14,'PRD000014','628000000014','Sunlit Salt 1kg',2,9,'Sunlit','Pack',45.00,65.00,109,10,'Active','1786343629_1ce75a6eedef0539c3e6.jpeg','2026-08-07 15:00:11','2026-08-10 09:33:49'),(15,'PRD000015','628000000015','Ndume Beans 2kg',2,9,'Ndume','Pack',250.00,320.00,74,10,'Active','1786343699_74b3c16ac0296472316f.jpeg','2026-08-07 15:00:11','2026-08-10 09:34:59'),(16,'PRD000016','628000000016','Ajab Maize Flour 2kg',2,9,'Ajab','Pack',150.00,185.00,144,10,'Active','1786343995_eb09fec12750867dd78d.jpeg','2026-08-07 15:00:11','2026-08-13 10:29:29'),(17,'PRD000017','628000000017','Brown Sugar 2kg',2,9,'Mumias','Pack',240.00,300.00,146,10,'Active','1786344035_5115ad4a9d0a35e4ba9b.jpeg','2026-08-07 15:00:11','2026-08-13 13:03:50'),(18,'PRD000018','628000000018','White Sugar 2kg',2,9,'Kabras','Pack',230.00,290.00,81,10,'Active','1786344095_841138e1dd2cdb9cdce4.jpeg','2026-08-07 15:00:11','2026-08-10 09:41:35'),(19,'PRD000019','628000000019','Blue Band 500g',2,9,'Blue Band','Tub',220.00,280.00,32,10,'Active','1786344142_1a3f7b5fbd9c7093d860.jpeg','2026-08-07 15:00:11','2026-08-10 09:43:22'),(20,'PRD000020','628000000020','Prestige Margarine 250g',2,9,'Prestige','Tub',120.00,160.00,128,10,'Active','1786344191_e34f9a3b4640c10f6913.jpeg','2026-08-07 15:00:11','2026-08-10 09:43:11'),(21,'PRD000021','628000000021','Potato Crisps Salted',3,8,'Kenafric','Pack',80.00,120.00,26,10,'Active','1786346207_8fcdf606c05d7dff1126.jpeg','2026-08-07 15:00:11','2026-08-10 10:16:47'),(22,'PRD000022','628000000022','Potato Crisps Chilli',3,8,'Kenafric','Pack',80.00,120.00,27,10,'Active','1786346584_6d9cd9008e84df0884ee.jpeg','2026-08-07 15:00:11','2026-08-10 10:23:04'),(23,'PRD000023','628000000023','Chevda 200g',3,8,'Kenafric','Pack',90.00,130.00,110,10,'Active','1786346539_5d176612537ea30f01aa.jpeg','2026-08-07 15:00:11','2026-08-13 13:03:50'),(24,'PRD000024','628000000024','Chocolate Cookies',3,8,'Kenafric','Pack',95.00,140.00,93,10,'Active','1786346519_7798ffcb0d4f850f27ee.jpeg','2026-08-07 15:00:11','2026-08-10 10:21:59'),(25,'PRD000025','628000000025','Digestive Biscuits',3,8,'Kenafric','Pack',110.00,160.00,81,10,'Active','1786346491_e5f6e4486f15ecdc8bab.jpeg','2026-08-07 15:00:11','2026-08-10 10:21:31'),(26,'PRD000026','628000000026','Chocolate Bar',3,8,'Kenafric','Bar',70.00,100.00,114,10,'Active','1786346470_78e9fc3565e626e20648.jpeg','2026-08-07 15:00:11','2026-08-10 10:21:10'),(27,'PRD000027','628000000027','Lollipop Mix',3,8,'Kenafric','Pack',60.00,90.00,76,10,'Active','1786344926_01f10111a5cfd3cd5dd9.jpeg','2026-08-07 15:00:11','2026-08-10 09:55:26'),(28,'PRD000028','628000000028','Bubble Gum',3,8,'Kenafric','Pack',40.00,70.00,71,10,'Active','1786344881_13401e8f5b1335e956da.jpeg','2026-08-07 15:00:11','2026-08-10 09:54:41'),(29,'PRD000029','628000000029','Salted Peanuts 250g',3,8,'Kenafric','Pack',100.00,150.00,101,10,'Active','1786346445_c7dc395d61cb8e312166.jpeg','2026-08-07 15:00:11','2026-08-10 10:20:45'),(30,'PRD000030','628000000030','Popcorn Butter',3,8,'Kenafric','Pack',85.00,125.00,66,10,'Active','1786346425_91fccdfca0a0c471db7d.jpeg','2026-08-07 15:00:11','2026-08-10 10:20:25'),(31,'PRD000031','628000000031','Lux Soap Pink',4,10,'Lux','Bar',80.00,120.00,113,10,'Active','1786346404_834fec6f2689753b3c0a.jpeg','2026-08-07 15:00:11','2026-08-10 10:20:04'),(32,'PRD000032','628000000032','Lux Soap White',4,10,'Lux','Bar',80.00,120.00,34,10,'Active','1786346378_36f1a040322124d7b638.jpeg','2026-08-07 15:00:11','2026-08-10 10:19:38'),(33,'PRD000033','628000000033','Lifebuoy Soap',4,10,'Lifebuoy','Bar',85.00,125.00,88,10,'Active','1786346334_aa6c504dbd2e983986a2.jpeg','2026-08-07 15:00:11','2026-08-10 10:18:54'),(34,'PRD000034','628000000034','Close-Up Toothpaste',4,10,'Close-Up','Tube',120.00,180.00,109,10,'Active','1786345056_aa70152deacb1967bb0a.jpeg','2026-08-07 15:00:11','2026-08-10 09:57:36'),(35,'PRD000035','628000000035','Pepsodent Toothpaste',4,10,'Pepsodent','Tube',120.00,180.00,74,10,'Active','1786346315_027b23aaa49936fd8b8d.jpeg','2026-08-07 15:00:11','2026-08-10 10:18:35'),(36,'PRD000036','628000000036','Sunsilk Shampoo',4,10,'Sunsilk','Bottle',250.00,340.00,49,10,'Active','1786346281_3413ca5aec1ab99a1f12.jpeg','2026-08-07 15:00:11','2026-08-10 10:18:01'),(37,'PRD000037','628000000037','Dove Shampoo',4,8,'Dove','Bottle',320.00,430.00,31,10,'Active','1786346245_63cf04b366b6eee1720a.jpeg','2026-08-07 15:00:11','2026-08-10 10:17:25'),(38,'PRD000038','628000000038','Vaseline Lotion 400ml',4,10,'Vaseline','Bottle',450.00,600.00,117,10,'Active','1786346224_5cabde89d3816064308c.jpeg','2026-08-07 15:00:11','2026-08-10 10:17:04'),(39,'PRD000039','628000000039','Rexona Roll On',4,10,'Rexona','Bottle',260.00,350.00,131,10,'Active','1786344960_b4e107bd949864bb238a.jpeg','2026-08-07 15:00:11','2026-08-10 09:56:00'),(40,'PRD000040','628000000040','Signal Toothbrush',4,10,'Signal','Piece',80.00,120.00,63,10,'Active','1786344814_454a5454c7d51245697e.jpeg','2026-08-07 15:00:11','2026-08-10 09:53:34'),(41,'PRD000041','628000000041','Gele Dishwashing Liquid',5,10,'Gele','Bottle',170.00,240.00,31,10,'Active','1786344687_70928d24463e2a4a3fbf.jpeg','2026-08-07 15:00:11','2026-08-10 09:51:27'),(42,'PRD000042','628000000042','Power Boy Soap',5,10,'Power Boy','Bar',75.00,110.00,126,10,'Active','1786344648_64c8d4d0a9c4b684f8e0.jpeg','2026-08-07 15:00:11','2026-08-10 09:50:48'),(43,'PRD000043','628000000043','White Wash Detergent',5,10,'White Wash','Pack',180.00,260.00,31,10,'Active','1786344615_e81bc3b901496a2eaf87.jpeg','2026-08-07 15:00:11','2026-08-10 09:50:15'),(44,'PRD000044','628000000044','Jik Bleach 750ml',5,10,'Jik','Bottle',150.00,220.00,55,10,'Active','1786344554_b49d96c487f3f5d7f496.jpeg','2026-08-07 15:00:11','2026-08-10 09:49:14'),(45,'PRD000045','628000000045','Harpic Toilet Cleaner',5,10,'Harpic','Bottle',220.00,300.00,75,10,'Active','1786344516_6a279a27bb1f521b132b.jpeg','2026-08-07 15:00:11','2026-08-10 09:48:36'),(46,'PRD000046','628000000046','Air Freshener Lemon',5,10,'Glade','Can',300.00,420.00,27,10,'Active','1786344478_6f6d7112a7c717a15607.jpeg','2026-08-07 15:00:11','2026-08-10 09:47:58'),(47,'PRD000047','628000000047','Kitchen Towels',5,10,'Nice & Soft','Pack',180.00,260.00,80,10,'Active','1786344417_9f4f5a923e3b25f40ef5.jpeg','2026-08-07 15:00:11','2026-08-10 09:46:57'),(48,'PRD000048','628000000048','Toilet Tissue 10 Pack',5,10,'Nice & Soft','Pack',420.00,550.00,93,10,'Active','1786344326_650dca67e34de845c203.jpeg','2026-08-07 15:00:11','2026-08-10 09:45:26'),(49,'PRD000049','628000000049','Garbage Bags Large',5,10,'Bidco','Pack',160.00,230.00,57,10,'Active','1786344286_16959f4e75a0971bc13e.jpeg','2026-08-07 15:00:11','2026-08-10 09:44:46'),(50,'PRD000050','628000000050','Scouring Pad',5,10,'Scotch Brite','Piece',45.00,70.00,91,10,'Active','1786344242_538d5ed830fe5c64a1dc.jpeg','2026-08-07 15:00:11','2026-08-10 09:44:02'),(52,'PRD-000051','602071899151','Monster Energy Original 500ml',1,6,'Monster','Can',180.00,250.00,80,5,'Active','1786107238_31fe78c38fb54d551540.png','2026-08-07 15:53:58','2026-08-07 15:53:58');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchase_items`
--

DROP TABLE IF EXISTS `purchase_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `purchase_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `purchase_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `quantity` bigint unsigned NOT NULL,
  `unit_cost` decimal(15,2) NOT NULL,
  `subtotal` decimal(15,2) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `purchase_id` (`purchase_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `purchase_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `purchase_items_purchase_id_foreign` FOREIGN KEY (`purchase_id`) REFERENCES `purchases` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchase_items`
--

LOCK TABLES `purchase_items` WRITE;
/*!40000 ALTER TABLE `purchase_items` DISABLE KEYS */;
INSERT INTO `purchase_items` VALUES (1,1,24,20,95.00,1900.00,'2026-08-13 07:01:08','2026-08-13 07:01:08');
/*!40000 ALTER TABLE `purchase_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `purchases`
--

DROP TABLE IF EXISTS `purchases`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `purchases` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `purchase_number` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `supplier_id` bigint unsigned NOT NULL,
  `purchase_date` date NOT NULL,
  `status` enum('Pending','Received','Cancelled') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Pending',
  `total_amount` decimal(15,2) NOT NULL DEFAULT '0.00',
  `notes` text COLLATE utf8mb4_general_ci,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `purchase_number` (`purchase_number`),
  KEY `supplier_id` (`supplier_id`),
  CONSTRAINT `purchases_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `purchases`
--

LOCK TABLES `purchases` WRITE;
/*!40000 ALTER TABLE `purchases` DISABLE KEYS */;
INSERT INTO `purchases` VALUES (1,'PUR-20260813070108',10,'2026-08-13','Pending',1900.00,'','2026-08-13 07:01:08','2026-08-13 07:01:08');
/*!40000 ALTER TABLE `purchases` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sale_items`
--

DROP TABLE IF EXISTS `sale_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sale_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `sale_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned NOT NULL,
  `quantity` decimal(15,2) NOT NULL DEFAULT '1.00',
  `unit_price` decimal(15,2) NOT NULL DEFAULT '0.00',
  `discount` decimal(15,2) NOT NULL DEFAULT '0.00',
  `tax` decimal(15,2) NOT NULL DEFAULT '0.00',
  `total` decimal(15,2) NOT NULL DEFAULT '0.00',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sale_id` (`sale_id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `sale_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `sale_items_sale_id_foreign` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sale_items`
--

LOCK TABLES `sale_items` WRITE;
/*!40000 ALTER TABLE `sale_items` DISABLE KEYS */;
INSERT INTO `sale_items` VALUES (1,1,16,1.00,185.00,0.00,29.60,214.60,'2026-08-13 07:28:31','2026-08-13 07:28:31'),(2,2,11,1.00,180.00,0.00,28.80,208.80,'2026-08-13 07:29:29','2026-08-13 07:29:29'),(3,2,16,1.00,185.00,0.00,29.60,214.60,'2026-08-13 07:29:29','2026-08-13 07:29:29'),(4,3,23,1.00,130.00,0.00,20.80,150.80,'2026-08-13 10:03:50','2026-08-13 10:03:50'),(5,3,17,1.00,300.00,0.00,48.00,348.00,'2026-08-13 10:03:50','2026-08-13 10:03:50');
/*!40000 ALTER TABLE `sale_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sales`
--

DROP TABLE IF EXISTS `sales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sales` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `invoice_number` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `customer_id` bigint unsigned DEFAULT NULL,
  `user_id` bigint unsigned NOT NULL,
  `sale_date` datetime NOT NULL,
  `subtotal` decimal(15,2) NOT NULL DEFAULT '0.00',
  `discount` decimal(15,2) NOT NULL DEFAULT '0.00',
  `tax` decimal(15,2) NOT NULL DEFAULT '0.00',
  `total` decimal(15,2) NOT NULL DEFAULT '0.00',
  `payment_method` varchar(30) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Cash',
  `payment_reference` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `amount_paid` decimal(15,2) NOT NULL DEFAULT '0.00',
  `change_amount` decimal(15,2) NOT NULL DEFAULT '0.00',
  `notes` text COLLATE utf8mb4_general_ci,
  `status` enum('Draft','Completed','Cancelled') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Completed',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `invoice_number` (`invoice_number`),
  KEY `customer_id` (`customer_id`),
  KEY `user_id` (`user_id`),
  KEY `sale_date` (`sale_date`),
  KEY `status` (`status`),
  CONSTRAINT `sales_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE SET NULL,
  CONSTRAINT `sales_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sales`
--

LOCK TABLES `sales` WRITE;
/*!40000 ALTER TABLE `sales` DISABLE KEYS */;
INSERT INTO `sales` VALUES (1,'INV-20260813072831-C14C',NULL,4,'2026-08-13 07:28:31',185.00,0.00,29.60,214.60,'Cash',NULL,250.00,35.40,NULL,'Completed','2026-08-13 07:28:31','2026-08-13 07:28:31'),(2,'INV-20260813072929-4C5E',NULL,4,'2026-08-13 07:29:29',365.00,0.00,58.40,423.40,'M-Pesa','MPESA005',423.40,0.00,NULL,'Completed','2026-08-13 07:29:29','2026-08-13 07:29:29'),(3,'INV-20260813100350-B7F3',NULL,4,'2026-08-13 10:03:50',430.00,0.00,68.80,498.80,'Cash',NULL,500.00,1.20,NULL,'Completed','2026-08-13 10:03:50','2026-08-13 10:03:50');
/*!40000 ALTER TABLE `sales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suppliers`
--

DROP TABLE IF EXISTS `suppliers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `suppliers` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `supplier_code` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `contact_person` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_general_ci,
  `status` enum('Active','Inactive') COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Active',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `supplier_code` (`supplier_code`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suppliers`
--

LOCK TABLES `suppliers` WRITE;
/*!40000 ALTER TABLE `suppliers` DISABLE KEYS */;
INSERT INTO `suppliers` VALUES (6,'SUP001','Coca-Cola Beverages Kenya','John Mwangi','0712345678','orders@coca-cola.co.ke','Nairobi, Kenya','Active',NULL,NULL),(7,'SUP002','Unga Limited','Grace Wanjiku','0723456789','sales@unga.com','Nairobi, Kenya','Active',NULL,NULL),(8,'SUP003','Kenafric Industries','Peter Otieno','0734567890','info@kenafric.com','Nairobi, Kenya','Active',NULL,NULL),(9,'SUP004','Unilever Kenya','Mary Njeri','0745678901','support@unilever.co.ke','Nairobi, Kenya','Active',NULL,NULL),(10,'SUP005','Bidco Africa','David Kiptoo','0756789012','orders@bidcoafrica.com','Thika, Kenya','Active',NULL,NULL);
/*!40000 ALTER TABLE `suppliers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `role` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Cashier',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Administrator','admin@dukapro.test','$2y$12$XgqYm6MOhAlPNAAvB9R43.nPoTBZ4Bzwv6z8xpCXOk/1liWiP99Dy','Administrator','2026-08-11 11:04:17','2026-08-11 11:04:17'),(4,'Cashier','cashier@dukapro.test','$2y$12$9.Cun/stG1BagQcY9cYt.e.J/gVClc18cghHDJWFzN0sWfUSZxdeO','Cashier','2026-08-12 12:20:17','2026-08-12 12:20:17');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
SET @@SESSION.SQL_LOG_BIN = @MYSQLDUMP_TEMP_LOG_BIN;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-08-14  9:17:29
