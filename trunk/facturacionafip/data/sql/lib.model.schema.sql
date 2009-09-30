
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
	`tipo_documento_id` INTEGER,
	`nro_documento` VARCHAR(255)  NOT NULL,
	`activo` TINYINT default 1 NOT NULL,
	`direccion` VARCHAR(255),
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `cliente_FI_1` (`tipo_documento_id`),
	CONSTRAINT `cliente_FK_1`
		FOREIGN KEY (`tipo_documento_id`)
		REFERENCES `tipo_documento` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- contacto
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `contacto`;


CREATE TABLE `contacto`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(255)  NOT NULL,
	`telefono` VARCHAR(255),
	`email` VARCHAR(255),
	`cliente_id` INTEGER  NOT NULL,
	PRIMARY KEY (`id`),
	INDEX `contacto_FI_1` (`cliente_id`),
	CONSTRAINT `contacto_FK_1`
		FOREIGN KEY (`cliente_id`)
		REFERENCES `cliente` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- tipo_documento
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `tipo_documento`;


CREATE TABLE `tipo_documento`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`code` INTEGER  NOT NULL,
	`description` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- comprobante
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `comprobante`;


CREATE TABLE `comprobante`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`tipo_comprobante_id` INTEGER,
	`nro_comprobante` VARCHAR(255)  NOT NULL,
	`punto_venta_id` INTEGER,
	`fecha_comprobante` DATETIME  NOT NULL,
	`cliente_id` INTEGER,
	`cbt_desde` INTEGER  NOT NULL,
	`cbt_hasta` INTEGER  NOT NULL,
	`imp_total` REAL  NOT NULL,
	`imp_total_conceptos` REAL default 0 NOT NULL,
	`imp_neto` REAL default 0 NOT NULL,
	`imp_liquidado` REAL default 0 NOT NULL,
	`imp_liquidado_rni` REAL default 0 NOT NULL,
	`imp_operaciones_ex` REAL default 0 NOT NULL,
	`es_servicio` TINYINT  NOT NULL,
	`fecha_servicio_desde` DATETIME,
	`fecha_servicio_hasta` DATETIME,
	`fecha_vencimiento_pago` DATETIME,
	`cae` VARCHAR(255)  NOT NULL,
	`fecha_cae` DATETIME  NOT NULL,
	`fecha_vto_cae` DATETIME  NOT NULL,
	`resultado` VARCHAR(255),
	`motivo` VARCHAR(255),
	`reproceso` VARCHAR(255),
	PRIMARY KEY (`id`),
	INDEX `comprobante_FI_1` (`tipo_comprobante_id`),
	CONSTRAINT `comprobante_FK_1`
		FOREIGN KEY (`tipo_comprobante_id`)
		REFERENCES `tipo_comprobante` (`id`),
	INDEX `comprobante_FI_2` (`punto_venta_id`),
	CONSTRAINT `comprobante_FK_2`
		FOREIGN KEY (`punto_venta_id`)
		REFERENCES `punto_venta` (`id`),
	INDEX `comprobante_FI_3` (`cliente_id`),
	CONSTRAINT `comprobante_FK_3`
		FOREIGN KEY (`cliente_id`)
		REFERENCES `cliente` (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- tipo_comprobante
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `tipo_comprobante`;


CREATE TABLE `tipo_comprobante`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`code` INTEGER  NOT NULL,
	`description` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- punto_venta
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `punto_venta`;


CREATE TABLE `punto_venta`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`code` INTEGER  NOT NULL,
	`description` VARCHAR(255)  NOT NULL,
	`active` TINYINT default 1 NOT NULL,
	`created_at` DATETIME,
	`updated_at` DATETIME,
	PRIMARY KEY (`id`),
	UNIQUE KEY `punto_venta_U_1` (`code`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- ws_error
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `ws_error`;


CREATE TABLE `ws_error`
(
	`code` INTEGER  NOT NULL,
	`message` VARCHAR(255),
	PRIMARY KEY (`code`),
	UNIQUE KEY `ws_error_U_1` (`code`)
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
