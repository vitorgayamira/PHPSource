
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
-- Table structure for table `banco_bi`
--

DROP TABLE IF EXISTS `banco_bi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banco_bi` (
  `NR_SEQUENCIA` int(11) NOT NULL AUTO_INCREMENT,
  `DS_BANCO` varchar(80) NOT NULL,
  `ID_RODA_NUVEM` varchar(3) NOT NULL,
  `DS_HOST_BANCO` varchar(20) DEFAULT NULL,
  `DS_PORTA_BANCO` int(10) DEFAULT NULL,
  `DS_SERVICE_NAME_BANCO_DADOS` varchar(80) DEFAULT NULL,
  `DS_USUARIO_BANCO_DADOS` varchar(50) DEFAULT NULL,
  `DS_SENHA_BANCO_DADOS` varchar(50) DEFAULT NULL,
  `DS_SENHA_HTTPS` varchar(40) DEFAULT NULL,
  `DS_USER_HTTPS` varchar(40) DEFAULT NULL,
  `DS_HOST_HTTPS` varchar(40) DEFAULT NULL,
  `CD_EMPRESA` int(11) NOT NULL,
  PRIMARY KEY (`NR_SEQUENCIA`),
  KEY `fk_banco_bi_pessoa_bi1_idx` (`CD_EMPRESA`),
  CONSTRAINT `fk_banco_bi_pessoa_bi1` FOREIGN KEY (`CD_EMPRESA`) REFERENCES `pessoa_bi` (`CODIGO`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banco_bi`
--

LOCK TABLES `banco_bi` WRITE;
/*!40000 ALTER TABLE `banco_bi` DISABLE KEYS */;
INSERT INTO `banco_bi` VALUES (1,'Site  Milenio','N','localhost',NULL,NULL,'site_milenio',NULL,'di2040','root','Localhost',1),(2,'Maker Maximiza','S','cpro6636',1521,'xe','maker','maker','di2040','root','Localhost',1),(3,'Shopping Almeida junior','S','189.114.223.40',1521,'xe','shopping','shopping','di2040','root','Localhost',1);
/*!40000 ALTER TABLE `banco_bi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cidade_bi`
--

DROP TABLE IF EXISTS `cidade_bi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cidade_bi` (
  `cd_cidade` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ds_cidade` varchar(45) NOT NULL,
  `cd_estado` int(11) unsigned NOT NULL,
  `cd_pais` int(11) unsigned NOT NULL,
  PRIMARY KEY (`cd_cidade`,`cd_estado`,`cd_pais`),
  KEY `cd_cidade` (`cd_cidade`),
  KEY `fk_cidade_bi_estado_bi1_idx` (`cd_estado`,`cd_pais`),
  CONSTRAINT `fk_cidade_bi_estado_bi1` FOREIGN KEY (`cd_estado`, `cd_pais`) REFERENCES `estado_bi` (`cd_estado`, `cd_pais`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cidade_bi`
--

LOCK TABLES `cidade_bi` WRITE;
/*!40000 ALTER TABLE `cidade_bi` DISABLE KEYS */;
INSERT INTO `cidade_bi` VALUES (1,'Florianopolis',1,1);
/*!40000 ALTER TABLE `cidade_bi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado_bi`
--

DROP TABLE IF EXISTS `estado_bi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado_bi` (
  `cd_estado` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ds_estado` varchar(45) NOT NULL,
  `SG_ESTADO` varchar(2) DEFAULT NULL,
  `cd_pais` int(11) unsigned NOT NULL,
  PRIMARY KEY (`cd_estado`,`cd_pais`),
  KEY `fk_estado_bi_pais_bi1_idx` (`cd_pais`),
  CONSTRAINT `fk_estado_bi_pais_bi1` FOREIGN KEY (`cd_pais`) REFERENCES `pais_bi` (`cd_pais`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado_bi`
--

LOCK TABLES `estado_bi` WRITE;
/*!40000 ALTER TABLE `estado_bi` DISABLE KEYS */;
INSERT INTO `estado_bi` VALUES (1,'santa Catarina','SC',1);
/*!40000 ALTER TABLE `estado_bi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `funcao_bi`
--

DROP TABLE IF EXISTS `funcao_bi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `funcao_bi` (
  `CD_FUNCAO` int(11) NOT NULL,
  `DS_FUNCAO` varchar(45) NOT NULL,
  `CD_PROGRAMA` varchar(200) NOT NULL,
  PRIMARY KEY (`CD_FUNCAO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcao_bi`
--

LOCK TABLES `funcao_bi` WRITE;
/*!40000 ALTER TABLE `funcao_bi` DISABLE KEYS */;
INSERT INTO `funcao_bi` VALUES (1,'Liberar Funções','liberarfuncaomilenio.php');
/*!40000 ALTER TABLE `funcao_bi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `funcao_grupo_bi`
--

DROP TABLE IF EXISTS `funcao_grupo_bi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `funcao_grupo_bi` (
  `NR_SEQUENCIA` int(10) NOT NULL,
  `CD_EMPRESA` int(11) NOT NULL,
  `CD_FUNCAO` int(11) NOT NULL,
  `CD_PASTA` int(11) NOT NULL,
  `CD_GRUPO` int(11) NOT NULL,
  PRIMARY KEY (`CD_EMPRESA`,`CD_FUNCAO`,`CD_PASTA`,`CD_GRUPO`),
  KEY `FUNCAOGRUPO3` (`CD_FUNCAO`),
  KEY `FUNCAOGRUPO4` (`CD_PASTA`),
  KEY `fk_funcao_grupo_grupo_usuario1_idx` (`CD_GRUPO`),
  CONSTRAINT `fk_funcao_grupo_grupo_usuario1` FOREIGN KEY (`CD_GRUPO`) REFERENCES `grupo_usuario_bi` (`CODIGO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FUNCAOGRUPO3` FOREIGN KEY (`CD_FUNCAO`) REFERENCES `funcao_bi` (`CD_FUNCAO`),
  CONSTRAINT `FUNCAOGRUPO4` FOREIGN KEY (`CD_PASTA`) REFERENCES `pasta_menu_bi` (`CD_PASTA`),
  CONSTRAINT `FUNCAOGRUPO5` FOREIGN KEY (`CD_EMPRESA`) REFERENCES `pessoa_bi` (`CODIGO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `funcao_grupo_bi`
--

LOCK TABLES `funcao_grupo_bi` WRITE;
/*!40000 ALTER TABLE `funcao_grupo_bi` DISABLE KEYS */;
INSERT INTO `funcao_grupo_bi` VALUES (1,2,1,1,1);
/*!40000 ALTER TABLE `funcao_grupo_bi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grupo_banco_bi`
--

DROP TABLE IF EXISTS `grupo_banco_bi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grupo_banco_bi` (
  `NR_BANCO` int(11) NOT NULL,
  `CD_GRUPO` int(11) NOT NULL,
  `NR_SEQUENCIA` int(11) NOT NULL,
  PRIMARY KEY (`NR_BANCO`,`CD_GRUPO`),
  KEY `grupobanco2` (`CD_GRUPO`),
  CONSTRAINT `grupobanco1` FOREIGN KEY (`NR_BANCO`) REFERENCES `banco_bi` (`NR_SEQUENCIA`),
  CONSTRAINT `grupobanco2` FOREIGN KEY (`CD_GRUPO`) REFERENCES `grupo_usuario_bi` (`CODIGO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupo_banco_bi`
--

LOCK TABLES `grupo_banco_bi` WRITE;
/*!40000 ALTER TABLE `grupo_banco_bi` DISABLE KEYS */;
/*!40000 ALTER TABLE `grupo_banco_bi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grupo_usuario_bi`
--

DROP TABLE IF EXISTS `grupo_usuario_bi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grupo_usuario_bi` (
  `CODIGO` int(11) NOT NULL,
  `DESCRICAO` varchar(200) NOT NULL,
  PRIMARY KEY (`CODIGO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupo_usuario_bi`
--

LOCK TABLES `grupo_usuario_bi` WRITE;
/*!40000 ALTER TABLE `grupo_usuario_bi` DISABLE KEYS */;
INSERT INTO `grupo_usuario_bi` VALUES (1,'Adm');
/*!40000 ALTER TABLE `grupo_usuario_bi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_bi`
--

DROP TABLE IF EXISTS `log_bi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_bi` (
  `nm_usuario` varchar(40) NOT NULL,
  `DT_GERACAO` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_bi`
--

LOCK TABLES `log_bi` WRITE;
/*!40000 ALTER TABLE `log_bi` DISABLE KEYS */;
/*!40000 ALTER TABLE `log_bi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pais_bi`
--

DROP TABLE IF EXISTS `pais_bi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pais_bi` (
  `cd_pais` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ds_pai` varchar(45) NOT NULL,
  PRIMARY KEY (`cd_pais`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pais_bi`
--

LOCK TABLES `pais_bi` WRITE;
/*!40000 ALTER TABLE `pais_bi` DISABLE KEYS */;
INSERT INTO `pais_bi` VALUES (1,'Brasil');
/*!40000 ALTER TABLE `pais_bi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pasta_menu_bi`
--

DROP TABLE IF EXISTS `pasta_menu_bi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pasta_menu_bi` (
  `CD_PASTA` int(11) NOT NULL,
  `DS_PASTA` varchar(45) NOT NULL,
  PRIMARY KEY (`CD_PASTA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pasta_menu_bi`
--

LOCK TABLES `pasta_menu_bi` WRITE;
/*!40000 ALTER TABLE `pasta_menu_bi` DISABLE KEYS */;
INSERT INTO `pasta_menu_bi` VALUES (1,'Acesso');
/*!40000 ALTER TABLE `pasta_menu_bi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pessoa_bi`
--

DROP TABLE IF EXISTS `pessoa_bi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pessoa_bi` (
  `CODIGO` int(11) NOT NULL,
  `DESCRICAO` varchar(45) DEFAULT NULL,
  `NR_INSCRICAO` varchar(45) DEFAULT NULL,
  `NR_CNPJ` varchar(45) DEFAULT NULL,
  `NM_LOGRADOURO` varchar(45) DEFAULT NULL,
  `DS_COMPLEMENTO` varchar(45) DEFAULT NULL,
  `NR_CEP` varchar(20) DEFAULT NULL,
  `NM_BAIRRO` varchar(45) DEFAULT NULL,
  `DS_EMAIL` varchar(45) DEFAULT NULL,
  `ID_TIPO_PESSOA` int(1) NOT NULL,
  `NR_IDENTIDADE` varchar(45) DEFAULT NULL,
  `DT_NASCIMENTO` date DEFAULT NULL,
  `NR_CPF` varchar(45) DEFAULT NULL,
  `ID_MATRIZ` varchar(1) DEFAULT NULL,
  `ID_FILIAL` varchar(1) DEFAULT NULL,
  `ID_BASE` varchar(1) DEFAULT NULL,
  `CD_PROFISSAO` int(11) DEFAULT NULL,
  `DS_LOGOTIPO` varchar(45) DEFAULT NULL,
  `CD_CIDADE` int(11) DEFAULT NULL,
  `DS_ARVORE_DESMONTE` varchar(50) DEFAULT NULL,
  `VL_CAPACIDADE_DIA` decimal(10,2) DEFAULT NULL,
  `VL_NECESSARIO_SEMANA` decimal(15,2) DEFAULT NULL,
  `VL_DISPONIVEL_DIA_APANHA` decimal(10,2) DEFAULT NULL,
  `VL_HORA_PARADA_TURNO` decimal(11,4) DEFAULT NULL,
  `ID_FABRICA_RACAO` varchar(1) DEFAULT NULL,
  `ID_FRIGORIFICO` varchar(1) NOT NULL,
  `ID_INTEGRADO` varchar(1) NOT NULL,
  `ID_INCUBATORIO` varchar(1) NOT NULL,
  `ID_FORNECEDOR` varchar(1) NOT NULL,
  `ID_FORNECEDOR_SERVICO` varchar(1) DEFAULT NULL,
  `VL_ABATE_HORA` decimal(10,2) DEFAULT NULL,
  `VL_HORA_INICIO_ABATE` varchar(5) DEFAULT NULL,
  `VL_HORA_FINAL_ABATE` varchar(5) DEFAULT NULL,
  `CD_UNIDANEGOCIO_ERP` varchar(80) DEFAULT NULL,
  `CD_EMPRESA_ERP` varchar(11) DEFAULT NULL,
  `ID_USUARIO` varchar(1) NOT NULL,
  PRIMARY KEY (`CODIGO`),
  KEY `fk_pessoa1` (`CD_CIDADE`),
  KEY `fk_pessoa2` (`CD_PROFISSAO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoa_bi`
--

LOCK TABLES `pessoa_bi` WRITE;
/*!40000 ALTER TABLE `pessoa_bi` DISABLE KEYS */;
INSERT INTO `pessoa_bi` VALUES (1,'Rogério tonera',NULL,NULL,NULL,NULL,NULL,'Itacorubi','rogerio@milenioconsult.com',1,NULL,NULL,'88034-102','N','N','N',NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'','','','',NULL,NULL,NULL,NULL,NULL,NULL,'N'),(2,'Milenio Processamento De Dados',NULL,'','',NULL,'','','',2,NULL,NULL,NULL,'S','N','N',NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,'N','N','N','N','N','',NULL,NULL,NULL,'',NULL,'');
/*!40000 ALTER TABLE `pessoa_bi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pessoa_grupo_banco_bi`
--

DROP TABLE IF EXISTS `pessoa_grupo_banco_bi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pessoa_grupo_banco_bi` (
  `CD_PESSOA` int(11) NOT NULL,
  `NR_SEQUENCIA` int(11) NOT NULL,
  `NR_BANCO` int(11) NOT NULL,
  `CD_GRUPO` int(11) NOT NULL,
  PRIMARY KEY (`CD_PESSOA`,`NR_BANCO`,`CD_GRUPO`),
  KEY `grupobancopessoa3` (`CD_PESSOA`),
  KEY `fk_pessoa_grupo_banco_bi_grupo_banco_bi1_idx` (`NR_BANCO`,`CD_GRUPO`),
  CONSTRAINT `fk_pessoa_grupo_banco_bi_grupo_banco_bi1` FOREIGN KEY (`NR_BANCO`, `CD_GRUPO`) REFERENCES `grupo_banco_bi` (`NR_BANCO`, `CD_GRUPO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `grupobancopessoa3` FOREIGN KEY (`CD_PESSOA`) REFERENCES `pessoa_bi` (`CODIGO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoa_grupo_banco_bi`
--

LOCK TABLES `pessoa_grupo_banco_bi` WRITE;
/*!40000 ALTER TABLE `pessoa_grupo_banco_bi` DISABLE KEYS */;
/*!40000 ALTER TABLE `pessoa_grupo_banco_bi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solicitacao_cliente_bi`
--

DROP TABLE IF EXISTS `solicitacao_cliente_bi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `solicitacao_cliente_bi` (
  `NR_SEQUENCIA` int(11) NOT NULL,
  `CD_EMPRESA` int(11) NOT NULL,
  `CD_USUARIO` int(11) DEFAULT NULL,
  `DT_ABERTURA` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CD_PESSOA` int(11) NOT NULL,
  `DS_SOLUCAO` longtext,
  `DS_SOLICITACAO` longtext NOT NULL,
  `DT_ATUALIZACAO` datetime DEFAULT NULL,
  `ID_STATUS` varchar(3) NOT NULL,
  `CD_BANCO` int(11) DEFAULT NULL,
  PRIMARY KEY (`NR_SEQUENCIA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solicitacao_cliente_bi`
--

LOCK TABLES `solicitacao_cliente_bi` WRITE;
/*!40000 ALTER TABLE `solicitacao_cliente_bi` DISABLE KEYS */;
INSERT INTO `solicitacao_cliente_bi` VALUES (1,0,NULL,'2014-02-02 14:40:47',0,NULL,'ok',NULL,'AGU',NULL),(2,0,NULL,'2014-02-02 23:50:57',1,NULL,'Usuário inicial',NULL,'AGU',NULL);
/*!40000 ALTER TABLE `solicitacao_cliente_bi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario_bi`
--

DROP TABLE IF EXISTS `usuario_bi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario_bi` (
  `CD_USUARIO` int(11) NOT NULL,
  `CD_SENHA` varchar(200) NOT NULL,
  `NM_USUARIO` varchar(200) NOT NULL,
  `ID_MASTER` varchar(1) NOT NULL,
  `DT_ATUALIZACAO` date NOT NULL,
  `CD_PESSOA` int(11) NOT NULL,
  `ID_ACESSA_OTIMIZADOR` varchar(1) DEFAULT NULL,
  `ID_USUARIO_ENG` int(11) DEFAULT NULL,
  `ID_GERA_SIMULACAO_RENDI` varchar(1) DEFAULT NULL,
  `CD_PROGRAMA_HELP` varchar(200) DEFAULT NULL,
  `CD_PASTA_MENU` int(11) DEFAULT NULL,
  `CD_EMPRESA` int(11) NOT NULL,
  `CD_RACA` int(11) DEFAULT NULL,
  `CD_VARIACAO` int(11) DEFAULT NULL,
  `ID_USUARIO_GERENTE` varchar(1) DEFAULT NULL,
  `DS_ANO_GERENTE` int(4) DEFAULT NULL,
  `CD_DIA_INICIAL_GERENTE` int(2) DEFAULT NULL,
  `CD_DIA_FINAL_GERENTE` int(2) DEFAULT NULL,
  `CD_MES_GERENTE` int(2) DEFAULT NULL,
  `CD_PROC_ALTERN_DESMONTE` int(11) DEFAULT NULL,
  PRIMARY KEY (`CD_USUARIO`),
  KEY `fk_usuario1` (`CD_PESSOA`),
  KEY `FK_USUARIO2` (`CD_EMPRESA`),
  KEY `FK_RACAUSUARIO` (`CD_RACA`,`CD_VARIACAO`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario_bi`
--

LOCK TABLES `usuario_bi` WRITE;
/*!40000 ALTER TABLE `usuario_bi` DISABLE KEYS */;
INSERT INTO `usuario_bi` VALUES (1,'rogerio','rogerio','S','0000-00-00',1,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `usuario_bi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario_grupo_bi`
--

DROP TABLE IF EXISTS `usuario_grupo_bi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario_grupo_bi` (
  `CD_USUARIO` int(11) NOT NULL,
  `CD_GRUPO` int(11) NOT NULL,
  `CD_PESSOA` int(11) NOT NULL,
  `ID_CRIA_USUARIO` varchar(1) DEFAULT NULL,
  `ID_PARAMETRIZA_RENDIMENTO` varchar(1) DEFAULT NULL,
  `ID_ATUALIZA_ARVORE` varchar(1) DEFAULT NULL,
  `ID_ELIMINA_RECEBIMENTO_ANIMAL` varchar(1) DEFAULT NULL,
  `ID_GERA_PDF_META` varchar(1) DEFAULT NULL,
  `ID_ELIMINA_PDF_REND_GERAL` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`CD_GRUPO`,`CD_USUARIO`,`CD_PESSOA`),
  KEY `fk_usuariogrupo1` (`CD_USUARIO`),
  KEY `fk_usuariogrupo2` (`CD_PESSOA`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario_grupo_bi`
--

LOCK TABLES `usuario_grupo_bi` WRITE;
/*!40000 ALTER TABLE `usuario_grupo_bi` DISABLE KEYS */;
INSERT INTO `usuario_grupo_bi` VALUES (1,1,2,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `usuario_grupo_bi` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-02-25 10:05:15
