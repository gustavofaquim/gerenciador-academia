-- MySQL dump 10.13  Distrib 8.0.34, for Linux (x86_64)
--
-- Host: localhost    Database: gerenciador_academia
-- ------------------------------------------------------
-- Server version	8.0.34-0ubuntu0.22.04.1

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
-- Table structure for table `training`
--

DROP TABLE IF EXISTS `training`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `training` (
  `name` varchar(100) NOT NULL,
  `description` varchar(2000) DEFAULT NULL,
  `id` int NOT NULL AUTO_INCREMENT,
  `image` varchar(400) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `training`
--

LOCK TABLES `training` WRITE;
/*!40000 ALTER TABLE `training` DISABLE KEYS */;
INSERT INTO `training` VALUES ('Levantamento Terra','É um exercício potente e dos melhores para hipertrofia por ser bastante global e com grande amplitude articula. Ele trabalha a intensamente as musculaturas de membro inferiores e extensores da coluna. Além disso, existe um bom recrutamento da maioria da musculatura do core, necessários para estabilização lombar. Esse tipo de repetição trabalha boa parte da musculatura ao mesmo tempo, e com isso gera mais estímulo e força;',4,'64de2c07e1896.jpg'),('Supino Reto','Trabalha toda a região do peitoral, tríceps e ombros. Quando utilizado volumes e cargas adequadas podemos gerar a hipertrofia do tríceps e dos deltoides com crescimento muscular equilibrado. É a série mais completa para o peitoral;',5,'64de2dffca91d.jpg'),('Remanda Curvada com Barra','É o movimento com maior potencial para gerar massa muscular nas costas por sem bastante complexo e envolver grande volume muscular.',6,'64df6580ee16d.jpg'),('Maquina adutora','Uma série muito comum para a região das coxas é o adutor, que trabalha a parte interna das coxas. Esta atividade consiste em uma espécie de cadeira na qual a pessoa irá se sentar e realizar movimentos de fechamento e abertura das pernas e há a possibilidade de adicionar peso a isso.',8,'64df63dd4514c.jpeg');
/*!40000 ALTER TABLE `training` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `type` varchar(50) NOT NULL,
  `last_name` varchar(80) DEFAULT NULL,
  `birth` date DEFAULT NULL,
  `comments` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (11,'Adm','adm','$2y$10$MrnIoUQ8fC/ZaXxoJr4ZWeW2ObWWzqC4jKZayjj6ybzK1g/8wMmhK','adm','Adm','2001-01-01','');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-08-18  9:42:18
