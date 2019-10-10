-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: acs
-- ------------------------------------------------------
-- Server version	5.7.16-log

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
-- Table structure for table `comentarios`
--

DROP TABLE IF EXISTS `comentarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comentario` varchar(500) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_publicacao` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_publicacao` (`id_publicacao`),
  CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`),
  CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`id_publicacao`) REFERENCES `publicacoes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentarios`
--

LOCK TABLES `comentarios` WRITE;
/*!40000 ALTER TABLE `comentarios` DISABLE KEYS */;
INSERT INTO `comentarios` VALUES (4,'Olá Wilson',1,4,'2018-08-05 16:43:20','2018-08-05 16:43:20'),(5,'Testando apenas um comentário',1,4,'2018-08-05 16:48:42','2018-08-05 16:48:42'),(6,'Erro ao enviar comentário',1,4,'2018-08-05 16:50:37','2018-08-05 16:50:37'),(7,'Comentário...',1,4,'2018-08-05 16:52:01','2018-08-05 16:52:01');
/*!40000 ALTER TABLE `comentarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `curtidas`
--

DROP TABLE IF EXISTS `curtidas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `curtidas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_publicacao` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_publicacao` (`id_publicacao`),
  CONSTRAINT `curtidas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`),
  CONSTRAINT `curtidas_ibfk_2` FOREIGN KEY (`id_publicacao`) REFERENCES `publicacoes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curtidas`
--

