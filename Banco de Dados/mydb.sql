-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 04/09/2014 às 01:26
-- Versão do servidor: 5.6.16
-- Versão do PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `mydb`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `agentes`
--

CREATE TABLE IF NOT EXISTS `agentes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Campanha_idCampanha` int(11) NOT NULL,
  `barra` varchar(45) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `telefone` varchar(45) NOT NULL,
  `celular` varchar(45) DEFAULT NULL,
  `sexo` varchar(45) NOT NULL,
  `login` varchar(50) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `Nivel_IdNivel` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Agente_Campanha1_idx` (`Campanha_idCampanha`),
  KEY `fk_Agente_Nivel1_idx` (`Nivel_IdNivel`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Fazendo dump de dados para tabela `agentes`
--

INSERT INTO `agentes` (`id`, `Campanha_idCampanha`, `barra`, `nome`, `telefone`, `celular`, `sexo`, `login`, `senha`, `Nivel_IdNivel`) VALUES
(1, 1, 'AG-01', 'Cristiano Nunes', '892630', '9472097907', 'masculino', 'cristiano', '123', 1),
(8, 1, 'Ag24', 'Wande', '1111fge', '2222', 'masculino', 'wander', '123', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `agentes_has_ciclos`
--

CREATE TABLE IF NOT EXISTS `agentes_has_ciclos` (
  `Agente_id` int(11) NOT NULL,
  `Ciclo_idciclo` int(11) NOT NULL,
  PRIMARY KEY (`Agente_id`,`Ciclo_idciclo`),
  KEY `fk_Agente_has_Ciclo_Ciclo1_idx` (`Ciclo_idciclo`),
  KEY `fk_Agente_has_Ciclo_Agente1_idx` (`Agente_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `bairros`
--

CREATE TABLE IF NOT EXISTS `bairros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_bairro` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Fazendo dump de dados para tabela `bairros`
--

INSERT INTO `bairros` (`id`, `nome_bairro`) VALUES
(1, 'Centro');

-- --------------------------------------------------------

--
-- Estrutura para tabela `campanhas`
--

