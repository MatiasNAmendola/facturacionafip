<?php

class ClientePeer extends BaseClientePeer
{
	public static function findAllActivos(){
		$c = new Criteria();
		$c->add(ClientePeer::ACTIVO
, 1);
		return ClientePeer::doSelect($c);
	}
}
