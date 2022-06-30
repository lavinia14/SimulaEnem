-- ----------------------------------------------------------------------------
-- MySQL Workbench Migration
-- Migrated Schemata: simula
-- Source Schemata: simula
-- Created: Tue May 24 10:05:50 2022
-- Workbench Version: 8.0.28
-- ------------------------------------------------------------------------------------------------------------

SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------------------------------------------------------
-- Schema simula
-- ----------------------------------------------------------------------------
DROP SCHEMA IF EXISTS `simula` ;
CREATE SCHEMA IF NOT EXISTS `simula` ;


-- ----------------------------------------------------------------------------
-- Table simula.alternativas
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `simula`.`alternativas` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `resposta` TEXT NOT NULL,
  `pergunta_id` INT(11) NOT NULL,
  `val_resposta` INT(1) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- ----------------------------------------------------------------------------
-- Table simula.perguntas
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `simula`.`perguntas` (
  `id` INT(11) NOT NULL,
  `idProvas` INT(11) NOT NULL,
  `titulo` VARCHAR(250) NOT NULL,
  `texto` TEXT NOT NULL,
  `areaConhecimento` VARCHAR(250) NOT NULL,
  `imagem` VARCHAR(250) NOT NULL,
  PRIMARY KEY (`id`))
  
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;

-- ----------------------------------------------------------------------------
-- Table simula.prova
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `simula`.`prova` (
  `id` INT(11) NOT NULL,
  `ano` INT(4) NOT NULL,
  PRIMARY KEY (`ano`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;

-- ----------------------------------------------------------------------------
-- Table simula.provas
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `simula`.`provas` (
  `id` INT(11) NOT NULL,
  `anoProva` INT(11) NOT NULL,
  `semana` INT(1) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;


-- ----------------------------------------------------------------------------
-- Table simula.usuario
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `simula`.`usuario` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(250) NOT NULL,
  `email` VARCHAR(250) NOT NULL,
  `senha` VARCHAR(250) NOT NULL,
  `permissao` INT(1) NOT NULL,
  
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;

-- ----------------------------------------------------------------------------
-- ALTER TABLE PARA ADICIONAR CHAVES ESTRANGEIRAS
-- ----------------------------------------------------------------------------

ALTER TABLE `alternativas` ADD CONSTRAINT `fk_pergunta_id` FOREIGN KEY (`id`) REFERENCES `perguntas`(`id`);
ALTER TABLE `perguntas` ADD CONSTRAINT `fk_idProvas` FOREIGN KEY (`id`) REFERENCES `provas`(`id`);
ALTER TABLE `provas` ADD CONSTRAINT `fk_anoProva` FOREIGN KEY (`ano`) REFERENCES `prova`(`ano`);
