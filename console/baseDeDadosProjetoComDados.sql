create database gymplan;
use gymplan;

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `primeiroNome` varchar(25) NOT NULL,
  `ultimoNome` varchar(25) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'Francisco','Melicias','melicias1999@gmail.com','$2y$13$KtcF8cGFCQ27OfbbLQdnYuXpNYWKyLBacEfPIykEnTOBrbsIZSyWm',NULL,10,1521162560,1521162560,'9_7mh3DStkbU7yz_JOJCyPqmeya1YrVx'),(2,'Goncalo','Amaro','amaro@gmail.com','$2y$13$KtcF8cGFCQ27OfbbLQdnYuXpNYWKyLBacEfPIykEnTOBrbsIZSyWm',NULL,10,1521163037,1521163037,'Jg4UFFbq7m6GXz62Hp2Z3xDG4I4p20zc'),(3,'admin block','blocked','adminBlock@gmail.com','$2y$13$KtcF8cGFCQ27OfbbLQdnYuXpNYWKyLBacEfPIykEnTOBrbsIZSyWm',NULL,0,1521163037,1521163037,'Jg4UFFbq7m6GXz62Hp2Z3xDG4I4p20zx');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `id_categoria` int(2) NOT NULL AUTO_INCREMENT,
  `nome` varchar(40) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Perda de peso'),(2,'Ganhar massa muscular'),(4,'Cardio'),(5,'Ganhar peso'),(7,'manutenção');
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dificuldade`
--

DROP TABLE IF EXISTS `dificuldade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dificuldade` (
  `id_dificuldade` int(2) NOT NULL AUTO_INCREMENT,
  `dificuldade` int(2) NOT NULL,
  PRIMARY KEY (`id_dificuldade`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dificuldade`
--

LOCK TABLES `dificuldade` WRITE;
/*!40000 ALTER TABLE `dificuldade` DISABLE KEYS */;
INSERT INTO `dificuldade` VALUES (1,1),(2,2),(3,5),(4,7),(5,9),(6,4);
/*!40000 ALTER TABLE `dificuldade` ENABLE KEYS */;
UNLOCK TABLES;