LOCK TABLES `curtidas` WRITE;
/*!40000 ALTER TABLE `curtidas` DISABLE KEYS */;
INSERT INTO `curtidas` VALUES (18,1,4,'2018-08-05 23:13:45','2018-08-05 23:13:45'),(19,1,2,'2018-08-07 06:12:46','2018-08-07 06:12:46');
/*!40000 ALTER TABLE `curtidas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `experiencias`
--

DROP TABLE IF EXISTS `experiencias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `experiencias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `experiencia` varchar(255) NOT NULL,
  `funcao` varchar(255) NOT NULL,
  `data_inicial` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `data_fim` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `relevancia` int(11) DEFAULT NULL,
  `observacao` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `id_usuario` int(11) DEFAULT NULL,
  `id_nivel` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_nivel` (`id_nivel`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `experiencias_ibfk_1` FOREIGN KEY (`id_nivel`) REFERENCES `niveis` (`id`),
  CONSTRAINT `experiencias_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `experiencias`
--

LOCK TABLES `experiencias` WRITE;
/*!40000 ALTER TABLE `experiencias` DISABLE KEYS */;
INSERT INTO `experiencias` VALUES (1,'Engenheiro de Computação','Engenharia de Software, Desenvolvedor','2013-03-01 03:00:00','2018-01-22 02:00:00',NULL,NULL,'2018-07-29 16:14:33','2018-07-29 16:14:33',1,4),(4,'Testando essa bomba','teste','2018-01-01 02:00:00','2018-07-31 03:00:00',NULL,NULL,'2018-07-30 04:11:26','2018-07-29 23:10:48',1,4),(5,'Teste testando 123','testando apenas apenas','2018-01-01 02:00:00','2018-07-29 03:00:00',NULL,'Observação','2018-07-30 04:11:03','2018-07-30 04:01:20',1,4);
/*!40000 ALTER TABLE `experiencias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `informacaos`
--

DROP TABLE IF EXISTS `informacaos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `informacaos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cpf` varchar(14) NOT NULL,
  `contato` varchar(20) NOT NULL,
  `data_nascimento` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_usuario` int(11) DEFAULT NULL,
  `id_permissao` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `cpf` (`cpf`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_permissao` (`id_permissao`),
  CONSTRAINT `informacaos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`),
  CONSTRAINT `informacaos_ibfk_2` FOREIGN KEY (`id_permissao`) REFERENCES `permissaos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `informacaos`
--

LOCK TABLES `informacaos` WRITE;
/*!40000 ALTER TABLE `informacaos` DISABLE KEYS */;
INSERT INTO `informacaos` VALUES (2,'000.000.000-00','(11)11111-1111','1995-06-13 03:00:00',8,3,'2018-07-29 01:54:28','2018-07-29 01:54:28'),(3,'038.192.773-31','(88)999241492','1995-09-04 03:00:00',1,3,'0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `informacaos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `niveis`
--

DROP TABLE IF EXISTS `niveis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `niveis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `niveis`
--

LOCK TABLES `niveis` WRITE;
/*!40000 ALTER TABLE `niveis` DISABLE KEYS */;
INSERT INTO `niveis` VALUES (1,'Indefinido'),(2,'Estágio'),(3,'Profissional'),(4,'Acadêmico');
/*!40000 ALTER TABLE `niveis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissaos`
--

DROP TABLE IF EXISTS `permissaos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissaos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `permissao` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissao` (`permissao`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissaos`
--

LOCK TABLES `permissaos` WRITE;
/*!40000 ALTER TABLE `permissaos` DISABLE KEYS */;
INSERT INTO `permissaos` VALUES (2,'administrador'),(1,'comum'),(3,'super administrador');
/*!40000 ALTER TABLE `permissaos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `publicacoes`
--

DROP TABLE IF EXISTS `publicacoes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `publicacoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(500) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `data_ativacao` date DEFAULT NULL,
  `data_desativacao` date DEFAULT NULL,
  `ativo` tinyint(1) DEFAULT '1',
  `id_servico` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_servico` (`id_servico`),
  CONSTRAINT `publicacoes_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`),
  CONSTRAINT `publicacoes_ibfk_2` FOREIGN KEY (`id_servico`) REFERENCES `servicos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publicacoes`
--

LOCK TABLES `publicacoes` WRITE;
/*!40000 ALTER TABLE `publicacoes` DISABLE KEYS */;
INSERT INTO `publicacoes` VALUES (2,'<p><strong>Criando uma publicação para teste</strong></p>','Publicação de teste',NULL,NULL,1,5,1,'2018-08-04 04:31:55','2018-08-04 04:31:55'),(4,'<p><strong>PROCURA-SE BABÁ COM EXPERIÊNCIA</strong></p><p>Horário de trabalho comercial - 8h até 17h, segunda a sexta</p>','CONTRATA-SE BABÁ',NULL,NULL,1,6,1,'2018-08-04 23:03:02','2018-08-04 23:03:02'),(5,'<p><strong>PRECISAMOS DE UM ENCANADOR</strong></p><p><strong>* Com urgência por favor</strong></p>','Contrata-se encanador',NULL,NULL,1,2,1,'2018-08-05 23:16:52','2018-08-05 23:16:52');
/*!40000 ALTER TABLE `publicacoes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicos`
--

DROP TABLE IF EXISTS `servicos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicos`
--

LOCK TABLES `servicos` WRITE;
/*!40000 ALTER TABLE `servicos` DISABLE KEYS */;
INSERT INTO `servicos` VALUES (1,'Eletricista','2018-08-01 04:38:09','2018-08-01 04:38:09'),(2,'Encanador','2018-08-01 04:38:30','2018-08-01 04:38:30'),(3,'Pedreiro','2018-08-01 04:38:48','2018-08-01 04:38:48'),(4,'Servente de pedreiro','2018-08-01 04:38:57','2018-08-01 04:38:57'),(5,'Engenheiro de Computação','2018-08-01 04:39:16','2018-08-01 04:39:16'),(6,'Babá de crianças (Recém-nascidos)','2018-08-04 12:47:20','2018-08-04 15:47:20'),(7,'Eleticista','2018-08-28 23:36:41','2018-08-28 23:36:41');
/*!40000 ALTER TABLE `servicos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Wilson Junior','wjunior_msn@hotmail.com','$2y$10$kdblQkErNE9VchLTTSoU0ufulOU4xgAF6u1krlagvxFoasNpT2wZO','6vb1EWBnlFEeSNpfdu9s7bgT8hKsfCGifUytOQdXBAwvSCd0KOJu9zw96zV8','2018-07-29 00:49:49','2018-07-29 00:49:49'),(8,'Thiago Resende Barros','thiagorb95@gmail.com','$2y$10$uKZlv49wPJYnmPyiS3qCtuCZUFkcorEUBNkJEpKXvceAdB5ntu9IS','FmS7EcABj8te50ceZN6pSu3fDtkVdvyjwgc0m7OarM6v2XRdeQEtC70KigMn','2018-07-29 01:54:28','2018-07-29 01:54:28');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-10-09 22:01:44
