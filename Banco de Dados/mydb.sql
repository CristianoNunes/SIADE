-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 20/09/2014 às 23:18
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
-- Estrutura para tabela `agente`
--

CREATE TABLE IF NOT EXISTS `agente` (
  `id_agente` int(11) NOT NULL AUTO_INCREMENT,
  `barra` varchar(45) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `celular` varchar(45) DEFAULT NULL,
  `login` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `nivel_id_nivel` int(11) NOT NULL,
  `campanha_id_campanha` int(11) NOT NULL,
  PRIMARY KEY (`id_agente`),
  KEY `fk_agente_nivel1_idx` (`nivel_id_nivel`),
  KEY `fk_agente_campanha1_idx` (`campanha_id_campanha`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Fazendo dump de dados para tabela `agente`
--

INSERT INTO `agente` (`id_agente`, `barra`, `nome`, `telefone`, `celular`, `login`, `senha`, `nivel_id_nivel`, `campanha_id_campanha`) VALUES
(1, 'AG-01', 'Cristiano Nunes', '8499009999', '8488888888', 'cristiano', '123', 1, 1),
(2, 'AG-02', 'Wander', '(84) 9999-9999', '(84) 8888-8888', 'wander', '123', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `bairro`
--

CREATE TABLE IF NOT EXISTS `bairro` (
  `id_bairro` int(11) NOT NULL AUTO_INCREMENT,
  `nome_bairro` varchar(45) DEFAULT NULL,
  `cidade_id_cidade` int(11) NOT NULL,
  PRIMARY KEY (`id_bairro`),
  KEY `fk_bairro_cidade1_idx` (`cidade_id_cidade`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Fazendo dump de dados para tabela `bairro`
--

INSERT INTO `bairro` (`id_bairro`, `nome_bairro`, `cidade_id_cidade`) VALUES
(1, 'Centro', 1),
(2, 'SÃ£o Vicente', 1),
(3, 'MutirÃ£o', 1),
(4, 'NaÃ§Ãµes Unidas', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `campanha`
--

CREATE TABLE IF NOT EXISTS `campanha` (
  `id_campanha` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_campanha`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Fazendo dump de dados para tabela `campanha`
--

INSERT INTO `campanha` (`id_campanha`, `descricao`) VALUES
(1, 'Dengue'),
(2, 'Chagas'),
(3, 'Calazar'),
(4, 'Raiva');

-- --------------------------------------------------------

--
-- Estrutura para tabela `ciclo`
--

CREATE TABLE IF NOT EXISTS `ciclo` (
  `id_ciclo` int(11) NOT NULL AUTO_INCREMENT,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL,
  `numero` int(11) NOT NULL COMMENT 'O número do ciclo é calculado através do ano base e do último número do ciclo.',
  `anoBase` int(11) NOT NULL,
  PRIMARY KEY (`id_ciclo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Fazendo dump de dados para tabela `ciclo`
--

INSERT INTO `ciclo` (`id_ciclo`, `data_inicio`, `data_fim`, `numero`, `anoBase`) VALUES
(1, '2014-09-15', '2014-09-30', 1, 2014),
(2, '2014-09-15', '2014-09-30', 2, 2014);

-- --------------------------------------------------------

--
-- Estrutura para tabela `cidade`
--

CREATE TABLE IF NOT EXISTS `cidade` (
  `id_cidade` int(11) NOT NULL,
  `nome_cidade` varchar(45) DEFAULT NULL,
  `estado_id_estado` int(11) NOT NULL,
  PRIMARY KEY (`id_cidade`),
  KEY `fk_cidade_estado1_idx` (`estado_id_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `cidade`
--

INSERT INTO `cidade` (`id_cidade`, `nome_cidade`, `estado_id_estado`) VALUES
(1, 'Pau dos Ferros', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `estado`
--

CREATE TABLE IF NOT EXISTS `estado` (
  `id_estado` int(11) NOT NULL,
  `nome_estado` varchar(45) DEFAULT NULL,
  `sigla` char(2) DEFAULT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `estado`
--

INSERT INTO `estado` (`id_estado`, `nome_estado`, `sigla`) VALUES
(1, 'Rio Grande do Norte', 'RN');

-- --------------------------------------------------------

--
-- Estrutura para tabela `imovel`
--

CREATE TABLE IF NOT EXISTS `imovel` (
  `id_imovel` int(11) NOT NULL AUTO_INCREMENT,
  `quantidade_habitantes` int(11) DEFAULT NULL,
  `quantidade_caes` int(11) DEFAULT NULL,
  `quantidade_gatos` int(11) DEFAULT NULL,
  `numero_imovel` varchar(10) DEFAULT NULL,
  `ladoquadra` int(11) NOT NULL,
  `quadra_id_quadra` int(11) NOT NULL,
  `quadra_bairro_id_bairro` int(11) NOT NULL,
  `rua_id_rua` int(11) NOT NULL,
  `tipo_imovel_id_tipo_imovel` int(11) NOT NULL,
  PRIMARY KEY (`id_imovel`),
  KEY `fk_imovel_quadra1_idx` (`quadra_id_quadra`,`quadra_bairro_id_bairro`),
  KEY `fk_imovel_rua1_idx` (`rua_id_rua`),
  KEY `fk_imovel_tipo_imovel1_idx` (`tipo_imovel_id_tipo_imovel`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Fazendo dump de dados para tabela `imovel`
--

INSERT INTO `imovel` (`id_imovel`, `quantidade_habitantes`, `quantidade_caes`, `quantidade_gatos`, `numero_imovel`, `ladoquadra`, `quadra_id_quadra`, `quadra_bairro_id_bairro`, `rua_id_rua`, `tipo_imovel_id_tipo_imovel`) VALUES
(1, 2, 0, 0, '100', 1, 1, 1, 1, 1),
(2, 5, 0, 0, '102', 1, 1, 1, 1, 1),
(3, 1, 0, 0, '110', 2, 4, 2, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `nivel`
--

CREATE TABLE IF NOT EXISTS `nivel` (
  `id_nivel` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_nivel`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Fazendo dump de dados para tabela `nivel`
--

INSERT INTO `nivel` (`id_nivel`, `descricao`) VALUES
(1, 'Administrador'),
(2, 'Supervisor'),
(3, 'Agente');

-- --------------------------------------------------------

--
-- Estrutura para tabela `quadra`
--

CREATE TABLE IF NOT EXISTS `quadra` (
  `id_quadra` int(11) NOT NULL AUTO_INCREMENT,
  `identificacao` varchar(20) DEFAULT NULL,
  `bairro_id_bairro` int(11) NOT NULL,
  PRIMARY KEY (`id_quadra`,`bairro_id_bairro`),
  KEY `fk_quadras_bairro1_idx` (`bairro_id_bairro`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Fazendo dump de dados para tabela `quadra`
--

INSERT INTO `quadra` (`id_quadra`, `identificacao`, `bairro_id_bairro`) VALUES
(1, '1', 1),
(2, '2', 1),
(3, '3', 1),
(4, '1', 2),
(5, '1', 3),
(6, '2', 3),
(7, '3', 3),
(8, '4', 3),
(9, '1', 4);

-- --------------------------------------------------------

--
-- Estrutura para tabela `rua`
--

CREATE TABLE IF NOT EXISTS `rua` (
  `id_rua` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id_rua`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Fazendo dump de dados para tabela `rua`
--

INSERT INTO `rua` (`id_rua`, `descricao`) VALUES
(1, 'Av. independencia');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tipo_imovel`
--

CREATE TABLE IF NOT EXISTS `tipo_imovel` (
  `id_tipo_imovel` int(11) NOT NULL AUTO_INCREMENT,
  `sigla` char(2) DEFAULT NULL,
  `nome_tipo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_tipo_imovel`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Fazendo dump de dados para tabela `tipo_imovel`
--

INSERT INTO `tipo_imovel` (`id_tipo_imovel`, `sigla`, `nome_tipo`) VALUES
(1, 'R', 'Residencia'),
(2, 'TB', 'Terreno Baldio'),
(3, 'C', 'Comercio'),
(4, 'O', 'Outros');

-- --------------------------------------------------------

--
-- Estrutura para tabela `trabalha`
--

CREATE TABLE IF NOT EXISTS `trabalha` (
  `id_trabalha` int(11) NOT NULL AUTO_INCREMENT,
  `agente_id_agente` int(11) NOT NULL,
  `ciclo_id_ciclo` int(11) NOT NULL,
  `quadra_id_quadra` int(11) NOT NULL,
  `quadra_bairro_id_bairro` int(11) NOT NULL,
  PRIMARY KEY (`id_trabalha`,`agente_id_agente`,`ciclo_id_ciclo`,`quadra_id_quadra`,`quadra_bairro_id_bairro`),
  KEY `fk_trabalha_agente1_idx` (`agente_id_agente`),
  KEY `fk_trabalha_ciclo1_idx` (`ciclo_id_ciclo`),
  KEY `fk_trabalha_quadra1_idx` (`quadra_id_quadra`,`quadra_bairro_id_bairro`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Fazendo dump de dados para tabela `trabalha`
--

INSERT INTO `trabalha` (`id_trabalha`, `agente_id_agente`, `ciclo_id_ciclo`, `quadra_id_quadra`, `quadra_bairro_id_bairro`) VALUES
(21, 1, 2, 5, 3),
(27, 1, 2, 3, 1),
(34, 1, 1, 1, 1),
(35, 1, 1, 2, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `visita`
--

CREATE TABLE IF NOT EXISTS `visita` (
  `id_visita` int(11) NOT NULL,
  `hora` time NOT NULL,
  `pendencia` varchar(45) DEFAULT '0',
  `data` date NOT NULL,
  `tipo_visita` varchar(45) NOT NULL,
  `imovel_id_imovel` int(11) NOT NULL,
  `agente_id_agente` int(11) NOT NULL,
  `ciclo_id_ciclo` int(11) NOT NULL,
  `semana` int(11) NOT NULL,
  `eliminados` int(11) DEFAULT NULL,
  `tratado` varchar(45) DEFAULT NULL,
  `remedio` float DEFAULT NULL,
  `quantidade_tratado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_visita`,`agente_id_agente`,`ciclo_id_ciclo`),
  KEY `fk_visita_imovel1_idx` (`imovel_id_imovel`),
  KEY `fk_visita_agente1_idx` (`agente_id_agente`),
  KEY `fk_visita_ciclo1_idx` (`ciclo_id_ciclo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `visita`
--

INSERT INTO `visita` (`id_visita`, `hora`, `pendencia`, `data`, `tipo_visita`, `imovel_id_imovel`, `agente_id_agente`, `ciclo_id_ciclo`, `semana`, `eliminados`, `tratado`, `remedio`, `quantidade_tratado`) VALUES
(0, '08:00:00', 'F', '2014-09-25', 'Normal', 1, 1, 1, 2, 2, 'Nao', 0, 0),
(0, '08:00:00', 'F', '2014-09-01', 'Normal', 1, 1, 2, 2, 0, '0', 0, 0),
(1, '09:30:00', 'F', '2014-09-01', 'Normal', 1, 1, 1, 1, 5, 'Sim', 1, 1),
(2, '10:00:00', '', '2014-09-01', 'Normal', 2, 1, 1, 1, 2, 'Sim', 2, 1);

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `agente`
--
ALTER TABLE `agente`
  ADD CONSTRAINT `fk_agente_campanha1` FOREIGN KEY (`campanha_id_campanha`) REFERENCES `campanha` (`id_campanha`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_agente_nivel1` FOREIGN KEY (`nivel_id_nivel`) REFERENCES `nivel` (`id_nivel`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `bairro`
--
ALTER TABLE `bairro`
  ADD CONSTRAINT `fk_bairro_cidade1` FOREIGN KEY (`cidade_id_cidade`) REFERENCES `cidade` (`id_cidade`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `cidade`
--
ALTER TABLE `cidade`
  ADD CONSTRAINT `fk_cidade_estado1` FOREIGN KEY (`estado_id_estado`) REFERENCES `estado` (`id_estado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `imovel`
--
ALTER TABLE `imovel`
  ADD CONSTRAINT `fk_imovel_quadra1` FOREIGN KEY (`quadra_id_quadra`, `quadra_bairro_id_bairro`) REFERENCES `quadra` (`id_quadra`, `bairro_id_bairro`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_imovel_rua1` FOREIGN KEY (`rua_id_rua`) REFERENCES `rua` (`id_rua`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_imovel_tipo_imovel1` FOREIGN KEY (`tipo_imovel_id_tipo_imovel`) REFERENCES `tipo_imovel` (`id_tipo_imovel`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `quadra`
--
ALTER TABLE `quadra`
  ADD CONSTRAINT `fk_quadras_bairro1` FOREIGN KEY (`bairro_id_bairro`) REFERENCES `bairro` (`id_bairro`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `trabalha`
--
ALTER TABLE `trabalha`
  ADD CONSTRAINT `fk_trabalha_agente1` FOREIGN KEY (`agente_id_agente`) REFERENCES `agente` (`id_agente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_trabalha_ciclo1` FOREIGN KEY (`ciclo_id_ciclo`) REFERENCES `ciclo` (`id_ciclo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_trabalha_quadra1` FOREIGN KEY (`quadra_id_quadra`, `quadra_bairro_id_bairro`) REFERENCES `quadra` (`id_quadra`, `bairro_id_bairro`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `visita`
--
ALTER TABLE `visita`
  ADD CONSTRAINT `fk_visita_agente1` FOREIGN KEY (`agente_id_agente`) REFERENCES `agente` (`id_agente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_visita_ciclo1` FOREIGN KEY (`ciclo_id_ciclo`) REFERENCES `ciclo` (`id_ciclo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_visita_imovel1` FOREIGN KEY (`imovel_id_imovel`) REFERENCES `imovel` (`id_imovel`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
