-- MySQL Script generated by MySQL Workbench
-- Sex 12 Set 2014 20:45:31 BRT
-- Model: New Model    Version: 1.0
SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
-- -----------------------------------------------------
-- Schema test
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `test` DEFAULT CHARACTER SET latin1 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`estado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `estado` (
  `id_estado` INT NOT NULL,
  `nome_estado` VARCHAR(45) NULL,
  `sigla` CHAR(2) NULL,
  PRIMARY KEY (`id_estado`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`cidade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cidade` (
  `id_cidade` INT NOT NULL,
  `nome_cidade` VARCHAR(45) NULL,
  `estado_id_estado` INT NOT NULL,
  PRIMARY KEY (`id_cidade`),
  INDEX `fk_cidade_estado1_idx` (`estado_id_estado` ASC),
  CONSTRAINT `fk_cidade_estado1`
    FOREIGN KEY (`estado_id_estado`)
    REFERENCES `mydb`.`estado` (`id_estado`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`bairro`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `bairro` (
  `id_bairro` INT NOT NULL AUTO_INCREMENT,
  `nome_bairro` VARCHAR(45) NULL,
  `cidade_id_cidade` INT NOT NULL,
  PRIMARY KEY (`id_bairro`),
  INDEX `fk_bairro_cidade1_idx` (`cidade_id_cidade` ASC),
  CONSTRAINT `fk_bairro_cidade1`
    FOREIGN KEY (`cidade_id_cidade`)
    REFERENCES `mydb`.`cidade` (`id_cidade`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`quadra`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `quadra` (
  `id_quadra` INT NOT NULL AUTO_INCREMENT,
  `identificacao` VARCHAR(20) NULL,
  `bairro_id_bairro` INT NOT NULL,
  PRIMARY KEY (`id_quadra`, `bairro_id_bairro`),
  INDEX `fk_quadras_bairro1_idx` (`bairro_id_bairro` ASC),
  CONSTRAINT `fk_quadras_bairro1`
    FOREIGN KEY (`bairro_id_bairro`)
    REFERENCES `mydb`.`bairro` (`id_bairro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`rua`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `rua` (
  `id_rua` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(60) NULL,
  PRIMARY KEY (`id_rua`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tipo_imovel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tipo_imovel` (
  `id_tipo_imovel` INT NOT NULL AUTO_INCREMENT,
  `sigla` CHAR(2) NULL,
  `descricao` VARCHAR(45) NULL,
  PRIMARY KEY (`id_tipo_imovel`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`imovel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `imovel` (
  `id_imovel` INT NOT NULL AUTO_INCREMENT,
  `quantidade_habitantes` INT NULL,
  `quantidade_caes` INT NULL,
  `quantidade_gatos` INT NULL,
  `numero_imovel` VARCHAR(10) NULL,
  `ladoquadra` INT NOT NULL,
  `Quadra_Bairro_id` INT NOT NULL,
  `quadra_id_quadra` INT NOT NULL,
  `quadra_bairro_id_bairro` INT NOT NULL,
  `rua_id_rua` INT NOT NULL,
  `tipo_imovel_id_tipo_imovel` INT NOT NULL,
  PRIMARY KEY (`id_imovel`),
  INDEX `fk_imovel_quadra1_idx` (`quadra_id_quadra` ASC, `quadra_bairro_id_bairro` ASC),
  INDEX `fk_imovel_rua1_idx` (`rua_id_rua` ASC),
  INDEX `fk_imovel_tipo_imovel1_idx` (`tipo_imovel_id_tipo_imovel` ASC),
  CONSTRAINT `fk_imovel_quadra1`
    FOREIGN KEY (`quadra_id_quadra` , `quadra_bairro_id_bairro`)
    REFERENCES `mydb`.`quadra` (`id_quadra` , `bairro_id_bairro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_imovel_rua1`
    FOREIGN KEY (`rua_id_rua`)
    REFERENCES `mydb`.`rua` (`id_rua`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_imovel_tipo_imovel1`
    FOREIGN KEY (`tipo_imovel_id_tipo_imovel`)
    REFERENCES `mydb`.`tipo_imovel` (`id_tipo_imovel`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tipo_atividade`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tipo_atividade` (
  `id_tipo_atividade` INT NOT NULL AUTO_INCREMENT,
  `sigla` VARCHAR(4) NOT NULL,
  `descricao` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id_tipo_atividade`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`visita`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `visita` (
  `id_visita` INT NOT NULL,
  `hora` TIME NOT NULL,
  `pendencia` CHAR NULL DEFAULT false,
  `data` DATE NOT NULL,
  `tipo_visita` CHAR NOT NULL,
  `imovel_id_imovel` INT NOT NULL,
  `tipo_atividade_id_tipo_atividade` INT NOT NULL,
  PRIMARY KEY (`id_visita`),
  INDEX `fk_visita_imovel1_idx` (`imovel_id_imovel` ASC),
  INDEX `fk_visita_tipo_atividade1_idx` (`tipo_atividade_id_tipo_atividade` ASC),
  CONSTRAINT `fk_visita_imovel1`
    FOREIGN KEY (`imovel_id_imovel`)
    REFERENCES `mydb`.`imovel` (`id_imovel`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_visita_tipo_atividade1`
    FOREIGN KEY (`tipo_atividade_id_tipo_atividade`)
    REFERENCES `mydb`.`tipo_atividade` (`id_tipo_atividade`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`tratamento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tratamento` (
  `quantidade_depositos_eliminados` INT NULL,
  `imovel_tratado` TINYINT(1) NULL,
  `quantidade_larvicida` FLOAT NULL,
  `quantidade_deposito_tratado` INT NULL,
  `tipo_larvicida` CHAR(2) NULL,
  `tipo_atividade_id_tipo_atividade` INT NOT NULL,
  INDEX `fk_tratamento_tipo_atividade1_idx` (`tipo_atividade_id_tipo_atividade` ASC),
  CONSTRAINT `fk_tratamento_tipo_atividade1`
    FOREIGN KEY (`tipo_atividade_id_tipo_atividade`)
    REFERENCES `mydb`.`tipo_atividade` (`id_tipo_atividade`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`pesquisa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pesquisa` (
  `A1` INT NULL COMMENT 'Caixa d\'agua',
  `A2` INT NULL COMMENT 'Outros depósitos de armazenamento de água (baixo).',
  `B` INT NULL COMMENT 'Pequenos depósitos móveis.',
  `C` INT NULL COMMENT 'Depósito fixo.',
  `D1` INT NULL COMMENT 'Pneus e outros materais rodantes',
  `D2` INT NULL COMMENT 'Lixo (recipientes, plásticos, latas), sucatas, entulhos.',
  `E` INT NULL COMMENT 'Depósitos naturais.',
  `nr_amostra_inicial` INT NULL,
  `nr_amostra_final` INT NULL,
  `quantidade_tubitos` INT NULL,
  `tipo_atividade_id_tipo_atividade` INT NOT NULL,
  INDEX `fk_pesquisa_tipo_atividade1_idx` (`tipo_atividade_id_tipo_atividade` ASC),
  CONSTRAINT `fk_pesquisa_tipo_atividade1`
    FOREIGN KEY (`tipo_atividade_id_tipo_atividade`)
    REFERENCES `mydb`.`tipo_atividade` (`id_tipo_atividade`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`nivel`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `nivel` (
  `id_nivel` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NULL,
  PRIMARY KEY (`id_nivel`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`campanha`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `campanha` (
  `id_campanha` INT NOT NULL AUTO_INCREMENT,
  `descricao` VARCHAR(45) NULL,
  PRIMARY KEY (`id_campanha`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`agente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `agente` (
  `id_agente` INT NOT NULL AUTO_INCREMENT,
  `barra` VARCHAR(45) NOT NULL,
  `nome` VARCHAR(45) NOT NULL,
  `telefone` VARCHAR(45) NULL,
  `celular` VARCHAR(45) NULL,
  `login` VARCHAR(45) NOT NULL,
  `senha` VARCHAR(45) NOT NULL,
  `nivel_id_nivel` INT NOT NULL,
  `campanha_id_campanha` INT NOT NULL,
  PRIMARY KEY (`id_agente`),
  INDEX `fk_agente_nivel1_idx` (`nivel_id_nivel` ASC),
  INDEX `fk_agente_campanha1_idx` (`campanha_id_campanha` ASC),
  CONSTRAINT `fk_agente_nivel1`
    FOREIGN KEY (`nivel_id_nivel`)
    REFERENCES `mydb`.`nivel` (`id_nivel`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_agente_campanha1`
    FOREIGN KEY (`campanha_id_campanha`)
    REFERENCES `mydb`.`campanha` (`id_campanha`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`ciclo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ciclo` (
  `id_ciclo` INT NOT NULL AUTO_INCREMENT,
  `data_inicio` DATE NOT NULL,
  `data_fim` DATE NOT NULL,
  `numero` INT NOT NULL COMMENT 'O número do ciclo é calculado através do ano base e do último número do ciclo.',
  `anoBase` INT NOT NULL,
  PRIMARY KEY (`id_ciclo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`trabalha`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `trabalha` (
  `id_trabalha` INT NOT NULL AUTO_INCREMENT,
  `agente_id_agente` INT NOT NULL,
  `ciclo_id_ciclo` INT NOT NULL,
  `quadra_id_quadra` INT NOT NULL,
  `quadra_bairro_id_bairro` INT NOT NULL,
  PRIMARY KEY (`id_trabalha`, `agente_id_agente`, `ciclo_id_ciclo`, `quadra_id_quadra`, `quadra_bairro_id_bairro`),
  INDEX `fk_trabalha_agente1_idx` (`agente_id_agente` ASC),
  INDEX `fk_trabalha_ciclo1_idx` (`ciclo_id_ciclo` ASC),
  INDEX `fk_trabalha_quadra1_idx` (`quadra_id_quadra` ASC, `quadra_bairro_id_bairro` ASC),
  CONSTRAINT `fk_trabalha_agente1`
    FOREIGN KEY (`agente_id_agente`)
    REFERENCES `mydb`.`agente` (`id_agente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_trabalha_ciclo1`
    FOREIGN KEY (`ciclo_id_ciclo`)
    REFERENCES `mydb`.`ciclo` (`id_ciclo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_trabalha_quadra1`
    FOREIGN KEY (`quadra_id_quadra` , `quadra_bairro_id_bairro`)
    REFERENCES `mydb`.`quadra` (`id_quadra` , `bairro_id_bairro`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `test` ;
USE `test` ;