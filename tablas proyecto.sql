-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema Asistente_financiero
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema Asistente_financiero
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `Asistente_financiero` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
USE `Asistente_financiero` ;

-- -----------------------------------------------------
-- Table `Asistente_financiero`.`Usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Asistente_financiero`.`Usuarios` (
  `idUsuarios` INT(11) NOT NULL AUTO_INCREMENT,
  `usuEstado` TINYINT(1) NOT NULL,
  `usuTipoDocumento` VARCHAR(20) NOT NULL,
  `usuDocumento` VARCHAR(20) NOT NULL,
  `usuNombres` VARCHAR(40) NOT NULL,
  `usuApellidos` VARCHAR(40) NOT NULL,
  `usuFechaNacimiento` DATE NOT NULL,
  `usuEdad` INT(3) NOT NULL,
  `usuEstrato` INT(1) NOT NULL,
  `usuUsuSesion` VARCHAR(20) NULL,
  `usuCreated` TIMESTAMP NULL,
  `usuUpdate` TIMESTAMP NULL,
  PRIMARY KEY (`idUsuarios`))
ENGINE = InnoDB
AUTO_INCREMENT = 1;


-- -----------------------------------------------------
-- Table `Asistente_financiero`.`Cuentas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Asistente_financiero`.`Cuentas` (
  `idCuentas` INT(11) NOT NULL,
  `Usuarios_idUsuarios` INT(11) NOT NULL,
  `cueEstado` TINYINT(1) NOT NULL,
  `cueTipo` VARCHAR(20) NOT NULL,
  `cueNombre` VARCHAR(30) NOT NULL,
  `cueSaldo` INT(11) NOT NULL,
  `cueUsuSesion` VARCHAR(20) NULL,
  `cueCreated` TIMESTAMP NULL,
  `cueUpdate` TIMESTAMP NULL,
  PRIMARY KEY (`idCuentas`),
  UNIQUE INDEX `cueNombre_UNIQUE` (`cueNombre` ASC) VISIBLE,
  INDEX `fk_Cuentas_Usuarios1_idx` (`Usuarios_idUsuarios` ASC) VISIBLE,
  CONSTRAINT `fk_Cuentas_Usuarios1`
    FOREIGN KEY (`Usuarios_idUsuarios`)
    REFERENCES `Asistente_financiero`.`Usuarios` (`idUsuarios`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 1;


-- -----------------------------------------------------
-- Table `Asistente_financiero`.`balances`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Asistente_financiero`.`balances` (
  `idBalances` INT(11) NOT NULL,
  `Usuarios_idUsuarios` INT(11) NOT NULL,
  `BalEstado` TINYINT(1) NOT NULL,
  `BalTotal` INT(11) NOT NULL,
  `balUsuSesion` VARCHAR(45) NULL,
  `balCreated` TIMESTAMP NULL,
  `balUpdate` TIMESTAMP NULL,
  PRIMARY KEY (`idBalances`),
  INDEX `fk_balances_Usuarios1_idx` (`Usuarios_idUsuarios` ASC) VISIBLE,
  CONSTRAINT `fk_balances_Usuarios1`
    FOREIGN KEY (`Usuarios_idUsuarios`)
    REFERENCES `Asistente_financiero`.`Usuarios` (`idUsuarios`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 1;


-- -----------------------------------------------------
-- Table `Asistente_financiero`.`Movimientos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Asistente_financiero`.`Movimientos` (
  `idMovimientos` INT(11) NOT NULL,
  `Usuarios_idUsuarios` INT(11) NOT NULL,
  `Cuentas_idCuentas` INT(11) NOT NULL,
  `balances_idBalances` INT(11) NOT NULL,
  `movEstado` TINYINT(1) NOT NULL,
  `movNumero` INT(11) NOT NULL,
  `movTipo` VARCHAR(20) NOT NULL,
  `movNombre` VARCHAR(20) NOT NULL,
  `movCuentaUso` VARCHAR(20) NOT NULL,
  `movValor` INT(11) NOT NULL,
  `movFecha` DATETIME NOT NULL,
  `movUsuSesion` VARCHAR(45) NULL,
  `movCreated` TIMESTAMP NULL,
  `movUpdate` TIMESTAMP NULL,
  PRIMARY KEY (`idMovimientos`),
  UNIQUE INDEX `movNumero_UNIQUE` (`movNumero` ASC) VISIBLE,
  INDEX `fk_Movimientos_Usuarios_idx` (`Usuarios_idUsuarios` ASC) VISIBLE,
  INDEX `fk_Movimientos_Cuentas1_idx` (`Cuentas_idCuentas` ASC) VISIBLE,
  INDEX `fk_Movimientos_balances1_idx` (`balances_idBalances` ASC) VISIBLE,
  CONSTRAINT `fk_Movimientos_Usuarios`
    FOREIGN KEY (`Usuarios_idUsuarios`)
    REFERENCES `Asistente_financiero`.`Usuarios` (`idUsuarios`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Movimientos_Cuentas1`
    FOREIGN KEY (`Cuentas_idCuentas`)
    REFERENCES `Asistente_financiero`.`Cuentas` (`idCuentas`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Movimientos_balances1`
    FOREIGN KEY (`balances_idBalances`)
    REFERENCES `Asistente_financiero`.`balances` (`idBalances`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 1;


-- -----------------------------------------------------
-- Table `Asistente_financiero`.`Soportes`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Asistente_financiero`.`Soportes` (
  `idSoportes` INT(11) NOT NULL,
  `Movimientos_idMovimientos` INT(11) NOT NULL,
  `sopEstado` TINYINT(1) NOT NULL,
  `sopNomComprobante` VARCHAR(20) NOT NULL,
  `sopImagenUrl` VARCHAR(1000) NULL,
  `sopUsuSesion` VARCHAR(45) NULL,
  `sopCreated` TIMESTAMP NULL,
  `sopUpdate` TIMESTAMP NULL,
  PRIMARY KEY (`idSoportes`),
  UNIQUE INDEX `sopNomComprobante_UNIQUE` (`sopNomComprobante` ASC) VISIBLE,
  INDEX `fk_Soportes_Movimientos1_idx` (`Movimientos_idMovimientos` ASC) VISIBLE,
  CONSTRAINT `fk_Soportes_Movimientos1`
    FOREIGN KEY (`Movimientos_idMovimientos`)
    REFERENCES `Asistente_financiero`.`Movimientos` (`idMovimientos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 1;


-- -----------------------------------------------------
-- Table `Asistente_financiero`.`Calendarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Asistente_financiero`.`Calendarios` (
  `idCalendarios` INT(11) NOT NULL,
  `Usuarios_idUsuarios` INT(11) NOT NULL,
  `calEstado` TINYINT(1) NOT NULL,
  `calTipoPago` VARCHAR(20) NOT NULL,
  `calNomPago` VARCHAR(20) NOT NULL,
  `calFechaPago` DATE NOT NULL,
  `calFechaCobroNomina` DATE NOT NULL,
  `calUsuSesion` VARCHAR(45) NULL,
  `calCreated` TIMESTAMP NULL,
  `calUpdate` TIMESTAMP NULL,
  PRIMARY KEY (`idCalendarios`),
  INDEX `fk_Calendarios_Usuarios1_idx` (`Usuarios_idUsuarios` ASC) VISIBLE,
  CONSTRAINT `fk_Calendarios_Usuarios1`
    FOREIGN KEY (`Usuarios_idUsuarios`)
    REFERENCES `Asistente_financiero`.`Usuarios` (`idUsuarios`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 1;


-- -----------------------------------------------------
-- Table `Asistente_financiero`.`Ayudas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Asistente_financiero`.`Ayudas` (
  `idAyudas` INT(11) NOT NULL,
  `Usuarios_idUsuarios` INT(11) NOT NULL,
  `ayuEstado` TINYINT(1) NOT NULL,
  `ayuCodigoConsejo` INT(11) NOT NULL,
  `ayuConsejo` VARCHAR(500) NOT NULL,
  `ayuOpinion` VARCHAR(500) NULL,
  `ayuUsuSesion` VARCHAR(45) NULL,
  `ayuCreated` TIMESTAMP NULL,
  `ayuUpdate` TIMESTAMP NULL,
  PRIMARY KEY (`idAyudas`),
  UNIQUE INDEX `ayuCodigoConsejo_UNIQUE` (`ayuCodigoConsejo` ASC) VISIBLE,
  INDEX `fk_Ayudas_Usuarios1_idx` (`Usuarios_idUsuarios` ASC) VISIBLE,
  CONSTRAINT `fk_Ayudas_Usuarios1`
    FOREIGN KEY (`Usuarios_idUsuarios`)
    REFERENCES `Asistente_financiero`.`Usuarios` (`idUsuarios`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 1;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
