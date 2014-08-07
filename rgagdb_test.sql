-- MySQL dump 10.13  Distrib 5.6.17, for Win64 (x86_64)
--
-- Host: localhost    Database: rgagdb
-- ------------------------------------------------------
-- Server version	5.6.17

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
-- Table structure for table `comentario`
--

DROP TABLE IF EXISTS `comentario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comentario` (
  `comentario_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comentario_imagen_id` int(10) unsigned NOT NULL,
  `comentario_fecha` datetime,
  `comentario_usuario_id` int(10) unsigned NOT NULL,
  `comentario_comentari` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`comentario_id`),
  KEY `comentario_imagen_id` (`comentario_imagen_id`),
  KEY `comentario_usuario_id` (`comentario_usuario_id`),
  CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`comentario_imagen_id`) REFERENCES `imagen` (`imagen_id`),
  CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`comentario_usuario_id`) REFERENCES `usuario` (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentario`
--

LOCK TABLES `comentario` WRITE;
/*!40000 ALTER TABLE `comentario` DISABLE KEYS */;
INSERT INTO `comentario` VALUES (1,1,'2014-06-11 23:49:32',3,'Es el flame champion!!!'),(3,2,'2014-06-11 23:56:07',3,'Op op op!!'),(4,3,'2014-06-12 00:13:06',3,'Screenshot op'),(5,2,'2014-06-12 09:22:13',3,'El mejor teclado del universo universal');
/*!40000 ALTER TABLE `comentario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imagen`
--

DROP TABLE IF EXISTS `imagen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `imagen` (
  `imagen_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `imagen_titulo` varchar(150) DEFAULT 'TITULO IMAGEN',
  `imagen_nombre` varchar(100) DEFAULT NULL,
  `imagen_seccion` enum('gif','comic','topic') DEFAULT 'topic',
  `imagen_impresion` bigint(20) unsigned DEFAULT NULL,
  `imagen_voto_negativo` bigint(20) unsigned DEFAULT '0',
  `imagen_voto_positivo` bigint(20) unsigned DEFAULT '0',
  `imagen_fecha_subida` datetime,
  `imagen_fecha_moderada` datetime DEFAULT '0000-00-00 00:00:00',
  `imagen_estado` enum('PENDIENTE','APROBADA','DESAPROBADA') DEFAULT 'PENDIENTE',
  PRIMARY KEY (`imagen_id`),
  KEY `key_imagen_id` (`imagen_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imagen`
--

LOCK TABLES `imagen` WRITE;
/*!40000 ALTER TABLE `imagen` DISABLE KEYS */;
INSERT INTO `imagen` VALUES (1,'Flame champion','Flame_Champion_KH_Dead_Alive_by_Frozen_Knight.jpg','comic',0,0,1,'2014-06-11 23:43:53','0000-00-00 00:00:00','APROBADA'),(2,'Keygram','Promocionalbeta.png','topic',0,1,2,'2014-06-11 23:53:42','2014-06-11 23:53:51','APROBADA'),(3,'Screenshot','AcentosOP.png','comic',0,0,0,'2014-06-12 00:09:17','0000-00-00 00:00:00','APROBADA'),(4,'Que es esta porquerÃ­a?','aLKrBOP_700b_v3.jpg','gif',0,0,0,'2014-06-12 00:10:16','0000-00-00 00:00:00','APROBADA'),(5,'Chiquita','portrait_50_yellow.png','comic',0,0,0,'2014-06-12 09:22:49','0000-00-00 00:00:00','APROBADA'),(6,'Blaze','bladearts113_zps94beeb89.jpg','comic',0,0,0,'2014-06-12 10:01:42','0000-00-00 00:00:00','DESAPROBADA');
/*!40000 ALTER TABLE `imagen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_usuario`
--

DROP TABLE IF EXISTS `log_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_usuario` (
  `log_usuario_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `log_usuario_usuario_id` int(10) unsigned NOT NULL,
  `log_usuario_fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`log_usuario_id`),
  KEY `log_usuario_usuario_id` (`log_usuario_usuario_id`),
  CONSTRAINT `log_usuario_ibfk_1` FOREIGN KEY (`log_usuario_usuario_id`) REFERENCES `usuario` (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=253 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_usuario`
--

LOCK TABLES `log_usuario` WRITE;
/*!40000 ALTER TABLE `log_usuario` DISABLE KEYS */;
INSERT INTO `log_usuario` VALUES (1,1,'2014-06-11 23:05:59'),(2,1,'2014-06-11 23:05:59'),(3,1,'2014-06-11 23:06:00'),(4,1,'2014-06-11 23:06:42'),(5,1,'2014-06-11 23:06:42'),(6,1,'2014-06-11 23:06:44'),(7,1,'2014-06-11 23:06:48'),(8,1,'2014-06-11 23:06:50'),(9,2,'2014-06-11 23:26:28'),(10,2,'2014-06-11 23:26:28'),(11,3,'2014-06-11 23:26:46'),(12,3,'2014-06-11 23:27:38'),(13,3,'2014-06-11 23:27:39'),(14,3,'2014-06-11 23:33:02'),(15,3,'2014-06-11 23:33:44'),(16,3,'2014-06-11 23:33:55'),(17,3,'2014-06-11 23:34:17'),(18,3,'2014-06-11 23:34:33'),(19,3,'2014-06-11 23:35:42'),(20,3,'2014-06-11 23:38:07'),(21,3,'2014-06-11 23:38:07'),(22,3,'2014-06-11 23:38:09'),(23,3,'2014-06-11 23:38:11'),(24,3,'2014-06-11 23:38:36'),(25,3,'2014-06-11 23:38:37'),(26,3,'2014-06-11 23:38:45'),(27,3,'2014-06-11 23:38:46'),(28,3,'2014-06-11 23:38:47'),(29,3,'2014-06-11 23:38:54'),(30,3,'2014-06-11 23:38:55'),(31,3,'2014-06-11 23:39:01'),(32,4,'2014-06-11 23:39:07'),(33,4,'2014-06-11 23:39:08'),(34,4,'2014-06-11 23:43:53'),(35,3,'2014-06-11 23:47:27'),(36,3,'2014-06-11 23:47:28'),(37,3,'2014-06-11 23:47:29'),(38,3,'2014-06-11 23:47:34'),(39,3,'2014-06-11 23:49:16'),(40,3,'2014-06-11 23:49:17'),(41,3,'2014-06-11 23:49:20'),(42,3,'2014-06-11 23:49:22'),(43,3,'2014-06-11 23:49:22'),(44,3,'2014-06-11 23:49:32'),(45,3,'2014-06-11 23:49:36'),(46,3,'2014-06-11 23:49:39'),(47,3,'2014-06-11 23:49:40'),(48,3,'2014-06-11 23:49:44'),(49,3,'2014-06-11 23:49:49'),(50,3,'2014-06-11 23:49:49'),(51,3,'2014-06-11 23:49:50'),(52,3,'2014-06-11 23:49:52'),(53,3,'2014-06-11 23:53:42'),(54,3,'2014-06-11 23:53:46'),(55,3,'2014-06-11 23:53:49'),(56,3,'2014-06-11 23:53:52'),(57,3,'2014-06-11 23:53:53'),(58,3,'2014-06-11 23:53:54'),(59,3,'2014-06-11 23:55:00'),(60,3,'2014-06-11 23:55:00'),(61,3,'2014-06-11 23:55:05'),(62,3,'2014-06-11 23:55:05'),(63,3,'2014-06-11 23:55:16'),(64,3,'2014-06-11 23:55:20'),(65,3,'2014-06-11 23:55:22'),(66,3,'2014-06-11 23:55:23'),(67,3,'2014-06-11 23:55:56'),(68,3,'2014-06-11 23:55:57'),(69,3,'2014-06-11 23:55:58'),(70,3,'2014-06-11 23:55:58'),(71,3,'2014-06-11 23:56:06'),(72,3,'2014-06-11 23:56:07'),(73,3,'2014-06-11 23:56:07'),(74,3,'2014-06-11 23:56:10'),(75,3,'2014-06-11 23:56:11'),(76,3,'2014-06-12 00:08:13'),(77,3,'2014-06-12 00:08:13'),(78,3,'2014-06-12 00:08:27'),(79,3,'2014-06-12 00:09:18'),(80,3,'2014-06-12 00:09:18'),(81,3,'2014-06-12 00:09:22'),(82,3,'2014-06-12 00:09:26'),(83,3,'2014-06-12 00:09:26'),(84,3,'2014-06-12 00:09:28'),(85,3,'2014-06-12 00:09:36'),(86,3,'2014-06-12 00:09:37'),(87,3,'2014-06-12 00:09:38'),(88,3,'2014-06-12 00:09:43'),(89,3,'2014-06-12 00:09:44'),(90,3,'2014-06-12 00:09:49'),(91,3,'2014-06-12 00:09:51'),(92,3,'2014-06-12 00:10:17'),(93,3,'2014-06-12 00:10:17'),(94,3,'2014-06-12 00:10:18'),(95,3,'2014-06-12 00:10:22'),(96,3,'2014-06-12 00:10:23'),(97,3,'2014-06-12 00:10:29'),(98,3,'2014-06-12 00:11:48'),(99,3,'2014-06-12 00:11:49'),(100,3,'2014-06-12 00:12:10'),(101,3,'2014-06-12 00:12:11'),(102,3,'2014-06-12 00:12:39'),(103,3,'2014-06-12 00:12:41'),(104,3,'2014-06-12 00:12:41'),(105,3,'2014-06-12 00:12:42'),(106,3,'2014-06-12 00:12:57'),(107,3,'2014-06-12 00:13:00'),(108,3,'2014-06-12 00:13:00'),(109,3,'2014-06-12 00:13:06'),(110,3,'2014-06-12 00:13:06'),(111,3,'2014-06-12 00:13:07'),(112,3,'2014-06-12 00:13:10'),(113,3,'2014-06-12 00:13:13'),(114,3,'2014-06-12 00:13:13'),(115,3,'2014-06-12 00:13:20'),(116,3,'2014-06-12 00:13:20'),(117,3,'2014-06-12 00:13:23'),(118,3,'2014-06-12 00:13:27'),(119,3,'2014-06-12 00:13:29'),(120,3,'2014-06-12 00:13:31'),(121,3,'2014-06-12 00:13:32'),(122,3,'2014-06-12 00:13:34'),(123,3,'2014-06-12 00:13:35'),(124,3,'2014-06-12 00:13:36'),(125,3,'2014-06-12 00:13:41'),(126,2,'2014-06-12 00:15:09'),(127,2,'2014-06-12 00:15:10'),(128,2,'2014-06-12 00:15:13'),(129,2,'2014-06-12 00:15:15'),(130,2,'2014-06-12 00:15:21'),(131,2,'2014-06-12 00:15:23'),(132,2,'2014-06-12 09:21:12'),(133,3,'2014-06-12 09:21:45'),(134,3,'2014-06-12 09:21:46'),(135,3,'2014-06-12 09:21:51'),(136,3,'2014-06-12 09:21:51'),(137,3,'2014-06-12 09:22:13'),(138,3,'2014-06-12 09:22:13'),(139,3,'2014-06-12 09:22:13'),(140,3,'2014-06-12 09:22:14'),(141,3,'2014-06-12 09:22:14'),(142,3,'2014-06-12 09:22:15'),(143,3,'2014-06-12 09:22:15'),(144,3,'2014-06-12 09:22:25'),(145,3,'2014-06-12 09:22:27'),(146,3,'2014-06-12 09:22:33'),(147,3,'2014-06-12 09:22:50'),(148,3,'2014-06-12 09:22:50'),(149,3,'2014-06-12 09:22:51'),(150,3,'2014-06-12 09:23:16'),(151,3,'2014-06-12 09:23:17'),(152,3,'2014-06-12 09:23:18'),(153,3,'2014-06-12 09:24:05'),(154,3,'2014-06-12 09:24:13'),(155,3,'2014-06-12 09:24:19'),(156,3,'2014-06-12 09:24:34'),(157,3,'2014-06-12 09:24:44'),(158,2,'2014-06-12 09:24:52'),(159,2,'2014-06-12 09:24:52'),(160,2,'2014-06-12 09:24:56'),(161,2,'2014-06-12 09:25:27'),(162,2,'2014-06-12 09:25:31'),(163,2,'2014-06-12 09:26:04'),(164,3,'2014-06-12 09:26:16'),(165,3,'2014-06-12 09:26:16'),(166,3,'2014-06-12 09:34:49'),(167,3,'2014-06-12 09:34:50'),(168,3,'2014-06-12 09:35:13'),(169,3,'2014-06-12 09:35:13'),(170,3,'2014-06-12 09:35:38'),(171,3,'2014-06-12 09:35:39'),(172,3,'2014-06-12 09:36:12'),(173,3,'2014-06-12 09:36:13'),(174,3,'2014-06-12 09:36:51'),(175,3,'2014-06-12 09:36:52'),(176,3,'2014-06-12 09:37:39'),(177,3,'2014-06-12 09:37:39'),(178,3,'2014-06-12 09:37:53'),(179,3,'2014-06-12 09:37:54'),(180,3,'2014-06-12 09:38:40'),(181,3,'2014-06-12 09:38:40'),(182,3,'2014-06-12 09:38:57'),(183,3,'2014-06-12 09:38:58'),(184,3,'2014-06-12 09:39:09'),(185,3,'2014-06-12 09:39:10'),(186,3,'2014-06-12 09:39:41'),(187,3,'2014-06-12 09:39:41'),(188,3,'2014-06-12 09:41:06'),(189,3,'2014-06-12 09:41:07'),(190,3,'2014-06-12 09:41:24'),(191,3,'2014-06-12 09:41:25'),(192,3,'2014-06-12 09:57:29'),(193,3,'2014-06-12 10:00:22'),(194,3,'2014-06-12 10:00:22'),(195,3,'2014-06-12 10:00:26'),(196,3,'2014-06-12 10:00:30'),(197,3,'2014-06-12 10:00:41'),(198,5,'2014-06-12 10:00:47'),(199,5,'2014-06-12 10:00:48'),(200,5,'2014-06-12 10:00:51'),(201,5,'2014-06-12 10:00:52'),(202,5,'2014-06-12 10:01:00'),(203,5,'2014-06-12 10:01:00'),(204,5,'2014-06-12 10:01:01'),(205,5,'2014-06-12 10:01:03'),(206,5,'2014-06-12 10:01:04'),(207,5,'2014-06-12 10:01:04'),(208,5,'2014-06-12 10:01:12'),(209,5,'2014-06-12 10:01:12'),(210,5,'2014-06-12 10:01:13'),(211,5,'2014-06-12 10:01:43'),(212,5,'2014-06-12 10:01:43'),(213,5,'2014-06-12 10:01:47'),(214,5,'2014-06-12 10:01:55'),(215,3,'2014-06-12 10:02:01'),(216,3,'2014-06-12 10:02:02'),(217,3,'2014-06-12 10:02:04'),(218,3,'2014-06-12 10:02:22'),(219,3,'2014-06-12 10:02:23'),(220,3,'2014-06-12 10:02:24'),(221,3,'2014-06-12 10:02:28'),(222,3,'2014-06-12 10:02:34'),(223,3,'2014-06-12 10:02:38'),(224,3,'2014-06-12 10:02:40'),(225,3,'2014-06-12 10:02:50'),(226,3,'2014-06-12 10:02:51'),(227,3,'2014-06-12 10:02:52'),(228,3,'2014-06-12 10:02:58'),(229,3,'2014-06-12 10:03:17'),(230,3,'2014-06-12 10:03:20'),(231,5,'2014-06-12 10:03:25'),(232,5,'2014-06-12 10:03:26'),(233,5,'2014-06-12 10:03:30'),(234,5,'2014-06-12 10:03:31'),(235,5,'2014-06-12 10:03:32'),(236,5,'2014-06-12 10:03:39'),(237,2,'2014-06-12 10:03:47'),(238,2,'2014-06-12 10:03:48'),(239,2,'2014-06-12 10:03:49'),(240,2,'2014-06-12 10:03:59'),(241,2,'2014-06-12 10:04:29'),(242,2,'2014-06-12 10:04:35'),(243,3,'2014-06-12 10:04:40'),(244,3,'2014-06-12 10:04:41'),(245,3,'2014-06-12 10:04:43'),(246,3,'2014-06-12 10:04:43'),(247,3,'2014-06-12 10:04:52'),(248,3,'2014-06-12 10:04:53'),(249,3,'2014-06-12 10:04:54'),(250,3,'2014-06-12 10:04:54'),(251,3,'2014-06-12 11:59:51'),(252,3,'2014-06-12 11:59:53');
/*!40000 ALTER TABLE `log_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `usuario_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usuario_nombre` varchar(20) DEFAULT NULL,
  `usuario_password` varchar(40) DEFAULT NULL,
  `usuario_correo` varchar(100) DEFAULT NULL,
  `usuario_edad` tinyint(3) unsigned DEFAULT NULL,
  `usuario_status` enum('INACTIVO','ACTIVO','ELIMINADO') DEFAULT 'INACTIVO',
  `usuario_fecha_registro` datetime DEFAULT CURRENT_TIMESTAMP,
  `usuario_codigo_activacion` varchar(40) DEFAULT NULL,
  `usuario_rol` enum('USUARIO','MODERADOR','MODOP','WEBMASTER','ADMINISTRADOR') DEFAULT 'USUARIO',
  PRIMARY KEY (`usuario_id`),
  KEY `key_usuario_id` (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'admin','admin','admin@adm.in',28,'ACTIVO','2014-06-11 23:05:51',NULL,'ADMINISTRADOR'),(2,'administrador','99800b85d3383e3a2fb45eb7d0066a4879a9dad0','administrador@admin.in',33,'ACTIVO','2014-06-11 23:25:40',NULL,'ADMINISTRADOR'),(3,'webmaster','99800b85d3383e3a2fb45eb7d0066a4879a9dad0','administrador@admin.in',33,'ACTIVO','2014-06-11 23:26:12',NULL,'WEBMASTER'),(4,'carlos','99800b85d3383e3a2fb45eb7d0066a4879a9dad0','carlos@outlook.com',18,'ACTIVO','2014-06-11 23:27:20',NULL,'USUARIO'),(5,'carlosop','99800b85d3383e3a2fb45eb7d0066a4879a9dad0','carlos@hotmail.com',16,'ACTIVO','2014-06-12 09:59:39',NULL,'MODOP');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `voto`
--

DROP TABLE IF EXISTS `voto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `voto` (
  `voto_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `voto_imagen_id` int(10) unsigned NOT NULL,
  `voto_usuario_id` int(10) unsigned NOT NULL,
  `voto_valor` enum('-1','1') DEFAULT NULL,
  `voto_fecha` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`voto_id`),
  KEY `voto_imagen_id` (`voto_imagen_id`),
  KEY `voto_usuario_id` (`voto_usuario_id`),
  CONSTRAINT `voto_ibfk_1` FOREIGN KEY (`voto_imagen_id`) REFERENCES `imagen` (`imagen_id`),
  CONSTRAINT `voto_ibfk_2` FOREIGN KEY (`voto_usuario_id`) REFERENCES `usuario` (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `voto`
--

LOCK TABLES `voto` WRITE;
/*!40000 ALTER TABLE `voto` DISABLE KEYS */;
INSERT INTO `voto` VALUES (1,1,3,'1','2014-06-11 23:49:49'),(2,2,5,'1','2014-06-12 10:01:00'),(3,2,5,'1','2014-06-12 10:01:03'),(4,2,5,'-1','2014-06-12 10:01:12');
/*!40000 ALTER TABLE `voto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `voto_moderador`
--

DROP TABLE IF EXISTS `voto_moderador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `voto_moderador` (
  `voto_moderador_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `voto_moderador_imagen_id` int(10) unsigned NOT NULL,
  `voto_moderador_usuario_id` int(10) unsigned NOT NULL,
  `voto_tipo` enum('APROBADA','DESAPROBADA') DEFAULT NULL,
  PRIMARY KEY (`voto_moderador_id`),
  KEY `voto_moderador_imagen_id` (`voto_moderador_imagen_id`),
  KEY `voto_moderador_usuario_id` (`voto_moderador_usuario_id`),
  CONSTRAINT `voto_moderador_ibfk_1` FOREIGN KEY (`voto_moderador_imagen_id`) REFERENCES `imagen` (`imagen_id`),
  CONSTRAINT `voto_moderador_ibfk_2` FOREIGN KEY (`voto_moderador_usuario_id`) REFERENCES `usuario` (`usuario_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `voto_moderador`
--

LOCK TABLES `voto_moderador` WRITE;
/*!40000 ALTER TABLE `voto_moderador` DISABLE KEYS */;
INSERT INTO `voto_moderador` VALUES (1,3,3,'APROBADA'),(2,3,3,'APROBADA'),(3,3,3,'APROBADA');
/*!40000 ALTER TABLE `voto_moderador` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-06-12 12:48:57
