-- ----------------------------------------------------------------------------
-- MySQL Workbench Migration
-- Migrated Schemata: simula
-- Source Schemata: simula
-- Created: Tue May 24 10:05:50 2022
-- Workbench Version: 8.0.28
-- ------------------------------------------------------------------------------------------------------------

-- !!! TODOS OS ALTER TABLES COMENTADOS SÃO APENAS PARA TESTE DA EDITORA, AQUELES PARA EXECUÇÃO ESTÃO NO FINAL DO CÓDIGO;

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
  `val_resposta` INT(11) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 151
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;
-- ALTER TABLE `alternativas` ADD CONSTRAINT `fk_pergunta_id` FOREIGN KEY (`id`) REFERENCES `perguntas`(`id`);


-- ----------------------------------------------------------------------------
-- Table simula.perguntas
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `simula`.`perguntas` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `titulo` TEXT NOT NULL,
  `texto` TEXT NOT NULL,
  `idProva` INT(11) NOT NULL,
  `areaConhecimento` VARCHAR(200) NOT NULL,
  `imagem` VARCHAR(250) NOT NULL,
  PRIMARY KEY (`id`))
  
ENGINE = InnoDB
AUTO_INCREMENT = 32
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;
-- ALTER TABLE `perguntas` ADD CONSTRAINT `fk_idProva` FOREIGN KEY (`id`) REFERENCES `prova`(`id`);

-- ----------------------------------------------------------------------------
-- Table simula.prova
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `simula`.`prova` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `diaProva` DATE NOT NULL,
  `areaConhecimento` VARCHAR(100) NOT NULL,
  `tempo` TIME NOT NULL,
  `ano` INT(4) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;

-- ----------------------------------------------------------------------------
-- Table simula.provas
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `simula`.`provas` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `idProva` INT(11) NOT NULL,
  `areaConhecimento` VARCHAR(100) NOT NULL,
  `semana` INT(1) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;
-- ALTER TABLE `provas` ADD CONSTRAINT `fk_idProva` FOREIGN KEY (`id`) REFERENCES `prova`(`id`);


-- ----------------------------------------------------------------------------
-- Table simula.usuario
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `simula`.`usuario` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(250) NOT NULL,
  `email` VARCHAR(250) NOT NULL,
  `senha` VARCHAR(250) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8mb4
COLLATE = utf8mb4_unicode_ci;

-- ----------------------------------------------------------------------------
-- ALTER TABLE PARA ADICIONAR CHAVES ESTRANGEIRAS
-- ----------------------------------------------------------------------------


ALTER TABLE `alternativas` ADD CONSTRAINT `fk_pergunta_id` FOREIGN KEY (`id`) REFERENCES `perguntas`(`id`);
ALTER TABLE `perguntas` ADD CONSTRAINT `fk_idProva` FOREIGN KEY (`id`) REFERENCES `prova`(`id`);
ALTER TABLE `provas` ADD CONSTRAINT `fk_idProva` FOREIGN KEY (`id`) REFERENCES `prova`(`id`);
