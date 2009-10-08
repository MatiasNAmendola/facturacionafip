<?php

class Comprobante extends BaseComprobante{

	public function generate(){
		$client = WsfeClient::generateSoapClient();

		$ta = new TA();
		$token = $ta->getToken();
		$sign = $ta->getSign();
		
		try {
			$ultimoNro = WsfeClient::UltNro($client, $token, $sign);
		}catch (WsfeException $e){
			if ($e->getCode() == "1000"){
				$ta->actualizate();
				$token = $ta->getToken();
				$sign = $ta->getSign();
				$ultimoNro = WsfeClient::UltNro($client, $token, $sign);
			}
		}
			
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
	
	public function calculateTotales(){
		$this->setImpLiquidado(0);
		$this->setImpLiquidadoRni(0);
		$this->setImpNeto(0);
		$this->setImpOperacionesEx(0);
		$this->setImpTotal(0);
		$this->setImpTotalConceptos(0);
		foreach ($this->getComprobanteItems() as $l){
			$this->setImpLiquidado($this->getImpLiquidado() + $l->getImpLiquidado());
			$this->setImpLiquidadoRni($this->getImpLiquidadoRni() + $l->getImpLiquidadoRni());
			$this->setImpNeto($this->getImpNeto() + $l->getImpNeto());
			$this->setImpOperacionesEx($this->getImpOperacionesEx() + $l->getImpOperacionesEx());
			$this->setImpTotal($this->getImpTotal() + $l->getImpTotal());
			$this->setImpTotalConceptos($this->getImpTotalConceptos() + $l->getImpTotalConceptos());
		}
	}
	
	public function copiarImportes(Comprobante $otro){
		$this->setImpLiquidado($otro->getImpLiquidado());
		$this->setImpLiquidadoRni($otro->getImpLiquidadoRni());
		$this->setImpNeto($otro->getImpNeto());
		$this->setImpOperacionesEx($otro->getImpOperacionesEx());
		$this->setImpTotal($otro->getImpTotal());
		$this->setImpTotalConceptos($otro->getImpTotalConceptos());
		foreach ($otro->getComprobanteItems() as $l){
			$l->setComprobante($this);
		}
	}
}