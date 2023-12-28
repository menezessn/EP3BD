-- MySQL Script generated by MySQL Workbench
-- Tue Nov 21 12:07:34 2023
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema db_filmes
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema db_filmes
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `db_filmes` DEFAULT CHARACTER SET utf8 ;
USE `db_filmes` ;

-- -----------------------------------------------------
-- Table `db_filmes`.`Pessoa`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_filmes`.`Pessoa` (
  `nome_artistico` VARCHAR(100) NOT NULL,
  `nome_verdadeiro` VARCHAR(100) NULL,
  `sexo` VARCHAR(1) NULL,
  `ano_nascimento` DATE NULL,
  `site` VARCHAR(200) NULL,
  `ano_inicio` DATE NULL,
  `anos_trabalhados` INT NULL,
  `status` VARCHAR(45) NULL,
  PRIMARY KEY (`nome_artistico`));


-- -----------------------------------------------------
-- Table `db_filmes`.`Filme`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_filmes`.`Filme` (
  `titulo_original` VARCHAR(200) NOT NULL,
  `ano_producao` INT NOT NULL,
  `titulo_portugues` VARCHAR(200) NULL,
  `arrecadacao_primeiro_ano` FLOAT NULL,
  `idioma_original` VARCHAR(45) NULL,
  `nacionalidade` VARCHAR(45) NULL,
  `classe` VARCHAR(45) NULL,
  `sala_exibicao` INT NULL,
  `data_estreia` DATE NULL,
  PRIMARY KEY (`titulo_original`, `ano_producao`)
);


-- -----------------------------------------------------
-- Table `db_filmes`.`Evento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_filmes`.`Evento` (
  `nome` VARCHAR(100) NOT NULL,
  `ano_inicio` INT NULL,
  `nacionalidade` VARCHAR(45) NULL,
  `tipo` VARCHAR(45) NULL,
  PRIMARY KEY (`nome`));


