
--
-- Table structure for table `pais_bi`
--

DROP TABLE IF EXISTS `pais_bi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pais_bi` (
  `cd_pais` varchar(3) NOT NULL,
  `ds_pai` varchar(45) NOT NULL,
  `ID_BRASIL` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`cd_pais`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pais_bi`
--

LOCK TABLES `pais_bi` WRITE;
/*!40000 ALTER TABLE `pais_bi` DISABLE KEYS */;
INSERT INTO `pais_bi` VALUES ('BRA','Brasil','S');
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
INSERT INTO `funcao_bi` VALUES (1,'Liberar Funções','liberarfuncaomilenio.php'),(3,' Pessoa Fisica ','pessoafisicaversao2.php'),(4,'Matriz Responsabiidade','PROJETObi2.php'),(5,'Definir Projetos','PROJETObi10.php'),(6,'Pessoa Juridica ','pessoajuridicaversao3.php'),(7,'Bases de Negócios','basesnegocio.php'),(8,'Definir Usuários','incluirusuariomilenio.php');
/*!40000 ALTER TABLE `funcao_bi` ENABLE KEYS */;
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
  `NR_RG` varchar(12) DEFAULT NULL,
  `id_candidato_usuario` varchar(1) DEFAULT NULL,
  `nr_endereco` int(11) DEFAULT NULL,
  `PJ_TELEFONE1` varchar(15) DEFAULT NULL,
  `PF_SEXO` varchar(1) DEFAULT NULL,
  `PF_TELEFONE1` varchar(15) DEFAULT NULL,
  `id_pessoa_candidata` varchar(1) DEFAULT NULL,
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
INSERT INTO `pessoa_bi` VALUES (1,'Rogério Tonera',NULL,'88.888.888/8888-88','Rodovia Amaro Antônio Vieira - de 1312/1313 ','','88.034-102','Itacorubi','77777777',1,'1316194',NULL,'88034-102','N','N','N',NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'','','','',NULL,NULL,NULL,NULL,NULL,NULL,'N',NULL,NULL,0,'',NULL,NULL,'N'),(2,'MILENIO PROCESSAMENTO DE DADOS',NULL,'77.777.777/7777-77','Rodovia Amaro Antônio Vieira - de 1312/1313 ','201b','88.034-102','Itacorubi','rogerio@milenioconsult.com',2,NULL,NULL,NULL,'S','N','N',NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,'N','N','N','N','N','',NULL,NULL,NULL,'',NULL,'',NULL,NULL,259,'788888',NULL,NULL,NULL),(4,'CVA',NULL,'45.555.555/5555-55','Rua Padre Oswaldo Gomes','','81.510-100','Guabirotuba','celso.ravaneda@cvaconsultoria.com.br',2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,'N','N','N','N','N','N',NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,56,'',NULL,NULL,NULL),(6,'MAXIMIZA',NULL,'88.888.888/8888-88','Avenida Martin Luther - até 856 - lado par','4500','89.012-010','Victor Konder','marcos.mira@maximiza.com.br',2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,3,NULL,NULL,NULL,NULL,NULL,NULL,'','','','',NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,788,'6666',NULL,NULL,NULL),(8,'AGROPARATI AVERAMA',NULL,'00.000.0000/0000-0','Rua Anapólis','','87.504-610','Conjunto Residencial Có','pcp@agroparati.com.br',2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,4,NULL,NULL,NULL,NULL,NULL,NULL,'','','','',NULL,NULL,NULL,NULL,NULL,NULL,'',NULL,NULL,0,'',NULL,NULL,NULL),(9,'DIRANIR CALDEIRA DE OLIVEIRA',NULL,NULL,'Rodovia Amaro Antônio Vieira - de 1312/1313 ','','88.034-102','Itacorubi','fgrt455',1,NULL,'0000-00-00','',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'','','','',NULL,NULL,NULL,NULL,NULL,NULL,'','1',NULL,0,NULL,'','','N'),(10,'CELSO RAVANEDA',NULL,NULL,'Rodovia Amaro Antônio Vieira - de 1312/1313 ','','88.034-102','Itacorubi','celso.ravaneda@cva.com.br',1,NULL,'0000-00-00','',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'','','','',NULL,NULL,NULL,NULL,NULL,NULL,'','1',NULL,0,NULL,'','','N'),(11,'ROBERTO TONERA',NULL,NULL,'Rodovia Amaro Antônio Vieira - de 1312/1313 ','','88.034-102','Itacorubi','555555ton',1,NULL,'0000-00-00','',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'','','','',NULL,NULL,NULL,NULL,NULL,NULL,'','1',NULL,0,NULL,'','','N'),(12,'TANIA SILVA',NULL,NULL,'Rodovia Amaro Antônio Vieira - de 1312/1313 ','','88.034-102','Itacorubi','tati@hotmail.com.br',1,NULL,'0000-00-00','',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'','','','',NULL,NULL,NULL,NULL,NULL,NULL,'','1',NULL,0,NULL,'F','','N'),(13,'HELIO SOUZA',NULL,NULL,'Rodovia Amaro Antônio Vieira - de 1312/1313 ','','88.034-102','Itacorubi','gertyyyyherlio',1,NULL,'0000-00-00','',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'','','','',NULL,NULL,NULL,NULL,NULL,NULL,'','1',NULL,0,NULL,'','','N'),(14,'TELMO CUNHA',NULL,NULL,'','','88.034-102','','telmo@hotmail.com',1,NULL,'0000-00-00','',NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,NULL,NULL,NULL,'','','','',NULL,NULL,NULL,NULL,NULL,NULL,'','1',NULL,0,NULL,'','','N');
/*!40000 ALTER TABLE `pessoa_bi` ENABLE KEYS */;
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
  `ID_CANDIDATO` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`CODIGO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grupo_usuario_bi`
--

LOCK TABLES `grupo_usuario_bi` WRITE;
/*!40000 ALTER TABLE `grupo_usuario_bi` DISABLE KEYS */;
INSERT INTO `grupo_usuario_bi` VALUES (1,'Adm','N'),(2,'Gestor 1  Fábrica','N'),(3,'Gestor 2  Restaurante','N'),(4,'Público em Geral  - Utilziar nossos Serviços','N'),(5,'Apenas Consulta','N'),(6,'Atualiza e Consulta','N'),(100,'Apenas Consulta Banco de Dados','S'),(101,'Atualiza e Consulta Banco de Dados','S');
/*!40000 ALTER TABLE `grupo_usuario_bi` ENABLE KEYS */;
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
INSERT INTO `funcao_grupo_bi` VALUES (1,2,1,1,1),(3,2,3,1,1),(4,2,4,1,1),(5,2,5,1,1),(6,2,6,1,1),(7,2,7,1,1),(8,2,8,1,1);
/*!40000 ALTER TABLE `funcao_grupo_bi` ENABLE KEYS */;
UNLOCK TABLES;

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
  `id_tipo_banco_dados` varchar(5) DEFAULT NULL,
  `id_banco_site` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`NR_SEQUENCIA`),
  KEY `fk_banco_bi_pessoa_bi1_idx` (`CD_EMPRESA`),
  CONSTRAINT `fk_banco_bi_pessoa_bi1` FOREIGN KEY (`CD_EMPRESA`) REFERENCES `pessoa_bi` (`CODIGO`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banco_bi`
--

LOCK TABLES `banco_bi` WRITE;
/*!40000 ALTER TABLE `banco_bi` DISABLE KEYS */;
INSERT INTO `banco_bi` VALUES (1,'Site  Milenio','N','localhost',0,'','site_milenio','di2040','di2040','root','Localhost',2,'MYSQL','S'),(2,'Manutenção Industrial','S','cpro6636',1521,'xe','maker','maker','di2040','root','Localhost',6,'ORACL','N'),(3,'Restaurantes Dona Benta','S','localhost',0,'','restaurantemilenio','','di2040','root','Localhost',2,'MYSQL','N'),(4,'Frigorifico Rondon','N','localhost',0,'','rondon','','di2040','root','Localhost',8,'MYSQL','N'),(5,'Laboratorio ','N','localhost',0,'','producao','','di2040','root','Localhost',2,'MYSQL','N');
/*!40000 ALTER TABLE `banco_bi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado`
--

DROP TABLE IF EXISTS `estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado` (
  `cd_estado` varchar(2) NOT NULL,
  `ds_estado` varchar(45) NOT NULL,
  `cd_pais` varchar(3) NOT NULL,
  PRIMARY KEY (`cd_estado`),
  KEY `fk_estado_bi_pais_bi1_idx` (`cd_pais`),
  CONSTRAINT `estado1_fk` FOREIGN KEY (`cd_pais`) REFERENCES `pais_bi` (`cd_pais`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado`
--

LOCK TABLES `estado` WRITE;
/*!40000 ALTER TABLE `estado` DISABLE KEYS */;
INSERT INTO `estado` VALUES ('PR','PR','BRA'),('SC','SC','BRA');
/*!40000 ALTER TABLE `estado` ENABLE KEYS */;
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
  `NR_BANCO` int(11) DEFAULT NULL,
  `CD_GRUPO` int(11) NOT NULL,
  PRIMARY KEY (`CD_PESSOA`,`CD_GRUPO`),
  KEY `grupobancopessoa3` (`CD_PESSOA`),
  KEY `banco55_idx` (`NR_BANCO`),
  KEY `banco56_idx` (`CD_GRUPO`),
  CONSTRAINT `banco55` FOREIGN KEY (`NR_BANCO`) REFERENCES `banco_bi` (`NR_SEQUENCIA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `banco56` FOREIGN KEY (`CD_GRUPO`) REFERENCES `grupo_usuario_bi` (`CODIGO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `grupobancopessoa3` FOREIGN KEY (`CD_PESSOA`) REFERENCES `pessoa_bi` (`CODIGO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoa_grupo_banco_bi`
--

LOCK TABLES `pessoa_grupo_banco_bi` WRITE;
/*!40000 ALTER TABLE `pessoa_grupo_banco_bi` DISABLE KEYS */;
INSERT INTO `pessoa_grupo_banco_bi` VALUES (1,1,1,1);
/*!40000 ALTER TABLE `pessoa_grupo_banco_bi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario_bi`
--

DROP TABLE IF EXISTS `usuario_bi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario_bi` (
  `CD_USUARIO` varchar(50) NOT NULL,
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
  `id_muda_ambiente_banco` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`CD_USUARIO`),
  KEY `fk_usuario1` (`CD_PESSOA`),
  KEY `FK_USUARIO2` (`CD_EMPRESA`),
  KEY `FK_RACAUSUARIO` (`CD_RACA`,`CD_VARIACAO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario_bi`
--

LOCK TABLES `usuario_bi` WRITE;
/*!40000 ALTER TABLE `usuario_bi` DISABLE KEYS */;
INSERT INTO `usuario_bi` VALUES ('1','rogerio','rogerio@milenioconsult.com','','0000-00-00',1,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'S'),('2','OUfClrw5qA','fgrt455','','2016-04-14',9,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),('3','6QsXi8I2OP','celso.ravaneda@cva.com.br','','2017-04-14',10,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),('4','QUmc6bkL9K','555555ton','','2017-04-14',11,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),('5','CvyIfsEGUb','tati@hotmail.com.br','','2017-04-14',12,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),('6','klzHHojRaB','gertyyyyherlio','','2017-04-14',13,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),('7','DCh4J31Dcj','gertyyyyherlio','','2017-04-14',13,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),('8','psniAPKqEr','gertyyyyherlio','','2017-04-14',13,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N'),('9','sTgJipSnPD','telmo@hotmail.com','','2017-04-14',14,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'N');
/*!40000 ALTER TABLE `usuario_bi` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-04-17 16:58:08


--
-- Table structure for table `usuario_grupo_bi`
--

DROP TABLE IF EXISTS `usuario_grupo_bi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario_grupo_bi` (
  `cd_usuario` varchar(50) NOT NULL,
  `cd_grupo` int(11) DEFAULT NULL,
  `cd_empresa` int(11) DEFAULT NULL,
  KEY `grupousuariopk` (`cd_usuario`,`cd_grupo`,`cd_empresa`),
  KEY `grupousuario2_fk_idx` (`cd_grupo`),
  KEY `grupousuario3_fk_idx` (`cd_empresa`),
  CONSTRAINT `grupousuario1_fk` FOREIGN KEY (`cd_usuario`) REFERENCES `usuario_bi` (`CD_USUARIO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `grupousuario2_fk` FOREIGN KEY (`cd_grupo`) REFERENCES `grupo_usuario_bi` (`CODIGO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `grupousuario3_fk` FOREIGN KEY (`cd_empresa`) REFERENCES `pessoa_bi` (`CODIGO`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario_grupo_bi`
--

LOCK TABLES `usuario_grupo_bi` WRITE;
/*!40000 ALTER TABLE `usuario_grupo_bi` DISABLE KEYS */;
INSERT INTO `usuario_grupo_bi` VALUES ('1',1,2),('3',4,NULL),('4',6,2),('5',6,2),('6',4,2),('7',4,2),('8',4,2),('9',4,2);
/*!40000 ALTER TABLE `usuario_grupo_bi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `candidato_pessoa_bi`
--

DROP TABLE IF EXISTS `candidato_pessoa_bi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `candidato_pessoa_bi` (
  `nr_banco` int(11) NOT NULL,
  `cd_pessoa_fisica` int(11) NOT NULL,
  `cd_grupo` int(11) NOT NULL,
  `dt_atualizacao` datetime DEFAULT NULL,
  `nr_sequencia` int(11) NOT NULL,
  `id_aberto` varchar(1) DEFAULT NULL,
  PRIMARY KEY (`nr_banco`,`cd_pessoa_fisica`,`cd_grupo`),
  KEY `candidato1_idx` (`cd_pessoa_fisica`),
  KEY `candidatofk3_idx` (`cd_grupo`),
  CONSTRAINT `candidatofk1` FOREIGN KEY (`cd_pessoa_fisica`) REFERENCES `pessoa_bi` (`CODIGO`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `candidatofk2` FOREIGN KEY (`nr_banco`) REFERENCES `banco_bi` (`NR_SEQUENCIA`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `candidatofk3` FOREIGN KEY (`cd_grupo`) REFERENCES `grupo_usuario_bi` (`CODIGO`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `candidato_pessoa_bi`
--

LOCK TABLES `candidato_pessoa_bi` WRITE;
/*!40000 ALTER TABLE `candidato_pessoa_bi` DISABLE KEYS */;
INSERT INTO `candidato_pessoa_bi` VALUES (1,1,1,NULL,3,'N'),(1,9,6,'2016-04-14 22:20:04',1,'N'),(1,10,4,'2017-04-14 14:18:15',4,'N'),(1,11,6,'2017-04-14 15:05:58',6,'N'),(1,12,6,'2017-04-14 15:24:24',8,'N'),(1,13,4,'2017-04-14 15:31:47',10,'N'),(1,14,4,'2017-04-14 16:07:54',12,'N'),(4,9,6,'2016-04-14 22:53:18',2,'N'),(4,10,4,'2017-04-14 14:18:26',5,'N'),(4,11,6,'2017-04-14 15:06:07',7,'N'),(4,12,6,'2017-04-14 15:24:37',9,'N'),(4,13,4,'2017-04-14 15:31:56',11,'N'),(4,14,6,'2017-04-14 16:08:02',13,'S');
/*!40000 ALTER TABLE `candidato_pessoa_bi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cidade`
--

DROP TABLE IF EXISTS `cidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cidade` (
  `cd_cidade` int(11) NOT NULL,
  `ds_cidade` varchar(40) NOT NULL,
  `cd_estado` varchar(2) NOT NULL,
  PRIMARY KEY (`cd_cidade`),
  KEY `cidadefk` (`cd_estado`),
  CONSTRAINT `cidade_fk` FOREIGN KEY (`cd_estado`) REFERENCES `estado` (`cd_estado`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cidade`
--

LOCK TABLES `cidade` WRITE;
/*!40000 ALTER TABLE `cidade` DISABLE KEYS */;
INSERT INTO `cidade` VALUES (1,'Florianópolis','SC'),(2,'Curitiba','PR'),(3,'Blumenau','SC'),(4,'Umuarama','PR');
/*!40000 ALTER TABLE `cidade` ENABLE KEYS */;
UNLOCK TABLES;

