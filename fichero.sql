-- MySQL dump 10.13  Distrib 5.7.34, for Linux (x86_64)
--
-- Host: localhost    Database: tesis
-- ------------------------------------------------------
-- Server version	5.7.34-0ubuntu0.18.04.1

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
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `idcliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `apellido` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  PRIMARY KEY (`idcliente`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'Jorge','Gonzales','halanbritobriones@gmail.com',NULL),(2,'Jorge','Gonzales','halanbritobriones@gmail.com',NULL),(3,'Jorge','Gonzales','halanbritobriones@gmail.com',NULL);
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comercializacion_producto`
--

DROP TABLE IF EXISTS `comercializacion_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comercializacion_producto` (
  `idcomercializacion_producto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_comercializacion` varchar(255) DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  PRIMARY KEY (`idcomercializacion_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comercializacion_producto`
--

LOCK TABLES `comercializacion_producto` WRITE;
/*!40000 ALTER TABLE `comercializacion_producto` DISABLE KEYS */;
INSERT INTO `comercializacion_producto` VALUES (1,'Suscripcion',NULL),(2,'Venta Transaccional',NULL),(3,'Renovacion','2021-03-03'),(4,'Leasing A(arriendo)',NULL),(5,'Leasing B',NULL);
/*!40000 ALTER TABLE `comercializacion_producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comercializacion_servicio`
--

DROP TABLE IF EXISTS `comercializacion_servicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comercializacion_servicio` (
  `idcomercializacion_servicio` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_comercializacion` varchar(255) DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  PRIMARY KEY (`idcomercializacion_servicio`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comercializacion_servicio`
--

LOCK TABLES `comercializacion_servicio` WRITE;
/*!40000 ALTER TABLE `comercializacion_servicio` DISABLE KEYS */;
INSERT INTO `comercializacion_servicio` VALUES (1,'Outsourcing',NULL),(2,'Bolsa de Horas',NULL);
/*!40000 ALTER TABLE `comercializacion_servicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comercializacion_servicio_has_servicio`
--

DROP TABLE IF EXISTS `comercializacion_servicio_has_servicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comercializacion_servicio_has_servicio` (
  `comercializacion_servicio_idcomercializacion_servicio` int(11) NOT NULL,
  `servicio_idservicio` int(11) NOT NULL,
  PRIMARY KEY (`comercializacion_servicio_idcomercializacion_servicio`,`servicio_idservicio`),
  KEY `servicio_idservicio` (`servicio_idservicio`),
  CONSTRAINT `comercializacion_servicio_has_servicio_ibfk_1` FOREIGN KEY (`comercializacion_servicio_idcomercializacion_servicio`) REFERENCES `comercializacion_servicio` (`idcomercializacion_servicio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `comercializacion_servicio_has_servicio_ibfk_2` FOREIGN KEY (`servicio_idservicio`) REFERENCES `servicio` (`idservicio`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comercializacion_servicio_has_servicio`
--

LOCK TABLES `comercializacion_servicio_has_servicio` WRITE;
/*!40000 ALTER TABLE `comercializacion_servicio_has_servicio` DISABLE KEYS */;
INSERT INTO `comercializacion_servicio_has_servicio` VALUES (1,1),(2,1),(1,2),(2,2),(1,3),(2,3);
/*!40000 ALTER TABLE `comercializacion_servicio_has_servicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compañia_cotiza`
--

DROP TABLE IF EXISTS `compañia_cotiza`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compañia_cotiza` (
  `idcompañia_cotiza` int(11) NOT NULL AUTO_INCREMENT,
  `compañia` varchar(255) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `domicilio` varchar(255) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  PRIMARY KEY (`idcompañia_cotiza`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compañia_cotiza`
--

LOCK TABLES `compañia_cotiza` WRITE;
/*!40000 ALTER TABLE `compañia_cotiza` DISABLE KEYS */;
INSERT INTO `compañia_cotiza` VALUES (1,'compañia 1','compania1@gmail.cl','moneda 1234',74859612),(2,'Cliente 1','halanbritobriones@gmail.com','moneda 1048',45696871);
/*!40000 ALTER TABLE `compañia_cotiza` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `conocimiento_servicio`
--

DROP TABLE IF EXISTS `conocimiento_servicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `conocimiento_servicio` (
  `idconocimiento_servicio` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_conocimiento` varchar(255) DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  PRIMARY KEY (`idconocimiento_servicio`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conocimiento_servicio`
--

LOCK TABLES `conocimiento_servicio` WRITE;
/*!40000 ALTER TABLE `conocimiento_servicio` DISABLE KEYS */;
INSERT INTO `conocimiento_servicio` VALUES (1,'Junior',NULL),(2,'Senior',NULL),(3,'Experto',NULL);
/*!40000 ALTER TABLE `conocimiento_servicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `conocimiento_servicio_has_servicio`
--

DROP TABLE IF EXISTS `conocimiento_servicio_has_servicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `conocimiento_servicio_has_servicio` (
  `conocimiento_servicio_idconocimiento_servicio` int(11) NOT NULL,
  `servicio_idservicio` int(11) NOT NULL,
  PRIMARY KEY (`conocimiento_servicio_idconocimiento_servicio`,`servicio_idservicio`),
  KEY `servicio_idservicio` (`servicio_idservicio`),
  CONSTRAINT `conocimiento_servicio_has_servicio_ibfk_1` FOREIGN KEY (`conocimiento_servicio_idconocimiento_servicio`) REFERENCES `conocimiento_servicio` (`idconocimiento_servicio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `conocimiento_servicio_has_servicio_ibfk_2` FOREIGN KEY (`servicio_idservicio`) REFERENCES `servicio` (`idservicio`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `conocimiento_servicio_has_servicio`
--

LOCK TABLES `conocimiento_servicio_has_servicio` WRITE;
/*!40000 ALTER TABLE `conocimiento_servicio_has_servicio` DISABLE KEYS */;
INSERT INTO `conocimiento_servicio_has_servicio` VALUES (1,1),(2,1),(3,1),(1,2),(2,2),(3,2),(1,3),(2,3),(3,3);
/*!40000 ALTER TABLE `conocimiento_servicio_has_servicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documento`
--

DROP TABLE IF EXISTS `documento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `documento` (
  `iddocumento` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_doc` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `fecha_subida` date DEFAULT NULL,
  `oportunidad_negocio_idoportunidad_negocio` int(11) NOT NULL,
  PRIMARY KEY (`iddocumento`),
  KEY `oportunidad_negocio_idoportunidad_negocio` (`oportunidad_negocio_idoportunidad_negocio`),
  CONSTRAINT `documento_ibfk_1` FOREIGN KEY (`oportunidad_negocio_idoportunidad_negocio`) REFERENCES `oportunidad_negocio` (`idNegocio`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documento`
--

LOCK TABLES `documento` WRITE;
/*!40000 ALTER TABLE `documento` DISABLE KEYS */;
/*!40000 ALTER TABLE `documento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado` (
  `idEstado` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_estado` varchar(255) DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  PRIMARY KEY (`idEstado`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` VALUES (1,'Gestionando negocio',NULL),(2,'Cotización enviada',NULL),(3,'Negocio Postergado',NULL),(4,'Negocio Aceptado',NULL),(5,'Negocio Rechazado',NULL);
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mac`
--

DROP TABLE IF EXISTS `mac`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mac` (
  `idMac` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_marca` varchar(255) DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  PRIMARY KEY (`idMac`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mac`
--

LOCK TABLES `mac` WRITE;
/*!40000 ALTER TABLE `mac` DISABLE KEYS */;
INSERT INTO `mac` VALUES (1,'Arcserve',NULL),(2,'IBM',NULL),(3,'Zellabox',NULL),(4,'Lenovo',NULL),(5,'Kaspersky',NULL);
/*!40000 ALTER TABLE `mac` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oportunidad_negocio`
--

DROP TABLE IF EXISTS `oportunidad_negocio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oportunidad_negocio` (
  `idNegocio` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_negocio` varchar(255) DEFAULT NULL,
  `sigla_negocio` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estado_idestado` int(11) NOT NULL,
  `usuario_rut` varchar(12) NOT NULL,
  `idcompañia_cotiza` int(11) NOT NULL,
  PRIMARY KEY (`idNegocio`),
  KEY `estado_idestado` (`estado_idestado`),
  KEY `usuario_rut` (`usuario_rut`),
  KEY `idcompañia_cotiza` (`idcompañia_cotiza`),
  CONSTRAINT `oportunidad_negocio_ibfk_1` FOREIGN KEY (`estado_idestado`) REFERENCES `estado` (`idEstado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `oportunidad_negocio_ibfk_2` FOREIGN KEY (`usuario_rut`) REFERENCES `users` (`rut`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `oportunidad_negocio_ibfk_3` FOREIGN KEY (`idcompañia_cotiza`) REFERENCES `compañia_cotiza` (`idcompañia_cotiza`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oportunidad_negocio`
--

LOCK TABLES `oportunidad_negocio` WRITE;
/*!40000 ALTER TABLE `oportunidad_negocio` DISABLE KEYS */;
INSERT INTO `oportunidad_negocio` VALUES (1,'Negocio',NULL,'Prueba 1','2021-05-09 00:00:00',1,'200343182',2);
/*!40000 ALTER TABLE `oportunidad_negocio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oportunidad_negocio_has_servicio`
--

DROP TABLE IF EXISTS `oportunidad_negocio_has_servicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `oportunidad_negocio_has_servicio` (
  `id_ser_has_op` int(11) NOT NULL AUTO_INCREMENT,
  `oportunidad_negocio_idNegocio` int(11) NOT NULL,
  `servicio_idservicio` int(11) NOT NULL,
  `costo_hora` float DEFAULT NULL,
  `cantidad_horas` int(11) DEFAULT NULL,
  `comentarios` varchar(255) DEFAULT NULL,
  `margen_negocioSer` int(11) DEFAULT NULL,
  `valor_total_cliente` float DEFAULT NULL,
  `valor_total_cliente_clp` float DEFAULT NULL,
  `costo_totalSer` float DEFAULT NULL,
  `margen_vendedorSer` int(11) DEFAULT NULL,
  `valor_venta_mes` int(11) DEFAULT NULL,
  `meses` int(11) DEFAULT NULL,
  `costo_total_mes` float DEFAULT NULL,
  `valor_cliente_hora` float DEFAULT NULL,
  `ganancia_vendedorSer` float DEFAULT NULL,
  `ganancia_vendedorSer_clp` float DEFAULT NULL,
  `costo_totalSer_clp` float DEFAULT NULL,
  `costo_total_mes_clp` float DEFAULT NULL,
  `utilidadSer` float DEFAULT NULL,
  `comercializacion_servicio_idcomercializacion_servicio` int(11) NOT NULL,
  `conocimiento_servicio_idconocimiento_servicio` int(11) NOT NULL,
  PRIMARY KEY (`id_ser_has_op`),
  KEY `oportunidad_negocio_idNegocio` (`oportunidad_negocio_idNegocio`),
  KEY `servicio_idservicio` (`servicio_idservicio`),
  KEY `comercializacion_servicio_idcomercializacion_servicio` (`comercializacion_servicio_idcomercializacion_servicio`),
  KEY `conocimiento_servicio_idconocimiento_servicio` (`conocimiento_servicio_idconocimiento_servicio`),
  CONSTRAINT `oportunidad_negocio_has_servicio_ibfk_1` FOREIGN KEY (`oportunidad_negocio_idNegocio`) REFERENCES `oportunidad_negocio` (`idNegocio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `oportunidad_negocio_has_servicio_ibfk_2` FOREIGN KEY (`servicio_idservicio`) REFERENCES `servicio` (`idservicio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `oportunidad_negocio_has_servicio_ibfk_3` FOREIGN KEY (`comercializacion_servicio_idcomercializacion_servicio`) REFERENCES `comercializacion_servicio` (`idcomercializacion_servicio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `oportunidad_negocio_has_servicio_ibfk_4` FOREIGN KEY (`conocimiento_servicio_idconocimiento_servicio`) REFERENCES `conocimiento_servicio` (`idconocimiento_servicio`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oportunidad_negocio_has_servicio`
--

LOCK TABLES `oportunidad_negocio_has_servicio` WRITE;
/*!40000 ALTER TABLE `oportunidad_negocio_has_servicio` DISABLE KEYS */;
INSERT INTO `oportunidad_negocio_has_servicio` VALUES (1,1,3,0.8,270,'Desarrollador con conocimientos en PHP',30,280.8,NULL,216,10,140,2,108,1.04,6.48,191322,6377400,3188700,64.8,1,3);
/*!40000 ALTER TABLE `oportunidad_negocio_has_servicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto` (
  `idproducto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_producto` varchar(255) DEFAULT NULL,
  `modelo` varchar(255) DEFAULT NULL,
  `version` varchar(255) DEFAULT NULL,
  `sigla_producto` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `partnumber` varchar(255) DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  `tipo_producto_idtipo_producto` int(11) NOT NULL,
  `mac_idMac` int(11) NOT NULL,
  `cantidad_usadoPro` int(11) DEFAULT NULL,
  PRIMARY KEY (`idproducto`),
  KEY `tipo_producto_idtipo_producto` (`tipo_producto_idtipo_producto`),
  KEY `mac_idMac` (`mac_idMac`),
  CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`tipo_producto_idtipo_producto`) REFERENCES `tipo_producto` (`idtipo_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`mac_idMac`) REFERENCES `mac` (`idMac`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto_has_oportunidad_negocio`
--

DROP TABLE IF EXISTS `producto_has_oportunidad_negocio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto_has_oportunidad_negocio` (
  `id_pro_has_op` int(11) NOT NULL AUTO_INCREMENT,
  `producto_idproducto` int(11) NOT NULL,
  `oportunidad_negocio_idNegocio` int(11) NOT NULL,
  `costo_producto` float DEFAULT NULL,
  `precio_ventaPro` float DEFAULT NULL,
  `cantidad_productos` int(11) DEFAULT NULL,
  `configuracion` varchar(255) DEFAULT NULL,
  `margen_negocioPro` int(11) DEFAULT NULL,
  `margen_vendedorPro` int(11) DEFAULT NULL,
  `ganancia_vendedorPro` float DEFAULT NULL,
  `utilidadPro` float DEFAULT NULL,
  `numero_meses` int(11) DEFAULT NULL,
  `precio_mes` float DEFAULT NULL,
  `comercializacion_producto_idcomercializacion_producto` int(11) NOT NULL,
  PRIMARY KEY (`id_pro_has_op`),
  KEY `producto_idproducto` (`producto_idproducto`),
  KEY `oportunidad_negocio_idNegocio` (`oportunidad_negocio_idNegocio`),
  KEY `comercializacion_producto_idcomercializacion_producto` (`comercializacion_producto_idcomercializacion_producto`),
  CONSTRAINT `producto_has_oportunidad_negocio_ibfk_1` FOREIGN KEY (`producto_idproducto`) REFERENCES `producto` (`idproducto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `producto_has_oportunidad_negocio_ibfk_2` FOREIGN KEY (`oportunidad_negocio_idNegocio`) REFERENCES `oportunidad_negocio` (`idNegocio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `producto_has_oportunidad_negocio_ibfk_3` FOREIGN KEY (`comercializacion_producto_idcomercializacion_producto`) REFERENCES `comercializacion_producto` (`idcomercializacion_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto_has_oportunidad_negocio`
--

LOCK TABLES `producto_has_oportunidad_negocio` WRITE;
/*!40000 ALTER TABLE `producto_has_oportunidad_negocio` DISABLE KEYS */;
/*!40000 ALTER TABLE `producto_has_oportunidad_negocio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto_has_solicitud`
--

DROP TABLE IF EXISTS `producto_has_solicitud`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto_has_solicitud` (
  `idpro_has_sol` int(11) NOT NULL AUTO_INCREMENT,
  `producto_idproducto` int(11) NOT NULL,
  `solicitud_idsolicitud` int(11) NOT NULL,
  PRIMARY KEY (`idpro_has_sol`),
  KEY `producto_idproducto` (`producto_idproducto`),
  KEY `solicitud_idsolicitud` (`solicitud_idsolicitud`),
  CONSTRAINT `producto_has_solicitud_ibfk_1` FOREIGN KEY (`producto_idproducto`) REFERENCES `producto` (`idproducto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `producto_has_solicitud_ibfk_2` FOREIGN KEY (`solicitud_idsolicitud`) REFERENCES `solicitud` (`idSolicitud`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto_has_solicitud`
--

LOCK TABLES `producto_has_solicitud` WRITE;
/*!40000 ALTER TABLE `producto_has_solicitud` DISABLE KEYS */;
/*!40000 ALTER TABLE `producto_has_solicitud` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rol` (
  `idRol` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_rol` varchar(255) DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  PRIMARY KEY (`idRol`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol`
--

LOCK TABLES `rol` WRITE;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` VALUES (1,'Administrador',NULL),(2,'Tecnico',NULL),(3,'Comercial',NULL),(4,'Usuario',NULL);
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicio`
--

DROP TABLE IF EXISTS `servicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicio` (
  `idservicio` int(11) NOT NULL AUTO_INCREMENT,
  `idChileCompra` varchar(255) DEFAULT NULL,
  `nombre_servicio` varchar(255) DEFAULT NULL,
  `conocimiento` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `sigla_servicio` varchar(255) DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  `cantidad_usadoSer` int(11) DEFAULT NULL,
  PRIMARY KEY (`idservicio`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicio`
--

LOCK TABLES `servicio` WRITE;
/*!40000 ALTER TABLE `servicio` DISABLE KEYS */;
INSERT INTO `servicio` VALUES (1,'00001','Consultor','negocios informáticos',NULL,'Con',NULL,0),(2,'00002','Arquitecto','Infraestructura',NULL,'Arq',NULL,0),(3,'00003','Desarrollador','Backend',NULL,'Desa',NULL,1);
/*!40000 ALTER TABLE `servicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicio_has_solicitud`
--

DROP TABLE IF EXISTS `servicio_has_solicitud`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicio_has_solicitud` (
  `idser_has_sol` int(11) NOT NULL AUTO_INCREMENT,
  `servicio_idservicio` int(11) NOT NULL,
  `solicitud_idsolicitud` int(11) NOT NULL,
  PRIMARY KEY (`idser_has_sol`),
  KEY `servicio_idservicio` (`servicio_idservicio`),
  KEY `solicitud_idsolicitud` (`solicitud_idsolicitud`),
  CONSTRAINT `servicio_has_solicitud_ibfk_1` FOREIGN KEY (`servicio_idservicio`) REFERENCES `servicio` (`idservicio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `servicio_has_solicitud_ibfk_2` FOREIGN KEY (`solicitud_idsolicitud`) REFERENCES `solicitud` (`idSolicitud`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicio_has_solicitud`
--

LOCK TABLES `servicio_has_solicitud` WRITE;
/*!40000 ALTER TABLE `servicio_has_solicitud` DISABLE KEYS */;
INSERT INTO `servicio_has_solicitud` VALUES (4,3,1);
/*!40000 ALTER TABLE `servicio_has_solicitud` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solicitud`
--

DROP TABLE IF EXISTS `solicitud`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `solicitud` (
  `idSolicitud` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_solicitud` date DEFAULT NULL,
  `revision` tinyint(1) DEFAULT NULL,
  `idcliente` int(11) NOT NULL,
  PRIMARY KEY (`idSolicitud`),
  KEY `idcliente` (`idcliente`),
  CONSTRAINT `solicitud_ibfk_1` FOREIGN KEY (`idcliente`) REFERENCES `cliente` (`idcliente`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solicitud`
--

LOCK TABLES `solicitud` WRITE;
/*!40000 ALTER TABLE `solicitud` DISABLE KEYS */;
INSERT INTO `solicitud` VALUES (1,'2021-05-05',1,3);
/*!40000 ALTER TABLE `solicitud` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_producto`
--

DROP TABLE IF EXISTS `tipo_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_producto` (
  `idtipo_producto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_tipo_producto` varchar(255) DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  PRIMARY KEY (`idtipo_producto`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_producto`
--

LOCK TABLES `tipo_producto` WRITE;
/*!40000 ALTER TABLE `tipo_producto` DISABLE KEYS */;
INSERT INTO `tipo_producto` VALUES (1,'Hardware',NULL),(2,'Software',NULL);
/*!40000 ALTER TABLE `tipo_producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_producto_has_comercializacion_producto`
--

DROP TABLE IF EXISTS `tipo_producto_has_comercializacion_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_producto_has_comercializacion_producto` (
  `tipo_producto_idtipo_producto` int(11) NOT NULL,
  `comercializacion_producto_idcomercializacion_producto` int(11) NOT NULL,
  PRIMARY KEY (`tipo_producto_idtipo_producto`,`comercializacion_producto_idcomercializacion_producto`),
  KEY `comercializacion_producto_idcomercializacion_producto` (`comercializacion_producto_idcomercializacion_producto`),
  CONSTRAINT `tipo_producto_has_comercializacion_producto_ibfk_1` FOREIGN KEY (`tipo_producto_idtipo_producto`) REFERENCES `tipo_producto` (`idtipo_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `tipo_producto_has_comercializacion_producto_ibfk_2` FOREIGN KEY (`comercializacion_producto_idcomercializacion_producto`) REFERENCES `comercializacion_producto` (`idcomercializacion_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_producto_has_comercializacion_producto`
--

LOCK TABLES `tipo_producto_has_comercializacion_producto` WRITE;
/*!40000 ALTER TABLE `tipo_producto_has_comercializacion_producto` DISABLE KEYS */;
INSERT INTO `tipo_producto_has_comercializacion_producto` VALUES (2,1),(1,2),(2,2),(2,3),(1,4),(2,4),(1,5);
/*!40000 ALTER TABLE `tipo_producto_has_comercializacion_producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `rut` varchar(12) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `apellido` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `deleted_at` date DEFAULT NULL,
  `rol_idRol` int(11) NOT NULL,
  PRIMARY KEY (`rut`),
  KEY `rol_idRol` (`rol_idRol`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`rol_idRol`) REFERENCES `rol` (`idRol`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('119517338','Alejandra','Zuñiga','$2y$10$nNz/qpTajs8Yf1RR7vc3Z.ICog3PJqq7YgaoQrIIumxqP2cnIRhEe','alejandra@gmail.cl',25896547,NULL,3),('129692928','Karen','Merino','$2y$10$dnXjfLm7etRBrX4Yz/ZxzOR7DN5NivGGJbmAmeSa9Upur5ZyAJt5.','karenmerino@gmail.com',84287749,NULL,4),('130465684','Luis','Gonzales','$2y$10$nRW9ygOSLjCamCdiNmQ4ReX5nwTnnu/xwKppDU05VcRhfPZqpq3AO','luis@gmail.cl',78546321,NULL,2),('200343182','Halan','Briones','$2y$10$16MQbFt2PcdHv0dN/jBLhOh6vjVzx0X5pWwuqxejnVHxgskm8LnMC','halanbm98@gmail.com',75467938,NULL,1),('58037443','Sergio','Briones','$2y$10$SrdTAHe2kwy1rhCiHXfpleAwTrSVZny1MXNF6KX7/vXh4A5TfuDIG','sergio.briones@itechi.cl',66884777,NULL,1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario_participa_oportunidad_negocio`
--

DROP TABLE IF EXISTS `usuario_participa_oportunidad_negocio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario_participa_oportunidad_negocio` (
  `iduser_has_op` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_rut` varchar(12) NOT NULL,
  `oportunidad_negocio_idoportunidad_negocio` int(11) NOT NULL,
  PRIMARY KEY (`iduser_has_op`),
  KEY `usuario_rut` (`usuario_rut`),
  KEY `oportunidad_negocio_idoportunidad_negocio` (`oportunidad_negocio_idoportunidad_negocio`),
  CONSTRAINT `usuario_participa_oportunidad_negocio_ibfk_1` FOREIGN KEY (`usuario_rut`) REFERENCES `users` (`rut`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `usuario_participa_oportunidad_negocio_ibfk_2` FOREIGN KEY (`oportunidad_negocio_idoportunidad_negocio`) REFERENCES `oportunidad_negocio` (`idNegocio`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario_participa_oportunidad_negocio`
--

LOCK TABLES `usuario_participa_oportunidad_negocio` WRITE;
/*!40000 ALTER TABLE `usuario_participa_oportunidad_negocio` DISABLE KEYS */;
INSERT INTO `usuario_participa_oportunidad_negocio` VALUES (1,'119517338',1),(2,'200343182',1),(3,'130465684',1);
/*!40000 ALTER TABLE `usuario_participa_oportunidad_negocio` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-18  2:54:58
