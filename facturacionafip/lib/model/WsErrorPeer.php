<?php

class WsErrorPeer extends BaseWsErrorPeer{
	public static function getByCode($code){
		$c = new Criteria();
		$c->add(WsErrorPeer::CODE, $code, Criteria::EQUAL);
		return WsErrorPeer::doSelectOne($c);
	}
}
