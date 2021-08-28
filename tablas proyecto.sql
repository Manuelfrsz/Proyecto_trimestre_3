SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';


CREATE SCHEMA IF NOT EXISTS `asistente_financiero` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ;
USE `asistente_financiero` ;


CREATE TABLE IF NOT EXISTS `asistente_financiero`.`usuarios` (
  `idUsuarios` INT(11) NOT NULL AUTO_INCREMENT,
  `usuEstado` TINYINT(1) NOT NULL DEFAULT 1,
  `usuTipoDocumento` VARCHAR(20) NOT NULL,
  `usuDocumento` VARCHAR(20) NOT NULL,
  `usuNombres` VARCHAR(40) NOT NULL,
  `usuApellidos` VARCHAR(40) NOT NULL,
  `usuFechaNacimiento` DATE NOT NULL,
  `usuEdad` INT(3) NOT NULL,
  `usuEstrato` INT(1) NOT NULL,
  `usuUsuSesion` VARCHAR(20) NULL DEFAULT NULL,
  `usuCreated` TIMESTAMP NULL DEFAULT NULL,
  `usuUpdate` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`idUsuarios`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;


CREATE TABLE IF NOT EXISTS `asistente_financiero`.`ayudas` (
  `idAyudas` INT(11) NOT NULL AUTO_INCREMENT,
  `Usuarios_idUsuarios` INT(11) NOT NULL,
  `ayuEstado` TINYINT(1) NOT NULL DEFAULT 1,
  `ayuCodigoConsejo` INT(11) NOT NULL,
  `ayuConsejo` VARCHAR(500) NOT NULL,
  `ayuOpinion` VARCHAR(500) NULL DEFAULT NULL,
  `ayuUsuSesion` VARCHAR(45) NULL DEFAULT NULL,
  `ayuCreated` TIMESTAMP NULL DEFAULT NULL,
  `ayuUpdate` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`idAyudas`),
  UNIQUE INDEX `ayuCodigoConsejo_UNIQUE` (`ayuCodigoConsejo` ASC) ,
  INDEX `fk_Ayudas_Usuarios1_idx` (`Usuarios_idUsuarios` ASC) ,
  CONSTRAINT `fk_Ayudas_Usuarios1`
    FOREIGN KEY (`Usuarios_idUsuarios`)
    REFERENCES `asistente_financiero`.`usuarios` (`idUsuarios`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;



CREATE TABLE IF NOT EXISTS `asistente_financiero`.`balances` (
  `idBalances` INT(11) NOT NULL AUTO_INCREMENT,
  `Usuarios_idUsuarios` INT(11) NOT NULL,
  `BalEstado` TINYINT(1) NOT NULL DEFAULT 1,
  `BalTotal` INT(11) NOT NULL,
  `balUsuSesion` VARCHAR(45) NULL DEFAULT NULL,
  `balCreated` TIMESTAMP NULL DEFAULT NULL,
  `balUpdate` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`idBalances`),
  INDEX `fk_balances_usuarios1_idx` (`Usuarios_idUsuarios` ASC),
  CONSTRAINT `fk_balances_usuarios1`
    FOREIGN KEY (`Usuarios_idUsuarios`)
    REFERENCES `asistente_financiero`.`usuarios` (`idUsuarios`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;



CREATE TABLE IF NOT EXISTS `asistente_financiero`.`calendarios` (
  `idCalendarios` INT(11) NOT NULL AUTO_INCREMENT,
  `Usuarios_idUsuarios` INT(11) NOT NULL,
  `calEstado` TINYINT(1) NOT NULL DEFAULT 1,
  `calTipoPago` VARCHAR(20) NOT NULL,
  `calNomPago` VARCHAR(20) NOT NULL,
  `calFechaPago` DATE NOT NULL,
  `calUsuSesion` VARCHAR(45) NULL DEFAULT NULL,
  `calCreated` TIMESTAMP NULL DEFAULT NULL,
  `calUpdate` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`idCalendarios`),
  INDEX `fk_Calendarios_Usuarios1_idx` (`Usuarios_idUsuarios` ASC),
  CONSTRAINT `fk_Calendarios_Usuarios1`
    FOREIGN KEY (`Usuarios_idUsuarios`)
    REFERENCES `asistente_financiero`.`usuarios` (`idUsuarios`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;





CREATE TABLE IF NOT EXISTS `asistente_financiero`.`cuentas` (
  `idCuentas` INT(11) NOT NULL AUTO_INCREMENT,
  `Usuarios_idUsuarios` INT(11) NOT NULL,
  `cueEstado` TINYINT(1) NOT NULL DEFAULT 1,
  `cueTipo` VARCHAR(20) NOT NULL,
  `cueNombre` VARCHAR(30) NOT NULL,
  `cueSaldo` INT(11) NOT NULL,
  `cueUsuSesion` VARCHAR(20) NULL DEFAULT NULL,
  `cueCreated` TIMESTAMP NULL DEFAULT NULL,
  `cueUpdate` TIMESTAMP NULL DEFAULT NULL,
  UNIQUE INDEX `cueNombre_UNIQUE` (`cueNombre` ASC),
  INDEX `fk_Cuentas_Usuarios1_idx` (`Usuarios_idUsuarios` ASC),
  PRIMARY KEY (`idCuentas`),
  CONSTRAINT `fk_Cuentas_Usuarios1`
    FOREIGN KEY (`Usuarios_idUsuarios`)
    REFERENCES `asistente_financiero`.`usuarios` (`idUsuarios`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;





CREATE TABLE IF NOT EXISTS `asistente_financiero`.`movimientos` (
  `idMovimientos` INT(11) NOT NULL AUTO_INCREMENT,
  `Usuarios_idUsuarios` INT(11) NOT NULL,
  `Cuentas_idCuentas` INT(11) NOT NULL,
  `movEstado` TINYINT(1) NOT NULL DEFAULT 1,
  `movTipo` VARCHAR(20) NOT NULL,
  `movNombre` VARCHAR(20) NOT NULL,
  `movCuentaUso` VARCHAR(20) NOT NULL,
  `movValor` INT(11) NOT NULL,
  `movFecha` DATE NOT NULL,
  `movUsuSesion` VARCHAR(45) NULL DEFAULT NULL,
  `movCreated` TIMESTAMP NULL DEFAULT NULL,
  `movUpdate` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`idMovimientos`),
  INDEX `fk_Movimientos_Usuarios_idx` (`Usuarios_idUsuarios` ASC),
  INDEX `fk_Movimientos_Cuentas1_idx` (`Cuentas_idCuentas` ASC),
  CONSTRAINT `fk_Movimientos_Cuentas1`
    FOREIGN KEY (`Cuentas_idCuentas`)
    REFERENCES `asistente_financiero`.`cuentas` (`idCuentas`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Movimientos_Usuarios`
    FOREIGN KEY (`Usuarios_idUsuarios`)
    REFERENCES `asistente_financiero`.`usuarios` (`idUsuarios`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS `asistente_financiero`.`soportes` (
  `idSoportes` INT(11) NOT NULL AUTO_INCREMENT,
  `Movimientos_idMovimientos` INT(11) NOT NULL,
  `sopEstado` TINYINT(1) NOT NULL DEFAULT 1,
  `sopNomComprobante` VARCHAR(20) NOT NULL,
  `sopImagenUrl` VARCHAR(1000) NULL DEFAULT NULL,
  `sopUsuSesion` VARCHAR(45) NULL DEFAULT NULL,
  `sopCreated` TIMESTAMP NULL DEFAULT NULL,
  `sopUpdate` TIMESTAMP NULL DEFAULT NULL,
  PRIMARY KEY (`idSoportes`),
  UNIQUE INDEX `sopNomComprobante_UNIQUE` (`sopNomComprobante` ASC) ,
  INDEX `fk_Soportes_Movimientos1_idx` (`Movimientos_idMovimientos` ASC),
  CONSTRAINT `fk_Soportes_Movimientos1`
    FOREIGN KEY (`Movimientos_idMovimientos`)
    REFERENCES `asistente_financiero`.`movimientos` (`idMovimientos`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_unicode_ci;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