CREATE TABLE IF NOT EXISTS `campanhas` (
  `idCampanha` int(11) NOT NULL,
  `descricao` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idCampanha`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `campanhas`
--

INSERT INTO `campanhas` (`idCampanha`, `descricao`) VALUES
(1, 'Dengue');

-- --------------------------------------------------------

--
-- Estrutura para tabela `ciclos`
--

CREATE TABLE IF NOT EXISTS `ciclos` (
  `idciclo` int(11) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL,
  `numero` int(11) NOT NULL COMMENT 'O número do ciclo é calculado através do ano base e do último número do ciclo.',
  `anoBase` int(11) NOT NULL,
  PRIMARY KEY (`idciclo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cidades`
--

CREATE TABLE IF NOT EXISTS `cidades` (
  `id` int(11) NOT NULL,
  `nome_cidade` varchar(45) DEFAULT NULL,
  `idestado` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cidades_estados1` (`idestado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `cidades`
--

INSERT INTO `cidades` (`id`, `nome_cidade`, `idestado`) VALUES
(1, 'Pau dos Ferros', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `estados`
--

CREATE TABLE IF NOT EXISTS `estados` (
  `id` int(11) NOT NULL,
  `nome_estado` varchar(45) DEFAULT NULL,
  `sigla` char(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `estados`
--

INSERT INTO `estados` (`id`, `nome_estado`, `sigla`) VALUES
(1, 'Rio Grande do Norte', 'RN');

-- --------------------------------------------------------

--
-- Estrutura para tabela `imovel`
--

CREATE TABLE IF NOT EXISTS `imovel` (
  `idImovel` int(11) NOT NULL,
  `quantidade_habitantes` int(11) DEFAULT NULL,
  `idTipoImovel` int(11) NOT NULL,
  `quantidade_caes` int(11) DEFAULT NULL,
  `quantidade_gatos` int(11) DEFAULT NULL,
  `numero_imovel` varchar(10) DEFAULT NULL,
  `ladoquadra` int(11) NOT NULL,
  `Rua_id` int(11) NOT NULL,
  `Quadra_idQuadra` int(11) NOT NULL,
  PRIMARY KEY (`idImovel`),
  KEY `fk_imoveis_tipos1` (`idTipoImovel`),
  KEY `fk_imovel_Rua1_idx` (`Rua_id`),
  KEY `fk_imovel_Quadra1_idx` (`Quadra_idQuadra`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `niveis`
--

CREATE TABLE IF NOT EXISTS `niveis` (
  `IdNivel` int(11) NOT NULL,
  `Descricao` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`IdNivel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `niveis`
--

INSERT INTO `niveis` (`IdNivel`, `Descricao`) VALUES
(1, 'admin'),
(2, 'Supervisor'),
(3, 'Agente');

-- --------------------------------------------------------

--
-- Estrutura para tabela `Pesquisa`
--

CREATE TABLE IF NOT EXISTS `Pesquisa` (
  `idPesquisa` int(11) NOT NULL,
  `A1` int(11) DEFAULT NULL COMMENT 'Caixa d''agua',
  `A2` int(11) DEFAULT NULL COMMENT 'Outros depósitos de armazenamento de água (baixo).',
  `B` int(11) DEFAULT NULL COMMENT 'Pequenos depósitos móveis.',
  `C` int(11) DEFAULT NULL COMMENT 'Depósito fixo.',
  `D1` int(11) DEFAULT NULL COMMENT 'Pneus e outros materais rodantes',
  `D2` int(11) DEFAULT NULL COMMENT 'Lixo (recipientes, plásticos, latas), sucatas, entulhos.',
  `E` int(11) DEFAULT NULL COMMENT 'Depósitos naturais.',
  `nr_amostra_inicial` int(11) DEFAULT NULL,
  `nr_amostra_final` int(11) DEFAULT NULL,
  `quantidade_tubitos` int(11) DEFAULT NULL,
  PRIMARY KEY (`idPesquisa`),
  KEY `fk_Pesquisa_Visita1_idx` (`idPesquisa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `quadras`
--

CREATE TABLE IF NOT EXISTS `quadras` (
  `idQuadra` int(11) NOT NULL AUTO_INCREMENT,
  `identificacao` varchar(20) NOT NULL,
  `idBairro` int(11) NOT NULL,
  PRIMARY KEY (`idQuadra`),
  KEY `fk_quadras_bairros1` (`idBairro`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Fazendo dump de dados para tabela `quadras`
--

INSERT INTO `quadras` (`idQuadra`, `identificacao`, `idBairro`) VALUES
(1, '1', 1),
(2, '3', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `ruas`
--

CREATE TABLE IF NOT EXISTS `ruas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome_rua` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Fazendo dump de dados para tabela `ruas`
--

INSERT INTO `ruas` (`id`, `nome_rua`) VALUES
(7, 'Teste123'),
(8, 'Independencia');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipoatividades`
--

CREATE TABLE IF NOT EXISTS `tipoatividades` (
  `idTipoAtividade` int(11) NOT NULL,
  `sigla` varchar(4) DEFAULT NULL,
  `descricao` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idTipoAtividade`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipoimoveis`
--

CREATE TABLE IF NOT EXISTS `tipoimoveis` (
  `idTipoImovel` int(11) NOT NULL,
  `sigla` char(2) DEFAULT NULL,
  `descricao` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idTipoImovel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `tipoimoveis`
--

INSERT INTO `tipoimoveis` (`idTipoImovel`, `sigla`, `descricao`) VALUES
(1, 'R', 'Residencia');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipolarvicidas`
--

CREATE TABLE IF NOT EXISTS `tipolarvicidas` (
  `idTIpoLarvicida` int(11) NOT NULL COMMENT '			',
  `descricao` char(2) DEFAULT NULL,
  PRIMARY KEY (`idTIpoLarvicida`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipovisitas`
--

CREATE TABLE IF NOT EXISTS `tipovisitas` (
  `idTipoVisita` int(11) NOT NULL,
  `descricao` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`idTipoVisita`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Tabela que indica os tiṕos da visita. Os valores possívei';

-- --------------------------------------------------------

--
-- Estrutura para tabela `tratamentos`
--

CREATE TABLE IF NOT EXISTS `tratamentos` (
  `idTratamento` int(11) NOT NULL,
  `quantidade_depositos_eliminados` int(11) DEFAULT NULL,
  `imovel_tratado` tinyint(1) DEFAULT NULL,
  `quantidade_larvicida` float DEFAULT NULL,
  `quantidade_deposito_tratado` int(11) DEFAULT NULL,
  `TipoLarvicida_idTIpoLarvicida` int(11) NOT NULL,
  PRIMARY KEY (`idTratamento`),
  KEY `fk_Tratamento_Visita1_idx` (`idTratamento`),
  KEY `fk_Tratamento_TipoLarvicida1_idx` (`TipoLarvicida_idTIpoLarvicida`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `visitas`
--

CREATE TABLE IF NOT EXISTS `visitas` (
  `id` int(11) NOT NULL,
  `idimovel` int(11) NOT NULL,
  `hora` time DEFAULT NULL,
  `pendencia` tinyint(1) DEFAULT '0',
  `data` date DEFAULT NULL,
  `ciclo` int(11) DEFAULT NULL,
  `TipoAtividade_idTipoAtividade` int(11) NOT NULL,
  `TipoVisita_idTipoVisita` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_visitas_imoveis1` (`idimovel`),
  KEY `fk_Visita_TipoAtividade1_idx` (`TipoAtividade_idTipoAtividade`),
  KEY `fk_Visita_TipoVisita1_idx` (`TipoVisita_idTipoVisita`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `agentes`
--
ALTER TABLE `agentes`
  ADD CONSTRAINT `fk_Agente_Campanha1` FOREIGN KEY (`Campanha_idCampanha`) REFERENCES `campanhas` (`idCampanha`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Agente_Nivel1` FOREIGN KEY (`Nivel_IdNivel`) REFERENCES `niveis` (`IdNivel`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `agentes_has_ciclos`
--
ALTER TABLE `agentes_has_ciclos`
  ADD CONSTRAINT `fk_Agente_has_Ciclo_Ciclo1` FOREIGN KEY (`Ciclo_idciclo`) REFERENCES `ciclos` (`idciclo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `cidades`
--
ALTER TABLE `cidades`
  ADD CONSTRAINT `fk_cidades_estados1` FOREIGN KEY (`idestado`) REFERENCES `estados` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `imovel`
--
ALTER TABLE `imovel`
  ADD CONSTRAINT `fk_imoveis_tipos1` FOREIGN KEY (`idTipoImovel`) REFERENCES `tipoimoveis` (`idTipoImovel`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `imovel_ibfk_1` FOREIGN KEY (`Quadra_idQuadra`) REFERENCES `quadras` (`idQuadra`);

--
-- Restrições para tabelas `Pesquisa`
--
ALTER TABLE `Pesquisa`
  ADD CONSTRAINT `fk_Pesquisa_Visita1` FOREIGN KEY (`idPesquisa`) REFERENCES `visitas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `quadras`
--
ALTER TABLE `quadras`
  ADD CONSTRAINT `quadras_ibfk_1` FOREIGN KEY (`idBairro`) REFERENCES `bairros` (`id`);

--
-- Restrições para tabelas `tratamentos`
--
ALTER TABLE `tratamentos`
  ADD CONSTRAINT `fk_Tratamento_TipoLarvicida1` FOREIGN KEY (`TipoLarvicida_idTIpoLarvicida`) REFERENCES `tipolarvicidas` (`idTIpoLarvicida`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Tratamento_Visita1` FOREIGN KEY (`idTratamento`) REFERENCES `visitas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `visitas`
--
ALTER TABLE `visitas`
  ADD CONSTRAINT `fk_visitas_imoveis1` FOREIGN KEY (`idimovel`) REFERENCES `imovel` (`idImovel`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Visita_TipoAtividade1` FOREIGN KEY (`TipoAtividade_idTipoAtividade`) REFERENCES `tipoatividades` (`idTipoAtividade`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Visita_TipoVisita1` FOREIGN KEY (`TipoVisita_idTipoVisita`) REFERENCES `tipovisitas` (`idTipoVisita`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
