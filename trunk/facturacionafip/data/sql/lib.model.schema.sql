
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- cliente
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `cliente`;


CREATE TABLE `cliente`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`razon_social` VARCHAR(255)  NOT NULL,
	`cuit` VARCHAR(255)  NOT NULL,
	`activo` TINYINT default 1 NOT NULL,
	`direccion` VARCHAR(255),
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- tipo_comprobante
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `tipo_comprobante`;


CREATE TABLE `tipo_comprobante`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`code` VARCHAR(2)  NOT NULL,
	`description` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- tipo_documento
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `tipo_documento`;


CREATE TABLE `tipo_documento`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`code` VARCHAR(2)  NOT NULL,
	`description` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
