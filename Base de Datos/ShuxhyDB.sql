-- MySQL Script generated by MySQL Workbench
-- Mon Jul 16 20:12:19 2018
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema ShuxhyDB
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema ShuxhyDB
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `ShuxhyDB` DEFAULT CHARACTER SET utf8 ;
USE `ShuxhyDB` ;

-- -----------------------------------------------------
-- Table `ShuxhyDB`.`Cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ShuxhyDB`.`Cliente` (
  `IdCliente` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(20) NOT NULL,
  `Apellido` VARCHAR(20) NOT NULL,
  `UsuarioIG` VARCHAR(25) NOT NULL,
  `Comentario` VARCHAR(200) NOT NULL DEFAULT 'NA',
  `Telefono` VARCHAR(20) NOT NULL,
  `Direccion` VARCHAR(150) NOT NULL DEFAULT 'NA',
  `Condicion` TINYINT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`IdCliente`),
  UNIQUE INDEX `Telefono_UNIQUE` (`Telefono` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ShuxhyDB`.`Unidad`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ShuxhyDB`.`Unidad` (
  `IdUnidad` INT NOT NULL AUTO_INCREMENT,
  `NombreUnidad` VARCHAR(50) NOT NULL,
  `Abreviatura` VARCHAR(10) NULL DEFAULT NULL,
  `Condicion` TINYINT NULL DEFAULT NULL,
  PRIMARY KEY (`IdUnidad`),
  UNIQUE INDEX `NombreUnidad_UNIQUE` (`NombreUnidad` ASC),
  UNIQUE INDEX `Abreviatura_UNIQUE` (`Abreviatura` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ShuxhyDB`.`Relleno`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ShuxhyDB`.`Relleno` (
  `IdRelleno` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(50) NOT NULL,
  `Abreviatura` VARCHAR(10) NULL DEFAULT NULL,
  `Condicion` TINYINT NULL DEFAULT NULL,
  PRIMARY KEY (`IdRelleno`),
  UNIQUE INDEX `Nombre_UNIQUE` (`Nombre` ASC),
  UNIQUE INDEX `Abreviatura_UNIQUE` (`Abreviatura` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ShuxhyDB`.`Sabor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ShuxhyDB`.`Sabor` (
  `IdSabor` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(50) NOT NULL,
  `Abreviatura` VARCHAR(10) NULL DEFAULT NULL,
  `Condicion` TINYINT NULL DEFAULT NULL,
  PRIMARY KEY (`IdSabor`),
  UNIQUE INDEX `Nombre_UNIQUE` (`Nombre` ASC),
  UNIQUE INDEX `Abreviatura_UNIQUE` (`Abreviatura` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ShuxhyDB`.`Forma`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ShuxhyDB`.`Forma` (
  `IdForma` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(50) NOT NULL,
  `Abreviatura` VARCHAR(10) NULL DEFAULT NULL,
  `Condicion` TINYINT NULL DEFAULT NULL,
  PRIMARY KEY (`IdForma`),
  UNIQUE INDEX `Nombre_UNIQUE` (`Nombre` ASC),
  UNIQUE INDEX `Abreviatura_UNIQUE` (`Abreviatura` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ShuxhyDB`.`Topping`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ShuxhyDB`.`Topping` (
  `IdTopping` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(50) NOT NULL,
  `Abreviatura` VARCHAR(10) NULL DEFAULT NULL,
  `Condicion` TINYINT NULL DEFAULT NULL,
  PRIMARY KEY (`IdTopping`),
  UNIQUE INDEX `Nombre_UNIQUE` (`Nombre` ASC),
  UNIQUE INDEX `Abreviatura_UNIQUE` (`Abreviatura` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ShuxhyDB`.`Producto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ShuxhyDB`.`Producto` (
  `IdProducto` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(20) NOT NULL,
  `Descripcion` VARCHAR(45) NULL DEFAULT 'NA',
  `IdUnidad` INT NOT NULL,
  `CostoProduccion` FLOAT NOT NULL,
  `Precio` FLOAT NOT NULL DEFAULT 0,
  `IdForma` INT NOT NULL,
  `IdTopping` INT NOT NULL,
  `IdRelleno` INT NOT NULL,
  `IdSabor` INT NOT NULL,
  `Condicion` TINYINT NULL DEFAULT NULL,
  `Stock` FLOAT NOT NULL,
  `Imagen` VARCHAR(50) NULL DEFAULT NULL,
  PRIMARY KEY (`IdProducto`),
  INDEX `fk_IdUnidad_Producto_idx` (`IdUnidad` ASC),
  INDEX `fk_IdForma_Producto_idx` (`IdForma` ASC),
  INDEX `fk_IdTopping_Producto_idx` (`IdTopping` ASC),
  INDEX `fk_IdRelleno_Producto_idx` (`IdRelleno` ASC),
  INDEX `fk_IdSabor_Producto_idx` (`IdSabor` ASC),
  CONSTRAINT `fk_IdUnidad_Producto`
    FOREIGN KEY (`IdUnidad`)
    REFERENCES `ShuxhyDB`.`Unidad` (`IdUnidad`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_IdForma_Producto`
    FOREIGN KEY (`IdForma`)
    REFERENCES `ShuxhyDB`.`Forma` (`IdForma`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_IdTopping_Producto`
    FOREIGN KEY (`IdTopping`)
    REFERENCES `ShuxhyDB`.`Topping` (`IdTopping`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_IdRelleno_Producto`
    FOREIGN KEY (`IdRelleno`)
    REFERENCES `ShuxhyDB`.`Relleno` (`IdRelleno`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_IdSabor_Producto`
    FOREIGN KEY (`IdSabor`)
    REFERENCES `ShuxhyDB`.`Sabor` (`IdSabor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ShuxhyDB`.`Combo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ShuxhyDB`.`Combo` (
  `IdCombo` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(20) NOT NULL,
  `Descripcion` VARCHAR(200) NOT NULL,
  `Subtotal` FLOAT NOT NULL,
  `Total` FLOAT NULL DEFAULT NULL,
  `Imagen` VARCHAR(50) NULL DEFAULT NULL,
  `Condicion` TINYINT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`IdCombo`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ShuxhyDB`.`DetalleCombo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ShuxhyDB`.`DetalleCombo` (
  `IdDetalleCombo` INT NOT NULL AUTO_INCREMENT,
  `IdCombo` INT NOT NULL,
  `Cantidad` INT NULL DEFAULT NULL,
  `IdProducto` INT NOT NULL,
  `Precio` FLOAT NOT NULL,
  `Descuento` FLOAT NULL DEFAULT NULL,
  PRIMARY KEY (`IdDetalleCombo`),
  INDEX `fk_Idcombo_DescripcionCombo_idx` (`IdCombo` ASC),
  INDEX `fk_idproducto_detallecombo_idx` (`IdProducto` ASC),
  CONSTRAINT `fk_Idcombo_DetalleCombo`
    FOREIGN KEY (`IdCombo`)
    REFERENCES `ShuxhyDB`.`Combo` (`IdCombo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_idproducto_detallecombo`
    FOREIGN KEY (`IdProducto`)
    REFERENCES `ShuxhyDB`.`Producto` (`IdProducto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ShuxhyDB`.`Pedido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ShuxhyDB`.`Pedido` (
  `IdPedido` INT NOT NULL AUTO_INCREMENT,
  `IdCliente` INT NULL DEFAULT NULL,
  `Estatus` VARCHAR(45) NULL DEFAULT NULL,
  `DireccionEntrega` VARCHAR(45) NULL DEFAULT NULL,
  `FechaRealizado` DATETIME NOT NULL,
  `FechaEntrega` DATETIME NOT NULL,
  `Total` FLOAT NOT NULL,
  `Comentario` VARCHAR(45) NULL DEFAULT NULL,
  `Condicion` TINYINT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`IdPedido`),
  INDEX `fk_IdCliente_Pedido_idx` (`IdCliente` ASC),
  CONSTRAINT `fk_IdCliente_Pedido`
    FOREIGN KEY (`IdCliente`)
    REFERENCES `ShuxhyDB`.`Cliente` (`IdCliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ShuxhyDB`.`DetallePedido`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ShuxhyDB`.`DetallePedido` (
  `IdDetallePedido` INT NOT NULL AUTO_INCREMENT,
  `IdPedido` INT NULL,
  `IdCombo` INT NULL DEFAULT NULL,
  `IdProducto` INT NULL DEFAULT NULL,
  `Cantidad` INT NULL DEFAULT NULL,
  `CantidadCombo` INT NULL,
  `Subtotal` FLOAT NULL,
  `PrecioProducto` FLOAT NULL,
  `PrecioCombo` FLOAT NULL,
  `Comentario` VARCHAR(250) NULL DEFAULT NULL,
  PRIMARY KEY (`IdDetallePedido`),
  INDEX `fk_IdPedido_Descripcion_idx` (`IdPedido` ASC),
  INDEX `fk_IdCombo_Pedido_idx` (`IdCombo` ASC),
  INDEX `fk_IdProducto_idx` (`IdProducto` ASC),
  CONSTRAINT `fk_IdPedido_Descripcion`
    FOREIGN KEY (`IdPedido`)
    REFERENCES `ShuxhyDB`.`Pedido` (`IdPedido`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_IdCombo_Pedido`
    FOREIGN KEY (`IdCombo`)
    REFERENCES `ShuxhyDB`.`Combo` (`IdCombo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_IdProducto`
    FOREIGN KEY (`IdProducto`)
    REFERENCES `ShuxhyDB`.`Producto` (`IdProducto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ShuxhyDB`.`Factura`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ShuxhyDB`.`Factura` (
  `IdFactura` INT NOT NULL AUTO_INCREMENT,
  `Fecha` DATETIME NULL DEFAULT NULL,
  `TotalFacturado` FLOAT NOT NULL,
  `Formapago` VARCHAR(45) NULL DEFAULT NULL,
  `Comentario` VARCHAR(250) NULL DEFAULT NULL,
  `Impuesto` FLOAT NULL DEFAULT NULL,
  `Condicion` TINYINT NULL DEFAULT NULL,
  PRIMARY KEY (`IdFactura`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ShuxhyDB`.`DetalleFactura`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ShuxhyDB`.`DetalleFactura` (
  `IdDetalleFactura` INT NOT NULL AUTO_INCREMENT,
  `IdFactura` INT NULL DEFAULT NULL,
  `IdPedido` INT NULL DEFAULT NULL,
  `IdProducto` INT NULL DEFAULT NULL,
  `IdCombo` INT NULL DEFAULT NULL,
  `Cantidad` INT NULL DEFAULT NULL,
  `CantidadCombo` INT NULL,
  `PrecioProd` FLOAT NULL DEFAULT NULL,
  `PrecioComb` INT NULL DEFAULT NULL,
  `PrecioPed` INT NULL DEFAULT NULL,
  `Subtotal` FLOAT NOT NULL,
  PRIMARY KEY (`IdDetalleFactura`),
  INDEX `Fk_IdProducto_DetalleFactura` (`IdProducto` ASC),
  INDEX `Fk_IdCombo_detalleFactura` (`IdCombo` ASC),
  INDEX `Fk_Factura_detallefact_idx` (`IdFactura` ASC),
  INDEX `Fk_IdPedido_detalleFactura` (`IdPedido` ASC),
  CONSTRAINT `Fk_IdPedido_detalleFactura`
    FOREIGN KEY (`IdPedido`)
    REFERENCES `ShuxhyDB`.`Pedido` (`IdPedido`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `Fk_IdProducto_DetalleFactura`
    FOREIGN KEY (`IdProducto`)
    REFERENCES `ShuxhyDB`.`Producto` (`IdProducto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `Fk_IdCombo_detalleFactura`
    FOREIGN KEY (`IdCombo`)
    REFERENCES `ShuxhyDB`.`Combo` (`IdCombo`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `Fk_Factura_detallefact`
    FOREIGN KEY (`IdFactura`)
    REFERENCES `ShuxhyDB`.`Factura` (`IdFactura`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ShuxhyDB`.`Material`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ShuxhyDB`.`Material` (
  `IdMaterial` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(45) NOT NULL,
  `Descripcion` VARCHAR(250) NULL DEFAULT NULL,
  `IdUnidad` INT NOT NULL,
  `Costo` FLOAT NOT NULL,
  `Imagen` VARCHAR(50) NULL DEFAULT NULL,
  `Stock` FLOAT NOT NULL,
  `Condicion` TINYINT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`IdMaterial`),
  INDEX `fk_IdUnidad_material_idx` (`IdUnidad` ASC),
  CONSTRAINT `fk_IdUnidad_material`
    FOREIGN KEY (`IdUnidad`)
    REFERENCES `ShuxhyDB`.`Unidad` (`IdUnidad`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ShuxhyDB`.`Receta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ShuxhyDB`.`Receta` (
  `IdReceta` INT NOT NULL AUTO_INCREMENT,
  `Nombre` VARCHAR(45) NULL DEFAULT NULL,
  `Descripcion` VARCHAR(200) NULL DEFAULT NULL,
  `Equipo` VARCHAR(100) NULL DEFAULT NULL,
  `SubTotal` FLOAT NULL DEFAULT NULL,
  `CostoIndirecto` FLOAT NOT NULL,
  `CostoManoDeObra` FLOAT NOT NULL,
  `CostoDeReposicion` FLOAT NOT NULL,
  `Total` FLOAT NULL DEFAULT NULL,
  `TiempoPreparacion` VARCHAR(45) NULL DEFAULT NULL,
  `Porcion` INT NULL DEFAULT NULL,
  `Condicion` TINYINT(1) NULL DEFAULT NULL,
  `IdProducto` INT NULL,
  PRIMARY KEY (`IdReceta`),
  INDEX `fk_Producto_Receta_idx` (`IdProducto` ASC),
  CONSTRAINT `fk_Producto_Receta`
    FOREIGN KEY (`IdProducto`)
    REFERENCES `ShuxhyDB`.`Producto` (`IdProducto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ShuxhyDB`.`DetalleReceta`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ShuxhyDB`.`DetalleReceta` (
  `IdDetalleReceta` INT NOT NULL AUTO_INCREMENT,
  `IdReceta` INT NULL DEFAULT NULL,
  `IdMaterial` INT NOT NULL,
  `Cantidad` FLOAT NOT NULL,
  `IdUnidad` INT NOT NULL,
  `CostoMaterial` FLOAT NULL DEFAULT NULL,
  PRIMARY KEY (`IdDetalleReceta`),
  INDEX `fk_material_detallereceta_idx` (`IdMaterial` ASC),
  INDEX `fk_receta_detallereceta_idx` (`IdReceta` ASC),
  INDEX `fk_unidad_detallereceta_idx` (`IdUnidad` ASC),
  CONSTRAINT `fk_material_detallereceta`
    FOREIGN KEY (`IdMaterial`)
    REFERENCES `ShuxhyDB`.`Material` (`IdMaterial`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_receta_detallereceta`
    FOREIGN KEY (`IdReceta`)
    REFERENCES `ShuxhyDB`.`Receta` (`IdReceta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_unidad_detallereceta`
    FOREIGN KEY (`IdUnidad`)
    REFERENCES `ShuxhyDB`.`Unidad` (`IdUnidad`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ShuxhyDB`.`Produccion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ShuxhyDB`.`Produccion` (
  `IdProduccion` INT NOT NULL AUTO_INCREMENT,
  `Fecha` DATETIME NULL DEFAULT NULL,
  `IdReceta` INT NULL DEFAULT NULL,
  `IdProducto` INT NULL DEFAULT NULL,
  `CantidadProducida` INT NULL DEFAULT NULL,
  `CantidadProducir` INT NULL DEFAULT NULL,
  `CantidadFaltante` INT NULL DEFAULT NULL,
  `Estatus` VARCHAR(45) NULL DEFAULT NULL,
  `Comentario` VARCHAR(45) NULL DEFAULT NULL,
  `Condicion` TINYINT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`IdProduccion`),
  INDEX `fk_producto_produccion_idx` (`IdProducto` ASC),
  INDEX `fk_receta_produccion_idx` (`IdReceta` ASC),
  CONSTRAINT `fk_receta_produccion`
    FOREIGN KEY (`IdReceta`)
    REFERENCES `ShuxhyDB`.`Receta` (`IdReceta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
    CONSTRAINT `fk_producto_produccion`
    FOREIGN KEY (`IdProducto`)
    REFERENCES `ShuxhyDB`.`Producto` (`IdProducto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;



-- -----------------------------------------------------
-- Table `ShuxhyDB`.`Suplidor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ShuxhyDB`.`Suplidor` (
  `IdSuplidor` INT NOT NULL AUTO_INCREMENT,
  `Compania` VARCHAR(20) NOT NULL,
  `Telefono` VARCHAR(20) NOT NULL,
  `NombreContacto` VARCHAR(20) NOT NULL,
  `Direccion` VARCHAR(150) NOT NULL DEFAULT 'NA',
  `Comentario` VARCHAR(200) NOT NULL DEFAULT 'NA',
  `Condicion` TINYINT(1) NULL DEFAULT NULL,
  PRIMARY KEY (`IdSuplidor`),
  UNIQUE INDEX `Telefono_UNIQUE` (`Telefono` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ShuxhyDB`.`Compra`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ShuxhyDB`.`Compra` (
  `IdCompra` INT NOT NULL AUTO_INCREMENT,
  `IdSuplidor` INT NULL,
  `Fecha` DATETIME NULL DEFAULT NULL,
  `Total` FLOAT NOT NULL,
  `Comentario` VARCHAR(250) NULL DEFAULT NULL,
  `Condicion` TINYINT NULL DEFAULT NULL,
  PRIMARY KEY (`IdCompra`),
  INDEX `fk_Suplidor_compra_idx` (`IdSuplidor` ASC),
  CONSTRAINT `fk_Suplidor_compra`
    FOREIGN KEY (`IdSuplidor`)
    REFERENCES `ShuxhyDB`.`Suplidor` (`IdSuplidor`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ShuxhyDB`.`DetalleCompra`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ShuxhyDB`.`DetalleCompra` (
  `IdDetalleCompra` INT NOT NULL AUTO_INCREMENT,
  `IdMaterial` INT NULL,
  `IdCompra` INT NULL DEFAULT NULL,
  `Cantidad` FLOAT NULL DEFAULT NULL,
  `Precio` FLOAT NULL DEFAULT NULL,
  PRIMARY KEY (`IdDetalleCompra`),
  INDEX `Fk_Factura_detallefact_idx` (`IdCompra` ASC),
  CONSTRAINT `Fk_Compra_detalleComp`
    FOREIGN KEY (`IdCompra`)
    REFERENCES `ShuxhyDB`.`Compra` (`IdCompra`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ShuxhyDB`.`MaterialUtilizado`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ShuxhyDB`.`MaterialUtilizado` (
  `IdMaterialUtilizado` INT NOT NULL AUTO_INCREMENT,
  `IdReceta` INT NULL,
  `IdProduccion` INT NULL,
  `IdDetalleReceta` INT NULL,
  `IdMaterial` INT NOT NULL,
  `CantidadMat` FLOAT NOT NULL,
  PRIMARY KEY (`IdMaterialUtilizado`),
  INDEX `fkdet_idx` (`IdDetalleReceta` ASC),
  INDEX `fkpro_idx` (`IdProduccion` ASC),
  CONSTRAINT `fkdet`
    FOREIGN KEY (`IdDetalleReceta`)
    REFERENCES `ShuxhyDB`.`DetalleReceta` (`IdDetalleReceta`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fkpro`
    FOREIGN KEY (`IdProduccion`)
    REFERENCES `ShuxhyDB`.`Produccion` (`IdProduccion`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- procedure matutilizados
-- -----------------------------------------------------

DELIMITER $$
USE `ShuxhyDB`$$
CREATE PROCEDURE `matutilizados` ()

BEGIN
DELETE from MaterialUtilizado;
Insert INTO MaterialUtilizado (IdProduccion, IdReceta) select MAX(r.IdProduccion), r.IdReceta from Produccion r 
Inner join Produccion on r.IdProduccion=produccion.IdProduccion;

Update materialutilizado
SET IdReceta =(select  produccion.IdReceta from produccion where produccion.IdProduccion=materialutilizado.IdProduccion);

Insert INTO MaterialUtilizado (IdDetalleReceta, IdMaterial, CantidadMat) select detallereceta.IdDetalleReceta, detallereceta.IdMaterial,Cantidad from detallereceta 
inner join MaterialUtilizado on materialutilizado.IdReceta=detallereceta.IdReceta;

update MaterialUtilizado
set IdMaterial=-1 where IdMaterial=0;

END$$

DELIMITER ;

USE `ShuxhyDB` ;

-- -----------------------------------------------------
-- trigger updStockCompra
-- -----------------------------------------------------

DELIMITER //
CREATE TRIGGER updStockCompra AFTER INSERT ON detallecompra
FOR EACH ROW BEGIN 
	UPDATE material SET Stock = Stock + new.Cantidad
	WHERE material.IdMaterial = NEW.IdMaterial;
END
//
DELIMITER ;

-- -----------------------------------------------------
-- trigger updStockProductoProduccion
-- -----------------------------------------------------

DELIMITER //
CREATE TRIGGER updStockProduccion AFTER INSERT ON produccion
FOR EACH ROW BEGIN 
	UPDATE producto SET Stock = Stock + new.CantidadProducida
	WHERE producto.IdProducto = NEW.IdProducto;
END
//
DELIMITER ;


-- -----------------------------------------------------
-- trigger updStockMaterialesProduccion
-- -----------------------------------------------------

DELIMITER //
CREATE TRIGGER updStockMateriales AFTER INSERT ON materialutilizado
FOR EACH ROW BEGIN 
	UPDATE material SET Stock = Stock - new.CantidadMat
	WHERE material.IdMaterial = NEW.IdMaterial;
END
//
DELIMITER ;

-- -----------------------------------------------------
-- trigger updCostoProduccionProducto
-- -----------------------------------------------------

DELIMITER //
CREATE TRIGGER updCostoProduccionProducto AFTER INSERT ON receta
FOR EACH ROW BEGIN 
	UPDATE producto SET CostoProduccion = CostoProduccion + new.Total
	WHERE producto.IdProducto = NEW.IdProducto;
END
//
DELIMITER ;




SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
