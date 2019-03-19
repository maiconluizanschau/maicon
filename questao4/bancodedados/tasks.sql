# ************************************************************
# Sequel Pro SQL dump
# Version 4135
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.42)
# Database: tasks
# Generation Time: 2019-03-19 16:24:20 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

# Dump of database teste_tecnico
# ------------------------------------------------------------

DROP DATABASE IF EXISTS `teste_tecnico`;

CREATE DATABASE `teste_tecnico`;

USE teste_tecnico;

# Dump of table tasks
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tasks`;

CREATE TABLE `tasks` (
  `id_task` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title_task` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `order_task` int(11) unsigned DEFAULT NULL,
  `status` smallint(2) DEFAULT '0' COMMENT '1=ativo,2=concluido,3=deletado',
  `date_create` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_task`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `tasks` WRITE;
/*!40000 ALTER TABLE `tasks` DISABLE KEYS */;

INSERT INTO `tasks` (`id_task`, `title_task`, `description`, `order_task`, `status`, `date_create`)
VALUES
	(1,'Análise de Requisitos do Sistema','Alinhar e validar requisitos com o PO do projeto',3,0,'2019-03-19 03:36:17'),
	(2,'Especificar Requisitos','Escrever as histórias e criar boards no kamban de development no trello',2,0,'2019-03-19 03:36:17'),
	(3,'Definição de Arquitetura','Escolha das tecnologias e definição da arquitetura do projeto',1,0,'2019-03-19 03:36:17');
/*!40000 ALTER TABLE `tasks` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