DROP TABLE IF EXISTS `zona_exercicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zona_exercicio` (
  `id_zona` int(2) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  PRIMARY KEY (`id_zona`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zona_exercicio`
--

LOCK TABLES `zona_exercicio` WRITE;
/*!40000 ALTER TABLE `zona_exercicio` DISABLE KEYS */;
INSERT INTO `zona_exercicio` VALUES (1,'Peito'),(2,'Abdominais'),(3,'Pernas'),(4,'Costas'),(6,'Biceps'),(7,'triceps');
/*!40000 ALTER TABLE `zona_exercicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exercicio`
--

DROP TABLE IF EXISTS `exercicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exercicio` (
  `id_exercicio` int(4) NOT NULL AUTO_INCREMENT,
  `foto` varchar(200) NOT NULL,
  `nome` varchar(25) NOT NULL,
  `descricao` varchar(250) NOT NULL,
  `repeticoes` int(2) DEFAULT NULL,
  `tempo` int(10) DEFAULT NULL,
  `id_zona` int(2) NOT NULL,
  PRIMARY KEY (`id_exercicio`),
  KEY `id_zona` (`id_zona`),
  CONSTRAINT `exercicio_ibfk_1` FOREIGN KEY (`id_zona`) REFERENCES `zona_exercicio` (`id_zona`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exercicio`
--

LOCK TABLES `exercicio` WRITE;
/*!40000 ALTER TABLE `exercicio` DISABLE KEYS */;
INSERT INTO `exercicio` VALUES (3,'https://cdn1.coachmag.co.uk/sites/coachmag/files/styles/insert_main_wide_image/public/2017/10/plank.jpg?itok=SIu-UN-0','Prancha de pernas abertas','O posicionamento corporal é exatamente o mesmo da prancha básica, com exceção das pernas, que ficam abertas, com os pés distantes um do outro.',NULL,120,2),(5,'https://nit.pt/wp-content/uploads/2016/10/d12c22b3-6dcb-4911-82d6-6c0a53e144b4-754x394.jpg','Elevações de tronco','Puxe o corpo até que o queixo fique por cima da barra. Baixe o corpo até que os braços e ombros fiquem completamente estendidos',15,NULL,1),(6,'https://www.musculacao.net/wp-content/uploads/2012/08/supino_barra.jpg','Supino com barra','O supino com barra em banco plano é o exercício mais conhecido e realizado nos ginásios. Embora não existam músculos peitorais “superiores” e “inferiores”, o supino plano parece recrutar mais as fibras intermédias (parte esternocostal).',15,NULL,1),(7,'https://www.musculacao.net/wp-content/uploads/2012/08/crucifixo_aberturas_declinado_halteres.jpg','Aberturas com halteres','Um dos melhores exercícios para trabalhar os tríceps (cabeça medial, lateral e longa dos tríceps), e também trabalha o grande peitoral e deltóides.',30,NULL,1),(8,'https://www.fitnessdigital.pt/images/productos/XL/9/Kettler-Axos-Runner-p03.jpg','Passadeira','Correr na passadeira',NULL,300,3),(9,'http://2.bp.blogspot.com/-anMj2fM3Mis/T3vaVltM7NI/AAAAAAAACS8/NKXocep5U8A/s320/foto+de+Flex%C3%A3o+de+bra%C3%A7os.jpg','Flexões',' Uma flexão consiste em fazer baixar o corpo de forma uniforme até que o peito fique a uma mão travessa do solo, sem lhe tocar e de seguida regressar a posição inicial.',15,NULL,1),(11,'https://a-static.mlcdn.com.br/618x463/bicicleta-ergometrica-kikos-kv8-7ib-12-niveis-de-esforco/magazineluiza/212090600/f95bc859b2d10eeb7b7889b86f8ccac4.jpg','Bicicleta','Pedalar na bicicleta',NULL,500,3),(12,'https://www.feitodeiridium.com.br/wp-content/uploads/2017/05/prancha-1.jpg','Prancha básica','Antebraços apoiados no chão, cotovelos alinhados aos ombros, coluna reta e força para não deixar o quadril descer.',NULL,80,2),(13,'https://www.feitodeiridium.com.br/wp-content/uploads/2017/05/prancha-4.jpg','Prancha lateral','Apoie um dos cotovelos no chão, alinhado ao ombro e deixando o braço perpendicular ao corpo. Eleve o quadril e as pernas, deixando apenas o pé apoiado no chão. Segure e depois inverta o lado.',NULL,200,2),(14,'https://www.musculacao.net/wp-content/uploads/2014/07/flex%C3%B5es-diamante.jpg','Fleões diamante','aproxime as mãos de maneira a formar o desenho de um diamante com elas. Mantenha-as diretamente abaixo do peito. Isso exigirá que você trabalhe mais os braços.',20,NULL,7),(15,'https://www.wikihow.com/images/0/05/Do-a-Clapping-Push-Up-Step-3-Version-2.jpg','Flexões com palmas','Empurre-se com força o suficiente para bater palmas no meio do ar. Isso pode ser feito como exercício pliométrico.',10,NULL,1),(16,'http://www.omeutreino.com/wp-content/uploads/2016/10/saltar-corda-pedro-almeida.png','Saltar a corda','saltar a corda',NULL,600,3),(17,'https://static.tuasaude.com/media/article/3k/ru/6-exercicios-de-agachamento-para-gluteos_9131_l.jpg','Agachamentos','Afaste os pés (à largura da anca), mantenha os braços esticados ou atrás da cabeça e flita os joelhos até atingir um ângulo de 90 graus (quando as suas coxas ficarem paralelas ao chão e sem que ultrapassem os dedos dos pés), mantendo sempre as costas',25,NULL,3),(18,'https://cdn2.coachmag.co.uk/sites/coachmag/files/styles/16x9_480/public/2016/02/burpee.jpg?itok=bmiJ_JY3&timestamp=1455889690','Burpee','colocar os pés paralelos um ao outro e os braços estendidos ao longo do corpo. Depois dobre as pernas e faça o mesmo movimento que faria num agachamento, colocando de imediato as mãos no chão à frente do corpo e as pernas esticadas para trás',10,NULL,1),(19,'https://cdn2.coachmag.co.uk/sites/coachmag/files/2016/10/web_lunge.jpg','Lunge','Com as pernas afastadas (à largura dos ombros) dê um passo em frente (de aproximadamente um metro) de forma a colocar uma perna à frente e estender a outra para trás (apoiada nos dedos dos pés e com o calcanhar levantado)',30,NULL,3),(20,'https://www.mundoboaforma.com.br/wp-content/uploads/2016/07/2cboaforma.jpg','Barra fixa (chinup)','deve segurar a barra com as mãos, a uma distância equivalente à largura dos ombros, e pendurar-se na barra, conforme exibido na figura acima, com os pés cruzados. Então, aperte as escápulas dos ombros para baixo e para trás, dobre os cotovelos e puxe',5,NULL,6),(21,'https://images.vidaativa.pt/repo/leg-press.jpg','Leg Press','Realizar este exercicio sentado, pés à largura dos ombros, joelhos a 90º e de abdominal ligeiramente contraído.',12,NULL,3),(22,'https://images.vidaativa.pt/repo/leg-curl.jpg','Leg Curl','Realizar este exercicio sentado, pés à largura dos ombros, joelhos alinhados com o eixo de rotação da máquina, abdominal contraído, almofada apoiada por baixo da articulação do tornozelo.',12,NULL,3),(23,'https://www.musculacao.net/wp-content/uploads/2012/08/variaceos_curl_barra.jpg','Curl bicep','Para aprender a realizá-lo da forma correta, é aconselhável que comece por apoiar as costas numa estrutura sólida como um pilar e usar cargas moderadas.',12,NULL,6),(24,'https://images.vidaativa.pt/repo/agachamento-sumo.jpg','Agachamento Sumo','Em pé, pés afastados mais que a largura dos ombros e virados para fora no alinhamento dos joelhos. Segurar o halter com as duas mãos á frente do tronco, braços estendidos, costas retas e abdominal contraído.',NULL,60,3),(25,'https://images.vidaativa.pt/repo/elevacao-dos-gemeos-com-halter1.jpg','Elevação dos Gémeos','Em pé apoiado com uma mão, a outra agarra um haltere, costas direitas, abdominal contraído, pés apoiados pela porção anterior, joelhos quase em extensão.',15,NULL,3),(26,'https://www.musculacao.net/wp-content/uploads/2012/08/fundos_barras_paralelas.jpg','Fundos em barras','Um dos melhores exercícios para trabalhar os tríceps (cabeça medial, lateral e longa dos tríceps), e também trabalha o grande peitoral e deltóides.',20,NULL,7),(27,'https://www.musculacao.net/wp-content/uploads/2012/08/supino_pega_junta.jpg','Supino pega junta','Elevar o barra e descer calmamente',10,NULL,7),(28,'https://www.musculacao.net/wp-content/uploads/2012/08/puxada_triceps.jpg','Puxada de tríceps','ente a todo o custo manter os cotovelos junto ao tronco e opte por utilizar cargas que realmente consegue controlar.',12,NULL,7),(29,'https://images.vidaativa.pt/repo/twist.jpg','Abdominais com peso','Com um peso ao nível do estomâgo e segurando com os braços, executar os abdominais normalmente',15,NULL,2);
/*!40000 ALTER TABLE `exercicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `treino`
--

DROP TABLE IF EXISTS `treino`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `treino` (
  `id_treino` int(5) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(300) NOT NULL,
  `id_categoria` int(2) NOT NULL,
  `id_dificuldade` int(2) NOT NULL,
  `repeticoes` int(2) NOT NULL,
  PRIMARY KEY (`id_treino`),
  KEY `id_categoria` (`id_categoria`),
  KEY `id_dificuldade` (`id_dificuldade`),
  CONSTRAINT `treino_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`),
  CONSTRAINT `treino_ibfk_2` FOREIGN KEY (`id_dificuldade`) REFERENCES `dificuldade` (`id_dificuldade`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `treino`
--

LOCK TABLES `treino` WRITE;
/*!40000 ALTER TABLE `treino` DISABLE KEYS */;
INSERT INTO `treino` VALUES (2,'Treino Inicial','Treino básico para pessoas inexperientes',2,1,2),(3,'Treino de Peito Básico','Treino de peito com alguma intensidade',2,2,3),(4,'Treino Geral','Treino para o fim de semana',4,3,5),(5,'Treino de Peito Intermédio','Treino de peito um pouco mais avançado',2,4,3),(6,'Treino Geral - Intermédio','Treino geral de maior intensidade',1,4,4),(7,'Treino de Peso','Treino para ganhar peso',5,5,33),(8,'Treino Teste','teste',2,4,2),(9,'Treino Inicial','Treino básico para pessoas inexperientes',1,1,3),(10,'Treino de Pernas - Básico','Treino de Pernas para pessoas iniciantes',2,2,2),(11,'Treino de Pernas Avançado','Treino de pernas de dificuldade elevada mas de ganhos maiores',2,5,5),(12,'Treino de Cardio Avançado','Treino de Cárdio com maior complexidade',4,4,5),(13,'Treino para ganhar peso - Avançado','Treino específico para o ganho de peso, com dificuldade elevada',5,3,2),(14,'Treino para ganhar peso - Médio','Treino de nivel intermédio para ganhar peso',5,6,2),(15,'Treino para Perda de Peso - Médio','Treino de nivel intermédio para perda de peso',1,3,7),(16,'Treino Abdominal - Avançado','Treino para a zona abdominal de alta dificuldade',2,5,4);
/*!40000 ALTER TABLE `treino` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `treino_exercicio`
--

DROP TABLE IF EXISTS `treino_exercicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `treino_exercicio` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `id_treino` int(5) NOT NULL,
  `id_exercicio` int(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_exercicio` (`id_exercicio`),
  KEY `id_treino` (`id_treino`),
  CONSTRAINT `treino_exercicio_ibfk_1` FOREIGN KEY (`id_exercicio`) REFERENCES `exercicio` (`id_exercicio`),
  CONSTRAINT `treino_exercicio_ibfk_2` FOREIGN KEY (`id_treino`) REFERENCES `treino` (`id_treino`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `treino_exercicio`
--

LOCK TABLES `treino_exercicio` WRITE;
/*!40000 ALTER TABLE `treino_exercicio` DISABLE KEYS */;
INSERT INTO `treino_exercicio` VALUES (4,2,3),(5,2,5),(8,2,8),(9,3,3),(10,3,5),(11,3,6),(12,3,7),(14,4,3),(15,4,8),(16,5,3),(17,5,5),(18,5,6),(19,5,7),(20,5,9),(22,6,3),(23,6,5),(24,6,7),(25,6,8),(26,6,9),(27,7,5),(28,7,6),(29,7,7),(30,7,9),(32,2,7),(33,2,9),(34,8,3),(35,8,7),(36,10,8),(37,10,11),(38,10,16),(39,10,19),(40,10,21),(41,10,22),(42,10,24),(43,11,16),(44,11,17),(45,11,19),(46,11,21),(47,11,22),(48,11,25),(49,12,3),(50,12,8),(51,12,9),(52,12,11),(53,12,13),(54,12,15),(55,12,18),(56,12,19),(57,12,24),(58,13,5),(59,13,6),(60,13,7),(61,13,9),(62,13,20),(63,13,23),(64,14,7),(65,14,13),(66,14,14),(67,14,18),(68,14,19),(69,14,24),(70,15,8),(71,15,9),(72,15,11),(73,15,12),(74,15,13),(75,15,17),(82,9,28),(83,9,29),(84,16,3),(85,16,12),(86,16,13),(87,16,29);
/*!40000 ALTER TABLE `treino_exercicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `primeiroNome` varchar(25) NOT NULL,
  `ultimoNome` varchar(25) NOT NULL,
  `dataNascimento` datetime NOT NULL,
  `altura` decimal(4,2) NOT NULL,
  `peso` decimal(5,3) NOT NULL,
  `sexo` tinyint(1) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Goncalo','Amaro','2018-12-14 15:42:48',1.50,65.000,0,'goncalo.amaro@example.com','$2y$13$VBwxw9ft8626nKi4OHcp.eWUaucx4GGAjVQTAj8G7dv6wPQnBSmru',NULL,10,1544555627,1545059333,'9TSxmATlw2ph_IETfOf2E4jytFyvNi0L'),(2,'Francisco','Melicias','2018-12-13 22:16:17',1.82,67.000,0,'melicias1999@gmail.com','$2y$13$vbbEO1C64QSYfMGB5RBI5uHHlhcXbeGopFYLPR2HW1cgZd3p6Bk06',NULL,10,1544699538,1545059333,'oKbLFHKMuOmWO80wMZ8ZvWZV68xFq4ms'),(3,'TesteNome','TesteApelido','1999-07-15 12:00:00',1.50,65.000,0,'teste@teste.com','$2y$13$37JDi21OJjrA5RS4i6pSreuZEQsFfYjl8oepNRvYBMuIgg3Biqsru',NULL,10,1544719456,1544719456,'Vh6x-7B9pIZYvgFVfJMlV5sXbS9_gV89'),(4,'kjlkjlkjl','lkjlkjlkjlkj','1990-12-12 12:00:00',1.80,80.000,0,'sjdhskdf@skjdnfs.com','$2y$13$5tR2bG63lGaHgvW5/ExhDeLXiKl9/1x8LhRrt.GoDXjhnEoLIZqD2',NULL,10,1544720196,1544720196,'Ys8A83usBTrHlaWuJiFGnz9vw49r4lru'),(5,'Erika','Alvela','1970-12-12 12:00:00',1.70,60.000,1,'erika@gmail.com','$2y$13$rD/APcxwuAXhM2wWUXKx7eBnsPcRW32XGjlg5Yu2V4bykFUe7ROX2',NULL,10,1544960406,1544960406,'YSMvd--GCvatk1Xeeb8IrXPkvUk1CuDs'),(6,'Fwkaknd','Jejsndbshz','1923-12-16 12:00:00',1.80,80.000,0,'cnsnhs@djwkjs.com','$2y$13$qLEM3ouTGYGGsqezXMsft.b1m2sxaEZfqUMPZxLAjhhSf4A7dDxie',NULL,10,1544966776,1544966776,'oVhjGftUe3nxmxAetBZEP5QAK9Ht-3VI'),(7,'Goncalo','Amaro','1999-07-15 00:00:00',1.50,65.000,0,'goncalo.amaro@example.com4','$2y$13$nU6aAj4yOqu9Ci77Wsd7des4n15oz8SEmsVLgsoAHZv4z40qplbEe',NULL,10,1545163795,1545163795,'sxpnZ2NjSzBKBAqebyulhRvg1pvBJLi4'),(8,'Amaro','Amaro','1963-12-18 00:00:00',1.65,85.000,0,'goncalo.amaro@hotmail.com','$2y$13$BDrK7.az54BrhyPvXXCBRuHzbdsDE0sQRT6GqAEn19Fj.UT04VGEW',NULL,0,1545165850,1547913737,'wFtyD0DeAQGU9BHDWOZ-wz27SaDNJa0w'),(9,'Matilde ','Alves','1999-05-16 00:00:00',1.70,55.000,1,'matilde.alves@gmail.com','$2y$13$0DuQIxMwCFyIk5zxtg7/fu1RC6rLvd0XCvTXC1CUcRL6dlEjzwuMC',NULL,10,1545415337,1545415337,'xgn_-Gi2EXqKHcEyRmXby_UgMbH3f2b5'),(10,'Rui','Silva','1997-03-04 00:00:00',1.75,60.000,0,'ruipns@live.com.pt','$2y$13$InymuH5J1OC2ScJ9e2VQuOcCMlwQqdOf/Prd6URpH.1dAsd5I594K',NULL,0,1546862473,1546863024,'43OEtHJeGtbVHNqRqlnR52pCJSTJ8M_N'),(11,'Gonçalovski','Amarovski','1999-07-15 00:00:00',1.80,82.000,0,'asdqwe123@hotmail.com','$2y$13$vQikFNjZxalUG.7JnlH7lurOSS/QWdhILhIHGcjfFR56jzWGn03e6',NULL,0,1546947203,1547204825,'45PDsd00s1geyOWzDj1-SvxtbTHZJYse'),(12,'ASD','Teste','1999-07-15 00:00:00',1.50,75.000,0,'teste@gmail.com','$2y$13$9LM9DJGtYKK4aT7er2ZVIOuyLFnldh0p1v5yugHXK54zJqqTMHLDi',NULL,10,1547204885,1547204910,'aHBmxR5ZeQgSNFHpjuyscrfOY0MxRTdG'),(13,'asd','123','1999-07-15 00:00:00',1.50,65.000,0,'amaro@gmail.com','$13$vbbEO1C64QSYfMGB5RBI5uHHlhcXbeGopFYLPR2HW1cgZd3p6Bk06',NULL,0,1547579068,1547579074,'_lr5JVVEcQLmepDU2PfKXvjklmbiqlss'),(14,'teste','teste2','1999-06-29 00:00:00',1.70,80.000,0,'testeTeste@gmail.com','$2y$13$WCW8gXN8L1H1BRsHkyYuHO1nWolr7MTvSkoaBBE55zIv8ePBF2ruu',NULL,10,1547632118,1547632118,'9JPdPhJ-f9Yy6MmONpgnpM9-Z2cSs2o3'),(15,'O meu nome','O meu apelido','1999-06-29 00:00:00',1.70,80.000,0,'testemail@gmail.com','$2y$13$5ImJvuSNguQrTdwXNHgM7eZSQrYwVUoSzwUdGGOnX0GYdAwkpGanC',NULL,10,1547633115,1547633115,'Cqr6IO33YpzcfY-wKvFnnyWfgc6DNZwJ'),(16,'Conta teste','apelido','1990-08-20 00:00:00',1.80,85.000,0,'contaTesteAPI@gmail.com','$2y$13$g60.6QmfsNq3//zMdX3Ose0UsuxjvFjHAovmUCm/LdcS1Utu3XZRu',NULL,10,1547664201,1547667946,'pmck5u0IWZs7nWAoBgXaTZdlr_ci070U'),(17,'Isto é uma conta teste','apelido','1999-06-01 00:00:00',1.50,50.000,0,'testeDeEmail@gmail.com','$2y$13$DXjxFDOKjB4dDIhD93X2XOpStZ4n3QcbrsSQWRd8uX/51bNIq21yq',NULL,10,1547668354,1547668354,'VxKPhTSnJHojTEkMyM3zBBCh4LaNwyAf');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_treino`
--

DROP TABLE IF EXISTS `user_treino`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_treino` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `id_user` int(5) NOT NULL,
  `id_treino` int(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  KEY `id_treino` (`id_treino`),
  CONSTRAINT `user_treino_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`),
  CONSTRAINT `user_treino_ibfk_2` FOREIGN KEY (`id_treino`) REFERENCES `treino` (`id_treino`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_treino`
--

LOCK TABLES `user_treino` WRITE;
/*!40000 ALTER TABLE `user_treino` DISABLE KEYS */;
INSERT INTO `user_treino` VALUES (4,2,4),(11,16,7),(12,16,6),(13,16,3),(14,16,2),(16,16,8),(19,8,2);
/*!40000 ALTER TABLE `user_treino` ENABLE KEYS */;
UNLOCK TABLES;