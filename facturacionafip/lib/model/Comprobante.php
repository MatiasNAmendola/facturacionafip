<?php

class Comprobante extends BaseComprobante{

	public function generate(){
		$client = WsfeClient::generateSoapClient();

		$ta = new TA();
		$sign = $ta->getSign();
		$token = $ta->getToken();

		$ultimoNro = WsfeClient::UltNro($client, $token, $sign);
		$ultimoCbt = WsfeClient::RecuperaLastCMP($client, $token, $sign, $this->getPuntoVenta()->getCode(), $this->getTipoComprobante()->getCode());
		$comprobanteAutorizado = WsfeClient::Aut($client, $token, $sign, $ultimoNro + 1, $ultimoCbt + 1, $this);
		
		$this->setNroComprobante($comprobanteAutorizado->getNroComprobante());
		$this->setFechaCae($comprobanteAutorizado->getFechaCae());
		$this->setReproceso($comprobanteAutorizado->getReproceso());
		$this->setMotivo($comprobanteAutorizado->getMotivo());
		 
		$this->setCae($comprobanteAutorizado->getCae());
		$this->setResultado($comprobanteAutorizado->getResultado());
		$this->setMotivo($comprobanteAutorizado->getMotivo());
		$this->setFechaVtoCae($comprobanteAutorizado->getFechaVtoCae());
	}
}