
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

#-----------------------------------------------------------------------------
#-- comprobante
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `comprobante`;


CREATE TABLE `comprobante`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`tipo_comprobante_id` INTEGER,
	`nro_comprobante` VARCHAR(255)  NOT NULL,
	`punto_venta` VARCHAR(255)  NOT NULL,
	`fecha_comprobante` DATETIME  NOT NULL,
	`cliente_id` INTEGER,
	`cbt_desde` INTEGER  NOT NULL,
	`cbt_hasta` INTEGER  NOT NULL,
	`imp_total` REAL  NOT NULL,
	`imp_total_conceptos` REAL  NOT NULL,
	`imp_neto` REAL  NOT NULL,
	`imp_liquidado` REAL  NOT NULL,
	`imp_liquidado_rni` REAL  NOT NULL,
	`imp_operaciones_ex` REAL  NOT NULL,
	`fecha_servicio_desde` DATETIME,
	`fecha_servicio_hasta` DATETIME,
	`fecha_vencimiento_pago` DATETIME,
	PRIMARY KEY (`id`),
	INDEX `comprobante_FI_1` (`tipo_comprobante_id`),
	CONSTRAINT `comprobante_FK_1`
		FOREIGN KEY (`tipo_comprobante_id`)
		REFERENCES `tipo_comprobante` (`id`),
	INDEX `comprobante_FI_2` (`cliente_id`),
	CONSTRAINT `comprobante_FK_2`
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
	`code` VARCHAR(2)  NOT NULL,
	`description` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
