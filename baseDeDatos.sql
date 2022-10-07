CREATE TABLE `shop`.`users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NULL,
  `email` VARCHAR(255) NULL,
  `password` VARCHAR(255) NULL,
  `admin` TINYINT(1) NULL,
  PRIMARY KEY (`id`));

  CREATE TABLE `shop`.`products` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(255) NULL,
  `descripcion` LONGTEXT NULL,
  `precio` INT(11) NULL,
  `stock` TINYINT(1) NULL,
  PRIMARY KEY (`id`));

  CREATE TABLE `shop`.`cart` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `iduser` INT(11) NULL,
  `idproduct` INT(11) NULL,
  PRIMARY KEY (`id`),
  INDEX `iduser_idx` (`iduser` ASC) VISIBLE,
  INDEX `idproduct_idx` (`idproduct` ASC) VISIBLE,
  CONSTRAINT `iduser`
    FOREIGN KEY (`iduser`)
    REFERENCES `shop`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `idproduct`
    FOREIGN KEY (`idproduct`)
    REFERENCES `shop`.`products` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