-- -----------------------------------------------------
-- Table `db_filmes`.`Edicao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_filmes`.`Edicao` (
  `ano` INT NOT NULL,
  `FK_EVENTO_nome` VARCHAR(100) NOT NULL,
  `data` DATE NULL,
  `localizacao` VARCHAR(45) NULL,
  PRIMARY KEY (`ano`, `FK_EVENTO_nome`),
  CONSTRAINT `nome`
    FOREIGN KEY (`FK_EVENTO_nome`)
    REFERENCES `db_filmes`.`Evento` (`nome`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `db_filmes`.`EJuri`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_filmes`.`EJuri` (
  `FK_PESSOA_nome_artistico` VARCHAR(100) NOT NULL,
  `FK_EDICAO_ano` INT NOT NULL,
  `FK_EDICAO_nome` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`FK_PESSOA_nome_artistico`, `FK_EDICAO_ano`, `FK_EDICAO_nome`),
  CONSTRAINT `FK_PESSOA_nome_artistico`
    FOREIGN KEY (`FK_PESSOA_nome_artistico`)
    REFERENCES `db_filmes`.`Pessoa` (`nome_artistico`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `FK_EDICAO_ano`
    FOREIGN KEY (`FK_EDICAO_ano` , `FK_EDICAO_nome`)
    REFERENCES `db_filmes`.`Edicao` (`ano` , `FK_EVENTO_nome`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `db_filmes`.`Premio`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_filmes`.`Premio` (
  `tipo` VARCHAR(45) NOT NULL,
  `FK_EDICAO_ano` INT NOT NULL,
  `FK_EVENTO_nome` VARCHAR(100) NOT NULL,
  `nome` VARCHAR(100) NULL,
  PRIMARY KEY (`tipo`, `FK_EDICAO_ano`, `FK_EVENTO_nome`),
  CONSTRAINT `FK_EDICAO`
    FOREIGN KEY (`FK_EDICAO_ano` , `FK_EVENTO_nome`)
    REFERENCES `db_filmes`.`Edicao` (`ano` , `FK_EVENTO_nome`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `db_filmes`.`ENominado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_filmes`.`ENominado` (
  `FK_FILME_titulo_original` VARCHAR(200) NOT NULL,
  `FK_FILME_ano_producao` INT NOT NULL,
  `FK_PESSOA_nome_artistico` VARCHAR(100) NOT NULL,
  `FK_PREMIO_ano` INT NOT NULL,
  `FK_PREMIO_tipo` VARCHAR(100) NOT NULL,
  `FK_PREMIO_nome` VARCHAR(100) NOT NULL,
  `ganhou` VARCHAR(3) NOT NULL,
  PRIMARY KEY (`FK_FILME_titulo_original`, `FK_FILME_ano_producao`, `FK_PESSOA_nome_artistico`, `FK_PREMIO_ano`, `FK_PREMIO_tipo`, `FK_PREMIO_nome`),
  CONSTRAINT `FK_FILME_enon`
    FOREIGN KEY (`FK_FILME_titulo_original` , `FK_FILME_ano_producao`)
    REFERENCES `db_filmes`.`Filme` (`titulo_original` , `ano_producao`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `FK_PREMIO`
    FOREIGN KEY (`FK_PREMIO_tipo` , `FK_PREMIO_ano` , `FK_PREMIO_nome`)
    REFERENCES `db_filmes`.`Premio` (`tipo` , `FK_EDICAO_ano` , `FK_EVENTO_nome`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `FK_PESSOA`
    FOREIGN KEY (`FK_PESSOA_nome_artistico`)
    REFERENCES `db_filmes`.`Pessoa` (`nome_artistico`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `db_filmes`.`Diretor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_filmes`.`Diretor` (
  `FK_PESSOA_nome_artistico` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`FK_PESSOA_nome_artistico`),
  CONSTRAINT `FK_PESSOA_nome_diretor`
    FOREIGN KEY (`FK_PESSOA_nome_artistico`)
    REFERENCES `db_filmes`.`Pessoa` (`nome_artistico`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `db_filmes`.`OutrasFuncoes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_filmes`.`OutrasFuncoes` (
  `FK_PESSOA_nome_artistico` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`FK_PESSOA_nome_artistico`),
  CONSTRAINT `FK_PESSOA_nome`
    FOREIGN KEY (`FK_PESSOA_nome_artistico`)
    REFERENCES `db_filmes`.`Pessoa` (`nome_artistico`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `db_filmes`.`Ator`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_filmes`.`Ator` (
  `FK_PESSOA_nome_artistico` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`FK_PESSOA_nome_artistico`),
  CONSTRAINT `FK_PESSOA_ator`
    FOREIGN KEY (`FK_PESSOA_nome_artistico`)
    REFERENCES `db_filmes`.`Pessoa` (`nome_artistico`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `db_filmes`.`Documentario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_filmes`.`Documentario` (
  `FK_FILME_titulo_original` VARCHAR(200) NOT NULL,
  `FK_FILME_ano_producao` INT NOT NULL,
  PRIMARY KEY (`FK_FILME_titulo_original`, `FK_FILME_ano_producao`),
  CONSTRAINT `FK_FILME`
    FOREIGN KEY (`FK_FILME_titulo_original` , `FK_FILME_ano_producao`)
    REFERENCES `db_filmes`.`Filme` (`titulo_original` , `ano_producao`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `db_filmes`.`Outros`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_filmes`.`Outros` (
  `FK_FILME_titulo_original` VARCHAR(200) NOT NULL,
  `FK_FILME_ano_producao` INT NOT NULL,
  PRIMARY KEY (`FK_FILME_titulo_original`, `FK_FILME_ano_producao`),
  CONSTRAINT `FK_FILME_outros`
    FOREIGN KEY (`FK_FILME_titulo_original` , `FK_FILME_ano_producao`)
    REFERENCES `db_filmes`.`Filme` (`titulo_original` , `ano_producao`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `db_filmes`.`EDiretor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_filmes`.`EDiretor` (
  `FK_DIRETOR_nome_artistico` VARCHAR(100) NOT NULL,
  `FK_FILME_ano_producao` INT NOT NULL,
  `FK_FILME_titulo_original` VARCHAR(200) NOT NULL,
  `EPrincipal` VARCHAR(3) NULL,
  PRIMARY KEY (`FK_DIRETOR_nome_artistico`, `FK_FILME_ano_producao`, `FK_FILME_titulo_original`),
  CONSTRAINT `FK_DIRETOR_nome_artistico`
    FOREIGN KEY (`FK_DIRETOR_nome_artistico`)
    REFERENCES `db_filmes`.`Diretor` (`FK_PESSOA_nome_artistico`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `FK_FILME_diretor`
    FOREIGN KEY (`FK_FILME_titulo_original` , `FK_FILME_ano_producao`)
    REFERENCES `db_filmes`.`Filme` (`titulo_original` , `ano_producao`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `db_filmes`.`EOutrasFuncoes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_filmes`.`EOutrasFuncoes` (
  `FK_OUTRASFUNCOES_nome_artistico` VARCHAR(100) NOT NULL,
  `FK_FILME_ano_producao` INT NOT NULL,
  `FK_FILME_titulo_original` VARCHAR(200) NOT NULL,
  `funcao` VARCHAR(3) NULL,
  `Eprincipal` VARCHAR(3) NULL,
  PRIMARY KEY (`FK_OUTRASFUNCOES_nome_artistico`, `FK_FILME_ano_producao`, `FK_FILME_titulo_original`),
  CONSTRAINT `FK_OUTRASFUNCOES_nome_artistico`
    FOREIGN KEY (`FK_OUTRASFUNCOES_nome_artistico`)
    REFERENCES `db_filmes`.`OutrasFuncoes` (`FK_PESSOA_nome_artistico`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `FK_FILME_eoutras`
    FOREIGN KEY (`FK_FILME_titulo_original` , `FK_FILME_ano_producao`)
    REFERENCES `db_filmes`.`Filme` (`titulo_original` , `ano_producao`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `db_filmes`.`EAtor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_filmes`.`EAtor` (
  `FK_ATOR_nome_artistico` VARCHAR(100) NOT NULL,
  `FK_OUTROS_ano_producao` INT NOT NULL,
  `FK_OUTROS_titulo_original` VARCHAR(200) NOT NULL,
  `EPrincipal` VARCHAR(3) NULL,
  PRIMARY KEY (`FK_ATOR_nome_artistico`, `FK_OUTROS_ano_producao`, `FK_OUTROS_titulo_original`),
  CONSTRAINT `FK_ATOR_nome_artistico`
    FOREIGN KEY (`FK_ATOR_nome_artistico`)
    REFERENCES `db_filmes`.`Ator` (`FK_PESSOA_nome_artistico`)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `FK_OUTROS_ano_producao00`
    FOREIGN KEY (`FK_OUTROS_titulo_original` , `FK_OUTROS_ano_producao`)
    REFERENCES `db_filmes`.`Outros` (`FK_FILME_titulo_original` , `FK_FILME_ano_producao`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `db_filmes`.`LocalEstreia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_filmes`.`LocalEstreia` (
  `FK_FILME_titulo_original` VARCHAR(200) NOT NULL,
  `FK_FILME_ano_producao` INT NOT NULL,
  `Local` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`FK_FILME_titulo_original`, `Local`, `FK_FILME_ano_producao`),
  CONSTRAINT `FK_FILME_local`
    FOREIGN KEY (`FK_FILME_titulo_original` , `FK_FILME_ano_producao`)
    REFERENCES `db_filmes`.`Filme` (`titulo_original` , `ano_producao`)
    ON DELETE CASCADE
    ON UPDATE CASCADE);


-- -----------------------------------------------------
-- Table `db_filmes`.`FilmeNominado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_filmes`.`FilmeNominado` (
  `FK_FILME_titulo_original` VARCHAR(200) NOT NULL,
  `FK_FILME_ano_producao` INT NOT NULL,
  `FK_PREMIO_nome` VARCHAR(100) NOT NULL,
  `FK_PREMIO_ano` INT NOT NULL,
  `FK_PREMIO_tipo` VARCHAR(45) NOT NULL,
  `ganhou` VARCHAR(3) NOT NULL,
  PRIMARY KEY (`FK_FILME_titulo_original`, `FK_FILME_ano_producao`, `FK_PREMIO_nome`, `FK_PREMIO_ano`, `FK_PREMIO_tipo`),
  CONSTRAINT `FK_PREMIO_filme_nominado`
    FOREIGN KEY (`FK_PREMIO_tipo` , `FK_PREMIO_ano` , `FK_PREMIO_nome`)
    REFERENCES `db_filmes`.`Premio` (`tipo` , `FK_EDICAO_ano` , `FK_EVENTO_nome`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `FK_FILME_filme_nominado`
    FOREIGN KEY (`FK_FILME_titulo_original` , `FK_FILME_ano_producao`)
    REFERENCES `db_filmes`.`Filme` (`titulo_original` , `ano_producao`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


DELIMITER $
CREATE TRIGGER verifica_juri
BEFORE INSERT
ON Ejuri
FOR EACH ROW
BEGIN
    DECLARE valor_existente INT;

    -- Verificar se o valor existe na outra tabela
    SELECT COUNT(*)
    INTO valor_existente
    FROM Enominado
    WHERE FK_PREMIO_ano = NEW.FK_EDICAO_ano AND FK_PREMIO_nome = NEW.FK_EDICAO_nome and FK_PESSOA_nome_artistico = new.FK_PESSOA_nome_artistico;

    -- Se o valor existe, impedir a inserção
    IF valor_existente > 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'A pessoa foi nominada para este evento, não pode ser jurada';
    END IF;
END$
DELIMITER ;

DELIMITER $
CREATE TRIGGER verifica_nominacao
BEFORE INSERT
ON Enominado
FOR EACH ROW
BEGIN
    DECLARE valor_existente INT;

    -- Verificar se o valor existe na outra tabela
    SELECT COUNT(*)
    INTO valor_existente
    FROM Ejuri
    WHERE FK_EDICAO_ano = NEW.FK_PREMIO_ano AND FK_EDICAO_nome = NEW.FK_PREMIO_nome and FK_PESSOA_nome_artistico = new.FK_PESSOA_nome_artistico;


    -- Se o valor existe, impedir a inserção
    IF valor_existente > 0 THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'A pessoa é jurada deste evento, não pode ser nominada';
    END IF;
END$
DELIMITER ;

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
