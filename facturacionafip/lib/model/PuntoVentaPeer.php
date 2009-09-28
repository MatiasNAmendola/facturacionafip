<?php

class PuntoVentaPeer extends BasePuntoVentaPeer{
	public static function findAllActivos(){
		$c = new Criteria();
		$c->add(PuntoVentaPeer::ACTIVE, 1);
		return PuntoVentaPeer::doSelect($c);
	}
}
